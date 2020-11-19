
<?php

include "header.php";

?>

  <style>
  .rate_table {
  border-collapse: collapse;
  margin-left:auto;
  margin-right:auto;
  margin-top: 10px;
}

.rate_table td {
  border: 1px solid #be9b7b;
  padding: 8px;
  background-color:white;
}

.rate_table th {
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
    width:110px;
    height:35px;
    font-size:20px;
    border-radius:10px;
  }
  select{
    font-size:20px;
  }
b{
  font-size:20px;
}

#content {
margin:0 auto;
width:750px;
text-align:left;
}

</style>

<table style="width:100%; padding-top:50px; padding-bottom:50px;">
<tr style="height:500px; padding-top:100px"><td style="width:50%; vertical-align: top;"><?php include "Rate_StaffService.php"; ?></td><td style="width:50%; vertical-align: top;"><?php include "Rate_Accessibility.php"; ?></td></tr>
<tr style="height:500px;"><td style="width:50%; vertical-align: top;"><?php include "Rate_Convenience.php"; ?></td><td style="width:50%; vertical-align: top;"><?php include "Rate_TasteMenu.php"; ?></td></tr>
<tr style="height:500px;"><td style="width:50%; vertical-align: top;"><?php include "Rate_AdditionalService.php"; ?></td><td style="width:50%; vertical-align: top;"><?php include "Rate_ServiceFavorability.php"; ?></td></tr>
</table>       

</body>
