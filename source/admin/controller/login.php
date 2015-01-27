<?php
$email = $_POST['email'];
$password = $_POST['password'];
include('../model/database.php');

	$query = mysql_query("SELECT * FROM hos_admin WHERE email='$email' AND password='$password'") or die(mysql_error());
	$res = mysql_fetch_array($query);
	
	if($res){
		echo 1;
	}else{
		echo 0;
	}
?>