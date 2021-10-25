<?php
require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li>財務管理系統</li>
            <li class="active">區段總表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>區段總表 - 總管理處 - 2021/09/01 00:00 至 2021/09/30 23:59</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form name="form1" method="post" action="?vst=full" class="form-inline">

                        會館：<select name="branch">
                            <option value="" selected>請選擇</option>
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
                        </select>　
                        日期：
                        <input type="text" id="y1" name="y1" class="datepicker" autocomplete="off" value="2021/9/1"> 至
                        <input type="text" id="y2" name="y2" class="datepicker" autocomplete="off" value="2021/9/30">
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
                        </select>
                        <input type="submit" name="Submit" class="btn btn-default" value="查詢">
                    </form>

                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th>總業績</th>
                            <th>台北</th>
                            <th>桃園</th>
                            <th>新竹</th>
                            <th>台中</th>
                            <th>台南</th>
                            <th>高雄</th>
                            <th>八德</th>
                            <th>約專</th>
                            <th>迷你約</th>
                            <th>總管理處</th>
                        </tr>
                        <tr>
                            <td>11439902</td>
                            <td>1775295</td>
                            <td>1083285</td>
                            <td>1193316</td>
                            <td>1617510</td>
                            <td>1850256</td>
                            <td>2177209</td>
                            <td>1290001</td>
                            <td>238950</td>
                            <td>186600</td>
                            <td>27480</td>
                        </tr>

                    </tbody>
                </table>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th>實收</th>
                            <th> -> 台北</th>
                            <th> -> 桃園</th>
                            <th> -> 新竹</th>
                            <th> -> 台中</th>
                            <th> -> 台南</th>
                            <th> -> 高雄</th>
                            <th> -> 八德</th>
                            <th> -> 約專</th>
                            <th> -> 迷你約</th>
                            <th> -> 總管理處</th>
                        </tr>
                        <tr>
                            <td>0+0=0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th>業績</th>
                            <th>台北 -></th>
                            <th>桃園 -></th>
                            <th>新竹 -></th>
                            <th>台中 -></th>
                            <th>台南 -></th>
                            <th>高雄 -></th>
                            <th>八德 -></th>
                            <th>約專 -></th>
                            <th>迷你約 -></th>
                            <th>總管理處 -></th>
                        </tr>
                        <tr>
                            <td>27480</td>
                            <td>530</td>
                            <td>0</td>
                            <td>0</td>
                            <td>3800</td>
                            <td>0</td>
                            <td>10000</td>
                            <td>4700</td>
                            <td>8450</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                    </tbody>
                </table>
                <p>秘書業績排行</p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <td>排名</td>
                            <td>會館</td>
                            <td>秘書</td>
                            <td>職稱</td>
                            <td>男業績</td>
                            <td>女業績</td>
                            <td>總業績</td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>總管理處</td>
                            <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=559&ny1=2021/09/01 00:00&ny2=2021/09/30 23:59','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">網站行銷</a></td>
                            <td>諮詢顧問</td>
                            <td>12050</td>
                            <td>10280</td>
                            <td>22330</td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>總管理處</td>
                            <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=240&ny1=2021/09/01 00:00&ny2=2021/09/30 23:59','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">劉澔翰</a></td>
                            <td>工程師</td>
                            <td>4559</td>
                            <td>0</td>
                            <td>4559</td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>總管理處</td>
                            <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=873&ny1=2021/09/01 00:00&ny2=2021/09/30 23:59','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">曾欣怡</a></td>
                            <td>行銷企劃</td>
                            <td>4500</td>
                            <td>0</td>
                            <td>4500</td>
                        </tr>

                    </tbody>
                </table>
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

<script language="JavaScript">
    function GetDateStr(AddDayCount) {
        var dd = new Date();
        dd.setDate(dd.getDate() + AddDayCount);
        return dd.pattern("yyyy/MM/dd");
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
        return [firstDay.pattern("yyyy/MM/dd"), lastDay.pattern("yyyy/MM/dd")];
    }

    function getPrevWeekDate() {
        // 取上周?束日期
        var lastDay = new Date(today - (today.getDay()) * _day);
        // 取上周?始日期
        var firstDay = new Date((lastDay * 1) - 6 * _day);
        return [firstDay.pattern("yyyy/MM/dd"), lastDay.pattern("yyyy/MM/dd")];
    }

    function getThisMonthDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear(), today.getMonth() + 1, 1);
        var lastDay = new Date(nextDat - _day);
        return [firstDay.pattern("yyyy/MM/dd"), lastDay.pattern("yyyy/MM/dd")];
    }

    function getPrevMonthDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear(), today.getMonth() - 1, 1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear(), today.getMonth(), 1);
        var lastDay = new Date(nextDat - _day);
        return [firstDay.pattern("yyyy/MM/dd"), lastDay.pattern("yyyy/MM/dd")];
    }

    function getThisYearDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear(), 0, 1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear() + 1, 0, 1);
        var lastDay = new Date(nextDat - _day);
        return [firstDay.pattern("yyyy/MM/dd"), lastDay.pattern("yyyy/MM/dd")];
    }

    function getPrevYearDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear() - 1, 0, 1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear(), 0, 1);
        var lastDay = new Date(nextDat - _day);
        return [firstDay.pattern("yyyy/MM/dd"), lastDay.pattern("yyyy/MM/dd")];
    }

    function fast_sel_time(flag) {
        switch (flag) {
            case "0":
                $("#y1").val(GetDateStr(0));
                $("#y2").val(GetDateStr(0));
                break;
            case "1":
                $("#y1").val(GetDateStr(-1));
                $("#y2").val(GetDateStr(-1));
                break;
            case "2":
                $("#y1").val(GetDateStr(-2));
                $("#y2").val(GetDateStr(-2));
                break;
            case "3":
                $("#y1").val(getThisWeekDate()[0]);
                $("#y2").val(getThisWeekDate()[1]);
                break;
            case "4":
                $("#y1").val(getPrevWeekDate()[0]);
                $("#y2").val(getPrevWeekDate()[1]);
                break;
            case "5":
                $("#y1").val(getThisMonthDate()[0]);
                $("#y2").val(getThisMonthDate()[1]);
                break;
            case "6":
                $("#y1").val(getPrevMonthDate()[0]);
                $("#y2").val(getPrevMonthDate()[1]);
                break;
            case "7":
                $("#y1").val(getThisYearDate()[0]);
                $("#y2").val(getThisYearDate()[1]);
                break;
            case "8":
                $("#y1").val(getPrevYearDate()[0]);
                $("#y2").val(getPrevYearDate()[1]);
                break;
        }
    }
</script>