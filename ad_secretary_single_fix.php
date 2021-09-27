<?php
require("./include/_top.php");
require("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_secretary_single_fix.php">個人資料</a></li>
            <li class="active">修改個人資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>修改個人資料</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form name="form1" method="post" action="ad_secretary_single_fix.php?st=save" class="form-inline">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <thead>
                            <tr>
                                <td width="80">會館：總管理處
                                    　姓名： JACK
                                    　別名： JACK
                                </td>
                            </tr>
                            <tr>
                                <td>帳號：JACK0906
                                    　職務： 設計
                                    　等級：action
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    密碼： <input name="b_year" type="password" id="b_year" class="form-control"> (如無更改則無需輸入)
                                </td>
                            </tr>
                            <tr>
                                <td align="left">自我介紹：<textarea name="p_note" id="p_note" class="form-control" style="width:60%;height:140px;"></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div align="left">
                                        <input type="submit" name="Submit" value="確定修改" class="btn btn-info" style="width:50%;">
                                    </div>
                                </td>
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
require("./include/_bottom.php");
?>