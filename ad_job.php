<?php
	error_reporting(0); 
	/*****************************************/
	//檔案名稱：ad_job.php
	//後台對應位置：名單/發送記錄>徵人資料
	//改版日期：2021.10.19
	//改版設計人員：Jack
	//改版程式人員：Queena
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");
	
	//權限判斷
	$auth_limit = "3";
	require_once("./include/_limit.php");
	check_page_power("ad_job");

	//刪除資料
	if ( SqlFilter($_REQUEST["st"],"tab") == "del" ){
		$SQL_d = "Delete From job Where auton='".SqlFilter($_REQUEST["an"],"tab")."'";
		$rs_d = $SPConn->prepare($SQL_d);
		$rs_d->execute();
		reURL("win_close.php?m=刪除中...");
		//header("location:win_close.php?m=刪除中...");
		//exit;
	}
	
	//SQL組合
	switch ( $_SESSION["MM_UserAuthorization"] ){
		case "admin":
			$subSQL1 = " 1 = 1";
			break;
		default:
			$subSQL1 = " all_branch= '".$_SESSION["branch"]."'";
			break;
	}
	
	//SQL組合判斷 - 處理情形
	$s99 = SqlFilter($_REQUEST["s99"],"tab");
	if ( $s99 != "1" ){
		$subSQL2 = " And (all_note IS NULL)";
		$all_type = "未處理";
	}else{
		$subSQL2 = " And Not (all_note IS NULL)";
		$all_type = "已處理";
	}
	
	$SQL = "Select * From job Where ".$subSQL1.$subSQL2;
	
	//取得總筆數
	$SQL = "Select count(auton) As total_size From job Where".$subSQL1.$subSQL2;
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
	
	$SQL  = "Select * From (";
	$SQL .= "Select TOP ".$page2." * From (";
	$SQL .= "Select TOP ".($tPageSize*$tPage)." * From job Where".$subSQL1.$subSQL2." Order By times Asc) t1 Where".$subSQL1.$subSQL2." Order By times Desc ) t2 Where".$subSQL1.$subSQL2." Order By times Desc ";
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
            <li class="active">徵人資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>徵人資料 - 數量：<?php echo $total_size?></strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <p>
						<span class="text-status">目前狀態：<?php echo $all_type;?></span> ▶&nbsp;
						<a class="btn btn-info<?php if ( $s99 != 1 ){ echo " btn-active";} ?>"<?php if ( $s99 == 1 ){ ?> href="ad_job.php"<?php }else{?> style="cursor:default"<?php }?>>未處理</a>
						<a class="btn btn-info<?php if ( $s99 == 1 ){ echo " btn-active";} ?>"<?php if ( $s99 != 1 ){ ?> href="ad_job.php?s99=1"<?php }else{?> style="cursor:default"<?php }?>>已處理</a>
					</p>
                    <table class="table table-striped table-bordered bootstrap-datatable">
						<?php
						if ( count($result) == 0 ){
							echo "<tr><td colspan='8' height='200'>目前沒有資料</td></tr>";
						}else{
							foreach($result as $re){
								if ( $re["all_type"] == "未處理" ){
									$all_type1 = $re["all_type"];
								}else{
									$all_type1 = "<font color='008000'>已處理</font>";
								} ?>
								<tr>
									<td><?php echo $re["names"];?></td>
									<td><?php echo $re["bdayy"];?></td>
									<td><?php echo $re["area"];?></td>
									<td><?php echo $re["school"];?></td>
									<td><?php echo $re["mobile"];?></td>
									<td><?php echo $re["email"];?></td>
									<td width="30%">
										<font color="#FF0000" size="2"><?php echo $all_type1;?></font>
										<?php if ( $re["all_type"] == "已處理" ){?>
											<br>
											<?php echo "說明：".$re["all_note"];?><br>
											<?php echo "處理日期：".$re["ftime"];?>
										<?php }?>
									</td>
									<td class="center"><?php echo $re["all_branch"];?></td>
									<td width=80 class="center">
										<div class="btn-group">
											<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
											<ul class="dropdown-menu pull-right">
												<?php if ( $_SESSION["MM_UserAuthorization"] == "admin" ){?>
													<li><a href="javascript:Mars_popup('ad_job_send_branch.php?an=<?php echo $re["auton"];?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
													<li><a href="javascript:Mars_popup2('ad_job.php?st=del&an=<?php echo $re["auton"];?>','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>
												<?php }?>
												<li><a href="javascript:Mars_popup('ad_job_fix.php?an=<?php echo $re["auton"];?>','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
											</ul>
										</div>
									</td>
								</tr>
							<?php 
							}
						}?>
                    </table>
                </div>
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
require_once("./include/_bottom.php")
?>