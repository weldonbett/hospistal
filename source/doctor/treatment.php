<?php
	$pid = $_GET['pid'];
?>
<link href="../JQuery/themes/smoothness/jquery.ui.all.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../JQuery/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="../JQuery/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="../JQuery/ui/jquery.ui.datepicker.js"></script>
<script>
	$(document).ready(function(e) {
        $("#treat").submit(function(){
			$("#waiting").slideDown();
				$.ajax({
						type: 'POST',
						url: "controller/add_treatment.php?pid="+$("#pids").val(),
						data: $("#treat").serialize(),
						success: function(response){
								$("#waiting").slideUp();
								if(response == "true"){
									$(".alert").attr("class","alert alert-success");
									$(".alert").slideDown();
									$(".alert").html("<strong>Done!</strong> Patient treatement adminstered successfully.");
								}else if(response == "false"){
									$(".alert").attr("class","alert alert-danger");
									$(".alert").slideDown();
									$(".alert").html("<strong>Oops!</strong> An error occured while perfming some operations, please try again.");
								}
							}
					})
					return false;
			})
			$("#nextvisit").datepicker();
    });
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
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>

<div class="container">
	<fieldset>
    <div id="waiting" style="display:none;"><center><img src="../images/gallery-dark-loading.gif"></center></div>
    <div class="alert" style="display:none;"></div>
    	<form id="treat" action="" method="POST">
    	<table class="table table-bordered">
        	<tr>
            	<td>Patient #</td><td><input type="text" name="patient_id" id="pids" class="form-control" style="width:100px;" value="<?php echo $pid; ?>" readonly></td>
            </tr>
            <tr>
            	<td>Chief Complaint</td><td><textarea name="complaint" class="form-control" required></textarea></td>
            </tr>
            <tr>
            	<td>BP</td><td><input type="text" name="bp" class="form-control" style="width:100px;" required></td>
                <td>CR</td><td><input type="text" name="cr" class="form-control" style="width:100px;" required></td>
                <td>RR</td><td><input type="text" name="rr" class="form-control" style="width:100px;" required></td>
            </tr>
            <tr>
            	<td>Temp</td><td><input type="text" name="temp" class="form-control" required></td>
                <td>Weight</td><td><input type="text" name="weight" class="form-control" required></td>
            </tr>
            <tr>
            	<td>Medication</td>
                <td colspan="4">
                    <select class="form-control" name="medication" required>
                        <option>-- Select Medication --</option>
                        <?php
                            $sql = mysql_query("SELECT * FROM hos_drugs");
                            while($res = mysql_fetch_array($sql)){
                                echo "<option value='$res[name]'>$res[name]</option>";
                            }
                        ?>
                    </select>
                </td>
                <td>Quantity</td><td><input type="text" name="quantity" class="form-control" required></td>
            </tr>
            <tr>
            	<td>Remarks</td><td colspan="6"><textarea name="remarks" class="form-control" required></textarea></td>
            </tr>
            <tr>
            	<td>Next Visit</td><td><input type="text" id="nextvisit" name="nextvisit" class="form-control" required></td>
            </tr>
        </table>
        <button class="btn btn-primary btn-sm">Register Treatment</button>
        <input type="reset" class="btn btn-sm btn-warning" name="reset" value="Reset">
        </form>
    </fieldset>
</div>