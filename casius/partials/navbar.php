<!-- BEGIN : Head-->
<?php
include "header.php";
$row = userInfo();
?>
<!-- END : Head-->
<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 2-columns navbar-sticky light-gray" data-menu="vertical-menu" data-col="2-columns">

    <!-- Navbar (Header) Starts-->
    <nav class="navbar navbar-expand-lg  header-navbar  navbar-static text-light-gray">
        <div class="container-fluid navbar-wrapper">
            <div class="navbar-header d-flex">
                <div class="navbar-toggle menu-toggle d-xl-none d-block float-left align-items-center justify-content-center light-gray " data-toggle="collapse"><i class="ft-menu font-medium-3 light-gray"></i></div>
                <ul class="navbar-nav">
                    <li class="nav-item mr-2 d-none d-lg-block"><a class="nav-link apptogglefullscreen text-light-gray" id="navbar-fullscreen" href="javascript:;"><i class="ft-maximize font-medium-3 light-gray "></i></a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search text-light-gray" href="javascript:"><i class="ft-search font-medium-3"></i></a>
                        <div class="search-input">
                            <div class="search-input-icon text-light-gray"><i class="ft-search font-medium-3 light-gray"></i></div>
                            <input class="input text-light-gray" type="text" placeholder="Explore QCCS..." tabindex="0" data-search="template-search">
                            <div class="search-input-close text-light-gray"><i class="ft-x font-medium-3"></i></div>
                            <ul class="search-list"></ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="navbar-container">
                <div class="collapse navbar-collapse d-block" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="dropdown nav-item mr-1"><a class="nav-link dropdown-toggle user-dropdown d-flex align-items-end" id="dropdownBasic2" href="javascript:;" data-toggle="dropdown">
                                <div class="user d-md-flex d-none mr-2"><span class="text-right text-light-gray">Jerry</span><span class="text-right text-muted font-small-3 light-gray">Beschikbaar</span></div>

                                <img class="avatar" src="app-assets/img/uploads/<?php echo $row["image_url"] ?>" alt="avatar" height="35" width="35">

                            </a>

                            <div class="dropdown-menu text-left dropdown-menu-right m-0 pb-0" aria-labelledby="dropdownBasic2"><a class="dropdown-item" href="account-settings.php?user_ID=<?= $_SESSION["id"] ?>">
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
                    <div class="logo-img"><img height="50" width="150" src="app-assets/img/uploads/Logo-experstatwork-.png" alt="experstatwork Logo" /></div>
                </a><a class="nav-toggle text-light-gray d-none d-lg-none d-xl-block" id="sidebarToggle" href="javascript:;"><i class="toggle-icon ft-toggle-right text-light-gray" data-toggle="expanded"></i></a><a class="nav-close d-block d-lg-block d-xl-none" id="sidebarClose" href="javascript:;"><i class="ft-x"></i></a></div>
        </div>
        <!--     Sidebar Header Ends-->
        <!--     / main menu header-->
        <!--    main menu content-->
        <div class="sidebar-content main-menu-content">
            <div class="nav-container">
                <ul class="navigation navigation-main " id="main-menu-navigation" data-menu="menu-navigation">
                    <li class="nav-item ">

                        <a href="overzicht.php">
                            <i class="ft-user text-light-gray"></i>
                            <span class="menu-title text-light-gray" data-i18n="Masseuses">Overzicht</span>
                        </a>
                    </li>
                    <li>
                        <a class="text-light-gray" href="account-settings.php?user_ID=<?= $_SESSION["id"] ?>">
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