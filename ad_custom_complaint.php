<?php
	error_reporting(0); 
	/*****************************************/
	//檔案名稱：ad_custom_complaint.php
	//後台對應位置：名單/發送記錄>客服資料中心(客戶申訴)
	//改版日期：2021.10.26
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");

    if ( SqlFilter($_REQUEST["st"],"tab") == "cancel" ){
        if ( SqlFilter($_REQUEST["an"],"tab") != "" ){
            $SQL_d = "Delete From system_sign Where auton='".SqlFilter($_REQUEST["an"],"tab")."'";
            $rs_d = $SPConn->prepare($SQL_d);
            $rs_d->execute();
        }
        header("location:win_close.php?m=取消申請");
        exit;
    }

    //sqlv2 = "count(auton)"

    //SQL語法
    if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
        $subSQL1 = " types='main'";
    }elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
        $subSQL1 = " types='main' And (mem_branch='".$_SESSION["branch"]."' Or fix_branch='".$_SESSION["branch"]."')";
    }else{
        $subSQL1 = " types='main' And (mem_single='".strtoupper($_SESSION["MM_username"])."' Or fix_single='".strtoupper($_SESSION["MM_username"])."')";
    }

    //關鍵字
    if ( SqlFilter($_REQUEST["keyword"],"tab") != "" ){
        $keyword = SqlFilter($_REQUEST["keyword"],"tab") ;
        $subSQL2 = " And (num Like '%".$keyword."%' Or cname Like '%".$keyword."%' Or cphone Like '%".$keyword."%' Or cphone2 Like '%".$keyword."%')";
    }

    //開始日期
    if ( SqlFilter($_REQUEST["start_time"],"tab") != "" ){
        $start_time = SqlFilter($_REQUEST["start_time"],"tab") . " 00:00";
        $start_time2 = SqlFilter($_REQUEST["start_time"],"tab");
        if ( chkDate($start_time) == false ){
            call_alert("建立日期有誤。", 0, 0);
        }
    }

    //結束日期
    if ( SqlFilter($_REQUEST["end_time"],"tab") != "" ){
        $end_time = SqlFilter($_REQUEST["end_time"],"tab") . " 23:59";
        $end_time2 = SqlFilter($_REQUEST["end_time"],"tab");
        if ( chkDate($end_time) == false ){
            call_alert("建立日期有誤。", 0, 0);
        }
    }

    //日期
    if ( chkDate($start_time) And chkDate($end_time) ){
        $subSQL3 = " And times Between '".$start_time."' And '".$end_time."'";
    }

    //會館
    if ( SqlFilter($_REQUEST["branch"],"tab") != "" ){
        $branch = SqlFilter($_REQUEST["branch"],"tab");
        $subSQL4 = " And (mem_branch='".$branch."' Or fix_branch='".$branch."')";
    }

    switch (SqlFilter($_REQUEST["s"],"tab") ){
        case "2";
            $subSQL5 = " And stats = 2";
            $titleicon2 = "<i class='fa fa-arrow-right'></i>";
            break;
        case "0":
            $titleicon3 = "<i class='fa fa-arrow-right'></i>";
            break;
        default:
            $subSQL5 = " And stats = 0";
            $titleicon1 = "<i class='fa fa-arrow-right'></i>";
    }

    //組合SQL語法
    $SQL = "Select * From ad_custom_complaint Where".$subSQL1.$subSQL2.$subSQL3.$subSQL4.$subSQL5." Order By stats Asc, times Desc";

    //取得總筆數
	$SQL = "Select count(auton) As total_size From ad_custom_complaint Where".$subSQL1.$subSQL2.$subSQL3.$subSQL4.$subSQL5;
	$rs = $SPConn->prepare($SQL);
	$rs->execute();
	$result=$rs->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $re);
	if ( count($result) == 0 || $re["total_size"] == 0 ) {
		$total_size = 0;
	}else{
		$total_size = $re["total_size"];
	}

    //取得分頁資料
    $tPageSize = 20; //每頁幾筆
    $tPage = 1; //目前頁數
    if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
    $tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
    if ( $tPageSize*$tPage < $total_size ){
        $page2 = 20;
    }else{
        $page2 = (20-(($tPageSize*$tPage)-$total_size));
    }

    //分頁語法
	$SQL_list  = "Select * From (";
	$SQL_list .= "Select TOP ".$page2." * From (";
	$SQL_list .= "Select TOP ".($tPageSize*$tPage)." * From ad_custom_complaint Where".$subSQL1.$subSQL2.$subSQL3.$subSQL4.$subSQL5." Order By stats Asc,  times Desc) t1 ";
    $SQL_list .= "Where".$subSQL1.$subSQL2.$subSQL3.$subSQL4.$subSQL5." Order By stats Asc,  times Desc) t2 ";
    $SQL_list .= "Where".$subSQL1.$subSQL2.$subSQL3.$subSQL4.$subSQL5." Order By stats Asc,  times Desc";
	$rs_list = $SPConn->prepare($SQL_list);
	$rs_list->execute();
	$result_list=$rs_list->fetchAll(PDO::FETCH_ASSOC);

    //會館資料
    $SQL = "Select * From branch_data Where auto_no<>10 Order By admin_Sort";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result=$rs->fetchAll(PDO::FETCH_ASSOC);
?>
<script type="text/JavaScript" src="./include/script.js"></script>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">客戶申訴</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>客戶申訴<?php echo $all_type; ?> - 數量：<?php echo $total_size; ?></strong><!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <p>
                <form id="searchform" action="ad_custom_complaint.php" method="post" target="_self" class="form-inline">
                    <a class="btn btn-info" href="ad_custom_complaint_add.php">建立案件</a>

                    <input type="text" name="start_time" id="start_time" class="datepicker" autocomplete="off" value="" placeholder="建立日期開始">　～　<input type="text" name="end_time" id="end_time" class="datepicker" autocomplete="off" value="" placeholder="建立日期結束">

                    <select name="branch" id="branch" class="form-control">
                        <option value="">請選擇會館</option>
                        <?php
                        foreach($result as $re){
                            echo "<option value='".$re["admin_name"]."'>".$re["admin_name"]."</option>";
                        } ?>
                    </select>
                    <input id="keyword" name="keyword" id="keyword" class="form-control" type="text" placeholder="編號 / 姓名 / 手機" value="">
                    <input type="hidden" name="s" value="">
                    <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                    </p>
                    <p>
                        <a class="btn btn-success" href="ad_custom_complaint.php?s=1"><i class="fa fa-arrow-right"></i>未結案</a>
                        <a class="btn btn-success" href="ad_custom_complaint.php?s=2">已結案</a>
                        <a class="btn btn-success" href="ad_custom_complaint.php?s=0">所有案件</a>
                </form>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width=140>建立時間</th>
                            <th width=180>案件編號</th>
                            <th width=180>客戶</th>
                            <th width=160>秘書</th>
                            <th width=120>狀態</th>
                            <th width=60></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ( count($result_list) == 0 ){ ?>
                            <tr><td colspan="8" height="200">目前沒有資料</td></tr>
                        <?php }else{
                            foreach($result_list as $re_list){ 
                                $stats = $re["stats"];
					            $cancelbtn = 0; ?>
                                <tr>
                                    <td class="center"><?php echo Date_EN($re_list["times"],9); ?></td>
                                    <td class="center"><a href="ad_custom_complaint_detail.php?id=<?php echo $re_list["num"]; ?>"><?php echo $re_list["num"]; ?></a></td>
                                    <td class="center"><?php echo $re_list["cname"]; ?></td>
                                    <td class="center">
                                        <font color="green">建檔：</font><?php echo $re_list["mem_branch"]; ?> - <?php echo $re_list["mem_singlename"]; ?><br>
                                        <font color=green>處理：</font><?php echo $re_list["fix_branch"]; ?> - <?php echo $re_list["fix_singlename"]; ?>
                                    </td>                  
                                    <td class="center"><?php echo custom_complaint_stats($re_list["stats"]); ?></td>
      	                            <td class="center">      		
      		                            <a href="ad_custom_complaint_detail.asp?id=<?php echo $re_list["num"]; ?>" class="btn btn-xs btn-default">詳細</a>
      	                            </td>    
                                </tr>
                        <?php }}?>
                    </tbody>
                </table>
            </div>
            <?php require_once("./include/_page.php"); ?>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->

<?php require_once("./include/_bottom.php");?>