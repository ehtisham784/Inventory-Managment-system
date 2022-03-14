<?php
 include 'header.php';
 include '../user/connection.php';
 $id=$_GET["id"];
 $product_name="";
 $company_name="";
 $unit_name="";
 $packaging_size="";
 //to get that data in the fields 
 $res=mysqli_query($link, "select * from product_info where id=$id");
 while($row=mysqli_fetch_array($res))
 {
   $product_name=$row["product_name"];
   $company_name=$row["company_name"];
   $unit_name=$row["unit_name"];
   $packaging_size=$row["packaging_size"];
 }
 
   
?>



 <!--End-breadcrumbs-->

 <!--Action boxes-->
 <div class="container-fluid">
   <div class="row-fluid" style="background-color: white; min-height: 1000px; padding: 10px">
   <div class="span8">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit User</h5>
        </div>
        <div class="widget-content nopadding">
          <form  name="form1" action="" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Product Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Product Name" name="product_name" value="<?php echo $product_name; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">packaging_size </label>
              <div class="controls">
                <input type="packaging_size"  class="span11" placeholder="Enter packaging_size" name="packaging_size" value="<?php echo $packaging_size; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Choose Company</label>
              <div class="controls">
                <select class="span5" name="company_name">
                  <?php
                    $res=mysqli_query($link, "SELECT * from company_info");
                    while($row=mysqli_fetch_array($res))
                    {
                      ?>
                      <option <?php if($row["company_name"]=$company_name){echo"selected";}?> >
                      <?php
                      echo $row["company_name"];
                      echo "</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Choose unit</label>
              <div class="controls">
              <select class="span5" name="unit_name">
                  <?php
                    $res=mysqli_query($link, "SELECT * from units");
                    while($row=mysqli_fetch_array($res))
                    {
                      ?>
                      <option <?php if($row["unit_name"]=$unit_name){echo"selected";}?> >
                      <?php
                      echo $row["unit_name"];
                      echo "</option>";
                    }
                  ?>
                </select>
              </div>
            </div>  
            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Update</button>
            </div>
            <div class="alert alert-success" id="success" style="display:none">
              Record Updated Successfully!
            </div>
            <div class="alert alert-danger" id="error" style="display:none">
              Already Existed ...
            </div>

          </form>         
        </div>     
      </div>
   </div>
 </div>
 </div>
 <?php
  if(isset($_POST["submit1"]))
  {
    echo "testing";
    $count=0;
    $res=mysqli_query($link, "SELECT * from product_info where company_name='$_POST[company_name]' && product_name='$_POST[product_name]' && unit_name='$_POST[unit_name]' && packaging_size='$_POST[packaging_size]'") or die(mysqli_error($link));
    $count=mysqli_num_rows($res);
    if($count>0){
      ?>
      <script type="text/javascript">
        document.getElementById("success").style.display="none"; // it will not show
        document.getElementById("error").style.display="block"; // it will show
      </script>
      <?php
    }else{
      mysqli_query($link, "UPDATE product_info SET company_name='$_POST[company_name]',product_name='$_POST[product_name]',unit_name='$_POST[unit_name]',packaging_size='$_POST[packaging_size]' where id=$id");
      ?>
    <script type="text/javascript">
    document.getElementById("success").style.display="block";
    document.getElementById("error").style.display="none";
    setTimeout(function(){
      window.location.href="add_product.php";
    },1000);
  </script>
  <?php
    }
  }
 ?>

 <!--end-main-container-part-->

 <?php
  include 'footer.php';
 ?>