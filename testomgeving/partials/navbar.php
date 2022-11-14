<!--Op deze pagina komt een overzicht met alle bedrijven die de applicatie gebruiken-->

<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->
<?php
include "header.php";
$rowBd = GetBedrijf();
$rowMs = GetMasseuse();
$rowMw = Getuser();
?>
<!-- END : Head-->
<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 2-columns navbar-sticky light-gray" data-menu="vertical-menu" data-col="2-columns">

    <!-- Navbar (Header) Starts-->
    <nav class="navbar navbar-expand-lg  header-navbar  navbar-static light-gray">
        <div class="container-fluid navbar-wrapper">
            <div class="navbar-header d-flex">
                <div class="navbar-toggle menu-toggle d-xl-none d-block float-left align-items-center justify-content-center " data-toggle="collapse"><i class="ft-menu font-medium-3 "></i></div>
                <ul class="navbar-nav">
                    <li class="nav-item mr-2 d-none d-lg-block"><a class="nav-link apptogglefullscreen" id="navbar-fullscreen" href="javascript:;"><i class="ft-maximize font-medium-3 "></i></a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search light-gray" href="javascript:"><i class="ft-search font-medium-3"></i></a>
                        <div class="search-input">
                            <div class="search-input-icon"><i class="ft-search font-medium-3 light-gray"></i></div>
                            <input class="input light-gray" type="text" placeholder="Explore QCCS..." tabindex="0" data-search="template-search">
                            <div class="search-input-close"><i class="ft-x font-medium-3"></i></div>
                            <ul class="search-list"></ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="navbar-container">
                <div class="collapse navbar-collapse d-block" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="dropdown nav-item mr-1"><a class="nav-link dropdown-toggle user-dropdown d-flex align-items-end" id="dropdownBasic2" href="javascript:;" data-toggle="dropdown">
                                <div class="user d-md-flex d-none mr-2"><span class="text-right light-gray"><?php if (isset($_SESSION["status"]) && $_SESSION["status"] =="bedrijf") {
                                                                                                                echo $rowBd["voornaam"];
                                                                                                            }elseif(isset($_SESSION["status"]) && $_SESSION["status"] =="masseuse"){
                                                                                                                echo $rowMs["voornaam"];
                                                                                                            } ?></span><span class="text-right text-muted font-small-3 light-gray">Beschikbaar</span></div>
                                <?php if ($_SESSION["status"] == "bedrijf") { ?>
                                    <img class="avatar" src="img/uploads/<?= $rowBd["profielFoto"] ?>" alt="avatar" height="35" width="35">
                                <?php } elseif ($_SESSION["status"] == "masseuse") { ?>
                                    <img class="avatar" src="img/uploads/<?= $rowMs["profielFoto"] ?>" alt="avatar" height="35" width="35">
                                <?php
                                } elseif ($_SESSION["status"] == "medewerker") { ?>
                                    <img class="avatar" src="img/uploads/IMG-61b0ee01b38261.71649507.png" alt="avatar" height="35" width="35">
                                <?php  } ?>
                            </a>
                            <?php if ($_SESSION["status"] == "bedrijf") { ?>
                                <div class="dropdown-menu text-left dropdown-menu-right m-0 pb-0" aria-labelledby="dropdownBasic2"><a class="dropdown-item" href="page-account-settings.php?bedrijfID=<?= $_SESSION["id"] ?>">
                                    <?php

                                } elseif ($_SESSION["status"] == "masseuse") { ?>
                                        <div class="dropdown-menu text-left dropdown-menu-right m-0 pb-0" aria-labelledby="dropdownBasic2"><a class="dropdown-item" href="page-account-settings.php?masseuseID=<?= $_SESSION["id"] ?>">
                                            <?php    } elseif ($_SESSION["status"] == "medewerker") { ?>
                                                <div class="dropdown-menu text-left dropdown-menu-right m-0 pb-0" aria-labelledby="dropdownBasic2"><a class="dropdown-item" href="page-account-settings.php?userID=<?= $_SESSION["id"] ?>">
                                                    <?php
                                                } ?>

                                                    <div class="d-flex align-items-center"><i class="ft-edit mr-2 light-gray"></i><span>Profiel settings</span></div>
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="backend/logout.php">
                                                        <div class="d-flex align-items-center light-gray"><i class="ft-power mr-2"></i><span>Logout</span>
                                                        </div>
                                                    </a>
                                                </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar (Header) Ends-->
    <div class="app-sidebar menu-fixed" data-scroll-to-active="true">
        <!--     main menu header-->
        <!--     Sidebar Header For Starter Kit starts-->

        <div class="sidebar-header">
            <div class="logo clearfix"><a class="logo-text float-left" href="index.html">
                    <div class="logo-img"><img height="50" width="50" src="assets/img/BMA-Logo.png" alt="BMA Logo" /><span class="text light-gray">BMA</span></div>
                </a><a class="nav-toggle d-none d-lg-none d-xl-block" id="sidebarToggle" href="javascript:;"><i class="toggle-icon ft-toggle-right light-gray" data-toggle="expanded"></i></a><a class="nav-close d-block d-lg-block d-xl-none" id="sidebarClose" href="javascript:;"><i class="ft-x"></i></a></div>
        </div>
        <!--     Sidebar Header Ends-->
        <!--     / main menu header-->
        <!--    main menu content-->
        <div class="sidebar-content main-menu-content">
            <div class="nav-container">
                <ul class="navigation navigation-main " id="main-menu-navigation" data-menu="menu-navigation">
                    <li class="nav-item ">
                        <?php if (isset($_SESSION["status"])) {
                            if ($_SESSION["status"] == "medewerker") {
                        ?>
                                <a href="medewerkers.php">
                                    <i class="ft-user light-gray"></i>
                                    <span class="menu-title light-gray" data-i18n="Masseuses">Masseuses</span>
                                </a>
                    </li>
                <?php
                            } elseif ($_SESSION["status"] == "masseuse") {
                ?>
                    <li>
                        <a class="light-gray" href="masseuse_profiel.php?masseuseID=<?= $_SESSION["id"] ?>">
                            <i class="ft-user light-gray"></i>
                            <span class=" menu-title text light-gray">Masseuse Profiel</span>
                        </a>
                    </li>
                <?php } elseif ($_SESSION["status"] == "bedrijf") {
                ?>
                    <li>
                        <a class="light-gray" href="bma_bedrijfs_klanten_overzicht.php">
                            <i class="ft-user light-gray"></i>
                            <span class="menu-title text light-gray">Overzicht</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a class="light-gray" href="medewerkers.php">
                            <i class="ft-bar-chart-2"></i>
                            <span class="text">Masseuses</span>
                        </a>
                    </li> -->
                <?php }
                ?>
                <li class="nav-item">
                    <?php if ($_SESSION["status"] == "bedrijf") { ?>
                        <a class="text light-gray" href="page-account-settings.php?bedrijfID=<?= $_SESSION["id"] ?>">
                            <i class="icon-settings light-gray"></i>
                            <span class="menu-title text light-gray">Mijn account</span>
                        </a> <?php

                            } elseif ($_SESSION["status"] == "masseuse") { ?>
                        <a class="text light-gray" href="page-account-settings.php?masseuseID=<?= $_SESSION["id"] ?>">
                            <i class="icon-settings light-gray"></i>
                            <span class="menu-title text light-gray">Mijn account</span>
                        </a> <?php    } elseif ($_SESSION["status"] == "medewerker") { ?>
                        <a class="text light-gray" href="page-account-settings.php?userID=<?= $_SESSION["id"] ?>">
                            <i class="icon-settings light-gray"></i>
                            <span class="menu-title text light-gray">Mijn account</span>
                        </a> <?php
                            } ?>

                <?php
                        }
                ?>

                </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-background"></div>
        <!--     main menu content-->
    </div>
</body>
<!-- END : Body-->