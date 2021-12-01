<?php
    /*****************************************/
    //檔案名稱：ad_fun_action_list_singup1_print2.php
    //後台對應位置：好好玩管理系統/好好玩國內報名/(活動名)/報名詳細資料>報名資料表
    //改版日期：2021.11.29
    //改版程式人員：jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    //程式開始 *****
    if ($_SESSION["MM_Username"] == "") {
        call_alert("請重新登入。", "login.php", 0);
    }

    $ac = SqlFilter($_REQUEST["ac"], "int");
    $SQL = "select ac_title from action_data where ac_auto=" . $ac;
    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $ac_title = $result["ac_title"];
    } else {
        call_alert("讀取資料有誤。", 0, 0);
    }

    // 設定excel的檔案名稱
    $filename = date("Y-m-d") . "_" . basename(__FILE__, ".php");
    header('Content-type:application/vnd.ms-excel;charset=UTF-8');  //宣告網頁格式
    header('Content-Disposition: attachment; filename=' . $filename . '.xls');  //設定檔案名稱

?>

<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <style id="Classeur1_16681_Styles"></style>
</head>

<body>
    <div id="Classeur1_16681" align=center x:publishsource="Excel">
        <table cellSpacing=0 cellPadding=0 width="100%" border=1 style="border-collapse:collapse;">
            <thead>
                <tr>
                    <td colspan=50><?php echo $ac_title; ?> - 報名資料表</td>
                </tr>
                <tr>
                    <td>編號</td>
                    <td>正取/備取</td>
                    <td>後五碼</td>
                    <td>對帳金額</td>
                    <td>自行輸入/繳款方式</td>
                    <td>檢附證件</td>
                    <td>姓名</td>
                    <td>性別</td>
                    <td>身分證號碼</td>
                    <td>生日</td>
                    <td>星座</td>
                    <td>手機</td>
                    <td>學歷</td>
                    <td>居住縣市</td>
                    <td>身高</td>
                    <td>體重</td>
                    <td>婚姻</td>
                    <td>吃素</td>
                    <td>FB</td>
                    <td>e-mail</td>
                    <td>工作</td>
                    <td>工作縣市</td>
                    <td>職稱</td>
                    <td>LINE</td>
                    <td>餐點及飲品</td>
                    <td>公布資料</td>
                    <td>上車</td>
                    <td>備註</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $SQL = "SELECT * FROM love_keyin WHERE ac_auto = " . $ac . " order by k_time desc";
                $rs = $FunConn->prepare($SQL);
                $rs->execute();
                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                if (!$result) {
                    call_alert("讀取資料有誤。", 0, 0);
                } else {
                    $nu = 1;
                    foreach ($result as $re) {;
                        if ($re["k_be"] == 1) {
                            $k_be = "備取";
                        } else {
                            $k_be = "正取";
                        }
                        if (chkDate($re["k_year"])) {
                            $k_year = Date_EN($re["k_year"], 1);
                        } else {
                            $k_year = "不明";
                        }
                        $k_pay_num = "";
                        if ($re["k_pay_num"] != "") {
                            $k_pay_num = $re["k_pay_num"];
                        }

                        $k_pay_check = "";
                        if ($re["k_pay_check"] != "") {
                            $k_pay_check = $re["k_pay_check"];
                        }
                        $k_pay_m = "";
                        if ($re["k_pay_m"] != "") {
                            $k_pay_m = $re["k_pay_m"];
                        }
                        if ($re["k_pay_note"] != "") {
                            $k_pay_m = $k_pay_m . "," . $re["k_pay_note"];
                        }
                        $gc = "";
                        $sqls = "select mem_num from goldcard_data where mem_username = '" . strtoupper($re["k_user"]) . "'";
                        $rs = $FunConn->prepare($sqls);
                        $rs->execute();
                        $result = $rs->fetch(PDO::FETCH_ASSOC);
                        if ($result) {
                            $gc = "金卡";
                            $mem_num = $result["mem_num"];
                        }

                        if ($gc == "金卡") {
                            $totalp = 0;
                            $sqls = "select sum(totalp) as totalp from goldcard_point where mem_num=" . $mem_num;
                            $rs = $FunConn->prepare($sqls);
                            $rs->execute();
                            $result = $rs->fetch(PDO::FETCH_ASSOC);
                            if ($result) {
                                $totalp = $result["totalp"];
                            }
                        }
                        $um = "";
                        $sqls = "select p1,p2,p3,p1e,p2e,p3e from member_data where mem_num='" . $re["mem_num"] . "'";
                        $rs = $FunConn->prepare($sqls);
                        $rs->execute();
                        $result = $rs->fetch(PDO::FETCH_ASSOC);
                        if ($result) {                           
                            if ($result["p1"] != "" && $result["p1e"] == "ok") {
                                $um = $um . "身正";
                            }
                            if ($result["p2"] != "" && $result["p2e"] == "ok") {
                                $um = $um . "、身反";
                            }
                            if ($result["p3"] != "" && $result["p3e"] == "ok") {
                                $um = $um . "、工證";
                            }
                        }
                        if ($um == "") {
                            $um = "無";
                        }
                ?>
                        <tr>
                            <td><?php echo $nu ?></td>
                            <td><?php echo $k_be ?></td>
                            <td><?php echo $k_pay_num ?></td>
                            <td><?php echo $k_pay_check ?></td>
                            <td><?php echo $k_pay_m ?></td>
                            <td><?php echo $um ?></td>
                            <td><?php echo $re["k_name"] ?></td>
                            <td><?php echo $re["k_sex"] ?></td>
                            <td><?php echo $re["k_user"] ?></td>
                            <td><?php echo $k_year ?></td>
                            <td><?php echo $re["k_star"] ?></td>
                            <td><?php echo $re["k_mobile"] ?></td>
                            <td><?php echo $re["k_school"] ?></td>
                            <td><?php echo $re["k_area"] ?></td>
                            <td><?php echo $re["ac_1"] ?></td>
                            <td><?php echo $re["ac_2"] ?></td>
                            <td><?php echo $re["k_marry"] ?></td>
                            <td><?php echo $re["k_eat"] ?></td>
                            <td><?php echo $re["ac_3"] ?></td>
                            <td><?php echo $re["k_yn"] ?></td>
                            <td><?php echo $re["k_company"] ?></td>
                            <td><?php echo $re["k_workcity"] ?></td>
                            <td><?php echo $re["k_company2"] ?></td>
                            <td><?php echo $re["lineid"] ?></td>
                            <td>
                                <?php
                                    $k_eat = "";
                                    if($re["k_eat1"] != ""){
                                        $k_eat = $k_eat . $re["k_eat1"];
                                    }
                                    if($re["k_eat2"] != ""){
                                        if($re["k_eat"] != ""){
                                            $k_eat = $k_eat . "/" . $re["k_eat2"];
                                        }else{
                                            $k_eat = $k_eat . $re["k_eat2"];
                                        }                                    
                                    }
                                    echo $k_eat;
                                ?>
                            </td>                            
                            <td><?php echo $re["k_2"]; ?></td>
                            <td>
                                <?php 
                                    if($re["ac_car"] != ""){
                                        echo $re["ac_car"]; 
                                    }                                    
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if($gc != ""){
                                        echo $gc. " " .$totalp. " 點";
                                    }
                                    $nu = $nu+1;                        
                                ?>
                            </td>
                        </tr>

                <?php }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<script type="text/javascript">
    setTimeout(function() {
        window.close();
    }, 5000);
</script>