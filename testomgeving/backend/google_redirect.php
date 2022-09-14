<?php
session_start();
require 'db.php';
require 'google_config.php';


if(isset($_GET['code'])){
    $toke = $client->fetchAccessTokenWithAuthCode($_GET['code']);
} else {
    header('location: https://relatiebeheer.qccstest.nl');
    exit();
}
$auth = new Google_Service_Oauth2($client);
$userdata = $auth->userinfo_v2_me->get();

$email = $userdata['email'];

 function googlelogin($mail){
     global $mysqli;
     $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
     $stmt->bind_param(s,$mail);
     $stmt->execute();
     $stmt->store_result();
     if($stmt->num_rows > 0 ){
         header("location:https://relatiebeheer.qccstest.nl/bedrijfs_overzicht.php");
     } else {
        die('account not found');
     }
 }
googlelogin($email);