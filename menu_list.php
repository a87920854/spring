<?php
	require_once("./include/_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");

	$_SESSION["MM_Username"] = "Q";
	
	$menu1 = "管理系統";
	$menu2 = "主功能";
	
	If ( $_SESSION["MM_Username"] == "" ){
		call_alert("請重新登入。","login.html");
	}
	
	//data query
	$SQL = "Select * From menu_m Order By Sort";
	$rs = $SPConn->prepare($SQL);
	$rs->execute();
	$rows = $rs->fetchAll(PDO::FETCH_ASSOC);
?>

<!--MIDDLE-->
<section id="middle">
	<!-- page title -->
	<header id="page-header">
		<ol class="breadcrumb">
			<li><a href="index.asp"><?php echo $menu1;?></a></li>
			<li class="active"><?php echo $menu2.$txt_list;?></li>
		</ol>
	</header>
	<!-- /page title -->

	<div id="content" class="padding-20">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="title elipsis">
					<strong><?php echo $menu2.$txt_list;?></strong>
				</span>
			</div>
			<div class="col-md-12">
				<p><input name="Add" type="button" id="Add" class="btn btn-success" onClick="window.location='<?php echo "menu_edit.php"?>';" value="<?php echo $txt_add;?>"></p>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered bootstrap-datatable">
					<thead>
						<tr>
							<th width=40>NO</th>
							<th>主功能名稱</th>
							<th>排列順序編號</th>
							<th>建立日期(人員)</th>
							<th>修改日期(人員)</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					<?php if ( $rsf = $rs->fetchAll()) { ?>
						<?php foreach( $rsf as $ref ) {?>
							<tr>
								<td width="2%"></td>
								<td width="19%"></td>
								<td width="19%"></td>
								<td width="19%"></td>
								<td width="19%"></td>
								<td></td>
							</tr>
						<?php }?>
					<?php }else{?>
						<tr><td colspan="6">目前暫無資料</td></tr>
					<?php }?>
					</tbody>
				</table>				  
			</div>
		</div>	
	</div><!--/.fluid-container-->
</section>
<?php require_once("./include/_bottom.php");?>