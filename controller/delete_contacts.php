<?php
include '../model/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM contacts WHERE id = $id";
    
    if ($conn->query($sql)) {
        echo json_encode(["message" => "Contact deleted"]);
    } else {
        echo json_encode(["error" => "Failed to delete contact"]);
    }
}
?>
