<?php
$servername = "localhost";
$username = "relatietest";
$password = "Rb4x4y7*3";
$db = "test_relatiebeheer";

// Create connection
$mysqli = new mysqli("$servername", "$username", "$password", "$db");
$con = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

function getSQLConnect()
{
    return $mysqli;
}