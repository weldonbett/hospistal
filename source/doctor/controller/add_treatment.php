<?php
session_start();
include('../../admin/model/database.php');
	foreach($_POST as $key=>$value){
		$$key = $value;
	}
	$doctor_id = $_SESSION['doctor_id'];
	
	$date = Date('d-M-Y');
	$time = Date('H:s');
	$insert = mysql_query("INSERT INTO hos_treatment VALUES ('','$patient_id','$doctor_id','$date','$time','$bp','$cr','$rr','$temp','$weight','$complaint','$medication','$quantity','$remarks','$nextvisit')");
	
	if($insert){
        UpdateDrugs($medication,$quantity);
		echo "true";
	}else{
		echo "false";
	}

function UpdateDrugs($med,$qntty){
    $sql = mysql_query("SELECT * FROM hos_drugs WHERE name='$med'") or trigger_error(mysql_error());
    $res = mysql_fetch_array($sql);

    $final = $res['quantity'] - $qntty;

    $updt = mysql_query("UPDATE hos_drugs SET quantity='$final' WHERE name='$med'");
}
?>