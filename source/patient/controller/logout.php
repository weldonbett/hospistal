<?php
session_start();
session_destroy();

unset($_SESSION['patient_id']);

header("Location:../../index.php");
?>