<?php
    /*****************************************/ 
    //檔案名稱：ad_counts_branch.php
    //後台對應位置：管理系統/會館新增未入會統計
    //改版日期：2022.1.5
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
    if($_SESSION["MM_UserAuthorization"] != "admin" && $_SESSION["MM_UserAuthorization"] != "branch" && $_SESSION["MM_UserAuthorization"] != "count" && $_SESSION["MM_UserAuthorization"] != "manager" && $_SESSION["MM_UserAuthorization"] != "love_manager"){
        call_alert("您沒有查看此頁的權限。","login.php",0);
    }
    check_page_power("ad_counts_branch");    
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">會館新增未入會統計</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會館新增未入會統計</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <form action="?st=send" method="post" name="counts_form" id="counts_form" class="form-inline">
                    <p>請選擇時段：<input type="text" name="start_time" id="start_time" class="datepicker" autocomplete="off" value="<?php echo SqlFilter($_REQUEST["start_time"],"tab"); ?>" required>　～　<input type="text" name="end_time" id="end_time" class="datepicker" autocomplete="off" value="<?php echo SqlFilter($_REQUEST["end_time"],"tab"); ?>" required>
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
                        </select>&nbsp;&nbsp;<input class="btn btn-default" id="send_submit" type="submit" value="送出">
                    </p>
                </form>
                <?php 
                    if($_REQUEST["st"] == "send"){   
                        if(strtotime($_REQUEST["end_time"]) - strtotime($_REQUEST["start_time"]) < 0){
                            call_alert("在 ".$_REQUEST["start_time"]." ～ ".$_REQUEST["end_time"]." 間沒有資料或日期選擇不正確。",0,0);
                        }                     
                        $start_time = Date_EN(SqlFilter($_REQUEST["start_time"],"tab"),1) . " 00:00";
                        $end_time = Date_EN(SqlFilter($_REQUEST["end_time"],"tab"),1) . " 23:59";
                        if(!chkDate($start_time)){
                            call_alert("請選擇開始時間。",0,0);
                        }
                        if(!chkDate($end_time)){
                            call_alert("請選擇結束時間。",0,0);
                        }
                        $smaxday = ceil((strtotime($end_time) - strtotime($start_time))/ (60*60*24));
                        if($smaxday == 0){
                            $smaxday = 1;
                        }
                        $allcome = "流水陌call,樂得流水call,樂得系統回call,萊優流水call,手機1111,向日葵名單,客人自來電,活動宣傳,五人未入會,外部A名單,外部B名單,外部C名單,春天部落格,通路王,高接觸率流水號,台灣電話流水序號開發,手機123,手機104,台灣推薦名單,舊資料再開發,台灣畢冊開發,彰化委外名單,FB名單,好好玩名單";
                        echo "<p>在 ".$start_time." ～ ".$end_time." 間統計、共 ".$smaxday." 天：</p>";        
                        echo "<table id='outtable' width='100%' height=80 align='center' class='table table-striped table-bordered bootstrap-datatable'>";
                        echo "<tr><td></td>";
                        
                        $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' and admin_name<>'好好玩旅行社' Order By admin_SOrt";
                        $rs = $SPConn->prepare($SQL);
                        $rs->execute();
                        $nowbranchs = $rs->fetchAll(PDO::FETCH_ASSOC);
                        if($nowbranchs){
                            foreach($nowbranchs as $branch){
                                echo "<td>".$branch["admin_name"]."</td>";
                            }
                        }
                        echo "</tr>";
                        $allcome = explode(",",$allcome);
                        foreach($allcome as $cc){
                            echo "<tr><td>".$cc."</td>";
                            for($i=0;$i<count($nowbranchs);$i++){
                                $vv = 0;
                                $SQL = "select count(mem_auto) as tx from member_data where mem_time between '".$start_time."' and '".$end_time."' and mem_come='".$cc."' and mem_branch='".$nowbranchs[$i]["admin_name"]."'";
                                $rs = $SPConn->prepare($SQL);
                                $rs->execute();
                                $result = $rs->fetch(PDO::FETCH_ASSOC);                               
                                if($result){
                                    $vv = $result["tx"];
                                }
                                if(is_null($vv) || $vv == ""){
                                    $vv = 0;
                                }
                                ${"all_".$i} = ${"all_".$i} + $vv;
                                echo "<td>".$vv."</td>";
                            }
                            echo "</tr>";
                        }
                        echo "<tr><td style='color:blue'>合計</td>";
                        for($i=0;$i<count($nowbranchs);$i++){
                            echo "<td>".${"all_".$i}."</td>";
                        }
                        echo "</tr>";
                        echo "</table>";
                    }
                ?>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->


    <hr>
    <footer>
    </footer>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
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