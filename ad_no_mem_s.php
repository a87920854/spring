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
            if($result){
                
                foreach($result as $re){
                    $mem_cc = chk_cc($re["mem_cc"], $re["mem_num"], $re["mem_lc"]);?>
                    <tr>
                        <td width="165"><?php echo Date_EN($re["mem_time"],9);?></td>
                        <td width="131">                
                            <?php 
                                echo $re["mem_come"];
                                if($re["mem_come2"] != ""){
                                    echo $re["mem_come2"];
                                }                                
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
        <?php }}         
        
            $mem_mobile = $re["mem_mobile"];
            if($mem_mobile != ""){
                switch($_SESSION["MM_UserAuthorization"]){
                    case "admin":
                        $SQL2 = "SELECT top 1 * FROM log_data WHERE log_1 ='".$mem_mobile."' and log_1 <> '0912345678' order by log_auto desc";
                        break;
                    case "branch":
                        $SQL2 = "SELECT top 1 * FROM log_data WHERE log_1 ='".$mem_mobile."' and log_1 <> '0912345678' and log_branch='".$_SESSION["branch"]."' order by log_auto desc";
                        break;
                    default:
                        $SQL2 = "SELECT top 1 * FROM log_data WHERE log_1 ='".$mem_mobile."' and log_1 <> '0912345678' and log_branch='".$_SESSION["branch"]."' and log_single = '".$_SESSION["MM_Username"]."' order by log_auto desc";
                        break;
                }
                if($_SESSION["branch"] == "總管理處"){
                    $SQL2 = "SELECT top 1 * FROM log_data WHERE log_1 ='".$mem_mobile."' and log_1 <> '0912345678' order by log_auto desc";
                }
                $rs2 = $SPConn->prepare($SQL2);
                $rs2->execute();
                $result2 = $rs2->fetchAll(PDO::FETCH_ASSOC);
                foreach($result2 as $re2);
                if($result2){
                    echo "<tr><td colspan=8 style='text-align:left;padding:5px;background:#f2f2f2'>最後回報：".$re2["log_branch"]."".SingleName($re2["log_single"],"normal")." - ".$re2["log_2"]." - ".$re2["log_4"]." - ".$re2["log_time"]."</td></tr>";
                }
            }
        ?>
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
            if($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["branch"] == "總管理處"){
                $SQL3 = "SELECT *  FROM love_keyin  WHERE all_kind = '排約' and all_type <> '未處理' and k_mobile = '".$_REQUEST["mem_mobile"]."' and k_mobile <> '0912345678' ORDER BY k_time DESC";
            }else{
                if($_SESSION["branch"] == "八德"){
                    $SQL3 = "SELECT *  FROM love_keyin  WHERE all_branch = '八德' and all_kind = '排約' and all_type <> '未處理' and k_mobile = '".$_REQUEST["mem_mobile"]."' and k_mobile <> '0912345678' ORDER BY k_time DESC";
                }else{
                    $SQL3 = "SELECT *  FROM love_keyin  WHERE all_branch <> '八德' and all_kind = '排約' and all_type <> '未處理' and k_mobile = '".$_REQUEST["mem_mobile"]."' and k_mobile <> '0912345678' ORDER BY k_time DESC";
                }
            }
            $rs3 = $SPConn->prepare($SQL3);
            $rs3->execute();
            $result3 = $rs3->fetchAll(PDO::FETCH_ASSOC);
            if($result3){
                foreach($result3 as $re3){?>
                    <tr>
                        <td width="163"><?php echo Date_EN($re3["k_time"],9);?></td>
                        <td width="96"><?php echo $re3["k_name"];?></td>
                        <td width="149"><?php echo $re3["k_mobile"];?></td>
                        <td width="197"><?php echo $re3["all_type"];?></td>
                        <td width="105"><?php echo $re3["all_branch"];?></td>
                        <td width="100">
                            <?php 
                                if($re3["all_single"] != ""){
                                    echo SingleName($re3["all_single"],"normal");
                                }                                
                            ?>
                        </td>
                    </tr>                
        <?php }} ?>
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
        <?php
            if($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["branch"] == "總管理處"){
                $SQL4 = "SELECT *  FROM love_keyin  WHERE all_kind = '活動' and k_mobile = '".$_REQUEST["mem_mobile"]."' and k_mobile <> '0912345678' ORDER BY k_time DESC";
            }else{
                if($_SESSION["branch"] == "八德"){
                    $SQL4 = "SELECT *  FROM love_keyin  WHERE action_branch = '八德' and all_kind = '活動' and k_mobile = '".$_REQUEST["mem_mobile"]."' and k_mobile <> '0912345678' ORDER BY k_time DESC";
                }else{
                    $SQL4 = "SELECT *  FROM love_keyin  WHERE action_branch <> '八德' and all_kind = '活動' and k_mobile = '".$_REQUEST["mem_mobile"]."' and k_mobile <> '0912345678' ORDER BY k_time DESC";
                }
            }
            $rs4 = $SPConn->prepare($SQL4);
            $rs4->execute();
            $result4 = $rs4->fetchAll(PDO::FETCH_ASSOC);
            if($result4){
                foreach($result4 as $re4){?>
                    <tr>
                        <td width="163"><div align="center" class="style1"><?php echo Date_EN($re3["k_time"],9); ?></div></td>
                        <td width="96"><div align="center" class="style1"><?php echo $re4["k_come"]; ?></div></td>
                        <td width="96"><div align="center" class="style1"><?php echo $re4["all_kind"]; ?></div></td>
                        <td width="96"><div align="center" class="style1"><?php echo $re4["k_name"]; ?></div></td>
                        <td width="149"><div align="center" class="style1"><?php echo $re4["k_mobile"]; ?></div></td>
                        <td width="149"><div align="center" class="style1"><?php echo Date_EN($re4["action_time"],9); ?><br><?php echo $re4["action_title"]; ?></div></td>
                        <td width="197"><div align="center" class="style1"><?php echo $re4["all_type"]; ?></div></td>
                        <td width="105"><div align="center" class="style1"><?php echo $re4["all_branch"]; ?></div></td>
                        <td width="100"><div align="center" class="style1">
                            <?php
                                if($re4["all_single"] != ""){
                                    echo SingleName($re4["all_single"],"normal");
                                } 
                            ?>
                        </div></td>
                    </tr>               
        <?php }} ?>
    </table>
    <br>
    <?php 
        if( ($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch") && $_SESSION["branch"] != "八德" ){ ?>
            <table width="950" border="1" align="center" style="border-collapse:collapse;">
                <tr>
                    <td colspan="8" bgcolor="#FFFFCC"><div align="center"><font color=blue>好好玩會員</font></td>
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
                    if($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["branch"] == "總管理處"){
                        $SQL5 = "SELECT * FROM member_data Where mem_mobile = '".$_REQUEST["mem_mobile"]."' and mem_mobile <> '0912345678' ORDER BY mem_auto DESC";
                    }else{
                        if($_SESSION["branch"] == "八德"){
                            $SQL5 = "SELECT * FROM member_data Where mem_branch = '八德' and mem_mobile = '".$_REQUEST["mem_mobile"]."' and mem_mobile <> '0912345678' ORDER BY mem_auto DESC";
                        }else{
                            $SQL5 = "SELECT * FROM member_data Where mem_branch <> '八德' and mem_mobile = '".$_REQUEST["mem_mobile"]."' and mem_mobile <> '0912345678' ORDER BY mem_auto DESC";
                        }
                    }
                    $rs5 = $FunConn->prepare($SQL5);
                    $rs5->execute();
                    $result5 = $rs5->fetchAll(PDO::FETCH_ASSOC);
                    if($result5){
                        foreach($result5 as $re5){?>
                            <tr>
                                <td width="165"><?php echo Date_EN($re5["mem_time"],9); ?></td>
                                <td width="131">
                                    <?php 
                                        echo $re5["mem_come"];
                                        if($re5["mem_come2"] != ""){
                                            echo $re5["mem_come2"];
                                        }
                                    ?>                                    
                                </td>
                                <td width="78"><?php echo $re5["mem_name"]; ?></td>
                                <td width="100"><?php echo $re5["mem_mobile"]; ?></td>
                                <td width="151"><?php echo $re5["mem_level"]; ?></td>
                                <td width="113"><?php echo $re5["all_type"]; ?></td>
                                <td width="90"><?php echo $re5["mem_branch"]; ?></td>
                                <td width="70">
                                    <?php
                                        if($re5["all_single"] != ""){
                                            echo SingleName($re5["all_single"],"normal");
                                        } 
                                    ?>
                                </td>
                            </tr>             
                <?php }} ?>
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
                <?php
                    if($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["branch"] == "總管理處"){
                        $SQL6 = "SELECT *  FROM love_keyin  WHERE all_type <> '未處理' and k_mobile = '".$_REQUEST["mem_mobile"]."' and k_mobile <> '0912345678' ORDER BY k_time DESC";
                    }else{
                        if($_SESSION["branch"] == "八德"){
                            $SQL6 = "SELECT *  FROM love_keyin  WHERE all_branch = '八德' and all_type <> '未處理' and k_mobile = '".$_REQUEST["mem_mobile"]."' and k_mobile <> '0912345678' ORDER BY k_time DESC";
                        }else{
                            $SQL6 = "SELECT *  FROM love_keyin  WHERE all_branch <> '八德' and all_type <> '未處理' and k_mobile = '".$_REQUEST["mem_mobile"]."' and k_mobile <> '0912345678' ORDER BY k_time DESC";
                        }
                    }
                    $rs6 = $FunConn->prepare($SQL6);
                    $rs6->execute();
                    $result6 = $rs6->fetchAll(PDO::FETCH_ASSOC);
                    if($result6){
                        foreach($result6 as $re6){?>
                            <tr>
                                <td width="163"><?php echo Date_EN($re6["k_time"],9); ?></td>
                                <td width="80"><?php  echo $re6["k_name"]; ?>  </td>
                                <td width="100"><?php echo $re6["k_mobile"]; ?></td>
                                <td width=300 align="left"><?php echo $re6["action_time"]; ?><br><?php echo $re6["action_title"]; ?></td>
                                <td width="80"><?php echo $re6["all_type"]; ?></td>
                                <td width="105"><?php echo $re6["all_branch"]; ?></td>
                                <td width="100">
                                    <?php
                                        if($re6["all_single"] != ""){
                                            echo SingleName($re6["all_single"],"normal");
                                        } 
                                    ?>
                                </td>
                            </tr>             
                <?php }} ?>
            </table>
    <?php } ?>
    <br><br>
    <center><input type="button" onclick="javascript:window.close();" value="關閉視窗" style="width:950px;height:100px;">
</body>

</html>