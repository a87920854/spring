<?php
	error_reporting(0);
	/******************************/
	//檔案名稱：ad_quest_v.php
	//後台對應位置：名單/問卷報名資料
	//改版日期：2021.11.16
	//改版設計人員：Jack
	//改版程式人員：Queena
	/******************************/

	require_once("_inc.php");
	require_once("./include/_function.php");

	$an = SqlFilter($_REQUEST["an"], "int");
	$SQL = "Select * From quest Where auton = " . $an;
	$rs = $SPConn->prepare($SQL);
	$rs->execute();
	$result = $rs->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result as $re);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>春天會館</title>
	</head>
	<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
	<script type="text/javascript" src="js/util.js"></script>
	<body leftmargin="0" topmargin="0">
		<table width="600" border="0" align="center">
			<tr>
				<td>
					<fieldset>
						<legend style="color:fuchsia"><strong>春天會館資料</strong></legend>
						<table width="540" border="0" align="center" cellpadding="3">
							<tr bgcolor="#FFF0E1">
								<td colspan="2" bgcolor="#336699">&nbsp;</td>
							</tr>
							<tr bgcolor="#F0F0F0">
								<td height="100" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
									<div align="left">
										<p>問卷編號：<?php echo $re["id"]; ?></p>
										<p>姓名：<?php echo $re["name"]; ?></p>
										<p>性別：<?php echo $re["sex"]; ?></p>
										<p>生日：<?php echo $re["bday"]; ?></p>
										<p>學歷：<?php echo $re["school"]; ?></p>
										<p>服務單位：<?php echo $re["job1"]; ?></p>
										<p>現任職稱：<?php echo $re["job2"]; ?></p>
										<p>居住地：<?php echo $re["area"]; ?></p>
										<p>電子信箱email：<?php echo $re["email"]; ?></p>
										<p>手機號碼：<?php echo $re["phone"]; ?></p>
										<p>活動場次：<?php echo $re["event"]; ?></p>
										<p>感情狀況：<?php echo $re["marry"]; ?></p>
										<p>額外欄位1：<?php echo $re["f1"]; ?></p>
										<p>額外欄位2：<?php echo $re["f2"]; ?></p>
										<p>額外欄位3：<?php echo $re["f3"]; ?></p>
										<p>額外欄位4：<?php echo $re["f4"]; ?></p>
										<p>填寫時間：<?php echo $re["times"]; ?></p>
										<?php if ($re["p0"] != "") { ?>
											<p><img src="idcard/<?php echo $re["p0"]; ?>" width="500" border="0"></p>
										<?php } ?>
										<?php if ($re["p1"] != "") { ?>
											<p><img src="idcard/<?php echo $re["p1"]; ?>" width="500" border="0"></p>
										<?php } ?>
										<?php if ($re["p2"] != "") { ?>
											<p><img src="idcard/<?php echo $re["p2"]; ?>" width="500" border="0"></p>
										<?php } ?>
										<?php if ($re["p3"] != "") { ?>
											<p><img src="idcard/<?php echo $re["p3"]; ?>" width="500" border="0"></p>
										<?php } ?>
									</div>
								</td>
							</tr>
							<?php
							$auton = $re["auton"];
							$phone = $re["phone"];
							$SQL = "Select * From quest Where Not auton = " . $auton . " And phone='" . $phone . "'";
							$rs = $SPConn->prepare($SQL);
							$rs->execute();
							$result = $rs->fetchAll(PDO::FETCH_ASSOC);
							if (count($result) > 0) {
								foreach ($result as $re) {
									echo "<tr><td><td class='center'>" . $re["id"] . "</td><td class='center'><a href='ad_quest_v.asp?an=" . $re["auton"] . "'>" . $re["name"] . "</a></td><td class='center'>" . $re["phone"] . "</td></tr>";
								}
							} ?>
							<tr bgcolor="#FFF0E1">
								<td colspan="2" bgcolor="#336699">
									<div align="right">
										<input name="bu" type="button" onclick="javascript:window.close()"style="font-size: 12pt; color:yellow;background-color:#336699;border-color:white;border-width:1px;" value="關閉">
									</div>
								</td>
							</tr>
						</table>
					</fieldset>
				</td>
			</tr>
		</table>
	</body>
</html>