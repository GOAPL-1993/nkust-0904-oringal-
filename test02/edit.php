<?php
    $id = $_GET["id"];
    if($id==NULL){
        header("Location:index.php");
        exit;
    }
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
  //要使用SQL的SELECT指令找出要被編輯的對像
  $sql = "SELECT * from news WHERE id ='$id' LIMIT 1";//LIMIT用來設限不要刪太多
  //以下執行SQL查詢指令，並把結果傳回給$result變數
  $result = $conn->query($sql);
  if ($result->num_rows > 0) { //檢查記錄的數量，看看是否有資料
    $row = $result->fetch_assoc();//從資料庫中取出一筆記錄
    $id=$row["id"];//指定各訊息的id
    $message=$row["message"];//取出message欄位，放到$message中
    //以下建立一個用來編輯內容的表單，按下修改後會前往update.php
    echo "以下是找到的訊息，請修改<br>";
    echo "<form method=POST action=update.php>";
    echo "<input type=hidden value='$id' name=id>";//隱藏的欄位拿來放id
    echo "訊息<input type=text value='$message' name=message size=30>";
    echo "<input type=submit value=修改>";
    echo "</form>";
    echo "<a href='index.php'>不修改，回去</a>";
    } else {
    echo "找不到要編輯的記錄<br>"; // 如果資料表中沒有記錄，要顯示的內容
    echo "<a href='index.php'>回上頁</a>";
  }
  $conn->close();
?>