<?php
session_start();
unset($_SESSION['property_buyer_session']);
header("location:../index.php");
?>