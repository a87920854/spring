<?php

	/*****************************************/
	//檔案名稱：funweb_index.php
	//後台對應位置：好好玩網站管理系統/首頁最新消息
	//改版日期：2021.12.29
	//改版設計人員：Jack
	//改版程式人員：Jack
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar_fun.php");

	//程式開始 *****
	if ($_SESSION["MM_Username"] == "") {
		call_alert("請重新登入。", "login.php", 0);
	}
	if ($_SESSION["MM_UserAuthorization"] != "admin" && $_SESSION["funtourpm"] != "1") {
		call_alert("您沒有查看此頁的權限。", "login.php", 0);
	}

	// 刪除
	if($_REQUEST["st"] == "del"){
		$SQL = "DELETE from web_data where types='oindex_marquee' and auton=".SqlFilter($_REQUEST["a"],"int");
		$rs = $FunConn->prepare($SQL);
		$rs->execute();
		if($rs){
			reURL("win_close.php?m=資料刪除中");
		}
	}

?>

<!-- MIDDLE -->
<section id="middle">
	<!-- page title -->
	<header id="page-header">
		<ol class="breadcrumb">
			<li><a href="index.php">管理系統</a></li>
			<li>好好玩網站管理系統</li>
			<li class="active">首頁最新消息</li>
		</ol>
	</header>
	<!-- /page title -->

	<div id="content" class="padding-20">
		<!-- content starts -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="title elipsis">
					<strong>首頁最新消息</strong> <!-- panel title -->
				</span>
			</div>

			<div class="panel-body">
				<p><a href="#a" onclick="Mars_popup('funweb_fun7_add.php', 'fun7add', 'width=600,height=300,top=200,left=300')" class="btn btn-info">新增消息</a></p>
				<table class="table table-striped table-bordered bootstrap-datatable">
					<?php 
						$SQL = "select * from web_data where types='oindex_marquee' order by t1 desc";
						$rs = $FunConn->prepare($SQL);
						$rs->execute();
						$result = $rs->fetchAll(PDO::FETCH_ASSOC);
						if(!$result){
							echo "<tr><td colspan=2>目前無資料</td></tr>";
						}else{
							foreach($result as $re){
								if($re["n2"] != ""){
									$aa = "<a href=\"".$re["n2"]."\" target='_blank'>";
								}else{
									$aa = "";
								}
								echo "<td>".$aa.$re["n1"]."</a></td><td width='200'><a href='#a' onclick=\"Mars_popup('funweb_fun7_add.php?a=".$re["auton"]."', 'fun7add', 'width=600,height=300,top=200,left=300')\">修改</a>　<a href=\"javascript:;\" onClick=\"Mars_popup2('?st=del&a=".$re["auton"]."','','width=300,height=200,top=30,left=30')\">刪除</a></td></tr>";
							}							
						}
					?>
				</table>
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