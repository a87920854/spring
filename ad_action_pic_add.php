<html>
<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
<link rel="stylesheet" href="css/jquery.fileupload.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<style type="text/css">
    table td {
        font-size: 12px;
    }
</style>
<noscript>
    <link rel="stylesheet" href="css/jquery.fileupload-noscript.css">
</noscript>
<noscript>
    <link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css">
</noscript>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>春天會館</title>
</head>

<body leftmargin="0" topmargin="0">
    <table width="480" border="0" align="center">
        <tr>
            <td>
                <fieldset>
                    <table width="100%" border="0" align="center" cellpadding="3">
                        <tr bgcolor="#FFF0E1">
                            <td bgcolor="#336699">
                                <div align="center"><strong>
                                        <font color="#FFFFFF" size="3">新增照片</font>
                                    </strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#F0F0F0">請選擇要上傳的檔案：(可多選)　<input type="button" id="start_upload" value="確定上傳">
                                <br>
                                <div><span class="btn btn-danger fileinput-button"><span>選擇檔案</span><input data-no-uniform="true" id="file_uploads" type="file" class="fileupload" name="files[]" multiple></span>
                                    <div id="progress" class="progress progress-striped" style="display:none">
                                        <div class="bar progress-bar progress-bar-lovepy"></div>
                                    </div>
                                    <div id="fileupload_show"></div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </td>
        </tr>
    </table>
</body>

</html>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/util.js"></script>
<script src="js/jquery.fileupload.js"></script>
<script language="JavaScript">
    $(function() {
        $allfilesname = [];
        $(".fileupload").each(function() {

            var $this = $(this),
                $thisid = $this.attr("id"),
                $progress = $this.closest("div").find(".progress");
            var $imgs = $(this).closest("span").find("#cimg").val();

            $this.fileupload({
                    url: "ad_action_pic_add.php?st=upload&ac_auto=13415",
                    type: "POST",
                    dropZone: $this,
                    dataType: 'html',
                    singleFileUploads: false,
                    autoUpload: false,
                    stop: function(e, data) {
                        window.opener.location.reload();
                        setTimeout("window.close()", 1000);
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
                        $.each(data.originalFiles, function(indexv, keyv) {
                            if (keyv['type'].length && !acceptFileTypes.test(keyv['type'])) {
                                uploadErrors.push('目前僅開放上傳 gif, jpg, jpeg, png 檔案。');
                            }
                            if (keyv['size'] > 50000000) {
                                uploadErrors.push('檔案大小超過限制。');
                            }
                        });


                        if (uploadErrors.length > 0) {
                            alert(uploadErrors.join("\n"));
                            return false;
                        }
                        if (data.files) {
                            $.each(data.files, function(indexv, keyv) {
                                $allfilesname.push(keyv.name);
                            });
                            $("#fileupload_show").html($allfilesname.join("<br>"));
                        }

                        $("#start_upload").off('click').on('click', function() {
                            data.submit();
                        });
                    }
                }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

        });
    });
</script>