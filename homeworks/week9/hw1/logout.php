<?php
 //session 機制
 session_start();
 session_destroy();

 /* require_once('conn.php'); */
 //清空 cookie and token
 /* $token = $_COOKIE['token'];
 $sql = sprintf ("delete from tokens where token= '%s'", $token);
 $conn->query($sql);
 setcookie("token", "", time() - 3600 ); */
 header("Location: index.php");
?>