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
        }

    }

?>

<meta charset="utf-8" />

<script src="js/jquery-1.8.3.js"></script>
<script src="js/util.js"></script>
<b>建立一個新團隊</b>
<form method="post" action="ad_secretary_group_add.asp?st=edit" onsubmit="return chk_form()">
    <p>
        隸屬會館：<select name="branch" id="branch" disabled>

            <option value="總管理處" selected>總管理處</option>
            <option value="台北">台北</option>
            <option value="桃園">桃園</option>
            <option value="新竹">新竹</option>
            <option value="台中">台中</option>
            <option value="台南">台南</option>
            <option value="高雄">高雄</option>
            <option value="八德">八德</option>
            <option value="約專">約專</option>
            <option value="迷你約">迷你約</option>
            <option value="總管理處">總管理處</option>
        </select>
    </p>
    <p>團隊名稱：<input type="text" style="width:50%;" name="group_name" id="group_name" value="TEST"></p>
    <p>團隊經理：<select name="group_leader" id="group_leader">
            <option value="">請選擇</option>
        </select></p>
    <!--<p>團隊目標：<input type="text" style="width:50%;" name="group_point" id="group_point" value="">(請輸入數字)</p>-->

    <input type="hidden" name="an" value="8">
    <input type="hidden" name="old_group_name" value="TEST">
    <input type="hidden" name="old_group_leader" value="JACK0906">

    <p><input type="submit" value="確認送出"></p>
</form>

<script type="text/javascript">
    $(function() {
        $("#branch").on("change", function() {
            personnel_get("branch", "group_leader");
        });

        personnel_get("branch", "group_leader", "JACK0906");

    });

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
        if (!$("#group_leader").val()) {
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