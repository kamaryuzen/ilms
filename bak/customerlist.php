<?php include "header.inc"; 

$msg = $_GET['msg'];
?>
<div class="page-content">
<ol class="breadcrumb">                                
<li class=""><a href="overview.php">Overview</a></li>
<li class=""><a href="">Customer Database</a></li>
<li class="active"><a href="customerlist.php">Search Customer</a></li>
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
				<h2>Customer Database</h2>
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
							<th>Address</th>
							<th>PIC</th>
							<th>Contact</th>
							<th>Email</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no = "";
						mysql_select_db('tolcustomerdatabase');

						$sql = "SELECT * FROM customer_name ORDER BY customer_name ASC";
						$r = mysql_query($sql,$conn);
					
						while($row = mysql_fetch_array($r)) 
						{
							$id = $row['id'];	
							$customer_name = $row['customer_name'];
							$client_no = $row['client_no'];
							
							$no++;
							
							$customer_namel = htmlentities($customer_name);

						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php 
							
							echo $customer_name." <a href=\"action_customer.php?customer_name=$customer_namel&action=edit&id=$id\"><span class=\"badge badge-info\">Edit</span></a> <a href=\"action_customer.php?customer_name=$customer_namel&action=delete&id=$id\" onclick=\"return confirm('Are you sure to continue? This action is unrecoverable. Make sure you have backup for this record.')\"><span class=\"badge badge-orange\">Delete</span></a>";
							
							?></td>
							<td><?php echo $client_no; ?></td>
							<td><ul><?php 
							$sqladd = "SELECT * FROM address WHERE customer_id = '$id' ORDER BY id ASC";
							$r = mysql_query($sqladd,$conn);
						
							while($row = mysql_fetch_array($r)) 
							{
								$address = $row['address'];
								echo "<li>".$address."</li>"; 
							}
							?></ul></td>
							<td><ul><?php
							$r = mysql_query($sqladd,$conn);
							
							while($row = mysql_fetch_array($r)) 
							{
								$pic = $row['pic'];						
								echo "<li>".$pic."</li>";
							}
							?></ul></td>
							<td><ul><?php 
							$r = mysql_query($sqladd,$conn);
							
							while($row = mysql_fetch_array($r)) 
							{
								$contact = $row['contact'];
								echo "<li>".$contact."</li>"; 
							}
							?></ul></td>
							<td><ul><?php 
							$r = mysql_query($sqladd,$conn);
							
							while($row = mysql_fetch_array($r)) 
							{
								$email = $row['email'];
								echo "<li>".$email."</li>";
							}
							?></ul></td>
							<td><?php 
							$r = mysql_query($sqladd,$conn);
							
							while($row = mysql_fetch_array($r)) 
							{
								$id = $row['id'];
								echo "<a href=\"action_customer.php?customer_name=$customer_namel&action=edit&id=$id\"><span class=\"badge badge-info\">Edit</span></a><br>";
							}
							?></td>
							<td><?php 
							$r = mysql_query($sqladd,$conn);
							
							while($row = mysql_fetch_array($r)) 
							{
								$id = $row['id'];
								echo "<a href=\"action_customer.php?customer_name=$customer_namel&action=delete&id=$id\" onclick=\"return confirm('Are you sure to continue? This action is unrecoverable. Make sure you have backup for this record.')\"><span class=\"badge badge-orange\">Delete</span></a><br>";
							}
							?></td>
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