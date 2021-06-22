<?php
session_start();
require_once("./conn.php");
require_once("utils.php");

/* $nickname = $_POST['nickname']; */
$content = $_POST['content']; 
/* $category_id = $_POST['category_id']; */

if (empty($content)) {
    header('Location: index.php?errCode=1');
    die('資料不齊全');
}

$user = getUserFromUsername($_SESSION['username']);
$nickname = $user['nickname'];

/* $user = getUserFromToken($_COOKIE['token']);
$nickname = $user['nickname']; */

/* $username = $_COOKIE['username']; 
$user_sql = sprintf('select nickname from users where username="%s"', $username);
$user_result= $conn->query($user_sql);
$row = $user_result->fetch_assoc(); */




$sql = sprintf("INSERT INTO lilyweng_comments(nickname, content) VALUES('%s', '%s')", $nickname, $content);
$result = $conn->query($sql);
if ($result) {
    header("Location: ./index.php");
} else {
    die("failed. " . $conn->error);
}


?>