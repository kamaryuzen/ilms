<?php
include "webconfig.php";

$jobid = $_GET['id'];
$rid = $_GET['rid'];
$action = $_GET['action'];

mysql_query("DELETE FROM result WHERE id ='$rid'") or die(mysql_error()); 


$msg = "Test result has been deleted.";
echo "<META HTTP-EQUIV=\"Refresh\" Content=\"0; URL=testresult.php?jobid=$jobid&action=$action&msg=$msg\">";    
