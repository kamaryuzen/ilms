<?php include "header.inc"; 

$msg = $_GET['msg'];
?>
<div class="page-content">
<ol class="breadcrumb">                                
<li class="active"><a href="viewjoblist.php">View Job List</a></li>
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
		<div class="panel panel-info" id="panel-tabletools" data-widget='{"draggable":"false"}'>
			<div class="panel-heading">
				<h2>Search Job</h2>
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
							<th colspan="1"></th>
							<th colspan="5">General Information</th>
							<th colspan="5">Test Performed</th>
							<th colspan="2">Equipment</th>
							<th colspan="4">Action</th>
						</tr>
						<tr>
							<th>No</th>
							<th>Client</th>
							<th>Location</th>
							<th>Test Item</th>
							<th>Sample ID</th>
							<th width="7%">Test Date</th>
							<th>TD</th>
							<th>EC</th>
							<th>TR</th>
							<th>WR</th>
							<th>IR</th>
							<th>Reference Test Method</th>
							<th width="10%">Equipment/SN</th>
							<th>Detail</th>
							<th>Print Report</th>
							<!--<th>Edit</th>-->
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no = "";
						$sql = "SELECT * FROM job WHERE ec != '' ORDER BY id DESC";
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
							
							$no++;
							
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $client; ?></td>
							<td><?php echo $location; ?></td>
							<td><?php echo $testitem; ?></td>
							<td><?php echo $sampleid; ?></td>
							<td><?php echo $reportdate; ?></td>
							<td><?php echo $td; ?></td>
							<td><?php echo $ec; ?></td>
							<td><?php echo $tr; ?></td>
							<td><?php echo $wr; ?></td>
							<td><?php echo $ir; ?></td>
							<td><?php echo $referencetestmethod; ?></td>
							<td><?php echo $equipmentused." - ".$equipmentsn; ?></td>
							<td><?php echo "<a href=\"testresult.php?jobid=$id\"><span class=\"badge badge-default\">Result</span></a><br>"; ?></td>
							<td><?php echo "<a href=\"printreport.php?jobid=$id\"><span class=\"badge badge-success\">Print</span></a><br>"; ?></td>
							<!--<td><?php echo "<a href=\"equipmentdetail.php?equipment=$equipment&productsn=$productsn&id=$id\"><span class=\"badge badge-info\">Edit</span></a><br>"; ?></td>-->
							<td><?php echo "<a href=\"deletejob.php?page=ec_job&id=$id\" onclick=\"return confirm('Are you sure to continue? This action is unrecoverable. Make sure you have backup for this record.')\"><span class=\"badge badge-orange\">Delete</span></a>"; ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>

				<div class="panel-footer"><i>* TD - Tan Delta Measurement | EC - Excitation Current Measurement | TR - Turn Ratio Measurement | WR - Winding Resistance Measurement | IR - Insulation Resistance Measurement</i></div>
				
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
				<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h2 class="modal-title">Equipment Image</h2>
							</div>
							<div class="modal-body" style="text-align:center;"></div>
							<div class="modal-footer">
								<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->						
                            

<?php include "footer.inc"; ?>