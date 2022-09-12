<?php 
	error_reporting(E_ERROR);
    include("../connection.php");
    $query=mysqli_query($con,"SELECT * FROM site_details");
    $data=mysqli_fetch_array($query);
    $sitename=$data['name'];
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
        <span class="d-none d-lg-block">PROPERTY MS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="register.php">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="login.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h4 style="text-transform:uppercase;">REGISTRATION PORTAL</h4>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Registration Portal</li>
        </ol>
      </nav>
    </div>
	<!-- End Page Title -->
	
	<!-- TABBED SECTION TO START HERE -->
	<section class="section">
		<div class="content">
		<!-- start of revamped registration -->
		 <center>
 <h4>PLEASE REGISTER BELOW</h4>
 <form style="width:70%;" action="registrationconfirm.php" method="post">
 <!-- user type  -->
  <div class="form-outline mb-4">
    <select type="text" name="usertype"  id="usertype"  class="form-control" required="required">
		<option>kindly select a user type</option>
		<option>propertyseller</option>
		<option>propertybuyer</option>
		<option>landlord</option>
		<option>tenant</option>
	</select>
    <label class="form-label" for="usertype">User Type</label>
  </div>
  <!-- First name input -->
  <div class="form-outline mb-4">
    <input type="text" name="firstname"  id="firstname"  class="form-control" required="required" placeholder="enter your first name"/>
    <label class="form-label" for="firstname">First Name</label>
  </div>
  <!-- Last name input -->
  <div class="form-outline mb-4">
    <input type="text" name="lastname"  id="lastname"  class="form-control" required="required" placeholder="enter your last name"/>
    <label class="form-label" for="lastname">Last Name</label>
  </div>
  <!-- Email Address -->
  <div class="form-outline mb-4">
    <input type="email" name="email"  id="email"  class="form-control" required="required" placeholder="enter your email address"/>
    <label class="form-label" for="emailaddress">Email Address</label>
  </div>
  <!-- phone number input -->
  <div class="form-outline mb-4">
    <input type="text" name="phonenumber"  id="phonenumber"  class="form-control" required="required" placeholder="enter your phone number"/>
    <label class="form-label" for="firstname">Phone Number</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" name="password" id="password"  class="form-control" required="required" placeholder="password goes here"/>
    <label class="form-label" for="password">Password</label>
  </div>
  <!-- Submit button -->
  <input type="submit" class="btn btn-primary btn-block mb-4" value="Sign Up"/>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Already a member? <a href="login.php">Sign In</a></p>
  </div>
</form>
</center>
		<!-- End of revamped registration -->
		</div>
	</section>
	<!-- TABBED SECTION TO END HERE -->
	

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="background: #e0f2f7;position: relative;bottom: 0;width: 100%;">
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