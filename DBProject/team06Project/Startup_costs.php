<?php

include "header.php";

?>


<head>
<style>
    .radio_group{
      border-color:#3c2f2f;
      background-color: white;
      overflow:scroll;
      width:1000px;
      height:250px;
      margin-left:100px;
      color:black;
    }

.starupcost-table {
  border-collapse: collapse;
  margin-left:auto;
  margin-right:auto;
}

.starupcost-table td {
  border: 1px solid #be9b7b;
  padding: 8px;
  background-color:white;
}

.starupcost-table th {
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

<table style="width:100%; padding-top:50px; padding-bottom:50px; margin-left:auto; margin-right:auto; text-align:center;">
<tr><td><h1>Please select the brand you want to start up</h1></tr></td>
<tr><td><form action="/startup_costs.php">
  
    <?php
    	$sql = "SELECT * FROM brand;";
    	$result = mysqli_query( $conn, $sql );
    	$count = mysqli_num_rows($result);
    	$i=1;
    	?>
		<!--<form method = "post" action="cost_action.php" >-->
      	<select name="brand_cost" style="width:500px; height: 35px">
      		<?php 
      			while($count--){
      				$row = $result->fetch_array(MYSQLI_ASSOC);
      				echo '<option value="'.$row['brand_name'].'" id ="'.$i++.'">'.$row['brand_name'].'</option>';
      			}
      		?>
      </select>
       <input type="submit" value="check the amount" style="width:150px; background-color:#854442; color:#ffffff; height: 35px; font-size:14px; border-radius: 7px">
    </form></td></tr>
  <!--</form>-->

<tr><td>
<?php

   if(empty($_GET['brand_cost'])){

   }else{
  	$brand_name =$_GET['brand_cost'];
  	$sql = "SELECT * FROM brand where brand_name = '$brand_name' ";
    $result = mysqli_query( $conn, $sql );
    $row = mysqli_fetch_array($result);
    $brand_id = $row['brand_id'];

 	$sql = "SELECT * from opening_cost where brand_id = $brand_id";
 	$result = mysqli_query( $conn, $sql );
 	$row = mysqli_fetch_array($result);
 	?>     
 	<h2><?php echo ' It\'s the cost of starting '.$brand_name.' franchise.' ?></h2>
</td></tr>


  <!--<p style="text-align: right; margin : auto"><?php echo '(unit: 천원)'?></p>-->
  <tr><td>
 	<table class="starupcost-table">
 		<tr>
 			<td style="width : 150px; height: 50px; background-color: #4b3832; color: #ffffff;">Subscription fee</td>
 			<td style="width : 150px; height: 50px;background-color: #4b3832; color: #ffffff;">Education fee</td>
 			<td style="width : 150px; height: 50px;background-color: #4b3832; color: #ffffff;">Deposit fee</td>
 			<td style="width : 150px; height: 50px;background-color: #4b3832; color: #ffffff;">Extra fee</td>
 			<td style="width : 150px; height: 50px;background-color: #4b3832; color: #ffffff;">Standard area</td>
 		</tr>
 		<tr>
 			<td style="width : 100px; height: 50px;"><?php if(!empty($row['subscript_fee'])) { echo $row['subscript_fee']; } ?></td>
 			<td style="width : 100px; height: 50px;"><?php if(!empty($row['education_fee'])) { echo $row['education_fee']; }?></td>
 			<td style="width : 100px; height: 50px;"><?php if(!empty($row['deposit_fee'])) { echo $row['deposit_fee']; }?></td>
 			<td style="width : 100px; height: 50px;"><?php if(!empty($row['extra_fee'])) { echo $row['extra_fee']; } ?></td>
 			<td style="width : 100px; height: 50px;"><?php if(!empty($row['standard_area'])) { echo $row['standard_area']; } ?></td>
 		</tr>
     </table></table>
	 </td></tr>
	<?php	
}?>




</body>

</html>
