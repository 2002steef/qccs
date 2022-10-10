<!-- Login pagina -->
<?php
include "partials/header.php";
include "backend/fnctLogin.php";


?>

<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 1-column auth-page blank-page" data-menu="vertical-menu" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
        <div class="main-panel">
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    <!--Login Page Starts-->
                    <form method="post" action="backend/fnctLogin.php">
                        <section id="login" class="auth-height">
                            <div class="row full-height-vh m-0">
                                <div class="col-12 d-flex align-items-center justify-content-center">
                                    <div class="card overflow-hidden">
                                        <div class="card-content">
                                            <div class="card-body auth-img">
                                                <div class="row m-0">
                                                    <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center auth-img-bg p-3">
                                                        <img src="app-assets/img/logo_qccs.png" alt="qccs logo" class="img-fluid" width="300" height="230">
                                                    </div>
                                                    <div class="col-lg-6 col-12 px-4 py-3">
                                                        <h4 class="mb-2 card-title">Login</h4>
                                                        <p>Welkom terug Jerry, Log in AUB</p>
                                                        <input type="text" name="email" class="form-control mb-3" placeholder="Username">
                                                        <input type="password" name="wachtwoord" class="form-control mb-2" placeholder="Password">
                                                        <div class="d-sm-flex justify-content-between mb-3 font-small-2">
                                                            <div class="remember-me mb-2 mb-sm-0">
                                                                <div class="checkbox auth-checkbox">
                                                                    <input type="checkbox" id="auth-ligin">
                                                                    <label for="auth-ligin"><span>Remember Me</span></label>
                                                                </div>
                                                            </div>
                                                            <a href="auth-forgot-password.html">Wachtwoord Vergeten?</a>
                                                        </div>
                                                        <div class="d-flex justify-content-between flex-sm-row flex-column">
                                                            <button name="login" type="submit" class="btn btn-outline-light-grey">Inloggen</button>
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
                </div>
            </div>
            <!-- END : End Main Content-->
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <?php
    include "partials/footer.php";
    ?>
</body>
<!-- END : Body-->

</html>