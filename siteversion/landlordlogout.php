<?php
session_start();
unset($_SESSION['landlord_session']);
header("location:../index.php");
?>