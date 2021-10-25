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
            <li class="active">戀愛講堂-文章分類</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>戀愛講堂-文章分類</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>

                        <tr>
                            <td>私話題</td>
                            <td>2017/5/9 上午 11:15:36</td>
                            <td>
                                <a title="刪除" href="singleweb_fun4.php?st=deltag&an=54">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>結婚</td>
                            <td>2017/5/9 上午 11:15:29</td>
                            <td>
                                <a title="刪除" href="singleweb_fun4.php?st=deltag&an=53">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>一言難盡</td>
                            <td>2017/5/9 上午 11:15:24</td>
                            <td>
                                <a title="刪除" href="singleweb_fun4.php?st=deltag&an=52">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>戀愛中</td>
                            <td>2017/5/9 上午 11:15:15</td>
                            <td>
                                <a title="刪除" href="singleweb_fun4.php?st=deltag&an=51">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>單身中</td>
                            <td>2017/5/9 上午 11:15:07</td>
                            <td>
                                <a title="刪除" href="singleweb_fun4.php?st=deltag&an=50">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td colspan=3>
                                <form name="forms" id="f1" method="post" action="?st=addtag" onsubmit="return check_form();">新增分類：<input type="text" name="tagv" id="tagv"> <input class="btn btn-default" style="margin-top:-8px" type="submit" value="新增"></form>
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