<?php
$customer_name = $_POST["customer_name"];
$address = $_POST["address"];

$customer_name = htmlentities($customer_name);

//Include database configuration file
include "webconfig.php";

if(isset($customer_name) && !empty($customer_name))
{
	$sql="SELECT * FROM client WHERE customer_name = '$customer_name' ORDER BY address ASC";
	$r = mysql_query($sql,$conn);
	$noofaddress = mysql_num_rows($r);

    if($noofaddress > 0)
	{
		echo "<select class='form-control' id=addressinput name=address>
		<option value=''>Select Address</option>";
		while($row = mysql_fetch_array($r)) 
		{
			echo '<option value="'.$row['address'].'">'.$row['address'].'</option>';
		}
		echo "</select>";
    }
	else
	{
        echo '<option value="">Address not available</option>';
    }
}

if(isset($address) && !empty($address))
{
	$address = explode(",", $address);
	$sql2="SELECT * FROM client WHERE address LIKE '%$address[0]%' ORDER BY pic ASC";
	$r2 = mysql_query($sql2,$conn);
	$noofpic = mysql_num_rows($r2);

    if($noofpic > 0)
	{
		echo "<select class='form-control' id=picinput name=pic>
		<option value=''>Select Person In Charge</option>
		<option value=''>-</option>";
		while($row = mysql_fetch_array($r2)) 
		{
			if (($row['pic'] != "") && ($row['pic'] != "-"))
			{
				echo '<option value="'.$row['pic'].'">'.$row['pic'].'</option>';
			}
		}
		echo "</select>";
    }
	else
	{
        echo '<option value="">Person in charge not available</option>';
    }
}
?>