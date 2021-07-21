<?php
  require_once('conn.php');
  require_once('utils.php');

  $username = NULL; 
  if (!empty($_SESSION['username'])) {
      $username = $_SESSION['username'];
  } 

  //設定頁數
  $page = 1;
    if (!empty($_GET['page'])) {
      $page = intval($_GET['page']);
    }

  $items_per_page = 5;
  $offset = ($page - 1) * $items_per_page;

  $sql = "SELECT * FROM lilyweng_blog_articles AS a WHERE a.is_deleted IS NULL  ORDER BY id DESC LIMIT ? OFFSET ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('ii',$items_per_page, $offset);
  $result = $stmt->execute();
  if (!$result) {
    die('Error: ' . $conn->error);
  }
  $result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>部落格</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="normalize.css" />
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <nav class="navbar">
    <div class="wrapper navbar__wrapper">
      <div class="navbar__site-name">
        <a href='index.php'>Who's Blog</a>
      </div>
      <ul class="navbar__list">
        <div>
          <li><a href="article_list.php">文章列表</a></li>
          <li><a href="#">分類專區</a></li>
          <li><a href="#">關於我</a></li>
        </div>
        <div>
          <?php if (!$username) { ?>
          <li><a href="login.php">登入</a></li>
          <?php } else { ?>
          <li><a href="admin.php">管理後台</a></li>
          <li><a href="logout.php">登出</a></li>
          <?php } ?>
        </div>
      </ul>
    </div>
  </nav>
  <section class="banner">
    <div class="banner__wrapper">
      <h1>存放技術之地</h1>
      <div>Welcome to my blog</div>
    </div>
  </section>
  <div class="container-wrapper">
    <main class="posts">
        <?php while ($row = $result->fetch_assoc()) { ?>
        <article class="post">
        <div class="post__head">
          <h2 class="post__title"><?php echo escape($row['title']); ?><h2>
          <span class="post__created-at">最後編輯 <?php echo escape($row['created_at']); ?></span> 
        </div>
        <p class="post__content"><?php echo escape($row['content']); ?></p>
        <div class="post__btn">
          <a href="read_more.php?id=<?php echo escape($row['id']); ?>" class="btn">read more</a>
        </div>
        </article>
        <?php } ?>
        <?php
        $stmt = $conn->prepare("SELECT count(id) AS count FROM lilyweng_blog_articles WHERE is_deleted IS NULL");
        $result = $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $count = $row['count'];
        $total_page = ceil($count / $items_per_page);
        ?>
        <div class="paginator">
        <?php if ($page != 1) { ?>
          <a href="index.php?page=1" class="btn">首頁</a>
          <a href="index.php?page=<?php echo $page - 1 ?>" class="btn">上一頁</a>
        <?php } ?>
        <?php if ($page != $total_page) { ?>
          <a href="index.php?page=<?php echo $page + 1 ?>" class="btn">下一頁</a>
          <a href="index.php?page=<?php echo $total_page ?>" class="btn">最後一頁</a>
        <?php } ?>
      </div>
    </main>
  </div>
  <footer>Copyright © 2020 Who's Blog All Rights Reserved.</footer>
</body>
</html>