<?php

include 'dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['Password'];
    $gender = $_POST['Gender'];

   
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

   
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO user (Email, Password, Gender) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $hashed_password, $gender);

   
    if ($stmt->execute()) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

   
    $stmt->close();
    $conn->close();
}
?>
