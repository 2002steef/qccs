<?php
include "backend/voucherFunctions.php";
?>

<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Voucher sturen</title>
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="app-assets/img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/switchery.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/layout-dark.css">
    <link rel="stylesheet" href="app-assets/css/plugins/switchery.css">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/horizontal-menu.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/style.css">
    <!-- END: Custom CSS-->
</head>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body class="horizontal-layout horizontal-menu horizontal-menu-padding navbar-static 2-columns  navbar-static layout-dark layout-transparent bg-glass-2" data-bg-img="bg-glass-2" data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
    <!-- Navbar (Header) Ends-->

    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">



        <div class="main-panel">
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="content-header">Buttons</div>
                        </div>
                    </div>
                    <!-- Block level buttons start -->
                    <section id="block-level-buttons">
                        <div class="row">
                            <div class="col-6 ">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Voucher sturen</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <p>Stuur voucher code</p>

                                            <div class="row">
                                                <!-- block button -->

                                                <form action="" method="POST">
                                                    <div class="form-group mb-2 mb-md-0">
                                                        <label class="label_txt">Email Klant</label>
                                                        <input type="text" name="KlantMail" class="form-control">


                                                        <!-- <div class="col-md-6 col-12"> -->
                                                        <fieldset class="form-group">
                                                            <label for="customSelectMs">Masseuse</label>
                                                            <select name="masseuse" class="custom-select" id="customSelectMs">
                                                                <option selected hidden>Kies een masseuse...</option>
                                                                <?php GetMasseuseInfo(); ?>
                                                            </select>
                                                        </fieldset>
                                                        <!-- </div> -->



                                                        <label class="label_txt" for="customSelectMd">Medewerker</label>
                                                        <fieldset class="form-group">
                                                            <select name="medewerker" class="custom-select" id="customSelectMd">
                                                                <option selected hidden>Kies een medewerker...</option>
                                                                <?php GetUserInfo(); ?>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12 mb-2 mb-md-0">
                                                        <button type="submit" class="btn btn-outline-primary btn-block" name="VoucherSturen">Send Voucher</button>
                                                    </div>
                                                </form>
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

            <!-- POPUP STARTS -->

            <!-- <div id="popupBackground">
                <div id="popupContent">
                    <h1 class="popupText">Weet u zeker dat u bij -masseusebedrijf- een afspraak wilt maken?</h1>
                    <p class="popupText">
                        <b>
                            uitleg over hoe het werkt en zomeer regel 1<br>
                            uitleg over hoe het werkt en zomeer regel 2<br>
                            uitleg over hoe het werkt en zomeer regel 3<br>
                            uitleg over hoe het werkt en zomeer regel 4<br>
                            uitleg over hoe het werkt en zomeer regel 5
                        </b>
                    </p>
                    <button id="closePopup" class="popupText"><b>accepteer voorwaarden</b></button>
                </div>
            </div>

            <script>
                document.getElementById("closePopup").addEventListener('click', function() {
                    console.log('test1');
                    document.getElementById('popupBackground').style.display = 'none';
                    document.getElementById('popupContent').style.display = 'none';
                })
            </script> -->


            <div class="col-lg-4 col-md-6 col-12 mb-2">
                <h6>Default Modal</h6>
                <p>Toggle a modal via JavaScript by clicking the button above.</p>
                <!-- Button trigger modal -->
                <button type="button" class="btn bg-light-primary" data-toggle="modal" data-target="#default">Launch Modal</button>
                <!-- Modal -->
                <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel1">-masseusebedrijf-</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5>Voucher gebruiken?</h5>
                                <p>
                                    Weet u zeker dat u de voucher wilt gebruiken bij -masseusebedrijf- ? <br><br>
                                    Zodra u op accepteren klikt, zal er een voucher naar uw mail gestuurd worden<br><Br>
                                    Vervolgens zal het er contact met u worden opgenomen door -masseusebedrijf- om een afspraak te plannen.<br><br>
                                    Wanneer u bij -masseusebedrijf- langs gaat, geeft u de code van de voucher. De masseuse zal deze verzilveren en de massage geven.
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-light-secondary" data-dismiss="modal">accepteer</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- POPUP END -->

            <!-- END : End Main Content-->

            <!-- BEGIN : Footer-->
            <footer class="footer undefined undefined">
                <p class="clearfix text-muted m-0"><span>Copyright &copy; 2020 &nbsp;</span><a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" id="pixinventLink" target="_blank">PIXINVENT</a><span class="d-none d-sm-inline-block">, All rights reserved.</span></p>
            </footer>
            <!-- End : Footer-->
            <!-- Scroll to top button -->
            <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>

        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN VENDOR JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <script src="app-assets/vendors/js/switchery.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <script src="app-assets/js/notification-sidebar.js"></script>
    <script src="app-assets/js/customizer.js"></script>
    <script src="app-assets/js/scroll-top.js"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="app-assets/js/components-modal.min.js"></script>
    <!-- END PAGE LEVEL JS-->
    <!-- BEGIN: Custom CSS-->
    <script src="assets/js/scripts.js"></script>
    <!-- END: Custom CSS-->
</body>
<!-- END : Body-->

</html>