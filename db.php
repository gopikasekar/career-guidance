<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zlogin";

// Create connection
$conn = new mysqli("localhost", "root", "", "zlogin");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
