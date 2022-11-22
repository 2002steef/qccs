<?php
include "functions.php";
require "pdfp/fpdf.php";
$datum = date("d F Y");
$fileNaam = "user" . $_SESSION['id'] . "Voucher.pdf";

$f = fopen($fileNaam, 'w+');
fclose($f);
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(60, 20, 'je voucher is:');
$pdf->Output('../vouchers/' . $fileNaam);
