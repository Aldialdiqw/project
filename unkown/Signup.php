<?php
require_once "dbconn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Sign Up</title>
</head>
<body>
    <div class="main-container">
        <form id="signupForm"action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <h2 class="h">Sign Up</h2>
            
            <label for="Email">Email</label><br>
            <input type="email" name="Email" id="Email" required><br>
            
            <label for="Password">Password</label><br>
            <input type="password" name="Password" id="Password" required><br>
            <div class="radio-container">
            <label for="Male">Male</label>
<input type="radio" name="Gender" id="Male" value="Male" required>

<label for="Female">Female</label>
<input type="radio" name="Gender" id="Female" value="Female" required>

            </div>
            <button type="submit" class="login-button">Submit</button>
        </form>
    </div>

   
</body>
</html>
