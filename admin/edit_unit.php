<?php
 include 'header.php';
 include '../user/connection.php';
 $id=$_GET["id"];
 $unit_name="";
 //to get that data in the fields 
 $res=mysqli_query($link, "select * from units where id=$id");
 while($row=mysqli_fetch_array($res))
 {
   $unit_name=$row["unit_name"];
 }
 
   
?>



 <!--End-breadcrumbs-->

 <!--Action boxes-->
 <div class="container-fluid">
   <div class="row-fluid" style="background-color: white; min-height: 1000px; padding: 10px">
   <div class="span8">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Unit</h5>
        </div>
        <div class="widget-content nopadding">
          <form  name="form1" action="" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Unit Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Enter name" name="unit_name" value="<?php echo $unit_name; ?>" />
              </div>
            </div>
            
            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Update</button>
            </div>
            <div class="alert alert-success" id="success" style="display:none">
              Record Updated Successfully!
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
    $count=0;
    $res=mysqli_query($link, "SELECT * from units where unit_name='$_POST[unit_name]'") or die(mysqli_error($link));
    $count=mysqli_num_rows($res);
    if($count>0){
      ?>
      <script type="text/javascript">
        document.getElementById("success").style.display="none"; // it will not show
        document.getElementById("error").style.display="block"; // it will show
      </script>
      <?php
    }else{
      mysqli_query($link, "UPDATE units SET unit_name='_$POST[unit_name] where id=$id'");
      ?>
    <script type="text/javascript">
    document.getElementById("success").style.display="block";
    document.getElementById("error").style.display="none";
    setTimeout(function(){
      window.location.href="add_unit.php";
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