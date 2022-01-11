<?php
    /*****************************************/
    //檔案名稱：ad_market2.php
    //後台對應位置：管理系統/行銷活動統計>開統
    //改版日期：2022.1.4
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
    if ($_SESSION["MM_Username"] == "") {
        call_alert("請重新登入。", "login.php", 0);
    }

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.asp">管理系統</a></li>
            <li class="active">行銷活動開發狀態統計</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>行銷活動開發狀態統計</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <?php 
                    if($_REQUEST["an"] != ""){
                        $stime = Date_EN(SqlFilter($_REQUEST["start_time"],"tab"),2) . " 00:00";
                        $etime = Date_EN(SqlFilter($_REQUEST["end_time"],"tab"),2) . " 23:59";
                        $SQL = "select * from marketing_list where auton ='".SqlFilter($_REQUEST["an"],"int")."'";
                        $rs = $SPConn->prepare($SQL);
                        $rs->execute();
                        $result = $rs->fetch(PDO::FETCH_ASSOC);
                        if($result){
                            $ccome = $result["name"];
                        }
                        echo "<p>".$ccome."&nbsp;&nbsp;&nbsp;&nbsp;".$stime." 至 ".$etime."</p>";
                        echo "<table class='table table-striped table-bordered bootstrap-datatable'>";
                        $all_types = [];
                        $SQL = "select distinct all_type from member_data where mem_come='行銷活動' and mem_come2='".$ccome."' and mem_time between '".$stime."' and '".$etime."'";
                        $rs = $SPConn->prepare($SQL);
                        $rs->execute();
                        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                        if($result){
                            foreach($result as $re){
                                if($re["all_type"] != ""){
                                    array_push($all_types,$re["all_type"]);
                                }
                            }                            
                        }
                        $total_member = 0;
                        $total_pa = 0;
                        $SQL = "select count(mem_auto) as t from member_data where mem_come='行銷活動' and mem_come2='".$ccome."' and mem_time between '".$stime."' and '".$etime."'";
                        $rs = $SPConn->prepare($SQL);
                        $rs->execute();
                        $result = $rs->fetch(PDO::FETCH_ASSOC);
                        if($result){
                            $total_member = $result["t"];
                        }
                        if($total_member == ""){
                            $total_member = 0;
                        }
                        $other_member = $total_member;
                        echo "<tr><td></td><td>回報狀態</td><td>筆數</td><td>比例</td></tr>";
                        if($all_types){
                            foreach($all_types as $tts){
                                $ttsn = 0;
                                $SQL = "select count(mem_auto) as t from member_data where mem_come='行銷活動' and mem_come2='".$ccome."' and all_type='".$tts."' and mem_time between '".$stime."' and '".$etime."'";
                                $rs = $SPConn->prepare($SQL);
                                $rs->execute();
                                $result = $rs->fetch(PDO::FETCH_ASSOC);
                                if($result){
                                    $ttsn = $result["t"];
                                }
                                if($ttsn == ""){
                                    $ttsn = 0;
                                }
                                if($ttsn > 0){
                                    $other_member = $other_member - $ttsn;
                                    $paa = round(number_format($ttsn*100/$total_member, 2));
                                    $total_pa = $total_pa + $paa;
                                    $paa = $paa." %";
                                }else{
                                    $paa = "--";
                                }
                                echo "<tr><td></td><td>".$tts."</td><td>".$ttsn."</td><td>".$paa."</td></tr>";
                            }
                            if($other_member > 0){
                                $paa = round(number_format($other_member*100/$total_member, 2));
                                $total_pa = $total_pa + $paa;
                                $paa = $paa . " %";
                            }else{
                                $other_member = 0;
                  	            $paa = "--";
                            }
                            echo "<tr><td></td><td>其他</td><td>".$other_member."</td><td>".$paa."</td></tr>";
                            echo "<tr><td></td><td>總計</td><td>".$total_member."</td><td>".$total_pa." %</td></tr>";
                        }else{
                            echo "<tr><td colspan=4>暫無回報狀態</td></tr>";
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
    $mtu = "ad_market2.";
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
        if ($("input[name='marking_list']:checked").length <= 0) {
            alert("請選擇活動。");
            $("#marking_action_list").collapse("show");
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
    }
</script>