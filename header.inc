<?php
session_start();
$name = $_SESSION['name'];

error_reporting(E_ALL);
set_time_limit(0);

include "webconfig.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $labname; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenger Admin Theme">
    <meta name="author" content="KaijuThemes">

    <link href='http://fonts.googleapis.com/css?family=RobotoDraft:300,400,400italic,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700' rel='stylesheet' type='text/css'>

    <!--[if lt IE 10]>
        <script type="text/javascript" src="assets/js/media.match.min.js"></script>
        <script type="text/javascript" src="assets/js/placeholder.min.js"></script>
    <![endif]-->

    <link type="text/css" href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">        <!-- Font Awesome -->
    <link type="text/css" href="assets/css/styles.css" rel="stylesheet">                                     <!-- Core CSS with all styles -->

    <link type="text/css" href="assets/plugins/jstree/dist/themes/avenger/style.min.css" rel="stylesheet">    <!-- jsTree -->
    <link type="text/css" href="assets/plugins/codeprettifier/prettify.css" rel="stylesheet">                <!-- Code Prettifier -->
    <link type="text/css" href="assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">              <!-- iCheck -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
    <!--[if lt IE 9]>
        <link type="text/css" href="assets/css/ie8.css" rel="stylesheet">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
        <script type="text/javascript" src="assets/plugins/charts-flot/excanvas.min.js"></script>
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The following CSS are included as plugins and can be removed if unused-->

<link type="text/css" href="assets/plugins/form-daterangepicker/daterangepicker-bs3.css" rel="stylesheet"> 	<!-- DateRangePicker -->
<link type="text/css" href="assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet"> 					<!-- FullCalendar -->
<link type="text/css" href="assets/plugins/charts-chartistjs/chartist.min.css" rel="stylesheet"> 				<!-- Chartist -->

<link type="text/css" href="assets/plugins/datatables/dataTables.css" rel="stylesheet">

<link type="text/css" href="assets/plugins/datatables/ColReorder/css/dataTables.colReorder.css" rel="stylesheet"> 	<!-- ColReorder -->
<link type="text/css" href="assets/plugins/datatables/KeyTable/css/dataTables.keyTable.css" rel="stylesheet"> 		<!-- KeyTable -->

<link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet"> 					<!-- Bootstrap Support for Datatables -->
<link type="text/css" href="assets/plugins/datatables/dataTables.fontAwesome.css" rel="stylesheet"> 					<!-- FontAwesome Support for Datatables -->

<link type="text/css" href="assets/plugins/bootstrap-fileinput-master/css/fileinput.css" rel="stylesheet">
<script src="assets/plugins/bootstrap-fileinput-master/js/fileinput.js" type="text/javascript"></script>

<link type="text/css" href="assets/plugins/form-select2/select2.css" rel="stylesheet">                        <!-- Select2 -->
<link type="text/css" href="assets/plugins/form-multiselect/css/multi-select.css" rel="stylesheet">           <!-- Multiselect -->
<link type="text/css" href="assets/plugins/form-fseditor/fseditor.css" rel="stylesheet">                      <!-- FullScreen Editor -->
<link type="text/css" href="assets/plugins/form-tokenfield/bootstrap-tokenfield.css" rel="stylesheet">        <!-- Tokenfield -->
<link type="text/css" href="assets/plugins/switchery/switchery.css" rel="stylesheet">        					<!-- Switchery -->

<link type="text/css" href="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet"> <!-- Touchspin -->

<link type="text/css" href="assets/js/jqueryui.css" rel="stylesheet">        									<!-- jQuery UI CSS -->

<link type="text/css" href="assets/plugins/iCheck/skins/minimal/_all.css" rel="stylesheet">                   <!-- Custom Checkboxes / iCheck -->
<link type="text/css" href="assets/plugins/iCheck/skins/flat/_all.css" rel="stylesheet">
<link type="text/css" href="assets/plugins/iCheck/skins/square/_all.css" rel="stylesheet">

<link type="text/css" href="assets/plugins/card/lib/css/card.css" rel="stylesheet">

<link type="text/css" href="assets/plugins/gridforms/gridforms/gridforms.css" rel="stylesheet"> 									<!-- Gridforms -->

<script>
function showlocation(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getlocation.php?client="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
function showequipmentsn(str) {
    if (str == "") {
        document.getElementById("txtHint2").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint2").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getequipmentsn.php?equipment="+str,true);
        xmlhttp.send();
    }
}
</script>

</head>
<body class="infobar-offcanvas">

        <header id="topnav" class="navbar navbar-midnightblue navbar-fixed-top clearfix" role="banner">

	<span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
		<a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar"><span class="icon-bg"><i class="fa fa-fw fa-bars"></i></span></a>
	</span>

	<a class="navbar-brand" href="index.php">HVTLLMS</a>

	<div class="yamm navbar-left navbar-collapse collapse in">
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Quick Links<span class="caret"></span></a>
				<ul class="dropdown-menu" style="width: 900px;">
					<li>
						<div class="yamm-content container-sm-height">
							<div class="row row-sm-height yamm-col-bordered">
								<div class="col-sm-3 col-sm-height yamm-col">

                                    <!--<h3 class="yamm-category">User Navigation</h3>
                                    <ul class="list-unstyled mb20">
										<li><a href="addcustomer.php">Add New Customer</a></li>
										<li><a href="customerlist.php">Search Customer</a></li>
										<li><a href="createprintjob.php"><span>Create New Print Job</span></a></li>
										<li><a href="joblist.php"><span>Print Job List</span></a></li>
										<li><a href="jobattachment.php"><span>Job List</span></span></a></li>
                                    </ul>-->
                                </div>
                                <div class="col-sm-3 col-sm-height yamm-col">
                                    <p>All Rights Reserved 2016 - <?php echo date('Y'); ?>.</p>
									<p>Develop using Bootstrap 3.0. ICT (MK)</p>
                                </div>
							</div>
						</div>
					</li>
				</ul>
			</li>
		</ul>
	</div>

	<ul class="nav navbar-nav toolbar pull-right">
		<li class="dropdown toolbar-icon-bg">
			<a href="#" id="navbar-links-toggle" data-toggle="collapse" data-target="header>.navbar-collapse">
				<span class="icon-bg">
					<i class="fa fa-fw fa-ellipsis-h"></i>
				</span>
			</a>
		</li>

        <li class="toolbar-icon-bg hidden-xs" id="trigger-fullscreen">
            <a href="#" class="toggle-fullscreen"><span class="icon-bg"><i class="fa fa-fw fa-arrows-alt"></i></span></i></a>
        </li>

		<li class="dropdown toolbar-icon-bg">
			<a href="#" class="dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-fw fa-user"></i></span></a>
			<ul class="dropdown-menu userinfo arrow">
				<li><a href="index.php"><span class="pull-left">Sign Out</span> <i class="pull-right fa fa-sign-out"></i></a></li>
			</ul>
		</li>

	</ul>

</header>

        <div id="wrapper">
            <div id="layout-static">
                <div class="static-sidebar-wrapper sidebar-midnightblue">
                    <div class="static-sidebar">
                        <div class="sidebar">
    <div class="widget stay-on-collapse" id="widget-welcomebox">
        <div class="widget-body welcome-box tabular">
            <div class="tabular-row">
                <div class="tabular-cell welcome-avatar">
                    <a href="#"><img src="assets/img/<?php echo $name; ?>.jpg" class="avatar"></a>
                </div>
                <div class="tabular-cell welcome-options">
                    <span class="welcome-text">Welcome,</span>
                    <a href="#" class="name"><?php echo $name; ?></a>
                </div>
            </div>
        </div>
    </div>
	<div class="widget stay-on-collapse" id="widget-sidebar">
        <nav role="navigation" class="widget-body">
	<ul class="acc-menu">
		<li class="nav-separator">Main Navigation</li>
		<li><a href="viewjoblist.php"><i class="fa fa-tasks"></i><span>View Job List</span></a></li>
		<li><a href="createjob.php"><i class="fa fa-inbox"></i><span>Create New Job</span></a></li>

		<li class="nav-separator">Lab Test</li>
    <li><a href="javascript:;"><i class="fa fa-users"></i><span>Water Lab Test</span></a>
			<ul class="acc-menu">
    		<li><a href="tandelta.php"><span>Oil & Grease</span></a></li>
    		<li><a href="ec_job.php"><span>Biochemical Oxygen Demand</span></a></li>
    		<li><a href="turnratio.php"><span>Chemical Oxygen Demand</span></a></li>
    		<li><a href="windingresistance.php"><span>Total Hardness</span></a></li>
    		<li><a href="insulationresistance.php"><span>Nitrite (NO2)</span></a></li>
        <li><a href="insulationresistance.php"><span>Total Phosphorus</span></a></li>
        <li><a href="insulationresistance.php"><span>Sulfate</span></a></li>
        <li><a href="insulationresistance.php"><span>Temperature</span></a></li>
        <li><a href="insulationresistance.php"><span>pH</span></a></li>
        <li><a href="insulationresistance.php"><span>TSS</span></a></li>
        <li><a href="insulationresistance.php"><span>Conductivity</span></a></li>
        <li><a href="insulationresistance.php"><span>Turbidity</span></a></li>
        <li><a href="insulationresistance.php"><span>Volatile Solid</span></a></li>
        <li><a href="insulationresistance.php"><span>Nitrogen Ammonia</span></a></li>
      </ul>
    </li>
    <li><a href="javascript:;"><i class="fa fa-users"></i><span>Air Lab Test</span></a>
			<ul class="acc-menu">
    		<li><a href="tandelta.php"><span>PM 10</span></a></li>
    		<li><a href="ec_job.php"><span>TSP</span></a></li>
    		<li><a href="turnratio.php"><span>PDS</span></a></li>
    		<li><a href="windingresistance.php"><span>Emission</span></a></li>
      </ul>
    </li>
    <li><a href="javascript:;"><i class="fa fa-users"></i><span>Soil Lab Test</span></a>
			<ul class="acc-menu">
    		<li><a href="tandelta.php"><span>Hydro Test</span></a></li>
    		<li><a href="ec_job.php"><span>Seive Analysis</span></a></li>
      </ul>
    </li>
    <li><a href="viewjoblist.php"><i class="fa fa-tasks"></i><span>Noise Test</span></a></li>
    <li><a href="viewjoblist.php"><i class="fa fa-tasks"></i><span>Vibration Test</span></a></li>

		<li class="nav-separator">Setting</li>
		<li><a href="javascript:;"><i class="fa fa-users"></i><span>Client Data</span></a>
			<ul class="acc-menu">
				<li><a href="addcustomer.php">Add New Client</a></li>
				<li><a href="customerlist.php">Search Client</a></li>
			</ul>
		</li>
		<li><a href="javascript:;"><i class="fa fa-lock"></i><span>User Access</span></a>
			<ul class="acc-menu">
				<li><a href="addcustomer.php">Add New User</a></li>
				<li><a href="customerlist.php">Search User</a></li>
			</ul>
		</li>
		<li><a href="index.php"><i class="fa fa-power-off"></i><span>Log Out</span></a></li>

		<li class="nav-separator">Information</li>
		<li><a data-toggle="modal" href="#myModal2"><i class="fa fa-code"></i><span>System Version</span></a></li>
		<li><a data-toggle="modal" href="#myModal"><i class="fa fa-info-circle"></i><span>Disclaimer</span></a></li>

	</ul>
</nav>
    </div>
</div>
                    </div>
                </div>
                <div class="static-content-wrapper">
                <div class="static-content">
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h2 class="modal-title">Disclaimer</h2>
							</div>
							<div class="modal-body">
								<h2>Site Content Disclaimer</h2>
								<p>TNBR provides the Web site as a service to the intranet and Web site owners. <p>
								<p>TNBR is not responsible for, and expressly disclaims all liability for, damages of any kind arising out of use, reference to, or reliance on any information contained within the site. While the information contained within the site is periodically updated, no guarantee is given that the information provided in this Web site is correct, complete, and up-to-date.<p>
								<p>Although the TNBR Web site may include links providing direct access to other Internet resources, including Web sites, TNBR is not responsible for the accuracy or content of information contained in these sites.
								<p>Links from TNBR to third-party sites do not constitute an endorsement by TNBR of the parties or their products and services. The appearance on the Web site of advertisements and product or service information does not constitute an endorsement by TNBR, and TNBR has not investigated the claims made by any advertiser. Product information is based solely on material received from suppliers.</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
				<!-- Modal -->
				<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h2 class="modal-title">System Version</h2>
							</div>
							<div class="modal-body">
								<h2>Version 0.1b</h2>
								<img src="assets/img/browser.png" class="img-responsive" height="550" width="350">
								<p>Develop Using Bootstrap 3.0. Some compatibility issues may occur with Internet Explorer version 9 and below.<p>
								<p>Best viewed in 1366x768 resolution.<p>
								<p>ICT | MK | All Rights Reserved 2016</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
