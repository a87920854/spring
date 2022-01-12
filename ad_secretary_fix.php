<?php
    /*****************************************/ 
    //檔案名稱：ad_secretary_fix.php
    //後台對應位置：管理系統/秘書資料>修改秘書資料
    //改版日期：2022.1.11
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
	if($_SESSION["MM_Username"] == "" ){ 
        call_alert("請重新登入。","login.php",0);
    }
    if($_SESSION["MM_UserAuthorization"] != "admin"){
        call_alert("您沒有查看此頁的權限。","login.php",0);
    }

    // 儲存
    if($_REQUEST["st"] == "addsave"){
        $p_auto = SqlFilter($_REQUEST["p_auto"],"int");
        $p_level = SqlFilter($_REQUEST["p_level"],"tab");
        if($p_level == "admin" || $p_level == "branch" || $_REQUEST["p_branch"] == "總管理處" || $_SESSION["MM_Username"] == "KYOE"){
            $p_user = trim(str_replace(" ", "",SqlFilter($_REQUEST["p_user"],"tab")));
        }else{
            $p_user = reset_number(SqlFilter($_REQUEST["p_user"],"tab"));
        }

        if(($p_level == "love" || $p_level == "love_manager") && $_REQUEST["p_lovebranch"] == ""){
            call_alert("排約部權限必須設定會員會館。",0,0);
        }

        if($p_user == ""){
            call_alert("身分證字號錯誤。",0,0);
        }

        if($p_auto != ""){
            $SQL = "SELECT * FROM personnel_data Where p_auto = ".$p_auto;
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetch(PDO::FETCH_ASSOC);
        }else{
            $SQL = "SELECT * FROM personnel_data where p_user='".$p_user."'";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                call_alert("帳號重複。",0,0);
            }
        }        
    }

    if($_REQUEST["p_auto"] != ""){
        $tt = "修改";
	    $tt2 = "?st=addsave";
        $p_auto = SqlFilter($_REQUEST["p_auto"],"int");
        $SQL = "SELECT * FROM personnel_data where p_auto=".$p_auto;
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $p_user = $result["p_user"];
            $p_user2 = $result["p_user2"];
            $p_name = $result["p_name"];
            $p_other_name = $result["p_other_name"];
            $p_branch = $result["p_branch"];
            $b_year = $result["b_year"];
            $p_job2 = $result["p_job2"];
            $p_level = $result["p_level"];
            $p_desc = $result["p_desc"];
            $p_desc2 = $result["p_desc2"];
            $p_note = $result["p_note"];
            $p_pic = $result["p_pic"];
            $p_funtourpm = $result["p_funtourpm"];
            $p_funtourtravel1 = $result["p_funtourtravel1"];
            $p_funtourtravel2 = $result["p_funtourtravel2"];
            $p_funtourprint = $result["p_funtourprint"];
            $p_funtourall1 = $result["p_funtourall1"];
            $p_funtourall2 = $result["p_funtourall2"];
            $p_dmnweb = $result["p_dmnweb"];
            $p_singleweb = $result["p_singleweb"];
            $action_level = $result["action_level"];
            $vertest = $result["vertest"];
            $video = $result["video"];
            $lines = $result["line"];
            $p_lovebranch = $result["p_lovebranch"];           
            $area_branch = $result["area_branch"];
        }else{
            $tt = "新增";
	        $tt2 = "?st=addsave";
        }
    }
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_secretary.php">秘書資料</a></li>
            <li class="active"><?php echo $tt; ?>秘書資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong><?php echo $tt; ?>秘書資料</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <form name="form1" method="post" action="ad_secretary_fix.php?st=addsave" class="form-inline" onsubmit="return chk_form()">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <thead>
                            <tr>
                                <td width="80">會館：<select name="p_branch" id="p_branch" style="width:100px;">
                                        <option value="">請選擇</option>
                                        <option value="台北">台北</option>
                                        <option value="桃園">桃園</option>
                                        <option value="新竹">新竹</option>
                                        <option value="台中">台中</option>
                                        <option value="台南">台南</option>
                                        <option value="高雄">高雄</option>
                                        <option value="八德">八德</option>
                                        <option value="約專">約專</option>
                                        <option value="迷你約">迷你約</option>
                                        <option value="總管理處" selected>總管理處</option>
                                        <option value="好好玩旅行社">好好玩旅行社</option>
                                    </select>
                                    　姓名：
                                    <input name="p_name" type="text" id="p_name" value="<?php echo $p_name; ?>" class="form-control">
                                    　別名：
                                    <input name="p_other_name" type="text" id="p_other_name" value="<?php echo $p_other_name; ?>" class="form-control">
                                    　前臺顯示權重：<select name="p_desc" id="p_desc">
                                        <option value="">請選擇</option>
                                        <option value="-2">前台不顯示</option>
                                        <option value="0" selected>0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                    </select>
                                    後臺顯示權重：<select name="p_desc2" id="p_desc2">
                                        <option value="0">請選擇</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6" selected>6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                    </select>
                                    (數字越大越前面)
                                </td>
                            </tr>
                            <tr>
                                <td>帳號：
                                    <input name="p_user" type="text" id="p_user" class="form-control" value="<?php echo $p_user; ?>">
                                    密碼：
                                    <input name="b_year" type="text" id="b_year" class="form-control" value="<?php echo $b_year; ?>">
                                    　職務：
                                    <input name="p_job2" type="text" id="p_job2" class="form-control" value="<?php echo $p_job2; ?>">
                                    　等級：
                                    <select name="p_level" id="p_level" onchange="plevel_change($(this))">
                                        <option value="">請選擇</option>
                                        <option value="admin" selected>總管理者</option>
                                        <option value="action">企劃</option>
                                        <option value="action_1">南區企劃經理</option>
                                        <option value="action_2">北區企劃經理</option>
                                        <option value="action_3">企劃總監</option>
                                        <option value="single">秘書</option>
                                        <option value="branch">督導</option>
                                        <option value="manager">經理</option>
                                        <option value="love_manager">服務部經理</option>
                                        <option value="love">排約部</option>
                                        <option value="pay">會計部</option>
                                        <option value="keyin">資料輸入</option>
                                        <option value="count">數據統計</option>
                                        <option value="teacher">講師</option>
                                        <!--
                                        <option value="paytop" >會計主任</option>
                                        <option value="actiontop" >活動主任</option>
                                        -->
                                    </select>

                                    <span id="plevel_span" style="display:none;"><a href="ad_secretary_group.php?manager=candy8060" class="btn btn-xs btn-warning">設定團隊成員</a></span>
                                </td>
                            </tr>
                            <tr>
                                <td>會計對應(無免填)：
                                    <input name="p_user2" type="text" id="p_user2" class="form-control" value="<?php echo $p_user2; ?>">
                                    &nbsp;&nbsp;影片：<input name="video" type="text" id="video" class="form-control" value="<?php echo $video; ?>" style="width:20%">
                                    &nbsp;&nbsp;LINE：<input name="line" type="text" id="line" class="form-control" value="<?php echo $lines; ?>" style="width:20%">
                                </td>
                            </tr>
                            <tr>
                                <td align="left">自我介紹：<textarea name="p_note" id="p_note" class="form-control" style="width:60%;height:140px;"><?php echo $p_note; ?></textarea></td>
                            </tr>


                            <tr class="lovebranch_span">
                                <td class="lovebranch_span">
                                    <p>排約部-會員會館選擇：(預設開啟 <?php echo $p_branch; ?>)</p>
                                    <table class="table table-striped table-bordered bootstrap-datatable">
                                        <tr class="lovebranch_span">
                                            <td class="lovebranch_span"><label><input type="checkbox" name="p_lovebranch" value="台北">&nbsp;&nbsp;台北</leabel>
                                            </td>
                                            <td class="lovebranch_span"><label><input type="checkbox" name="p_lovebranch" value="桃園">&nbsp;&nbsp;桃園</leabel>
                                            </td>
                                            <td class="lovebranch_span"><label><input type="checkbox" name="p_lovebranch" value="新竹">&nbsp;&nbsp;新竹</leabel>
                                            </td>
                                            <td class="lovebranch_span"><label><input type="checkbox" name="p_lovebranch" value="台中">&nbsp;&nbsp;台中</leabel>
                                            </td>
                                            <td class="lovebranch_span"><label><input type="checkbox" name="p_lovebranch" value="台南">&nbsp;&nbsp;台南</leabel>
                                            </td>
                                            <td class="lovebranch_span"><label><input type="checkbox" name="p_lovebranch" value="高雄">&nbsp;&nbsp;高雄</leabel>
                                            </td>
                                            <td class="lovebranch_span"><label><input type="checkbox" name="p_lovebranch" value="八德">&nbsp;&nbsp;八德</leabel>
                                            </td>
                                            <td class="lovebranch_span"><label><input type="checkbox" name="p_lovebranch" value="約專">&nbsp;&nbsp;約專</leabel>
                                            </td>
                                            <td class="lovebranch_span"><label><input type="checkbox" name="p_lovebranch" value="迷你約">&nbsp;&nbsp;迷你約</leabel>
                                            </td>
                                            <td class="lovebranch_span"><label><input type="checkbox" name="p_lovebranch" value="總管理處" checked>&nbsp;&nbsp;總管理處</leabel>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <p>權限表-勾選開啟：</p>
                                    <table class="table table-striped table-bordered bootstrap-datatable">
                                        <tr>
                                            <td><label><input type="checkbox" name="p_funtourpm" value="1"> 好好玩前台頁面設計</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="p_funtourtravel1" value="1"> 好好玩國內團控</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="p_funtourtravel2" value="1"> 好好玩國外團控</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="p_funtourall1" value="1"> 可見好好玩國內團控報名清單</leabel>
                                            </td>　
                                            <td><label><input type="checkbox" name="p_funtourall2" value="1"> 可見好好玩國外團控報名清單</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="p_funtourprint" value="1"> 列印要保明細</leabel>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label><input type="checkbox" name="p_dmnweb" value="1"> DMN網站</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="p_singleweb" value="1" checked> 約會專家</leabel>
                                            </td>
                                            <td><input type="checkbox" name="vertest" value="1"> 版本測試</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <Td>

                                    <p>權限表-勾選關閉：</p>

                                    <table class="table table-striped table-bordered bootstrap-datatable">
                                        <tr>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_admin_diff_list_team"> 小組業績表</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_single_list"> 秘書履歷</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_mem"> 會員管理系統</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_photo_check"> 網站照片審核</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_mem_login"> 會員登入狀態</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_mem_love"> 會員排約時間</leabel>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_no_mem"> 未入會資料</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_fav"> 關注名單</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_needlvup"> 會員升級意願</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="web_mem"> 網站認證專區</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_mem_gift"> 會員互動區</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_love"> 排約報名資料</leabel>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_action"> 活動報名資料</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_quest"> 問卷報名資料</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_guest"> 客服中心資料</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_job"> 徵人資料</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_cs_data"> 服務滿意度調查</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_invite"> 約見紀錄表</leabel>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_report_list"> 回報紀錄表</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_report_list_count"> 回報統計表</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_mem_action_re_list"> 活動明細表</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_mem_row"> 排約部系統</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_mem_love_re_invite"> 排約預訂表</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_mem_love_re_list"> 一般排約表</leabel>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_action_list"> 網站活動上傳</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_action_list2"> 網站活動團控</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_action_note"> 企劃工作日誌</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_fun_mem"> 好好玩會員資料</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_fun_action1"> 好好玩國內報名</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_fun_action2"> 好好玩國外報名</leabel>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="ad_mem_login_log_list"> 會員登入紀錄</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages" id="pages" value="teach_video"> 教學影片</leabel>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </Td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div align="center">

                                        <input type="submit" name="Submit" value="確定修改" class="btn btn-info" style="width:50%;">
                                        <input type="hidden" id="p_auto" name="p_auto" value="1086">

                                    </div>
                                </td>
                            </tr>
                            </tbody>
                    </table>
                </form>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php")
?>

<script type="text/javascript">
    $mtu = "ad_secretary.";
    $(function() {

        $('#p_branch').val('總管理處');
        $('.lovebranch_span').hide();
    });

    function chk_form() {
        if (!$("#p_branch").val()) {
            alert("請選擇會館。");
            $("#p_branch").focus();
            return false;
        }
        if (!$("#p_name").val()) {
            alert("請輸入姓名。");
            $("#p_name").focus();
            return false;
        }
        if (!$("#p_other_name").val()) {
            alert("請輸入別名。");
            $("#p_other_name").focus();
            return false;
        }
        if (!$("#p_desc").val()) {
            alert("請選擇前臺顯示權重。");
            $("#p_desc").focus();
            return false;
        }
        if (!$("#p_user").val()) {
            alert("請輸入帳號。");
            $("#p_user").focus();
            return false;
        }
        if (!$("#b_year").val()) {
            alert("請輸入密碼。");
            $("#b_year").focus();
            return false;
        }
        if (!$("#p_job2").val()) {
            alert("請輸入職務。");
            $("#p_job2").focus();
            return false;
        }
        if (!$("#p_level").val()) {
            alert("請選擇等級。");
            $("#p_level").focus();
            return false;
        }



        return true;
    }

    function plevel_change($this) {
        /*	if($this.val() == "manager") {
        		$("#plevel_span").show();
        	} else {
        		$("#plevel_span").hide();
        	}*/
        if ($this.val() == "love" || $this.val() == "love_manager") {
            $(".lovebranch_span").show();
        } else {
            $(".lovebranch_span").hide();
        }

    }
</script>