<?php

include "header.php";

?>

<?php
function del($company_id){
	$query_del = "delete FROM company WHERE company_id= '$company_id' ";
	$result = $conn->query($query_del);
	return;
}
?>

<head>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<title>Cafepedia - Company</title>
<style>
/* 아코디언 */
.panel {
	border: 1px solid #be9b7b;
}

.panel-table {
    border:none;
    border-collapse: collapse;
}

.panel-table th {
	font-size:5px;
	text-align:left;
	padding:3px 2px 2px 5px;
}
.panel-table td, .panel-table th{
    border-left: 1px solid #be9b7b;
    border-right: 1px solid #be9b7b;
}

.panel-table td:first-child, .panel-table th:first-child {
    border-left: none;
}

.panel-table td:last-child, .panel-table th:last-child {
    border-right: none;
}

.accordion {
  background-color: #3c2f2f;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 16px;
  font-weight: bold;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #be9b7b; 
}

.panel {
  display: none;
  background-color: white;
  overflow: hidden;
}


.panel-table td {
	font-size:16px;
	font-weight:bold;
	padding:3px 0px 5px 5px;
}

/* 그래프 */
.graph {
	width: 400px;
}

canvas {
	background-color:white;
	border: 2px solid #be9b7b;
	display: block;
}

/* 부채등급 */
.debt-table {
	border: 1px solid #be9b7b;
	padding: 8px;
}

.rate-icon {
	font-size: 150px;
	color: #854442;
}
</style>
</head>


<table style="width:100%; padding-top: 50px;"><tr>

<!-- 상호 이름 -->
<td style="width:50%;">
<?php
echo '<table style="margin-left:auto; margin-right:auto;">';
$company_id=$_GET['idx'];
$sql = "SELECT * FROM company WHERE company_id=$company_id;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo '<tr><td colspan="3"><h1 style="font-size:50px;">'.$row['company_name'].'</h1></td></tr>';
$path1 = 'location.href="./modifyCompanyForm.php?idx='.$row['company_id'].'"';
echo '<tr><td><input type="button" name= "modifie_button" value ="Update this company" onClick='.$path1.' style="background-color:#854442;color:white;padding: 6px; border-radius:5px"></td>';
$path2 = 'location.href="./deleteCompanyInfo.php?idx='.$row['company_id'].'"';
echo '<td><input type="button" name= "delete_button" value ="Delete this company" onclick='.$path2.' style="background-color:#4b3832;color:white;padding: 6px; border-radius:5px"></td>';
$path3 = 'location.href="./addBrandForm.php?idx='.$row['company_id'].'"';
echo '<td><input type="button" name= "add_brand_button" value = "Add a brand" onClick='.$path3.' style="background-color:#3c2f2f;color:white;padding: 6px; border-radius:5px"></td></tr>';
echo '</table>';
?>
</td>

<!-- 아코디언 -->
<td>
<?php
$sql2 = "SELECT brand.company_id, brand.brand_name, current_situation.opening_date, SUM(current_situation.NumberOfFranchises) as numfran, SUM(current_situation.NumberOfEmployees) as numemp, SUM(current_situation.AverageSales) as avsales, SUM(current_situation.Average_Sales_per_Area) as avesalesperarea
FROM current_situation, brand, company
WHERE current_situation.brand_id = brand.brand_id and company.company_id = brand.company_id and company.company_id = $company_id
GROUP BY brand.company_id, brand.brand_name WITH ROLLUP;";
$result2 = mysqli_query($conn, $sql2);
$num = mysqli_num_rows($result2);
$i = 1;
echo '<table style="width:60%; margin-left:auto; margin-right:auto;"><tr><td>';
while($row2 = mysqli_fetch_array($result2)) {	
	if($i >=$num-1) {
		echo '<button class="accordion" style="padding: 15px;">Total</button>';
		echo '<div class="panel">';
		echo '<table class="panel-table"  style="width: 100%;">';
		echo '<th >가맹점수</th><th>평균매출액</th><th>면적당평균매출액</th>';
		echo '<tr><td class="panel-td">'.$row2['numfran'].'</td><td class="panel-td">'.$row2['avsales'].'</td><td class="panel-td">'.$row2['avesalesperarea'].'</td></tr>';
		echo '</table>';
		echo '</div>';
	break;
	}
	else {
		echo '<button class="accordion" style="padding: 15px;">'.$row2['brand_name'].'</button>';
		echo '<div class="panel">';
		echo '<table class="panel-table" style="width:100%; text-algin:center;">';
		echo '<th>가맹사업 개시일</th>';
		echo '<tr><td class="panel-td">'.$row2['opening_date'].'</td></tr>';
		echo '<th style="border-top:1px solid #be9b7b">가맹점수</th><th style="border-top:1px solid #be9b7b">가맹본부 임직원수</th>';
		echo '<tr><td class="panel-td">'.$row2['numfran'].'</td><td class="panel-td">'.$row2['numemp'].'</td></tr>';
		echo '<th style="border-top:1px solid #be9b7b">평균매출액</th><th style="border-top:1px solid #be9b7b">면적당평균매출액</th>';
		echo '<tr><td class="panel-td">'.$row2['avsales'].'</td><td class="panel-td">'.$row2['avesalesperarea'].'</td></tr>';
		echo '</table>';
		echo '</div>';
	}
	$i++;
}
echo '</td></tr></table>';

echo '<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>';

?>	
</td></tr></table>

<!-- 그래프 -->

<table style="width:100%; padding-top: 100px;"><tr>
<!-- 자산 그래프 -->
<td>
<div class="graph" style="margin-left:auto; margin-right:auto;"><canvas id="myChart1"></canvas></div>
<?php
$asset18 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM profitability WHERE company_id=$company_id and yr=2018;"));
$asset19 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM profitability WHERE company_id=$company_id and yr=2019;"));
$asset20 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM profitability WHERE company_id=$company_id and yr=2020;"));
echo '<script> var ctx = document.getElementById("myChart1").getContext("2d");
var chart = new Chart(ctx, { 
	type: "line", 
	data: {
		labels: ["2018", "2019", "2020"], 
		datasets: [{ 
			label: "Asset",
			backgroundColor: "transparent", 
			borderColor: "#4b3832", 
			data: ['.$asset18['asset'].', '.$asset19['asset'].','.$asset20['asset'].'] }] 
	}, 
	options: {} }); 
	</script>';
?>
</td>

<!-- 매출액 그래프 -->
<td>
<div class="graph" style="margin-left:auto; margin-right:auto;"><canvas id="myChart2"></canvas></div>
<?php
$sales18 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM profitability WHERE company_id=$company_id and yr=2018;"));
$sales19 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM profitability WHERE company_id=$company_id and yr=2019;"));
$sales20 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM profitability WHERE company_id=$company_id and yr=2020;"));
echo '<script> var ctx = document.getElementById("myChart2").getContext("2d");
var chart = new Chart(ctx, { 
	type: "line", 
	data: {
		labels: ["2018", "2019", "2020"], 
		datasets: [{ 
			label: "Sales",
			backgroundColor: "transparent", 
			borderColor: "#4b3832", 
			data: ['.$sales18['sales'].', '.$sales19['sales'].','.$sales20['sales'].'] }] 
	}, 
	options: {} }); 
	</script>';
?>
</td>

<!-- 영업이익 그래프 -->
<td>
<div class="graph" style="margin-left:auto; margin-right:auto;"><canvas id="myChart3"></canvas></div>
<?php
$oprofit18 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM profitability WHERE company_id=$company_id and yr=2018;"));
$oprofit19 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM profitability WHERE company_id=$company_id and yr=2019;"));
$oprofit20 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM profitability WHERE company_id=$company_id and yr=2020;"));
echo '<script> var ctx = document.getElementById("myChart3").getContext("2d");
var chart = new Chart(ctx, { 
	type: "line", 
	data: {
		labels: ["2018", "2019", "2020"], 
		datasets: [{ 
			label: "Operationg Profit",
			backgroundColor: "transparent", 
			borderColor: "#4b3832", 
			data: ['.$oprofit18['operatingprofit'].', '.$oprofit19['operatingprofit'].','.$oprofit20['operatingprofit'].'] }] 
	}, 
	options: {} }); 
	</script>';
?>
</td></tr></table>

<!-- 줄바꿈 -->

<table style="width:70%; margin-left:auto; margin-right:auto; padding-top: 100px;"><tr>

<!-- 자본 그래프 -->
<td>
<div class="graph" style="margin-left:auto; margin-right:auto;"><canvas id="myChart4"></canvas></div>
<?php
$capital18 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM stability WHERE company_id=$company_id and yr=2018;"));
$capital19 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM stability WHERE company_id=$company_id and yr=2019;"));
$capital20 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM stability WHERE company_id=$company_id and yr=2020;"));
echo '<script> var ctx = document.getElementById("myChart4").getContext("2d");
var chart = new Chart(ctx, { 
	type: "line", 
	data: {
		labels: ["2018", "2019", "2020"], 
		datasets: [{ 
			label: "Capital",
			backgroundColor: "transparent", 
			borderColor: "#3c2f2f", 
			data: ['.$capital18['capital'].', '.$capital19['capital'].','.$capital20['capital'].'] }] 
	}, 
	options: {} }); 
	</script>';
?>
</td>

<!-- 부채 그래프 -->
<td>
<div class="graph" style="margin-left:auto; margin-right:auto;"><canvas id="myChart5"></canvas></div>
<?php
$debt18 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM stability WHERE company_id=$company_id and yr=2018;"));
$debt19 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM stability WHERE company_id=$company_id and yr=2019;"));
$debt20 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM stability WHERE company_id=$company_id and yr=2020;"));
echo '<script> var ctx = document.getElementById("myChart5").getContext("2d");
var chart = new Chart(ctx, { 
	type: "line", 
	data: {
		labels: ["2018", "2019", "2020"], 
		datasets: [{ 
			label: "Debt",
			backgroundColor: "transparent", 
			borderColor: "#3c2f2f", 
			data: ['.$debt18['debt'].', '.$debt19['debt'].','.$debt20['debt'].'] }] 
	}, 
	options: {} }); 
	</script>';
?>
</td></tr></table>

<!-- 줄 바꿈 -->

<table style="width:70%; margin-left:auto; margin-right:auto; padding-top: 100px;	"><tr>

<!-- 누적매출액 -->
<td>
<div class="graph" style="margin-left:auto; margin-right:auto;"><canvas id="myChart6"></canvas></div>
<?php
$sql3 = "SELECT company_id, yr, sales, SUM(sales) OVER(PARTITION BY company_id ORDER BY yr ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW) as accum
			FROM profitability WHERE company_id=$company_id;";
$result3 = mysqli_query($conn, $sql3);
$i=0;
while($row3 = mysqli_fetch_array($result3)) {
	$accum_sales[$i] = $row3['accum'];
	$i++;
}
echo '<script> 
var ctx = document.getElementById("myChart6"); 
var myChart = new Chart(ctx, {
	 type: "bar", 
	 data: { 
		 labels: ["2018", "2019", "2020"], 
		 datasets: [{ 
			 label: "Cumulative Sales", 
			 data: ['.$accum_sales[0].', '.$accum_sales[1].', '.$accum_sales[2].'],
			 backgroundColor: [ "rgba(190,155,123, 0.5)", "rgba(133,68,66, 0.5)", "rgba(60,47,47, 0.5)"],
			 borderColor: [ "rgba(190,155,123, 1)", "rgba(133,68,66, 1)", "rgba(60,47,47, 1)"],
			 borderWidth: 1 }] }, 
			 options: { scales: { yAxes: [{ ticks: { beginAtZero: true } }] } } }); 
</script>';
?>
</td>

<!-- 누적영업이익 -->
<td>
<div class="graph" style="margin-left:auto; margin-right:auto;"><canvas id="myChart7"></canvas></div>
<?php
$sql4 = "SELECT company_id, yr, operatingprofit, SUM(operatingprofit) OVER(PARTITION BY company_id ORDER BY yr ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW) as accum
			FROM profitability WHERE company_id=$company_id;";
$result4 = mysqli_query($conn, $sql4);
$i=0;
while($row4 = mysqli_fetch_array($result4)) {
	$accum_opprofit[$i] = $row4['accum'];
	$i++;
}
echo '<script> 
var ctx = document.getElementById("myChart7"); 
var myChart = new Chart(ctx, {
	 type: "bar", 
	 data: { 
		 labels: ["2018", "2019", "2020"], 
		 datasets: [{ 
			 label: "Cumulative Operating Profit", 
			 data: ['.$accum_opprofit[0].', '.$accum_opprofit[1].', '.$accum_opprofit[2].'],
			 backgroundColor: [ "rgba(190,155,123, 0.5)", "rgba(133,68,66, 0.5)", "rgba(60,47,47, 0.5)"],
			 borderColor: [ "rgba(190,155,123, 1)", "rgba(133,68,66, 1)", "rgba(60,47,47, 1)"],
			 borderWidth: 1 }] }, 
			 options: { scales: { yAxes: [{ ticks: { beginAtZero: true } }] } } }); 
</script>';
?>
</td></tr></table>

<!-- 줄바꿈 -->
<table style="padding-top: 100px; padding-bottom: 50px; margin-left:auto; margin-right:auto;"><tr><td>
<?php
$sql5 = "SELECT stability.company_id, debt, ntile(5) over(order by debt asc) as debt_rank
		FROM stability
		GROUP BY stability.company_id;";
$result5 = mysqli_query($conn, $sql5);
while($row5 = mysqli_fetch_array($result5)) {
	if($row5['company_id']==$company_id) {
		if($row5['debt_rank']==1) {
			echo '<table>';
			echo '<tr>';
			echo '<td rowspan="2"><i class="rate-icon material-icons">sentiment_very_satisfied</i></td>';
			echo '<td><h1>Debt scale</h1></td>';
			echo '</tr>';
			echo '<tr><td><h1 style="font-size:50px;">EXCELLENT</h1></td></tr>';
			echo '</table>';
	}
	elseif($row5['debt_rank']==2) {
			echo '<table>';
			echo '<tr>';
			echo '<td rowspan="2"><i class="rate-icon material-icons">sentiment_satisfied</i></td>';
			echo '<td><h1>Debt scale</h1></td>';
			echo '</tr>';
			echo '<tr><td><h1 style="font-size:50px;">VERY GOOD</h1></td></tr>';
			echo '</table>';
	}
	elseif($row5['debt_rank']==3) {
			echo '<table>';
			echo '<tr>';
			echo '<td rowspan="2"><i class="rate-icon material-icons">sentiment_dissatisfied</i></td>';
			echo '<td><h1>Debt scale</h1></td>';
			echo '</tr>';
			echo '<tr><td><h1 style="font-size:50px;">AVERAGE</h1></td></tr>';
			echo '</table>';
	}
	elseif($row5['debt_rank']==4) {
			echo '<table>';
			echo '<tr>';
			echo '<td rowspan="2"><i class="rate-icon material-icons">sentiment_very_dissatisfied</i></td>';
			echo '<td><h1>Debt scale</h1></td>';
			echo '</tr>';
			echo '<tr><td><h1 style="font-size:50px;">POOR</h1></td></tr>';
			echo '</table>';
	}
	elseif($row5['debt_rank']==5) {
			echo '<table>';
			echo '<tr>';
			echo '<td rowspan="2"><i class="rate-icon material-icons">mood_bad</i></td>';
			echo '<td><h1>Debt scale</h1></td>';
			echo '</tr>';
			echo '<tr><td><h1 style="font-size:50px;">BAD</h1></td></tr>';
			echo '</table>';
	}
break;
	}
};
?>
</td></tr></table>
</div>
</body>
</html>