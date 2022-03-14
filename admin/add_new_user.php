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
          <h5>Add New User</h5>
        </div>
        <div class="widget-content nopadding">
          <form  name="form2" action="" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First name" name="first_name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Last name" name="last_name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Username</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Enter Password" name="username"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password input</label>
              <div class="controls">
                <input type="password"  class="span11" placeholder="Enter Password" name="password"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Enter Role</label>
              <div class="controls">
                <select class="span11" name="role">
                  <option>user</option>
                  <option>admin</option>
                </select>
              </div>
            </div>



            <div class="alert alert-danger" id="error" style="display:none">
              This Username already existed. Please try again.
            </div>

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Save</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
              Registration Successful!
            </div>

          </form>         
        </div>     
      </div>
      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>User Name</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $res=mysqli_query($link, "select * from user_registration");
                  while($row=mysqli_fetch_array($res))
                  {
                    ?>
                    <tr>
                      <td><?php echo $row["first_name"];?></td>
                      <td><?php echo $row["last_name"];?></td>
                      <td><?php echo $row["username"];?></td>
                      <td><?php echo $row["role"];?></td>
                      <td><?php echo $row["status"];?></td>
                      <td><a href="edit_user.php?id=<?php echo $row["id"];?>" style="color: green;">Edit</a></td>
                      <td><a href="delete_user.php?id=<?php echo $row["id"];?>"style="color: red;">Delete</a></td>
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
    $res=mysqli_query($link, "SELECT * from user_registration where id='$_POST[id]'");
    $count=mysqli_num_rows($res);

    if($count>0)
    {
      ?>
      <script type="text/javascript">
        document.getElementById("success").style.display="none";
        document.getElementById("error").style.display="block";
      </script>
      <?php
    }
    else{
      mysqli_query($link,
       "INSERT INTO user_registration VALUES(NULL,'$_POST[first_name]','$_POST[last_name]','$_POST[username]','$_POST[password]','$_POST[role]','active')");
      ?>
      <script type="text/javascript">
        document.getElementById("success").style.display="block";
        document.getElementById("error").style.display="none";
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