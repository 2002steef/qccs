<?php

use Google\Service\AIPlatformNotebooks\Location;

include "functions.php";
// if (isset($_POST['VoucherVerzilveren'])) {
    $servername = "localhost";
    $username = "relatietest";
    $password = "Rb4x4y7*3";
    $db = "test_relatiebeheer";
    $voucher = $_POST["VoucherCodeVerzilveren"];
    $masseuseID = $_SESSION["id"];
    $mysqli = new mysqli("$servername", "$username", "$password", "$db");
    $result = $mysqli->query("SELECT * FROM vouchers WHERE masseuseID = '" . $masseuseID . "' && voucherCode = '" . $voucher . "'");
    if ($result->num_rows > 0) {
        $result2 = $mysqli->query("SELECT * FROM vouchers WHERE masseuseID = '" . $masseuseID . "' && voucherCode = '" . $voucher . "' && status = 1");
        if ($result2->num_rows > 0) {
        $mysqli->query("UPDATE vouchers SET status = 0 WHERE masseuseID = '" . $masseuseID . "' && voucherCode ='" . $voucher . "'");
        header("Location:../voucherVerzilveren.php?success");    
        } else {
            header("Location:../voucherVerzilveren.php?codeAlreadyUsed");
        }
        
    } else {
        header("Location:../voucherVerzilveren.php?codeError");
    }
// }

?>