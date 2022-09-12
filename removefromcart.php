<?php
//check if cart item to remove is sent
setcookie("homenotification", "", time()+30*24*60*-60);
if(isset($_POST['propertyincre']))
{
    //assign the cart item to remove to a variable property incre
	$propertyincre=$_POST['propertyincre'];
    //check if all cartitems cookies are available in the browser or they have been removed
	if(isset($_COOKIE["cartitems"]))
	{
		//add to cookie
		$cookiearray=explode(",",$_COOKIE['cartitems']);
        $key= array_search($propertyincre, $cookiearray);
        if($key !== false)
        {
            unset($cookiearray[$key]);
        }
        $newcookiestring=implode(",",$cookiearray);
        setcookie("cartitems", $newcookiestring, time()+30*24*60*60);
        header("location:cartcheckout.php");
	}
	else
	{
        //redirect to homepage incase there are no cookies
		header("location:index.php");
	}
}
else
{
	header("location:index.php");
}
