<?php
include"../../user/connection.php";
$company_name=$_GET["company_name"];
$company_name=$_GET["product_name"];
$res=mysqli_query($link, "SELECT * from product_info where company_name='$company_name' && product_name='$product_name' ");
// below down we pass values to the function select_unit
?>
<select class="span5" name="unit" id="unit" onchange="select_unit(this.value,'<?php echo $company_name; ?>')" > 
  <option>Select</option>
  <?php
  while($row=mysqli_fetch_array($res))
  {
    echo "<option>";
    echo $row["unit"];
    echo "</option>";
  }
  echo "</select>"
?>