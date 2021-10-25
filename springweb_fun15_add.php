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
            <li><a href="springweb_fun15.php">戀愛講堂</a></li>
            <li class="active">新增/修改戀愛講堂</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>新增/修改戀愛講堂</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form id="mform" method="post" action="springweb_fun15_add.php" class="form-inline" onSubmit="return chkform()">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td width="150" align="left" valign="middle">分類</td>
                                <td><select name="ads_kind" id="ads_kind">
                                        <option value="愛情先修班">愛情先修班</option>
                                        <option value="戀愛補習班">戀愛補習班</option>
                                        <option value="好想談戀愛">好想談戀愛</option>
                                        <option value="男女大不同">男女大不同</option>
                                        <option value="專家學者說">專家學者說</option>
                                        <option value="幸福幫幫忙">幸福幫幫忙</option>
                                        <option value="就是要幸福">就是要幸福</option>
                                    </select></td>
                            </tr>
                            <tr>
                            <tr>
                                <td width="150" align="left" valign="middle">標題</td>
                                <td><input name="ads_title" id="ads_title" value="" style="width:60%;" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td width="150" align="left" valign="middle">TAG(分隔符號|)</td>
                                <td><input name="ads_tag" id="ads_tag" value="" class="form-control" style="width:60%;"></td>
                            </tr>
                            <tr>
                                <td width="150" align="left" valign="middle">教師</td>
                                <td><input name="ads_teacher" id="ads_teacher" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td width="150" align="left" valign="middle">日期</td>
                                <td colspan=3><input name="ads_showtime" id="ads_showtime" value="" class="datepicker" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td align="left" valign="middle">建立時間</td>
                                <td>2021/10/22 下午 02:40:53</td>
                            </tr>
                            <td align="left" valign="middle">上傳圖檔</td>
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
                            </td>
                            </tr>
                            <tr>
                                <td align="left" valign="middle">內文</td>
                                <td><textarea name="ads_note" class="editor" style="width:80%;height:350px;"></textarea></td>
                            </tr>
                            <tr>
                                <td colspan=2 align="center"><input name="ads_pic" id="ads_pic" type="hidden" value=""><input name="acts" id="acts" type="hidden" value="ad"><input name="pid" type="hidden" id="pid" value="">
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
require_once("./include/_bottom.php");
?>

<script type="text/javascript" src="assets/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.fileupload.js"></script>
<script src="js/tinymce/tinymce.min.js"></script>
<script language="JavaScript">
    $mtu = "springweb_fun15.";
    var $fsend = 0;
    var $ff;

    function chkform() {
        if ($ff && !$fsend) {
            $ff.submit();
            return false;
        }
        return true;
    }

    function del_pic(p) {
        $.ajax({
            url: 'springweb_fun15_add.php',
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
            url: 'springweb_fun15_add.php',
            data: {
                st: "reload_div",
                id: ''
            },
            error: function(xhr) {
                alert('Ajax request 發生錯誤1x');
            },
            success: function(response) {
                $sdiv.html(response);
            }
        });
    }
    $(function() {

        reload_upload("reload_showtopdiv");

        var $file_uploads1 = $("#file_uploads1"),
            $thisid = $file_uploads1.attr("id"),
            $progress = $file_uploads1.closest("div").find(".progress");
        var $imgs = $file_uploads1.closest("span").find("#cimg").val();

        $file_uploads1.fileupload({
                url: "springweb_fun15_add.php?st=upload&ads_pic=",
                type: "POST",
                dropZone: $file_uploads1,
                dataType: 'html',
                autoUpload: false,
                done: function(e, data) {

                    if (data.result) {
                        $("#ads_pic").val(data.result);
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

        var $file_uploads2 = $("#file_uploads2"),
            $thisid = $file_uploads2.attr("id"),
            $progress2 = $file_uploads2.closest("div").find(".progress");
        var $imgs = $file_uploads2.closest("span").find("#cimg").val();

        $file_uploads2.fileupload({
                url: "springweb_fun15_add.php?st=upload2&id=",
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
    tinymce.init({
        selector: ".editor",
        plugins: [
            "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
        ],

        toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | fontsizeselect styleselect removeformat forecolor backcolor | code preview",
        toolbar2: "cut copy paste | searchreplace | bullist numlist | undo redo | link unlink image media | inserttime | table",

        menubar: false,
        toolbar_items_size: 'small',
        language: 'zh_TW',
        height: 600
    });
</script>