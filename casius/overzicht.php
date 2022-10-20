<!--Op deze pagina komt een overzicht met alle bedrijven die de applicatie gebruiken-->
<?php
include "backend/functions.php";
klantModal();
klantInfo();

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
                                    <li class="breadcrumb-item"><a class="text text-light-gray" href="overzicht.php">Home</a></li>
                                    <li class="breadcrumb-item"><a class="text text-light-gray" href="overzicht.php">Relaties</a></li>
                                    <li class="breadcrumb-item"><a class="text text-light-gray" href="#">Klanten overzicht</a></li>
                                </ul>
                            </div>

                            <div class="card-content">
                                <div class="card-body">
                                    <section id="file-export">
                                        <ul class="nav nav-tabs text-light-gray" role="tablist" id="tabs">
                                            <li class="nav-item active">
                                                <a href="#ZakelijkeKlanten" role="tab" id="Zakelijke-Klanten" class="nav-link d-flex align-items-center active" data-toggle="tab" aria-controls="ZakelijkeKlanten" aria-selected="true">
                                                    <i class="ft-user mr-1"></i>
                                                    <span class="d-none d-sm-block text-light-gray">Zakelijke Klanten</span>
                                                </a>
                                            </li>
                                            <li class="nav-item active">
                                                <a href="#ParticuliereKlanten" role="tab" id="Particuliere-Klanten" class="nav-link d-flex align-items-center" data-toggle="tab" aria-controls="ParticuliereKlanten" aria-selected="true">
                                                    <i class="ft-user mr-1"></i>
                                                    <span class="d-none d-sm-block text-light-gray">Particuliere Klanten</span>
                                                </a>
                                            </li>
                                            <li class="nav-tabs">
                                                <a type="button" class="nav-link d-flex align-items-end" data-toggle="modal" data-target="#large">
                                                    <i class="ft-plus mr-1"></i>
                                                    <span class="d-none d-sm-block text-light-gray">Toevoegen</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade mt-2 show active" id="ZakelijkeKlanten" role="tabpanel" aria-labelledby="account-tab">
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
                                                            <table class="table table-striped table-bordered file-export text-light-gray">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="1">ID</th>
                                                                        <th>Klant Naam</th>
                                                                        <th>Adres</th>
                                                                        <th colspan="1">Extra info</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    klantInfoTabel();
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade mt-2  " id="ParticuliereKlanten" role="tabpanel" aria-labelledby="account-tab">
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
                                                            <table class="table table-striped table-bordered file-export text-light-gray">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="1">ID</th>
                                                                        <th>Klant Naam</th>
                                                                        <th>Adres</th>
                                                                        <th colspan="1">Extra info</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    klantInfoTabel();
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
    <div class="col-lg-3 col-md-6 col-12">
        <!-- Button trigger modal -->
        <!-- Modals -->

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
                                                    <a href="#relatie_particulier" role="tab" id="toevoegen_part" class="nav-link d-flex align-items-center active" data-toggle="tab" aria-controls="account" aria-selected="true">
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
                                              <div class="tab-pane fade mt-2  " id="relatie_particulier" role="tabpanel" aria-labelledby="relatie_particulier">
                                              <form method="POST">
                                                    <div class="row match-height">
                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-content">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-4 col-form-label" for="Voornaam">Voornaam</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="hidden" class="form-control square" id="klant_ID" name="klantID">
                                                                                        <input type="text" class="form-control square" id="Voornaam" name="Voornaam">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-7 col-form-label" for="tussenvoegsel">Tussenvoegsel</label>
                                                                                    <div class="col-md-5">
                                                                                        <input type="text" class="form-control square" id="tussenvoegsel" name="tussenvoegsel">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-6 col-form-label" for="achternaam">Achternaam</label>
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control square" id="achternaam" name="achternaam">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-md-3">
                                                                            <div class="col-md-3 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-8 col-form-label" for="huisnummer">Huisnummer</label>
                                                                                    <div class="col-md-4">
                                                                                        <input type="text" class="form-control square" id="huisnummer" name="huisnummer">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-7 col-form-label" for="toevoeging">Huisnummer toevoeging</label>
                                                                                    <div class="col-md-5">
                                                                                        <input type="text" class="form-control square" id="toevoeging" name="toevoeging">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-4 col-form-label" for="straatnaam">Straatnaam</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control square" id="straatnaam" name="straatnaam">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-5 col-form-label" for="postcode">Postcode</label>
                                                                                    <div class="col-md-7">
                                                                                        <input type="text" class="form-control square" id="postcode" name="postcode">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-4 col-form-label" for="horizontal-form-5">Email</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="email" class="form-control square" id="horizontal-form-5" name="email">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-4 col-form-label" for="horizontal-form-6">Bedrijf</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control square" id="horizontal-form-6" name="website">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-4 col-form-label" for="horizontal-form-7">Telefoonnummer</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control square" id="horizontal-form-7" name="telefoonnummer">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-3 col-form-label" for="horizontal-form-9">Notities</label>
                                                                                    <div class="col-md-9">
                                                                                        <textarea id="horizontal-form-9" rows="6" class="form-control square" name="notities"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                              <div class="tab-pane fade mt-2  " id="relatie_zakelijk" role="tabpanel" aria-labelledby="relatie_zakelijk">
                                                <form method="POST">
                                                    <div class="row match-height">
                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-content">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-4 col-form-label" for="Voornaam">Voornaam</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="hidden" class="form-control square" id="klant_ID" name="klantID">
                                                                                        <input type="text" class="form-control square" id="Voornaam" name="Voornaam">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-7 col-form-label" for="tussenvoegsel">Tussenvoegsel</label>
                                                                                    <div class="col-md-5">
                                                                                        <input type="text" class="form-control square" id="tussenvoegsel" name="tussenvoegsel">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-6 col-form-label" for="achternaam">Achternaam</label>
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control square" id="achternaam" name="achternaam">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-md-3">
                                                                            <div class="col-md-3 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-8 col-form-label" for="huisnummer">Huisnummer</label>
                                                                                    <div class="col-md-4">
                                                                                        <input type="text" class="form-control square" id="huisnummer" name="huisnummer">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-7 col-form-label" for="toevoeging">Huisnummer toevoeging</label>
                                                                                    <div class="col-md-5">
                                                                                        <input type="text" class="form-control square" id="toevoeging" name="toevoeging">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-4 col-form-label" for="straatnaam">Straatnaam</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control square" id="straatnaam" name="straatnaam">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-5 col-form-label" for="postcode">Postcode</label>
                                                                                    <div class="col-md-7">
                                                                                        <input type="text" class="form-control square" id="postcode" name="postcode">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-4 col-form-label" for="horizontal-form-5">Email</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="email" class="form-control square" id="horizontal-form-5" name="email">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-4 col-form-label" for="horizontal-form-6">Bedrijf</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control square" id="horizontal-form-6" name="website">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-4 col-form-label" for="horizontal-form-7">Telefoonnummer</label>
                                                                                    <div class="col-md-8">
                                                                                        <input type="text" class="form-control square" id="horizontal-form-7" name="telefoonnummer">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-3 col-form-label" for="horizontal-form-9">Notities</label>
                                                                                    <div class="col-md-9">
                                                                                        <textarea id="horizontal-form-9" rows="6" class="form-control square" name="notities"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Horizontal Form Layout starts -->
                                                <!-- Horizontal Form Layout ends -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-light-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="updateKlant" class="btn btn-outline-light-gray">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </div>
    <!-- /////////////////////////////////////////////////////////////////////////////-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <div class="col-lg-3 col-md-6 col-12">
        <!-- Modal -->

    </div>
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
                document.getElementById("postcode").value = postcode;
            }

            if (wat === "huisnummer") {
                huisnr = parseFloat(waarde);
                if (!huisnr) {
                    maak_leeg();
                    return;
                }
                document.getElementById("huisnummer").value = huisnr;
            }

            if (wat === "toevoeging") {
                toevoeging = waarde.trim();
                document.getElementById("toevoeging").value = toevoeging;
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
                    document.getElementById("straat").value = aResponse[0];
                    document.getElementById("plaats").value = aResponse[1];
                }
            };

            xmlhttp.open("GET", getadrlnk, true);
            xmlhttp.send();
        }

        function maak_leeg() {
            document.getElementById("straat").value = "";
            document.getElementById("straa").value = "";
        }
    </script>

</body>
<!-- END : Body-->