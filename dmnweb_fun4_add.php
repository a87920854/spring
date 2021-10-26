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
            <li><a href="dmnweb_fun4.php">談情說愛</a></li>
            <li class="active">新增/修改談情說愛</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>新增/修改談情說愛</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form id="mform" method="post" action="dmnweb_fun4_add.php" onSubmit="return chk_form()" class="form-inline">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td width="150" align="left" valign="middle">分類</td>
                                <td><select name="category_id" id="category_id">
                                        <option value="1">跟我說愛情</option>
                                        <option value="2">跟我做心測</option>
                                        <option value="3">跟我變Beauty</option>
                                        <option value="4">跟我看花絮</option>
                                        <option value="5">跟我挖新聞</option>
                                        <option value="6">跟我玩樂趣</option>
                                        <option value="7">跟我談兩性</option>
                                        <option value="8">跟我享好康</option>
                                    </select></td>
                            </tr>
                            <tr>
                            <tr>
                                <td width="150" align="left" valign="middle">標題</td>
                                <td><input name="name" id="name" value="" class="form-control" style="width:60%;" required></td>
                            </tr>
                            <tr>
                                <td width="150" align="left" valign="middle">作者</td>
                                <td><input name="writer" id="writer" value="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="150" align="left" valign="middle">日期</td>
                                <td colspan=3><input name="create_time" id="create_time" value="" class="datepicker" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td align="left" valign="middle">建立時間</td>
                                <td>2021/10/26 下午 02:13:52</td>
                            </tr>
                            <tr>
                                <td width="150" align="left" valign="middle">人氣</td>
                                <td><input name="hits" id="hits" value="0" class="form-control">(數字)</td>
                            </tr>

                            <tr>
                                <td align="left" valign="middle">內文</td>
                                <td><textarea name="content" class="editor" style="width:80%;height:350px;"></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    示意圖<br>
                                    <span id="img_div">

                                    </span>
                                    <p></p>
                                    <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input data-p="1" id="file_uploads1" type="file" class="fileupload" name="fileupload"></span>
                                    <div id="progress" class="progress progress-striped" style="display:none">
                                        <div class="bar progress-bar progress-bar-lovepy"></div>
                                    </div>
                                    <div id="file_uploads1_show"></div>
                                    <input type="hidden" name="pic1" id="pic1" value="">
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2 align="center"><input name="acts" id="acts" type="hidden" value="ad"><input name="pid" type="hidden" id="pid" value="">
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
require_once("./include/_bottom.php")
?>

<script type="text/javascript" src="assets/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.fileupload.js"></script>
<script src="js/tinymce/tinymce.min.js"></script>

<script language="JavaScript">
    $mtu = "dmnweb_fun4.";
    var $fsend = 0;
    var $ff = [];

    function chk_form() {
        if ($ff.length > 0) {
            $.each($ff, function() {
                $(this).submit();
            });
            return false;
        }
        return true;
    }
    $(function() {
        $(".fileupload").each(function() {

            var $this = $(this),
                $thisid = $this.attr("id"),
                $progress = $this.closest("td").find(".progress"),
                $p = $this.data("p");

            $this.fileupload({
                    url: "dmnweb_fun4_add.php?st=upload&p=" + $p,
                    type: "POST",
                    dropZone: $this,
                    dataType: 'html',
                    autoUpload: false,
                    done: function(e, data) {

                        switch (data.result) {
                            case "err":
                                $progress.find(".progress-bar").css("width", "0px").stop().parent().hide();
                                alert("上傳出錯。");
                                break;
                            default:
                                $("#pic" + $p).val(data.result);
                                if ($fsend + 1 >= $ff.length) {
                                    $ff.length = 0;
                                    $("#mform").submit();
                                } else $fsend++;
                                break;
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
                            $("#" + $thisid + "_show").html(data.files[data.files.length - 1].name);
                            $ff.push(data);
                        }
                    }
                }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

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