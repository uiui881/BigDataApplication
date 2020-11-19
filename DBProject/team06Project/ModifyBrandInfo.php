<?php

include "header.php";
$brand_id = $_GET['idx'];
?>


<?php

   $opening_date = $_POST['opening_date'];
   $numOfFran = $_POST['NumberOfFranchises'];
   $numOfEmp = $_POST['NumberOfEmployees'];
   $avgSales = $_POST['AverageSales'];
   $OpenSoon = $_POST['Scheduled_To_Open'];
	 $query= "select * from brand where brand_id = $brand_id";
   $result = $conn-> query($query);
   $row = $result->fetch_array(MYSQLI_ASSOC);
	try{

   		$conn->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
          $conn->autocommit(FALSE);
         if($opening_date==null){
            $conn->rollback(); ?>
          <script> alert('이상');location.replace('./brandPage.php?idx=<?php echo $brand_id; ?>');</script>
         <?php
         }
   		$ans_1= "UPDATE current_situation SET opening_date = '".$opening_date."'  where brand_id = $brand_id";
   		$result_1 = $conn-> query($ans_1);


         if($numOfFran==null || !is_numeric($numOfFran)){
            $conn->rollback();
            ?>
          <script> alert('이상');location.replace('./brandPage.php?idx=<?php echo $brand_id; ?>');</script>
         <?php
         }
   		$ans_2= "UPDATE current_situation SET NumberOfFranchises = $numOfFran where brand_id = $brand_id";
   		$result_2 = $conn-> query($ans_2);


         if($numOfEmp==null || !is_numeric($numOfEmp)){
            $conn->rollback();
            ?>
          <script> alert('이상');location.replace('./brandPage.php?idx=<?php echo $brand_id; ?>');</script>
         <?php
         }
   
   		$ans_3= "UPDATE current_situation SET NumberOfEmployees = $numOfEmp where brand_id = $brand_id";
   		$result_3 = $conn-> query($ans_3);


      if($avgSales==null || !is_numeric($avgSales)){
         $conn->rollback();
         ?>
       <script> alert('이상');location.replace('./brandPage.php?idx=<?php echo $brand_id; ?>');</script>
      <?php
      }
   $ans_4= "UPDATE current_situation SET AverageSales = $avgSales where brand_id = $brand_id";
   $result_4 = $conn-> query($ans_4);

   if($OpenSoon==null || !is_numeric($OpenSoon)){
      $conn->rollback();
      ?>
    <script> alert('이상');location.replace('./brandPage.php?idx=<?php echo $brand_id; ?>');</script>
   <?php
   }
$ans_5= "UPDATE current_situation SET Scheduled_To_Open = $OpenSoon where brand_id = $brand_id";
$result_5 = $conn-> query($ans_5);



   		$conn->commit();
   		$conn -> autocommit(TRUE);?>
          <script> alert('<?php echo $row['brand_name'];?> 의 정보가 수정되었습니다.');</script>

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
</div>
</div>
</body>
</html>
  <script>
  location.replace('./brandPage.php?idx=<?php echo $brand_id; ?>');</script>
