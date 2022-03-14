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
          <h5>Add New Unit</h5>
        </div>
        <div class="widget-content nopadding">
          <form  name="form2" action="" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Unit Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Unit name" name="unit_name" />
              </div>
            </div>
            



            <div class="alert alert-danger" id="error" style="display:none">
              This unit already existed. Please try again.
            </div>

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Save</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
              Record Inserted Successful!
            </div>

          </form>         
        </div>     
      </div>
      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Unit Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $res=mysqli_query($link, "select * from units");
                  while($row=mysqli_fetch_array($res))
                  {
                    ?>
                    <tr>
                      <td><?php echo $row["id"];?></td>
                      <td><?php echo $row["unit_name"];?></td>
                      <td><a href="edit_unit.php?id=<?php echo $row["id"];?>"style="color: green;">Edit</a></td>
                      <td><a href="delete_unit.php?id=<?php echo $row["id"];?>"style="color: red;">Delete</a></td>
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
    $res=mysqli_query($link, "SELECT * from units where unit_name='$_POST[unit_name]'");
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
       "INSERT INTO units VALUES(NULL,'$_POST[unit_name]')");
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