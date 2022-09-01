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

    $username = validate($_POST['username']);

    $password = validate($_POST['password']);

    if (empty($username)) {

            // echo ('<script>alert("gebruikernaam is leeg")</script>');
            // echo('<script>localStorage.setItem("loginAlert", "gebruikersnaam is leeg")</script>;');
        header("Location:login.php?loginError1");

        exit();
    } else if (empty($password)) {

        // echo ('<script>alert("wachtwoord is leeg")</script>');
        // echo('<script>localStorage.setItem("loginAlert", "wachtwoord is leeg")</script>;');
        header("Location:login.php?loginError2");

        exit();
    } else {

        // Perform query
        if ($result = $mysqli->query("SELECT * FROM users WHERE userName='$username' AND Password='$password'")) {
            if ($result->num_rows === 1) {
                header("Location: home.php?loginSuccess");
            } else {
                header("Location:login.php?loginError3");
                exit();
            }
            // Free result set
            $result->free_result();
        }

        exit();
    }
}

exit();
