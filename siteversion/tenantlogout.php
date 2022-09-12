<?php
session_start();
unset($_SESSION['tenant_session']);
header("location:../index.php");
?>