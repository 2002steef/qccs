<?php


$servername = "localhost"; 
$usernameData = "steef";
$passwordData = "Taxo18#56";
$DataBaseName = "userBase";

$mysqli = new mysqli($servername, $usernameData, $passwordData, $DataBaseName);

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}


?>