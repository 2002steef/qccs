<?php

session_start();

include "dataBaseConnection.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data)
    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }

    $email = validate(($_POST['email']));

    $username = validate($_POST['username']);

    $password = validate($_POST['password']);

    $passwordCheck = validate($_POST['passwordCheck']);

    if (empty($email)) {
        // test for empty email input
        header("Location:register.php?registerError1");
    } else if (empty($username)) {
        // test for empty username input
        header("Location:register.php?registerError2");
    } else if ($result = $mysqli->query("SELECT * FROM users WHERE userName='$username'")) {
        // test for username already exists
        if ($result->num_rows >= 1) {
            header("Location:register.php?registerError3");
        }
    } else if (empty($password)) {
        // test for empty password input
        header("Location:register.php?registerError4");
    } else if (empty($passwordCheck)) {
        // test empty password check input
        header("Location:register.php?registerError5");
    } else if ($password !== $passwordCheck) {
        // test if password = password check/repeat
        header("Location:register.php?registerError6");
    } else {

        if ($result = $mysqli->query(
            "INSERT INTO `users` (`userID`, `userName`, `Password`, `fullName`)
            VALUES ('$username', '$password', '$email');"
        )) {
            if ($result->num_rows === 1) {
            } else {
                header("Location:login.php?registerError3");
                exit();
            }
            // Free result set
            $result->free_result();
        }

        exit();
    }
}

exit();
