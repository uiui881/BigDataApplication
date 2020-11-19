<?php

include "header.php";
?>

<?php
    //transaction 넣으면 좋을 것
    $company_id = $_GET['idx'];
    echo $company_id;
	$query_del = "DELETE FROM company WHERE company_id=$company_id";
	$result = mysqli_query($conn, $query_del);
	$query_del = "DELETE FROM profitability WHERE company_id=$company_id";
	$result = mysqli_query($conn, $query_del);
	$query_del = "DELETE FROM stability WHERE company_id=$company_id";
	$result = mysqli_query($conn, $query_del);

		if ( $result ){

		?>
			<script>alert("delete success");
		location.replace('./index_DB.php');</script>
		<?php		

		}else{
		?>
			<script>alert("존재하지 않는 상호 입니다.")history.go(-1);</script>
		<?php
		}
		?>
		