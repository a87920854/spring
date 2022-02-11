<?php

    /*****************************************/
    //檔案名稱：teach_video.php
    //後台對應位置：管理系統/教學影片
    //改版日期：2022.1.21
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

    if($_REQUEST["st"] == "del"){
        $SQL = "select url from teach_video where auton=".SqlFilter($_REQUEST["an"],"int");
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            if(!(strpos($result["url"],"?v=") > 0)){
                DelFile("teach_video/".$result["url"]);
            }
        }
        $SQL = "delete from teach_video where auton=".SqlFilter($_REQUEST["an"],"int");
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        reURL("win_close.php?m=刪除中.....");
    }

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">教學影片</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>教學影片</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                    <?php 
                        if($_SESSION["MM_UserAuthorization"] == "admin"){ ?>
                            <input type="button" class="btn btn-success" value="新增教學影片" onclick="location.href='teach_video_add.php?act=ad'">
                            <input type="button" class="btn btn-info" value="授權及影片播放記錄" onclick="location.href='teach_video_log.php'">
                        <?php }
                        if($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" || $_SESSION["MM_UserAuthorization"] == "love_manager"){ ?>
                            <input type="button" class="btn btn-warning" value="授權設定" onclick="location.href='teach_video_set.php'">
                        <?php }
                        if($_SESSION["MM_UserAuthorization"] == "admin"){ ?>
                            <input type="button" class="btn btn-danger" value="檔案大小" onclick="location.href='teach_video_size.php'">
                       <?php }                    
                    ?> 
                </p>
                <br><br>
                <div class="col-md-4 text-center">
                    <a href="teach_video_list.php?t=0"><img src="img/folder2.png" style="width:70%">
                        <div>一般區</div>
                    </a>
                </div>
                <div class="col-md-4 text-center">
                    <a href="teach_video_list.php?t=1"><img src="img/folder1.png" style="width:70%">
                        <div>管制區(需督導授權)</div>
                    </a>
                </div>
                <div class="col-md-4 text-center">
                    <a href="teach_video_list.php?t=2"><img src="img/folder3.png" style="width:70%">
                        <div>限制區(需總公司授權)</div>
                    </a>
                </div>

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