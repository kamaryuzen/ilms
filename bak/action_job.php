<?php
include "webconfig.php";

$customer_name = $_GET['customer_name'];
$action = $_GET['action'];
$id = $_GET['id'];

if ($action == "delete")
{
	mysql_query("DELETE FROM printjob WHERE id ='$id'") or die(mysql_error()); 
	$msg = "Print job ID :".$id." has been deleted.";
	echo "<meta http-equiv=\"refresh\" content=\"0;url=joblist.php?msg=".$msg."\" />";
}

if ($action == "edit")
{

$sql = "SELECT * FROM printjob WHERE id = '$id'";
$r = mysql_query($sql,$conn);
					
while($row = mysql_fetch_array($r)) 
{
	$printjobid = $row['id'];
	$customer_name = $row['customer_name'];
	$address = $row['address'];
	$pic = $row['pic'];
	$jobno = $row['jobno'];
}

include "header.inc"; ?>
<div class="page-content">
<ol class="breadcrumb">                                
<li class=""><a href="overview.php">Overview</a></li>
<li class=""><a href="">Print Job List</a></li>
<li class="active"><a href="">Edit Print Job Information</a></li>
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
            <div class="panel-heading"><h2>Edit Print Job Information Form</h2></div>
            <div class="panel-body">

                <form class="form-horizontal row-border" id="validate-form" data-parsley-validate action="process_editprintjob.php" method="post">
				<input type="hidden" name="id" value="<?php echo $printjobid; ?>">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Print Job ID</label>
                        <div class="col-sm-10">
                            <input type="text" name="id" required class="form-control" disabled value="<?php echo $printjobid; ?>">
                        </div>
                    </div>
					<div class="form-group">
					<label class="col-sm-2 control-label">Select Customer</label>
						<div class="col-sm-10">
							<?php
							mysql_select_db('tolcustomerdatabase');
							$sql="SELECT * FROM client ORDER BY customer_name ASC";
							$r = mysql_query($sql,$conn);
							$noofcustomer = mysql_num_rows($r);

							echo "<select class='form-control' id=customer name=customer_name>
							<option value=''>Select Customer</option>";
							while($row = mysql_fetch_array($r)) 
							{
								if ($customer_name == $row['customer_name'])
								{
									$selected = 'selected="selected"';
								}
								else
								{
									$selected = '';
								}
								echo '<option value="'.$row['customer_name'].'" '.$selected.'>'.$row['customer_name'].'</option>';	
							}
							echo "</select>";
							?>
						</div>
					</div>
					<div class="form-group">
					<label class="col-sm-2 control-label">Select Address</label>
						<div class="col-sm-10">
							<select class="form-control" name="address" id="addressinput">
								<option value="<?php echo $address; ?>"><?php echo $address; ?></option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
					<label class="col-sm-2 control-label">Select Person In Charge</label>
						<div class="col-sm-10">
							<select class="form-control" name="pic" id="picinput">
								<option value="<?php echo $pic; ?>"><?php echo $pic; ?></option>
							</select>
						</div>
					</div>
					<div class="form-group">
					<label class="col-sm-2 control-label">Select Job</label>
						<div class="col-sm-10">
							<?php
							mysql_select_db('tolserviceorder');
							$sql="SELECT * FROM erms ORDER BY date_created DESC";
							$r = mysql_query($sql,$conn);
							$noofcustomer = mysql_num_rows($r);

							echo "<select class='form-control' id=jobno name=jobno>
							<option value=''>Select Job No.</option>";
							while($row = mysql_fetch_array($r)) 
							{
								if (($row['job_no'] != "") && ($row['job_no'] != "-"))
								{
									if ($jobno == $row['job_no'])
									{
										$selected = 'selected="selected"';
									}
									else
									{
										$selected = '';
									}
									echo '<option value="'.$row['job_no'].'" '.$selected.'>'.$row['job_no'].'</option>';	
								}
							}
							echo "</select>";
							?>
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