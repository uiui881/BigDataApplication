<!--Accessibility -->
<table style="text-align:center; margin-left:auto; margin-right:auto">
        <form method = "post" action="Rate.php">
        <tr><td colspan="3"><h2>Accessibility</h2></td></tr>
        <tr><td><select name="age2" id="age2">
              <option value="10s">10~19</option>
              <option value="20s">20~29</option>
              <option value="30s">30~39</option>
              <option value="40s">40~49</option>
              <option value="50s">50~59</option>
              <option value="60s">60~69</option>
              <option value="70s">70~</option>
          </select>
          <select name="sex2" id="sex2">
              <option value="female">Female</option>
              <option value="male">Male</option>
          </select>
           <input type="submit" value="Submit" class="submit"></td></tr>
        </form>
      <tr><td colspan="3">  
 <?php
    if (empty($_POST['age2']) || empty($_POST['sex2'])){}
    else {
        $drop_age = $_POST['age2'];
        $drop_sex = $_POST['sex2'];
        if($drop_age =="10s"){
          if($drop_sex=="female"){
            $sql = "  SELECT brand.brand_name, AVG(rate.accessibility) as avg, DENSE_RANK() OVER (ORDER BY avg DESC) AS rank
            FROM rate, customer,brand
            WHERE rate.customer_id=customer.customer_id AND customer.sex_id=1 AND brand.brand_id=rate.brand_id AND customer.age_id=1
            GROUP BY rate.brand_id
            ORDER BY AVG(rate.accessibility) DESC;";

            $result = mysqli_query( $conn, $sql);

            $i = 0;
            echo '<table class="rate_table">';
            echo'<b>Top 5 Highly Rated Brands For 10-19 Female</b>';
            while ( $row = mysqli_fetch_array( $result )) {
              if($i=='0') {
                  echo '<tr><th>Rank</th><th>Brand Name</th><th>Rating</th></tr>';
              }
              echo '<td >' . $row[ 'rank' ] . '</td>';echo '<td >' . $row[ 'brand_name' ] . '</td>';
              echo '<td >' .round( $row[ 'avg' ],2) . '</td></tr>';
              $i++;
              if($i>4){
                break;
              }

            }
            echo '</table>';
          }else{
            $sql = "  SELECT brand.brand_name, AVG(rate.accessibility) as avg, DENSE_RANK() OVER (ORDER BY avg DESC) AS rank
            FROM rate, customer,brand
            WHERE rate.customer_id=customer.customer_id AND customer.sex_id=2 AND brand.brand_id=rate.brand_id AND customer.age_id=1
            GROUP BY rate.brand_id
            ORDER BY AVG(rate.accessibility) DESC;";

            $result = mysqli_query( $conn, $sql);

            $i = 0;
            echo '<table class="rate_table"  border=1>';
            echo'<b>Top 5 Highly Rated Brands For 10-19 Male</b>';
            while ( $row = mysqli_fetch_array( $result )) {

              if($i=='0') {
                  echo '<tr><th>Rank</th><th>Brand Name</th><th>Rating</th></tr>';
              }
              echo '<td >' . $row[ 'rank' ] . '</td>';echo '<td >' . $row[ 'brand_name' ] . '</td>';
              echo '<td >' .round( $row[ 'avg' ],2) . '</td></tr>';
              $i++;
              if($i>4){
                break;
              }
            }
            echo '</table>';
          }
        }elseif($drop_age=="20s"){
          if($drop_sex=="female"){

            $sql = "  SELECT brand.brand_name, AVG(rate.accessibility) as avg, DENSE_RANK() OVER (ORDER BY avg DESC) AS rank
            FROM rate, customer,brand
            WHERE rate.customer_id=customer.customer_id AND customer.sex_id=1 AND brand.brand_id=rate.brand_id AND customer.age_id=2
            GROUP BY rate.brand_id
            ORDER BY AVG(rate.accessibility) DESC;";

            $result = mysqli_query( $conn, $sql);

            $i = 0;
            echo '<table class="rate_table"  border=1>';
            echo'<b>Top 5 Highly Rated Brands For 20-29 Female</b>';
            while ( $row = mysqli_fetch_array( $result )) {
              if($i=='0') {
                  echo '<tr><th>Rank</th><th>Brand Name</th><th>Rating</th></tr>';
              }
              echo '<td >' . $row[ 'rank' ] . '</td>';echo '<td >' . $row[ 'brand_name' ] . '</td>';
              echo '<td >' .round( $row[ 'avg' ],2) . '</td></tr>';
              $i++;
              if($i>4){
                break;
              }

            }
            echo '</table>';
          }else{

            $sql = "  SELECT brand.brand_name, AVG(rate.accessibility) as avg, DENSE_RANK() OVER (ORDER BY avg DESC) AS rank
            FROM rate, customer,brand
            WHERE rate.customer_id=customer.customer_id AND customer.sex_id=2 AND brand.brand_id=rate.brand_id AND customer.age_id=2
            GROUP BY rate.brand_id
            ORDER BY AVG(rate.accessibility) DESC;";

            $result = mysqli_query( $conn, $sql);

            $i = 0;
            echo '<table class="rate_table"  border=1>';
            echo'<b>Top 5 Highly Rated Brands For 20-29 Male</b>';
            while ( $row = mysqli_fetch_array( $result )) {
              if($i=='0') {
                  echo '<tr><th>Rank</th><th>Brand Name</th><th>Rating</th></tr>';
              }
              echo '<td >' . $row[ 'rank' ] . '</td>';echo '<td >' . $row[ 'brand_name' ] . '</td>';
              echo '<td >' .round( $row[ 'avg' ],2) . '</td></tr>';
              $i++;
              if($i>4){
                break;
            }
          }
            echo '</table>';

          }
        }elseif($drop_age=="30s"){
          if($drop_sex=="female"){

            $sql = "  SELECT brand.brand_name, AVG(rate.accessibility) as avg, DENSE_RANK() OVER (ORDER BY avg DESC) AS rank
            FROM rate, customer,brand
            WHERE rate.customer_id=customer.customer_id AND customer.sex_id=1 AND brand.brand_id=rate.brand_id AND customer.age_id=3
            GROUP BY rate.brand_id
            ORDER BY AVG(rate.accessibility) DESC;";

            $result = mysqli_query( $conn, $sql);

            $i = 0;
            echo '<table class="rate_table"  border=1>';
            echo'<b>Top 5 Highly Rated Brands For 30-39 Female</b>';
            while ( $row = mysqli_fetch_array( $result )) {
              if($i=='0') {
                  echo '<tr><th>Rank</th><th>Brand Name</th><th>Rating</th></tr>';
              }
              echo '<td >' . $row[ 'rank' ] . '</td>';echo '<td >' . $row[ 'brand_name' ] . '</td>';
              echo '<td >' .round( $row[ 'avg' ],2) . '</td></tr>';
              $i++;
              if($i>4){
                break;
              }
            }
            echo '</table>';
          }else{

            $sql = "  SELECT brand.brand_name, AVG(rate.accessibility) as avg, DENSE_RANK() OVER (ORDER BY avg DESC) AS rank
            FROM rate, customer,brand
            WHERE rate.customer_id=customer.customer_id AND customer.sex_id=2 AND brand.brand_id=rate.brand_id AND customer.age_id=3
            GROUP BY rate.brand_id
            ORDER BY AVG(rate.accessibility) DESC;";

            $result = mysqli_query( $conn, $sql);

            $i = 0;
            echo '<table class="rate_table"  border=1>';
            echo'<b>Top 5 Highly Rated Brands For 30-39 Male</b>';
            while ( $row = mysqli_fetch_array( $result )) {
              if($i=='0') {
                echo '<tr><th>Rank</th><th>Brand Name</th><th>Rating</th></tr>';
              }
              echo '<td >' . $row[ 'rank' ] . '</td>';echo '<td >' . $row[ 'brand_name' ] . '</td>';
              echo '<td >' .round( $row[ 'avg' ],2) . '</td></tr>';
              $i++;
              if($i>4){
                break;
              }
            }
            echo '</table>';
          }
        }elseif($drop_age=="40s"){
          if($drop_sex=="female"){

            $sql = "  SELECT brand.brand_name, AVG(rate.accessibility) as avg, DENSE_RANK() OVER (ORDER BY avg DESC) AS rank
            FROM rate, customer,brand
            WHERE rate.customer_id=customer.customer_id AND customer.sex_id=1 AND brand.brand_id=rate.brand_id AND customer.age_id=4
            GROUP BY rate.brand_id
            ORDER BY AVG(rate.accessibility) DESC;";

            $result = mysqli_query( $conn, $sql);

            $i = 0;
            echo '<table class="rate_table"  border=1>';
            echo'<b>Top 5 Highly Rated Brands For 40-49 Female</b>';
            while ( $row = mysqli_fetch_array( $result )) {
              if($i=='0') {
                  echo '<tr><th>Rank</th><th>Brand Name</th><th>Rating</th></tr>';
              }
              echo '<td >' . $row[ 'rank' ] . '</td>';echo '<td >' . $row[ 'brand_name' ] . '</td>';
              echo '<td >' .round( $row[ 'avg' ],2) . '</td></tr>';
              $i++;
              if($i>4){
                break;
              }
            }
            echo '</table>';
          }else{

            $sql = "  SELECT brand.brand_name, AVG(rate.accessibility) as avg, DENSE_RANK() OVER (ORDER BY avg DESC) AS rank
            FROM rate, customer,brand
            WHERE rate.customer_id=customer.customer_id AND customer.sex_id=2 AND brand.brand_id=rate.brand_id AND customer.age_id=4
            GROUP BY rate.brand_id
            ORDER BY AVG(rate.accessibility) DESC;";

            $result = mysqli_query( $conn, $sql);

            $i = 0;
            echo '<table class="rate_table"  border=1>';
            echo'<b>Top 5 Highly Rated Brands For 40-49 Male</b>';
            while ( $row = mysqli_fetch_array( $result )) {
              if($i=='0') {
                echo '<tr><th>Rank</th><th>Brand Name</th><th>Rating</th></tr>';
              }
              echo '<td >' . $row[ 'rank' ] . '</td>';echo '<td >' . $row[ 'brand_name' ] . '</td>';
              echo '<td >' .round( $row[ 'avg' ],2) . '</td></tr>';
              $i++;
              if($i>4){
                break;
              }
            }
            echo '</table>';

          }
        }elseif($drop_age=="50s"){
          if($drop_sex=="female"){

            $sql = "  SELECT brand.brand_name, AVG(rate.accessibility) as avg, DENSE_RANK() OVER (ORDER BY avg DESC) AS rank
            FROM rate, customer,brand
            WHERE rate.customer_id=customer.customer_id AND customer.sex_id=1 AND brand.brand_id=rate.brand_id AND customer.age_id=5
            GROUP BY rate.brand_id
            ORDER BY AVG(rate.accessibility) DESC;";

            $result = mysqli_query( $conn, $sql);

            $i = 0;
            echo '<table class="rate_table"  border=1>';
            echo'<b>Top 5 Highly Rated Brands For 50-59 Female</b>';
            while ( $row = mysqli_fetch_array( $result )) {
              if($i=='0') {
                  echo '<tr><th>Rank</th><th>Brand Name</th><th>Rating</th></tr>';
              }
              echo '<td >' . $row[ 'rank' ] . '</td>';echo '<td >' . $row[ 'brand_name' ] . '</td>';
              echo '<td >' .round( $row[ 'avg' ],2) . '</td></tr>';
              $i++;
              if($i>4){
                break;
              }
            }
            echo '</table>';
          }else{

            $sql = "  SELECT brand.brand_name, AVG(rate.accessibility) as avg, DENSE_RANK() OVER (ORDER BY avg DESC) AS rank
            FROM rate, customer,brand
            WHERE rate.customer_id=customer.customer_id AND customer.sex_id=2 AND brand.brand_id=rate.brand_id AND customer.age_id=5
            GROUP BY rate.brand_id
            ORDER BY AVG(rate.accessibility) DESC;";

            $result = mysqli_query( $conn, $sql);

            $i = 0;
            echo '<table class="rate_table"  border=1>';
            echo'<b>Top 5 Highly Rated Brands For 50-59 Male</b>';
            while ( $row = mysqli_fetch_array( $result )) {
              if($i=='0') {
                echo '<tr><th>Rank</th><th>Brand Name</th><th>Rating</th></tr>';
              }
              echo '<td >' . $row[ 'rank' ] . '</td>';echo '<td >' . $row[ 'brand_name' ] . '</td>';
              echo '<td >' .round( $row[ 'avg' ],2) . '</td></tr>';
              $i++;
              if($i>4){
                break;
              }
            }
            echo '</table>';

          }
        }elseif($drop_age=="60s"){
          if($drop_sex=="female"){

            $sql = "  SELECT brand.brand_name, AVG(rate.accessibility) as avg, DENSE_RANK() OVER (ORDER BY avg DESC) AS rank
            FROM rate, customer,brand
            WHERE rate.customer_id=customer.customer_id AND customer.sex_id=1 AND brand.brand_id=rate.brand_id AND customer.age_id=6
            GROUP BY rate.brand_id
            ORDER BY AVG(rate.accessibility) DESC;";

            $result = mysqli_query( $conn, $sql);

            $i = 0;
            echo '<table class="rate_table"  border=1>';
            echo'<b>Top 5 Highly Rated Brands For 60-69 Female</b>';
            while ( $row = mysqli_fetch_array( $result )) {
              if($i=='0') {
                  echo '<tr><th>Rank</th><th>Brand Name</th><th>Rating</th></tr>';
              }
              echo '<td >' . $row[ 'rank' ] . '</td>';echo '<td >' . $row[ 'brand_name' ] . '</td>';
              echo '<td >' .round( $row[ 'avg' ],2) . '</td></tr>';
              $i++;
              if($i>4){
                break;
              }
            }
            echo '</table>';
          }else{

            $sql = "  SELECT brand.brand_name, AVG(rate.accessibility) as avg, DENSE_RANK() OVER (ORDER BY avg DESC) AS rank
            FROM rate, customer,brand
            WHERE rate.customer_id=customer.customer_id AND customer.sex_id=2 AND brand.brand_id=rate.brand_id AND customer.age_id=6
            GROUP BY rate.brand_id
            ORDER BY AVG(rate.accessibility) DESC;";

            $result = mysqli_query( $conn, $sql);

            $i = 0;
            echo '<table class="rate_table"  border=1>';
            echo'<b>Top 5 Highly Rated Brands For 60-69 Male</b>';
            while ( $row = mysqli_fetch_array( $result )) {
              if($i=='0') {
                  echo '<tr><th>Rank</th><th>Brand Name</th><th>Rating</th></tr>';
              }
              echo '<td >' . $row[ 'rank' ] . '</td>';echo '<td >' . $row[ 'brand_name' ] . '</td>';
              echo '<td >' .round( $row[ 'avg' ],2) . '</td></tr>';
              $i++;
              if($i>4){
                break;
              }
            }
            echo '</table>';

          }
        }elseif($drop_age=="70s"){
          if($drop_sex=="female"){

            $sql = "  SELECT brand.brand_name, AVG(rate.accessibility) as avg, DENSE_RANK() OVER (ORDER BY avg DESC) AS rank
            FROM rate, customer,brand
            WHERE rate.customer_id=customer.customer_id AND customer.sex_id=1 AND brand.brand_id=rate.brand_id AND customer.age_id=7
            GROUP BY rate.brand_id
            ORDER BY AVG(rate.accessibility) DESC;";

            $result = mysqli_query( $conn, $sql);

            $i = 0;
            echo '<table class="rate_table"  border=1>';
            echo'<b>Top 5 Highly Rated Brands For Female over 70</b>';
            while ( $row = mysqli_fetch_array( $result )) {
              if($i=='0') {
                  echo '<tr><th>Rank</th><th>Brand Name</th><th>Rating</th></tr>';
              }
              echo '<td >' . $row[ 'rank' ] . '</td>';echo '<td >' . $row[ 'brand_name' ] . '</td>';
              echo '<td >' .round( $row[ 'avg' ],2) . '</td></tr>';
              $i++;
              if($i>4){
                break;
              }
            }
            echo '</table>';
          }else{

            $sql = "  SELECT brand.brand_name, AVG(rate.accessibility) as avg, DENSE_RANK() OVER (ORDER BY avg DESC) AS rank
            FROM rate, customer,brand
            WHERE rate.customer_id=customer.customer_id AND customer.sex_id=2 AND brand.brand_id=rate.brand_id AND customer.age_id=7
            GROUP BY rate.brand_id
            ORDER BY AVG(rate.accessibility) DESC;";

            $result = mysqli_query( $conn, $sql);

            $i = 0;
            echo '<table class="rate_table"  border=1>';
            echo'<b>Top 5 Highly Rated Brands For Male over 70</b>';
            while ( $row = mysqli_fetch_array( $result )) {
              if($i=='0') {
                  echo '<tr><th>Rank</th><th>Brand Name</th><th>Rating</th></tr>';
              }
              echo '<td >' . $row[ 'rank' ] . '</td>';echo '<td >' . $row[ 'brand_name' ] . '</td>';
              echo '<td >' .round( $row[ 'avg' ],2) . '</td></tr>';

              $i++;
              if($i>4){
                break;
              }


            }
            echo '</table>';

          }
        }
    }
      ?>
      </td></tr>
      </table>