<?php
session_start();
unset($_SESSION['property_seller_session']);
header("location:../index.php");
?>