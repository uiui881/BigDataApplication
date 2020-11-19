<?php

include "header.php";

function del($brand_id){
	$query_del = "delete FROM brand WHERE brand_id= '$brand_id' ";
	$result = $conn->query($query_del);
	return;
}

	$brand_id = $_GET['idx'];
	?>

<head>
<meta charset="utf-8">
<title>Cafepedia - Brand</title>
<style>
	.brand-table {
		border-collapse: collapse;
	}

	.brand-table td {
  		border: 1px solid #be9b7b;
  		padding: 8px;
  		background-color:white;
	}

	.brand-table th {
  		padding-top: 12px;
  		padding-bottom: 12px;
  		text-align: center;
  		background-color: #4b3832;
  		color: white;
  		border: 1px solid #be9b7b;
  		padding: 8px;
	}
</style>
</head>

	 <table style="padding-top: 50px; width:100%">
	   <tr>
	     <td style="width:50%;">
		<table style="margin-left:auto; margin-right:auto;"><tr><td>
	 	<h1>
		<?php
		 	$query = "SELECT * FROM brand WHERE brand_id= $brand_id";
		 	$result = $conn->query($query);
		 	$row = $result->fetch_array(MYSQLI_ASSOC);
		 	echo "     ";
		 	echo $row['brand_name']; ?>
	 	</h1>
		 

	 	<input type="button" name= "modified_button" style="background-color: #be9b7b; border-radius: 5px; height :32px" value ="Update this brand"
 		onClick="location.href='./modifyBrandForm.php?idx=<?php echo $row['brand_id']?>'">
 		<input type="button" style="background-color: #854442; border-radius: 5px; color:#ffffff; height :32px" name= "deleted_button" value ="Delete this brand"
		onclick="location.href='./deleteBrandInfo.php?idx=<?php echo $row['brand_id']?>'">

		</td></tr></table>
	 	</td>
	 	<td>
		<table class="brand-table" style="margin-left:auto; margin-right:auto; text-align:center ;">
	    <tr>
	     	<th>Opening Date</th>
	     	<th>Business Years</th>
	     </tr>
	     <td>
				 <?php
				 	$query = "SELECT opening_date FROM current_situation WHERE brand_id= $brand_id";
				 	$result = $conn->query($query);
				 	$row = $result->fetch_array(MYSQLI_ASSOC);
				 	echo $row['opening_date'];

					?>

			 </td><td>
				 <?php
				  $query = "SELECT YEAR(opening_date) as yr FROM current_situation WHERE brand_id= $brand_id";
				  $result = $conn->query($query);
				  $row = $result->fetch_array(MYSQLI_ASSOC);
				  echo 2020-$row['yr'];
					echo' years<br>';

				  ?>

				 <br></td>
	     </tr>
	     <tr>
	     	<th>Number Of Franchises</th>
	     	<th>Number Of Employees</th>
	     </tr>
	     <tr>
	     <td>
				 <?php
					$query = "SELECT NumberOfFranchises FROM current_situation WHERE brand_id= $brand_id";
					$result = $conn->query($query);
					$row = $result->fetch_array(MYSQLI_ASSOC);
					echo $row['NumberOfFranchises']; ?>
			 </td><td>
				 <?php
	
					$query = "SELECT NumberOfEmployees FROM current_situation WHERE brand_id= $brand_id";
					$result = $conn->query($query);
					$row = $result->fetch_array(MYSQLI_ASSOC);
					echo $row['NumberOfEmployees']; ?>
			 </td>
	     </tr>
	     <tr>
	     	<th>Average Sales</th>
	     	<th>Number of Stores scheduled to open</th>
	     </tr>
	     <tr>
	     <td>
				 <?php
 					$query = "SELECT AverageSales FROM current_situation WHERE brand_id= $brand_id";
 					$result = $conn->query($query);
 					$row = $result->fetch_array(MYSQLI_ASSOC);
					echo '\\';
 					echo $row['AverageSales'];
 					echo '(unit: 천원)';
					?>
				</td><td>
					<?php
  					$query = "SELECT Scheduled_To_Open FROM current_situation WHERE brand_id= $brand_id";
  					$result = $conn->query($query);
  					$row = $result->fetch_array(MYSQLI_ASSOC);
  					echo $row['Scheduled_To_Open'];
 					?>
				</td>
	   </table>
	 </td>
</tr>
 </table>


    <h1 style="width:100%; text-align:center; padding-top: 100px;margin-top: 0px; margin-bottom: 0px;"><b>Customer Ratings</b></h1><br>
<table class="brand-table" width="500px" height="300px" style="margin-left:auto; margin-right:auto;">
<tr>
	<td width ="250px" style="background-color: #4b3832; color:#ffffff"> Staff Service</td>
	<td style= "text-align: center;">
		<?php
			$query = "SELECT AVG(rate.staff_service) as avg FROM rate WHERE brand_id= $brand_id";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			echo round($row['avg'],2);
		?>&nbsp;&nbsp;
	</td>
</tr>
<tr>
	<td style="background-color: #4b3832; color:#ffffff">Accessibility</td>
	<td style= "text-align: center;">	<?php
			$query = "SELECT AVG(rate.accessibility) as avg FROM rate WHERE brand_id= $brand_id";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			echo round($row['avg'],2)
		?>&nbsp;&nbsp;
	 </td>
</tr>
<tr>
	<td style="background-color: #4b3832; color:#ffffff"> Convenience</td>
	<td style= "text-align: center;"><?php
			$query = "SELECT AVG(rate.convenience) as avg FROM rate WHERE brand_id= $brand_id";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			echo round($row['avg'],2)
		?>&nbsp;&nbsp; </td>
</tr>
<tr>
	<td style="background-color: #4b3832; color:#ffffff">Taste&Menu</td>
	<td style= "text-align: center;"><?php
			$query = "SELECT AVG(rate.taste_menu) as avg FROM rate WHERE brand_id= $brand_id";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			echo round($row['avg'],2)
		?>&nbsp;&nbsp; </td>
</tr>
<tr>
	<td style="background-color: #4b3832; color:#ffffff">Price</td>
	<td style= "text-align: center;"><?php
			$query = "SELECT AVG(rate.price) as avg FROM rate WHERE brand_id= $brand_id";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			echo round($row['avg'],2)
		?> &nbsp;&nbsp;</td>
</tr>
<tr>
	<td style="background-color: #4b3832; color:#ffffff"> Additional_Service</td>
	<td style= "text-align: center;"><?php
			$query = "SELECT AVG(rate.additional_service) as avg FROM rate WHERE brand_id= $brand_id";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			echo round($row['avg'],2)
		?>&nbsp;&nbsp;</td>
</tr>
<tr>
	<td style="background-color: #4b3832; color:#ffffff"> Service_Favorability</td>
	<td style= "text-align: center;"><?php
			$query = "SELECT AVG(rate.service_favorability) as avg FROM rate WHERE brand_id= $brand_id";
			$result = $conn->query($query);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			echo round($row['avg'],2)
		?>&nbsp;&nbsp;</td>
</tr>

</table>

<table style=" width:100%; padding-top:100px; padding-bottom:50px"><tr><td>
    <h1>
			<?php
				$query = "SELECT age.age,sex.sex_name, AVG(rate.staff_service+rate.accessibility+rate.convenience+rate.taste_menu+rate.price+rate.additional_service+rate.service_favorability) as avg
									FROM rate, customer,age, sex
									WHERE customer.customer_id=rate.customer_id AND brand_id=$brand_id AND age.age_id=customer.age_id AND sex.sex_id=customer.sex_id
									GROUP BY customer.sex_id, customer.age_id
								  ORDER BY avg DESC limit 1";
				$result = $conn->query($query);
				$row = $result->fetch_array(MYSQLI_ASSOC);
				?>

				<table style="text-align:center; margin-left:auto; margin-right:auto;" >
				<tr >
				<td style="border: 5px solid #be9b7b; width:200px;height: 70px" >
					<?php
				if(!empty($row['sex_name']))
				echo $row['sex_name'];?>
				</td>
				
				<td style="width:50px; text-align: center">in</td>
				<td style="border: 5px solid #be9b7b; width:190px;height: 70px" ><?php 
				if(!empty($row['age']))
				echo $row['age'];?>
			</td>
				<td style=" width:320px;height: 70px">
				<?php
				echo 'prefer this brand :)';?>
			</td>
				</tr></table>
		</b></h1>
		</td></tr></table>

</body>
