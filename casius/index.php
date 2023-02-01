<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->
	
<?php
session_start();
include "partials/header.php";
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: overzicht.php");
    exit();
}
 
include "functions.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    global $mysqli;
    if (!isset($_POST['email'], $_POST['wachtwoord'])) {
        // Could not get the data that should have been sent.
       $errMsg = "Vul iets in !";
    }
    if (isset($_POST['email'], $_POST['wachtwoord'])) {
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

            }
			else {
				// Incorrect password

			$errMsg = "Onjuiste gebruikersnaam of wachtwoord !";
			}
        }
    }
}
?>
<!-- END : Head-->
<!-- BEGIN : Body-->

<body class="horizontal-layout horizontal-menu horizontal-menu-padding navbar-static 1-column auth-page navbar-static" data-bg-img="bg-glass-2" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">            <!-- BEGIN : Main Content-->
                    <!--Login Page Starts-->
                    <form method="post" action="" >
                    <section id="login" class="auth-height">
                        <div class="row full-height-vh m-0">
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <div class="card overflow-hidden">
                                    <div class="card-content">
                                        <div class="card-body auth-img">
                                            <div class="row m-0">
                                                <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center auth-img-bg p-3">
                                                    <img src="app-assets/img/logo_qccs.png" alt="" class="img-fluid" width="300" height="230">
                                                </div>
                                                <div class="col-lg-6 col-12 px-4 py-3">
                                                    <h4 class="mb-2 card-title">Login</h4>
													<?php
                                                        if(!empty($errMsg)){
                                                         echo '<div class="alert alert-danger">' . $errMsg . '</div>';
                                                        }
													?>
                                                    <p>Welkom terug Jerry, log in om verder te gaan.</p>
                                                    <input type="text" name="email" class="form-control mb-3" placeholder="E-mail" value="<?php if (isset($_SESSION['email'])){echo $_SESSION['email'];} ?>">
                                                    <input type="password" name="wachtwoord" class="form-control mb-2" placeholder="Wachtwoord">
                                                    <div class="d-sm-flex justify-content-between mb-3 font-small-2">
                                                        <div class="remember-me mb-2 mb-sm-0">
                                                            <div class="checkbox auth-checkbox">
                                                                <input type="checkbox" id="auth-ligin" name="remember_me">
                                                                <label for="auth-ligin"><span>Onthoud Mij</span></label>
                                                            </div>
                                                        </div>
                                                        <a href="wachtwoord_vergeten.php">Wachtwoord vergeten?</a>
                                                    </div>
                                                    <div class="d-flex justify-content-between flex-sm-row flex-column">
                                                        <button name="login" type="submit" class="btn btn-outline-light-gray">Inloggen</button>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    </form>
                    <!--Login Page Ends-->
            <!-- END : End Main Content-->
            </div>
</body>
<!-- END : Body-->
</html>