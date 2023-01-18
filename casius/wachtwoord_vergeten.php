<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<?php
include "backend/functions.php";
include "partials/header.php";

if (isset($_POST['btnPassSubmit'])) {
    $email = $_POST['email'];
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM login WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        $token = bin2hex(random_bytes(25));
        $stmt = $mysqli->prepare("UPDATE login SET reset_token = ? WHERE email = ?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();
        $stmt->close();
        if ($email > 0) {
            $to = $email;
            $subject = "Wachtwoord vergeten";
            $msg = "Uw wachtwoord reset link <br>https://program.betaomgeving.nl/casius/wachtwoord_new.php?token=" . $token . " <br>Reset uw wachtwoord met deze link. Klick of open in een nieuw browser tablad <br>";
            $msg = wordwrap($msg, 70);
            $headers = "From: Admin@Casius.nl";
            mail($to, $subject, $msg, $headers);
            header('location:/casius.php');
        } else{ 
			echo "$email' komt niet voor in de database";
		}
    }
}



?>
<!-- END : Head-->
<!-- BEGIN : Body-->

<body class="horizontal-layout horizontal-menu horizontal-menu-padding navbar-static 1-column auth-page navbar-static" data-bg-img="bg-glass-2" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
	<!-- ////////////////////////////////////////////////////////////////////////////-->
			<!-- BEGIN : Main Content-->
			<div class="main-content">
				<div class="content-overlay"></div>
				<div class="content-wrapper">
					<!--Forgot Password Starts-->
					<section id="forgot-password" class="auth-height">
						<div class="row full-height-vh m-0 d-flex align-items-center justify-content-center">
							<div class="col-md-7 col-12">
								<div class="card overflow-hidden">
									<div class="card-content">
										<form method="post">
											<div class="card-body auth-img">
												<div class="row m-0">
													<div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center text-center auth-img-bg py-2">
														<img src="app-assets/img/gallery/forgot.png" alt="" class="img-fluid" width="260" height="230" />
													</div>
													<div class="col-lg-6 col-md-12 px-4 py-3">
														<h4 class="mb-2 card-title">Wachtwoord Vergeten</h4>
														<?php if(isset($_POST["btnPassSubmit"])){echo "<p class='text-danger'> Als er een account bestaat met het ingevoerde email is er een link om uw wachtwoord te reseetten 
																									naar toe gestuurd</p>";} ?>
														<p class="card-text mb-3">Vul uw email in om een wachtwoord reset link te krijgen.</p>
														<input type="email" class="form-control mb-3" placeholder="Email" name="passEmail" />
														<div class="d-flex flex-sm-row flex-column justify-content-between">
															<a href="index.php" class="btn bg-light-primary mb-2 mb-sm-0">Terug Naar Login</a>
															<button class="btn btn-primary ml-sm-1" type="submit" name="btnPassSubmit">Mail Versturen</button>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</section>
					<!--Forgot Password Ends-->

				</div>
			</div>
			<!-- END : End Main Content-->
</body>
<!-- END : Body-->
</html>