<?php include "header.inc"; 

$id = $_POST['id'];
$customer_name = $_POST['customer_name'];
$address = $_POST['address'];
$pic = $_POST['pic'];
$jobno = $_POST['jobno'];

$customer_name = mysql_real_escape_string($customer_name);
$address = mysql_real_escape_string($address);
$pic = mysql_real_escape_string($pic);
$jobno = mysql_real_escape_string($jobno);

mysql_query("
UPDATE printjob SET 
customer_name = '$customer_name',
address = '$address',
pic = '$pic',
jobno = '$jobno'
WHERE id = '$id'
") 
or die(mysql_error());  

$msg = "Print job ID : ".$id." information successfully updated to the database.";

echo "<META HTTP-EQUIV=\"Refresh\" Content=\"0; URL=joblist.php?msg=$msg\">";    

?>
