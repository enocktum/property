<?php
if(isset($_POST['propertyincre']))
{
	$propertyincre=$_POST['propertyincre'];
	if(isset($_COOKIE["cartitems"]))
	{
		//add to cookie
		$cookiearray=explode(",",$_COOKIE['cartitems']);
		$cookiearray=explode(",",$_COOKIE['cartitems']);
        $key= array_search($propertyincre, $cookiearray);
        if($key !== false)
        {
            header("location:index.php");
			setcookie("homenotification", "existing", time()+30*24*60*60);
        }
		else
		{
			$newcookiestring=implode(",",$cookiearray);
			$_COOKIE['cartitems']=$newcookiestring.",".$propertyincre;
			$newcookiestring=$_COOKIE['cartitems'];
			setcookie("homenotification", "addition", time()+30*24*60*60);
        	setcookie("cartitems", $newcookiestring, time()+30*24*60*60);
       		header("location:index.php");
		}
        
		
	}
	else
	{
		//set cookie for first time
		setcookie("cartitems", $propertyincre, time()+30*24*60*60);
		setcookie("homenotification", "firsttime", time()+30*24*60*60);
		header("location:index.php");
		echo "<script>location='index.php'</script>";
	}
}
else
{
	header("location:index.php");
}
#setcookie("cartitems", $propertyincre, time()+30*24*60*-60);
?>