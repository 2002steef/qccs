<?php

require_once('phpMailer/src/PHPMailer.php');
use PHPMailer\PHPMailer\PHPMailer;

include("functions.php");
// include ("voucherPDF.php");
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
    // voucherPDF($voucher);
    $email = getEmail();
    $bodytext = "
    <h1>Dit is header in de mail body.</h1><br>
    <p>paragraaf</p>
    ";
    $mailing = new PHPMailer();
    $mailing->SetFrom('Admin@bma.nl');
    $mailing->Subject = "Voucher code";
    $mailing->Body = "testing";
    // $mailing->isHTML(true);
    $mailing->AddAddress($email);
    // $mailing->AddAttachment("../vouchers/user" . $_SESSION['id'] . "Voucher".$voucher.".pdf");
    $mailing->Send();
    header("location: ../voucherGebruikt.php");
}
$testmsg = "bericht";
mail("steef.van.der.poel@gmail.com", "test",$testmsg);
VoucherGebruiken();