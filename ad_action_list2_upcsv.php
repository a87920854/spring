<?php

/*****************************************/
//檔案名稱：ad_action_list2_view_print2.php
//後台對應位置：管理系統/網站活動上傳/網站活動團控>匯入CSV檔案
//改版日期：2022.2.23
//改版設計人員：Jack
//改版程式人員：Jack
/*****************************************/
require_once("_inc.php");
require_once("./include/_function.php");

// 上傳檔案(CSV檔，待測試)
if($_REQUEST["st"] == "upload"){
    $ext = pathinfo($_FILES["file_uploads"]["name"], PATHINFO_EXTENSION); //附檔名  
    $fileName = date("Y") . date("n") . date("j") . date("H") . date("i") . date("s") . "_action_" . rand(1, 999) . "." . $ext; //檔名
    $fullpath = "temp_excel/" . $fileName; // 完整路徑
    
    // 若不是CSV檔則退出
    if($ext != "csv"){
        echo "nojpg";
        exit();
    }

    // 上傳成功便移動檔案
    if ($_FILES["file_uploads"]["error"] > 0){
        echo "Error: " . $_FILES["file_uploads"]["error"];
    }else{        
        move_uploaded_file($_FILES["file_uploads"]["tmp_name"],$fullpath);
    }

    echo $fileName;
    exit();
}

require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//程式開始 *****
if ($_SESSION["MM_Username"] == "") {
    call_alert("請重新登入。", "login.php", 0);
}
if ($_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "single") {
    call_alert("您沒有查看此頁的權限。", "login.php", 0);
}

$SQL = "select * from action_data where ac_auto='" . SqlFilter($_REQUEST["id"], "int") . "'";
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetch(PDO::FETCH_ASSOC);
if(!$result){
    echo "暫無資料";
}else{ ?>

    <!-- fileupload css -->
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
                <li><a href="ad_action_list.php">網站活動上傳</a></li>
                <li>網站活動團控 - <?php echo $result["ac_title"]; ?>[<?php echo SqlFilter($_REQUEST["id"], "int"); ?>]</li>
                <li class="active">匯入 CSV 檔案</li>
            </ol>
        </header>
        <!-- /page title -->

        <div id="content" class="padding-20">
            <!-- content starts -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="title elipsis">
                        <strong>匯入 CSV 檔案 - <?php echo $result["ac_title"]; ?>[<?php echo SqlFilter($_REQUEST["id"], "int"); ?>]</strong> <!-- panel title -->
                    </span>
                </div>

                <div class="panel-body">
                    <small>匯入的資料必須一筆以上</small>
                    <div>
                        <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_uploads" name="file_uploads" type="file" class="file_upload"></span>
                        <div id="progress" class="progress progress-striped" style="display:none">
                            <div class="bar progress-bar progress-bar-lovepy"></div>
                        </div>
                    </div>


                </div>
            </div>
            <!--/span-->

        </div>
        <!--/row-->
        </div>
        <!--/.fluid-container-->
    </section>
    <!-- /MIDDLE -->

<?php } ?>

<?php
require_once("./include/_bottom.php");
?>

<!-- fileupload js -->
<script type="text/javascript" src="assets/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.fileupload.js"></script>
<script type="text/javascript">
    $mtu = "ad_action_list.";
    $(function() {
        $(".file_upload").each(function() {

            var $this = $(this),
                $thisid = $this.attr("id"),
                $progress = $this.closest("div").find(".progress");
            var $imgs = $(this).closest("span").find("#cimg").val();
            var $op = $this.data("op"),
                $n = $this.data("n");

            $this.fileupload({
                    url: "ad_action_list2_upcsv.php?st=upload&id=<?php echo SqlFilter($_REQUEST["id"],"int"); ?>",
                    type: "POST",
                    dropZone: $this,
                    dataType: 'html',
                    autoUpload: true,
                    done: function(e, data) {

                        if (data.result) {

                            switch (data.result) {
                                case "nojpg":
                                    $progress.find(".progress-bar").css("width", "0px").stop().parent().hide();
                                    alert("目前僅開放上傳 csv 檔案。");
                                    break;
                                case "nowidth":
                                    $progress.find(".progress-bar").css("width", "0px").stop().parent().hide();
                                    alert("上傳的照片寬度過小，請上傳大於 500 px 的照片。");
                                    break;
                                case "noext":
                                    $progress.find(".progress-bar").css("width", "0px").stop().parent().hide();
                                    alert("上傳的照片無副檔名請確認後再上傳。");
                                    break;
                                default:
                                    location.href = 'ad_action_list2_upcsv2.php?id=<?php echo SqlFilter($_REQUEST["id"],"int"); ?>&x=' + data.result;
                                    break;
                            }

                        }
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

                        if (data.originalFiles[0]['size'] > 5000000) {
                            uploadErrors.push('檔案大小超過限制。');
                        }
                        if (uploadErrors.length > 0) {
                            $progress.find(".progress-bar").css("width", "0px").stop().parent().hide();
                            alert(uploadErrors.join("\n"));
                        }
                        if (data.files && !uploadErrors.length) {
                            data.submit();
                        }
                    }
                }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

        });
    });
</script>