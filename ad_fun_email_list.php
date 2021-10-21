<?php
require_once("_inc.php");
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
                        <td align="center">TEST</td>
                        <td align="center">男</td>
                        <td align="center">1977/12/7</td>
                        <td align="center">0926275129</td>
                        <td align="center">a87920854@gmail.com</td>
                        <td align="center">
                            <div class="btn-group">
                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="ad_fun_mem_detail.asp?mem_auto=14058" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                    <li><a href="javascript:Mars_popup('ad_fun_report.asp?k_id=14058&ty=member','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>

                                    <li><a href="javascript:Mars_popup('ad_fun_send_branch.asp?mem_auto=14058','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                    <li><a href="javascript:Mars_popup('ad_fun_mem_fix.asp?mem_auto=14058','','location=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>

                                    <li><a href="javascript:Mars_popup2('ad_fun_mem_del.asp?mem_auto=14058','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                </ul>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                            (<a href="javascript:Mars_popup('ad_fun_report.asp?k_id=14058&ty=member','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：</td>
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