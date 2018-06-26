<?php include "header.inc"; 
mysql_select_db('tolcustomerdatabase');
?>
<div class="page-content">
<ol class="breadcrumb">                                
<li class=""><a href="overview.php">Overview</a></li>
<li class=""><a href="">Customer Database</a></li>
<li class="active"><a href="addcustomer.php">Add New Customer</a></li>
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
            <div class="panel-heading"><h2>Add New Customer Form</h2></div>
            <div class="panel-body">

                <form class="form-horizontal row-border" id="validate-form" data-parsley-validate action="process_addcustomer.php" method="post">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Customer Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="customer_name" required class="form-control tooltips" data-trigger="hover" data-original-title="Fill in customer name">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label">Client Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="client_no" required class="form-control tooltips" data-trigger="hover" data-original-title="Fill in client number">
                        </div>
                    </div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Address</label>
						<div class="col-sm-10">
							<textarea name="address" required class="form-control tooltips" data-trigger="hover" data-original-title="Fill in customer address"></textarea>
						</div>
					</div>
					<div class="form-group">
                        <label class="col-sm-2 control-label">Person In Charge</label>
                        <div class="col-sm-10">
                            <input type="text" name="pic" required class="form-control tooltips" data-trigger="hover" data-original-title="Fill in person in charge">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label">Contact</label>
                        <div class="col-sm-10">
                            <input type="text" name="contact" required class="form-control tooltips" data-trigger="hover" data-original-title="Fill in customer contact">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" required class="form-control tooltips" data-trigger="hover" data-original-title="Fill in customer email">
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