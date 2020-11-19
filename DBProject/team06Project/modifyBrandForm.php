<?php

include "header.php";

$brand_id = $_GET['idx'];

?>

<html>
<head>
<style>
.update-submit{
  background-color: #854442;
  color:white;
  font-weight: bold;
  width:170px;
  height:30pt;
  font-size:20px;
  border-radius: 5px;
}
</style>

</head>
<body >

<form action="modifyBrandInfo.php?idx=<?php echo $brand_id; ?>" method="post" style="padding-top: 100px;">
<table style="margin-left:auto; margin-right:auto;">
  <tr><th colspan="2"><h1>Update Brand Details</h1></th></tr>
	<tr><td style="font-size:20px; padding:5px;">Opening Date : </td><td style="padding:5px;"><input type ="date" name="opening_date" style="height:20pt; width: 300px;" min="2010-01-01" max="2021-01-01" required></td></tr>
	<tr><td style="font-size:20px; padding:5px;">Number of Franchise : </td><td style="padding:5px;"><input type ="text" name="NumberOfFranchises" style="height:20pt; width: 300px;"></td></tr>
	<tr><td style="font-size:20px; padding:5px;">Number of Employees : </td><td style="padding:5px;"><input type ="text" name="NumberOfEmployees" style="height:20pt; width: 300px;"></td></tr>
  <tr><td style="font-size:20px; padding:5px;">Average Franchise Sales : </td><td style="padding:5px;"><input type ="text" name="AverageSales" style="height:20pt; width: 300px;"></td></tr>
  <tr><td style="font-size:20px; padding:5px;">Newly opened stores : </td><td style="padding:5px;"><input type ="text" name="Scheduled_To_Open" style="height:20pt; width: 300px;"></td></tr>
	<tr><td colspan="2" style="height:30px; width:200px; padding-top: 20px; text-align:center; font-size:20px;"><input type="submit" value="Update Brand" class="update-submit"></td></tr>
</form>
    <!--brand_id와 company_id는 우리가 집어넣어야함, 자동으로-->
    <!--개설일, 프랜차이즈 갯수, 직원수, schedule to open, to close, termination-->

</main>

</body>
</html>
