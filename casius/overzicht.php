<!--Op deze pagina komt een overzicht met alle bedrijven die de applicatie gebruiken-->
<?php
include "backend/functions.php";
klantInfo();
klantModal();
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
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Casius</h4>
								<ul class="breadcrumb bg-transparent">
									<li class="breadcrumb-item">
										<a class="text text-light-gray" href="overzicht.php">Home</a>
									</li>
									<li class="breadcrumb-item">
										<a class="text text-light-gray" href="overzicht.php">Relaties</a>
									</li>
									<li class="breadcrumb-item">
										<a class="text text-light-gray" href="#">Klanten overzicht</a>
									</li>
								</ul>
							</div>
							<div class="card-content">
								<div class="card-body">
									<section id="file-export">
										<ul class="nav nav-tabs text-light-gray" id="tabs" role="tablist">
											<li class="nav-item active">
												<a aria-controls="Klanten" aria-selected="true" class="nav-link d-flex align-items-center active" data-toggle="tab" href="#Klanten" id="Klanten" role="tab"><i class="ft-user mr-1"></i> <span class="d-none d-sm-block text-light-gray">Klanten</span></a>
											</li>
											<li class="nav-tabs">
												<a class="nav-link d-flex align-items-end" data-target="#large" data-toggle="modal" type="button"><i class="ft-plus mr-1"></i> <span class="d-none d-sm-block text-light-gray">Toevoegen</span></a>
											</li>
										</ul>
										<div class="tab-content">
											<div aria-labelledby="account-tab" class="tab-pane fade mt-2 show active" id="Klanten" role="tabpanel">
												<div class="row">
													<div class="col-12">
														<div class="table-responsive">
															<div>
																<?php
																if (isset($_GET["toevoegenPart"])) {
																	if ($_GET["toevoegenPart"] == "empty") {
																		echo "<p class='text-danger'>Vul alle velden in aub</p>";
																	} elseif ($_GET["toevoegenPart"] == "namefout") {
																		echo "<p class='text-danger'>Voornaam heeft foute tekens</p>";
																	} elseif ($_GET["toevoegenPart"] == "telfout") {
																		echo "<p class='text-danger'>Telefoonnummer klopt niet</p>";
																	} elseif ($_GET["toevoegenPart"] == "mailfout") {
																		echo "<p class='text-danger'>Email klopt niet</p>";
																	} elseif ($_GET["toevoegenPart"] == "emaildupli") {
																		echo "<p class='text-danger'>Email bestaat al</p>";
																	} elseif ($_GET["toevoegenPart"] == "straatfout") {
																		echo "<p class='text-danger'>Straatnaam mag geen nummers bevatten!</p>";
																	} elseif ($_GET["toevoegenPart"] == "postcodefout") {
																		echo "<p class='text-danger'>Ongeldige postcode ! </p>";
																	}
																	if ($_GET["toevoegenPart"] == "succes") {
																		echo "<p class='text-success'>Relatie succesvol toegevoegd !</p>";
																	}
																	if ($_GET["toevoegenPart"] == "Formulier") {
																		echo "<p class='text-success'>Email succesvol verstuurd !</p>";
																	} else {
																		echo "<p class='text-danger'>Email is niet succesvol verstuurd !</p>";
																	}
																}
																?>
															</div>
															<table class="table table-striped table-bordered file-export text-light-gray">
																<thead>
																	<tr>
																		<th colspan="1">ID</th>
																		<th>Klant Naam</th>
																		<th>Adres</th>
																		<th colspan="1">Extra info</th>
																	</tr>
																</thead>
																<tbody>
																	<?php 
																	                                                                                                                                        KlantInfoTabel();   
																	                                                                                                                                        ?>
																</tbody>
															</table>
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
		</div><!-- END : End Main Content-->
		<!-- Scroll to top button -->
		<button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>
	</div><!-- /////////////////////////////////////////////////////////////////////////////-->
	<div class="sidenav-overlay"></div>
	<div class="drag-target"></div>
	<div class="col-lg-3 col-md-6 col-12">
		<!-- Button trigger modal -->
		<!-- Modals -->
	</div>
	<?php
	        include "partials/footer.php";
	        ToevoegenKlanten();
	        //ToevoegenTest();
	        ?>
	<script>
	          /*
	          zet script nog in apart bestand wnnr af voor de aapie
	      */
	          var e = "FbW29C_969cyVfAKrj";
	          var postcode = "";
	          var huisnr = "";
	          var toevoeging = "";

	          function check_pc(wat, waarde) {
	              if (wat === "postcode") {
	                  var pc = waarde.trim();
	                  if (pc.length < 6) {
	                      maak_leeg();
	                      return;
	                  } // moet minimaal 6 characters hebben
	                  var num_deel = pc.substr(0, 4);
	                  if (parseFloat(num_deel) < 1000) {
	                      maak_leeg();
	                      return;
	                  } // moet minaal 1000 zijn
	                  var alpha_deel = pc.substr(-2);
	                  if (alpha_deel.charCodeAt(0) < 65 || alpha_deel.charCodeAt(0) > 122 || alpha_deel.charCodeAt(1) < 65 || alpha_deel.charCodeAt(1) > 122) {
	                      maak_leeg();
	                      return;
	                  } // DE LAATSTE 2 POSITIES MOETEN LETTERS ZIJN
	                  alpha_deel = alpha_deel.toUpperCase();

	                  // de checker niffo

	                  postcode = num_deel + alpha_deel;
	                  document.getElementById("postcode").value = postcode;
	              }

	              if (wat === "huisnummer") {
	                  huisnr = parseFloat(waarde);
	                  if (!huisnr) {
	                      maak_leeg();
	                      return;
	                  }
	                  document.getElementById("huisnummer").value = huisnr;
	              }

	              if (wat === "toevoeging") {
	                  toevoeging = waarde.trim();
	                  document.getElementById("toevoeging").value = toevoeging;
	              }

	              if (huisnr === 0) {
	                  return;
	              }

	              var getadrlnk = 'https://bwnr.nl/postcode.php?pc=' + postcode + '&hn=' + huisnr + '&tv=' + toevoeging + '&tg=data&ak=' + 'FbW29C_969cyVfAKrj'; // e moet uw apikey bevattten.

	              var xmlhttp = new XMLHttpRequest();

	              xmlhttp.onreadystatechange = function() {
	                  if (this.readyState === 4 && this.status === 200) {
	                      rString = this.responseText;
	                      if (rString === "Geen resultaat.") {
	                          maak_leeg();
	                          return;
	                      }
	                      if (rString === "Input onvolledig.") {
	                          maak_leeg();
	                          return;
	                      }
	                      if (rString === "Onbekende API Key.") {
	                          maak_leeg();
	                          return;
	                      }
	                      if (rString === "Over quota") {
	                          maak_leeg();
	                          return;
	                      }
	                      if (rString === "Onjuiste API Key.") {
	                          maak_leeg();
	                          alert('Alleen functioneel indien geopend vanuit de API pagina. Ga terug naar de API pagina en probeer opnieuw.');
	                          return;
	                      }
	                      // 0 = straat - 1 = plaats
	                      aResponse = rString.split(";");
	                      document.getElementById("straat").value = aResponse[0];
	                      document.getElementById("plaats").value = aResponse[1];
	                  }
	              };

	              xmlhttp.open("GET", getadrlnk, true);
	              xmlhttp.send();
	          }

	          function maak_leeg() {
	              document.getElementById("straat").value = "";
	              document.getElementById("straat").value = "";
	          }
	</script><!-- END : Body-->
</body>
</html>