<?php
 include 'header.php';
 include '../user/connection.php';
 $id=$_GET["id"];
 $companyname="";
 //to get that data in the fields 
 $res=mysqli_query($link, "select * from company_info where id=$id");
 while($row=mysqli_fetch_array($res))
 {
   $companyname=$row["companyname"];
 }
 
   
?>



 <!--End-breadcrumbs-->

 <!--Action boxes-->
 <div class="container-fluid">
   <div class="row-fluid" style="background-color: white; min-height: 1000px; padding: 10px">
   <div class="span8">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Company</h5>
        </div>
        <div class="widget-content nopadding">
          <form  name="form1" action="" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Company Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Enter name" name="companyname" value="<?php echo $companyname; ?>" />
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
    mysqli_query($link, "UPDATE company_info set companyname='$_POST[companyname]' where id=$id" ) or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
    document.getElementById("success").style.display="block";
    setTimeout(function(){
      window.location.href="add_new_company.php";
    },1000);
  </script>
  <?php
  
  }



 ?>

 <!--end-main-container-part-->

 <?php
  include 'footer.php';
 ?>