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
            <li><a href="ad_master_index.php">督導管理系統</a></li>
            <li>財務管理系統</li>
            <li class="active">日明細表 - 總管理處 - 2021 年 10 月 22 日</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>日明細表 - 總管理處 - 2021 年 10 月 22 日</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form id="form1" name="form1" method="post" action="?vst=full" class="form-inline">

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
                        <select id="y1" name="y1">
                            <option value="" selected>請選擇</option>
                            <option value="2021" selected>2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                        </select>
                        年
                        <select id="m1" name="m1">
                            <option value="">請選擇</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10" selected>10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        月
                        <select id="d1" name="d1">
                            <option value="">請選擇</option>
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
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22" selected>22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                        &nbsp;&nbsp;<select id="fasttime" onchange="fast_sel_time($(this).val())" class="form-control">
                            <option value="">快速選擇</option>
                            <option value="0">今天</option>
                            <option value="1">昨天</option>
                            <option value="2">前天</option>
                            <option value="3">大前天</option>
                        </select>
                        日　<input type="submit" name="Submit" class="btn btn-default" value="查詢">
                </div>
                <p>會館拆分業績明細</p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th>編號</th>
                            <th>日期</th>
                            <th>會館</th>
                            <th>受理秘書</th>
                            <th>姓名</th>
                            <th>摘要及說明</th>
                            <th>應收</th>
                            <th>實收</th>
                            <th>會館</th>
                            <th>業績</th>
                        </tr>

                        <tr>
                            <td colspan=9 align=right>小計</td>
                            <td>0</td>
                        </tr>

                    </tbody>
                </table>

                <p>會館接收業績明細</p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th>編號</th>
                            <th>日期</th>
                            <th>會館</th>
                            <th>受理秘書</th>
                            <th>姓名</th>
                            <th>摘要及說明</th>
                            <th>應收</th>
                            <th>實收</th>
                            <th>會館</th>
                            <th>業績</th>
                        </tr>

                        <tr>
                            <td>246279</td>
                            <td>2021/10/22</td>
                            <td>台北</td>
                            <td>高語鍹</td>
                            <td>林佳慧</td>
                            <td>會費尾款-無</td>
                            <td></td>
                            <td>26000</td>
                            <td>總管理處</td>
                            <td>
                                5200&nbsp;&nbsp;(20%)
                            </td>
                        </tr>

                        <tr>
                            <td colspan=9 align=right>小計</td>
                            <td>5200</td>
                        </tr>
                    </tbody>
                </table>

                <p>秘書業績明細</p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th>編號</th>
                            <th>日期</th>
                            <th>會館</th>
                            <th>受理秘書</th>
                            <th>姓名</th>
                            <th>摘要及說明</th>
                            <th>應收</th>
                            <th>實收</th>
                            <th>會館</th>
                            <th>業績</th>
                        </tr>

                        <tr>
                            <td>246279</td>
                            <td>2021/10/22</td>
                            <td>台北</td>
                            <td>約專LINE POINTS</td>
                            <td>林佳慧</td>
                            <td>會費尾款-無</td>
                            <td></td>
                            <td>26000</td>
                            <td>總管理處</td>
                            <td>
                                5200&nbsp;&nbsp;(20%)
                            </td>
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
        dv = GetDateStr(0);

        switch (flag) {
            case "0":
                dv = GetDateStr(0);
                break;
            case "1":
                dv = GetDateStr(-1);
                break;
            case "2":
                dv = GetDateStr(-2);
                break;
            case "3":
                dv = GetDateStr(-3);
                break;
        }
        dvd = new Date(dv);
        y1 = parseInt(dvd.pattern("yyyy"));
        m1 = parseInt(dvd.pattern("MM"));
        d1 = parseInt(dvd.pattern("dd"));
        $("#y1").val(y1);
        $("#m1").val(m1);
        $("#d1").val(d1);
    }
</script>