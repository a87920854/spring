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
            <li><a href="index.asp">管理系統</a></li>
            <li class="active">信箱對照</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>信箱對照</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <tr>
                        <form action="?st=send" method="post" name="form5">
                            <td class="text-center"><textarea name="emails" style="width:80%;height:100px;"></textarea>
                                <p><input type="submit" class="btn btn-info" style="width:50%;" value="查詢"></p>
                            </td>
                        </form>
                    </tr>
                </table>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <th></th>
                        <th>會館</th>
                        <th>秘書名</th>
                        <th>會員姓名</th>
                        <th>會員學歷</th>
                        <th>會員電話</th>
                    </tr>

                    <tr>
                        <td>0</td>
                        <td align="center">約專</td>
                        <td align="center">IVY</td>
                        <td align="center">楊琰琛</td>
                        <td align="center">大學</td>
                        <td align="center">'0926275129</td>

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