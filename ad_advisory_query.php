<?php
/***************************************************/
//檔案名稱：ad_advisory_query.php
//後台對應位置：排約/記錄功能 → 諮詢記錄表(查詢服務成本)
//改版日期：2022.2.21
//改版設計人員：Jack
//改版程式人員：Queena
/***************************************************/
require_once("_inc.php");
require_once("./include/_function.php");

//接收值
$st = SqlFilter($_REQUEST["st"],"tab");
$keyword = SqlFilter($_REQUEST["keyword"],"tab");
?>
<html>
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/util.js"></script>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>春天會館</title>
</head>

<body leftmargin="0" topmargin="0">
	<table width="660" border="0" align="center">
		<tr>
			<td>
				<fieldset>
					<legend style="color:#fc3bf5;font-weight:bold;">春天會館資料</legend>
					<form action="?st=add" method="post" id="form2" onSubmit="return chk_form()">
						<table width="650" border="0" align="center" cellpadding="3">
							<tr>
								<td colspan="2" bgcolor="#d9dbfd"><strong style="color: #1a218e;">▼ 查詢服務成本</strong></td>
							</tr>
          					<tr>
          						<?php
          						if ( $st == "add" ){
          							$SQL1 = "Select * From member_data Where mem_level='mem'";
          							$SQL2 = "Select * From member_data Where 1=1";
	          						if ( is_numeric($keyword) ){
              							$subSQL1 .= " And (mem_num='".$keyword."' Or mem_mobile='".$keyword."' Or mem_username='".$keyword."')";
									}else{
	            						$subSQL1 .= " And (mem_mobile='".$keyword."' or mem_username='".$keyword."')";
									}
	            					$subSQL1 .= " Order By mem_time Desc";
									$rs = $SPConn->prepare($SQL1.$subSQL1);
									$rs->execute();
									$result = $rs->fetchAll(PDO::FETCH_ASSOC);
									if ( count($result) == 0 ){
										$rs = $SPConn->prepare($SQL2.$subSQL1);
										$rs->execute();
										$result = $rs->fetchAll(PDO::FETCH_ASSOC);
									}
									if ( count($result) == 0 ){ ?>	          	
	          							<td bgcolor="#F0F0F0" width="50%" height="80" align="center">找不到此編號或手機的會員資料。</td>
	          						<?php
									}else{
										foreach($result as $re);
										$mem_name  = $re["mem_name"];
	          							$mem_mobile = $re["mem_mobile"];
	          							$mem_num = $re["mem_num"];
	            						$mem_username = $re["mem_username"];
	            						$web_level = $re["web_level"];
	            						$mem_level = $re["mem_level"];
										$web_startime = $re["web_startime"];
	            						$web_endtime = $re["web_endtime"];
									}
							        $ap_4 = 0;
									if ( $mem_username != "" ){
										$SQL = "Select sum(ap_4) as pst From pay_main where pay_user='".$mem_username."'";
										$rs = $SPConn->prepare($SQL);
										$rs->execute();
										$result = $rs->fetchAll(PDO::FETCH_ASSOC);
										foreach($result as $re);										
										if ( count($result) > 0 ){
											$ap_4 = $re["pst"];
										}
										if ( $ap_4 == "" || is_null($ap_4) == true ){
											$ap_4 = 0;
										}		
										$bap_4 = 0;
										$SQL = "Select sum(pay_money3) as pp From ad_advisory Where mem_num='".$mem_num."'";
										$rs = $SPConn->prepare($SQL);
										$rs->execute();
										$result = $rs->fetchAll(PDO::FETCH_ASSOC);
										if ( count($result) > 0 ){
											$bap_4 = $re["pp"];
										}				
										if ( $bap_4 == "" || is_null($bap_4) ){
											$bap_4 = 0;
										}
										if ( $bap_4 > 0 ){
											$ap_4 = ($ap_4-$bap_4);
										}		
										$ap_4new = 0;
										if ( $mem_username != "" ){
											$SQL = "Select sum(ap_4new) as pst From pay_main where pay_user='".$mem_username."'";
											$rs = $SPConn->prepare($SQL);
											$rs->execute();
											$result = $rs->fetchAll(PDO::FETCH_ASSOC);											
											if ( count($result) > 0 ){
												$ap_4new = $re["pst"];
											}
											if ( $ap_4new == "" || is_null($ap_4new) ){
												$ap_4new = 0;
											}
											$bap_4new = 0;
											$SQL = "Select sum(pay_money4) as pp From ad_advisory Where mem_num='".$mem_num."'";
											$rs = $SPConn->prepare($SQL);
											$rs->execute();
											$result = $rs->fetchAll(PDO::FETCH_ASSOC);																						
											if ( count($result) > 0 ){
												$bap_4new = $re["pp"];
											}		
											if ( $bap_4new == "" || is_null($bap_4new) ){
												$bap_4new = 0;
											}
											if ( $bap_4new > 0 ){
												$ap_4new = ($ap_4new-$bap_4new);
											}
										}?>
	          							<td bgcolor="#F0F0F0" width="50%" height="80" align="center">
	          								姓名：<?php echo $mem_name;?><br>
	          								手機：<?php echo $mem_mobile;?><br>
	          								會員資格：
											<?php
											if ( $mem_level = "mem" ){
												$web_time = "(".$web_startime."~".$web_endtime.")";
												switch ($web_level){
													case 1:
														$wbl = "資料認證會員";
														break;
													case 2:
														$wbl = "真人認證會員";
														break;
													case 3:
														$wbl = "璀璨會員-一年期";
														break;
													case 4:
														$wbl = "璀璨VIP會員-一年期";
														break;
													case 5:
														$wbl = "璀璨會員-二年期";
														break;
													case 6:
														$wbl = "璀璨VIP會員-二年期";
														break;
												}
												echo "<font color='blue'>".$wbl.$web_time."</font>";
											}else{
												echo "<font color='red'>非會員</font>";
											}
											?>
											<br><br>
											<font color="#8B008B">---------- 請確認以上資訊正確 ----------</font><br><br>
											<?php	          	
	          								if ( $ap_4 > 0 ){
	          									echo "剩餘服務成本：<font color='blue'>".$ap_4."</font>";
											}else{
	          									echo "剩餘服務成本：<font color='red'>".$ap_4."</font>";
											}
	          								echo "<br>";
	          								if ( $ap_4new > 0 ){
	          									echo "剩餘新服務成本：<font color='blue'>".$ap_4new."</font>";
											}else{
	          									echo "剩餘新服務成本：<font color='red'>".$ap_4new."</font>";
											}
	          								?>
	          							</td>
	          						<?php }?>
	          						<tr bgcolor="#FFF0E1"> 
            							<td bgcolor="#336699" colspan="2" align="center">		
											<input type="button" value="關閉視窗" style="width:60%;height:40px;" onclick="window.close();">
										</td>
							        </tr>
	          					<?php }else{?>
						            <td bgcolor="#F0F0F0" width="50%" height="80">
										請輸入要查詢的編號/手機/身分證： 
										<input name="keyword" type="text" id="keyword" value="<?php echo $keyword;?>" size="20">
										<br>
									</td>
									<tr>
										<td colspan="2" bgcolor="#d9dbfd" style="text-align: center;"> 
											<input name="Submit" type="submit" id="Submit2" value="確定送出">
										</td>
									</tr>
          						<?php }?>
          					</tr>
						</table>
					</form>
				</fieldset>
			</td>
		</tr>
	</table>
</body>

</html>

<script language="JavaScript">
	$(function() {
		$("#keyword").focus();
	});

	function chk_form() {
		if (!$("#keyword").val()) {
			alert("請輸入關鍵字。");
			$("#keyword").focus();
			return false;
		}
		return true;
	}
</script>