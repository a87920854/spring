<?php
    /*****************************************/ 
    //檔案名稱：ad_counts_ads2.php
    //後台對應位置：管理系統/已入會統計[廣告]
    //改版日期：2022.1.7
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    // ajax
    if($_REQUEST["st"] == "send"){
        if(strtotime($_REQUEST["end_time"]) - strtotime($_REQUEST["start_time"]) < 0){
            echo "在 ".$_REQUEST["start_time"]." ～ ".$_REQUEST["end_time"]." 間沒有資料或日期選擇不正確。";
            exit();
        }
        $start_time = Date_EN(SqlFilter($_REQUEST["start_time"],"tab"),1) . " 00:00";
        $end_time = Date_EN(SqlFilter($_REQUEST["end_time"],"tab"),1) . " 23:59";
        $fullmaxday = ceil((strtotime($end_time) - strtotime(SqlFilter($_REQUEST["ostart_time"],"tab")))/ (60*60*24));
        $maxday = ceil((strtotime($end_time) - strtotime($start_time))/ (60*60*24));

        if($maxday < 0){
            echo "在 ".$start_time." ～ ".$end_time." 間沒有資料或日期選擇不正確。";
            echo $maxday;
            exit();
        }
        if($maxday == 0){
            $smaxday = 1;
        }else{
            $smaxday = $fullmaxday;
        }

        if($_REQUEST["start_time"] == $_REQUEST["ostart_time"]){
            echo "<div>在 ".$start_time." ～ ".$end_time." 間統計、共 ".$smaxday." 天：</div>";
            echo "<table id='outtable' width='100%' height=80 align='center' class='table table-striped table-bordered bootstrap-datatable'>";
            echo "<tr><td>註冊時間</td>";
            echo "<td colspan=4>Facebook</td>";
            echo "<td colspan=4>Google</td>";
            echo "<td colspan=4>Yahoo</td>";
            echo "<td colspan=4>Line</td>";
            echo "<td colspan=4>Youtube</td>";
            echo "<td colspan=4>accupass</td>";
            echo "<td colspan=4>affiliates</td>";
            echo "<td colspan=4>cheers</td>";
            echo "<td colspan=4>wordpress</td>";
            echo "<td colspan=4>EDM</td>";
            echo "<td colspan=4>Google_GDN</td>";
            echo "<td colspan=4>Google_GSP</td>";
            echo "<td colspan=4>thenewslens</td>";
            echo "<td>廣告註冊總數</td>";
            // echo "<td>首次造訪</td>";
            // echo "<td colspan=3>新會員比例</td>";
            echo "</tr>";
            
            echo "<tr><td></td>";
            echo "<td>新</td><td>總</td><td>男</td><td>女</td>";
            echo "<td>新</td><td>總</td><td>男</td><td>女</td>";
            echo "<td>新</td><td>總</td><td>男</td><td>女</td>";
            echo "<td>新</td><td>總</td><td>男</td><td>女</td>";
            echo "<td>新</td><td>總</td><td>男</td><td>女</td>";
            echo "<td>新</td><td>總</td><td>男</td><td>女</td>"; 
            echo "<td>新</td><td>總</td><td>男</td><td>女</td>";
            echo "<td>新</td><td>總</td><td>男</td><td>女</td>";
            echo "<td>新</td><td>總</td><td>男</td><td>女</td>";
            echo "<td>新</td><td>總</td><td>男</td><td>女</td>";
            echo "<td>新</td><td>總</td><td>男</td><td>女</td>"; 
            echo "<td>新</td><td>總</td><td>男</td><td>女</td>";
            echo "<td>新</td><td>總</td><td>男</td><td>女</td>";    
            echo "<td></td>";
            // echo "<td></td>";
            // echo "<td>比例</td><td>男</td><td>女</td>";
            echo "</tr>";                      
        }
        $showdate = Date_EN($start_time,1);
        $all_str = "facebook|1,google|2,yahoo|3,line|4,youtube|5,accupass|6,affiliates|7,cheers|8,wordpress|9,EDM|10,Google_GDN|11,Google_GSP|12,thenewslens|13";
        $allnew = 0;
        $allsize = 0;
        $allstrsize = 0;

        foreach(explode(",",$all_str) as $pp){
            $pp1 = explode("|",$pp)[0];
            $pp2 = explode("|",$pp)[1];
            $pp1 = strtolower($pp1);
            ${"t".$pp2."a"} = 0;
            ${"t".$pp2} = 0;
            ${"t".$pp2."bb"} = 0;
            ${"t".$pp2."gg"} = 0;
            
            $vsql = " and lower(mem_cc) like '".$pp1."%'";

            $SQL = "SELECT count(mem_auto) as tt FROM member_data as dba Where mem_level='mem' and mem_branch <> '八德' and datediff(d, mem_time, '".$showdate."') = 0".$vsql;
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                ${"t".$pp2."a"} = $result["tt"];
            }

            $SQL = "SELECT count(mem_auto) as tt FROM member_data as dba Where mem_level='mem' and  mem_branch <> '八德' and datediff(d, mem_time, '".$showdate."') = 0".$vsql." And ((SELECT count(mem_auto) FROM member_data Where mem_branch <> '八德' and mem_mobile = dba.mem_mobile and datediff(s, dba.mem_time, mem_time) <= 0) <= 1) And ((SELECT count(k_id) FROM love_keyin Where all_branch <> '八德' and k_mobile = dba.mem_mobile) <= 0)";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                ${"t".$pp2} = $result["tt"];
            }

            $SQL = "SELECT count(mem_auto) as tt FROM member_data as dba Where mem_level='mem' and mem_sex='男' and mem_branch <> '八德' and datediff(d, mem_time, '".$showdate."') = 0".$vsql." And ((SELECT count(mem_auto) FROM member_data Where mem_branch <> '八德' and mem_mobile = dba.mem_mobile and datediff(s, dba.mem_time, mem_time) <= 0) <= 1) And ((SELECT count(k_id) FROM love_keyin Where all_branch <> '八德' and k_mobile = dba.mem_mobile) <= 0)";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                ${"t".$pp2."bb"} = $result["tt"];
            }

            $SQL = "SELECT count(mem_auto) as tt FROM member_data as dba Where mem_level='mem' and mem_sex='女' and mem_branch <> '八德' and datediff(d, mem_time, '".$showdate."') = 0".$vsql." And ((SELECT count(mem_auto) FROM member_data Where mem_branch <> '八德' and mem_mobile = dba.mem_mobile and datediff(s, dba.mem_time, mem_time) <= 0) <= 1) And ((SELECT count(k_id) FROM love_keyin Where all_branch <> '八德' and k_mobile = dba.mem_mobile) <= 0)";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                ${"t".$pp2."gg"} = $result["tt"];
            }

            if(${"t".$pp2."a"} == ""){
                ${"t".$pp2."a"} = 0;
            }
            if(${"t".$pp2} == ""){
                ${"t".$pp2} = 0;
            }
            if(${"t".$pp2."bb"} == ""){
                ${"t".$pp2."bb"} = 0;
            }
            if(${"t".$pp2."gg"} == ""){
                ${"t".$pp2."gg"} = 0;
            }

            $all_str2 = $all_str2 ."'".$pp1."',";
            $allnew = $allnew + ${"t".$pp2};
            $allsize = $allsize + ${"t".$pp2."a"};
            $allstrsize = $allstrsize + 1;
        }
    
        echo "<tr><td>".$showdate."(".weekchinesename(date("w",strtotime($showdate))).")</td>";
        for($i=1;$i<=$allstrsize;$i++){
            if(${"t".$i} <= 0){
                ${"t".$i} = 0;
            }
            if(${"t".$i."a"} <= 0){
                ${"t".$i."a"} = 0;
            }
            echo "<td>".${"t".$i}."</td><td>".${"t".$i."a"}."</td><td>".${"t".$i."bb"}."</td><td>".${"t".$i."gg"}."</td>"; //facebook
        }
        echo "<td>".$allsize."</td>"; // 網路註冊總數
        echo "</tr>"; // 未完成註冊數

        if(Date_EN($showdate,1) == Date_EN($end_time,1)){
            echo "<script type=\"text/javascript\">button_set(1);outmsg_show(\"已讀取 ".$fullmaxday." 筆資料完畢。\");</script>";
        }else{
            $nowdays = $forday + $_REQUEST["nowdays"] + 1;
            echo "<script type=\"text/javascript\">outmsg_show(\"目前讀取 ".$nowdays." / ".$fullmaxday." 筆資料..請稍候..<img src='img/wait_loading.gif' align='middle'>\");conutice_ajax('".date("Y/m/d",strtotime($start_time." +".($forday+1)." day"))."','".SqlFilter($_REQUEST["ostart_time"],"tab")."','".SqlFilter($_REQUEST["end_time"],"tab")."','".$nowdays."')</script>";
        }        
        exit();
    }

    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
	if($_SESSION["MM_Username"] == "" ){ 
        call_alert("請重新登入。","login.php",0);
    }


?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">已入會統計[廣告]</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>已入會統計[廣告]</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form action="#send" method="post" name="counts_form" id="counts_form" onsubmit="return check_form()">
                    <p>請選擇時段：<input type="text" name="start_time" id="start_time" class="datepicker" autocomplete="off">　～　<input type="text" name="end_time" id="end_time" class="datepicker" autocomplete="off">&nbsp;&nbsp;<select id="fasttime" onchange="fast_sel_time($(this).val())">
                            <option value="">快速選擇</option>
                            <option value="0">今天</option>
                            <option value="1">昨天</option>
                            <option value="2">前天</option>
                            <option value="3">本周</option>
                            <option value="4">上周</option>
                            <option value="5">本月</option>
                            <option value="6">上月</option>
                            <option value="7">今年</option>
                            <option value="8">去年</option>
                        </select>&nbsp;&nbsp;<input class="btn btn-default" id="send_submit" type="submit" value="送出">
                    </p>
                </form>
                <div id="outdiv" class="table-responsive"></div>
                <div id="outmsg" height=20 style="font-size:12px;">讀取資料中...<img src='img/wait_loading.gif' align='middle'></div>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->


    <hr>
    <footer>
    </footer>
    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
    require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    $("#outmsg").hide();
    Date.prototype.DateAdd = function(strInterval, Number) {
        var dtTmp = this;
        switch (strInterval) {
            case 's':
                return new Date(Date.parse(dtTmp) + (1000 * Number));
            case 'n':
                return new Date(Date.parse(dtTmp) + (60000 * Number));
            case 'h':
                return new Date(Date.parse(dtTmp) + (3600000 * Number));
            case 'd':
                return new Date(Date.parse(dtTmp) + (86400000 * Number));
            case 'w':
                return new Date(Date.parse(dtTmp) + ((86400000 * 7) * Number));
            case 'q':
                return new Date(dtTmp.getFullYear(), (dtTmp.getMonth()) + Number * 3, dtTmp.getDate(), dtTmp.getHours(), dtTmp.getMinutes(), dtTmp.getSeconds());
            case 'm':
                return new Date(dtTmp.getFullYear(), (dtTmp.getMonth()) + Number, dtTmp.getDate(), dtTmp.getHours(), dtTmp.getMinutes(), dtTmp.getSeconds());
            case 'y':
                return new Date((dtTmp.getFullYear() + Number), dtTmp.getMonth(), dtTmp.getDate(), dtTmp.getHours(), dtTmp.getMinutes(), dtTmp.getSeconds());
        }
    }

    function conutice_ajax(n1, n2, n3, n4) {
        setTimeout(function() {
            $.ajax({
                url: 'ad_count_ads2.php?st=send',
                data: {
                    start_time: n1,
                    ostart_time: n2,
                    end_time: n3,
                    nowdays: n4
                },
                error: function(xhr) {
                    alert('Ajax request 發生錯誤');
                    button_set(1);
                },
                success: function(response) {
                    if ($("#outtable")) $("#outtable").append(response);
                    else $("#outdiv").html(response);
                }
            })
        }, 3000);
    }

    function check_form() {
        if (!$("#start_time").val()) {
            alert("請輸入開始時段。");
            $("#start_time").focus();
            return false;
        }
        if (!$("#end_time").val()) {
            alert("請輸入結束時段。");
            $("#end_time").focus();
            return false;
        }
        if (isNaN(Date.parse($("#start_time").val()))) {
            alert("你輸入的開始時段不是日期格式。");
            $("#start_time").val("");
            $("#start_time").focus();
            return false;
        }
        if (isNaN(Date.parse($("#end_time").val()))) {
            alert("你輸入的結束時段不是日期格式。");
            $("#end_time").val("");
            $("#end_time").focus();
            return false;
        }
        button_set(0);
        if ($("#outtable")) $("#outtable").html("");
        $("#outmsg").html("讀取資料中...<img src='img/wait_loading.gif' align='middle'>");
        $("#outmsg").show();
        $.ajax({
            url: 'ad_count_ads2.php?st=send',
            data: {
                start_time: $("#start_time").val(),
                ostart_time: $("#start_time").val(),
                end_time: $("#end_time").val()
            },
            error: function(xhr) {
                alert('Ajax request 發生錯誤');
                button_set(1);
            },
            success: function(response) {
                $("#outdiv").html(response);
            }
        });

        return false;
    }

    function outmsg_show(msg) {
        $("#outmsg").html(msg);
        $('html, body').animate({
            scrollTop: $('body').height()
        }, 800);
    }

    function button_set(n) {
        if (n) {
            $(":button").attr("disabled", false);
            $(":submit").attr("disabled", false);
        } else {
            $(":button").attr("disabled", true);
            $(":submit").attr("disabled", true);
        }
    }

    function GetDateStr(AddDayCount) {
        var dd = new Date();
        dd.setDate(dd.getDate() + AddDayCount);
        return dd.pattern("yyyy-MM-dd");
    }
    Date.prototype.pattern = function(fmt) {
        var o = {
            "M+": this.getMonth() + 1, //月份     
            "d+": this.getDate(), //日     
            "h+": this.getHours() % 12 == 0 ? 12 : this.getHours() % 12, //小?     
            "H+": this.getHours(), //小?     
            "m+": this.getMinutes(), //分     
            "s+": this.getSeconds(), //秒     
            "q+": Math.floor((this.getMonth() + 3) / 3), //季度     
            "S": this.getMilliseconds() //毫秒     
        };
        var week = {
            "0": "\u65e5",
            "1": "\u4e00",
            "2": "\u4e8c",
            "3": "\u4e09",
            "4": "\u56db",
            "5": "\u4e94",
            "6": "\u516d"
        };
        if (/(y+)/.test(fmt)) {
            fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        }
        if (/(E+)/.test(fmt)) {
            fmt = fmt.replace(RegExp.$1, ((RegExp.$1.length > 1) ? (RegExp.$1.length > 2 ? "\u661f\u671f" : "\u5468") : "") + week[this.getDay() + ""]);
        }
        for (var k in o) {
            if (new RegExp("(" + k + ")").test(fmt)) {
                fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
            }
        }
        return fmt;
    }
    var today = new Date();
    var _day = 1000 * 60 * 60 * 24;

    this.getThisWeekDate = getThisWeekDate;
    this.getPrevWeekDate = getPrevWeekDate;
    this.getThisMonthDate = getThisMonthDate;
    this.getPrevMonthDate = getPrevMonthDate;
    this.getThisYearDate = getThisYearDate;
    this.getPrevYearDate = getPrevYearDate;

    function getThisWeekDate() {
        // 第一天日期
        var firstDay = new Date(today - (today.getDay() - 1) * _day);
        // 最后一天日期
        var lastDay = new Date((firstDay * 1) + 6 * _day);
        return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
    }

    function getPrevWeekDate() {
        // 取上周?束日期
        var lastDay = new Date(today - (today.getDay()) * _day);
        // 取上周?始日期
        var firstDay = new Date((lastDay * 1) - 6 * _day);
        return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
    }

    function getThisMonthDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear(), today.getMonth() + 1, 1);
        var lastDay = new Date(nextDat - _day);
        return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
    }

    function getPrevMonthDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear(), today.getMonth() - 1, 1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear(), today.getMonth(), 1);
        var lastDay = new Date(nextDat - _day);
        return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
    }

    function getThisYearDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear(), 0, 1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear() + 1, 0, 1);
        var lastDay = new Date(nextDat - _day);
        return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
    }

    function getPrevYearDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear() - 1, 0, 1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear(), 0, 1);
        var lastDay = new Date(nextDat - _day);
        return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
    }

    function fast_sel_time(flag) {
        switch (flag) {
            case "0":
                $("#start_time").val(GetDateStr(0));
                $("#end_time").val(GetDateStr(0));
                break;
            case "1":
                $("#start_time").val(GetDateStr(-1));
                $("#end_time").val(GetDateStr(-1));
                break;
            case "2":
                $("#start_time").val(GetDateStr(-2));
                $("#end_time").val(GetDateStr(-2));
                break;
            case "3":
                $("#start_time").val(getThisWeekDate()[0]);
                $("#end_time").val(getThisWeekDate()[1]);
                break;
            case "4":
                $("#start_time").val(getPrevWeekDate()[0]);
                $("#end_time").val(getPrevWeekDate()[1]);
                break;
            case "5":
                $("#start_time").val(getThisMonthDate()[0]);
                $("#end_time").val(getThisMonthDate()[1]);
                break;
            case "6":
                $("#start_time").val(getPrevMonthDate()[0]);
                $("#end_time").val(getPrevMonthDate()[1]);
                break;
            case "7":
                $("#start_time").val(getThisYearDate()[0]);
                $("#end_time").val(getThisYearDate()[1]);
                break;
            case "8":
                $("#start_time").val(getPrevYearDate()[0]);
                $("#end_time").val(getPrevYearDate()[1]);
                break;
        }
        $("#counts_form").submit();
    }
</script>