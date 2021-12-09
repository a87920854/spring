<?php
    /*****************************************/
    //檔案名稱：ad_fun_action_list2.php
    //後台對應位置：好好玩管理系統/好好玩國外團控
    //改版日期：2021.12.8
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

    // 刪除國外活動並刪除圖檔(待測試刪除圖檔)
    if($_REQUEST["st"] == "del"){
        $SQL = "SELECT * FROM actionf_data WHERE ac_auto = ".SqlFilter($_REQUEST["ac"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $SQL2 = "DELETE FROM actionf_data WHERE ac_auto = ".SqlFilter($_REQUEST["ac"],"int");
            $rs2 = $FunConn->prepare($SQL2);
            $rs2->execute();
            if($rs2){
                if($result["ac_pic"] != ""){
                    DelFile("webfile/funtour/upload_image/".$result["ac_pic"]);
                }
                reURL("win_close.php?m=刪除中...");
                exit();       
            }
        }
    }

    $default_sql_num = 500; // 初始查詢數字    
    if( $_REQUEST["vst"] == "full" ){
        $sqlv = "*";
        $sqlv2 = "count(ac_auto)";        
    }else{
        $sqlv = "top " .$default_sql_num. " *";
        $sqlv2 = "count(ac_auto)";
    }

    if($_REQUEST["a1"] != ""){
        $kt1 = $_REQUEST["a1"]."/".$_REQUEST["a2"]."/1 00:01";
        if(!chkDate($kt1)){
            call_alert("起始日期不正確。",0,0);
        }
    }
    if($_REQUEST["b1"] != ""){
        $kt2 = $_REQUEST["b1"]."/".$_REQUEST["b2"]."/1";
        if(!chkDate($kt2)){
            $kt2 = strtotime($kt2."-1 day");
            $kt2 = strtotime($kt2."+1 month");
            $kt2 = date("Y/m/d",$kt2) . " 23:59";
        }else{
            call_alert("結束日期不正確。",0,0);
        }
    }
    if($_REQUEST["a3"] != ""){
        $kt3 = $_REQUEST["a3"]."/".$_REQUEST["a4"]."/1 00:01";
        if(!chkDate($kt3)){
            call_alert("起始日期不正確。",0,0);
        }
    }
    if($_REQUEST["b3"] != ""){
        $kt4 = $_REQUEST["b3"]."/".$_REQUEST["b4"]."/1";
        if(!chkDate($kt4)){
            $kt4 = strtotime($kt4."-1 day");
            $kt4 = strtotime($kt4."+1 month");
            $kt4 = date("Y/m/d",$kt4) . " 23:59";
        }else{
            call_alert("結束日期不正確。",0,0);
        }
    }

    // 以類型搜尋
    if($_REQUEST["s1"]){
        $sqlss = $sqlss . " and ac_kind = '".SqlFilter($_REQUEST["s1"],"tab")."'";
    }
    // 以類型搜尋
    if($_REQUEST["t"]){
        $sqlss = $sqlss . " and stype = '".SqlFilter($_REQUEST["t"],"tab")."'";
    }
    // 以標題搜尋
    if($_REQUEST["s3"]){
        $sqlss = $sqlss . " and ac_title like '%" + str_replace("'", "''", $_REQUEST["s3"]) + "%'";
    }

    if( $_REQUEST["s21"] != "" && $_REQUEST["s22"] != "" ){
        if( chkDate($_REQUEST["s21"]) && chkDate($_REQUEST["s22"]) ){
            $kt1 = SqlFilter($_REQUEST["s21"],"tab"). " 00:00";
            $kt2 = SqlFilter($_REQUEST["s22"],"tab"). " 23:59"; 
        }        
    }
    // 以活動時間段搜尋
    if(chkDate($kt1) && chkDate($kt2)){        
        if(strtotime($kt1) > strtotime($kt2)){
            call_alert("結束日期不能小於起始日期。", 0, 0);
        }
        $sqlss = $sqlss . " and ac_time between '".$kt1."' and '".$kt2."'";
    }

    // 只取全部的筆數
	$sqls2 = "SELECT ".$sqlv2." as total_size FROM actionf_data WHERE  1=1";
    // 總筆數SQL
    $sqls2 = $sqls2 . $sqlss;
    // 查詢總筆數
    $rs = $FunConn->prepare($sqls2);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if (!$result){
        $total_size = 0;
    }else{
        if( $_REQUEST["vst"] == "full" ){
            $total_size = $result["total_size"]; //總筆數
        }else{
            if($result["total_size"] > 500 ) {
                $total_size =  500;
            }else{
                $total_size =  $result["total_size"];
            }  
        }
    }

    $tPage = 1; //目前頁數
    $tPageSize = 50; //每頁幾筆
	if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
	$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
	if ( $tPageSize*$tPage < $total_size ){
		$page2 = 50;
	}else{
		$page2 = (50-(($tPageSize*$tPage)-$total_size));
	}

    // SQL
    $sqls = "SELECT ".$sqlv." FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM actionf_data WHERE 1=1";
    $sqls = $sqls . $sqlss ." order by ac_auto desc ) t1 order by ac_auto) t2 order by ac_auto desc";

    if($_REQUEST["vst"] == "full"){
        $total_sizen = $total_size . "　<a href='?vst=n&s99=".$_REQUEST["s99"]."'>[查看前五百筆]</a>";
    }else{
        if( $total_size > 500 ) $total_size = 500;
        $total_sizen = $total_size . "　<a href='?vst=full&s99=".$_REQUEST["s99"]."'>[查看完整清單]</a>";
    }

    switch($_REQUEST["t"]){
        case "FUN旅遊":
            $stype = "FUN旅遊";
            $t1 = "<a href='ad_fun_action_list2.php?t=1'>好好玩國外團控-FUN旅遊</a>";
            break;
        case "LOVE旅遊":
            $stype = "LOVE旅遊";
            $t1 = "<a href='ad_fun_action_list2.php?t=2'>好好玩國外團控-LOVE旅遊</a>";
            break;
        default:
            $stype = "FUN旅遊&LOVE旅遊";
            $t1 = "<a href='ad_fun_action_list2.php'>好好玩國外團控-FUN旅遊&LOVE旅遊</a>";
    }
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active"><?php echo $t1; ?></li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>國外旅遊列表 - <?php echo $stype; ?> - 數量：<?php echo $total_sizen ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <?php 
                        if($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["funtourpm"] == "1"){ ?>
                            <a href="ad_fun_action_fast.php" class="btn btn-warning margin-bottom-10"><i class="icon-volume-up"></i> 出團情報</a>
                        <?php }
                    ?>
                    <a href="ad_fun_action_list2_add.php" class="btn btn-info margin-bottom-10"><i class="icon-plus-sign"></i> 新增國外旅遊</a>

                    <form id="searchform" action="ad_fun_action_list2.php?vst=full" method="post" target="_self" class="form-inline" onsubmit="return check_send_submit()">
                        <table class="table table-striped table-bordered bootstrap-datatable">
                            <tr>
                                <td>類型：
                                    <select name="t">
                                        <option value="">所有類型</option>
                                        <option value="LOVE旅遊">LOVE旅遊</option>
                                        <option value="FUN旅遊">FUN旅遊</option>
                                    </select>
                                </td>
                                <td>活動時間：<input name="s21" id="s21" type="text" class="datepicker" autocomplete="off">～<input name="s22" id="s22" type="text" class="datepicker" autocomplete="off"></td>
                                <td>活動標題：<input name="s3" type="text" class="form-control"></td>
                                <td><input type="submit" value="搜尋" class="btn btn-default"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th></th>
                            <th width=70>類型</th>
                            <th width=70>活動類型</th>
                            <th width=70>旅遊國家</th>
                            <th>活動標題</th>
                            <th width=500></th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                            $rs = $FunConn->prepare($sqls);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(!$result){
                                echo "<tr><td colspan=8 height=200>目前沒有資料</td></tr>";
                            }else{
                                foreach($result as $re){
                                    $ac_travel_size = 0;
                                    $SQL = "select count(auton) as tt from travel_data where ac_auto = ".$re["ac_auto"];
                                    $rs2 = $FunConn->prepare($SQL);
                                    $rs2->execute();
                                    $result2 = $rs2->fetch(PDO::FETCH_ASSOC);
                                    if($result2){
                                        $ac_travel_size = $result2["tt"];
                                    }
                                    if($ac_travel_size > 0){
                                        $turl = "<a href=\"http://www.funtour.com.tw/otravel.asp?id=".$re["ac_auto"]."\">http://www.funtour.com.tw/otravel.asp?id=".$re["ac_auto"]."</a>";
                                    }else{
                                        $turl = "<font color=red>尚未設定行程</font>";
                                    } ?>
                                    <tr>
                                        <td class="center"><a href="webfile/funtour/upload_image/<?php echo $re["ac_pic"]; ?>" class="fancybox"><img src="webfile/funtour/upload_image/<?php echo $re["ac_pic"]; ?>" border=0 width=90 height=60></a></td>
                                        <td class="center"><?php echo $re["stype"]; ?></td>
                                        <td class="center"><?php echo $re["ac_kind"]; ?></td>
                                        <td class="center"><?php echo $re["skingdom"]; ?></td>
                                        <td class="center"><a href="ad_fun_action_list2_date.php?ac=<?php echo $re["ac_auto"]; ?>"><?php echo $re["ac_title"]; ?></a></td>
                                        <td class="center">
                                            <?php 
                                                $ac_auto = $re["ac_auto"];
                                                $SQL = "select top 3 * from travel_date where ac_auto=".$ac_auto." and datediff(d, dates, '".date("Y-m-d")."') <= 0 order by dates asc";
                                                $rs2 = $FunConn->prepare($SQL);
                                                $rs2->execute();
                                                $result2 = $rs2->fetch(PDO::FETCH_ASSOC);
                                                if($result2){
                                                    $dates = date("Y-m-d",strtotime($result2["dates"]));
                                                    $dates2 = $dates;
                                                    $aa = 0;
                                                    $SQL = "select count(k_id) as tt from love_keyin where ac_auto=".$ac_auto." and all_kind='國外旅遊' and datediff(d, action_time, '".$dates."') = 0";
                                                    $rs3 = $FunConn->prepare($SQL);
                                                    $rs3->execute();
                                                    $result3 = $rs3->fetch(PDO::FETCH_ASSOC);
                                                    if($result3){
                                                        $aa = $result3["tt"];
                                                    }
                                                    if($result2["keep"] == "1"){
                                                        $dates = "<s>".$dates."</s>";
                                                    }
                                                    echo "<div style=line-height:20px;'>";
                                                    echo "<a href='ad_fun_action_list_singup2.php?ac=".$ac_auto."&da=".$dates2."'>報名 " .$aa. " 人</a>";
                                                    echo "</div>";
                                                }
                                                echo $turl;
                                            ?>
                                        </td>
                                        <td class="center">
                                            <div class="btn-group">							
                                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                                <ul class="dropdown-menu pull-right">
                                                    <?php 
                                                        if($ac_travel_size > 0){
                                                            echo "<li><a href='http://funtour.com.tw/otravel.php?id=".$re["ac_auto"]."' target='_blank'><i class='icon-file'></i> 詳細</a></li>";
                                                        }
                                                    ?>
                                                        <li><a href="ad_fun_action_list2_date.php?ac=<?php echo $re["ac_auto"]; ?>"><i class="icon-file"></i> 報名/花絮</a></li>
                                                    <?php 
                                                        if($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["funtourpm"] == "1"){
                                                            echo "<li><a href='ad_fun_action_list2_set.php?ac=".$re["ac_auto"]."'><i class='icon-th-list'></i> 行程頁設計</a></li>";
                                                            echo "<li><a href='ad_fun_action_list2_add.php?ac=".$re["ac_auto"]."'><i class='icon-edit'></i> 修改</a></li>";
                                                        }
                                                        if($_SESSION["MM_UserAuthorization"] == "admin"){
                                                            echo "<li><a href='#' onClick=\"Mars_popup2('ad_fun_action_list2.php?st=del&ac=".$re["ac_auto"]."','','width=300,height=200,top=100,left=100')\"><i class='icon-trash'></i> 刪除</a></li>";
                                                        }
                                                    ?>
                                                </ul>
                                            </div>
                                        </td>
                                <?php }
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


    <hr>
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    $(function() {

    });

    function check_send_submit() {
        if (($("#s21").val() && !$("#s22").val()) || ($("#s22").val() && !$("#s21").val())) {
            alert("請正確選擇活動時間的兩個區間時間。");
            return false;
        }
        if ($("#s21").val() && $("#s22").val()) {
            if ($("#s21").val() > $("#s22").val()) {
                alert("起始活動時間不可以比結束活動時間大。");
                return false;
            }
        }

        return true;
    }
</script>