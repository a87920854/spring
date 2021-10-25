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
            <li class="active">自訂ABOUT</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>自訂ABOUT</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><a href="funweb_fun2_add.php" class="btn btn-info">新增一頁</a></p>
                <table class="table table-striped table-bordered bootstrap-datatable">

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

<script language="JavaScript">
    $(function() {
        $('#file_upload').uploadify({
            'auto': true,
            'width': 120,
            'height': 30,
            'multi': false,
            'method': 'get',
            'swf': 'js/uploadify.swf',
            'uploader': 'funweb_fun1.asp?st=upload&t=',
            'removeCompleted': true,
            'fileTypeExts': '*.gif; *.jpg;*.png;',
            'fileTypeDesc': '請選擇 jpg, gif, png 檔案',
            'fileSizeLimit': '1000KB',
            'buttonText': '請選擇上傳檔案',
            'onUploadSuccess': function(file, data, response) {
                location.reload();
            },
            'onSelect': function(file) {},
            'onUploadError': function(file, errorCode, errorMsg, errorString) {
                alert('The file ' + file.name + ' could not be uploaded: ' + errorString + ":" + errorMsg);
            },
            'onUploadStart': function(file) {},
            'onSelectError': function(file, errorCode, errorMsg) {
                switch (errorCode) {
                    case -100:
                        alert("上傳的照片已經超過系統限制的 " + $('#file_upload').uploadify('settings', 'queueSizeLimit') + " 個檔案！");
                        break;
                    case -110:
                        alert("照片 [" + file.name + "] 大小超出系統限制的" + $('#file_upload').uploadify('settings', 'fileSizeLimit') + "大小！");
                        break;
                    case -120:
                        alert("照片 [" + file.name + "] 大小異常！");
                        break;
                    case -130:
                        alert("照片 [" + file.name + "] 類型不正確！");
                        break;
                        break;
                }
            },
            'onFallback': function() { //??FLASH失??用  
                alert("您尚未安裝 FLASH Player，請安裝後再使用。");
            }
        });
    });

    function del_f(a) {
        if (confirm("是否要刪除此行？")) {
            location.href = 'funweb_fun1.asp?st=del&t=&a=' + a;
        }
    }

    function check_form(f) {
        var $r = 0;
        $.each(f.find("input"), function() {
            if (!$r && $(this).attr("type") == "text") {
                if (!$(this).val()) {
                    alert("請確實輸入新增或儲存的資料。");
                    $(this).focus();
                    $r = 1;
                }
            }
        });
        if ($r) return false;
        else return true;
    }
</script>