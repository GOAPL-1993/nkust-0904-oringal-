<?php
    $target = $_POST["target"];
    if ($target!=NULL) {
        header("Location: $target");
        exit;
    }
    //在此建立一個結合陣列的陣列
    //$menudata是整個選單的陣列
    //中間的每一個項目都是以結合陣列的型式儲存名稱和連結
    $menudata = array (
        array("name"=>"回首頁", "link"=>"index.php"),
        array("name"=>"練習1",  "link"=>"test01.php"),
        array("name"=>"練習2",  "link"=>"test02.php"),
        array("name"=>"練習3",  "link"=>"test03.php"),
        array("name"=>"高雄科大",  "link"=>"http://www.nkust.edu.tw")
    );
    echo "<form method=POST action=index.php>";
    echo "選單：<select name=target>";
    //一個迴圈把所有的<option></option>
    //都準備好 
    foreach($menudata as $item) {
        echo "<option value=" . 
            $item["link"] . ">" . 
            $item["name"] . "</option>";
    }
    echo "</select>";
    echo "<input type=submit value=前往>";
    echo "</form>";
?>

