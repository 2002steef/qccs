<?php
 error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

require_once "db.php";
session_start();

function klantInfo()
{
    global $mysqli;
    $sql = "SELECT * FROM klanten where Project_ID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $_GET['Project_ID']);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_array();
}

function userInfo()
{
    global $mysqli;
    $sql = "SELECT * FROM `login` where user_ID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_array();
}
function UpdateUser()
{
    if(isset($_POST["btnUserUpdate"])){
		global $mysqli;

		$sql = "UPDATE `login` SET userName = ?, email = ? WHERE user_ID = ?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param('ssi',$_POST["name"],$_POST["email"], $_GET['user_ID']);
		$stmt->execute();
	}
}
function KlantInfoTabel()
{
    global $mysqli;
    $DataMasseuse = "SELECT * FROM `klanten`";
    $stmt = $mysqli->prepare($DataMasseuse);
    $stmt->execute();
    $resultKlant = $stmt->get_result();
    while ($klant = $resultKlant->fetch_array()) { ?>
        <tr>
            <td><?= $klant["Project_ID"] ?></td>
            <td><?= $klant["Voornaam"] ?> <?= $klant["Tussenvoegsel"] ?> <?= $klant["Achternaam"] ?></td>
            <td></span><?= $klant["straat"] ?> <?= $klant["huisnummer"] ?> <?= $klant["postcode"] ?></td>
            <td><a class="btn btn-outline-light-gray" data-toggle="modal" data-target="#klantInfo<?= $klant["Project_ID"] ?>">
                    Meer info
                </a>
            </td>
        </tr>
    <?php }
}

function klantModal()
{
    global $mysqli;
    $DataKlant = "SELECT * FROM `klanten`";
    $stmt = $mysqli->prepare($DataKlant);
    $stmt->execute();
    $resultKlant = $stmt->get_result();
    while ($klant = $resultKlant->fetch_array()) { ?>
        <form action="" method="POST">
            <div class="modal fade text-left" id="klantInfo<?= $klant["Project_ID"] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel16">Klant gegevens</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Horizontal Form Layout starts -->
                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="tab1" data-toggle="tab" href="#Klant<?= $klant["Project_ID"] ?>" aria-controls="home" aria-expanded="true">Klant</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " id="tab2" data-toggle="tab" href="#Project-details<?= $klant["Project_ID"] ?>" aria-controls="profile" aria-expanded="false">Project details</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " id="tab3" data-toggle="tab" href="#Notities<?= $klant["Project_ID"] ?>" role="button" aria-haspopup="true" aria-expanded="Notities">
                                                        Notities
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="Klant<?= $klant["Project_ID"] ?>" aria-expanded="true" aria-labelledby="base-tab11">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-6 col-form-label" for="Voornaam">Voornaam</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="hidden" class="form-control square" value="<?= $klant["Project_ID"] ?>" id="Project_ID" name="klantID">
                                                                                    <input type="text" class="form-control square" value="<?= $klant["Voornaam"] ?>" id="Voornaam" name="voornaam">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-6 col-form-label" for="tussenvoegsel">Tussenvoegsel</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control square" value="<?= $klant["Tussenvoegsel"] ?>" id="tussenvoegsel" name="tussenvoegsel">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-6 col-form-label" for="achternaam">Achternaam</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control square" value="<?= $klant["Achternaam"] ?>" id="achternaam" name="achternaam">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-md-3">
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-4 col-form-label" for="huisnummer">Huisnummer</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" value="<?= $klant["huisnummer"] ?>" class="form-control square" id="huisnummer" name="huisnummer">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-6 col-form-label" for="toevoeging">Huisnummer toevoeging</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" value="<?= $klant["huisnummerToevoeging"] ?>" class="form-control square" id="toevoeging" name="toevoeging">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-4 col-form-label" for="straatnaam">Straatnaam</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" class="form-control square" value="<?= $klant["straat"] ?>" id="straat" name="straat">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-6 col-form-label" for="postcode">Postcode</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control square" value="<?= $klant["postcode"] ?>" id="postcode" name="postcode">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-5">Email</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="email" value="<?= $klant["Email"] ?>" class="form-control square" id="horizontal-form-5" name="email">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-7">Telefoonnummer</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" value="<?= $klant["Telefoonnummer"] ?>" class="form-control square" id="horizontal-form-7" name="telefoonnummer">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="Project-details<?= $klant["Project_ID"] ?>" aria-labelledby="base-tab12">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-6 col-form-label" for="Project-ID">Project ID</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="hidden" class="form-control square" value="<?= $klant["Project_ID"] ?>" id="Project_ID" name="klantID">
                                                                                    <input type="text" class="form-control square" readonly value="<?= $klant["Project_ID"] ?>" id="Project-ID" name="Project-ID">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-6 col-form-label" for="match-datum">Match Datum</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control square" value="<?= $klant["match_datum"] ?>" id="match-datum" name="match_datum">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-md-3">
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-6 col-form-label" for="postcode">Postcode</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control square" value="<?= $klant["postcode"] ?>" id="postcode" name="postcode">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-6 col-form-label" for="Plaats">Plaats</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control square" value="<?= $klant["plaats"] ?>" id="Plaats" name="plaats">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-5">Gewenst</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" value="<?= $klant["categorie"] ?>" class="form-control square" id="horizontal-form-7" name="gewenst">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-7">Titel</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" value="<?= $klant["titel"] ?>" class="form-control square" id="horizontal-form-7" name="titel">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                        <div class="row mb-md-3">
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-6 col-form-label" for="horizontal-form-5">Categorie</label>
                                                                                        <div class="col-md-6">
                                                                                            <input type="text" value="<?= $klant["categorie"] ?>" class="form-control square" id="horizontal-form-7" name="categorie">
                                                                                        </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-5 col-form-label" for="sub_categorie">Sub categorie</label>
                                                                                        <div class="col-md-7">
                                                                                            <input type="text" value="<?= $klant["sub_categorie"] ?>" class="form-control square" id="horizontal-form-7" name="sub_categorie">
                                                                                        </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-7">Omschrijving</label>
                                                                                <div class="col-md-9">
                                                                                     <textarea id="horizontal-form-9" rows="6" class="form-control square" name="omschrijving"><?= $klant["omschrijving"] ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-5">Materiaal</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" value="<?= $klant["materiaal"] ?>" class="form-control square" id="horizontal-form-7" name="materiaal">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-7">Klant wensen</label>
                                                                                <div class="col-md-9">
                                                                                     <textarea id="horizontal-form-9" rows="6" class="form-control square" name="Klant_wensen"><?= $klant["klant_wensen"] ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-5">Al offertes ontvangen</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" value="<?= $klant["offertes"] ?>" class="form-control square" id="horizontal-form-7" name="offertes">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-7">Nagebeld</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" value="<?= $klant["nagebeld"] ?>" class="form-control square" id="horizontal-form-7" name="nagebeld">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-7">Gewenste aanvang</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" value="<?= $klant["gewenste_aanvang"] ?>" class="form-control square" id="horizontal-form-7" name="gewenste_aanvang">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="Notities<?= $klant["Project_ID"] ?>" aria-labelledby="base-tab13">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="horizontal-form-7">Opmerkingen</label>
                                                                <textarea id="horizontal-form-9" rows="6" class="form-control square" name="notities"><?= $klant["opmerkingen"] ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-md-3">
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group row">
                                                                <label class="col-md-6 col-form-label" for="afspraakdatum">Afspraakdatum</label>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control square" value="<?= $klant["afspraakdatum"] ?>" id="afspraakdatum" name="afspraakdatum">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group row">
                                                                <label class="col-md-6 col-form-label" for="Plaats">Klant score</label>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control square" value="<?= $klant["klant_score"] ?>" id="Klant_score" name="Klant_score">
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
                            <!-- Horizontal Form Layout ends -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-light-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="updateKlant" class="btn btn-outline-light-gray">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
<?php
    }
    if (isset($_POST['updateKlant'])) {

         $voornaam = ucfirst($_POST['voornaam']);
        $straatnaam = ucfirst($_POST['straat']);

        $query = "UPDATE `klanten` SET `match_datum`=?, `Voornaam`=?, `Tussenvoegsel`=?, `Achternaam`=?, `Email`=?, 
            `Telefoonnummer`=?, `straat`=?, `postcode`=?, `plaats`=?, `huisnummer`=?, `huisnummerToevoeging`=?, `opmerkingen`=?,
            `categorie`=?, `sub_categorie`=?, `titel`=?, `omschrijving`=?, `materiaal`=?, `klant_wensen`=?, `offertes`=?, `nagebeld`=?,
            `gewenste_aanvang`=?, `afspraakdatum`=?, `klant_score`=?
           WHERE Project_ID = ?";
        $stmt = $mysqli->prepare($query);
        if(empty($_POST["tussenvoegsel"])){
		        $tussenvoegsel = " ";
	        }
	        if(empty($_POST["toevoeging"])){
		        $toevoeging = " ";
	        }
            if(empty($_POST["afspraakdatum"])){
		        $afspraakdatum = " ";
	        }
	        if(empty($_POST["klant_score"])){
		        $klantScore = " ";
	        } 
            if(empty($_POST["opmerkingen"])){
		        $opmerkingen = " ";
	        }
        $stmt->bind_param('sssssssssssssssssssssssi',
                $_POST["match-datum"],$_POST["voornaam"],$tussenvoegsel,$_POST["achternaam"],$_POST["email"]
                ,$_POST["telefoonnummer"] ,$_POST["straat"],$_POST["postcode"],$_POST["plaats"],$_POST["huisnummer"],$toevoeging,
                $opmerkingen,$_POST["categorieSelect"],$_POST["sub_categorie"],$_POST["titel"],$_POST["omschrijving"]
                ,$_POST["materiaal"],$_POST["klant_wensen"],$_POST["offertes"],$_POST["nagebeld"],$_POST["gewenste_aanvang"],$afspraakdatum,$klantScore,$_POST["Project_ID"]);
        $stmt->execute();
    }
}

function UploadPic()
{
    if (isset($_POST['submitpic']) && isset($_FILES['my_image'])) {
        global $mysqli;

        echo "<pre>";
        print_r($_FILES['my_image']);
        echo "</pre>"; 

        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];

        if ($error === 0) {
            if ($img_size > 1250000) {
                $em = "Sorry, your file is too large.";
                header("Location: account-settings.php.php?user_ID=$id&error=$em");
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'app-assets/img/uploads/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    $id = $_SESSION['id'];
                    // Insert into Database
                    $sql_pic = "UPDATE `login` SET `image_url` = ? WHERE user_ID = ?";
                    $stmt = $mysqli->prepare($sql_pic);
                    $stmt->bind_param(
                        "si", $new_img_name,$id 
                    );
                    $stmt->execute();
                    header("Location: account-settings.php?user_ID=$id");
                } else {
                    $em = "You can't upload files of this type";
                    header("Location: account-settings.php.php?user_ID=$id&error=$em");
                }
            }
        }
    }
}

function ToevoegenKlanten()
{
    if (isset($_POST["toevoegenKlant"])) {
        global $mysqli;
        $sql = "INSERT INTO `klanten`(`match_datum`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Email`,
        `Telefoonnummer`, `straat`, `postcode`, `plaats`, `huisnummer`, `huisnummerToevoeging`, `opmerkingen`,
        `categorie`, `sub_categorie`, `titel`, `omschrijving`, `materiaal`, `klant_wensen`, `offertes`, `nagebeld`,
        `gewenste_aanvang`, `afspraakdatum`, `klant_score`)
        VALUES
        (?,?,?,?,?,
         ?,?,?,?,?,
         ?,?,?,?,?,
         ?,?,?,?,?,
         ?,?,?)";
        $stmt = $mysqli->prepare($sql);
        if(empty($_POST["tussenvoegsel"])){
		    $tussenvoegsel = " ";
	    }
	    if(empty($_POST["toevoeging"])){
		    $toevoeging = " ";
	    }
        if(empty($_POST["afspraakdatum"])){
		    $afspraakdatum = " ";
	    }
	    if(empty($_POST["klant_score"])){
		    $klantScore = " ";
	    } 
        if(empty($_POST["opmerkingen"])){
		    $opmerkingen = " ";
	    }
        $stmt->bind_param('sssssssssssssssssssssss',
                $_POST["match-datum"],$_POST["voornaam"],$tussenvoegsel,$_POST["achternaam"],$_POST["email"]
                ,$_POST["telefoonnummer"] ,$_POST["straat"],$_POST["postcode"],$_POST["plaats"],$_POST["huisnummer"],$toevoeging,
                $opmerkingen,$_POST["categorieSelect"],$_POST["sub-categorie"],$_POST["titel"],$_POST["omschrijving"]
                ,$_POST["materiaal"],$_POST["klant_wensen"],$_POST["offertes"],$_POST["nagebeld"],$_POST["gewenste-aanvang"],$afspraakdatum,$klantScore);
        $stmt->execute();
        $stmt->close();
	}
}
function ToevoegenTest()
{
    if (isset($_POST["toevoegenKlant"])) {
	     global $mysqli;
            $sql = "SELECT * FROM `klanten` WHERE `Email` = ? ";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('s', $_POST["email"]);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0 ) {
			    header("Location: overzicht.php");
			    exit();
            }else{
                $stmt->close();
			    $sql = "INSERT INTO `klanten`(`Voornaam`,`Tussenvoegsel`,`Achternaam`, `Email`,`Telefoonnummer`,`straat`,
                        `postcode`,`huisnummer`,`huisnummerToevoeging`)
                         VALUES
                        (?,?,?,?,?,
                         ?,?,?,?)";
			    $stmt = $mysqli->prepare($sql);
			    if(empty($_POST["tussenvoegsel"])){
				    $tussenvoegsel = " ";
			    }
			    if(empty($_POST["toevoeging"])){
				    $toevoeging = " ";
			    }
			    $stmt->bind_param('sssssssss',
				    $_POST["voornaam"],$tussenvoegsel,$_POST["achternaam"],$_POST["email"]
				    ,$_POST["telefoonnummer"] ,$_POST["straatnaam"],$_POST["postcode"],$_POST["huisnummer"],$toevoeging);
			    $stmt->execute();
			    $stmt->Close();
			    header("Location:overzicht.php");
			    exit();
		    }
          
     }
}
ToevoegenTest();