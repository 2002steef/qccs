<!--Op deze pagina komt een overzicht met alle bedrijven die de applicatie gebruiken-->
<?php
include "backend/functions.php";
require_once "redirect.php";

include "partials/header.php";
if (!isset($_SESSION["loggedin"])) {
    header("Location: index.php");
}
$row2 = Getuser();

if ($row2['authentication_level'] !== "Admin") {
    if ($row2['authentication_level'] === "user") {
        $memb_of = $row2['member_of'];
        header("Location:../klant_overzicht.php?custof=$memb_of&membof=$memb_of");
    }
    else if ($row2['member_of'] !== $_GET['membof']) {
        $memb_of = $row2['member_of'];
        header("Location:../bedrijfs_klanten_overzicht.php?custof=$memb_of&membof=$memb_of");
    }
}

Updateuser();
UpdateCompanyInfo();
$rowC = GetCompanyInfo();
ViewUserP();
ViewUserZ();
ViewPersonnel();
editPersonnel();
editUserZ();
editUserP();
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

<div class="main-panel">
    <!-- BEGIN : Main Content-->
    <div class="main-content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?php GetCompanyName();?></h4>

                            <ul class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="bedrijfs_overzicht.php">CRM Relaties</a></li>
<!--                                <li class="breadcrumb-item">--><?php
//                                    $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
//                                    foreach($crumbs as $crumb){
//                                        echo ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . ' ');
//                                    }
//                                    ?><!--</li>-->
                            </ul>
                        </div>

                        <div class="card-content">
                            <div class="card-body">
                                <section id="file-export">
                                    <ul class="nav nav-tabs" role="tablist" id="tabs">
                                        <li class="nav-item active">
                                            <a href="#Particulier" role="tab" id="account-tab"
                                               class="nav-link d-flex align-items-center active" data-toggle="tab"
                                               aria-controls="account" aria-selected="true">
                                                <i class="ft-user mr-1"></i>
                                                <span class="d-none d-sm-block">Particulier</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#Zakelijk" role="tab" id="information-tab"
                                               class="nav-link d-flex align-items-center " data-toggle="tab"
                                               aria-controls="information" aria-selected="false">
                                                <i class="ft-info mr-1"></i>
                                                <span class="d-none d-sm-block">Zakelijk</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade mt-2 show active" id="Particulier" role="tabpanel"
                                             aria-labelledby="account-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <div>
                                                            <?php
                                                            if (isset($_GET["toevoegenPart"])) {
                                                                if ($_GET["toevoegenPart"] == "empty") {
                                                                    echo "<p class='text-danger'>Vul alle velden in aub</p>";
                                                                } elseif ($_GET["toevoegenPart"] == "namefout") {
                                                                    echo "<p class='text-danger'>Voornaam heeft foute tekens</p>";
                                                                } elseif ($_GET["toevoegenPart"] == "telfout") {
                                                                    echo "<p class='text-danger'>Telefoonnummer klopt niet</p>";
                                                                } elseif ($_GET["toevoegenPart"] == "mailfout") {
                                                                    echo "<p class='text-danger'>Email klopt niet</p>";
                                                                } elseif ($_GET["toevoegenPart"] == "emaildupli") {
                                                                    echo "<p class='text-danger'>Email bestaat al</p>";
                                                                }elseif ($_GET["toevoegenPart"] == "straatfout") {
                                                                    echo "<p class='text-danger'>Straatnaam mag geen nummers bevatten!</p>";
                                                                }elseif ($_GET["toevoegenPart"] == "postcodefout") {
                                                                    echo "<p class='text-danger'>Ongeldige postcode ! </p>";
                                                                }
                                                                if ($_GET["toevoegenPart"] == "succes") {
                                                                    echo "<p class='text-success'>Relatie succesvol toegevoegd !</p>";
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                        <table class="table table-striped table-bordered file-export">
                                                            <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Volledige Naam</th>
                                                                <th>Telefoonnummer</th>
                                                                <th>Email</th>
                                                                <th>Status</th>
                                                                <th>Handelingen</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            GetCustomerP();
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade mt-2 show " id="Zakelijk" role="tabpanel"
                                             aria-labelledby="account-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <div>
                                                            <?php
                                                            if (isset($_GET["toevoegenZak"])) {
                                                                if ($_GET["toevoegenZak"] == "empty") {
                                                                    echo "<p class='text-danger'>Vul alle velden in aub</p>";
                                                                } elseif ($_GET["toevoegenZak"] == "namefout") {
                                                                    echo "<p class='text-danger'>Voornaam heeft foute tekens</p>";
                                                                } elseif ($_GET["toevoegenZak"] == "telfout") {
                                                                    echo "<p class='text-danger'>Telefoonnummer klopt niet</p>";
                                                                } elseif ($_GET["toevoegenZak"] == "mailfout") {
                                                                    echo "<p class='text-danger'>Email klopt niet</p>";
                                                                } elseif ($_GET["toevoegenZak"] == "emaildupli") {
                                                                    echo "<p class='text-danger'>Email bestaat al</p>";
                                                                }elseif ($_GET["toevoegenZak"] == "straatfout") {
                                                                    echo "<p class='text-danger'>Straatnaam mag geen nummers bevatten!</p>";
                                                                }elseif ($_GET["toevoegenZak"] == "postcodefout") {
                                                                    echo "<p class='text-danger'>Ongeldige postcode !</p>";
                                                                }
                                                                if ($_GET["toevoegenZak"] == "succes") {
                                                                    echo "<p class='text-success'>Relatie succesvol toegevoegd !</p>";
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                        <table class="table table-striped table-bordered file-export">
                                                            <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>VolledigeNaam</th>
                                                                <th>Telefoonnummer</th>
                                                                <th>Bedrijfsnaam</th>
                                                                <th>Status</th>
                                                                <th>Handelingen</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            GetCustomerZ();
                                                            ?>
                                                            </tbody>
                                                        </table>
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
            </div>
        </div>
    </div>
    <!-- END : End Main Content-->

    <!-- Scroll to top button -->
    <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<?php
include "partials/footer.php";
?>
</body>
<!-- END : Body-->
