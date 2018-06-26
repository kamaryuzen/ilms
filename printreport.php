<?php 
ob_start();
include "header.inc";
$print_date = date('Y-m-d');	

$id = $_GET['jobid'];

$sql = "SELECT * FROM job WHERE id = '$id'";
						$r = mysql_query($sql,$conn);
					
						while($row = mysql_fetch_array($r)) 
						{
							$id = $row['id'];	
							$client = $row['client'];
							$reportdate = $row['reportdate'];
							$testitem = $row['testitem'];
							$td = $row['td'];
							$ec = $row['ec'];
							$tr = $row['tr'];
							$wr = $row['wr'];
							$ir = $row['ir'];
							$referencetestmethod = $row['referencetestmethod'];
							$equipmentused = $row['equipmentused'];
							$manufacturer = $row['manufacturer'];
							$productserialno = $row['productserialno'];
							$yearmanufactured = $row['yearmanufactured'];
							$ratedvoltage = $row['ratedvoltage'];
							$ratedcapacity = $row['ratedcapacity'];
							$testingfacilities = $row['testingfacilities'];
							$others = $row['others'];
							$location = $row['location'];
							$equipmentsn = $row['equipmentsn'];
							$sampleid = $row['sampleid'];
						}
						
						$q ="SELECT description FROM testmethod WHERE testmethod = '$referencetestmethod'";
						$r = mysql_query($q);
						while ($row = mysql_fetch_array($r))
						{
							$description = $row['description'];
						}
						
						$sql2 = "SELECT * FROM interpretation_ec WHERE jobid = '$id'";
						$r2 = mysql_query($sql2,$conn);
											
						while($row = mysql_fetch_array($r2)) 
						{
							$interpretations = $row['interpretations'];	
						}

						$sql3 = "SELECT * FROM atmos_cond WHERE jobid = '$id'";
						$r3 = mysql_query($sql3,$conn);
											
						while($row = mysql_fetch_array($r3)) 
						{
							$temperature = $row['temperature'];	
							$humidity = $row['humidity'];
						}
						
						$explodedate = explode('-',$reportdate);
						$runningid = sprintf('%03d',$id);
						$certno = "TNBR/HVST-".$explodedate[0]."-".$explodedate[1]."/".$runningid;

require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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

$pdf->setPrintFooter(true);

// ---------------------------------------------------------

// add a page
$pdf->AddPage();

$pdf->SetFont('helvetica', '', 10);

//NON-BREAKING TABLE (nobr="true")

$tbl = <<<EOD
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="6" align="center"><h1>Certificate of Test</h1><hr /></td>
  </tr>
  <tr>
    <td width="13%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="37%">&nbsp;</td>
    <td width="16%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="31%">&nbsp;</td>
  </tr>
  <tr>
    <td>Date of Issue</td>
    <td>:</td>
    <td>$print_date</td>
    <td>Certificate No.</td>
    <td>:</td>
    <td>$certno</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">Issued By</td>
    <td valign="top">:</td>
    <td colspan="4">TNBR QATS Sdn. Bhd.<br />
      (Company No. 979289-M) <br />
      No. 1 Jalan Air Hitam <br />
      Kawasan Institusi Penyelidikan, <br />
      Bandar Baru Bangi, <br />
      43000 Kajang, <br />
      Selangor Darul Ehsan. <br /><br />
      Tel : 603-89225000 Fax : 603-89268828/9
    </td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
	APPROVED SIGNATORIES <br />
	<img src="tcpdf/images/checkbox.png" style="width:10px;height:10px;"> Normisahili Miswan <br />
    <img src="tcpdf/images/checkbox.png" style="width:10px;height:10px;"> Sharni Ahamad Sabki 
    </td>
  </tr>
</table>
<hr><p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="19%" valign="top">Customer Name</td>
    <td width="1%" valign="top">:</td>
    <td width="44%">$client<br />
    $location</td>
    <td width="12%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="23%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Test Item</td>
    <td>:</td>
    <td>$testitem</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Sample ID</td>
    <td>:</td>
    <td>$sampleid</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Date of Test</td>
    <td>:</td>
    <td>$reportdate</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Test Performed</td>
    <td>:</td>
    <td>i. Excitation Current Measurement</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">Reference Test Method</td>
    <td valign="top">:</td>
    <td valign="top">$referencetestmethod</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Equipment Used</td>
    <td>:</td>
    <td>$equipmentused</td>
    <td>Serial No.</td>
    <td>:</td>
    <td>$equipmentsn</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">Testing Facilities</td>
    <td valign="top">:</td>
    <td colspan="4">$testingfacilities</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
\n\n
Note : The test with symbol * is accredited to ISO/IEC 17025
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->AddPage();

$pdf->SetFont('helvetica', '', 10);

//NON-BREAKING TABLE (nobr="true")

$tbl = <<<EOD
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="6" align="left"><h1>TABLE OF CONTENTS</h1><hr /></td>
  </tr>
  <tr>
    <td width="12%">&nbsp;</td>
    <td width="13%">&nbsp;</td>
    <td width="30%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="29%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Certificate No.</td>
    <td>:</td>
    <td>$certno</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Section</td>
    <td>Sub-section</td>
    <td colspan="2">Contents</td>
    <td>&nbsp;</td>
    <td align="center">Page No.</td>  
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>1.</td>
    <td>&nbsp;</td>
    <td colspan="2"><strong>GENERAL INFORMATION</strong></td>
    <td>&nbsp;</td>
    <td align="center">3</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>1.1</td>
    <td colspan="2">Rated characteristics of the tested sample(s)</td>
    <td>&nbsp;</td>
    <td align="center">3</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>1.2</td>
    <td colspan="2">Test methodology applied</td>
    <td>&nbsp;</td>
    <td align="center">3</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>1.3</td>
    <td colspan="2">Description of test</td>
    <td>&nbsp;</td>
    <td align="center">3</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>2.</td>
    <td>&nbsp;</td>
    <td colspan="2"><strong>ELECTRICAL CONNECTION DIAGRAM</strong></td>
    <td>&nbsp;</td>
    <td align="center">3</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>2.1</td>
    <td colspan="2">Excitation Current Measurement</td>
    <td>&nbsp;</td>
    <td align="center">3</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>3.</td>
    <td>&nbsp;</td>
    <td colspan="2"><strong>MEASUREMENT AND TEST RESULTS</strong></td>
    <td>&nbsp;</td>
    <td align="center">4</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>3.1</td>
    <td colspan="2">Measurement of atmospheric conditions</td>
    <td>&nbsp;</td>
    <td align="center">4</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>3.2</td>
    <td colspan="2">Measurement Results</td>
    <td>&nbsp;</td>
    <td align="center">4</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>3.2.1</td>
    <td colspan="2">Excitation Current Measurement</td>
    <td>&nbsp;</td>
    <td align="center">4</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>4</td>
    <td>&nbsp;</td>
    <td colspan="2"><strong>TEST RESULT INTERPRETATIONS</strong></td>
    <td>&nbsp;</td>
    <td align="center">4</td>
  </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->AddPage();

$pdf->SetFont('helvetica', '', 10);

//NON-BREAKING TABLE (nobr="true")

$tbl = <<<EOD
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="19%">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="4%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Certificate No.</td>
    <td>:</td>
    <td colspan="3">$certno</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>1.</strong></td>
    <td colspan="9"><strong>GENERAL INFORMATION</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="4%"><strong>1.1</strong></td>
    <td colspan="8"> <strong>Rated Characteristics of the Test Sample(s)</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">Client</td>
    <td width="2%">:</td>
    <td colspan="5"><strong>$client</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">Serial Number</td>
    <td>:</td>
    <td colspan="5"><strong>$productserialno</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">Manufacturer</td>
    <td>:</td>
    <td colspan="5"><strong>$manufacturer</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">Year of Manufactered</td>
    <td>:</td>
    <td colspan="5"><strong>$yearmanufactured</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">Rated Voltage</td>
    <td>:</td>
    <td colspan="5"><strong>$ratedvoltage</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">Rated Capacity</td>
    <td>:</td>
    <td colspan="5"><strong>$ratedcapacity</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">Others</td>
    <td>: </td>
    <td colspan="5"><strong>$others</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>1.2</strong></td>
    <td colspan="8"><strong>Test Methodology Applied</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="8">The test and measurement was performed according :</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="7%">i.</td>
    <td colspan="7">$referencetestmethod : $description</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>1.3</strong></td>
    <td colspan="8"><strong>Description of the Test</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>ii.</td>
    <td colspan="7">Excitation current measurement</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="8">Excitation current measurement provides means of detection of extensive core problems, like shorted lamination or winding problems, partial or high resistance short circuit between winding turns, poor joints or contacts, etc. The exciting current flows in the core depending upon on the transformer winding connections should have a pattern of two high and one low reading.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>2.</strong></td>
    <td colspan="9"><strong>ELECTRICAL CONNECTION DIAGRAM</strong></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>2.1</strong></td>
    <td colspan="8"><strong>Excitation Current Measurement</strong></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="8"><img src="assets/img/ec.png" style="height:350px;"></td>
  </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');


$pdf->AddPage();

$pdf->SetFont('helvetica', '', 10);

//NON-BREAKING TABLE (nobr="true")

$tbl = <<<EOD
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td colspan="5">&nbsp;</td>
    <td width="15%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
    <td>Certificate No.</td>
    <td>:</td>
    <td colspan="2">$certno</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>3.</strong></td>
    <td colspan="9"><strong>MEASUREMENT AND TEST RESULTS</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="5%"><strong>3.1</strong></td>
    <td colspan="8"><strong>Measurement of Atmospheric Conditions</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><strong>Atmospheric Condition</strong></td>
    <td width="2%">:</td>
    <td colspan="5">Temperature $temperature &deg;C Humidity $humidity %</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>3.2</strong></td>
    <td colspan="8"><strong>Measurement Results</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>3.2.1</td>
    <td colspan="8">Excitation current measurement</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td rowspan="2" align="center">Tap Position</td>
    <td colspan="7" align="center">Measured Valued (mA)</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3" align="center">A-N</td>
    <td colspan="2" align="center">B-N</td>
    <td colspan="2" align="center">C-N</td>
  </tr>
EOD;

 $sql = "SELECT * FROM result WHERE jobid = '$id'";
	$r = mysql_query($sql,$conn);
						
	while($row = mysql_fetch_array($r)) 
	{
		$tp = $row['tp'];
		$an = $row['an'];
		$bn = $row['bn'];
		$cn = $row['cn'];
		
		$tbl3 .= '<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td align="center">'.$tp.'</td>
			<td colspan="3" align="center">'.$an.'</td>
			<td colspan="2" align="center">'.$bn.'</td>
			<td colspan="2" align="center">'.$cn.'</td>
		  </tr>';
	}

$tbl2 = <<<EOD
  <tr>
    <td>&nbsp;</td>
    <td colspan="9">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>4.</strong></td>
    <td colspan="9"><strong>TEST RESULT INTERPRETATIONS</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>i.</td>
    <td colspan="8">$interpretations</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="9">** The result interpretations expressed herein are outside the scope of SAMM accreditation.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
  </tr>
</table>
EOD;

$pdf->writeHTML($tbl.$tbl3.$tbl2, true, false, false, false, '');


ob_end_clean();
//Close and output PDF document
$pdf->Output('printreport.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
?>