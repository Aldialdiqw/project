<?php
require 'vendor/autoload.php';

use Smalot\PdfParser\Parser;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['PDF_file'])) {
    $file = $_FILES['PDF_file'];

    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Upload failed with error code " . $file['error']);
    }

    // Create a new PDF parser
    $parser = new Parser();
    
    // Parse the PDF file
    $pdf = $parser->parseFile($file['tmp_name']);

    // Extract text from the PDF
    $text = $pdf->getText();

    // Create a new Word document
    $phpWord = new PhpWord();
    $section = $phpWord->addSection();
    $section->addText($text);

    // Save the Word document
    $wordFileName = 'converted_file.docx';
    $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save($wordFileName);

    // Force download of the converted Word document
    header('Content-Description: File Transfer');
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Disposition: attachment; filename="' . basename($wordFileName) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($wordFileName));
    flush(); // Flush system output buffer
    readfile($wordFileName);

    // Clean up temporary files (if needed)
    // unlink($wordFileName); // Uncomment if you want to delete the file after download
} else {
    echo "No file uploaded.";
}
?>
