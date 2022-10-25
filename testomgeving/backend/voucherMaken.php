<?php

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
    $userID = "3";
    $masseuseID = "1";
    $mysqli = new mysqli("$servername", "$username", "$password", "$db");
    $mysqli->query("INSERT INTO `vouchers` (`userID`, `masseuseID`, `voucherCode`, `status`) VALUES ('$userID', '$masseuseID', '$voucher', '1')");
    if ($mysqli->num_rows > 0) {
        echo "Toegevoegd";
    }
}

if (isset($_POST['acceptTermsVoucher'])) {
    $servername = "localhost";
    $username = "relatietest";
    $password = "Rb4x4y7*3";
    $db = "test_relatiebeheer";
    $mysqli = new mysqli("$servername", "$username", "$password", "$db");
    $medewerkerID = $_SESSION["id"];
    // $sql = "SELECT email FROM medewerkers where userID = $medewerkerID";
    $sql = "SELECT email FROM medewerkers where userID = 3";
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $email = $stmt->get_result();
    $voucher = createRandomVoucher();
    InsertVoucher($voucher);
    if ($email) {
        $to = $email;
        $subject = "Voucher code";
        $msg = "Uw voucher code is . $voucher ";
        $msg = wordwrap($msg, 70);
        $headers = "From: Admin@bma.nl";
        mail('steefertjappie@gmail.com', $subject, $msg, $headers);
        // header('location:index.php');
    }
}