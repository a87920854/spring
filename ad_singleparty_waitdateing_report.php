<?php
/************************************************/
//檔案名稱：ad_singleparty_waitdateing_report.php
//後台對應位置：約會專家功能/約會升級審核(處理結果)
//改版日期：2022.02.07
//改版設計人員：Jack
//改版程式人員：Queena
/************************************************/

require_once("_inc.php");
require_once("./include/_function.php");

//接收值
$state = SqlFilter($_REQUEST["state"],"tab");
$msg = SqlFilter($_REQUEST["msg"],"tab");
$a = SqlFilter($_REQUEST["a"],"tab");

//新增
if ( $state == "add" ){
  $SQL_u = "Update si_invite Set power_near=2, power_near_note='".$msg."' Where auton='".$a."'";
  $rs_u = $SPConn->prepare($SQL_u);
  $rs_u->execute();
  reURL("win_close.php");
  exit;
}

//判斷是否有資料
$SQL = "Select * From si_invite Where auton='".$a."'";
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetchAll(PDO::FETCH_ASSOC);
if ( count($result) > 0 ){ ?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  	<title>約會專家</title>
</head>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<body leftmargin="0" topmargin="0">
	<form action="?state=add" method="post" name="form1" onsubmit="return chk_form()">
  		<table width="350" border="0" align="center">
			<tr> 
				<td>
					<fieldset>
						<legend style="color:#fc3bf5;font-weight:bold;">約會專家資料</legend>
						<table width="340" border="0" align="center" cellpadding="3">
							<tr> 
								<td colspan="2" bgcolor="#d9dbfd"><strong style="color: #1a218e;">▼ 請輸入處理結果</strong></td>
							</tr>
							<tr bgcolor="#F0F0F0"> 
								<td height="100" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
									<div align="center"> 
										<p>
											<textarea name="Text1" cols="40" rows="7" id="msg" name="msg"></textarea>
											<!--<input type="text" style="width:90%" name="msg" id="msg">-->
										</p>
									</div>
								</td>
							</tr>
							<tr> 
								<td colspan="2" bgcolor="#d9dbfd"> 
									<div align="center"> 
										<input name="Submit" type="submit" id="Submit2" style="font-size: 9pt" value="確定送出">
										<input name="a" type="hidden" id="a" value="49655">                               
									</div>
								</td>
							</tr>
						</table>
					</fieldset>
				</td>
			</tr>
		</table>
	</form>
</body>
<?php }?>
<script language="JavaScript">
	$(function() {
	});
	function chk_form() {
		if(!$("#msg").val()) {
			alert("請輸入處理結果");
			$("#msg").focus();
			return false;
		}
		return true;
	}
</script>
