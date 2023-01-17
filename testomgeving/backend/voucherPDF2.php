<?php

use Dompdf\Dompdf;

require_once 'dompdf/autoload.inc.php';

function voucherPDF2($voucher)
{
    // $filename = "voucherpdf/user" . $_SESSION['id'] . "Voucher" . $voucher . ".pdf";
    // $f = fopen($filename, 'w+');
    // fclose($f);

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
            margin-top: 40pt;
        }

        #voucherDetailText {
            width: 40%;
            float: left;
        }

        #voucherCode {
            width: 60%;
            float: right;
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
                        <div>
                            <div id="masseuseCityAndPlace" class="form-group">
                                <p class="backWhite" for="name">[postalAndCityPlaceHolder]</p>
                            </div>
                        </div>
                        <div id="masseuseStreetAndNumber" class="form-group">
                            <p class="backWhite" for="name">[streetAndHouseNumberPlaceHolder]</p>
                        </div>
                        <div id="masseuseStreetAndNumber2" class="form-group">
                            <p class="backWhite" for="name">[streetAndHouseNumberPlaceHolder]</p>
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



    $dompdf->loadHtml($html);

    $customSize = array(0, 0, 550, 350);
    $dompdf->setPaper($customSize);

    $dompdf->render();
    // $dompdf->stream("voucherpdf/user" . $_SESSION['id'] . "Voucher" . $voucher . ".pdf", ["Attachment" => 0]);

    $output = $dompdf->output();
    file_put_contents("voucherpdf/user" . $_SESSION['id'] . "Voucher" . $voucher . ".pdf", $output);
}
