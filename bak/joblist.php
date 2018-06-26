<?php include "header.inc"; 
mysql_select_db('tolcustomerdatabase');
$msg = $_GET['msg'];
?>
<div class="page-content">
<ol class="breadcrumb">                                
<li class=""><a href="overview.php">Overview</a></li>
<li class="active"><a href="joblist.php">Print Job List</a></li>
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
				<h2>Print Job List</h2>
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

			<form class="form-horizontal row-border" action="printadminform.php" method="post">
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="tabletools">
					<thead>
						<tr>
							<th>No</th>
							<th>Print Job ID</th>
							<th>Customer Name</th>
							<th>Address</th>
							<th>PIC</th>
							<th>Job No</th>
							<th>Edit</th>
							<th>Delete</th>
							<th>Print Envelope</th>
							<th>Print Admin Form</th>
							<th width=7%>Print Date</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no = "";
			
						$sql = "SELECT * FROM printjob ORDER BY id DESC";
						$r = mysql_query($sql,$conn);
					
						while($row = mysql_fetch_array($r)) 
						{
							$printjobid = $row['id'];
							$customer_name = $row['customer_name'];
							$address = $row['address'];
							$pic = $row['pic'];
							$jobno = $row['jobno'];
							$print_date = $row['print_date'];
							
							$no++;
							
							$customer_namel = htmlentities($customer_name);
							
							if ($print_date == "0000-00-00")
							{
								$print_date = "N/A";
							}

						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $printjobid; ?></td>
							<td><?php echo $customer_name; ?></td>
							<td><?php echo $address; ?></td>
							<td><?php echo $pic; ?></td>
							<td><?php echo $jobno; ?></td>
							<td><a href="action_job.php?customer_name=<?php echo $customer_namel; ?>&action=edit&id=<?php echo $printjobid; ?>"><span class="badge badge-info">Edit</span></a></td>
							<td><a href="action_job.php?customer_name=<?php echo $customer_namel; ?>&action=delete&id=<?php echo $printjobid; ?>" onclick="return confirm('Are you sure to continue? This action is unrecoverable. Make sure you have backup for this record.')"><span class="badge badge-orange">Delete</span></a></td>
							<td><a href="printenvelope.php?id=<?php echo $printjobid; ?>"><span class="badge badge-success">Print</span></a></td>
							<td><input name="printlist[]" type="checkbox" value="<?php echo $printjobid; ?>"/></td>
							<td><?php echo $print_date; ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>

				<div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="btn-toolbar">
                                    <button type="submit" class="btn btn-success">Print Admin Form</button>
                                </div>
                            </div>
                        </div>
                    </div>
			</div>
		</div>
	</div>
</div>
                            

<?php include "footer.inc"; ?>