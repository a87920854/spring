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
            <li class="active">DMN-電子報訂閱</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>DMN-電子報訂閱</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><a href="?s=0" class="btn btn-info">男</a> <a href="?s=1" class="btn btn-primary">女</a> <a href="?s=2" class="btn btn-danger">無</a> <a href="ad_emailpaper_list_dmn.php" class="btn btn-success">全部</a></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <th width=200>時間</th>
                        <th>性別</th>
                        <th>信箱</th>
                        <th width=200>管理</th>
                    </tr>
                    <tr>
                        <td>2021/5/4 下午 05:14:25</td>
                        <td></td>
                        <td>sample@email.tst</td>
                        <td><a href="javascript:Mars_popup2('?st=del&an=806','','width=300,height=200,top=100,left=100');">刪除</a></td>
                    </tr>
                    <tr>
                        <td>2021/5/3 下午 08:22:49</td>
                        <td></td>
                        <td>aaa0906866787@gmail.com</td>
                        <td><a href="javascript:Mars_popup2('?st=del&an=805','','width=300,height=200,top=100,left=100');">刪除</a></td>
                    </tr>
                    <tr>
                        <td>2021/4/13 上午 10:59:14</td>
                        <td></td>
                        <td>qq987741@gmail.com</td>
                        <td><a href="javascript:Mars_popup2('?st=del&an=804','','width=300,height=200,top=100,left=100');">刪除</a></td>
                    </tr>
                </table>

            </div>
            <div class="text-center">共 130 筆、第 1 頁／共 3 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_emailpaper_list_dmn.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_emailpaper_list_dmn.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_emailpaper_list_dmn.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_emailpaper_list_dmn.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_emailpaper_list_dmn.php?topage=3 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_emailpaper_list_dmn.php?topage=1" selected>1</option>
                            <option value="/ad_emailpaper_list_dmn.php?topage=2">2</option>
                            <option value="/ad_emailpaper_list_dmn.php?topage=3">3</option>
                        </select></li>
                </ul>
            </div>

        </div>
        <!--/span-->

    </div>
    <!--/row-->


    <hr>
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>