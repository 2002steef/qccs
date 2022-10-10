<!--Op deze pagina komt een overzicht met alle bedrijven die de applicatie gebruiken-->

<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->
<?php
include "header.php";
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
                        <li class="i18n-dropdown dropdown nav-item mr-2"><a class="nav-link d-flex align-items-center dropdown-toggle dropdown-language" id="dropdown-flag" href="javascript:;" data-toggle="dropdown"><img class="langimg selected-flag" src="app-assets/img/flags/nl.png" alt="flag"><span class="selected-language d-md-flex d-none light-gray">Nederlands</span></a>
                            <div class="dropdown-menu dropdown-menu-right text-left" aria-labelledby="dropdown-flag">
                            <a class="dropdown-item text-light-gray" href="javascript:;" data-language="en"><img class="langimg mr-2" src="app-assets/img/flags/us.png" alt="flag"><span class="font-small-3 light-gray">English</span></a>
                            <a class="dropdown-item text-light-gray" href="javascript:;" data-language="es"><img class="langimg mr-2" src="app-assets/img/flags/nl.png" alt="flag"><span class="font-small-3 light-gray">Nederlands</span></a>
                            <a class="dropdown-item text-light-gray" href="javascript:;" data-language="pt"><img class="langimg mr-2" src="app-assets/img/flags/pt.png" alt="flag"><span class="font-small-3 light-gray">Portuguese</span></a>
                            <a class="dropdown-item text-light-gray" href="javascript:;" data-language="de"><img class="langimg mr-2" src="assets/img/flags/de.png" alt="flag"><span class="font-small-3 light-gray">German</span></a></div>
                        </li>
                        <li class="dropdown nav-item mr-1"><a class="nav-link dropdown-toggle user-dropdown d-flex align-items-end" id="dropdownBasic2" href="javascript:;" data-toggle="dropdown">
                                <div class="user d-md-flex d-none mr-2"><span class="text-right text-light-gray">Jerry</span><span class="text-right text-muted font-small-3 light-gray">Beschikbaar</span></div>

                                <img class="avatar" src="app-assets/img/jerry.jpg" alt="avatar" height="35" width="35">

                            </a>

                            <div class="dropdown-menu text-left dropdown-menu-right m-0 pb-0" aria-labelledby="dropdownBasic2"><a class="dropdown-item" href="page-account-settings.php?user_ID=<?= $_SESSION["id"] ?>">
                                    <div class="d-flex align-items-center"><i class="ft-edit mr-2 text-light-gray"></i><span>Profiel settings</span></div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="backend/logout.php">
                                    <div class="d-flex align-items-center text-light-gray"><i class="ft-power mr-2"></i><span>Logout</span>
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
            <div class="logo clearfix"><a class="logo-text float-left" href="overzicht.php">
                    <div class="logo-img"><img height="50" width="50" src="app-assets/img/logo_qccs.png" alt="BMA Logo" /><span class="text light-gray">Casius</span></div>
                </a><a class="nav-toggle d-none d-lg-none d-xl-block" id="sidebarToggle" href="javascript:;"><i class="toggle-icon ft-toggle-right light-gray" data-toggle="expanded"></i></a><a class="nav-close d-block d-lg-block d-xl-none" id="sidebarClose" href="javascript:;"><i class="ft-x"></i></a></div>
        </div>
        <!--     Sidebar Header Ends-->
        <!--     / main menu header-->
        <!--    main menu content-->
        <div class="sidebar-content main-menu-content">
            <div class="nav-container">
                <ul class="navigation navigation-main " id="main-menu-navigation" data-menu="menu-navigation">
                    <li class=" nav-item">
                        <a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-documentation" target="_blank">
                            <i class="ft-book text-light-gray"></i>
                            <span class="menu-title text-light-gray" data-i18n="Documentation">Documentation</span>
                        </a>
                    </li>
                    <li class="nav-item ">

                        <a href="overzicht.php">
                            <i class="ft-user text-light-gray"></i>
                            <span class="menu-title text-light-gray" data-i18n="Masseuses">Overzicht</span>
                        </a>
                    </li>
                    <li>
                        <a class="text-light-gray" href="account_settings.php/user_ID=<?= $_SESSION["id"] ?>">
                            <i class="ft-settings text-light-gray"></i>
                            <span class=" menu-title text text-light-gray">Account Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-background"></div>
        <!--     main menu content-->
    </div>
</body>
<!-- END : Body-->