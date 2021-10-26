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
            <li><a href="dmnweb_fun11.php">幸福故事</a></li>
            <li class="active">新增/修改幸福故事</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>新增/修改幸福故事</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form id="mform" method="post" action="dmnweb_fun11_add.php" onSubmit="return chk_form()" class="form-inline">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                            <tr>
                                <td width="150" align="left" valign="middle">標題</td>
                                <td><input name="title" id="title" value="" class="form-control" style="width:60%;" required></td>
                            </tr>
                            <tr>
                                <td width="150" align="left" valign="middle">小字</td>
                                <td><input name="n1" id="n1" value="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td align="left" valign="middle">建立時間</td>
                                <td>2021/10/26 下午 02:18:27</td>
                            </tr>
                            <tr>
                                <td width="150" align="left" valign="middle">標籤(TAG)</td>
                                <td><label><input type="radio" name="tag" id="tag" value="結婚啦"> 結婚啦</label>
                                    <label><input type="radio" name="tag" id="tag" value="熱戀中"> 熱戀中</label>
                                    <label><input type="radio" name="tag" id="tag" value="心得"> 心得</label>
                                    <label><input type="radio" name="tag" id="tag" value="none"> 取消TAG</label>
                                </td>
                            </tr>

                            <tr>
                                <td align="left" valign="middle">內文</td>
                                <td><textarea name="content" class="editor" style="width:80%;height:350px;"></textarea></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                示意圖1<br>
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
                                            <td>
                                                示意圖2<br>
                                                <span id="img_div">

                                                </span>
                                                <p></p>
                                                <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input data-p="2" id="file_uploads2" type="file" class="fileupload" name="fileupload"></span>
                                                <div id="progress" class="progress progress-striped" style="display:none">
                                                    <div class="bar progress-bar progress-bar-lovepy"></div>
                                                </div>
                                                <div id="file_uploads2_show"></div>
                                                <input type="hidden" name="pic2" id="pic2" value="">
                                            </td>
                                            <td>
                                                示意圖3<br>
                                                <span id="img_div">

                                                </span>
                                                <p></p>
                                                <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input data-p="3" id="file_uploads3" type="file" class="fileupload" name="fileupload"></span>
                                                <div id="progress" class="progress progress-striped" style="display:none">
                                                    <div class="bar progress-bar progress-bar-lovepy"></div>
                                                </div>
                                                <div id="file_uploads3_show"></div>
                                                <input type="hidden" name="pic3" id="pic3" value="">
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2 align="center"><input name="acts" id="acts" type="hidden" value="ad"><input name="an" type="hidden" id="an" value="">
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
    $mtu = "dmnweb_fun11.";
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
                    url: "dmnweb_fun11_add.php?st=upload&p=" + $p,
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