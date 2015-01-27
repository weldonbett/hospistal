<?php
session_start();
include('../admin/model/database.php');
include('../doctor/controller/message_functions.php');

$func = new Messages();
$doc_id = $_SESSION['doctor_id'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>HOSPICE.::.Patient</title>
<link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="../bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
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
            	<li><a href="medical_history.php">Medical History</a></li>
                <li><a href="news.php">News&amp;Events</a></li>
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
<div class="well"><center style="color:#069;font-size:14px"><strong>Meru Hospice Patient</strong></center></div>
<div class="container">
        	<table width="1200" border="0">
  <tr>
    <td>
    <p>Cancer ribbons are a great way to raise awareness.&nbsp</p>
    <p>Uncommon cancers are sometimes represented by a light purple ribbon: the ribbon used to represent all cancers. In some cases, people will instead use the ribbon for rare diseases: a black and white zebra print.&nbsp</p>
    <p>It's also important to note that in some cases, a cancer is represented by more than one ribbon color, and that this can vary depending on where you live.&nbsp</p>
    <p>Here's a list of cancer ribbons that are used to raise awareness for common cancers.&nbsp</p>
    
    
    &nbsp;</td>
    <td><img src="../images/cancer-ribbonschart.gif" width="500" height="450">&nbsp;</td>
  </tr>
</table>


        
</div>

<body>

</body>
</html>