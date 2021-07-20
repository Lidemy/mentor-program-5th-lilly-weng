<?php
    session_start();
    require_once("conn.php");
    require_once("utils.php");

    $username = NULL; 
    $user = NULL;
    $authority = NULL;
    if (!empty($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $user = getUserFromUsername($username);
        $authority = $user['authority'];
        $nickname = $user['nickname'];
    } 

    $page = 1;
    if (!empty($_GET['page'])) {
        $page = intval($_GET['page']);
    }
    $items_per_page = 5;
    $offset = ($page - 1) * $items_per_page;

    $stmt = $conn->prepare('
    select comments.id, comments.username, users.nickname, 
    comments.content, comments.created_at 
    from comments left join users  
    on comments.username = users.username 
    where comments.is_deleted != 1  
    order by comments.id desc 
    limit ? offset ?');
    
    $stmt->bind_param('ii', $items_per_page, $offset);
    $result = $stmt->execute();
    
    if (!$result) {
        die('Error:' . $conn->error);
    }
    $result = $stmt->get_result(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin Board</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="warning">
     <strong>ATTENTION! Please DO NOT use your real password or username!!!</strong>
    </header>
    <main class="board">
        <div>
        <!-- 判斷有沒有登入 -->
        <?php if (!$username) { ?>
            <a class="board__btn" href="register.php">Register</a>
            <a class="board__btn" href="login.php">Login</a>
        <?php } else { ?>
            <a class="board__btn" href="logout.php">Logout</a>
            <h3>Hello! <?php echo $user['nickname'] ." ". "(".$user['username'].")"."  "; ?></h3>
            <span class="board__btn update-nickname">Edit nickname</span>
            <!-- 判斷是不是 admin -->
            <span><?php if(!empty($authority) && $authority === '2'){?>
            <a class="board__btn" href="admin.php">Admin page</a>
            </span><?php } ?>
            <form class=" hide board__nickname-form board__new-comment-form" method="POST" action="update_user.php">
                <div class=" board__nickname">
                    <span>New nickname:</span>
                    <input type="text" name="nickname" />
                </div> 
                <input class="board__submit-btn" type="submit" />

            </form>
        <?php }  ?>
        </div>
        
        <h1 class="board__title">Comments</h1>
        <!-- 判斷是不是 block 的使用者 -->
        <?php if($username && $authority != '0') {?>
            <form class="board__new-comment-form" method="POST" action="handle_add_comment.php">
            <?php 
                if (!empty($_GET['errCode'])) {
                    $code = $_GET['errCode'];
                    $msg = 'Error';
                    if ($code === '1') {
                        $msg = '資料不齊全';
                    } 
                    echo '<h2 class="error">錯誤:' . $msg . '</h2>';
                }
            ?>   
            <textarea class="card__content" name="content" rows=8 placeholder="Wanna say something...?"></textarea>
            <input class="board__submit-btn" type="submit"/> 
            </form>
        <?php } else if($username && $authority === '0') { ?>
            <h3>I'm sorry, you are blocked.</h3>
        <?php } else { ?>
            <textarea class="card__content" name="content" rows=8 placeholder="Wanna say something...?"></textarea>
            <h3> Please login to comment </h3>
        <?php } ?>


        <div class="board__hr"></div>
        <section>
            <?php
                while($row = $result->fetch_assoc()) { 
            ?>
            <div class="card">
                <div class="card__avatar">
                </div>
                <div class="card__body">
                    <div class="card__info">
                        <span class="card__author">
                            <?php echo escape($row['nickname']); ?>
                            (@<?php echo escape($row['username']);?>)
                        </span>
                        <span class="card__time">
                            <?php echo escape($row['created_at']); ?>
                        </span>
                        <!-- 讓 admin 也可以編輯刪除任意留言 -->
                        <?php if ($row['username'] === $username || $authority === '2') { ?>
                            <a href="update_comment.php?id=<?php echo $row['id'] ?>">編輯</a>
                            <a href="delete_comment.php?id=<?php echo $row['id'] ?>">刪除</a>
                        <?php } ?>
                    </div>
                    <p class="card__content">
                        <!-- 把內容跳脫後再顯現出來 -->
                         <?php echo escape($row['content']); ?>
                    </p>
                </div>
            </div>
            <?php  } ?>
            
        </section>
        <div class="board__hr"></div>
        <?php
            $stmt = $conn->prepare('select count(id) as count from comments where is_deleted = 0');
            $result = $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $count =  $row['count'];
            $total_page = ceil($count / $items_per_page);
        ?>
        <div class="page-info">
            <span>Total: <?php echo $count ?> comments, Page:</span>
            <span><?php echo $page ?>/ <?php echo $total_page?></span>
        </div>
        <div class="paginator">
            
            <?php if ($page != 1 ) {?>
                <a href="index.php?page=1">Home</a>
                <a href="index.php?page=<?php echo $page - 1 ?>">Previous</a>
            <?php } ?>
            <?php if ($page != $total_page ) {?>   
                <a href="index.php?page=<?php echo $page + 1 ?>">Next</a>
                <a href="index.php?page=<?php echo $total_page ?>">Last page</a> 
            <?php } ?>                                     
        </div>
    </main>
    <script>
        let btn = document.querySelector('.update-nickname')
        btn.addEventListener('click', function(){
            let form = document.querySelector('.board__nickname-form')
            //把 class 裡面的 hide 拿掉
            form.classList.toggle('hide')
        })
    </script>
    
</body>
</html>