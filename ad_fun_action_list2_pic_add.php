<?php

/*****************************************/
//檔案名稱：ad_fun_action_list2_pic_add.php
//後台對應位置：好好玩管理系統/好好玩國外團控/行程頁設計 > 新增(修改)行程內容
//改版日期：2022.2.25
//改版設計人員：Jack
//改版程式人員：Jack
/*****************************************/

require_once("_inc.php");
require_once("./include/_function.php");

if($_REQUEST["id"] == ""){
    call_alert("活動資料讀取錯誤。","ClOsE",0);
}

// 上傳圖片功能(待測)
if($_REQUEST["st"] == "upload"){
    $ac_auto = SqlFilter($_REQUEST["id"],"int");
    $tt = SqlFilter($_REQUEST["t"],"tab");

    $urlpath = "funtour_image/travel"; //儲存路徑
    $fileCount = count($_FILES["fileupload"]['name']);

    for ($i = 0; $i < $fileCount; $i++) {
        if ($_FILES["fileupload"]["error"][$i] !== UPLOAD_ERR_OK){
            echo "Error: " . $_FILES["fileupload"]["error"];
        }else{
            $ext = pathinfo($_FILES["fileupload"]["name"][$i], PATHINFO_EXTENSION); //附檔名      
            $fileName = date("Y").date("n").date("j").date("H").date("i").date("s")."_".rand(1,999).".".$ext; //檔名
            move_uploaded_file($_FILES["fileupload"]["tmp_name"][$i],($urlpath.$fileName)); //儲存檔案            

            switch($tt){
                case "top":
                    $types = "top";
                    $msize = "350";
                case "top_text":
                    $types = "top_text";
                    $msize = "580";
                default:
                    if($tt != ""){
                        $types = $tt;
                        $msize = "200";
                    }else{
                        $types = "err";
                        $msize = "130";
                    }
            }

            // 圖檔名稱存入資料庫
            $SQL = "INSERT INTO travel_photo (ac_auto,photo_name,times,types) VALUES ('".$ac_auto."', '".$fileName."', GetDate(), '".$types."')";
            $rs = $FunConn->prepare($SQL);
            $rs->execute();
        }
    }
    exit();
}



?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>好好玩旅行社</title>
    <link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
    <link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery.fileupload.css">
    <link rel="stylesheet" href="css/jquery.fileupload-ui.css">
    <noscript>
        <link rel="stylesheet" href="css/jquery.fileupload-noscript.css">
    </noscript>
    <noscript>
        <link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css">
    </noscript>
    <style type="text/css">
        table td {
            font-size: 12px;
        }
    </style>
</head>

<body leftmargin="0" topmargin="0">
    <table width="480" border="0" align="center">
        <tr>
            <td>
                <fieldset>
                    <legend>好好玩旅行社資料</legend>
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
                    url: "ad_fun_action_list2_pic_add.asp?st=upload&id=1983&t=top",
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