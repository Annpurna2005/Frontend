<?php
include '../model/db.php';
header("Content-Type: application/json");

$result = $conn->query("SELECT * FROM comments order by CommentId desc");
$comments = [];
if($result){
    while($row = $result->fetch_assoc()){
        $comments[] = $row;
    }
    $response['msg'] = "comments retrived";
    $response['status'] = 200;
    $response['comments'] = $comments;
     echo json_encode($comments);
}else{
    $response['msg'] = "comments not retrived";
    $response['status'] = 500;
    echo json_encode($response);
}



?>
