<?php
$servername = "localhost";  
$username = "root";        
$password = "Annu#2005";        
$database = "Business_Portfolio"; 

// Create Connection
$conn = new mysqli($servername, $username, $password, $database);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully"; // Uncomment this to check connection
?>
