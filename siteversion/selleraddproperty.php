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
			$title="Property Seller";
		}
		else
		{
			unset($_SESSION['property_seller_session']);
			header("location:index.php");
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
          <span>Pending site visit</span>
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
		<fieldset style="width:80%;margin-left:auto;margin-right:auto;display:block;">
			<legend style="text-align:center;">Use the form below to add property to sell</legend>
			<form action="addpropertyconfirm.php" method="post"  enctype="multipart/form-data">
				<div class="mb-3">
					<label for="propertyname" class="form-label">Name of property</label>
					<input type="text" class="form-control" name="propertyname" id="propertyname" placeholder="the name of the property goes here" required>
				</div>
        <div class="mb-3">
					<label for="landsize" class="form-label">The size of the land in acres i.e 1/8, 1/4, 1/2, 1, 2</label>
					<select class="form-control" name="landsize" id="landsize" style="text-transform:lowercase;">
					<option>1/8</option>
          <option>1/4</option>
          <option>1/2</option>
          <?php
					for($counter=1;$counter<=100;$counter++){
            echo"<option>$counter</option>";
          }
					?>
          <option>more than 100</option>
					</select>
        </div>
        <div class="mb-3">
					<label for="constructionyear" class="form-label">Year of construction</label>
					<input type="text"  class="form-control" name="constructionyear" id="constructionyear" placeholder="The year in which the property was constructed" required/>
				</div>
        <div class="mb-3">
					<label for="numberofrooms" class="form-label">Number of rooms in the property</label>
					<input type="text"  class="form-control" name="numberofrooms" id="numberofrooms" placeholder="The total number of rooms in the building" required/>
				</div>
        <div class="mb-3">
					<label for="parkingspace" class="form-label">Number of parking spaces available</label>
					<select class="form-control" name="parkingspace" id="parkingspace" style="text-transform:lowercase;">
					<option>unavailable</option>
          <?php
					for($counter=1;$counter<=300;$counter++){
            echo"<option>$counter</option>";
          }
					?>
          <option>more than 300</option>
					</select>
        </div>
				<div class="mb-3">
					<label for="propertydescription" class="form-label">Additional Property description</label>
					<textarea class="form-control" name="propertydescription" id="propertydescription" placeholder="additional property description goes here" required></textarea>
				</div>
				<div class="mb-3">
					<label for="propertyprice" class="form-label">Price of Property in Kenya Shillings(Ksh.)</label>
					<input type="text" class="form-control" name="propertyprice" id="propertyprice" placeholder="the price of the property goes here(only numbers i.e 4000000 or 200000)" required>
				</div>
				<div class="mb-3">
					<label for="propertycounty" class="form-label">Select the county(i.e Nairobi)</label>
					<select class="form-control" name="propertycounty" id="propertycounty" style="text-transform:lowercase;">
					<?php
					$countyQuery=mysqli_query($con,"SELECT * FROM county");
					$noOfCounties=mysqli_num_rows($countyQuery);
					if($noOfCounties>0)
					{
						//flood counties
						echo"<option value='0'>Kindly select the county</option>";
						while($dataCounties=mysqli_fetch_array($countyQuery))
						{
							$id=$dataCounties['id'];
							$name=$dataCounties['name'];
							echo"<option value='".$id."'>".$name."</option>";
						}
						//end flood counties
					}
					else
					{
						echo"<option>No counties in the database</option>";
					}
					?>
					</select>
				</div>
				<div class="mb-3">
					<label for="propertysubcounty" class="form-label">Sub-County location of property(i.e Ruaraka)</label>
					<select class="form-control" name="propertysubcounty" id="propertysubcounty" style="text-transform:lowercase;">
						<option value="0">- Select -</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="propertyestate" class="form-label">Estate of the property(i.e Kasarani)</label>
					<input type="text" class="form-control" name="propertyestate" id="propertyestate" placeholder="Estate where property is located( i.e Westlands)" required>
				</div>
        <div class="mb-3">
					<label for="propertyestate" class="form-label">Image of the property(i.e The image to show on the market place)</label>
					<input type="file" class="form-control" name="fileToUpload" id="fileToUpload"required>
				</div>
        <div class="mb-3">
					<label for="sitevisit" class="form-label">Select the day of site visit to this property</label>
					<input type="datetime-local" class="form-control" name="sitevisit" id="sitevisit" style="text-transform:lowercase;"/>
        </div>
				<div class="mb-3">
					<label for="propertymaplink" class="form-label">Property map link(optional but helps users pinpoint the exact location)</label>
					<input type="text" class="form-control" name="propertymaplink" id="propertymaplink" placeholder="i.e https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUb&callback=initMap&v=weekly)">
				</div>
				<input type="submit" name="submit" class="btn btn-primary" value="Add Property">
			</form>
		</fieldset>
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
  <script src="jquery.js"></script>
<script>
$(document).ready(function(){

    $("#propertycounty").change(function(){
        var countyid = $(this).val();
		$.ajax({
			url:"getsubcounties.php",
			method:"POST",
			data:{countyid:countyid},
			success:function(data){
				$('#propertysubcounty').html(data);
			}
		});
    });

});
</script>
</body>
<script>

</html>