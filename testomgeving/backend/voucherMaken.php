<?php

require('phpMailer/src/PHPMailer.php');

use PHPMailer\PHPMailer\PHPMailer;

include("functions.php");
// include("voucherPDF.php");
include("voucherPDF2.php");
function createRandomVoucher(
    int $length = 10,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces[] = $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}

function InsertVoucher($voucher)
{
    global $mysqli;
    $userID = $_SESSION["id"];
    $masseuseID = $_POST['modalMasseuseID'];
    $mysqli->query("INSERT INTO `vouchers` (`userID`, `masseuseID`, `voucherCode`, `status`) VALUES ('$userID', '$masseuseID', '$voucher', '1')");
}

function getEmail()
{
    $medewerkerID = $_SESSION["id"];
    $sql = "SELECT email FROM medewerkers where userID = $medewerkerID";
    global $mysqli;
    $result = $mysqli->query($sql);
    $rows = $result->fetch_assoc();
    return ($rows['email']);
    // return $result;
}


function voucherGebruiken()
{
    $voucher = createRandomVoucher();
    InsertVoucher($voucher);
    voucherPDF2($voucher);
    $email = getEmail();
    $bodytext = "<h1>testHeader</h1><br><p>testParagraaf</p>";
    $mail = new PHPMailer();
    $mail->SetFrom('bma@betaomgeving.nl');
    $mail->AddAddress($email);
    $mail->Subject = "Voucher code";
    $mail->isHTML(true);
    $mail->Body = $bodytext;
    $mail->AddAttachment("voucherpdf/user" . $_SESSION['id'] . "Voucher" . $voucher . ".pdf");
    $mail->send();
    // print_r($mail);
    header("location: ../voucherGebruikt.php");
}

voucherGebruiken();
    // Dit werkt
    // $testmsg = "bericht";
    // mail("steef.van.der.poel@gmail.com", "test", $testmsg);
