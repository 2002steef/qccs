<?php
include "backend/functions.php";

?>
<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<?php
include "partials/header.php";
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
                                    <div class="card-header">Klantgegevens bewerken</div>
                                    <div class="card-body">
                                        <!-- Nav-tabs -->

                                        <!-- Account content starts -->
                                        <!-- Account form starts -->
                                        <?php
                                        if (isset($_GET["klant"])) {
                                            if ($_GET["klant"] = "Z") {
                                                global $mysqli;
                                                $sql = 'SELECT * FROM `customers_business` WHERE id = ?';
                                                $stmt = $mysqli->prepare($sql);
                                                $stmt->bind_param("s", $_GET["id"]);
                                                $stmt->execute();
                                                $row = $stmt->get_result();
                                                while ($result = $row->fetch_assoc()) {
                                                    $id = $result['id'];
                                                    $voornaam = $result['first_name'];
                                                    $tussenvoegsel = $result["last_name_prefix"];
                                                    $achternaam = $result['last_name'];
                                                    $email = $result['email'];
                                                    $telefoonnummer = $result['phoneNumber'];
                                                    $straatnaam = $result['street'];
                                                    $huisnummer = $result['housenumber'];
                                                    $huisnummertoevoeging = $result['housenumberAddition'];
                                                    $postcode = $result['postalcode'];
                                                    $bedrijfsnaam = $result["business"];
													$status = $result["status"];
                                                    ?>
                                                    <form method="post">
                                                        <div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <h4>Klantgegevens</h4>
                                                                    <div class="controls">
                                                                        <label for="users-edit-username">Voornaam</label>
                                                                        <input type="text"
                                                                               id="users-edit-username"
                                                                               class="form-control round"
                                                                               placeholder="Voornaam" required
                                                                               aria-invalid="false"
                                                                               name="voornaam_z"
                                                                               value="<?= $voornaam ?>">
                                                                        <input type="hidden" value="<?= $id ?>"
                                                                               name="id_z">
                                                                    </div>
                                                                    <div class="controls">
                                                                        <label for="tussenvoegsel">Tussenvoegsel</label>
                                                                        <input type="text"
                                                                               id="tussenvoegsel"
                                                                               class="form-control round"
                                                                               placeholder="Tussenvoegsel"
                                                                               aria-invalid="false"
                                                                               name="tussenvoegsel_z"
                                                                               value="<?= $tussenvoegsel ?>">
                                                                    </div>
                                                                    <div class="controls">
                                                                        <label for="achternaam">Achternaam</label>
                                                                        <input type="text" id="achternaam"
                                                                               class="form-control round"
                                                                               placeholder="Achternaam" required
                                                                               aria-invalid="false"
                                                                               name="achternaam_z"
                                                                               value="<?= $achternaam ?>">
                                                                    </div>
                                                                    <div class="controls">
                                                                        <label for="users-edit-email">E-mail</label>
                                                                        <input type="email"
                                                                               id="users-edit-email"
                                                                               class="form-control round"
                                                                               placeholder="Typeemail@hier.com"
                                                                               required
                                                                               aria-invalid="false"
                                                                               name="email_z"
                                                                               value="<?= $email ?>">
                                                                    </div>
                                                                    <div class="controls">
                                                                        <label for="telefoonnummer">Telefoonnummer</label>
                                                                        <input type="text" id="telefoonnummer"
                                                                               class="form-control round"
                                                                               placeholder="Telefoonnummer"
                                                                               required
                                                                               aria-invalid="false"
                                                                               name="telefoonnummer_z"
                                                                               value="<?= $telefoonnummer ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <h4>Adresgegevens</h4>
                                                                    <div class="controls ">
                                                                        <label for="users-edit-username">Straatnaam</label>
                                                                        <input type="text"
                                                                               id="users-edit-username"
                                                                               class="form-control round"
                                                                               placeholder="Straatnaam" required
                                                                               aria-invalid="false"
                                                                               name="straatnaam_z"
                                                                               value="<?= $straatnaam ?>">
                                                                    </div>
                                                                    <div class="controls">
                                                                        <label for="users-edit-username">Huisnummer</label>
                                                                        <input type="text"
                                                                               id="users-edit-username"
                                                                               class="form-control round"
                                                                               placeholder="Huisnummer" required
                                                                               aria-invalid="false"
                                                                               name="huisnummer_z"
                                                                               value="<?= $huisnummer ?>">
                                                                    </div>
                                                                    <div class="controls">
                                                                        <label for="users-edit-username">Huisnummertoevoeging</label>
                                                                        <input type="text"
                                                                               id="users-edit-username"
                                                                               class="form-control round"
                                                                               placeholder="Huisnummer" required
                                                                               aria-invalid="false"
                                                                               name="huisnummertoevoeging_z"
                                                                               value="<?= $huisnummertoevoeging ?>">
                                                                    </div>
                                                                    <div class="controls ">
                                                                        <label for="users-edit-username">Postcode</label>
                                                                        <input type="text"
                                                                               id="users-edit-username"
                                                                               class="form-control round"
                                                                               placeholder="Postcode" required
                                                                               aria-invalid="false"
                                                                               name="postcode_z"
                                                                               value="<?= $postcode ?>">
                                                                    </div>
                                                                    <div class="controls ">
                                                                        <label for="bedrijfsnaam">Bedrijfsnaam</label>
                                                                        <input type="text"
                                                                               id="bedrijfsnaam"
                                                                               class="form-control round"
                                                                               placeholder="Bedrijfsnaam" required
                                                                               aria-invalid="false"
                                                                               name="bedrijfsnaam"
                                                                               value="<?= $bedrijfsnaam ?>">
                                                                    </div>
																	    <div class="controls">
                                                                        <label for="users-edit-status">Status</label>
                                                                        <select name="status" class="form-control">
                                                                            <option value="<?=$status?>" hidden selected><?=$status?></option>
                                                                            <option value="Actief">Actief</option>
                                                                            <option value="Inactief">Inactief</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-3 mt-sm-2">
                                                                <input type="submit"
                                                                       class="btn btn-primary mb-2 mb-sm-0 mr-sm-2 auto-close"
                                                                       name="saveBusiness"
                                                                       value="Relatie Bewerken">

                                                                <button type="reset"
                                                                        onclick="window.history.go(-2); return false;"
                                                                        class="btn btn-secondary">
                                                                    Cancel
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </form>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                        <!-- Account form ends -->
                                        <!-- Account content ends -->

                                        <!-- Information content starts -->
                                        <!-- Media object starts -->
                                        <?php
                                        if (isset($_GET["klant"])) {
                                            if ($_GET["klant"] = "P") {
                                                global $mysqli;
                                                $sql_P = 'SELECT * FROM `customers_individual` WHERE id = ?';
                                                $stmt = $mysqli->prepare($sql_P);
                                                $stmt->bind_param("s", $_GET["id"]);
                                                $stmt->execute();
                                                $row = $stmt->get_result();
                                                while ($result = $row->fetch_assoc()) {
                                                    $id = $result['id'];
                                                    $voornaam = $result['first_name'];
                                                    $tussenvoegsel = $result["last_name_prefix"];
                                                    $achternaam = $result['last_name'];
                                                    $email = $result['email'];
                                                    $telefoonnummer = $result['phoneNumber'];
                                                    $straatnaam = $result['street'];
                                                    $huisnummer = $result['housenumber'];
                                                    $postcode = $result['postalcode'];
													$status = $result['status'];
                                                    $klant_van = $result["customer_of"];
                                                    ?>
                                                    <form method="post">
                                                        <div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <h4>Klantgegevens</h4>
                                                                    <div class="controls">
                                                                        <label for="users-edit-username">Voornaam</label>
                                                                        <input type="text"
                                                                               id="users-edit-username"
                                                                               class="form-control round"
                                                                               placeholder="Voornaam" required
                                                                               aria-invalid="false"
                                                                               name="voornaam_p"
                                                                               value="<?= $voornaam ?>">
                                                                        <input type="hidden" value="<?= $id ?>"
                                                                               name="id_p">
                                                                    </div>
                                                                    <div class="controls">
                                                                        <label for="tussenvoegsel">Tussenvoegsel</label>
                                                                        <input type="text"
                                                                               id="tussenvoegsel"
                                                                               class="form-control round"
                                                                               placeholder="Tussenvoegsel"
                                                                               aria-invalid="false"
                                                                               name="tussenvoegsel_p"
                                                                               value="<?= $tussenvoegsel ?>">
                                                                    </div>
                                                                    <div class="controls">
                                                                        <label for="achternaam">Achternaam</label>
                                                                        <input type="text" id="achternaam"
                                                                               class="form-control round"
                                                                               placeholder="Achternaam" required
                                                                               aria-invalid="false"
                                                                               name="achternaam_p"
                                                                               value="<?= $achternaam ?>">
                                                                    </div>
                                                                    <div class="controls">
                                                                        <label for="users-edit-email">E-mail</label>
                                                                        <input type="email"
                                                                               id="users-edit-email"
                                                                               class="form-control round"
                                                                               placeholder="Typeemail@hier.com"
                                                                               required
                                                                               aria-invalid="false"
                                                                               name="email_p"
                                                                               value="<?= $email ?>">
                                                                    </div>
                                                                    <div class="controls">
                                                                        <label for="telefoonnummer">Telefoonnummer</label>
                                                                        <input type="text" id="telefoonnummer"
                                                                               class="form-control round"
                                                                               placeholder="Telefoonnummer"
                                                                               required
                                                                               aria-invalid="false"
                                                                               name="telefoonnummer_p"
                                                                               value="<?= $telefoonnummer ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                    <h4>Adresgegevens</h4>
                                                                    <div class="controls ">
                                                                        <label for="users-edit-username">Straatnaam</label>
                                                                        <input type="text"
                                                                               id="users-edit-username"
                                                                               class="form-control round"
                                                                               placeholder="Straatnaam" required
                                                                               aria-invalid="false"
                                                                               name="straatnaam_p"
                                                                               value="<?= $straatnaam ?>">
                                                                    </div>
                                                                    <div class="controls">
                                                                        <label for="users-edit-username">Huisnummer</label>
                                                                        <input type="text"
                                                                               id="users-edit-username"
                                                                               class="form-control round"
                                                                               placeholder="Huisnummer" required
                                                                               aria-invalid="false"
                                                                               name="huisnummer_p"
                                                                               value="<?= $huisnummer ?>">
                                                                    </div>
                                                                    <div class="controls ">
                                                                        <label for="users-edit-username">Postcode</label>
                                                                        <input type="text"
                                                                               id="users-edit-username"
                                                                               class="form-control round"
                                                                               placeholder="Postcode" required
                                                                               aria-invalid="false"
                                                                               name="postcode_p"
                                                                               value="<?= $postcode ?>">
                                                                    </div>
                                                                    <div class="controls">
                                                                        <label for="users-edit-status">Status</label>
                                                                        <select name="status" class="form-control">
                                                                            <option value="<?=$status?>" hidden selected><?=$status?></option>
                                                                            <option value="Actief">Actief</option>
                                                                            <option value="Inactief">Inactief</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-3 mt-sm-2">
                                                                <input type="submit"
                                                                       class="btn btn-primary mb-2 mb-sm-0 mr-sm-2"
                                                                       name="saveIndividual"
                                                                       value="Relatie Bewerken">
                                                                <button type="reset"
                                                                        onclick="window.history.go(-2); return false;"
                                                                        class="btn btn-secondary">
                                                                    Cancel
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </form>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
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
