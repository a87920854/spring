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
            <li><a href="springweb_fun6.php">部落格</a></li>
            <li class="active">新增文章</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>新增文章</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form id="mform" name="mform" method="post" action="?st=save" class="form-inline" onsubmit="return chk_form()">
                    <div class="box-content">
                        <p>標題(title)：<input type="text" name="title" id="title" style="width:50%" value="" class="form-control" required></p>
                        <p>描述(description)：<input type="text" name="description" id="description" style="width:80%" class="form-control" value=""></p>
                        <p>關鍵字(keyword)：<input type="text" name="keyword" id="keyword" style="width:80%" class="form-control" value=""></p>
                        <p>社群連結(links)：<textarea name="links" class="editor2"></textarea></p>
                        <hr>
                        <textarea name="notes" class="editor"></textarea>

                        <input type="hidden" name="t" value="">
                        <input type="hidden" name="an" value="">
                        <p><input type="submit" value="送出" class="btn btn-info" style="width:50%;"></p>
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
require_once("./include/_bottom.php");
?>

<script type="text/javascript" src="assets/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.fileupload.js"></script>
<script src="js/tinymce/tinymce.min.js"></script>
<script language="JavaScript">
    $mtu = "springweb_fun5.";

    function del_pic(p) {
        $.ajax({
            url: 'springweb_fun6_add.php',
            data: {
                st: "delpic",
                id: '',
                p: p
            },
            error: function(xhr) {
                alert('Ajax request 發生錯誤1');
            },
            success: function(response) {
                reload_upload("reload_showtopdiv");
            }
        });
    }

    function reload_upload(dd) {
        var $sdiv = $("#" + dd);
        if (!$sdiv.length) return false;
        $.ajax({
            url: 'springweb_fun6_add.php',
            data: {
                st: "reload_div",
                id: ''
            },
            error: function(xhr) {
                alert('Ajax request 發生錯誤1');
            },
            success: function(response) {
                $sdiv.html(response);
            }
        });
    }
    $(function() {

        reload_upload("reload_showtopdiv");

        var $file_uploads2 = $("#file_uploads2"),
            $thisid = $file_uploads2.attr("id"),
            $progress2 = $file_uploads2.closest("div").find(".progress");
        var $imgs = $file_uploads2.closest("span").find("#cimg").val();

        $file_uploads2.fileupload({
                url: "springweb_fun6_add.php?st=upload&id=",
                type: "POST",
                dropZone: $file_uploads2,
                dataType: 'html',
                autoUpload: true,
                done: function(e, data) {

                    if (data.result) {
                        $progress2.find(".progress-bar").css("width", "0").parent().hide();
                        reload_upload("reload_showtopdiv");
                    }
                },
                fail: function(e, data) {

                },
                progressall: function(e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $progress2.show().find(".progress-bar").css(
                        'width',
                        progress + '%'
                    );
                },
                add: function(e, data) {
                    var uploadErrors = [];
                    var acceptFileTypes = /^image\/(gif|jpe?g|png)$/i;
                    if (data.originalFiles[0]['type'].length && !acceptFileTypes.test(data.originalFiles[0]['type'])) {
                        uploadErrors.push('目前僅開放上傳 gif, jpg, jpeg, png 檔案。');
                    }
                    if (data.originalFiles[0]['size'] > 5000000) {
                        uploadErrors.push('檔案大小超過限制。');
                    }
                    if (uploadErrors.length > 0) {
                        alert(uploadErrors.join("\n"));
                    }
                    data.submit();
                }
            }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });

    function chk_form() {

    }
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
    tinymce.init({
        selector: ".editor2",
        plugins: [
            "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
        ],

        toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | fontsizeselect forecolor backcolor | code preview",
        toolbar2: "cut copy paste | searchreplace | bullist numlist | undo redo | link unlink image media | inserttime | table",

        menubar: false,
        language: 'zh_TW',
        width: '70%',
        height: 10
    });
</script>