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
            <li class="active">PC頁面TDK</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>PC頁面TDK</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><a href="javascript:Mars_popup('springweb_fun8_add.php','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=250,top=150,left=150');" class="btn btn-info">新增TDK</a>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td>witness_main.php</td>
                        <td>春天會館 - 囍事見證</td>
                        <td>來到春天會館對愛情的態度，是擁有幸福婚姻的秘密武器，從春天會館愛情的成功案例中學習態度，你會發現愛情其實很簡單，春天會館囍事見證一定可以成為你最好的情感範例。</td>
                        <td>囍事見證,春天會館,結婚,結婚好嗎,喜事見證,婚姻,喜事,愛情,幸福</td>
                        <td width="200"><a href="javascript:Mars_popup('springweb_fun8_add.php?st=ed&a=5','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=250,top=150,left=150');">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=5','','width=300,height=200,top=30,left=30')">刪除</a></td>
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