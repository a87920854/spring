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
            <li class="active">首頁-Banner</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>首頁-Banner</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><input type="button" class="btn btn-info" value="新增 Banner" onclick="Mars_popup('dmnweb_fun5_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');"></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70"></th>
                            <th>圖片</th>
                            <th>連結位置</th>
                            <th>ALT</th>
                            <th width="160">資料時間</th>
                            <th>操作</th>
                        </tr>

                        <tr>
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=576&i1=4"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="datemenow_image/upload/newindex_banner_202111111214897.jpg" class="fancybox"><img src="datemenow_image/upload/newindex_banner_202111111214897.jpg" border=0 height=40></a></td>
                            <td>https://www.datemenow.com.tw/200510/?cc=dmn_officialwebsite_homepage_Banner20210111</td>
                            <td>DateMeNow跟我約會吧,穩定交往的秘訣</td>
                            <td>2021/1/11 上午 11:21:48</td>
                            <td>
                                <a href="javascript:Mars_popup('dmnweb_fun5_add.php?an=576','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="dmnweb_fun5.php?st=del&an=576">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=578&i1=3"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=578&i1=3"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="datemenow_image/upload/newindex_banner_20211111124316.jpg" class="fancybox"><img src="datemenow_image/upload/newindex_banner_20211111124316.jpg" border=0 height=40></a></td>
                            <td>https://www.datemenow.com.tw/180610/?cc=officialwebsite_homepage_Banner20210111</td>
                            <td>DateMeNow跟我約會吧,戀愛分析量表</td>
                            <td>2021/1/11 上午 11:25:17</td>
                            <td>
                                <a href="javascript:Mars_popup('dmnweb_fun5_add.php?an=578','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="dmnweb_fun5.php?st=del&an=578">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=577&i1=2"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=577&i1=2"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="datemenow_image/upload/newindex_banner_20211111123312.jpg" class="fancybox"><img src="datemenow_image/upload/newindex_banner_20211111123312.jpg" border=0 height=40></a></td>
                            <td>https://www.datemenow.com.tw/</td>
                            <td>DateMeNow跟我約會吧</td>
                            <td>2021/1/11 上午 11:24:11</td>
                            <td>
                                <a href="javascript:Mars_popup('dmnweb_fun5_add.php?an=577','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="dmnweb_fun5.php?st=del&an=577">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=575&i1=1"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="datemenow_image/upload/newindex_banner_202111111204520.jpg" class="fancybox"><img src="datemenow_image/upload/newindex_banner_202111111204520.jpg" border=0 height=40></a></td>
                            <td>https://www.datemenow.com.tw/</td>
                            <td>DateMeNow跟我約會吧</td>
                            <td>2021/1/11 上午 11:20:45</td>
                            <td>
                                <a href="javascript:Mars_popup('dmnweb_fun5_add.php?an=575','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="dmnweb_fun5.php?st=del&an=575">刪除</a>
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