<?php include "header.inc"; 

$msg = $_GET['msg'];
?>
<div class="page-content">
<ol class="breadcrumb">                                
<li class=""><a href="overview.php">Overview</a></li>
<li class=""><a href="">Customer Database</a></li>
<li class="active"><a href="jobattachment.php">ERMS Job Lists</a></li>
</ol>
<div class="page-heading">            			
			
<img src="assets/img/tnblogo.png" class="img-responsive" height="550" width="350">
<h1>Transformer Oil Lab Customer Database System</h1>
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
				<h2>ERMS Job Lists</h2>
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
							<th>No</th>
							<th>Customer Name</th>
							<th>Client No.</th>
							<th>Job No. (Click To View Attachment)</th>
							<th>Total Job(s)</th>
							<!--<th>Edit</th>
							<th>Delete</th>-->
						</tr>
					</thead>
					<tbody>
					<?php
						$no = "";
						mysql_select_db('tolcustomerdatabase');
						$sql = "SELECT * FROM client ORDER BY customer_name ASC";
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
							
							$no++;
							
							$customer_namel = htmlentities($customer_name);

						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $customer_name; ?></td>
							<td><?php echo $client_no; ?></td>
							<td>
							<?php 
							mysql_select_db('tolserviceorder');
							$sql2 = "SELECT * FROM erms WHERE customer_name = '$customer_name' ORDER BY job_no DESC";
							$r2 = mysql_query($sql2,$conn);
							
							$countjob = 0;
							while($row = mysql_fetch_array($r2)) 
							{
								$job_no = $row['job_no'];
								$attachmentlink = $row['attachmentlink'];								
								if ($job_no != "")
								{
									echo '<a href="attachment/'.$job_no.'.pdf"><span class="badge badge-purple">'.$job_no.'</span></a> ';
									$countjob++;
								}
							}
							
							?>
							</td>
							<td><span class="badge badge-success"><?php echo $countjob; ?></span></td>
							<!--<td><a href="action_customer.php?customer_name=<?php echo $customer_namel; ?>&action=edit&id=<?php echo $id; ?>"><span class="badge badge-info">Edit</span></a></td>
							<td><a href="action_customer.php?customer_name=<?php echo $customer_namel; ?>&action=delete&id=<?php echo $id; ?>" onclick="return confirm('Are you sure to continue? This action is unrecoverable. Make sure you have backup for this record.')"><span class="badge badge-orange">Delete</span></a></td>-->
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