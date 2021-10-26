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
            <li><a href="ad_custom_complaint.php">客戶申訴</a></li>
            <li class="active">建立案件</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>客戶申訴 - 建立案件</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form id="searchform" action="ad_custom_complaint_add.php" method="post" class="form-inline" target="_self">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td>
                                    <font color=green>建檔：</font>總管理處 - JACK
                                    &nbsp;&nbsp;
                                    <font color=green>處理：</font><select name="fix_branch" id="fix_branch" required>
                                        <option value="">請選擇</option>
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
                                    </select> <select name="fix_single" id="fix_single" required>
                                        <option value="">請選擇</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    姓名：<input type="text" class="form-control" name="cname" id="cname" required>
                                    &nbsp;&nbsp;
                                    手機號碼：<input type="tel" id="cphone" name="cphone" class="form-control phone" pattern="^[09]{2}[0-9]{8}$" minlength="10" maxlength="10" title="請輸入 09 開頭的十位數手機號碼" required>
                                    &nbsp;&nbsp;
                                    電話：<input type="text" class="form-control" name="cphone2" id="cphone2">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    訴求內容：<small class="text-danger">(請謹慎填寫，建立案件後訴求內容無法修改)</small>
                                    <textarea style="width:100%;height:250px;" minlength=20 name="notes" required></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td><input type="hidden" name="st" value="add"><input type="submit" value="送出申請" class="btn btn-success"></td>
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
require_once("./include/_bottom.php")
?>

<script src="js/select2.min.js"></script>
<script language="JavaScript">
    <!--
    $mtu = "ad_guest.";
    $("#mem_branch").on("change", function() {
        personnel_get("mem_branch", "mem_single");
    });
    $("#fix_branch").on("change", function() {
        personnel_get("fix_branch", "fix_single");
    });
    -->
</script>