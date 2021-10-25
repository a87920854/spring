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
            <li>春天網站系統</li>
            <li><a href="springweb_fun16.php">會員通知訊息</a></li>
            <li class="active">新增/修改通知訊息</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>新增/修改通知訊息</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form name="mform" method="post" action="springweb_fun16_add.php" onSubmit="return chkform()">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td width="150" align="left" valign="middle">分類</td>
                                <td><select name="types" id="types">
                                        <option value="重要通知">重要通知</option>
                                        <option value="活動通知">活動通知</option>
                                    </select></td>
                            </tr>
                            <tr id="ac_auto_tr" style="display:none">
                                <td align="left" valign="middle">活動編號</td>
                                <td><input name="ac_auto" id="ac_auto" value=""></td>
                            </tr>
                            <tr>
                                <td width="150" align="left" valign="middle">標題</td>
                                <td>
                                    <span id="title_use" style="display:none;padding-right:30px;"><input data-no-uniform="true" type="checkbox" name="title_old" id="title_old" value="1" checked> 使用活動標題</span>
                                    <input name="title" id="title" value="">
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="middle">建立時間</td>
                                <td>2021/10/22 下午 05:26:56</td>
                            </tr>
                            <tr id="notes_tr">
                                <td align="left" valign="middle">內文</td>
                                <td><textarea name="notes" id="notes" class="editor" style="width:80%;height:350px;"></textarea></td>
                            </tr>
                            <tr>
                                <td colspan=2 align="center"><input name="acts" id="acts" type="hidden" value="ad"><input name="pid" type="hidden" id="pid" value="">
                                    <input type="submit" value="確認送出" class="btn btn-info" style="width:50%">
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
require_once("./include/_bottom.php");
?>

<script src="js/tinymce/tinymce.min.js"></script>
<script language="JavaScript">
    $mtu = "springweb_fun16.";

    function chkform() {
        if ($("#ac_auto").is(":visible") && !$("#ac_auto").val()) {
            alert("請輸入活動編號。");
            $("#ac_auto").focus();
            return false;
        }
        if ($("#ac_auto").is(":visible") && !$.isNumeric($("#ac_auto").val())) {
            alert("活動編號只能是數字。");
            $("#ac_auto").val("");
            $("#ac_auto").focus();
            return false;
        }
        if ($("#title").is(":visible") && !$("#title").val()) {
            alert("請輸入標題。");
            $("#title").focus();
            return false;
        }
        return true;
    }
    $(function() {

        $("#types").on("change", function() {
            if ($(this).val() == "活動通知") {
                $("#title_old").prop("checked", true);
                $("#title").hide();
                $("#title_use").show();
                $("#ac_auto_tr").show();
                $("#notes_tr").hide();
            } else {
                $("#title").show();
                $("#title_use").hide();
                $("#title").attr("placeholder", "");
                $("#title").val("");
                $("#ac_auto_tr").hide();
                $("#notes_tr").show();
            }
        });
        $("#title_old").on("click", function() {
            if ($(this).prop("checked")) {
                $("#title").val("");
                $("#title").hide();
                $("#title_use").show();
            } else {
                $("#title").show();
                $("#title").attr("placeholder", "請輸入自訂標題");
            }
        });

    });
    tinymce.init({
        selector: ".editor",
        plugins: [
            "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
        ],

        toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | fontsizeselect forecolor backcolor | code preview",
        toolbar2: "cut copy paste | searchreplace | bullist numlist | undo redo | link unlink image media | inserttime | table",

        menubar: false,
        toolbar_items_size: 'small',
        language: 'zh_TW',
        height: 600
    });
</script>