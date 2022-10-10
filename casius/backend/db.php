<!-- database connectie -->

<?php
$servername = "localhost";
$username = "admin_casius";
$password = "9Y%k98sf3";
$db = "casius";

// Create connection
$con = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
