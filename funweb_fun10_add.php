<?php 
    /*****************************************/ 
    //檔案名稱：funweb_fun10_add.php
    //後台對應位置：好好玩網站管理系統/首頁上方大圖>新增 banner
    //改版日期：2021.12.27
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    //程式開始 *****
	if($_SESSION["MM_Username"] == "" ){ 
        call_alert("請重新登入。","login.php",0);
    }

    // 連結位置更新
    if($_REQUEST["st"] == "ups"){
        $an = SqlFilter($_REQUEST["an"],"int");
        $d1 = SqlFilter($_REQUEST["d1"],"tab");
        if($an == "" || $d1 == ""){
            exit();
        }
        $SQL = "update web_data set n2='".$d1."' where auton=".$an;
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
    }

    // 上傳圖片
    if($_REQUEST["st"] == "upload"){
        $an = SqlFilter($_REQUEST["an"],"int");
        $d1 = SqlFilter($_REQUEST["d1"],"tab");
        $types = SqlFilter($_REQUEST["types"],"tab");
        if($an == ""){
            $an = 0;
        }
        $SQL = "SELECT top 1 i1 FROM web_data where types='".$types."' order by i1 desc";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $i1 = $result["i1"] + 1;
        }else{
            $i1 = 1;
        }
        $SQL = "SELECT * FROM web_data where auton=".$an." and types='".$types."'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if(!$result){            
            $SQL = "INSERT INTO web_data (t1, types, i1) VALUES ('".date("Y/m/d H:i:s")."','".$types."','".$i1."')";
            $rs = $FunConn->prepare($SQL);
            $rs->execute();
            $rs = $FunConn->prepare("LAST_INSERT_ID() AS id");
            $rs->execute();            
            $result2 = $rs->fetch(PDO::FETCH_ASSOC);
            if($result2){
                $an = $result2["id"];
            }
        }else{
            $old_photo_name = $result["n1"];
            if($old_photo_name != ""){
                DelFile(("../funtour/images/upload/".$old_photo_name));
            }
        }         
        if ($_FILES['fileupload']['error'] === UPLOAD_ERR_OK){
            $ext = pathinfo($_FILES["fileupload"]["name"], PATHINFO_EXTENSION); //附檔名      
            $fileName = "ib".$an.".".$ext; //檔名
            $urlpath = "../funtour/images/upload";  //路徑
            move_uploaded_file($_FILES["fileupload"]["tmp_name"],($urlpath.$fileName)); //儲存檔案
            $SQL = "update web_data set n2='".$d1."', n1='".$fileName."' where auton=".$an;
            $rs = $FunConn->prepare($SQL);
            $rs->execute();
        }else{                
            echo "Error: " . $_FILES["fileupload"]["error"];
        }
    }

    if($_REQUEST["an"] != ""){
        $SQL = "SELECT * FROM web_data where auton=".SqlFilter($_REQUEST["an"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $d1 = $result["n2"];
            $img = $result["n1"];
            $types = $result["types"];
            if($types == "new_index_banner_m"){
                $ver = "手機版";
            }else{
                $ver = "電腦版";
            }
        }
    }

?>
<html>
<head>
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
</head>
<body>
<div style="padding:20px;">
    <form method="post" action="funweb_fun10.php?st=edit">
        <p>
            <label>版面：</label>
            <?php 
                if($_REQUEST["an"] != ""){
                    echo $ver;
                    echo "<input type='hidden' id='types' value='".$types."'>";
                }else{ ?>
                    <select name="types" id="types">
                        <option value="">請選擇</option>                
                        <option value="new_index_banner">電腦版</option>
                        <option value="new_index_banner_m">手機版</option>
                    </select>
                <?php }            
            ?>            
        </p>

        <p>
            <label>指向連結位置：</label>
            <input type="text" id="d1" name="d1" value="<?php echo $d1; ?>" size=60 style="height:30px;">
            <?php 
                if($_REQUEST["an"] != ""){ ?>
                    <button id="edit_link_button" type="button" class="button">修改連結</button><input type="hidden" id="bd1" value="<?php echo $d1; ?>"/>
                <?php }
            ?>
        </p>

        <p>
            <label>展示圖檔(990x570)：</label>
            <div>
                <span class="btn btn-info fileinput-button"><span>選擇檔案</span><input data-no-uniform="true" id="fileupload" type="file" class="fileupload" name="fileupload"></span>
                <div id="progress" class="progress progress-striped" style="display:none">
                    <div class="bar progress-bar progress-bar-lovepy"></div>
                </div>
            </div>
        </p>
        <?php 
            if($img != ""){ ?>
                <p><?php echo $img; ?><br><img height=80 src="http://www.funtour.com.tw/images/upload/<?php echo $img; ?>?t=<?php echo rand(1,9999); ?>" id="showimg"></p>
            <?php }
        ?>
        <button type="submit" class="btn btn-danger" onclick="window.close()" style="width:40%;height:32px;">關閉視窗</button>
    </form>
</div>
<script type="text/javascript">
    $(function() {
        $(".fileupload").each(function() {

            var $this = $(this),
                $thisid = $this.attr("id"),
                $progress = $this.closest("div").find(".progress");
            var $imgs = $(this).closest("span").find("#cimg").val(),
                $d1v = $("#d1").val();

            $this.fileupload({
                    url: "funweb_fun10_add.php?st=upload&an=<?php echo SqlFilter($_REQUEST["an"],"int"); ?>",
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
                        if (data.originalFiles[0]['size'] > 8000000) {
                            uploadErrors.push('檔案大小超過限制。');
                        }
                        if (uploadErrors.length > 0) {
                            alert(uploadErrors.join("\n"));
                        }
                        if (data.files) {
                            if ($("#d1").val().replace(/\s/g, '') == '') {
                                alert("請輸入連結位置。");
                                return false;
                            } else if ($("#types").val() == '') {
                                alert("請選擇版面。");
                                return false;
                            } else {
                                data.url = "funweb_fun10_add.php?st=upload&types=" + $("#types").val() + "&d1=" + $("#d1").val() + "&an=<?php echo SqlFilter($_REQUEST["an"],"int"); ?>";
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
                url: "funweb_fun10_add.php",
                data: {
                    st: "ups",
                    d1: $d1,
                    an: "<?php echo SqlFilter($_REQUEST["an"],"int"); ?>"
                }
            }).done(function() {
                location.reload();
            });
        });
    });
</script>
</body>
</html>