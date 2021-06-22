<?php
require_once("./conn.php");

$nickname = $_POST['nickname'];
$username = $_POST['username'];
$password = $_POST['password']; 

if (empty($nickname) || empty($username) || empty($password)) {
    header('Location: register.php?errCode=1');
    die('資料不齊全');
}

$sql = sprintf("INSERT INTO lilyweng_users(nickname, username, password) VALUES('%s', '%s', '%s')", $nickname, $username, $password);
$result = $conn->query($sql);
if (!$result) {
    if (strpos($conn->error, "username")!==false) {
        header('Location: register.php?errCode=2');
    } else if (strpos($conn->error, "nickname")!==false){
        header('Location: register.php?errCode=3');
    } 
        
    die($conn->error);
    
} 

header("Location: index.php");


?>