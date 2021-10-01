<?php	
	require_once("./include/_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");
	
	if ( $_Request["st"] == "keepconnect" ){
		$_SESSION["keepconnect"] = 1;
		echo "1";
		exit;
	}
	
	if ( $_Request["st"] == "cancelkeepconnect" ){
		$_SESSION["keepconnect"] = 0;
		echo "0";
		exit;
	}
	
	if ( $_SESSION["MM_Username"] == "" ){ call_alert("請重新登入。","login.php",0);}
	
	$thisday = date("D");
	$thismonth = date("M");
	$thisyear = date("Y");
	$thisdate = date("Y/m/d");
					
	//會員人數
	$memsize = 0; //變數(會員人數)
	$SQL = "Select no From ad_index_data Where types='mem' And datediff(d, times, '".$thisdate."') = 0)";
	$rs = $SPConn->prepare($SQL);
	$rs->execute();
	$result=$rs->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $re);
	if ( count($result) > 0 ) {
		$memsize = $re["no"];
	}else{
		$SQL = "Select count(mem_auto) As memsize From member_data Where mem_level='mem'";
		$rs1 = $SPConn->prepare($SQL);
		$rs1->execute();
		$result1=$rs1->fetchAll(PDO::FETCH_ASSOC);
		foreach($result1 as $re1);
		if ( count($result1) > 0 ) {
			$memsize = $re1["memsize"];
		}
		$SQL = "Select * From ad_index_data Where types='mem' And times='".$thisdate."'";
		$rs1 = $SPConn->prepare($SQL);
		$rs1->execute();
		$result1=$rs1->fetchAll(PDO::FETCH_ASSOC);
		foreach($result1 as $re1);
		if ( count($result1) == 0 ) {
			//新增ad_index_data
			$SQL  = "Insert Into ad_index_data(no, times, types) Values ( '";
			$SQL .= SqlFilter($memsize,"str")."',";
			$SQL .= "'".SqlFilter($thisdate,"str")."',";
			$SQL .= "'mem')";
			$rsa = $SPConn->prepare($SQL);
			$rsa->execute();
		}
	}
	
	//尚未開發
	$SQL = "Select count(mem_auto) As nob from member_data As dba Where mem_single='".$_SESSION["MM_Username"]."' And mem_level='guest' And mem_time >= '2015/01/01' And (Select count(log_auto) From log_data Where log_1 = dba.mem_mobile and log_single=dba.mem_single) < 1";
	$rs = $SPConn->prepare($SQL);
	$rs->execute();
	$result=$rs->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $re);
	if ( count($result) > 0 && $re["nob"] > 0 ) {
		$nokaifa = $re["nob"];
		$url = "ad_no_mem.php?s=nokaifa&u=".$_SESSION["MM_Username"];
	}else{
		$nokaifa = 0;
		$url = "javascript:void();";
	}
	
	//跑馬燈
	$SQL = "Select Top 20 * From pay_single Where ps_total > 5000 Order By ps_auto Desc";
	$rs = $SPConn->prepare($SQL);
	$rs->execute();
	$result=$rs->fetchAll(PDO::FETCH_ASSOC);
	if ( count($result) > 0 ) {
		foreach( $result as $re ){
			$msge = $msge."【".$re["ps_branch"]."】".$re["ps_sec"]." 成交 ".FormatCurrency($re["ps_total"])."&nbsp&nbsp(".$re["ps_year"]."/".$re["ps_month"]."/".$re["ps_date"].")、";
		}
	}
	
	//年度業績表 year
	if ( SqlFilter($_REQUEST["years"],"str") != "" ){
		$years = SqlFilter($_REQUEST["years"],"str");
	}else{
		$years = date("Y");
	}
	
	//年度業績表 user
	if ( $_SESSION["p_user2"] != "" ){
		$p_user = $_SESSION["p_user2"];
	}else{
		$p_user = $_SESSION["MM_Username"];
	}
	
	//年度業績表 query
	if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
		$SQL  = "Select ";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 1 THEN pb_total END), 0) AS m1,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 2 THEN pb_total END), 0) AS m2,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 3 THEN pb_total END), 0) AS m3,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 4 THEN pb_total END), 0) AS m4,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 5 THEN pb_total END), 0) AS m5,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 6 THEN pb_total END), 0) AS m6,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 7 THEN pb_total END), 0) AS m7,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 8 THEN pb_total END), 0) AS m8,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 9 THEN pb_total END), 0) AS m9,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 10 THEN pb_total END), 0) AS m10,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 11 THEN pb_total END), 0) AS m11,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 12 THEN pb_total END), 0) AS m12 ";
		$SQL .= "From pay_branch As a Where pb_year='".$years."' And pb_reb <> '廈門'";
	}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" ){
		$SQL  = "Select ";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 1 THEN pb_total END), 0) AS m1,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 2 THEN pb_total END), 0) AS m2,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 3 THEN pb_total END), 0) AS m3,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 4 THEN pb_total END), 0) AS m4,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 5 THEN pb_total END), 0) AS m5,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 6 THEN pb_total END), 0) AS m6,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 7 THEN pb_total END), 0) AS m7,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 8 THEN pb_total END), 0) AS m8,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 9 THEN pb_total END), 0) AS m9,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 10 THEN pb_total END), 0) AS m10,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 11 THEN pb_total END), 0) AS m11,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 12 THEN pb_total END), 0) AS m12 ";
		$SQL .= "From pay_branch As a Where pb_year='".$years."' And pb_reb='".$_SESSION["branch"]."'";
	}else{
		$SQL  = "Select ";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 1 THEN ps_total END), 0) AS m1,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 2 THEN ps_total END), 0) AS m2,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 3 THEN ps_total END), 0) AS m3,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 4 THEN ps_total END), 0) AS m4,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 5 THEN ps_total END), 0) AS m5,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 6 THEN ps_total END), 0) AS m6,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 7 THEN ps_total END), 0) AS m7,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 8 THEN ps_total END), 0) AS m8,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 9 THEN ps_total END), 0) AS m9,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 10 THEN ps_total END), 0) AS m10,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 11 THEN ps_total END), 0) AS m11,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 12 THEN ps_total END), 0) AS m12 ";
		$SQL .= "From pay_single As a Where ps_year='".$years."' And ps_id='".$p_user."'";
	}

	$rs_y = $SPConn->prepare($SQL);
	$rs_y->execute();
	$result_y=$rs_y->fetchAll(PDO::FETCH_ASSOC);
	foreach($result_y as $re_y);
	
	//去年總業績
	if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
		$SQL  = "Select ";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 1 THEN pb_total END), 0) AS m1,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 2 THEN pb_total END), 0) AS m2,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 3 THEN pb_total END), 0) AS m3,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 4 THEN pb_total END), 0) AS m4,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 5 THEN pb_total END), 0) AS m5,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 6 THEN pb_total END), 0) AS m6,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 7 THEN pb_total END), 0) AS m7,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 8 THEN pb_total END), 0) AS m8,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 9 THEN pb_total END), 0) AS m9,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 10 THEN pb_total END), 0) AS m10,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 11 THEN pb_total END), 0) AS m11,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 12 THEN pb_total END), 0) AS m12 ";
		$SQL .= "From pay_branch As a Where pb_year='".($years-1)."' And pb_reb <> '廈門'";
	}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" ){
		$SQL  = "Select ";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 1 THEN pb_total END), 0) AS m1,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 2 THEN pb_total END), 0) AS m2,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 3 THEN pb_total END), 0) AS m3,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 4 THEN pb_total END), 0) AS m4,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 5 THEN pb_total END), 0) AS m5,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 6 THEN pb_total END), 0) AS m6,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 7 THEN pb_total END), 0) AS m7,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 8 THEN pb_total END), 0) AS m8,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 9 THEN pb_total END), 0) AS m9,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 10 THEN pb_total END), 0) AS m10,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 11 THEN pb_total END), 0) AS m11,";
		$SQL .= "ISNULL(SUM(CASE WHEN pb_month = 12 THEN pb_total END), 0) AS m12 ";
		$SQL .= "From pay_branch As a Where pb_year='".($years-1)."' And pb_reb='".$_SESSION["branch"]."'";
	}else{
		$SQL  = "Select ";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 1 THEN ps_total END), 0) AS m1,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 2 THEN ps_total END), 0) AS m2,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 3 THEN ps_total END), 0) AS m3,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 4 THEN ps_total END), 0) AS m4,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 5 THEN ps_total END), 0) AS m5,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 6 THEN ps_total END), 0) AS m6,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 7 THEN ps_total END), 0) AS m7,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 8 THEN ps_total END), 0) AS m8,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 9 THEN ps_total END), 0) AS m9,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 10 THEN ps_total END), 0) AS m10,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 11 THEN ps_total END), 0) AS m11,";
		$SQL .= "ISNULL(SUM(CASE WHEN ps_month = 12 THEN ps_total END), 0) AS m12 ";
		$SQL .= "From pay_single As a Where ps_year='".($years-1)."' And ps_id='".$p_user."'";
	}
	$rs_by = $SPConn->prepare($SQL);
	$rs_by->execute();
	$result_by=$rs_by->fetchAll(PDO::FETCH_ASSOC);
	foreach($result_by as $re_by);	
?>
<!-- MIDDLE -->
<section id="middle">



</section>


<?php
	//前50筆訊息彈跳視窗
	//if ( $_REQUEST["st"] == "read_all_sysmsg" ){
		require_once("./include/_read_index_show.php");
	//}
?>
<div class="modal fade" id="reservation_alert_modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background:#d9534f;">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title" style="color:#fff;font-weight:bold;">預約聯絡提醒</h4>
			</div>
			<div class="modal-body">
				<p>預約聯絡時間前 5 , 1 分均會出現提醒訊息</p>
				<p>本次提醒為 <span id="reservation_alert_modal_mi"></span> 分提醒</p>
				<p>預約聯絡時間：<span id="reservation_alert_modal_time"></span></p>
				<p>預約聯絡姓名：<span id="reservation_alert_modal_us"></span></p>
			</div>
			<div class="modal-footer">
				<a href="#close" class="btn btn-default" data-dismiss="modal">關閉</a>
				<a class="btn btn-danger" href="ad_mem_reservation_v.php?t1=2021/9/8&t2=2021/9/8">查看本日預約</a>
			</div>
		</div>
	</div>
</div>
<?php 
	require_once("./include/_bottom.php");
	require("./include/_chart.js");
?>