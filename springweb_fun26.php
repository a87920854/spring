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
            <li class="active">服務據點-環境照</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>服務據點-環境照-台北</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                    <a href="javascript:Mars_popup('springweb_fun26_add.php?b=台北','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');" class="btn btn-success">新增環境照</a>
                    <a href="?b=台北" class="btn btn-info">台北會館</a>
                    <a href="?b=桃園" class="btn btn-info">桃園會館</a>
                    <a href="?b=新竹" class="btn btn-info">新竹會館</a>
                    <a href="?b=台中" class="btn btn-info">台中會館</a>
                    <a href="?b=台南" class="btn btn-info">台南會館</a>
                    <a href="?b=高雄" class="btn btn-info">高雄會館</a>

                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70"></th>
                            <th>會館</th>
                            <th>圖片</th>
                            <th>ALT</th>
                            <th>操作</th>
                        </tr>

                        <tr>
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&b=台北&an=251&i1=14"><span class="fa fa-arrow-down"></span></a>14</td>
                            <td>台北</td>
                            <td>

                                <a href="upload_image/place_2020761624677.jpg" class="fancybox"><img src="upload_image/place_2020761624677.jpg" border=0 height=40></a>

                            </td>
                            <td>會員喜帖喜餅盒放置處</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun26_add.php?an=251','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun26.php?st=del&an=251&b=">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&b=台北&an=252&i1=14"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&b=台北&an=252&i1=14"><span class="fa fa-arrow-down"></span></a>14</td>
                            <td>台北</td>
                            <td>

                                <a href="upload_image/place_2020761625297.jpg" class="fancybox"><img src="upload_image/place_2020761625297.jpg" border=0 height=40></a>

                            </td>
                            <td>櫃台接待區</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun26_add.php?an=252','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun26.php?st=del&an=252&b=">刪除</a>
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