<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>HOSPICE</title>
<link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="../bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../JQuery/jquery.js"></script>
<script>
	$(document).ready(function() {
		$(".alert").hide();
        $("#ff").submit(function(e){
			e.preventDefault();
			$(".verifying").slideDown(500);
			//alert("clicked");
			$.ajax({
					type :'POST',
					url: "controller/login.php",
					data:$("#ff").serialize(),
					success: function(res){
						$(".verifying").slideUp(100);
						if(res == 0){
							$(".alert").slideDown();
							$(".alert").attr("class","alert alert-danger");
							$(".alert").html("<strong>Oops! </strong>Wrong email address or password."+res);
						}else if(res == 1){
							window.location = "home.php";
						}
					}
				});
		})
    });
</script>
</head>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
    	<div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">+Meru Hospice Palliative Care Patient Records System</a>
        </div>
        
        <div class="navbar-collapse collapse">
        	<ul class="nav navbar-nav navbar-right">
            	<li><a href="../home.html">Go back home</a></li>
            	
            </ul>
        </div>
    </div>
</div>

<br><br>
<div class="well"><center style="color:#069;font-size:14px"><strong>+Meru Hospice Reducing pain!</strong></center></div>
<div class="container">
	<div class="row">
    	<div class="col-md-8">
        <center><img src="../images/front-mery hospice.png"></center>
            <br><br>
        	<p>Meru hospice seeks to offer Palliative Care to terminally ill Cancer & AIDs persons in Meru and its environs by providing physical, psychological and
emotional support through the involvement of the patient, family and care
giver(s) inorder to provide quality of life toward and/or during end of life.</p>
        <p>The hospice logo has three clasped arms: Perhaps they bring to mind the
inseparability of body, mind and spirit. The interdependence of the Therapeutic
triad: Patient, Family and Care giver! Three arms linked highlighting great
strength as found in working together.</p>
        </div>
        <div class="col-md-4">
        	<div class="panel panel-primary">
            	<div class="panel-heading">
                	<h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">
                <div class="verifying" style="display:none;"><img src="../images/gallery-dark-loading.gif"></div>
                <div class="alert"></div>
                	<p><strong>Please provide your username and password to continue</strong></p>
                	<form action="" id="ff" method="post">
                    	<input type="text" name="email" placeholder="Email Address" id="email" class="form-control" required autofocus />
                        <input type="password" name="password" placeholder="Password" id="password" class="form-control" required /><br>
                        <button name="login" class="btn btn-primary btn-block" id="login">Login</button><br>
                    </form>
                    <span>
                    	<table class="table">
                        	<tr>
                                  <td><a href="../index.php" title="Login as a Doctor">Doctor login</a></td>
                                  <td><a href="../patient/index.php" title="Login as a Patient">Patient login</a></td>
                            </tr>
                        </table>
                    </span>
                    <p><small>No account? Please contact the administrator of the page and ask for an access in the system.</small></p>
                </div>
            </div>
        </div>
    </div>
</div>

<body>



</body>
</html>