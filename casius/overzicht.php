<!--Op deze pagina komt een overzicht met alle bedrijven die de applicatie gebruiken-->
<?php
include "backend/functions.php";

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

<body class="vertical-layout vertical-menu 2-columns  navbar-sticky" data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="2-columns">

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
                                <h4 class="card-title">Casius</h4>

                                <ul class="breadcrumb bg-transparent">
                                    <li class="breadcrumb-item"><a class="text light-gray" href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a class="text light-gray" href="bedrijfs_overzicht.php">Relaties</a></li>
                                    <li class="breadcrumb-item"><a class="text light-gray" href="#">Klanten overzicht</a></li>
                                </ul>
                            </div>

                            <div class="card-content">
                                <div class="card-body">
                                    <section id="file-export">
                                        <ul class="nav nav-tabs" role="tablist" id="tabs">
                                            <li class="nav-item active">
                                                <a href="#Abonnementhouders" role="tab" id="Abonnementhouders-tab" class="nav-link d-flex align-items-center active" data-toggle="tab" aria-controls="Abonnementhouders" aria-selected="true">
                                                    <i class="ft-user mr-1"></i>
                                                    <span class="d-none d-sm-block light-gray">Klanten</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#Masseurs" role="tab" id="Masseurs-tab" class="nav-link d-flex align-items-center " data-toggle="tab" aria-controls="Masseurs" aria-selected="false">
                                                    <i class="ft-info mr-1"></i>
                                                    <span class="d-none d-sm-block light-gray">Masseurs</span>
                                                </a>
                                            </li>
                                            <li class="nav-tabs">
                                                <a type="button" class="nav-link d-flex align-items-end" data-toggle="modal" data-target="#large">
                                                    <i class="ft-plus mr-1"></i>
                                                    <span class="d-none d-sm-block light-gray">Toevoegen</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade mt-2 show active" id="Abonnementhouders" role="tabpanel" aria-labelledby="account-tab">
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
                                                                    } elseif ($_GET["toevoegenPart"] == "straatfout") {
                                                                        echo "<p class='text-danger'>Straatnaam mag geen nummers bevatten!</p>";
                                                                    } elseif ($_GET["toevoegenPart"] == "postcodefout") {
                                                                        echo "<p class='text-danger'>Ongeldige postcode ! </p>";
                                                                    }
                                                                    if ($_GET["toevoegenPart"] == "succes") {
                                                                        echo "<p class='text-success'>Relatie succesvol toegevoegd !</p>";
                                                                    }
                                                                    if ($_GET["toevoegenPart"] == "Formulier") {
                                                                        echo "<p class='text-success'>Email succesvol verstuurd !</p>";
                                                                    } else {
                                                                        echo "<p class='text-danger'>Email is niet succesvol verstuurd !</p>";
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                            <table class="table table-striped table-bordered file-export light-gray">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="1">ID</th>
                                                                        <th>BedrijfsNaam</th>
                                                                        <th>Adres</th>
                                                                        <th colspan="1">Aantal vouchers</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade mt-2 show " id="Masseurs" role="tabpanel" aria-labelledby="account-tab">
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
                                                                    } elseif ($_GET["toevoegenZak"] == "straatfout") {
                                                                        echo "<p class='text-danger'>Straatnaam mag geen nummers bevatten!</p>";
                                                                    } elseif ($_GET["toevoegenZak"] == "postcodefout") {
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
                                                                        <th >Masseuse</th>
                                                                        <th >Volledige Naam</th>
                                                                        <th> Info</th>
                                                                        <th>website</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
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
    <div class="col-lg-3 col-md-6 col-12">
        <!-- Button trigger modal -->
        <!-- Modal -->

        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title text-text-bold-600" id="myModalLabel33">Formulier</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                        </button>
                    </div>
                    <form method="post">
                        <div class="modal-body">
                            <label>Email: </label>
                            <div class="form-group">
                                <input type="text" name="Email" placeholder="Email Address" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <input type="reset" class="btn bg-light-secondary" data-dismiss="modal" value="Close">
                            <input type="submit" class="btn btn-primary" name="Verzenden" value="Verzenden">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Relatie toevoegen</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <section class="users-edit">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <!-- Nav-tabs -->
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a href="#relatie_particulier" role="tab" id="account-tab" class="nav-link d-flex align-items-center active" data-toggle="tab" aria-controls="account" aria-selected="true">
                                                        <i class="ft-user mr-1"></i>
                                                        <span class="d-none d-sm-block">Particulier</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#relatie_zakelijk" role="tab" id="information-tab" class="nav-link d-flex align-items-center" data-toggle="tab" aria-controls="information" aria-selected="false">
                                                        <i class="ft-info mr-1"></i>
                                                        <span class="d-none d-sm-block">Zakelijk</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                           
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