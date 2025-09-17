<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'phone_store_demo';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
$conn->set_charset('utf8mb4');
?>
