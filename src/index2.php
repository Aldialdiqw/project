<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PDFstyles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>PDF to Word Converter</title>
</head>

<body>
    <nav>
        <a href="index1.php">Word-PDF</a>
        <a href="index2.php">PDF-Word</a>
    </nav>

    <div class="container">
    <h1>Convert Your PDF Files to Word</h1> 
    <div class="file-container">
    <i class="fa-solid fa-file-pdf"></i>
        <form id="convertForm" action="convertword.php" method="post" enctype="multipart/form-data">
            <label class="custom-file-upload">
                <input type="file" id="PDF_file" name="PDF_file" accept=".pdf" required />
                Choose File
            </label>
            <button class="button-file" type="submit">Convert Now</button>
        </form>
        <div id="fileSelected" class="file-selected" style="display: none;">
        <p>A file has been selected.</p>
      </div>
    </div>
</div>

<p style="margin-left:13%">Easily convert your PDF documents (.pdf) to high-quality Words with our free online converter. It's fast, secure, and requires no registration.</p>

<script>
const fileInput = document.getElementById('PDF_file');


fileInput.addEventListener('change', function(event) {

  if (event.target.files.length > 0) {

    document.getElementById('fileSelected').style.display = 'block';
  } else {
 
    document.getElementById('fileSelected').style.display = 'none';
  }
});
</script>
</body>

</html>
