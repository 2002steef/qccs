<?php

use Dompdf\Dompdf;

require_once 'dompdf/autoload.inc.php';

$dompdf = new Dompdf;
$html = '<h1>dit is een header</h1>';
$html .= '<p>dit is een paragraaf</p>';
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream("voucherpdf/user" . $_SESSION['id'] . "Voucher" . $voucher . ".pdf", ["Attachment" => 0]);
$customSize = array(0, 0, 360, 360);
$dompdf->setPaper($customSize);
