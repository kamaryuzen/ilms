<?php include "header.inc";

$client = $_POST['client'];
$reportdate = $_POST['reportdate'];
$pono = $_POST['pono'];

$td = $_POST['td'];
$ec = $_POST['ec'];
$tr = $_POST['tr'];
$wr = $_POST['wr'];
$ir = $_POST['ir'];

$referencetestmethod = $_POST['referencetestmethod'];
$equipmentused = $_POST['equipmentused'];
$manufacturer = $_POST['manufacturer'];
$productserialno = $_POST['productserialno'];
$yearmanufactured = $_POST['yearmanufactured'];
$ratedvoltage = $_POST['ratedvoltage'];
$ratedcapacity = $_POST['ratedcapacity'];
$testingfacilities = $_POST['testingfacilities'];
$others = $_POST['others'];
$sampleid = $_POST['sampleid'];

$q ="SELECT address FROM client WHERE customer_name = '$client'";
$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
{
	$location = $row['address'];
}

$q ="SELECT serialno FROM equipment WHERE equipment = '$equipmentused'";
$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
{
	$equipmentsn = $row['serialno'];
}

$client = mysql_real_escape_string($client);
$testingfacilities = mysql_real_escape_string($testingfacilities);
$others = mysql_real_escape_string($others);

mysql_query("
INSERT INTO job SET
client = '$client',
reportdate = '$reportdate',
pono = '$pono',
ong = '$ong',
bod = '$bod',
cod = '$cod',
tha = '$tha',
nit = '$nit',
tph = '$tph',
spt = '$spt',
tmp = '$tmp',
peh = '$peh',
tss = '$tss',
con = '$con',
tur = '$tur',
vso = '$vso',
nam = '$nam',
pmt = '$pmt',
tsp = '$tsp',
pds = '$pds',
emi = '$emi',
hyd = '$hyd',
sie = '$sie',
noi = '$noi',
vib = '$vib',
referencetestmethod = '$referencetestmethod',
equipmentused = '$equipmentused',
manufacturer = '$manufacturer',
productserialno = '$productserialno',
yearmanufactured = '$yearmanufactured',
ratedvoltage = '$ratedvoltage',
ratedcapacity = '$ratedcapacity',
testingfacilities = '$testingfacilities',
others = '$others',
location = '$location',
equipmentsn = '$equipmentsn',
sampleid = '$sampleid'
")
or die(mysql_error());

$msg = $client." successfully added to the database.";

echo "<META HTTP-EQUIV=\"Refresh\" Content=\"0; URL=viewjoblist.php?msg=$msg\">";

?>
