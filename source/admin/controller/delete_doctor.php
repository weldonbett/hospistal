<?php
include('../model/database.php');
	$doc_id = $_GET['doc_id'];
	
	$query = mysql_query("DELETE FROM hos_doctor WHERE id='$doc_id'");
	
	header("Location:../doctors.php?doc=alldoctors&del=succ");
?>