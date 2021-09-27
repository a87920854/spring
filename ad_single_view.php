<?php
require("./include/_top.php");
require("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">秘書履歷 - <%=p_other_name%></li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>秘書履歷 - <%=p_other_name%></strong> <!-- panel title -->
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
                            <h4><a href="ad_no_mem.php?s=nokaifa&u=<%=p_user%>"><%=nokaifa%> 位尚未開發</a></h4>
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
                        <td><%=years%> 年度業績</td>
                        <td>"&rs("m"&i)&"</td>

                        <td>累計：<%=totalmax%></td>
                    </tr>
                    <tr>
                        <td><%=years-1%> 年度業績</td>
                        <td>"&rs("m"&i)&"</td>

                        <td>累計：<%=totalmax2%></td>
                    </tr>
                    <tr>
                        <td><%=years-2%> 年度業績</td>
                        <td>"&rs("m"&i)&"</td>
                        <td>累計：</td>
                    </tr>
                </table>
                <div id="pieshow" style="height:300px"></div>
                <t <tr>
                    <td>未入會開發：<%=p1%>人、成功入會：<%=p2%>人、成交率：<%=p3%>%、平均月業績：<%=p4%>、平均年業績：<%=p5%></td>
                    </tr>
                    </table>
                    <br>
                    <p>業績明細</p>
                    <form name="form1" method="post" action="?<%=furl%>" style="margin:0px;">

                        <p>時間：
                            <select name="t1" id="t1" style="width:120px;">
                                <option value="">"&i&"</option>
                            </select>
                            <select name="t2" id="t2" style="width:120px;">
                                <option value="">"&i&"</option>
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
                                    <font color="#FF0000" size="2"><%=rs("pay_auto")%></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font size="2">
                                        <font color="#000066"><%=rs("ps_year")%>/<%=rs("ps_month")%>/<%=rs("ps_date")%></font>
                                    </font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">
                                        <font size="2">
                                            <font color="#000066"><%=rs("pay_branch")%></font>
                                        </font>
                                    </font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">
                                        <font size="2">
                                            <font color="#000066"><%=rs("pay_sec")%></font>
                                        </font>
                                    </font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">
                                        <font size="2">
                                            <font color="#000066"><%=rs("pay_name")%></font>
                                        </font>
                                    </font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">
                                        <font size="2">
                                            <font color="#000066"><%=sex%></font>
                                        </font>
                                    </font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">
                                        <font size="2">
                                            <font color="#000066"><%=rs("pay_detail")%>-<%=rs("pay_detail2")%></font>
                                        </font>
                                    </font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">
                                        <font size="2">
                                            <font color="#000066"><%=rs("pay_total")%></font>
                                        </font>
                                    </font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#000066">
                                        <font size="2">
                                            <font color="#000066"><%=rs("pay_total2")%></font>
                                        </font>
                                    </font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font color="#990066" size="2"><%=rs("ps_branch")%></font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font size="2">
                                        <font color="#000066"><%=rs("ps_sec")%></font>
                                    </font>
                                </div>
                            </td>
                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                <div align="center">
                                    <font size="2">
                                        <font color="#000066">

                                        </font>
                                    </font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=7>
                                <div align="" right"">總計</div>
                            </td>
                            <td>
                                <div align="" center"">"&allt1&"</div>
                            </td>
                            <td>
                                <div align="" center"">"&allt2&"</div>
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <div align="" center"">"
                                </div>
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
require("./include/_bottom.php");
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

    var d = [];
    var dataSet = [{
            label: "<%=years%>年業績",
            data: d,
            color: "#FF55A8"
        },
        {
            label: "<%=years-1%>年業績",
            data: d2,
            color: "#999999"
        },
        {
            label: "<%=years-2%>年業績",
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