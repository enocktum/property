<?php 
error_reporting(E_ERROR);
include"connection.php";
if(isset($_POST['marketname']))
{
	include"search/marketsearch.php";
}
else if(isset($_POST['generalsearch']))
{
	include"search/generalsearch.php";
}
else
{
	echo "<script>location='index.php'</script>";
}
?>