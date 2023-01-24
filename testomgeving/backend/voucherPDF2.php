<?php

use Dompdf\Dompdf;

require_once 'dompdf/autoload.inc.php';

function voucherPDF2($voucher)
{
    $dompdf = new Dompdf;
    $html = '
    <head>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: rgb(254, 187, 253);
            background: linear-gradient(135deg, rgba(254, 187, 253, 1) 0%, rgba(245, 226, 243, 1) 100%);
        }
        .invis {
            color: rgb(254, 187, 253);
        }

        .backWhite {
            background-color: white;
            color: black;
            margin: 4px;
            width: 350px;
            height: 20px;
        }

        h2 {
            margin-top: 30pt;
            font-size: 35px;

        }

        h6 {
            margin-top: 30pt;
            font-size: 12px;

        }

        #masseuseContactTotal {
            display: flex;
        }

        #masseuseContact1 {
            width: 50%;
            float: left;
        }

        #masseuseContact2 {
            width: 50%;
            float: right;
        }

        #voucher {
            width: 550pt;
            height: 290pt;
            
        }

        #voucherDetail {
            width: 100%;
            text-align: center;
            margin-top: 50pt;
        }

        #voucherDetailText {
            width: 40%;
            float: right;
        }

        #voucherCode {
            width: 60%;
            float: left;
        }
    </style>
</head>

<body>
    <div id="voucher">
        <main>
            <h1>Bedrijfs massage abonnement</h1>
            <p><b>Uitgegeven voor:</b></p>
            <div id="box">
                <div id="companyName" class="form-group">
                    <p class="backWhite">[bedrijfNaamPlaceHolder]</p>
                </div>
                <div id="gebruikerName" class="form-group">
                    <p class="backWhite" for="name">[naamPlaceHolder]</p>
                </div>
                <div id="gebruikerEmail" class="form-group">
                    <p class="backWhite" for="email">[emailPlaceHolder]</p>
                </div>
                <div id="gebruikerPhone class=" form-group">
                    <p class="backWhite" for="phone">[phonePlaceHolder]</p>
                </div>
                <p><b>Contactgegevens Massagebedrijfsnaam:</b></p>

                <div id="masseuseContactTotal">
                    <div id="masseuseContact1">
                        <div id="masseuseNaam" class="form-group">
                            <p class="backWhite" for="name">[masseuseNaamPlaceHolder]</p>
                        </div>

                        <div id="masseusePhone" class="form-group">
                            <p class="backWhite" for="name">[masseusePhonePlaceHolder]</p>
                        </div>
                        <div id="masseuseMail" class="form-group">
                            <p class="backWhite" for="name">[masseuseEmailPlaceHolder]</p>
                        </div>

                    </div>

                    <div id="masseuseContact2">
                        
                        <div id="masseuseStreetAndNumber" class="form-group">
                            <p class="backWhite" for="name">[streetAndHouseNumberPlaceHolder]</p>
                        </div>
                        <div id="masseuseCityAndPlace" class="form-group">
                            <p class="backWhite" for="name">[postalAndCityPlaceHolder]</p>
                        </div>
                        <div id="masseuseStreetAndNumber2" class="form-group">
                            <p class="invis">.</p>
                        </div>
                    </div>
                </div>
                
                <div id="voucherDetail">
                    <h6 id="voucherDetailText">
                        Hier vind u uw BMA vouchercode
                        <br>
                        Deze kunt u verzilveren bij: [masseusePlaceHolder]
                    </h6>
                    <h2 id="voucherCode">Soy9UPJycE</h2>
                </div>

            </div>

        </main>


    </div>


</body>
    ';


    function bedrijfNaam()
    {
        $medewerkerID = $_SESSION["id"];
        $sql = "SELECT bedrijven.userName FROM `bedrijven`
        INNER JOIN bedrijfmedewerkerlink
        ON bedrijfmedewerkerlink.bedrijfID = bedrijven.bedrijfID
        WHERE bedrijfmedewerkerlink.userID = " . $medewerkerID . ";";
        global $mysqli;
        $result = $mysqli->query($sql);
        $rows = $result->fetch_assoc();
        return ($rows['userName']);
    }

    $bedrijfNaam = bedrijfNaam();
    $html = str_replace("[bedrijfNaamPlaceHolder]", $bedrijfNaam, $html);

    function medewerkerGegevens()
    {
        $medewerkerID = $_SESSION["id"];
        $sql = "SELECT voornaam, tussenvoegsel, achternaam, email, telefoon FROM `medewerkers` WHERE userID = " . $medewerkerID;
        global $mysqli;
        $result = $mysqli->query($sql);
        $rows = $result->fetch_array();
        return ($rows);
    }

    function masseuseGegevens()
    {
        $masseuseID = $_POST['modalMasseuseID'];
        $sql = "SELECT voornaam, tussenvoegsel, achternaam, email, telefoon FROM `masseuses` WHERE userID = " . $masseuseID;
    }

    $medewerkerGegevens = medewerkerGegevens();
    $medewerkerNaam = $medewerkerGegevens[0] . " " . $medewerkerGegevens[1] . " " . $medewerkerGegevens[2];

    $html = str_replace("[naamPlaceHolder]", $medewerkerNaam, $html);

    $html = str_replace("[emailPlaceHolder]", $medewerkerGegevens[3], $html);

    $html = str_replace("[phonePlaceHolder]", $medewerkerGegevens[4], $html);


    $dompdf->loadHtml($html);
    $customSize = array(0, 0, 550, 290);
    $dompdf->setPaper($customSize);
    $dompdf->render();
    $output = $dompdf->output();
    file_put_contents("../vouchers/user" . $_SESSION['id'] . "Voucher" . $voucher . ".pdf", $output);
}
