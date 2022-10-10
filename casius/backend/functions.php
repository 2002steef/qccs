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
            <td><?=$klant["Voornaam"]?> <?=$klant["Tussenvoegsel"]?> <?=$klant["Achternaam"]?></td>
            <td class="td-width"><?= $klant["notities"] ?></td>
            <td><a class="btn btn-outline-light-gray" href="#<?= $klant["klant_ID"] ?>">
                    Meer info
                </a>
            </td>
        </tr>
    <?php }
}