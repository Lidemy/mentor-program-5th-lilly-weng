<?php
session_start();
require_once("./conn.php");
require_once("utils.php");

$authority = $_POST['authority'];
$id = $_POST['id'];

$sql = "update users set authority=? where id=?" ;
$stmt = $conn->prepare($sql);
$stmt->bind_param('si', $authority, $id); //一個 s 表示一個字串的意思
$result = $stmt->execute();
if ($result) {
    header("Location: ./index.php");
} else {
    die("failed. " . $conn->error);
}

?>