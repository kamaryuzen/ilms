<?php
   include("webconfig.php");
   //get search term
    $searchTerm = $_GET['term'];
	
    mysql_select_db('tolserviceorder');
    //get matched data from skills table
	$sql="SELECT * FROM erms WHERE job_no LIKE '%".$searchTerm."%' ORDER BY job_no DESC";
	$r = mysql_query($sql,$conn);
    while($row = mysql_fetch_array($r)) {
        $data[] = $row['job_no'];
    }
    
    //return json data
    echo json_encode($data);
   
?>