<?php
    /*****************************************/
    //檔案名稱：ad_action_list2_view_print.php
    //後台對應位置：管理系統/網站活動上傳/網站活動團控>報名資料表
    //改版日期：2022.2.22
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
    if(!$result){
        call_alert("讀取資料有誤。",0,0);
    }else{
        $ac_title = $result["ac_title"];
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
<b><?php echo $ac_title; ?> - 報名資料表</b>
<br><br>

<table width="100%" border="1" style="border-collapse:collapse;" borderColor="black">
    <tbody>
        <tr>
            <td>編號</td>
            <td>正取/備取</td>
            <td>後五碼</td>
            <td>對帳金額</td>
            <td>自行輸入/繳款方式</td>
            <td>姓名</td>
            <td>性別</td>
            <td>身分證號碼</td>
            <td>生日</td>
            <td>手機</td>
            <td>學歷</td>
            <td>吃素</td>
            <td>FB</td>
            <td>e-mail</td>
            <td>工作</td>
            <td>職稱</td>
            <td>LINE</td>
            <td>餐點及飲品</td>
            <td>公布資料</td>
            <td>上車</td>
            <td>備註</td>
        </tr>
        <?php 
            $SQL = "SELECT * FROM love_keyin WHERE action_auto =".SqlFilter($_REQUEST["ac"],"int")." order by k_time desc";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
            if(!$result){
                call_alert("讀取資料有誤。",0,0);
            }else{
                $nu = 1;
                foreach($result as $re){
                    if($re["isbe"] == 1){
                        $k_be = "正取";
                    }else{
                        $k_be = "備取";
                    }
                    $k_year = $re["k_bday"];
                    if(chkDate($k_year)){
                        $k_year = Date_EN($k_year,1);
                    }else{
                        $k_year = "不明";
                    }
                    $k_pay_num = "";
                    if($re["k_pay_num"] != ""){
                        $k_pay_num = $re["k_pay_num"];
                    }
                    $k_pay_check = "";
                    if($re["k_pay_check"] != ""){
                        $k_pay_check = $re["k_pay_check"];
                    }
                    $k_pay_m = "";
                    if($re["k_pay_m"] != ""){
                        $k_pay_m = $re["k_pay_m"];
                    }                    
                    if($re["k_pay_note"] != ""){
                        $k_pay_m = $k_pay_m . "," .$re["k_pay_note"];
                    }
                    $k_eat = "";
                    if($re["k_eat1"] != ""){
                        $k_eat = $k_eat.$re["k_eat1"];
                    }
                    if($re["k_eat2"] != ""){
                        if($k_eat != ""){
                            $k_eat = $k_eat."/".$re["k_eat2"];
                        }else{
                            $k_eat = $k_eat.$re["k_eat2"];
                        }                        
                    }                    
                    echo "<tr>";
                    echo "<td>".$nu."</td><td>".$k_be."</td><td>".$k_pay_num."</td><td>".$k_pay_check."</td><td>".$k_pay_m."</td><td>".$re["k_name"]."</td><td>".$re["k_sex"]."</td><td>".$re["k_fid"]."</td><td>".$k_year."</td>";
					echo "<td>".$re["k_mobile"]."</td><td>".$re["k_school"]."</td><td>".$re["k_eat"]."</td><td>".$re["ac_3"]."</td><td>".$re["k_yn"]."</td><td>".$re["k_company"]."</td><td>".$re["k_company2"]."</td><td>".$re["lineid"]."</td>";
                    echo "<td>".$k_eat."</td><td>".$re["k_2"]."</td><td>";
                    if($re["ac_car"] != ""){
                        echo $re["ac_car"];
                    }
                    echo "</td><td>";
                    echo "</td>";
                    echo "</tr>";
                    $nu = $nu + 1;
                }              
            }
        ?>
    </tbody>
</table>
<script type="text/javascript">
    //window.print();
    //window.close();
</script>
</body>
</html>
