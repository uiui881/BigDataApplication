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
                    <form  action="./result.php" class="search-box" method="post">
                        <input type="text" name = "search_content">


                        <input type="submit" value="검색">
                    </form>

                </td>
                <td><i class="search-icon material-icons">search</i></td>
            </tr>
        </table>
    </section>


<!--
    <div id="learning-automated-div" style="text-align: center; font-size: 48px; ">
      <?php
      $query_info = "SELECT * FROM company;";
      $result = $conn->query($query_info);
      $row = $result->fetch_array(MYSQLI_ASSOC); 
      ?>
      <span style="color:#3c2f2f;">
        <b> 
          <?php echo $row['company_name']."\n";?> 
        </b>
      </span>
    </div>
    <a href="movie.php?idx=<?php echo $row['company_name'] ?>" style="color: white;"> 
      >> Show Details 
    </a>
  </div>
</div>



<br><br><br><br>
<div class="row" style="padding-left: 70px; padding-top:400px; padding-bottom: 100px">
 <div class="col-lg-4" style="float: left; width: 30%; text-align: center; ">
  <div class="circle" >
    <img class="mb-4" src="./images/cgv.jpg" width="216" height="216"></div>
    <h2 style="font-size:17px;">CGV ARTREON</h2>
    <a href="theater.php?idx=1" class="btn btn-dark">View details &raquo;</a>
  </div>
  <div class="col-lg-4" style="float: left; width: 30%; text-align: center;">
    <div class="circle" >
      <img class="mb-4" src="./images/mega.jpg" alt="" width="216" height="216"></div>
      <h2 style="font-size:17px">MEGABOX</h2>
      <a class="btn btn-dark" href="theater.php?idx=2">View details &raquo;</a>
    </div>
    <div class="col-lg-4" style="float: left; width: 30%; text-align: center;">
      <div class="circle" >
        <img class="mb-4" src="./images/momo.jpg" alt="" width="216" height="216" ></div>
        <h2 style="font-size:17px">ART HOUSE MOMO</h2>
        <a class="btn btn-dark" href="theater.php?idx=3">View details &raquo;</a>
      </div>
    </div>
  </div>
-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>