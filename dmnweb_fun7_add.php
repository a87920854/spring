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
<form method="post" action="dmnweb_fun9_add.php?st=edit">
    <p>
        <label>指向連結位置：</label>
        <input type="text" id="d1" name="d1" value="" size=60 style="height:30px;">
    </p>
    <p>
        <label>展示圖檔(690x330)：</label>
    <dl>
        <div>
            <span class="btn btn-info fileinput-button"><span>選擇檔案</span><input data-no-uniform="true" id="fileupload" type="file" class="fileupload" name="fileupload"></span>
            <div id="progress" class="progress progress-striped" style="display:none">
                <div class="bar progress-bar progress-bar-lovepy"></div>
            </div>
        </div>
    </dl>
    </p>

    <p><br><img height=80 src="datemenow_image/upload/?t=9571" id="showimg"></p>

    </div>
    <center><button type="submit" class="btn btn-danger" onclick="window.close()" style="width:40%;height:32px;">關閉</button></center>
</form>

<script type="text/javascript">
    $(function() {
        $(".fileupload").each(function() {

            var $this = $(this),
                $thisid = $this.attr("id"),
                $progress = $this.closest("div").find(".progress");
            var $imgs = $(this).closest("span").find("#cimg").val(),
                $d1v = $("#d1").val();

            $this.fileupload({
                    url: "dmnweb_fun7_add.php?st=upload&an=",
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
                            if ($("#d1").val().replace(/\s/g, '') == '') {
                                alert("請輸入連結位置。");
                                return false;
                            } else {
                                data.url = "dmnweb_fun7_add.php?st=upload&d1=" + $("#d1").val() + "&an=";
                                data.submit();
                            }
                        }
                    }
                }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

        });

        $("#edit_link_button").click(function() {
            var $d1 = $("#d1").val();
            var $bd1 = $("#bd1").val();
            if ($d1 == $bd1) {
                alert("連結位置與目前的資料沒有不同，請確認後再修改，目前連結位置為：" + $bd1);
                return false;
            }
            $.ajax({
                type: "POST",
                url: "dmnweb_fun9_add.php",
                data: {
                    st: "ups",
                    d1: $d1,
                    an: ""
                }
            }).done(function() {
                location.reload();
            });
        });
    });
</script>