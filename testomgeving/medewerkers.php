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

<body class="vertical-layout vertical-menu 2-columns  navbar-sticky layout-dark layout-transparent bg-glass-1" data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="2-columns">

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
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="bedrijfs_overzicht.php">CRM Relaties</a></li>
                                    <li class="breadcrumb-item"><a href="#">Bedrijfs klanten overzicht</a></li>
                                </ul>
                            </div>

                            <div class="card-content">
                                <div class="card-body">
                                    <section id="file-export">
                                        <ul class="nav nav-tabs" role="tablist" id="tabs">
                                            <li class="nav-item active">
                                                <a href="#Particulier" role="tab" id="account-tab" class="nav-link d-flex align-items-center active" data-toggle="tab" aria-controls="account" aria-selected="true">
                                                    <i class="ft-user mr-1"></i>
                                                    <span class="d-none d-sm-block">Masseuses</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade mt-2 show active" id="Particulier" role="tabpanel" aria-labelledby="account-tab">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered file-export">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Logo</th>
                                                                        <th colspan="5">Masseuse info</th>
                                                                        <th>Handelingen</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <?php masseuseInfo(); ?>
                                                                    </tr>
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
 
    <!-- /////////////////////////////////////////////////////////////////////////////-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <?php
    include "partials/footer.php";
    ?>
    <script>
        /*
        zet script nog in apart bestand wnnr af voor de aapie
    */
        var e = "FbW29C_969cyVfAKrj";
        var postcode = "";
        var huisnr = "";
        var toevoeging = "";

        function check_pc(wat, waarde) {
            if (wat === "postcode") {
                var pc = waarde.trim();
                if (pc.length < 6) {
                    maak_leeg();
                    return;
                } // moet minimaal 6 characters hebben
                var num_deel = pc.substr(0, 4);
                if (parseFloat(num_deel) < 1000) {
                    maak_leeg();
                    return;
                } // moet minaal 1000 zijn
                var alpha_deel = pc.substr(-2);
                if (alpha_deel.charCodeAt(0) < 65 || alpha_deel.charCodeAt(0) > 122 || alpha_deel.charCodeAt(1) < 65 || alpha_deel.charCodeAt(1) > 122) {
                    maak_leeg();
                    return;
                } // DE LAATSTE 2 POSITIES MOETEN LETTERS ZIJN
                alpha_deel = alpha_deel.toUpperCase();

                // de checker niffo

                postcode = num_deel + alpha_deel;
                document.getElementById("postcode_p").value = postcode;
                document.getElementById("postcode_z").value = postcode;
            }

            if (wat === "huisnr") {
                huisnr = parseFloat(waarde);
                if (!huisnr) {
                    maak_leeg();
                    return;
                }
                document.getElementById("huisnr_p").value = huisnr;
                document.getElementById("huisnr_z").value = huisnr;
            }

            if (wat === "toevoeging") {
                toevoeging = waarde.trim();
                document.getElementById("toevoeging_p").value = toevoeging;
                document.getElementById("toevoeging_z").value = toevoeging;
            }

            if (huisnr === 0) {
                return;
            }

            var getadrlnk = 'https://bwnr.nl/postcode.php?pc=' + postcode + '&hn=' + huisnr + '&tv=' + toevoeging + '&tg=data&ak=' + 'FbW29C_969cyVfAKrj'; // e moet uw apikey bevattten.

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    rString = this.responseText;
                    if (rString === "Geen resultaat.") {
                        maak_leeg();
                        return;
                    }
                    if (rString === "Input onvolledig.") {
                        maak_leeg();
                        return;
                    }
                    if (rString === "Onbekende API Key.") {
                        maak_leeg();
                        return;
                    }
                    if (rString === "Over quota") {
                        maak_leeg();
                        return;
                    }
                    if (rString === "Onjuiste API Key.") {
                        maak_leeg();
                        alert('Alleen functioneel indien geopend vanuit de API pagina. Ga terug naar de API pagina en probeer opnieuw.');
                        return;
                    }
                    // 0 = straat - 1 = plaats
                    aResponse = rString.split(";");
                    document.getElementById("straat_p").value = aResponse[0];
                    document.getElementById("straat_z").value = aResponse[0];
                    document.getElementById("plaats_p").value = aResponse[1];
                    document.getElementById("plaats_z").value = aResponse[1];
                }
            };

            xmlhttp.open("GET", getadrlnk, true);
            xmlhttp.send();
        }

        function maak_leeg() {
            document.getElementById("straat_p").value = "";
            document.getElementById("plaats_p").value = "";
            document.getElementById("straat_z").value = "";
            document.getElementById("plaats_z").value = "";
        }
    </script>

</body>
<!-- END : Body-->