<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<?php

include('backend/functions.php');
	
include "partials/header.php";
	
$user = $_SESSION['name'];
$secret = $_SESSION['secret'];
$id = $_SESSION['id'];
require_once 'PHPGangsta/GoogleAuthenticator.php';
$ga = new PHPGangsta_GoogleAuthenticator();
?>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 1-column auth-page navbar-static layout-dark layout-transparent bg-glass-1 blank-page" data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
        <div class="main-panel">
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    <!--Lock Screen Starts-->
                    <section id="lock-screen" class="auth-height">
						<form name="reg" action="backend/auth.php" method="POST">
                        <div class="row full-height-vh m-0">
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <div class="card overflow-hidden">
                                    <div class="card-content">
                                        <div class="card-body auth-img">
                                            <div class="row m-0">
                                                <div class="col-lg-6 d-lg-flex justify-content-center align-items-center d-none text-center auth-img-bg p-3">
                                                    <img src="../../../app-assets/img/gallery/lock.png" alt="" class="img-fluid" height="230" width="310">
                                                </div>
                                                <div class="col-lg-6 col-md-12 py-3 px-4">
													<div class="form-group">
													
													<?php
                                                    if (isset($_GET["login"])){
                                                        if ($_GET["login"] == "fout"){
                                                            echo "<p class='text-danger'>Onjuiste code! </p>"; 
                                                        }
														 if ($_GET["login"] == "leeg"){
                                                            echo "<p class='text-danger'>Vul een code in ! </p>"; 
                                                        }
                                                    }
                                                    ?>
                           					 </div>
                                                    <h4 class="card-title mb-3">Vul uw google authenticatie code in</h4>
													<input type="hidden" name="secret" id="secret" value="<?php echo $secret; ?>" required>
                                                    <input type="text" name="code" class="form-control mb-2" placeholder="Password">
													<button name="btnValidate" type="submit" class="btn btn-block btn-primary mt-2">Unlock</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						</form>
                    </section>
                    <!--Lock Screen Ends-->
                </div>
            </div>
            <!-- END : End Main Content-->
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php
include "partials/footer.php";
?>
    <!-- END: Custom CSS-->
</body>
<!-- END : Body-->

</html>