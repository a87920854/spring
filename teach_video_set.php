<?php
    /*****************************************/ 
    //檔案名稱：teach_video_set.php
    //後台對應位置：管理系統/教學影片>授權設定
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
    if($_SESSION["MM_UserAuthorization"] != "admin" && $_SESSION["MM_UserAuthorization"] != "branch" && $_SESSION["MM_UserAuthorization"] != "manager" && $_SESSION["MM_UserAuthorization"] != "love_manager"){
        call_alert("您沒有查看此頁的權限。","login.php",0);
    }

    if($_REQUEST["st"] == "add"){
        if($_REQUEST["branch"] == "") call_alert("請選擇會館。", 0, 0);
        if($_REQUEST["single"] == "") call_alert("請選擇秘書。", 0, 0);
        if($_REQUEST["types"] == "") call_alert("請選擇影片區域。", 0, 0);
        $log_start = 0;
        $times = date("Y/m/d H:i:s");
        $SQL = "SELECT top 1 * FROM teach_video_power where single='".SqlFilter($_REQUEST["single"],"tab")."' and types='".SqlFilter($_REQUEST["types"],"tab")."' and datediff(minute, getdate(), end_time) >= 0 order by end_time desc";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if(!$result){            
            $SQL = "INSERT INTO teach_video_power (types,branch,single,start_time,end_time,times,owner,owner_branch,owner_name) VALUES ('".SqlFilter($_REQUEST["types"],"tab")."','".SqlFilter($_REQUEST["branch"],"tab")."','".SqlFilter($_REQUEST["single"],"tab")."','".$times."','".date("Y/m/d H:i:s",strtotime("+4 hours"))."','".$times."','".$_SESSION["MM_Username"]."','".$_SESSION["branch"]."','".$_SESSION["pname"]."')";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $log_start = 1;
        }else{
            call_alert("此帳號在".SqlFilter($_REQUEST["types"],"tab")."的授權結束時間尚未過期。",0, 0);
        }
        if($log_start == 1){
            $txt = $_SESSION["pname"]."[".$_SESSION["MM_Username"]."]開放".SqlFilter($_REQUEST["branch"],"tab")."-".SingleName(SqlFilter($_REQUEST["single"],"tab"),"normal")."[".SqlFilter($_REQUEST["single"],"tab")."]進入".SqlFilter($_REQUEST["types"],"tab")."的授權/ip:".$_SERVER["REMOTE_ADDR"];
            $SQL = "INSERT INTO teach_video_log (txt,video_an,video_types,owner,owner_branch,owner_name,times) VALUES ('".$txt."','all','".SqlFilter($_REQUEST["types"],"tab")."','".$_SESSION["MM_Username"]."','".$_SESSION["branch"]."','".$_SESSION["pname"]."','".$times."')";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
        }
        call_alert("開啟授權成功。","teach_video.php", 0);
    }    
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="teach_video.php">教學影片</a></li>
            <li class="active">授權設定</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>授權設定</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <form action="?st=add" method="post" id="form1">
                            <tr>
                                <td>
                                    請選擇要授權的會館：
                                    <select name="branch" id="branch" required>
                                        <option value="">請選擇</option>
                                        <?php
                                            if($_SESSION["MM_UserAuthorization"] == "admin"){
                                                $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' and admin_name<>'好好玩旅行社' Order By admin_SOrt";
                                                $rs = $SPConn->prepare($SQL);
                                                $rs->execute();
                                                $result=$rs->fetchAll(PDO::FETCH_ASSOC);                                
                                                foreach($result as $re){     
                                                    echo "<option value='".$re["admin_name"]."'>".$re["admin_name"]."</option>";                               
                                                }
                                            }else{
                                                echo "<option value='".$_SESSION["branch"].".>".$_SESSION["branch"]."</option>";
                                            }                                            
                                        ?>
                                    </select>
                                    　秘書：
                                    <select name="single" id="single" required>
                                        <option value="">請選擇</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    影片區域： <select name="types" id="types" required>
                                        <option value="">請選擇</option>
                                        <option value="管制區">管制區(需督導授權)</option>
                                        <?php 
                                            if($_SESSION["MM_UserAuthorization"] == "admin"){
                                                echo "<option value='限制區'>限制區(需總公司授權)</option>";
                                            }
                                        ?>                                        
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php 
                                        $t1 = date("Y-m-d H:i");
                                        $t2 = date("Y-m-d H:i",strtotime("+2 hours"));
                                        $t3 = (strtotime($t2) - strtotime($t1)) / 60;                                        
                                    ?>       
                                    授權時間： <?php echo $t1; ?> 起算至 <?php echo $t2; ?>，共 <span style="color:red"><?php echo $t3; ?></span> 分鐘。
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div align="center">

                                        <input id="submit3" type="submit" value="確定授權" class="btn btn-info" style="width:50%;">
                                    </div>
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->


    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
    require_once("./include/_bottom.php");
?>
