<!-- login functie -->
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
        if ($stmt = $mysqli->prepare('SELECT `user_ID`, `userName`, `password`, `email` FROM `login` WHERE email = ?')) {
            // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
            $stmt->bind_param('s', $_POST['email']);
            $stmt->execute();

            // Store the result so we can check if the account exists in the database.
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $userName, $password, $email);
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
                    $_SESSION['name'] = $username;
                    $_SESSION['id'] = $id;
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
                    header("Location:../overzicht.php");
                } 
            }
            elseif($stmt->num_rows < 1 ) {
                    // Incorrect password
                    header("Location:../index.php?login=foutecombi");
                }
            $stmt->close();
        }
    }
}
