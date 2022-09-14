<?php
include "backend/functions.php";

?>
<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<?php
include "partials/header.php";
?>

<?php
require_once('backend/Klant_toevoegen.php');

$users = new userActions();

?>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 2-columns  navbar-static layout-dark layout-transparent bg-glass-1"
      data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="2-columns">


<!-- Navbar (Header) Ends-->

<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="wrapper">


    <!-- main menu-->
    <?php
    include "partials/navbar.php";
    ?>
    <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <section class="users-edit">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- Nav-tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a href="#Particulier" role="tab" id="account-tab"
                                                   class="nav-link d-flex align-items-center active" data-toggle="tab"
                                                   aria-controls="account" aria-selected="true">
                                                    <i class="ft-user mr-1"></i>
                                                    <span class="d-none d-sm-block">Particulier</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#Zakelijk" role="tab" id="information-tab"
                                                   class="nav-link d-flex align-items-center" data-toggle="tab"
                                                   aria-controls="information" aria-selected="false">
                                                    <i class="ft-info mr-1"></i>
                                                    <span class="d-none d-sm-block">Zakelijk</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <!-- Account content starts -->
                                            <div class="tab-pane fade mt-2 show active" id="Particulier" role="tabpanel"
                                                 aria-labelledby="account-tab">
                                                <!-- Account form starts -->
                                                <form method="post">
                                                    <div>
                                                        <?php
                                                        if (isset($_POST['registreerParticulierr'])) {
                                                            if (isset($_GET['token'])) {
                                                                global $mysqli;
                                                                $token = $_GET['token'];
                                                                $stmt = $mysqli->prepare("SELECT * FROM `token` WHERE token = ?");
                                                                $stmt->bind_param("s", $token);
                                                                $stmt->execute();
                                                                $stmt->store_result();
                                                                $stmt->bind_result($id,$token_check);  // number of arguments must match columns in SELECT
                                                                if ($token_check){
                                                                    $stmt_d = $mysqli->prepare("DELETE FROM token WHERE token = ?");
                                                                    $stmt_d->bind_param("s", $token);
                                                                    $stmt_d->execute();
                                                                    echo $users->registerUsersP($_POST['voornaam_p'],$_POST['tussenvoegsel_p'], $_POST['achternaam_p'], $_POST['straatnaam_p'], $_POST['huisnummer_p'], $_POST['postcode_p'], $_POST['telefoonnummer_p'], $_POST['email_p'], $_GET['membof']);
                                                                    echo "<p class='text-success'>Relatie succesvol toegevoegd !</p>";
                                                                }else {
                                                                    echo "<p class='text-danger'>Token is niet meer geldig !</p>";
                                                                }
                                                            }
                                                        }
                                                        if (isset($_POST['registreerZakelijkk'])) {
                                                            if (isset($_GET['token'])) {
                                                                global $mysqli;
                                                                $token = $_GET['token'];
                                                                $stmt = $mysqli->prepare("SELECT * FROM `token` WHERE token = ?");
                                                                $stmt->bind_param("s", $token);
                                                                $stmt->execute();
                                                                $stmt->store_result();
                                                                $stmt->bind_result($id,$token_check);  // number of arguments must match columns in SELECT
                                                                if ($token_check){
                                                                    $stmt_d = $mysqli->prepare("DELETE FROM token WHERE token = ?");
                                                                    $stmt_d->bind_param("s", $token);
                                                                    $stmt_d->execute();
                                                                    echo $users->registerUsersZ($_POST['voornaam_z'],$_POST['tussenvoegsel_z'], $_POST['achternaam_z'], $_POST['straatnaam_z'], $_POST['huisnummer_z'], $_POST['postcode_z'], $_POST['telefoonnummer_z'], $_POST['email_z'], $_POST['bedrijfsnaam'], $_GET['membof']);
                                                                    echo "<p class='text-success'>Relatie succesvol toegevoegd !</p>";
                                                                }else {
                                                                    echo "<p class='text-danger'>Token is niet meer geldig !</p>";
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <h4>Klantgegevens</h4>
                                                                <div class="controls">
                                                                    <label for="users-edit-username">Voornaam</label>
                                                                    <input type="text" id="users-edit-username"
                                                                           class="form-control round"
                                                                           placeholder="Voornaam" required
                                                                           aria-invalid="false" name="voornaam_p">
                                                                </div>
                                                                <div class="controls">
                                                                    <label for="tussenvoegsel">Tussenvoegsel</label>
                                                                    <input type="text" id="tussenvoegsel"
                                                                           class="form-control round"
                                                                           placeholder="Tussenvoegsel" required
                                                                           aria-invalid="false" name="tussenvoegsel_p">
                                                                </div>
                                                                <div class="controls">
                                                                    <label for="achternaam">Achternaam</label>
                                                                    <input type="text" id="achternaam"
                                                                           class="form-control round"
                                                                           placeholder="Achternaam" required
                                                                           aria-invalid="false" name="achternaam_p">
                                                                </div>
                                                                <div class="controls">
                                                                    <label for="users-edit-email">E-mail</label>
                                                                    <input type="email" id="users-edit-email"
                                                                           class="form-control round"
                                                                           placeholder="Typeemail@hier.com" required
                                                                           aria-invalid="false" name="email_p">
                                                                </div>
                                                                <div class="controls">
                                                                    <label for="telefoonnummer">Telefoonnummer</label>
                                                                    <input type="text" id="telefoonnummer"
                                                                           class="form-control round"
                                                                           placeholder="Telefoonnummer" required
                                                                           aria-invalid="false" name="telefoonnummer_p">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <h4>Adresgegevens</h4>
                                                                <div class="controls ">
                                                                    <label for="users-edit-username">Straatnaam</label>
                                                                    <input type="text" id="users-edit-username"
                                                                           class="form-control round"
                                                                           placeholder="Straatnaam" required
                                                                           aria-invalid="false" name="straatnaam_p">
                                                                </div>
                                                                <div class="controls">
                                                                    <label for="users-edit-username">Huisnummer</label>
                                                                    <input type="text" id="users-edit-username"
                                                                           class="form-control round"
                                                                           placeholder="Huisnummer" required
                                                                           aria-invalid="false" name="huisnummer_p">
                                                                </div>
                                                                <div class="controls ">
                                                                    <label for="users-edit-username">Postcode</label>
                                                                    <input type="text" id="users-edit-username"
                                                                           class="form-control round"
                                                                           placeholder="Postcode" required
                                                                           aria-invalid="false" name="postcode_p">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-3 mt-sm-2">
                                                            <input type="submit"
                                                                   class="btn btn-primary mb-2 mb-sm-0 mr-sm-2"
                                                                   name="registreerParticulierr"
                                                                   value="Relatie Toevoegen">

                                                            <button type="reset" onclick="window.history.go(-1); return false;" class="btn btn-secondary">Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- Account form ends -->
                                            </div>
                                            <!-- Account content ends -->

                                            <!-- Information content starts -->
                                            <div class="tab-pane fade mt-2 show" id="Zakelijk" role="tabpanel"
                                                 aria-labelledby="Zakelijk-tab">
                                                <!-- Media object starts -->
                                                <!-- Media object ends -->
                                                <form method="post">
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
                                                            }
                                                            if ($_GET["toevoegenZak"] == "succes") {
                                                                echo "<p class='text-success'>Relatie succesvol toegevoegd !</p>";
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <h4>Klantgegevens</h4>
                                                                <div class="controls">
                                                                    <label for="users-edit-username">Voornaam</label>
                                                                    <input type="text" id="users-edit-username"
                                                                           class="form-control round"
                                                                           placeholder="Voornaam" required
                                                                           aria-invalid="false" name="voornaam_z">
                                                                </div>
                                                                <div class="controls">
                                                                    <label for="tussenvoegsel">Tussenvoegsel</label>
                                                                    <input type="text" id="tussenvoegsel"
                                                                           class="form-control round"
                                                                           placeholder="Tussenvoegsel" required
                                                                           aria-invalid="false" name="tussenvoegsel_z">
                                                                </div>
                                                                <div class="controls">
                                                                    <label for="achternaam">Achternaam</label>
                                                                    <input type="text" id="achternaam"
                                                                           class="form-control round"
                                                                           placeholder="Achternaam" required
                                                                           aria-invalid="false" name="achternaam_z">
                                                                </div>
                                                                <div class="controls">
                                                                    <label for="email">E-mail</label>
                                                                    <input type="email" id="email"
                                                                           class="form-control round"
                                                                           placeholder="Typeemail@hier.com" required
                                                                           aria-invalid="false" name="email_z">
                                                                </div>
                                                                <div class="controls">
                                                                    <label for="telefoonnummer">Telefoonnummer</label>
                                                                    <input type="text" id="telefoonnummer"
                                                                           class="form-control round"
                                                                           placeholder="Telefoonnummer" required
                                                                           aria-invalid="false" name="telefoonnummer_z">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <h4>Adresgegevens</h4>
                                                                <div class="controls ">
                                                                    <label for="straatnaam">Straatnaam</label>
                                                                    <input type="text" id="straatnaam"
                                                                           class="form-control round"
                                                                           placeholder="Straatnaam" required
                                                                           aria-invalid="false" name="straatnaam_z">
                                                                </div>
                                                                <div class="controls">
                                                                    <label for="huisnummer">Huisnummer</label>
                                                                    <input type="text" id="huisnummer"
                                                                           class="form-control round"
                                                                           placeholder="Huisnummer" required
                                                                           aria-invalid="false" name="huisnummer_z">
                                                                </div>
                                                                <div class="controls ">
                                                                    <label for="postcode">Postcode</label>
                                                                    <input type="text" id="postcode"
                                                                           class="form-control round"
                                                                           placeholder="Postcode" required
                                                                           aria-invalid="false" name="postcode_z">
                                                                </div>
                                                                <div class="controls ">
                                                                    <label for="bedrijfsnaam">Bedrijfsnaam</label>
                                                                    <input type="text" id="bedrijfsnaam"
                                                                           class="form-control round"
                                                                           placeholder="Bedrijfsnaam" required
                                                                           aria-invalid="false" name="bedrijfsnaam">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-3 mt-sm-2">
                                                            <input type="submit"
                                                                   class="btn btn-primary mb-2 mb-sm-0 mr-sm-2"
                                                                   name="registreerZakelijkk"
                                                                   value="Relatie Toevoegen">

                                                            <button type="reset" onclick="window.history.go(-1); return false;" class="btn btn-secondary">Cancel
                                                            </button>
                                                        </div>
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
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- END : End Main Content-->

        <!-- BEGIN : Footer-->
        <?php
        include "partials/footer.php";
        ?>
        <!-- End : Footer-->
        <!-- Scroll to top button -->
        <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>

    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- END: Custom CSS-->
</body>
<!-- END : Body-->

</html>
