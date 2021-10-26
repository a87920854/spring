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
            <li>約會專家系統</li>
            <li class="active">操作說明</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>操作說明</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <form action="?st=save" method="post" target="_self" onsubmit="return chk_form()" class="form-inline">
                        <input type="hidden" name="t" value="">
                        <input type="hidden" name="an" value="">
                        <tr>
                            <td>問題：<input type="text" name="quest" id="quest" style="width:80%;" value="" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td>分類：<input type="text" name="types" id="types" style="width:80%;" value="" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td>答案：<textarea class="editor" name="ans" id="ans" style="width:80%;height:100px;"></textarea></td>
                        </tr>
                        <tr>
                            <td align="center"><input type="submit" value="送出" class="btn btn-info" style="width:50%"></td>
                        </tr>
                    </form>
                    </td>
                    </tr>
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
require_once("./include/_bottom.php");
?>

<script src="js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    $mtu = "singleweb_fun2.";
    $(function() {
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
            language: 'zh_TW',
            height: 200,
            force_br_newlines: true,
            force_p_newlines: false,
            forced_root_block: false
        });

    });

    function chk_form() {
        if (!$("#quest").val()) {
            alert("plz input question");
            $("#quest").focus();
            return false;
        }


        return true;
    }
</script>