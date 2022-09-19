<?php

include "functions.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    global $mysqli;
    if (!isset($_POST['email'], $_POST['wachtwoord'])) {
        // Could not get the data that should have been sent.
        header("Location:../index.php?login=leeg");
    }
    if (isset($_POST['email'], $_POST['wachtwoord'])) {
       $_SESSION['email'] = $_POST['email'];
        if ($stmt = $mysqli->prepare('SELECT  `userName`, `Password`, `email` FROM `medewerkers` WHERE email = ?')) {
            // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
            $stmt->bind_param('s', $_POST['email']);
            $stmt->execute();
        
            // Store the result so we can check if the account exists in the database.
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($userName, $password, $email);
//            $stmt->bind_result($id, $password);
                $stmt->fetch();
                // Account exists, now we verify the password.
                // Note: remember to use password_hash in your registration file to store the hashed passwords.
//            if (password_verify($_POST['wachtwoord'], $password)) {
                if ($_POST['wachtwoord'] == $password) {
//                $row = $stmt->get_result();
                    // Verification success! User has logged-in!
                    // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                    session_regenerate_id();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['name'] = $_POST['email'];
                    $_SESSION['id'] = $id;
                    $_SESSION['status'] = "medewerker";
//            echo 'Welcome ' . $_SESSION['name'] . '!';
                    if (!empty($_POST["remember_me"])) {
                        setcookie("username", $_POST["email"], time() + 3600);
                        setcookie("password", $_POST["wachtwoord"], time() + 3600);
//                    echo $_COOKIE['username'];
//                    echo $_COOKIE['password'];
                        echo "Cookies Set Successfuly";
                    } else {
                        setcookie("username", "");
                        setcookie("password", "");
                        echo "Cookies Not Set";
                    }
                    // echo "Je bent ingelogd";
                    // if (!empty($googlecode)) {
                    //     header("Location: ../googlecode.php");
                    //     //header("Location: ../device_confirmations.php");

                    // } else {
                        if ($_SESSION['memb_of'] == 0) {
                            header("Location:../bedrijfs_klanten_overzicht.php?");
                        } else {
                            if (isset($_SESSION['auth']) && isset($_SESSION['memb_of'])) {
                                if ($_SESSION['auth'] == "Werknemer") {
                                    header("Location:../klanten_overzicht.php?custof=$memb_of&membof=$memb_of");
                                } else if ($_SESSION['auth'] == "Bedrijfsleider") {
                                    header("Location:../bedrijfs_klanten_overzicht.php?custof=$memb_of&membof=$memb_of");
                                }  else if ($_SESSION['auth'] == "user") {
                                    header("Location:../klant_overzicht.php?custof=$memb_of&membof=$memb_of");
                                }
                            }
                        }

                    // }
                } else {
                    // Incorrect password
//                $message = 'Je hebt geen geldige combinatie van email en wachtwoord';
                    header("Location:../index.php?login=foutecombi");
                }
            } else {
                // Incorrect username
//            $message = 'Je hebt geen geldige combinatie van email en wachtwoord';
                header("Location:../index.php?login=foutecombi");
            }
            $stmt->close();
        }
    }
}

