<?php
error_reporting(E_ERROR);
setcookie("cartitems", "", time()+30*24*60*-60);
setcookie("homenotification", "", time()+30*24*60*-60);
header("location:siteversion/viewpropertybuyerpurchase.php");
?>