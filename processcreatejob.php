<?php include "header.inc";

$client = $_POST['client'];
$reportdate = $_POST['reportdate'];
$pono = $_POST['pono'];

$q ="SELECT address FROM client WHERE customer_name = '$client'";
$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
{
	$location = $row['address'];
}

$q2 ="SELECT MAX(id) FROM job";
$r2 = mysql_query($q2);
while ($row = mysql_fetch_array($r2))
{
	$maxid = $row[MAX(id)] + 1;
}

$maxid = str_pad($maxid, 4, '0', STR_PAD_LEFT);
$jobno = "TNBR/RES/".date('Y')."/".$maxid;

$client = mysql_real_escape_string($client);

mysql_query("
INSERT INTO job SET
jobno = '$jobno',
client = '$client',
reportdate = '$reportdate',
pono = '$_POST[pono]',
ong = '$_POST[ong]',
bod = '$_POST[bod]',
cod = '$_POST[cod]',
tha = '$_POST[tha]',
nit = '$_POST[nit]',
tph = '$_POST[tph]',
spt = '$_POST[spt]',
tmp = '$_POST[tmp]',
peh = '$_POST[peh]',
tss = '$_POST[tss]',
con = '$_POST[con]',
tur = '$_POST[tur]',
vso = '$_POST[vso]',
nam = '$_POST[nam]',
pmt = '$_POST[pmt]',
tsp = '$_POST[tsp]',
pds = '$_POST[pds]',
emi = '$_POST[emi]',
hyd = '$_POST[hyd]',
sie = '$_POST[sie]',
noi = '$_POST[noi]',
vib = '$_POST[vib]'
")
or die(mysql_error());

//$msg = "Job no.: ".$jobno." successfully added to the database. Use 'Add Sample' button to add sample.";
//echo "<META HTTP-EQUIV=\"Refresh\" Content=\"0; URL=viewjoblist.php?msg=$msg\">";

echo "<META HTTP-EQUIV=\"Refresh\" Content=\"0; URL=addsample.php?jobno=$jobno\">";

?>
