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
	
	//菁英榜
	$qdate1 = date("Y/m/d",strtotime("-1 day"));
	$qdate2 = date("Y/m/d",strtotime("-8 day"));
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
						<h4><?php echo date("Y");?>年度目標 200,000,000</h4>
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
						<h4><a href="ad_mem.php"><?php echo $memsize;?>位會員</a></h4>
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

				<!-- 精英榜 -->
				<div class="row">
					<div class="week_full_div">
						<div class="week_inside_title_div animated zoomInDown"><img src="img/index_top_week_title.png"><br><?php echo $qdate2;?> ~ <?php echo $qdate1;?></div>
						<div class="week_inside_div">
						<?php //精英榜 query
							/*$SQL = "Select * From ad_index_data Where ad_index_data.types='index_top_week' Order By no Asc";
							$rs = $SPConn->prepare($SQL);
							$rs->execute();
							$result=$rs->fetchAll(PDO::FETCH_ASSOC);
							$i=0;
							foreach( $result as $re ){
								$i++;
								$class = "";
								if ( $i == 2 || $i == 4 ){
									$class = "week_main_div week_mobile_hide hidden-sm hidden-xs animated bounceInDow";
								}else{
									$class = "week_main_div week_mobile_hide hidden-sm hidden-xs animated bounceInUp";
								}*/?>
								<div class="week_main_div week_mobile_hide hidden-sm hidden-xs animated bounceInUp">
									<div class="week_imgbg_div"><img src="img/index_top_week_no1.png"></div>
									<div class="week_bg_text">
										<div class="week_text1">高雄</div>
										<div class="week_text2">覃秋紅</div>
										<div class="week_text3">193,338</div>
									</div>
								</div>
								
								<div class="week_main_div week_mobile_hide hidden-sm hidden-xs animated bounceInDown">
									<div class="week_imgbg_div"><img src="img/index_top_week_no2.png"></div>
									<div class="week_bg_text">
										<div class="week_text1">台南</div>
										<div class="week_text2">杜佳倩</div>
										<div class="week_text3">171,050</div>
									</div>
								</div>
							<div class="week_main_div week_mobile_hide hidden-sm hidden-xs animated bounceInUp">
								<div class="week_imgbg_div"><img src="img/index_top_week_no3.png"></div>
								<div class="week_bg_text">
									<div class="week_text1">台南</div>
									<div class="week_text2">黃琪雅</div>
									<div class="week_text3">169,002</div>
								</div>
							</div>
							<div class="week_main_div week_mobile_hide hidden-sm hidden-xs animated bounceInDown">
								<div class="week_imgbg_div"><img src="img/index_top_week_no4.png"></div>
								<div class="week_bg_text">
									<div class="week_text1">台南</div>
									<div class="week_text2">周淑華</div>
									<div class="week_text3">103,760</div>
								</div>
							</div>
							<div class="week_main_div week_mobile_hide hidden-sm hidden-xs animated bounceInUp">
								<div class="week_imgbg_div"><img src="img/index_top_week_no5.png"></div>
								<div class="week_bg_text">
									<div class="week_text1">八德</div>
									<div class="week_text2">周靖雯</div>
									<div class="week_text3">81,782</div>
								</div>
							</div>
								
								
								
							
							<?php //}?>
						</div>
					</div>
				</div>
				<div class="clearfix height-10"></div>

				<div class="table-responsive hidden-sm hidden-xs">
					<p class="hidden-md hidden-lg">手機版可往右滑動</p>
					<table class="table table-striped table-bordered bootstrap-datatable">
						<tr>
							<th>2021 年度業績</th>
							<th>一月</th>
							<th>二月</th>
							<th>三月</th>
							<th>四月</th>
							<th>五月</th>
							<th>六月</th>
							<th>七月</th>
							<th>八月</th>
							<th>九月</th>
							<th>十月</th>
							<th>十一月</th>
							<th>十二月</th>
						</tr>
						<tr>
							<td>
								JACK
							</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
						</tr>
						</tr>
						<tr>
							<td colspan=13><b>累計：<font color="#DF01D7">$0</font></b>

							</td>
						</tr>
						<tr>
							<td>
								JACK
							</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
						</tr>
						</tr>
						<tr>
							<td colspan=13>累計：$0
							</td>
						</tr>
					</table>
				</div>
				<!-- for mobile -->
				<table class="table table-striped table-bordered bootstrap-datatable hidden-md hidden-lg">
					<tr>
						<th>2021 年度業績</th>
						<th>JACK</th>
					</tr>
					<tr>
						<td>一月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>二月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>三月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>四月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>五月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>六月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>七月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>八月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>九月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>十月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>十一月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>十二月</td>
						<td>0</td>
					</tr>
					</tr>
					<tr>
						<td colspan=13><b>累計：<font color="#DF01D7">$0</font></b></td>
					</tr>
					<tr>
						<td>
							JACK
						</td>
						<td>
					</tr>

					<tr>
						<td>一月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>二月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>三月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>四月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>五月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>六月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>七月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>八月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>九月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>十月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>十一月</td>
						<td>0</td>
					</tr>
					<tr>
						<td>十二月</td>
						<td>0</td>
					</tr>
					</tr>
					<tr>
						<td colspan=13>累計：$0
						</td>
					</tr>
				</table>
				<!-- Sin Chart -->
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

						<li>
							<span class="label label-danger">未讀</span>公告訊息 - <a href="ad_announce_view.php?id=423" target="_self">2021年9月網站行銷相關名單恢復原本比例（9/1更新）<small class="margin-left-20">[2021/9/1
									下午06:52:58]</small></a>
						</li>
						<li>
							<span class="label label-danger">未讀</span>公告訊息 - <a href="ad_announce_view.php?id=421" target="_self">110年企字第001號 調整說明如下：<small class="margin-left-20">[2021/8/9
									下午03:56:17]</small></a>
						</li>

						<li>
							<span class="label label-danger">未讀</span>公告訊息 - <a href="ad_announce_view.php?id=420" target="_self">疫情後：鼓勵大家善用行銷資源（8/31止，全省各會館適用）<small class="margin-left-20">[2021/8/1
									下午02:11:50]</small></a>
						</li>

						<li>
							<span class="label label-danger">未讀</span>公告訊息 - <a href="ad_announce_view.php?id=419" target="_self">疫情7/27降二級：會館全員恢復正常上班！<small class="margin-left-20">[2021/7/23
									下午03:10:46]</small></a>
						</li>

						<li>
							<span class="label label-danger">未讀</span>公告訊息 - <a href="ad_announce_view.php?id=418" target="_self">總公司講師課程，相關場次認領會館及相關事宜公告<small class="margin-left-20">[2021/7/23
									下午02:29:36]</small></a>
						</li>

						<li>
							<span class="label label-danger">未讀</span>公告訊息 - <a href="ad_announce_view.php?id=417" target="_self">總公司諮商師、講師相關合作、預約辦法及注意事項<small class="margin-left-20">[2021/7/20
									下午04:07:20]</small></a>
						</li>

						<li>
							<span class="label label-danger">未讀</span>公告訊息 - <a href="ad_announce_view.php?id=416" target="_self">說明目前各品牌邀約訪客到春天會館串聯與注意事項：<small class="margin-left-20">[2021/7/2
									下午03:13:57]</small></a>
						</li>

						<li>
							<span class="label label-danger">未讀</span>公告訊息 - <a href="ad_announce_view.php?id=415" target="_self">約會專家新增功能&調整<small class="margin-left-20">[2021/6/29
									下午04:51:23]</small></a>
						</li>

						<li>
							<span class="label label-danger">未讀</span>公告訊息 - <a href="ad_announce_view.php?id=414" target="_self">疫情期間：鼓勵大家善用行銷資源（7/31止，全省各會館適用）<small class="margin-left-20">[2021/6/29
									下午04:36:43]</small></a>
						</li>

						<li>
							<span class="label label-danger">未讀</span>公告訊息 - <a href="ad_announce_view.php?id=413" target="_self">公告：6/28起 北部三會館及總公司恢復正常上班<small class="margin-left-20">[2021/6/22
									下午06:07:27]</small></a>
						</li>
					</ul>
					<a class="btn btn-success col-md-12 col-sm-12 col-xs-12 margin-top-10 margin-bottom-10" href="ad_announce.php">點此查看所有公告訊息</a>
					<hr>
				</div>
				<div class="col-md-6">
					<!--訊息通知-->
					<ul class="list-unstyled list-hover slimscroll height-200" data-slimscroll-visible="true">
						<li><span class="label label-warning"><i class="fa fa-exclamation size-15"></i></span> 系統訊息 -
							照片審核 - <a href="ad_photo_check.php">目前有 24 筆網站照片待審核，請點此前往審核照片。</a><small class="margin-left-20">[2021/9/8 下午 01:55:52]</small></li>
					</ul>
					<a href="#" data-remote="false" data-toggle="modal" data-backdrop="static" data-keyboard="true" data-target="#ajax_load_modal" class="btn btn-success col-md-12 col-sm-12 col-xs-12 margin-top-10 margin-bottom-10">點此查看
						50筆訊息通知</a>
				</div>
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

<div class="modal fade" id="ajax_load_modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background:#d9534f;">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title" style="color:#fff;font-weight:bold;">XXXX</h4>
			</div>
			<div class="modal-body">
				<p></p>
			</div>
			<div class="modal-footer">
				<a href="#close" class="btn btn-default" data-dismiss="modal">關閉</a>
			</div>
		</div>
	</div>
</div>

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
require("./include/_bottom.php");
?>


<script type="text/javascript">
	var $color_border_color = "#eaeaea"; /* light gray 	*/
	$color_grid_color = "#dddddd" /* silver	 	*/
	$color_main = "#E24913"; /* red       	*/
	$color_second = "#6595b4"; /* blue      	*/
	$color_third = "#FF9F01"; /* orange   	*/
	$color_fourth = "#7e9d3a"; /* green     	*/
	$color_fifth = "#BD362F"; /* dark red  	*/
	$color_mono = "#000000"; /* black 	 	*/

	var months = ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"];

	var d = [, , , , , , , , , , , ];
	var d2 = [
		[1, 0],
		[2, 0],
		[3, 0],
		[4, 0],
		[5, 0],
		[6, 0],
		[7, 0],
		[8, 0],
		[9, 0],
		[10, 0],
		[11, 0],
		[12, 0]
	];
	var dataSet = [{
			label: "年度業績表",
			data: d,
			color: "#FF55A8"
		},
		{
			label: "去年業績表",
			data: d2,
			color: "#999999"
		}
	];

	loadScript(plugin_path + "chart.flot/jquery.flot.min.js", function() {
		loadScript(plugin_path + "chart.flot/jquery.flot.resize.min.js", function() {
			loadScript(plugin_path + "chart.flot/jquery.flot.time.min.js", function() {
				loadScript(plugin_path + "chart.flot/jquery.flot.fillbetween.min.js", function() {
					loadScript(plugin_path + "chart.flot/jquery.flot.orderBars.min.js",
						function() {
							loadScript(plugin_path +
								"chart.flot/jquery.flot.pie.min.js",
								function() {
									loadScript(plugin_path +
										"chart.flot/jquery.flot.tooltip.min.js",
										function() {

											if (jQuery("#flot-sin").length >
												0) {
												var plot = jQuery.plot(jQuery(
														"#flot-sin"),
													dataSet, {
														series: {
															lines: {
																show: true
															},
															points: {
																show: true
															}
														},
														grid: {
															hoverable: true,
															clickable: false,
															borderWidth: 1,
															borderColor: "#633200",
															backgroundColor: {
																colors: [
																	"#ffffff",
																	"#EDF5FF"
																]
															}
														},
														tooltip: true,
														tooltipOpts: {
															content: "(%s) %x 月<br/><strong>%y</strong>",
															defaultTheme: false
														},
														colors: [
															$color_second,
															$color_fourth
														],
														yaxes: {
															axisLabelPadding: 3,
															tickFormatter: function(
																v, axis
															) {
																return $
																	.formatNumber(
																		v, {
																			format: "#,###",
																			locale: "nt"
																		}
																	);
															}
														},
														xaxis: {
															ticks: [
																[1, "一月"],
																[2, "二月"],
																[3, "三月"],
																[4, "四月"],
																[5, "五月"],
																[6, "六月"],
																[7, "七月"],
																[8, "八月"],
																[9, "九月"],
																[10, "十月"],
																[11, "十一月"],
																[12, "十二月"]
															]
														}
													});

											}
										});
								});
						});
				});
			});
		});
	});
</script>