<?php
session_start();
session_destroy();

unset($_SESSION['doctor_id']);

header("Location:../../index.php");
?>