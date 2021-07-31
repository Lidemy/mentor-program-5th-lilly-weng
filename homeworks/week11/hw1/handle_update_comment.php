<?php
session_start();
require_once("./conn.php");
require_once("utils.php");

$id = $_POST['id'];
$username = $_SESSION['username'];
$content = $_POST['content'];

if (empty($_POST['content'])) {
    header('Location: update_comment.php?errCode=1&id='.$_POST['id']);
    die('資料不齊全');
}

$sql = "update lilyweng_comments set content=? where id=? and username=?" ;
$stmt = $conn->prepare($sql);
$stmt->bind_param('sis', $content, $id, $username); //一個 s 表示一個字串的意思 i is integer
$result = $stmt->execute();
if ($result) {
    header("Location: ./index.php");
} else {
    die("failed. " . $conn->error);
}


?>