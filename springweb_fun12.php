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
            <li class="active">愛心公益</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>愛心公益</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><input type="button" class="btn btn-info" value="新增愛心公益" onclick="location.href='springweb_fun12_add.php?act=ad'"></p>
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
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=22&adc_auto=33"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2018/6/25</td>
                            <td>2018春天會館~持續做公益</td>
                            <!--<td></td>-->
                            <td>
                                <a href="springweb_fun12_add.php?act=up&id=33">編輯</a>
                                <a href="javascript:Mars_popup2('springweb_fun12.php?st=del&id=33','','width=300,height=200,top=100,left=100')">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=21&adc_auto=31"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=21&adc_auto=31"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2016/7/19</td>
                            <td>春天在這裡- 【愛心作伙來】</td>
                            <!--<td></td>-->
                            <td>
                                <a href="springweb_fun12_add.php?act=up&id=31">編輯</a>
                                <a href="javascript:Mars_popup2('springweb_fun12.php?st=del&id=31','','width=300,height=200,top=100,left=100')">刪除</a>
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