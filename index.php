<?php	
	require_once("./include/_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");
	echo "TEST";
	
	echo "Queena Test";
	
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
	<div id="content" class="padding-20">
		<!-- BOXES -->
		<div class="row">
		
			<!-- Feedback Box -->
			<div class="col-md-3 col-sm-6">
				<!-- BOX -->
				<div class="box danger">
					<!-- default, danger, warning, info, success -->
					<div class="box-title">
						<!-- add .noborder class if box-body is removed -->
						<h4><?php echo date("Y");?> 年度目標 200,000,000</h4>
						<small class="block">專注追求，再創新高</small>
						<i class="fa fa-bar-chart-o"></i>
					</div>
				</div>
				<!-- /BOX -->
			</div>

			<!-- Profit Box -->
			<div class="col-md-3 col-sm-6">
				<!-- BOX -->
				<div class="box warning">
					<!-- default, danger, warning, info, success -->
					<div class="box-title">
						<!-- add .noborder class if box-body is removed -->
						<h4><a href="ad_mem.php"><?php echo $memsize;?> 位會員</a></h4>
						<small class="block">掌握會員需求，專業服務至上</small>
						<i class="fa fa-user"></i>
					</div>
				</div>
				<!-- /BOX -->
			</div>			

			<!-- Orders Box -->
			<div class="col-md-3 col-sm-6">
				<!-- BOX -->
				<div class="box default">
					<!-- default, danger, warning, info, success -->
					<div class="box-title">
						<!-- add .noborder class if box-body is removed -->
						<h4><a href="<?php echo $url;?>"><?php echo $nokaifa;?> 位尚未開發</a></h4>
						<small class="block">快來看看這些還沒被關心的人吧</small>
						<i class="fa fa-users"></i>
					</div>
				</div>
				<!-- /BOX -->
			</div>

			<!-- Online Box -->
			<div class="col-md-3 col-sm-6">
				<!-- BOX -->
				<div class="box success">
					<!-- default, danger, warning, info, success -->
					<div class="box-title">
						<!-- add .noborder class if box-body is removed -->
						<h4>尚未加入小組</h4>
						<small class="block">團結合作力量大</small>
						<i class="fa fa-comments"></i>
					</div>
				</div>
				<!-- /BOX -->
			</div>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-heading"></div>

			<!-- panel content -->
			<div class="panel-body">
				<div class="alert alert-info nomargin padding-left-10 padding-right-10 padding-top-10 padding-bottom-0">
					<!-- INFO -->
					<marquee scrolldelay="150"><?php echo $msge;?></marquee>
				</div>
				<div class="clearfix height-10"></div>

				<!-- 精英榜new --><?php require_once("./include/_weekly_rank.php"); ?><!-- /精英榜new -->
				
				<div class="table-responsive hidden-sm hidden-xs">
					<p class="hidden-md hidden-lg">手機版可往右滑動</p>
					<table class="table table-striped table-bordered bootstrap-datatable">
						<tr>
							<th><?php echo date("Y");?> 年度業績</th>
							<?php for ( $i=1;$i<=12;$i++ ){?>
								<th><?php echo monthname($i);?></th>
							<?php }?>
						</tr>
						<tr>
							<td width="10%">
								<?php
									if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
										echo "總業績";
									}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" ){
										echo "會館業績";
									}elseif ( $_SESSION["MM_UserAuthorization"] == "manager" ){
										echo "小組業績";
									}else{
										echo $_SESSION["p_other_name"];
									}
									
									if ( $_SESSION["p_user2"] != "" ){
										$p_user = $_SESSION["p_user2"];
									}else{
										$p_user = $_SESSION["MM_Username"];
									}
								?>
							</td>
							<?php 
								for( $i=1;$i<=12;$i++ ){
									echo "<td width='7.5%'>".$re_y["m".$i]."</td>";
									$total_y = $total_y + $re_y["m".$i];
								}
								$totalmax_count = 200000000 - $total_y;
							?>
						</tr>
						</tr>
						<tr>
							<td colspan=13><b>累計：<font color="#DF01D7"><?php echo FormatCurrency($total_y);?></font></b>
							<?php if ( $_SESSION["MM_UserAuthorization"] == "admin" ){ ?>
								&nbsp;&nbsp;&nbsp;<b style="color:blue"><?php echo "$".FormatCurrency("200000000");?> - <?php echo "$".FormatCurrency($total_y);?> = <?php echo "$".FormatCurrency($totalmax_count);?>
							<?php }?>
							</td>
						</tr>
						<tr>
							<td>
								<?php
									if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
										echo "去年總業績";
									}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" ){
										echo "去年業績";
									}elseif ( $_SESSION["MM_UserAuthorization"] == "manager" ){
										echo "去年小組業績";
									}else{
										echo $_SESSION["p_other_name"];
									}
								?>
							</td>
							<?php 
								for( $i=1;$i<=12;$i++ ){
									echo "<td width='7.5%'>".$re_by["m".$i]."</td>";
									$total_by= $total_by + $re_by["m".$i];
								}
							?>
						</tr>
						</tr>
						<tr>
							<td colspan="13">
								累計：$<?php echo "$".FormatCurrency($total_by);?>
								<?php
									if ( $total_y > 0 && $total_by > 0 ){ 
										$totalmax_count = $total_y - $total_by;
										if ( $totalmax_count > 0 ){
											echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
											echo "已比去年進步 ".FormatCurrency($totalmax_count);
										}else{
											echo " - ".FormatCurrency($total_y)." = ";
											echo FormatCurrency(-1*$totalmax_count);
										}
									}
								?>
							</td>
						</tr>
					</table>
				</div>
				
				<!-- for mobile -->
				<table class="table table-striped table-bordered bootstrap-datatable hidden-md hidden-lg">
					<tr>
						<th><?php echo date("Y");?> 年度業績</th>
						<th>
							<?php
								if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
									echo "總業績";
								}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" ){
									echo "會館業績";
								}elseif ( $_SESSION["MM_UserAuthorization"] == "manager" ){
									echo "小組業績";
								}else{
									echo $_SESSION["p_other_name"];
								}
										
								if ( $_SESSION["p_user2"] != "" ){
									$p_user = $_SESSION["p_user2"];
								}else{
									$p_user = $_SESSION["MM_Username"];
								}
							?>
						</th>
					</tr>
					<?php
						$total_y = 0;
						for( $i=1;$i<=12;$i++ ){
							echo "<tr>";
							echo "<td width='50%'>".monthname($i)."</td>";
							echo "<td>".$re_y["m".$i]."</td>";
							echo "</tr>";
							$total_y = $total_y + $re_y["m".$i];
						}
					?>
					<tr>
						<td colspan=13><b>累計：<font color="#DF01D7">$<?php echo FormatCurrency($total_y);?></font></b></td>
					</tr>
					<tr>
						<td>
							<?php
								if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
									echo "去年總業績";
								}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" ){
									echo "去年業績";
								}elseif ( $_SESSION["MM_UserAuthorization"] == "manager" ){
									echo "去年小組業績";
								}else{
									echo $_SESSION["p_other_name"];
								}
							?>
						</td>
						<td>
					</tr>
					<?php
						$total_by = 0;
						for( $i=1;$i<=12;$i++ ){
							echo "<tr>";
							echo "<td width='50%'>".monthname($i)."</td>";
							echo "<td>".$re_by["m".$i]."</td>";
							echo "</tr>";
							$total_by = $total_by + $re_by["m".$i];
						}
					?>
					<tr>
						<td colspan="13">
						累計：$<?php echo "$".FormatCurrency($total_by);?>
						<?php
							if ( $total_y > 0 && $total_by > 0 ){ 
								$totalmax_count = $total_y - $total_by;
								if ( $totalmax_count > 0 ){
									echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
									echo "已比去年進步 ".FormatCurrency($totalmax_count);
								}else{
									echo " - ".FormatCurrency($total_y)." = ";
									echo FormatCurrency(-1*$totalmax_count);
								}
							}
						?>
						</td>
					</tr>
				</table>
				
				<!-- Sin Chart 業績比較曲線圖-->
				<div id="panel-graphs-flot-1" class="panel panel-default">
					<!-- panel content -->
					<div class="panel-body nopadding">
						<div id="flot-sin" class="flot-chart">
							<!-- FLOT CONTAINER -->
						</div>
					</div>
					<!-- /panel content -->
				</div>
				<!-- /Sin Chart -->
				


				<div class="col-md-6">
					<!--公告訊息-->
					<ul class="list-unstyled list-hover slimscroll height-200" data-slimscroll-visible="true">
						<?php
							if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
								$SQL = "Select Top 20 *, (Select times From single_sysmsg_log Where announce_an=single_sysmsg.auton And single='".$_SESSION["MM_Username"]."') As rtime From single_sysmsg Where types='公告訊息'";
							}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" ){
								$SQL = "Select Top 10 *, (Select times From single_sysmsg_log Where announce_an=single_sysmsg.auton And single='".$_SESSION["MM_Username"]."') As rtime From single_sysmsg Where types='公告訊息' And (','+branch+',' Like '%,".$_SESSION["branch"].",%' Or branch Like '%all%') And (look_for Like '%branch%' Or look_for Like '%all%')";
							}elseif ( $_SESSION["MM_UserAuthorization"] == "single" ){
								$SQL = "Select Top 10 *, (Select times From single_sysmsg_log Where announce_an=single_sysmsg.auton And single='".$_SESSION["MM_Username"]."') As rtime From single_sysmsg Where types='公告訊息' And (','+branch+',' Like '%,".$_SESSION["branch"].",%' Or branch Like '%all%') And (look_for Like '%single%' Or look_for Like '%all%')";
							}elseif ( $_SESSION["MM_UserAuthorization"] == "pay" ){
								$SQL = "Select Top 10 *, (Select times From single_sysmsg_log Where announce_an=single_sysmsg.auton And single='".$_SESSION["MM_Username"]."') As rtime From single_sysmsg Where types='公告訊息' And (','+branch+',' Like '%,".$_SESSION["branch"].",%' Or branch Like '%all%') And (look_for Like '%pay%' Or look_for Like '%all%')";
							}elseif ( $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
								$SQL = "Select Top 10 *, (Select times From single_sysmsg_log Where announce_an=single_sysmsg.auton And single='".$_SESSION["MM_Username"]."') As rtime  From single_sysmsg Where types='公告訊息' And (','+branch+',' Like '%,".$_SESSION["branch"].",%' Or branch Like '%all%') And (look_for Like '%love%' Or look_for Like '%all%')";
							}elseif ( $_SESSION["MM_UserAuthorization"] == "action" ){		  
								$SQL = "Select Top 10 *, (Select times From single_sysmsg_log Where announce_an=single_sysmsg.auton and single='".$_SESSION["MM_Username"]."') As rtime  From single_sysmsg Where types='公告訊息' And (','+branch+',' Like '%,".$_SESSION["branch"].",%' Or branch Like '%all%') And (look_for Like '%action%' Or look_for Like '%all%')";		  		  
							}else{
								$SQL = "Select Top 10 *, (Select times From single_sysmsg_log Where announce_an=single_sysmsg.auton And single='".$_SESSION["MM_Username"]."') As rtime  From single_sysmsg where types='公告訊息' And (','+branch+',' Like '%,".$_SESSION["branch"].",%' Or branch Like '%all%') And (look_for Like '%all%')";
							}
							$SQL .= " Order By times Desc";

							$rs = $SPConn->prepare($SQL);
							$rs->execute();
							$result=$rs->fetchAll(PDO::FETCH_ASSOC);
							if ( count($result) == 0 ){ 
								echo "<li>暫無公告訊息</li>";
							}else{
								foreach( $result as $re ){
									$url = "ad_announce_view.asp?id=".$re["auton"];
									$types = "";
									if ( $re["types"] != "" ){
										$types = $re["types"];
									}
									$times = $re["times"];
									$rtime = $re["rtime"];
									
									if ( $rtime != "" ){
										$rtime = changeDate($rtime);
										$rtime = "<a href='#m' class='label label-success' data-toggle='tooltip' data-original-title='".$rtime." 讀取'>已讀</a>";
										$block_style = " style='color:#666'";
									}else{
										$rtime = "<span class='label label-danger'>未讀</span>";
										$block_style = "";
									}?>
									<li>
										<?php echo $rtime;?> <?php echo $types;?> - <a href="<?php echo $url;?>" target="_self"<?php echo $block_style;?>><?php echo $re["msg"];?><small class="margin-left-20">[ <?php echo changeDate($times);?> ]</small></a>
									</li>
								<?php }
							}?>	
					</ul>
					<a class="btn btn-success col-md-12 col-sm-12 col-xs-12 margin-top-10 margin-bottom-10" href="ad_announce.php">點此查看所有公告訊息</a>
					<hr>
				</div>
				<div class="col-md-6">
					<!--訊息通知-->
					<ul class="list-unstyled list-hover slimscroll height-200" data-slimscroll-visible="true">
						<?php
							$showmsgcheck = 0;
							if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "action" ){
								$SQL = "Select Count(photo_auto) As tt From photo_data Outer Apply (Select Top 1 mem_branch, mem_level From member_data Where mem_num = photo_data.mem_num) b Where mem_branch='".$_SESSION["branch"]."' And accept=0 And mem_level='mem'";
								$rs = $SPConn->prepare($SQL);
								$rs->execute();
								$result=$rs->fetchAll(PDO::FETCH_ASSOC);
								foreach( $result as $re );
								if ( count($result) == 0 ){ $showmsgcheck = 1;} ?>
								<li><span class="label label-warning"><i class="fa fa-exclamation size-15"></i></span> 系統訊息 - 照片審核 - <a href="ad_photo_check.asp">目前有 <?php echo $re["tt"];?> 筆網站照片待審核，請點此前往審核照片。</a><small class="margin-left-20">[<?php  echo changeDate(date("Y-m-d H:m:s"));?>]</small></li>
						<?php }?>
					
						<?php
							switch ( $_SESSION["MM_UserAuthorization"] ){
								case "admin":
									$SQL = "Select Top 20 * From single_sysmsg Where types='系統訊息' And reads=0 Order By times Desc";
									break;
								case "branch":
									$SQL = "Select Top 10 * From single_sysmsg Where types='系統訊息' And branch='".$_SESSION["branch"]."' And reads=0 And look_for Like '%branch%' Order By times Desc";
									break;
								case "love":
									$SQL = "Select Top 10 * From single_sysmsg Where types='系統訊息' And branch='".$_SESSION["branch"]."' And reads=0 And look_for Like '%love%' Order By times Desc";
									break;
								default:
									$SQL = "Select Top 10 * From single_sysmsg Where types='系統訊息' And single='".$_SESSION["MM_Username"]."' And reads=0 Order By times Desc";
									break;
							}
							$rs = $SPConn->prepare($SQL);
							$rs->execute();
							$result=$rs->fetchAll(PDO::FETCH_ASSOC);
							if ( count($result) == 0 ){ 
								echo "<li>暫無系統訊息</li>";
							}else{
								foreach( $result as $re ){ 
									if ( $re["url"] != "" ){  $url = $re["url"]; }else{ $rl = "#";}
									$types = "";
									if ( $re["types"] != "" ){ $types = $re["types"];}
									if ( $re["types2"] != "" ){ $types = $types." - ".$re["types2"];}
									$times = $re["times"];
									$aTime = date("Y-m-d");
									$bTime = $times;
									if ( strtotime($aTime) - strtotime($bTime) > 3 ){ $block_style = " style='color:#666'"; }else{ $block_style = "";}
									if ( $_SESSION["MM_UserAuthorization"] == "admin" ){ $towho = "&nbsp;&nbsp;收訊人：".$re["singlename"]; }else{ $towho = "";}
								?>
									<li>
										<span class="label label-warning"><i class="fa fa-exclamation size-15"></i></span>
										<?php echo $types;?> - <a href="<?php echo $url?>" target="_blank"<?php echo $block_style;?>><?php echo $re["msg"]?><small class="margin-left-20">[ <?php echo changeDate($times);?> ]<?php echo $towho?></small></a>
									</li>
								<?php }
							}?>
					</ul>
					<a href="index.php?st=read_all_sysmsg" data-remote="false" data-toggle="modal" data-backdrop="static" data-keyboard="true" data-target="#ajax_load_modal" class="btn btn-success col-md-12 col-sm-12 col-xs-12 margin-top-10 margin-bottom-10">點此查看50筆訊息通知</a>
				</div>
				
				<!--未發送未入會資料-->
				<?php
					if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
						$subSQL = "Select Top 10 * From member_data Where mem_level = 'guest' And send_time2 is null And all_type='未處理'";
						$stxt = "未發送";
					}
			
					if ( $_SESSION["MM_UserAuthorization"] == "branch" ){
						$subSQL = "Select Top 10 * From member_data Where mem_level = 'guest' And (mem_branch='".$_SESSION["branch"]."') And not send_time2 is null And send_time is null And all_type='已發送'";
						$stxt = "未發送";
					}

					if ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "love" ){
						$subSQL = "Select Top 10 * From member_data Where mem_level = 'guest' And (mem_branch='".$_SESSION["branch"]."') And (mem_single='".$_SESSION["MM_Username"]."') And all_type='已發送'";
						$stxt = "未處理";
					}
					
					if ( $SQL <> "" ){
						if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
							$SQL = $subSQL." Order By mem_mobile, mem_auto Desc";
						}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" ){
							$SQL = $subSQL." Order By send_time2 Desc, send_time Desc";
							
						}else{
							$SQL = $subSQL." Order By send_time Desc";
						}
						$rs = $SPConn->prepare($SQL);
						$rs->execute();
						$result=$rs->fetchAll(PDO::FETCH_ASSOC);
						if ( count($result) > 0 ){
				?>
							<div class="bold margin-left-5 padding-bottom-5">未發送未入會資料<small class="hidden-md hidden-lg">&nbsp;&nbsp;&nbsp;&nbsp;手機版可往右滑動</small></div>
							<div class="table-responsive">
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<tr>
											<th>NO.</th>
											<th>資料時間</th>
											<th>資料來源</th>
											<th>編號</th>
											<th>姓名</th>
											<th>性別</th>
											<th>生日</th>
											<th>學歷</th>
											<th>秘書</th>
										</tr>
									</thead>
									<tbody>
									<?php
										$i = 0;
										foreach( $result as $re ){
											$i++;
											if ( $re["mem_cc"] != "" ){ $mem_cc = " [".$re["mem_cc"]."]"; }else{ $mem_cc = ""; }
											if ( $re["mem_name"] != "" ){
												$mem_name = $re["mem_name"];
											}else{ 
												$mem_name = "無姓名";
												if ( $re["mem_mobile"] != "" ){
													$mem_name = $mem_name . "[".$re["mem_mobile"]."]";
												}
											}
											
											$bday = "";
											if ( is_numeric($re["mem_by"]) && $re["mem_by"] > 1911 ){
												$bday = "　".(date("Y")-$re["mem_by"])." 歲";
											}
											$mem_single = "";
											if ( $re["mem_branch"] != "" ){
												$mem_single = "<font color='green'>受理：</font>".$re["mem_branch"]." - ".SingleName($re["mem_single"]);
											}else{
												$mem_single = "";
											}
								 
											if ( $re["love_single"] != "" ){
												$love_single = "<br><font color='green'>排約：</font>".SingleName($re["love_single"]);
											}else{
												$love_single = "";
											}

											if ( $re["call_branch"] != "" ){
												//$call_single = "<br><font color='green'>邀約：</font>".$re["call_branch"]." - ".SingleName($re["call_single"]);
											}else{
												$call_single = "";
											}

											if ( $re["mem_come3"] != "" ){
												$sup_single = "<br><font color='green'>推薦：</font>".$re["mem_come3"]." - ".SingleName($re["mem_come4"]);
											}else{
												$sup_single = "";
											} ?>
											<tr>
												<td><?php echo $i;?></td>
												<td><?php echo Date_EN($re["mem_time"],9);?></td>
												<td><?php echo $re["mem_come"];?><?php if ( $re["mem_come2"] != "" ){ echo "-".$re["mem_come2"];}?><?php echo $mem_cc;?></td>
												<td><?php echo $re["mem_num"];?></td>
												<td><a href="ad_mem_detail.asp?mem_num=<?php echo $re["mem_num"];?>" target="_blank"><?php echo $re["mem_name"];?></a></td>
												<td><?php echo $re["mem_sex"];?></td>
												<td><?php echo $re["mem_by"];?>/<?php echo $re["mem_bm"];?>/<?php echo $re["mem_bd"];?><?php echo $bday;?></td>
												<td><?php echo $re["mem_school"];?></td>
												<td><?php echo $mem_single.$love_single.$call_single.$sup_single?></td>
											</tr>
									<?php }?>										
									</tbody>
								</table>
							</div>
							<a class="btn btn-success col-md-12 col-sm-12 col-xs-12" href="ad_no_mem.asp">點此前往處理所有未發送未入會資料</a><div class="clearfix"></div><hr>
				<?php	} }?>
				
				
				<!--本月約見記錄.ap-->
				<?php
				if ( $_SESSION["MM_UserAuthorization"] == "branch" ){
					$apSQL = "Select Top 10 * From invite Where year(n11)=".date("Y")." And month(n11)=".date("m")." and (branch='".$_SESSION["branch"]."' Or branch3='".$_SESSION["branch"]."')";
				}
				
				if ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "love" ){
					$apSQL = "Select Top 10 * From invite Where year(n11)=".date("Y")." And month(n11)=".date("m")." And (single='".$_SESSION["MM_Username"]."' Or single2='".$_SESSION["MM_Username"]."' Or single3='".$_SESSION["MM_Username"]."') And datediff(DAY, '".date("Y/m/d")."', n11) >= 0";
				}

				if ( $apSQL != "" ){
					$apSQL = $apSQL." Order By n11 Desc";
					$ap_rs = $SPConn->prepare($apSQL);
					$ap_rs->execute();
					$ap_result=$ap_rs->fetchAll(PDO::FETCH_ASSOC);
					if ( count($ap_result) > 0 ){?>
						<div class="bold margin-left-5 padding-bottom-5">本月約見紀錄</div>																				
						<table class="table table-striped table-hover table-bordered">
							<thead>
								<tr>
									<th>NO.</th>
									<th>時間</th>
									<th>姓名</th>
									<th>基本資料</th>
									<th>開發</th>
									<th>邀約</th>
									<th>受理</th>
									<th>狀態</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 0;
							foreach($ap_result as $ap_re){
								$i++;
								$single3name = SingleName($ap_re["single3"]);
								$sts = "";
								switch ($ap_re["stats"]){
									Case 1:
										if ( strstr($single3name,"督導") > 0 || $single3name == "不明" ){
											$sts = "待分配秘書";
										}else{
											$sts = "待回報結果";
										}
										break;
									Case 2:
										if ( $ap_re["n14"] == "1" ){
											$sts = "參加";
										}
										if ( $ap_re["n16"] == "1" ){
											$sts = "未參加";
										}
										break;
									Case 3:
										$sts = "重新約見";
										break;
									Case 4:
										$sts = "重新提醒";
										break;
									Case 5:
										$sts = "已改約 ".$ap_re["n21"]."";
										break;
									Case 6:
										$sts = "未到";
										break;
									default:
										$sts = "待電話提醒";
										break;
								}
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td style="font-size:12px;"><?php echo changeDate($ap_re["n11"]);?></td>
									<td><?php echo $ap_re["n1"];?></td>
									<td><?php echo $ap_re["n3"];?>/<?php echo $ap_re["n4"];?>/<?php echo $ap_re["n5"];?>.<?php echo $ap_re["n6"];?></td>
									<td><?php echo $ap_re["branch"];?> - <?php echo $ap_re["single"].singlename($ap_re["single"]);?></td>
									<td><?php echo SingleName($ap_re["single2"]);?></td>
									<td><?php if ( $ap_re["branch"] != $ap_re["branch3"] ){ echo $ap_re["branch3"] ." - ". $single3name ;}?></td>
									<td><?php echo $sts;?></td>
									<td><a href="ad_invite_d.asp?y=<?php echo date("Y",$ap_re["n11"]);?>&m=<?php echo date("m",$ap_re["n11"]);?>&d=<?php echo date("d",$ap_re["n11"]);?>">查看</a></td>
								</tr>
							<?php }?>
							</tbody>
						</table>
						<div class="clearfix"></div><hr>
				<?php	} } ?>

				
				<!--預約聯絡名單.booking-->
				<?php
				$bookingSQL  = "Select Top 5 * From log_data Outer Apply (Select mem_num, mem_sex,mem_by,mem_bm,mem_bd,mem_school,mem_area,mem_photo From member_data Where mem_auto=log_data.log_num) mm Where ";
				//$bookingSQL .= "log_single='".$_SESSION["MM_Username"]."' And (log_6 <> '' Or Not log_6 is null) And datediff(DAY, '".date("Y/m/d")."', log_6) >= 0 Order By log_6 asc, log_6_time Asc";
				$bookingSQL .= "log_single='S222486977' And (log_6 <> '' Or Not log_6 is null) And datediff(DAY, '".date("Y/m/d")."', log_6) >= 0 Order By log_6 asc, log_6_time Asc";
				$rs_booking = $SPConn->prepare($bookingSQL);
				$rs_booking->execute();
				$result_booking=$rs_booking->fetchAll(PDO::FETCH_ASSOC);
				
				if ( count($result_booking) > 0 ){ ?>
					<div class="bold margin-left-5 padding-bottom-5">預約聯絡名單</div>  
					<table class="table table-striped table-hover table-bordered">									
					<?php
					foreach($result_booking as $re_booking){
						echo "<tr>";
						if ( $re_booking["log_5"] == "member" ){
							$ismember = 1;
							$ahref = "<a href='ad_mem_detail.asp?mem_num=".$re_booking["mem_num"]."' target='_blank'>";
							$log_num = $re_booking["mem_num"];
						}else{
							$ismember = 0;
							$ahref = "<a href='#' onClick='Mars_popup('ad_love_detail.asp?k_id=".$re_booking["log_num"]."','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')'>";
							$log_num = $re_booking["log_num"];
						}
						  								  		
						echo "<td>".$log_num."</td>";
						echo "<td>".$ahref.$re_booking["log_username"]."</a></td>";
						echo "<td>".$re_booking["mem_sex"]."</td>";
						$bday = "";
						if ( is_numeric($re_booking["mem_by"]) && $re_booking["mem_by"] > 1911 ){
							$bday="　".(date("Y")-$re_booking["mem_by"])." 歲";
						}
						echo "<td>".$re_booking["mem_by"]."/".$re_booking["mem_bm"]."/".$re_booking["mem_bd"].$bday."</td>";
						echo "<td>".$re_booking["mem_school"]."</td>";
						echo "<td>".$re_booking["mem_area"]."</td>";
						echo "<td>".$re_booking["log_1"]."</td>";						  		
						
						if ( $re_booking["log_6"] != "" ){
							if ( chkDate($re_booking["log_6_time"])){
								$log_6_time = $re_booking["log_6_time"];
							}else{
								$log_6_time = $re_booking["log_6"]." ".$re_booking["log_6_t"];
							}
							$date1 = date("d");
							$date2 =  date("d",strtotime($re_booking["log_6"]));
							if (  $date2- $date1 >= 0 ){
								if (  $date2 - $date1 == 0 ){
									$td = " style='color:Red'";
								}else{
									$td = "";
								}
								echo "<td".$td.">".date("Y/m/d H:i",strtotime($log_6_time))."</td>";
							}else{
								echo "<td style='text-decoration: line-through'>".date("Y/m/d H:i",strtotime($log_6_time))."</td>";
							}
						}else{
							echo "<td>僅關注</td>";
						}

						$reports = get_report_num($re_booking["log_1"]);
						if ( strstr($reports, "|+|", true) > 0 ){
							$report_array = explode("|+|", $reports);
							$report = $report_array[0];
							$report_text = $report_array[1];
							$report_type = $report_array[2];
							$report_time = $report_array[3];
						}else{
							$report = 0;
							$report_text = "無";
							$report_type = "無";
							$report_time = "";
						}
						?>
						<td><a href="javascript:Mars_popup('ad_report.asp?k_id=<?php echo $re_booking["log_num"];?>&lu=<?php echo $re_booking["log_fid"];?>&ty=<?php echo $re_booking["log_5"];?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')">回報(<?php echo $report;?>)</a>&nbsp;&nbsp;處理情形：<?php echo $report_type;?>-<?php echo $report_time;?></td>
						<?
						echo "<td>".$re_booking["log_branch"]."</td>";
						echo "<td>".SingleName($re_booking["log_single"])."</td>";
						echo "<td>";
						$mem_photo = $re_booking["mem_photo"];
						if ( $mem_photo != "" && ! strstr($mem_photo, "boy.") > 0 && ! strstr($mem_photo, "girl.") > 0 ){
							if ( strstr(mem_photo, "photo/") > 0 ){
								echo "<a href='dphoto/".$mem_photo."?t=".int(rnd()*9999)."' class='fancybox'>有</a>";
							}else{
								echo "<a href='../photo/".$mem_photo."?t=".int(rnd()*9999)."' class='fancybox'>有</a>";
							}
						}else{
							echo "無";
						}
						echo "</td>";
						echo "</tr>";
					}

					echo "</table>";
					echo "<a class='btn btn-success col-md-12 col-sm-12 col-xs-12' href='ad_mem_reservation.asp'>點此前往預約聯絡名單</a>";
					echo "<div class='clearfix'></div><hr>";
				}
				?>
				
				
				<!--即將到期會員(90天).ex-->
				<?php
				//$exSQL = "Select Top 5 * From member_data Where mem_level='mem' And mem_single='".$_SESSION["MM_Username"]."' And Not web_endtime is null And web_endtime Between getdate() And dateadd(DAY, 90, getdate()) Order By web_endtime Asc";
				$exSQL = "Select Top 5 * From member_data Where mem_level='mem' And mem_single='S222486977' And Not web_endtime is null And web_endtime Between getdate() And dateadd(DAY, 90, getdate()) Order By web_endtime Asc";
				$rs_ex = $SPConn->prepare($exSQL);
				$rs_ex->execute();
				$result_ex=$rs_ex->fetchAll(PDO::FETCH_ASSOC);
				if ( count($result_ex) > 0 ){ ?>
					<div class="bold margin-left-5 padding-bottom-5">即將到期會員(90天)</div>  
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>
								<th>NO.</th>
								<th>到期時間</th>
								<th>資料來源</th>
								<th>編號</th>
								<th>姓名</th>
								<th>性別</th>
								<th>生日</th>
								<th>學歷</th>
								<th>秘書</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$i = 0;
						foreach ( $result_ex as $re_ex ){
							$i++;
							if ( $re_ex["mem_cc"] != "" ){
								$mem_cc = " [".$re_ex["mem_cc"]."]";
							}else{
								$mem_cc = "";
							}
							if ( $re_ex["mem_name"] != "" ){
								$mem_name = $re_ex["mem_name"];
							}else{
								$mem_name = "無姓名";
								if ( $re_ex["mem_mobile"] != "" ){
									$mem_name = $mem_name."[".$re_ex["mem_mobile"]."]";
								}
							}
							$bday = "";
							if ( is_numeric($re_ex["mem_by"]) && $re_ex["mem_by"] > 1911 ){
								$bday = "　".(date("Y")-$re_ex["mem_by"])." 歲";
							}
							$mem_single = "";
							if ( $re_ex["mem_branch"] != "" ){
								$mem_single = "<font color='green'>受理：</font>".$re_ex["mem_branch"]." - ".SingleName($re_ex["mem_single"]);
							}else{
								$mem_single = "";
							}
								if ( $re_ex["love_single"] != "" ){
								$love_single = "<br><font color='green'>排約：</font>".SingleName($re_ex["love_single"]);
							}else{
								$love_single = "";
							}
								if ( $re_ex["call_branch"] != "" ){
								$call_single = "<br><font color='green'>邀約：</font>".$re_ex["call_branch"]." - ".SingleName($re_ex["call_single"]);
							}else{
								$call_single = "";
							}
							 
							if ( $re_ex["mem_come3"] != "" ){
								$sup_single = "<br><font color='green'>推薦：</font>".$re_ex["mem_come3"]." - ".SingleName($re_ex["mem_come4"]);
							}else{
								$sup_single = "";
							}?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $re_ex["web_endtime"];?></td>
								<td><?php echo $re_ex["mem_come"];?><?php if ( $re_ex["mem_come2"] != "" ){ echo "-".$re_ex["mem_come2"].$mem_cc;}?></td>
								<td><?php echo $re_ex["mem_num"]?></td>
								<td><a href="ad_mem_detail.asp?mem_num=<?php echo $re_ex["mem_num"];?>" target="_blank"><?php echo $mem_name;?></a></td>
								<td><?php echo $re_ex["mem_sex"];?></td>
								<td><?php echo $re_ex["mem_by"];?>/<?php echo $re_ex["mem_bm"]?>/<?php echo $re_ex["mem_bd"];?><?php echo $bday;?></td>
								<td><?php echo $re_ex["mem_school"];?></td>
								<td><?php echo $mem_single.$love_single.$call_single.$sup_single?></td>
							</tr>
						<?php }?>
						</tbody>
					</table>
				</div>
				<a class="btn btn-success col-md-12 col-sm-12 col-xs-12" href="ad_mem.asp?in90=1&orderby=2">點此前往查看所有即將到期會員</a><div class="clearfix"></div><hr>
				<div class="clearfix"></div><hr>
				<?php }?>
				
				
				<!--小組本月業績-->
				<div class="row">
				<?php
				if ( $_SESSION["team_name"] != "" ){
					$SQL = "Select * From ad_index_data Where types='index_top6' And team_name='".$_SESSION["team_name"]."' And datediff(d, times, '".strtotime($thisdate)."') = 0";;
					$rs = $SPConn->prepare($SQL);
					$rs->execute();
					$result=$rs->fetchAll(PDO::FETCH_ASSOC);
					//foreach($result_grn as $re_grn);
					if ( count($result) == 0 ){
						$SQL1 = "Delete ad_index_data Where types='index_top6' And team_name='".$_SESSION["team_name"]."'";
						$rs1 = $SPConn->prepare($SQL1);
						$rs1->execute();
						$SQL2  = "Select Top 10 sum(ps_total) As singles, p_branch, p_other_name, p_user, p_job2, team_name FROM single_search Where team_name='".$_SESSION["team_name"]."' And ";
						$SQL2 .= "ps_year=".date("Y",strtotime($thisdate))." And ps_month=".date("m",strtotime($thisdate))." Group By p_branch, p_other_name, p_user, p_job2, team_name ORDER BY sum(ps_total) desc";
						$rs2 = $SPConn->prepare($SQL2);
						$rs2->execute();
						$result2=$rs2->fetchAll(PDO::FETCH_ASSOC);
						if ( count($result2) > 0 ){
							$i=0;
							foreach ($result2 as $re2){
								$i++;
								//新增ad_index_data
								$SQL3  = "Insert Into ad_index_data(no, n1, n2, n3, n4, types, times, team_name) Values ( '";
								$SQL3 .= SqlFilter($i,"int")."',";
								$SQL3 .= "'".SqlFilter($_SESSION["branch"],"str")."',";
								$SQL3 .= "N'".SqlFilter($re2["p_other_name"],"str")."',";
								$SQL3 .= "'".SqlFilter($re2["singles"],"str")."',";
								$SQL3 .= "'N".SqlFilter($re2["p_user"],"str")."',";
								$SQL3 .= "'index_top6',";
								$SQL3 .= "'".SqlFilter($thisdate,"str")."',";
								$SQL3 .= "'".SqlFilter($_SESSION["team_name"],"str")."')";
								$rs3 = $SPConn->prepare($SQL3);
								$rs3->execute();
							}
						}
					}

					$nowi = "";
					$SQL = "SELECT * from ad_index_data where types='index_top6' and team_name='".$_SESSION["team_name"]."' and datediff(d, times, '".$thisdate."') = 0 order by no asc";
					$rs = $SPConn->prepare($SQL);
					$rs->execute();
					$result=$rs->fetchAll(PDO::FETCH_ASSOC);
					if ( count($result) > 0 ){
						$i=0;
						foreach($result as $re){
							if ( $re["n4"] == $_SESSION["MM_Username"] ){
								$nowi = "您的排名：".$i;
							}
						}
					}
					?>
					
					<div class="col-md-4">
						<div class="panel panel-default panel-rank">
							<div class="panel-heading text-center">
								<strong>小組 - <?php echo $_SESSION["team_name"];?> - 本月排行</strong>
								<span class="pull-right"><?php echo $nowi?></span>
							</div>
							
							<!-- panel content -->
							<div class="panel-body">
								<table class="table table-striped table-hover table-bordered">
									<tbody>
										<?php
										if ( count($result) > 0 ){
											foreach($result as $re){
												if ( $re["no"] == 1 ){
													echo "<tr style='color:#333333;font-weight:bold;'><td>".$re["no"]."</td><td>".$re["n2"]."</td><td>".FormatCurrency($re["n3"])."</td></tr>";
												}elseif ( $re["no"] == 2 ){
													echo "<tr style='color:#333333;font-weight:bold;'><td>".$re["no"]."</td><td>".$re["n2"]."</td><td>".FormatCurrency($re["n3"])."</td></tr>";
												}elseif ( $re["no"] == 3 ){
													echo "<tr style='color:#333333;font-weight:bold;'><td>".$re["no"]."</td><td>".$re["n2"]."</td><td>".FormatCurrency($re["n3"])."</td></tr>";
												}else{
													echo "<tr><td>".$re["no"]."</td><td>".$re["n2"]."</td><td>".FormatCurrency($re["n3"])."</td></tr>";
												}
											}
										}else{
											echo "<br><br>暫無統計<br><br>";
										}
										?>
									</tbody>
								</table>無業績資料者不顯示											
							</div>
						</div>
					</div>
				<?php }?>
				
				
				<!--會館本月排行-->
				<?php
				$SQL = "SELECT * from ad_index_data where types='index_top1' and n1 = '".$_SESSION["branch"]."' and datediff(d, times, '".$thisdate."') = 0";
				$rs = $SPConn->prepare($SQL);
				$rs->execute();
				$result=$rs->fetchAll(PDO::FETCH_ASSOC);
				if ( count($result) == 0 ){
					$SQL_d = "Delete ad_index_data Where types='index_top1' And n1='".$_SESSION["branch"]."'";
					$rs_d = $SPConn->prepare($SQL);
					$rs_d->execute();
					$SQL1  = "select top 10 sum(ps_total) as singles, p_branch, p_other_name, p_user, b_year, b_month, b_date, j_year, j_month, j_date, p_job2 FROM single_search where p_branch='".$_SESSION["branch"]."' and ";
					$SQL1 .=  "ps_year=".date("Y",strtotime($thisdate))." And ps_month=".date("m",strtotime($thisdate))." GROUP BY p_branch, p_other_name, p_user, b_year, b_month, b_date, j_year, j_month, j_date, p_job2 order by singles DESC";					
					$rs1 = $SPConn->prepare($SQL1);
					$rs1->execute();
					$result1=$rs1->fetchAll(PDO::FETCH_ASSOC);
					$i = 0;
					if ( count($result1) > 0 ){
						$i++;
						foreach($result1 as $re1){
							$SQL_i  = "Insert Into ad_index_data(no, n1, n2, n3, n4, types, times) Values ( '";
							$SQL_i .= SqlFilter($i,"int")."',";
							$SQL_i .= "'".SqlFilter($_SESSION["branch"],"str")."',";
							$SQL_i .= "'".SqlFilter($re1["p_other_name"],"str")."',";
							$SQL_i .= "'".SqlFilter($re1["singles"],"str")."',";
							$SQL_i .= "'".SqlFilter($re1["p_user"],"str")."',";
							$SQL_i .= "'index_top1',";
							$SQL_i .= "'".SqlFilter($thisdate,"str")."')";
							$rs_i = $SPConn->prepare($SQL_i);
							$rs_i->execute();
						}
					}
				}

				$nowi = "";
				$SQL = "Select * From ad_index_data Where types='index_top1' And n1='".$_SESSION["branch"]."' And datediff(d, times, '".$thisdate."') = 0 Order By no Asc";
				$rs = $SPConn->prepare($SQL);
				$rs->execute();
				$result=$rs->fetchAll(PDO::FETCH_ASSOC);
				if ( count($result) > 0 ){
					$i=0;
					foreach($result as $re){
						if ( $re["n4"] == $_SESSION["MM_Username"] ){
							$nowi = "您的排名：".$i;
						}
					}
				} ?>
				
				<div class="row">
					<div class="col-md-4">
						<div class="panel panel-default panel-rank">
							<div class="panel-heading text-center">
								<strong><?php echo $_SESSION["branch"];?>會館 - 本月排行</strong>
								<span class="pull-right"></span>
							</div>

							<!-- panel content -->
							<div class="panel-body">
								<table class="table table-striped table-hover table-bordered">
									<tbody>
										<?php
										if ( count($result) > 0 ){
											foreach($result as $re){
												if ($re["no"] == 1 ){
													echo "<tr style='color:#333333;font-weight:bold;'><td>".$re["no"]."</td><td>".$re["n2"]."</td><td>".FormatCurrency($re["n3"])."</td></tr>";
												}elseif ( $re["no"] == 2 ){
													echo "<tr style='color:#666666;font-weight:bold;'><td>".$re["no"]."</td><td>".$re["n2"]."</td><td>".FormatCurrency($re["n3"])."</td></tr>";
												}elseif ( $re["no"] == 3 ){
													echo "<tr style='color:#666666;font-weight:bold;'><td>".$re["no"]."</td><td>".$re["n3"]."</td><td>".FormatCurrency($re["n3"])."</td></tr>";
												}else{
													echo "<tr><td>".$re["no"]."</td><td>".$re["n2"]."</td><td>".FormatCurrency($re["n3"])."</td></tr>";
												}
											}
										}else{
											echo "<br><br>暫無統計<br><br>";
										}?>	
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
					<!--會館年度排行-->
					<div class="col-md-4">
						<?php
							$nowi = "";
							$SQL = "SELECT * From ad_index_data where types='index_top2' and n1='".$_SESSION["branch"]."' and datediff(d, times, '".$thisdate."') = 0";
							$rs = $SPConn->prepare($SQL);
							$rs->execute();
							$result=$rs->fetchAll(PDO::FETCH_ASSOC);
							if ( count($result) == 0 ){
								$SQL_d = "delete ad_index_data where types='index_top2' and n1 = '".$_SESSION["branch"]."'";
								$rs_d = $SPConn->prepare($SQL_d);
								$rs_d->execute();
								$SQL1  = "select top 10 sum(ps_total) as singles, p_branch, p_other_name, p_user, b_year, b_month, b_date, j_year, j_month, j_date, p_job2 FROM single_search where p_branch='".$_SESSION["branch"]."' and ";
								$SQL1 .= "ps_year=".$years." GROUP BY p_branch, p_other_name, p_user, b_year, b_month, b_date, j_year, j_month, j_date, p_job2 order by singles DESC";
								$rs1 = $SPConn->prepare($SQL1);
								$rs1->execute();
								$result1=$rs1->fetchAll(PDO::FETCH_ASSOC);
								if ( count($result1) > 0 ){
									$i=0;
									foreach($result1 as $re1){
										$i++;
										$SQL_i  = "Insert Into ad_index_data(no, n1, n2, n3, n4, types, times) Values ( '";
										$SQL_i .= SqlFilter($i,"int")."',";
										$SQL_i .= "'".SqlFilter($_SESSION["branch"],"str")."',";
										$SQL_i .= "N'".SqlFilter($re1["p_other_name"],"str")."',";
										$SQL_i .= "'".SqlFilter($re1["singles"],"str")."',";
										$SQL_i .= "N'".SqlFilter($re1["p_user"],"str")."',";
										$SQL_i .= "'index_top2',";
										$SQL_i .= "'".SqlFilter($thisdate,"str")."')";
										$rs_i = $SPConn->prepare($SQL_i);
										$rs_i->execute();
									}
								}
							}
							
						$SQL = "SELECT * from ad_index_data where types='index_top2' and n1 = '".$_SESSION["branch"]."' and datediff(d, times, '".$thisdate."') = 0 order by no asc";
						$rs = $SPConn->prepare($SQL);
						$rs->execute();
						$result=$rs->fetchAll(PDO::FETCH_ASSOC);
						if ( count($result) > 0 ){ 
							$i=0;
							foreach($result as $re){
								$i++;
								if ( $_re["n4"] == $_SESSION["MM_Username"] ){
									$nowi = "您的排名：".$i;
								}
							}
						}else{
							//echo "<br><br>暫無統計<br><br>";
						} ?>
						
						<div class="panel panel-default panel-rank">
							<div class="panel-heading text-center">
								<strong><?php echo $_SESSION["branch"];?>會館 - 年度排行</strong>
								<span class="pull-right"></span>
							</div>

							<!-- panel content -->
							<div class="panel-body">
								<table class="table table-striped table-hover table-bordered">
									<tbody>
										<?php
										if ( count($result) > 0 ){
											foreach($result as $re){
												if ( $re["no"] == 1 ){
													echo "<tr style='color:#333333;font-weight:bold;'><td>".$re["no"]."</td><td>".$re["n2"]."</td><td>".FormatCurrency($re["n3"])."</td></tr>";
												}elseif ( $re["no"] == 2 ){
													echo "<tr style='color:#333333;font-weight:bold;'><td>".$re["no"]."</td><td>".$re["n2"]."</td><td>".FormatCurrency($re["n3"])."</td></tr>";
												}elseif ( $re["no"] == 3 ){
													echo "<tr style='color:#333333;font-weight:bold;'><td>".$re["no"]."</td><td>".$re["n2"]."</td><td>".FormatCurrency($re["n3"])."</td></tr>";
												}else{
													echo "<tr><td>".$re["no"]."</td><td>".$re["n2"]."</td><td>".FormatCurrency($re["n3"])."</td></tr>";
												}
											}
										}else{
											echo "<br><br>暫無統計<br><br>";
										} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>


					<!--全省會館 - 年度排行-->
					<div class="col-md-4">
						<?php
						$SQL = "SELECT * from ad_index_data where types='index_top3' and datediff(d, times, '".$thisdate."') = 0";
						$rs = $SPConn->prepare($SQL);
						$rs->execute();
						$result=$rs->fetchAll(PDO::FETCH_ASSOC);
						if ( count($result) == 0 ){
							$SQL_d = "delete ad_index_data where types='index_top3'";
							$rs_d = $SPConn->prepare($SQL_d);
							$rs_d->execute();
							$SQL1 = "select top 10 sum(pb_total) as tt, pb_reb FROM pay_branch where pb_year=".$years." GROUP BY pb_reb ORDER BY tt DESC";
							$rs1 = $SPConn->prepare($SQL1);
							$rs1->execute();
							$result1=$rs1->fetchAll(PDO::FETCH_ASSOC);
							if ( count($result1) > 0 ){
								$i=0;
								foreach($result1 as $re1){
									$i++;
									$SQL_i  = "Insert Into ad_index_data(no, n1,n3, types, times) Values ( '";
									$SQL_i .= SqlFilter($i,"int")."',";
									$SQL_i .= "N'".SqlFilter($re1["pb_reb"],"str")."',";
									$SQL_i .= "'".SqlFilter($re1["tt"],"str")."',";
									$SQL_i .= "'index_top3',";
									$SQL_i .= "'".SqlFilter($thisdate,"str")."')";
									$rs_i = $SPConn->prepare($SQL_i);
									$rs_i->execute();
								}
							}
						}
						
						$SQL = "SELECT * from ad_index_data where types='index_top3' and datediff(d, times, '".$thisdate."') = 0 order by no asc";
						echo $SQL;
						exit;
						$rs = $SPConn->prepare($SQL);
						$rs->execute();
						$result=$rs->fetchAll(PDO::FETCH_ASSOC);
						foreach($result as $re);
						if ( count($result) > 0 ){
							$i=0;
							for($f=1;$f<=count($result);$f++){
								if ( $re["n1"] == $_SESSION["branch"] ){
									$nowi = "會館排名：".$i;
									//exit for;
								}
							}
						}else{
							echo "<br><br>暫無統計<br><br>";
						} ?>
						
						<div class="panel panel-default panel-rank">
							<div class="panel-heading text-center">
								<strong>全省會館 - 年度排行</strong>
								<span class="pull-right">會館排名：<?php echo $nowi;?></span>
							</div>

							<!-- panel content -->
							<div class="panel-body">
								<table class="table table-striped table-hover table-bordered">
									<tbody>
										<tr style="color:#333333;font-weight:bold;">
											<td>1</td>
											<td>台南</td>
											<td>$17,***,***</td>
										</tr>
										<tr style="color:#666666;font-weight:bold;">
											<td>2</td>
											<td>高雄</td>
											<td>$16,***,***</td>
										</tr>
										<tr style="color:#666666;font-weight:bold;">
											<td>3</td>
											<td>台中</td>
											<td>$15,***,***</td>
										</tr>
										<tr>
											<td>4</td>
											<td>台北</td>
											<td>$12,***,***</td>
										</tr>
										<tr>
											<td>5</td>
											<td>八德</td>
											<td>$10,***,***</td>
										</tr>
										<tr>
											<td>6</td>
											<td>桃園</td>
											<td>$8,***,***</td>
										</tr>
										<tr>
											<td>7</td>
											<td>新竹</td>
											<td>$8,***,***</td>
										</tr>
										<tr>
											<td>8</td>
											<td>約專</td>
											<td>$2,***,***</td>
										</tr>
										<tr>
											<td>9</td>
											<td>總管理處</td>
											<td>$74*,***</td>
										</tr>
										<tr>
											<td>10</td>
											<td>迷你約</td>
											<td>$54*,***</td>
										</tr>
									</tbody>
								</table>


							</div>
						</div>
					</div>

					<div class="col-md-4">



						<div class="panel panel-default panel-rank">
							<div class="panel-heading text-center">
								<strong>全省會館 - 本月排行</strong>
								<span class="pull-right"></span>
							</div>

							<!-- panel content -->
							<div class="panel-body">

								<table class="table table-striped table-hover table-bordered">
									<tbody>
										<tr style="color:#333333;font-weight:bold;">
											<td>1</td>
											<td>台南-杜佳倩</td>
											<td>$17*,***</td>
										</tr>
										<tr style="color:#666666;font-weight:bold;">
											<td>2</td>
											<td>台南-黃琪雅</td>
											<td>$14*,***</td>
										</tr>
										<tr style="color:#666666;font-weight:bold;">
											<td>3</td>
											<td>高雄-覃秋紅</td>
											<td>$12*,***</td>
										</tr>
										<tr>
											<td>4</td>
											<td>台南-周淑華</td>
											<td>$99,***</td>
										</tr>
										<tr>
											<td>5</td>
											<td>八德-周靖雯</td>
											<td>$81,***</td>
										</tr>
										<tr>
											<td>6</td>
											<td>新竹-彭惠芝</td>
											<td>$71,***</td>
										</tr>
										<tr>
											<td>7</td>
											<td>台南-林雪娟</td>
											<td>$70,***</td>
										</tr>
										<tr>
											<td>8</td>
											<td>高雄-李鴻</td>
											<td>$70,***</td>
										</tr>
										<tr>
											<td>9</td>
											<td>迷你約-程立彤</td>
											<td>$69,***</td>
										</tr>
										<tr>
											<td>10</td>
											<td>台中-劉倪芳</td>
											<td>$61,***</td>
										</tr>
									</tbody>
								</table>

							</div>
						</div>
					</div>

					<div class="col-md-4">



						<div class="panel panel-default panel-rank">
							<div class="panel-heading text-center">
								<strong>全省秘書 - 年度排行</strong>
								<span class="pull-right"></span>
							</div>

							<!-- panel content -->
							<div class="panel-body">

								<table class="table table-striped table-hover table-bordered">
									<tbody>
										<tr style="color:#333333;font-weight:bold;">
											<td>1</td>
											<td>台南-黃琪雅</td>
											<td>$2,***,***</td>
										</tr>
										<tr style="color:#666666;font-weight:bold;">
											<td>2</td>
											<td>台北-詹善宇</td>
											<td>$2,***,***</td>
										</tr>
										<tr style="color:#666666;font-weight:bold;">
											<td>3</td>
											<td>台南-杜佳倩</td>
											<td>$2,***,***</td>
										</tr>
										<tr>
											<td>4</td>
											<td>高雄-覃秋紅</td>
											<td>$2,***,***</td>
										</tr>
										<tr>
											<td>5</td>
											<td>八德-蔡佩蓁</td>
											<td>$2,***,***</td>
										</tr>
										<tr>
											<td>6</td>
											<td>台北-高語鍹</td>
											<td>$2,***,***</td>
										</tr>
										<tr>
											<td>7</td>
											<td>台中-閻秋波</td>
											<td>$2,***,***</td>
										</tr>
										<tr>
											<td>8</td>
											<td>桃園-邱月嬌</td>
											<td>$2,***,***</td>
										</tr>
										<tr>
											<td>9</td>
											<td>新竹-黃于玲</td>
											<td>$1,***,***</td>
										</tr>
										<tr>
											<td>10</td>
											<td>台中-彭春福</td>
											<td>$1,***,***</td>
										</tr>
									</tbody>
								</table>

							</div>
						</div>
					</div>


				</div>


			</div>
			<!-- /panel content -->

		</div>
		<!-- /PANEL -->

	</div>

	</div>
</section>
<!-- /MIDDLE -->

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