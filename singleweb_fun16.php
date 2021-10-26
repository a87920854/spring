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
            <li class="active">主題活動管理</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>主題活動管理</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><input type="button" class="btn btn-info" value="新增主題活動" onclick="location.href='singleweb_fun16_add.php'"></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70"></th>
                            <th width=120>圖片</th>
                            <th>活動標題</th>
                            <th>活動說明</th>
                            <th>活動連結</th>
                            <th>操作</th>
                        </tr>

                        <tr>
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
                            <td>

                                <a href="singleparty_image/event_custom/2017829103329_event_custom_1000.jpg" class="fancybox"><img src="singleparty_image/event_custom/2017829103329_event_custom_1000.jpg" border=0 height=40></a>

                            </td>
                            <td>緣份倍增，幸福滿分</td>
                            <td>茫茫人海中，一起找尋愛情的緣份<br><br>在對的時間、對的地方<br><br>遇見對的你</td>
                            <td>https://www.singleparty.com.tw/doublelove.php</td>
                            <td>
                                <a href="singleweb_fun16_add.php?an=116">編輯</a>
                                <a title="刪除" href="singleweb_fun16.php?st=del&an=116">刪除</a>
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