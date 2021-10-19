<?php
	require_once("_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");

	//新增記錄 [ system_report ]
	if ( $_REQUEST["st"] == "system_report" ){
		if ( $_REQUEST["system_report_note"] != "" ){
			if ( $_REQUEST["noshow"] == "1" ){ $noshow = 1; }else{ $noshow = ""; }
			$note = str_replace("\r\n","<br>",$_REQUEST["system_report_note"]);
			$SQL  = "Insert Into system_report(types, branch, single, noshow, note) Values ( ";
			$SQL .= "'".SqlFilter($_REQUEST["system_report_types"],"tab")."',";
			$SQL .= "'".SqlFilter($_SESSION["branch"],"tab")."',";
			$SQL .= "'".SqlFilter($_SESSION["MM_Username"],"tab")."',";
			$SQL .= "'".SqlFilter($noshow,"str")."',";
			$SQL .= "'".SqlFilter($note,"str")."')";
			$rs = $SPConn->prepare($SQL);
			$rs->execute();
			
		}
		call_alert("您反映的事項已成功送出。", "ad_system_report_list.php", 0);
		exit;
	}
	
	//更新記錄 [ system_report ]
	if ( $_REQUEST["st"] === "system_report2" ){
		if ( $_REQUEST["system_report2_an"] == "" ){ call_alert("編號錯誤。",0,0); }
		if ( $_REQUEST["system_report_note2"] != "" ){
			$SQL = "Select Top 1 * From system_report Where auton='".$_REQUEST["system_report2_an"]."'";
			$rs = $SPConn->prepare($SQL);
			$rs->execute();
			$result=$rs->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $re);
				if ( count($result) > 0 ) {
					$note = $re["note"]."<br><font color='blue'>[".chtime(now)."] 補充：<br></font>".str_replace("\r\n","<br>",$_REQUEST["system_report_note2"]);
					$SQL  = "Update system_report Set note='".$note."' Where auton='".$_REQUEST["system_report2_an"]."'";
					$rs = $SPConn->prepare($SQL);
					$rs->execute();
				}
		}
		call_alert("您補充的內容已成功送出。", "ad_system_report_list.php", 0);
		exit;
	}
	
	//顯示筆數
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
	
	if ( SqlFilter($_REQUEST["keyword"],"tab") != "" ){
		$subSQL3 = " And (note Like '%".SqlFilter($_REQUEST["keyword"],"tab")."%' Or fixnote Like '%".SqlFilter($_REQUEST["keyword"],"tab")."%')";
	}
	
	//取得處理狀態語法
	$subSQL4 = "";
	$tr = SqlFilter($_REQUEST["tr"],"int" );
	if ( $tr == 1 ){ //已處理
		$subSQL4 = " And stat=1";
	}elseif ( $tr == 2 ){ //不需處理
		$subSQL4 = " And stat=2";
	}elseif ( $tr == 3 ){ //未處理/處理中
		$subSQL4 = " And Not stat=1 And Not stat=2";
	}
	
	//取得總筆數
	$SQL = "Select count(auton) As total_size From system_report Where ".$subSQL2.$subSQL3.$subSQL4;
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
	echo $SQL;
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
                    <a class="btn btn-info" href="#system_report" data-toggle="modal" data-target="#system_report">提出意見</a>
                    <input id="keyword" name="keyword" id="keyword" class="form-control" type="text" placeholder="搜尋內容" value="<?php echo $_REQUEST["keyword"];?>">
                    <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                </form>
                </p>
				<p>
					<span class="text-status">所有資料狀態 </span> ▶&nbsp;
					<a class="btn btn-info<?php if ( $tr == 3 ){ echo " btn-active";} ?>" onclick="javascript:stype(3);">未處理/處理中</a>
					<a class="btn btn-info<?php if ( $tr == 1 ){ echo " btn-active";} ?>" onclick="javascript:stype(1);">已處理</a>
					<a class="btn btn-info<?php if ( $tr == 2 ){ echo " btn-active";} ?>" onclick="javascript:stype(2);">不需處理</a>
				</p>
				<form name="frmsearch" id="frmsearch" method="post">
					<input type="hidden" name="tr" id="tr" value="">
				</form>
                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr style="bgcolor='#f0f0f0';">
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
									<td class="center"><?php if ( $re["single"] != "" ){ echo SingleName("normal",$re["single"]);}?></td>
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

<div class="modal fade" id="system_report">
    <div class="modal-dialog">
        <form action="ad_system_report_list.php?st=system_report" method="post" target="_self" class="form-inline nomargin" onsubmit="return chk_form_system_report()">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="send_branch_div_close1" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">同仁意見反映</h4>
                </div>
                <div class="modal-body">
                    <p>提升會館整體營運及服務品質，歡迎同仁提出寶貴意見。我們會認真參考並積極回覆。<small>(此意見反映內容不對外公開)</small></p>
                    <p><select name="system_report_types" id="system_report_types">
                            <option value="">請選擇意見類型</option>
                            <option value="系統">系統</option>
                            <option value="人事">人事</option>
                            <option value="行銷">行銷</option>
                            <option value="制度">制度</option>
                            <option value="服務">服務</option>
                            <option value="會務">會務</option>
                            <option value="其他">其他</option>
                        </select></p>
                    <p><textarea name="system_report_note" id="system_report_note" style="width:80%;height:120px;" autocomplete="off" placeholder="請輸入詳細的意見內容"></textarea></p>
                    <p><label class="checkbox"><input type="checkbox" name="noshow" id="noshow" value="1" autocomplete="off"><i></i>此意見及回覆均不需出現在列表中<small>(特殊或敏感問題適用)</small></label></p>
                </div>
                <div class="modal-footer" style="text-align:center">
                    <input type="hidden" name="url" value="/ad_system_report_list.php">
                    <a href="#close" class="btn btn-success" data-dismiss="modal">關閉視窗</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" class="btn btn-primary" value="確定送出">
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="system_report2">
    <div class="modal-dialog">
        <form action="ad_system_report_list.php?st=system_report2" method="post" target="_self" class="form-inline nomargin" onsubmit="return chk_form_system_report2()">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="send_branch_div_close1" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">補充意見</h4>
                </div>
                <div class="modal-body">
                    <p><textarea name="system_report_note2" id="system_report_note2" style="width:80%;height:120px;" autocomplete="off" placeholder="請輸入要補充的意見內容"></textarea></p>
                </div>
                <div class="modal-footer" style="text-align:center">
                    <input type="hidden" name="url2" value="/ad_system_report_list.php">
                    <input type="hidden" name="system_report2_an" id="system_report2_an" value="">
                    <a href="#close" class="btn btn-success" data-dismiss="modal">關閉視窗</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" class="btn btn-primary" value="確定送出">
                </div>
            </div>
        </form>
    </div>
</div>

<?php
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    function chk_form_system_report() {
        if (!$("#system_report_types").val()) {
            alert("請選擇意見類型");
            return false;
        }

        if (!$("#system_report_note").val()) {
            alert("請輸入意見內容");
            return false;
        }
        return true;
    }

    function chk_form_system_report2() {
        if (!$("#system_report_note2").val()) {
            alert("請輸入意見內容");
            return false;
        }
        return true;
    }

    function system_report2_show($an) {
        $("#system_report2").modal("show");
        $("#system_report2_an").val($an);
    }
</script>