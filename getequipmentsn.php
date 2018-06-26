<?php
include "webconfig.php";

$equipment = $_GET['equipment'];

$q ="SELECT serialno FROM equipment WHERE equipment = '$equipment'";
$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
{
	$equipmentsn = $row['serialno'];
	echo $equipmentsn;
}