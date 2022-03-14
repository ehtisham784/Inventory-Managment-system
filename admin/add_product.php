<?php
 include 'header.php';
 include '../user/connection.php';
   
?>
 <!--End-breadcrumbs-->
 <!--Action boxes-->
 <div class="container-fluid">
   <div class="row-fluid" style="background-color: white; min-height: 1000px; padding: 10px">
   <div class="span8">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Product</h5>
        </div>
        <div class="widget-content nopadding">
        <form  name="form2" action="" method="POST" class="form-horizontal">

        <div class="control-group">
              <label class="control-label">Enter Product</label>
              <div class="controls">
                <input type="text" name="product_name" class="span5" placeholder="Enter product" >
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
                      echo "<option>";
                      echo $row["unit_name"];
                      echo "<option>";
                    }
                  ?>
                </select>
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
                      echo "<option>";
                      echo $row["company_name"];
                      echo "<option>";
                    }
                  ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Choose Packaging Size</label>
              <div class="controls">
                    <input type="text" name="packaging_size" class="span6" placeholder="enter packaging size" >
              </div>
            </div>
          


            <div class="alert alert-danger" id="error" style="display:none">
              This Product is already exist. Please try again.
            </div>

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Save</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
              Record Saved Successfully!
            </div>

          </form>         
        </div>     
      </div>
      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Company Name</th>
                  <th>Product Name</th>
                  <th>Packaging Size</th>
                  <th>Units</th>
                  <th>Edit</th>
                  <th>Delete</th>

                </tr>
              </thead>
              <tbody>
                <?php
                  $res=mysqli_query($link, "select * from product_info");
                  while($row=mysqli_fetch_array($res))
                  {
                    ?>
                    <tr>
                      <td><?php echo $row["id"];?></td>
                      <td><?php echo $row["company_name"];?></td>
                      <td><?php echo $row["product_name"];?></td>
                      <td><?php echo $row["packaging_size"];?></td>
                      <td><?php echo $row["unit_name"];?></td>
                      <td><a href="edit_product.php?id=<?php echo $row["id"];?>" style="color: green;">Edit</a></td>
                      <td><a href="delete_product.php?id=<?php echo $row["id"];?>"style="color: red;">Delete</a></td>
                    </tr>
                    <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
    </div>
   </div>
  </div>
 </div>

 <?php
  if(isset($_POST["submit1"]))
  {
    echo "Testing";
    $count=0;
    $res=mysqli_query($link, "SELECT * from product_info where company_name='$_POST[company_name]' && product_name='$_POST[product_name]' && unit_name='$_POST[unit_name]' && packaging_size='$_POST[packaging_size]'");
    $count=mysqli_num_rows($res);

    if($count>0)
    {
      ?>
      <script type="text/javascript">
        document.getElementById("success").style.display="none";
        document.getElementById("error").style.display="none";
      </script>
      <?php
    }
    else{
      mysqli_query($link,
       "INSERT INTO product_info VALUES(NULL,'$_POST[product_name]','$_POST[company_name]','$_POST[unit_name]','$_POST[packaging_size]')") or die(mysqli_error(($link)));
      ?>
      <script type="text/javascript">
        document.getElementById("success").style.display="block";
        setTimeout(function(){
          window.location.href=window.location.href;
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