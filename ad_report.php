<?php
	/*****************************************/
	//檔案名稱：ad_report.php
	//後台對應位置：名單/發送記錄>DATEMENOW-億捷創意(回報頁面)
	//改版日期：2021.11.08
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");

    //pageload_timer = timer
    //response.charset="utf-8"
    
    if ( SqlFilter($_REQUEST["ty"],"tab") == "member" ){
        $ty = "member";
    }else{
        $ty = "lovekeyin";
    }
    
    if ( SqlFilter($_REQUEST["k_id"],"tab") == "" && SqlFilter($_REQUEST["mem_num"],"tab") == "" ){
        call_alert("讀取編號有誤。", "ClOsE", 0);
    }
    
    //Set rs = Server.CreateObject("ADODB.Recordset")
    if ( SqlFilter($_REQUEST["st"],"tab") == "del" ){
        $SQL_d = "Delete From log_data Where log_auto = ".SqlFilter($_REQUEST["la"],"int");
        reURL("ad_report.asp?k_id=".SqlFilter($_REQUEST["k_id"],"int")."&lu=".SqlFilter($_REQUEST["lu"],"int")."&ty=".$ty);
    }
    if ( SqlFilter($_REQUEST["st"],"tab") == "send" ){
        if ( SqlFilter($_REQUEST["ty"],"tab") == "member" ){    
            if ( SqlFilter($_REQUEST["log_aid"],"tab") != "" ){
                $SQL = "Select all_type, mem_single, mem_mobile From member_data Where mem_num='" . SqlFilter($_REQUEST["log_aid"],"tab");
                $subSQL  = "mem_num='" . SqlFilter($_REQUEST["log_aid"],"tab");
            }elseif ( SqlFilter($_REQUEST["log_fid"],"tab") != "" ){
                $SQL = "Select all_type, mem_single, mem_mobile From member_data Where mem_username='" . SqlFilter($_REQUEST["log_fid"],"tab");
                $subSQL = "mem_username='" . SqlFilter($_REQUEST["log_fid"],"tab");
            }
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result=$rs->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $re);
            if ( count($result)> 0 ){
                $mem_mobile = $re["mem_mobile"];
                $mem_single = $re["mem_single"];
                $SQL_u = "Update member_data Set all_type='".SqlFilter($_REQUEST["log_2"],"tab")." Where ".$subSQL;
                $rs_u = $SPConn->prepare($SQL_u);
                $rs_u->execute();
            }
            if ( strtoupper($mem_single) == strtoupper($_SESSION["MM_Username"]) ){
                $SQL_u = "Update member_data Set all_type='".SqlFilter($_REQUEST["log_2"],"tab")."' Where mem_mobile ='" .$mem_mobile."' And mem_single='" .$mem_single."'";
                $rs_u = $SPConn->prepare($SQL_u);
                $rs_u->execute();
            }
        }else{
            $SQL_u = "Update love_keyin Set all_type='".SqlFilter($_REQUEST["log_2"],"tab")."' Where k_id = " . SqlFilter($_REQUEST["k_id"],"int");
            $rs_u = $SPConn->prepare($SQL_u);
            $rs_u->execute();
        }
         
        $log_2 = SqlFilter($_REQUEST["log_2"],"tab");
        if ( $log_2 == "請假三個月" || $log_2 == "請假半年" || $log_2 == "請假一年" ){
            $log_service = 1;
        }elseif ( $log_2 == "已排約" || $log_2 == "約後關懷" || $log_2 == "排約未滿5次" || $log_2 == "排約無效" ){
            $log_service = 1;
        }elseif ( $log_2 == "名單資訊" || $log_2 == "客訴反映" || $log_2 == "聯繫狀況" || $log_2 == "排約注意" ){
            $log_service = 1;
        }elseif ( $log_2 == "已是全卡會員" ){
            $log_service = 1;
        }else{
            $log_service = 0;
        }
         
        //新增log
        if ( $log_service == 1 ){ $in_log_service = 1;}
        if ( chkDate($_REQUEST[""]) ){
            $in_log_6 = SqlFilter($_REQUEST["log_6"],"tab");
            $log_6_time = SqlFilter($_REQUEST["log_6"],"tab") . " ". SqlFilter($_REQUEST["log_6_time1"],"tab").":".SqlFilter($_REQUEST["log_6_time2"],"tab");
            $in_log_6_time = new DateTime($log_6_time);
            $in_log_4 = $_SESSION["p_other_name"]."於".date("Y-m-d H:s:i")."預約 ".SqlFilter($_REQUEST["log_6"],"tab") . " ".SqlFilter($_REQUEST["log_6_time1"],"tab").":".SqlFilter($_REQUEST["log_6_time2"],"tab")." 聯絡，內容：".SqlFilter($_REQUEST["log_4"],"tab");
        }else{
            $in_log_4 = SqlFilter($_REQUEST["log_4"],"tab");
        }

        $SQL_i  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, log_3, log_5, log_service, log_6, log_6_time) Values ( ";
        $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
        $SQL_i .= "'".SqlFilter($_REQUEST["k_id"],"tab")."',";
        $SQL_i .= "'".SqlFilter($_REQUEST["log_fid"],"tab")."',";
        $SQL_i .= "'".SqlFilter($_REQUEST["log_username"],"tab")."',";
        $SQL_i .= "'".SqlFilter($_REQUEST["log_name"],"tab")."',";
        $SQL_i .= "'".SqlFilter($_REQUEST["log_branch"],"tab")."',";
        $SQL_i .= "'".$_SESSION["MM_Username"]."',";
        $SQL_i .= "'".SqlFilter($_REQUEST["k_mobile"],"tab")."',";
        $SQL_i .= "'".$log_2."',";
        $SQL_i .= "'".SqlFilter($_REQUEST["log_3"],"tab")."',";
        $SQL_i .= "'".SqlFilter($_REQUEST["ty"],"tab")."',";
        $SQL_i .= "'".$in_log_service."',";
        $SQL_i .= "'".$in_log_6."',";
        $SQL_i .= "'".$in_log_6_time."',";
        $SQL_i .= "'".$in_log_4."')";
        $rs_i = $SPConn->prepare($SQL_i);
        $rs_i->execute();
        updatemyreservation();
        reURL("win_close.asp");
    }
?>
<html lang="en-US">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>SD CRM MEMBER REPORT - Timeline</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css?v=1.5" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap.datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, maximum-scale=5, minimum-scale=1.0, initial-scale=1, user-scalable=0" />
    <style>
        @font-face {
            font-family: 'FontAwesome';
            src: url('assets/fonts/fontawesome-webfont.eot?v=4.4.0');
            src: url('assets/fonts/fontawesome-webfont.eot?#iefix&v=4.4.0') format('embedded-opentype'),
                url('assets/fonts/fontawesome-webfont.woff2?v=4.4.0') format('woff2'),
                url('assets/fonts/fontawesome-webfont.woff?v=4.4.0') format('woff'),
                url('assets/fonts/fontawesome-webfont.ttf?v=4.4.0') format('truetype'),
                url('assets/fonts/fontawesome-webfont.svg?v=4.4.0#fontawesomeregular') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        ul.timeline {
            list-style-type: none;
            position: relative;

        }

        ul.timeline:before {
            content: ' ';
            background: #d4d9df;
            display: inline-block;
            position: absolute;
            left: 29px;
            width: 2px;
            height: 100%;
            z-index: 400;
        }

        ul.timeline>li {
            margin-left: 10px;
            padding-left: 15px;
            border-top: 1px solid #ccc;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        ul.timeline>li:before {
            content: ' ';
            background: white;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 3px solid #22c0e8;
            left: 20px;
            width: 20px;
            height: 20px;
            z-index: 400;
        }

        ul.timeline li:nth-child(even) {
            background: #fff
        }

        ul.timeline li:nth-child(odd) {
            background: #fff2e6
        }

        ul.timeline li:last-child {
            border-bottom: 1px solid #ccc;
        }

        ul.timeline li p {
            color: #333333;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        ul.timeline li .names {
            color: #595959;
        }

        table td {
            padding: 5px;
        }

        h4 {
            padding-left: 50px;
            font-size: 16px;
            font-weight: bold;
            color: #336699;
        }

        .row {
            margin-left: -15px;
            margin-right: 5px;
        }


        #toTop {
            font-size: 38px;
            line-height: 33px;
            background-color: rgba(63, 159, 217, 0.6);
            color: #FFF;
            position: fixed;
            height: 35px;
            width: 40px;
            right: 6px;
            bottom: 6px;
            text-align: center;
            text-transform: uppercase;
            opacity: 0.9;
            filter: alpha(opacity=90);
            text-decoration: none;
            display: none;
            z-index: 1000;

            -webkit-border-radius: 4px !important;
            -moz-border-radius: 4px !important;
            border-radius: 4px !important;

            -webkit-transition: all 0.2s;
            -moz-transition: all 0.2s;
            -o-transition: all 0.2s;
            transition: all 0.2s;
        }

        #toTop:hover {
            background-color: rgba(63, 159, 217, 0.9);
        }

        #toTop:before {
            font-family: "fontawesome";
            content: "\f102";
        }

        #toClose {
            font-size: 38px;
            line-height: 33px;
            background-color: rgba(249, 6, 6, 0.6);
            color: #FFF;
            position: fixed;
            height: 35px;
            width: 40px;
            right: 6px;
            bottom: 56px;
            text-align: center;
            text-transform: uppercase;
            opacity: 0.9;
            filter: alpha(opacity=90);
            text-decoration: none;
            display: none;
            z-index: 1000;

            -webkit-border-radius: 4px !important;
            -moz-border-radius: 4px !important;
            border-radius: 4px !important;

            -webkit-transition: all 0.2s;
            -moz-transition: all 0.2s;
            -o-transition: all 0.2s;
            transition: all 0.2s;
        }

        #toClose:hover {
            background-color: rgba(249, 6, 6, 0.9);
        }

        #toClose:before {
            font-family: "fontawesome";
            content: "\f00d";
        }
    </style>
</head>
<body>
<?php
    $mem_use = 0;
    if ( $ty == "member" ){
        if ( SqlFilter($_REQUEST["mem_num"],"tab") != "" ){
	        $subSQL = " mem_num='".SqlFilter($_REQUEST["mem_num"],"tab")."'";
        }else{
	        $subSQL = " mem_auto='".SqlFilter($_REQUEST["k_id"],"tab")."'";
        }
        $SQL = "Select mem_num As r0, mem_username As r00, mem_name As r1, mem_mobile As r2, all_type As r3, mem_level As r4 From member_data Where".$subSQL;
    }else{
        $SQL = "Select k_name As r1, k_mobile As r2, all_type As r3 From love_keyin Where k_id='".SqlFilter($_REQUEST["k_id"],"tab")."'";
    }
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result=$rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);
    
    if ( count($result) == 0 ){
        $u_name = "不明";
        echo "<tr><td>資料讀取錯誤</td></tr>";
        exit;
    }else{
        if ( $re["r1"]  != "" ){
            $u_name = $re["r1"];
        }
        if ( $u_name == "" ){
            $u_name = "不明";
        }
        $k_mobile = $re["r2"];
    }

    $all_type = $re["r3"];
    if ( $ty == "member" ){
        $mem_num = $re["r0"];
        $mem_username = $re["r00"];
        $mem_level = $re["r4"];
        if ( $mem_level == "mem" ){
	        $mem_use = 1;
        }
    }
?>
    <div class="content">
        <div class="row">
            <div>
                <h4><?php echo $k_mobile;?> - 回報系統 <a href="#m" onclick="fastmove()" class="btn btn-default btn-xs pull-right">快速回報內容</a><a href="#c" onclick="window.close()" class="btn btn-danger btn-xs pull-right" style="margin-right:5px;">關閉本頁</a></h4>
            </div>
            <ul class="timeline">
                <?php
                    if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
	                    // echo "Select Top 300 * From log_data Where log_1 = '".$k_mobile."' And log_1 <> '0912345678' Order By log_auto Desc";
                        //exit;
                        $SQL = "Select Top 300 * From log_data Where log_1 ='".$k_mobile."' And log_1 <> '0912345678' Order By log_auto Desc";
                    }elseif (  $_SESSION["MM_UserAuthorization"] == "branch" ){
                        $SQL = "Select Top 300 * From log_data Where log_1 ='".$k_mobile."' And log_1 <> '0912345678' And log_branch='".$_SESSION["branch"]."' Order By log_auto Desc";
                    }elseif ( $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
	                    $rbranch = $_SESSION["lovebranch"];
	                    $rbranch1 = str_replace(",", "','", $rbranch);
                        $SQL = "Select Top 300 * From log_data Where log_1 ='".$k_mobile."' And log_1 <> '0912345678' And ((log_single = '".$_SESSION["MM_Username"]."') Or (log_branch In ('".$rbranch1."') And log_service=1)) Order By log_auto Desc";
                    }else{
                        $SQL = "Select Top 300 * From log_data Where log_1 ='".$k_mobile."' And log_1 <> '0912345678' And ((log_single = '".$_SESSION["MM_Username"]."') Or (log_branch = '".$_SESSION["branch"]."' And log_service = 1)) Order By log_auto Desc";
                    }
                    $rs = $SPConn->prepare($SQL);
                    $rs->execute();
                    $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                    if ( count($result) == 0 ){
                        echo "<li>目前無任何回報紀錄</li>";
                    }else{
                        foreach($result as $re){
	                        $mynum = "".$re["log_5"]."[".$re["log_auto"]."]";
                            echo "<li><div class='cont'>";
                            if ( $_SESSION["MM_Username"] == "KYOE" || $_SESSION["MM_Username"] == "tsaiwen216" ){
	                            echo $re["log_auto"]."<br>";
                            }
                            if ( $re["log_service"] == 1 ){
                                echo "<span class='label' style='background-color:#ff6600'>公</span>&nbsp;&nbsp;";
                            }else{
                                echo "<span class='label' style='background-color:#666699'>私</span>&nbsp;&nbsp;";
                            }
                            echo "<b><span class='label label-primary'>".chtime($re["log_time"])."</span>&nbsp;&nbsp;<span class='names'>".$re["log_branch"]."-".$re["log_name"]," 回報 <span class='hide'>".$mynum."</span></span>&nbsp;&nbsp;".$u_name."&nbsp;&nbsp;<span class='label label-success'>".$re["log_2"];
                            if ( $re["log_3"] != "" ){
	                            echo " - ".$re["log_3"];
                            }
                            echo "</span></b>";

                            if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
                                echo "&nbsp;&nbsp;<a href='?st=del&la=".$re["log_auto"]."&k_id=".SqlFilter($_REQUEST["k_id"],"tab")."&lu=".$mem_username."&ty=".$ty."&s=".$re["log_single"]."' class='btn btn-xs btn-default'>刪</a>";
                            }
                            echo "<p>".$re["log_4"]."";
                            if ( $re["log_6"] != "" ){
	                            //echo $re["log_6"];
                            }
                            echo "</p></div></li>";
                        }
                    }?>
            </ul>
        </div>
    </div>
    <center>
        <form id="report_cont" method="post" action="?st=send&ty=<?php echo $ty;?>" onsubmit="return check_sform()">
            <table width="90%" border="1" cellpadding="1">
                <tr>
                    <td colspan=4 style="color:#fff;background:#336699">新增回報紀錄</td>
                </tr>
                <tr>
                    <td style="width:80px;">處理情形</td>
                    <td style="text-align:left">
                        <select name="log_2" id="log_2" class="form-control">
                            <option value="" selected>請選擇</option>
                            <!--mem_use = 1 -->
                            <?php
                            $SQL1 = "Select option_txt,option_title From report_option Where option_sort = 0 And mem_use = 1 Order By option_sort";
                            $rs1 = $SPConn->prepare($SQL1);
                            $rs1->execute();
                            $result1=$rs1->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result1 as $re1){
                                echo "<option value='' disabled>--- ".$re1["option_txt"]." ---</option>";
                                $SQL2 = "Select option_txt From report_option Where option_title = ".$re1["option_title"]." Order By option_sort";
                                $rs2 = $SPConn->prepare($SQL2);
                                $rs2->execute();
                                $result2=$rs2->fetchAll(PDO::FETCH_ASSOC);
                                foreach($result2 as $re2){
                                    echo "<option value='".$re2["option_txt"]."'>".$re2["option_txt"]."</option>";
                                }
                            }
                            ?>
                            <!--mem_use = 2 -->
                            <?php
                            $SQL1 = "Select option_txt,option_title From report_option Where option_sort = 0 And mem_use = 0 Order By option_sort";
                            $rs1 = $SPConn->prepare($SQL1);
                            $rs1->execute();
                            $result1=$rs1->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result1 as $re1){
                                echo "<option value='' disabled>--- ".$re1["option_txt"]." ---</option>";
                                $SQL2 = "Select option_txt From report_option Where option_title = ".$re1["option_title"]." Order By option_sort";
                                $rs2 = $SPConn->prepare($SQL2);
                                $rs2->execute();
                                $result2=$rs2->fetchAll(PDO::FETCH_ASSOC);
                                foreach($result2 as $re2){
                                    echo "<option value='".$re2["option_txt"]."'>".$re2["option_txt"]."</option>";
                                }
                            }
                            ?>
                        </select>
                        <div class="input-group" style="margin-top:10px;">
                            <input type="text" style="width:160px;display:none;" name="log_6" id="log_6" class="datepicker form-control" placeholder="點此選擇下次通話日期" autocomplete="off">
                            <select name="log_6_time1" id="log_6_time1" class="form-control" style="width:auto;display:none;"><!--←目前隱藏狀態-->
                                <?php for ( $i=10;$i<=22;$i++ ){ ?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?> 時</option>
                                <?php }?>
                            </select>
                            <select name="log_6_time2" id="log_6_time2" class="form-control" style="width:auto;display:none;"><!--←目前隱藏狀態-->
                                <option value="00">00 分</option>
                                <option value="30">30 分</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:80px;">內容</td>
                    <td style="text-align:left"><input type="text" name="log_4" id="log_4" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td style="width:80px;">回報時間</td>
                    <td style="text-align:left"><small><?php echo date("Y-m-d H:s:i");?> 由 <?php echo SingleName($_SESSION["MM_Username"]);?><span class="hide">(<?php echo $_SESSION["MM_Username"];?>)</span> 回報</small></td>
                </tr>
                <input type="hidden" name="k_id" value="<?php echo $_REQUEST["k_id"];?>">
                <input type="hidden" name="k_mobile" value="<?php echo $k_mobile;?>">
                <input type="hidden" name="log_name" value="<?php echo SingleName($_SESSION["MM_Username"]);?>">
                <input type="hidden" name="log_username" value="<?php echo $u_name;?>">
                <input type="hidden" name="log_aid" value="<?php echo $mem_num;?>">
                <input type="hidden" name="log_fid" value="<?php echo $mem_username;?>">
                <input type="hidden" name="log_branch" value="<?php echo $_SESSION["branch"];?>">
                <input type="hidden" name="ty" value="<?php echo $ty;?>">
                <tr>
                    <td colspan=4" align="center"><input id="bsub" type="submit" class="btn btn-primary" style="width:60%" value="新增回報"></td>
                </tr>
            </table>
        </form>
        <a href="#c" onclick="window.close()" class="btn btn-danger" style="width:100%;margin-top:15px;margin-bottom:5px;">關閉本頁</a>
        <p style="text-align:center;font-size:11px;color:#666">頁面載入時間 0.0625 毫秒</p>

    </center>
    <a href="#" id="toTop"></a>
    <a href="#" id="toClose" onclick="window.close()"></a>
    <script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap.datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap.datepicker/locales/bootstrap-datepicker.tw.min.js"></script>


    <script language="JavaScript">
        function check_sform() {
            if (!$("#log_2").val() || $("#log_2").val() == "請選擇") {
                alert("請選擇處理情形。");
                return false;
            }
            $("#bsub").attr("disabled", true);
            return true;
        }
        $(function() {

            $("#log_2").val("已排約");

            $("#log_2").on("change", function() {
                var $val = $(this).val();
                $("#log_6").hide();
                $("#log_6_time1").hide();
                $("#log_6_time2").hide();
                if ($val == "已邀約")
                    if (confirm("確定前往預約約見時間。")) {
                        location.href = "ad_invite_add.asp?st=read&keyword=2082523";
                    }
                if ($val == "升卡約見")
                    if (confirm("確定前往預約約見時間。")) {
                        location.href = "ad_invite_add.asp?st=read&keyword=2082523&mem=1";
                    }
                if ($val == "續約約見")
                    if (confirm("確定前往預約約見時間。")) {
                        location.href = "ad_invite_add.asp?st=read&keyword=2082523&mem=2";
                    }
                if ($val == "黑名單")
                    if (confirm("確定將此人的電話號碼加入黑名單嗎？")) {
                        window.open('call_view.asp?st=add&r=1&phone_num=0975772688', 'pph', 'scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=450,height=200,top=10,left=10')
                    }
                if ($val == "預約聯絡") {
                    $("#log_6").show();
                    $("#log_6_time1").show();
                    $("#log_6_time2").show();
                    $("#log_6").datepicker({
                        format: 'yyyy/mm/dd',
                        language: 'tw',
                        todayBtn: 'linked',
                        autoclose: true,
                        startDate: 'today'
                    });
                }
            });
            $("#toTop").bind("click", function(e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 800);
            });
        });

        function fastmove() {
            $("#log_4").focus();
        }
        $(window).scroll(function() {
            _toTop();
        });

        /* Scroll To Top */
        function _toTop() {
            _scrollTop = jQuery(document).scrollTop();

            if (_scrollTop > 100) {

                if (jQuery("#toTop").is(":hidden")) {
                    jQuery("#toTop").show();
                }

                if (jQuery("#toClose").is(":hidden")) {
                    jQuery("#toClose").show();
                }

            } else {

                if (jQuery("#toTop").is(":visible")) {
                    jQuery("#toTop").hide();
                }
                if (jQuery("#toClose").is(":visible")) {
                    jQuery("#toClose").hide();
                }

            }

        }
    </script>
</body>

</html>