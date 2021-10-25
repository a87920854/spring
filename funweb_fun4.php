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
            <li class="active">頁面TDK</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>頁面TDK</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><a class="btn btn-info" href="javascript:Mars_popup('funweb_fun4_add.php','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=250,top=150,left=150');">新增TDK</a>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td>earlybird.php</td>
                        <td>單身Hot行程 | 好好玩旅行社-單身國內外旅遊團首選</td>
                        <td>好好玩旅行社國外單身旅行交友 Super Hot 旅遊行程</td>
                        <td>旅行,行程,travel,景點,單身旅遊,出國,旅行社,旅遊網,旅館,機票,交友,戀愛,約會,愛情,單身</td>
                        <td width="200"><a href="javascript:Mars_popup('funweb_fun4_add.php?st=ed&a=3','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=250,top=150,left=150');">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=3','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td>210725/index.php</td>
                        <td>Online聯誼交友趣!-好好玩單身聯誼</td>
                        <td>在輕鬆愉快的氛圍下認識心儀對象❤️每月近百場好玩有趣的線上聯誼，全台無論北部、中部、南部交友活動免費開放，不怕你來，只怕你不High!</td>
                        <td>線上交友,聯誼,約會,聯誼活動,視訊交友</td>
                        <td width="200"><a href="javascript:Mars_popup('funweb_fun4_add.php?st=ed&a=19','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=250,top=150,left=150');">修改</a>　<a href="javascript:;" onClick="Mars_popup2('?st=del&a=19','','width=300,height=200,top=30,left=30')">刪除</a></td>
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