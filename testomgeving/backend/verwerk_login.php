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
        if ($stmtMw = $mysqli->prepare('SELECT userID, `userName`, `Password`, `email` FROM `medewerkers` WHERE email = ?')) {
            // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
            $stmtMw->bind_param('s', $_POST['email']);
            $stmtMw->execute();

            // Store the result so we can check if the account exists in the database.
            $stmtMw->store_result();

            if ($stmtMw->num_rows > 0) {
                $stmtMw->bind_result($id, $userName, $password, $email);
                //            $stmt->bind_result($id, $password);
                $stmtMw->fetch();
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
                    if ($_SESSION['status'] == "medewerker") {
                        header("Location:../medewerkers.php?");
                    }

                    // }
                } 
            } elseif ($stmtMw->num_rows == 0) {
                $stmtBd = $mysqli->prepare('SELECT `bedrijfID`, `userName`, `Password`, `email`  FROM `bedrijven` WHERE email = ?');
                $stmtBd->bind_param('s', $_POST['email']);
                $stmtBd->execute();
                $stmtBd->store_result();
                if ($stmtBd->num_rows > 0) {
                    $stmtBd->bind_result($id, $userName, $password, $email);
                    //            $stmt->bind_result($id, $password);
                    $stmtBd->fetch();
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
                        $_SESSION['status'] = "bedrijf";
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
                        if ($_SESSION['status'] == "bedrijf") {
                            header("Location:../bma_bedrijfs_klanten_overzicht.php?");
                        } 
                    }
                }
                elseif ($stmtMw && $stmtBd->num_rows == 0){
                    $stmtMs = $mysqli->prepare('SELECT `masseuseID`, `userName`, `Password`, `email`  FROM `masseuses` WHERE email = ?');
                    $stmtMs->bind_param('s', $_POST['email']);
                    $stmtMs->execute();
                    $stmtMs->store_result();
                    if ($stmtMs->num_rows > 0) {
                        $stmtMs->bind_result($id, $userName, $password, $email);
                        //            $stmt->bind_result($id, $password);
                        $stmtMs->fetch();
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
                            $_SESSION['status'] = "masseuse";
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
                            if ($_SESSION['status'] == "masseuse") {
                                header("Location:../masseuse_profiel.php?masseuseID=$id");
                            } 
                        }
                    }
                }
            }
            echo ("test");
            // else {
                // Incorrect password
                // header("Location:../index.php?login=foutecombi");
            // }
            $stmtMs->close();
        }
    }
}
