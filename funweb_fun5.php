<?php
    /*****************************************/
    //檔案名稱：funweb_fun12.php
    //後台對應位置：好好玩網站管理系統/EDM上傳系統
    //改版日期：2021.12.29
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar_fun.php");

    //程式開始 *****
    if ($_SESSION["MM_Username"] == "") {
        call_alert("請重新登入。", "login.php", 0);
    }
    if ($_SESSION["MM_UserAuthorization"] != "admin" && $_SESSION["funtourpm"] != "1") {
        call_alert("您沒有查看此頁的權限。", "login.php", 0);
    }

    // 上傳
    if($_REQUEST["st"] == "upload"){
        if ($_FILES['fileupload']['error'] === UPLOAD_ERR_OK){
            $ext = pathinfo($_FILES["fileupload"]["name"], PATHINFO_EXTENSION); //附檔名      
            $fileName = "edm_".str_replace("/","",date("Y/m/d")).date("s").rand(1,9999).".".$ext; //檔名
            $urlpath = "../funtour/images/edms/";  //路徑
            move_uploaded_file($_FILES["fileupload"]["tmp_name"],($urlpath.$fileName)); //儲存檔案
            $SQL = "INSERT INTO web_data (types,n1,t1) VALUES ('edmimages','".$fileName."','".date("Y/m/d H:i:s")."')";
            $rs = $FunConn->prepare($SQL);
            $rs->execute();
        }else{                
            echo "Error: " . $_FILES["fileupload"]["error"];
        }
    }

    // 刪除
    if($_REQUEST["st"] == "del"){
        $SQL = "select * from web_data where types='edmimages' and auton='".SqlFilter($_REQUEST["an"],"int")."'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $fullpath = "../funtour/images/edms/".$result["n1"];
            DelFile($fullpath);
            $SQL = "DELETE FROM web_data where types='edmimages' and auton='".SqlFilter($_REQUEST["an"],"int")."'";
            $rs = $FunConn->prepare($SQL);
            $rs->execute();
            if($rs){
                reURL("win_close.php?m=資料刪除中");
            }
        }
    }

?>

<link rel="stylesheet" href="css/jquery.fileupload.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>

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
                    <span class="btn btn-danger fileinput-button"><span>內文用圖片上傳</span><input id="file_uploads" type="file" class="fileupload" name="fileupload"></span>
                    <div id="progress" class="progress progress-striped" style="display:none">
                        <div class="bar progress-bar progress-bar-lovepy"></div>
                    </div>
                </div>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <?php
                        $SQL = "select * from web_data where types='edmimages'";
                        $rs = $FunConn->prepare($SQL);
                        $rs->execute();
                        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                        if(!$result){
                            echo "<tr><td colspan=3>目前無資料</td></tr>";
                        }else{
                            foreach($result as $re){
                                echo "<tr><td><img src=\"https://www.funtour.com.tw/images/edms/".$re["n1"]."\" style='width:150px'></td><td><a href=\"https://www.funtour.com.tw/images/edms/".$re["n1"]."\" class='fancybox'>https://www.funtour.com.tw/images/edms/".$re["n1"]."</a></td><td width='200'><a href=\"javascript:;\" onClick=\"Mars_popup2('?st=del&an=".$re["auton"]."','','width=300,height=200,top=30,left=30')\">刪除</a></td></td>";
                            }
                        }
                    ?>
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

        var $file_uploads = $("#file_uploads"),
            $thisid = $file_uploads.attr("id"),
            $progress = $file_uploads.closest("div").find(".progress");
        var $imgs = $file_uploads.closest("span").find("#cimg").val();

        $file_uploads.fileupload({
                url: "funweb_fun5.php?st=upload",
                type: "POST",
                dropZone: $file_uploads,
                dataType: 'html',
                autoUpload: true,
                done: function(e, data) {
                    location.reload();
                },
                fail: function(e, data) {
                    alert('fail');
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
                    data.submit();
                }
            }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');

    });
</script>