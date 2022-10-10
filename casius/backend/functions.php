<?php

require_once "db.php";
session_start();

function klantInfo()
{
    global $mysqli;
    $sql = "SELECT * FROM klanten where klant_ID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $_GET['userID']);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_array();
}

function klantInfoTabel()
{
    global $mysqli;
    $DataMasseuse = "SELECT * FROM `klanten`";
    $stmt = $mysqli->prepare($DataMasseuse);
    $stmt->execute();
    $resultKlant = $stmt->get_result();
    while ($klant = $resultKlant->fetch_array()) { ?>
        <tr>
            <td><?= $klant["klant_ID"] ?></td>
            <td><?= $klant["Voornaam"] ?> <?= $klant["Tussenvoegsel"] ?> <?= $klant["Achternaam"] ?></td>
            <td></span><?= $klant["straat"] ?> <?= $klant["huisnummer"] ?> <?= $klant["postcode"] ?></td>
            <td><a class="btn btn-outline-light-gray" data-toggle="modal" data-target="#klantInfo<?= $klant["klant_ID"] ?>" href="#klant_ID=<?= $klant["klant_ID"]?>" >
                    Meer info
                </a>
            </td>
        </tr>
<?php }
}

function klantModal(){
    global $mysqli;
    $DataMasseuse = "SELECT * FROM `klanten` WHERE `klant_ID` = ? ";
    $stmt = $mysqli->prepare($DataMasseuse);
    $stmt->bind_param("s", $_GET["klant_ID"]);
    $stmt->execute();
    $resultKlant = $stmt->get_result();
    while ($klant = $resultKlant->fetch_array()) {?>
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
                        <form method="POST">
                            <div class="row match-height">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group row">
                                                            <label class="col-md-4 col-form-label" for="Voornaam">Voornaam</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control square" id="Voornaam" name="Voornaam">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group row">
                                                            <label class="col-md-7 col-form-label" for="tussenvoegsel">Tussenvoegsel</label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control square" id="tussenvoegsel" name="tussenvoegsel">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group row">
                                                            <label class="col-md-6 col-form-label" for="achternaam">Achternaam</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control square" id="achternaam" name="achternaam">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-md-3">
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group row">
                                                            <label class="col-md-8 col-form-label" for="horizontal-form-4">Huisnummer</label>
                                                            <div class="col-md-4">
                                                                <input type="text" value="<?= $klant["huisnummer"] ?>" class="form-control square" id="horizontal-form-4" name="nick-name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group row">
                                                            <label class="col-md-7 col-form-label" for="horizontal-form-4">Huisnummer toevoeging</label>
                                                            <div class="col-md-5">
                                                                <input type="text" value="<?= $klant["huisnummerToevoeging"] ?>" class="form-control square" id="horizontal-form-4" name="nick-name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group row">
                                                            <label class="col-md-4 col-form-label" for="horizontal-form-4">Straatnaam</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control square" id="horizontal-form-4" name="nick-name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group row">
                                                            <label class="col-md-5 col-form-label" for="horizontal-form-3">Postcode</label>
                                                            <div class="col-md-7">
                                                                <input type="text" class="form-control square" id="horizontal-form-3" name="username">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group row">
                                                            <label class="col-md-4 col-form-label" for="horizontal-form-5">Email</label>
                                                            <div class="col-md-8">
                                                                <input type="email" value="<?= $klant["Email"] ?>" class="form-control square" id="horizontal-form-5" name="e-mail">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-4 col-form-label" for="horizontal-form-6">Bedrijf</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control square" id="horizontal-form-6" name="website">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-4 col-form-label" for="horizontal-form-7">Telefoonnummer</label>
                                                            <div class="col-md-8">
                                                                <input type="text" value="<?= $klant["Telefoonnummer"] ?>" class="form-control square" id="horizontal-form-7" name="phone-number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label" for="horizontal-form-9">Notities</label>
                                                            <div class="col-md-10">
                                                                <textarea id="horizontal-form-9" rows="6" value="<?= $klant["notities"] ?>" class="form-control square" name="comment3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Horizontal Form Layout ends -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-light-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
