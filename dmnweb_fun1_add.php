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
            <li>DateMeNow網站系統</li>
            <li class="active">新增ABOUT</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>新增ABOUT</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <form id="mform" name="mform" method="post" action="?st=save" class="form-inline">
                    <div class="content">
                        <p>Title: <input name="title" id="title" style="width:80%;" value="" class="form-control" required></p>
                        <p>description: <input name="description" id="description" style="width:80%;" value="" class="form-control"></p>
                        <p>keywords: <input name="keywords" id="keywords" style="width:80%;" value="" class="form-control"></p>
                        <textarea name="notes" class="editor"></textarea>
                        <input type="hidden" name="t" value="">
                        <input type="hidden" name="fname" value="">
                        <p><input type="submit" value="送出" class="btn btn-info" style="width:50%"></p>
                    </div>
                </form>
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

<script src="js/tinymce/tinymce.min.js"></script>

<script language="JavaScript">
    $mtu = "dmnweb_fun1.";
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
        height: 600
    });
</script>