<?php
include "webconfig.php";

$id = $_POST['id'];
$action = $_POST['action'];

$temperature = $_POST['temperature'];
$humidity = $_POST['humidity'];

$tp = $_POST['tp'];
$an = $_POST['an'];
$bn = $_POST['bn'];
$cn = $_POST['cn'];

$interpretations = mysql_real_escape_string($_POST['interpretations']);

if ($action == "ac")
{
	mysql_query("
	INSERT INTO atmos_cond SET 
	jobid = '$id',
	temperature = '$temperature',
	humidity = '$humidity'
	") 
	or die(mysql_error());

	$msg = "Atmospheric conditions successfully updated to the database.";

	echo "<META HTTP-EQUIV=\"Refresh\" Content=\"0; URL=testresult.php?jobid=$id&msg=$msg&action=$action\">";    
}

if ($action == "tr")
{
	mysql_query("
	INSERT INTO result SET 
	jobid = '$id',
	tp = '$tp',
	an = '$an',
	bn = '$bn',
	cn = '$cn'
	") 
	or die(mysql_error());

	$msg = "Test result successfully updated to the database.";

	echo "<META HTTP-EQUIV=\"Refresh\" Content=\"0; URL=testresult.php?jobid=$id&msg=$msg&action=$action\">";    
}

if ($action == "tri")
{
	mysql_query("
	INSERT INTO interpretation_ec SET 
	jobid = '$id',
	interpretations = '$interpretations'
	") 
	or die(mysql_error());

	$msg = "Test result interpretations successfully updated to the database.";

	echo "<META HTTP-EQUIV=\"Refresh\" Content=\"0; URL=testresult.php?jobid=$id&msg=$msg&action=$action\">";    
}


