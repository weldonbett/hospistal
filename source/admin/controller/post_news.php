<?php
session_start();
include("../model/database.php");
	foreach($_POST as $key=>$value){
		$$key = $value;
	}
	
	$date = Date("d-m-Y");
	
	$insert = mysql_query("INSERT INTO hos_news VALUES ('','$date','$title','$news')");
	
	if($insert){
		echo "true";
	}else{
		echo "false";
	}
?>