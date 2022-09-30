<?php

function createRandomVoucher(
    int $length = 18,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}




// $stmt = $mysqli->prepare("INSERT INTO `vouchers`(`userID`, `voucher`) VALUES ('1',?)");
// $voucher = createRandomVoucher();
// $stmt->bind_param("s", $voucher);
// $stmt->execute();
// if ($stmt->num_rows > 0) {
//     echo "Code gemaakt en in database gezet";
// }
