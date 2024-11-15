<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="homestyles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <title>Word to PDF Converter</title>
</head>

<body>
  <nav>
    <a href="index1.php">Word-PDF</a>
    <a href="index2.php">PDF-Word</a>
  </nav>

  <div class="container">
    <h1>Convert Your Word Files to PDF</h1>
    <div class="file-container">
      <i class="fa-solid fa-file-word"></i>
      <form id="convertForm" action="convert.php" method="post" enctype="multipart/form-data">
        <label class="custom-file-upload">
          <input type="file" id="word_file" name="word_file" accept=".docx,.docm" required />
          Choose File
        </label>
        <button class="button-file" type="submit">Convert Now</button>
      </form>
      <div id="fileSelected" class="file-selected" style="display: none;">
        <p>A file has been selected.</p>
      </div>
    </div>
  </div>

  <p style="margin-left:10%">Easily convert your Word documents (.docx, .docm) to high-quality PDFs with our free online converter. It's fast, secure, and requires no registration.</p>

<script>// Get the file input element
const fileInput = document.getElementById('word_file');

// Add an event listener to listen for file selection
fileInput.addEventListener('change', function(event) {
  // Check if a file is selected
  if (event.target.files.length > 0) {
    // Show the "file selected" message
    document.getElementById('fileSelected').style.display = 'block';
  } else {
    // Hide the message if no file is selected
    document.getElementById('fileSelected').style.display = 'none';
  }
});
</script>

</body>

</html>