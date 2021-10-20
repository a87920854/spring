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
            <li><a href="ad_action_list.php">網站活動上傳</a></li>
            <li><a href="ad_action_list_sign.php?ac_auto=13415">活動異動單</a></li>
            <li class="active">新增異動單 - 2021-10-17 11:30&nbsp;週末桌遊電影約[13415]</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>新增異動單 - 2021-10-17 11:30&nbsp;台北&nbsp;週末桌遊電影約[13415]</strong> <!-- panel title -->
                </span>
            </div>


            <div class="panel-body">
                <form id="searchform" action="ad_action_list_sign_add.php" method="post" class="form-inline" target="_self">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td><label class="pull-left vcenter" style="height:34px;line-height:34px;">申請人：總管理處 - JACK</label></td>
                            </tr>
                            <tr>
                                <td><label class="pull-left vcenter" style="height:34px;line-height:34px;">類型：</label>
                                    <select name="types" id="types" onchange="location.href='?ac_auto=13415&t='+this.value+''" required>
                                        <option value="">請選擇</option>
                                        <!--<option value="活動新增">活動新增</option>
				        <option value="活動修改">活動修改</option>-->
                                        <option value="活動取消">活動取消</option>
                                        <option value="其他">其他</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>如有其他關於活動異動單的事項，請使用意見反映提出需新增的異動單事項。</div><input type="hidden" name="ac_auto" value="13415"><br>
                                    <font color=red>本項需督導/經理核准</font><input type="hidden" name="needbranch" value="1">
                                </td>
                            </tr>

                            <tr>
                                <td><input type="hidden" name="ac" value="13415"><input type="hidden" name="st" value="add"><input type="submit" value="送出申請" class="btn btn-success"></td>
                            </tr>
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