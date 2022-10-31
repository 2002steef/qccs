<?php
include "backend/functions.php";
include "partials/header.php";

?>
<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<?php

?>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body class="horizontal-layout horizontal-menu horizontal-menu-padding navbar-static 1-column auth-page navbar-static blank-page"
      data-bg-img="bg-glass-2" data-open="hover" data-menu="horizontal-menu">
<!-- ////////////////////////////////////////////////////////////////////////////-->
    <!-- BEGIN : Main Content-->
        <!--Forgot Password Starts-->
        <section id="forgot-password" class="auth-height">
            <div class="row full-height-vh m-0 d-flex align-items-center justify-content-center">
                <div class="col-md-7 col-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body auth-img">
                                <div class="row m-0">
                                    <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center text-center auth-img-bg py-2">
                                        <img src="assets/img/gallery/forgot.png" alt="" class="img-fluid" width="260"
                                             height="230">
                                    </div>
                                    <div class="col-lg-6 col-md-12 px-4 py-3">
                                        <h4 class="mb-2 card-title">Recover Password</h4>
                                        <p class="card-text mb-3">Please enter your email address and we'll send you
                                            instructions on how
                                            to reset your password.</p>
                                        <form method="post">
                                            <input name="email" type="email" class="form-control mb-3"
                                                   placeholder="Email">
                                            <div class="d-flex flex-sm-row flex-column justify-content-between">
                                                <a href="index.php" class="btn bg-light-primary mb-2 mb-sm-0">Back
                                                    To Login</a>
                                                <button class="btn btn-primary ml-sm-1" type="submit" name="subforgot">
                                                    Versturen
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Forgot Password Ends-->
    <?php
    include "partials/footer.php";
    ?>
    <!-- END : End Main Content-->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- END : Body-->
</body>
</html>