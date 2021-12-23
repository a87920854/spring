<?php

    /*****************************************/
    //檔案名稱：ad_fun_action_list_singup2_print3.php
    //後台對應位置：好好玩管理系統/同業報名單管>報名詳細資料>總表
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
    <b><?php echo SqlFilter($_REQUEST["da"], "tab"); ?> - <?php echo $ac_title; ?> - 總表</b>
    <br><br>
    <table width="100%" border="1" style="border-collapse:collapse;" borderColor="black">
        <tbody>
        <tr>
            <td>編號</td>
            <td>姓名</td>
            <td>英文名字</td>
            <td>性別</td>
            <td>生年月日</td>
            <td>身分證號碼</td>
            <td>護照號碼</td>
            <td>護照效期</td>
            <td>團費</td>
            <td>訂金</td>
            <td>尾款</td>
            <td>來源</td>
            <td>學歷</td>
            <td>服務機關</td>
            <td>現任職位</td>
            <td>電話</td>
            <td>地址</td>
            <td>備註</td>
        </tr>
            <?php             
                $SQL = "SELECT * FROM love_keyin WHERE all_kind='國外旅遊' and k_be = 0 and datediff(d, action_time, '".SqlFilter($_REQUEST["da"],"tab")."') = 0 and ac_auto = " .SqlFilter($_REQUEST["ac"],"int")." order by k_sex, k_time desc";
                $rs = $FunConn->prepare($SQL);
                $rs->execute();
                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                if(!$result){
                    call_alert("讀取資料有誤。","ClOsE",0);
                }else{           
                    $nu = 1;         
                    foreach($result as $re){
                        if(chkDate($re["k_year"])){
                            $k_year = Date_EN($re["k_year"],1);
                        }else{
                            $k_year = "不明";
                        }
                        if($re["k_user"] == "" || is_null($re["k_user"])){
                            $k_user = "不明";
                        }else{
                            $k_user = $re["k_user"];
                        }
                        echo "<tr>";
                        echo "<td>".$nu."</td><td>".$re["k_name"]."</td><td>".$re["ename"]."</td><td>".$re["k_sex"]."</td><td>".$k_year."</td><td>".$k_user."</td><td>".$re["passport"]."</td><td>".Date_EN($re["passport_t1"],1)."~".Date_EN($re["passport_t2"],1)."</td><td>".$re["k_money"]."</td><td></td><td></td><td>".$re["all_branch"]."-".$re["all_single"]."</td><td>".$re["k_school"]."</td><td>".$re["k_company"]."</td><td>".$re["k_company2"]."</td><td>".$re["k_mobile"]."</td><td>".$re["k_area"]."".$re["k_address"]."</td><td>".$re["remark"]."</td>";
                        echo "</tr>";
                        $nu = $nu +1;
                    }
                }
            ?>
        </tbody>
</body>
</html>