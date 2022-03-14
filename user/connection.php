<?php
  $link=mysqli_connect("localhost","root","") or die(mysqli_error($link)); // to show prover error msg incase of any error so we use die()
  mysqli_select_db($link, "PHP_IMS") or die(mysqli_error($link));

?>