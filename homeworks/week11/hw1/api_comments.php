<?php
    require_once("conn.php");

    $page = 1;
    if (!empty($_GET['page'])) {
        $page = intval($_GET['page']);
    }
    $items_per_page = 5;
    $offset = ($page - 1) * $items_per_page;

    $stmt = $conn->prepare('select comments.id, comments.username, users.nickname, comments.content, comments.created_at from comments left join users  on comments.username = users.username where comments.is_deleted != 1  order by comments.id desc limit ? offset ?');
    $stmt->bind_param('ii', $items_per_page, $offset);
    $result = $stmt->execute();
    if (!$result) {
        die('Error:' . $conn->error);
    }
    $result = $stmt->get_result(); 
    $comments = array();
    while($row = $result->fetch_assoc()) {
        array_push($comments, array(
            "id"=>$row['id'],
            "username" => $row['username'],
            "nickname" => $row['nickname'],
            "content"=> $row['content'],
            "created_at"=> $row['created_at']
        ));
    }

    $json = array(
        "comments" => $comments
    );
    //response 是一個 json 的物件
    $response = json_encode($json);
    header('Content-type:application/json;charset=utf-8');
    echo $response;



?>
