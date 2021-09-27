<?php
require_once("./include/_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php")
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">好好玩信箱對照</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>好好玩信箱對照</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <form action="?st=send" method="post" name="form5" class="form-inline">
                                <td align="center"><textarea name="emails" style="width:80%;height:100px;" class="form-control"></textarea>
                                    <p><input type="submit" value="查詢" class="btn btn-info" style="width:50%;"></p>
                                </td>
                            </form>
                        </tr>
                </table>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <th>姓名</th>
                        <th>性別</th>
                        <th>生日</th>
                        <th>電話</th>
                        <th>email</th>
                        <th width=80></th>
                    </tr>
                    <tr>
                        <td colspan=6 height=200>目前沒有資料</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->


    <hr>
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>