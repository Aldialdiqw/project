<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="loginstyle.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"   
 rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>   

  <title>Log In</title>
</head>
<body>

  <canvas id="meteorCanvas"></canvas>
  <div class="main-container">
    <form id="myForm" action="login_process.php" method="POST">
      <h2 class="h">Log In</h2>
      <label for="Email">Email</label><br>
      <input type="email" name="Email" id="Email" required><br>
      <label for="Password">Password</label><br>
      <input type="password"   
 name="Password" id="Password" required><br>
      <button type="submit" class="login-button">Submit</button>   

    </form>
  </div>

  <script src="starfield.js"></script>  </body>







































<script>
    document.getElementById("myForm").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Get the current scroll position
        var currentScrollPosition = window.pageYOffset;

        // Create a new FormData object to get the form data
        var formData = new FormData(this);

       
        fetch('login_process.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Show the SweetAlert with a blurred background
            Swal.fire({
                title: data.status === 'success' ? 'Sukses' : 'Gabim',
                text: data.message,
                icon: data.status === 'success' ? 'success' : 'error',
                backdrop: true // Enable the default backdrop; CSS will add the blur effect
            }).then(() => {
                // Restore the scroll position
                window.scrollTo(0, currentScrollPosition);

                // If the login was successful, redirect to the dashboard
                if (data.status === 'success') {
                    window.location.href = 'index1.php';
                }
            });
        })
        .catch(error => {
            // Handle the error and restore the scroll position
            Swal.fire({
                title: 'Gabim',
                text: 'Ndodhi një gabim i papritur.',
                icon: 'error',
                backdrop: true // Same blurred background for error case
            }).then(() => {
                window.scrollTo(0, currentScrollPosition);
            });
            console.error('Error:', error);
        });
    });
</script>

</body>
</html>
