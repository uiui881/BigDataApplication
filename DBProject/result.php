<?php

include "header.php";

?>
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="main_style.css">
</head>

<div class="container">
  <div class="center-block" style="text-align: center;">
        <section id="main_section">
        <img src="./ImageForDB/Logo.png">
        <table>
            <tr>
                <td id="form-td">
                    <form class="search-box" action="./result.php">
                        <input type="text">
                    </form>
                </td>
                <td><i class="search-icon material-icons">search</i></td>
            </tr>
        </table>
    </section>


    <div id="learning-automated-div" style="text-align: center; font-size: 48px; ">
      <?php
      $search_content =$_POST['search_content'];
      #echo $search_content;
      $query_info = "SELECT * FROM company where company_name like '%".$search_content."%'";
      $result = $conn->query($query_info);
      $count = mysqli_num_rows($result);
      //$row = $result->fetch_array(MYSQLI_ASSOC); 
      ?>
        <b>
          <?php 
          while($count--){
             $row = $result->fetch_array(MYSQLI_ASSOC);
             echo $row['company_name']."\n";?>
              <a href="company.php?idx=<?php echo $row['company_id'] ?>" >
              >> Show Details </a>
        <?php echo $row['company_id']." \n"; }?>
         
        </b>
      </span>
    </div>
    
  </div>
</div>



<br><br><br><br>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>