<?php

/*****************************************/
//檔案名稱：teach_video_set.php
//後台對應位置：管理系統/教學影片>檔案大小
//改版日期：2022.1.27
//改版設計人員：Jack
//改版程式人員：Jack
/*****************************************/
require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//程式開始 *****
if ($_SESSION["MM_Username"] == "") {
    call_alert("請重新登入。", "login.php", 0);
}
check_page_power("teach_video");

//計算檔案夾總檔案大小
function directorySize($directory){
    $directorySize = 0;
    //開啟目錄讀取內容
    if (file_exists($directory)) {
        if ($dh = opendir($directory)) {
            //迭代處理每個目錄項
            while (($filename = readdir($dh))) {
                //過濾上級欄目和本級欄目
                if ($filename == "." || $filename == "..") continue;
                //開始遞迴
                if (is_dir($directory . "/" . $filename)) {
                    $directorySize += directorySize($directory . "/" . $filename);
                } else {
                    //確定檔案大小 並且新增到總大小
                    $directorySize += filesize($directory . "/" . $filename);
                }
            }
        }
        closedir();
    } else {
        $directorySize = 0;
    }
    return $directorySize;
}

//檔案儲存單位
function FileSizeConvert($bytes){
    $bytes = floatval($bytes);
    $arBytes = array(
        0 => array(
            "UNIT" => "TB",
            "VALUE" => pow(1024, 4)
        ),
        1 => array(
            "UNIT" => "GB",
            "VALUE" => pow(1024, 3)
        ),
        2 => array(
            "UNIT" => "MB",
            "VALUE" => pow(1024, 2)
        ),
        3 => array(
            "UNIT" => "KB",
            "VALUE" => 1024
        ),
        4 => array(
            "UNIT" => "B",
            "VALUE" => 1
        ),
    );

    foreach ($arBytes as $arItem) {
        if ($bytes >= $arItem["VALUE"]) {
            $result = $bytes / $arItem["VALUE"];
            $result = strval(round($result, 2)) . " " . $arItem["UNIT"];
            break;
        }
    }
    return $result;
}

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="teach_video.php">教學影片</a></li>
            <li class="active">檔案大小</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>檔案大小</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><input type="button" class="btn btn-warning" value="回目錄頁" onclick="location.href='teach_video.php'">
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <?php
                            // 總檔案大小
                            $directory = "teach_video/";
                            $totalSize = FileSizeConvert(directorySize($directory));                      
                            echo "<tr><td colspan=3>Total: " . $totalSize . "</td></tr>";
                            // 各別檔案的名稱、尺寸、日期
                            function fileOutputList($directory){
                                $dh = opendir($directory);
                                if (file_exists($directory)) {
                                    while (($filename = readdir($dh))) {
                                        //過濾上級欄目和本級欄目
                                        if ($filename == "." || $filename == "..") continue;
                                        //開始遞迴
                                        if (is_dir($directory . "/" . $filename)) {
                                            fileOutputList($directory . "/" . $filename);
                                        } else {
                                            //輸出檔案名稱及大小
                                            echo "<tr><td>" . $filename . "</td><td>" . FileSizeConvert(filesize($directory . "/" . $filename)) . "</td><td>" . changeDate(date("Y/m/d H:i:s", filemtime($directory . "/" . $filename))) . "</td></tr>";
                                        }
                                    }
                                } else {
                                    echo "<tr><td colspan=3>目前無檔案</td></tr>";
                                }
                                closedir();
                            }                               
                            fileOutputList($directory);
                        ?>
                    </tbody>
                </table>

                <div class="clearfix" style="padding-bottom:30px;"></div>

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
require_once("./include/_bottom.php");
?>