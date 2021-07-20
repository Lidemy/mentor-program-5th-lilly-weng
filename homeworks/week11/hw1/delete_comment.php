<?php
session_start();
require_once("./conn.php");
require_once("utils.php");

$id = $_GET['id'];
$username = $_SESSION['username'];

if (empty($_GET['id'])) {
    header('Location: update_comment.php?errCode=1');
    die('資料不齊全');
}


$sql = "update comments set is_deleted=1 where id=? and username=?" ;
$stmt = $conn->prepare($sql);
$stmt->bind_param('is', $id, $username); //一個 s 表示一個字串的意思 i is integer
$result = $stmt->execute();
if ($result) {
    header("Location: ./index.php");
} else {
    die("failed. " . $conn->error);
}


?>