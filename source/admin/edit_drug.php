<?php
session_start();
include('../admin/model/database.php');

$val = NULL;

    $id = $_GET['id'];

    $sql = mysql_fetch_array(mysql_query("SELECT * FROM hos_drugs WHERE id='$id'"));

if(isset($_POST['update'])){
    foreach($_POST as $key=>$value){
        $$key = $value;
    }

    $insert = mysql_query("UPDATE hos_drugs SET name='$name',quantity='$quantity' WHERE id='$id')")or die(mysql_error());
    if($insert){
        header("Location:edit_drug.php?val=".MD5("success"));
    }else{
        header("Location:edit_drug.php?val=".MD5("failed"));
    }
}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>HOSPICE.::.Doctor</title>
    <link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
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
            <a class="navbar-brand" href="#">+Meru Hospice Palliative Care Patient Records System</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="opt.php">Out-Patient</a></li>
                <li><a href="doctors.php">Doctors</a></li>
                <li><a href="patients.php">Patients</a></li>
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
<div class="well"><center style="color:#069;font-size:14px"><strong>Meru Hospice Doctor</strong></center></div>
<div class="container"  style="width:50%; margin:0 auto;">
    <?php
    $valid = @$_GET['val'];

    if(strlen($valid) > 0){
        if($valid == MD5("success")){
            echo "<div class='alert alert-success'>Drug updated successfully.</div>";
        }else if($valid == MD5("failed")){
            echo "<div class='alert alert-danger'><strong>Oops!!</strong> An error occured while updating drug. try again.</div>";
        }
    }
    ?>
    <button class="btn btn-warning btn-sm" onclick=Back()><i class="glyphicon glyphicon-backward"></i> Back</button>
    <form action="<?php $PHP_SELF ?>" method="POST">
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Drug name</label>
            <div class="col-sm-9">
                <input class="form-control" id="name" name="name" value="<?php echo $sql['name']; ?>" type="text">
            </div>
        </div>
        <div class="form-group">
            <label for="quantity" class="col-sm-3 control-label">Quantity</label>
            <div class="col-sm-9">
                <input class="form-control" id="quantity" name="quantity" value="<?php echo $sql['quantity']; ?>" type="text">
            </div>
        </div>
        <div class="col-sm-3">

        </div>
        <div class="col-sm-9">
            <p>
                <button class="btn btn-primary btn-sm" name="add">Update</button>
                <input type="reset" class="btn btn-warning btn-sm" name="reset" value="Reset"/>
            </p>
        </div>
    </form>
</div>
    <script>
        function Back(){
            window.location = "drugs.php";
        }
    </script>
</body>
</html>