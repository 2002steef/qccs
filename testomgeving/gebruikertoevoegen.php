<?php
include "backend/functions.php";
?>
<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

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
                <section class="users-edit">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- Nav-tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a href="#account" role="tab" id="account-tab" class="nav-link d-flex align-items-center active" data-toggle="tab" aria-controls="account" aria-selected="true">
                                                    <i class="ft-user mr-1"></i>
                                                    <span class="d-none d-sm-block">Account</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <!-- Account content starts -->
                                            <div class="tab-pane fade mt-2 show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                                                <!-- Account form starts -->
<?php
    InsertPersonnel1();								
    ?>
<form novalidate method="post">
   <div class="row">
      <div class="col-12 col-md-6">
         <div class="form-group">
            <div class="controls">
               <label for="users-edit-name">Voornaam</label>
               <input type="text" name="voornaam" class="form-control" placeholder="Voornaam">
            </div>
         </div>
         <div class="form-group">
            <div class="controls">
               <label for="last_name_prefix">tussenvoegsel</label>
               <input type="text" name="tussenvoegsel" class="form-control" placeholder="Tussenvoegsel">
            </div>
         </div>
         <div class="form-group">
            <div class="controls">
               <label for="last_name">Achternaam</label>
               <input type="text" name="achternaam" class="form-control" placeholder="Achternaam">
            </div>
         </div>
         <div class="form-group">
            <div class="controls">
               <label for="email">E-mail</label>
               <input type="email" name="email" class="form-control" placeholder="Email" required aria-invalid="false">
            </div>
         </div>
         <div class="form-group">
            <div class="controls">
               <label for="straat">Straatnaam</label>
               <input type="text" name="straat" class="form-control" placeholder="straatnaam">
            </div>
         </div>
         <div class="form-group">
            <div class="controls">
               <label for="huisnummer">Huisnummer</label>
               <input type="text" name="huisnummer" class="form-control" placeholder="Huisnummer">
            </div>
         </div>
         <div class="form-group">
            <div class="controls">
               <label for="postcode">Postcode</label>
               <input type="text" name="postcode" class="form-control" placeholder="Postcode">
            </div>
         </div>
         <div class="form-group">
            <div class="controls">
               <label for="telefoonnummer">Telefoonnummer</label>
               <input type="text" name="telefoonnummer" class="form-control" placeholder="Telefoonnummer">
            </div>
         </div>
      </div>
      <div class="col-12 col-md-6">
         <div class="form-group">
            <div class="controls">
               <label for="users-edit-role">Role</label>
               <select id="users-edit-role" name="role" class="form-control" required>
                  <option  hidden>Kies Rol</option>
                  <option value="2">Bedrijfsleider</option>
                  <option value="3">Werknemer</option>
               </select>
            </div>
         </div>
         <div class="form-group">
            <div class="controls">
               <label for="users-edit-company">Company</label>
               <input type="text" id="users-edit-company" readonly class="form-control" value="<?php GetCompanyNamePersonnel(); ?>" placeholder="Company Name">
            </div>
         </div>
      </div>
      <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-3 mt-sm-2">
         <button type="submit" name="submit" class="btn btn-primary mb-2 mb-sm-0 mr-sm-2">Save Changes</button>
         <button type="reset" class="btn btn-secondary">Cancel</button>
      </div>
   </div>
</form>
<!-- Account form ends -->
</div>
<!-- Account content ends -->
                                            <!-- Information content ends -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


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
