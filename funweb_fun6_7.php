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
            <li><a href="funweb_fun6.php">首頁設置</a></li>
            <li class="active">飄浮選單-單身HOT行程</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>飄浮選單-單身HOT行程</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <form method="post" action="funweb_fun6_7.php?st=edit" onsubmit="return chk_form()">

                            <tr>
                                <td><input type="text" id="link" name="link" class="form-control" value="otravel.php?id=1939" placeholder="連結"></td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="儲存設定" class="btn btn-info"></td>
                            </tr>
                        </form>
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