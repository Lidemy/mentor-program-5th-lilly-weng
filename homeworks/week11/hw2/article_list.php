<?php
  require_once('conn.php');
  require_once('utils.php');

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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>部落格</title>
  <link rel="stylesheet" href="normalize.css" />
  <link rel="stylesheet" href="style.css">
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
          <!-- <li><a href="admin.php">管理後台</a></li> -->
          <li><a href="login.php">登入</a></li>
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
    <main class="article">
      <h1 class="article__list">文章列表</h1>
      <?php while ($row = $result->fetch_assoc()) { ?>
        <ul>
          <li class="list__info">
            <a href="read_more.php?id=<?php echo $row['id']; ?>">
              <div class="list__content">
                <h2 class="post__title list__title"><?php echo escape($row['title']); ?><h2>
                <span class="post__created-at"><?php echo escape($row['created_at']); ?></span> 
              </div>
            </a>
          </li>
        </ul>
      <?php } ?>
    </main>
  </div>
  <footer>
    Copyright © 2021 WHO's Blog All Rights Reserved.
  </footer>
</body>
</html>