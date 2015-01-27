<?php
session_start();
include('../admin/model/database.php');
include('controller/message_functions.php');

$msg_id = $_GET['shwmsg'];

$doc_id = $_SESSION['doctor_id'];
$func = new Messages();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>HOSPICE.::.Doctor</title>
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
          <a class="navbar-brand" href="#">+Meru Hospice Palliative Care Patients Records System</a>
        </div>
        <div class="navbar-collapse collapse">
        	<ul class="nav navbar-nav">
            	<li><a href="opt.php">Out-Patient</a></li>
                <li><a href="patients.php">Patients</a></li>
                <li><a href="news.php">News</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li><a href="messages.php">Message <span class="badge"><?php $func->Count_Received_Messages($doc_id,1) ?></span></a></li>
                <li><a href="help.php">Help</a></li>
            	<li><a href="controller/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</div>

<br><br>
<div class="well"><center style="color:#069;font-size:14px"><strong>Meru Hospice,be a Friend.</strong></center></div>
<div class="container">
        <div class="row">
        	<div class="col-sm-3">
            	<p><button class="btn btn-success btn-block" id="compose">Compose</button></p>
            	<div class="list-group">
                	<a href="messages.php" class="list-group-item active">Inbox <span style="float:right;" class="badge"><?php $func->Count_Received_Messages($doc_id,1) ?></span></a>
                    <a href="sent_messages.php" class="list-group-item">Sent</a>
                </div>
            </div>
            <div class="col-sm-9">
            	<div id="sending" style="display:none;"></div>
            	<div id="compose_message" style="display:none;">
                	<p><fieldset>
                    	<label>To</label>
                        	<input type="text" name="to" class="form-control" required>
                        <label>SUBJECT</label>
                        	<input type="text" name="subject" class="form-control">
                        <label>MESSAGE</label>
                        	<textarea name="message" class="form-control" cols="40"></textarea>
                            <br><button class="btn btn-primary">Send</button>
                    </fieldset></p>
                </div>
            	<div class="panel panel-primary">
                	<div class="panel-heading">
                    	<h3 class="panel-title">Inbox Messages</h3>
                    </div>
                    <div class="panel-body">
                    	<?php
							$func->Mark_As_Read($msg_id);
							
							$sql = mysql_query("SELECT * FROM hos_message WHERE id='$msg_id'");
							$res = mysql_fetch_array($sql);
						?>
                        	<p>SUBJECT : <?php echo $res['title']; ?><span style="float:right;"><small>Sent on : <?php echo $res['date']; ?></small></span></p>
                            <?php echo $res['message']; ?>
                    </div>
                </div>
            </div>
        </div>
</div>

<script type="text/javascript" src="../JQuery/jquery.js"></script>
<script>
	$(document).ready(function(e) {
        $("#compose").click(function(){
				$("#compose_message").slideToggle();
			})
    });
</script>
<body>
</body>
</html>