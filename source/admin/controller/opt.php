 <script>
	function getHistory(param){
		window.location = "patients.php?pat=history&&pid="+param;
	}
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
            <a class="navbar-brand" href="opt.php">Out-Patient</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="opt.php?pat=patients">View Patients</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>

<div class="container">
	<p><fieldset style="width:200px;">
    		<form id="srch" action="" method="POST">
    		<input type="text" name="search" id="search" class="form-control" placeholder="Search Patient">
            </form>
        </fieldset></p>
     <div id="records">
	<center><table class="table table-bordered">
        	<tr style="color:#63C;"><th>Patient Name</th><th>Date of Birth</th><th>Gender</th><th>Contact Number</th><th>Address</th></tr>
            	<?php
				$sql = mysql_query("SELECT * FROM hos_patient") or die(mysql_error());
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
    </div>
</div>
<script>
	$(document).ready(function(e) {
		$("#search").keyup(function(){
				$.ajax({
				type: 'POST',
				url: 'controller/search_patient.php',
				data: $("#srch").serialize(),
				success: function(response){
						$("#records").html(response);
					}
			})
			})
    });
</script>