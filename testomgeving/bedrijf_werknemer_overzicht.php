<!--Op deze pagina komt een overzicht met alle bedrijven die de applicatie gebruiken-->
<?php
include "backend/functions.php";
if (!isset($_SESSION["loggedin"])) {
    header("Location: index.php");
}
$row2 = Getuser();
if ($row2['authentication_level'] !== 'Admin') {
    $memb_of = $row2['member_of'];
    if ($row2['authentication_level'] === 'user'){
        header("Location:../klant_overzicht.php?custof=$memb_of&membof=$memb_of");
    }
    if ($row2['authentication_level'] === 'Werknemer') {
        $memb_of = $row2['member_of'];
        header("Location:../klanten_overzicht.php?custof=$memb_of&membof=$memb_of");
    }
    if ($row2['member_of'] !== $_GET['membof']) {
        $memb_of = $row2['member_of'];
        header("Location:../bedrijfs_klanten_overzicht.php?custof=$memb_of&membof=$memb_of");
    } else if ($row2['member_of'] !== $_GET['custof']) {
        $memb_of = $row2['member_of'];
        header("Location:../bedrijfs_klanten_overzicht.php?custof=$memb_of&membof=$memb_of");
    }
}
UpdateCompanyInfo();
$rowC = GetCompanyInfo();
editPersonnel();
editUserZ();
editUserP();
ViewUserP();
ViewUserZ();
ViewPersonnel();
Getpersonnel1();
InsertPersonnel1();

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
                            <h4 class="card-title"><?php GetCompanyName(); ?></h4>

                            <ul class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="bedrijfs_overzicht.php">CRM Relaties</a></li>
                                <li class="breadcrumb-item"><a href="#">Bedrijfs klanten overzicht</a></li>
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
                                            <a href="#Werknemers" role="tab" id="account-tab"
                                               class="nav-link d-flex align-items-center " data-toggle="tab"
                                               aria-controls="account" aria-selected="true">
                                                <i class="ft-user mr-1"></i>
                                                <span class="d-none d-sm-block">Werknemers</span>
                                            </a>
                                        </li>
                                        <li class="nav-tabs">
                                            <a type="button"
                                               class="nav-link d-flex align-items-end"
                                               data-toggle="modal" data-target="#large">
                                                <i class="ft-plus mr-1"></i>
                                                <span class="d-none d-sm-block">Toevoegen</span>
                                            </a>
                                        </li>
                                        <!--                                        <li class="nav-item active">-->
                                        <!--                                            <a href="#Settings" role="tab" id="account-tab"-->
                                        <!--                                               class="nav-link d-flex align-items-center " data-toggle="tab"-->
                                        <!--                                               aria-controls="account" aria-selected="true">-->
                                        <!--                                                <i class="ft-settings mr-1"></i>-->
                                        <!--                                                <span class="d-none d-sm-block">Instellingen</span>-->
                                        <!--                                            </a>-->
                                        <!--                                        </li>-->
                                    </ul>
                                    <div class="tab-content">


                                        <div class="tab-pane fade mt-2 show active" id="Werknemers" role="tabpanel"
                                             aria-labelledby="account-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <div>
                                                            <?php
                                                            if (isset($_GET["toevoegenMemb"])) {
                                                                if ($_GET["toevoegenMemb"] == "empty") {
                                                                    echo "<p class='text-danger'>Vul alle velden in aub</p>";
                                                                } elseif ($_GET["toevoegenMemb"] == "namefout") {
                                                                    echo "<p class='text-danger'>Voornaam heeft foute tekens</p>";
                                                                } elseif ($_GET["toevoegenMemb"] == "telfout") {
                                                                    echo "<p class='text-danger'>Telefoonnummer klopt niet</p>";
                                                                } elseif ($_GET["toevoegenMemb"] == "mailfout") {
                                                                    echo "<p class='text-danger'>Email klopt niet</p>";
                                                                } elseif ($_GET["toevoegenMemb"] == "emaildupli") {
                                                                    echo "<p class='text-danger'>Email bestaat al</p>";
                                                                } elseif ($_GET["toevoegenMemb"] == "straatfout") {
                                                                    echo "<p class='text-danger'>Straatnaam mag geen nummers bevatten!</p>";
                                                                } elseif ($_GET["toevoegenMemb"] == "postcodefout") {
                                                                    echo "<p class='text-danger'>Ongeldige postcode !</p>";
                                                                }
                                                                if ($_GET["toevoegenMemb"] == "succes") {
                                                                    echo "<p class='text-success'>Relatie succesvol toegevoegd !</p>";
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                        <table class="table table-striped table-bordered file-export">
                                                            <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Voornaam</th>
                                                                <th>Email</th>
                                                                <th>Telefoonnummer</th>
                                                                <th>Niveau</th>
                                                                <th>Handelingen</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            GetPersonnel();
                                                            //GetCompanyPersonneel();

                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade mt-2 show " id="Settings" role="tabpanel"
                                             aria-labelledby="account-tab">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-8 col-md-12">
                                                    <div class="card text-center">
                                                        <div class="card-header">
                                                            <h4 class="card-title success">
                                                                Bedrijfsgegevens <?= $rowC["name"]; ?></h4>
                                                            <?php
                                                            if (isset($_POST['bijwerken'])) {
                                                                echo "<p class='text-succes'>Update Succesvol!</p>";
                                                            }
                                                            ?>
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
    <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Werknemer toevoegen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <section class="users-edit">
                        <div class="row">
                            <div class="col-12">
                                    <div class="card-content">
                                        <!-- Nav-tabs -->
                                        <div class="tab-content">
                                            <!-- Account content starts -->
                                            <!-- Account content ends -->

                                            <!-- Information content starts -->
                                            <div class="tab-pane fade mt-2 show active" id="relatie_werknemers"
                                                 role="tabpanel"
                                                 aria-labelledby="account-tab">
                                                <!-- Media object starts -->
                                                <!-- Media object ends -->
                                                <form method="post">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4">
                                                            <div class="form-group">
                                                                <h4>Klantgegevens</h4>
                                                                    <div class="controls" style="display: none;">
                                                                        <label for="bedrijfsnaam">Werknemer</label>
                                                                        <input type="text" id="bedrijfsnaam"
                                                                               class="form-control round"
                                                                               pattern="[a-zA-Z\s\.0-9]{1,15}"
                                                                               readonly
                                                                               aria-invalid="false" name="bedrijfsnaam"
                                                                               value="<?php GetCompanyNamePersonnel(); ?>">
                                                                        <input type="hidden" name="membof"
                                                                               value="<?= $_GET["membof"] ?>">
                                                                    </div>
                                                                    <div class="controls">
                                                                    <label for="users-edit-username">Voornaam</label>
                                                                    <input type="text" id="users-edit-username"
                                                                           class="form-control round"
                                                                           pattern="[a-zA-Z]{1,10}"
                                                                           placeholder="Voornaam" required
                                                                           aria-invalid="false" name="voornaam">
                                                                </div>
                                                                </br>
                                                                <div class="controls">
                                                                    <label for="users-edit-username">Tussenvoegsel</label>
                                                                    <input type="text" id="users-edit-username"
                                                                           class="form-control round"
                                                                           pattern="[a-zA-Z]{1,10}"
                                                                           title="Alleen letters"
                                                                           placeholder="Tussenvoegsel"
                                                                           aria-invalid="false" name="tussenvoegsel">
                                                                </div>
                                                                </br>
                                                                <div class="controls">
                                                                    <label for="achternaam">Achternaam</label>
                                                                    <input type="text" id="achternaam"
                                                                           pattern="[a-zA-Z]{1,10}"
                                                                           title="Alleen letters"
                                                                           class="form-control round"
                                                                           placeholder="Achternaam" required
                                                                           aria-invalid="false" name="achternaam">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-4">
                                                            <div class="form-group">
                                                                <h4>Adresgegevens</h4>
                                                                <div class="controls ">
                                                                    <label for="postcode">Postcode</label>
                                                                    <input type="text" id="postcode_w"
                                                                           class="form-control round"
                                                                           pattern="[0-9]{4}[A-Za-z]{2}"
                                                                           title="Bijvoorbeeld: '1234AB'"
                                                                           placeholder="Postcode" required
                                                                           aria-invalid="false" name="postcode"
                                                                           onkeyup="check_pc(&quot;postcode&quot;,this.value)"
                                                                           autofocus="">
                                                                </div>
                                                                </br>
                                                                <div class="form-group row">
                                                                    <div class="controls col-md-6">
                                                                        <label for="huisnummer">Huisnummer</label>
                                                                        <input type="text" id="huisnr_w"
                                                                               class="form-control round"
                                                                               pattern="[0-9]{1,4}"
                                                                               title="Alleen cijfers"
                                                                               placeholder="Huisnummer" required
                                                                               aria-invalid="false" name="huisnummer"
                                                                               onkeyup="check_pc(&quot;huisnr&quot;,this.value)">
                                                                    </div>
                                                                    <div class="controls col-md-6">
                                                                        <label for="users-edit-username">toevoeging</label>
                                                                        <input type="text" id="toevoeging_w"
                                                                               class="form-control round"
                                                                               pattern="[a-zA-Z]{1,4}"
                                                                               title="Alleen letters"
                                                                               placeholder="toevoeging"
                                                                               aria-invalid="false"
                                                                               name="huisnummertoevoeging"
                                                                               onkeyup="check_pc(&quot;toevoeging&quot;,this.value)">
                                                                    </div>
                                                                </div>
                                                                <div class="controls ">
                                                                    <label for="straatnaam">Straatnaam</label>
                                                                    <input type="text" id="straat_w"
                                                                           class="form-control round"
                                                                           pattern="[a-zA-Z]{1,15}"
                                                                           title="Alleen letters"
                                                                           placeholder="Straatnaam" required
                                                                           aria-invalid="false" name="straat">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-4">
                                                            <div class="form-group">
                                                                <h4>Contactgegevens</h4>
                                                                <div class="controls">
                                                                    <label for="email">E-mail</label>
                                                                    <input type="email" id="email"
                                                                           class="form-control round"
                                                                           placeholder="Typeemail@hier.com" required
                                                                           aria-invalid="false" name="email">
                                                                </div>
                                                                </br>
                                                                <div class="controls">
                                                                    <label for="telefoonnummer">Telefoonnummer</label>
                                                                    <input type="text" id="telefoonnummer"
                                                                           class="form-control round"
                                                                           placeholder="Telefoonnummer" required
                                                                           pattern="[0-9]{1,15}"
                                                                           title="Alleen cijfers"
                                                                           aria-invalid="false"
                                                                           name="telefoonnummer">
                                                                </div>
                                                                </br>
                                                                <div class="controls">
                                                                    <label for="auth_level">Functie</label>
                                                                    <select id="auth_level" required name="keuze" class="form-control">
                                                                        <option value="" selected disabled>Select Role</option>
                                                                        <option value="Bedrijfsleider">Bedrijfsleider</option>
                                                                        <option value="Werknemer">Werknemer</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <div class="modal-footer">
                                                        <button type="reset"
                                                                data-dismiss="modal"
                                                                class="btn btn-secondary">Cancel
                                                        </button>
                                                        <input type="submit"
                                                               class="btn btn-primary mb-2 mb-sm-0 mr-sm-2"
                                                               name="registreerWerknemer"
                                                               value="Werknemer Toevoegen">
                                                    </div>
                                                </form>

                                                <!-- Account form starts -->
                                                <!-- Account form ends -->
                                            </div>
                                            <!-- Information content ends -->
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
            }					// moet minimaal 6 characters hebben
            var num_deel = pc.substr(0, 4);
            if (parseFloat(num_deel) < 1000) {
                maak_leeg();
                return;
            }	// moet minaal 1000 zijn
            var alpha_deel = pc.substr(-2);
            if (alpha_deel.charCodeAt(0) < 65 || alpha_deel.charCodeAt(0) > 122 || alpha_deel.charCodeAt(1) < 65 || alpha_deel.charCodeAt(1) > 122) {
                maak_leeg();
                return;
            } 	// DE LAATSTE 2 POSITIES MOETEN LETTERS ZIJN
            alpha_deel = alpha_deel.toUpperCase();

            // de checker niffo

            postcode = num_deel + alpha_deel;
            document.getElementById("postcode_w").value = postcode;
        }

        if (wat === "huisnr") {
            huisnr = parseFloat(waarde);
            if (!huisnr) {
                maak_leeg();
                return;
            }
            document.getElementById("huisnr_w").value = huisnr;
        }

        if (wat === "toevoeging") {
            toevoeging = waarde.trim();
            document.getElementById("toevoeging_w").value = toevoeging;
        }

        if (huisnr === 0) {
            return;
        }

        var getadrlnk = 'https://bwnr.nl/postcode.php?pc=' + postcode + '&hn=' + huisnr + '&tv=' + toevoeging + '&tg=data&ak=' + 'FbW29C_969cyVfAKrj';	// e moet uw apikey bevattten.

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function () {
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
                document.getElementById("straat_w").value = aResponse[0];
                document.getElementById("plaats_w").value = aResponse[1];
            }
        };

        xmlhttp.open("GET", getadrlnk, true);
        xmlhttp.send();
    }

    function maak_leeg() {
        document.getElementById("straat_w").value = "";
        document.getElementById("plaats_w").value = "";
    }
</script>

</body>
<!-- END : Body-->
