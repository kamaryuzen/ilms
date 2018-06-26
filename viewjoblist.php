<?php include "header.inc";

$msg = $_GET['msg'];
?>
<div class="page-content">
<ol class="breadcrumb">
<li class="active"><a href="viewjoblist.php">View Job List</a></li>
</ol>
<div class="page-heading">

<img src="assets/img/tnblogo.png" class="img-responsive" height="550" width="350">
<h1><?php echo $labname; ?></h1>
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
							<th colspan="1"></th>
							<th colspan="1">Client Information</th>
							<th colspan="6">General Information</th>
							<th colspan="1">Test Performed</th>
							<th colspan="1">Report</th>
							<th colspan="3">Action</th>
						</tr>
						<tr>
							<th>No</th>
							<th>Job No.</th>
							<th>Client</th>
							<th>Sample ID</th>
							<th>Sampling Location</th>
							<th width="7%">Sampling Date</th>
							<th width="7%">Received Date</th>
							<th width="7%">Target Date</th>
							<th>Status</th>
							<th>No of Test Conducted</th>
							<th>Print</th>
							<!--<th>Edit</th>-->
							<th>Add Sample</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no = "";
						$sql = "SELECT * FROM job ORDER BY id DESC";
						$r = mysql_query($sql,$conn);

						$tesctcount = "";
						while($row = mysql_fetch_array($r))
						{
							$id = $row['id'];
							$jobno = $row['jobno'];
							$client = $row['client'];
							$reportdate = $row['reportdate'];
							$pono = $row['pono'];
							$ong = $row['ong'];
							$bod = $row['bod'];
							$cod = $row['cod'];
							$tha = $row['tha'];
							$nit = $row['nit'];
							$tph = $row['tph'];
							$spt = $row['spt'];
							$tmp = $row['tmp'];
							$peh = $row['peh'];
							$tss = $row['tss'];
							$con = $row['con'];
							$tur = $row['tur'];
							$vso = $row['vso'];
							$nam = $row['nam'];
							$pmt = $row['pmt'];
							$tsp = $row['tsp'];
							$pds = $row['pds'];
							$emi = $row['emi'];
							$hyd = $row['hyd'];
							$sie = $row['sie'];
							$noi = $row['noi'];
							$vib = $row['vib'];

							if ($ong == "Yes"){ $testcount++; } if ($bod == "Yes"){ $testcount++; } if ($cod == "Yes"){ $testcount++; } if ($tha == "Yes"){ $testcount++; } if ($nit == "Yes"){ $testcount++; }
							if ($tph == "Yes"){ $testcount++; } if ($spt == "Yes"){ $testcount++; } if ($tmp == "Yes"){ $testcount++; } if ($peh == "Yes"){ $testcount++; } if ($tss == "Yes"){ $testcount++; }
							if ($con == "Yes"){ $testcount++; } if ($tur == "Yes"){ $testcount++; } if ($vso == "Yes"){ $testcount++; } if ($nam == "Yes"){ $testcount++; } if ($pmt == "Yes"){ $testcount++; }
							if ($tsp == "Yes"){ $testcount++; } if ($pds == "Yes"){ $testcount++; } if ($emi == "Yes"){ $testcount++; } if ($hyd == "Yes"){ $testcount++; } if ($sie == "Yes"){ $testcount++; }
							if ($noi == "Yes"){ $testcount++; } if ($vib == "Yes"){ $testcount++; }

							$no++;

						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $jobno; ?></td>
							<td><?php echo $client; ?></td>
							<td><ul>
							<?php
							$sql2 = "SELECT * FROM sample WHERE jobno = '$jobno'";
							$r2 = mysql_query($sql2,$conn);

							while($row = mysql_fetch_array($r2))
							{
								$sampleno = $row['sampleno'];
								echo "<li>".$sampleno."</li>";
							}
							if ($sampleno == '')
							{
								echo "<li>No sample registered</li>";
							}
							?>
							</ul></td>
							<td><ul>
							<?php
							$sql3 = "SELECT * FROM sample WHERE jobno = '$jobno'";
							$r3 = mysql_query($sql3,$conn);

							while($row = mysql_fetch_array($r3))
							{
								$samplingpoint = $row['samplingpoint'];
								echo "<li>".$samplingpoint."</li>";
							}
							if ($samplingpoint == '')
							{
								echo "<li>N/A</li>";
							}
							?>
							</ul></td>
							<td><ul>
							<?php
							$sql7 = "SELECT * FROM sample WHERE jobno = '$jobno'";
							$r7 = mysql_query($sql7,$conn);

							while($row = mysql_fetch_array($r7))
							{
								$datesampling = $row['datesampling'];
								echo "<li>".$datesampling."</li>";
							}
							if ($datesampling == '')
							{
								echo "<li>N/A</li>";
							}
							?>
							</ul></td>
							<td><ul>
							<?php
							$sql4 = "SELECT * FROM sample WHERE jobno = '$jobno'";
							$r4 = mysql_query($sql4,$conn);

							while($row = mysql_fetch_array($r4))
							{
								$datereceived = $row['datereceived'];
								echo "<li>".$datereceived."</li>";
							}
							if ($datereceived == '')
							{
								echo "<li>N/A</li>";
							}
							?>
							</ul></td>
							<td><ul>
							<?php
							$sql5 = "SELECT * FROM sample WHERE jobno = '$jobno'";
							$r5 = mysql_query($sql5,$conn);

							while($row = mysql_fetch_array($r5))
							{
								$datetarget = $row['datetarget'];
								echo "<li>".$datetarget."</li>";
							}
							if ($datetarget == '')
							{
								echo "<li>N/A</li>";
							}
							?>
							</ul></td>
							<td><ul>
							<?php
							$sql6 = "SELECT * FROM sample WHERE jobno = '$jobno'";
							$r6 = mysql_query($sql6,$conn);

							while($row = mysql_fetch_array($r6))
							{
								$sampleno = $row['sampleno'];
								$samplestatus = $row['samplestatus'];
								echo "<li><a href=\"testresult.php?sampleno=$sampleno\"><span class=\"badge badge-success\">".$samplestatus."</span></a></li>";
							}
							if ($samplestatus == '')
							{
								echo "<li>N/A</li>";
							}
							?>
							</ul></td>
							<td><?php echo $testcount; ?>/21</td>
							<td><?php echo "<a href=\"printreport.php?jobid=$id\"><span class=\"badge badge-success\">Print</span></a><br>"; ?></td>
							<td><?php echo "<a href=\"addsample.php?jobno=$jobno\"><span class=\"badge badge-info\">Add Sample</span></a><br>"; ?></td>
							<td><?php echo "<a href=\"deletejob.php?page=viewjoblist&jobno=$jobno\" onclick=\"return confirm('Are you sure to continue? This action is unrecoverable. Make sure you have backup for this record.')\"><span class=\"badge badge-orange\">Delete</span></a>"; ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>

				<div class="panel-footer"></div>

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
