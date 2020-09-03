<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
    body {
        font-family:微軟正黑體;
    }
</style>
<title>何敏煌0903</title>
</head>
<body>
<h2>路透社快訊~~</h2>
<hr>
<?php include "menu.php"; ?>
<hr>
<?php
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

$sql = "SELECT * FROM news";
$result = $conn->query($sql);

if ($result->num_rows > 0) { //檢查記錄的數量，看看是否有資料
  // output data of each row
  echo "<table width=800 bgcolor=#ff00ff>";
  echo "<tr bgcolor=#bbbbbb><td>編號</td><td>訊息內容</td><td>張貼日期</td></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr bgcolor=#ffffcc>";
    echo "<td>" . $row["id"]. "</td>" . 
         "<td>" . $row["message"]. "</td>" . 
         "<td>" . $row["postdate"]. "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "0 results"; // 如果資料表中沒有記錄，要顯示的內容
}
$conn->close();
?>
<hr>
<?php include "footer.php"; ?>
</body>
</html>