<?php
include "main_header.php";
?>

<style>
/* 메인 섹션 */

#main_section {
    padding-top: 150px;
}

/* 이미지 */

img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 20%;
}



/* 테이블 */

table {
    margin-left: auto;
    margin-right: auto;
}

td {
    padding-top: 0px;
    vertical-align: middle;
}

#input-box {
    position: relative;
    width: 500px;
    height: 40px;
    box-sizing: border-box;
    border: 2px solid;
    border-radius: 50px;
    border-color: #be9b7b;
    font-size: 20px;
    background-color: white;
    background-position: 20px 20px;
    background-repeat: no-repeat;
    padding-left: 20px;
}

.search-box {
    text-align: center;
    margin: auto;
}

.search-icon {
    color: #be9b7b;
    font-size: 50px;
    padding-left: 5px;
}

/* 검색결과 */
.result-table {
    border-collapse: collapse;
    width: 50%;
    margin-top: 15px;
    margin-bottom: 20px;
  }
  
.result-th {
    text-align: center;
    padding: 8px;
    background-color: #4b3832;
    color: white;
}
  
  .result-td {
    text-align: left;
    padding: 8px;
    background-color:white;
    border: 1px solid #be9b7b;
  }
  
.result-th{
    border: 1px solid #be9b7b;
}

a{
  color: black;
  text-decoration: none;
}

a:hover {
  color: #854442;
  text-decoration: none;
}
</style>



  <?php if(empty($_GET['search_content'])) {?>
      <section id="main_section">
      <a href="index_DB.php"><img src="./ImageForDB/Logo1.png"></a>
      <table>
        <tr>
        <form action="index_DB.php" class="search-box" method="get">
          <td>
            <i class="search-icon zmdi zmdi-search zmdi-hc-flip-horizontal"></i>
          </td>
          <td id="form-td">
            <input id="input-box" type="text" name="search_content">
          </td>
        </form>
        </tr>
      </table>
    </section>
   <?php } else { ?>
    <section id="main_section">
      <a href="index_DB.php"><img src="./ImageForDB/Logo1.png"></a>
      <table>
        <tr>
        <form action="index_DB.php" class="search-box" method="get">
          <td>
            <i class="search-icon zmdi zmdi-search zmdi-hc-flip-horizontal"></i>
          </td>
          <td id="form-td">
            <input id="input-box" type="text" name="search_content">
          </td>
        </form>
        </tr>
      </table>
    </section>
    <?php
      $search_content = $_GET['search_content'];
      $sql = "SELECT * FROM company, brand where company.company_id=brand.company_id and ( company_name like '%".$search_content."%' or brand_name like '%".$search_content."%')";
      $result = mysqli_query($conn, $sql);
      echo '<table class="result-table">';
      echo '<h3 style="padding-left:25%">검색결과</h3>';
      echo '<th class="result-th">Company</th><th class="result-th">Brand</th>';
       while( $row = mysqli_fetch_array( $result ) ) {
      echo '<tr class="result-tr"><td class="result-td"><a href="company.php?idx='.$row['company_id'].'">'.$row['company_name'].'</a></td>';
      echo '<td class="result-td"><a href="brandPage.php?idx='.$row['brand_id'].'">'.$row['brand_name'].'</a></td></tr>';
    }
    echo '</table>';
  }
    ?>



    </body>

    </html>