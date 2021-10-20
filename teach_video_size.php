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
                        <tr>
                            <td colspan=3>Total: 301.8 GB</td>
                        </tr>
                        <tr>
                            <td>20210116_台北凱琳受理台南約訪70大男工程師.mp4</td>
                            <td>1.9 GB</td>
                            <td>2021/3/3 下午 02:04:24</td>
                        </tr>
                        <tr>
                            <td>20200617 教育訓練-課後Q＆A分享時間.mp4</td>
                            <td>1.7 GB</td>
                            <td>2020/6/23 下午 04:59:09</td>
                        </tr>
                        <tr>
                            <td>20201203_台北易珊受理八德sunny約訪23活動名單69碩女.mp4</td>
                            <td>1.5 GB</td>
                            <td>2021/1/4 下午 05:06:38</td>
                        </tr>

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