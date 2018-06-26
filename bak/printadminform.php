<?php 
ob_start();
include "header.inc";
mysql_select_db('tolcustomerdatabase');

$print_date = date('Y-m-d');	

$printlist = $_POST['printlist'];

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

$pdf->setPrintFooter(false);

// ---------------------------------------------------------

// add a page
$pdf->AddPage();

$pdf->SetFont('helvetica', '', 10);

//NON-BREAKING TABLE (nobr="true")

$tbl_header = <<<EOD
<div align="center"><h3><u>BORANG PENGIRIMAN SURAT</u></h3></div>
<table width="100%" border="1" cellspacing="0" cellpadding="5">
  <tr>
    <td>Nama</td>
    <td colspan="3">$name</td>
  </tr>
  <tr>
    <td>Unit</td>
    <td>TOL/QATS</td>
    <td>Tarikh</td>
    <td>$print_date</td>
  </tr>
  <tr>
    <td>Caj Kepada</td>
    <td>10251982</td>
    <td>Tandatangan</td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="1" cellspacing="0" cellpadding="5">
  <tr>
    <td colspan="6" bgcolor="#000000" style="color:white">Jenis Penghantaran<br />Tandakan (/) di petak berkenaan</td>
  </tr>
  <tr>
    <td>By Hand</td>
    <td>&nbsp;</td>
    <td>Pos Biasa</td>
    <td>&nbsp;</td>
    <td>Pos Laju/Fedex</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6">
EOD;


$tbl_footer = '<br><br><br><br><br><br><br><br><br><br></td></tr></table>';
$tbl = '';

$no = 1;
foreach($printlist as $printlist) 
{
    $sql = "SELECT * FROM printjob WHERE id = '$printlist'";
	$r = mysql_query($sql,$conn);
						
	while($row = mysql_fetch_array($r)) 
	{
		$customer_name = $row['customer_name'];
		$jobno = $row['jobno'];
		
		$tbl .= $no.". ".$customer_name."-".$jobno."<br>";
		
		$no++;
	}
	
	mysql_query("
	UPDATE printjob SET
	print_date = '$print_date'
	WHERE id = '$printlist'
	") 
	or die(mysql_error());  
}


$pdf->writeHTML($tbl_header.$tbl.$tbl_footer, true, false, false, false, '');


ob_end_clean();
//Close and output PDF document
$pdf->Output('borangpengirimansurat.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
?>