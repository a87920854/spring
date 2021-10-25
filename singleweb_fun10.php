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
            <li>約會專家系統</li>
            <li class="active">首頁-Banner 手機版</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>首頁-Banner 手機版</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><input type="button" class="btn btn-info" value="新增 Banner" onclick="Mars_popup('singleweb_fun10_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">
                    &nbsp;&nbsp;&nbsp;&nbsp;連結位置後方加入 #app_login 可開啟 app 登入頁,加入 #app_event 可開啟 app 活動頁,加入 #app_reg 可開啟 app 註冊頁</p>
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
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=2778&i1=4"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="singleparty_image/event/index_banner_mobile_2021481482866.jpg" class="fancybox"><img src="singleparty_image/event/index_banner_mobile_2021481482866.jpg" border=0 height=40></a></td>
                            <td>https://www.singleparty.com.tw/171030/</td>
                            <td></td>
                            <td>2021/4/8 下午 02:08:28</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun10_add.php?an=2778','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun10.php?st=del&an=2778">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=2779&i1=3"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=2779&i1=3"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="singleparty_image/event/index_banner_mobile_2021481483284.jpg" class="fancybox"><img src="singleparty_image/event/index_banner_mobile_2021481483284.jpg" border=0 height=40></a></td>
                            <td>https://www.singleparty.com.tw/ptest_question.php</td>
                            <td></td>
                            <td>2021/4/8 下午 02:08:32</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun10_add.php?an=2779','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun10.php?st=del&an=2779">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=2780&i1=2"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=2780&i1=2"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="singleparty_image/event/index_banner_mobile_2021481483864.jpg" class="fancybox"><img src="singleparty_image/event/index_banner_mobile_2021481483864.jpg" border=0 height=40></a></td>
                            <td>https://www.singleparty.com.tw/191025</td>
                            <td></td>
                            <td>2021/4/8 下午 02:08:38</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun10_add.php?an=2780','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun10.php?st=del&an=2780">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=2781&i1=1"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="singleparty_image/event/index_banner_mobile_2021481484345.jpg" class="fancybox"><img src="singleparty_image/event/index_banner_mobile_2021481484345.jpg" border=0 height=40></a></td>
                            <td>https://www.singleparty.com.tw/190620/</td>
                            <td></td>
                            <td>2021/4/8 下午 02:08:43</td>
                            <td>
                                <a href="javascript:Mars_popup('singleweb_fun10_add.php?an=2781','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="singleweb_fun10.php?st=del&an=2781">刪除</a>
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