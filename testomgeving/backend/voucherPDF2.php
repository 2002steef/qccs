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

        main {
            background-color: lightgray;
            /* width: 60%;
            position: absolute;
            top: 25vh;
            left: 2vw; */
            height: 400pt;
            width: 700pt;
        }

        div div p {
            background-color: white;
            color: black;
            margin: 4px;
            width: 350px;
            height: 20px;
        }

        h2 {
            font-size: 35px;
            transform: rotate(-90deg);
            position: absolute;
            left: 700pt;
            top: 150pt;
        }

        h6 {
            font-size: 12px;
            transform: rotate(-90deg);
            position: absolute;
            left: 700pt;
            top: 150pt;
        }

        #masseuseContactTotal {
            display: flex;
        }

        #masseuseContact1,
        #masseuseContact2 {
            display: flex;
            flex-direction: column;
        }
        #voucher{
            width: 1000pt;
            height: 400pt;
        }
    </style>
</head>

<body>
    <div id="voucher">
        <main>
            <h1>Bedrijfs massage abonnement</h1>
            <p><b>Uitgegeven voor:</b></p>
            <div id="box">
                <div id="companyname" class="form-group">
                    <p>[bedrijfNaamPlaceHolder]</p>
                </div>
                <div id="name" class="form-group">
                    <p for="name">[naamPlaceHolder]</p>
                </div>
                <div id="email" class="form-group">
                    <p for="email">[emailPlaceHolder]</p>
                </div>
                <div id="phone" class="form-group">
                    <p for="phone">[phonePlaceHolder]</p>
                </div>
                <p><b>Contactgegevens Massagebedrijfsnaam:</b></p>

                <div id="masseuseContactTotal">
                    <div id="masseuseContact1">
                        <div id="name" class="form-group">
                            <p for="name">[masseusePlaceHolder]</p>
                        </div>
                        <div>
                            <div id="name" class="form-group">
                                <p for="name">[phonePlaceHolder]</p>
                            </div>
                            <div id="name" class="form-group">
                                <p for="name">[masseuseEmailPlaceHolder]</p>
                            </div>
                        </div>
                    </div>

                    <div id="masseuseContact2">
                        <div>
                            <div id="name" class="form-group">
                                <p for="name">[postalAndCityPlaceHolder]</p>
                            </div>
                        </div>
                        <div id="name" class="form-group">
                            <p for="name">[streetAndHouseNumberPlaceHolder]</p>
                        </div>
                    </div>
                </div>
            </div>
            <p id="text-under">De voucher code is enkel af te nemen bij [masseusePlaceHolder].
                <br>
                U kunt contact opnemen met uw contactpersoon met de onderstaande gegevens voor het maken van een
                afspraak.
            </p>
        </main>

        <h6>
            Hier vind u uw BMA vouchercode
            <br>
            Deze kunt u verzilveren bij: [masseusePlaceHolder]
        </h6>

        <h2>[voucherPlaceHolder]</h2>
    </div>


</body>
    ';



    $dompdf->loadHtml($html);

    $customSize = array(0, 0, 1000, 400);
    $dompdf->setPaper($customSize);

    $dompdf->render();
    // $dompdf->stream("voucherpdf/user" . $_SESSION['id'] . "Voucher" . $voucher . ".pdf", ["Attachment" => 0]);

    $output = $dompdf->output();
    file_put_contents("voucherpdf/user" . $_SESSION['id'] . "Voucher" . $voucher . ".pdf", $output);
}
