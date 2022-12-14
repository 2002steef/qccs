<!--Op deze pagina komt een overzicht met alle bedrijven die de applicatie gebruiken-->

<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->
<?php
include "header.php";
$row = Getuser();
?>
<!-- END : Head-->
<!-- BEGIN : Body-->
<body class="vertical-layout vertical-menu 2-columns  navbar-sticky layout-dark layout-transparent bg-glass-1"
      data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="2-columns">

<!-- Navbar (Header) Starts-->
<nav class="navbar navbar-expand-lg navbar-light header-navbar navbar-static">
    <div class="container-fluid navbar-wrapper">
        <div class="navbar-header d-flex">
            <div class="navbar-toggle menu-toggle d-xl-none d-block float-left align-items-center justify-content-center"
                 data-toggle="collapse"><i class="ft-menu font-medium-3"></i></div>
            <ul class="navbar-nav">
                <li class="nav-item mr-2 d-none d-lg-block"><a class="nav-link apptogglefullscreen"
                                                               id="navbar-fullscreen" href="javascript:;"><i
                                class="ft-maximize font-medium-3"></i></a></li>
                <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="javascript:"><i
                                class="ft-search font-medium-3"></i></a>
                    <div class="search-input">
                        <div class="search-input-icon"><i class="ft-search font-medium-3"></i></div>
                        <input class="input" type="text" placeholder="Explore QCCS..." tabindex="0"
                               data-search="template-search">
                        <div class="search-input-close"><i class="ft-x font-medium-3"></i></div>
                        <ul class="search-list"></ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="navbar-container">
            <div class="collapse navbar-collapse d-block" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="i18n-dropdown dropdown nav-item mr-2"><a
                                class="nav-link d-flex align-items-center dropdown-toggle dropdown-language"
                                id="dropdown-flag" href="javascript:;" data-toggle="dropdown"><img
                                    class="langimg selected-flag" src="assets/img/flags/nl.png" alt="flag"><span
                                    class="selected-language d-md-flex d-none">Nederlands</span></a>
                        <div class="dropdown-menu dropdown-menu-right text-left" aria-labelledby="dropdown-flag"><a
                                    class="dropdown-item" href="javascript:;" data-language="en"><img
                                        class="langimg mr-2" src="assets/img/flags/us.png" alt="flag"><span
                                        class="font-small-3">English</span></a><a class="dropdown-item"
                                                                                  href="javascript:;"
                                                                                  data-language="es"><img
                                        class="langimg mr-2" src="assets/img/flags/nl.png" alt="flag"><span
                                        class="font-small-3">Nederlands</span></a><a class="dropdown-item"
                                                                                  href="javascript:;"
                                                                                  data-language="pt"><img
                                        class="langimg mr-2" src="assets/img/flags/pt.png" alt="flag"><span
                                        class="font-small-3">Portuguese</span></a><a class="dropdown-item"
                                                                                     href="javascript:;"
                                                                                     data-language="de"><img
                                        class="langimg mr-2" src="assets/img/flags/de.png" alt="flag"><span
                                        class="font-small-3">German</span></a></div>
                    </li>
                    <li class="dropdown nav-item mr-1"><a
                                class="nav-link dropdown-toggle user-dropdown d-flex align-items-end"
                                id="dropdownBasic2" href="javascript:;" data-toggle="dropdown">
                            <div class="user d-md-flex d-none mr-2"><span
                                        class="text-right"><?php if (isset($_SESSION["name"])) {echo $_SESSION["name"]; } ?></span><span
                                        class="text-right text-muted font-small-3">Beschikbaar</span></div>
                            <img class="avatar" src="uploads/<?= $row['image_url'] ?>" alt="avatar"
                                 height="35" width="35">
                        </a>
                        <div class="dropdown-menu text-left dropdown-menu-right m-0 pb-0"
                             aria-labelledby="dropdownBasic2"><a class="dropdown-item" href="page-account-settings.php">
                                <div class="d-flex align-items-center"><i
                                            class="ft-edit mr-2"></i><span>Profiel settings</span></div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="backend/logout.php">
                                <div class="d-flex align-items-center"><i class="ft-power mr-2"></i><span>Logout</span>
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
<div class="app-sidebar menu-fixed" data-background-color="" data-image="" data-scroll-to-active="true">
    <!--     main menu header-->
    <!--     Sidebar Header For Starter Kit starts-->
    <div class="sidebar-header">
        <div class="logo clearfix">
            <?php if (isset($_SESSION["memb_of"])) {if ($_SESSION["memb_of"] == 0) {
                ?>
                <a class="logo-text float-left" href="bedrijfs_overzicht.php">
                    <div class="logo-img"><img src="assets/img/logo.png"/></div>
                    <span class="text">CRM</span>
                </a>
                <?php
            }
            }if (isset($_SESSION["memb_of"])) {if ($_SESSION["memb_of"] > 0) {
                if ($_SESSION['auth'] == "Bedrijfsleider") {
                    ?>
                    <a class="logo-text float-left"
                       href="bedrijfs_klanten_overzicht.php?custof=<?= $_SESSION["memb_of"] ?>&membof=<?= $_SESSION["memb_of"] ?>">
                        <div class="logo-img"><img src="assets/img/logo.png"/></div>
                        <span class="text">CRM</span>
                    </a>
                <?php } elseif ($_SESSION['auth'] == "Werknemer" || $row['authentication_level'] === 'user') {
                    ?>
                    <a class="logo-text float-left"
                       href="klanten_overzicht.php?custof=<?= $_SESSION["memb_of"] ?>&membof=<?= $_SESSION["memb_of"] ?>">
                        <div class="logo-img"><img src="assets/img/logo.png"/></div>
                        <span class="text">CRM</span>
                    </a>
                <?php }
            }
            }
            ?>
            <a class="nav-toggle d-none d-lg-none d-xl-block" id="sidebarToggle" href="javascript:;"><i
                        class="toggle-icon ft-toggle-right" data-toggle="expanded"></i></a>
            <a class="nav-close d-block d-lg-block d-xl-none" id="sidebarClose" href="javascript:;"><i
                        class="ft-x"></i>
            </a>
        </div>
    </div>
    <!--     Sidebar Header Ends-->
    <!--     / main menu header-->
    <!--    main menu content-->
    <div class="sidebar-content main-menu-content">
        <div class="nav-container">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item">
                    <?php if (isset($_SESSION["memb_of"])) { if ($_SESSION["memb_of"] == 0) {
                        ?>
                        <a class="" href="bedrijfs_overzicht.php">
                            <i class="ft-align-justify"></i>
                            <span class="text">CRM Relaties</span>
                        </a>
                        <?php
                    } elseif ($_SESSION["memb_of"] > 0) {
                        if ($_SESSION['auth'] == "Bedrijfsleider") {
                            ?>
                            <a class=""
                               href="bedrijfs_klanten_overzicht.php?custof=<?= $_SESSION["memb_of"] ?>&membof=<?= $_SESSION["memb_of"] ?>">
                                <i class="ft-bar-chart-2"></i>
                                <span class="text">Relaties</span>
                            </a>
                        <?php } elseif ($_SESSION['auth'] == "Werknemer") {
                            ?>
                            <a class=""
                               href="klanten_overzicht.php?custof=<?= $_SESSION["memb_of"] ?>&membof=<?= $_SESSION["memb_of"] ?>">
                                <i class="ft-bar-chart-2"></i>
                                <span class="text">Relaties</span>
                            </a>
                        <?php }
                    }
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    if(isset($_GET['membof'])) {
                        if ($row['authentication_level'] === 'Admin') {
                            $memb_of = $_GET['membof'];
                            ?>
                            <a class="" href="<?php
                            echo "bedrijfs_klanten_overzicht.php?custof=$memb_of&membof=$memb_of";
                            ?>">
                                <i class="ft-bar-chart-2"></i>
                                <span class="text">Relaties</span>
                            </a>
                            <?php
                        }
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    if(isset($_GET['membof'])) {
                        if ($row['authentication_level'] === 'Admin' || $row['authentication_level'] === 'Bedrijfsleider') {
                            $memb_of = $_GET['membof'];
                            ?>
                            <a class="" href="<?php
                            echo "bedrijf_werknemer_overzicht.php?custof=$memb_of&membof=$memb_of";
                            ?>">
                                <i class="icon-users"></i>
                                <span class="text">Werknemers</span>
                            </a>
                            <?php

                        }
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    if(isset($_GET['membof'])) {
                    if ($row['authentication_level'] === 'Admin' || $row['authentication_level'] === 'Bedrijfsleider') {
                        $memb_of = $_GET['membof'];
                        ?>
                        <a class="" href="<?php
                        echo "communicatie.php?custof=$memb_of&membof=$memb_of";
                        ?>">
                            <i class="icon-speech"></i>
                            <span class="text">Communicatie</span>
                        </a>
                        <?php

                    }
                    }
                   ?>
                </li>
                <li class="nav-item">
                    <?php
                    if(isset($_GET['membof'])) {
                        if ($row['authentication_level'] === 'Admin' || $row['authentication_level'] === 'Bedrijfsleider') {
                            $memb_of = $_GET['membof'];
                            ?>
                            <a class="" href="<?php
                            echo "bedrijf_facturen.php?custof=$memb_of&membof=$memb_of";
                            ?>">
                                <i class="ft-file-text"></i>
                                <span class="text">Facturen</span>
                            </a>
                            <?php

                        }
                    }
                    ?>
                <li class="nav-item">
                    <?php
                    if(isset($_GET['membof'])) {
                        if ($row['authentication_level'] === 'Admin' || $row['authentication_level'] === 'Bedrijfsleider') {
                            $memb_of = $_GET['membof'];
                            ?>
                            <a class="" href="<?php
                            echo "bedrijf_instellingen.php?custof=$memb_of&membof=$memb_of";
                            ?>">
                                <i class="icon-settings"></i>
                                <span class="text">Instellingen</span>
                            </a>
                            <?php

                        }
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    if(isset($_GET['membof'])) {
                        if ($row['authentication_level'] === 'user') {
                            $memb_of = $_GET['membof'];
                            ?>
                            <a class="" href="<?php
                            echo "klant_overzicht.php?custof=$memb_of&membof=$memb_of";
                            ?>">
                                <i class="icon-settings"></i>
                                <span class="text">Home</span>
                            </a>
                            <?php

                        }
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    if(isset($_GET['membof'])) {
                        if ($row['authentication_level'] === 'user') {
                            $memb_of = $_GET['membof'];
                            ?>
                            <a class="" href="<?php
                            echo "klant_bedrijf_info.php?custof=$memb_of&membof=$memb_of";
                            ?>">
                                <i class="icon-settings"></i>
                                <span class="text">Bedrijf Info</span>
                            </a>
                            <?php

                        }
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    if(isset($_GET['membof'])) {
                        if ($row['authentication_level'] === 'user') {
                            $memb_of = $_GET['membof'];
                            ?>
                            <a class="" href="<?php
                            echo "page-account-settings.php";
                            ?>">
                                <i class="icon-settings"></i>
                                <span class="text">Mijn account</span>
                            </a>
                            <?php

                        }
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

