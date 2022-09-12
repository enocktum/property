<?php 
	error_reporting(E_ERROR);
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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $sitename; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  
  <script src="jquery.js"></script>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="../index.php" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block"><?php echo $title; ?></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->
	
	
	<nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
	  <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $datafields['first_name'];?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $datafields['first_name']." ".$datafields['last_name']; ?></h6>
              <span><?php echo $title; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="propertysellerlogout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
	  </ul>
    </nav><!-- End Icons Navigation -->
	

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="propertysellerhome.php">
          <i class="bi-house-fill"></i>
          <span>Dashboard</span>
        </a>
      </li>
	  
      <li class="nav-item active">
        <a class="nav-link collapsed" href="selleraddproperty.php">
          <i class="bi-plus-circle"></i>
          <span>Add Property</span>
        </a>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link collapsed" href="propertysellerview.php">
          <i class="bi bi-list-check"></i>
          <span>My Property</span>
        </a>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link collapsed" href="propertysellerunapprovedbuyers.php">
          <i class="bi bi-eye-fill"></i>
          <span>Unapproved Buyers</span>
        </a>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link collapsed" href="propertysellerapprovedbuyers.php">
          <i class="bi bi-binoculars"></i>
          <span>Approved Buyers</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="propertysellerlogout.php">
          <i class="bi-box-arrow-left"></i>
          <span>Logout</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h4 style="text-transform:uppercase;"><?php echo $firstname." portal"; ?></h4>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="propertysellerhome.php">Home</a></li>
          <li class="breadcrumb-item active"><?php echo $firstname." add property"; ?></li>
        </ol>
      </nav>
    </div>
	<!-- End Page Title -->
	
	<!-- TABBED SECTION TO START HERE -->
	<section class="section">
		<div class="content" >
			<center>
		<?php
		//error_reporting(E_ERROR);
		$propertyname=filter_var($_POST['propertyname'],FILTER_SANITIZE_STRING);
		$propertydescription=filter_var($_POST['propertydescription'],FILTER_SANITIZE_STRING);
		$landsize=filter_var($_POST['landsize'],FILTER_SANITIZE_STRING);
		$constructionyear=filter_var($_POST['constructionyear'],FILTER_SANITIZE_STRING);
		$numberofrooms=filter_var($_POST['numberofrooms'],FILTER_SANITIZE_STRING);
		$parkingspace=filter_var($_POST['parkingspace'],FILTER_SANITIZE_STRING);
		$sitevisit=filter_var($_POST['sitevisit'],FILTER_SANITIZE_STRING);
		$propertysubcountyid=filter_var($_POST['propertysubcounty'],FILTER_SANITIZE_STRING);
		$propertyestate=filter_var($_POST['propertyestate'],FILTER_SANITIZE_STRING);
		$propertymaplink=$_POST['propertymaplink'];
		$propertymaplink = filter_var($propertymaplink, FILTER_SANITIZE_URL);
		if(!empty($propertymaplink)){
		// Validate url
		if (!filter_var($propertymaplink, FILTER_VALIDATE_URL) === false) {
			//echo("$url is a valid URL");
		} else {
			echo"shida kwa link";
			header("location:selleraddproperty.php");
			echo "<script>window.location.href='selleraddproperty.php';</script>";
			exit;
		}
		}
		$propertyprice=$_POST['propertyprice'];
		if (is_numeric($propertyprice)) {
			//interger is valid
		} 
		else {
			header("location:selleraddproperty.php");
			echo "<script>window.location.href='selleraddproperty.php';</script>";
			exit;
		}
		if(isset($propertyname) && isset($propertydescription) && isset($propertyprice) && isset($propertysubcountyid) && isset($propertyestate) && isset($landsize) && isset($constructionyear) && isset($numberofrooms) && isset($parkingspace) && isset($sitevisit))
		{
			//upload the image 
$target_dir = "uploads/$usersincre/$propertyestate/".date("Y_m_d_h_i_s")."/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$extensionarray=explode(".",basename($_FILES["fileToUpload"]["name"]));
$extension=$extensionarray[1];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "<script>alert('The file already exists, thank you')</script>";
		echo "<script>window.location.href='selleraddproperty.php';</script>";
		$uploadOk = 0;
	}
	else
	{
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "<script>alert('The file type is too large, please choose a smaller image less than 500MB')</script>";
				echo "<script>window.location.href='selleraddproperty.php';</script>";
			$uploadOk = 0;
		}
		else
		{
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
			{
        echo "<script>alert('Kindly please choose an image file to continue')</script>";
				echo "<script>window.location.href='selleraddproperty.php';</script>";
				$uploadOk = 0;
			}
			else
			{
				if ($uploadOk == 0) {
					echo "<script>window.location.href='selleraddproperty.php';</script>";
				}
				else
				{
					if (!file_exists($target_dir)) {
						mkdir($target_dir, 0777, true);
            $new_target_file = $target_dir . "firstimage.$extension";
						$movefile=move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $new_target_file);
						if($movefile)
						{
							//1% of the property price as service fee
							$servicefee=5000;
							//add data to database after successful upload of image
              $insertquery="INSERT INTO property (system_users_incre,name,description,subcountyid,estate,price,need_tips,approved,sponsored,map_link,image,landsize,constructionyear,numberofrooms,parkingspace,servicefee,sitevisit) VALUES ('$usersincre','$propertyname','$propertydescription','$propertysubcountyid','$propertyestate','$propertyprice',true,true,false,'$propertymaplink','$new_target_file','$landsize','$constructionyear','$numberofrooms','$parkingspace','$servicefee','$sitevisit')";
			$insert=mysqli_query($con,$insertquery) or die(mysqli_error($con));
			if($insert)
			{
				?>
				<div class="panel panel-success">
					<div class="panel-heading">SUCCESS IN PROPERTY ADDITION</div>
					<div class="panel-body">
					<img class="img-responsive" src="assets/img/success.png" alt="You are successful" width="200px;"height="100px;"/> <br/><br/>
					The property has been successfully added pending a payment of <strong>Ksh<?php echo $servicefee ?></strong> in order to appear at the market place.<br/><br/><br/> <a href="propertysellerview.php">Click Here</a> to view your property and complete payment of service fee.
					</div>
				</div>
				<?php
			}
			else
			{
				mysqli_error($insert);
				?>
				<div class="panel panel-danger">
					<div class="panel-heading">SERVER DOWN TIME</div>
					<div class="panel-body">We are sorry for the inconvenience, please try again later.</div>
				</div>
				<?php
			}
              //end of adding data to database
						}
						else
						{
							echo "<script>window.location.href='selleraddproperty.php';</script>";
						}
					}
					else
					{
            $new_target_file = $target_dir . "firstimage.$extension";
						$movefile=move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $new_target_file);
						if($movefile)
						{
							//5% of the property price as service fee
							$servicefee=5000;
							//add data to database after successful upload of image
              $insertquery="INSERT INTO property (system_users_incre,name,description,subcountyid,estate,price,need_tips,approved,sponsored,map_link,image,landsize,constructionyear,numberofrooms,parkingspace,servicefee,sitevisit) VALUES ('$usersincre','$propertyname','$propertydescription','$propertysubcountyid','$propertyestate','$propertyprice',true,true,false,'$propertymaplink','$new_target_file','$landsize','$constructionyear','$numberofrooms','$parkingspace','$servicefee','$sitevisit')";
			$insert=mysqli_query($con,$insertquery) or die(mysqli_error($con));
			if($insert)
			{
				?>
				<div class="panel panel-success">
					<div class="panel-heading">SUCCESS IN PROPERTY ADDITION</div>
					<div class="panel-body">
					<img class="img-responsive" src="assets/img/success.png" alt="You are successful" width="200px;"height="100px;"/> <br/><br/>
					The property has been successfully added pending a payment of <strong>Ksh<?php echo $servicefee ?></strong> in order to appear at the market place.<br/><br/><br/> <a href="propertysellerview.php">Click Here</a> to view your property and complete payment of service fee.
					</div>
				</div>
				<?php
			}
			else
			{
				mysqli_error($insert);
				?>
				<div class="panel panel-danger">
					<div class="panel-heading">SERVER DOWN TIME</div>
					<div class="panel-body">We are sorry for the inconvenience, please try again later.</div>
				</div>
				<?php
			}
              //end of adding data to database
						}
						else
						{
							echo "<script>window.location.href='selleraddproperty.php';</script>";
						}
					}
				}
			}
		}
		
	}
}
else
{
	header("location:index.php");
  echo "<script>window.location.href='selleraddproperty.php';</script>";
}
      //end of upload image
		}
		else
		{
			header("location:selleraddproperty.php");
			echo "<script>window.location.href='selleraddproperty.php';</script>";
			exit;
		}
		?>
		</center>
		</div>
	</section>
	<!-- TABBED SECTION TO END HERE -->
	

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="background: #e0f2f7;position: relative;width: 100%;">
    <div class="copyright">
      &copy; Copyright <strong><span><?php echo $sitename; ?></span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->


	
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
<script>

</html>