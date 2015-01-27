<?php
	include('database.php');
	
	$pid = $_GET['id'];
	$del = mysql_query("DELETE FROM hos_patient WHERE id='$pid'");
	
	if($del){
		echo "true";
	}else{
		echo "false";
	}
?>