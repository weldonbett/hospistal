<script>
	$(document).ready(function(e) {
		$("#password").keyup(function(){
				if($("#password").val().length < 6){
					$("#pass").html("<img src='../images/Error.png'>");
					return false;
				}else{
					$("#pass").html("<img src='../images/Ok.png'>");
					return true;
				}
		})
		$("#password2").keyup(function(){
			if($("#password2").val() != $("#password").val()){
				$("#pass2").html("<img src='../images/Error.png'>");
					return false;
			}else{
					$("#pass2").html("<img src='../images/Ok.png'>");
					return true;
				}
		})
        $("#reg").submit(function(e){
			e.preventDefault();
			$(".waiting").slideDown(500);
			$.ajax({
					type : 'POST',
					url: "controller/add_patient_bg.php",
					data:$("#reg").serialize(),
					error: function(res){
						$(".alert").html("Error "+res);
					},
					success: function(response){
						$(".waiting").slideUp(500);
						if(response == "success"){
							$(".alert").slideDown(500);
							$(".alert").attr("class","alert alert-success");
							$(".alert").html("<strong>Done! </strong>New Patient successfully Registered.");
						}else{
							$(".alert").slideDown(500);
							$(".alert").attr("class","alert alert-danger");
							$(".alert").html("<strong>Oops! </strong> Failed to register the patient, please try again."+response);
						}
					}
				});
				return false;
		})
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
              <li><a href="patients.php?pat=patients">View Patients</a></li>
              <li class="active"><a href="">Add a Patient</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>

<div class="container">
	<fieldset>
    <div class="waiting" style="display:none;"><center><img src="../images/gallery-dark-loading.gif"></center></div>
    <div class="alert" style="display:none;"></div>
    	<form id="reg" action="" method="post" enctype="multipart/form-data">
    	<table class="table table-bordered">
        	<tr>
            	<td>Patient #</td><td><input type="text" name="patient_number" id="patient_number" class="form-control" readonly></td>
                <td>Date</td><td><input type="text" name="curr_date" id="curr_date" class="form-control" readonly value="<?php echo Date('d-M-Y'); ?>"></td>
            </tr>
        	<tr>
            	<td>First Name</td><td><input type="text" name="fname" id="fname" class="form-control" required></td>
                <td>Middle Name</td><td><input type="text" name="mname" id="mname" class="form-control" required></td>
                <td>Last Name</td><td><input type="text" name="lname" id="lname" class="form-control" required></td>
            </tr>
            <tr>
            	<td>Date of Birth</td>
                		<td colspan="3">
                        	<select name="date" id="date" style="width:70px; float:left;" class="form-control" required>
                            	<?php
									for($dt =1;$dt<=31;$dt++){
										echo "<option value='$dt'>$dt</option>";
									}
								?>
                            </select>
                            <select name="month" id="month" style="width:70px; float:left;" class="form-control" required>
                            	<?php
									for($dt =1;$dt<=12;$dt++){
										echo "<option value='$dt'>$dt</option>";
									}
								?>
                            </select>
                            <select name="year" id="year" style="width:80px;" class="form-control" required>
                            	<?php
									for($dt =1940;$dt<=2014;$dt++){
										echo "<option value='$dt'>$dt</option>";
									}
								?>
                            </select>
                        </td>
                        <td>Sex</td>
                        <td>
                        	<select name="gender" id="gender" style="width:100px;" class="form-control" required>
                            	<option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </td>
            </tr>
            <tr>
            	<td>Address</td><td><input type="text" name="address" id="address" class="form-control" required></td>
                <td>Contact Number</td><td><input type="text" name="phone" id="phone" class="form-control" required></td>
                <td>Email Address</td><td><input type="text" name="email" id="email" class="form-control" required></td>
            </tr>
            <tr>
            	<td>Nationality</td><td><input type="text" name="nationality" id="nationality" class="form-control" required></td>
            </tr>
        </table>
        <p>
        	<h3>Login Information</h3>
            <table>
            	<tr><td>Password</td><td><input type="password" name="password" id="password" class="form-control" required></td><td><span id="pass"></span></td></tr>
                <tr><td>Confirm Password</td><td><input type="password" name="password2" id="password2" class="form-control" required></td><td><span id="pass2"></span></td></tr>
            </table>
        </p>
        	<button name="register" id="register" class="btn btn-primary">Register Patient</button>
            <input type="reset" name="reset" class="btn btn-warning" value="Reset">
        </form>
    </fieldset>
</div>