<?php
require("./include/_top.php");
require("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<link rel="stylesheet" href="css/jquery.fileupload.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li>約會專家系統</li>
            <li>戀愛學院-豪華講師</li>
            <li class="active">新增/修改講師資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>新增/修改講師資料</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form id="mform" method="post" action="singleweb_fun6_add.php" onSubmit="return chkform()" class="form-inline">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td width="150" align="left" valign="middle">職稱</td>
                                <td><input name="title" id="title" value="" class="form-control" required></td>
                            </tr>
                            <tr>
                            <tr>
                                <td width="150" align="left" valign="middle">姓名</td>
                                <td><input name="name" id="name" value="" class="form-control" required></td>
                            </tr>


                            <tr>
                                <td align="left" valign="middle">建立時間</td>
                                <td>2021/9/14 下午 05:51:29</td>
                            </tr>
                            <tr>
                                <td align="left" valign="middle">建立人</td>
                                <td>JACK</td>
                            </tr>
                            <tr>
                                <td align="left" valign="middle">講師照片</td>
                                <td>

                                    <div id="img_div">

                                    </div>
                                    <div>
                                        <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_uploads1" type="file" class="fileupload" name="fileupload"></span>
                                        <div class="progress progress-striped" style="display:none">
                                            <div class="bar progress-bar progress-bar-lovepy"></div>
                                        </div>
                                    </div>
                                    <div id="fileupload_show"></div>

                            </tr>
                            <tr>
                                <td align="left" valign="middle">內文</td>
                                <td><textarea name="notes" class="editor" style="width:80%;height:150px;"></textarea></td>
                            </tr>
                            <tr>
                                <td align="left" valign="middle">內文-APP用</td>
                                <td><textarea name="app_notes" style="width:80%;height:250px;"></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td align="center"><input name="pics" id="pics" type="hidden" value=""><input name="acts" id="acts" type="hidden" value="ad"><input name="pid" type="hidden" id="pid" value="">
                                    <input type="submit" value="確認送出" class="btn btn-info" style="width:50%;">
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
require("./include/_bottom.php");
?>

<script type="text/javascript" src="assets/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.fileupload.js"></script>
<script src="js/tinymce/tinymce.min.js"></script>
<script language="JavaScript">
    $mtu = "singleweb_fun6.";
    var $fsend = 0;
    var $ff;

    function chkform() {
        if ($ff && !$fsend) {
            $ff.submit();
            return false;
        }
        return true;
    }
    $(function() {

        var $file_uploads1 = $("#file_uploads1"),
            $thisid = $file_uploads1.attr("id"),
            $progress = $file_uploads1.closest("div").find(".progress");
        var $imgs = $file_uploads1.closest("span").find("#cimg").val();

        $file_uploads1.fileupload({
                url: "singleweb_fun6_add.php?st=upload&pics=",
                type: "POST",
                dropZone: $file_uploads1,
                dataType: 'html',
                autoUpload: false,
                done: function(e, data) {

                    if (data.result) {
                        $("#pics").val(data.result);
                        $("#img_div").find("img").remove();
                        $("#img_div").append($("<a href='singleparty_image/salon/" + data.result + "' class='fancybox'><img width=60 src='singleparty_image/salon/" + data.result + "' border=0></img></a>"));
                        $fsend = 1;
                        $("#mform").submit();
                    }
                },
                fail: function(e, data) {

                },
                progressall: function(e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $progress.show().find(".progress-bar").css(
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
                    if (data.files) {
                        $("#fileupload_show").html(data.files[data.files.length - 1].name);
                        $ff = data;
                    }
                }
            }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
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
        height: 300
    });
</script>