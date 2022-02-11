<?php
    /*****************************************/ 
    //檔案名稱：teach_video_list.php
    //後台對應位置：管理系統/教學影片>教學影片
    //改版日期：2022.1.28
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

    $tval = SqlFilter($_REQUEST["t"],"tab"); 
    switch($tval){
        case "1":
            $tt = "管制區";
            if($_SESSION["MM_UserAuthorization"] != "admin" && $_SESSION["MM_UserAuthorization"] != "branch" && $_SESSION["MM_UserAuthorization"] != "manager" && $_SESSION["MM_UserAuthorization"] != "love_manager"){
                $SQL = "select top 1 * from teach_video_power where single='".$_SESSION["MM_Username"]."' and types='".$tt."' and datediff(minute, getdate(), end_time) >= 0 order by end_time desc";
                $rs = $SPConn->prepare($SQL);
                $rs->execute();
                $result = $rs->fetch(PDO::FETCH_ASSOC);
                if(!$result){
                    call_alert("您未被授權進入本區，如需相關資訊請聯繫各區督導。",0,0);
                }else{
                    $owner_name = $result["owner_name"];
					$owner_branch = $result["owner_branch"];
					$start_time = $result["start_time"];
				    $end_time = $result["end_time"];
                }                
            }
            break;
        case "2":
            $tt = "限制區";
            if($_SESSION["MM_UserAuthorization"] != "admin"){
                $SQL = "select top 1 * from teach_video_power where single='".$_SESSION["MM_Username"]."' and types='".$tt."' and datediff(minute, getdate(), end_time) >= 0 order by end_time desc";
                $rs = $SPConn->prepare($SQL);
                $rs->execute();
                $result = $rs->fetch(PDO::FETCH_ASSOC);
                if(!$result){
                    call_alert("您未被授權進入本區，如需相關資訊請聯繫總管理處。",0,0);
                }else{
                    $owner_name = $result["owner_name"];
					$owner_branch = $result["owner_branch"];
					$start_time = $result["start_time"];
				    $end_time = $result["end_time"];
                }
            }
            break;
        default:
            $tt = "一般區";
    }
?>

<!-- MIDDLE -->
<style>
    .video_div {
        border: 1px solid #ccc;
        margin: 5px;
        padding: 5px;
    }

    .va:visited {
        color: #E45C04;
    }
</style>
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="teach_video.php">教學影片</a></li>
            <li class="active">教學影片 - <?php echo $tt; ?></li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>教學影片 - <?php echo $tt; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <p><input type="button" class="btn btn-info" value="回目錄頁" onclick="location.href='teach_video.php'">
                        &nbsp;&nbsp;<a href="?t=<?php echo $tval; ?>&tt=1" class="btn btn-success">開發</a>
                        &nbsp;&nbsp;<a href="?t=<?php echo $tval; ?>&tt=2" class="btn btn-success">邀約</a>
                        &nbsp;&nbsp;<a href="?t=<?php echo $tval; ?>&tt=3" class="btn btn-success">訪談</a>
                        &nbsp;&nbsp;<a href="?t=<?php echo $tval; ?>&tt=6" class="btn btn-success">排約</a>
                        &nbsp;&nbsp;<a href="?t=<?php echo $tval; ?>&tt=7" class="btn btn-success">企劃</a>
                        &nbsp;&nbsp;<a href="?t=<?php echo $tval; ?>&tt=4" class="btn btn-success">教育訓練</a>
                        &nbsp;&nbsp;<a href="?t=<?php echo $tval; ?>&tt=8" class="btn btn-success">行銷</a>
                        &nbsp;&nbsp;<a href="?t=<?php echo $tval; ?>&tt=5" class="btn btn-success">未分類</a>
                        &nbsp;&nbsp;<a href="?t=<?php echo $tval; ?>&tt=0" class="btn btn-success">全部</a>
                        <?php
                            if($start_time != ""){
                                $t3 = floor((strtotime("now")-strtotime($start_time))/86400/60);
                                ?>
                                <br>
                                <span>&nbsp;&nbsp;&nbsp;&nbsp;授權資訊：經<?php echo $owner_branch; ?>-<?php echo $owner_name; ?>授權開放進入本區 [<?php echo $start_time; ?> - <?php echo $end_time; ?> / 剩餘 <span style="color:red"><?php echo $t3; ?></span> 分鐘]</span>
                            <?php }                            
                        ?>
                    </p>
                    <p>
                    <form id="searchform" action="?t=<?php echo $tval; ?>" method="post" class="form-inline" target="_self">
                        <input type="text" name="keyword" class="form-control" value="<?php echo SqlFilter($_REQUEST["keyword"],"tab"); ?>" placeholder="標題搜尋" required>
                        <input type="submit" class="btn btn-default" value="送出">
                    </form>
                    </p>
                </div>
                <?php 
                    $vsql = "";
                    switch($_REQUEST["tt"]){
                        case "1":
                            $vsql = " and types2='開發'";
                            $errmsg = "開發";
                            break;
                        case "2":
                            $vsql = " and types2='邀約'";
                            $errmsg = "邀約";
                            break;
                        case "3":
                            $vsql = " and types2='訪談'";
                            $errmsg = "訪談";
                            break;
                        case "4":
                            $vsql = " and types2='教育訓練'";
                            $errmsg = "教育訓練";
                            break;
                        case "5":
                            $vsql = " and (types2='' or types2 is null)";                            
                            break;
                        case "6":
                            $vsql = " and types2='排約'";
                            $errmsg = "排約";
                            break;
                        case "7":
                            $vsql = " and types2='企劃'";
                            $errmsg = "企劃";
                            break;
                        case "8":
                            $vsql = " and types2='行銷'";
                            $errmsg = "行銷";
                            break;
                    }

                    //查詢關鍵字
                    if($_REQUEST["keyword"] != ""){
                        $vsql = $vsql . " and title like '%".SqlFilter($_REQUEST["keyword"],"tab")."%'";
                    }

                    //計算總數量
                    switch($_SESSION["MM_UserAuthorization"]){
                        case "admin":
                            $SQL = "SELECT count(auton) as total_size FROM teach_video where types='".$tt."'".$vsql."";
                            break;
                        case "branch":
                        case "manager":
                        case "love_manager":
                            $SQL = "SELECT count(auton) as total_size FROM teach_video where types='".$tt."' and ','+branch+',' like '%,".$_SESSION["branch"].",%'".$vsql."";
                            break;
                        default:
                            $SQL = "SELECT count(auton) as total_size FROM teach_video where types='".$tt."' and ','+branch+',' like '%,".$_SESSION["branch"].",%'".$vsql."";
                    }
                    $rs = $SPConn->prepare($SQL);
                    $rs->execute();
                    $result = $rs->fetch(PDO::FETCH_ASSOC);                    
                    if($result){
                        $total_size =  $result["total_size"];
                    }else{
                        $total_size = 0;
                    }

                    $tPage = 1; //目前頁數
                    $tPageSize = 20; //每頁幾筆
                    if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
                    $tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
                    if ( $tPageSize*$tPage < $total_size ){
                        $page2 = 20;
                    }else{
                        $page2 = (20-(($tPageSize*$tPage)-$total_size));
                    }

                    //SQL
                    switch($_SESSION["MM_UserAuthorization"]){
                        case "admin":
                            $SQL = "SELECT * FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM teach_video where types='".$tt."'".$vsql." order by auton desc, types asc ) t1 order by auton desc, types asc ) t2 order by auton desc, types asc";
                            break;
                        case "branch":
                        case "manager":
                        case "love_manager":
                            $SQL = "SELECT * FROM teach_video where types='".$tt."' and ','+branch+',' like '%,".$_SESSION["branch"].",%'".$vsql." order by auton desc, types asc";
                            break;
                        default:
                            $SQL = "SELECT * FROM teach_video where types='".$tt."' and ','+branch+',' like '%,".$_SESSION["branch"].",%'".$vsql." and onlybranch=0 order by auton desc, types asc";
                    }                    
                    $rs = $SPConn->prepare($SQL);
                    $rs->execute();
                    $result = $rs->fetchAll(PDO::FETCH_ASSOC);                    
                    if(!$result){
                        if($errmsg != ""){
                            echo "<div style='height:300px;padding-top:100px;'>目前無".$errmsg."類型的相關影片</div>";
                        }else{
                            echo "<div style='height:300px;padding-top:100px;'>目前無影片</div>";
                        }
                    }else{
                        if($vsql != ""){
                            $_SESSION["teach_video_vsql"] = $vsql;
                        }
                        echo "<div class='row'>";
                        foreach($result as $re){
                            if($re["onlybranch"] == 1){
                                $onlybranch = " <font color=red>限督導</font>";
                            }else{
                                $onlybranch = "";
                            }
                            if($re["types2"] != ""){
                                $types2 = $re["types2"];
                            }else{
                                $types2 = "未分類";
                            }
                        ?>
                            <div class="col-md-3">
                                <div class="video_div">
                                <a class="va" href="teach_video_view.php?an=<?php echo $re["auton"]; ?>">
                                    <div style="text-align:center">
                                        <?php echo $re["types"]; ?><?php if($re["ownerbranch"] != "") echo " - ".$re["ownerbranch"]; ?><br><?php echo $types2; ?><?php echo $onlybranch; ?><br>
                                        <?php 
                                            if(substr($re["url"],-4) == ".mp3" || substr($re["url"],-4) == ".MP3"){
                                                echo "<img src='img/audio_play.png' style='max-width:100%;max-height:200px;''>";
                                            }else{
                                                echo "<img src='img/video_play.png' style='max-width:100%;max-height:200px;''>";
                                            }
                                        ?>
                                    </div>
                                    <div style="text-align:center; white-space:nowrap;overflow:hidden"><?php echo $re["title"]; ?></div>
                                </a>
                                    <?php 
                                        if($_SESSION["MM_UserAuthorization"] == "admin"){ ?>
                                            <div style="text-align:center">
                                                <a href="teach_video_add.php?an=<?php echo $re["auton"]; ?>">編輯</a>
                                                <a href="javascript:Mars_popup2('teach_video.php?st=del&an=<?php echo $re["auton"]; ?>','','width=300,height=200,top=100,left=100')">刪除</a>
                                            </div>
                                        <?php }
                                    ?>
                                </div>
                            </div>
                        <?php }
                        echo "</div>";
                    }
                ?>            
                <div class="clearfix"></div>
            </div>
            <!-- 頁碼 -->
            <?php require_once("./include/_page.php"); ?>

        </div>
        <!--/span-->
    </div>
    <!--/row-->

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require("./include/_bottom.php");
?>
