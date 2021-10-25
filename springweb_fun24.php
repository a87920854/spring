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
            <li class="active">活動表下載</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>活動表下載</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70">會館</th>
                            <th>圖片</th>
                            <th>操作</th>
                        </tr>

                        <tr>
                            <td>台中</td>
                            <td>

                                <a href="upload_image/event_442.jpg" class="fancybox"><img src="upload_image/event_442.jpg" border=0 height=40></a>

                            </td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun24_add.php?an=442','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun24.php?st=del&an=442">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>台北</td>
                            <td>

                                <a href="upload_image/event_439.jpg" class="fancybox"><img src="upload_image/event_439.jpg" border=0 height=40></a>

                            </td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun24_add.php?an=439','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun24.php?st=del&an=439">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>台南</td>
                            <td>

                                <a href="upload_image/event_443.jpg" class="fancybox"><img src="upload_image/event_443.jpg" border=0 height=40></a>

                            </td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun24_add.php?an=443','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun24.php?st=del&an=443">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>桃園</td>
                            <td>

                                <a href="upload_image/event_440.jpg" class="fancybox"><img src="upload_image/event_440.jpg" border=0 height=40></a>

                            </td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun24_add.php?an=440','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun24.php?st=del&an=440">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>高雄</td>
                            <td>

                                <a href="upload_image/event_444.jpg" class="fancybox"><img src="upload_image/event_444.jpg" border=0 height=40></a>

                            </td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun24_add.php?an=444','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun24.php?st=del&an=444">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>新竹</td>
                            <td>

                                <a href="upload_image/event_441.jpg" class="fancybox"><img src="upload_image/event_441.jpg" border=0 height=40></a>

                            </td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun24_add.php?an=441','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun24.php?st=del&an=441">刪除</a>
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