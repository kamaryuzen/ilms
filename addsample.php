<?php
include "header.inc";

$jobno = $_GET['jobno'];

$now = date('Y-m-d');
?>
	<div class="page-content">
	<ol class="breadcrumb">
		<li class="active"><a href="createjob.php">Add Sample</a></li>
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
			<div class="panel panel-info">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<form class="grid-form" action="processcreatesample.php" method="POST" enctype="multipart/form-data">
										<fieldset>
										<legend>New Sample Registration For Job No.: <?php echo $jobno; ?></legend>
											<div data-row-span="3">
												<div data-field-span="3">
													<label>Sampling Location</label>
													<input type="text" name="samplingpoint" required>
												</div>
											</div>
											<div data-row-span="3">
												<div data-field-span="1">
													<label>Sampling Coordinate</label>
													<input type="text" name="coordinate" required>
												</div>
												<div data-field-span="1">
													<label>Sampling Date</label>
													<input type="text" name="datesampling" required>
												</div>
												<div data-field-span="1">
													<label>Receipt Date</label>
													<input type="text" name="datereceipt" required>
												</div>
											</div>
										</fieldset>
										<div class="clearfix pt20">
											<div class="pull-right">
												<input type="submit" class="btn-primary btn" value="Add Sample">
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
								<th colspan="6">General Information</th>
								<th colspan="1">Action</th>
							</tr>
							<tr>
								<th>No</th>
								<th>Sample ID</th>
								<th>Sampling Location</th>
								<th>Coordinate</th>
								<th width="7%">Received Date</th>
								<th width="7%">Target Date</th>
								<th>Status</th>
								<!--<th>Edit</th>-->
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$no = "";
							$sql = "SELECT * FROM sample WHERE jobno = '$jobno' ORDER BY id DESC";
							$r = mysql_query($sql,$conn);

							$tesctcount = "";
							while($row = mysql_fetch_array($r))
							{
								$id = $row['id'];
								$sampleno = $row['sampleno'];
								$samplingpoint = $row['samplingpoint'];
								$coordinate = $row['coordinate'];
								$datereceived = $row['datereceived'];
								$datetarget = $row['datetarget'];
								$samplestatus = $row['samplestatus'];

								$status =

								$no++;

							?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $sampleno; ?></td>
								<td><?php echo $samplingpoint; ?></td>
								<td><?php echo $coordinate; ?></td>
								<td><?php echo $datereceived; ?></td>
								<td><?php echo $datetarget; ?></td>
								<td><?php echo $samplestatus; ?></td>
								<td><?php echo "<a href=\"deletejob.php?page=viewjoblist&id=$id\" onclick=\"return confirm('Are you sure to continue? This action is unrecoverable. Make sure you have backup for this record.')\"><span class=\"badge badge-orange\">Delete</span></a>"; ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>

					<div class="panel-footer"></div>

				</div>
			</div>
		</div>
	</div>

<?php include "footer.inc"; ?>
