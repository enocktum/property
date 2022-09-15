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
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
    .scrolling-wrapper::-webkit-scrollbar {
        //display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .scrolling-wrapper {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }

    h6 {
        font-family: serif;
        font-size: 2em;
        color: #008000;
        text-align: center;
        animation: animate 1.5s linear infinite;
    }

    <button onClick= {
        (ev @keyframes animate {
                0% {
                    opacity: 0;
                }

                50% {
                    opacity: 0.7;
                }

                100% {
                    opacity: 0;
                }
            }
    </style>
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
                    <li class="nav-item"><a class="nav-link me-lg-3" href="">MANAGE RENTALS</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="siteversion/index.php">LOGIN || REGISTER</a>
                    </li>
                </ul>
                <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="">
                    <span class="d-flex align-items-center">
                        <i class="bi-cloud-arrow-down-fill"></i>
                        <span class="small">DOWNLOAD APP</span>
                    </span>
                </button>&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-success rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="">
                    <span class="d-flex align-items-center">

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
                        <a href='cartcheckout.php' style='color:white;text-decoration:none;'><span
                                class="small">SAVED(<?php echo $cartitems; ?>)</span></a>
                    </span>
                </button>
            </div>
        </div>
    </nav>
    <!-- Mashead header-->
    <section
        style="position:fixed;top: 0px;left: 0px;width: 100%;border-radius:0px;margin-top:40px;margin-bottom:40px;">
        <?php
		if(isset($_COOKIE['homenotification']))
		{
			if($_COOKIE['homenotification'] == "firsttime")
			{
				echo'
				<div class="mbuzi alert alert-success alert-dismissible fade show" role="alert">
  					<strong>The first item has been added to the cart</strong>
  					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				';
				setcookie("homenotification", "", time() - 3600);
			}
			else if($_COOKIE['homenotification'] == "addition")
			{
				echo'
				<div class="mbuzi alert alert-success alert-dismissible fade show" role="alert">
  					<strong>The item has been appended to the cart</strong>
  					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				';
				setcookie("homenotification", "", time() - 3600);
			}
			else if($_COOKIE['homenotification'] == "existing")
			{
				echo'
				<div class="mbuzi alert alert-warning alert-dismissible fade show" role="alert">
  					<strong>The item already exists on the cart items</strong>
  					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				';
				setcookie("homenotification", "", time() - 3600);
			}
			else
			{
				setcookie("homenotification", "", time() - 3600);
			}
			
		}
		?>
    </section>
    <section style="margin-top:80px;padding-top:80px;">
        <div class="content">
            <center>
                <div style="width:100%;">
                    <div class="input-group mb-3" style="width:90%;margin-top:30px;">
                        <select style="width:20%;" name="markettype" id="markettype" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <option>filter by market category</option>
                            <option value="buy property">buy property</option>
                            <option value="rent property">rent property</option>
                        </select>
                        <select style="width:20%;text-transform:lowercase;" class="countyidsearch" name="county"
                            id="county" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
					include"connection.php";
					$countyQuery=mysqli_query($con,"SELECT * FROM county");
					$noOfCounties=mysqli_num_rows($countyQuery);
					if($noOfCounties>0)
					{
						//flood counties
						echo"<option value='0'>filter by county</option>";
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
                        <select style="width:20%;text-transform:lowercase;" name="subcounty" class="subcounty"
                            id="subcounty" data-bs-toggle="dropdown" aria-expanded="false">
                            <option>select subcounty first to filter</option>
                        </select>
                        <input style="width:30%;text-transform:lowercase;" type="text" class="form-control"
                            name="generalsearch" id="generalsearch" placeholder="type search key" />
                        <input style="width:10%;" type="submit" class="form-control btn btn-primary" value="Search"
                            id="search" />
                    </div>
            </center>
            <hr style="border-top: 2px solid blue;" />
            <br /><br />
            <div id="mainpopulator">
                <h1 id="mainpopulatortitle"></h1>
                <div class="content">
                    <center>
                        <h5>PROPERTY ON SALE</h5>
                        <div>
                            <div class="scrolling-wrapper"
                                style="overflow-x: auto;overflow-y: hidden;white-space: nowrap;">
                                <?php
	include"connection.php";
	$usersquery=mysqli_query($con,"select * from system_users where approved='1'");
	$usersavailable=mysqli_num_rows($usersquery);
	if($usersavailable>0)
	{
	
	?>
                                <div name="mainpopulator">
                                    <?php
		$propertyfound=false;
		while($userdata=mysqli_fetch_array($usersquery))
		{
			$userincre=$userdata['incre'];
			$propertyquery=mysqli_query($con,"select * from property where approved='1' && system_users_incre='$userincre'");
			$propertyavailable=mysqli_num_rows($propertyquery);
			if($propertyavailable>0)
			{
				$propertyfound=true;
				while($propertydata=mysqli_fetch_array($propertyquery))
				{
					//create the structure
					$subcountyincre=$propertydata['subcountyid'];
					$countyquery=mysqli_query($con,"select * from sub_county where id='$subcountyincre'");
					$countydata=mysqli_fetch_array($countyquery);
					$countyname=$countydata['countyname'];
						//property seller content to be loaded
						echo'
								<div class="card" style="height:420px;width:420px;display: inline-block;margin-top:50px;padding-top:50px;margin-bottom:50px;padding-bottom:50px;">
								<img src="siteversion/'.$propertydata['image'].'" class="img-rounded" alt="Structure to buy" style="width:250px;height:170px;border-radius:50px;object-fit:cover;">
								<h5>'.$propertydata['name'].'</h5>
								<table style="width:100%;">
								<thead>
									<th>PRICE</th>
									<th>COUNTY</th>
									<th>ESTATE</th>
								</thead>
								<tr>
									<td>Ksh.'.$propertydata['price'].'/=</td>
									<td>'.$countyname.'</td>
									<td>'.$propertydata['estate'].'</td>
								</tr>
								<tr>
									<td colspan="3">
									<br/><br/>
									<center>
										  <form action="setcookie.php" method="post">
										  <input type="hidden" value="'.$propertydata['incre'].'" name="propertyincre" id="propertyincre"/>
										  <input type="submit" class="btn btn-success" value="Save"/>
										  </form>
									</center>
									</td>
								</tr>
								</table>
								</div>
								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						';
					
				}
			}
		}
		if($propertyfound==false)
		{
			//echo "<script>location='index.php'</script>";
		}
		
		?>
                                </div>
                                <?php
	}
	else
	{
		echo'
		<center>
		<div name="mainpopulator">
			<img class="img-responsive" src="siteversion/assets/img/noresults.jpg" alt="There are no results" width="300px;"height="100px;"> 
			Please login and add property <a href="siteversion/login.php">HERE</a> first.
		</div>
		</center>
			';
	}
?>
                            </div>
                        </div>
                    </center>
                </div>
                <br />
                <hr style="border-top: 2px solid grey;" />
                <br />
                <div class="content">

                </div>

            </div>

        </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="bg-black text-center py-5">
        <div class="container px-5">
            <div class="text-white-50 small">
                <div class="mb-2">&copy; <?php echo $data['name'] ." ". date('Y'); ?>. All Rights Reserved.</div>
                <a href="#!">Privacy</a>
                <span class="mx-1">&middot;</span>
                <a href="#!">Terms</a>
                <span class="mx-1">&middot;</span>
                <a href="#!">FAQ</a>
                <button class="btn btn-success rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target=""
                    style="position: fixed;bottom: 0;">
                    <span class="d-flex align-items-center">

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
                        <a href='cartcheckout.php' style='color:white;text-decoration:none;'><span
                                class="small">SAVED(<?php echo $cartitems; ?>)</span></a>
                    </span>
                </button>
            </div>

        </div>
    </footer>
    <!-- modals -->
    <!-- Modal -->
    <div class="modal fade" id="featuresModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 100%;height: 100%;">
            <div class="modal-content" style="height: auto;min-height: 100%;border-radius: 0;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="text-transform:uppercase;">THE
                        <?php echo $data['name']; ?> FEATURES</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Welcome and thanks for visiting Kenya's number one property management cloud based
                            system.</strong><br />
                        This site unites property sellers and buyers as well as landlords and tenants.
                        This is the all-in-one property management software you need to stay organised, stay compliant
                        and stay sane.
                        With an in-built double-entry bookkeeping system, you can easily track and manage every penny
                        that flows in and out of your portfolio
                    </p>
                    <p>

                        <strong>Managing tenants is now a breeze</strong><br />
                        When your tenants are happy, you can relax. So efficient management of your tenancies is the key
                        to a hassle-free life.
                    <ul>
                        <li>Record all tenancy information and documents in one place</li>
                        <li>Assign tenants to properties and individual rooms (HMOs)</li>
                        <li>View payment schedules to see what’s due and what’s in arrears</li>
                        <li> Easily track letting agent (and LHA) fees, payments and statements</li>
                        <li> Manage guarantors and track deposit scheme activity</li>
                        <li> Give tenants limited access to relevant documents and log all correspondence</li>
                    </ul>

                    </p>
                    <p>

                        <strong>Powerful reports just a click away</strong><br />

                        With multiple properties, it’s hard to always know what’s going on. With Landlord Vision
                        reporting, you get a quick snapshot of your portfolio in just a couple of clicks.
                    <ul>
                        <li>Property reports showing everything from occupancy to expenses</li>
                        <li>Tenant reports to help you manage their needs and your responsibilities</li>
                        <li> Accounting reports so you always know your exact financial position</li>
                        <li> Finance reports to monitor mortgages and help you meet lending rules</li>
                        <li>Tax reports to ensure no end-of-year income tax surprises</li>
                        <li>And easily filter reports by property or individual room</li>
                    </ul>

                    </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close Features</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="siteversion/jquery.js"></script>
    <script>
    $(document).ready(function() {
        //jquery for subcounty load
        $("#county").change(function() {
            var countyid = $(this).val();
            $.ajax({
                url: "searchsubcounty.php",
                method: "POST",
                data: {
                    countyid: countyid
                },
                success: function(data) {
                    $('#subcounty').html(data);
                }
            });
        });

        //jquery for market search
        $("#markettype").change(function() {
            var marketname = $(this).val();
            $("#mainpopulator").empty();
            $.ajax({
                url: "searchresults.php",
                method: "POST",
                data: {
                    marketname: marketname
                },
                success: function(data) {
                    $('#mainpopulator').html(data);
                }
            });
        });

        //fade in and out
        $(document).ready(function() {
            $(".mbuzi").fadeTo(3000, 0).slideUp(3000, function() {
                $(this).remove();
            });
        });


        $("#search").click(function() {
            var generalsearch = $("#generalsearch").val();
            $("#mainpopulator").empty();
            $.ajax({
                url: "searchresults.php",
                method: "POST",
                data: {
                    generalsearch: generalsearch
                },
                success: function(data) {
                    $('#mainpopulator').html(data);
                }
            });
        });

        //search by county
        $(".countyidsearch").change(function() {
            var countyidsearch = $(this).val();
            var generalsearch = $("#county option[value=" + countyidsearch + "]").text();
            $("#mainpopulator").empty();
            $.ajax({
                url: "searchresults.php",
                method: "POST",
                data: {
                    generalsearch: generalsearch
                },
                success: function(data) {
                    $('#mainpopulator').html(data);
                }
            });
        });


        //search by sub county
        $(".subcounty").change(function() {
            var generalsearch = $(this).val();
            var generalname = $(".subcounty option[value=" + generalsearch + "]").text();
            $("#mainpopulator").empty();
            $.ajax({
                url: "subcountysearchresults.php",
                method: "POST",
                data: {
                    generalsearch: generalsearch,
                    generalname: generalname
                },
                success: function(data) {
                    $('#mainpopulator').html(data);
                }
            });
        });


    });
    </script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>