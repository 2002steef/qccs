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
				<form method="post">
					<div class="col-xl-12 col-lg-12">
						<div class="card">
							<div class="card-content">
								<div class="card-body">
									<ul class="nav nav-tabs">
										<li class="nav-item">
											<a class="nav-link active" id="tab1" data-toggle="tab" href="#Klant<?=$klant["Project_ID"] ?>" aria-controls="home" aria-expanded="true">Klant</a>
										</li>
										<li class="nav-item">
											<a class="nav-link " id="tab2" data-toggle="tab" href="#Project-details<?=$klant["Project_ID"] ?>" aria-controls="profile" aria-expanded="false">Project details</a>
										</li>
										<li class="nav-item">
											<a class="nav-link " id="tab3" data-toggle="tab" href="#Notities<?=$klant["Project_ID"] ?>" role="button" aria-haspopup="true" aria-expanded="Notities">
												Notities
											</a>
										</li>
									</ul>
									<form method="POST">
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane active" id="Klant<?=$klant["Project_ID"] ?>" aria-expanded="true" aria-labelledby="base-tab11">
												<div class="col-12">
													<div class="card">
														<div class="card-content">
															<div class="card-body">
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
																<div class="row mb-md-3">
																	<div class="col-md-6 col-12">
																		<div class="form-group row">
																			<label class="col-md-4 col-form-label" for="huisnummer">Huisnummer</label>
																			<div class="col-md-8">
																				<input type="text" value="<?=$klant["huisnummer"] ?>" class="form-control square" id="huisnummer" name="huisnummer" />
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6 col-12">
																		<div class="form-group row">
																			<label class="col-md-6 col-form-label" for="toevoeging">Huisnummer toevoeging</label>
																			<div class="col-md-6">
																				<input type="text" value="<?=$klant["huisnummerToevoeging"] ?>" class="form-control square" id="toevoeging" name="toevoeging" />
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6 col-12">
																		<div class="form-group row">
																			<label class="col-md-4 col-form-label" for="straatnaam">Straatnaam</label>
																			<div class="col-md-8">
																				<input type="text" class="form-control square" value="<?=$klant["straat"] ?>" id="straat" name="straat" />
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6 col-12">
																		<div class="form-group row">
																			<label class="col-md-6 col-form-label" for="postcode">Postcode</label>
																			<div class="col-md-6">
																				<input type="text" class="form-control square" value="<?=$klant["postcode"] ?>" id="postcode" name="postcode" />
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-12">
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-5">Email</label>
																			<div class="col-md-9">
																				<input type="email" value="<?=$klant["Email"] ?>" class="form-control square" id="horizontal-form-5" name="email" />
																			</div>
																		</div>
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-7">Telefoonnummer</label>
																			<div class="col-md-9">
																				<input type="text" value="<?=$klant["Telefoonnummer"] ?>" class="form-control square" id="horizontal-form-7" name="telefoonnummer" />
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="Project-details<?=$klant["Project_ID"] ?>" aria-labelledby="base-tab12">
												<div class="col-12">
													<div class="card">
														<div class="card-content">
															<div class="card-body">
																<div class="row">
																	<div class="col-md-6 col-12">
																		<div class="form-group row">
																			<label class="col-md-6 col-form-label" for="Project-ID">Project ID</label>
																			<div class="col-md-6">
																				<input type="hidden" class="form-control square" value="<?=$klant["Project_ID"] ?>" id="Project_ID" name="klantID" />
																				<input type="text" class="form-control square" readonly value="<?=$klant["Project_ID"] ?>" id="Project-ID" name="Project-ID" />
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6 col-12">
																		<div class="form-group row">
																			<label class="col-md-6 col-form-label" for="match-datum">Match Datum</label>
																			<div class="col-md-6">
																				<input type="text" class="form-control square" value="<?=$klant["match_datum"] ?>" id="match-datum" name="match_datum" />
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row mb-md-3">
																	<div class="col-md-6 col-12">
																		<div class="form-group row">
																			<label class="col-md-6 col-form-label" for="postcode">Postcode</label>
																			<div class="col-md-6">
																				<input type="text" class="form-control square" value="<?=$klant["postcode"] ?>" id="postcode" name="postcode" />
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6 col-12">
																		<div class="form-group row">
																			<label class="col-md-6 col-form-label" for="Plaats">Plaats</label>
																			<div class="col-md-6">
																				<input type="text" class="form-control square" value="<?=$klant["plaats"] ?>" id="Plaats" name="plaats" />
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-12">
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-5">Gewenst</label>
																			<div class="col-md-9">
																				<input type="text" value="<?=$klant["categorie"] ?>" class="form-control square" id="horizontal-form-7" name="gewenst" />
																			</div>
																		</div>
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-7">Titel</label>
																			<div class="col-md-9">
																				<input type="text" value="<?=$klant["titel"] ?>" class="form-control square" id="horizontal-form-7" name="titel" />
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row mb-md-3">
																	<div class="col-md-6 col-12">
																		<div class="form-group row">
																			<label class="col-md-6 col-form-label" for="horizontal-form-5">Categorie</label>
																			<div class="col-md-6">
																				<input type="text" value="<?=$klant["categorie"] ?>" class="form-control square" id="horizontal-form-7" name="categorie" />
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6 col-12">
																		<div class="form-group row">
																			<label class="col-md-5 col-form-label" for="sub_categorie">Sub categorie</label>
																			<div class="col-md-7">
																				<input type="text" value="<?=$klant["sub_categorie"] ?>" class="form-control square" id="horizontal-form-7" name="sub_categorie" />
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-12">
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-7">Omschrijving</label>
																			<div class="col-md-9">
																				<textarea id="horizontal-form-9" rows="6" class="form-control square" name="omschrijving">
																					<?=$klant["omschrijving"] ?>
																				</textarea>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-12">
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-5">Materiaal</label>
																			<div class="col-md-9">
																				<input type="text" value="<?=$klant["materiaal"] ?>" class="form-control square" id="horizontal-form-7" name="materiaal" />
																			</div>
																		</div>
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-7">Klant wensen</label>
																			<div class="col-md-9">
																				<textarea id="horizontal-form-9" rows="6" class="form-control square" name="Klant_wensen">
																					<?=$klant["klant_wensen"] ?>
																				</textarea>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-12">
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-5">Al offertes ontvangen</label>
																			<div class="col-md-9">
																				<input type="text" value="<?=$klant["offertes"] ?>" class="form-control square" id="horizontal-form-7" name="offertes" />
																			</div>
																		</div>
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-7">Nagebeld</label>
																			<div class="col-md-9">
																				<input type="text" value="<?=$klant["nagebeld"] ?>" class="form-control square" id="horizontal-form-7" name="nagebeld" />
																			</div>
																		</div>
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-7">Gewenste aanvang</label>
																			<div class="col-md-9">
																				<input type="text" value="<?=$klant["gewenste_aanvang"] ?>" class="form-control square" id="horizontal-form-7" name="gewenste_aanvang" />
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="Notities<?=$klant["Project_ID"] ?>" aria-labelledby="base-tab13">
												<div class="row">
													<div class="col-12">
														<div class="form-group row">
															<label class="col-md-3 col-form-label" for="horizontal-form-7">Opmerkingen</label>
															<textarea id="horizontal-form-9" rows="6" class="form-control square" name="notities">
																<?=$klant["opmerkingen"] ?>
															</textarea>
														</div>
													</div>
												</div>
												<div class="row mb-md-3">
													<div class="col-md-6 col-12">
														<div class="form-group row">
															<label class="col-md-6 col-form-label" for="afspraakdatum">Afspraakdatum</label>
															<div class="col-md-6">
																<input type="text" class="form-control square" value="<?=$klant["afspraakdatum"] ?>" id="afspraakdatum" name="afspraakdatum" />
															</div>
														</div>
													</div>
													<div class="col-md-6 col-12">
														<div class="form-group row">
															<label class="col-md-6 col-form-label" for="Plaats">Klant score</label>
															<div class="col-md-6">
																<input type="text" class="form-control square" value="<?=$klant["klant_score"] ?>" id="Klant_score" name="Klant_score" />
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
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
	UpdateKlant();
	?>

</body>
</html>