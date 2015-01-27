<script>
	function getHistory(param){
		window.location = "patients.php?pat=history&&pid="+param;
	}
	function getTreatment(param){
		window.location = "patients.php?pat=treatment&&pid="+param;
	}
	function DeleteItem(param){
		var del = confirm("Are you sure you want to delete this Patient record?");
		if(del == true){
			$.ajax({
					type: 'POST',
					url : "../admin/model/delete_pat.php?id="+param,
					data: param,
					success: function(response){
						window.location = "patients.php?pat=patients&&del=succ";
					}
				});
		}else if(del == false){
		}
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
            <a class="navbar-brand" href="doctors.php">Patients</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="patients.php?pat=patients">View Patients</a></li>
              <li><a href="patients.php?pat=add">Add a Patient</a></li>
              <li><a href="patients.php?pat=drug">Drugs</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>

<div class="container">
	<?php
		$msg = @$_GET['del'];
		
		echo $msg?"<div class='alert alert-success'><strong>Done! </strong>Patient record succesfuly deleted.</div>":NULL;
	?>
	<p><fieldset style="width:200px;">
    		<form action="" id="srch" method="post">
    		<input type="text" id="search" name="search" class="form-control" placeholder="Search Patient">
            </form>
        </fieldset></p>
     <div id="records">
	<center><table class="table table-striped">
        	<thead><tr style="color:#000;"><th>Patient Name</th><th>Date of Birth</th><th>Gender</th><th>Contact Number</th><th>Address</th></tr></thead>
            <tbody>
            	<?php
				$sql = mysql_query("SELECT * FROM hos_patient") or die(mysql_error());
				$docs = mysql_fetch_array($sql);
				
				if($docs > 0){
				do{
					echo "<tr><td>$docs[first_name] $docs[middle_name] $docs[last_name]</td><td>$docs[date_of_birth]</td><td>$docs[gender]</td><td>$docs[phone]</td><td>$docs[address]</td><td><button class='btn btn-xs btn-info' onClick='getHistory($docs[id])'>View Medical History</button></td><td><button class='btn btn-xs btn-success' onClick=getTreatment($docs[id])>treatment</button></td><td><button class='btn btn-xs btn-danger' onClick=DeleteItem($docs[id])>Delete</button></td>
					<td><button class='btn btn-warning btn-xs' onclick=PrintHist($docs[id])>Print History</button></td></tr>";
				}
				while($docs = mysql_fetch_array($sql));
				}else{
					echo "<tr><td align='center' colspan='6'>NO RECORDS FOUND</td></tr>";
				}
			?>
            </tbody>
        </table></center>
    </div>
</div>
<script>
	$(document).ready(function(e) {
		$("#search").keyup(function(){
				$.ajax({
				type: 'POST',
				url: '../admin/controller/search_patient.php',
				data: $("#srch").serialize(),
				success: function(response){
						$("#records").html(response);
					}
			})
			})
    });
    function PrintHist(param){
        window.location = "print_history.php?pid="+param;
    }
</script>