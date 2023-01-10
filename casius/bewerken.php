<!--Op deze pagina komt een overzicht met alle bedrijven die de applicatie gebruiken-->
<?php
include "backend/functions.php";
$klant = klantInfo();
    include "partials/header.php";
?><!-- END : Head-->
<!-- BEGIN : Body-->
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body class="vertical-layout vertical-menu 2-columns navbar-sticky" data-bg-img="bg-glass-1" data-col="2-columns" data-menu="vertical-menu">
	<!-- Navbar (Header) Starts-->
	<?php
	        include "partials/navbar.php";
    ?><!-- ////////////////////////////////////////////////////////////////////////////-->
	<!-- / main menu-->
	<div class="main-panel">
		<!-- BEGIN : Main Content-->
		<div class="main-content">
			<div class="content-overlay"></div>
			<div class="content-wrapper">
				<form  method="post">
					<div class="row">
						<div class="col-md-4 col-12">
							<div class="form-group row">
								<label class="col-md-6 col-form-label" for="Voornaam">Voornaam</label>
								<div class="col-md-6">
									<input type="hidden" class="form-control square" value="<?=$klant["Project_ID"] ?>" id="Project_ID" name="klantID" />
									<input type="text" class="form-control square" value="<?=$klant["Voornaam"] ?>" id="Voornaam" name="voornaam" />
								</div>
							</div>
						</div>
						<div class="col-md-4 col-12">
							<div class="form-group row">
								<label class="col-md-6 col-form-label" for="tussenvoegsel">Tussenvoegsel</label>
								<div class="col-md-6">
									<input type="text" class="form-control square" value="<?=$klant["Tussenvoegsel"] ?>" id="tussenvoegsel" name="tussenvoegsel" />
								</div>
							</div>
						</div>
						<div class="col-md-4 col-12">
							<div class="form-group row">
								<label class="col-md-6 col-form-label" for="achternaam">Achternaam</label>
								<div class="col-md-6">
									<input type="text" class="form-control square" value="<?=$klant["Achternaam"] ?>" id="achternaam" name="achternaam" />
								</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-outline-light-gray" name="btnSubmit">Save Changes</button>		
				</form>
			</div>
		</div><!-- END : End Main Content-->
		<!-- Scroll to top button -->
		<button class="btn btn-primary scroll-top" type="button">
			<i class="ft-arrow-up"></i>
		</button>
	</div><!-- /////////////////////////////////////////////////////////////////////////////-->
	<div class="sidenav-overlay"></div>
	<div class="drag-target"></div>
	<?php
	include "partials/footer.php";
    ?>

</body>
</html>