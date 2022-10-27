<?php
// session_start();

include("functions.php");

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
    $servername = "localhost";
    $username = "relatietest";
    $password = "Rb4x4y7*3";
    $db = "test_relatiebeheer";
    $userID = $_SESSION["id"];
    $masseuseID = $_POST['modalMasseuseID'];
    $mysqli = new mysqli("$servername", "$username", "$password", "$db");
    $mysqli->query("INSERT INTO `vouchers` (`userID`, `masseuseID`, `voucherCode`, `status`) VALUES ('$userID', '$masseuseID', '$voucher', '1')");
}

function getEmail()
{
    $medewerkerID = $_SESSION["id"];
    $sql = "SELECT email FROM medewerkers where userID = $medewerkerID";
    global $mysqli;
    $result = $mysqli->query($sql);
    $rows = $result->fetch_assoc();
    return($rows['email']);
    // return $result;
}


function voucherGebruiken()
{
    $voucher = createRandomVoucher();
    InsertVoucher($voucher);
    $email = getEmail();
    $to = $email;
    $subject = "Voucher code";
    $msg = "Uw voucher code is . $voucher ";
    $msg = wordwrap($msg, 70);
    $headers = "From: Admin@bma.nl";
    echo($to. " " .$subject. " " . $msg. " " . $headers);
    // mail($to, $subject, $msg, $headers);
    // header("location: ../voucherGebruikt.php");
}

// VoucherGebruiken();

// getEmail();

    // mail('steefertjappie@gmail.com', 'voucher code', 'voucher is:code', 'From: Admin@qccs.nl');
