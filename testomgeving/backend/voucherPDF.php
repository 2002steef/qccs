<?php

use Dompdf\Dompdf;

require_once 'dompdf/autoload.inc.php';

function voucherPDF($voucher)
{
    require "pdfp/fpdf.php";
    $datum = date("d F Y");
    $fileNaam = "voucherpdf/user" . $_SESSION['id'] . "Voucher" . $voucher . ".pdf";

    $f = fopen($fileNaam, 'w+');
    fclose($f);
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(60, 20, 'je voucher is: ' . $voucher);
    $pdf->Output('F', $fileNaam);
}

function voucherPDF2($voucher)
{
    $dompdf = new Dompdf;
    $html = '<h1>dit is een header</h1>';
    $html .= '<p>dit is een paragraaf</p>';
    $dompdf->loadHtml($html);
    $dompdf->render();
    $dompdf->stream("voucherpdf/user" . $_SESSION['id'] . "Voucher" . $voucher . ".pdf", ["Attachment" => 0]);
    $customSize = array(0,0,360,360);
    $dompdf->setPaper($customSize);

}
