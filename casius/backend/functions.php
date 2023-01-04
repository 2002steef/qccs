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
    if (isset($_POST["btnUserUpdate"]))
    {
        global $mysqli;

        $sql = "UPDATE `login` SET userName = ?, email = ? WHERE user_ID = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ssi', $_POST["name"], $_POST["email"], $_GET['user_ID']);
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
    while ($klant = $resultKlant->fetch_array())
    { ?>
        <tr>
            <td><?=$klant["Project_ID"] ?></td>
            <td><?=$klant["Voornaam"] ?> <?=$klant["Tussenvoegsel"] ?> <?=$klant["Achternaam"] ?></td>
            <td></span><?=$klant["straat"] ?> <?=$klant["huisnummer"] ?> <?=$klant["postcode"] ?></td>
            <td><a class="btn btn-outline-light-gray" data-toggle="modal" href="<?=$klant["Project_ID"] ?>">
                    Meer info
                </a>
            </td>
        </tr>
    <?php
    }
}

function klantModal()
{
    global $mysqli;
    $DataKlant = "SELECT * FROM `klanten`";
    $stmt = $mysqli->prepare($DataKlant);
    $stmt->execute();
    $resultKlant = $stmt->get_result();
    while ($klant = $resultKlant->fetch_array())
    { ?>
        <form action="" method="POST">
            <div class="modal fade text-left" id="klantInfo<?=$klant["Project_ID"] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
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
                                                                                    <input type="hidden" class="form-control square" value="<?=$klant["Project_ID"] ?>" id="Project_ID" name="klantID">
                                                                                    <input type="text" class="form-control square" value="<?=$klant["Voornaam"] ?>" id="Voornaam" name="voornaam">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-6 col-form-label" for="tussenvoegsel">Tussenvoegsel</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control square" value="<?=$klant["Tussenvoegsel"] ?>" id="tussenvoegsel" name="tussenvoegsel">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-6 col-form-label" for="achternaam">Achternaam</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control square" value="<?=$klant["Achternaam"] ?>" id="achternaam" name="achternaam">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-md-3">
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-4 col-form-label" for="huisnummer">Huisnummer</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" value="<?=$klant["huisnummer"] ?>" class="form-control square" id="huisnummer" name="huisnummer">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-6 col-form-label" for="toevoeging">Huisnummer toevoeging</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" value="<?=$klant["huisnummerToevoeging"] ?>" class="form-control square" id="toevoeging" name="toevoeging">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-4 col-form-label" for="straatnaam">Straatnaam</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" class="form-control square" value="<?=$klant["straat"] ?>" id="straat" name="straat">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-6 col-form-label" for="postcode">Postcode</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control square" value="<?=$klant["postcode"] ?>" id="postcode" name="postcode">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-5">Email</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="email" value="<?=$klant["Email"] ?>" class="form-control square" id="horizontal-form-5" name="email">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-7">Telefoonnummer</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" value="<?=$klant["Telefoonnummer"] ?>" class="form-control square" id="horizontal-form-7" name="telefoonnummer">
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
                                                                                    <input type="hidden" class="form-control square" value="<?=$klant["Project_ID"] ?>" id="Project_ID" name="klantID">
                                                                                    <input type="text" class="form-control square" readonly value="<?=$klant["Project_ID"] ?>" id="Project-ID" name="Project-ID">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-6 col-form-label" for="match-datum">Match Datum</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control square" value="<?=$klant["match_datum"] ?>" id="match-datum" name="match_datum">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-md-3">
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-6 col-form-label" for="postcode">Postcode</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control square" value="<?=$klant["postcode"] ?>" id="postcode" name="postcode">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-6 col-form-label" for="Plaats">Plaats</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control square" value="<?=$klant["plaats"] ?>" id="Plaats" name="plaats">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-5">Gewenst</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" value="<?=$klant["categorie"] ?>" class="form-control square" id="horizontal-form-7" name="gewenst">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-7">Titel</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" value="<?=$klant["titel"] ?>" class="form-control square" id="horizontal-form-7" name="titel">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                        <div class="row mb-md-3">
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-6 col-form-label" for="horizontal-form-5">Categorie</label>
                                                                                        <div class="col-md-6">
                                                                                            <input type="text" value="<?=$klant["categorie"] ?>" class="form-control square" id="horizontal-form-7" name="categorie">
                                                                                        </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-md-5 col-form-label" for="sub_categorie">Sub categorie</label>
                                                                                        <div class="col-md-7">
                                                                                            <input type="text" value="<?=$klant["sub_categorie"] ?>" class="form-control square" id="horizontal-form-7" name="sub_categorie">
                                                                                        </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-7">Omschrijving</label>
                                                                                <div class="col-md-9">
                                                                                     <textarea id="horizontal-form-9" rows="6" class="form-control square" name="omschrijving"><?=$klant["omschrijving"] ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-5">Materiaal</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" value="<?=$klant["materiaal"] ?>" class="form-control square" id="horizontal-form-7" name="materiaal">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-7">Klant wensen</label>
                                                                                <div class="col-md-9">
                                                                                     <textarea id="horizontal-form-9" rows="6" class="form-control square" name="Klant_wensen"><?=$klant["klant_wensen"] ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-5">Al offertes ontvangen</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" value="<?=$klant["offertes"] ?>" class="form-control square" id="horizontal-form-7" name="offertes">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-7">Nagebeld</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" value="<?=$klant["nagebeld"] ?>" class="form-control square" id="horizontal-form-7" name="nagebeld">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-md-3 col-form-label" for="horizontal-form-7">Gewenste aanvang</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" value="<?=$klant["gewenste_aanvang"] ?>" class="form-control square" id="horizontal-form-7" name="gewenste_aanvang">
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
                                                                <textarea id="horizontal-form-9" rows="6" class="form-control square" name="notities"><?=$klant["opmerkingen"] ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-md-3">
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group row">
                                                                <label class="col-md-6 col-form-label" for="afspraakdatum">Afspraakdatum</label>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control square" value="<?=$klant["afspraakdatum"] ?>" id="afspraakdatum" name="afspraakdatum">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group row">
                                                                <label class="col-md-6 col-form-label" for="Plaats">Klant score</label>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control square" value="<?=$klant["klant_score"] ?>" id="Klant_score" name="Klant_score">
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
    if (isset($_POST['updateKlant']))
    {

		$query = "UPDATE `klanten` SET `match_datum`=? WHERE Project_ID = ?";
        $stmt = $mysqli->prepare($query);
		
        $stmt->bind_param('si', $_POST["match-datum"],  $_GET["Project_ID"]);
        $stmt->execute();

       
    }
}

function UploadPic()
{
    if (isset($_POST['submitpic']) && isset($_FILES['my_image']))
    {
        global $mysqli;

        echo "<pre>";
        print_r($_FILES['my_image']);
        echo "</pre>";

        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];

        if ($error === 0)
        {
            if ($img_size > 1250000)
            {
                $em = "Sorry, your file is too large.";
                header("Location: account-settings.php.php?user_ID=$id&error=$em");
            }
            else
            {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array(
                    "jpg",
                    "jpeg",
                    "png"
                );

                if (in_array($img_ex_lc, $allowed_exs))
                {
                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'app-assets/img/uploads/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    $id = $_SESSION['id'];
                    // Insert into Database
                    $sql_pic = "UPDATE `login` SET `image_url` = ? WHERE user_ID = ?";
                    $stmt = $mysqli->prepare($sql_pic);
                    $stmt->bind_param("si", $new_img_name, $id);
                    $stmt->execute();
                    header("Location: account-settings.php?user_ID=$id");
                }
                else
                {
                    $em = "You can't upload files of this type";
                    header("Location: account-settings.php.php?user_ID=$id&error=$em");
                }
            }
        }
    }
}

function ToevoegenKlanten()
{?>
<div aria-hidden="true" aria-labelledby="myModalLabel17" class="modal fade text-left" id="large" role="dialog" tabindex="-1">
			<form method="post">
				<div class="modal-dialog modal-xl" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel17">Relatie toevoegen</h4><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span></button>
						</div>
						<div class="col-xl-12 col-lg-12">
							<div class="card">
								<div class="card-content">
									<div class="card-body">
										<ul class="nav nav-tabs">
											<li class="nav-item">
												<a aria-controls="home" aria-expanded="true" class="nav-link active" data-toggle="tab" href="#Klant" id="tab1">Klant</a>
											</li>
											<li class="nav-item">
												<a aria-controls="profile" aria-expanded="false" class="nav-link" data-toggle="tab" href="#Project-details" id="tab2">Project details</a>
											</li>
											<li class="nav-item">
												<a aria-expanded="Notities" aria-haspopup="true" class="nav-link" data-toggle="tab" href="#Notities" id="tab3" role="button">Notities</a>
											</li>
										</ul>
										<div class="tab-content">
											<div aria-expanded="true" aria-labelledby="base-tab11" class="tab-pane active" id="Klant" role="tabpanel">
												<div class="col-12">
													<div class="card">
														<div class="card-content">
															<div class="card-body">
																<div class="row">
																	<div class="col-md-4 col-12">
																		<div class="form-group row">
																			<label class="col-md-6 col-form-label" for="Voornaam">Voornaam</label>
																			<div class="col-md-6">
																				<input class="form-control square" id="Voornaam" name="voornaam" type="text">
																			</div>
																		</div>
																	</div>
																	<div class="col-md-4 col-12">
																		<div class="form-group row">
																			<label class="col-md-6 col-form-label" for="tussenvoegsel">Tussenvoegsel</label>
																			<div class="col-md-6">
																				<input class="form-control square" id="tussenvoegsel" name="tussenvoegsel" type="text">
																			</div>
																		</div>
																	</div>
																	<div class="col-md-4 col-12">
																		<div class="form-group row">
																			<label class="col-md-6 col-form-label" for="achternaam">Achternaam</label>
																			<div class="col-md-6">
																				<input class="form-control square" id="achternaam" name="achternaam" type="text">
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row mb-md-3">
																	<div class="col-md-6 col-12">
																		<div class="form-group row">
																			<label class="col-md-4 col-form-label" for="huisnummer">Huisnummer</label>
																			<div class="col-md-8">
																				<input class="form-control square" id="huisnummer" name="huisnummer" type="text">
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6 col-12">
																		<div class="form-group row">
																			<label class="col-md-6 col-form-label" for="toevoeging">Huisnummer toevoeging</label>
																			<div class="col-md-6">
																				<input class="form-control square" id="toevoeging" name="toevoeging" type="text">
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6 col-12">
																		<div class="form-group row">
																			<label class="col-md-4 col-form-label" for="straatnaam">Straatnaam</label>
																			<div class="col-md-8">
																				<input class="form-control square" id="straat" name="straat" type="text">
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6 col-12">
																		<div class="form-group row">
																			<label class="col-md-4 col-form-label" for="plaats">Plaats</label>
																			<div class="col-md-8">
																				<input class="form-control square" id="plaats" name="plaats" type="text">
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6 col-12">
																		<div class="form-group row">
																			<label class="col-md-6 col-form-label" for="postcode">Postcode</label>
																			<div class="col-md-6">
																				<input class="form-control square" id="postcode" name="postcode" type="text">
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-12">
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-5">Email</label>
																			<div class="col-md-9">
																				<input class="form-control square" id="horizontal-form-5" name="email" type="email">
																			</div>
																		</div>
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-7">Telefoonnummer</label>
																			<div class="col-md-9">
																				<input class="form-control square" id="horizontal-form-7" name="telefoonnummer" type="text">
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div aria-labelledby="base-tab12" class="tab-pane fade" id="Project-details">
												<div class="col-12">
													<div class="card">
														<div class="card-content">
															<div class="card-body">
																<div class="row">
																	<div class="col-md-6 col-12">
																		<div class="form-group row">
																			<label class="col-md-6 col-form-label" for="Project-ID">Project ID</label>
																			<div class="col-md-6">
																				<input class="form-control square" name="Project-ID" readonly="id=&quot;project-id&quot;" type="text">
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6 col-12">
																		<div class="form-group row">
																			<label class="col-md-6 col-form-label" for="match-datum">Match Datum</label>
																			<div class="col-md-6">
																				<input class="form-control square" id="match-datum" name="match-datum" type="text">
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-12">
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-5">Gewenst</label>
																			<div class="col-md-9">
																				<input class="form-control square" id="horizontal-form-7" name="gewenst" type="text">
																			</div>
																		</div>
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-7">Titel</label>
																			<div class="col-md-9">
																				<input class="form-control square" id="horizontal-form-7" name="titel" type="text">
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-6 col-12">
																		<div class="form-group row">
																			<label class="col-md-6 col-form-label" for="horizontal-form-5">Categorie</label>
																			<div class="col-md-6">
																				<select class="custom-select" id="categorieSelect" name="categorieSelect">
																					<option hidden="" selected>
																						Kies een categorie...
																					</option>
																					<option value="Timmerman & Meubelmaker">
																						Timmerman & Meubelmaker
																					</option>
																					<option value="Loodgieter & Installateur">
																						Loodgieter & Installateur
																					</option>
																					<option value="Vloerlegger & Parketteur">
																						Vloerlegger & Parketteur
																					</option>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6 col-12">
																		<div class="form-group row">
																			<label class="col-md-5 col-form-label" for="horizontal-form-5">Sub categorie</label>
																			<div class="col-md-7">
																				<input class="form-control square" id="horizontal-form-7" name="sub-categorie" type="text">
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-12">
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-7">Omschrijving</label>
																			<div class="col-md-9">
																				<textarea class="form-control square" id="horizontal-form-9" name="omschrijving" rows="6"></textarea>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-12">
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-5">Materiaal</label>
																			<div class="col-md-9">
																				<input class="form-control square" id="horizontal-form-7" name="materiaal" type="text">
																			</div>
																		</div>
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-7">Klant wensen</label>
																			<div class="col-md-9">
																				<textarea class="form-control square" id="horizontal-form-9" name="klant-wensen" rows="6"></textarea>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-12">
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-5">Al offertes ontvangen</label>
																			<div class="col-md-9">
																				<input class="form-control square" id="horizontal-form-7" name="offertes" type="text">
																			</div>
																		</div>
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-7">Nagebeld</label>
																			<div class="col-md-9">
																				<input class="form-control square" id="horizontal-form-7" name="nagebeld" type="text">
																			</div>
																		</div>
																		<div class="form-group row">
																			<label class="col-md-3 col-form-label" for="horizontal-form-7">Gewenste aanvang</label>
																			<div class="col-md-9">
																				<input class="form-control square" id="horizontal-form-7" name="gewenste-aanvang" type="text">
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div aria-labelledby="base-tab13" class="tab-pane fade" id="Notities">
												<div class="row">
													<div class="col-12">
														<div class="form-group row">
															<label class="col-md-3 col-form-label" for="horizontal-form-7">Opmerkingen</label> 
															<textarea class="form-control square" id="horizontal-form-9" name="opmerkingen" rows="6"></textarea>
														</div>
													</div>
												</div>
												<div class="row mb-md-3">
													<div class="col-md-6 col-12">
														<div class="form-group row">
															<label class="col-md-6 col-form-label" for="afspraakdatum">Afspraakdatum</label>
															<div class="col-md-6">
																<input class="form-control square" id="afspraakdatum" name="afspraakdatum" type="text">
															</div>
														</div>
													</div>
													<div class="col-md-6 col-12">
														<div class="form-group row">
															<label class="col-md-6 col-form-label" for="Plaats">Klant score</label>
															<div class="col-md-6">
																<input class="form-control square" id="Klant_score" name="klant_score" type="text">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- Horizontal Form Layout ends -->
						<div class="modal-footer">
							<button class="btn bg-light-secondary" data-dismiss="modal" type="button">Sluiten</button> <button class="btn btn-outline-light-gray" name="toevoegenKlant" type="submit">Opslaan</button>
						</div>
					</div>
				</div>
			</form>
		</div>
<?php
    if (isset($_POST["toevoegenKlant"]))
    {
        global $mysqli;
        $sql = "SELECT * FROM `klanten` WHERE `Email` = ? ";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $_POST["email"]);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0 ) {
			header("Location: overzicht.php");
			exit();
        }else {
            $sql = "INSERT INTO `klanten`(`match_datum`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Email`,
            `Telefoonnummer`, `straat`, `postcode`, `plaats`, `huisnummer`, `huisnummerToevoeging`, `omschrijving`,
            `categorie`, `sub_categorie`, `titel`, `opmerkingen`, `materiaal`, `klant_wensen`, `offertes`, `nagebeld`,
            `gewenste_aanvang`, `afspraakdatum`, `klant_score`)
            VALUES
            (?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?)";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('sssssssssssssssssssssss', $_POST["match-datum"], $_POST["voornaam"], $_POST["tussenvoegsel"], $_POST["achternaam"], $_POST["email"], $_POST["telefoonnummer"], $_POST["straat"], $_POST["postcode"], $_POST["plaats"], $_POST["huisnummer"], $_POST["toevoeging"], $_POST["omschrijving"], $_POST["categorieSelect"], $_POST["sub-categorie"], $_POST["titel"], $_POST["opmerkingen"], $_POST["materiaal"], $_POST["klant-wensen"], $_POST["offertes"], $_POST["nagebeld"], $_POST["gewenste-aanvang"], $_POST["afspraakdatum"], $_POST["klant_score"]);
            $stmt->execute();
            $stmt->close();
        }
    }
}


