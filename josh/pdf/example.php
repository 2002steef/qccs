<html>
<head>
    <meta charset="UTF-8">
    <title>PDF</title>
</head>
<body>
<form method="post" action="example.php">
    <input type="text" name="Header" class="form-control mb-3" placeholder="Header" value="<?php if (isset($_POST['submit'])){echo $_POST['Header'];}?>">
    <input type="text" name="Footer" class="form-control mb-3" placeholder="Footer" value="<?php if (isset($_POST['submit'])){echo $_POST['Footer'];}?>">
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
<?php

require "vendor/autoload.php";

class CustomPdfGenerator extends TCPDF
{
    public function Header()
    {
        $image_file = 'logo2.png';
        $this->Image($image_file, 20, 3, 45, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->SetFont('helvetica', 'B', 20);
        $this->Cell(0, 15, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln();
        $this->Cell(0, 15, $_POST['Header'], 0, false, 'R', 0, '', 0, false, 'M', 'M');
    }

    public function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 15);
        $this->Cell(0, 10,  $_POST['Footer'], 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

    public function printTable($header, $data)
    {
        $this->SetFillColor(0, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B', 12);

        $w = array(110, 17, 25, 30);
        $num_headers = count($header);
        for ($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();

        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');

        // table data
        $fill = 0;
        $total = 0;

        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'R', $fill);
            $this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R', $fill);
            $this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill = !$fill;
            $total += $row[3];
        }

        $this->Cell($w[0], 6, '', 'LR', 0, 'L', $fill);
        $this->Cell($w[1], 6, '', 'LR', 0, 'R', $fill);
        $this->Cell($w[2], 6, '', 'LR', 0, 'L', $fill);
        $this->Cell($w[3], 6, '', 'LR', 0, 'R', $fill);
        $this->Ln();

        $this->Cell($w[0], 6, '', 'LR', 0, 'L', $fill);
        $this->Cell($w[1], 6, '', 'LR', 0, 'R', $fill);
        $this->Cell($w[2], 6, 'TOTAL:', 'LR', 0, 'L', $fill);
        $this->Cell($w[3], 6, $total, 'LR', 0, 'R', $fill);
        $this->Ln();

        $this->Cell(array_sum($w), 0, '', 'T');
    }
}


//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
function Createinvoice()
{
    if (isset($_POST['submit'])) {
        $pdf = new CustomPdfGenerator(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('dejavusans', '', 12, '', true);

// start a new page
        $pdf->AddPage();

// date and invoice no
        $pdf->Write(0, "\n", '', 0, 'C', true, 0, false, false, 0);
        $pdf->writeHTML("<br><br>");
        $pdf->writeHTML("<b>DATE:</b> 01/01/2021");
        $pdf->writeHTML("<b>INVOICE#</b>12");
        $pdf->Write(0, "\n", '', 0, 'C', true, 0, false, false, 0);

// address
        $pdf->writeHTML("84 Norton Street,");
        $pdf->writeHTML("NORMANHURST,");
        $pdf->writeHTML("New South Wales, 2076");
        $pdf->Write(0, "\n", '', 0, 'C', true, 0, false, false, 0);

// bill to
        $pdf->writeHTML("<b>BILL TO:</b>", true, false, false, false, 'R');
        $pdf->writeHTML("22 South Molle Boulevard,", true, false, false, false, 'R');
        $pdf->writeHTML("KOOROOMOOL,", true, false, false, false, 'R');
        $pdf->writeHTML("Queensland, 4854", true, false, false, false, 'R');
        $pdf->Write(0, "\n", '', 0, 'C', true, 0, false, false, 0);

// invoice table starts here
        $header = array('DESCRIPTION', 'UNITS', 'RATE $', 'AMOUNT');
        $data = array(
            array('Item #1', '1', '100', '100'),
            array('Item #2', '2', '200', '400')
        );
        $pdf->printTable($header, $data);
        $pdf->Ln();

// comments
        $pdf->SetFont('', '', 12);
        $pdf->writeHTML("<b>OTHER COMMENTS:</b>");
        $pdf->writeHTML("Method of payment: <i>PAYPAL</i>");
        $pdf->writeHTML("PayPal ID: <i>katie@paypal.com");
        $pdf->Write(0, "\n\n\n", '', 0, 'C', true, 0, false, false, 0);
        $pdf->writeHTML(
            "If you have any questions about this invoice, please contact:",
            true,
            false,
            false,
            false,
            'C'
        );
        $pdf->writeHTML("Katie A Falk, (07) 4050 2235, katie@sks.com", true, false, false, false, 'C');

// save pdf file
        $pdf->Output(__DIR__ . '/invoice#14.pdf', 'F');
    }
}

Createinvoice();