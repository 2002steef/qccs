<?php
include "backend/db.php";
echo('<script>console.log("test")</script>');
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
    if (isset($_POST['VoucherSturen'])) {
        $token = createRandomVoucher();
        $email = $_POST["KlantMail"];
        if ($email) {
            $to = $email;
            $subject = "Voucher code";
            $msg = "Uw voucher code is . $token ";
            $msg = wordwrap($msg, 70);
            $headers = "From: Josh@qccs.nl";
            mail($to, $subject, $msg, $headers);


            $stmt = $mysqli->prepare(
                "INSERT INTO `vouchers` (`userID`, `masseuseID`, `voucherCode`, `status`) VALUES (?, ?, ?, ?)"
            );
            $voucher = createRandomVoucher();
            $userID = 1;
            $masseuseID = 2;
            $stmt->bind_param("iisi", $userID, $masseuseID, $voucher, 1);
            $stmt->execute();
            if ($stmt->num_rows > 0) {
                echo "Code gemaakt en in database gezet";
            }


            // header('location:index.php');
        }
    }
}
