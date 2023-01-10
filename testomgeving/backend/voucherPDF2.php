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
    $dompdf->render();
    // $dompdf->stream("voucherpdf/user" . $_SESSION['id'] . "Voucher" . $voucher . ".pdf", ["Attachment" => 0]);
    $dompdf->setPaper("a6", "landscape");
    $output = $dompdf->output();
    file_put_contents("voucherpdf/user" . $_SESSION['id'] . "Voucher" . $voucher . ".pdf", $output);
}
