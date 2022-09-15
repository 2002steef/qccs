<?php

// bedrijf toevoegen popup
function InsertBedrijf()
{
    global $mysqli;
    if (isset($_POST['registreerBedrijf'])) {
        $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
        $patternZip = '^/[1-9][0-9]{3} ?(?!sa|sd|ss|SA|SD|SS)[A-Za-z]{2}$/';
        $re = '/^((\+|00(\s|\s?\-\s?)?)31(\s|\s?\-\s?)?(\(0\)[\-\s]?)?|0)[1-9]((\s|\s?\-\s?)?[0-9])((\s|\s?-\s?)?[0-9])((\s|\s?-\s?)?[0-9])\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]$/m';
        if (
            empty($_POST['website']) || empty($_POST['bedrijfsnaam']) ||
            empty($_POST['email']) || empty($_POST['straatnaam']) ||
            empty($_POST['huisnummer']) || empty($_POST['postcode'])) {
            $error = 'Please fill all required fields!';
        } else {
            if (!preg_match("/^[a-zA-Z0-9 .]+$/", $_POST['bedrijfsnaam'])) {
                $error = "Invalid Name";
            } elseif (!preg_match($re, $_POST['telefoonnummer'])) {
                $error = "Invalid Phone number";
            } elseif (preg_match($pattern, $_POST['email']) === 0) {
                $error = "Invalid Email";
            } else {
                $sql = "INSERT INTO `organisation`(`name`,`street`,
                                 `housenumber`,`housenumberAddition`,`postalcode`,`website`,
                                 `phoneNumber`,`email`)VALUES(?,?,?,?,?,?,?,?)";

                $stmt = $mysqli->prepare($sql);
                $bedrijfsnaam = ucwords($_POST['bedrijfsnaam']);
                $stmt->bind_param(
                    "ssssssss",
                    $_POST['bedrijfsnaam'],
                    $_POST['straatnaam'],
                    $_POST['huisnummer'],
                    $_POST['huisnummertoevoeging'],
                    $_POST['postcode'],
                    $_POST['website'],
                    $_POST['telefoonnummer'],
                    $_POST['email']
                );

                $stmt->execute();
                $stmt->close();
                $mysqli->close();
                header(
                    "Location:bedrijfs_overzicht.php"
                );
            }
        }
    }
}

// laten zien bedrijf info d.m.v knop in bedrijvenoverzicht
function GetCompanyInfo()
{
    global $mysqli;
    $sql = "SELECT * FROM `organisation` WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $_GET["membof"]);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_array();
}

// bewerken d.m.v knop in bedrijvenoverzicht
function UpdateCompanyInfo()
{
    global $mysqli;
    if (isset($_POST['Instellingen'])) {
        $query = "UPDATE `organisation`  SET  name = ?, street = ?,housenumber = ?,housenumberAddition = ?,
                         postalcode = ?,phoneNumber = ?,email = ?,kvk_nummer = ?,btw_nummer = ?,
                         iban_nummer = ? WHERE id= ?;";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('ssissssiiii', $_POST['name'], $_POST['street'], $_POST['huisnummer'],
            $_POST['toevoeging'], $_POST['postcode'], $_POST['telefoon'], $_POST['email'],
            $_POST['kvk'], $_POST['btw'], $_POST['iban'], $_GET['membof']);
        $stmt->execute();
    }
}

// bewerken d.m.v knop in medewerker overzicht
function Updatepersonnel()
{
    global $mysqli;
    if (isset($_POST['submit'])) {
        $query = "UPDATE `personnel` SET `first_name`=?,`last_name_prefix`=?,`last_name`=?,
                                `street`= ?,`housenumber`=?, `postalcode`=?,`phoneNumber`=?,
                                `email`= ?, `authentication_level`=? WHERE id = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('sssssssssi', $_POST["voornaam"], $_POST["tussenvoegsel"], $_POST["achternaam"]
            , $_POST["straat"], $_POST["huisnummer"], $_POST["postcode"],
            $_POST["telefoonnummer"], $_POST["email"], $_POST["function"], $_POST["id"]);
        $stmt->execute();
    }
}

// haalt userID op uit de $_SESSION
function Getuser()
{
    global $mysqli;
    $sql = "SELECT * FROM users where id= ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_array();
}

// laat voor ieder bedrijf een blok zien in de overzichtspagina
function GetCompany()
{
    global $mysqli;
    $tableData = "SELECT * FROM `organisation`";
    $stmt = $mysqli->prepare($tableData);
    $stmt->execute();
    $resultData = $stmt->get_result();
    while ($row = $resultData->fetch_array()) {
        ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td>
                <a data-toggle="tooltip" data-original-title="Bedrijfs instellingen" data-placement="bottom" href="bedrijf_profiel.php?custof=<?= $row["id"] ?>&membof=<?= $row["id"] ?>"><?= $row["name"] ?></a>
            </td>
            <td><a href="tel:<?= $row["phoneNumber"]?>"><?= $row["phoneNumber"]?></a></td>
            <td><a href="mailto:<?= $row["email"] ?>"><?= $row["email"] ?></a></td>
            <td><?php
                if ($row["status"] === "Inactief") { ?>
                    <span class="badge bg-light-danger">Inactief</span>
                <?php } elseif ($row["status"] === "Actief") { ?>
                    <span class="badge bg-light-succes">Actief</span>
                <?php } ?>            </td>
            <td>
                <div class="row">
                    <?php
                    if ($_SESSION['auth'] == "Bedrijfsleider" || $_SESSION['auth'] == "Admin" || $_SESSION['auth'] == 'Werknemer') {
                        ?>
                        <div class="col-md-4">
                            <a href="#" data-toggle="modal" data-target="#edit<?= $row["id"] ?>">
                                <i class="ft-edit" data-toggle="tooltip" data-original-title="Snel bewerken" data-placement="bottom"></i>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="col-md-4">
                        <a  data-toggle="modal" data-target="#info<?php echo $row["id"] ?>">
                            <i class="ft-eye" data-toggle="tooltip" data-original-title="Info bekijken" data-placement="bottom"></i>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a data-toggle="tooltip" data-original-title="Level omlaag" data-placement="bottom" href="bedrijfs_klanten_overzicht.php?custof=<?= $row["id"] ?>&membof=<?= $row["id"] ?>">
                        <i
                                    class="ft-arrow-down"></i>
                        </a>
                    </div>
                </div>
        </tr>
        <?php
    }
}

// medewerker toevoegen popup (masseuse of bedrijf)
function InsertPersonnel1()
{
    global $mysqli;
    if (isset($_POST['registreerWerknemer'])) {

        $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
        $re = "/(^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0)([0-9]{9}$|[0-9\-\s]{10}$)";
        $reStraat = '^[a-zA-Z ]*$';
        if (
            empty($_POST['voornaam']) || empty($_POST['achternaam']) ||
            empty($_POST['email']) || empty($_POST['straat']) ||
            empty($_POST['huisnummer']) || empty($_POST['postcode'])) {
            header("Location:bedrijfs_klanten_overzicht.php?custof=" . $_GET["custof"] . "&membof=" . $_GET["membof"] . "&toevoegenMemb=empty");
            exit();
        } else {
            if (!preg_match("/^[a-zA-Z]+$/", $_POST['voornaam']) && !preg_match("/^[a-zA-Z]+$/", $_POST['achternaam'])) {
                header("Location:bedrijfs_klanten_overzicht.php?custof=" . $_GET["custof"] . "&membof=" . $_GET["membof"] . "&toevoegenMemb=naamfout");
                exit();
            } elseif (preg_match($re, $_POST['telefoonnummer'])) {
                header("Location:bedrijfs_klanten_overzicht.php?custof=" . $_GET["custof"] . "&membof=" . $_GET["membof"] . "&toevoegenMemb=telfout");
                exit();
            } elseif (preg_match($pattern, $_POST['email']) === 0) {
                header("Location:bedrijfs_klanten_overzicht.php?custof=" . $_GET["custof"] . "&membof=" . $_GET["membof"] . "&toevoegenMemb=mailfout");
                exit();
            } elseif (preg_match($reStraat, $_POST["straat"])) {
                header("Location:bedrijfs_klanten_overzicht.php?custof=" . $_GET["custof"] . "&membof=" . $_GET["membof"] . "&toevoegenMemb=straatfout");
                exit();
            } elseif (!preg_match("/^[1-9][0-9]{3} ?(?!sa|sd|ss|SA|SD|SS)[A-Za-z]{2}$/", $_POST['postcode'])) {
                header("Location:bedrijfs_klanten_overzicht.php?custof=" . $_GET["custof"] . "&membof=" . $_GET["membof"] . "&toevoegenMemb=postcodefout");
                exit();
            } else {
                $query = "SELECT * FROM `personnel` WHERE email = ?";
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param("s", $_POST["email"]);
                $stmt->execute();
                if (!$stmt->execute()) {
                    die('Error: ' . $mysqli->error);
                }
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {

                    header("Location:bedrijfs_klanten_overzicht.php?custof=" . $_GET["custof"] . "&membof=" . $_GET["membof"] . "&toevoegenMemb=emaildupli");
                    exit();
                } elseif ($result->num_rows == 0) {

                    $sql = "INSERT INTO `personnel`(`first_name`, `last_name_prefix`, `last_name`, `street`,
                                   `housenumber`,`postalcode`, `phoneNumber`, `email`, `authentication_level`, `member_of`) VALUES (?,?,?,?,?,?,?,?,?,?)";

                    $stmt = $mysqli->prepare($sql);
                    $voornaam = ucwords($_POST['voornaam']);
                    $achternaam = ucwords($_POST['achternaam']);
                    $stmt->bind_param("ssssisissi", $voornaam, $_POST['tussenvoegsel'], $achternaam, $_POST['straat'], $_POST['huisnummer'], $_POST['postcode'], $_POST['telefoonnummer'], $_POST['email'], $_POST['keuze'], $_GET["membof"]);

                    $stmt->execute();
                    $stmt->close();
                    $mysqli->close();
                    header("Location:bedrijfs_klanten_overzicht.php?custof=" . $_GET["custof"] . "&membof=" . $_GET["membof"] . "&toevoegenMemb=succes");
                }
            }
        }
    }
}

// laten zien medewerker info d.m.v knop (massuese of bedrijf)
function Getpersonnel1()
{
    global $mysqli;
    $Datapersonnel = "SELECT * FROM personnel WHERE id = ?";
    $stmt = $mysqli->prepare($Datapersonnel);
    $stmt->bind_param("i", $_GET["id"]);
    $stmt->execute();
    $resultpersonnel = $stmt->get_result();
    return $resultpersonnel->fetch_array();
}

// klant toevoegen (medewerker van abbonementhouder-bedrijf)
function InsertCustomerIndividual()
{
    global $mysqli;
    if (isset($_POST['registreerParticulier'])) {

        $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
        $re = "/(^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0)([0-9]{9}$|[0-9\-\s]{10}$)";
        $reStraat = '^[a-zA-Z ]*$';

        if (
            empty($_POST['voornaam_p']) || empty($_POST['achternaam_p']) ||
            empty($_POST['email_p']) || empty($_POST['straatnaam_p']) ||
            empty($_POST['huisnummer_p']) || empty($_POST['postcode_p'])) {
            header("Location:bedrijfs_klanten_overzicht.php?custof=" . $_GET["custof"] . "&membof=" . $_GET["membof"] . "&toevoegenPart=empty");
            exit();
        }
        else {
            if (!preg_match("/^[a-zA-Z]+$/", $_POST['voornaam_p']) && !preg_match("/^[a-zA-Z]+$/", $_POST['achternaam_p'])) {
                header("Location:bedrijfs_klanten_overzicht.php?custof=" . $_GET["custof"] . "&membof=" . $_GET["membof"] . "&toevoegenPart=namefout");
                exit(); }
            if (preg_match($re, $_POST['telefoonnummer_p'])) {
                header("Location:bedrijfs_klanten_overzicht.php?custof=" . $_GET["custof"] . "&membof=" . $_GET["membof"] . "&toevoegenPart=telfout");
                exit();
            } elseif (preg_match($pattern, $_POST['email_p']) === 0) {
                header("Location:bedrijfs_klanten_overzicht.php?custof=" . $_GET["custof"] . "&membof=" . $_GET["membof"] . "&toevoegenPart=mailfout");
                exit();
            } elseif (preg_match($reStraat, $_POST["straatnaam_p"])) {
                header("Location:bedrijfs_klanten_overzicht.php?custof=" . $_GET["custof"] . "&membof=" . $_GET["membof"] . "&toevoegenPart=straatfout");
                exit();
            } elseif (!preg_match("/^[1-9][0-9]{3} ?(?!sa|sd|ss|SA|SD|SS)[A-Za-z]{2}$/", $_POST['postcode_p'])) {
                header("Location:bedrijfs_klanten_overzicht.php?custof=" . $_GET["custof"] . "&membof=" . $_GET["membof"] . "&toevoegenPart=postcodefout");
                exit(); }
            else {
                $query = "SELECT * FROM `customers_individual` WHERE email = ?";
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param("s", $_POST["email_p"]);
                $stmt->execute();
                if (!$stmt->execute()) {
                    die('Error: ' . $mysqli->error);
                }
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {

                    header("Location:bedrijfs_klanten_overzicht.php?custof=" . $_GET["custof"] . "&membof=" . $_GET["membof"] . "&toevoegenPart=emaildupli");
                    exit();
                } elseif ($result->num_rows == 0) {
                    $sql = "INSERT INTO `customers_individual`(`id`, `first_name`,`last_name_prefix`, `last_name`, `street`,
                                   `housenumber`, `housenumberAddition`,
                                   `postalcode`, `phoneNumber`,email,customer_of) VALUES ('',?,?,?,?,?,?,?,?,?,?)";

                    $stmt = $mysqli->prepare($sql);
                    $voornaam = ucwords($_POST['voornaam_p']);
                    $achternaam = ucwords($_POST['achternaam_p']);
                    $stmt->bind_param("sssssssssi", $voornaam,
                        $_POST['tussenvoegsel_p'], $achternaam, $_POST['straatnaam_p'],
                        $_POST['huisnummer_p'], $_POST['huisnummertoevoeging_p'],
                        $_POST['postcode_p'], $_POST['telefoonnummer_p'], $_POST['email_p']
                        , $_GET["custof"]);
                    $stmt->execute();
                    $stmt->close();

                    $sql = "SELECT * FROM `customers_individual` WHERE email=?";
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param("s", $_POST['email_p']);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $rowID = $result->fetch_assoc();
                    $stmt->close();

                    $sql = "INSERT INTO `users`(`id`, `email`, `username`, `authentication_level`, `name`, `member_of`, `reset_token`) VALUES (?,?,?,?,?,?,?)";
                    $stmt = $mysqli->prepare($sql);
                    $token = bin2hex(random_bytes(50));
                    $authentication = 'user';
                    $voornaam = ucwords($_POST['voornaam_p']);
                    $stmt->bind_param("issssis", $rowID['id'], $_POST['email_p'], $voornaam, $authentication, $voornaam, $_GET["membof"], $token);
                    $stmt->execute();
                    $stmt->close();
                    $mysqli->close();


                    $email = $_POST["email_p"];
                    $name = $_POST["voornaam_p"];
                    if ($email > 0) {
                        $to = $email;
                        $subject = "Email verifieren en wachtwoord instellen";
                        $msg = "Hallo '$name', Je wachtwoord instellen link https://relatiebeheer.qccstest.nl/wachtwoord_new.php?token=" . $token;
                        $msg = wordwrap($msg, 70);
                        $headers = "From: Admin@qccs.nl";
                        mail($to, $subject, $msg, $headers);
                    } else echo "'$email' komt niet voor in de database";
                    header("Location:bedrijfs_klanten_overzicht.php?custof=" . $_GET["custof"] . "&membof=" . $_GET["membof"] . "&toevoegenPart=succes");
                    exit();
                }
            }
        }
    }
}

// voor active/inactive maken van accounts
function StatusSelector()
{
    if (!empty($_POST['status'])) {
        global $mysqli;
        $query = "UPDATE `customers_individual` SET `status`=? WHERE id = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('si', $_POST["status"], $_POST["id_p"]);
        $stmt->execute();
    }
}

// copy from updatepersonnel met andere sql
function UpdateCustomerB(){}

// SQL met join:
// $DataCustomer = "SELECT personnel.id,personnel.first_name,personnel.last_name_prefix,
// personnel.last_name,personnel.street,personnel.housenumber,personnel.email,
// personnel.housenumberAddition,personnel.postalcode,personnel.phoneNumber,personnel.authentication_level,personnel.notes
// FROM personnel 
// LEFT JOIN organisation 
//  ON personnel.member_of = organisation.id 
// WHERE personnel.member_of = ?";


function Sendmail(){

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        global $mysqli;
        $email = $_POST['Email'];
        $token = bin2hex(random_bytes(50));
        $stmt = $mysqli->prepare("INSERT INTO `token`(`token`) VALUES (?)");
        $stmt->bind_param("s", $token);
        if ($stmt->execute()){
            $to = $email;
            $subject = "Gegevenens invullen";
            $msg = "Hier ontangt u een link om uw gegevens in te vullen <br> https://relatiebeheer.qccstest.nl/klanten_toevoegen.php?custof=" . $_GET["custof"]  . "&membof=" . $_GET["membof"] . "&token=". $token . " <br> Vul je gegevens in met deze link. Click of open in new tab<br>";
            $msg = wordwrap($msg, 70);
            $headers = "From: Admin@qccs.nl";
            mail($to, $subject, $msg, $headers);
            header("Location:bedrijfs_klanten_overzicht.php?custof=" . $_GET["custof"] . "&membof=" . $_GET["membof"] . "&toevoegenPart=Formulier");

        }
   }
}
