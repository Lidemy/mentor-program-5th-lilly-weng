<?php
//session 機制
session_start();
require_once("./conn.php");
require_once("./utils.php");

$username = $_POST['username'];
$password = $_POST['password']; 

if (empty($username) || empty($password)) {
    header('Location: register.php?errCode=1');
    die('資料不齊全');
}

// $sql = sprintf("SELECT * FROM lilyweng_users WHERE username='%s' AND password='%s'",$username, $password); 
$sql = "SELECT * FROM lilyweng_users WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username); 
$result = $stmt->execute();

if (!$result) {
    die($conn->error);  
} 

//result 改成 stmt 後要拿結果需要更改
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: login.php?errCode=2");
    exit();
}

//有查到使用者
$row = $result->fetch_assoc();
if (password_verify($password, $row['password'])) {





/* print_r($result);
echo($result->num_rows); */

    if ($result->num_rows) {
        //產生 token
        /* $token = generateToken();
        $sql = sprintf(
            "insert into tokens(token, username) values('%s', '%s')", $token, $username
        );
        $result = $conn->query($sql);
        if (!$result) {
            die($conn->error);  
        }  */

        //登入成功
        /* $expire = time() + 3600 * 24 *30; // 30days
        setcookie("token", $token, $expire ); */
        //session 機制
        /*
            1. 產生 session id (token)
            2. 把 username 寫入檔案
            3. set-cookie: session-id
        */
        $_SESSION['username'] = $username;

        header("Location: index.php");
    } else {
        header("Location: login.php?errCode=2");
    }
}
/* header("Location: index.php"); */


?>