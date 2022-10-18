<?php
include"functions.php";

$checkResult="";
if($_POST['code']) {
//	$code = $con->real_escape_string($_POST['code']);
	$code = $_POST['code'];
	$user = $_SESSION['name'];
	$secret = $_POST['secret'];
//	$salt = '7WAO342QFANY6IKBF7L7SWEUU79WL3VMT920VB5NQMW';
//	$secret = $user.$salt;
	require_once '../PHPGangsta/GoogleAuthenticator.php';
	$ga = new PHPGangsta_GoogleAuthenticator();
//$checkResult = $g->verifyCode($secret, $code, 2);    // 2 = 2*30sec clock tolerance

//print "checkResult".$checkResult."<br/>";
//print "secret= ". $secret."<br>";
//print "code= ". $code."<br>";

	if (isset($_POST['btnValidate'])) {
		$code = $_POST['code'];

		if ($code == "") {
			header("Location:../googlecode.php?login=leeg");
		} else {
			if ($ga->verifyCode($secret, $code, 2)) {
				// success
				header("Location:../bedrijfs_overzicht.php");
			} else {
				// fail
				header("Location:../googlecode.php?login=fout");
			}
		}
	}
}
//if ($checkResult){
//	$_SESSION['googleCode']	= $code;
//	header("location: ../partials/Klanten.php");
//}
//else{
//	header("location: ../partials/device_confirmations.php");
//	echo "niet gelukt";
//}
//	exit;
//}

?>
