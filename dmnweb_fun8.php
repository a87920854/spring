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
            <li class="active">手機版-首頁-Banner</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>手機版-首頁-Banner</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><input type="button" class="btn btn-info" value="新增 Banner" onclick="Mars_popup('dmnweb_fun8_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');"></p>
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
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=582&i1=21"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="datemenow_image/upload/newindex_banner_mobile_20211111158049.jpg" class="fancybox"><img src="datemenow_image/upload/newindex_banner_mobile_20211111158049.jpg" border=0 height=40></a></td>
                            <td>https://www.datemenow.com.tw?cc=mobile_homepage_Banner210111</td>
                            <td>DateMeNow跟我約會吧</td>
                            <td>2021/1/11 上午 11:58:00</td>
                            <td>
                                <a href="javascript:Mars_popup('dmnweb_fun8_add.php?an=582','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="dmnweb_fun8.php?st=del&an=582">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=581&i1=20"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=581&i1=20"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="datemenow_image/upload/newindex_banner_mobile_202111111572556.jpg" class="fancybox"><img src="datemenow_image/upload/newindex_banner_mobile_202111111572556.jpg" border=0 height=40></a></td>
                            <td>https://www.datemenow.com.tw/181001/?cc=dmn_mobile_homepage_Banner210111</td>
                            <td>DateMeNow跟我約會吧,與愛神同行</td>
                            <td>2021/1/11 上午 11:57:25</td>
                            <td>
                                <a href="javascript:Mars_popup('dmnweb_fun8_add.php?an=581','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="dmnweb_fun8.php?st=del&an=581">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=579&i1=19"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=579&i1=19"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="datemenow_image/upload/newindex_banner_mobile_202111111562747.jpg" class="fancybox"><img src="datemenow_image/upload/newindex_banner_mobile_202111111562747.jpg" border=0 height=40></a></td>
                            <td>http://m.datemenow.com.tw/search_m.php</td>
                            <td>DateMeNow跟我約會吧</td>
                            <td>2021/1/11 上午 11:56:28</td>
                            <td>
                                <a href="javascript:Mars_popup('dmnweb_fun8_add.php?an=579','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="dmnweb_fun8.php?st=del&an=579">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=580&i1=18"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="datemenow_image/upload/newindex_banner_mobile_202111111565456.jpg" class="fancybox"><img src="datemenow_image/upload/newindex_banner_mobile_202111111565456.jpg" border=0 height=40></a></td>
                            <td>https://www.datemenow.com.tw/180610/?cc=mobile_homepage_Banner210111</td>
                            <td>DateMeNow跟我約會吧,戀愛分析量表</td>
                            <td>2021/1/11 上午 11:56:54</td>
                            <td>
                                <a href="javascript:Mars_popup('dmnweb_fun8_add.php?an=580','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="dmnweb_fun8.php?st=del&an=580">刪除</a>
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