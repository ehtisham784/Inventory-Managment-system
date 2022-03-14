<?php
 include 'header.php';
 include '../user/connection.php';
 $id=$_GET["id"];
 $first_name="";
 $last_name="";
 $username="";
 $password="";
 $status="";
 $role="";
 //to get that data in the fields 
 $res=mysqli_query($link, "select * from user_registration where id=$id");
 while($row=mysqli_fetch_array($res))
 {
   $first_name=$row["first_name"];
   $last_name=$row["last_name"];
   $username=$row["username"];
   $password=$row["password"];
   $status=$row["status"];
   $role=$row["role"];
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
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First name" name="first_name" value="<?php echo $first_name; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Last name" name="last_name" value="<?php echo $last_name; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Username</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Enter username" name="username" value="<?php echo $username; ?>" readonly />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password input</label>
              <div class="controls">
                <input type="password"  class="span11" placeholder="Enter Password" name="password" value="<?php echo $password; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Select Role</label>
              <div class="controls">
                <select class="span11" name="role">
                  <option <?php if($role=="user") {"selected";} ?> >user</option>
                  <option <?php if($role=="admin") {"selected";} ?> >admin</option>
                </select>
              </div>
              <div class="control-group">
              <label class="control-label">Select Status</label>
              <div class="controls">
                <select class="span11" name="status">
                  <option <?php if($status=="active") {"selected";} ?> >active</option>
                  <option <?php if($status=="inactive") {"selected";} ?> >inactive</option>
                </select>
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
    mysqli_query($link, "UPDATE user_registration set first_name='$_POST[first_name]',last_name='$_POST[last_name]',password='$_POST[password]',role='$_POST[role]',status='$_POST[status]' where id=$id" ) or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
    document.getElementById("success").style.display="block";
    setTimeout(function(){
      window.location.href="add_new_user.php";
    },1000);
  </script>
  <?php
  
  }



 ?>

 <!--end-main-container-part-->

 <?php
  include 'footer.php';
 ?>