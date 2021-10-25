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
            <li class="active">首頁-文字設定</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>首頁-文字設定</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form method="post" action="?st=txtsave">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>

                            <tr>
                                <td>首頁-上方Banner-文字</td>
                                <td>大字：<input type="text" name="txt1" id="txt1" value="30年以上交友配對經驗">
                                    <br>小字：<input type="text" name="txt2" id="txt2" value="逾100位顧問團隊，成就萬對幸福戀情">
                                </td>
                            </tr>
                            <tr>
                                <td>首頁-中間Banner-文字</td>
                                <td>大字：<input type="text" name="txt3" id="txt3" value="約會專家來了！">
                                    <br>小字：<input type="text" name="txt4" id="txt4" value="穿越不同交友平台，約到最適合的情人">
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2 style="text-align:center;"><input type="submit" value="送出" class="btn btn-info"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>

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