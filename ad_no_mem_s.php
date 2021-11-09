<?php

    /*****************************************/
    //檔案名稱：ad_fun_mem_s.php
    //後台對應位置：好好玩管理系統/會員管理系統>查
    //改版日期：2021.11.8
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    if($_SESSION["MM_Username"] == ""){
        call_alert("請重新登入。","login.html",0);
    }    
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>後台管理系統</title>
    <style type="text/css">        
        table td {
            height: 25px;
            font-size: 12px;
            text-align: center;
        }        
    </style>
</head>
<?php 
    // 查手機黑名單
    $blackbtn = "";
    $qsql = "select beca from call_list where fn = '" .$_REQUEST["mem_mobile"]. "' and types='val'";
    $qrs = $SPConn->prepare($qsql);
    $qrs->execute();
    $qresult = $qrs->fetch(PDO::FETCH_ASSOC);
    if($qresult){
        $blackbtn = "<center><span style='color:red'>此電話號碼 " .$_REQUEST["mem_mobile"]. " 已被加入黑名單 - " .$qresult["beca"]. "</span></center>";
    }
    if($blackbtn != ""){
        echo $blackbtn;
    }
?>
<body leftmargin="0" topmargin="5">

    <table width="950" border="1" align="center" style="border-collapse:collapse;">
        <tr>
            <td colspan="8" bgcolor="#FFFFCC">
                <div align="center">
                    <font color=purple>春天會員</font>
            </td>
        </tr>
        <tr>
            <td bgcolor="#FFFFCC">資料時間</td>
            <td bgcolor="#FFFFCC">資料來源</td>
            <td bgcolor="#FFFFCC">姓名</td>
            <td bgcolor="#FFFFCC">手機</td>
            <td bgcolor="#FFFFCC">是否會員<br>
                (mem=入會，guest=未入會)</td>
            <td bgcolor="#FFFFCC">處理情形</td>
            <td bgcolor="#FFFFCC">處理會館</td>
            <td bgcolor="#FFFFCC">處理秘書</td>
        </tr>

        <?php
            if($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "總管理處"){
                $sql = "SELECT * FROM member_data Where mem_mobile = '" .$_REQUEST["mem_mobile"]. "' and mem_mobile <> '0912345678' ORDER BY mem_auto DESC";
            }else{
                if($_SESSION["branch"] == "八德"){
                    $sql = "SELECT * FROM member_data Where mem_branch = '八德' and mem_mobile = '" .$_REQUEST["mem_mobile"]. "' and mem_mobile <> '0912345678' ORDER BY mem_auto DESC";
                }elseif($_SESSION["branch"] == "約專"){
                    $sql = "SELECT * FROM member_data Where mem_branch = '約專' and mem_mobile = '" .$_REQUEST["mem_mobile"]. "' and mem_mobile <> '0912345678' ORDER BY mem_auto DESC";
                }elseif($_SESSION["branch"] == "迷你約"){
                    $sql = "SELECT * FROM member_data Where mem_branch = '迷你約' and mem_mobile = '" .$_REQUEST["mem_mobile"]. "' and mem_mobile <> '0912345678' ORDER BY mem_auto DESC";
                }else{
                    $sql = "SELECT * FROM member_data Where not mem_branch in ('約專', '迷你約', '八德') and mem_mobile = '" .$_REQUEST["mem_mobile"]. "' and mem_mobile <> '0912345678' ORDER BY mem_auto DESC";
                }
            }
            $rs = $SPConn->prepare($sql);
            $rs->execute();
            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $re);
            if($result){
                $mem_cc = chk_cc($re["mem_cc"], $re["mem_num"], $re["mem_lc"]);               
            }
            
        ?>
        <tr>
            <td width="165"><?php echo Date_EN($re["mem_time"],9);?></td>
            <td width="131">                
                <?php 
                    echo $re["mem_come"];
                    if($re["mem_come2"] != ""){
                        echo $re["mem_come2"];
                    };
                    echo $mem_cc;
                ?>
            </td>
            <td width="78"><?php echo $re["mem_name"];?></td>
            <td width="100"><?php echo $re["mem_mobile"];?></td>
            <td width="151"><?php echo $re["mem_level"];?></td>
            <td width="113"><?php echo $re["all_type"];?></td>
            <td width="90"><?php echo $re["mem_branch"];?></td>
            <td width="70">
                <?php 
                    if($re["mem_name"] != ""){
                        echo SingleName($re["mem_single"],"normal");
                    }
                    
                ?>
            </td>
        </tr>
        <tr>
            <td colspan=8 style="text-align:left;padding:5px;background:#f2f2f2">最後回報：台南王秀玲 - 預約聯絡 - 王秀玲於2021/5/15 下午 08:29:33預約 2021/05/17 19:00 聯絡，內容：未接 - 2021/5/15 下午 08:29:00</td>
        </tr>
    </table>
    <br>
    <table width="950" border="1" align="center" style="border-collapse:collapse;">
        <tr>
            <td colspan="6" bgcolor="#FFFFCC">
                <div align="center">
                    <font color=purple>春天排約</font>
            </td>
        </tr>
        <tr>
            <td bgcolor="#FFFFCC">資料時間</td>
            <td bgcolor="#FFFFCC">姓名</td>
            <td bgcolor="#FFFFCC">手機</td>
            <td bgcolor="#FFFFCC">處理情形</td>
            <td bgcolor="#FFFFCC">處理會館</td>
            <td bgcolor="#FFFFCC">處理秘書</td>
        </tr>
        <?php

        ?>
    </table>
    <br>
    <table width="950" border="1" align="center" style="border-collapse:collapse;">
        <tr>
            <td colspan="9" bgcolor="#FFFFCC">
                <div align="center">
                    <font color=purple>春天活動</font>
                </div>
            </td>
        </tr>
        <tr>
            <td bgcolor="#FFFFCC">
                <div align="center" class="style1">資料時間</div>
            </td>
            <td bgcolor="#FFFFCC">
                <div align="center" class="style1">資料來源</div>
            </td>
            <td bgcolor="#FFFFCC">
                <div align="center" class="style1">類型</div>
            </td>
            <td bgcolor="#FFFFCC">
                <div align="center" class="style1">姓名</div>
            </td>
            <td bgcolor="#FFFFCC">
                <div align="center" class="style1">手機</div>
            </td>
            <td bgcolor="#FFFFCC">
                <div align="center" class="style1">活動資料</div>
            </td>
            <td bgcolor="#FFFFCC">
                <div align="center" class="style1">處理情形</div>
            </td>
            <td bgcolor="#FFFFCC">
                <div align="center" class="style1">處理會館</div>
            </td>
            <td bgcolor="#FFFFCC">
                <div align="center" class="style1">處理秘書</div>
            </td>
        </tr>


    </table>
    <br>

    <table width="950" border="1" align="center" style="border-collapse:collapse;">
        <tr>
            <td colspan="8" bgcolor="#FFFFCC">
                <div align="center">
                    <font color=blue>好好玩會員</font>
            </td>
        </tr>
        <tr>
            <td bgcolor="#FFFFCC">資料時間</td>
            <td bgcolor="#FFFFCC">資料來源</td>
            <td bgcolor="#FFFFCC">姓名</td>
            <td bgcolor="#FFFFCC">手機</td>
            <td bgcolor="#FFFFCC">是否會員<br>
                (mem=入會，guest=未入會)</td>
            <td bgcolor="#FFFFCC">處理情形</td>
            <td bgcolor="#FFFFCC">處理會館</td>
            <td bgcolor="#FFFFCC">處理秘書</td>
        </tr>

        <tr>
            <td width="165">2021-09-08 00:08</td>
            <td width="131">活動宣傳</td>
            <td width="78">張維麟</td>
            <td width="100">0975083865</td>
            <td width="151">註冊會員</td>
            <td width="113">未處理</td>
            <td width="90"></td>
            <td width="70"></td>
        </tr>

    </table>
    <br>
    <table width="950" border="1" align="center" style="border-collapse:collapse;">
        <tr>
            <td colspan="7" bgcolor="#FFFFCC">
                <div align="center">
                    <font color=blue>好好玩排約及活動</font>
            </td>
        </tr>
        <tr>
            <td bgcolor="#FFFFCC">資料時間</td>
            <td bgcolor="#FFFFCC">姓名</td>
            <td bgcolor="#FFFFCC">手機</td>
            <td bgcolor="#FFFFCC"></td>
            <td bgcolor="#FFFFCC">處理情形</td>
            <td bgcolor="#FFFFCC">處理會館</td>
            <td bgcolor="#FFFFCC">處理秘書</td>
        </tr>

        <tr>
            <td width="163">2021-09-08 01:28</td>
            <td width="80">張維麟</td>
            <td width="100">0975083865</td>
            <td width=300 align="left">2021/10/24 上午 09:00:00<br>北海岸踏浪趣｜探索金沙灣秘境＋超夯IG打卡熱點＋懷舊鐵路便當＋海灘分組遊戲</td>
            <td width="80">已發送</td>
            <td width="105">桃園</td>
            <td width="100">阿綸
            </td>
        </tr>

        <tr>
            <td width="163">2021-09-08 00:57</td>
            <td width="80">張維麟</td>
            <td width="100">0975083865</td>
            <td width=300 align="left">2021/9/11 下午 02:00:00<br>愛×熟成(6年級下午茶台北場)</td>
            <td width="80">已發送</td>
            <td width="105">桃園</td>
            <td width="100">阿綸
            </td>
        </tr>

    </table>

    <br><br>
    <center><input type="button" onclick="javascript:window.close();" value="關閉視窗" style="width:950px;height:100px;">
</body>

</html>