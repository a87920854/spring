<?php
require_once("./include/_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php")
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">秘書履歷 - 陳玉涵</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>秘書履歷 - 陳玉涵</strong> <!-- panel title -->
                </span>

                <div class="pull-right"><button class="btn btn-primary" onclick="history.go(-1);">回上一頁</button></div>
            </div>

            <div class="panel-body">


                <!-- Orders Box -->
                <div class="col-md-3 col-sm-6">

                    <!-- BOX -->
                    <div class="box default">
                        <!-- default, danger, warning, info, success -->

                        <div class="box-title">
                            <!-- add .noborder class if box-body is removed -->
                            <h4><a href="ad_no_mem.php?s=nokaifa&u=A225553998">199 位尚未開發</a></h4>
                            <small class="block">快來看看這些還沒被關心的人吧</small>
                            <i class="fa fa-users"></i>
                        </div>


                    </div>
                    <!-- /BOX -->

                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <th></th>
                        <th>一月</th>
                        <th>二月</th>
                        <th>三月</th>
                        <th>四月</th>
                        <th>五月</th>
                        <th>六月</th>
                        <th>七月</th>
                        <th>八月</th>
                        <th>九月</th>
                        <th>十月</th>
                        <th>十一月</th>
                        <th>十二月</th>
                        <th>累計</th>
                    </tr>
                    <tr>
                        <td>2021 年度業績</td>
                        <td>18545</td>
                        <td>36899</td>
                        <td>28936</td>
                        <td>1545</td>
                        <td>168698</td>
                        <td>31400</td>
                        <td>40000</td>
                        <td>81184</td>
                        <td>1200</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>累計：408407</td>
                    </tr>
                    <tr>
                        <td>2020 年度業績</td>
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
                        <td>0</td>
                        <td>0</td>
                        <td>累計：0</td>
                    </tr>
                    <tr>
                        <td>2019 年度業績</td>
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
                        <td>0</td>
                        <td>0</td>
                        <td>累計：0</td>
                    </tr>
                </table>
                <div id="pieshow" style="height:300px"></div>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <tr>
                        <td>未入會開發：2642人、成功入會：6人、成交率：0%、平均月業績：45378、平均年業績：136135</td>
                    </tr>
                </table>
                <br>
                <p>業績明細</p>
                <form name="form1" method="post" action="?an=1679" style="margin:0px;">

                    <p>時間：<select name="t1" id="t1" style="width:120px;">
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
                        </select><select name="t2" id="t2" style="width:120px;">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9" selected>9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        &nbsp;&nbsp;<input type="submit" class="btn" style="margin-top:-8px;" value="查詢">
                    </p>
                </form>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td>
                            <div align="center">編號</div>
                        </td>
                        <td>
                            <div align="center">日期</div>
                        </td>
                        <td>
                            <div align="center">會館</div>
                        </td>
                        <td>
                            <div align="center">受理秘書</div>
                        </td>
                        <td>
                            <div align="center">姓名</div>
                        </td>
                        <td>
                            <div align="center">性別</div>
                        </td>
                        <td>
                            <div align="center">摘要及說明</div>
                        </td>
                        <td>
                            <div align="center">應收</div>
                        </td>
                        <td>
                            <div align="center">實收</div>
                        </td>
                        <td>
                            <div align="center">會館</div>
                        </td>
                        <td>
                            <div align="center">秘書</div>
                        </td>
                        <td>
                            <div align="center">業績</div>
                        </td>
                    </tr>

                    <tr bgcolor="#F0F0F0">
                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                            <div align="center">
                                <font color="#FF0000" size="2">244793</font>
                            </div>
                        </td>
                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                            <div align="center">
                                <font size="2">
                                    <font color="#000066">2021/9/8</font>
                                </font>
                            </div>
                        </td>
                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                            <div align="center">
                                <font color="#000066">
                                    <font size="2">
                                        <font color="#000066">台北</font>
                                    </font>
                                </font>
                            </div>
                        </td>
                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                            <div align="center">
                                <font color="#000066">
                                    <font size="2">
                                        <font color="#000066">陳玉涵</font>
                                    </font>
                                </font>
                            </div>
                        </td>
                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                            <div align="center">
                                <font color="#000066">
                                    <font size="2">
                                        <font color="#000066">傅書敏</font>
                                    </font>
                                </font>
                            </div>
                        </td>
                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                            <div align="center">
                                <font color="#000066">
                                    <font size="2">
                                        <font color="#000066">男</font>
                                    </font>
                                </font>
                            </div>
                        </td>
                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                            <div align="center">
                                <font color="#000066">
                                    <font size="2">
                                        <font color="#000066">入會-無</font>
                                    </font>
                                </font>
                            </div>
                        </td>
                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                            <div align="center">
                                <font color="#000066">
                                    <font size="2">
                                        <font color="#000066">3000</font>
                                    </font>
                                </font>
                            </div>
                        </td>
                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                            <div align="center">
                                <font color="#000066">
                                    <font size="2">
                                        <font color="#000066">3000</font>
                                    </font>
                                </font>
                            </div>
                        </td>
                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                            <div align="center">
                                <font color="#990066" size="2">台北</font>
                            </div>
                        </td>
                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                            <div align="center">
                                <font size="2">
                                    <font color="#000066">陳玉涵</font>
                                </font>
                            </div>
                        </td>
                        <td bgcolor="#F0F0F0" style="word-break:break-all">
                            <div align="center">
                                <font size="2">
                                    <font color="#000066">
                                        1200&nbsp;&nbsp;(40%)
                                    </font>
                                </font>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=7>
                            <div align="right">總計</div>
                        </td>
                        <td>
                            <div align="center">3000</div>
                        </td>
                        <td>
                            <div align="center">3000</div>
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <div align="center">1200&nbsp;&nbsp;(40%)</div>
                        </td>
                    </tr>
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

<script language="JavaScript">
    $mtu = "ad_single_list";

    var previousPoint = null;
    var months = ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"];
    $.fn.UseTooltip = function() {
        $(this).bind("plothover", function(event, pos, item) {
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;

                    $("#tooltip").remove();

                    var x = item.datapoint[0];
                    var y = item.datapoint[1];
                    //console.log(x+","+y)
                    showTooltip(item.pageX, item.pageY,
                        months[x - 1] + "<br/>" + "<strong>" + y + "</strong> (" + item.series.label + ")");
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });
    };



    function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css({
            position: 'absolute',
            display: 'none',
            top: y + 5,
            left: x + 20,
            border: '2px solid #4572A7',
            padding: '2px',
            size: '10',
            'border-radius': '6px 6px 6px 6px',
            'background-color': '#fff',
            opacity: 0.80
        }).appendTo("body").fadeIn(200);
    }

    var d = [
        [1, 18545],
        [2, 36899],
        [3, 28936],
        [4, 1545],
        [5, 168698],
        [6, 31400],
        [7, 40000],
        [8, 81184], , , ,
    ];
    var d2 = [
        [1, 0],
        [2, 0],
        [3, 0],
        [4, 0],
        [5, 0],
        [6, 0],
        [7, 0],
        [8, 0],
        [9, 0],
        [10, 0],
        [11, 0],
        [12, 0]
    ];
    var d3 = [
        [1, 0],
        [2, 0],
        [3, 0],
        [4, 0],
        [5, 0],
        [6, 0],
        [7, 0],
        [8, 0],
        [9, 0],
        [10, 0],
        [11, 0],
        [12, 0]
    ];
    var dataSet = [{
            label: "2021年業績",
            data: d,
            color: "#FF55A8"
        },
        {
            label: "2020年業績",
            data: d2,
            color: "#999999"
        },
        {
            label: "2019年業績",
            data: d3,
            color: "#0ea4fa"
        }
    ];

    $(function() {

        loadScript(plugin_path + "chart.flot/jquery.flot.min.js", function() {
            loadScript(plugin_path + "chart.flot/jquery.flot.resize.min.js", function() {
                loadScript(plugin_path + "chart.flot/jquery.flot.time.min.js", function() {
                    loadScript(plugin_path + "chart.flot/jquery.flot.fillbetween.min.js", function() {
                        loadScript(plugin_path + "chart.flot/jquery.flot.orderBars.min.js", function() {
                            loadScript(plugin_path + "chart.flot/jquery.flot.pie.min.js", function() {
                                loadScript(plugin_path + "chart.flot/jquery.flot.tooltip.min.js", function() {

                                    $.plot("#pieshow", dataSet, {
                                        xaxis: {
                                            ticks: [
                                                [1, "一月"],
                                                [2, "二月"],
                                                [3, "三月"],
                                                [4, "四月"],
                                                [5, "五月"],
                                                [6, "六月"],
                                                [7, "七月"],
                                                [8, "八月"],
                                                [9, "九月"],
                                                [10, "十月"],
                                                [11, "十一月"],
                                                [12, "十二月"]
                                            ]
                                        },
                                        yaxes: {
                                            axisLabelPadding: 3,
                                            tickFormatter: function(v, axis) {
                                                return $.formatNumber(v, {
                                                    format: "#,###",
                                                    locale: "nt"
                                                });
                                            }
                                        },
                                        grid: {
                                            hoverable: true,
                                            clickable: false,
                                            borderWidth: 1,
                                            borderColor: "#633200",
                                            backgroundColor: {
                                                colors: ["#ffffff", "#EDF5FF"]
                                            }
                                        }
                                    });
                                    $("#pieshow").UseTooltip();
                                });
                            });
                        });
                    });
                });
            });
        });


    });
</script>