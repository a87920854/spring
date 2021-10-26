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
            <li class="active">首頁-小Banner</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>首頁-小Banner</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><input type="button" class="btn btn-info" value="新增 Banner" onclick="Mars_popup('dmnweb_fun6_add.phpindex.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');"></p>
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
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=571&i1=3"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="datemenow_image/upload/newindex_banner2_571.jpg" class="fancybox"><img src="datemenow_image/upload/newindex_banner2_571.jpg" border=0 height=40></a></td>
                            <td>https://www.datemenow.com.tw/</td>
                            <td>2021/1/11 上午 11:19:16</td>
                            <td>
                                <a href="javascript:Mars_popup('dmnweb_fun6_add.phpindex.php?an=571','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="dmnweb_fun6.phpindex.php?st=del&an=571">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=569&i1=2"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=569&i1=2"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="datemenow_image/upload/newindex_banner2_569.jpg" class="fancybox"><img src="datemenow_image/upload/newindex_banner2_569.jpg" border=0 height=40></a></td>
                            <td>https://www.datemenow.com.tw/200510/?cc=dmn_officialwebsite_homepage_Banner0713</td>
                            <td>2021/1/11 上午 11:13:01</td>
                            <td>
                                <a href="javascript:Mars_popup('dmnweb_fun6_add.phpindex.php?an=569','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="dmnweb_fun6.phpindex.php?st=del&an=569">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=200&i1=1"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="datemenow_image/upload/newindex_banner2_200.jpg" class="fancybox"><img src="datemenow_image/upload/newindex_banner2_200.jpg" border=0 height=40></a></td>
                            <td>landing.phpindex.php</td>
                            <td>2016/10/13 下午 01:13:58</td>
                            <td>
                                <a href="javascript:Mars_popup('dmnweb_fun6_add.phpindex.php?an=200','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="dmnweb_fun6.phpindex.php?st=del&an=200">刪除</a>
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