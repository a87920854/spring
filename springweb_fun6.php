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
                <p><a href="springweb_fun6_add.php" class="btn btn-info">新增文章</a></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td width=80><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=56&t_auto=62"><span class="fa fa-arrow-down"></span></a></td>
                        <td><a href="http://www.springclub.com.tw/blog/post.php?id=62" target="_blank">今年對自己好點 給自己一份禮物</a></td>
                        <td width="200"><a href="springweb_fun6_add.php?t=ed&a=62">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=62','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=55&t_auto=61"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=55&t_auto=61"><span class="fa fa-arrow-down"></span></a></td>
                        <td><a href="http://www.springclub.com.tw/blog/post.php?id=61" target="_blank">【春天會館 囍事見證】體貼溫柔成就情緣</a></td>
                        <td width="200"><a href="springweb_fun6_add.php?t=ed&a=61">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=61','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=54&t_auto=60"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=54&t_auto=60"><span class="fa fa-arrow-down"></span></a></td>
                        <td><a href="http://www.springclub.com.tw/blog/post.php?id=60" target="_blank">春天會館 讓距離愈靠愈近，現在就出門吧</a></td>
                        <td width="200"><a href="springweb_fun6_add.php?t=ed&a=60">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=60','','width=300,height=200,top=30,left=30')">刪除</a></td>
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
require_once("./include/_bottom.php");
?>