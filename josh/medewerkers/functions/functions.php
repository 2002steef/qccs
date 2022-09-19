<?php
function masseuseInfo()
{
    global $mysqli;
    $DataCustomer_P = "SELECT `masseuseID`, `userName`, `Password`, `email`, 
    `voornaam`, `tussenvoegsel`, `achternaam`, `telefoon`,
     `straat`, `huisNummer`,`huisNummerToevoeging`, `postcode`, `plaats`,
      `website`, `profielFoto`, `vouchersVerzilverd`, `paragraafje` FROM `masseuses` WHERE 1";
    $stmt = $mysqli->prepare($DataCustomer_P);
    $stmt->execute();
    $resultCustomer = $stmt->get_result();

    while ($masseuse = $resultCustomer->fetch_array()) {
    ?>

        <tr>
            <td><?= $masseuse["masseuseID"] ?></td>
            <td colspan="3"><?= $masseuse["voornaam"] . " " . $masseuse["tussenvoegsel"] . " " . $masseuse["achternaam"] ?></td>
            <td><?= $masseuse["straat"] . " " . $masseuse["huisNummer"] . " " . $masseuse["huisNummerToevoeging"] ?></td>
            <td><?= $masseuse["telefoon"] ?></td>
            <td></td>  
            <td>
                <div class="row">
                    <div class="col-md-5">
                        <a data-toggle="modal" data-target="#info<?= $masseuse["masseuseID"] ?>"
                         href="modals.php?<?= $masseuse["masseuseID"] ?>">
                            <i class="ft-eye"></i>
                        </a>
                    </div>
                </div>
            </td>
        </tr>
    <?php
    }
    ?>

    <?php
}