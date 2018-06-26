<?php 
include "webconfig.php";
$now = date('Y-m-d');	

$id = $_GET['id'];

$sql = "SELECT * FROM printjob WHERE id = '$id'";
$r = mysql_query($sql,$conn);
					
while($row = mysql_fetch_array($r)) 
{
	$customer_name = $row['customer_name'];
	$address = $row['address'];
	$pic = $row['pic'];
	$jobno = $row['jobno'];
}

require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetTopMargin('50');
$pdf->SetRightMargin('70');
$pdf->SetLeftMargin('100');

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table

// add a page
$pdf->AddPage('L', 'A4');

// create some HTML content
$html = 
<<<EOD
<div align="left">
<h2>$pic</h2><br>
<h2>$customer_name</h2><br>
$address<p>
<div>
EOD;

// output the HTML content
$pdf->writeHTML($html, true, false, false, false, '');

// set style for barcode
$style = array(
    'border' => 1,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

// QRCODE,L : QR-CODE Low error correction
$pdf->write2DBarcode($customer_name, 'QRCODE,L', 100, 115, 20, 20, $style, 'N');


// ---------------------------------------------------------
ob_end_clean();
//Close and output PDF document
$pdf->Output('../jq/document/example_006.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
