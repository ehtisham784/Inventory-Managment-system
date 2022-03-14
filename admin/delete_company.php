<?php
include "../user/connection.php";
$id=$_GET["id"];
mysqli_query($link, "delete from company_info where id=$id");
?>
<script type="text/javascript">
  window.location="add_new_company.php";
</script>