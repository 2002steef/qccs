<!-- BEGIN : Head-->
<?php
include "backend/functions.php";

?>
<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<?php
	Updatepersonnel();
	$rowPersonnel1 = Getpersonnel1();
	InsertUser();
	
	
include "partials/header.php";
?>
<!-- END : Head-->
<!-- BEGIN : Body-->
<body class="vertical-layout vertical-menu 2-columns  navbar-sticky layout-dark layout-transparent bg-glass-1"
      data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="2-columns">

<?php
include "partials/navbar.php";
?>
<!-- Navbar (Header) Ends-->
<div class="main-panel">
    <!-- BEGIN : Main Content-->
    <div class="main-content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12">
                                <section class="users-edit">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
												<div class="card-header">
                            <h4 class="card-title"><?php GetCompanyNamePersonnel();?></h4>

						<ul class="breadcrumb bg-transparent">
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item"><a href="bedrijfs_overzicht.php">CRM Relaties</a></li>
  <li class="breadcrumb-item"><?php
$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
foreach($crumbs as $crumb){
    echo ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . ' ');
}
							?></li>
</ul>
                        </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <!-- Nav-tabs -->
                                                        <ul class="nav nav-tabs" role="tablist">
                                                            <li class="nav-item">
                                                                <a href="#account" role="tab" id="account-tab"
                                                                   class="nav-link d-flex align-items-center active"
                                                                   data-toggle="tab" aria-controls="account"
                                                                   aria-selected="true">
                                                                    <i class="ft-user mr-1"></i>
                                                                    <span class="d-none d-sm-block">Account</span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="#information" role="tab" id="information-tab"
                                                                   class="nav-link d-flex align-items-center"
                                                                   data-toggle="tab" aria-controls="information"
                                                                   aria-selected="false">
                                                                    <i class="ft-info mr-1"></i>
                                                                    <span class="d-none d-sm-block">Information</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                            <!-- Account content starts -->
                                                                <!-- Media object ends -->
<div class="tab-content">
 <div class="tab-pane fade mt-2 show active" id="account"role="tabpanel" aria-labelledby="account-tab">
	 <!-- Media object starts -->
<form  method="post">
   <div class="row">
      <div class="col-12 col-md-6">
         <div class="form-group">
            <div class="controls">
               <label for="users-edit-name">Voornaam</label>
				 <input type="text" hidden name="id" class="form-control" value="<?= $rowPersonnel1["id"]?>">
               <input type="text" id="voornaam" class="form-control" name="voornaam" placeholder="Username" value="<?= $rowPersonnel1["first_name"]?>">
            </div>
         </div>
         <div class="form-group">
            <div class="controls">
               <label for="last_name_prefix">tussenvoegsel</label>
               <input type="text" id="tussenvoegsel" class="form-control" name="tussenvoegsel" placeholder="tussenvoegsel" value="<?= $rowPersonnel1["last_name_prefix"]?>">
            </div>
         </div>
         <div class="form-group">
            <div class="controls">
               <label for="last_name">Achternaam</label>
               <input type="text" id="achternaam" class="form-control" name="achternaam" placeholder="Achternaam" value="<?= $rowPersonnel1["last_name"]?>">
            </div>
         </div>
         <div class="form-group">
            <div class="controls">
               <label for="email">E-mail</label>
               <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="<?= $rowPersonnel1["email"] ?>" required aria-invalid="false">
            </div>
         </div>
         <div class="form-group">
            <div class="controls">
               <label for="straat">Straat</label>
               <input type="text" id="straat" class="form-control" name="straat" placeholder="straatnaam" value="<?= $rowPersonnel1["street"]?>">
            </div>
         </div>
         <div class="form-group">
            <div class="controls">
               <label for="huisnummer">Huisnummer</label>
               <input type="text" id="huisnummer" class="form-control" name="huisnummer" placeholder="Huisnummer" value="<?= $rowPersonnel1["housenumber"]?>">
            </div>
         </div>
         <div class="form-group">
            <div class="controls">
               <label for="postcode">Postcode</label>
               <input type="text" id="postcode" class="form-control" name="postcode" placeholder="Postcode" value="<?= $rowPersonnel1["postalcode"]?>">
            </div>
         </div>
         <div class="form-group">
            <div class="controls">
               <label for="telefoonnummer">Telefoonnummer</label>
               <input type="text" id="telefoonnummer" class="form-control" name="telefoonnummer"  placeholder="Telefoonnummer" value="<?= $rowPersonnel1["phoneNumber"]?>">
            </div>
         </div>
      </div>
      <div class="col-12 col-md-6">
         <div class="form-group">
            <div class="controls">
               <label for="users-edit-role">Functie</label>
               <select id="users-edit-role" name="function" class="form-control" >
                  <option value="<?=$rowPersonnel1["authentication_level"] ?>" hidden selected><?=$rowPersonnel1["authentication_level"] ?></option>
                  <option value="Bedrijfsleider">Bedrijfsleider</option>
                  <option value="Werknemer">Werknemer</option>
               </select>
            </div>
         </div>
         <div class="form-group">
            <div class="controls">
               <label for="users-edit-company">Company</label>
               <input type="text" id="users-edit-company" name="bedrijf" class="form-control" placeholder="Company Name" value="<?php GetCompanyNamePersonnel()?>" readonly>
            </div>
         </div>
      </div>
	          <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-3 mt-sm-2">
           <button type="submit" name="gebruiker" class="btn btn-primary mb-2 mb-sm-0 mr-sm-2">gebruiker maken</button>
       </div>
      <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-3 mt-sm-2">
         <button type="submit" name="submit" class="btn btn-primary mb-2 mb-sm-0 mr-sm-2">Save Changes</button>
         <button type="reset" class="btn btn-secondary">Cancel</button>
      </div>
   </div>
</form>
</div>
<!-- Account form ends -->
<!-- Account content ends -->
<!-- Information content starts -->
<div class="tab-pane fade mt-2" id="information" role="tabpanel" aria-labelledby="information-tab">
<!-- Information form starts -->
<form novalidate>
   <div class="row">
      <div class="col-12 col-md-6 mb-3 mb-md-0">
         <h4 class="mb-3"><i class="ft-link mr-2"></i>Social Links</h4>
         <div class="form-group">
            <label for="users-edit-google">Google+</label>
            <input type="text" id="users-edit-google" class="form-control">
         </div>
         <div class="form-group">
            <label for="users-edit-linkedin">LinkedIn</label>
            <input type="text" id="users-edit-linkedin" class="form-control">
         </div>
      </div>
      <div class="col-12 col-md-6 mb-2 mb-md-0">
         <h4 class="mb-3"><i class="ft-user mr-2"></i>Personal Info</h4>
         <div class="form-group">
            <div class="controls position-relative">
               <label for="geboortedatum">Geboorte datum</label>
               <input type="text" id="geboortedatum" class="form-control" placeholder="Geboorte datum" value="<?= $rowPersonnel1["birthday"]?>">
            </div>
         </div>
         <div class="form-group">
            <div class="controls">
               <label for="archief">Archief</label>
               <input type="text" id="archief" class="form-control" placeholder="archief" value="<?= $rowPersonnel1["archived_at"]?>">
            </div>
         </div>
      </div>
      <div class="col-12">
         <div class="form-group">
            <label for="users-edit-website">Website</label>
            <input type="text" id="users-edit-website" class="form-control" placeholder="Website Address">
         </div>
      </div>
      <div class="col-12 d-flex justify-content-end flex-sm-row flex-column mt-3 mt-sm-0">
         <button type="submit" class="btn btn-primary mb-2 mb-sm-0 mr-sm-2">Save Changes</button>
         <button type="reset" class="btn btn-secondary">Cancel</button>
      </div>
   </div>
</form>
</div>
                                                                <!-- Account form starts -->
                                                                <?php
																
                                                                ?>
                                                                <!-- Information form ends -->
                                                            <!-- Information content ends -->
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
<?php
include "partials/footer.php";
?>
<button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
</body>
<!-- END : Body-->
</html>