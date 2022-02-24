<?php

/*****************************************/
//檔案名稱：ad_action_list2_view_print2.php
//後台對應位置：管理系統/網站活動上傳/網站活動團控>要保明細表
//改版日期：2022.2.23
//改版設計人員：Jack
//改版程式人員：Jack
/*****************************************/
require_once("_inc.php");
require_once("./include/_function.php");
//程式開始 *****
if ($_SESSION["MM_Username"] == "") {
    call_alert("請重新登入。", "login.php", 0);
}

$SQL = "select ac_title from action_data where ac_auto=".SqlFilter($_REQUEST["ac"],"int")."";
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetch(PDO::FETCH_ASSOC);
if($result){
    $ac_title = $result["ac_title"];
}else{
    call_alert("讀取資料有誤。",0,0);
}

?>
<html>
<head>
    <style>
        table {
            font-size: 12px;
        }
    </style>
</head>
<body>
    <b><?php echo $ac_title; ?> - 要保明細表</b>
    <br><br>

    <table width="100%" border="1" style="border-collapse:collapse;" borderColor="black">
        <thead>
            <tr>
                <td>編號</td>
                <td>要／被保險人<br>姓 名</td>
                <td>被保險人<br>身分證號碼</td>
                <td>被保險人<br>生年月日</td>
                <td>編號</td>
                <td>要／被保險人<br>姓 名</td>
                <td>被保險人<br>身分證號碼</td>
                <td>被保險人<br>生年月日</td>
            </tr>
        </thead>
        <tbody>
            <?php 
                $SQL = "SELECT * FROM love_keyin WHERE isbe = 1 and action_auto = " .SqlFilter($_REQUEST["ac"],"int"). " order by k_time desc";
                $rs = $SPConn->prepare($SQL);
                $rs->execute();
                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                if(!$result){
                    call_alert("讀取資料有誤-沒有任何正取參加者。",0,0);
                }else{
                    $ii = 0;
					$nu = 1;
                    foreach($result as $re){
                        if($ii == 0){
                            echo "<tr>";
                        }
                        $k_year = $re["k_bday"];
                        if(chkDate($k_year)){
                            $k_year = Date_EN($k_year,1);
                        }else{
                            $k_year = "不明";
                        }
                        echo "<td>".$nu."</td><td>".$re["k_name"]."</td><td>".$re["k_fid"]."</td><td>".$k_year."</td>";
                        $nu = $nu + 1;
						$ii = $ii + 1;
                        if($ii == 2){
                            echo "</tr>";
                            $ii = 0;
                        }
                    }
                }
            ?>
        </tbody>
    </table>
    <script language="JavaScript">
        //window.print();
        //window.close();
    </script>
</body>
</html>