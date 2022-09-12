<?php 
	error_reporting(E_ERROR);
	include("../connection.php");
    $queryd=mysqli_query($con,"SELECT * FROM site_details");
    $dataq=mysqli_fetch_array($queryd);
    $sitename=$dataq['name'];
	session_start();
	if(isset($_SESSION['property_buyer_session']))
	{
		$emailphone=$_SESSION['property_buyer_session'];
		include("../connection.php");
		$query=mysqli_query($con,"select * from system_users where ((phonenumber='$emailphone' || email='$emailphone') && user_type='propertybuyer')");
		$numm=mysqli_num_rows($query);
		if($numm==1)
		{
			$datafields=mysqli_fetch_array($query);
			$firstname=$datafields['first_name'];
            $usersincre=$datafields['incre'];
			$title="Property Buyer";
		}
		else
		{
			unset($_SESSION['property_buyer_session']);
			header("location:../index.php");
		}
	}
	else
	{
		header("location:login.php");
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
        <span class="d-none d-lg-block"><?php echo $title;?></span>
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
              <a class="dropdown-item d-flex align-items-center" href="../cartcheckout.php">
                <i class="bi bi-cart"></i>
                <?php
							if(isset($_COOKIE['cartitems']))
							{
								$cookiearray=explode(",",$_COOKIE['cartitems']);
								$cartitems=count($cookiearray);
							}
							else
							{
								$cartitems=0;
							}
							?>
                <span>Cart Items(<?php echo $cartitems; ?>)</span>
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
              <a class="dropdown-item d-flex align-items-center" href="propertybuyerlogout.php">
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

    <ul style="text-transform:uppercase;" class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="propertybuyerhome.php">
          <i class="bi-house-fill"></i>
          <span><?php echo $firstname." Portal" ?></span>
        </a>
      </li>
	  
      <li class="nav-item">
        <a class="nav-link collapsed" href="../index.php">
          <i class="bi-cash-coin"></i>
          <span>Purchase Property</span>
        </a>
      </li>
	  <li class="nav-item">
        <a class="nav-link collapsed" href="viewpropertybuyerpurchase.php">
          <i class="bi-eye"></i>
          <span>View Purchase(s)</span>
        </a>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link collapsed" href="propertybuyerlogout.php">
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
          <li class="breadcrumb-item"><a href="propertybuyerhome.php">Home</a></li>
          <li class="breadcrumb-item active"><?php echo $firstname." portal"; ?></li>
        </ol>
      </nav>
    </div>
	<!-- End Page Title -->
	
	<!-- TABBED SECTION TO START HERE -->
	<section class="section" style="background-color:white;color:black;margin-bottom:30px;text-align:center;">
		<div class="content">
		<br/><br/>
        <?php
        $propertyincre=$_POST['propertyincre'];
        if(isset($propertyincre))
        {
            //proceed to view data
            //start of property incre check
		$propertyquery=mysqli_query($con,"select * from property where incre='$propertyincre'");
		$noproperty=mysqli_num_rows($propertyquery);
		if($noproperty>0)
		{
			//continue viewing
			$propertydata=mysqli_fetch_array($propertyquery);
      $propertyincre=$propertydata['incre'];
      $systemusersincre=$propertydata['system_users_incre'];
      $userquery=mysqli_query($con,"select * from system_users where incre='$systemusersincre'");
      $userdata=mysqli_fetch_array($userquery);
      $propertyownerphonenumber=$userdata['phonenumber'];
      $propertyowneremail=$userdata['email'];
      $propertyownername=$userdata['first_name']." ".$userdata['last_name'];
      $subcountyid=$propertydata['subcountyid'];
      $propertyvisit=$propertydata['sitevisit'];
      $buyerquery=mysqli_query($con,"select * from buyerbids where propertyincre='$propertyincre' && buyerincre='$usersincre' ");
      $buyerdata=mysqli_fetch_array($buyerquery);
      $visitarray=explode("T",$propertyvisit);
      $visitdaytime=" ".$visitarray[0]." at ".$visitarray[1]."hrs";
      $status=$buyerdata['status'];
                if($status==0)
                {
                    $approvalstatus="<strong style='color:red;'>SITE VISIT: <u>".$visitdaytime."</u>.<br/>Property Status: Site Visit Unapproved<strong>";
                }
                else if($status==1)
                {
                    $approvalstatus="<strong style='color:green;text-transform:lowercase;'>SITE VISIT: <u>".$visitdaytime."</u>.<br/><br/>Property Status: Site Visit Approved<br/><br/>Please contact <u>".$propertyownername."</u> on <u>".$propertyownerphonenumber."</u> or via email: <u>".$propertyowneremail."</u> for further details on the property site visit<strong>";
                }
                else if($status==2)
                {
                    $approvalstatus="<strong style='color:purple;'>SITE VISIT: <u>".$visitdaytime."</u>.<br/>Property Status: Purchased Successfully<strong>";
                }
                else
                {
                    $approvalstatus="<strong style='color:red;'>SITE VISIT: <u>".$visitdaytime."</u>.<br/>Property Status: Unidentified Status<strong>";
                }
      
      $subcountyquery=mysqli_query($con,"select * from sub_county where id='$subcountyid'");
      $subcountydata=mysqli_fetch_array($subcountyquery);
            echo"
            <table style='width:100%;background-color:white;text-align:center;margin-bottom:50px;' class='table  table-responsive table-borderless'>
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
                <td style='text-transform:uppercase;' colspan='4'><strong style='color:green;font-size:1.5em;'>".$approvalstatus."</strong></td>
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
                <td style='text-transform:uppercase;' colspan='4'><b>PROPERTY PRICE:</b>Ksh.".number_format($propertydata['price'])."/=</td>
            </tr>
            <tr>
                <td style='text-transform:uppercase;' colspan='4'><a href='viewpropertybuyerpurchase.php'><button class='btn btn-primary'>GO BACK</button></a></td>
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
			Please add property <a href="../index.php">Go to home page</a> first.
			';
		}

        //end of property incre check
        }
        else
        {
            //head back to buyer view data
            echo "<script>window.location.href='viewpropertybuyerpurchase.php';</script>";
        }
        ?>
        <br/><br/>
		</div>
	</section>
	<!-- TABBED SECTION TO END HERE -->
	

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="background: #e0f2f7;position: fixed;bottom: 0;left:0;right:0;">
  <button class="btn btn-success rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="" style="position: fixed;bottom: 0;right:0;">
                        <span class="d-flex align-items-center">
                            <i class="bi-cart"></i>
							<?php
							if(isset($_COOKIE['cartitems']))
							{
								$cookiearray=explode(",",$_COOKIE['cartitems']);
								$cartitems=count($cookiearray);
							}
							else
							{
								$cartitems=0;
							}
							?>
                            <a href='../cartcheckout.php' style='color:white;text-decoration:none;'><span class="small">Cart Items(<?php echo $cartitems; ?>)</span></a>
                        </span>
                    </button>
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