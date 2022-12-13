<?php

function voucherPDF($voucher){
require "pdfp/fpdf.php";
$datum = date("d F Y");
$fileNaam = "voucherpdf/user" . $_SESSION['id'] . "Voucher".$voucher.".pdf";

$f = fopen($fileNaam, 'w+');
fclose($f);
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(60, 20, 'je voucher is: '.$voucher);
$pdf->Output('F', $fileNaam);
}