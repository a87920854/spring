<?php
    /*****************************************/
    //檔案名稱：ad_fun_action_list_singup2_change.php
    //後台對應位置：好好玩管理系統/同業報名單管>報名詳細資料>轉日
    //改版日期：2021.12.22
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    //程式開始 *****
    if ($_SESSION["MM_Username"] == "") {
        call_alert("請重新登入。", "login.php", 0);
    }

    $ac = SqlFilter($_REQUEST["ac"],"int");
    $id = SqlFilter($_REQUEST["id"],"tab");

    if($_REQUEST["st"] == "get_cat"){
        $SQL = "select dates from travel_date where ac_auto=".$ac." order by dates desc";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
        if(!$result){
            echo "error";
            exit();
        }else{
            foreach($result as $re){
                $datesStr = $datesStr . Date_EN($re["dates"],1) .",";
            }
            if(substr($datesStr,-1,1) == ","){
                $datesStr = substr($datesStr,0,-1);
            }
            echo $datesStr;
            exit();
        }
    }

    if($_REQUEST["state"] == "add"){
        $SQL = "select ac_branch, ac_title, ac_note1, ac_time from actionf_data where ac_auto=".Sqlfilter($_REQUEST["cac"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $action_branch = $result["ac_branch"];
            $action_title = $result["ac_title"];
            $action_note = $result["ac_note1"];
            $action_time = $result["ac_time"];            
        }else{
            call_alert("無法讀取到新行程的資料。",0,0);
        }

        $SQL = "select k_name, k_mobile, action_title, action_time from love_keyin where ac_auto=".$ac." and k_id=".$id;
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $uname = $result["k_name"];
            $uphone = $result["k_mobile"];
            $atitle = $result["action_title"];
            $atime = $result["action_time"];
        }else{
            call_alert("無法讀取到新行程的資料。",0,0);
        }

        // 更新
        $SQL =  "UPDATE love_keyin SET 
                ac_auto = '".Sqlfilter($_REQUEST["cac"],"int")."', 
                action_branch = '".$action_branch."', 
                action_title = '".$action_title."', 
                action_note = '".$action_note."', 
                action_time = '".Date_EN(SqlFilter($_REQUEST["cat"],"tab"),1)."' 
                where ac_auto=".$ac." and k_id=".$id;        
        $rs = $FunConn->prepare($SQL);
        $rs->execute();

        // 新增
        $SQL =  "INSERT INTO log_data (log_time, log_num, log_username, log_name, log_single, log_branch, log_1, log_2, log_3, log_4, log_5) VALUES ('"
                .date("Y/m/d H:i:s")."', '"
                .$id."', '" 
                .$uname."', '"
                .$_SESSION["p_other_name"]."', '"
                .$_SESSION["MM_Username"]."', '"
                .$_SESSION["branch"]."', '"
                .$uphone."', 
                '系統回報', 
                '轉日/轉團', 
                '由".$_SESSION["p_other_name"]."設定轉日/轉團，從原團 ".$atime." - ".$atitle." 變更為 ".Date_EN(SqlFilter($_REQUEST["cat"],"tab"),1)." - ".$action_title."。', 
                'lovekeyin')";     
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("win_close.php?m=設定中...");
        }
    }

    $SQL = "SELECT k_name, action_time, action_title FROM love_keyin Where k_id = ".$id." and ac_auto = ".$ac;
    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if($result){
        $k_name = $result["k_name"];
        $action_time = $result["action_time"];
        $action_title = $result["action_title"];
    }else{
        call_alert("資料讀取錯誤。","ClOsE",0);
    }
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>好好玩旅行社</title>
    <style>
        table {
            font-size: 13px;
        }
    </style>
    </head>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/util.js"></script>

<body leftmargin="0" topmargin="0">
    <form action="ad_fun_action_list_singup2_change.php?state=add" method="post" name="form1">
        <table width="420" border="0" align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend>好好玩旅行社</legend>
                        <table width="420" border="0" align="center" cellpadding="3">
                            <tr bgcolor="#FFF0E1">
                                <td colspan="2" bgcolor="#336699" style="color:white">轉日/轉團</td>
                            </tr>
                            <tr bgcolor="#F0F0F0">
                                <td height="100" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all;line-height:26px;" valign="top">
                                    <div align="left">
                                        <b>原日/團：</b><?php echo $k_name; ?> - <?php echo Date_EN($action_time,1); ?> <?php echo $action_title; ?>
                                        <br><b>轉團：</b>
                                        <select name="cac" id="cac" style="width:340px;">
                                            <?php 
                                                $SQL = "select ac_auto, ac_title from actionf_data order by ac_auto_time desc";
                                                $rs = $FunConn->prepare($SQL);
                                                $rs->execute();
                                                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                                if($result){
                                                    foreach($result as $re){
                                                        if($re["ac_auto"] == $ac){
                                                            echo "<option value='".$re["ac_auto"]."' selected>".$re["ac_title"]."</option>";
                                                        }else{
                                                            echo "<option value='".$re["ac_auto"]."'>".$re["ac_title"]."</option>";
                                                        }
                                                    }                                                    
                                                }
                                            ?>
                                        </select>
                                        <br><b>轉日：</b>
                                        <select name="cat" id="cat" style="width:340px;">
                                            <?php 
                                                $SQL = "select dates from travel_date where ac_auto=".$ac." order by dates desc";
                                                $rs = $FunConn->prepare($SQL);
                                                $rs->execute();
                                                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                                if($result){
                                                    foreach($result as $re){
                                                        $dates = Date_EN($re["dates"],1);
                                                        if(Date_EN($action_time,1) == $dates){
                                                            echo "<option value='".$dates."' selected>".$dates."</option>";
                                                        }else{
                                                            echo "<option value='".$dates."'>".$dates."</option>";
                                                        }
                                                    }                                                    
                                                }else{
                                                    echo "<option value=''>目前此行程無日期資訊，請先設定該行程出發日期再操作</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr bgcolor="#FFF0E1">
                                <td colspan="2" bgcolor="#336699">
                                    <div align="center">
                                        <input name="Submit" type="submit" id="Submit2" style="font-size: 9pt" value="確定送出">
                                        <input name="id" type="hidden" id="id" value="<?php echo $id; ?>"><input name="ac" type="hidden" id="ac" value="<?php echo $ac; ?>">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
<script language="JavaScript">
    $(function() {
        $("#cac").on("change", function() {
            var $cat = $("#cat"),
                $this = $(this);
            if ($this.val()) {
                $cat.prop("disabled", true);

                $.ajax({
                    type: "POST",
                    url: "ad_fun_action_list_singup2_change.php",
                    data: {
                        st: "get_cat",
                        ac: $this.val()
                    },
                    error: function(xhr) {},
                    success: function(response) {
                        if (response == "error") {
                            alert("目前此行程無日期資訊，請先設定該行程出發日期再操作");
                        } else {
                            $("#cat option").remove();
                            $.each(response.split(","), function(key, value) {
                                $cat.append($("<option></option>").attr("value", value).text(value));
                            });
                            $cat.prop("disabled", false);
                        }
                    }
                });

            }
        });
    });
</script>