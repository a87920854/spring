<?php
	require_once("./include/_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");
	
	if ( $_SESSION["MM_Username"] == "" ){ call_alert("請重新登入。","login.php",0);}

	//刪除資料
	if ( SqlFilter($_REQUEST["st"],"tab") == "del" ){
		$SQL_d = "Delete From single_sysmsg Where types='公告訊息' And auton='".SqlFilter($_REQUEST["an"],"tab");
		$rs_d = $SPConn->prepare($SQL_d);
		$rs_d->execute();
		header("location:win_close.php?m=刪除中...");
		exit;
	}

	if ( SqlFilter($_REQUEST["st"],"tab") == "report" ){
		if ( SqlFilter($_REQUEST["fixstat"],"tab") == "" ){ call_alert("請選擇處理結果。", 0, 0);}
		$fixstat = SqlFilter($_REQUEST["fixstat"],"tab");
		$SQL = "Select * From system_report Where auton='".SqlFilter(_REQUEST["an"],"int")."'";
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result=$rs->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $re);
		if ( count($result) > 0 ){
			$SQL_u  = "Update system_report Set ";
			$SQL_u .= "stat='".$fixstat."',";
			$SQL_u .= "fixnote='".$re["fixnote"]."<br>[".chtime(now)."]:".str_replace("\r\n","<br>",$_REQUEST["fixnote"])."&nbsp;by ".$_SESSION["pname"]."',";
			$SQL_u .= "fixtimes='".date("Y-m-d H:s:i")."' ";
			$SQL_u .= "Where auton='".SqlFilter(_REQUEST["an"],"int")."'";
			$rs_u = $SPConn->prepare($SQL);
			$rs_u->execute();
		}
		header("location:ad_system_report.php");
	}

	if ( SqlFilter($_REQUEST["st"],"tab") == "nofix" ){
		$SQL = "Select * From system_report Where auton='".SqlFilter(_REQUEST["an"],"int")."'";
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result=$rs->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $re);
		if ( count($result) > 0 ){
			$SQL_u  = "Update system_report Set ";
			$SQL_u .= "stat='2',";
			$SQL_u .= "fixtimes='".date("Y-m-d H:s:i")."' ";
			$SQL_u .= "Where auton='".SqlFilter(_REQUEST["an"],"int")."'";
			$rs_u = $SPConn->prepare($SQL);
			$rs_u->execute();
		}
		header("location:ad_system_report.php");
	}

	//顯示筆數
	$default_sql_num = 500; //預設顯示筆數
	if ( SqlFilter($_REQUEST["vst"],"tab") == "full" ){
		$subSQL1 = "top ".$default_sql_num." * ";
	}else{
		$subSQL1 = "* ";
	}
	$asize = 0;

	$subSQL2 = "And (','+branch+',' like '%,".$_SESSION["branch"].",%' Or branch Like '%all%')";
	//依權限設定語法
	if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
		$subSQL2 = "";
		$subSQL3 = "";
		//sqls = "SELECT "&sqlv&", (select count(auton) from single_sysmsg_log where announce_an=single_sysmsg.auton) as asize, (select times from single_sysmsg_log where announce_an=single_sysmsg.auton and single='"&Session("MM_Username")&"') as rtime from single_sysmsg         where types='公告訊息'"
	}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" ){
		$subSQL3 = "And (look_for Like '%branch%' Or look_for Like '%all%')";
	}elseif ( $_SESSION["MM_UserAuthorization"] == "single" ){
		$subSQL3 = "And (look_for Like '%single%' Or look_for Like '%all%')";
	}elseif ( $_SESSION["MM_UserAuthorization"] == "pay" ){
		$subSQL3 = "And (look_for like '%pay%' Or look_for Like '%all%')";
	}elseif ( $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
		$subSQL3 = "And (look_for Like '%love%' Or look_for Like '%all%')";
	}elseif ( $_SESSION["MM_UserAuthorization"] == "action" ){
		$subSQL3 = "And (look_for Like '%action%' Or look_for Like '%all%')";
	}else{
		$subSQL3 = "And (look_for Like '%all%')";
	}
	//關鍵字keyword
	if ( SqlFilter($_REQUEST["keyword"],"tab") != "" ){
		$keyword = SqlFilter($_REQUEST["keyword"],"tab");
		$subSQL4 = " And (notes Like '%".$keyword."%' Or msg Like '%".$keyword."%')";
	}
	
	//取得總筆數
	$SQL = "Select count(auton) As total_size From single_sysmsg Where types='公告訊息'".$subSQL2.$subSQL3.$subSQL4;
	$rs = $SPConn->prepare($SQL);
	$rs->execute();
	$result=$rs->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $re);
	if ( count($result) == 0 || $re["total_size"] == 0 ) {
		$total_size = 0;
	}else{
		$total_size = $re["total_size"];
	}
	
	
    //sqls = sqls & sqlss
	//sqls2 = sqls2 & sqlss  
	//sqls = sqls & " Order By times Desc"
	
	
	
	
	

?>



<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">公告訊息</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>公告訊息 - 數量：<?php echo $total_size;?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>

                    <a href="ad_announce_add.php" class="btn btn-success pull-left margin-right-20">新增公告訊息</a>

                <form id="searchform" action="ad_announce.php" method="post" target="_self" class="form-inline">
                    <input id="keyword" name="keyword" id="keyword" class="form-control" type="text" placeholder="搜尋內容" value="">
                    <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                </form>
                </p>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th width=180>公告時間</th>
                            <th>標題</th>
                            <th width=80>會館</th>
                            <th width=80>權限</th>
                            <th></th>
                        </tr>

                        <tr>
                            <td class="center">2021-09-01&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=423">2021年9月網站行銷相關名單恢復原本比例（9/1更新）</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=423" class="btn btn-xs btn-warning">已讀(64)</a><a href="ad_announce_add.php?id=423" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=423','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-08-09&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=421">110年企字第001號 調整說明如下：</a></td>
                            <td class="center">所有</td>
                            <td class="center"><a data-toggle="popover" data-content="branch,pay,action">共 3 項</a></td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=421" class="btn btn-xs btn-warning">已讀(25)</a><a href="ad_announce_add.php?id=421" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=421','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-08-01&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=420">疫情後：鼓勵大家善用行銷資源（8/31止，全省各會館適用）</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=420" class="btn btn-xs btn-warning">已讀(81)</a><a href="ad_announce_add.php?id=420" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=420','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-07-23&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=419">疫情7/27降二級：會館全員恢復正常上班！</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=419" class="btn btn-xs btn-warning">已讀(78)</a><a href="ad_announce_add.php?id=419" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=419','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-07-23&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=418">總公司講師課程，相關場次認領會館及相關事宜公告</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=418" class="btn btn-xs btn-warning">已讀(75)</a><a href="ad_announce_add.php?id=418" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=418','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-07-20&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=417">總公司諮商師、講師相關合作、預約辦法及注意事項</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=417" class="btn btn-xs btn-warning">已讀(74)</a><a href="ad_announce_add.php?id=417" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=417','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-07-02&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=416">說明目前各品牌邀約訪客到春天會館串聯與注意事項：</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=416" class="btn btn-xs btn-warning">已讀(81)</a><a href="ad_announce_add.php?id=416" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=416','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-06-29&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=415">約會專家新增功能&調整</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=415" class="btn btn-xs btn-warning">已讀(77)</a><a href="ad_announce_add.php?id=415" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=415','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-06-29&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=414">疫情期間：鼓勵大家善用行銷資源（7/31止，全省各會館適用）</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=414" class="btn btn-xs btn-warning">已讀(76)</a><a href="ad_announce_add.php?id=414" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=414','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-06-22&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=413">公告：6/28起 北部三會館及總公司恢復正常上班</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=413" class="btn btn-xs btn-warning">已讀(82)</a><a href="ad_announce_add.php?id=413" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=413','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-06-21&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=412">【VIP會員預約諮詢】前後台操作教學</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=412" class="btn btn-xs btn-warning">已讀(79)</a><a href="ad_announce_add.php?id=412" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=412','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-06-11&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=411">後台線上貴賓諮詢卡，自動列印及下載教學SOP</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=411" class="btn btn-xs btn-warning">已讀(81)</a><a href="ad_announce_add.php?id=411" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=411','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-06-09&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=407">疫情期間：鼓勵大家善用行銷資源（6/30止，全省各會館適用）</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=407" class="btn btn-xs btn-warning">已讀(84)</a><a href="ad_announce_add.php?id=407" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=407','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-06-03&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=406">後台業務展示系統，可展示全省結婚的會員，增加成交機會</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=406" class="btn btn-xs btn-warning">已讀(85)</a><a href="ad_announce_add.php?id=406" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=406','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-06-01&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=405">約會專家－請各區審核照片時加強確認！</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=405" class="btn btn-xs btn-warning">已讀(82)</a><a href="ad_announce_add.php?id=405" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=405','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-31&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=404">約會專家前台會員顯示調整</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=404" class="btn btn-xs btn-warning">已讀(81)</a><a href="ad_announce_add.php?id=404" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=404','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-31&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=403">北部三會館 台北、八德、約專會館：6/1～6/14先調整如下：</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=403" class="btn btn-xs btn-warning">已讀(79)</a><a href="ad_announce_add.php?id=403" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=403','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-28&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=402">約會專家簡訊通知調整&LINE約會時間延長通知</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=402" class="btn btn-xs btn-warning">已讀(80)</a><a href="ad_announce_add.php?id=402" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=402','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-27&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=401">會員自行填寫約會評價位置與步驟</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=401" class="btn btn-xs btn-warning">已讀(79)</a><a href="ad_announce_add.php?id=401" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=401','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-25&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=398">退費與續約會員之會籍請務必調整</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=398" class="btn btn-xs btn-warning">已讀(78)</a><a href="ad_announce_add.php?id=398" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=398','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-21&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=397">台北、DMN、約專會員：從到期日5/1起的璀璨或璀璨VIP會員，系統全面從5/1起各加60天</a></td>
                            <td class="center">所有</td>
                            <td class="center"><a data-toggle="popover" data-content="branch,pay,love">共 3 項</a></td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=397" class="btn btn-xs btn-warning">已讀(31)</a><a href="ad_announce_add.php?id=397" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=397','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-19&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=396">疫情期間：鼓勵大家善用行銷資源（5/18起，全省各會館適用）</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=396" class="btn btn-xs btn-warning">已讀(85)</a><a href="ad_announce_add.php?id=396" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=396','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-18&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=395">線卡刷卡注意事項</a></td>
                            <td class="center">所有</td>
                            <td class="center"><a data-toggle="popover" data-content="branch,pay,love">共 3 項</a></td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=395" class="btn btn-xs btn-warning">已讀(30)</a><a href="ad_announce_add.php?id=395" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=395','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-18&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=394">後台新增客戶申訴專區</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=394" class="btn btn-xs btn-warning">已讀(84)</a><a href="ad_announce_add.php?id=394" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=394','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-17&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=393">全省會館第一線同仁辛苦了！請加強自己的防護力，一起努力抗疫注意事項:</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=393" class="btn btn-xs btn-warning">已讀(85)</a><a href="ad_announce_add.php?id=393" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=393','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-17&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=392">雙北疫情升溫, 春天會館北區營業據點防疫措施5/17</a></td>
                            <td class="center">所有</td>
                            <td class="center"><a data-toggle="popover" data-content="branch">共 1 項</a></td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=392" class="btn btn-xs btn-warning">已讀(17)</a><a href="ad_announce_add.php?id=392" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=392','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-17&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=391">📣約會專家LINE約會功能開放通知📣</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=391" class="btn btn-xs btn-warning">已讀(77)</a><a href="ad_announce_add.php?id=391" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=391','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-17&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=390">📣 📣春天會館會員線上LINE約會功能開放溜</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=390" class="btn btn-xs btn-warning">已讀(75)</a><a href="ad_announce_add.php?id=390" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=390','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-17&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=389">如果雙北會館同仁因小孩停課，有需要申請防疫照顧假，請先傳真到總公司。</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=389" class="btn btn-xs btn-warning">已讀(72)</a><a href="ad_announce_add.php?id=389" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=389','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-14&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=388">非自願性離職說明</a></td>
                            <td class="center">所有</td>
                            <td class="center"><a data-toggle="popover" data-content="branch">共 1 項</a></td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=388" class="btn btn-xs btn-warning">已讀(16)</a><a href="ad_announce_add.php?id=388" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=388','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-14&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=387">因應疫情升溫，約會專家線上功能緊急臨時調整！！！及其他注意事項</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=387" class="btn btn-xs btn-warning">已讀(84)</a><a href="ad_announce_add.php?id=387" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=387','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-14&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=386">大家可以在家辦公時的電話系統：</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=386" class="btn btn-xs btn-warning">已讀(84)</a><a href="ad_announce_add.php?id=386" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=386','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-13&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=385">「防疫期間，不出門在家也可以有安全又精準的約會！」</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=385" class="btn btn-xs btn-warning">已讀(85)</a><a href="ad_announce_add.php?id=385" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=385','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-11&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=384">慎防釣名單提醒!</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=384" class="btn btn-xs btn-warning">已讀(80)</a><a href="ad_announce_add.php?id=384" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=384','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-05-05&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=382">建檔會員資料及收入系統注意事項</a></td>
                            <td class="center">所有</td>
                            <td class="center"><a data-toggle="popover" data-content="branch,pay,love">共 3 項</a></td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=382" class="btn btn-xs btn-warning">已讀(31)</a><a href="ad_announce_add.php?id=382" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=382','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-04-26&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=381">2021年06月01日-07月09日 家維老師課程及諮詢再麻煩各區確認</a></td>
                            <td class="center">所有</td>
                            <td class="center"><a data-toggle="popover" data-content="branch,pay,action">共 3 項</a></td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=381" class="btn btn-xs btn-warning">已讀(26)</a><a href="ad_announce_add.php?id=381" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=381','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-04-26&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=380">公告110年通字第010號，VIP會員服務權益履約轉入成本說明。</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=380" class="btn btn-xs btn-warning">已讀(82)</a><a href="ad_announce_add.php?id=380" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=380','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-04-21&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=379">再次重申各區收入憑証，請受理秘書自己填寫</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=379" class="btn btn-xs btn-warning">已讀(77)</a><a href="ad_announce_add.php?id=379" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=379','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-04-13&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=378">各會館會員若有升卡續卡，請同時到後台更改到期日，避免影響會員權益</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=378" class="btn btn-xs btn-warning">已讀(70)</a><a href="ad_announce_add.php?id=378" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=378','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-04-01&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=377">約專行銷名單給各區-（約專及DMN）</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=377" class="btn btn-xs btn-warning">已讀(63)</a><a href="ad_announce_add.php?id=377" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=377','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-03-15&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=376">約專行銷頁面-戀愛決勝盤-獎項部分說明</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=376" class="btn btn-xs btn-warning">已讀(61)</a><a href="ad_announce_add.php?id=376" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=376','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-03-08&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=375">2017以前舊資料再開發，後台系統使用地方教學</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=375" class="btn btn-xs btn-warning">已讀(54)</a><a href="ad_announce_add.php?id=375" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=375','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-03-04&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=374">3月1日起約專邀約訪客到各會館，會館及個人業績分配如下：</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=374" class="btn btn-xs btn-warning">已讀(46)</a><a href="ad_announce_add.php?id=374" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=374','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-02-23&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=373">2021年，打破職務，年資，凡事皆有可能！</a></td>
                            <td class="center">所有</td>
                            <td class="center"><a data-toggle="popover" data-content="branch">共 1 項</a></td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=373" class="btn btn-xs btn-warning">已讀(8)</a><a href="ad_announce_add.php?id=373" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=373','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-01-11&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=371">請大家協助同仁約專LINE POINTS要加強確有效認列：</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=371" class="btn btn-xs btn-warning">已讀(43)</a><a href="ad_announce_add.php?id=371" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=371','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2021-01-05&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=370">自2021年01月01日起，收支系統身分證需對應會員資料系統。未對應者無法KEY會員系統</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=370" class="btn btn-xs btn-warning">已讀(42)</a><a href="ad_announce_add.php?id=370" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=370','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2020-11-30&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=369">讓活動「瀏覽率」、「點擊率」、「填單率」增加！請企劃完善每一場活動內容</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=369" class="btn btn-xs btn-warning">已讀(40)</a><a href="ad_announce_add.php?id=369" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=369','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2020-11-30&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=368">約會專家_會員等級權限&功能修改</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=368" class="btn btn-xs btn-warning">已讀(36)</a><a href="ad_announce_add.php?id=368" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=368','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2020-11-02&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=358">跨區升卡比例說明</a></td>
                            <td class="center">所有</td>
                            <td class="center"><a data-toggle="popover" data-content="branch,pay">共 2 項</a></td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=358" class="btn btn-xs btn-warning">已讀(9)</a><a href="ad_announce_add.php?id=358" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=358','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">2020-10-23&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                            <td class="center"><a href="ad_announce_view.php?id=356">約見紀錄表加上約見未參追蹤表，請各區善加利用並且定期回報追蹤情況：</a></td>
                            <td class="center">所有</td>
                            <td class="center">所有</td>
                            <td width=180 class="center">
                                <a href="ad_announce_log.php?id=356" class="btn btn-xs btn-warning">已讀(34)</a><a href="ad_announce_add.php?id=356" class="btn btn-xs btn-info">修改</a><a href="#m" class="btn btn-xs btn-danger" onclick="Mars_popup2('ad_announce.php?st=del&an=356','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');">刪除</a>
                            </td>
                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 141 筆、第 1 頁／共 3 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_announce.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_announce.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_announce.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_announce.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_announce.php?topage=3 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_announce.php?topage=1" selected>1</option>
                            <option value="/ad_announce.php?topage=2">2</option>
                            <option value="/ad_announce.php?topage=3">3</option>
                        </select></li>
                </ul>
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
require_once("./include/_bottom.php");
?>