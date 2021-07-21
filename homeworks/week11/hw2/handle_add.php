<?php 
  session_start();
  require_once('conn.php');

  if (empty($_POST['title']) || empty($_POST['content'])) {
    header('Location: article.php?errCode=1');
    die('資料不齊全');
  }

  $username = $_SESSION['username'];
  $title = $_POST['title'];
  $content = $_POST['content'];

  $sql = "INSERT INTO lilyweng_blog_articles(username, title, content) VALUES(?, ?, ?)";
  $stmt = $conn->prepare($sql);
  print_r($stmt);
  $stmt->bind_param('sss', $username, $title, $content);
  
  $result = $stmt->execute();
  if (!$result) {
    die($conn->error);
  }

  header('Location: admin.php');
?>