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
}
function GetMasseuseInfo()
{
    global $mysqli;
    $sql = "SELECT * FROM masseuses";
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($rowMs = $result->fetch_array()) { ?>
        <option value="<?= $rowMs["masseuseID"] ?>"><?= $rowMs["voornaam"] ?></option>
        <?php
    }
}
function GetUserInfo()
{
    global $mysqli;
    $sql = "SELECT * FROM medewerkers where userID";
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($rowMd = $result->fetch_array()) { ?>
        <option value="<?= $rowMd["userID"] ?>"><?= $rowMd["voornaam"] ?></option>
        <?php
    }
}
function InsertVoucher($voucher)
{
    // $servername = "localhost";
    // $username = "relatietest";
    // $password = "Rb4x4y7*3";
    // $db = "test_relatiebeheer";
    $userID = $_POST['medewerker'];
    $masseuseID = $_POST['masseuse'];
    $mysqli = new mysqli("$servername", "$username", "$password", "$db");
    $mysqli->query("INSERT INTO `vouchers` (`userID`, `masseuseID`, `voucherCode`, `status`) VALUES ('$userID', '$masseuseID', '$voucher', '1')");
    if ($mysqli->num_rows > 0) {
        echo "Toegevoegd";
    }
}

if (isset($_POST['VoucherSturen'])) {
    $email = $_POST["KlantMail"];
    $voucher = createRandomVoucher();
    InsertVoucher($voucher);
    if ($email) {
        $to = $email;
        $subject = "Voucher code";
        $msg = "Uw voucher code is . $voucher ";
        $msg = wordwrap($msg, 70);
        $headers = "From: Admin@bma.nl";
        mail($to, $subject, $msg, $headers);
        // header('location:index.php');
    }
}

if (isset($_POST['VoucherVerzilveren'])) {
    $voucher = $_POST["voucherCode"];
    $masseuseID = $_POST['masseuse'];
    $mysqli = new mysqli("$servername", "$username", "$password", "$db");
    $mysqli->query('SELECT * FROM VOUCHERS WHERE masseuseID = '.$masseuseID.' && voucherCode ='.$voucher);
    if ($mysqli->num_rows > 0) {
        $mysqli->query("UPDATE 'voucher' SET status = 0 WHERE masseuseID = ".$masseuseID." && voucherCode =".$voucher);
    }
}
