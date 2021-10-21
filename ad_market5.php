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
            <li class="active">行銷活動統計</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>行銷活動統計</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form action="?st=send" method="post" name="counts_form" id="counts_form" onsubmit="return check_form()">
                    <p>請選擇時段：<input type="text" name="start_time" id="start_time" class="datepicker" autocomplete="off" value="2020-01-01">　～　<input type="text" name="end_time" id="end_time" class="datepicker" autocomplete="off" value="2020-12-31">　<select id="fasttime" onchange="fast_sel_time($(this).val())">
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
                        </select></p>
                    <p>
                        <!--<a data-toggle="collapse" href="#marking_action_list" data-parent="#menu_group" class="btn btn-info">活動選擇</a>--><input id="send_submit" type="submit" class="btn btn-default" value="送出">
                    <div class="" id="marking_action_list">

                        <p>2020/1/1 00:00 ~ 2020/12/31 23:59</p>
                        <table class="table table-striped table-bordered bootstrap-datatable">
                            <tr>
                                <td colspan=30>你的戀愛能力有多強</td>
                            </tr>
                            <tr>
                                <td>18-25-男</td>
                                <td>18-25-女</td>
                                <td>26-30-男</td>
                                <td>26-30-女</td>
                                <td>31-35-男</td>
                                <td>31-35-女</td>
                                <td>36-40-男</td>
                                <td>36-40-女</td>
                                <td>41-45-男</td>
                                <td>41-45-女</td>
                                <td>46-50-男</td>
                                <td>46-50-女</td>
                                <td>51up男</td>
                                <td>51up女</td>
                                <td>博士-男</td>
                                <td>博士-女</td>
                                <td>碩士-男</td>
                                <td>碩士-女</td>
                                <td>大學-男</td>
                                <td>大學-女</td>
                                <td>專科-男</td>
                                <td>專科-女</td>
                                <td>高職-男</td>
                                <td>高職-女</td>
                                <td>高中-男</td>
                                <td>高中-女</td>
                                <td>國中-男</td>
                                <td>國中-女</td>
                                <td>其他-男</td>
                                <td>其他-女</td>
                            </tr>
                            <tr>
                                <td>523</td>
                                <td>1003</td>
                                <td>442</td>
                                <td>427</td>
                                <td>148</td>
                                <td>195</td>
                                <td>108</td>
                                <td>99</td>
                                <td>53</td>
                                <td>40</td>
                                <td>24</td>
                                <td>24</td>
                                <td>1489</td>
                                <td>2315</td>
                                <td>1</td>
                                <td>1</td>
                                <td>25</td>
                                <td>13</td>
                                <td>177</td>
                                <td>173</td>
                                <td>20</td>
                                <td>24</td>
                                <td>130</td>
                                <td>54</td>
                                <td>104</td>
                                <td>48</td>
                                <td>20</td>
                                <td>8</td>
                                <td>2</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td colspan=30>愛情實驗室</td>
                            </tr>
                            <tr>
                                <td>18-25-男</td>
                                <td>18-25-女</td>
                                <td>26-30-男</td>
                                <td>26-30-女</td>
                                <td>31-35-男</td>
                                <td>31-35-女</td>
                                <td>36-40-男</td>
                                <td>36-40-女</td>
                                <td>41-45-男</td>
                                <td>41-45-女</td>
                                <td>46-50-男</td>
                                <td>46-50-女</td>
                                <td>51up男</td>
                                <td>51up女</td>
                                <td>博士-男</td>
                                <td>博士-女</td>
                                <td>碩士-男</td>
                                <td>碩士-女</td>
                                <td>大學-男</td>
                                <td>大學-女</td>
                                <td>專科-男</td>
                                <td>專科-女</td>
                                <td>高職-男</td>
                                <td>高職-女</td>
                                <td>高中-男</td>
                                <td>高中-女</td>
                                <td>國中-男</td>
                                <td>國中-女</td>
                                <td>其他-男</td>
                                <td>其他-女</td>
                            </tr>
                            <tr>
                                <td>78</td>
                                <td>153</td>
                                <td>102</td>
                                <td>109</td>
                                <td>66</td>
                                <td>50</td>
                                <td>57</td>
                                <td>19</td>
                                <td>34</td>
                                <td>13</td>
                                <td>10</td>
                                <td>14</td>
                                <td>19</td>
                                <td>7</td>
                                <td>1</td>
                                <td>0</td>
                                <td>3</td>
                                <td>2</td>
                                <td>21</td>
                                <td>18</td>
                                <td>10</td>
                                <td>1</td>
                                <td>12</td>
                                <td>7</td>
                                <td>10</td>
                                <td>6</td>
                                <td>1</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td colspan=30>2020年12星座愛情指數測驗</td>
                            </tr>
                            <tr>
                                <td>18-25-男</td>
                                <td>18-25-女</td>
                                <td>26-30-男</td>
                                <td>26-30-女</td>
                                <td>31-35-男</td>
                                <td>31-35-女</td>
                                <td>36-40-男</td>
                                <td>36-40-女</td>
                                <td>41-45-男</td>
                                <td>41-45-女</td>
                                <td>46-50-男</td>
                                <td>46-50-女</td>
                                <td>51up男</td>
                                <td>51up女</td>
                                <td>博士-男</td>
                                <td>博士-女</td>
                                <td>碩士-男</td>
                                <td>碩士-女</td>
                                <td>大學-男</td>
                                <td>大學-女</td>
                                <td>專科-男</td>
                                <td>專科-女</td>
                                <td>高職-男</td>
                                <td>高職-女</td>
                                <td>高中-男</td>
                                <td>高中-女</td>
                                <td>國中-男</td>
                                <td>國中-女</td>
                                <td>其他-男</td>
                                <td>其他-女</td>
                            </tr>
                            <tr>
                                <td>167</td>
                                <td>299</td>
                                <td>1756</td>
                                <td>2620</td>
                                <td>1406</td>
                                <td>1547</td>
                                <td>1044</td>
                                <td>1304</td>
                                <td>558</td>
                                <td>890</td>
                                <td>265</td>
                                <td>313</td>
                                <td>165</td>
                                <td>118</td>
                                <td>6</td>
                                <td>1</td>
                                <td>34</td>
                                <td>44</td>
                                <td>414</td>
                                <td>395</td>
                                <td>90</td>
                                <td>76</td>
                                <td>270</td>
                                <td>193</td>
                                <td>194</td>
                                <td>118</td>
                                <td>75</td>
                                <td>49</td>
                                <td>3</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td colspan=30>穩定交往的秘訣</td>
                            </tr>
                            <tr>
                                <td>18-25-男</td>
                                <td>18-25-女</td>
                                <td>26-30-男</td>
                                <td>26-30-女</td>
                                <td>31-35-男</td>
                                <td>31-35-女</td>
                                <td>36-40-男</td>
                                <td>36-40-女</td>
                                <td>41-45-男</td>
                                <td>41-45-女</td>
                                <td>46-50-男</td>
                                <td>46-50-女</td>
                                <td>51up男</td>
                                <td>51up女</td>
                                <td>博士-男</td>
                                <td>博士-女</td>
                                <td>碩士-男</td>
                                <td>碩士-女</td>
                                <td>大學-男</td>
                                <td>大學-女</td>
                                <td>專科-男</td>
                                <td>專科-女</td>
                                <td>高職-男</td>
                                <td>高職-女</td>
                                <td>高中-男</td>
                                <td>高中-女</td>
                                <td>國中-男</td>
                                <td>國中-女</td>
                                <td>其他-男</td>
                                <td>其他-女</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>8</td>
                                <td>91</td>
                                <td>96</td>
                                <td>91</td>
                                <td>99</td>
                                <td>93</td>
                                <td>136</td>
                                <td>82</td>
                                <td>170</td>
                                <td>67</td>
                                <td>173</td>
                                <td>104</td>
                                <td>63</td>
                                <td>0</td>
                                <td>1</td>
                                <td>9</td>
                                <td>9</td>
                                <td>42</td>
                                <td>54</td>
                                <td>24</td>
                                <td>19</td>
                                <td>41</td>
                                <td>52</td>
                                <td>23</td>
                                <td>33</td>
                                <td>13</td>
                                <td>5</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td colspan=30>DMN官網名單</td>
                            </tr>
                            <tr>
                                <td>18-25-男</td>
                                <td>18-25-女</td>
                                <td>26-30-男</td>
                                <td>26-30-女</td>
                                <td>31-35-男</td>
                                <td>31-35-女</td>
                                <td>36-40-男</td>
                                <td>36-40-女</td>
                                <td>41-45-男</td>
                                <td>41-45-女</td>
                                <td>46-50-男</td>
                                <td>46-50-女</td>
                                <td>51up男</td>
                                <td>51up女</td>
                                <td>博士-男</td>
                                <td>博士-女</td>
                                <td>碩士-男</td>
                                <td>碩士-女</td>
                                <td>大學-男</td>
                                <td>大學-女</td>
                                <td>專科-男</td>
                                <td>專科-女</td>
                                <td>高職-男</td>
                                <td>高職-女</td>
                                <td>高中-男</td>
                                <td>高中-女</td>
                                <td>國中-男</td>
                                <td>國中-女</td>
                                <td>其他-男</td>
                                <td>其他-女</td>
                            </tr>
                            <tr>
                                <td>129</td>
                                <td>32</td>
                                <td>397</td>
                                <td>221</td>
                                <td>350</td>
                                <td>135</td>
                                <td>286</td>
                                <td>120</td>
                                <td>214</td>
                                <td>73</td>
                                <td>93</td>
                                <td>44</td>
                                <td>300</td>
                                <td>79</td>
                                <td>16</td>
                                <td>3</td>
                                <td>130</td>
                                <td>53</td>
                                <td>536</td>
                                <td>347</td>
                                <td>139</td>
                                <td>76</td>
                                <td>377</td>
                                <td>129</td>
                                <td>248</td>
                                <td>114</td>
                                <td>68</td>
                                <td>15</td>
                                <td>32</td>
                                <td>17</td>
                            </tr>
                        </table>
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
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    $(function() {

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
    }
</script>