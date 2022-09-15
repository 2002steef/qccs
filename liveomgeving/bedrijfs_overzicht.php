<?php
require_once "backend/functions.php";
if (!isset($_SESSION["loggedin"])) {
    header("Location: index.php");
}
$row2 = Getuser();
if ($row2['authentication_level'] !== 'Admin') {
    if ($row2['authentication_level'] === 'Bedrijfsleider') {
        $memb_of = $row2['member_of'];
        header("Location:../bedrijfs_klanten_overzicht.php?custof=$memb_of&membof=$memb_of");
    }
    if ($row2['authentication_level'] === 'Werknemer') {
        $memb_of = $row2['member_of'];
        header("Location:../klanten_overzicht.php?custof=$memb_of&membof=$memb_of");
    }
    if ($row2['authentication_level'] === 'Admin1') {
        $memb_of = $row2['member_of'];
        header("Location:../klant_overzicht.php?custof=$memb_of&membof=$memb_of");
    }
}
InsertBedrijf();
ViewC();
editC();

// Controleer of iemand ingelogd is
?>
<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->
<head>
<?php
include "partials/header.php";
?>
</head>
<!-- END : Head-->
<!-- BEGIN : Body-->
<body class="vertical-layout vertical-menu 2-columns  navbar-sticky layout-dark layout-transparent bg-glass-1"
      data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="2-columns">
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
                            <h4 class="card-title">Bedrijfsnaam</h4>
                            <ul class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="bedrijfs_overzicht.php">CRM Relaties</a></li>
                                <li class="breadcrumb-item"></li>
                            </ul>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <section id="file-export">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item active">
                                            <a href="#Bedrijven" role="tab" id="account-tab"
                                               class="nav-link d-flex align-items-center active" data-toggle="tab"
                                               aria-controls="account" aria-selected="true">
                                                <i class="ft-user mr-1"></i>
                                                <span class="d-none d-sm-block">Bedrijven</span>
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
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade mt-2 show active" id="Bedrijven" role="tabpanel"
                                             aria-labelledby="account-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-content ">
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped table-bordered file-export">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Bedrijfsnaam</th>
                                                                            <th>Telefoonnummer</th>
                                                                            <th>Email</th>
                                                                            <th>Status</th>
                                                                            <th>Handelingen</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        GetCompany();
                                                                        ?>
                                                                        </tbody>
                                                                    </table>
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
</div>
<div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel34">Bedrijf toevoegen</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                </button>
            </div>

            <form method="post">
                <div class="modal-body">
                    <section class="users-edit">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <h4>Bedrijfsgegevens</h4>
                                    <div class="controls">
                                        <div class="controls ">
                                            <label for="bedrijfsnaam">Bedrijfsnaam</label>
                                            <input type="text" id="bedrijfsnaam"
                                                   class="form-control round" placeholder="Bedrijfsnaam"
                                                   aria-invalid="false" name="bedrijfsnaam" value="">
                                        </div>
                                        <label for="users-edit-username">Website</label>
                                        <input type="text" id="users-edit-username"
                                               class="form-control round"
                                               placeholder="Website" required
                                               aria-invalid="false" name="website">
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <h4>Adresgegevens</h4>
                                    <div class="controls ">
                                        <label for="straatnaam">Straatnaam</label>
                                        <input type="text" id="straatnaam"
                                               class="form-control round"
                                               placeholder="Straatnaam" required
                                               aria-invalid="false" name="straatnaam">
                                    </div>
                                    <div class="controls ">
                                        <label for="postcode">Postcode</label>
                                        <input type="text" id="postcode"
                                               class="form-control round"
                                               placeholder="Postcode" required
                                               aria-invalid="false" name="postcode">
                                    </div>
                                    <div class="form-group row">
                                        <div class="controls col-md-5">
                                            <label for="huisnummer">Huisnummer</label>
                                            <input type="text" id="huisnummer"
                                                   class="form-control round"
                                                   placeholder="Huisnummer" required
                                                   aria-invalid="false" name="huisnummer">
                                        </div>
                                        <div class="controls  col-md-5">
                                            <label for="users-edit-username">Toevoeging</label>
                                            <input type="text" id="users-edit-username"
                                                   class="form-control round"
                                                   placeholder="Toevoeging"
                                                   aria-invalid="false" name="huisnummertoevoeging">
                                        </div>
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
                                    <div class="controls">
                                        <label for="telefoonnummer">Telefoonnummer</label>
                                        <input type="text" id="telefoonnummer"
                                               class="form-control round"
                                               placeholder="Telefoonnummer" required
                                               aria-invalid="false"
                                               name="telefoonnummer">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-3 mt-sm-2">
                                <input type="submit"
                                       class="btn btn-primary mb-2 mb-sm-0 mr-sm-2"
                                       name="registreerBedrijf"
                                       value="Bedrijf toevoegen">

                                <button type="reset"
                                        data-dismiss="modal"
                                        class="btn btn-secondary">Cancel
                                </button>
                            </div>
                        </div>
                    </section>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include "partials/footer.php";
?>
</body>