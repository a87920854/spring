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
            <li>好好玩網站管理系統</li>
            <li class="active">部落格</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>部落格</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><a href="funweb_fun3_add.php" class="btn btn-info">新增文章</a></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td width=80><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=43&t_auto=45"><span class="fa fa-arrow-down"></span></a></td>
                        <td><a href="http://www.funtour.com.tw/blog/post.php?id=45" target="_blank">如何讓星座男愛妳愛上癮</a></td>
                        <td width="200"><a href="funweb_fun3_add.php?t=ed&a=45">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=45','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=41&t_auto=43"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=41&t_auto=43"><span class="fa fa-arrow-down"></span></a></td>
                        <td><a href="http://www.funtour.com.tw/blog/post.php?id=43" target="_blank">【海島主人篇】玩樂步履寫下-長灘物語</a></td>
                        <td width="200"><a href="funweb_fun3_add.php?t=ed&a=43">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=43','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
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