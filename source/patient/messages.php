<?php
session_start();
include('../admin/model/database.php');
include('controller/message_functions.php');

$func = new Messages();

$pid = $_SESSION['patient_id'];
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
          <a class="navbar-brand" href="#">+Meru Hospice Palliative Care Patient Records System</a>
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
<div class="well"><center style="color:#069;font-size:14px"><strong>Meru Hospice,be a Friend.</strong></center></div>
<div class="container">
        <div class="row">
        	<div class="col-sm-3">
            	<p><button class="btn btn-success btn-block" id="compose">Compose</button></p>
            	<div class="list-group">
                	<a href="messages.php" class="list-group-item active">Inbox <span style="float:right;" class="badge"><?php $func->Count_Received_Messages($pid,2); ?></span></a>
                    <a href="sent_messages.php" class="list-group-item">Sent <span style="float:right;" class="badge"><?php $func->Count_Sent_Messages($pid,2); ?></span></a>
                </div>
            </div>
            <div class="col-sm-9">
            	<div id="sending" style="display:none;"></div>
            	<div id="compose_message" style="display:none;">
                	<p><fieldset>
                    	<form id="form" action="" method="post">
                    	<label>To</label>
                        	<input type="text" name="to" class="form-control" required>
                        <label>SUBJECT</label>
                        	<input type="text" name="title" class="form-control">
                        <label>MESSAGE</label>
                        	<textarea name="message" class="form-control" cols="40"></textarea>
                            <br><button class="btn btn-primary" id="send" name="send">Send</button>
                            </form>
                    </fieldset></p>
                </div>
            	<div class="panel panel-primary">
                	<div class="panel-heading">
                    	<h3 class="panel-title">Inbox Messages</h3>
                    </div>
                    <div class="panel-body">
                    	<?php $func->Get_Inbox_Messages($pid,2); ?>
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
		$("#form").submit(function(){
			$("#sending").slideDown();
			$("#sending").html("<img src='../images/ajax-loader.gif'>")
				$.ajax({
						type: 'POST',
						url:"controller/send_message.php",
						data: $("#form").serialize(),
						success: function(response){
								$("#sending").html("");
								if(response == "true"){
									$("#sending").html("<div class='alert alert-success alert-dismissable'>Message Sent</div>")
								}else if(response == "false"){
									$("#sending").html("<div class='alert alert-warning alert-dismissable'>Message Not Sent! Retry.</div>")
								}else{
                                    $("#sending").html(response)
                                }
							}
					});
					return false;
			})
    });
</script>
<body>
</body>
</html>