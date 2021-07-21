<?php
require_once("./conn.php");

header('Content-type:application/json;charset=utf-8');

$content = $_POST['content']; 

if (empty($content)) {
    $json = array(
        "ok" => false,
        "message"=>"資料不得為空"
    );
    //response 是一個 json 的物件
    $response = json_encode($json);
    echo $response;
    die();
}

$username = $_POST['username'];

$sql = "INSERT INTO lilyweng_comments(username, content) VALUES(?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $username, $content); //一個 s 表示一個字串的意思
$result = $stmt->execute();
if (!$result) {
    $json = array(
        "ok" => false,
        "message" =>$conn->error
    );
    //response 是一個 json 的物件
    $response = json_encode($json);
    echo $response;
    die();
}

$json = array(
    "ok" => true,
    "message"=>"Success!"
);

$response = json_encode($json);
echo $response;
?>