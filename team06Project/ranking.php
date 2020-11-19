<?php

include "header.php"

?>

<style>
.ranking-table {
  border-collapse: collapse;
  margin-left:auto;
  margin-right:auto;
}

.ranking-table td {
  border: 1px solid #be9b7b;
  padding: 8px;
  background-color:white;
}

.ranking-table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4b3832;
  color: white;
  border: 1px solid #be9b7b;
  padding: 8px;
}

.submit{
  background-color: #854442;
  color:white;
  font-weight: bold;
  width:100px;
   height:35px;
   font-size:19px;
   border-radius: 10px;
}
select{
  font-size:20px;
}


</style>

<body>
<br>
<!--자산, 자본, 부채, 매출액, 영업이익이 가장 높은 상위 10개의 회사 순위순으로 출력-->
  <table style="padding-top:50px; width:100%; text-align:center;">
  <tr><td><p><h1>Company Ranking Top 10</h1></p></td></tr>  
  <form method = "post" action="ranking.php" >
  <tr><td><select name="drop_choice" id="type">
          <option value="Asset" id ="1">Asset</option>
          <option value="Capital" id = "2">Capital</option>
          <option value="Debt" id = "3">Debt</option>
          <option value="Sales" id = "4">Sales</option>
          <option value="Operating_Profit" id = "5">Operating Profit</option>
      </select>
  <input type="submit" value="Submit" class="submit" ></td></tr>
    </form>
    <br>
  
<tr><td>
<?php

    if (empty($_POST['drop_choice'])){
       
    } 
    else {
      $drop =$_POST['drop_choice'];
      $result = "DropBOX: {$drop}\n";
    
      if($drop =="Asset"){
        $sql1 = "SELECT   company_id,asset,(@rank := @rank + 1) AS rank
                FROM     profitability, (SELECT @rank := 0) r,company
                JOIN    company_name AS c_name
                WHERE company.company_id=profitability.company_id AND profitability.year=2020
                ORDER BY  asset;";

        $sql = "SELECT   company.company_id, profitability.asset,company.company_name ,rank() over (order by profitability.asset DESC) num
    from profitability, company
        where profitability.company_id=company.company_id AND profitability.yr=2020;";

      	$result = mysqli_query( $conn, $sql);

      	$i = 0;
        echo '<table class="ranking-table">';
        while ( $row = mysqli_fetch_array( $result )) {
          if($i=='0') {
      			  echo '<tr><th>Company Name</th><th>Asset</th></tr>';
      		}
          echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
      		echo '<td style="width:200px;">' . $row[ 'asset' ] . '</td></tr>';
      		$i++;
          if($i>9){
            break;
          }
      }
      echo '</table>';

    }
    elseif($drop =="Capital"){
      $sql = "SELECT company.company_id, stability.capital,company.company_name ,rank() over (order by stability.capital DESC) num
              from stability, company
              where stability.company_id=company.company_id AND stability.yr=2020;";

      $result = mysqli_query( $conn, $sql);

      $i = 0;
      echo '<table  class="ranking-table">';
      while ( $row = mysqli_fetch_array( $result )) {
        if($i=='0') {
            echo '<tr><th>Company Name</th><th>Capital</th></tr>';
        }
        echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
        echo '<td style="width:200px;">' . $row[ 'capital' ] . '</td></tr>';
        $i++;
        if($i>9){
          break;
        }
    }
    echo '</table>';
}
    elseif($drop=="Debt"){

          $sql = "SELECT   company.company_id, stability.debt,company.company_name ,rank() over (order by stability.debt DESC) num
                  from stability, company
                  where stability.company_id=company.company_id AND stability.yr=2020;";

          $result = mysqli_query( $conn, $sql);

          $i = 0;
          echo '<table class="ranking-table">';
          while ( $row = mysqli_fetch_array( $result )) {
            if($i=='0') {
                echo '<tr><th>Company Name</th><th>Debt</th></tr>';
            }
            echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
            echo '<td style="width:200px;">' . $row[ 'debt' ] . '</td></tr>';
            $i++;
            if($i>9){
              break;
            }
        }
        echo '</table>';

    }elseif($drop=="Sales"){
      $sql = "SELECT   company.company_id, profitability.sales,company.company_name ,rank() over (order by profitability.sales DESC) num
  from profitability, company
      where profitability.company_id=company.company_id AND profitability.yr=2020;";

      $result = mysqli_query( $conn, $sql);

      $i = 0;
      echo '<table class="ranking-table">';
      while ( $row = mysqli_fetch_array( $result )) {
        if($i=='0') {
            echo '<tr><th>Company Name</th><th>Sales</th></tr>';
        }
        echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
        echo '<td style="width:200px;">' . $row[ 'sales' ] . '</td></tr>';
        $i++;
        if($i>9){
          break;
        }
    }
    echo '</table>';

  }elseif($drop=="Operating_Profit"){
    $sql = "SELECT   company.company_id, profitability.operatingprofit,company.company_name ,rank() over (order by profitability.operatingprofit DESC) num
    from profitability, company
    where profitability.company_id=company.company_id AND profitability.yr=2020;";

    $result = mysqli_query( $conn, $sql);

    $i = 0;
    echo '<table class="ranking-table">';
    while ( $row = mysqli_fetch_array( $result )) {
      if($i=='0') {
        echo '<tr><th>Company Name</th><th>Operating Profit</th></tr>';
      }
      echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
      echo '<td style="width:200px;">' . $row[ 'operatingprofit' ] . '</td></tr>';
      $i++;
      if($i>9){
        break;
      }
  }
  echo '</table>';

  }
}

 ?>
</td></tr></table>

<!--group 정보 보여줌-->
<table style="padding-top:100px; width:100%; text-align:center;">
  <tr><td><p><h1>Group by Number of Franchise Stores</h1></p></td></tr>
  <tr><td><table class="ranking-table">
    <tr>
      <th>Group</th><th>Number of Franchise Stores</th>
    </tr>
    <tr>
      <td>1</td><td>0~120</td>
    </tr>
    <tr>
      <td>2</td><td>120~170</td>
    </tr>
    <tr>
      <td>3</td><td>170~300</td>
    </tr>
    <tr>
      <td>4</td><td>300~600</td>
    </tr>
    <tr>
      <td>5</td><td>600~</td>
    </tr>
  </table></td></tr>
</table>


<br>

<!--그룹별 회사 자산, 매출액, 영업이익 순위 보여줌-->
<table style="padding-top:100px; width:100%; text-align:center;">
  <tr><td><p><h1>Company Ranking & Group</h1></p></td></tr>
  <form method = "post" action="ranking.php" >
    <tr><td><select name="drop_choice2" id="type2">
        <option value="Asset" id ="as">Asset</option>
        <option value="Sales" id = "sa">Sales</option>
        <option value="Operating_Profit" id = "op">Operating Profit</option>
    </select>
     <input type="submit" value="Submit"  class="submit" ></td></tr>
  </form>
  <tr><td>
<?php

    if (empty($_POST['drop_choice2'])){

      } else {
        $drop2 =$_POST['drop_choice2'];
        $result = "DropBOX: {$drop2}\n";

      if($drop2 =="Asset"){


          $sql = "SELECT company.company_name, franchisesnumsum.Name_exp_3, rank() over(PARTITION by franchisesnumsum.Name_exp_3
                  ORDER by profitability.asset desc ) AS ranking, profitability.asset
                  FROM company, franchisesnumsum, profitability
                  WHERE company.company_id = franchisesnumsum.company_id
                  and company.company_id = profitability.company_id and profitability.yr=2020;";

      	$result = mysqli_query( $conn, $sql);

      	$i = 0;
        echo '<br><table class="ranking-table">';
        while ( $row = mysqli_fetch_array( $result )) {
          if($i=='0') {
      			  echo '<tr><th>Group</th><th>Company Name</th><th>Asset</th></tr>';
      		}
            echo '<td style="width:200px;">' . $row[ 'Name_exp_3' ] . '</td>';
          echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
      		echo '<td style="width:200px;">' . $row[ 'asset' ] . '</td></tr>';
      		$i++;

      }
      echo '</table>';

    }elseif($drop2 =="Sales"){

      $sql = "SELECT company.company_name, franchisesnumsum.Name_exp_3, rank() over(PARTITION by franchisesnumsum.Name_exp_3
              ORDER by profitability.sales desc ) AS ranking, profitability.sales
              FROM company, franchisesnumsum, profitability
              WHERE company.company_id = franchisesnumsum.company_id
              and company.company_id = profitability.company_id and profitability.yr=2020;";

      $result = mysqli_query( $conn, $sql);

      $i = 0;
      echo '<br><table class="ranking-table">';
      while ( $row = mysqli_fetch_array( $result )) {
        if($i=='0') {
            echo '<tr><th>Group</th><th>Company Name</th><th>Sales</th></tr>';
        }
        echo '<td style="width:200px;">' . $row[ 'Name_exp_3' ] . '</td>';
        echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
        echo '<td style="width:200px;">' . $row[ 'sales' ] . '</td></tr>';
        $i++;

    }
    echo '</table>';
}
    elseif($drop2=="Operating_Profit"){
      $sql = "SELECT company.company_name, franchisesnumsum.Name_exp_3, rank() over(PARTITION by franchisesnumsum.Name_exp_3
              ORDER by profitability.operatingprofit desc ) AS ranking, profitability.operatingprofit
              FROM company, franchisesnumsum, profitability
              WHERE company.company_id = franchisesnumsum.company_id
              and company.company_id = profitability.company_id and profitability.yr=2020;";

          $result = mysqli_query( $conn, $sql);

          $i = 0;
          echo '<br><table class="ranking-table">';
          while ( $row = mysqli_fetch_array( $result )) {
            if($i=='0') {
                echo '<tr><th>Group</th><th>Company Name</th><th>Operating Profit</th></tr>';
            }
            echo '<td style="width:200px;">' . $row[ 'Name_exp_3' ] . '</td>';
            echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
            echo '<td style="width:200px;">' . $row[ 'operatingprofit' ] . '</td></tr>';
            $i++;

        }
        echo '</table>';

    }
  }

?>
</td></tr></table>

<table style="padding-top:100px; padding-bottom:50px; width:100%; text-align:center;">
<tr><td><h1 style="margin-left:100px">Top 1 in Asset, Sales, Operating Profit Of Each Groups</h1></td></tr>

<!--각 그룹별 자산, 매출액, 영업이익 1등 회사와 그 값-->
<tr><td>
<?php

  $sql = "SELECT company.company_name, franchisesnumsum.Name_exp_3, profitability.asset
          FROM company, franchisesnumsum, profitability
          WHERE company.company_id = franchisesnumsum.company_id and company.company_id = profitability.company_id and profitability.yr=2020
          AND franchisesnumsum.Name_exp_3=1
          ORDER by profitability.asset desc limit 1";

  $result = mysqli_query( $conn, $sql);

  $i = 0;
  echo '<table class="ranking-table">';
  while ( $row = mysqli_fetch_array( $result )) {
    if($i=='0') {
      echo '<tr><th>Group</th><th colspan="2">Asset</th><th colspan="2">Sales</th><th colspan="2">Operating Profit</th></tr>';
    }
    echo '<td style="width:200px;">' . $row[ 'Name_exp_3' ] . '</td>';
    echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
      echo '<td style="width:200px;">' . $row[ 'asset' ] . '</td>';
    $i++;


}

  $sql ="SELECT company.company_name, franchisesnumsum.Name_exp_3, profitability.sales
          FROM company, franchisesnumsum, profitability
          WHERE company.company_id = franchisesnumsum.company_id and company.company_id = profitability.company_id and profitability.yr=2020
          AND franchisesnumsum.Name_exp_3=1
          ORDER by profitability.sales desc limit 1;";

          $result = mysqli_query( $conn, $sql);

          $i = 0;
          while ( $row = mysqli_fetch_array( $result )) {

            echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
            echo '<td style="width:200px;">' . $row[ 'sales' ] . '</td>';
            $i++;


        }

        $sql ="SELECT company.company_name, franchisesnumsum.Name_exp_3, profitability.operatingprofit
                FROM company, franchisesnumsum, profitability
                WHERE company.company_id = franchisesnumsum.company_id and company.company_id = profitability.company_id and profitability.yr=2020
                AND franchisesnumsum.Name_exp_3=1
                ORDER by profitability.operatingprofit desc limit 1;";

                $result = mysqli_query( $conn, $sql);

                $i = 0;
                while ( $row = mysqli_fetch_array( $result )) {

                  echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
                  echo '<td style="width:200px;">' . $row[ 'operatingprofit' ] . '</td>';

                  $i++;


              }

//group2
        $sql = "SELECT company.company_name, franchisesnumsum.Name_exp_3, profitability.asset
                FROM company, franchisesnumsum, profitability
                WHERE company.company_id = franchisesnumsum.company_id and company.company_id = profitability.company_id and profitability.yr=2020
                AND franchisesnumsum.Name_exp_3=2
                ORDER by profitability.asset desc limit 1";

        $result = mysqli_query( $conn, $sql);

        $i = 0;
        echo '<tr>';
        while ( $row = mysqli_fetch_array( $result )) {
          echo '<td style="width:200px;">' . $row[ 'Name_exp_3' ] . '</td>';
          echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
            echo '<td style="width:200px;">' . $row[ 'asset' ] . '</td>';
          $i++;


        }

        $sql ="SELECT company.company_name, franchisesnumsum.Name_exp_3, profitability.sales
                FROM company, franchisesnumsum, profitability
                WHERE company.company_id = franchisesnumsum.company_id and company.company_id = profitability.company_id and profitability.yr=2020
                AND franchisesnumsum.Name_exp_3=2
                ORDER by profitability.sales desc limit 1;";

                $result = mysqli_query( $conn, $sql);

                $i = 0;
                while ( $row = mysqli_fetch_array( $result )) {

                  echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
                  echo '<td style="width:200px;">' . $row[ 'sales' ] . '</td>';
                  $i++;


              }

              $sql ="SELECT company.company_name, franchisesnumsum.Name_exp_3, profitability.operatingprofit
                      FROM company, franchisesnumsum, profitability
                      WHERE company.company_id = franchisesnumsum.company_id and company.company_id = profitability.company_id and profitability.yr=2020
                      AND franchisesnumsum.Name_exp_3=2
                      ORDER by profitability.operatingprofit desc limit 1;";

                      $result = mysqli_query( $conn, $sql);

                      $i = 0;
                      while ( $row = mysqli_fetch_array( $result )) {

                        echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
                        echo '<td style="width:200px;">' . $row[ 'operatingprofit' ] . '</td>';

                        $i++;


                    }

    //group3
    $sql = "SELECT company.company_name, franchisesnumsum.Name_exp_3, profitability.asset
            FROM company, franchisesnumsum, profitability
            WHERE company.company_id = franchisesnumsum.company_id and company.company_id = profitability.company_id and profitability.yr=2020
            AND franchisesnumsum.Name_exp_3=3
            ORDER by profitability.asset desc limit 1";

    $result = mysqli_query( $conn, $sql);

    $i = 0;
    echo '<tr>';
    while ( $row = mysqli_fetch_array( $result )) {
      echo '<td style="width:200px;">' . $row[ 'Name_exp_3' ] . '</td>';
      echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
        echo '<td style="width:200px;">' . $row[ 'asset' ] . '</td>';
      $i++;


    }

    $sql ="SELECT company.company_name, franchisesnumsum.Name_exp_3, profitability.sales
            FROM company, franchisesnumsum, profitability
            WHERE company.company_id = franchisesnumsum.company_id and company.company_id = profitability.company_id and profitability.yr=2020
            AND franchisesnumsum.Name_exp_3=3
            ORDER by profitability.sales desc limit 1;";

            $result = mysqli_query( $conn, $sql);

            $i = 0;
            while ( $row = mysqli_fetch_array( $result )) {

              echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
              echo '<td style="width:200px;">' . $row[ 'sales' ] . '</td>';
              $i++;


          }

          $sql ="SELECT company.company_name, franchisesnumsum.Name_exp_3, profitability.operatingprofit
                  FROM company, franchisesnumsum, profitability
                  WHERE company.company_id = franchisesnumsum.company_id and company.company_id = profitability.company_id and profitability.yr=2020
                  AND franchisesnumsum.Name_exp_3=3
                  ORDER by profitability.operatingprofit desc limit 1;";

                  $result = mysqli_query( $conn, $sql);

                  $i = 0;
                  while ( $row = mysqli_fetch_array( $result )) {

                    echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
                    echo '<td style="width:200px;">' . $row[ 'operatingprofit' ] . '</td>';

                    $i++;


                }

    //group4
    $sql = "SELECT company.company_name, franchisesnumsum.Name_exp_3, profitability.asset
            FROM company, franchisesnumsum, profitability
            WHERE company.company_id = franchisesnumsum.company_id and company.company_id = profitability.company_id and profitability.yr=2020
            AND franchisesnumsum.Name_exp_3=4
            ORDER by profitability.asset desc limit 1";

    $result = mysqli_query( $conn, $sql);

    $i = 0;
    echo '<tr>';
    while ( $row = mysqli_fetch_array( $result )) {
      echo '<td style="width:200px;">' . $row[ 'Name_exp_3' ] . '</td>';
      echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
        echo '<td style="width:200px;">' . $row[ 'asset' ] . '</td>';
      $i++;


    }

    $sql ="SELECT company.company_name, franchisesnumsum.Name_exp_3, profitability.sales
            FROM company, franchisesnumsum, profitability
            WHERE company.company_id = franchisesnumsum.company_id and company.company_id = profitability.company_id and profitability.yr=2020
            AND franchisesnumsum.Name_exp_3=4
            ORDER by profitability.sales desc limit 1;";

            $result = mysqli_query( $conn, $sql);

            $i = 0;
            while ( $row = mysqli_fetch_array( $result )) {

              echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
              echo '<td style="width:200px;">' . $row[ 'sales' ] . '</td>';
              $i++;


          }

          $sql ="SELECT company.company_name, franchisesnumsum.Name_exp_3, profitability.operatingprofit
                  FROM company, franchisesnumsum, profitability
                  WHERE company.company_id = franchisesnumsum.company_id and company.company_id = profitability.company_id and profitability.yr=2020
                  AND franchisesnumsum.Name_exp_3=4
                  ORDER by profitability.operatingprofit desc limit 1;";

                  $result = mysqli_query( $conn, $sql);

                  $i = 0;
                  while ( $row = mysqli_fetch_array( $result )) {

                    echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
                    echo '<td style="width:200px;">' . $row[ 'operatingprofit' ] . '</td>';

                    $i++;


                }


      //group5

      $sql = "SELECT company.company_name, franchisesnumsum.Name_exp_3, profitability.asset
              FROM company, franchisesnumsum, profitability
              WHERE company.company_id = franchisesnumsum.company_id and company.company_id = profitability.company_id and profitability.yr=2020
              AND franchisesnumsum.Name_exp_3=5
              ORDER by profitability.asset desc limit 1";

      $result = mysqli_query( $conn, $sql);

      $i = 0;
      echo '<tr>';
      while ( $row = mysqli_fetch_array( $result )) {
        echo '<td style="width:200px;">' . $row[ 'Name_exp_3' ] . '</td>';
        echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
          echo '<td style="width:200px;">' . $row[ 'asset' ] . '</td>';
        $i++;


      }

      $sql ="SELECT company.company_name, franchisesnumsum.Name_exp_3, profitability.sales
              FROM company, franchisesnumsum, profitability
              WHERE company.company_id = franchisesnumsum.company_id and company.company_id = profitability.company_id and profitability.yr=2020
              AND franchisesnumsum.Name_exp_3=5
              ORDER by profitability.sales desc limit 1;";

              $result = mysqli_query( $conn, $sql);

              $i = 0;
              while ( $row = mysqli_fetch_array( $result )) {

                echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
                echo '<td style="width:200px;">' . $row[ 'sales' ] . '</td>';
                $i++;


            }

            $sql ="SELECT company.company_name, franchisesnumsum.Name_exp_3, profitability.operatingprofit
                    FROM company, franchisesnumsum, profitability
                    WHERE company.company_id = franchisesnumsum.company_id and company.company_id = profitability.company_id and profitability.yr=2020
                    AND franchisesnumsum.Name_exp_3=5
                    ORDER by profitability.operatingprofit desc limit 1;";

                    $result = mysqli_query( $conn, $sql);

                    $i = 0;
                    while ( $row = mysqli_fetch_array( $result )) {

                      echo '<td style="width:200px;">' . $row[ 'company_name' ] . '</td>';
                      echo '<td style="width:200px;">' . $row[ 'operatingprofit' ] . '</td>';

                      $i++;
                  }


echo '</table>';

?>
</td></tr></table>

</body>

</html>
