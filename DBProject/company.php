<?php

include "header.php";
//!isset($_GET['company_id'])
if(false){

	?>
	<script>alert("invalid company index");</script>
	<?php
	header("Location: index.php");

}else{

	$customer_id = $_SESSION['customer_id'];

	$company_id = $_GET['idx'];

	$query = "SELECT * FROM brand as b WHERE company_id=$company_id "; 
	$result = $conn->query($query);//회사 이름과 브랜드 찾기
	$count = mysqli_num_rows($result);
	//$row = array();
	//$num=0;
	while($count--){
		$row = $result->fetch_array(MYSQLI_ASSOC);
		echo $row['brand_name']."\n";
	}
	
	//회사 이름과 브랜드 찾기, 여러줄 나올 것, 그러므로 반드시 수정 필요

	$query_prof = "SELECT * FROM profitability where company_id= $company_id ";
    $result_prof = $conn->query($query_prof);
    $count = mysqli_num_rows($result);
    while($count--){
    	$row = $result_prof->fetch_array(MYSQLI_ASSOC);
    	echo $row['year']."\n";
    	echo $row['asset']."\n";
    	echo $row['sales']."\n";
    	echo $row['operatingprofit']."\n";

    }
	
	//여러줄 수정 요망

	$query_sta = "SELECT * FROM satability where company_id=$company_id ";
    $result_sta = $conn->query($query_sta);
    $count = mysqli_num_rows($result_sta); //매머드는 stablitily 정보가 없음
    while($count--){
    	$row = $result_sta->fetch_array(MYSQLI_ASSOC);
    	echo $row['year']."\n";
    	echo $row['capital']."\n";
    	echo $row['debt']."\n";
    	echo $row['debt_ratio']."\n";

    }

	?>


	<div id="learning-automated-div" style="text-align: center; font-size: 48px; line-height: 52px; padding: 200px 5px 200px 5px;">

		<span style="color:#000000;">
			<b><?php 
				$query = "SELECT * FROM company WHERE company_id= $company_id"; 
				$result = $conn->query($query);
				echo $row['company_name']; ?> </b>
		</span>
	</div>

	<main role="main">
		<div class="album py-5 bg-light">
			<div class="container" style="text-align:center; padding-top:50px; padding-bottom:200px;">
				<h2 style="margin-bottom: 30px;"> COMPANY INFO </h2> 

				<div class="row"> 
					<div class="col-6">
					<!--	<img class="card-img-top" width=200; src="<?php echo './posters/'.$row['filename'];?>" alt="Card image cap"> -->
					</br>
					<table class="table" style=""> <!--브랜드에 관한 테이블이 될 것-->
						<tr style=""> 
							<td width=80 style='text-align:center'>
								<?php echo "감독</td><td>" . $row['director']; ?> 
							</td> 
						</tr>
						<tr style="">
							<td width=80 style='text-align:center'>
								<?php echo "주연</td><td>" . $row['main_actor']; ?> 
							</td> 
						</tr>
						<tr style="">
							<td width=80 style='text-align:center'> 
								<?php echo "장르</td><td>" . $row_idx['genre']; ?> 
							</td> 
						</tr>
						<tr style="">
							<td width=80 style='text-align:center'> <?php 
							echo "상영시간</td><td>" . $row['running_time']; ?> 
						</td>
					</tr>
				</table> 
			</div>
			<div class="col-6">
					<!--	<img class="card-img-top" width=200; src="<?php echo './posters/'.$row['filename'];?>" alt="Card image cap"> -->
					</br>
					<table class="table" style=""> <!--브랜드에 관한 테이블이 될 것-->
						<tr style=""> 
							<td width=80 style='text-align:center'>
								<?php echo "자산</td><td>" . $row['director']; ?> 
							</td> 
						</tr>
						<tr style="">
							<td width=80 style='text-align:center'>
								<?php echo "자본</td><td>" . $row['main_actor']; ?> 
							</td> 
						</tr>
						<tr style="">
							<td width=80 style='text-align:center'> 
								<?php echo "부채</td><td>" . $row_idx['genre']; ?> 
							</td> 
						</tr>
						<tr style="">
							<td width=80 style='text-align:center'> <?php 
							echo "매출액</td><td>" . $row['running_time']; ?> 
						</td>
					</tr>
					<tr style="">
							<td width=80 style='text-align:center'> <?php 
							echo "영업이익</td><td>" . $row['running_time']; ?> 
						</td>
					</tr>
				</table> 
			</div>


			<div class="col-6">
				<form class="form-horizontal" role="form" name="user_review" method="post" action="writereview.php">

					<table>
						<div class="form-group">

							<h1> COMPANY RATE </h1>
						</div>
						<div class="form-group">  <!--누적 매출액, 누적 영업이익을 위한 곳-->

							<?php 

							$query = "SELECT movie_rating, age, gender FROM movie_review WHERE movie_idx='$idx' GROUP BY movie_idx";
							$result = $conn->query($query);
							$row2 = $result->fetch_array(MYSQLI_ASSOC);

							echo "<h4>☆☆ 평점 : " . $row2['movie_rating']." ☆☆</h4>"; ?> 
						</div>
						<div>  <!--부채비율-->
							<h4> 
								<?php 
								if($row2['gender']=="f"){
									echo " 이 영화를 " . $row2['age']."대 여성들이 좋아합니다";
								}else{
									echo " 이 영화를 " . $row2['age']."대 남성들이 좋아합니다";
								}?> 
							</h4>
						</div>
						<div class="form-group">
						</br></br>
						<h1> ADD REVIEW </h1>
					</div>
					<div class="form-group">

						<h4>
							RATING
						</h4>
						<input class="form-control" placeholder="Score" type="text" name="movie_rating">


					</div>
					<div class="form-group">
					</br>
					<h4>
						REVIEW
					</h4>
					<textarea class="form-control" placeholder="Text input" type="text" name="movie_review"> </textarea>

				</div>
				<div class="form-group">

					<input type="hidden" name="movie_idx" value="<?php echo $row['movie_idx']?>">
					<input type="hidden" name="movie_title" value="<?php echo $row['movie_title']?>">
					<input class="form-control" type="submit" value="추가">
				</div>

			</table>
		</form>

	</br></br>
	<h1> USER REVIEW </h1>
</br>
<?php

$query_info = "SELECT * FROM user_review WHERE movie_idx='$idx'";

$result = $conn->query($query_info);

while($row = $result->fetch_array(MYSQLI_ASSOC)){
	?>
	<table class="table">
		<tr style=""> 
			<td width=80 style='text-align:center'>
				<?php echo "USER ID</td><td>" . $row['user_id']; ?> 
			</td>
		</tr>
		<tr style="">
			<td width=80 style='text-align:center'> 
				<?php echo "RATING</td><td>" . $row['movie_rating']; ?> 
			</td> 
		</tr>
		<tr style="">
			<td width=80 style='text-align:center'> 
				<?php echo "REVIEW</td><td>" . $row['movie_review']; ?>
			</td>
		</tr>
	</table> 
<?php 

}

?>
<?php 
		$query = "SELECT AVG(movie_rating) FROM user_review WHERE movie_idx='$idx' GROUP BY movie_idx";
		$result = $conn->query($query);
		$row2 = $result->fetch_array(MYSQLI_ASSOC);
		echo "사용자 평균 평점은 "?><b><?php echo $row2['AVG(movie_rating)']?></b><?php echo "점 입니다.";?><br>
		<?php
		$query = "SELECT ifnull(COUNT(user_id),0) FROM user_review WHERE movie_idx='$idx' GROUP BY movie_idx";
		$result = $conn->query($query);
		$row3 = $result->fetch_array(MYSQLI_ASSOC);
		echo "총 ".$row3['ifnull(COUNT(user_id),0)']."명의 사용자가 후기를 남겼습니다.\n";
		
	
	?><br>

</br>
<h1> MOVIE SCREEN INFO </h1>
</br>
<table class="table">
	<?php

	$query_info = "SELECT t.theater_idx, t.theater_name FROM theater_info as t JOIN screen_info as s ON t.theater_idx=s.theater_idx WHERE movie_idx='$idx'";

	$result = $conn->query($query_info);

	while($row = $result->fetch_array(MYSQLI_ASSOC)){

		?>
		<tr style="">
			<td width=80 style='text-align:center'> 
				<?php echo $row['theater_name']."\t"; ?> 
			</td>
		</tr>
		<?php

	}
	?>
</table>
<?php

}
?>

</div>
</div>
</div>
</div>
</main>

</body>
</html>