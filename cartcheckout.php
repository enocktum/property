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
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
		<style>
		.scrolling-wrapper::-webkit-scrollbar {
			//display: none;
		}

		/* Hide scrollbar for IE, Edge and Firefox */
		.scrolling-wrapper {
			-ms-overflow-style: none;  /* IE and Edge */
			scrollbar-width: none;  /* Firefox */
		}
		
		 h6{
   font-family: serif;
   font-size:2em;
   color:#008000;
   text-align: center;
   animation: animate 1.5s linear infinite;
 } 
  
 @keyframes animate{
   0%{
     opacity: 0;
   }
   50%{
     opacity: 0.7;
   }
   100%{
     opacity: 0;
   }
 }
		
		</style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <a class="navbar-brand fw-bold" href="index.php"><img src="siteversion\assets\img\logo.png" style="width:100px;height:80px;" alt="logo image"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="nav-item"><a data-bs-toggle="modal" data-bs-target="#featuresModal" class="nav-link me-lg-3" href="">FEATURES</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="">MANAGE RENTALS</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="siteversion/index.php">LOGIN || REGISTER</a></li>
                    </ul>
                    <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="">
                        <span class="d-flex align-items-center">
                            <i class="bi-cloud-arrow-down-fill"></i>
                            <span class="small">DOWNLOAD APP</span>
                        </span>
                    </button>&nbsp;&nbsp;&nbsp;&nbsp;
					<button class="btn btn-success rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="">
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
                            <a href='cartcheckout.php' style='color:white;text-decoration:none;'><span class="small">Saved(<?php echo $cartitems; ?>)</span></a>
                        </span>
                    </button>
                </div>
            </div>
        </nav>
        <!-- Mashead header-->
		<section style="margin-top:80px;margin-bottom:80px;padding-top:80px;width:100%;">
            <center>
            <div class="container" style="width:100%;">
                <h5>SELECTED PROPERTY</h5>
                <hr/>
                <?php
                 $cartitems=$_COOKIE['cartitems'];
                 if(isset($cartitems) && $cartitems!="")
                 {
                    //query database
                    $cartquery=explode(",",$cartitems);
                    echo"
                    <table style='width:100%;' class='table table-responsive'>
                    <thead>
                        <th>#</th>
                        <th>NAME</th>
                        <th>COUNTY</th>
                        <th>SUBCOUNTY</th>
                        <th>ESTATE</th>
                        <th>PRICE</th>
                        <th></th>
                    </thead>
                    ";
                    $counter=1;
                    $pricetotal=0;
                    foreach($cartquery as $propertyincre)
                    {
                        $propertyquery=mysqli_query($con,"select * from property where incre='$propertyincre'");
                        $noofproperty=mysqli_num_rows($propertyquery);
                        if($noofproperty>0)
                        {
                            $propertydata=mysqli_fetch_array($propertyquery);
                            $subcountyid=$propertydata['subcountyid'];
                            $countyquery=mysqli_query($con,"select * from sub_county where id='$subcountyid'");
                            $countydata=mysqli_fetch_array($countyquery);
                            $countyname=$countydata['countyname'];
                            $subcountyname=$countydata['subcounty'];
                            $price=$propertydata['price'];
                            echo"
                            <tr  style='text-transform:lowercase;'>
                                <td>$counter</td>
                                <td>".$propertydata['name']."</td>
                                <td>".$countyname."</td>
                                <td>".$subcountyname."</td>
                                <td>".$propertydata['estate']."</td>
                                <td>KSh.".number_format($price)."</td>
                                <td>
                                <form action='removefromcart.php' method='post'>
                                    <input type='hidden' name='propertyincre' value='$propertyincre' required='required'/>
                                    <input type='submit' class='btn btn-danger' value='remove'/>
                                </form>
                                </td>
                            </tr>";
                        }
                        $counter+=1;
                        $pricetotal=$pricetotal+$price;
                    }
                    echo"
                    <tr>
                    <td colspan='5' style='text-align:center;font-size:1.4em;'>
                    <b>TOTAL</b></td>
                    <td style='text-align:left;font-size:1.4em;'>
                    <b>Ksh.".number_format($pricetotal)."</b></td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <br/><br/>
                            <form action='clearcartitems.php' method='post'>
                                <input style='width:100%;' type='submit' class='btn btn-danger' value='REMOVE ALL'/>
                            </form>
                        </td>
                        <td colspan='4'>
                            <br/><br/>
                            <form action='cartcheckoutconfirm.php' method='post'>
                                <input style='width:100%;' type='submit' class='btn btn-success' value='CHECKOUT PROPERTY AND BOOK SITE VISIT'/>
                            </form>
                        </td>
                    </tr>
                    </table>
                    ";
                 }
                 else
                 {
                    header("location:index.php");
                    echo "<script>location='index.php'</script>";
                 }
                ?>
            </div>
            </center>
		</section>
        <!-- Footer-->
        <footer class="bg-black text-center py-5" style="position:fixed;bottom:0;left:0;right:0;">
            <div class="container px-5">
                <div class="text-white-50 small">
                    <div class="mb-2">&copy; <?php echo $data['name'] ." ". date('Y'); ?>. All Rights Reserved.</div>
                    <a href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">FAQ</a>
					<button class="btn btn-success rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target=""  style="position: fixed;bottom: 0;float: right;">
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
                            <a href='cartcheckout.php' style='color:white;text-decoration:none;'><span class="small">Saved(<?php echo $cartitems; ?>)</span></a>
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
        <h5 class="modal-title" id="exampleModalLabel" style="text-transform:uppercase;">THE <?php echo $data['name']; ?> FEATURES</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <p><strong>Welcome and thanks for visiting Kenya's number one property management cloud based system.</strong><br/>
		This site unites property sellers and buyers as well as landlords and tenants.
		This is the all-in-one property management software you need to stay organised, stay compliant and stay sane.
		With an in-built double-entry bookkeeping system, you can easily track and manage every penny that flows in and out of your portfolio
		</p>
		<p>
		
<strong>Managing tenants is now a breeze</strong><br/>
When your tenants are happy, you can relax. So efficient management of your tenancies is the key to a hassle-free life.
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
		
<strong>Powerful reports just a click away</strong><br/>

With multiple properties, it’s hard to always know what’s going on. With Landlord Vision reporting, you get a quick snapshot of your portfolio in just a couple of clicks.
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
$(document).ready(function(){
	//jquery for subcounty load
    $("#county").change(function(){
        var countyid = $(this).val();
		$.ajax({
			url:"searchsubcounty.php",
			method:"POST",
			data:{countyid:countyid},
			success:function(data){
				$('#subcounty').html(data);
			}
		});
    });
	
	//jquery for market search
	$("#markettype").change(function(){
        var marketname = $(this).val();
		$("#mainpopulator").empty();
		$.ajax({
			url:"searchresults.php",
			method:"POST",
			data:{marketname:marketname},
			success:function(data){
				$('#mainpopulator').html(data);
			}
		});
    });
	
	
	$("#search").click(function(){
        var generalsearch = $("#generalsearch").val();
		$("#mainpopulator").empty();
		$.ajax({
			url:"searchresults.php",
			method:"POST",
			data:{generalsearch:generalsearch},
			success:function(data){
				$('#mainpopulator').html(data);
			}
		});
    });
	
	//search by county
	 $(".countyidsearch").change(function(){
        var countyidsearch = $(this).val();
		var generalsearch = $("#county option[value="+countyidsearch+"]").text();
		$("#mainpopulator").empty();
		$.ajax({
			url:"searchresults.php",
			method:"POST",
			data:{generalsearch:generalsearch},
			success:function(data){
				$('#mainpopulator').html(data);
			}
		});
    });
	
	
	//search by sub county
	 $(".subcounty").change(function(){
        var generalsearch = $(this).val();
		var generalname = $(".subcounty option[value="+generalsearch+"]").text();
		$("#mainpopulator").empty();
		$.ajax({
			url:"subcountysearchresults.php",
			method:"POST",
			data:{generalsearch:generalsearch,generalname:generalname},
			success:function(data){
				$('#mainpopulator').html(data);
			}
		});
    });
	

});
</script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
