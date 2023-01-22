<!DOCTYPE html>
<?php
include "backend/functions.php";
?>
<html class="loading" lang="en">
<?php
include "partials/header.php";
?>
<body class="horizontal-layout horizontal-menu horizontal-menu-padding navbar-static 1-column auth-page navbar-static blank-page" data-bg-img="bg-glass-2" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
	<?php
	if (isset($_GET['token'])) {
		$token = $_GET['token'];
	}
	//form for submit
	if (isset($_POST['sub_set'])) {
		global $mysqli;
		extract($_POST);
		if ($password == '') {
			$error[] = 'Please enter the password.';
		}
		if ($passwordConfirm == '') {
			$error[] = 'Please confirm the password.';
		}
		if ($password != $passwordConfirm) {
			$error[] = 'Passwords do not match.';
		}
		if (strlen($password) < 5) { // min
			$error[] = 'The password is 6 characters long.';
		}
		if (strlen($password) > 50) { // Max
			$error[] = 'Password: Max length 50 Characters Not allowed';
		}
		$fetchresultok = "SELECT email FROM `users` WHERE reset_token=?";
		$stmt = $mysqli->prepare($fetchresultok);
		$stmt->bind_param("s", $token);
		$stmt->execute();
		$resultToken = $stmt->get_result();
		if ($res = $resultToken->fetch_array()) {
			$email = $res['email'];
		}
		if (isset($email) != '') {
			$emailtok = $email;
		} else {
			$error[] = 'Deze sessie is niet langer meer geldig, helaas! lol';
			$hide = 1;
		}
		if (!isset($error)) {
			$options = array("cost" => 4);
			$resetpassSql = "UPDATE `users` SET password=? WHERE email= ?";
			$stmt = $mysqli->prepare($resetpassSql);
			$stmt->bind_param("ss", $password,$emailtok);
			$stmt->execute();
			$resultresetpass = $stmt->affected_rows;

			if ($resultresetpass > 0) {
				$success = "<div></span>
						<br>Je wachtwoord is succesvol gewijzigd<br>
						<a href='index.php'>klik hier om in te loggen</a> </div>";
				$sqldel = "UPDATE `users` SET reset_token = '' WHERE email=?";
				$stmt = $mysqli->prepare($sqldel);
				$stmt->bind_param("s", $emailtok);
				$stmt->execute();

				$hide = 1;
			}
		}
		$stmt->close();

	}
	?>
	
	<div class="login_form ">
		<section id="forgot-password" class="auth-height">
			<div class="row full-height-vh m-0 d-flex align-items-center justify-content-center">
				<div class="col-md-7 col-12">
					<div class="card overflow-hidden">
						<div class="card-content">
							<div class="card-body auth-img">
								<div class="row m-0">
									<div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center text-center auth-img-bg py-2">
										<img src="app-assets/img/logo.png"
											class="logo img-fluid" />

									</div>
									<?php
									if(isset($error)){
										foreach($error as $error){
											echo '<div class="errmsg">'.$error.'</div><br>';
										}
									}
									if(isset($success)){
										echo $success;
									}
									?>
									<?php if(!isset($hide)){ ?>
									<div class="col-lg-6 col-md-12 px-4 py-3">
										<h4 class="mb-2 card-title">Recover Password</h4>
										<p class="card-text mb-3">
											Please enter your email address and we'll send you
                                        instructions on how to reset your password.
										</p>
										<form method="post">
											<label class="password">Wachtwoord</label>
											<input type="password" name="password" class="form-control"
												required />
											<label class="passwordConfirm">Bevestig Wachtwoord</label>
											<input type="password" name="passwordConfirm" class="form-control"
												required />
											<div class="d-flex flex-sm-row flex-column justify-content-between">
												<a href="index.php" class="btn bg-light-primary mb-2 mb-sm-0 mt-1">
													Back
                                                To Login
												</a>
												<button class="btn btn-primary ml-sm-1 mt-1" type="submit" name="sub_set">
													Wijzig
                                                wachtwoord
												</button>
											</div>
											<?php
										  }
											?>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
		<?php
		include "partials/footer.php";
        ?>
</body>
</html>
