<?php
include '../model/db.php';
if($_SERVER['REQUEST_METHOD']!== 'POST'){
    http_response_code(405);
    echo json_encode(["success" => false, "error" => "Invalid request method. Use POST."]);
    exit;
   
}
if (!isset($_POST['name']) || !isset($_POST['comment'])) {
    http_response_code(400);
    echo json_encode(["success" => false, "error" => "Name and comment are required."]);
    exit;
}
$name = trim($_POST['name']);
$comment = trim($_POST['comment']);

$sql = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true, "message" => "Comment added successfully."]);
} else {
    echo json_encode(["success" => false, "error" => "Error: " . $sql . "<br>" . $conn->error]);
}
?>
