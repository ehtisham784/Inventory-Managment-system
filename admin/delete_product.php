<?php
include "../user/connection.php";
$id=$_GET["id"];
mysqli_query($link, "delete from product_info where id=$id");
?>
<script type="text/javascript">
  window.location="add_product.php";
</script>