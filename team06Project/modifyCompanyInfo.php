<?php

include "header.php";
$company_id = $_GET['idx'];
?>


<?php

   $asset = $_POST['asset'];
   $sales = $_POST['sales'];
   $operatingprofit = $_POST['operatingprofit'];
	$query= "select * from company where company_id = $company_id";
   $result = $conn-> query($query);
   $row = $result->fetch_array(MYSQLI_ASSOC);
	try{

   		$conn->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
        $conn->autocommit(FALSE);
         if($asset==null || !is_numeric($asset)){
            $conn->rollback(); ?>
          <script> alert('이상');location.replace('./company.php?idx=<?php echo $company_id; ?>');</script>
         <?php
         }
   		$ans_1= "UPDATE profitability SET asset = $asset  where company_id = $company_id and yr=2020";
   		$result_1 = $conn-> query($ans_1);

         if($sales==null || !is_numeric($sales)){
            $conn->rollback();
            ?>
          <script> alert('이상');location.replace('./company.php?idx=<?php echo $company_id; ?>');</script>
         <?php
         }
   		$ans_2= "UPDATE profitability SET sales = $sales where company_id = $company_id and yr=2020";
   		$result_2 = $conn-> query($ans_2);


         if($operatingprofit==null || !is_numeric($operatingprofit)){
            $conn->rollback();
            ?>
          <script> alert('이상');location.replace('./company.php?idx=<?php echo $company_id; ?>');</script>
         <?php
         }
   		$ans_3= "UPDATE profitability SET operatingprofit = $operatingprofit where company_id = $company_id and yr=2020";
   		$result_3 = $conn-> query($ans_3);



   		$conn->commit();
   		$conn -> autocommit(TRUE);?>
          <script> alert('<?php echo $row['company_name'];?> 의 정보가 수정되었습니다.');</script>

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
  location.replace('./company.php?idx=<?php echo $company_id; ?>');</script>
