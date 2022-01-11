<?php
    /*****************************************/ 
    //檔案名稱：ad_counts_new.php
    //後台對應位置：管理系統/未入會統計-新
    //改版日期：2022.1.6
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

    $marking_list = SqlFilter($_REQUEST["marking_list"],"tab"); 
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">未入會統計-新</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>未入會統計-新</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form action="?st=send" method="post" name="counts_form" id="counts_form" class="form-inline" onsubmit="return check_form()">
                    <p>請選擇時段：<input type="text" name="start_time" id="start_time" class="datepicker" autocomplete="off">　～　<input type="text" name="end_time" id="end_time" class="datepicker" autocomplete="off">
                        &nbsp;&nbsp;<select id="fasttime" onchange="fast_sel_time($(this).val())" class="form-control">
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
                        </select>&nbsp;&nbsp;<input id="send_submit" type="submit" class="btn btn-default" value="送出"></p>
                </form>
                <?php 
                    if($_REQUEST["st"] == "send"){
                        $stime = Date_EN(SqlFilter($_REQUEST["start_time"],"tab"),1) . " 00:00";
                        $etime = Date_EN(SqlFilter($_REQUEST["end_time"],"tab"),1) . " 23:59";
                        $marking_listv = str_replace( ",", "','",$marking_list);
          	            $marking_listv = "'".$marking_listv."'";
                        echo "<table class='table table-striped table-bordered bootstrap-datatable'>";
                        $all_str = "網站註冊|1,春網戀愛咨詢|2,手機APP|3,網站手機版|4,手機APP-首頁|5,網站手機版-首頁|6,singleparty|7,會員登入頁|8,春網認識他|9,春網喜事見證|10,春網活動列表|11,春網戀愛講堂-首頁|12,春網戀愛講堂-內頁|13,手機APP-熱戀區|14,手機APP-寶貝聯誼|15,手機APP-橙果|16,約會專家|17";
                        
                        echo "<tr><td>NO</td><td>活動名稱</td><td>上線日期</td><td>統計日期</td>";
                        echo "<td>所有(男)</td><td>新(男)</td><td>所有(女)</td><td>新(女)</td><td>總名單數</td>";
                        echo "<td>成交(男)</td><td>成交(女)</td><td>總成交數</td><td>成交金額</td>";
                        echo "</tr>";

                        $gg = 1;
                        foreach(explode(",",$all_str) as $pp){
                            $pp1 = explode("|",$pp)[0];
                            $pp2 = explode("|",$pp)[1];
                            echo "<tr>";
                            echo "<td>".$gg."</td>";
                            $names = $pp1;
                            echo "<td>".$names."</td>";
                            echo "<td></td>";
                            echo "<td>".$stime." 至 ".$etime."</td>";
                            $total1 = 0;
                            $total2 = 0;
                            $total3 = 0;
                            if($pp2 == 13){
                                $vvsql = "mem_come='春天網站' and mem_come2 like '%".$pp1."%'"; 
                            }elseif($pp2 == 17){
                                $vvsql = "mem_come='".$pp1."'";
                            }else{
                                $vvsql = "mem_come='春天網站' and mem_come2='".$pp1."'";
                            }

                            // 所有男
                            echo "<td>";
                            $SQL = "select count(mem_auto) as vvt from member_data where ".$vvsql." and mem_time between '".$stime."' and '".$etime."' and mem_sex='男'";
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetch(PDO::FETCH_ASSOC);
                            if($result){
                                $vvt = $result["vvt"];
                            }else{
                                $vvt = 0;
                            }
                            $total1 = $total1 + $vvt;
                            echo $vvt."</td>";

                            // 所有新男
                            echo "<td>";
                            $SQL = "select count(mem_auto) as vvt from member_data as dba where ".$vvsql." and mem_time between '".$stime."' and '".$etime."' and mem_sex='男'".$vsql." And ((SELECT count(mem_auto) FROM member_data Where mem_mobile = dba.mem_mobile".$vsql." and datediff(s, dba.mem_time, mem_time) <= 0) <= 1) And ((SELECT count(k_id) FROM love_keyin Where k_mobile = dba.mem_mobile".$vsql2.") <= 0)";
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetch(PDO::FETCH_ASSOC);
                            if($result){
                                $vvt = $result["vvt"];
                            }else{
                                $vvt = 0;
                            }
                            echo $vvt."</td>";

                            // 所有女
                            echo "<td>";
                            $SQL = "select count(mem_auto) as vvt from member_data where ".$vvsql." and mem_time between '".$stime."' and '".$etime."' and mem_sex='女'".$vsql;
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetch(PDO::FETCH_ASSOC);
                            if($result){
                                $vvt = $result["vvt"];
                            }else{
                                $vvt = 0;
                            }
                            $total1 = $total1 + $vvt;
                            echo $vvt."</td>";

                            // 所有新女
                            echo "<td>";
                            $SQL = "select count(mem_auto) as vvt from member_data as dba where ".$vvsql." and mem_time between '".$stime."' and '".$etime."' and mem_sex='女'".$vsql." And ((SELECT count(mem_auto) FROM member_data Where mem_mobile = dba.mem_mobile".$vsql." and datediff(s, dba.mem_time, mem_time) <= 0) <= 1) And ((SELECT count(k_id) FROM love_keyin Where k_mobile = dba.mem_mobile".$vsql2.") <= 0)";
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetch(PDO::FETCH_ASSOC);
                            if($result){
                                $vvt = $result["vvt"];
                            }else{
                                $vvt = 0;
                            }
                            echo $vvt."</td>";
                            echo "<td>".$total1."</td>";

                            // 成交男
                            echo "<td>";
                            $SQL = "select count(mem_auto) as vvt from member_data where ".$vvsql." and mem_time between '".$stime."' and '".$etime."' and mem_sex='男' and mem_level='mem'".$vsql;
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetch(PDO::FETCH_ASSOC);
                            if($result){
                                $vvt = $result["vvt"];
                            }else{
                                $vvt = 0;
                            }
                            $total2 = $total2 + $vvt;
                            echo $vvt."</td>";

                            // 成交女
                            echo "<td>";
                            $SQL = "select count(mem_auto) as vvt from member_data where ".$vvsql." and mem_time between '".$stime."' and '".$etime."' and mem_sex='女' and mem_level='mem'".$vsql;
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetch(PDO::FETCH_ASSOC);
                            if($result){
                                $vvt = $result["vvt"];
                            }else{
                                $vvt = 0;
                            }
                            $total2 = $total2 + $vvt;
                            echo $vvt."</td>";
                            echo "<td>".$total2."</td>";

                            $total3 = 0;
                            $SQL = "select mem_num, vv from member_data outer apply (select SUM(pay_total2) as vv from pay_main where pay_user <> '' and pay_user=mem_username and pay_time > mem_time) pay_main where ".$vvsql." and mem_level='mem' and mem_time between '".$stime."' and '".$etime."'".$vsql;
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if($result){
                                foreach($result as $re){
                                    if($re["vv"] != ""){
                                        $total3 = $total3 + intval($re["vv"]);
                                    }
                                }
                            }else{
                                $total3 = 0;
                            }
                            echo "<td>".$total3."</td>";
                            echo "</tr>";
                            $gg = $gg + 1;
                        }
                        echo "</table>";                        
                    }
                ?>
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
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    $mtu = "ad_counts.";
    $(function() {

        $("#allcheckbox").on("click", function() {
            if ($(this).prop("checked"))
                $("input[name='marking_list']").each(function() {
                    $(this).prop("checked", true);
                });
            else
                $("input[name='marking_list']").each(function() {
                    $(this).prop("checked", false);
                });
        });

    });
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

        return true;
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