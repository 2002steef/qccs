<!DOCTYPE html>
<html class="loading" lang="en">
<?php
include "partials/header.php";

?>
<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 2-columns menu-collapsed nav-collapsed navbar-sticky" data-menu="vertical-menu" data-col="2-columns">
<?php
include "partials/navbar.php"
?>

    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


        <!-- main menu-->
        <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
        <div class="app-sidebar menu-fixed" data-background-color="man-of-steel" data-image="../../../assets/img/sidebar-bg/01.jpg" data-scroll-to-active="true">
            <!-- main menu header-->
            <!-- Sidebar Header starts-->
            <div class="sidebar-header">
                <div class="logo clearfix"><a class="logo-text float-left" href="index.html">
                        <div class="logo-img"><img src="../../../assets/img/logo.png" alt="Apex Logo" /></div><span class="text">APEX</span>
                    </a><a class="nav-toggle d-none d-lg-none d-xl-block" id="sidebarToggle" href="javascript:;"><i class="toggle-icon ft-toggle-right" data-toggle="expanded"></i></a><a class="nav-close d-block d-lg-block d-xl-none" id="sidebarClose" href="javascript:;"><i class="ft-x"></i></a></div>
            </div>
            <!-- Sidebar Header Ends-->
            <!-- / main menu header-->
            <!-- main menu content-->
            <div class="sidebar-content main-menu-content">
                <div class="nav-container">
                    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                        <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="tag badge badge-pill badge-danger float-right mr-1 mt-1">2</span></a>
                            <ul class="menu-content">
                                <li><a href="dashboard1.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Dashboard 1">Dashboard 1</span></a>
                                </li>
                                <li><a href="dashboard2.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Dashboard 2">Dashboard 2</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class=" nav-item"><a href="app-email.html"><i class="ft-mail"></i><span class="menu-title" data-i18n="Email">Email</span></a>
                        </li>
                        <li class=" nav-item"><a href="app-chat.html"><i class="ft-message-square"></i><span class="menu-title" data-i18n="Chat">Chat</span></a>
                        </li>
                        <li class=" nav-item"><a href="app-taskboard.html"><i class="ft-file-text"></i><span class="menu-title" data-i18n="Task Board">Task Board</span></a>
                        </li>
                        <li class=" nav-item"><a href="app-calendar.html"><i class="ft-calendar"></i><span class="menu-title" data-i18n="Calendar">Calendar</span></a>
                        </li>
                        <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-aperture"></i><span class="menu-title" data-i18n="UI Kit">UI Kit</span><span class="tag badge badge-pill badge-success float-right mr-1 mt-1">6</span></a>
                            <ul class="menu-content">
                                <li><a href="grids.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Grid">Grid</span></a>
                                </li>
                                <li><a href="typography.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Typography">Typography</span></a>
                                </li>
                                <li><a href="syntax-highlighter.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Syntax Highlighter">Syntax Highlighter</span></a>
                                </li>
                                <li><a href="helper-classes.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Helper Classes">Helper Classes</span></a>
                                </li>
                                <li><a href="text-utilities.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Text Utilities">Text Utilities</span></a>
                                </li>
                                <li><a href="color-palette.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Color Palette">Color Palette</span></a>
                                </li>
                                <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Icons">Icons</span></a>
                                    <ul class="menu-content">
                                        <li><a href="icons-feather.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Feather Icon">Feather Icon</span></a>
                                        </li>
                                        <li><a href="icons-font-awesome.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Font Awesome Icon">Font Awesome Icon</span></a>
                                        </li>
                                        <li><a href="icons-simple-line.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Simple Line Icon">Simple Line Icon</span></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-box"></i><span class="menu-title" data-i18n="Components">Components</span></a>
                            <ul class="menu-content">
                                <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Bootstrap">Bootstrap</span></a>
                                    <ul class="menu-content">
                                        <li><a href="components-buttons.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Buttons">Buttons</span></a>
                                        </li>
                                        <li><a href="components-alerts.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Alerts">Alerts</span></a>
                                        </li>
                                        <li><a href="components-badges.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Badges">Badges</span></a>
                                        </li>
                                        <li><a href="components-dropdowns.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Dropdowns">Dropdowns</span></a>
                                        </li>
                                        <li><a href="components-media-objects.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Media Objects">Media Objects</span></a>
                                        </li>
                                        <li><a href="components-pagination.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Pagination">Pagination</span></a>
                                        </li>
                                        <li><a href="components-progress.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Progress Bars">Progress Bars</span></a>
                                        </li>
                                        <li><a href="components-modals.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Modals">Modals</span></a>
                                        </li>
                                        <li><a href="components-collapse.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Collapse">Collapse</span></a>
                                        </li>
                                        <li><a href="components-lists.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="List">List</span></a>
                                        </li>
                                        <li><a href="components-carousel.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Carousel">Carousel</span></a>
                                        </li>
                                        <li><a href="components-popover.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Popover">Popover</span></a>
                                        </li>
                                        <li><a href="components-tabs.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Tabs">Tabs</span></a>
                                        </li>
                                        <li><a href="components-tooltip.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Tooltip">Tooltip</span></a>
                                        </li>
                                        <li><a href="components-spinner.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Spinner">Spinner</span></a>
                                        </li>
                                        <li><a href="components-toast.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Toast">Toast</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Extra">Extra</span></a>
                                    <ul class="menu-content">
                                        <li><a href="ex-component-sweet-alerts.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Sweet Alert">Sweet Alert</span></a>
                                        </li>
                                        <li><a href="ex-component-toastr.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Toastr">Toastr</span></a>
                                        </li>
                                        <li><a href="ex-component-nouislider.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="NoUI Slider">NoUI Slider</span></a>
                                        </li>
                                        <li><a href="ex-component-upload.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Upload">Upload</span></a>
                                        </li>
                                        <li><a href="ex-component-dragndrop.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Drag and Drop">Drag and Drop</span></a>
                                        </li>
                                        <li><a href="ex-component-tour.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Tour">Tour</span></a>
                                        </li>
                                        <li><a href="ex-component-media-player.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Media Player">Media Player</span></a>
                                        </li>
                                        <li><a href="ex-component-treeview.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Treeview">Treeview</span></a>
                                        </li>
                                        <li><a href="ex-component-swiper.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Swiper">Swiper</span></a>
                                        </li>
                                        <li><a href="ex-component-miscellaneous.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Miscellaneous">Miscellaneous</span></a>
                                        </li>
                                        <li><a href="ex-component-avatar.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Avatar">Avatar</span></a>
                                        </li>
                                        <li><a href="ex-component-image-cropper.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Image Cropper">Image Cropper</span></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-edit"></i><span class="menu-title" data-i18n="Forms">Forms</span></a>
                            <ul class="menu-content">
                                <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Elements">Elements</span></a>
                                    <ul class="menu-content">
                                        <li><a href="form-inputs.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Inputs">Inputs</span></a>
                                        </li>
                                        <li><a href="form-input-groups.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Input Groups">Input Groups</span></a>
                                        </li>
                                        <li><a href="form-radio.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Radio">Radio</span></a>
                                        </li>
                                        <li><a href="form-checkbox.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Checkbox">Checkbox</span></a>
                                        </li>
                                        <li><a href="form-switch.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Switch">Switch</span></a>
                                        </li>
                                        <li><a href="form-select.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Select">Select</span></a>
                                        </li>
                                        <li><a href="form-editor.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Editor">Editor</span></a>
                                        </li>
                                        <li><a href="form-input-tags.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Input Tag">Input Tag</span></a>
                                        </li>
                                        <li><a href="form-datetimepicker.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Datepicker">Datepicker</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="form-layout.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Layouts">Layouts</span></a>
                                </li>
                                <li><a href="form-validation.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Validation">Validation</span></a>
                                </li>
                                <li><a href="form-wizard.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Wizard">Wizard</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-grid"></i><span class="menu-title" data-i18n="Tables">Tables</span></a>
                            <ul class="menu-content">
                                <li><a href="table-basic.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Basic">Basic</span></a>
                                </li>
                                <li><a href="table-extended.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Extended">Extended</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-layout"></i><span class="menu-title" data-i18n="Data Tables">Data Tables</span></a>
                            <ul class="menu-content">
                                <li><a href="dt-basic-initialization.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Basic">Basic</span></a>
                                </li>
                                <li><a href="dt-advanced-initialization.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Advanced">Advanced</span></a>
                                </li>
                                <li><a href="dt-data-sources.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Data Sources">Data Sources</span></a>
                                </li>
                                <li><a href="dt-api.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="API">API</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-layers"></i><span class="menu-title" data-i18n="Cards">Cards</span></a>
                            <ul class="menu-content">
                                <li><a href="cards-basic.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Basic Cards">Basic Cards</span></a>
                                </li>
                                <li><a href="cards-advanced.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Advanced Cards">Advanced Cards</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-map"></i><span class="menu-title" data-i18n="Maps">Maps</span></a>
                            <ul class="menu-content">
                                <li><a href="map-leaflet.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Leaflet Maps">Leaflet Maps</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-bar-chart-2"></i><span class="menu-title" data-i18n="Charts">Charts</span></a>
                            <ul class="menu-content">
                                <li><a href="charts-apex.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Apex Charts">Apex Charts</span></a>
                                </li>
                                <li><a href="charts-chartjs.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="ChartJs">ChartJs</span></a>
                                </li>
                                <li><a href="charts-chartist.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Chartist">Chartist</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-copy"></i><span class="menu-title" data-i18n="Pages">Pages</span></a>
                            <ul class="menu-content">
                                <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Authentication">Authentication</span></a>
                                    <ul class="menu-content">
                                        <li><a href="auth-forgot-password.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Forgot Password">Forgot Password</span></a>
                                        </li>
                                        <li><a href="auth-login.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Login">Login</span></a>
                                        </li>
                                        <li><a href="auth-register.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Register">Register</span></a>
                                        </li>
                                        <li><a href="auth-lock-screen.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Lock Screen">Lock Screen</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="timeline-horizontal.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Horizontal Timeline">Horizontal Timeline</span></a>
                                </li>
                                <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Vertical Timeline">Vertical Timeline</span></a>
                                    <ul class="menu-content">
                                        <li><a href="timeline-vertical-center.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Center">Center</span></a>
                                        </li>
                                        <li><a href="timeline-vertical-left.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Left">Left</span></a>
                                        </li>
                                        <li><a href="timeline-vertical-right.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Right">Right</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Users">Users</span></a>
                                    <ul class="menu-content">
                                        <li><a href="page-users-list.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="List">List</span></a>
                                        </li>
                                        <li><a href="page-users-view.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="View">View</span></a>
                                        </li>
                                        <li><a href="page-users-edit.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Edit">Edit</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="page-account-settings.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Account Settings">Account Settings</span></a>
                                </li>
                                <li class="active"><a href="page-user-profile.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="User Profile">User Profile</span></a>
                                </li>
                                <li><a href="page-invoice.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Invoice">Invoice</span></a>
                                </li>
                                <li><a href="page-error.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Error">Error</span></a>
                                </li>
                                <li><a href="page-coming-soon.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Coming Soon">Coming Soon</span></a>
                                </li>
                                <li><a href="page-maintenance.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Maintenance">Maintenance</span></a>
                                </li>
                                <li><a href="page-gallery.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Gallery">Gallery</span></a>
                                </li>
                                <li><a href="page-search.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Search">Search</span></a>
                                </li>
                                <li><a href="page-faq.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="FAQ">FAQ</span></a>
                                </li>
                                <li><a href="page-knowledge-base.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Knowledge Base">Knowledge Base</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class=" nav-item"><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-documentation" target="_blank"><i class="ft-book"></i><span class="menu-title" data-i18n="Documentation">Documentation</span></a>
                        </li>
                        <li class=" nav-item"><a href="https://pixinvent.ticksy.com/" target="_blank"><i class="ft-life-buoy"></i><span class="menu-title" data-i18n="Support">Support</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- main menu content-->
            <div class="sidebar-background"></div>
            <!-- main menu footer-->
            <!-- include includes/menu-footer-->
            <!-- main menu footer-->
            <!-- / main menu-->
        </div>

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
                                        <img src="../../../assets/img/banner/profile-image.jpg" class="img-fluid rounded-top user-timeline-image" alt="User Timeline Image">
                                        <!-- user profile image -->
                                        <img src="../../../assets/img/portrait/small/avatar-s-20.png" class="user-profile-image rounded" alt="User Profile Image" height="140" width="140">
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
                                                    <p class="m-0">Ice cream sweet chupa chups oat cake croissant halvah cake. Halvah macaroon jelly-o gingerbread cheesecake carrot cake. Muffin donut ice cream brownie cheesecake halvah...</p>
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
                                                        adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres 
                                                        adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres 
                                                        adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres adres 
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
                                                    <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                                        mollit anim id est laborum.
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
                                                    <div id="maps-leaflet-basic" class="maps-leaflet-container"></div>
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
<?php include "partials/footer.php"; ?>
    <!-- BEGIN: Custom CSS-->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/profileHeight.js"></script>
    <!-- END: Custom CSS-->
</body>
<!-- END : Body-->

</html>