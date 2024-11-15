<?php
require 'vendor/autoload.php';

use PhpOffice\PhpWord\IOFactory;
use Dompdf\Dompdf;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['word_file'])) {
    $file = $_FILES['word_file'];

    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Upload failed with error code " . $file['error']);
    }

    // Load the Word file
    $phpWord = IOFactory::load($file['tmp_name']);
    
    // Save the Word document to HTML format
    $htmlWriter = IOFactory::createWriter($phpWord, 'HTML');
    $tempHtmlFile = tempnam(sys_get_temp_dir(), 'temp_html');
    $htmlWriter->save($tempHtmlFile);
    
    // Load the HTML file into Dompdf
    $dompdf = new Dompdf();
    $dompdf->loadHtml(file_get_contents($tempHtmlFile));
    
    // Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');
    
    // Render the HTML as PDF
    $dompdf->render();
    
    // Output the generated PDF
    $pdfFileName = 'converted_file.pdf';
    $dompdf->stream($pdfFileName, array("Attachment" => true));

    // Clean up temporary files
    unlink($tempHtmlFile);
} else {
    echo "No file uploaded.";
}
?>
