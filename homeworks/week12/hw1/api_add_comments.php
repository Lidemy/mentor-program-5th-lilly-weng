<?php
    //新增 comments 的 api
    require_once('conn.php');
    //API 要先加入 header
    header('Content-type:application/json;charset=utf-8');
    header('Access-Control-Allow-Origin: *');

    //錯誤處理:判斷是否有沒有 content
    if (
        empty($_POST['content']) ||
        empty($_POST['nickname']) ||
        empty($_POST['site_key'])
    ) {
        $json = array(
            "ok" => false,
            "message" => "Please input missing fields"
        );
        //轉換成 json 的格式
        $response = json_encode($json);
        echo $response;
        die();
    }

    //拿資料
    $nickname = $_POST['nickname'];
    $site_key = $_POST['site_key'];
    $content = $_POST['content'];

    $sql = "insert into lilyweng_bulletin_discussions(site_key, nickname, content) values (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    //把這三個資料塞進去資料庫
    $stmt->bind_param('sss', $site_key, $nickname, $content);
    $result = $stmt->execute();

    //確認結果是不是有取到
    if (!$result) {
        $json = array(
            "ok" => false,
            "message" => $conn->error //把資料庫的錯誤給 message
        );
        $response = json_encode($json);
        echo $response;
        die();
    }

    //產生物件
    $json = array(
        "ok" => true, //前端只要判斷 ok 是不是 true，就知道有沒有成功
        "message" => "success"
    );

    //把物件變成 json 利用 json_encode
    $response = json_encode($json);
    echo $response
?>