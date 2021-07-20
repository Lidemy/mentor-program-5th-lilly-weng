<?php
session_start();
require_once("./conn.php");

$nickname = $_POST['nickname'];
$username = $_POST['username'];
//change password to hash password
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

if (empty($nickname) || empty($username) || empty($password)) {
    header('Location: register.php?errCode=1');
    die('資料不齊全');
}

/* $sql = sprintf("INSERT INTO lilyweng_users(nickname, username, password) VALUES('%s', '%s', '%s')", $nickname, $username, $password); */
$sql = "INSERT INTO users(nickname, username, password) VALUES(?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $nickname, $username, $password); //一個 s 表示一個字串的意思
$result = $stmt->execute();

if (!$result) {
    if (strpos($conn->error, "username")!==false) {
        header('Location: register.php?errCode=2');
    } /* else if (strpos($conn->error, "nickname")!==false){
        header('Location: register.php?errCode=3');
    }  */
        
    die($conn->error);
    
} 

//註冊後保持登入狀態
$_SESSION['username'] = $username;
header("Location: index.php");


?>