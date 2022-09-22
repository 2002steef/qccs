<?php
function createRandomVoucher()
{

    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
    srand((float)microtime() * 1000000);
    $i = 0;
    $voucher = '';

    while ($i <= 12) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $voucher = $voucher . $tmp;
        $i++;
    }

    return $voucher;
}


if (isset($_POST['VoucherSturen'])) {
   createRandomVoucher();
}

// $stmt = $mysqli->prepare("INSERT INTO `vouchers`(`userID`, `voucher`) VALUES ('1',?)");
// $voucher = createRandomVoucher();
// $stmt->bind_param("s", $voucher);
// $stmt->execute();
// if ($stmt->num_rows > 0) {
//     echo "Code gemaakt en in database gezet";
// }