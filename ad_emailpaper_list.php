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
            <li class="active">春天-電子報訂閱</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>春天-電子報訂閱</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><a href="?s=0" class="btn btn-info">男</a> <a href="?s=1" class="btn btn-primary">女</a> <a href="?s=2" class="btn btn-danger">無</a> <a href="ad_emailpaper_list.php" class="btn btn-success">全部</a></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <th width=200>時間</th>
                        <th>性別</th>
                        <th>信箱</th>
                        <th width=200>管理</th>
                    </tr>
                    <tr>
                        <td>2021/10/16 上午 10:50:43</td>
                        <td></td>
                        <td>0901125867@gmail.com8</td>
                        <td><a href="javascript:Mars_popup2('?st=del&an=2611','','width=300,height=200,top=100,left=100');">刪除</a></td>
                    </tr>
                    <tr>
                        <td>2021/10/14 下午 05:01:51</td>
                        <td></td>
                        <td>0901125867@gmail.com</td>
                        <td><a href="javascript:Mars_popup2('?st=del&an=2610','','width=300,height=200,top=100,left=100');">刪除</a></td>
                    </tr>
                </table>

            </div>
            <div class="text-center">共 533 筆、第 1 頁／共 11 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_emailpaper_list.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_emailpaper_list.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_emailpaper_list.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_emailpaper_list.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_emailpaper_list.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_emailpaper_list.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_emailpaper_list.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_emailpaper_list.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_emailpaper_list.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_emailpaper_list.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_emailpaper_list.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_emailpaper_list.php?topage=11 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_emailpaper_list.php?topage=1" selected>1</option>
                            <option value="/ad_emailpaper_list.php?topage=2">2</option>
                            <option value="/ad_emailpaper_list.php?topage=3">3</option>
                            <option value="/ad_emailpaper_list.php?topage=4">4</option>
                            <option value="/ad_emailpaper_list.php?topage=5">5</option>
                            <option value="/ad_emailpaper_list.php?topage=6">6</option>
                            <option value="/ad_emailpaper_list.php?topage=7">7</option>
                            <option value="/ad_emailpaper_list.php?topage=8">8</option>
                            <option value="/ad_emailpaper_list.php?topage=9">9</option>
                            <option value="/ad_emailpaper_list.php?topage=10">10</option>
                            <option value="/ad_emailpaper_list.php?topage=11">11</option>
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