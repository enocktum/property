<?php 
	//error_reporting(E_ERROR);
    include("../connection.php");
    $query=mysqli_query($con,"SELECT * FROM site_details");
    $data=mysqli_fetch_array($query);
    $sitename=$data['name'];
		$usertype=$_POST['usertype'];
		if($usertype=="propertyseller")
		{
			$title="Property Seller";
			$todatabase="propertyseller";
		}
		else if($usertype=="propertybuyer")
		{
			$title="Property Buyer";
			$todatabase="propertybuyer";
		}
		else if($usertype=="landlord")
		{
			$title="Landlord";
			$todatabase="landlord";
		}
		else if($usertype=="tenant")
		{
			$title="Tenant";
			$todatabase="tenant";
		}
		else
		{
			header("location:register.php");
			echo "<script>location='register.php'</script>";
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
		<?php 
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$phonenumber=$_POST['phonenumber'];
		if(isset($firstname) && isset($lastname) && isset($email)&& isset($password) && isset($phonenumber))
		{
			echo"<h1>$title registration progress</h1>";
			//check if user already exist
			$query=mysqli_query($con,"SELECT * FROM system_users WHERE phonenumber='$phonenumber' && user_type='$todatabase' && email='$email'");
			$no=mysqli_num_rows($query);
			if($no<1)
			{
				$insert=mysqli_query($con,"INSERT INTO system_users (first_name,last_name,email,phonenumber,password,user_type,new_user,approved) VALUES ('$firstname','$lastname','$email','$phonenumber','$password','$todatabase',true,true)");
				if($insert)
				{
					echo"<br/><strong>Congratulations $firstname $lastname!</strong> <br/><br/>You have been registered successfully as a $title. Go ahead and <a href='login.php'>Login</a> in the $title tab to enjoy the services.<Br/> You are highly welcome and esteemed <br/><br/><br/>";
				}
				else
				{
					echo"There is a problem in the insertion of the $title, try again by clicking the register link on the left side.";
				}
			}
			else
			{
				echo"<strong>Dear $firstname $lastname</strong><Br/><br/><br/>You have already registered for $title. Please go ahead and <a href='login.php'>Login</a> in the $title tab to enjoy the services. <br/><br/><br/>";
			}
		}
		else
		{
			header("location:index.php");
			echo "<script>location='index.php'</script>";
		}
		?>
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