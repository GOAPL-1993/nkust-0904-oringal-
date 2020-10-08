<?php
    $message=$_POST["name"];
    echo $message;
$servername = "localhost";
  $username = "root";
  $password = "12345678";
  $dbname = "bbs";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  //要使用SQL的INSERT INTO指令插入訊息
  $sql = "INSERT INTO playlist(name) values('$message')";
  //以下執行SQL查詢指令，並把結果傳回給$result變數
  $result = $conn->query($sql);
  $conn->close();
  header("Location:index.php");
  exit;
?>