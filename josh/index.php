<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->
	
<?php	
	
require_once "redirect.php";

include "partials/header.php";		
	
?>
<!-- END : Head-->
<!-- BEGIN : Body-->

<body class="horizontal-layout horizontal-menu horizontal-menu-padding navbar-static 1-column auth-page navbar-static layout-dark layout-transparent bg-glass-2 blank-page" data-bg-img="bg-glass-2" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
        <div class="main-panel">
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    <!--Login Page Starts-->
                    <form method="post" action="backend/verwerk_login.php" >
                    <section id="login" class="auth-height">
                        <div class="row full-height-vh m-0">
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <div class="card overflow-hidden">
                                    <div class="card-content">
                                        <div class="card-body auth-img">
                                            <div class="row m-0">
                                                <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center auth-img-bg p-3">
                                                    <img src="assets/img/logo2.png" alt="" class="img-fluid" width="300" height="230">
                                                </div>
                                                <div class="col-lg-6 col-12 px-4 py-3">
                                                    <h4 class="mb-2 card-title">Login</h4>
													<?php
                                                    if (isset($_GET["login"])){
                                                        if ($_GET["login"] == "foutecombi"){
                                                            echo "<p class='text-danger'>Je hebt geen geldige combinatie van email en wachtwoord ! </p>";
                                                        }
														if ($_GET["login"] == "leeg"){
                                                            echo "<p class='text-danger'>Vul alle velden in ! </p>";
                                                        }
                                                    }
                                                    ?>
                                                    <p>Welkom terug, log in om verder te gaan.</p>
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
                                                        <button name="login" type="submit" class="btn btn-primary">Inloggen</button>
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h6 class="text-primary m-0">Of Log In Met</h6>
                                                        <div class="login-options">
                                                            <?= "<a class='btn btn-sm btn-social-icon btn-facebook mr-1' href='" . $client->createAuthUrl() . "'><span class='fa fa-google'></span></a>"; ?>
                                                        </div>
                                                    </div>
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
                </div>
            </div>
            <!-- END : End Main Content-->
        </div>
    </div>
</body>
<!-- END : Body-->
</html>