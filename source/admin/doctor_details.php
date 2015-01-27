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
            	<li class="active"><a href="#">View Doctor's Profile</a></li>
                <li><a href="doctors.php?doc=doc_patients&&id=<?php echo $did; ?>">View Patients</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>

<div class="container">
	<center>
    	<table class="table table-striped" style="width:400px;">
        	<thead><tr><td style="font-weight:bold">Doctor's Name</td><td><?php echo $fetch['first_name']." ".$fetch['middle_name']." ".$fetch['last_name']; ?></td></tr></thead>
            <tbody>
            <tr><td style="font-weight:bold">Doctor's Speciality</td><td><?php echo $fetch['specialization']; ?></td></tr>
            <tr><td style="font-weight:bold">Doctor's Contact #</td><td><?php echo $fetch['phone']; ?></td></tr>
            <tr><td style="font-weight:bold">Doctor's Address</td><td><?php echo $fetch['address']; ?></td></tr>
            <tr><td style="font-weight:bold">Doctor's Duty</td><td><?php echo $fetch['duty']; ?></td></tr>
            </tbody>
        </table>
    </center>
</div>