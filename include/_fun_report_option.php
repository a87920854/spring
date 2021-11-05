<?php 
    $alloptions = array("請選擇","有意願","無意願","下次聯絡","未接","停話","PASS春天","勿再聯絡");
    foreach( $alloptions as $a ){
        if($a == "請選擇"){
            $option = "";
        }else{
            $option = $a;
        }
        echo "<option value='" . $option . "'>" . $a . "</option>";
    }
?>