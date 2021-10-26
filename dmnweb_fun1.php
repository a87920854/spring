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
            <li class="active">自訂ABOUT</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>自訂ABOUT</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><a href="dmnweb_fun1_add.php" class="btn btn-info">新增一頁</a></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr><td><a href="" target="_blank">"&fname&"</a></td><td width="200"><a href="dmnweb_fun1_add.asp?t=ed&f=&fname&">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&fname=&fname&,\'\',width=300,height=200,top=30,left=30')">刪除</a></td></tr>
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