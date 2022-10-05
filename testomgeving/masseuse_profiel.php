<?php
include "backend/functions.php";

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
                                        <img src="img/uploads/<?=$masseuse["profielFoto"]; ?>" class="user-profile-image rounded" alt="User Profile Image" height="140" width="140">
                                    </div>
                                    <div class="user-profile-text">
                                        <h4 class="profile-text-color mb-0"><?= $masseuse["voornaam"]; ?></h4>
                                        <small>Devloper</small>
                                    </div>
                                    <!-- user profile body start -->
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="user-profile-buttons d-flex justify-content-center justify-content-sm-start">
                                                <button class="btn btn-primary mr-3">Follow</button>
                                                <button class="btn bg-light-primary">Edit</button>
                                            </div>
                                        </div>
                                        <!-- user profile body ends -->
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                    <div class="col-12">
                                        <div class="card" id="contactProfile">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h4 class="card-title m-0">Contact</h4>
                                                <span class="cursor-pointer"><i class="ft-more-vertical-"></i></span>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <p> Voornaam & achternaam: <?= $masseuse["voornaam"]; ?> <?= $masseuse["tussenvoegsel"]; ?> <?= $masseuse["achternaam"]; ?></p>
                                                    <p>Telefoonnummer: <a href="tel:<?= $masseuse["telefoon"]; ?>"><?= $masseuse["telefoon"]; ?></a> </p>
                                                    <p>Email: <a href="mailto:<?= $masseuse["email"]; ?>"><?= $masseuse["email"]; ?></a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- contact ends -->

                                    <!-- adress starts -->
                                    <div class="col-12">
                                        <div class="card" id="adressProfile">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h4 class="card-title m-0">Adress</h4>
                                                <span class="cursor-pointer"><i class="ft-more-vertical-"></i></span>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <p class="m-0">
                                                    <p>Postcode: <?= $masseuse["postcode"]; ?> <?= $masseuse["plaats"]; ?> </p>
                                                    <p>Straatnaam: <?= $masseuse["straat"]; ?> <?= $masseuse["huisNummerToevoeging"]; ?> <?= $masseuse["huisNummer"]; ?></p>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- adress ends -->

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
                                                <div class="card-body">
                                                    <p class="m-0">
                                                    <?= $masseuse["paragraafje"]; ?>
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
                                                    <h5 class="card-title mb-2">Basic Map</h5>
                                                    <div id="maps-leaflet-basic" class="maps-leaflet-container">
                                                    <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2piratebay.org">pirate bay</a><br><style>.mapouter{position:relative;text-align:right;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;}</style></div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Basic map end -->
                                </div>
                            </div>
                            <!-- 2nd column ends -->

                        </div>
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
    <script src="assets/js/profileHeight.js"></script>
    <?php
    include "partials/footer.php";
    ?>
</body>
<!-- END : Body-->

</html>