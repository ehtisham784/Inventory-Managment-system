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
          <h5>Add New Purchase</h5>
        </div>
        <div class="widget-content nopadding">
        <form  name="form2" action="" method="POST" class="form-horizontal">

        <div class="control-group">
              <label class="control-label">Choose Company</label>
              <div class="controls">
                <select class="span5" name="company_name_div" id="company_name" onchange="select_company(this.value)" >
                <option>Select</option>
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
              <label class="control-label">Select Product</label>
              <div class="controls" id="product_name_div" name="product_name" onchange="select_product(this.value)">
                <select>
                <option>Select</option>
                </select>
              </div>
            </div>  

            <div class="control-group">
              <label class="control-label">Select Unit</label>
              <div class="controls" id="unit_name_div" name="unit_name" onchange="select_unit(this.value)">
                <select>
                <option>Select</option>
                </select>
              </div>
            </div>  

            <div class="control-group">
              <label class="control-label">Enter Quantity</label>
              <div class="controls">
                <input type="text" name="quantity" value="0" class="span5">
              </div>
            </div> 

            <div class="control-group">
              <label class="control-label">Enter Price</label>
              <div class="controls">
              <input type="text" name="price" value="0" class="span5">
              </div>
            </div> 

            <div class="control-group">
              <label class="control-label">Select Purchase type</label>
              <div class="controls">
                <select>
                <option>Debit/Credit</option>
                <option>Cash</option>
                </select>
              </div>
            </div> 

            <div class="control-group">
              <label class="control-label">Select Party</label>
              <div class="controls"  >
                <select>
                <option>Select</option>
                </select>
              </div>
            </div> 

            <div class="control-group">
              <label class="control-label">Expiry Date</label>
              <div class="controls">
              <input type="text" name="expiry_date" value="0" class="span5" placeholder="YYYY-MM-DD" required pattern="\d{4}-\d{2}-\d{2}">
              </div>
            </div> 

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Save</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
              Purchase Inserted Successfully!
            </div>
          </form>         
        </div>     
      </div>
    </div>
   </div>
  </div>
 </div>

<script type="text/javascript">
  function select_company(company_name)
  {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
        document.getElementByID("product_name_div").innerHTML=xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET", "/admin/forajax/load_product_using_company.php?company_name="+company_name, true);
    xmlhttp.send();
  }

  function select_product(product_name,company_name)
  {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
        document.getElementByID("unit_name_div").innerHTML=xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET", "/admin/forajax/load_unit_using_product.php?$product_name="+product_name+"company_name="+company_name+ true);
    xmlhttp.send();
  }
  

  function select_unit(unit_name,product_name,company_name)
  {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
        document.getElementByID("packaging_size_div").innerHTML=xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET", "/admin/forajax/load_packagingsize_using_unit.php?$product_name="+product_name+"company_name="+company_name+"unit_name="+unit_name+ true);
    xmlhttp.send();
  }
  
</script>

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