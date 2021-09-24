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
	$thisdate = date("Y-M-D");
					
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
		$SQL .= "From pay_branch As a Where pb_year='".$years."' And ps_id='".$p_user."'";
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
		$SQL .= "From pay_branch As a Where pb_year='".($years-1)."' And ps_id='".$p_user."'";
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
							<th>2021 年度業績</th>
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
										$ctime = changeDate($rtime);
										$rtime = "<a href='#m' class='label label-success' data-toggle='tooltip' data-original-title='".$ctime." 讀取'>已讀</a>";
										$block_style = " style='color:#666'";
									}else{
										$rtime = "<span class='label label-danger'>未讀</span>";
										$block_style = "";
									}?>
									<li>
										<?php echo $rtime;?> <?php echo $types;?> - <a href="<?php echo $url;?>" target="_self"<?php echo $block_style;?>><?php echo $re["msg"];?><small class="margin-left-20">[<?php echo $ctime?>]</small></a>
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
										<?php echo $types;?> - <a href="<?php echo $url?>" target="_blank"<?php echo $block_style?>><?php echo $re["msg"]?><small class="margin-left-20">[<?php echo changeDate($times);?>]<?php echo $towho?></small></a>
									</li>
								<?php }
							}?>
					</ul>
					<a href="index.php?st=read_all_sysmsg" data-remote="false" data-toggle="modal" data-backdrop="static" data-keyboard="true" data-target="#ajax_load_modal" class="btn btn-success col-md-12 col-sm-12 col-xs-12 margin-top-10 margin-bottom-10">點此查看50筆訊息通知</a>
				</div>
				
				
				
				
				
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
			
			<tr>
      <td>1</td>
      <td>2021-09-08 22:54</td>
      <td>行銷活動-2021年12星座愛情指數測驗 [DMN_FB_post_12starsigns_20210204B]</td>
      <td>2082584</td>
      <td><a href="ad_mem_detail.asp?mem_num=2082584" target="_blank">Wang ChungMing</a></td>
      	<td>男</td>
      	<td>1995/9/7　26 歲</td>
      	<td></td>
      	<td><font color=green>受理：</font>八德 - 不明</td>
      	
      </tr>
      
			<tr>
      <td>2</td>
      <td>2021-09-09 00:17</td>
      <td>行銷活動-九型戀愛人格分析 [Springclub_Google_allproducts_GDN]</td>
      <td>2082595</td>
      <td><a href="ad_mem_detail.asp?mem_num=2082595" target="_blank">她</a></td>
      	<td>女</td>
      	<td>2001/8/7　20 歲</td>
      	<td>大學</td>
      	<td></td>
      	
      </tr>
      
			<tr>
      <td>3</td>
      <td>2021-09-09 00:53</td>
      <td>行銷活動-12生肖看戀愛運-手機版 [Springclub_allproducts_instagram_pay20210127]</td>
      <td>2082601</td>
      <td><a href="ad_mem_detail.asp?mem_num=2082601" target="_blank">林育緯</a></td>
      	<td>男</td>
      	<td>1996/11/2　25 歲</td>
      	<td></td>
      	<td></td>
      	
      </tr>
      
			<tr>
      <td>4</td>
      <td>2021-09-09 01:00</td>
      <td>春天網站-網站註冊 [Springclub_Google_allproducts_Explore]</td>
      <td>2082603</td>
      <td><a href="ad_mem_detail.asp?mem_num=2082603" target="_blank">陳永華</a></td>
      	<td>男</td>
      	<td>0/0/0</td>
      	<td></td>
      	<td></td>
      	
      </tr>
      
			<tr>
      <td>5</td>
      <td>2021-09-09 00:58</td>
      <td>行銷活動-現代月老陪你戀愛交友-手機版 [Springclub_Google_allproducts_Explore]</td>
      <td>2082602</td>
      <td><a href="ad_mem_detail.asp?mem_num=2082602" target="_blank">陳永華</a></td>
      	<td>男</td>
      	<td>0/0/0</td>
      	<td></td>
      	<td></td>
      	
      </tr>
      
			<tr>
      <td>6</td>
      <td>2021-09-08 22:33</td>
      <td>春天網站-網站註冊 [sale-744]</td>
      <td>2082580</td>
      <td><a href="ad_mem_detail.asp?mem_num=2082580" target="_blank">陳正旺</a></td>
      	<td>男</td>
      	<td>1990/4/28　31 歲</td>
      	<td>高中</td>
      	<td><br><font color=green>推薦：</font>台中 - 台中督導</td>
      	
      </tr>
      
			<tr>
      <td>7</td>
      <td>2021-09-08 23:26</td>
      <td>行銷活動-2021年12星座愛情指數測驗 [DMN_FB_post_12starsigns_20210423]</td>
      <td>2082586</td>
      <td><a href="ad_mem_detail.asp?mem_num=2082586" target="_blank">林妏瑾</a></td>
      	<td>女</td>
      	<td>2001/5/3　20 歲</td>
      	<td></td>
      	<td><font color=green>受理：</font>八德 - 不明</td>
      	
      </tr>
      
			<tr>
      <td>8</td>
      <td>2021-09-09 01:10</td>
      <td>行銷活動-2021年12星座愛情指數測驗 [DMN_FB_post_12starsigns_20210423]</td>
      <td>2082605</td>
      <td><a href="ad_mem_detail.asp?mem_num=2082605" target="_blank">Yan</a></td>
      	<td>女</td>
      	<td>1995/2/7　26 歲</td>
      	<td></td>
      	<td><font color=green>受理：</font>八德 - 不明</td>
      	
      </tr>
      
			<tr>
      <td>9</td>
      <td>2021-09-08 21:55</td>
      <td>春天網站-手機APP-首頁</td>
      <td>2082576</td>
      <td><a href="ad_mem_detail.asp?mem_num=2082576" target="_blank">陳怡帆</a></td>
      	<td>女</td>
      	<td>1985/6/8　36 歲</td>
      	<td>大學</td>
      	<td></td>
      	
      </tr>
      
			<tr>
      <td>10</td>
      <td>2021-09-09 00:20</td>
      <td>約會專家-手機板 [singleparty_lovelab_fb2_iProspect]</td>
      <td>2082596</td>
      <td><a href="ad_mem_detail.asp?mem_num=2082596" target="_blank">李品毅</a></td>
      	<td>男</td>
      	<td>1989/3/17　32 歲</td>
      	<td>高職</td>
      	<td></td>
      	
      </tr>
      </tbody></table></div><a class="btn btn-success col-md-12 col-sm-12 col-xs-12" href="ad_no_mem.asp">點此前往處理所有未發送未入會資料</a><div class="clearfix"></div><hr>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				<div class="row">
					<div class="col-md-4">

						<div class="panel panel-default panel-rank">
							<div class="panel-heading text-center">
								<strong>總管理處會館 - 本月排行</strong>
								<span class="pull-right"></span>
							</div>

							<!-- panel content -->
							<div class="panel-body">
								<table class="table table-striped table-hover table-bordered">
									<tbody>
										<tr style="color:#333333;font-weight:bold;">
											<td>1</td>
											<td>網站行銷</td>
											<td>$17,750</td>
										</tr>
									</tbody>
								</table>

							</div>
						</div>
					</div>

					<div class="col-md-4">



						<div class="panel panel-default panel-rank">
							<div class="panel-heading text-center">
								<strong>總管理處會館 - 年度排行</strong>
								<span class="pull-right"></span>
							</div>

							<!-- panel content -->
							<div class="panel-body">

								<table class="table table-striped table-hover table-bordered">
									<tbody>
										<tr style="color:#333333;font-weight:bold;">
											<td>1</td>
											<td>網站行銷</td>
											<td>$463,937</td>
										</tr>
										<tr style="color:#666666;font-weight:bold;">
											<td>2</td>
											<td>約專LINE POINTS</td>
											<td>$179,479</td>
										</tr>
										<tr style="color:#666666;font-weight:bold;">
											<td>3</td>
											<td>黃若忻</td>
											<td>$135,842</td>
										</tr>
										<tr>
											<td>4</td>
											<td>劉澔翰</td>
											<td>$29,169</td>
										</tr>
										<tr>
											<td>5</td>
											<td>曾欣怡</td>
											<td>$4,850</td>
										</tr>
									</tbody>
								</table>


							</div>
						</div>
					</div>

					<div class="col-md-4">



						<div class="panel panel-default panel-rank">
							<div class="panel-heading text-center">
								<strong>全省會館 - 年度排行</strong>
								<span class="pull-right">會館排名：9</span>
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
	require_once("./include/_chart.js");
?>