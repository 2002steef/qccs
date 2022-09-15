<?php
include "functions.php";
$token = $_GET["token"];
?>
<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<?php
include "partials/header.php";
?>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body class="horizontal-layout horizontal-menu horizontal-menu-padding navbar-static 1-column auth-page navbar-static layout-dark layout-transparent bg-glass-2 blank-page"
      data-bg-img="bg-glass-2" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="wrapper">
    <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <!--Lock Screen Starts-->
                <section id="lock-screen" class="auth-height">
                    <div class="row full-height-vh m-0">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="card overflow-hidden">
                                <div class="card-content">
                                    <div class="card-body auth-img">
                                        <div class="row m-0">
                                            <div class="col-lg-6 d-lg-flex justify-content-center align-items-center d-none text-center auth-img-bg p-3">
                                                <img src="../assets/logo2.png" alt="" class="img-fluid"
                                                     height="230" width="310">
                                            </div>
                                            <div class="col-lg-6 col-md-12 px-4 py-3">
                                                <h4 class="mb-2 card-title">New Password</h4>
                                                <p class="card-text mb-3">Please enter your new password</p>
                                                <form method="post" action="wachtwoord_new.php">
                                                    <input name="token" type="hidden" value="<?= $token ?>">
                                                    <input name="wachtwoord" type="password" class="form-control mb-3"
                                                           placeholder="Password">
                                                    <input name="wachtwoord_herhaal" type="password"
                                                           class="form-control mb-3" placeholder="Confirm password">
                                                    <div class="d-flex flex-sm-row flex-column justify-content-between">
                                                        <a href="https://relatiebeheer.qccstest.nl/backend/wachtwoord_vergeten.php"
                                                           class="btn bg-light-primary mb-2 mb-sm-0">Back To Login</a>
                                                        <button type='submit' name="wachtwoord_veranderen"
                                                                class="btn btn-primary ml-sm-1">Change
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- BEGIN VENDOR JS-->
<script src="../app-assets/vendors/js/vendors.min.js"></script>
<script src="../app-assets/vendors/js/switchery.min.js"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN APEX JS-->
<script src="../app-assets/js/core/app-menu.js"></script>
<script src="../app-assets/js/core/app.js"></script>
<script src="../app-assets/js/notification-sidebar.js"></script>
<script src="../app-assets/js/customizer.js"></script>
<script src="../app-assets/js/scroll-top.js"></script>
<!-- END APEX JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
<!-- BEGIN: Custom CSS-->
<script src="../assets2/js/scripts.js"></script>
<!-- END: Custom CSS-->
</body>
<!-- END : Body-->

</html>