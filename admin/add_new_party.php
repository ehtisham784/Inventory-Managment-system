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
          <h5>Add New Party</h5>
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
              <label class="control-label">Business Name</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Enter Business" name="business_name"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Contact Info</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Enter Contact" name="contact"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Address</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Enter Address" name="address"  />
              </div>
            </div>




            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Save</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
              Record Inserted Successfully!
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
                  <th>Business Name</th>
                  <th>Contact</th>
                  <th>Address</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $res=mysqli_query($link, "select * from party_info");
                  while($row=mysqli_fetch_array($res))
                  {
                    ?>
                    <tr>
                      <td><?php echo $row["first_name"];?></td>
                      <td><?php echo $row["last_name"];?></td>
                      <td><?php echo $row["business_name"];?></td>
                      <td><?php echo $row["contact"];?></td>
                      <td><?php echo $row["address"];?></td>
                      <td><a href="edit_party.php?id=<?php echo $row["id"];?>"style="color: green;">Edit</a></td>
                      <td><a href="delete_party.php?id=<?php echo $row["id"];?>"style="color: red;">Delete</a></td>
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
      mysqli_query($link,
       "INSERT INTO party_info VALUES(NULL,'$_POST[first_name]','$_POST[last_name]','$_POST[business_name]','$_POST[contact]','$_POST[address]')") or die(mysqli_error($link()));
      ?>
      <script type="text/javascript">
        document.getElementById("success").style.display="block";
        setTimeout(function(){
          window.location.href=window.location.href;
        },1000);
      </script>
      <?php
    
    
  }

 ?>

 <!--end-main-container-part-->

 <?php
  include 'footer.php';
 ?>