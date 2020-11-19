<?php

include "header.php";

?>

<?php
$customer_id = $_POST['customer_id'];
$nickname = $_POST['nickname'];
$password = $_POST['password'];

$sql ="insert into customer(customer_id, nickname, password) values(".
$customer_id.", '".$nickname."', '".$password."' )";
$result = mysqli_query($conn, $sql);


	if($result){
		?><script>
		alert('회원 가입을 축하합니다.');
		location.replace('./login.php');
		</script>
	<?php }
	else if(!$result){
		?><script>
		alert('회원가입 실패, 이미 존재하는 ID 입니다');
		location.replace('./signupForm.php');
		</script><?php
	}else{}
?>


</html>