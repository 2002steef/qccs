<!--Op deze pagina komt een overzicht met alle bedrijven die de applicatie gebruiken-->
<?php
require_once "backend/functions.php";
?>
<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->
<?php
?>

<!-- END : Head-->
<!-- BEGIN : Body-->
<body class="vertical-layout vertical-menu 2-columns  navbar-sticky layout-dark layout-transparent bg-glass-1"
      data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="2-columns">
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
                            <h4 class="card-title">Personeels Overzicht</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <section id="file-export">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
												<div class="card-header">
												<h3 class="card-title">Kies een bedrijf om het personeel ervan te zien</h3>
											</div>
                                                <div class="card-content ">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered file-export">
                                                                <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Bedrijfsnaam</th>
                                                                    <th>Logo</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
																	GetCompanyPersonneel();
                                                                ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
<!-- ////////////////////////////////////////////////////////////////////////////-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
	<?php
include "partials/footer.php";
?>
</body>
<!-- END : Body-->
