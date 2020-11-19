<?php
    include "header.php";
?>

<style>
.mypage-table {
  border-collapse: collapse;
}

.mypage-table td {
  border: 1px solid #be9b7b;
  padding: 8px;
  background-color:white;
}

.mypage-table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4b3832;
  color: white;
  border: 1px solid #be9b7b;
  padding: 8px;
}
</style>

<?php
    $customer_name = $_GET['name'];
    echo '<table style="width:80%; margin-left:auto; margin-right:auto; padding-top:50px;"><tr><td><h1>'.$row['nickname']."님".'</h1>';
    $sql = "SELECT * FROM customer, sex, age WHERE customer_id=$customer_id and customer.sex_id = sex.sex_id and customer.age_id = age.age_id;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo '<tr><td><h3>('.$row['sex_name'].' in '.$row['age'].')</h3></td></tr></table>';

    
    $sql = "SELECT * FROM customer, rate, brand WHERE customer.customer_id=$customer_id and customer.customer_id = rate.customer_id and rate.brand_id = brand.brand_id;";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)) {
        
        echo '<h3 style="padding-left:10%; padding-top:10px">'.$row['brand_name'].'</h3>';
        echo '<table class="mypage-table" style="width:80%; margin-left:auto; margin-right:auto; padding-top:100px; padding-bottom:50px">';
        echo '<tr style="background-color:#4b3832; color:white;"><th style="padding-top:5px; padding-bottom:5px">Staff Service</th>
        <th>Accessibility</th><th>Convenience</th><th>Taste&Menu</th><th>Price</th><th>Additional Service</th><th>Service Favorability</th></th>';
        echo '<tr style="border:1px solid #4b3832"><td style="text-align:center">'.$row['staff_service'].'</td>';
        echo '<td style="text-align:center">'.$row['accessibility'].'</td>';
        echo '<td style="text-align:center">'.$row['convenience'].'</td>';
        echo '<td style="text-align:center">'.$row['taste_menu'].'</td>';
        echo '<td style="text-align:center">'.$row['price'].'</td>';
        echo '<td style="text-align:center">'.$row['additional_service'].'</td>';
        echo '<td style="text-align:center">'.$row['service_favorability'].'</td></tr></table>';
    }
?>
