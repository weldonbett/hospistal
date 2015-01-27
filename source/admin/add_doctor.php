 <script>
	$(document).ready(function(e) {
        $("#adddoctor").submit(function(e){
			$("#waiting").slideDown(500);
			$.ajax({
					type : 'POST',
					url: "controller/add_doctor.php",
					data:$("#adddoctor").serialize(),
					error: function(res){
						$(".alert").html("Error "+res);
					},
					success: function(response){
						$("#waiting").slideUp(500);
						if(response == "true"){
							$(".alert").slideDown(500);
							$(".alert").attr("class","alert alert-success");
							$(".alert").html("<strong>Done! </strong>New Doctor successfully Registered.");
						}else{
							$(".alert").slideDown(500);
							$(".alert").attr("class","alert alert-danger");
							$(".alert").html("<strong>Ooops! </strong> Failed to register the new Doctor, please try again."+response);
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
            <a class="navbar-brand" href="doctors.php">Doctors</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="doctors.php?doc=available">List of Available Doctors</a></li>
              <li><a href="doctors.php?doc=alldoctors">List of all Doctors</a></li>
              <li class="active"><a href="doctors.php?doc=adddoctor">Add a Doctor</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>

<div class="container">
	<form id="adddoctor" action="" method="post">
    <div id="waiting" style="display:none;"><center><img src="../images/gallery-dark-loading.gif"></center></div>
    <div class="alert"></div>
	<table class="table table-bordered">
    	<tr><td>Title</td><td><input type="text" class="form-control" required name="title" id="title"></td></tr>
        <tr><td>First Name</td><td><input type="text" name="fname" class="form-control" required id="fname"></td>
        	<td>Middle Name</td><td><input type="text" name="mname" id="mname" class="form-control" required></td>
            <td>Last Name</td><td><input type="text" name="lname" id="lname" class="form-control" required></td></tr>
        <tr><td>Specialization</td><td><input type="text" name="specialization" id="specialization" class="form-control" required></td></tr>
        <tr><td>Address</td><td><input type="text" name="address" id="address" class="form-control" required></td>
        	<td>Contact Number</td><td><input type="text" name="phone" id="phone" class="form-control" required></td>
            <td>Email Address</td><td><input type="text" name="email" id="email" class="form-control" required></td></tr>
        <tr><td>Hospital</td>
        			<td>
        					<select class="form-control" name="hospital" id="hospital">
                            	<option value=""> -- Select Hospital --</option>
                                <?php
									$query = mysql_query("SELECT * FROM hos_hospital");
									
									while($hos = mysql_fetch_array($query)){
										echo "<option value='{$hos['id']}'>{$hos['name']}</option>";
									}
									
								?>
                            </select>
        			</td>
             <td>Duty</td>
             			<td>
                        	<select class="form-control" name="duty" id="duty">
                            	<option value=""> -- Select Duty --</option>
                                <option value="On-Duty">On-Duty</option>
                                <option value="On-Call">On-Call</option>
                                <option value="On-Leave">On-Leave</option>
                            </select>
                        </td></tr>
               <tr><td>Password</td><td><input type="text" class="form-control" name="password" id="password" required></td></tr>
               <tr><td>Confirm Password</td><td><input type="text" class="form-control" name="password2" id="password2" required></td></tr>
    </table>
    <button name="add" class="btn btn-sm btn-primary" id="add">Add Doctor</button>
    <input type="reset" class="btn btn-sm btn-info" name="reset" value="Reset">
    </form>
</div>