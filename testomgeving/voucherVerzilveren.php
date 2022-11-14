<?php
include "backend/functions.php";
// $masseuse = GetMasseuse();
?>

<!DOCTYPE html>
<html class="loading" lang="en">
<?php
include "partials/header.php";
?>
<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu navbar-static" data-bg-img="bg-glass-1" data-menu="vertical-menu">
    <?php
    include "partials/navbar.php";
    ?>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
        <div class="main-panel">
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    <!-- <div class="row">
                        <div class="col-12">
                            <div class="content-header">Buttons</div>
                        </div>
                    </div> -->
                    <!-- Block level buttons start -->
                    <section id="block-level-buttons">
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Voucher verzilveren</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <!-- <p>vul in</p> -->

                                            <div class="row">
                                                <!-- block button -->

                                                <form action="backend/voucherVerzilverenBackend.php" method="POST">
                                                    <div class="form-group mb-2 mb-md-0">
                                                        <label class="label_txt">Vul hier de Vouchercode in:</label>
                                                        <input type="text" name="VoucherCodeVerzilveren" class="form-control">
                                                    </div>
                                                    <div class="col-12 mb-2 mb-md-0">
                                                        <button type="submit" class="btn btn-outline-primary btn-block" name="VoucherVerzilveren">verzilver Voucher</button>
                                                    </div>
                                                </form>
                                                

                                                <?php 
                                                    if (isset($_GET['success'])) {
                                                        echo('<script>alert("goed")</script>');
                                                    }
                                                    if (isset($_GET['codeAlreadyUsed'])) {
                                                        echo('<script>alert("al gebruikt")</script>');
                                                    }
                                                    if (isset($_GET['codeError'])) {
                                                        echo('<script>alert("incorrect")</script>');
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Block level buttons ends -->

                </div>
            </div>
            <!-- END : End Main Content-->
            <!-- Scroll to top button -->
            <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>
        </div>
    </div>

    <?php
    include "partials/footer.php";
    ?>
</body>
<!-- END : Body-->

</html>