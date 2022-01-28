<?php

    /*****************************************/
    //檔案名稱：teach_video_view.php
    //後台對應位置：管理系統/教學影片>播放教學影片
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

    if($_REQUEST["st"] == "video_log"){
        if($_REQUEST["own"] != ""){
            $SQL = "select * from teach_video where auton='".SqlFilter($_REQUEST["vid"],"int")."'";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                $tit = $result["title"];
                $types= $result["types"];
                $ftit = $types." - ".$tit."[".$result["auton"]."]";
            }
            $ownname = SqlFilter($_REQUEST["ownname"],"tab");
            $own = SqlFilter($_REQUEST["own"],"tab");
            switch($_REQUEST["act"]){
                case "play":
                    $txt = $ownname."[".$own."]開始播放".$ftit." - ".date("Y/m/d H:i:s")."/ip:".sysgetrealip()."";
                    break;
            }

            $SQL = "INSERT INTO teach_video_log (txt, video_an, video_title, video_types, owner, owner_branch, owner_name, times) VALUES ('".$txt."','".SqlFilter($_REQUEST["vid"],"int")."','".$tit."','".$types."','".$own."','".SqlFilter($_REQUEST["ownbranch"],"tab")."','".$ownname."','".date("Y/m/d H:i:s")."')";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
        }
    }

    if($_REQUEST["an"] == ""){
        call_alert("編號錯誤。",0,0);
    }

    switch($_SESSION["MM_UserAuthorization"]){
        case "admin":
            $SQL = "select * from teach_video as a where auton='".SqlFilter($_REQUEST["an"],"int")."'";
            break;
        case "branch":
        case "manager":
        case "love_manager":
            $SQL = "select * from teach_video where auton='".SqlFilter($_REQUEST["an"],"int")."' and ','+branch+',' like '%,".$_SESSION["branch"].",%'";
            break;
        default:
            $SQL = "select * from teach_video where auton='".SqlFilter($_REQUEST["an"],"int")."' and ','+branch+',' like '%,".$_SESSION["branch"].",%' and onlybranch=0";
    }
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if($result){
        $tt = $result["types"];
        $title = $result["title"];
        $notes = $result["notes"];
        $url = $result["url"];
        $times = $result["times"];
    }else{
        call_alert("資料錯誤。",0,0);
    }

    switch($tt){
        case "管制區":
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
        case "限制區":
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
    }

    $vsql = "";
    if($_SESSION["teach_video_vsql"] != ""){
        $vsql = $_SESSION["teach_video_vsql"];
    }

    switch($_SESSION["MM_UserAuthorization"]){
        case "admin":
            $SQL = "select pre_v, auton, next_v from (select TOP 100 PERCENT lag(auton) over (order by auton) as pre_v, auton, lead(auton) over (order by auton) as next_v from teach_video where types='".$tt."'".$vsql." order by auton desc, types asc) as t where auton='".SqlFilter($_REQUEST["an"],"int")."'";
            break;
        case "branch":
        case "manager":
        case "love_manager":
            $SQL = "select pre_v, auton, next_v from (select TOP 100 PERCENT lag(auton) over (order by auton) as pre_v, auton, lead(auton) over (order by auton) as next_v from teach_video where types='".$tt."' and ','+branch+',' like '%,".$_SESSION["branch"].",%'".$vsql." order by auton desc, types asc) as t where auton='".SqlFilter($_REQUEST["an"],"int")."'";
            break;
        default:
            $SQL = "select pre_v, auton, next_v from (select TOP 100 PERCENT lag(auton) over (order by auton) as pre_v, auton, lead(auton) over (order by auton) as next_v from teach_video where types='".$tt."' and ','+branch+',' like '%,".$_SESSION["branch"].",%'".$vsql." and onlybranch=0 order by auton desc, types asc) as t where auton='".SqlFilter($_REQUEST["an"],"int")."'";
    }
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if($result){
        $pre_v = $result["pre_v"];
		$next_v = $result["next_v"];	
    }

?>

<style>
#pvideo {width: 49%;}
@media screen and (max-width: 767px) {
    #pvideo {width: 95%;}
}
</style>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.asp">管理系統</a></li>
            <li><a href="teach_video.asp">教學影片</a></li>
            <li class="active">播放教學影片 - <?php echo $tt; ?> - <?php echo $title; ?></li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>播放教學影片 -<?php echo $tt; ?> - <?php echo $title; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><input type="button" class="btn btn-info" value="回上一頁" onclick="history.go(-1)">&nbsp;
                    <?php 
                        if($next_v != ""){
                            echo "&nbsp;<a href='teach_video_view.php?an=".$next_v."' class='btn btn-success'>上一個</a>";
                        }
                        if($pre_v != ""){
                            echo "&nbsp;<a href='teach_video_view.php?an=".$pre_v."' class='btn btn-success'>下一個</a>";
                        }
                        
                        if($start_time != ""){
                            $t3 = floor((strtotime("now")-strtotime($start_time))/86400/60);
                            ?>
                            <br>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;授權資訊：經<?php echo $owner_branch; ?>-<?php echo $owner_name; ?>授權開放進入本區 [<?php echo $start_time; ?> - <?php echo $end_time; ?> / 剩餘 <span style="color:red"><?php echo $t3; ?></span> 分鐘]</span>
                        <?php }                            
                        
                    ?>
                </p>
                <br><br>
                <div style="text-align:center;">
                    <div>
                        <h3><?php echo $title; ?></h3>
                    </div>
                    <div class="text-left"><?php echo $notes; ?></div>
                    <div>
                        
                        <video id="pvideo" controls controlsList="nodownload" onclick="this.play()">
                            <source src="teach_video/測試影片3_2.mp4" type="video/mp4">
                            Your browser does not support HTML5 video.
                        </video>


                    </div>
                    <div class="text-align:center">2022/1/27 上午 11:01:17<br>連入位置：60.250.92.145</div>
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

<?php
require("./include/_bottom.php");
?>