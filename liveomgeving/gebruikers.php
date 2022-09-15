<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->
<?php
include "backend/functions.php";
?>
<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<?php
include "partials/header.php";
?>
<!-- END : Head-->
<!-- BEGIN : Body-->
<body class="vertical-layout vertical-menu 2-columns  navbar-sticky layout-dark layout-transparent bg-glass-1"
      data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="2-columns">


<!-- Navbar (Header) Ends-->
<div class="wrapper">
    <?php
    include "partials/navbar.php";
    ?>

    <div class="main-panel">


        <!-- BEGIN : Main Content-->
        <div class="main-content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <section class="users-list-wrapper">
                    <!-- Filter starts -->
                    <div class="users-list-filter px-2">
						<h4><?php GetCompanyNamepersonnel(); ?></h4>
                        <form>
                            <div class="row border rounded py-2 mb-2 mx-n2">
                                  <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                                    <a class="btn btn-primary btn-block users-list-clear glow mb-0"
                                       href="gebruikertoevoegen.php?membof=<?=$_GET['membof'];?>">Gebruiker toevoegen</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Filter ends -->

                    <!-- Table starts -->
                    <div class="users-list-table">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <!-- Datatable starts -->
                                            <div class="table-responsive">
                                                <table id="users-list-datatable" class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Naam</th>
                                                        <th>Adres</th>
                                                        <th>Email</th>
                                                        <th>Telefoon nummer</th>
                                                        <th>Edit</th>
                                                    </tr>
                                                    </thead>
                                                <tbody>
                                                <?php
                                                Getpersonnel();
                                                ?>
                                                </tbody>
                                                </table>
                                            </div>
                                            <!-- Datatable ends -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table ends -->
                </section>

            </div>
        </div>
        <!-- END : End Main Content-->


        <!-- Scroll to top button -->
        <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>

    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<!-- BEGIN VENDOR JS-->
<?php
include "partials/footer.php";
?>
<!-- END: Custom CSS-->
</body>
<!-- END : Body-->

</html>