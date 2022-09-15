<?php 
	error_reporting(E_ERROR);
    include("connection.php");
    $query=mysqli_query($con,"SELECT * FROM site_details");
    $data=mysqli_fetch_array($query);
    $sitename=$data['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo $sitename; ?></title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
        <div class="container px-5">
            <a class="navbar-brand fw-bold" href="index.php"><img src="siteversion\assets\img\logo.png"
                    style="width:100px;height:80px;" alt="logo image"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                    <li class="nav-item"><a data-bs-toggle="modal" data-bs-target="#featuresModal"
                            class="nav-link me-lg-3" href="">FEATURES</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="">BUY PROPERTY</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="">SELL PROPERTY</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="">RENT PROPERTY</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="">LET PROPERTY</a></li>
                </ul>
                <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="">
                    <span class="d-flex align-items-center">
                        <i class="bi-cloud-arrow-down-fill"></i>
                        <span class="small">DOWNLOAD APP</span>
                    </span>
                </button>
            </div>
        </div>
    </nav>
    <!-- Mashead header-->
    <section style="margin-top:80px;padding-top:80px;">

    </section>
    <!-- Footer-->
    <footer class="bg-black text-center py-5" style="position: fixed;bottom: 0;right: 0;width: 100%;">
        <div class="container px-5">
            <div class="text-white-50 small">
                <div class="mb-2">&copy; <?php echo $data['name'] ." ". date('Y'); ?>. All Rights Reserved.</div>
                <a href="#!">Privacy</a>
                <span class="mx-1">&middot;</span>
                <a href="#!">Terms</a>
                <span class="mx-1">&middot;</span>
                <a href="#!">FAQ</a>
            </div>

        </div>
    </footer>
    <script src="js/scripts.js"></script>
    <script src="siteversion/jquery.js"></script>
</body>

</html>