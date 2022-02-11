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
            <li><a href="index.asp">管理系統</a></li>
            <li class="active">約會專家-會員登入紀錄-各會館統計</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>約會專家-會員登入紀錄-各會館統計</strong> <!-- panel title -->
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="ad_mem_login_log_list.asp" class="btn btn-info">會員登入紀錄</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="ad_mem_login_log_list_count_all.asp" class="btn btn-info">年度統計圖表</a>
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <p style="clear:both">
                    <form id="searchform" action="?vst=full&sear=1" method="post" target="_self" onsubmit="return chk_search_form()" style="margin:0px;">

                        登入時間：
                        <input type="text" class="datepicker" autocomplete="off" name="times1" value="2022/2/11">
                        ～
                        <input type="text" class="datepicker" autocomplete="off" name="times2" value="2022/2/11">
                        <input type="checkbox" name="ismem" value="1"> 僅會員
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>

                    </p>

                </div>
                <p>不重覆登入紀錄</p>
                <table class="table table-striped table-bordered bootstrap-datatable input_small">
                    <tr>
                        <td>台北</td>
                        <td>桃園</td>
                        <td>新竹</td>
                        <td>台中</td>
                        <td>台南</td>
                        <td>高雄</td>
                        <td>八德</td>
                        <td>約專</td>
                        <td>迷你約</td>
                        <td>總管理處</td>
                        <td>合計</td>
                    </tr>
                    <tr>
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
                    </tr>
                </table>
                <div>
                    <div id="pieshow" style="height:500px"></div>
                </div>
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
    $mtu = "ad_mem_login_log_list";
    var dataSet = [{
            label: "台北",
            data: 0,
            color: "#cc0033"
        },
        {
            label: "八德",
            data: 0,
            color: "#cc00ff"
        },
        {
            label: "新竹",
            data: 0,
            color: "#0000cc"
        },
        {
            label: "台中",
            data: 0,
            color: "#0099ff"
        },
        {
            label: "台南",
            data: 0,
            color: "#00cc33"
        },
        {
            label: "高雄",
            data: 0,
            color: "#cccc66"
        },
        {
            label: "桃園",
            data: 0,
            color: "#492D7A"
        },
        {
            label: "約專",
            data: 0,
            color: "#c2267d"
        },
        {
            label: "總管理處",
            data: 0,
            color: "#000000"
        }
    ];
    var options = {
        series: {
            pie: {
                show: true,
                label: {
                    show: true
                }
            }
        }
    };

    loadScript(plugin_path + "chart.flot/jquery.flot.min.js", function() {
        loadScript(plugin_path + "chart.flot/jquery.flot.resize.min.js", function() {
            loadScript(plugin_path + "chart.flot/jquery.flot.time.min.js", function() {
                loadScript(plugin_path + "chart.flot/jquery.flot.fillbetween.min.js", function() {
                    loadScript(plugin_path + "chart.flot/jquery.flot.orderBars.min.js", function() {
                        loadScript(plugin_path + "chart.flot/jquery.flot.pie.min.js", function() {
                            loadScript(plugin_path + "chart.flot/jquery.flot.tooltip.min.js", function() {

                                $.plot($("#pieshow"), dataSet, options);

                            });
                        });
                    });
                });
            });
        });
    });
</script>