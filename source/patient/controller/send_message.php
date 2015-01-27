<?php
session_start();
include('../../admin/model/database.php');

	foreach($_POST as $key=>$value){
		$$key = $value;
	}

    $rec_sql = mysql_query("SELECT * FROM hos_doctor WHERE email='$to'") or trigger_error(mysql_error());
    $rec = mysql_fetch_array($rec_sql);

    if($rec > 0){
	$sender = $_SESSION['patient_id'];
	$date = Date("d/m/Y");
	$insert = mysql_query("INSERT INTO hos_message VALUES ('','$rec[id]','$sender','$title','$message','$date','2','0')");
	
	if($insert){
		echo "true";
	}else{
		echo "false";
	}
    }else{
        echo "<div class='alert alert-warning alert-dismissable'>Message was unable to be delivered to the Recipient specified. Please check the email address for misspelling.</div>";
    }
?>