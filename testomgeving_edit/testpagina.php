<!--Op deze pagina komt een overzicht met alle bedrijven die de applicatie gebruiken-->
<?php
include "backend/functions.php";


// Sendmail();
// InsertCustomerIndividual();
// UpdateCompanyInfo();
// $rowC = GetCompanyInfo();
// editUserZ();
// editUserP();
// ViewUserP();
// ViewUserZ();
// ViewPersonnel();
// InsertUserZakelijk();


// Controleer of iemand ingelogd is


?>
<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->
<style>
    br {
        line-height: 75%;
    }

    /*input::placeholder {*/
    /*   color: red;  !important;*/
    /*}*/
</style>

<head>
    <?php
    include "partials/header.php";
    ?>
</head>
<!-- END : Head-->
<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 2-columns  navbar-sticky layout-dark layout-transparent bg-glass-1" data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="2-columns">

    <!-- Navbar (Header) Starts-->
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
                                <h4 class="card-title"></h4>

                                <ul class="breadcrumb bg-transparent">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="bedrijfs_overzicht.php">CRM Relaties</a></li>
                                    <li class="breadcrumb-item"><a href="#">Bedrijfs klanten overzicht</a></li>
                                </ul>
                            </div>

                            <div class="card-content">
                                <div class="card-body">
                                    <section id="file-export">
                                        <i class="ft-user mr-1"></i>
                                        <span class="d-none d-sm-block">Masseuses</span>


                                        <table class="table table-striped table-bordered file-export">
                                            <thead>
                                                <tr>
                                                    <th>Logo</th>
                                                    <th colspan="5">Masseuse info</th>
                                                    <th>Handelingen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <td><button type="button" class="btn bg-light-primary" data-toggle="modal" data-target="#info">
                                                        Launch Modal
                                                    </button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </section>
                                </div>
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
    <div class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title" id="myModalLabel35"> Modal Title</h3>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                                                                    </button>
                                                                </div>
                                                                <form>
                                                                    <div class="modal-body">
                                                                        <fieldset class="form-group floating-label-form-group">
                                                                            <label for="email">Email Address</label>
                                                                            <input type="text" class="form-control" id="email" placeholder="Email Address">
                                                                        </fieldset>
                                                                        <br>
                                                                        <fieldset class="form-group floating-label-form-group">
                                                                            <label for="title">Password</label>
                                                                            <input type="password" class="form-control" id="title" placeholder="Password">
                                                                        </fieldset>
                                                                        <br>
                                                                        <fieldset class="form-group floating-label-form-group">
                                                                            <label for="title1">Description</label>
                                                                            <textarea class="form-control" id="title1" rows="3" placeholder="Description"></textarea>
                                                                        </fieldset>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="reset" class="btn bg-light-secondary" data-dismiss="modal" value="Close">
                                                                        <input type="submit" class="btn btn-primary" value="Login">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
    <!-- /////////////////////////////////////////////////////////////////////////////-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <?php
    include "partials/footer.php";
    ?>
</body>
<!-- END : Body-->