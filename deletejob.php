<?php
include "webconfig.php";

$jobno = $_GET['jobno'];
$page = $_GET['page'];

mysql_query("DELETE FROM job WHERE jobno ='$jobno'") or die(mysql_error());
mysql_query("DELETE FROM sample WHERE jobno ='$jobno'") or die(mysql_error());

$msg = "Job has been deleted.";
echo "<META HTTP-EQUIV=\"Refresh\" Content=\"0; URL=$page.php?msg=$msg\">";
