<?php

include "header.php";
?>
<?php
$company_id = $_GET['idx'];
$new_brand_name = $_POST['new_brand_name'];
$NumberOfFranchises = $_POST['franchises_num'];
$NumberOfEmployees = $_POST['employee_num'];
$opening_date = $_POST['opening_date'];
$average_sales = $_POST['average_sales'];
$average_sales_per_area = $_POST['average_sales_per_area'];

$sql ="select max(brand_id) as max from brand";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
$new_brand_id = $row['max']+1;
echo $new_brand_id;
echo $new_brand_name;
echo $company_id;

try{
	$conn->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
	 $conn->autocommit(FALSE);
	
	 $sql = "INSERT into brand(brand_id, brand_name, company_id) values($new_brand_id, '$new_brand_name', $company_id)";
	$result_1 = mysqli_query($conn, $sql);

	if(!$result_1){
		$conn->rollback();?>
	 	<script>alert('이상');
	 	location.replace('./company.php?idx=<?php echo $company_id;?>');</script><?php
	}

	if(!is_numeric($NumberOfFranchises)||!is_numeric($NumberOfEmployees)||!is_numeric($average_sales)||!is_numeric($average_sales_per_area)){
	 	
	 	$conn->rollback();?>
	 	<script>alert('이상');
	 	location.replace('./company.php?idx=<?php echo $company_id;?>');</script><?php
	 }

	$sql = "INSERT into current_situation(brand_id, opening_date, NumberOfFranchises, NumberOfEmployees, averagesales, average_sales_per_area) values($new_brand_id, '$opening_date', $NumberOfFranchises, $NumberOfEmployees, $average_sales, $average_sales_per_area )";
	$result_2 = mysqli_query($conn, $sql);
	
	if(!$result_2){
		$conn->rollback();?>
	 	<script>alert('이상');
	 	location.replace('./company.php?idx=<?php echo $company_id;?>');</script><?php
	}
	$conn -> commit();
	$conn -> autocommit(TRUE);?>
	
	<script>
		alert('새 브랜드가 추가되었습니다');
		location.replace('./company.php?idx=<?php echo $company_id?>');</script>
<?php
}catch(Exception $e){
   		 $conn->rollback();
          ?>
          <script> alert('이상');</script>
   		<?php $conn->autocommit(TRUE);
}finally{
         $conn->autocommit(TRUE);
}
	?>


</main>

</body>
</html>