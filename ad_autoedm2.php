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
            <li class="active">當月活動信更換</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>當月活動信更換</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td><a href="edm/action_edm/201714_162355_action_edm.html" target="_blank">201714_162355_action_edm.html</a></td>
                    </tr>
                </table>
                <p>
                <form id="picform" method="post" action="?st=add" onsubmit="return chk_form()" enctype="multipart/form-data">

                    <!--中央表格——灰表格結束-->
                    <!--中央表格——按鈕開始-->
                    <input type="file" name="photofile" id="photofile" placeholder="請選擇檔案">

                    <p><input type="submit" value="上傳"></p>

                </form>
                </p>
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

<script type="text/javascript">
    $(function() {
        $("#photofile").on("change", function() {
            var type = /(.htm|.html)$/i;
            if (!type.test($(this).val())) {
                alert("只能上傳 .htm, .html 為副檔名的檔案。");
                $(this).val("");
                return false;
            }
            return true;
        });
    });

    function chk_form() {
        if (!$("#photofile").val()) {
            alert("請選擇要上傳的檔案。");
            return false;
        }
        return true;
    }
</script>