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
            <li>好好玩網站管理系統</li>
            <li class="active">EDM上傳系統</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>EDM上傳系統</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                <div>
                    <span class="btn btn-danger fileinput-button"><span>內文用圖片上傳</span><input id="file_uploads2" type="file" class="fileupload" name="fileupload2"></span>
                    <div id="progress" class="progress progress-striped" style="display:none">
                        <div class="bar progress-bar progress-bar-lovepy"></div>
                    </div>
                </div>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td><a href="https://www.funtour.com.tw/images/edms/edm_20201019532335631.jpg" class="fancybox">https://www.funtour.com.tw/images/edms/edm_20201019532335631.jpg</a></td>
                        <td width="200"><a href="javascript:;" onClick="Mars_popup2('?st=del&an=248','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td><a href="https://www.funtour.com.tw/images/edms/edm_20201019643674823.jpg" class="fancybox">https://www.funtour.com.tw/images/edms/edm_20201019643674823.jpg</a></td>
                        <td width="200"><a href="javascript:;" onClick="Mars_popup2('?st=del&an=249','','width=300,height=200,top=30,left=30')">刪除</a></td>
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
require_once("./include/_bottom.php")
?>

<script type="text/javascript" src="assets/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.fileupload.js"></script>
<script language="JavaScript">
    $(function() {

        var $file_uploads2 = $("#file_uploads2"),
            $thisid = $file_uploads2.attr("id"),
            $progress2 = $file_uploads2.closest("div").find(".progress");
        var $imgs = $file_uploads2.closest("span").find("#cimg").val();

        $file_uploads2.fileupload({
                url: "funweb_fun5.php?st=upload&t=",
                type: "POST",
                dropZone: $file_uploads2,
                dataType: 'html',
                autoUpload: true,
                done: function(e, data) {

                    location.reload();
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
</script>