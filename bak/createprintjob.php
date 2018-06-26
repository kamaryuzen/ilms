<?php include "header.inc"; 

mysql_select_db('tolcustomerdatabase');
$sqlmaxid = "SELECT MAX(id) FROM printjob"; 
$rmaxid = mysql_query($sqlmaxid) or die(mysql_error());
while($row = mysql_fetch_array($rmaxid)){
	$printjobid = $row['MAX(id)']+1;
}
?>
<div class="page-content">
<ol class="breadcrumb">                                
<li class=""><a href="overview.php">Overview</a></li>
<li class="active"><a href="createprintjob.php">Create New Print Job</a></li>
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
            <div class="panel-heading"><h2>Create New Print Job Form</h2></div>
            <div class="panel-body">

                <form class="form-horizontal row-border" id="validate-form" data-parsley-validate action="process_addprintjob.php" method="post">
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
								echo '<option value="'.$row['customer_name'].'">'.$row['customer_name'].'</option>';
							}
							echo "</select>";
							?>
						</div>
					</div>
					<div class="form-group">
					<label class="col-sm-2 control-label">Select Address</label>
						<div class="col-sm-10">
							<select class="form-control" name="address" id="addressinput">
								<option value="">Select Customer First</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
					<label class="col-sm-2 control-label">Select Person In Charge</label>
						<div class="col-sm-10">
							<select class="form-control" name="pic" id="picinput">
								<option value="">Select Address First</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
					<label class="col-sm-2 control-label">Select Job</label>
						<div class="col-sm-10">
							<input id="jobno" name="jobno" type="text" required class="form-control"/>
						</div>
					</div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-1 col-sm-offset-11">
                                <div class="btn-toolbar">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                            

<?php include "footer.inc"; ?>