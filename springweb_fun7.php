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
            <li class="active">APP 操作說明</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>APP 操作說明</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><a href="javascript:Mars_popup('springweb_fun7_add.php','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=250,top=150,left=150');" class="btn btn-info">新增說明</a>
                    <a href="springweb_fun7_form.php" class="btn btn-warning">其他問題</a>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td width=80><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=9&t_auto=11"><span class="fa fa-arrow-down"></span></a></td>
                        <td>為什麼選擇“春天會館”?</td>
                        <td width="200"><a href="javascript:Mars_popup('springweb_fun7_add.php?st=ed&a=11','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=250,top=150,left=150');">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=11','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=8&t_auto=10"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=8&t_auto=10"><span class="fa fa-arrow-down"></span></a></td>
                        <td>如何使用春天會館app交友功能?</td>
                        <td width="200"><a href="javascript:Mars_popup('springweb_fun7_add.php?st=ed&a=10','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=250,top=150,left=150');">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=10','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=7&t_auto=9"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=7&t_auto=9"><span class="fa fa-arrow-down"></span></a></td>
                        <td>速配名單是什麼?</td>
                        <td width="200"><a href="javascript:Mars_popup('springweb_fun7_add.php?st=ed&a=9','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=250,top=150,left=150');">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=9','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=6&t_auto=8"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=6&t_auto=8"><span class="fa fa-arrow-down"></span></a></td>
                        <td>如何送禮給心儀的他?</td>
                        <td width="200"><a href="javascript:Mars_popup('springweb_fun7_add.php?st=ed&a=8','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=250,top=150,left=150');">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=8','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=5&t_auto=7"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=5&t_auto=7"><span class="fa fa-arrow-down"></span></a></td>
                        <td>如何留言/寄信給心儀的他?</td>
                        <td width="200"><a href="javascript:Mars_popup('springweb_fun7_add.php?st=ed&a=7','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=250,top=150,left=150');">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=7','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=4&t_auto=6"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=4&t_auto=6"><span class="fa fa-arrow-down"></span></a></td>
                        <td>如何精準找尋心儀的他?</td>
                        <td width="200"><a href="javascript:Mars_popup('springweb_fun7_add.php?st=ed&a=6','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=250,top=150,left=150');">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=6','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=3&t_auto=5"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=3&t_auto=5"><span class="fa fa-arrow-down"></span></a></td>
                        <td>如何知道誰對我感興趣/我關注過誰?</td>
                        <td width="200"><a href="javascript:Mars_popup('springweb_fun7_add.php?st=ed&a=5','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=250,top=150,left=150');">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=5','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=80><a href="?st=up_line&ad=2&t_auto=4"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
                        <td>如何升級享更多功能和權益?</td>
                        <td width="200"><a href="javascript:Mars_popup('springweb_fun7_add.php?st=ed&a=4','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=250,top=150,left=150');">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=4','','width=300,height=200,top=30,left=30')">刪除</a></td>
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