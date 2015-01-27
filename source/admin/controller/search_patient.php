<?php
session_start();
include('../model/database.php');

	foreach($_POST as $key=>$value){
		$$key = $value;
	}
?>
<center><table class="table table-bordered">
        	<tr style="color:#F33;"><th>Patient Name</th><th>Date of Birth</th><th>Gender</th><th>Contact Number</th><th>Address</th></tr>
            	<?php
				$sql = mysql_query("SELECT * FROM hos_patient WHERE first_name LIKE '%$search%' || middle_name LIKE '%$search%' || last_name LIKE '%$search%'") or die(mysql_error());
				$docs = mysql_fetch_array($sql);
				
				if($docs > 0){
				do{
					echo "<tr><td>$docs[first_name] $docs[middle_name] $docs[last_name]</td><td>$docs[date_of_birth]</td><td>$docs[gender]</td><td>$docs[phone]</td><td>$docs[address]</td><td><button class='btn btn-xs btn-info' onClick='getHistory($docs[id])'>View Medical History</button></td></tr>";
				}
				while($docs = mysql_fetch_array($sql));
				}else{
					echo "<tr><td align='center' colspan='6'>NO RECORDS FOUND</td></tr>";
				}
			?>
        </table></center>