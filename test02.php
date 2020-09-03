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
//以下建立SQL查詢指令
$sql = "SELECT * FROM news order by id desc";
//以下執行SQL查詢指令，並把結果傳回給$result變數
$result = $conn->query($sql);
//以下建立一個用來輸入密碼的表單
//使用者按下「登入」之後，即會前往chkpass.php檢查密碼
echo "<form method=POST action=chkpass.php>";
echo "張貼密碼：<input type=password name=password>";
echo "<input type=submit value=登入>";
echo "</form>";

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