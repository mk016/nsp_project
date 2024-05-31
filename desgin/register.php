<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['c_pass'];
    $profile_pic = isset($_FILES['profile_pic']['name']) ? $_FILES['profile_pic']['name'] : "";
    $target_dir = "uploads/";
    $target_file = $profile_pic ? $target_dir . basename($profile_pic) : "";

    // Check if passwords match
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Move the uploaded file to the target directory if a file was uploaded
    if ($profile_pic && !move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
        die("Sorry, there was an error uploading your file.");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the data into the database
    $sql = "INSERT INTO users (name, email, password, profile_pic) VALUES ('$name', '$email', '$hashed_password', '$profile_pic')";
    
    if ($conn->query($sql) === TRUE) {
        echo 'home.html';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
