<?php
include '../model/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $project_type = $_POST['project_type'];
    $message = $_POST['message'];

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO contacts (full_name, email, phone, project_type, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $full_name, $email, $phone, $project_type, $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Your message has been sent successfully!'); window.location.href='contact.php';</script>";
        header("location:../views/contect.html");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}
?>