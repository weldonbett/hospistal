<?php
session_start();
include('../model/database.php');

	$id = $_GET['id'];

	$query = mysql_query("DELETE FROM hos_news WHERE id='$id'");

	if($query){
		header("Location:../news.php?del=1");
	}else{
		header("Location:../news.php?del=0");
	}
?>