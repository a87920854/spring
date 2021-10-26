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
            <li class="active">活動頁面-Banner</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>活動頁面-Banner</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><input type="button" class="btn btn-info" value="新增 Banner" onclick="Mars_popup('dmnweb_fun3_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');"></p>
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
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=1626&i1=4"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="datemenow_image/upload/index_banner_1626.jpg" class="fancybox"><img src="datemenow_image/upload/index_banner_1626.jpg" border=0 height=40></a></td>
                            <td>https://www.datemenow.com.tw/campaign/13161</td>
                            <td>2021/9/22 下午 03:59:53</td>
                            <td>
                                <a href="javascript:Mars_popup('dmnweb_fun3_add.php?an=1626','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="dmnweb_fun3.php?st=del&an=1626">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=1628&i1=3"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=1628&i1=3"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="datemenow_image/upload/index_banner_1628.jpg" class="fancybox"><img src="datemenow_image/upload/index_banner_1628.jpg" border=0 height=40></a></td>
                            <td>https://www.datemenow.com.tw/campaign/13296</td>
                            <td>2021/10/14 下午 05:41:05</td>
                            <td>
                                <a href="javascript:Mars_popup('dmnweb_fun3_add.php?an=1628','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="dmnweb_fun3.php?st=del&an=1628">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=1629&i1=2"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=1629&i1=2"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="datemenow_image/upload/index_banner_1629.jpg" class="fancybox"><img src="datemenow_image/upload/index_banner_1629.jpg" border=0 height=40></a></td>
                            <td>https://www.datemenow.com.tw/campaign/13163</td>
                            <td>2021/10/14 下午 05:41:35</td>
                            <td>
                                <a href="javascript:Mars_popup('dmnweb_fun3_add.php?an=1629','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="dmnweb_fun3.php?st=del&an=1629">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=1630&i1=1"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="datemenow_image/upload/index_banner_1630.jpg" class="fancybox"><img src="datemenow_image/upload/index_banner_1630.jpg" border=0 height=40></a></td>
                            <td>https://www.datemenow.com.tw/campaign/13364</td>
                            <td>2021/10/14 下午 05:42:08</td>
                            <td>
                                <a href="javascript:Mars_popup('dmnweb_fun3_add.php?an=1630','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="dmnweb_fun3.php?st=del&an=1630">刪除</a>
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