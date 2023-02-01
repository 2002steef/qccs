<!-- login functie -->
<?php
include "functions.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    global $mysqli;

	if(empty(trim($_POST["email"]))){
		$username_err = "Vul uw email in.";
	} else{
		$username = trim($_POST["email"]);
	}

	// Check if password is empty
	if(empty(trim($_POST["wachtwoord"]))){
		$password_err = "Vul uw wachtwoord in.";
	} else{
		$password = trim($_POST["wachtwoord"]);
	}

    if (empty($username_err) && empty($password_err)) {

        $_SESSION['email'] = $_POST['email'];
        if ($stmt = $mysqli->prepare('SELECT `user_ID`, `userName`, `password`, `email`,`rank` FROM `login` WHERE email = ?')) {
            // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
            $stmt->bind_param('s', $_POST['email']);
            $stmt->execute();

            // Store the result so we can check if the account exists in the database.
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $userName, $password, $email,$rank);
                $stmt->fetch();
                if ($_POST['wachtwoord'] == $password) {
                    session_regenerate_id();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['name'] = $username;
                    $_SESSION['id'] = $id;
                    $_SESSION['rank'] = $rank;
                    header("Location:../overzicht.php");
                }
                else {
                    // Incorrect password
                    header("Location:../index.php");
                }
            }
        }
    }
}
