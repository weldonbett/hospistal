<?php
session_start();
include('../admin/model/database.php');

$val = NULL;

if(isset($_POST['add'])){
    foreach($_POST as $key=>$value){
        $$key = $value;
    }

    $insert = mysql_query("INSERT INTO hos_drugs VALUES ('','$name','$quantity')")or die(mysql_error());
    if($insert){
        header("Location:drugs.php?val=".MD5("success"));
    }else{
        header("Location:drugs.php?val=".MD5("failed"));
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
                echo "<div class='alert alert-success'>New drug added.</div>";
            }else if($valid == MD5("failed")){
                echo "<div class='alert alert-danger'><strong>Oops!!</strong> An error occured while adding drug. try again.</div>";
            }
        }
    ?>
    <form action="<?php $PHP_SELF ?>" method="POST">
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Drug name</label>
            <div class="col-sm-9">
                <input class="form-control" id="name" name="name" placeholder="Drug Name" type="text">
            </div>
        </div>
        <div class="form-group">
            <label for="quantity" class="col-sm-3 control-label">Quantity</label>
            <div class="col-sm-9">
                <input class="form-control" id="quantity" name="quantity" placeholder="Quantity" type="text">
            </div>
        </div>
        <div class="col-sm-3">

        </div>
        <div class="col-sm-9">
            <p>
                <button class="btn btn-primary btn-sm" name="add">Add Drug</button>
                <input type="reset" class="btn btn-warning btn-sm" name="reset" value="Reset"/>
            </p>
    </div>
    </form>
    <?php
        $sql = mysql_query("SELECT * FROM hos_drugs") or trigger_error(mysql_error());
        $res = mysql_fetch_array($sql);

        if($res > 0){
    ?>
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>No.</th><th>Drug Name</th><th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
               do{
                    ?>
                        <tr>
                            <td><?php echo $index; ?></td><td><?php echo $res['name']; ?></td><td><?php echo $res['quantity']; ?></td>
                            <td><button class="btn btn-success btn-xs" onclick=Next(<?php echo $res['id']; ?>)>Update</button></td>
                            <td><button class="btn btn-warning btn-xs" onclick=NextDel(<?php echo $res['id']; ?>)>Delete</button></td>
                        </tr>
                    <?php
                   $index++;
               }while($res = mysql_fetch_array($sql));
            ?>
        </tbody>
    </table>
    <?php
        }else{
            echo "<fieldset><div class='alert alert-warning'><i class='glyphicon glyphicon-exclamation-sign'></i> There is currently no record of any drug in the database.</div></fieldset>";
        }
    ?>
</div>
<script>
    function Next(param){
        window.location = "edit_drug.php?id="+param;
    }
    function NextDel(param){
        var con = confirm("Delete this drug?");
        if(con == true){
        window.location = "edit_drug.php?id="+param;
        }
    }
</script>
</body>
</html>