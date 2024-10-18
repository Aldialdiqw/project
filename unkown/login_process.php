<?php
// Include your database connection file
include 'dbconn.php';

session_start(); // Start a session to manage user login state

header('Content-Type: application/json'); // Set the response header to JSON

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and capture the form inputs
    $email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['Password'];

    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Return a JSON response for invalid email format
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid email format.'
        ]);
        exit();
    }

    // Prepare SQL query to fetch user info by email
    $stmt = $conn->prepare("SELECT Password FROM user WHERE Email = ?");
    $stmt->bind_param("s", $email); // 's' means string type for email
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        // Bind the result (the hashed password) to a variable
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify the entered password with the hashed password from the database
        if (password_verify($password, $hashed_password)) {
            // If the password matches, store email in session and send success response
            $_SESSION['email'] = $email; // Store email in session
            echo json_encode([
                'status' => 'success',
                'message' => 'Login successful!'
            ]);
            exit();
        } else {
            // Return a JSON response for invalid password
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid password.'
            ]);
        }
    } else {
        // Return a JSON response for no account found
        echo json_encode([
            'status' => 'error',
            'message' => 'No account found with this email.'
        ]);
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
