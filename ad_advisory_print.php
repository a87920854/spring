<?php

/*********************************************/
//檔案名稱：ad_advisory.php
//後台對應位置：排約/記錄功能 → 諮詢記錄表(列印)
//改版日期：2022.02.21
//改版設計人員：Jack
//改版程式人員：Queena
/*********************************************/

require_once("_inc.php");
require_once("./include/_function.php");

//接收值
$time1 = SqlFilter($_REQUEST["time1"], "tab");
$time2 = SqlFilter($_REQUEST["time2"], "tab");
$qtime1 = SqlFilter($_REQUEST["qtime1"], "tab");
$qtime2 = SqlFilter($_REQUEST["qtime2"], "tab");
$branch = SqlFilter($_REQUEST["branch"], "tab");
$single = SqlFilter($_REQUEST["single"], "tab");

//判斷篩選條件
if ($time1 == "" && $time2 == "" && $qtime1 == "" && $qtime2 == "" && $branch == "" && $single == "") {
	call_alert("避免系統負載過重,請篩選資料後再執行列印。", "nClose", 0);
}

//判斷日期
if ($time1 != "") {
	$time1 = $time1;
	if (chkDate($time1) == false) {
		call_alert("起始日期有誤。", 0, 0);
	}
}

if ($time2 != "") {
	$time2 = $time2;
	if (chkDate($time2) == false) {
		call_alert("結束日期有誤。", 0, 0);
	}
}

if ($qtime1 != "") {
	$qtime1 = $qtime1;
	if (chkDate($qtime1) == false) {
		call_alert("起始日期有誤。", 0, 0);
	}
}

if ($qtime2 != "") {
	$qtime2 = $qtime2;
	if (chkDate($qtime2) == false) {
		call_alert("結束日期有誤。", 0, 0);
	}
}

//語法
if ($_SESSION["MM_UserAuthorization"] == "admin") {
	$subSQL1 = "1=1 ";
} elseif ($_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "action" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "pay" || $_SESSION["MM_UserAuthorization"] == "teacher") {
	if ($_SESSION["area_branch"] == "" || is_Null($_SESSION["area_branch"])) {
		$subSQL1 = "mem_branch='" . $_SESSION["branch"] . "' ";
	} else {
		$subSQL1 = "1=1 ";
	}
}

//日期+語法
if (chkDate($time1) && chkDate($time2)) {
	$days = (strtotime($time2) - strtotime($time1)) / 86400;
	if ($days < 0) {
		call_alert("結束時間不能大於起始時間。", 0, 0);
	}
	$txt .= "/ 諮詢日期：" . $time1 . " ~ " . $time2;
	$subSQL1 .= "And itimes between '" . $time1 . " 00:00' and '" . $time2 . " 23:59' ";
}

if (chkDate($qtime1) && chkDate($qtime2)) {
	$days = (strtotime($qtime2) - strtotime($qtime1)) / 86400;
	if ($days < 0) {
		call_alert("結束時間不能大於起始時間。", 0, 0);
	}
	$txt .= "/ 記錄日期：" . $qtime1 . " ~ " . $qtime2;
	$subSQL1 .= "And times between '" . $qtime1 . " 00:00' and '" . $qtime2 . " 23:59' ";
}

//篩選條件(會館)
if ($branch != "") {
	$txt .= "/ 會館：" . $branch;
	$subSQL1 .= "And (mem_branch Like '%" . $branch . "%' or ac_branch like '%" . $branch . "%') ";
	if ($_SESSION["area_branch"] == "" || $_SESSION["area_branch"] == NULL) {
		if (substr($subSQL1, -1) != "1") {
			//$subSQL1 .= ") ";
		}
	} else {
		$subSQL1 .= "Or (mem_branch in ('" . $area_branch . "') or ac_branch in ('" . $area_branch . "')) ";
	}
} else {
	if ($_SESSION["area_branch"] != "" || $_SESSION["area_branch"] != NULL) {
		$subSQL1 .= "And (mem_branch in ('" . $area_branch . "') or ac_branch in ('" . $area_branch . "')) ";
	}
}
//篩選條件(祕書)
if ($single != "") {
	$txt .= "/ 祕書：" . $single;
	$subSQL1 .= "And mem_single Like '%" . str_Replace("'", "''", $single) . "%' ";
}

//篩選條件(講師)
if ($s8 != "") {
	$txt .= "/ 講師：" . $s8;
	$subSQL1 .= "And mem_who = '" . $s8 . "'";
}

//篩選條件(關鍵字)
if ($keyword != "") {
	$txt .= "/ 關鍵字：" . $keyword;
	$subSQL1 .= "And (mem_name like N'%" . str_Replace("'", "''", $keyword) . "%' or mem_num like '%" . str_Replace("'", "''", $keyword) . "%') ";
}

$SQL = "Select * From ad_advisory Where " . $subSQL1 . " Order By auton Desc";
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetchAll(PDO::FETCH_ASSOC);
?>
<style>
	table {
		font-size: 12px;
	}
</style>
諮詢紀錄表 <?php echo $txt; ?>
<br><br>
<table width="100%" border="1" style="border-collapse:collapse;" borderColor="black">
	<tbody>
		<tr>
			<th>諮詢時間</th>
			<th>諮詢類型</th>
			<th>諮詢對象</th>
			<th>諮詢費</th>
			<th>剩餘成本</th>
			<th>新剩餘成本</th>
			<th>會員會館秘書</th>
			<th>講師會館</th>
			<th>諮詢講師</th>
			<th>紀錄時間</th>
		</tr>
		<?php foreach ($result as $re){ ?>
			<tr> 
				<td align="center"><?php echo $re["itimes"];?></td>  
				<td align="center"><?php echo $re["types"];?></td>
				<td align="center"><?php echo $re["mem_name"];?>[<?php echo $re["mem_num"];?>]</td>
				<td align="center">
					<?php
					if ( $re["pay_money"] > 0 ){ echo "現金：".$re["pay_money"]." 元"; }
					if ( $re["pay_money2"] > 0 ){ echo "刷卡：".$re["pay_money2"]." 元"; }
					if ( $re["pay_money3"] > 0 ){ echo "抵用卷：".$re["pay_money3"]." 元"; }
					if ( $re["pay_money4"] > 0 ){ echo "新抵用卷：".$re["pay_money4"]." 元"; }
					?>
				</td>
				<td align="center"><?php $re["last_money"]." 元";?></td>
				<td align="center"><?php $re["last_money2"]." 元";?></td>
				<td align="center"><?php echo $re["mem_branch"];?>/<?php echo SingleName($re["mem_single"],"normal");?></td>
				<td align="center"><?php echo $re["mem_wbranch"];?></td>
				<td align="center"><?php echo SingleName($re["mem_who"],"normal");?></td>
				<td align="center"><?php echo $re["times"];?></td>    
			</tr>
		<?php }?>
	</tbody>
</table>
<script type="text/javascript">
	window.print();
	//window.close();
</script>