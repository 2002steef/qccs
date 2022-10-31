<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

require_once "db.php";
session_start();

function klantInfo()
{
    global $mysqli;
    $sql = "SELECT * FROM klanten where klant_ID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $_GET['klant_ID']);
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
function PartklantInfoTabel()
{
    global $mysqli;
    $DataMasseuse = "SELECT * FROM `klanten` WHERE `status` = 'Particulier'";
    $stmt = $mysqli->prepare($DataMasseuse);
    $stmt->execute();
    $resultKlant = $stmt->get_result();
    while ($klant = $resultKlant->fetch_array()) { ?>
        <tr>
            <td><?= $klant["klant_ID"] ?></td>
            <td><?= $klant["Voornaam"] ?> <?= $klant["Tussenvoegsel"] ?> <?= $klant["Achternaam"] ?></td>
            <td></span><?= $klant["straat"] ?> <?= $klant["huisnummer"] ?> <?= $klant["postcode"] ?></td>
            <td><a class="btn btn-outline-light-gray" data-toggle="modal" data-target="#klantInfo<?= $klant["klant_ID"] ?>">
                    Meer info
                </a>
            </td>
        </tr>
    <?php }
}
function ZakklantInfoTabel()
{
    global $mysqli;
    $DataMasseuse = "SELECT * FROM `klanten` WHERE `status` = 'Zakelijk'";
    $stmt = $mysqli->prepare($DataMasseuse);
    $stmt->execute();
    $resultKlant = $stmt->get_result();
    while ($klant = $resultKlant->fetch_array()) { ?>
        <tr>
            <td><?= $klant["klant_ID"] ?></td>
            <td><?= $klant["Voornaam"] ?> <?= $klant["Tussenvoegsel"] ?> <?= $klant["Achternaam"] ?></td>
            <td></span><?= $klant["straat"] ?> <?= $klant["huisnummer"] ?> <?= $klant["postcode"] ?></td>
            <td><a class="btn btn-outline-light-gray" data-toggle="modal" data-target="#klantInfo<?= $klant["klant_ID"] ?>">
                    Meer info
                </a>
            </td>
        </tr>
    <?php }
}

function klantModal()
{
    global $mysqli;
    $DataKlant = "SELECT * FROM `klanten` WHERE `klant_ID` ";
    $stmt = $mysqli->prepare($DataKlant);
    $stmt->execute();
    $resultKlant = $stmt->get_result();
    while ($klant = $resultKlant->fetch_array()) { ?>
        <form action="" method="POST">
            <div class="modal fade text-left" id="klantInfo<?= $klant["klant_ID"] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
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
                                                    <a class="nav-link active" id="tab1" data-toggle="tab" href="#Klant" aria-controls="home" aria-expanded="true">Klant</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " id="tab2" data-toggle="tab" href="#Project-details" aria-controls="profile" aria-expanded="false">Project details</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " id="tab3" data-toggle="tab" href="#Notities" role="button" aria-haspopup="true" aria-expanded="Notities">
                                                        Notities
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="Klant" aria-expanded="true" aria-labelledby="base-tab11">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-6 col-form-label" for="Voornaam">Voornaam</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="hidden" class="form-control square" value="<?= $klant["klant_ID"] ?>" id="klant_ID" name="klantID">
                                                                                    <input type="text" class="form-control square" value="<?= $klant["Voornaam"] ?>" id="Voornaam" name="Voornaam">
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
                                                <div class="tab-pane fade" id="Project-details" aria-labelledby="base-tab12">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-6 col-form-label" for="Project-ID">Project ID</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="hidden" class="form-control square" value="<?= $klant["klant_ID"] ?>" id="klant_ID" name="klantID">
                                                                                    <input type="text" class="form-control square" readonly value="<?= $klant["klant_ID"] ?>" id="Project-ID" name="Project-ID">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-6 col-form-label" for="match-datum">Match Datum</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control square" value="<?= $klant["Achternaam"] ?>" id="match-datum" name="Match Datum">
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
                                                                                    <input type="text" class="form-control square" value="<?= $klant["plaats"] ?>" id="Plaats" name="Plaats">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-5">Gewenst</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" value="<?= $klant["categorie"] ?>" class="form-control square" id="horizontal-form-7" name="Gewenst">
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
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-5">Categorie</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" value="<?= $klant["categorie"] ?>" class="form-control square" id="horizontal-form-7" name="Categorie">
                                                                                </div>
                                                                            </div>
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
                                                                                    <input type="text" value="<?= $klant["materiaal"] ?>" class="form-control square" id="horizontal-form-7" name="Materiaal">
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
                                                <div class="tab-pane fade" id="Notities" aria-labelledby="base-tab13">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="horizontal-form-7">Opmerkingen</label>
                                                                <textarea id="horizontal-form-9" rows="6" class="form-control square" name="notities"><?= $klant["notities"] ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <label class="col-md-5 col-form-label" for="horizontal-form-7">Nagebeld</label>
                                                                <div class="col-md-7">
                                                                    <input type="text" value="<?= $klant["nagebeld"] ?>" class="form-control square" id="horizontal-form-7" name="nagebeld">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-5 col-form-label" for="horizontal-form-7">Gewenste aanvang</label>
                                                                <div class="col-md-7">
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

         $voornaam = ucfirst($_POST['Voornaam']);
        $straatnaam = ucfirst($_POST['straat']);

        $query = "UPDATE `klanten` SET `Voornaam`=?,`Tussenvoegsel`=?,
           `Achternaam`=?,`Email`=?,`Telefoonnummer`=?,`straat`=?,`postcode`=?
           ,`huisnummer`=?,`huisnummerToevoeging`=?,`notities`=?
           WHERE klant_ID = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param(
            'ssssssssssi',
            $voornaam,
            $_POST["tussenvoegsel"],
            $_POST["achternaam"],
            $_POST["email"],
            $straatnaam,
            $_POST['straat'],
            $_POST["postcode"],
            $_POST["huisnummer"],
            $_POST["toevoeging"],
            $_POST["notities"],
            $_POST["klantID"]
        );
        $stmt->execute();
        header("Location:overzicht.php");
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

function ToevoegenParticulier()
{
    if (isset($_POST["ToevoegenPart"])) {
        global $mysqli;
        $sql = "SELECT * FROM `klanten` WHERE `Email` = ? ";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $_POST["Parti_email"]);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0 ) {
			header("Location: overzicht.php");
			exit();
        }else{
            $stmt->close();
            $sql = "INSERT INTO `klanten`(`Voornaam`,`Tussenvoegsel`,`Achternaam`,`Email`,`Telefoonnummer`,
                    `straat`,`postcode`,`huisnummer`,`huisnummerToevoeging`,`notities`,`status`)
                    VALUES
                    (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($sql);
            if(empty($_POST["Parti_tussenvoegsel"])){
		        $tussenvoegsel = " ";
	        }
	        if(empty($_POST["Parti_toevoeging"])){
		        $toevoeging = " ";
	        }
            $stmt->bind_param('sssssssssss',
                $_POST["Parti_voornaam"],$tussenvoegsel,$_POST["Parti_achternaam"],$_POST["Parti_email"]
                ,$_POST["Parti_telefoonnummer"] ,$_POST["Parti_straatnaam"],$_POST["Parti_postcode"],$_POST["Parti_huisnummer"],$toevoeging,
                $_POST["Parti_notities"],$_POST["Parti_status"]);
            $stmt->execute();
            $stmt->close();
			header("Location:overzicht.php");
			exit();
		}
	}
       
}
function ToevoegenZakelijk()
{
if (isset($_POST["ToevoegenZak"])) {
	 global $mysqli;
        $sql = "SELECT * FROM `klanten` WHERE `Email` = ? ";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $_POST["Zak_email"]);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0 ) {
			header("Location: overzicht.php");
			exit();
        }else{
            $stmt->close();
			$sql = "INSERT INTO `klanten`(`Voornaam`,`Tussenvoegsel`,`Achternaam`, `Email`,`Telefoonnummer`,`straat`,
                    `postcode`,`huisnummer`,`huisnummerToevoeging`,`notities`,`status`, `bedrijfsnaam`)
                     VALUES
                    (?,?,?,?,?,?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($sql);
			if(empty($_POST["Zak_tussenvoegsel"])){
				$tussenvoegsel = " ";
			}
			if(empty($_POST["Zak_toevoeging"])){
				$toevoeging = " ";
			}
			$stmt->bind_param('ssssssssssss',
				$_POST["Zak_voornaam"],$tussenvoegsel,$_POST["Zak_achternaam"],$_POST["Zak_email"]
				,$_POST["Zak_telefoonnummer"] ,$_POST["Zak_straatnaam"],$_POST["Zak_postcode"],$_POST["Zak_huisnummer"],$toevoeging,
				$_POST["Zak_notities"],$_POST["Zak_status"],$_POST["bedrijfsnaam"]);
			$stmt->execute();
			$stmt->Close();
			header("Location:overzicht.php");
			exit();
		}
    }
}