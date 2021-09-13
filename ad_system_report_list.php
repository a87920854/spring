<?php
require("./include/_top.php");
require("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.asp">管理系統</a></li>
            <li class="active">同仁意見反映</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>同仁意見反映　 - 數量：0</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                <form id="searchform" action="ad_system_report.asp" method="post" target="_self" class="form-inline">
                    <a class="btn btn-info" href="#system_report" data-toggle="modal" data-target="#system_report">提出意見</a>
                    <input id="keyword" name="keyword" id="keyword" class="form-control" type="text" placeholder="搜尋內容" value="">
                    <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                </form>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th width=80>類型</th>
                            <th width=100>會館</th>
                            <th width=80>秘書</th>
                            <th>內容</th>
                            <th width=120>時間</th>
                            <th width=60>狀態</th>
                            <th>處理結果</th>
                        </tr>
                        <tr>
                            <td colspan=8 height=200>目前沒有資料</td>
                        </tr>
                        </tbody>
                </table>
            </div>
        </div>
        <!--/span-->


        <!--/row-->
    </div>
</section>
<!-- /MIDDLE -->

<div class="modal fade" id="system_report">
    <div class="modal-dialog">
        <form action="ad_system_report_list.php?st=system_report" method="post" target="_self" class="form-inline nomargin" onsubmit="return chk_form_system_report()">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="send_branch_div_close1" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">同仁意見反映</h4>
                </div>
                <div class="modal-body">
                    <p>提升會館整體營運及服務品質，歡迎同仁提出寶貴意見。我們會認真參考並積極回覆。<small>(此意見反映內容不對外公開)</small></p>
                    <p><select name="system_report_types" id="system_report_types">
                            <option value="">請選擇意見類型</option>
                            <option value="系統">系統</option>
                            <option value="人事">人事</option>
                            <option value="行銷">行銷</option>
                            <option value="制度">制度</option>
                            <option value="服務">服務</option>
                            <option value="會務">會務</option>
                            <option value="其他">其他</option>
                        </select></p>
                    <p><textarea name="system_report_note" id="system_report_note" style="width:80%;height:120px;" autocomplete="off" placeholder="請輸入詳細的意見內容"></textarea></p>
                    <p><label class="checkbox"><input type="checkbox" name="noshow" id="noshow" value="1" autocomplete="off"><i></i>此意見及回覆均不需出現在列表中<small>(特殊或敏感問題適用)</small></label></p>
                </div>
                <div class="modal-footer" style="text-align:center">
                    <input type="hidden" name="url" value="/ad_system_report_list.asp">
                    <a href="#close" class="btn btn-success" data-dismiss="modal">關閉視窗</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" class="btn btn-primary" value="確定送出">
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="system_report2">
    <div class="modal-dialog">
        <form action="ad_system_report_list.asp?st=system_report2" method="post" target="_self" class="form-inline nomargin" onsubmit="return chk_form_system_report2()">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="send_branch_div_close1" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">補充意見</h4>
                </div>
                <div class="modal-body">
                    <p><textarea name="system_report_note2" id="system_report_note2" style="width:80%;height:120px;" autocomplete="off" placeholder="請輸入要補充的意見內容"></textarea></p>
                </div>
                <div class="modal-footer" style="text-align:center">
                    <input type="hidden" name="url2" value="/ad_system_report_list.asp">
                    <input type="hidden" name="system_report2_an" id="system_report2_an" value="">
                    <a href="#close" class="btn btn-success" data-dismiss="modal">關閉視窗</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" class="btn btn-primary" value="確定送出">
                </div>
            </div>
        </form>
    </div>
</div>

<?php
require("./include/_bottom.php");
?>

<script type="text/javascript">
    function chk_form_system_report() {
        if (!$("#system_report_types").val()) {
            alert("請選擇意見類型");
            return false;
        }

        if (!$("#system_report_note").val()) {
            alert("請輸入意見內容");
            return false;
        }
        return true;
    }

    function chk_form_system_report2() {
        if (!$("#system_report_note2").val()) {
            alert("請輸入意見內容");
            return false;
        }
        return true;
    }

    function system_report2_show($an) {
        $("#system_report2").modal("show");
        $("#system_report2_an").val($an);
    }
</script>