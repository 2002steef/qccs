<!--Op deze pagina komt een overzicht met alle bedrijven die de applicatie gebruiken-->
<?php
include "backend/functions.php";
if (!isset($_SESSION["loggedin"])) {
    header("Location: index.php");
}
$row2 = Getuser();

//if (!($row2['authentication_level'] === "Admin1")){
//    if (!($row2['member_of'] == $_GET['membof'])) {
//        $memb_of = $row2['member_of'];
//        header("Location:../bedrijfs_klanten_overzicht.php?custof=$memb_of&membof=$memb_of");
//    }
//}

?>
<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<?php
include "partials/header.php";
?>
<!-- END : Head-->
<!-- BEGIN : Body-->
<body class="vertical-layout vertical-menu 2-columns  navbar-sticky layout-dark layout-transparent bg-glass-1"
      data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="2-columns">

<!-- Navbar (Header) Starts-->
<?php
include "partials/navbar.php";
?>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- / main menu-->

<!-- ////////////////////////////////////////////////////////////////////////////-->



    <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <section class="kb-wrapper">
                    <!-- Knowledge base search start -->
                    <div class="kb-search">
                        <div class="row">
                            <div class="col-12">
                                <div style="padding-bottom: 0 !important;" class="card bg-transparent shadow-none kb-header py-3">
                                    <div class="card-content">
                                        <div style="padding: 0 !important;" class="card-body text-center p-md-5">
                                            <h1 class="mb-2 kb-title">Goedemorgen <?php echo $row2['username']; ?></h1>
                                            <p class="mb-4">Kies een van de vakken om verder te gaan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Knowledge base search ends -->
                    <!-- Knowledge base content start -->
                    <div class="kb-content">
                        <div class="row kb-content-info match-height mx-1 mx-md-2 mx-lg-5">
                            <div class="col-md-4 col-sm-6 kb-content-card">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body text-center p-4">
                                            <a href="page-account-settings.php">
                                                <i class="ft-user"></i>
                                                <h5 class="mt-2">Mijn Acccount</h5>
                                                <p class="m-0 text-muted">Account gegevens wijzigen of bekijken</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 kb-content-card">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body text-center p-4">
                                            <a href="klant_bedrijf_info.php?custof=<?= $_SESSION["memb_of"] ?>&membof=<?= $_SESSION["memb_of"] ?>">
                                                <i class="ft-link"></i>
                                                <h5 class="mt-2">Verzend info</h5>
                                                <p class="m-0 text-muted">Bekijk hier je verzend info</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 kb-content-card">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body text-center p-4">
                                            <a href="page-knowledge-categories.html">
                                                <i class="ft-dollar-sign"></i>
                                                <h5 class="mt-2">Facturen en betalingen</h5>
                                                <p class="m-0 text-muted">Factuur en betaalgegevens bekijken</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 kb-content-card">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body text-center p-4">
                                            <a href="page-knowledge-categories.html">
                                                <i class="ft-globe"></i>
                                                <h5 class="mt-2">Hulp vragen</h5>
                                                <p class="m-0 text-muted">Vraag om hulp of bekijk de videos</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 kb-content-card">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body text-center p-4">
                                            <a href="page-knowledge-categories.html">
                                                <i class="ft-smartphone"></i>
                                                <h5 class="mt-2">Payouts</h5>
                                                <p class="m-0 text-muted">But students more often neglect fact it is much more</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 kb-content-card">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body text-center p-4">
                                            <a href="page-knowledge-categories.html">
                                                <i class="ft-alert-circle"></i>
                                                <h5 class="mt-2">Opmerkingen</h5>
                                                <p class="m-0 text-muted">Bekijk hier alle opmerkingen</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 kb-no-content d-none">
                                <div class="card bg-transparent shadow-none">
                                    <div class="card-content">
                                        <div class="card-body text-center">
                                            <p class="m-0 d-flex justify-content-center align-items-center">
                                                <i class="ft-alert-circle font-medium-2 mr-1"></i>
                                                <span>No result found</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Knowledge base content ends -->
                </section>

            </div>
        </div>
        <!-- END : End Main Content-->
        <!-- End : Footer-->
        <!-- Scroll to top button -->
        <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>

    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
</body>
<?php
include "partials/footer.php";
?>
</body>
</html>
<!-- END : Body-->
