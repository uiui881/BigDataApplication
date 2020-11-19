<?php

include "header.php";
?>

<?php
    $brand_id = $_GET['idx'];
	echo $brand_id;
	$query_del = "DELETE FROM brand WHERE brand_id=$brand_id";
	$result = mysqli_query($conn, $query_del);
	$query_del = "DELETE FROM current_situation WHERE brand_id=$brand_id";
	$result = mysqli_query($conn, $query_del);
	$query_del = "DELETE FROM opening_cost WHERE brand_id=$brand_id";
	$result = mysqli_query($conn, $query_del);
  $query_del = "DELETE FROM rate WHERE brand_id=$brand_id";
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
