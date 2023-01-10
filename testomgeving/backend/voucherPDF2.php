<?php

use Dompdf\Dompdf;

require_once 'dompdf/autoload.inc.php';

function voucherPDF2($voucher)
{
    // $filename = "voucherpdf/user" . $_SESSION['id'] . "Voucher" . $voucher . ".pdf";
    // $f = fopen($filename, 'w+');
    // fclose($f);

    $dompdf = new Dompdf;
    $html = '<h1>dit is een header</h1>';
    $html .= '<p>dit is een paragraaf</p>';
    $dompdf->loadHtml($html);

    $customSize = array(0, 0, 36, 360);
    $dompdf->setPaper($customSize);
    
    $dompdf->render();
    // $dompdf->stream("voucherpdf/user" . $_SESSION['id'] . "Voucher" . $voucher . ".pdf", ["Attachment" => 0]);
    
    $output = $dompdf->output();
    file_put_contents("voucherpdf/user" . $_SESSION['id'] . "Voucher" . $voucher . ".pdf", $output);
}
