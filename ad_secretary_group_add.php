<?php

    /*****************************************/
    //檔案名稱：ad_secretary_group.php
    //後台對應位置：管理系統/秘書資料>團隊管理>新增團隊
    //改版日期：2022.1.18
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    // 新增
    if($_REQUEST["st"] == "add"){
        $group_name = SqlFilter($_REQUEST["group_name"],"tab");
        $group_name = str_replace(" ", "",$group_name);
        $group_name = str_replace(".", "",$group_name);
        $group_name = str_replace("+", "",$group_name);
        $group_name = str_replace("&", "",$group_name);
        $group_name = str_replace("|", "",$group_name);

        $SQL = "select * from bgroup_list where group_name='".$group_name."'";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch();
        if($result){
            call_alert("此團隊名稱已經被使用了。", 0, 0);
        }else{
            $group_leader = SqlFilter($_REQUEST["single"],"tab");

            $SQL2 = "select group_name, group_leader_id from bgroup_list where group_leader_id='".$group_leader."'";
            $rs = $SPConn->prepare($SQL2);
            $rs->execute();
            $result2 = $rs->fetch();
            if($result2){
                call_alert("被設定成團隊經理的人已經是".$result2["group_name"]."的經理了。", 0, 0);
                exit();
            }

            $SQL2 = "select p_other_name, p_name from personnel_data where p_user='".$group_leader."'";
            $rs = $SPConn->prepare($SQL2);
            $rs->execute();
            $result2 = $rs->fetch();
            if($result2){
                if($result2["p_other_name"] != ""){
                    $p_name = $result2["p_other_name"];
                }else{
                    $p_name = $result2["p_name"];
                }
                // 更新團體名稱
                $SQL2 = "UPDATE personnel_data SET group_name = '".$group_name."' where p_user='".$group_leader."'";
                $rs = $SPConn->prepare($SQL2);
                $rs->execute();
            }
            // 更新團體名稱
            $SQL2 = "UPDATE personnel_data_aparty SET group_name='".$group_name."' where p_user='".$group_leader."'";
            $rs = $SPConn->prepare($SQL2);
            $rs->execute();

            // 新增
            $SQL2 = "INSERT INTO bgroup_list (branch,group_name,group_leader_name,group_leader_id,times) VALUES ('".SqlFilter($_REQUEST["branch"],"tab")."','".$group_name."','".$p_name."','".$group_leader."','".date("Y-m-d H:i:s")."')";
            $rs = $SPConn->prepare($SQL2);
            $rs->execute();
            if($rs){
                reURL("win_close.php?m=資料新增中");
            }
        }
    }

    // 修改
    if($_REQUEST["st"] == "edit"){
        $an = SqlFilter($_REQUEST["an"],"int");
        $group_leader = SqlFilter($_REQUEST["single"],"tab");
        $group_name = SqlFilter($_REQUEST["group_name"],"tab");
        $group_name = str_replace(" ", "",$group_name);
        $group_name = str_replace(".", "",$group_name);
        $group_name = str_replace("+", "",$group_name);
        $group_name = str_replace("&", "",$group_name);
        $group_name = str_replace("|", "",$group_name);
        
        $SQL = "select * from bgroup_list where group_name='".$group_name."' and not auton=".$an;
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch();
        if($result){
            call_alert("此團隊名稱已經被使用了。", "ad_secretary_group_add.php?an=".$an, 0);
        }
        
        $SQL = "select * from bgroup_list where auton=".$an;
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            if($result["group_leader_id"] != $_REQUEST["single"]){
                $SQL2 = "select group_name, group_leader_id from bgroup_list where group_leader_id='".$group_leader."'";
                $rs = $SPConn->prepare($SQL2);
                $rs->execute();
                $result2 = $rs->fetch();
                if($result2){
                    call_alert("被設定成團隊經理的人已經是".$result2["group_name"]."的經理了。", "ad_secretary_group_add.php?an=".$an, 0);
                    exit();
                }
                $SQL2 = "select p_other_name, p_name from personnel_data where p_user='".$group_leader."'";
                $rs = $SPConn->prepare($SQL2);
                $rs->execute();
                $result2 = $rs->fetch();
                if($result2){
                    if($result2["p_other_name"] != ""){
                        $p_name = $result2["p_other_name"];
                    }else{
                        $p_name = $result2["p_name"];
                    }
                    // 更新團體名稱
                    $SQL2 = "UPDATE personnel_data SET group_name = '".$group_name."' where p_user='".$group_leader."'";
                    $rs = $SPConn->prepare($SQL2);
                    $rs->execute();
                }
                // 更新團體名稱
                $SQL2 = "UPDATE personnel_data_aparty SET group_name ='".$group_name."' where p_user='".$group_leader."'";
                $rs = $SPConn->prepare($SQL2);
                $rs->execute();

                // 更新團隊領導
                $SQL2 = "UPDATE bgroup_list SET group_leader_name ='".$p_name."', group_leader_id ='".$group_leader."' where auton=".SqlFilter($_REQUEST["an"],"int");
                $rs = $SPConn->prepare($SQL2);
                $rs->execute();                            
            }

            //更新點數跟團隊名
            if($_REQUEST["group_point"] != ""){
                $group_point = SqlFilter($_REQUEST["group_point"],"int");
            }else{
                $group_point = null;
            }
            $SQL2 = "UPDATE bgroup_list SET group_name ='".$group_name."', group_point ='".$group_point."' where auton=".SqlFilter($_REQUEST["an"],"int");
            $rs = $SPConn->prepare($SQL2);
            $rs->execute();

            if($_REQUEST["old_group_name"] != "" && $_REQUEST["old_group_name"] != $group_name){
                $SQL2 = "update personnel_data_aparty set group_name='".$group_name."' where group_name='".SqlFilter($_REQUEST["old_group_name"],"tab")."'";
                $rs = $SPConn->prepare($SQL2);
                $rs->execute();
            }
            if($_REQUEST["old_group_leader"] != "" && $_REQUEST["old_group_leader"] != $_REQUEST["single"]){
                $SQL2 = "update personnel_data_aparty set group_name=NULL where p_user='".SqlFilter($_REQUEST["old_group_name"],"tab")."'";
                $rs = $SPConn->prepare($SQL2);
                $rs->execute();
            }
            reURL("win_close.php?m=資料儲存中");
        }else{
            call_alert("儲存資料發生錯誤。", 0, 0);
        }
    }

    //讀取
    if($_REQUEST["an"] != ""){
        $SQL = "SELECT * FROM bgroup_list where auton=".SqlFilter($_REQUEST["an"],"int");
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $branch = $result["branch"];
            $group_name = $result["group_name"];
            $group_leader = $result["group_leader_id"];
            $group_point = $result["group_point"];
        }
        $ss = "edit";
        $sg = " disabled";
        $cs = "修改團隊";
    }else{
        $ss = "add";
	    $sg = "";
        $cs = "建立一個新團隊";
    }

?>

<meta charset="utf-8" />

<script src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<b><?php echo $cs; ?></b>
<form method="post" action="ad_secretary_group_add.php?st=<?php echo $ss; ?>" onsubmit="return chk_form()">
    <p>
        隸屬會館：
        <select name="branch" id="branch" <?php echo $sg; ?>>
            <option value="">請選擇</option>
            <?php  
                if($_SESSION["MM_UserAuthorization"] == "admin"){
                    $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' Order By admin_SOrt";
                        $rs = $SPConn->prepare($SQL);
                        $rs->execute();
                        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                        foreach($result as $re){ ?>
                            <option value="<?php echo $re["admin_name"];?>"<?php if($branch == $re["admin_name"]){echo "selected"; } ?>><?php echo $re["admin_name"];?></option>
                    <?php }
                }else{
                    echo "<option value='".$_SESSION["branch"]."' selected>".$_SESSION["branch"]."</option>";
                }                                         
            ?>
        </select>
    </p>
    <p>團隊名稱：<input type="text" style="width:50%;" name="group_name" id="group_name" value="<?php echo $group_name; ?>"></p>
    <p>團隊經理：
        <select name="single" id="single">
            <option value="">請選擇</option>
            <?php
                $SQL_er = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".$branch."' And p_work=1 Order By p_desc2 Desc, lastlogintime Desc";
                if ( $branch != "" ){
                    $rs_er = $SPConn->prepare($SQL_er);
                    $rs_er->execute();
                    $result_er=$rs_er->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach($result_er as $re_er){
                        if ( $re_er["p_name"] != "" ){ $p_name = $re_er["p_name"]; }
                        if ( $re_er["p_other_name"] != "" ){ $p_name = $re_er["p_other_name"]; }
                        echo "<option value='".$re_er["p_user"]."'";
                        if($re_er["p_user"] == $group_leader){
                            echo " selected";
                        }
                        echo ">".$p_name."</option>";
                    }
                }
            ?>
        </select>
    </p>
    <!--<p>團隊目標：<input type="text" style="width:50%;" name="group_point" id="group_point" value="">(請輸入數字)</p>-->

    <input type="hidden" name="an" value="<?php echo SqlFilter($_REQUEST["an"],"int"); ?>">
    <input type="hidden" name="old_group_name" value="<?php echo $group_name; ?>">
    <input type="hidden" name="old_group_leader" value="<?php echo $group_leader; ?>">
    <p><input type="submit" value="確認送出"></p>
</form>

<script type="text/javascript">
    function chk_form() {
        if (!$("#branch").val()) {
            alert("請選擇會館。");
            return false;
        }
        if (!$("#group_name").val()) {
            alert("請輸入團隊名稱。");
            $("#group_name").focus();
            return false;
        }
        if (!$("#single").val()) {
            alert("請選擇團隊經理。");
            return false;
        }
        /*	if(!$("#group_point").val()) {
        		alert("請選擇團隊目標。");
        		return false;		
        	}
           var $re = /^\d+$/;
           if(!$re.test($("#group_point").val())) {
             alert("團隊目標只能輸入數字。");
             $("#group_point").val("");
        	 $("#group_point").focus();	 
             return false;
           }*/
        return true;
    }
  
</script>