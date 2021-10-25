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

<p></p>
<form id="fun_form" method="post" action="springweb_fun1_add.php?st=edit&an=1633" onsubmit="return chk_form()">
    <p>
        <label>連結位置：
            <input type="text" id="d1" name="d1" value="https://www.springclub.com.tw/20210927/?cc=springclub_officialwebsite_homepage" style="width:40%;height:26px;" required></label>
        <label>ALT：
            <input type="text" id="alt" name="alt" value="用5倍券創造戀愛新機會" style="width:40%;height:26px;"></label>
    </p>
    <p>
        <label>展示圖檔(690x330)：</label>


    <div>
        <img id="show_img" src="upload_image/index_banner_2021101415572385.jpg?t=5294" height=80>
        <span class="btn btn-info fileinput-button"><span>選擇檔案</span><input data-no-uniform="true" id="fileupload" type="file" class="fileupload" name="fileupload"></span>
        <div id="progress" class="progress progress-striped" style="display:none">
            <div class="bar progress-bar progress-bar-lovepy"></div>
        </div>
    </div>
    <div id="fileupload_show"></div>
    <input type="hidden" name="d2" id="d2" value="index_banner_2021101415572385.jpg">
    </p>

    </div>
    <center><button type="submit" class="btn btn-danger" style="width:40%;height:28px;">確認送出</button></center>
</form>

<script type="text/javascript">
    var $fsend = 0;

    function chk_form() {
        if (!$("#d2").val() || $fsend) return true;
        if ($("#d2").val() && !$fsend) return true;
        return false;
    }


    $(function() {
        $(".fileupload").each(function() {

            var $this = $(this),
                $thisid = $this.attr("id"),
                $progress = $this.closest("div").find(".progress");
            var $imgs = $(this).closest("span").find("#cimg").val();

            $this.fileupload({
                    url: "springweb_fun1_add.php?st=upload&an=1633",
                    type: "POST",
                    dropZone: $this,
                    dataType: 'html',
                    autoUpload: false,
                    done: function(e, data) {

                        if (data.result) {
                            $("#d2").val(data.result);
                            $("#show_img").attr("src", "singleparty_image/event/" + data.result);
                            $fsend = 1;
                            $("#fun_form").submit();
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
                            $("#d2").val(data.files[data.files.length - 1].name);
                            data.submit();
                        }
                    }
                }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

        });

    });
</script>