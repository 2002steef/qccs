<?php
include "backend/functions.php";
?>
<!DOCTYPE html>
<html class="loading" lang="en">
<?php
include "partials/header.php";
?>
<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 2-columns menu-collapsed nav-collapsed navbar-static layout-dark layout-transparent bg-glass-1" data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="2-columns">
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
                                        <img src="img/portrait/small/avatar-s-20.png" class="user-profile-image rounded" alt="User Profile Image" height="140" width="140">
                                    </div>
                                    <div class="user-profile-text">
                                        <h4 class="profile-text-color mb-0">Martina Ash</h4>
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
                            <div class="col-lg-3 col-12">
                                <div class="row">
                                    <!-- About starts -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h4 class="card-title m-0">About</h4>
                                                <span class="cursor-pointer"><i class="ft-more-vertical-"></i></span>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <p class="m-0">Ice cream sweet chupa chups oat cake croissant halvah cake. Halvah macaroon jelly-o gingerbread cheesecake carrot cake. Muffin donut ice cream brownie cheesecake halvah... <a href="javascript:;">MORE</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- About ends -->

                                    <!-- Info starts -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h4 class="card-title m-0">Info</h4>
                                                <span class="cursor-pointer"><i class="ft-more-vertical-"></i></span>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="d-flex align-items-center">
                                                            <i class="ft-briefcase mr-2 cursor-pointer"></i><span>UX Designer at <a href="https://pixinvent.com/" target="_blank">PIXINVENT</a></span>
                                                        </li>
                                                        <li class="d-flex align-items-center">
                                                            <i class="ft-briefcase mr-2 cursor-pointer"></i><span>Former UI Designer at <a href="javascript:;">CBI</a></span>
                                                        </li>
                                                        <li class="d-flex align-items-center">
                                                            <i class="ft-file-text mr-2 cursor-pointer"></i><span>Studied <a href="javascript:;">IT science</a> at <a href="javascript:;">Torronto</a></span>
                                                        </li>
                                                        <li class="d-flex align-items-center">
                                                            <i class="ft-file-text mr-2 cursor-pointer"></i><span>Studied at <a href="javascript:;">College of New Jersey</a></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Info ends -->

                                    <!-- Followers starts -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body d-flex justify-content-between">
                                                    <div class="followers-posts text-center">
                                                        <h4 class="m-0">400</h4>
                                                        <small class="text-muted">Posts</small>
                                                    </div>
                                                    <div class="followers text-center">
                                                        <h4 class="m-0">194k</h4>
                                                        <small class="text-muted">Followers</small>
                                                    </div>
                                                    <div class="followers-following text-center">
                                                        <h4 class="m-0">248</h4>
                                                        <small class="text-muted">Following</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Followers ends -->

                                    <!-- Skills starts -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Skills</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <span class="badge badge-pill bg-light-primary mr-1 mb-1">Product Design</span>
                                                    <span class="badge badge-pill bg-light-secondary mr-1 mb-1">Technology</span>
                                                    <span class="badge badge-pill bg-light-warning mr-1 mb-1">Wordpress</span>
                                                    <span class="badge badge-pill bg-light-info mr-1 mb-1">Sketch</span>
                                                    <span class="badge badge-pill bg-light-danger mr-1 mb-1">Mobile App</span>
                                                    <span class="badge badge-pill bg-light-primary mr-1 mb-1">UI</span>
                                                    <span class="badge badge-pill bg-light-secondary mr-1 mb-1">UX</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Skills ends -->

                                    <!-- Friends starts -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h4 class="card-title m-0">Friends</h4>
                                                <a href="javascript:;">See All</a>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <img src="img/portrait/small/avatar-s-15.png" alt="" class="img-fluid avatar mb-1 mr-1" width="35" height="35">
                                                    <img src="/portrait/small/avatar-s-10.png" alt="" class="img-fluid avatar mb-1 mr-1" width="35" height="35">
                                                    <img src="img/portrait/small/avatar-s-11.png" alt="" class="img-fluid avatar mb-1 mr-1" width="35" height="35">
                                                    <img src="img/portrait/small/avatar-s-9.png" alt="" class="img-fluid avatar mb-1 mr-1" width="35" height="35">
                                                    <img src="img/portrait/small/avatar-s-24.png" alt="" class="img-fluid avatar mb-1 mr-1" width="35" height="35">
                                                    <img src="img/portrait/small/avatar-s-19.png" alt="" class="img-fluid avatar mb-1 mr-1" width="35" height="35">
                                                    <img src="img/portrait/small/avatar-s-26.png" alt="" class="img-fluid avatar mb-1" width="35" height="35">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Friends ends -->
                                </div>
                            </div>
                            <!-- 1st column ends -->
                            <!-- 2nd column starts -->
                            <div class="col-lg-6 col-12">
                                <div class="row">
                                    <!-- Post starts -->
                                    <div class="col-12">
                                        <div class="card profile-post overflow-hidden">
                                            <img src="img/banner/banner-15.jpg" class="img-fluid profile-post-img" alt="Post Image">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <h5 class="primary">User Friendly</h5>
                                                    <h4>Time to break up with your web host</h4>
                                                    <p class="m-0">Gummi bears gummi bears cake jelly-o. Bear claw marshmallow lemon drops biscuit caramels. Tart jelly-o muffin. Toffee pie cheesecake apple pie sesame snaps. Candy canes candy canes dragée chocolate pudding. Soufflé chocolate bar pastry jujubes.</p>
                                                    <div class="media d-flex align-items-center pb-0">
                                                        <img src="img/portrait/small/avatar-s-11.png" class="mr-2 avatar" alt="Avatar" height="40" width="40">
                                                        <div class="media-body">
                                                            <h5 class="m-0">David Carter</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Post ends -->

                                    <!-- Profile Slider starts -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-2">Stories</h5>
                                                    <div class="user-profile-stories swiper-container pt-1">
                                                        <div class="swiper-wrapper">
                                                            <div class="swiper-slide">
                                                                <img src="img/profile/profile-portrait-1.jpg" class="rounded user-profile-stories-image" alt="story-image-1">
                                                                <div class="card-img-overlay bg-overlay">
                                                                    <div class="user-swiper-text">devine_lena</div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <img src="img/profile/profile-portrait-2.jpg" class="rounded user-profile-stories-image" alt="story-image-2">
                                                                <div class="card-img-overlay bg-overlay">
                                                                    <div class="user-swiper-text">ureka_23</div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <img src="img/profile/profile-portrait-3.jpg" class="rounded user-profile-stories-image" alt="story-image-3">
                                                                <div class="card-img-overlay bg-overlay">
                                                                    <div class="user-swiper-text">venice_like852</div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <img src="img/profile/profile-portrait-6.jpg" class="rounded user-profile-stories-image" alt="story-image-4">
                                                                <div class="card-img-overlay bg-overlay">
                                                                    <div class="user-swiper-text">june5211</div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <img src="img/profile/profile-portrait-7.jpg" class="rounded user-profile-stories-image" alt="story-image-5">
                                                                <div class="card-img-overlay bg-overlay">
                                                                    <div class="user-swiper-text">defloya_456</div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <img src="img/profile/profile-portrait-8.jpg" class="rounded user-profile-stories-image" alt="story-image-6">
                                                                <div class="card-img-overlay bg-overlay">
                                                                    <div class="user-swiper-text">allen5196</div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <img src="img/profile/profile-portrait-9.jpg" class="rounded user-profile-stories-image" alt="story-image-7">
                                                                <div class="card-img-overlay bg-overlay">
                                                                    <div class="user-swiper-text">cecilia_698</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Profile Slider ends -->

                                    <!-- Job History starts -->
                                    <div class="col-12">
                                        <div class="card profile-job-history">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="d-sm-flex justify-content-between align-items-center mb-2">
                                                                <div class="d-flex">
                                                                    <img src="img/portrait/small/avatar-s-10.png" class="avatar mr-3" alt="Avatar" width="50" height="50">
                                                                    <div class="align-self-center">
                                                                        <h6 class="m-0">UX Designer</h6>
                                                                        <small class="text-muted font-small-2">PIXINVENT</small>
                                                                    </div>
                                                                </div>
                                                                <div class="text-muted cursor-pointer mt-2 mt-sm-0"><i class="ft-map-pin"></i> New York, USA</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <p>Cookie cake cupcake jelly marzipan cake cookie bonbon. Liquorice lollipop danish liquorice. Caramels dragée candy tootsie roll tart icing chocolate cake. Cake chocolate bar sweet biscuit bear claw.</p>
                                                            <h6>Media Files (2)</h6>
                                                            <table class="table table-borderless">
                                                                <tr>
                                                                    <td class="pl-0 py-0 pr-1"><img src="img/banner/banner-28.jpg" class="img-fluid" alt="Pic1"></td>
                                                                    <td class="pr-0 py-0 pl-1"><img src="img/banner/banner-24.jpg" class="img-fluid" alt="Pic2"></td>
                                                                </tr>
                                                            </table>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="d-sm-flex justify-content-between align-items-center mb-2">
                                                                <div class="d-flex">
                                                                    <img src="img/icons/sketch-mac-icon.png" class="mr-3" alt="Avatar" width="50" height="50">
                                                                    <div class="align-self-center">
                                                                        <h6 class="m-0">Lead Designer</h6>
                                                                        <small class="text-muted font-small-2">Sketch App</small>
                                                                    </div>
                                                                </div>
                                                                <div class="text-muted cursor-pointer mt-2 mt-sm-0"><i class="ft-map-pin"></i> London, UK</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <p>Lemon drops apple pie tart sweet roll gummi bears caramels tart. Powder sweet powder chocolate brownie. Cupcake fruitcake chocolate bar cake marzipan dessert candy gingerbread.</p>
                                                            <h6>Media Files (2)</h6>
                                                            <table class="table table-borderless m-0">
                                                                <tr>
                                                                    <td class="pl-0 py-0 pr-1"><img src="img/banner/banner-34.jpg" class="img-fluid" alt="Pic1"></td>
                                                                    <td class="pr-0 py-0 pl-1"><img src="img/banner/banner-21.jpg" class="img-fluid" alt="Pic2"></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Job History ends -->
                                </div>
                            </div>
                            <!-- 2nd column ends -->

                        
                        </div>
                        <!-- Profile posts and info ends -->
                    </section>
                </div>
            </div>
            <!-- END : End Main Content-->

            <!-- BEGIN : Footer-->
            <footer class="footer undefined undefined">
                <p class="clearfix text-muted m-0"><span>Copyright &copy; 2020 &nbsp;</span><a href="https://qccs.nl" id="pixinventLink" target="_blank">PIXINVENT</a><span class="d-none d-sm-inline-block">, All rights reserved.</span></p>
            </footer>
            <!-- End : Footer-->
            <!-- Scroll to top button -->
            <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>

        </div>
    </div>
   
    <?php
    include "partials/footer.php";
    ?>
</body>
<!-- END : Body-->

</html>