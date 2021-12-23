<?php

    /*****************************************/
    //檔案名稱：ad_fun_action_list_singup2_print.php
    //後台對應位置：好好玩管理系統/同業報名單管>報名詳細資料>要保明細表
    //改版日期：2021.12.23
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    //程式開始 *****
    if ($_SESSION["MM_Username"] == "") {
        call_alert("請重新登入。", "login.php", 0);
    }

    $SQL = "select ac_title from actionf_data where ac_auto=" . SqlFilter($_REQUEST["ac"], "int");
    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $ac_title = $result["ac_title"];
    } else {
        call_alert("讀取資料有誤。", "ClOsE", 0);
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
    <b><?php echo SqlFilter($_REQUEST["da"], "tab"); ?> - <?php echo $ac_title; ?> - 要保明細表</b>
    <br><br>
    <table width="100%" border="1" style="border-collapse:collapse;" borderColor="black">
        <tbody>
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
            <?php 
                $SQL = "SELECT * FROM love_keyin WHERE all_kind='國外旅遊' and not k_be = 1 and ac_auto = " .SqlFilter($_REQUEST["ac"],"int"). " and datediff(d, action_time, '".SqlFilter($_REQUEST["da"],"tab"). "') = 0 order by k_sex, k_time desc";
                $rs = $FunConn->prepare($SQL);
                $rs->execute();
                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                if(!$result){
                    call_alert("讀取資料有誤。","ClOsE",0);
                }else{
                    for($i=0;$i<count($result);$i+=2){
                        if(chkDate($result[$i]["k_year"])){
                            $k_year = Date_EN($result[$i]["k_year"],1);
                        }else{
                            $k_year = "不明";
                        }
                        if($result[$i]["k_user"] == "" || is_null($result[$i]["k_user"])){
                            $k_user = "不明";
                        }else{
                            $k_user = $result[$i]["k_user"];
                        }
						echo "<tr>";
						echo "<td>".($i+1)."</td><td>".$result[$i]["k_name"]."</td><td>".$k_user."</td><td>".$k_year."</td>";	
						if($i+2 != count($result)+1){
							echo "<td>".($i+2)."</td><td>".$result[$i+1]["k_name"]."</td><td>".$result[$i+1]["k_user"]."</td><td>".Date_EN($result[$i+1]["k_year"],1)."</td>";
						}
						echo "</tr>";				
					}
                }

            ?>
        </tbody>
</body>
</html>