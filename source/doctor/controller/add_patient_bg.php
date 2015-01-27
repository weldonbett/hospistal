<?php	
include('../../admin/model/database.php');
	foreach($_POST as $key=>$value){
		$$key = $value;
	}
	
	$dob = $date."-".$month."-".$year;
	$reg_date = Date('d-m-Y');
		
		$query = mysql_query("INSERT INTO hos_patient VALUES ('','$fname','$mname','$lname','$gender','$dob','$address','$email','$phone','$nationality','$reg_date','$password')") or die(mysql_error());
		if($query){
			echo "success";
		}else{
			echo "fail";
		}
?>