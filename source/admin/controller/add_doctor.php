<?php
include('../model/database.php');

foreach($_POST as $key=>$value){
	$$key = $value;
}

$pass = MD5($password);

$insert_query = mysql_query("INSERT INTO hos_doctor VALUES ('','$fname','$mname','$lname','$title','$specialization','$duty','$phone','$address','$email','$hospital','$pass')") or die(mysql_error());

if($insert_query){
	echo "true";
}else{
	echo "false";
}
?>