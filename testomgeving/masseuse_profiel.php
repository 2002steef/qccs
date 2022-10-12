<?php
include "backend/functions.php";
UpdateMasseuse();
$masseuse = GetMasseuse();
?>
<!DOCTYPE html>
<html class="loading" lang="en">
<?php
include "partials/header.php";
?>
<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 2-columns navbar-static" data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="2-columns">
    <?php
    include "partials/navbar.php";
    ?>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
        <div class="main-panel">
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    <section class="page-user-profile">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="user-profile-images">
                                        <!-- user timeline image -->
                                        <img src="img/banner/profile-image.jpg" class="img-fluid rounded-top user-timeline-image" alt="User Timeline Image">
                                        <!-- user profile image -->
                                        <img src="img/uploads/<?= $masseuse["profielFoto"]; ?>" class="user-profile-image rounded" alt="User Profile Image" height="140" width="140">
                                    </div>
                                    <div class="user-profile-text">
                                        <h4 class="profile-text-color mb-0"><?= $masseuse["voornaam"]; ?></h4>
                                        <small><?= $masseuse["plaats"]; ?></small>
                                    </div>
                                    <!-- user profile body start -->
                                    <div class="card-content">
                                        <div class="card-body">

                                            <div class="user-profile-buttons d-flex justify-content-center justify-content-sm-start">
                                                <?php if (isset($_SESSION["status"]) && $_SESSION["status"] == "masseuse") { ?>
                                                    <button hidden class="btn bg-light-primary" id="btnEditMasseuse" onclick="ClickEdit();">Edit</button>
                                                    <button class="btn bg-light-primary" name="btnSaveMasseuse" id="btnSaveMasseuse" onclick="ButtonShower();">Opslaan</button>
                                                <?php } elseif (isset($_SESSION["status"]) && $_SESSION["status"] == "medewerker") { ?>
                                                    <button class="btn bg-light-primary" id="btnAfspraak" onclick="">Afspraak Maken</button>
                                                <?php  } ?>
                                            </div>


                                        </div>
                                        <!-- user profile body ends -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="" id="editMasseuseForm" class="form-control-plaintext">

                            <!-- Profile posts and info starts -->
                            <div class="row profile-info-posts">
                                <!-- 1st column starts -->
                                <div class="col-lg-4 col-12">
                                    <div class="row">
                                        <!-- Info starts -->
                                        <div class="col-12">
                                            <div class="card" id="masseuseSkills">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <h4 class="card-title m-0">skills / diensten</h4>
                                                    <span class="cursor-pointer"><i class="ft-more-vertical-"></i></span>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <ul class="list-unstyled mb-0">
                                                            <li class="d-flex align-items-center">
                                                                <span>body to body massage</span>
                                                            </li>
                                                            <li class="d-flex align-items-center">
                                                                <span>deep tissue</span>
                                                            </li>
                                                            <li class="d-flex align-items-center">
                                                                <span>massage3</span>
                                                            </li>
                                                            <li class="d-flex align-items-center">
                                                                <span>nog een massage</span>
                                                            </li>
                                                            <li class="d-flex align-items-center">
                                                                <span>body to body massage</span>
                                                            </li>
                                                            <li class="d-flex align-items-center">
                                                                <span>deep tissue</span>
                                                            </li>
                                                            <li class="d-flex align-items-center">
                                                                <span>massage3</span>
                                                            </li>
                                                            <li class="d-flex align-items-center">
                                                                <span>nog een massage</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Info ends -->
                                        <!-- contact starts -->
                                        <div class="col-12 row" id="contactProfile">
                                            <div class="card"   >
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <h4 class="card-title m-0">Contact</h4>
                                                    <span class="cursor-pointer"><i class="ft-more-vertical-"></i></span>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <input type="hidden" value="<?= $masseuse["masseuseID"] ?>" name="masseuseID">
                                                        <P>Contact persoon :
                                                            <br>
                                                            <?= $masseuse["voornaam"]; ?> <?= $masseuse["tussenvoegsel"]; ?> <?= $masseuse["achternaam"]; ?>
                                                        </p>
                                                        <p>Telefoonnummer:
                                                            <br>
                                                            <a href="tel:+<?= $masseuse["telefoon"]; ?>"><?= $masseuse["telefoon"]; ?></a>
                                                        </p>
                                                        <p>Email:
                                                            <br>
                                                            <a href="mailto:<?= $masseuse["email"]; ?>"><?= $masseuse["email"]; ?></a>
                                                        </p>
                                                        <p>Adres :
                                                            <br>
                                                            <?= $masseuse["straat"] . " " . $masseuse["huisNummer"] . " " . $masseuse["huisNummerToevoeging"]; ?>
                                                            <br>
                                                            <?= $masseuse["postcode"] . " " . $masseuse["plaats"]; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- contact ends -->
                                    </div>
                                </div>
                                <!-- 1st column ends -->
                                <!-- 2nd column starts -->
                                <div class="col-lg-8 col-12">
                                    <div class="row">

                                        <!-- About company starts -->
                                        <div class="col-12">

                                            <div class="card" id="aboutCompany">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <h4 class="card-title m-0">About</h4>
                                                    <span class="cursor-pointer"><i class="ft-more-vertical-"></i></span>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body hidescroll">
                                                        <p class="m-0">
                                                            <textarea rows="6" type="text" id="editMasseuseParagraafje" class=" form-control-plaintext txtarea" readonly><?= $masseuse["paragraafje"]; ?> </textarea>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- About company ends -->
                                        <!-- Basic map start -->
                                        <div class="col-12">
                                            <div class="card" id="profileMap">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-2">Locatie</h5>
                                                        <div class="mapouter">
                                                            <iframe src="<?= $masseuse["maps"] ?>" width="750" height="425" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Basic map end -->
                                        </div>
                                    </div>
                                    <!-- 2nd column ends -->
                                </div>
                        </form>
                        <!-- Profile posts and info ends -->
                    </section>
                </div>
            </div>
            <!-- END : End Main Content-->
            <!-- Scroll to top button -->
            <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>
        </div>
    </div>

    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/editMasseuse.js"></script>
    <script src="assets/js/profileHeight.js"></script>

    <?php
    include "partials/footer.php";
    ?>
</body>
<!-- END : Body-->

</html>