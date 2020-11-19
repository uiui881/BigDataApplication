<?php

include "header.php"; 

$company_id = $_GET['idx'];
?>

<form action="addBrand.php?idx=<?php echo $company_id; ?>" method="post" style="padding-top: 100px;">
<table style="margin-left:auto; margin-right:auto;">
    <tr><th colspan="2"><h1>Add Brand</h1></th></tr>
	<tr><td style="font-size:20px; padding:5px;">Name of brand : </td><td style="padding:5px;"><input type ="text" style="height:20pt; width: 300px;" name="new_brand_name"></td></tr>
    <tr><td style="font-size:20px; padding:5px;">Number of franchise : </td><td style="padding:5px;"><input type ="text" style="height:20pt;width: 300px;" name="franchises_num"></td></tr>
    <tr><td style="font-size:20px; padding:5px;">Number of employees : </td><td style="padding:5px;"><input type ="text" style="height:20pt;width: 300px;" name="employee_num" required></td><tr>
    <tr><td style="font-size:20px; padding:5px;">Opening date : </td><td style="padding:5px;"><input type ="date" name="opening_date" min="2010-01-01" max="2021-01-01" style="height:20pt; width: 300px;" required></td></tr>
    <tr><td style="font-size:20px; padding:5px;">Average Sales : </td><td style="padding:5px;"><input type ="text" style="height:20pt;width: 300px;" name="average_sales"></td></tr>
    <tr><td style="font-size:20px; padding:5px;">Average Sales per Area : </td><td style="padding:5px;"><input type ="text" style="height:20pt;width: 300px;" name="average_sales_per_area"></td></tr>
	<tr><td colspan="2" style="padding-top: 20px; text-align:center; font-size:20px; "><input type="submit" style="height:25pt; width: 120px; font-weight: bold;background-color: #854442; color:#ffffff; border-radius: 10px;" value="ADD BRAND"></td></tr>
</table>
</form>

    <!--brand_id와 company_id는 우리가 집어넣어야함, 자동으로-->
    <!--개설일, 프랜차이즈 갯수, 직원수, schedule to open, to close, termination-->

</main>

</body>
</html>