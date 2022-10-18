<?php
include "backend/functions.php";
include "google/vendor/autoload.php";
//google connect gegevens
$clientID = '591697308405-egi2n151rhfm0i6ovcjnagsf50v413f3.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'https://program.betaomgeving.nl/testomgeving/redirect.php';

// init configuration
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow

if (isset($_GET['code'])) {

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

// get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email = $google_account_info->email;
    $name = $google_account_info->name;
    session_regenerate_id();
    $_SESSION['loggedin'] = true;
    global $mysqli;

    $sql = "SELECT * FROM `users` WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $rows = $stmt->get_result();
    if ($resultData = $rows->fetch_assoc() ) {

        $_SESSION['id'] = $resultData["id"];
        $_SESSION['name'] = $resultData["name"];
        $_SESSION['rank'] = $resultData["rank"];
        $memb_of = $resultData["member_of"];
		$_SESSION["memb_of"] = $memb_of;
		$stmt->close();
        $sql = "SELECT `googlecode` FROM `users` WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $_SESSION['id']);
        $stmt->execute();

        if ($result = $stmt->affected_rows > 0){
            header("Location:googlecode.php");
        }else{
            if (isset($memb_of)){
                header("Location:bedrijfs_klanten_overzicht.php?custof=$memb_of&membof=$memb_of");
            }else
            {
                header("Location:bedrijfs_overzicht.php");
            }
        }
    }elseif (!$resultData = $rows->fetch_assoc()) {
        echo $email;
        $stmt->close();
        $sqlInsert = "INSERT INTO `users`(`id`, `username`, `name`, `email`,`member_of`)
VALUES ('',?,?,?,'Werkenemer')";
        $stmt = $mysqli->prepare($sqlInsert);
        $stmt->bind_param("sss", $name, $name, $email);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            $sql2 = "SELECT * FROM `users` WHERE email = ?";
            $stmt = $mysqli->prepare($sql2);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $resultData2 = $result->fetch_assoc();
            $_SESSION['id'] = $resultData2["id"];
            $_SESSION['name'] = $resultData2["name"];
        }

        header("Location:bedrijfs_overzicht.php");
        exit();
    }
}