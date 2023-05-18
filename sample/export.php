<?php
require 'dbcon.php';
require('./fpdf.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <title>Device Search View</title>
</head>
<body>



<?php
// Connect to the database
//$conn = mysqli_connect("localhost", "username", "password", "database");

if (isset($_POST['export_pdf'])) {
  // Export to PDF
  // Retrieve the data from the database
  $sql = "SELECT * FROM device";
  $result = mysqli_query($con, $sql);

  // Create a new PDF document
  $pdf = new FPDF();
  $pdf->AddPage();
  $pdf->SetFont('Arial','B',16);

  // Output the data to the PDF document
  while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(40,10,$row['sno']);
    $pdf->Cell(40,10,$row['name']);
    $pdf->Cell(40,10,$row['model']);
    $pdf->Cell(40,10,$row['assignedto']);
    $pdf->Cell(40,10,$row['department']);
    $pdf->Cell(40,10,$row['state']);
    $pdf->Cell(40,10,$row['tag']);
    $pdf->Ln();
  }

  // Output the PDF document to the browser
  $pdf->Output();
} 