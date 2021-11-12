
<?php
/*****************************************/
//檔案名稱：ad_infojetmedia_excel.php
//後台對應位置：名單/發送記錄>春天億捷創意(匯出Excel)
//改版日期：2021.11.12
//改版程式人員：Queena
/*****************************************/

require_once("_inc.php");
require_once("./include/_function.php");

$t1 = SqlFilter($_REQUEST["times1"],"tab");
$t2 = SqlFilter($_REQUEST["times2"],"tab");

if ( $t1 != "" ){
    if ( chkDate($t1) == false ){
        call_alert("起始日期有誤。", 0, 0);
    }
    $t1 = $t1 . " 00:00";
}

if ( $t2 != "" ){
    if ( chkDate($t2) == false ){
        call_alert("結束日期有誤。", 0, 0);
    }
    $t2 = $t2 . " 23:59";
}

if ( $t1 != "" && $t2 != "" ){
    $subSQL = " and times between '".$t1."' and '".$t2."'";
}

$SQL = "Select * From infojetmedia Where 1 = 1".$subSQL." Order By times Desc";
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result=$rs->fetchAll(PDO::FETCH_ASSOC);
header('Content-type:application/vnd.ms-excel');  //宣告網頁格式
header('Content-Disposition: attachment; filename='.date("Y-m_d").'media.xls');  //設定檔案名稱
?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <table border="1">
            <tr>
                <th>時間</th>
                <th>姓名</th>								  
                <th>性別</th>
                <th>生日</th>
                <th>學歷</th>
                <th>手機</th>
                <th>Email</th>
                <th>地區</th>
                <th>註冊來源</th>
                <th>註冊時間</th>
                <th>回報</th>
            </tr>
            <?php foreach($result as $re){?>
                <tr>
                    <td><?php echo $re["times"];?></td>
                    <td><?php echo $re["names"];?></td>
                    <td><?php echo $re["sex"];?></td>
                    <td><?php echo $re["age"];?></td>
                    <td><?php echo $re["school"];?></td>
                    <td><?php echo $re["mobile"];?></td>
                    <td><?php echo $re["email"];?></td>
                    <td><?php echo $re["city"];?></td>
                    <td><?php echo $re["regc"];?></td>
                    <td><?php echo $re["regt"];?></td>
                    <?php //回報內容
                    $SQL1 = "Select Top 200 * From log_data Where log_num = '".$re["mem_auto"]."' And log_5 = 'member'";
                    $rs1 = $SPConn->prepare($SQL1);
                    $rs1->execute();
                    $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
                    if ( count($result1) == 0 ){
                        $K2_txt = "無";
                    }else{
                        foreach($result1 as $re1){
                            $K2_txt = $K2_txt . $re1["log_time"]."：".$re1["log_2"]."-".$re1["log_4"]." [".$re1["log_name"]."]<br>";
                        }
                    } ?>
                    <td><?php echo $K2_txt;?></td>
                </tr>
            <?php }?>
        </table>
    </body>
</html>