<?php
  $password = $_POST["password"];
  if($password=="1234") {
      $_SESSION["user_type"] = 1;
  }
?>