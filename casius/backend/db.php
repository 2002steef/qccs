<!-- database connectie -->

<?php
$servername = "localhost";
$username = "admin_casius";
$password = "9Y%k98sf3";
$db = "casius";

// Create connection
$mysqli = new mysqli("$servername", "$username", "$password", "$db");


// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
