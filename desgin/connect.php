<?php
$servername = "localhost";
$username = "Mahi"; // Replace with your MySQL username
$password = "Mahi@1122"; // Replace with your MySQL password
$dbname = "user_registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
