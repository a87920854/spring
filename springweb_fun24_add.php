<meta charset="utf-8" />

<script src="js/jquery-1.8.3.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.fileupload.js"></script>
<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">

<link rel="stylesheet" href="css/jquery.fileupload.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<noscript>
    <link rel="stylesheet" href="css/jquery.fileupload-noscript.css">
</noscript>
<noscript>
    <link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css">
</noscript>

<form method="post" action="springweb_fun24_add.php?st=edit">
    <p>
        <label>新竹 活動表下載圖檔：</label>
    <dl>
        <div>
            <span class="btn btn-info fileinput-button"><span>選擇檔案</span><input data-no-uniform="true" id="fileupload" type="file" class="fileupload" name="fileupload"></span>
            <div id="progress" class="progress progress-striped" style="display:none">
                <div class="bar progress-bar progress-bar-lovepy"></div>
            </div>
        </div>
    </dl>
    </p>

    <p>event_441.jpg<br><img height=80 src="upload_image/event_441.jpg?t=3184" id="showimg"></p>

    </div>
    <center><button type="submit" class="btn btn-danger" onclick="window.close()" style="width:40%;height:32px;">關閉</button></center>
</form>

<script type="text/javascript">
    $(function() {
        $(".fileupload").each(function() {

            var $this = $(this),
                $thisid = $this.attr("id"),
                $progress = $this.closest("div").find(".progress");
            var $imgs = $(this).closest("span").find("#cimg").val();

            $this.fileupload({
                    url: "springweb_fun24_add.php?st=upload&an=441",
                    type: "POST",
                    dropZone: $this,
                    dataType: 'html',
                    autoUpload: false,
                    done: function(e, data) {

                        if (data.result) {
                            location.href = 'win_close.php?m=上傳完成';
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

                            data.submit();

                        }
                    }
                }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

        });

    });
</script>