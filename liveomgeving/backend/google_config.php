<?php
session_start();
require_once 'vendor/autoload.php';


$clientID = '251278270783-0eplibo05c6erf1qm2bbb2hl6h618o2p.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'https://relatiebeheer.qccstest.nl/google_redirect.php';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

$login_url = $client->createAuthUrl();
