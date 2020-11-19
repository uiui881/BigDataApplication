<?php session_start();
include "config.php";
?>

<!DOCTYPE html>
<meta charset="utf-8" />
<html>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<style>
    body {
    background-color: #fff4e6;
}


/* 네비게이션 바 */

#topnav {
    float: left;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

li {
    float: left;
}

li a,
.dropbtn {
    display: inline-block;
    color: #be9b7b;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover,
.dropdown:hover .dropbtn {
    color: #854442;
    text-decoration: none;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: fixed;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    font-size:12px;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #f1f1f1;
}

.dropdown:hover .dropdown-content {
    display: block; 
}
    </style>
</head>

<body>
	<nav id="topnav">
        <ul>
        <li style="width=50px"><a href="index_DB.php"><img src="./ImageForDB/Logo2.png" style="width: 50px;"></a></li>
            <li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Companies</a>
                <div class="dropdown-content">
				<?php
		       		 	$sql = "SELECT * FROM company;";
						$result = mysqli_query( $conn, $sql );
						$i = 0;
						echo '<table>';
          				while( $row = mysqli_fetch_array( $result ) ) {
							  if($i=='0') {
								  echo '<tr>';
							  }
							  echo '<td style="width:150px;"><a href="company.php?idx='.$row['company_id'].'">' . $row[ 'company_name' ] . '</a></td>';
							  $i++;
							  if($i == '4') {
								echo'</tr>';
								$i = 0;
							}
						  }
						  echo '</table>';
        			?>
                </div>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Brands</a>
                <div class="dropdown-content">
				<?php
		       		 	$sql = "SELECT * FROM brand;";
						$result = mysqli_query( $conn, $sql );
						$i = 0;
						echo '<table>';
          				while( $row = mysqli_fetch_array( $result ) ) {
							  if($i=='0') {
								  echo '<tr>';
							  }
							  echo '<td style="width:150px;"><a href="brandPage.php?idx='.$row['brand_id'].'">' . $row[ 'brand_name' ] . '</a></td>';
							  $i++;
							  if($i == '4') {
								echo'</tr>';
								$i = 0;
							}
						  }
						  echo '</table>';
						  ?>
                </div>
            </li>
            <li><a href="ranking.php">Rankings</a></li>
            <li><a href="Rate.php">Ratings</a></li>
            <li><a href="Startup_costs.php">Start-up costs</a></li>
            <?php 
             if(!isset($_SESSION['customer_id'])) { 
                ?>
                <li><a href="login.php"><i class="material-icons">account_circle</i></a></li>
            <?php }
            else{?>
                    <li><a href = "logout.php"><i class="material-icons">account_circle</i></a></li>

                    <?php 
                    $customer_id = $_SESSION['customer_id'];
                    $sql = "SELECT * from customer where customer_id=$customer_id";
                    $result = $conn -> query($sql);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    ?>
                    <a href="mypage.php?name=<?php echo $row['nickname'] ?>"><li style="color : #854442; font-size:10pt; font-weight: bold; "><br><?php echo $row['nickname']."님"; ?></li></a>
                    <?php
                } ?>
        </ul>
        </ul>
    	</nav>