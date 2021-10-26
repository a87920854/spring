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
            <li><a href="singleweb_fun13.php">優惠卷管理</a></li>
            <li class="active">新增優惠卷</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>新增優惠卷</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form action="?st=add" method="post" id="form1" onSubmit="return chk_form()" class="form-inline">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td colspan=2>
                                    優惠名稱：<input name="d1" type="text" id="d1" value="" class="form-control" style="width:80%" required>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>
                                    有效期限：<input type="text" name="t1" id="t1" value="" class="datepicker" autocomplete="off" required> - <input type="text" name="t2" id="t2" value="" class="datepicker" autocomplete="off" required>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>
                                    標籤：<label><input style="width:20px;" type="checkbox" name="d5" id="d5" value="l1"> 到期日</label>&nbsp;&nbsp;
                                    <label><input data-no-uniform="true" style="width:20px;" type="checkbox" name="d5" id="d5" value="l2"> 不限次數</label>&nbsp;&nbsp;
                                    <label><input data-no-uniform="true" style="width:20px;" type="checkbox" name="d5" id="d5" value="l3"> 今天到貨</label>&nbsp;&nbsp;
                                    <label><input data-no-uniform="true" style="width:20px;" type="checkbox" name="d5" id="d5" value="l4"> 新品</label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>
                                    活動說明： <textarea type="text" name="n1" id="n1" class="form-control" style="width:80%;height:100px;font-size:13px;" rows=4 required></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="width:40%;">列表圖：
                                        <span id="img_div">

                                        </span>
                                        <p></p>
                                        <span class="btn btn-danger fileinput-button"><span>選擇檔案</span><input data-no-uniform="true" id="file_uploads" type="file" class="fileupload" name="fileupload"></span>
                                        <div id="progress" class="progress progress-striped" style="display:none">
                                            <div class="bar progress-bar progress-bar-lovepy"></div>
                                        </div>
                                    </div>
                                    <div id="fileupload_show"></div>
                                    <input type="hidden" name="d2" id="d2" value="">
                                </td>
                                <td>
                                    <div style="width:40%;">內頁圖：
                                        <span id="img_div2">

                                        </span>
                                        <p></p>
                                        <span class="btn btn-danger fileinput-button"><span>選擇檔案</span><input data-no-uniform="true" id="file_uploads2" type="file" class="fileupload" name="fileupload"></span>
                                        <div id="progress" class="progress progress-striped" style="display:none">
                                            <div class="bar progress-bar progress-bar-lovepy"></div>
                                        </div>
                                    </div>

                                    <div id="fileupload_show2"></div>
                                    <input type="hidden" name="d3" id="d3" value="">
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2 align="center">

                                    <input id="submit3" type="submit" value="確定新增" class="btn btn-info" style="width:50%;">
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

<script type="text/javascript">
    $mtu = "singleweb_fun13.";
    var $fissend = 0;
    var $ff;
    var $ff2;

    function chk_form() {
        if ($fissend) return true;
        if (!$ff && !$ff2) return true;
        else if ($ff) {
            $ff.submit();
            return false;
        } else if ($ff2) {
            $ff2.submit();
            return false;
        }

        return false;
    }


    $(function() {

        $("#file_uploads").fileupload({
                url: "singleweb_fun13_add.asp?st=upload",
                type: "POST",
                dropZone: $(this),
                dataType: 'html',
                autoUpload: false,
                done: function(e, data) {

                    if (data.result) {
                        $("#d2").val(data.result);
                        $("#img_div").find("img").remove();
                        $("#img_div").append($("<img width=60 src='singleparty_image/coupon/" + data.result + "' border=0></img>"));
                        if ($ff2) {
                            $ff2.submit();
                        } else {
                            $fissend = 1;
                            $("#form1").submit();
                        }
                    }
                },
                fail: function(e, data) {

                },
                progressall: function(e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $(this).closest("div").find(".progress").show().find(".progress-bar").css(
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
                        $("#d2").val(data.files[data.files.length - 1].name);
                        $ff = data;
                    }
                }
            }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');


        $("#file_uploads2").fileupload({
                url: "singleweb_fun13_add.asp?st=upload",
                type: "POST",
                dropZone: $(this),
                dataType: 'html',
                autoUpload: false,
                done: function(e, data) {

                    if (data.result) {
                        $("#d3").val(data.result);
                        $("#img_div2").find("img").remove();
                        $("#img_div2").append($("<img width=60 src='singleparty_image/coupon/" + data.result + "' border=0></img>"));
                        $fissend = 1;
                        $("#form1").submit();
                    }
                },
                fail: function(e, data) {

                },
                progressall: function(e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $(this).closest("div").find(".progress").show().find(".progress-bar").css(
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
                        $("#fileupload_show2").html(data.files[data.files.length - 1].name);
                        $("#d3").val(data.files[data.files.length - 1].name);
                        $ff2 = data;
                    }
                }
            }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');

    });
</script>