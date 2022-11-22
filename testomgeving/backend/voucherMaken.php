<?php
// session_start();

include("functions.php");
include "voucherPDF.php";
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
    return ($rows['email']);
    // return $result;
}


function voucherGebruiken()
{
    $voucher = createRandomVoucher();
    InsertVoucher($voucher);
    $email = getEmail();
    $to = $email;
    $subject = "Voucher code";
    $from = "Admin@bma.nl";
    // $msg = "Uw voucher code is . $voucher ";
    // $msg = wordwrap($msg, 70);

    $htmlContent = ' 
    <h3>PHP Email with Attachment by CodexWorld</h3> 
    <p>This email is sent from the PHP script with attachment.</p>';

    $headers = "From:".$from;
    $file = "vouchers/user" . $_SESSION['id'] . "Voucher.pdf";
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
        "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";

    if (!empty($file) > 0) {
        if (is_file($file)) {
            $message .= "--{$mime_boundary}\n";
            $fp =    @fopen($file, "rb");
            $data =  @fread($fp, filesize($file));

            @fclose($fp);
            $data = chunk_split(base64_encode($data));
            $message .= "Content-Type: application/octet-stream; name=\"" . basename($file) . "\"\n" .
                "Content-Description: " . basename($file) . "\n" .
                "Content-Disposition: attachment;\n" . " filename=\"" . basename($file) . "\"; size=" . filesize($file) . ";\n" .
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        }
    }
    $message .= "--{$mime_boundary}--";
    $returnpath = "-f" . $from;


    
    // echo($to. " " .$subject. " " . $msg. " " . $headers);
    mail($to, $subject, $message, $headers, $returnpath);
    header("location: ../voucherGebruikt.php");
}

VoucherGebruiken();

// getEmail();

    // mail('steefertjappie@gmail.com', 'voucher code', 'voucher is:code', 'From: Admin@qccs.nl');
