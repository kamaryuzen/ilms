<?php
include("webconfig.php");
$customer_name = $_GET['customer_name'];
$action = $_GET['action'];
$id = $_GET['id'];

if ($action == "delete")
{
	mysql_query("DELETE FROM client WHERE id ='$id'") or die(mysql_error()); 
	$msg = $customer_name." has been deleted.";
	echo "<meta http-equiv=\"refresh\" content=\"0;url=customerlist.php?msg=".$msg."\" />";
}

if ($action == "edit")
{
$sql = "SELECT * FROM client WHERE id = '$id'";
$r = mysql_query($sql,$conn);
					
while($row = mysql_fetch_array($r)) 
{
	$id = $row['id'];	
	$customer_name = $row['customer_name'];
	$client_no = $row['client_no'];
	$address = $row['address'];
	$pic = $row['pic'];
	$contact = $row['contact'];
	$email = $row['email'];
}

include "header.inc";
?>
<div class="page-content">
<ol class="breadcrumb">                                
<li class=""><a href="overview.php">Overview</a></li>
<li class=""><a href="">Customer Database</a></li>
<li class="active"><a href="">Edit Customer Information</a></li>
</ol>
<div class="page-heading">            			
			
<img src="assets/img/tnblogo.png" class="img-responsive" height="550" width="350">
<h1>Transformer Oil Lab Customer Database System</h1>
<div class="options"></div>
</div>
<div class="container-fluid">
                       
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-info">
            <div class="panel-heading"><h2>Edit Customer Information Form</h2></div>
            <div class="panel-body">

                <form class="form-horizontal row-border" id="validate-form" data-parsley-validate action="process_editcustomer.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Customer Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="customer_name" required class="form-control tooltips" data-trigger="hover" data-original-title="Fill in customer name" value="<?php echo $customer_name; ?>">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label">Client Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="client_no" required class="form-control tooltips" data-trigger="hover" data-original-title="Fill in client number" value="<?php echo $client_no; ?>">
                        </div>
                    </div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Address</label>
						<div class="col-sm-10">
							<textarea name="address" required class="form-control tooltips" data-trigger="hover" data-original-title="Fill in customer address"><?php echo $address; ?></textarea>
						</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-2 control-label">Person In Charge</label>
                        <div class="col-sm-10">
                            <input type="text" name="pic" required class="form-control tooltips" data-trigger="hover" data-original-title="Fill in person in charge" value="<?php echo $pic; ?>">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label">Contact</label>
                        <div class="col-sm-10">
                            <input type="text" name="contact" required class="form-control tooltips" data-trigger="hover" data-original-title="Fill in customer contact" value="<?php echo $contact; ?>">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" required class="form-control tooltips" data-trigger="hover" data-original-title="Fill in customer email" value="<?php echo $email; ?>">
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-1 col-sm-offset-11">
                                <div class="btn-toolbar">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                            

<?php include "footer.inc"; 
}	
?>