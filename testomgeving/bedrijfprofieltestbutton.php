<?php
include "backend/db.php";
    $id = $_GET['id'];
    $custof = $_GET['custof'];
    $membof = $_GET['membof'];
global $mysqli;

$stmt = $mysqli->prepare("DELETE FROM comments_business WHERE id = ?");

// Check if prepare() failed.
// prepare() can fail because of syntax errors, missing privileges, ....

if ( false === $stmt ) {
    error_log('mysqli prepare() failed: ');
    error_log( print_r( htmlspecialchars($stmt->error), true ) );

    // Since all the following operations need a valid/ready statement object
    // it doesn't make sense to go on
    exit();
}

// Bind the value to the statement

$bind = $stmt->bind_param('s', $id);

// Check if bind_param() failed.
// bind_param() can fail because the number of parameter doesn't match the placeholders
// in the statement, or there's a type conflict, or ....

if ( false === $bind ) {
    error_log('bind_param() failed:');
    error_log( print_r( htmlspecialchars($stmt->error), true ) );
    exit();
}

// Execute the query

$exec = $stmt->execute();

// Check if execute() failed.
// execute() can fail for various reasons. And may it be as stupid as someone tripping over the network cable

if ( false === $exec ) {
    error_log('mysqli execute() failed: ');
    error_log( print_r( htmlspecialchars($stmt->error), true ) );
}

// Close the prepared statement
header("Location:communicatie.php?custof=$custof&membof=$membof&m=1");

$stmt->close();

// Close connection

$mysqli->close();




?>