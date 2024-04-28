<?php
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "mahendra"; 

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data and insert into database
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['msg'];

    $sql = "INSERT INTO contacts (name, email, number, message) VALUES ('$name', '$email', '$number', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
