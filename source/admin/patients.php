<?php
session_start();
include('model/database.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>HOSPICE.::.Patients</title>
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
            	<li><a href="doctors.php">Doctors</a></li>
                <li class="active"><a href="patients.php">Patients</a></li>
                <li><a href="news.php">News&amp;Events</a></li>
                <li><a href="drugs.php">Drugs</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li><a href="help.php">Help</a></li>
            	<li><a href="controller/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</div>

<br><br>
		<?php
		$pat = @$_GET['pat'];
			switch($pat){
				case 'patients':
							include('controller/view_all_patients.php');
					break;
				case 'adddoctor':
							include('add_doctor.php');
						break;
				case 'history':
							include('medical_history.php');
						break;
				default:
							include('controller/view_all_patients.php');
					break;
			}
		?>

<body>
</body>
</html>