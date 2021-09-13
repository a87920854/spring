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
            <li class="active">工作日誌</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>工作日誌 - 工作項目列表 - 數量：0　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <p>
                        <a href="javascript:Mars_popup('ad_action_note_add.php','','width=710,height=400,top=200,left=200')" class="btn btn-success">新增工作日誌</a>
                        <a href="ad_action_note.asp" class="btn btn-danger">工作項目列表</a>
                        <a href="ad_action_note_new.php" class="btn btn-warning">最新聯絡情形</a>

                    <form name="form1" method="post" action="?vst=full" class="form-inline" onsubmit="return chk_form()">

                        <select name="wtype" id="wtype" class="form-control">
                            <option value="">工作類型</option>
                            <option value="會館事務">會館事務</option>
                            <option value="會員服務">會員服務</option>
                            <option value="廠商開發">廠商開發</option>
                            <option value="舉辦活動">舉辦活動</option>
                            <option value="活動推廣">活動推廣</option>
                            <option value="其他">其他</option>
                        </select>
                        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="請輸入要搜尋的工作項目或廠商">

                        <input type="submit" name="Submit" class="btn btn-default" value="送出">
                    </form>
                    </p>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width=60>工作類型</th>
                            <th width=50>日期</th>
                            <th width=50>會館</th>
                            <th width=80>秘書</th>
                            <th>工作項目</th>
                            <th width=100>今日回報</th>
                            <th width=200>聯絡情形</th>
                            <th width=160>最後聯絡</th>
                            <th width="100">　</th>
                        </tr>
                        <tr>
                            <td colspan=8 height=200>目前沒有資料</td>
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

<script type="text/javascript">
    $(function() {

        $("#branch").on("change", function() {
            personnel_get("branch", "single");
        });

        function chk_form() {
            if ($("d1").val() || $("d2").val()) {
                if (!$("d1").val() || !$("d2").val()) {
                    alert("請選擇起始日期和結束日期。");
                    return false;
                }
            }
            return true;
        }
    })
</script>