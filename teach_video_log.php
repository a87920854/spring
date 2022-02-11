<?php
    /*****************************************/ 
    //檔案名稱：teach_video_log.php
    //後台對應位置：管理系統/教學影片>授權及影片播放記錄
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
    if($_SESSION["MM_UserAuthorization"] != "admin"){
        call_alert("您沒有查看此頁的權限。","login.php",0);
    }

    $default_sql_num = 500;
    if($_REQUEST["vst"] == "full"){
        $sqlv = "*";
        $sqlv2 = "count(auton)";
    }else{
        $sqlv = "top ".$default_sql_num." *";
        $sqlv2 = "count(auton)";
    }

    if($_REQUEST["start_time"] != ""){
        $start_time = SqlFilter($_REQUEST["start_time"],"tab")." 00:00:00";
	    $start_time2 = SqlFilter($_REQUEST["start_time"],"tab");
    }    
    if($_REQUEST["end_time"] != ""){
        $end_time = SqlFilter($_REQUEST["end_time"],"tab")." 23:59:59";
	    $end_time2 = SqlFilter($_REQUEST["end_time"],"tab");
    }
    if($start_time != "" && $end_time != ""){
        $sqlss = $sqlss . " and times between '".$start_time."' and '".$end_time."'";
    }
    if($_REQUEST["branch"] != ""){
        $sqlss = $sqlss . " and owner_branch = '" .SqlFilter($_REQUEST["branch"],"tab"). "'";
    }
    if($_REQUEST["ty"] != ""){
        if($_REQUEST["ty"] == "1"){
            $sqlss = $sqlss . " and video_an = 'all'";
        }elseif($_REQUEST["ty"] == "2"){
            $sqlss = $sqlss . " and video_an <> 'all'";
        }
    }

    // 總數量
    $sqls2 = "SELECT ".$sqlv2." as total_size FROM teach_video_log Where 1=1";
    $sqls2 = $sqls2 . $sqlss;

    $rs = $SPConn->prepare($sqls2);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if(!$result || $result["total_size"] == 0){
        $total_size = 0;
    }else{
        if( $_REQUEST["vst"] == "full" ){
            $total_size = $result["total_size"]; //總筆數
        }else{
            if($result["total_size"] > 500 ) {
                $total_size =  500; //限制到500筆
            }else{
                $total_size =  $result["total_size"];
            }   
        }
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
    // sql
    $sqls = "SELECT ".$sqlv." FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM teach_video_log Where 1=1";
    $sqls = $sqls . $sqlss . " order by times desc ) t1 order by times) t2 order by times desc";
    
    if( $_REQUEST["vst"] == "full" ){
        $total_sizen = $total_size . "　<a href='?vst=n'>[查看前五百筆]</a>";
    }else{
        if( $total_size > 500 ) $total_size = 500;
        $total_sizen = $total_size . "　<a href='?vst=full'>[查看完整清單]</a>";
    } 
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="teach_video.php">教學影片</a></li>
            <li class="active">授權及影片播放記錄</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>授權及影片播放記錄 - 數量：<?php echo $total_sizen; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form name="form1" method="post" class="form-inline" action="?vst=full">
                        　 記錄時間： <input type="text" name="start_time" id="start_time" class="datepicker" autocomplete="off" value="<?php echo $start_time2; ?>">　～　<input type="text" name="end_time" id="end_time" class="datepicker" autocomplete="off" value="<?php echo $end_time2; ?>">
                        <select name="branch" id="branch">
                            <option value="">所有會館</option>
                            <?php
                                $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' and admin_name<>'好好玩旅行社' Order By admin_SOrt";
                                $rs = $SPConn->prepare($SQL);
                                $rs->execute();
                                $result=$rs->fetchAll(PDO::FETCH_ASSOC);                                
                                foreach($result as $re){                                    
                                    if($_REQUEST["branch"] == $re["admin_name"]){
                                        echo "<option value='".$re["admin_name"]."' selected>".$re["admin_name"]."</option>";
                                    }else{
                                        echo "<option value='".$re["admin_name"]."'>".$re["admin_name"]."</option>";
                                    }
                                }
                            ?>
                        </select>
                        <select name="ty" id="ty">
                            <option value="">所有類型</option>
                            <option value="1"<?php if($_REQUEST["ty"] == "1") echo " selected"; ?>>授權設定</option>
                            <option value="2"<?php if($_REQUEST["ty"] == "2") echo " selected"; ?>>影片播放</option>
                        </select>
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>記錄</th>
                            <th width=100>區域</th>
                            <th width=200>記錄人</th>
                            <th width=180>日期</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $rs = $SPConn->prepare($sqls);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if($result){
                                foreach($result as $re){ ?>
                                    <tr> 
                                        <td align="left"><?php echo $re["txt"]; ?></td>
                                        <td align="left"><?php echo $re["video_types"]; ?></td>
                                        <td align="left"><?php echo $re["owner_branch"]; ?>-<?php echo $re["owner_name"]; ?>[<?php echo $re["owner"]; ?>]</td>
                                        <td align="left"><?php echo changeDate($re["times"]); ?></td>    
                                    </tr>
                                <?php }
                            }else{
                                "<tr><td colspan=8 height=200>目前沒有資料</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
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
require_once("./include/_bottom.php");
?>
