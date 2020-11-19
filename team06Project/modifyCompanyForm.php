<?php

include "header.php";

$company_id = $_GET['idx'];

?>

<style>
	.update-submit{
	  background-color: #854442;
	  color:white;
	  font-weight: bold;
	  width:200px;
	   height:30pt;
	   font-size:20px;
	   border-radius: 10px;
	}
</style>

<form action="modifyCompanyInfo.php?idx=<?php echo $company_id; ?>" method="post" style="padding-top: 100px;">
<table style="margin-left:auto; margin-right:auto;">
	<tr><th colspan="2"><h1>Update Company Details</h1></th></tr>
	<tr><td style="padding:5px; text-align:left; font-size:20px;">Asset  :</td> <td style="padding:5px;"><input type ="text" name="asset" style="height:20pt; width: 300px;"></td></tr>
	<tr><td style="padding:5px; text-align:left; font-size:20px;">Sales  : </td> <td style="padding:5px;"><input type ="text" name="sales" style="height:20pt; width: 300px;"></td></tr>
	<tr><td style="padding:5px; text-align:left; font-size:20px;">Operating Profit :</td> <td style="padding:5px;"><input type ="text" name="operatingprofit" style="height:20pt; width: 300px;"></tr>
	<tr><td colspan="2" style="padding:5px; padding-top: 20px; text-align:center; font-size:20px;"><input type="submit" class="update-submit"value="Update Company"></td></tr>
</table>
</form>

    <!--brand_id와 company_id는 우리가 집어넣어야함, 자동으로-->
    <!--개설일, 프랜차이즈 갯수, 직원수, schedule to open, to close, termination-->


</main>

</body>
</html>
