<?php

include "header.php";

if (!empty($_POST['customer_id'])){
	$customer_id = $_POST['customer_id'];
	$nickname = $_POST['nickname'];

	$query_id = "SELECT * FROM customer WHERE customer_id= $customer_id ";

	$result = $conn->query($query_id);

	if( $result ){
		$row = $result->fetch_array(MYSQLI_ASSOC);
		if( $row['nickname'] == $nickname ){

			$_SESSION['customer_id'] = $customer_id;

			?>
			<script>alert("login success");</script>
			<?php
			header("Location: index_DB.php");

		}else{
			?>

			<div style="text-align:center; padding-top: 100px">
				<?php echo "nickname is invalid</br>please try again";?>
				<div style='padding-top: 10px; text-align: center;'>
					<button>
						<a style="color:black" href="./index_DB.php" role="button">back to login</a>
					</button>
				</div>
			</div>
			<?php
		}
	}else{
		?>
		<div style="text-align:center; padding-top: 100px">
			<?php echo "customer_id is invalid</br>please try again";?>
			<div style='padding-top: 10px; text-align: center;'>
				<button class="btn btn-secondary">
					<a style="color:black" href="./index_DB.php" role="button">back to login</a>
				</button>
			</div>
			<?php

		}

	}else{
		?>

		<body>
			<div id="learning-automated-div" style="text-align: center; font-size: 48px; line-height: 52px; padding: 200px 5px 200px 5px;">

				<span style="color:#FFFFFF;">
					<b> LOGIN PAGE </b>
				</span>
			</div>

			<main role="main">
				<div class="album py-5 bg-light">
					<div class="container" style="text-align:center; padding-top:50px; padding-bottom:200px;">
						<form class="form-signin" style="padding-left:200px; padding-right:200px;" name="user_login" method="post" action="./login.php">
							<img class="mb-4" src="./ImageForDB/Logo.png" alt="" width="216" height="216">
							<h1 style="padding-bottom: 10px">Please sign in</h1>

							<input style="padding-bottom: 10px; font-size:17px; height:40px" type="text" name="customer_id", class="form-control" placeholder="customer_id" required autofocus>

							<input style="padding-bottom: 10px; font-size:17px; height:40px" type="text" name="nickname" class="form-control" placeholder="nickname" required>

						</br>
						<button class="btn btn-lg btn-outline-secondary"  type="submit" value="login">Sign in</button>
						<a class="btn btn-lg btn-outline-secondary" href="admin.php">Sign in as admin</a>
						<p style="padding-top:10px;">Don't have an account? <a style="color:red" href="register.php">Sign up now</a>.</p>
					</form>
				</div>
			</div>
		</main>
	</body>
	</html>


	<?php

}

?>