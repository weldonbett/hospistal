<?php
session_start();
include("../admin/model/database.php");
include('controller/message_functions.php');

$func = new Messages();
$doc_id = $_SESSION['doctor_id'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>HOSPICE.::.Admin</title>
<link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="../bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../JQuery/jquery.js"></script>
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
        	<ul class="nav navbar-nav">
            	<li><a href="opt.php">Out-Patient</a></li>
                <li><a href="patients.php">Patients</a></li>
                <li class="active"><a href="news.php">News&amp;Events</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li><a href="messages.php">Message <span class="badge"><?php $func->Count_Received_Messages($doc_id,1); ?></span></a></li>
                <li><a href="help.php">Help</a></li>
            	<li><a href="controller/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</div>

<br><br>
<div class="well"><center style="color:#069;font-size:14px"><strong>+Meru Hospice NEWS</strong></center></div>
<div class="container" style="width:50%;">
    <div id="waiting" style="display:none;"><center><img src="../images/gallery-dark-loading.gif"></center></div>
	<div id="news">
    		<span id="loading" style="display:none;"><center><img src="../images/gallery-dark-loading.gif"> Loading News...</center></span>
    </div>  
</div>
<script>
		$(document).ready(function(e) {
			$("#loading").slideDown();
						$.ajax({
								type: 'GET',
								url: "controller/load_news.php",
								data: $("#nws").serialize(),
								success: function(res){
										$("#loading").slideUp();
										$("#news").html("");
										$("#news").html(res)
									}
							})
			});
</script>
<body>
</body>
</html>