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
            <li class="active">關於春天-Banner-廣告一</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>關於春天-Banner-廣告一</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                    <input type="button" class="btn btn-info" value="新增 Banner" onclick="Mars_popup('springweb_fun14_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">
                    　<input type="button" class="btn btn-warning" value="廣告一" onclick="location.href='?ty=1'" disabled>
                    <input type="button" class="btn btn-danger" value="廣告二" onclick="location.href='?ty=2'">

                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70">廣告一</th>
                            <th>圖片</th>
                            <th>連結位置</th>
                            <th width="160">資料時間</th>
                            <th width=60>操作</th>
                        </tr>

                        <tr>
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=68&i1=1&v=1"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="upload_image/about_banner_1_68.jpg" class="fancybox"><img src="upload_image/about_banner_1_68.jpg" border=0 height=40></a></td>
                            <td>http://www.springclub.com.tw/lovepy.php?cc=aboutus</td>
                            <td>2015/5/18 上午 11:35:50</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun14_add.php?an=68&v=1','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun14.php?st=del&an=68&v=1">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=80&i1=1&v=1"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=80&i1=1&v=1"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="upload_image/about_banner_1_80.jpg" class="fancybox"><img src="upload_image/about_banner_1_80.jpg" border=0 height=40></a></td>
                            <td>http://www.springclub.com.tw/lovepy.php?cc=aboutus</td>
                            <td>2015/5/18 下午 06:08:53</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun14_add.php?an=80&v=1','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun14.php?st=del&an=80&v=1">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=82&i1=1&v=1"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="upload_image/about_banner_1_82.jpg" class="fancybox"><img src="upload_image/about_banner_1_82.jpg" border=0 height=40></a></td>
                            <td>https://www.springclub.com.tw/join.php?cc=aboutus</td>
                            <td>2015/5/20 下午 01:57:34</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun14_add.php?an=82&v=1','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun14.php?st=del&an=82&v=1">刪除</a>
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