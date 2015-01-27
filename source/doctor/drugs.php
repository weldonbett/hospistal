<?php
$doc = $_SESSION['doctor_id'];
?>
<div class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="doctors.php">Patients</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="patients.php?pat=patients">View Patients</a></li>
                <li><a href="patients.php?pat=add">Add a Patient</a></li>
                <li><a href="patients.php?pat=drug">Drugs</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container">
    <div class="col-sm-6">
        <div class="well well-sm">
            <h5><strong>Available Drugs</strong></h5>
        </div>
        <table class="table table-condensed">
            <tr>
                <th>Drug name</th><th>Available Quantity</th>

            </tr>
                <?php
                    $sql = mysql_query("SELECT * FROM hos_drugs")or die(mysql_error());
                    while($res = mysql_fetch_array($sql)){
                        echo "<tr><td>$res[name]</td><td>$res[quantity]</td></tr>";
                    }
                ?>
        </table>
    </div>
    <div class="col-sm-6">
        <div class="well well-sm">
            <h5><strong>Medication to Patients</strong></h5>
        </div>
        <table class="table table-condensed">
            <tr>
                <th>Patient Name</th><th>Medication</th><th>Quantity</th>

            </tr>
                <?php
                    $sql2 = mysql_query("SELECT * FROM hos_treatment WHERE doctor_id='$doc'")or die(mysql_error());
                    while($res2 = mysql_fetch_array($sql2)){
                        $nm = mysql_fetch_array(mysql_query("SELECT * FROM hos_patient WHERE id='$res2[patient_id]'")) or die(mysql_error());
                        echo "<tr><td>$nm[first_name] $nm[middle_name] $nm[last_name]</td><td>$res2[medication]</td><td>$res2[quantity]</td></tr>";
                    }
                ?>
        </table>
    </div>
</div>