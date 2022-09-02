<?php


$servername = "localhost:3306"; 
$usernameData = "Admin";
$passwordData = "Zs4cn*710";
$DataBaseName = "userBase";

$mysqli = new mysqli($servername, $usernameData, $passwordData, $DataBaseName);

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}


?>