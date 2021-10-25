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
            <li class="active">首頁設置</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>首頁設置</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <td colspan=2 style="text-align:right"><input type="button" class="btn btn-default" value="飄浮選單-單身HOT行程" onclick="location.href='funweb_fun6_7.php'"></td>
                        </tr>
                        <tr>
                            <td colspan=2><input type="button" class="btn btn-default" value="選單設定-國外FUN旅遊/國外LOVE旅遊" onclick="location.href='funweb_fun1.php'"></td>
                        </tr>
                        <tr>
                            <td height=80><input type="button" class="btn btn-default" value="左上大圖BANNER" onclick="location.href='funweb_fun6_1.php'"></td>
                            <td><input type="button" class="btn btn-default" value="右上四格" onclick="location.href='funweb_fun6_2.php'"></td>
                        </tr>
                        <tr>
                            <td colspan=2><input type="button" class="btn btn-default" value="中段設定-7格圖文(全站通用)" onclick="location.href='funweb_fun6_3.php'"></td>
                        </tr>
                        <tr>
                            <td colspan=2 height=50><input type="button" class="btn btn-default" value="中段設定-好玩的在這" onclick="location.href='funweb_fun6_4.php'"></td>
                        </tr>
                        <tr>
                            <td height=100><input type="button" class="btn btn-default" value="左下圖文格" onclick="location.href='funweb_fun6_5.php'"></td>
                            <td><input type="button" class="btn btn-default" value="右下連結(全站通用)" onclick="location.href='funweb_fun6_6.php'"></td>
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