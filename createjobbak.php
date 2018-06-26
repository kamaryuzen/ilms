<?php
include "header.inc";

$now = date('Y-m-d');
?>
	<div class="page-content">
	<ol class="breadcrumb">
		<li class="active"><a href="createjob.php">Create New Job</a></li>
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
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
											<div class="row">
												<div class="col-md-12">
													<form class="grid-form" action="processcreatejob.php" method="POST" enctype="multipart/form-data">
														<fieldset>
														<legend>New Job Information</legend>
															<div data-row-span="3">
																<div data-field-span="2">
																	<label>Client</label>
																	<?php
																	echo "<select name=\"client\" onchange=\"showlocation(this.value)\">";
																	echo "<option>Select Client</option>";
																	$qn ="
																	SELECT customer_name
																	FROM client
																	ORDER BY customer_name";
																	$rn = mysql_query($qn);
																	while ($row = mysql_fetch_array($rn))
																	{

																	if ($row['customer_name'] == $client)
																	{
																		$selected=" selected";
																	}
																	else
																	{
																		$selected="";
																	}
																	echo '<option value="'.strtoupper($row['customer_name']).'"'.$selected.'>'.strtoupper($row['customer_name'])."</option>";
																	}
																	echo "</select> ";
																	?>
																</div>
																<div data-field-span="1">
																	<label>Date</label>
																	<input type="text" name="reportdate" id="datepicker" value="<?php echo $now; ?>">
																</div>
															</div>
															<div data-row-span="3">
																<div data-field-span="2">
																	<label>Location</label>
																	<div id="txtHint">Choose a client</div>
																</div>
																<div data-field-span="1">
																	<label>Test Item</label>
																	<input type="text" name="testitem">
																</div>
															</div>
															<div data-row-span="3">
																<div data-field-span="2">
																	<label>Test Performed</label>
																	<label>Water Lab Test</label><br>
																	<label><input type="checkbox" name="ong" value="Yes"> Oil & Grease</label> &nbsp;
																	<label><input type="checkbox" name="bod" value="Yes"> Biochemical Oxygen Demand</label> &nbsp;
																	<label><input type="checkbox" name="cod" value="Yes"> Chemical Oxygen Demand</label> &nbsp;
																	<label><input type="checkbox" name="tha" value="Yes"> Total Hardness</label> &nbsp;
																	<label><input type="checkbox" name="nit" value="Yes"> Nitrite (NO2)</label>
																	<label><input type="checkbox" name="tph" value="Yes"> Total Phosphorus</label> &nbsp;
																	<label><input type="checkbox" name="spt" value="Yes"> Sulfate</label> &nbsp;
																	<label><input type="checkbox" name="tmp" value="Yes"> Temperature</label> &nbsp;
																	<label><input type="checkbox" name="peh" value="Yes"> pH</label> &nbsp;
																	<label><input type="checkbox" name="tss" value="Yes"> TSS</label>
																	<label><input type="checkbox" name="con" value="Yes"> Conductivity</label> &nbsp;
																	<label><input type="checkbox" name="tur" value="Yes"> Turbidity</label> &nbsp;
																	<label><input type="checkbox" name="vso" value="Yes"> Volatile Solid</label> &nbsp;
																	<label><input type="checkbox" name="nam" value="Yes"> Nitrogen Ammonia</label> &nbsp;

																	<br><br><label>Air Lab Test</label><br>
																	<label><input type="checkbox" name="pmt" value="Yes"> PM 10</label> &nbsp;
																	<label><input type="checkbox" name="tsp" value="Yes"> TSP</label> &nbsp;
																	<label><input type="checkbox" name="pds" value="Yes"> PDS</label> &nbsp;
																	<label><input type="checkbox" name="emi" value="Yes"> Emission</label> &nbsp;

																	<br><br><label>Soil Lab Test</label><br>
																	<label><input type="checkbox" name="hyd" value="Yes"> Hydro Test</label>
																	<label><input type="checkbox" name="sei" value="Yes"> Seive Analysis</label> &nbsp;

																	<br><br><label>Other Test</label><br>
																	<label><input type="checkbox" name="noi" value="Yes"> Noise Test</label>
																	<label><input type="checkbox" name="vib" value="Yes"> Vibration Test</label> &nbsp;
																</div>
																<div data-field-span="1">
																	<label>Reference Test Method</label>
																	<?php
																	echo "<select name=\"referencetestmethod\">";
																	echo "<option>Select Reference Test Method</option>";
																	$qn ="
																	SELECT testmethod
																	FROM testmethod
																	ORDER BY testmethod";
																	$rn = mysql_query($qn);
																	while ($row = mysql_fetch_array($rn))
																	{

																	if ($row['testmethod'] == $testmethod)
																	{
																		$selected=" selected";
																	}
																	else
																	{
																		$selected="";
																	}
																	echo '<option value="'.$row['testmethod'].'"'.$selected.'>'.$row['testmethod']."</option>";
																	}
																	echo "</select> ";
																	?>
																</div>
															</div>
															<div data-row-span="3">
																<div data-field-span="2">
																	<label>Equipment Used</label>
																	<?php
																	echo "<select name=\"equipmentused\" onchange=\"showequipmentsn(this.value)\">";
																	echo "<option>Select Equipment</option>";
																	$qn ="
																	SELECT equipment
																	FROM equipment
																	ORDER BY equipment";
																	$rn = mysql_query($qn);
																	while ($row = mysql_fetch_array($rn))
																	{

																	if ($row['equipment'] == $equipmentused)
																	{
																		$selected=" selected";
																	}
																	else
																	{
																		$selected="";
																	}
																	echo '<option value="'.$row['equipment'].'"'.$selected.'>'.$row['equipment']."</option>";
																	}
																	echo "</select> ";
																	?>
																</div>
																<div data-field-span="1">
																	<label>Equipment Serial No</label>
																	<div id="txtHint2">Choose an equipment</div>
																</div>
															</div>
														</fieldset>
														<br><br>
														<fieldset>
														<legend>Test Information</legend>
															<div data-row-span="6">
																<div data-field-span="4">
																	<label>Manufacturer</label>
																	<?php
																	echo "<select name=\"manufacturer\">";
																	echo "<option>Select Manufacturer</option>";
																	$qn ="
																	SELECT customer_name
																	FROM manufacturer
																	ORDER BY customer_name";
																	$rn = mysql_query($qn);
																	while ($row = mysql_fetch_array($rn))
																	{

																	if ($row['customer_name'] == $manufacturer)
																	{
																		$selected=" selected";
																	}
																	else
																	{
																		$selected="";
																	}
																	echo '<option value="'.strtoupper($row['customer_name']).'"'.$selected.'>'.strtoupper($row['customer_name'])."</option>";
																	}
																	echo "</select> ";
																	?>
																</div>
																<div data-field-span="1">
																	<label>Serial No</label>
																	<input type="text" name="productserialno">
																</div>
																<div data-field-span="1">
																	<label>Sample ID</label>
																	<input type="text" name="sampleid">
																</div>
															</div>
															<div data-row-span="3">
																<div data-field-span="1">
																	<label>Year of Manufactured</label>
																	<input type="text" name="yearmanufactured">
																</div>
																<div data-field-span="1">
																	<label>Rated Voltage</label>
																	<input type="text" name="ratedvoltage">
																</div>
																<div data-field-span="1">
																	<label>Rated Capacity</label>
																	<input type="text" name="ratedcapacity">
																</div>
															</div>
															<div data-row-span="1">
																<div data-field-span="1">
																	<label>Testing Facilities</label>
																	<input type="text" name="testingfacilities">
																</div>
															</div>
															<div data-row-span="1">
																<div data-field-span="1">
																	<label>Others</label>
																	<input type="text" name="others">
																</div>
															</div>
														</fieldset>
														<div class="clearfix pt20">
															<div class="pull-right">
																<input type="submit" class="btn-primary btn" value="Add New Job">
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
<?php include "footer.inc"; ?>
