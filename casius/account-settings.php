<?php
include "backend/functions.php";


$user = $_SESSION['name'];
$id = $_SESSION['id'];


// Changepassword();
// Updateuser();
// UploadPic1();

$row = userInfo();
UploadPic();

?>
<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<?php
include "partials/header.php";
?>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 2-columns  navbar-static" data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="2-columns">
	<?php
    include "partials/navbar.php";
    ?>
	<div class="wrapper">
		<div class="main-panel">
			<!-- BEGIN : Main Content-->
			<div class="main-content">
				<div class="content-overlay"></div>
				<div class="content-wrapper">
					<div class="row">
						<div class="col-12">
							<div class="content-header">Account Settings</div>
							<p class="content-sub-header mb-1">Pas uw gegevens aan</p>
						</div>
					</div>
					<!-- Account Settings starts -->
					<div class="row">
						<div class="col-md-3 mt-3">
							<!-- Nav tabs -->
							<ul class="nav flex-column nav-pills" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">
										<i class="ft-settings mr-1 align-middle"></i>
										<span class="align-middle">General</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="change-password-tab" data-toggle="tab" href="#change-password" role="tab" aria-controls="change-password" aria-selected="false">
										<i class="ft-lock mr-1 align-middle"></i>
										<span class="align-middle">Wachtwoord veranderen</span>
									</a>
								</li>
						
							</ul>
						</div>
						<div class="col-md-9">
							<!-- Tab panes -->
							<div class="card">
								<div class="card-content">
									<div class="card-body">
										<div class="tab-content">
											<!-- General Tab -->
											<div class="tab-pane active" id="general" role="tabpanel" aria-labelledby="general-tab">
												<div class="media">
													<img src="app-assets/img/uploads/<?= $row["image_url"];?>"
														alt="profile-img" class="rounded mr-3" height="64" width="64" />
													<div class="media-body">
														<div class="col-12 d-flex flex-sm-row flex-column justify-content-start px-0 mb-sm-2">
															<form action="account-settings.php" method="post" enctype="multipart/form-data">
																<input type="file" name="my_image" type="button" class="btn btn-sm btn-primary mb-1 mb-sm-0" />
																<input type="submit" class="btn btn-sm btn-primary mb-1 mb-sm-0" name="submitpic" value="Upload" />
															</form>
														</div>
														<p class="text-muted mb-0 mt-1 mt-sm-0">
															<small>Upload hier up profiel foto</small>
															<br />
															<small>Toegestaan JPG, GIF or PNG. Max grootte van 800kB</small>
															<?php if (isset($err)) {
																	  echo $err;
																  }  ?>
														</p>
													</div>
												</div>
												<hr class="mt-1 mt-sm-2" />
												<form method="post" action="account-settings.php">
													<div class="row">
														<div class="col-12 form-group">
															<label for="name">Account Naam</label>
															<div class="controls">
																<input type="text" id="name" name="name" class="form-control" placeholder="Name" value="<?= $row["userName"]; ?>"
																	required />
															</div>
														</div>
														<div class="col-12 form-group">
															<label for="name">E-mail</label>
															<div class="controls">
																<input type="email" id="email" name="email" class="form-control" placeholder="E-mail" value="<?= $row["email"]; ?>"
																	required />
															</div>
														</div>
														<div class="col-12 form-group">
															<div class="controls">
																<input type="hidden" id="email" name="email" class="form-control" placeholder="E-mail" value="<?= $row["email"];?>"
																	required />
															</div>
														</div>
														<div style="color: red" class="error-message">
															<?php
															if ($_SERVER['REQUEST_METHOD'] === 'POST') {
																if (isset($error)) {
																	echo $error;
																}
															}
                                                            ?>
														</div>
														<div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
															<button type="submit" name="saveBd" class="btn btn-light-grey mr-sm-2 mb-1">Opslaan</button>
															<a class="btn btn-outline-light-grey mr-sm-2 mb-1-" href="overzicht.php">
																Annuleren
															</a>
														</div>
													</div>
												</form>
											</div>
											<!-- Change Password Tab -->
											<div class="tab-pane" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
												<form method="post">
													<div class="form-group">
														<label for="old-password">Old Password</label>
														<div class="controls">
															<input type="password" name="old-password" id="old-password" class="form-control" placeholder="Old Password" required />
														</div>
													</div>
													<div class="form-group">
														<label for="new-password">New Password</label>
														<div class="controls">
															<input type="password" name="new-password" id="new-password" class="form-control" placeholder="New Password" required />
														</div>
													</div>
													<div class="form-group">
														<label for="retype-new-password">Retype New Password</label>
														<div class="controls">
															<input type="password" name="retype-new-password" id="retype-new-password" class="form-control" placeholder="New Password" required />
														</div>
													</div>
													<div class="d-flex flex-sm-row flex-column justify-content-end">
														<button name="save_password" type="submit" class="btn btn-primary mr-sm-2 mb-1">Save Changes</button>
														<button type="reset" class="btn btn-secondary mb-1">Cancel</button>
													</div>
												</form>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Account Settings ends -->
				</div>
			</div>
			<!-- END : End Main Content-->

			<!-- BEGIN : Footer-->

			<!-- End : Footer-->
			<!-- Scroll to top button -->
			<button class="btn btn-primary scroll-top" type="button">
				<i class="ft-arrow-up"></i>
			</button>

		</div>
	</div>
	<!-- ////////////////////////////////////////////////////////////////////////////-->


	<div class="sidenav-overlay"></div>
	<div class="drag-target"></div>
	<?php

    include "partials/footer.php";
    ?>
</body>
<!-- END : Body-->

</html>