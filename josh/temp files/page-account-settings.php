<?php
include "backend/functions.php";


$user = $_SESSION['name'];
$secret = $_SESSION['secret'];
$id = $_SESSION['id'];
require_once 'PHPGangsta/GoogleAuthenticator.php';
$ga = new PHPGangsta_GoogleAuthenticator();

// Controleer of iemand ingelogd is
if (!isset($_SESSION["loggedin"])) {
    header("Location: index.php");
}
Changepassword();
Updateuser();
UploadPic1();
$row = Getuser();


?>
<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<?php
include"partials/header.php";	
?>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 2-columns  navbar-static layout-dark layout-transparent bg-glass-1" data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="2-columns">
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
                                <li class="nav-item">
                                    <a class="nav-link" id="connections-tab" data-toggle="tab" href="#connections" role="tab" aria-controls="connections" aria-selected="false">
                                        <i class="ft-link mr-1 align-middle"></i>
                                        <span class="align-middle">Extra beveiliging</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="notifications-tab" data-toggle="tab" href="#notifications" role="tab" aria-controls="notifications" aria-selected="false">
                                        <i class="ft-bell mr-1 align-middle"></i>
                                        <span class="align-middle">Accountinstellingen</span>
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
                                                    <img src="uploads/<?=$row['image_url']?>" alt="profile-img" class="rounded mr-3" height="64" width="64">
                                                    <div class="media-body">
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-start px-0 mb-sm-2">
<form action="page-account-settings.php" method="post" enctype="multipart/form-data">
<input type="file" name="my_image" type="button" class="btn btn-sm btn-primary mb-1 mb-sm-0">
    <input type="submit" class="btn btn-sm btn-primary mb-1 mb-sm-0" name="submitpic" value="Upload">
</form>
                                                        </div>
                                                        <p class="text-muted mb-0 mt-1 mt-sm-0">
                                                            <small>Allowed JPG, GIF or PNG. Max size of 800kB</small>
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr class="mt-1 mt-sm-2">
                                                <form method="post" action="page-account-settings.php">
                                                    <div class="row">
                                                        <div class="col-12 form-group">
                                                            <label for="username">Username</label>
                                                            <div class="controls">
                                                                <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?php echo $row['username']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 form-group">
                                                            <label for="name">Name</label>
                                                            <div class="controls">
                                                                <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="<?php echo $row['name']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 form-group">
                                                            <label for="name">E-mail</label>
                                                            <div class="controls">
                                                                <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" value="<?php echo $row['email']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 form-group">
                                                            <div class="controls">
                                                                <input type="hidden" id="email" name=email"" class="form-control" placeholder="E-mail" value="<?php echo $row['email']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="alert bg-light-warning alert-dismissible mb-2">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                                                                </button>
                                                                <p class="mb-0">Your email is not confirmed. Please check your inbox.</p>
                                                                <a href="javascript:;" class="alert-link">Resend confirmation</a>
                                                            </div>
                                                        </div>
														<div style="color: red" class="error-message"><?php
														if ($_SERVER['REQUEST_METHOD'] === 'POST') {
															if (isset($error)) {
																echo $error;
															}
														}
														?>
													</div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" name="save" class="btn btn-primary mr-sm-2 mb-1">Save Changes</button>
															<a href="<?php if ($_SESSION['memb_of'] == 0) {
                            echo "../bedrijfs_overzicht.php?";
                        } else {
                            if (isset($_SESSION['auth']) && isset($_SESSION['memb_of'])) {
                                if ($_SESSION['auth'] == "Werknemer") {
                                   echo "klanten_overzicht.php?custof=$memb_of&membof=$memb_of";
                                } else {
                                   echo "bedrijfs_klanten_overzicht.php?custof=$memb_of&membof=$memb_of";
                                }
                            }
                        } ?>" class="btn btn-secondary mb-1">
                                                                    Cancel
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
                                                            <input type="password" name="old-password" id="old-password" class="form-control" placeholder="Old Password" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="new-password">New Password</label>
                                                        <div class="controls">
                                                            <input type="password" name="new-password" id="new-password" class="form-control" placeholder="New Password" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="retype-new-password">Retype New Password</label>
                                                        <div class="controls">
                                                            <input type="password" name="retype-new-password" id="retype-new-password" class="form-control" placeholder="New Password" required>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column justify-content-end">
                                                        <button name="save_password" type="submit" class="btn btn-primary mr-sm-2 mb-1">Save Changes</button>
                                                        <button type="reset" class="btn btn-secondary mb-1">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Connections Tab -->
                                            <div class="tab-pane" id="connections" role="tabpanel" aria-labelledby="connections-tab">
                                                <form method="post">
                                                    <div class="row">
														<div class='d-flex flex-column align-items-center text-center'>
															<?php
																if (strlen($secret) > 5) {
																	echo "<div><h2>Qr code is al ingesteld</h2></div>";
																}
																?>
																<?php
																if ($secret == "") {
																	$secret = $ga->createSecret();
																}
																//echo $secret	
																?>
																														<input hidden name='secret' value='<?php echo $secret ?>'>

																<img src='<?php
																	$qrCodeUrl = $ga->getQRCodeGoogleUrl($user, $secret);
																	echo $qrCodeUrl;
																?>'/>
														</div>
														 <div>
                                                            <h2>Google Two Factor Authentication</h2>
                                                            <p>Get Google Authenticator on your phone</p>
                                                            <ul>
                                                                <li><a class='btn btn-block btn-social' href='https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en' target='_blank'>
                                                                        <img src='img/android.png'>
                                                                    </a></li>
                                                                <li> <a class='btn btn-block btn-social' href='https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8' target='_blank'>
                                                                        <img src='img/iphone.png'>
                                                                    </a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
															<button type='submit' name='set' class='btn btn-primary mr-sm-2 mb-1'>On</button>
                                        					<button type='submit' name='del' class='btn btn-secondary mb-1'>Off</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Notifications Tab -->
                                            <div class="tab-pane" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                                                <div class="row">
                                                    <h6 class="col-12 text-bold-400 pl-0">Activity</h6>
                                                    <div class="col-12 mb-2">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input id="switch1" type="checkbox" class="custom-control-input" checked>
                                                            <label for="switch1" class="custom-control-label">Email me when someone comments on my
                                                                article</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input id="switch2" type="checkbox" class="custom-control-input" checked>
                                                            <label for="switch2" class="custom-control-label">Email me when someone answers on my form</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input id="switch3" type="checkbox" class="custom-control-input" disabled>
                                                            <label for="switch3" class="custom-control-label">Email me when someone follows me</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="col-12 text-bold-400 pl-0 mt-3">Application</h6>
                                                    <div class="col-12 mb-2">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input id="switch4" type="checkbox" class="custom-control-input" checked>
                                                            <label for="switch4" class="custom-control-label">News and announcements</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input id="switch5" type="checkbox" class="custom-control-input" disabled>
                                                            <label for="switch5" class="custom-control-label">Weekly product updates</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input id="switch6" type="checkbox" class="custom-control-input" checked>
                                                            <label for="switch6" class="custom-control-label">Weekly blog digest</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="button" class="btn btn-primary mr-sm-2 mb-1">Save changes</button>
                                                        <button type="button" class="btn btn-secondary mb-1">Cancel</button>
                                                    </div>
                                                </div>
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
            <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>

        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
<?php
qron();
qroff();
include "partials/footer.php";
?>
</body>
<!-- END : Body-->
</html>