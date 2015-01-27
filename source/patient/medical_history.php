<?php
session_start();
include('../admin/model/database.php');
include('../doctor/controller/message_functions.php');

$func = new Messages();
$pid = $_SESSION['patient_id'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>HOSPICE.::.Patient</title>
<link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="../bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
 <link href="../JQuery/themes/base/jquery.ui.accordion.css" rel="stylesheet" type="text/css"/>
 <script type="text/javascript" src="../JQuery/jquery.js"></script>
 <script type="text/javascript" src="../JQuery/ui/jquery.ui.core.js"></script>
 <script type="text/javascript" src="../JQuery/ui/jquery.ui.widget.js"></script>
 <script type="text/javascript" src="../JQuery/ui/jquery.ui.accordion.js"></script>
 <script>
 	$(document).ready(function(e) {
        $("#accordion").accordion();
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
          <a class="navbar-brand" href="#">+Meru Hospice Palliative Care patient Records System</a>
        </div>
        <div class="navbar-collapse collapse">
        	<ul class="nav navbar-nav">
            	<li><a href="medical_history.php">Medical History</a></li>
                <li><a href="news.php">News&amp;Events</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li><a href="messages.php">Message <span class="badge"><?php $func->Count_Received_Messages($pid,2); ?></span></a></li>
                <li><a href="help.php">Help</a></li>
            	<li><a href="controller/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</div>

<br><br>
<div class="well"><center style="color:#069;font-size:14px"><strong>Meru Hospice Patient</strong></center></div>
<div class="container">
        	<div id="accordion">
    	<?php
			$query = mysql_query("SELECT * FROM hos_treatment WHERE patient_id='$pid' ORDER BY id DESC");
			$get = mysql_fetch_array($query);
			
			if($get > 0){
			do{
				$doc = mysql_fetch_array(mysql_query("SELECT * FROM hos_doctor WHERE id='$get[doctor_id]'"));
				echo "<h4 style='color:#0000FF;'>Record #$get[id] for Date: $get[date]</h4>";
				echo "<div style='height:400px;'>
						<table class='table table-hover' style='width:500px;'>
							<tr>
								<td>Attending Doctor</td><td>$doc[first_name] $doc[middle_name] $doc[last_name]</td>
							</tr>
							<tr>
								<td>BP</td><td>$get[bp]</td><td>CR</td><td>$get[cr] <small>PPM</small></td><td>RR</td><td>$get[rr] <small>BPM</small></td>
							</tr>
							<tr>
								<td>Temperature</td><td>$get[temp]</td><td>Weight</td><td>$get[weight] <small>kg</small></td>
							</tr>
						</table>
						<label>Complaint</label><br>
						$get[complaint]<br>
						<label>Medication</label><br>
						$get[medication]<br>
						<label>Remarks</label><br>
						$get[remarks]
					</div>";
			}while($get = mysql_fetch_array($query));
			}else{
				echo "This is currently no medical history for this patient!";
			}
		?>
    </div>        
</div>

<body>
</body>
</html>