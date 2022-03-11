<?php

    /*****************************************/
    //檔案名稱：ad_fun_action_pic_add.php
    //後台對應位置：好好玩管理系統/好好玩國內團控/活動花絮->新增照片
    //改版日期：2021.12.2
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    //程式開始 *****
    if($_REQUEST["ac_auto"] == ""){ call_alert("活動編號有錯誤。",1,1);}

    $ac_auto = SqlFilter($_REQUEST["ac_auto"],"int");
    
    // 上傳圖片功能(待測)
    if($_REQUEST["st"] == "upload"){
        $urlpath = "webfile/funtour/upload_image/"; //儲存路徑
        // $urlpath = "Upload/"; //儲存路徑
        $fileCount = count($_FILES["fileupload"]['name']);

        for ($i = 0; $i < $fileCount; $i++) {
            if ($_FILES["fileupload"]["error"][$i] !== UPLOAD_ERR_OK){
                echo "Error: " . $_FILES["fileupload"]["error"];
            }else{
                $ext = pathinfo($_FILES["fileupload"]["name"][$i], PATHINFO_EXTENSION); //附檔名      
                $fileName = date("Y").date("n").date("j").date("H").date("i").date("s")."_".$ac_auto."_".rand(1,999).".".$ext; //檔名
                move_uploaded_file($_FILES["fileupload"]["tmp_name"][$i],($urlpath.$fileName)); //儲存檔案
                $SQL = "Insert into action_photo (ac_photo_time, ac_auto, ac_photo_name) values (getdate(), ".$ac_auto.", '".$fileName."')";
                $rs = $FunConn->prepare($SQL);
                $rs->execute();
            }
        }
        exit();      
    }

?>


<html>
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

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>好好玩旅行社</title>
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
                                <div>
                                    <span class="btn btn-danger fileinput-button">
                                        <span>選擇檔案</span>
                                        <input data-no-uniform="true" id="file_uploads" type="file" class="fileupload" name="fileupload[]" multiple>
                                    </span>
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
<!-- <script type="text/javascript" src="js/util.js"></script> -->
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
                url: "ad_fun_action_pic_add.php?st=upload&ac_auto=<?php echo $ac_auto; ?>",
                type: "POST",
                dropZone: $this,
                dataType: 'html',
                singleFileUploads: false,
                autoUpload: true,
                stop: function(e, data) {
                    window.opener.location.reload();
                    setTimeout("window.close()", 1000);
                },
                fail: function(e, data) {
                    console.log(data);
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
