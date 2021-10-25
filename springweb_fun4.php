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
            <li class="active">活動聯誼-Banner</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>活動聯誼-Banner</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><input type="button" class="btn btn-info" value="新增 Banner" onclick="Mars_popup('springweb_fun4_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');"></p>
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
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=1630&i1=24"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="upload_image/action_banner_1630.jpg" class="fancybox"><img src="upload_image/action_banner_1630.jpg" border=0 height=40></a></td>
                            <td>https://www.springclub.com.tw/event/13271?cc=springclub_officialwebsite_homepage</td>
                            <td>2021/10/12 下午 04:29:25</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun4_add.php?an=1630','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun4.php?st=del&an=1630">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=1629&i1=23"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=1629&i1=23"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="upload_image/action_banner_1629.jpg" class="fancybox"><img src="upload_image/action_banner_1629.jpg" border=0 height=40></a></td>
                            <td>https://www.springclub.com.tw/event/13203?cc=springclub_officialwebsite_homepage</td>
                            <td>2021/10/12 下午 04:27:52</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun4_add.php?an=1629','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun4.php?st=del&an=1629">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=1632&i1=22"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=1632&i1=22"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="upload_image/action_banner_1632.jpg" class="fancybox"><img src="upload_image/action_banner_1632.jpg" border=0 height=40></a></td>
                            <td>https://www.springclub.com.tw/event/13349?cc=springclub_officialwebsite_homepage</td>
                            <td>2021/10/12 下午 04:33:04</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun4_add.php?an=1632','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun4.php?st=del&an=1632">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=1631&i1=21"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=1631&i1=21"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="upload_image/action_banner_1631.jpg" class="fancybox"><img src="upload_image/action_banner_1631.jpg" border=0 height=40></a></td>
                            <td>https://www.springclub.com.tw/event/13362?cc=springclub_officialwebsite_homepage</td>
                            <td>2021/10/12 下午 04:31:32</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun4_add.php?an=1631','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun4.php?st=del&an=1631">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=559&i1=20"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="upload_image/action_banner_559.jpg" class="fancybox"><img src="upload_image/action_banner_559.jpg" border=0 height=40></a></td>
                            <td>https://www.springclub.com.tw/20200910/?cc=springclub_officialwebsite_homepage</td>
                            <td>2020/9/22 下午 01:19:46</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun4_add.php?an=559','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun4.php?st=del&an=559">刪除</a>
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