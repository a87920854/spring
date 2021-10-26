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
            <li>DateMeNow網站系統</li>
            <li class="active">手機版-活動頁面-Banner</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>手機版-活動頁面-Banner</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><input type="button" class="btn btn-info" value="新增 Banner" onclick="Mars_popup('dmnweb_fun7_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');"></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70"></th>
                            <th>圖片</th>
                            <th>連結位置</th>
                            <th width="160">資料時間</th>
                            <th>操作</th>
                        </tr>

                        <tr>
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=204&i1=2"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="datemenow_image/upload/index_banner_mobile_204.jpg" class="fancybox"><img src="datemenow_image/upload/index_banner_mobile_204.jpg" border=0 height=40></a></td>
                            <td>campaign_index_m.php</td>
                            <td>2016/11/25 下午 01:29:07</td>
                            <td>
                                <a href="javascript:Mars_popup('dmnweb_fun7_add.php?an=204','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="dmnweb_fun7.php?st=del&an=204">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=203&i1=1"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="datemenow_image/upload/index_banner_mobile_203.jpg" class="fancybox"><img src="datemenow_image/upload/index_banner_mobile_203.jpg" border=0 height=40></a></td>
                            <td>tenfold_m.php</td>
                            <td>2016/11/25 下午 01:28:58</td>
                            <td>
                                <a href="javascript:Mars_popup('dmnweb_fun7_add.php?an=203','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="dmnweb_fun7.php?st=del&an=203">刪除</a>
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