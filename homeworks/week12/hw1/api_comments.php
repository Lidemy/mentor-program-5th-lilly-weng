<?php
    //拿 comments 的 api
    require_once('conn.php');
    header('Content-type:application/json;charset=utf-8');
    //跨網域存取
    header('Access-Control-Allow-Origin: *');
    
    //錯誤處理:判斷是否有沒有 site_key
    //我們用 site_key 來區分不同的留言板
    if (
        empty($_GET['site_key'])
    ) {
        $json = array(
            "ok" => false,
            "message" => "Please add site_key in url"
        );
        //轉換成 json 的格式
        $response = json_encode($json);
        echo $response;
        die();
    }

    //拿資料
    $site_key = $_GET['site_key'];

    //如果 before是空的，不放參數
      $sql = 
    "select id, nickname, content, created_at from lilyweng_bulletin_discussions where site_key = ? " .
    (empty($_GET['before']) ? "" : "and id < ?") .
    " order by id desc limit 5 ";
    $stmt = $conn->prepare($sql);
    if (empty($_GET['before'])) {
        $stmt->bind_param('s', $site_key);
    } else {
        $stmt->bind_param('si', $site_key, $_GET['before']);
    }

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

    //把資料拿回來，從資料庫 push 出來
    $result = $stmt->get_result();
    $discussions = array();
    while($row = $result->fetch_assoc()) {
        array_push($discussions, array(
            "id" => $row['id'],
            "nickname" => $row['nickname'],
            "content" =>$row['content'],
            "created_at" => $row['created_at']
        ));
    }

    //產生物件
    $json = array(
        "ok" => true, 
        "discussions" => $discussions
    );

    //把物件變成 json 利用 json_encode
    $response = json_encode($json);
    echo $response



?>