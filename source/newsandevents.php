<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>HOSPICE</title>
<link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="JQuery/jquery.js"></script>
<script>
	$(document).ready(function() {
		$(".alert").hide();
        $("#ff").submit(function(e){
			e.preventDefault();
			$(".verifying").slideDown(500);
			//alert("clicked");
			$.ajax({
					type :'POST',
					url: "doctor/controller/login.php",
					data:$("#ff").serialize(),
					error: function(){
						$(".alert").slideDown();
						$(".alert").attr("class","alert alert-danger");
						$(".alert").html("<strong>Oops! </strong>There was somethin wrong with the servers, please try again later.");
						
					},
					success: function(res){
						$(".verifying").slideUp(100);
						if(res == 0){
							$(".alert").slideDown();
							$(".alert").attr("class","alert alert-danger");
							$(".alert").html("<strong>Oops! </strong>Wrong email address or password.");
						}else if(res == 1){
							window.location = "doctor/home.php";
						}
					}
				});
		})
    });
</script>
<style type="text/css">
.footer {
	background-color: #666;
	padding-top: 5px;
	padding-right: 10px;
	padding-bottom: 20px;
	padding-left: 10px;
	font-style: italic;
	color: #FFF;
	font-family: "Comic Sans MS", cursive;
	text-align: center;
}
#footer p {
	text-align: center;
}
</style>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
    	<div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">+Meru Hospice Palliative Care Patients Records System</a>
        </div>
        <div class="navbar-collapse collapse">
        	<ul class="nav navbar-nav navbar-right">
            	<li><a href="opt.php">News/Events</a></li>
            	<li><a href="doctors.php">Contacts</a></li>
            </ul>
        </div>
    </div>
</div>

<br><br>
<div class="well"><center style="color:#069;font-size:14px">
  <p>
  <div class="homelinks"><a href="home.html">Home</a> | <a href="about.html">About us</a> | <a href="newsandevents.php">News and Events</a> |<a href="faq.html"> FAQs</a> | <a href="contact.html">Contact us</a> | <a href="help.php">Help</a></div>
  <strong>+Meru Hospice News and Events</strong>
</center></div>
<div class="container">
	<div class="row">
    	<div class="col-md-8">
        	<left><img src="images/front-mery hospice.png"></left>
            <br><br> 
        	<p>Meru hospice seeks to offer Palliative Care to terminally ill Cancer & AIDs persons in Meru and its environs by providing physical, psychological and
emotional support through the involvement of the patient, family and care
giver(s) inorder to provide quality of life toward and/or during end of life.</p>
        <p>The hospice logo has three clasped arms: Perhaps they bring to mind the
inseparability of body, mind and spirit. The interdependence of the Therapeutic
triad: Patient, Family and Care giver! Three arms linked highlighting great
strength as found in working together.</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    	</div>
	</div>
	
</div><div class="footer" id="footer">
  <p>Commited to reduce pain and suffering of the terminally ill.</p>
2014 &copy; Meru Hospice.</div>
</body>
</html>