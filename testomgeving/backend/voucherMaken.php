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
        // if ($mysqli->num_rows > 0) {
        //     echo ('<script>console.log("toegevoegd")</script>');
        // }
    }

    function getEmail()
    {
        $medewerkerID = $_SESSION["id"];
        $sql = "SELECT email FROM medewerkers where userID = $medewerkerID";
        global $mysqli;
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($rowMd = $result->fetch_array()) {
            return ($rowMd['email']);
        }
    }


    function voucherGebruiken()
    {
        $voucher = createRandomVoucher();
        InsertVoucher($voucher);
        // $email = 'steefertjappie@gmail.com';
        if ($email) {
            $to = $email;
            $subject = "Voucher code";
            $msg = "Uw voucher code is . $voucher ";
            $msg = wordwrap($msg, 70);
            $headers = "From: Admin@bma.nl";
            mail($to, $subject, $msg, $headers);
        } else {
            header($_SERVER['HTTP_REFERER'].'?noMail');
            
        }

        header("voucherGebruikt.php");
    }

    VoucherGebruiken();

    // mail('steefertjappie@gmail.com', 'voucher code', 'voucher is:code', 'From: Admin@qccs.nl');
