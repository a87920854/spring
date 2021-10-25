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
            <li>春天網站系統</li>
            <li class="active">企業內訓</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>企業內訓</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><input type="button" class="btn btn-info" value="新增企業內訓" onclick="location.href='springweb_fun13_add.php?act=ad'"></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70"></th>
                            <th>日期</th>
                            <th>標題</th>
                            <!--<th width="30">精選</th>-->
                            <th>操作</th>
                        </tr>

                        <tr>
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=13&adc_auto=15"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2018/7/17</td>
                            <td>2018年07月春天會館提升服務品質研討會</td>
                            <!--<td></td>-->
                            <td>
                                <a href="springweb_fun13_add.php?act=up&id=15">編輯</a>
                                <a href="javascript:Mars_popup2('springweb_fun13.php?st=del&id=15','','width=300,height=200,top=100,left=100')">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=12&adc_auto=13"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=12&adc_auto=13"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2017/9/20</td>
                            <td>2017年春天會館提升服務品質研討會2</td>
                            <!--<td></td>-->
                            <td>
                                <a href="springweb_fun13_add.php?act=up&id=13">編輯</a>
                                <a href="javascript:Mars_popup2('springweb_fun13.php?st=del&id=13','','width=300,height=200,top=100,left=100')">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=11&adc_auto=12"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=11&adc_auto=12"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2017/6/27</td>
                            <td>2017年春天會館提升服務品質研討會</td>
                            <!--<td></td>-->
                            <td>
                                <a href="springweb_fun13_add.php?act=up&id=12">編輯</a>
                                <a href="javascript:Mars_popup2('springweb_fun13.php?st=del&id=12','','width=300,height=200,top=100,left=100')">刪除</a>
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
require_once("./include/_bottom.php");
?>