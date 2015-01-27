<?php
session_start();
include("model/database.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>HOSPICE.::.Admin</title>
<link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="../bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../JQuery/jquery.js"></script>
<script>
	$(document).ready(function(e) {
        $("#nws").submit(function(){
			$("#waiting").slideDown();
				$.ajax({
						type: 'POST',
						url: "controller/post_news.php",
						data: $("#nws").serialize(),
						success: function(response){
								$("#waiting").slideUp();
								if(response == "true"){
									$(".alert").attr("class","alert alert-success");
									$(".alert").slideDown();
									$(".alert").html("<strong>Done!</strong> News successfully posted.");
								}else if(response == "false"){
									$(".alert").attr("class","alert alert-danger");
									$(".alert").slideDown();
									$(".alert").html("<strong>Error!</strong> There was a problem posting the news.");
								}
							}
					})
				$.ajax({
						type: 'GET',
						url: "controller/load_news.php",
						data: $("#nws").serialize(),
						success: function(res){
								$("#news").html("");
								$("#news").html(res)
							}
					})
					return false;
			})
    });
	function DeleteNews(param){
		var con = confirm("Are you sure you want to delete this news?");
		if(con == true){
			window.location = "controller/delete.php?id="+param;
		}else{
		}
	}
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
        	<ul class="nav navbar-nav">
            	<li><a href="opt.php">Out-Patient</a></li>
            	<li><a href="doctors.php">Doctors</a></li>
                <li><a href="patients.php">Patients</a></li>
                <li class="active"><a href="news.php">News&amp;Events</a></li>
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
<div class="well"><center style="color:#069;font-size:14px"><strong>+Meru Hospice NEWS</strong></center></div>
<div class="container" style="width:50%;">
	<fieldset>
    	<h3><i class="glyphicon glyphicon-plus"></i>Add News</h3>
        <div class="alert" style="display:none;"></div>
        <form id="nws" action="<?php $PHP_SELF ?>" method="post">
        	<label>News title</label>
            <input type="text" name="title" class="form-control" required>
            <label>News</label>
            <textarea name="news" class="form-control" required></textarea>
            <br><button name="post" id="post" class="btn btn-primary"><i class="glyphicon glyphicon-flash"></i>Post news</button>
            <input type="reset" name="reset" class="btn btn-warning" value="Reset">
        </form>
    </fieldset>
    <div id="waiting" style="display:none;"><center><img src="../images/gallery-dark-loading.gif"></center></div>
	<div id="news">
    <table class="table table-hover">
	<?php
		$sql = mysql_query("SELECT * FROM hos_news ORDER BY id DESC") or die(mysql_error());
		 while($res = mysql_fetch_array($sql)){
			 echo "<tr><td><div class='col-md-8'>
    					<h4><strong>".strtoupper($res['title'])."</strong></h4>
						<p>
							$res[news]
						</p>
    				</div>
    				<div class='col-md-4'>
    					<small>Posted on :$res[date]</small>
    				</div>";
			echo "<div class='col-md-12'>
						<button style='float:right;' class='btn btn-danger btn-xs' onClick=DeleteNews($res[id])>Delete</button>
						<button style='float:right;' class='btn btn-info btn-xs'>Edit</button>
					</div></td></tr>"; 
		 }
	?>    
    </table> 
    </div>  
</div>

<body>
</body>
</html>