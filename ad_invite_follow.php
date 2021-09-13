<?php
 require("./include/_top.php");
 require("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<style>
    .time_mark {
        background: #ccf9fd;
    }

    .keyword_mark {
        background: #ffdd99;
    }
</style>
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.asp">管理系統</a></li>
            <li class="active">約見未參追蹤表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>約見未參追蹤表 - 數量：0</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>

                    <a href="?me=0" class="btn btn-primary">開發</a>&nbsp;

                    <a href="?me=2" class="btn btn-primary">邀約</a>&nbsp;

                    <a href="?me=1" class="btn btn-primary">受理</a>

                </p>
                <p>
                <form action="#s" method="post" target="_self" class="form-inline nomargin nopadding">
                    <input type="text" class="form-control2" placeholder="姓名/手機" name="keyword" id="keyword" value="">&nbsp;
                    <input type="text" name="time1" id="time1" class="datepicker" autocomplete="off" value="" placeholder="約見時間開始"> 到 <input type="text" name="time2" id="time2" class="datepicker" autocomplete="off" value="" placeholder="約見時間結束">
                    <select class="form-control" name="types" id="types">
                        <option value="">持續跟進</option>
                        <option value="受理放棄">受理放棄</option>
                        <!--<option value="逾期放棄">逾期放棄</option>-->
                        <option value="已參加">追蹤後參</option>
                        <option value="邀約自追">邀約自追</option>
                    </select>
                    <select class="form-control" name="oby" id="oby">
                        <option value="">依約見時間排序 - 近到遠</option>
                        <option value="2">依約見時間排序 - 遠到近</option>
                        <option value="3">依最後追蹤回報時間排序 - 近到遠</option>
                        <option value="4">依最後追蹤回報時間排序 - 遠到近</option>
                    </select>

                    <input type="submit" value="搜尋" class="btn btn-default">
                    <!--<a href="#pr" onclick="printthis()" class="btn btn-danger">列印本頁</a>-->
                </form>
                </p>

                <table class="table table-bordered bootstrap-datatable">
                    <tbody>
                        <!--<th width="20"><input data-no-uniform="true" type="checkbox" id="selnums"></th>-->
                        <td width="200">時間</td>
                        <td width="80">姓名</td>
                        <td>基本資料</td>
                        <td width="260">
                        <td>狀態</td>
                        <td>來源</td>
                        <td>追蹤內容</td>
                        <td width="80"></td>
                        <tr>
                            <td colspan=10>無可追蹤資料。</td>
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
 require("./include/_bottom.php");
?>

<script language="JavaScript">
$mtu = "ad_invite.";
$(function() {

});	

function printthis() {
var $allnum = [];
$("input[name='nums']").each(function() {
	if($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
});
if($allnum.length <= 0) {
	alert("請勾選要列印的資料。");
	return false;
} else {		
	location.href = 'ad_invite_d_print.asp?nums='+$allnum+'';	
}
}

function openreportmodal($an) {
	$("#fixstat_modal").modal("show");
	$("#report_an").val($an);
	
}
</script>