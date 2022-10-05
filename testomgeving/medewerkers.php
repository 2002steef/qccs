<!--Op deze pagina komt een overzicht met alle bedrijven die de applicatie gebruiken-->
<?php
include "backend/functions.php";
if (!isset($_SESSION["loggedin"])) {
    header("Location: index.php");
}

// Sendmail();
// InsertCustomerIndividual();
// UpdateCompanyInfo();
// $rowC = GetCompanyInfo();
// editUserZ();
// editUserP();
// ViewUserP();
// ViewUserZ();
// ViewPersonnel();
// InsertUserZakelijk();


// Controleer of iemand ingelogd is


?>
<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->
<style>
    br {
        line-height: 75%;
    }

    /*input::placeholder {*/
    /*   color: red;  !important;*/
    /*}*/
</style>

<head>
    <?php
    include "partials/header.php";
    ?>
</head>
<!-- END : Head-->
<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 2-columns  navbar-sticky" data-menu="vertical-menu" data-col="2-columns">

    <!-- Navbar (Header) Starts-->
    <?php
    include "partials/navbar.php";
    ?>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <!-- / main menu-->

    <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>

                                <ul class="breadcrumb bg-transparent">
                                    <li class="breadcrumb-item light-gray"><a href="#">Home</a></li>
                                </ul>
                            </div>

                            <div class="card-content light-gray">
                                <div class="card-body light-gray">
                                    <section id="file-export">
                                        <ul class="nav nav-tabs light-gray" role="tablist" id="tabs">
                                            <li class="nav-item active light-gray">
                                                <a href="#Particulier" role="tab" id="account-tab" class="nav-link d-flex align-items-center active light-gray" data-toggle="tab" aria-controls="account" aria-selected="true">
                                                    <i class="ft-user mr-1 light-gray"></i>
                                                    <span class="d-none d-sm-block light-gray">Masseuses</span>
                                                </a>
                                            </li>
                                        </ul>

                                        <div class="tab-pane fade mt-2 show active light-gray" id="Particulier" role="tabpanel" aria-labelledby="account-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="table-responsive col-10">
                                                        <table  class="table thead-dark table-bordered file-export">
                                                            <thead>
                                                                <tr>
                                                                    <th>Masseuse</th>
                                                                    <th>Masseuse info</th>
                                                                    <th>Info</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php masseuseInfo(); ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END : End Main Content-->

        <!-- Scroll to top button -->
        <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>

    </div>

    <!-- /////////////////////////////////////////////////////////////////////////////-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <?php
    include "partials/footer.php";
    ?>
    <script src="assets/js/tabel-scroll.js">
    </script>
    <script src="assets/js/postcode-api.js"></script>

</body>
<!-- END : Body-->