<?php
$servername = "localhost";
$username = "Live_testDB";
$password = "8iK#584gg";
$db = "live_database";

// Create connection
$mysqli = new mysqli("$servername", "$username", "$password", "$db");
$con = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}