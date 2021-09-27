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
	
	//判斷是否為複製
	if ( SqlFilter($_REQUEST["kind"],"tab") != "" ){
		$kind = SqlFilter($_REQUEST["kind"],"tab");
	}
	
	
	//表單檔案驗證
	if ( $_REQUEST["Submit"] != "" ){
		
		$MSG = "";
		
		//順序設定
		if (is_numeric($_POST["Sort"]) == false ){
			$MSG .= "【順序】空白或非數字格式!\\n";
		}
		
		//判斷功能名稱
		if (strLen($_POST["Name"]) == 0){
			$MSG .= "【功能名稱】請勿空白\\n";
		}
	
		//判斷路徑檔案
		if (strLen($_POST["Url"]) == 0){
			$MSG .= "【路徑檔案】請勿空白\\n";
		}
		
		if ( $MSG == "" ){
		
		}
	}
		
	
	
	
?>
<script language="JavaScript" type="text/javascript">
	
	//判斷表單欄位
	function login(theForm){
		theForm.submit()
	}

	function fieldCheck0(theForm){
		
		//判斷項目順序
		if (isNaN(parseInt(theForm.Sort.value))){
			alert("【順序】空白或非數字型態!"); 
			theForm.Sort.value = "";
			theForm.Sort.focus();
			return false; }		
		
		//判斷功能名稱
		if (theForm.Name.value == ""){
			alert("【功能名稱】請勿空白!");
			theForm.Name.focus();
			return false; }
		
		//判斷路徑檔案
		if (theForm.Url.value == ""){
			alert("【路徑檔案】請勿空白!");
			theForm.Url.focus();
			return false; }	
			
		return true;
	}
</script>

<!-- MIDDLE -->
<section id="middle">
	<!-- page title -->
	<header id="page-header">
		<ol class="breadcrumb">
			<li><a href="index.php"><?php echo $menu1;?></a></li>
			<li><a href="menu_list.php"><?php echo $menu2.$txt_list;?></a></li>
			<li class="active"><?php echo $menu2.$txt_edit;?></li>
		</ol>
	</header>
	<!-- /page title -->

	<div id="content" class="padding-20">
		<!-- content starts -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="title elipsis">
					<strong><?php echo $menu2.$txt_edit;?></strong>
				</span>
			</div>
			<div class="panel-body">       	       	 
				<form name="form1" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" class="form-inline" onsubmit='if (fieldCheck0(this)) {return true; login(this);} else {return false;}'>
					<table class="table table-striped table-bordered bootstrap-datatable">
						<thead>
							<tr>
								<td><span style="color:red;">*</span> 排列順序：<input name="Sort" type="text" id="Sort" value="<?=$sort;?>" class="form-control" style="width:5%;">
							</tr>
							<tr>
								<td><span style="color:red;">*</span> 功能名稱：<input name="Name" type="text" id="Name" class="form-control" value="<?=$name;?>"></td>
							</tr>
							<tr>
								<td><span style="color:red;">*</span> 路徑檔案：<input name="Url" type="text" id="Url" class="form-control" value="<?=$url;?>" style="width:50%;"></td>
							</tr>
							<tr>
								<td><span style="color:white;">*</span> 功能概述：<input name="Memo" type="text" id="Memo" class="form-control" value="<?=$memo;?>" style="width:50%;"></td>
							</tr>
						</thead>
						<tr> 
							<td colspan="2">
								<input type="submit" name="Submit" value="確定新增 / 修改" class="btn btn-info">
								<input type="hidden" id="auto_no" name="auto_no" value="">
							</td>
						</tr>
					</table>
				</form>
    		</div>
		</div>
	</div>
</section>
<?php require_once("./include/_bottom.php");?>
