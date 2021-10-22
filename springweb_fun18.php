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
            <li class="active">戀愛講堂-Banner & Tag-戀愛講堂 Banner</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>戀愛講堂-Banner & Tag-戀愛講堂 Banner</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><input type="button" class="btn btn-info" value="新增 Banner" onclick="Mars_popup('springweb_fun18_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">
                    <input type="button" class="btn btn-success" value="戀愛講堂 Banner" onclick="location.href='?ty=1'" disabled>　
                    <input type="button" class="btn btn-warning" value="廣告一" onclick="location.href='?ty=2'">
                    <input type="button" class="btn btn-danger" value="廣告二" onclick="location.href='?ty=3'">
                </p>
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
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="upload_image/lovesalon_banner_1_125.jpg" class="fancybox"><img src="upload_image/lovesalon_banner_1_125.jpg" border=0 height=40></a></td>
                            <td>http://www.springclub.com.tw/loveclass_list.php?tag=%AC%F9%B7|,%B7R%B1%A1</td>
                            <td>2015/11/30 上午 10:40:13</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun18_add.php?an=125&v=1','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun18.php?st=del&an=125&v=1">刪除</a>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
        <!--/span-->


        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>戀愛講堂-Tag</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>

                        <tr>
                            <td>約會,愛情</td>
                            <td>2015/11/27 下午 03:18:05</td>
                            <td>
                                <a title="刪除" href="springweb_fun18.php?st=deltag&an=123">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>熟男,熟女</td>
                            <td>2015/11/27 下午 03:17:58</td>
                            <td>
                                <a title="刪除" href="springweb_fun18.php?st=deltag&an=122">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>婚友,相親</td>
                            <td>2015/11/27 下午 03:17:54</td>
                            <td>
                                <a title="刪除" href="springweb_fun18.php?st=deltag&an=121">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>交友,聯誼</td>
                            <td>2015/11/27 下午 03:17:47</td>
                            <td>
                                <a title="刪除" href="springweb_fun18.php?st=deltag&an=120">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td colspan=3>
                                <form name="forms" id="f1" method="post" action="?st=addtag" onsubmit="return check_form();">熱門標籤TAG：<input type="text" name="tagv" id="tagv" class="form-control2"> <input type="submit" class="btn btn-default" value="新增"></form>
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