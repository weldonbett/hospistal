<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
include('../../admin/model/database.php');

	$query = mysql_query("SELECT * FROM hos_patient WHERE email='$email' AND password='$password'") or die(mysql_error());
	$res = mysql_fetch_array($query);
	
	if($res){
		$_SESSION['patient_id'] = $res['id'];
		echo 1;
	}else{
		echo 0;
	}
?>