<?php
	$did = $_GET['id'];
	
	$sql = mysql_query("SELECT * FROM hos_doctor WHERE id='$did'");
	$fetch = mysql_fetch_array($sql);
?>
 <script>
 </script>
 <div class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="doctors.php"><strong style="color:#06F;">Dr. <?php echo $fetch['first_name']." ".$fetch['middle_name']." ".$fetch['last_name']; ?></strong></a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            	<li><a href="doctors.php?doc=doc_details&&id=<?php echo $did; ?>">View Doctor's Profile</a></li>
                <li class="active"><a href="doctors.php?doc=doc_patients&&id=<?php echo $did; ?>">View Patients</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>

<div class="container">
	<center>
    	<table class="table table-bordered" style="width:600px;">
        	<tr><th>Patient Name</th><th>Patient Contact#</th><th>Treatment Date</th></tr>
            <?php
				$query = mysql_query("SELECT * FROM hos_patient CROSS JOIN hos_treatment WHERE hos_treatment.doctor_id='$did'") or die(mysql_error());
				$fetchs = mysql_fetch_array($query);
				
				if($fetchs > 0){
					echo "<tr><td>$fetchs[first_name] $fetchs[middle_name] $fetchs[last_name]</td><td>$fetchs[phone]</td><td>$fetchs[date]</td></tr>";
				}else{
					echo "<tr><td colspan='3'>There are currently no records of patients attended to by Dr.";
					echo $fetch['first_name']." ".$fetch['middle_name']." ".$fetch['last_name']."</td></tr>";
				}
			?>
        </table>
    </center>
</div>