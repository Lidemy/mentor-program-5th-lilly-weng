<?php 
  session_start();
  require_once('conn.php');
  require_once('utils.php');

  if (empty($_SESSION['username'])) {
    header('Location: index.php');
    exit;
  } 

  $sql = "SELECT * FROM lilyweng_blog_articles AS a WHERE a.is_deleted IS NULL  ORDER BY id DESC";
  $stmt = $conn->prepare($sql);
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
          <li><a href="add_article.php">新增文章</a></li>
          <li><a href="logout.php">登出</a></li>
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
          <a href="read_more.php?id=<?php echo $row['id']; ?>" class="btn">查看</a>
          <a href="edit_article.php?id=<?php echo $row['id']; ?>" class="btn">編輯</a>
          <a href="handle_delete.php?id=<?php echo $row['id']; ?>" class="btn">刪除</a>
        </div>
      </article>
      <?php } ?>
    </main>
  </div>
  <footer>Copyright © 2020 Who's Blog All Rights Reserved.</footer>
</body>
</html>