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
            <li><a href="index.asp">管理系統</a></li>
            <li><a href="ad_secretary.asp">秘書資料</a></li>
            <li class="active">秘書照片處理</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>秘書照片處理</strong>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:history.back();" class="btn btn-info btn-sm">回上一頁</a> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable" style="font-size:12px;">
                    <tbody>
                        <tr>
                            <td height="25">
                                <center>上傳秘書照片</center>
                            </td>
                        </tr>
                        <tr>
                            <td>＊照片圖檔只限
                                gif 或 jpg 格式，每張照片檔案大小<font color="#FF0000">請勿超過5000KB</font>。

                                <input type="button" value="刪除照片" onclick="location.href='ad_secretary_photo.asp?p_auto=654&st=del'">

                                <br>

                            </td>
                        </tr>
                        <tr>
                            <td>

                                <label class="control-label">選擇照片：</label>

                                <div>
                                    <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input data-no-uniform="true" id="file_uploads" type="file" class="fileupload" name="fileupload"></span>
                                    <div id="progress" class="progress progress-striped" style="display:none">
                                        <div class="bar progress-bar progress-bar-lovepy"></div>
                                    </div>
                                    <div id="fileupload_show"></div>
                                </div>

                            </td>
                        </tr>

                        <tr>
                            <td><a href="upload_image/20211020112354_654_517.jpg" class="fancybox"><img src="upload_image/20211020112354_654_517.jpg" border=0></a></td>
                        </tr>


                    </tbody>
                </table>
                <div class="text-center"><a href="javascript:history.back();" class="btn btn-info">回上一頁</a></div>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    <hr>

    <footer>
    </footer>
    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php")
?>

<script type="text/javascript" src="js/jquery.fileupload.js"></script>
<script type="text/javascript">
    $mtu = "ad_secretary.";
    $(function() {

        $(".fileupload").each(function() {

            var $this = $(this),
                $thisid = $this.attr("id"),
                $progress = $this.closest("div").find(".progress");
            var $imgs = $(this).closest("span").find("#cimg").val();

            $this.fileupload({
                    url: "ad_secretary_photo.php?st=upload&p_auto=1086",
                    type: "POST",
                    dropZone: $this,
                    dataType: 'html',
                    done: function(e, data) {

                        location.href = "ad_secretary_photo.php?p_auto=1086";

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
                        }


                        data.submit();

                    }
                }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

        });

    });
</script>