<?php
require_once('../config/lang/eng.php');
require_once('../tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('ICT Asset');
$pdf->SetTitle('ICT PURCHASE FY2010/2011');
$pdf->SetSubject('ICT PURCHASE FY2010/2011');
$pdf->SetKeywords('ICT, PDF');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

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

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 8);

// add a page
$pdf->AddPage();

$pdf->Write(0, 'BUDGET : PROJECT (Batch 5)', '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, 'COST : RM 39,783.00', '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);

// NON-BREAKING TABLE (nobr="true")

$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="0" nobr="true">
 <tr>
  <td width="8%">PO NO</td>
  <td width="42%">40205367</td>
  <td width="8%">PO DATE</td>
  <td width="42%"></td>
 </tr>
 <tr>
  <td width="8%">DO NO</td>
  <td width="42%">SGX223405</td>
  <td width="8%">DO DATE</td>
  <td width="42%">10-06-2011</td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// NON-BREAKING TABLE (nobr="true")

$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="0" nobr="true">
 <tr>
  <td width="3%">No</td>
  <td width="15%">Item</td>
  <td width="15%">Serial No</td>
  <td width="15%">ERMS No</td>
  <td width="17%">Purchase For</td>
  <td width="17%">Given To (Owner)</td>
  <td width="18%">Project Code</td>
 </tr>
 <tr>
  <td width="3%"></td>
  <td width="15%"></td>
  <td width="15%"></td>
  <td width="15%"></td>
  <td width="17%"></td>
  <td width="17%"></td>
  <td width="18%"></td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
