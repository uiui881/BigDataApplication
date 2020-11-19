<?php
include "header.php";
?>

<html>
<form action="signup.php" method="post">

<div style="padding-top: 100px; text-align: center;">
	<p style="font-size: 40pt; font-weight: bold">SIGN UP</p>
	<h1>ID : <input type ="text" name="customer_id" style="width: 300px; height: 30px;" required><br></h1>
	
	<h1>nickname : <input type ="text" name="nickname" style="width: 200px; height: 30px;"required><br></h1>

	<h1>password : <input type ="password" name="password" style="width: 200px; height: 30px;"required><br></h1>

	<input type="submit" style="background-color: #854442; color:#ffffff;height: 25pt; width: 100px" value="SIGNUP">
</div>
</form>

</html>
