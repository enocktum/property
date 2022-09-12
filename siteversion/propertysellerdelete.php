<?php 
	//error_reporting(E_ERROR);
	include("../connection.php");
    $queryd=mysqli_query($con,"SELECT * FROM site_details");
    $dataq=mysqli_fetch_array($queryd);
    $sitename=$dataq['name'];
	session_start();
	if(isset($_SESSION['property_seller_session']))
	{
		$emailphone=$_SESSION['property_seller_session'];
		include("../connection.php");
		$query=mysqli_query($con,"select * from system_users where ((phonenumber='$emailphone' || email='$emailphone') && user_type='propertyseller')");
		$numm=mysqli_num_rows($query);
		if($numm==1)
		{
			$datafields=mysqli_fetch_array($query);
			$firstname=$datafields['first_name'];
			$usersincre=$datafields['incre'];
			$title="Property Seller";
            //go ahead and check for variables to delete property
            $propertyid=$_POST['propertyid'];
            if(isset($propertyid))
            {
                //delete from the property table
                $propertydelete=mysqli_query($con,"delete from property where incre='$propertyid'");
                if($propertydelete)
                {
                    //delete from the property image table as well
                    $propertyimagequery=mysqli_query($con,"select * from property_image where property_incre='$propertyid' && system_users_incre='$usersincre'");
                    $no=mysqli_num_rows($propertyimagequery);
                    if($no>0)
                    {
                        //delete
                        $deleteimages=mysqli_query($con,"delete from property_image where property_incre='$propertyid' && system_users_incre='$usersincre'");
                        if($deleteimages)
                        {
                            //delete from buyer bid as well
                            $deletebids=mysqli_query($con,"delete from buyerbids where propertyincre='$propertyid'");
                            if($deletebids)
                            {
                                //success in deleting all
                                header("location:propertysellerview.php");
                            }
                            else
                            {
                                //not successful in deleting
                                header("location:propertysellerview.php");
                            }
                        }
                        else
                        {
                            //unsuccessful delete
                            header("location:propertysellerview.php");
                        }
                    }
                    else
                    {
                        //if no data skip and go to property seller view page
                        header("location:propertysellerview.php");
                        //delete incase there is no data in images
                        //delete from buyer bid as well
                            $deletebids=mysqli_query($con,"delete from buyerbids where propertyincre='$propertyid'");
                            if($deletebids)
                            {
                                //success in deleting all
                                header("location:propertysellerview.php");
                            }
                            else
                            {
                                //not successful in deleting
                                header("location:propertysellerview.php");
                            }
                        //end of delete
                    }
                }
                else
                {
                    echo"could not delete the property";
                    header("location:propertysellerview.php");
                }
            }
            else
            {
                header("location:propertysellerview.php");
            }
		}
		else
		{
			unset($_SESSION['property_seller_session']);
			header("location:index.php");
			echo "<script>location='index.php'</script>";
		}
	}
	else
	{
		header("location:login.php");
		echo "<script>location='login.php'</script>";
	}
    
?>