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
        <a class="nav-link collapsed" href="propertysellerunapprovedvisits.php">
          <i class="bi bi-eye-fill"></i>
          <span>pending site visit</span>
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
          <li class="breadcrumb-item active" style="text-transform:lowercase;"><?php echo $firstname." View Property"; ?></li>
        </ol>
      </nav>
    </div>
	<!-- End Page Title -->
	
	<!-- TABBED SECTION TO START HERE -->
	<section class="section">
		<div class="content" style="width:100%;">
        <center>
		<?php
        error_reporting(E_ERROR);
        $propertyincre=$_POST['propertyid'];
        if(isset($propertyincre))
        {
        //start of property incre check
		$propertyquery=mysqli_query($con,"select * from property where system_users_incre='$usersincre' && incre='$propertyincre'");
		$noproperty=mysqli_num_rows($propertyquery);
		if($noproperty>0)
		{
			//continue viewing
			$propertydata=mysqli_fetch_array($propertyquery);
      $subcountyid=$propertydata['subcountyid'];
      $dayvisit=$propertydata['visitday'];
      $subcountyquery=mysqli_query($con,"select * from sub_county where id='$subcountyid'");
      $subcountydata=mysqli_fetch_array($subcountyquery);
      $approval=$propertydata['approved'];
			if($approval==0)
			{
				$approvalstatus="Approval Pending Payment of Ksh.5000";
			}
			else if($approval==1)				
            {
				$approvalstatus="The property has been approved and is visible to potential buyers";
			}
            echo"
            <table style='width:100%;background-color:white;text-align:center;margin-bottom:50px;' class='table  table-responsive'>
            ";
            echo"
            <thead>
                <th style='text-transform:uppercase;' colspan='4'>".$propertydata['name']."</th>
            </thead>
            <tr>
                <td style='text-transform:uppercase;' colspan='4'><img style='width:500px;' src='".$propertydata['image']."' alt='primary image of ".$propertydata['name']."'</td>
            </tr>
            
            <tr>
                <td style='text-transform:lowercase;' colspan='4'>".$propertydata['description']."</td>
            </tr>
            <tr>
                <td style='text-transform:lowercase;' colspan='4'><strong>Site Visit Day for property: ".$visitdate."</strong></td>
            </tr>
            <tr>
                <td style='text-transform:lowercase;'><b>Land Size:</b>".$propertydata['landsize']." acre(s)</td>
                <td style='text-transform:lowercase;'><b>Construction Year:</b>".$propertydata['constructionyear']."</td>
                <td style='text-transform:lowercase;'><b>Parking space(s):</b>".$propertydata['parkingspace']."</td>
                <td style='text-transform:lowercase;'><b>Rooms:</b>".$propertydata['numberofrooms']."</td>
            </tr>
             <tr>
                <td style='text-transform:lowercase;'><b>county:</b>".$subcountydata['countyname']."</td>
                <td style='text-transform:lowercase;'><b>Sub County:</b>".$subcountydata['subcounty']."</td>
                <td colspan='2' style='text-transform:lowercase;'><b>Estate:</b>".$propertydata['estate']."</td>
            </tr>
            <tr>
                <td style='text-transform:lowercase;' colspan='4'><b>Approval Status:</b>".$approvalstatus."</td>
            </tr>
            <tr>
                <td style='text-transform:uppercase;' colspan='4'><b>PROPERTY PRICE:</b>Ksh.".number_format($propertydata['price'])."/=</td>
            </tr>
            <tr>
                <td style='text-transform:uppercase;' colspan='4'><a href='propertysellerview.php'><button class='btn btn-primary'>GO BACK</button></a></td>
            </tr>
            ";
            echo"
            </table>
            ";
		}
		else
		{
			echo'
			<img class="img-responsive" src="assets/img/noresults.jpg" alt="There are no results" width="300px;"height="100px;"> 
			Please add property <a href="selleraddproperty.php">HERE</a> first.
			';
		}

        //end of property incre check
        }
        else{
            header("location:propertysellerview.php");
            echo "<script>location='propertysellerview.php'</script>";
        }
		?>
        </center>
		</div>
	</section>
	<!-- TABBED SECTION TO END HERE -->
	

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="background: #e0f2f7;position: fixed;left:0;bottom:0;width: 100%;">
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