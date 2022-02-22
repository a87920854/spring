<?php
    /*****************************************/
    //檔案名稱：ad_action_list2_view_print.php
    //後台對應位置：管理系統/網站活動上傳/網站活動團控>列印本頁
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
    if($_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "single"){
        call_alert("您沒有查看此頁的權限。", "login.php", 0);
    }

    $SQL = "select * from action_data where ac_auto='".SqlFilter($_REQUEST["id"],"int")."'";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if(!$result){
        echo "暫無資料";
    }
?>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
<p>網站活動團控 - <?php echo SqlFilter($_REQUEST["id"],"int"); ?><?php echo $result["ac_title"]; ?></p>
<table width="100%" border="1" style="border-collapse:collapse;" borderColor="black">
    <?php 
        $boys = 0;
        $girls = 0;
        $SQL = "select count(k_id) as tt from love_keyin where all_kind='活動' and action_auto='".$result["ac_auto"]."' and k_sex='男'";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result2 = $rs->fetch(PDO::FETCH_ASSOC);
        if($result2){
            $boys = $result2["tt"];
        }
        $SQL = "select count(k_id) as tt from love_keyin where all_kind='活動' and action_auto='".$result["ac_auto"]."' and k_sex='女'";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result2 = $rs->fetch(PDO::FETCH_ASSOC);
        if($result2){
            $girls = $result2["tt"];
        }
        $SQL = "select * from love_keyin where all_kind='活動' and action_auto='".$result["ac_auto"]."' order by k_time desc";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result2 = $rs->fetchAll(PDO::FETCH_ASSOC);
        if(!$result2){
            echo "<tr><td colspan=8>暫無資料</td></tr>";
        }else{ ?>
            <thead>
                <tr>
                    <td colspan=9>男：<?php echo $boys; ?> 人、女： <?php echo $girls; ?>人、共： <?php echo $boys+$girls; ?>人</td>
                </tr>
                <tr>
                    <th>會員</th>
                    <th>姓名</th>
                    <th>性別</th>
                    <th>手機</th>
                    <th>Email</th>
                    <th>地區</th>
                    <th>活動會館</th>
                    <th>參加活動</th>
                    <th>來源</th>
                    <th width="250">報名時間</th>
                </tr>
            </thead>
            <tbody>
               <?php
                    foreach($result2 as $re2){
                        $SQL = "select mem_level, mem_branch from member_data where mem_mobile='".$re2["k_mobile"]."' and mem_level='mem'";
                        $rs = $SPConn->prepare($SQL);
                        $rs->execute();
                        $result3 = $rs->fetchAll(PDO::FETCH_ASSOC);
                        if(!$result3){
                            $mlabel = "非會員";
                            
                        }else{
                            foreach($result3 as $re3){
                                $mlabel = "";
                                if($re3["mem_branch"] == "八德"){
                                    $mlabel = $mlabel."DateMeNow";
                                }
                                if($re3["mem_branch"] != "八德"){
                                    $mlabel = $mlabel."春天會館";
                                }
                            }
                        } ?>
                        <tr>
                            <td><?php echo $mlabel; ?></td>
                            <td align="center"><?php echo $re2["k_name"]; ?></td>  	
                            <td align="center"><?php echo $re2["k_sex"]; ?></td>
                            <td class="center"><?php echo $re2["k_mobile"]; ?></td>
                            <td class="center"><?php echo $re2["k_yn"]; ?></td>
                            <td class="center"><?php echo $re2["k_area"]; ?></td>
                            <td class="center"><?php echo $re2["action_branch"]; ?></td>
                            <td class="center">
                                <?php 
                                    if($re2["action_time"] != ""){
                                        if(chkDate($re2["action_time"])){
                                            $at = Date_EN($re2["action_time"],1); 
                                        }else{
                                            $at = $re2["action_time"];
                                        }
                                    }
                                ?>
                                <?php echo $at; ?>-<?php echo $re2["action_title"]; ?>
                            </td>
							<td class="center"><?php echo $re2["k_come"]; ?></td>
							<td><?php echo changeDate($re2["k_time"]); ?></td>
                        </tr>
                    <?php }                                        
               ?>
            </tbody>
        <?php }
    ?>    
</table>
</body>
</html>