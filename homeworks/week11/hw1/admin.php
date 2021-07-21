<?php
    session_start();
    require_once("conn.php");
    require_once("utils.php");

    //身分不得為空
    if(empty($_SESSION['username'])) {
        header("Location: index.php");
        die();
    }

    $username = $_SESSION['username'];

    //取得 users 資料
    $sql = "SELECT * FROM lilyweng_users";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();
    if(!$result) {
        die('資料獲取失敗' . $conn->error);
    }
    $result = $stmt->get_result();

    $user = getUserFromUsername($username);
    $authority = $user['authority'];

    //驗證身分
    isAdmin($username, $authority);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="warning">
     <strong>ATTENTION! Please DO NOT use your real password or username!!!</strong>
    </header>
    <main class="board">
    <div>
        <a class="board__btn" href="index.php">Back</a>
    </div>
    
    <?php while($user = $result->fetch_assoc()) {?>
        <div>
            <form class="auth_select" method="POST" action="handle_authority.php">
                <div>
                    (@<?php echo escape($user['username'])?>)
                    <?php echo escape($user['nickname']) ?>
                    <select name="authority">
                        <option value="2" <?php echo $user['authority'] ==='2'?'selected' : ''?>>admin</option>
                        <option value="1" <?php echo $user['authority'] ==='1'?'selected' : ''?>>general</option>
                        <option value="0" <?php echo $user['authority'] ==='0'?'selected' : ''?>>blocked</option>
                    </select>
                    <input type="hidden" name="id" value="<?php echo $user['id'] ?>"></input>
                    <input class="auth__submit-btn" type="submit" />
                </div>
                
            </form>
        </div>
    <?php } ?>
    </main>
</body>
</html>