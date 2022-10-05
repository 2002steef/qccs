<?php
include "db.php";
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
    // $stmt->bind_param("s", $voucher);
    // $stmt->execute();
    // if ($stmt->num_rows > 0) {
        // echo "Code gemaakt en in database gezet";
    // }
}

function InsertVoucher(){
    $servername = "localhost";
    $username = "relatietest";
    $password = "Rb4x4y7*3";
    $db = "test_relatiebeheer";
    $mysqli = new mysqli("$servername", "$username", "$password", "$db");
    $voucher = createRandomVoucher();
    $mysqli->query("INSERT INTO `vouchers` (`userID`, `masseuseID`, `voucherCode`, `status`) VALUES ('1', '1', '$voucher', '1')");
    if($mysqli->num_rows > 0){
        echo "Toegevoegd";
    }
}

if (isset($_POST['VoucherSturen'])) {
    $token = InsertVOucher($voucher);
    $email = $_POST["KlantMail"];
    if ($email) {
        $to = $email;
        $subject = "Voucher code";
        $msg = "Uw voucher code is . $token ";
        $msg = wordwrap($msg, 70);
        $headers = "From: Josh@qccs.nl";
        mail($to, $subject, $msg, $headers);
        // header('location:index.php');
    }
}
