<?php
session_start();
require_once("./conn.php");
require_once("utils.php");

$nickname = $_POST['nickname'];
$username = $_SESSION['username'];

if (empty($nickname)) {
    header('Location: index.php?errCode=1');
    die('資料不齊全');
    
}

$sql = "update lilyweng_users set nickname=? where username=?" ;
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $nickname, $username); //一個 s 表示一個字串的意思
$result = $stmt->execute();
if ($result) {
    header("Location: ./index.php");
} else {
    die("failed. " . $conn->error);
}


?>