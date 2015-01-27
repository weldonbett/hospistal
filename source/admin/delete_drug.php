<?php
/**
 * Created by PhpStorm.
 * User: WHIZZKID
 * Date: 16/03/14
 * Time: 15:09
 */
    $id = $_GET['id'];

    $sql = mysql_query("DELETE FROM hos_drugs WHERE id='$id'");

    if($sql){
        header("Location:drugs.php");
    }
?>