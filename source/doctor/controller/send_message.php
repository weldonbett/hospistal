<?php
session_start();
include('../../admin/model/database.php');

	foreach($_POST as $key=>$value){
		$$key = $value;
	}
	$sender = $_SESSION['doctor_id'];
	$date = Date("d/m/Y");
	$insert = mysql_query("INSERT INTO hos_message VALUES ('','$to','$sender','$title','$message','$date','1','0')");
	
	if($insert){
		echo "true";
	}else{
		echo "false";
	}
?>