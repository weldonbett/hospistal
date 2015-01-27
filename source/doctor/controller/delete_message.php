<?php
/**
 * Created by PhpStorm.
 * User: WHIZZKID
 * Date: 17/03/14
 * Time: 10:56
 */
session_start();
include('../../admin/model/database.php');

    $id = $_GET['id'];

    $del = mysql_query("DELETE FROM hos_message WHERE id='$id'")or die(mysql_error());

    if($del){
        header("Location:../messages.php");
    }
?>