<?php
include "webconfig.php";

$client = $_GET['client'];

$q ="SELECT address FROM client WHERE customer_name = '$client'";
$r = mysql_query($q);
while ($row = mysql_fetch_array($r))
{
	$location = $row['address'];
	echo $location;
}