<?php

include "header.php";

if (!empty($_POST['customer_id'])){
	$customer_id = $_POST['customer_id'];
	$password = $_POST['password'];

	$query_id = "SELECT * FROM customer WHERE customer_id= $customer_id ";

	$result = $conn->query($query_id);

		$row = $result->fetch_array(MYSQLI_ASSOC);
		if( $row['password'] == $password ){

			$_SESSION['customer_id'] = $customer_id;

			?>
			<script>alert("login success");location.replace('./index_DB.php')</script>
			<?php

		}else{
			?>
				<script>
				alert("invalid password!! try again please :) ");
				location.replace('./login.php')</script>
			<?php
			}
	}

	else{

		if(empty($_POST['customer_id'])){

		}else{
		$query_id = "SELECT * FROM customer WHERE customer_id= $customer_id ";

		$result = $conn->query($query_id);
		if(!$result){
			echo "customer_id is invalid</br>please try again";?>
			<div style='padding-top: 10px; text-align: center;'>

				<script>
				alert("invalid password!! retry again please :) ");
				location.replace('./login.php')</script>
			</div>
			<?php
		}}
		?>
			<?php 
	}
		?>


		<body>
			<main>
				<div>
					<div style="text-align:center; padding-top:50px; padding-bottom:200px;">
						<form style="padding-top:70px;" name="login" method="post" action="./login.php">
							<div>
							<img src="./ImageForDB/Logo1.png" alt="" width = "300"style=" margin:auto">
							<h1 style="padding-bottom: 10px">Please sign in</h1>
						</div>
							<input style="padding-bottom: 10px; font-size:17px; height:40px; width: 300px;" type="text" name="customer_id", class="form-control" placeholder="customer_id" required autofocus>
							<br>
							<input style="padding-bottom: 10px; font-size:17px; height:40px;width: 300px; margin: 5px" type="password" name="password" class="form-control" placeholder="password" required>
							<br>
						<button class="btn"  type="submit" value="login" style="height: 25pt; width : 70px; margin: 5px; background-color: #854442; color: #ffffff; border-radius: 7px">Sign in</button>
						<p style="padding-top:10px;">Don't have an account? <a style="color:red" href="signupForm.php">Sign up now</a></p>
					</form>
				</div>
			</div>
		</main>
	</body>
	</html>


	<?php



?>