<?php include "header.inc";
$msg = $_GET['msg'];
$id = $_GET['jobid'];
$action = $_GET['action'];

if ($action == "ac")
{
	$tab_ac = 'class="active"';	
	$tab_aca = "active";	
}
else if ($action == "tr")
{
	$tab_tr = 'class="active"';	
	$tab_tra = "active";
}
else if ($action == "tri")
{
	$tab_tri = 'class="active"';	
	$tab_tria = "active";
}
else
{
	$tab_ac = 'class="active"';	
	$tab_aca = "active";
}


$sql = "SELECT * FROM job WHERE id = '$id'";
$r = mysql_query($sql,$conn);
					
while($row = mysql_fetch_array($r)) 
{
	$id = $row['id'];	
	$client = $row['client'];
	$reportdate = $row['reportdate'];
	$testitem = $row['testitem'];
	$td = $row['td'];
	$ec = $row['ec'];
	$tr = $row['tr'];
	$wr = $row['wr'];
	$ir = $row['ir'];
	$referencetestmethod = $row['referencetestmethod'];
	$equipmentused = $row['equipmentused'];
	$manufacturer = $row['manufacturer'];
	$productserialno = $row['productserialno'];
	$yearmanufactured = $row['yearmanufactured'];
	$ratedvoltage = $row['ratedvoltage'];
	$ratedcapacity = $row['ratedcapacity'];
	$testingfacilities = $row['testingfacilities'];
	$others = $row['others'];
	$location = $row['location'];
	$equipmentsn = $row['equipmentsn'];
	$sampleid = $row['sampleid'];
}

$sql2 = "SELECT * FROM interpretation_ec WHERE jobid = '$id'";
$r2 = mysql_query($sql2,$conn);
					
while($row = mysql_fetch_array($r2)) 
{
	$interpretations = $row['interpretations'];	
}

$sql3 = "SELECT * FROM atmos_cond WHERE jobid = '$id'";
$r3 = mysql_query($sql3,$conn);
					
while($row = mysql_fetch_array($r3)) 
{
	$temperature = $row['temperature'];	
	$humidity = $row['humidity'];
}
?>
<div class="page-content">
<ol class="breadcrumb">      
<li class=""><a href="viewjoblist.php">View Job List</a></li>
<li class="active"><a href="">Test Result</a></li>
</ol>
<div class="page-heading">            			
			
<img src="assets/img/tnblogo.png" class="img-responsive" height="550" width="350">
<h1>HVTL Lab Management System</h1>
<div class="options"></div>
</div>
<div class="container-fluid">

<?php if ($msg != "") { ?>
<div class="alert alert-info">
	<p><?php echo $msg; ?></p>
</div>
<?php } ?>
                                
<div class="row" data-widget-group="group1">
	<div class="col-md-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h2>Sample ID : <?php echo $sampleid; ?></h2>
				<div>
					<ul class="nav nav-tabs pull-right">
						<li <?php echo $tab_ac; ?>><a href="#tabb1" data-toggle="tab">Atmospheric Conditions</a></li>
						<li <?php echo $tab_tr; ?>><a href="#tabb2" data-toggle="tab">Test Result</a></li>
						<li <?php echo $tab_tri; ?>><a href="#tabb3" data-toggle="tab">Interpretations</a></li>
					</ul>
				</div>
			</div>
			<div class="panel-body">
				<div class="tab-content">
					<div class="tab-pane <?php echo $tab_aca; ?>" id="tabb1">
					<div class="row">
						<div class="col-md-12">
							<h3>Atmospheric Conditions</h3>
								<div class="row">
									<div class="col-md-12">
										<form class="grid-form" action="edittestresult.php" method="POST">
										<input type="hidden" name="id" value="<?php echo $id; ?>"/>
										<input type="hidden" name="action" value="ac"/>
											<fieldset>
												<div data-row-span="2">
													<div data-field-span="1">
														<label>Temperature (&deg; C)</label>
														<input name="temperature" type="text" value="<?php echo $temperature; ?>">
													</div>
													<div data-field-span="1">
														<label>Humidity (%)</label>
														<input name="humidity" type="text" value="<?php echo $humidity; ?>">
													</div>
												</div>
											</fieldset>
											<div class="clearfix pt20">
													<div class="pull-right">
														<input type="submit" class="btn-primary btn" value="Save Atmospheric Conditions">
													</div>
											</div>
										</form>
									</div>
								</div>
						</div>
					</div>
				</div>
				<div class="tab-pane <?php echo $tab_tra; ?>" id="tabb2">
					<div class="row">
						<div class="col-md-12">
							<h3>Test Result</h3>
								<div class="row">
									<div class="col-md-12">
										<form class="grid-form" action="edittestresult.php" method="POST">
										<input type="hidden" name="id" value="<?php echo $id; ?>"/>
										<input type="hidden" name="action" value="tr"/>
											<fieldset>
												<div data-row-span="4">
													<div data-field-span="1">
														<label>Tap Position</label>
														<input name="tp" type="text" value="<?php echo $tp; ?>">
													</div>
													<div data-field-span="1">
														<label>Measured Valued (mA) A-N</label>
														<input name="an" type="text" value="<?php echo $an; ?>">
													</div>
													<div data-field-span="1">
														<label>Measured Valued (mA) B-N</label>
														<input name="bn" type="text" value="<?php echo $bn; ?>">
													</div>
													<div data-field-span="1">
														<label>Measured Valued (mA) C-N</label>
														<input name="cn" type="text" value="<?php echo $cn; ?>">
													</div>
												</div>
											</fieldset>
											<div class="clearfix pt20">
													<div class="pull-right">
														<input type="submit" class="btn-primary btn" value="Save Test Results">
													</div>
											</div>
										</form>
									</div>
								</div>
								<div class="row">
						<div class="col-md-12">
						<p>
							<div class="panel panel-info" id="panel-tabletools" data-widget='{"draggable":"false"}'>
								<div class="panel-heading">
									<div class="panel-ctrls"
										data-actions-container="" 
										data-action-collapse='{"target": ".panel-body"}'
										data-action-expand=''
										data-action-colorpicker=''
									>
									</div>
								</div>
								<div class="panel-editbox" data-widget-controls=""></div>
								<div class="panel-body panel-no-padding">

									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="tabletools">
										<thead>
											<tr>
												<th width="3%" rowspan="2">No</th>
												<th colspan="3">Measured Valued (mA)</th>
												<th width="10%" rowspan="2">Action</th>
											</tr>
											<tr>
												<th>A-N</th>
												<th>B-N</th>
												<th>C-N</th>
											</tr>
										</thead>
										<tbody>
										<?php
										$no = 0;
										$sql = "SELECT * FROM result WHERE jobid = '$id'";
										$r = mysql_query($sql,$conn);
																						
										while($row = mysql_fetch_array($r)) 
										{
											$rid = $row['id'];
											$tp = $row['tp'];
											$an = $row['an'];
											$bn = $row['bn'];
											$cn = $row['cn'];
											
											$no++;

											?>
											<tr>
												<td><?php echo $tp; ?></td>
												<td><?php echo $an; ?></td>
												<td><?php echo $bn; ?></td>
												<td><?php echo $cn; ?></td>
												<td><?php echo "<a href=\"deletetr.php?action=tr&rid=$rid&id=$id\" onclick=\"return confirm('Are you sure to continue? This action is unrecoverable. Make sure you have backup for this record.')\"><span class=\"badge badge-orange\">Delete</span></a>"; ?></td>
											</tr>
											<?php } ?>
										</tbody>
									</table>

									<div class="panel-footer"></div>
								</div>
							</div>
						</div>
					</div>
						</div>
					</div>
				</div>
				<div class="tab-pane <?php echo $tab_tria; ?>" id="tabb3">
					<div class="row">
						<div class="col-md-12">
							<h3>Test Result Interpretations</h3>
								<div class="row">
									<div class="col-md-12">
										<form class="grid-form" action="edittestresult.php" method="POST">
										<input type="hidden" name="id" value="<?php echo $id; ?>"/>
										<input type="hidden" name="action" value="tri"/>
											<fieldset>
												<div data-row-span="1">
													<div data-field-span="1">
														<label>Test Result Interpretations</label>
														<input name="interpretations" type="text" value="<?php echo $interpretations; ?>">
													</div>
												</div>
											</fieldset>
											<div class="clearfix pt20">
													<div class="pull-right">
														<input type="submit" class="btn-primary btn" value="Save Interpretations">
													</div>
											</div>
										</form>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include "footer.inc"; ?>