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
            <li><a href="ad_action_note.asp">工作日誌</a></li>
            <li class="active">最新聯絡情形</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>工作日誌 - 最新聯絡情形 - 數量：0　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <p>
                        <a href="ad_action_note.asp" class="btn btn-danger">工作項目列表</a>
                        <a href="ad_action_note_new.asp" class="btn btn-warning">最新聯絡情形</a>

                    <form name="form1" method="post" action="?vst=full" class="form-inline" onsubmit="return chk_form()">
                        　聯絡時間：
                        <input type="text" name="d1" id="d1" class="datepicker" autocomplete="off"> 至 <input type="text" name="d2" id="d2" class="datepicker" autocomplete="off">
                        <select name="branch" id="branch" class="form-control">
                            <option value="">選擇會館</option>
                            <option value="台北">台北</option>
                            <option value="桃園">桃園</option>
                            <option value="新竹">新竹</option>
                            <option value="台中">台中</option>
                            <option value="台南">台南</option>
                            <option value="高雄">高雄</option>
                            <option value="八德">八德</option>
                            <option value="約專">約專</option>
                            <option value="迷你約">迷你約</option>
                            <option value="總管理處">總管理處</option>
                            <option value="好好玩旅行社">好好玩旅行社</option>
                        </select>
                        <select name="wtype" id="wtype" class="form-control">
                            <option value="">工作類型</option>
                            <option value="會館事務">會館事務</option>
                            <option value="會員服務">會員服務</option>
                            <option value="廠商開發">廠商開發</option>
                            <option value="舉辦活動">舉辦活動</option>
                            <option value="活動推廣">活動推廣</option>
                            <option value="其他">其他</option>
                        </select>
                        <input type="submit" name="Submit" class="btn btn-default" value="送出">
                    </form>
                    </p>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width=60>工作類型</th>
                            <th width=50>會館</th>
                            <th width=60>秘書</th>
                            <th>工作項目</th>
                            <th width=200>內容</th>
                            <th width=160>聯絡時間</th>
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
    $mtu = "ad_action_note.";
    $(function() {

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
</script>