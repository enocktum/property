<?php
$generalkey=$_POST['generalsearch'];
$generalname=$_POST['generalname'];
	$usersquery=mysqli_query($con,"select * from system_users where approved='1'");
	$usersavailable=mysqli_num_rows($usersquery);
	if($usersavailable>0)
	{
	
	?>
	<div name="mainpopulator">
		<?php
		$propertyfound=false;
		
						 echo'
						<h1 id="mainpopulatortitle"></h1>
						<div class="content">
						<center>
							<h5>PROPERTY ON SALE</h5>
						<div>
						<p style="text-align:left;text-transform:uppercase;">SEARCH RESULTS: '.$generalname.'</p>
						<div class="scrolling-wrapper" style="overflow-x: auto;overflow-y: hidden;white-space: nowrap;border:2px dotted;">
						 ';
		while($userdata=mysqli_fetch_array($usersquery))
		{
			$userincre=$userdata['incre'];
			$propertyquery=mysqli_query($con,"select * from property where estate LIKE '%$generalkey%' && approved='1' && system_users_incre='$userincre'");
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
								<img src="siteversion/'.$propertydata['image'].'" class="img-rounded" alt="Structure to buy" style="width:250px;height:170px;">
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
			else
			{
				//get users
				//search using other keywords
				$countyquery=mysqli_query($con,"select * from county where name LIKE '%$generalkey%'");
				$numberofcounties=mysqli_num_rows($countyquery);
				if($numberofcounties>0)
				{
					while($countydata=mysqli_fetch_array($countyquery))
					{
						$countyid=$countydata['id'];
						$subcountyquery=mysqli_query($con,"select * from sub_county where countyid='$countyid'");
						$numofsubcounty=mysqli_num_rows($subcountyquery);
						if($numofsubcounty>0)
						{
							while($subcountydata=mysqli_fetch_array($subcountyquery))
							{
								$subcountyid=$subcountydata['id'];
								$propertyquery=mysqli_query($con,"select * from property where subcountyid='$subcountyid' && system_users_incre='$userincre'");
								$propertynumber=mysqli_num_rows($propertyquery);
								if($propertynumber>0)
								{
									$propertyfound=true;
									while($propertydata=mysqli_fetch_array($propertyquery))
									{
										$subcountyincre=$propertydata['subcountyid'];
										$countyquery=mysqli_query($con,"select * from sub_county where id='$subcountyincre'");
										$countydata=mysqli_fetch_array($countyquery);
										$countyname=$countydata['countyname'];
										echo'
										<div class="card" style="height:420px;width:420px;display: inline-block;margin-top:50px;padding-top:50px;margin-bottom:50px;padding-bottom:50px;">
										<img src="siteversion/'.$propertydata['image'].'" class="img-rounded" alt="Structure to buy" style="width:250px;height:170px;">
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
								else
								{
									//find subcounties
									$findsub=mysqli_query($con,"select * from sub_county where subcounty Like '%$generalkey%'");
									$nosubcount=mysqli_num_rows($findsub);
									if($nosubcount)
									{
										while($subdata=mysqli_fetch_array($findsub))
										{
											$subcountyid=$subdata['id'];
											$pertyquery=mysqli_query($con,"select * from property where subcountyid='$subcountyid' && system_users_incre='$userincre'");
											$pertyno=mysqli_num_rows($pertyquery);
											if($pertyno>0)
											{
												$propertyfound=true;
												while($pertydata=mysqli_fetch_array($pertyquery))
												{
													$subcountyincre=$pertydata['subcountyid'];
													$countyquery=mysqli_query($con,"select * from sub_county where id='$subcountyincre'");
													$countydata=mysqli_fetch_array($countyquery);
													$countyname=$countydata['countyname'];
													echo'
										<div class="card" style="height:420px;width:420px;display: inline-block;margin-top:50px;padding-top:50px;margin-bottom:50px;padding-bottom:50px;">
										<img src="siteversion/'.$propertydata['image'].'" class="img-rounded" alt="Structure to buy" style="width:250px;height:170px;">
										<h5>'.$pertydata['name'].'</h5>
										<table style="width:100%;">
										<thead>
											<th>PRICE</th>
											<th>COUNTY</th>
											<th>ESTATE</th>
										</thead>
										<tr>
											<td>Ksh.'.$pertydata['price'].'/=</td>
											<td>'.$countyname.'</td>
											<td>'.$pertydata['estate'].'</td>
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
									}
								}
							}
						}
					}
				}
				//end of getting users
				
			}
		}
		
						echo'
							</div>
						</div>
						</center>
						</div>';
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