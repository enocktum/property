<?php 
include"../connection.php";
if(isset($_POST['countyid']))
{
	$countyid=$_POST['countyid'];
	$sql=mysqli_query($con,"select * from sub_county where countyid='$countyid'");
	$noofsubs=mysqli_num_rows($sql);
	
	?>
	<select name="propertysubcounty" class="form-control">
		<?php
		while($row=mysqli_fetch_array($sql))
		{
			echo"<option value='".$row['id']."'>".$row['subcounty']."</option>";
		}
		?>
	</select>
	<?php
}
?>