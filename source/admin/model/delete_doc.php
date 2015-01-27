<?php
	include('database.php');
	
	$did = $_GET['id'];
	$del = mysql_query("DELETE FROM hos_doctor WHERE id='$did'");
	
	if($del){
		echo "true";
	}else{
		echo "false";
	}
?>