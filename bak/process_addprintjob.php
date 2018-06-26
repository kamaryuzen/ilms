<?php include "header.inc"; 

$customer_name = $_POST['customer_name'];
$address = $_POST['address'];
$pic = $_POST['pic'];
$jobno = $_POST['jobno'];

$customer_name = mysql_real_escape_string($customer_name);
$address = mysql_real_escape_string($address);
$pic = mysql_real_escape_string($pic);
$jobno = mysql_real_escape_string($jobno);
mysql_select_db('tolcustomerdatabase');
mysql_query("
INSERT INTO printjob SET
customer_name = '$customer_name',
address = '$address',
pic = '$pic',
jobno = '$jobno'
") 
or die(mysql_error());  

$msg = $customer_name." successfully added to the database.";

echo "<META HTTP-EQUIV=\"Refresh\" Content=\"0; URL=joblist.php?msg=$msg\">";    

?>
