<?php
	require_once("_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");

	if ( $_SESSION["MM_Username"] == "" ){ call_alert("請重新登入。", "login.php", 0); }
	if ( $_SESSION["MM_UserAuthorization"] != "admin" ){ call_alert("您沒有權限", 1 ,0); }

	//刪除
	if ( SqlFilter($_REQUEST["st"],"tab") == "del" ){
		$SQL = "Delete From system_report Where auton='".SqlFilter($_REQUEST["an"],"int")."'";
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
	}
	
	//回覆處理結果
	if ( SqlFilter($_REQUEST["st"],"tab") == "report" ){
		if ( SqlFilter($_REQUEST["fixstat"]) == "" ){ call_alert("請選擇處理結果。", 0, 0); }
		$fixstat = SqlFilter($_REQUEST["fixstat"]);
		$SQL = "Select * From system_report Where auton='".SqlFilter($_REQUEST["an"],"int")."'";
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result=$rs->fetchAll(PDO::FETCH_ASSOC);
		if ( count($result) > 0 ){
			if ( SqlFilter($_REQUEST["fixstat"]) == "" ){
				if ( $re["fixnote"] != "" ){
					$fixnote = $re["fixnote"]."<br>[".date("Y-m-d H:s")."]:".str_replace("\r\n","<br>",$_REQUEST["fixnote"])."&nbsp;by ".$_SESSION["pname"];
				}else{
					$fixnote = "[".date("Y-m-d H:s")."]:".str_replace("\r\n","<br>",$_REQUEST["fixnote"])."&nbsp;by ".$_SESSION["pname"];
				}
			}
			$SQL_u = "Update system_report Set stat='".$fixstat."',fixnote=N'".$fixnote."',fixtimes='".date("Y-m-d H:s:i")."' Where auton='".SqlFilter($_REQUEST["an"],"int")."'";
			$rs_u = $SPConn->prepare($SQL_u);
			$rs_u->execute();
		}
		header( "location:ad_system_report.php" );
	}
	
	//回覆狀態-不處理
	if ( SqlFilter($_REQUEST["st"],"tab") == "nofix" ){
		$SQL_u = "Update system_report Set stat='2',fixtimes='".date("Y-m-d H:s:i")."' Where auton='".SqlFilter($_REQUEST["an"],"int")."'";
		echo $SQL_u;
		exit;
		$rs_u = $SPConn->prepare($SQL_u);
		$rs_u->execute();
		header( "location:ad_system_report.php" );
	}
	
	
	$default_sql_num = 500; //預設顯示筆數
	if ( $_REQUEST["vst"] == "full" ){
		$subSQL1 = "top ".$default_sql_num." ";
	}else{
		$subSQL1 = "* ";
	}
	
	if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
		$subSQL2 = "1 = 1";
	}else{
		$subSQL2 = "noshow = 0 And single = '".strtoupper($_SESSION["MM_Username"])."'";
	}
	
	//關鍵字
	if ( SqlFilter($_REQUEST["keyword"],"tab") != "" ){
		$keyword = SqlFilter($_REQUEST["keyword"],"tab");
		$subSQL3 = " And (note Like '%".$keyword."%' Or fixnote Like '%".$keyword."%')";
	}
	
	//取得處理狀態語法
	$tr = SqlFilter($_REQUEST["tr"],"int");
	$subSQL4 = "";
	if ( $tr == 1 ){ //已處理
		$subSQL4 = " And stat=1";
	}elseif ( $tr == 2 ){ //不需處理
		$subSQL4 = " And stat=2";
	}elseif ( $tr == 3 ){ //不需處理
		$subSQL4 = " And Not stat=1 And Not stat=2";
	}
	
	//取得總筆數
	$SQL = "Select count(auton) As total_size From system_report Where ".$subSQL2.$subSQL3;
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
	$tPageSize = 50; //每頁幾筆
	$tPage = 1; //目前頁數
	if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
	$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
	if ( $tPageSize*$tPage < $total_size ){
		$page2 = 50;
	}else{
		$page2 = (50-(($tPageSize*$tPage)-$total_size));
	}
	
	$SQL  = "Select ".$subSQL1."From (";
	$SQL .= "Select TOP ".$page2." * From (";
	$SQL .= "Select TOP ".($tPageSize*$tPage)." * From system_report Where ".$subSQL2.$subSQL3.$subSQL4." Order By times Desc) t1 Where ".$subSQL2.$subSQL3.$subSQL4." ";
	$SQL .= "Order By times) t2 Where ".$subSQL2.$subSQL3.$subSQL4." Order By times Desc";
	$rs = $SPConn->prepare($SQL);
	$rs->execute();
	$result=$rs->fetchAll(PDO::FETCH_ASSOC);
?>
<script type="text/JavaScript" src="./include/script.js"></script>
<script type="text/javascript">
	function stype(rnum){
		document.frmsearch.tr.value = rnum;
		frmsearch.submit();
	}
</script>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">同仁意見反映</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>同仁意見反映　<?php //echo $all_type; 先mark找不到變數來源 ?>- 數量：<?php echo $total_size;?></strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <p>
                <form id="searchform" action="ad_system_report.php" method="post" target="_self" class="form-inline">
                    <input id="keyword" name="keyword" id="keyword" class="form-control" type="text" placeholder="搜尋內容" value="">
                    <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                </form>
                </p>
                <p>
					<span class="text-status">搜尋關鍵字：<?php echo SqlFilter($_REQUEST["keyword"],"tab");?></span>&nbsp;▶&nbsp;
					<a class="btn btn-info<?php if ( $tr == 3 ){ echo " btn-active";} ?>" onclick="javascript:stype(3);">未處理/處理中</a>
					<a class="btn btn-info<?php if ( $tr == 1 ){ echo " btn-active";} ?>" onclick="javascript:stype(1);">已處理</a>
					<a class="btn btn-info<?php if ( $tr == 2 ){ echo " btn-active";} ?>" onclick="javascript:stype(2);">不需處理</a>
				</p>
				<form name="frmsearch" id="frmsearch" method="post">
					<input type="hidden" name="keyword" id="keyword" value="<?php echo $keyword;?>">
					<input type="hidden" name="tr" id="tr" value="">
				</form>
                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <thead>
						<tr>
                            <th width="5%">類型</th>
                            <th width="5%">會館</th>
                            <th width="6%">秘書</th>
                            <th>內容</th>
                            <th width="10%">時間</th>
                            <th width="5%">狀態</th>
                            <th width="30%">處理結果</th>
                        </tr>
					</thead>
					<tbody>
						<?php
						if ( count($result) == 0 ){
							echo "<tr><td colspan='8' height='200'>目前沒有資料</td></tr>";
						}else{
							foreach($result as $re){?>
								<tr>
									<td class="center"><?php echo $re["types"];?></td>
									<td class="center"><?php echo $re["branch"];?></td>
									<td class="center"><?php if ( $re["single"] != "" ){ echo SingleName($re["single"],"normel");}?></td>
									<td class="center"><?php echo $re["note"];?></td>
									<td class="center"><?php echo Date_EN($re["times"],9);?></td>
									<td class="center">
										<?php
										$showreportbtn = 0;
										switch ( $re["stat"] ){
											case 1:
												echo "已處理";
												break;
											case 2:
												echo "不需處理";
												break;
											case 3:
												echo "處理中";
												$showreportbtn = 1;
												break;
											default:
												echo "未處理";
												break;
										}
										
										if ( $showreportbtn == 1 ){
											echo "<a class='btn btn-warning btn-xs' href='#system_report2' onclick=system_report2_show('".$re["auton"]."')>提出補充</a>";
										}?>
									</td>
									<td class="center"><?php echo $re["fixnote"];?></td>
								</tr>
						<?php } } ?>
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
<?php require_once("./include/_bottom.php"); ?>