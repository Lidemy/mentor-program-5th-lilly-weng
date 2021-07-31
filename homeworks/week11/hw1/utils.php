<?php 
    require_once("./conn.php");

    function generateToken() {
        $s = '';
        for ($i=1; $i<=16; $i++) {
            $s .= chr(rand(65,90));
        }
        return $s;
    }

    function getUserFromToken($token) {
        global $conn;
        $sql = sprintf ("select username from tokens where token= '%s'", $token);
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $username = $row['username'];
    
        //$sql = sprintf ("select * from lilyweng_users where username= '%s'", $username); 
        $sql = sprintf ("select * from lilyweng_users where username= '%s'", $username);
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row; //username, id, nickname
    
    }

    function getUserFromUsername($username) {
        global $conn;  
        //$sql = sprintf ("select * from lilyweng_users where username= '%s'", $username); 
        $sql = sprintf ("select * from lilyweng_users where username= '%s'", $username);
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row; //username, id, nickname
    
    }

    //解決 XSS 問題
    function escape($str) {
        return htmlspecialchars($str, ENT_QUOTES);
    }

    //確認權限
    function isAdmin($username, $authority){
        if(!$username || $authority !== '2'){
            header('Location: index.php');
            die();
        }
    }
?>