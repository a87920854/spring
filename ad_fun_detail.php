<?php

	/*****************************************/
	//檔案名稱：ad_fun_detail.php
	//後台對應位置：好好玩管理系統/好好玩國內報名>詳細
	//改版日期：2021.11.15
	//改版設計人員：Jack
	//改版程式人員：Jack
	/*****************************************/

	require_once("_inc.php");
	require_once("./include/_function.php");

	//程式開始 *****
	if ($_SESSION["MM_Username"] == "") {
		call_alert("請重新登入。", "login.php", 0);
	}

	if ($_REQUEST["st"] == "c1_save") {
		if ($_REQUEST["k_come"] == "add") {
			if ($_REQUEST["k_come_new"] != "") {
				$SQL = "select k_come from love_keyin where k_come = '" . SqlFilter($_REQUEST["k_come_new"],"tab") . "'";
				$rs = $FunConn->prepare($SQL);
				$rs->execute();
				$result = $rs->fetchAll(PDO::FETCH_ASSOC);
				if ($result) {
					call_alert("這個來源已經存在。", 0, 0);
				}
				$SQL = "update love_keyin set k_come = '" . SqlFilter($_REQUEST["k_come_new"],"tab") . "' where k_id=" . SqlFilter($_REQUEST["id"],"int");
				$rs = $FunConn->prepare($SQL);
				$rs->execute();
			} else {
				call_alert("請輸入要新增的來源。", 0, 0);
			}
		} else {
			$SQL = "update love_keyin set k_come = '" . SqlFilter($_REQUEST["k_come"],"tab") . "' where k_id=" . SqlFilter($_REQUEST["id"],"int");
			$rs = $FunConn->prepare($SQL);
			$rs->execute();
		}
		reURL("win_close.asp?m=修改中...");
	}

	if ($_REQUEST["st"] == "c1") {
		echo "<script src='js/jquery-1.8.3.js'></script>";
		$SQL = "select k_come from love_keyin where k_id=" . SqlFilter($_REQUEST["id"],"int");
		$rs = $FunConn->prepare($SQL);
		$rs->execute();
		$result = $rs->fetch(PDO::FETCH_ASSOC);
		if ($result) {
			echo "目前來源：" . $result["k_come"] . "<br>";
		}
		echo "<form name='form1' method='post' action='ad_fun_detail.asp?st=c1_save'>";
		echo "<select name='k_come' id='k_come'>";
		echo "<option value=''>請選擇</option>";
		$SQL = "select distinct k_come from love_keyin";
		$rs = $FunConn->prepare($SQL);
		$rs->execute();
		$result = $rs->fetchAll(PDO::FETCH_ASSOC);
		if ($result) {
			foreach ($result as $re) {
				if ($re["k_come"] != "") {
					echo "<option value='" . $re["k_come"] . "'>" . $re["k_come"] . "</option>";
				}
			}
		}
		echo "<option value='add'>新增</option>";
		echo "</select><span id='new_div'></span>";
		echo "<br><input type='hidden' name='id' value='" . $_REQUEST["id"] . "'><input type='submit' value='送出'>";
		echo "</form>"; ?>
		<script>
			$(function() {
				$("#k_come").on("change", function() {
					if ($(this).val() == "add") {
						$("#new_div").append($("<input>").attr("name", "k_come_new").attr("id", "k_come_new").attr("type", "text"));
					} else {
						$("#new_div").empty();
					}
				});
			});
		</script>
	<?php
		exit;
	}
	// 刪除檔案(未完)
	if ($_REQUEST["st"] == "delpic") {
		$delpic = 0;
		$SQL = "select p1,p2,p3 from love_keyin where k_id=" . SqlFilter($_REQUEST["id"],"int");
		$rs = $FunConn->prepare($SQL);
		$rs->execute();
		$result = $rs->fetchAll(PDO::FETCH_ASSOC);
		if ($result) {
			switch ($_REQUEST["v"]) {
				case "1":
					$rr = "p1";
					break;
				case "2":
					$rr = "p2";
					break;
				case "3":
					$rr = "p3";
					break;
			}
			
			$info = "funtour_image\joinf\\" . $rr; //目錄名
			if (is_dir($info)) {
				if (rmdir($info)) {
					$SQL = "UPDATE love_keyin SET ".$rr." ='' where k_id=" . SqlFilter($_REQUEST["id"],"int");
					$rs = $FunConn->prepare($SQL);
					$rs->execute();
					echo "檔案刪除完畢";				
				} else {
					echo "檔案無法刪除!";
				}
			}		
		}
	}

	// 查詢本人資料
	$SQL = "SELECT * FROM love_keyin WHERE k_id =" . SqlFilter($_REQUEST["k_id"],"int");
	$rs = $FunConn->prepare($SQL);
	$rs->execute();
	$result = $rs->fetch(PDO::FETCH_ASSOC);
?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style TYPE="text/css">
		body,
		th,
		td,
		input,
		select,
		textarea,
		select,
		checkbox {
			font: 10pt 新細明體
		}

		.a1:link {
			font: 10pt "新細明";
			text-decoration: none;
			color: #990066
		}

		.a1:visited {
			font: 10pt "新細明";
			text-decoration: none;
			color: #990066
		}

		a:link {
			font: 10pt "新細明";
			text-decoration: none;
			color: #0000FF
		}

		a:visited {
			font: 10pt "新細明";
			text-decoration: none;
			color: #0000FF
		}

		a:active {
			font: 10pt "新細明";
			text-decoration: none;
			color: #0000FF
		}

		a:hover {
			font: 10pt "新細明";
			text-decoration: underline;
			color: ff0000
		}

		.style14 {
			font-size: 12px
		}

		body {
			overflow-y: auto;
		}
	</style>
</head>

<body text="#333333" leftmargin="0" topmargin="0">
	<table width="670" border="0" cellspacing="0">
		<tr>
			<td width="670" valign="top">
				<table width="670" border="1">
					<tr>
						<td height="25" bgcolor="#336699">
							<div align="center">
								<font color="#990066" size="3"><strong>
										<font color="#FFFFFF">好好玩報名詳細資料</font>
									</strong></font>
							</div>
						</td>
					</tr>
				</table>
				<table width="670" border="1" cellpadding="3">
					<tr>
						<td width="80">
							<div align="right">姓名：</div>
						</td>
						<td width="246"><?php echo $result["k_name"]; ?></td>
						<td width="80">
							<div align="right">性別：</div>
						</td>
						<td width="246"><?php echo $result["k_sex"]; ?></td>
					</tr>
					<tr>
						<td>
							<div align="right">年次：</div>
						</td>
						<td><?php echo $result["k_year"]; ?></td>
						<td>
							<div align="right">學歷：</div>
						</td>
						<td><?php echo $result["k_school"]; ?></td>
					</tr>
					<tr>
						<td>
							<div align="right">手機：</div>
						</td>
						<td><?php echo $result["k_mobile"]; ?></td>
						<td>
							<div align="right">地區：</div>
						</td>
						<td><?php echo $result["k_area"]; ?></td>
					</tr>
					<tr>
						<td>
							<div align="right">E-mail：</div>
						</td>
						<td><?php echo $result["k_yn"]; ?></td>
					</tr>

					<tr>
						<td>
							<div align="right">身高：</div>
						</td>
						<td><?php echo $result["ac_1"]; ?></td>
						<td>
							<div align="right">體重：</div>
						</td>
						<td><?php echo $result["ac_2"]; ?></td>
					</tr>

					<tr>
						<td>
							<div align="right">星座：</div>
						</td>
						<td><?php echo $result["k_star"]; ?></td>
						<td>
							<div align="right">婚姻狀態：</div>
						</td>
						<td><?php echo $result["k_marry"]; ?></td>
					</tr>

					<tr>
						<td>
							<div align="right">FB帳號：</div>
						</td>
						<td><?php echo $result["ac_3"]; ?></td>
						<td>
							<div align="right">LINE ID：</div>
						</td>
						<td><?php echo $result["lineid"]; ?></td>
					</tr>
					<tr>
						<td>
							<div align="right">同行者姓名：</div>
						</td>
						<td><?php echo $result["k_accompany"]; ?></td>
						<td>
							<div align="right"></div>
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							<div align="right">餐點：</div>
						</td>
						<td><?php echo $result["k_eat1"]; ?></td>
						<td>
							<div align="right">飲品：</div>
						</td>
						<td><?php echo $result["k_eat2"]; ?></td>
					</tr>
					<tr>
						<td>
							<div align="right">上車地點：</div>
						</td>
						<td colspan="3"><?php echo $result["ac_car"]; ?></td>
					</tr>
					<tr>
						<td>
							<div align="right">處理會館：</div>
						</td>
						<td><?php echo $result["all_branch"]; ?></td>
						<td>
							<div align="right">處理秘書：</div>
						</td>
						<td>
							<?php 
								if($result["all_single"] != ""){
									echo SingleName($result["all_single"],"normal");
								}
							?>
						</td>
					</tr>
					<tr>
						<td>
							<div align="right">處理項目：</div>
						</td>
						<td colspan="3"><?php echo $result["all_type"]; ?></td>
					</tr>
					<tr>
						<td>
							<div align="right">處理內容：</div>
						</td>
						<td colspan="3"><?php echo $result["all_note"]; ?></td>
					</tr>
					<tr>
						<td colspan="4">
							<font size="2">訊息來源</font>
							<font size="2">：<?php echo $result["k_come"]; ?></font>
							<?php
								if( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["funtourpm"] == "1"){
									echo "<a href=\"javascript:window.open('ad_fun_detail.php?st=c1&id={$result["k_id"]}','','width=300,height=200,top=300,left=300');\">修改</a>";
								}
							?>
							
							<font size="2">優惠序號</font>
							<font size="2">：<?php echo $result["k_come2"]; ?></font>
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<font size="2">廣告來源</font>
							<font size="2">：<?php echo $result["k_cc"]; ?></font>
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<font size="2">身分證字號</font>
							<font size="2">：<?php echo $result["k_user"]; ?>　<font size="2">飲食習慣</font>
								<font size="2">：<?php echo $result["k_eat"]; ?></font>
							</font>
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<font size="2">電話(公)：<?php echo $result["k_phone1"]; ?>　　 (家)：<?php echo $result["k_phone2"]; ?></font>
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<font size="2">服務機關：<?php echo $result["k_company"]; ?>　現任職稱：<?php echo $result["k_company2"]; ?>　　<span class="style14">學歷：</span><?php echo $result["k_school"]; ?></font>
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<font size="2">地址：<?php echo $result["k_address"]; ?></font>
						</td>
					</tr>
					<tr>
						<td colspan="4"><span class="style14">公開資料：<font size="2"><?php echo $result["k_2"]; ?></font></span></td>
					</tr>
					<tr>
						<td colspan="4">
							<font size="2">備註：<?php echo $result["remark"]; ?></font>
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<font size="2">資料時間：<?php echo $result["k_time"]; ?></font>
						</td>
					</tr>
				</table>

				<table width="670" border="1" cellpadding="3">
					<?php
						if($result["all_kind"] == "活動"){
							echo "<tr><td colspan=2 bgcolor='#336699'><div align='center'><font color='#990066' size=3><strong><font color='#FFFFFF' size=2>證件上傳</font></strong></font></div></td></tr>";
							if($result["mem_num"] != ""){
								$SQL = "select p1,p2,p3,p1e,p2e,p3e from member_data where mem_num=" . $result["mem_num"];
								$rs = $FunConn->prepare($SQL);
								$rs->execute();
								$result2 = $rs->fetch(PDO::FETCH_ASSOC);
								if(!$result2){
									echo "<tr><td>無上傳證件</td></tr>";
								}else{
									$p1 = $result["p1"];
									$p2 = $result["p2"];
									$p3 = $result["p3"];
									$p1e = $result["p1e"];
									$p2e = $result["p2e"];
									$p3e = $result["p3e"];
									$chphoto = 0;
									if($p1 != "" && $p1e == "ok"){
										echo "<tr><td><img width=100% src='http://www.funtour.com.tw/images/goldcardf/".$p1."?rndt=".rand(1,9999)."'></td></tr>";
										$chphoto = 1;
									} 
									if($p2 != "" && $p2e == "ok"){
										echo "<tr><td><img width=100% src='http://www.funtour.com.tw/images/goldcardf/".$p2."?rndt=".rand(1,9999)."'></td></tr>";
										$chphoto = 1;
									}
									if($p3 != "" && $p3e == "ok"){
										echo "<tr><td><img width=100% src='http://www.funtour.com.tw/images/goldcardf/".$p3."?rndt=".rand(1,9999)."'></td></tr>";
										$chphoto = 1;
									}
	
									if($chphoto == 0){
										echo "<tr><td>證件均未審核或未通過審核</td></tr>";
									}
								}
							}
						}else{
							echo "<tr><td colspan=2 bgcolor='#336699'><div align='center'><font color='#990066' size=3><strong><font color='#FFFFFF' size=2>生活照上傳</font></strong></font></div></td></tr>";
							$SQL = "select * from ojoin_photo where k_id=".$result["k_id"]." and k_user='" .$result["k_user"]. "' and ac_auto=" . $result["ac_auto"];
							$rs = $FunConn->prepare($SQL);
							$rs->execute();
							$result2 = $rs->fetchAll(PDO::FETCH_ASSOC);
							if(!$result2){
								echo "<tr><td>無</td></tr>";
							}else{
								foreach($result2 as $re2){
									echo "<tr><td><img src='http://www.funtour.com.tw/ojoin_photo/" .$re2["fname"]. "?rndt=".rand(1,9999)."'></td></tr>";
								}
							}
						}						
					?>	
				</table>

				<table width="670" border="1" cellpadding="3">
					<tr>
						<td colspan="2" bgcolor="#336699">
							<div align="center">
								<font color="#990066" size="3"><strong>
										<font color="#FFFFFF" size="2">活動資料</font>
									</strong></font>
							</div>
						</td>
					</tr>
					<tr>
						<td width="80">
							<div align="right">參團價格：</div>
						</td>
						<td width="572"><?php echo $result["k_money"]; ?></td>
					</tr>
					<tr>
						<td width="80">
							<div align="right">活動會館：</div>
						</td>
						<td width="572"><?php echo $result["action_branch"]; ?></td>
					</tr>
					<tr>
						<td>
							<div align="right">活動時間：</div>
						</td>
						<td><?php echo $result["action_time"]; ?></td>
					</tr>
					<tr>
						<td>
							<div align="right">活動標題：</div>
						</td>
						<td><?php echo $result["action_title"]; ?></td>
					</tr>
					<tr>
						<td>
							<div align="right">活動內容：</div>
						</td>
						<td><?php echo $result["action_note"]; ?></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>

</html>