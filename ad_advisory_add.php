<?php
/***************************************************/
//檔案名稱：ad_advisory_add.php
//後台對應位置：排約/記錄功能 → 諮詢記錄表(新增諮詢記錄)
//改版日期：2022.02.17
//改版設計人員：Jack
//改版程式人員：Queena
/***************************************************/

require_once("_inc.php");
require_once("./include/_function.php");

//接收值
$st = SqlFilter($_REQUEST["st"],"tab");
$n11y = SqlFilter($_REQUEST["n11y"],"tab");
$n11d = SqlFilter($_REQUEST["n11d"],"tab");
$n11h = SqlFilter($_REQUEST["n11h"],"tab");
$n11mm = SqlFilter($_REQUEST["n11mm"],"tab");
$pay_money = SqlFilter($_REQUEST["pay_money"],"tab");
$pay_money2 = SqlFilter($_REQUEST["pay_money2"],"tab");
$pay_money3 = SqlFilter($_REQUEST["pay_money3"],"tab");
$pay_money4 = SqlFilter($_REQUEST["pay_money4"],"tab");
$ap_4 = SqlFilter($_REQUEST["ap_4"],"tab");
$ap_4new = SqlFilter($_REQUEST["ap_4new"],"tab");
$mem_num = SqlFilter($_REQUEST["mem_num"],"tab");
$mem_branch = SqlFilter($_REQUEST["mem_branch"],"tab");
$mem_single = SqlFilter($_REQUEST["mem_single"],"tab");
$mem_wbranch = SqlFilter($_REQUEST["mem_who"],"tab");
$mem_who = SqlFilter($_REQUEST["mem_num"],"tab");
$mem_name = SqlFilter($_REQUEST["mem_name"],"tab");
$mem_sex = SqlFilter($_REQUEST["mem_sex"],"tab");
$types = SqlFilter($_REQUEST["types"],"tab");
$notes = SqlFilter($_REQUEST["notes"],"tab");
$mem_phone = SqlFilter($_REQUEST["mem_phone"],"tab");
$mem_mobile = SqlFilter($_REQUEST["mem_mobile"],"tab");
$mem_auto = SqlFilter($_REQUEST["mem_auto"],"tab");
$mem_username = SqlFilter($_REQUEST["mem_username"],"tab");
$ran = SqlFilter($_REQUEST["ran"],"tab");
$keyword = SqlFilter($_REQUEST["keyword"],"tab");

//新增資料
if ( $st == "add" ){
	$n11 = $n11y . "/" . $n11m . "/" . $n11d . " " . $n11h . ":" . $n11mm;
	if ( chkDate($n11) == false ){
		call_alert("諮詢時間有誤。",0,0);
	}
	$days=(strtotime(date("Y-m-d"))-strtotime($n11))/86400;
	if ( $days > 7 ){ call_alert("無法輸入超過前七天的諮詢紀錄。",0,0); }
	if ( $pay_money == "" && $pay_money2 == "" && $pay_money3 == "" ){ call_alert("請輸入正確的諮詢費用。",0,0);}
	if ( $pay_money3 != "" ){
		if ( is_numeric($pay_money3) && is_numeric($ap_4) ){
			if ( round($pay_money3) > round($ap_4) ){
				call_alert("抵用卷不能超過服務成本。",0,0);
			}
		}
	}
	 
	if ( $pay_money4 != "" ){
		if ( is_numeric($pay_money4) && is_numeric($ap_4new) ){
			if ( round($pay_money4) > round($ap_4new) ){
				call_alert("新抵用卷不能超過新服務成本。",0,0);
			}
		}
	}

	$insert1 = "mem_num,mem_branch,mem_single,mem_wbranch,mem_who,mem_name,mem_sex";
	$insert2 = "'".$mem_num."','".$mem_branch."','".$mem_single."','".$mem_wbranch."','".$mem_who."','".$mem_name."','".$mem_sex."'";

	if ( $pay_money != "" ){ 
		$insert1 .= ",'".$pay_money."'"; 
		$insert2 .= "'".$pay_money."'";
	}
	if ( $pay_money2 != "" ){
		$insert1 .= ",pay_money2";
		$insert2 .= ",'".$pay_money2."'";
	}
	if ( $pay_money3 != "" ){ 
		$insert1 .= ",pay_money3"; 
		$insert1 .= ",'".$pay_money3."'"; 
	}
	if ( $pay_money4 != "" ){ 
		$insert1 .= ",pay_money4"; 
		$insert2 .= ",'".$pay_money4."'"; 
	}

	$insert1 .= "types,times,itimes,keyin,notes,mem_phone,mem_mobile";
	$insert2 .= "'".$types."','".strftime("%Y/%m/%d %H:%M:%S")."','".$n11."','".$_SESSION["MM_Username"]."','".$notes."','".$mem_phone."','".$mem_mobile."'";
		
	if ( $pay_money3 != "" ){
		if ( is_numeric($pay_money3) && is_numeric($ap_4) ){
			$insert1 .= ",last_money";
			$insert2 .= "'".(round($ap_4)-round($pay_money3))."'";
		}
	}

	if ( $pay_money4 != "" ){
		if ( is_numeric($pay_money4) && is_numeric($ap_4new) ){
			$insert1 .= ",last_money2";
			$insert2 .= ",'".(round($ap_4new)-round($pay_money4))."'";
		}
	}

	$SQL_i = "Insert Into ad_advisory (".$insert1.") Values (".$insert2.")";
	$rs_i = $SPConn->prepare($SQL_i);
	$rs_i->execute();

	//
	$SQL = "Select mem_auto, mem_username From member_data Where mem_num='".$mem_num."'";
	$rs = $SPConn->prepare($SQL);
	$rs->execute();
	$result = $rs->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $re);
	if ( count($result) > 0 ){
		$mem_auto = $re["mem_auto"];
		$mem_username = $re["mem_username"];
	}

	if ( $mem_auto != "" ){
		$insert1 = "log_time,log_num,log_fid,log_username,log_name,log_branch,log_single,log_1,log_2,log_4,log_5,log_service";
		$insert2 = "'".strftime("%Y/%m/%d %H:%M:%S")."','".$mem_auto."','".$mem_username."','".$n1."','".SingleName($_SESSION["MM_Username"],"normal")."','".$mem_wbranch."','".$_SESSION["MM_Username"]."','".$mem_phone."','系統記錄'";
		if ( $ran != "" ){
			$insert2 .= "由 ".SingleName($mem_who,"n")." 擔任講師於 ".$n11." 在".$mem_wbranch." 諮詢[".$types."] - 諮詢紀錄";
		}else{
			$insert2 .= "由 ".SingleName($mem_who,"n")&" 擔任講師於 ".$n11." 在".$mem_wbranch." 諮詢[".$types."] - 諮詢紀錄";
		}
		$insert2 .= "'member',1";

		//新增記錄
		$SQL_i = "Insert Into log_data (".$insert1.") Values (".$insert2.");";
		$rs_i = $SPConn->prepare($SQL_i);
		$rs_i->execute();
	}
	reURL("win_close.php?m=新增完成.......");
	exit;
}

//讀取資料
if ( $st == "read" ){
	$subSQL1 = "Select * From member_data Where mem_level='mem' ";
	$subSQL2 = "Select * From member_data Where 1=1";
	if ( is_numeric($keyword) ){
		$subSQL1 .= "And (mem_num='".$keyword."' or mem_mobile='".$keyword."' or mem_username='".$keyword."') ";
	}else{
		$subSQL1 .= "And (mem_mobile='".$keyword."' or mem_username='".$keyword."') ";
	}
	$subSQL1 .= "order by mem_time desc";
	$rs = $SPConn->prepare($subSQL1);
	$rs->execute();
	$result = $rs->fetchAll(PDO::FETCH_ASSOC);
	
	if ( count($result) == 0 ){
		$rs = $SPConn->prepare($subSQL2);
		$rs->execute();
		$result = $rs->fetchAll(PDO::FETCH_ASSOC);
	}
	if ( count($result) == 0 ){
		echo "b";
		exit;
		call_alert("找不到此編號或手機的會員資料。", 1, 1);
	}else{
		echo "a";
		exit;
		foreach($result as $re);
		$mem_branch = $re["mem_branch"];
		$mem_single = $re["mem_single"];
		$mem_name = $re["mem_name"];
		$mem_sex = $re["mem_sex"];
		$mem_phone = $re["mem_phone"];
		$mem_mobile = $re["mem_mobile"];
		$mem_num = $re["mem_num"];
		$mem_username = $re["mem_username"];
		$mem_level = $re["mem_level"];
	}
	$ap_4 = 0;
	if ( $mem_username != "" ){
		$SQL = "Select sum(ap_4) as pst From pay_main Where pay_user='".$mem_username."'";
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result = $rs->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $re);
		if ( count($result) > 0 ){				
			$ap_4 = $re["pst"];
		}
		if ( $ap_4 == "" || is_null($ap_4) ) {
			$ap_4 = 0;
		}
		$bap_4 = 0;
		$SQL = "Select sum(pay_money3) as pp From ad_advisory Where mem_num='".$mem_num."'";
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result = $rs->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $re);
		if ( count($result) > 0 ){
			$bap_4 = $re["pp"];
		}
		if ( $bap_4 == "" || is_null($bap_4) ){
			$bap_4 = 0;
		}
		if ( $bap_4 > 0 ){
			$ap_4 = ($ap_4 - $bap_4);
		}
	}
			
	$ap_4new = 0;
	if ( $mem_username != "" ){
		$SQL = "Select sum(ap_4new) as pst From pay_main Where pay_user='".$mem_username."'";
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result = $rs->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $re);
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
		foreach($result as $re);		
		if ( count($result) > 0 ){
			$bap_4new = $re["pp"];
		}
		if ( $bap_4new == "" || is_null($bap_4new) ){
			$bap_4new = 0;
		}
		if ( $bap_4new > 0 ){
			$ap_4new = ($ap_4new - $bap_4new);
		}
	}
			
	If ( $ran != "" ){
		$SQL = "Select * From ad_advisory Where auton=".$ran;
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result = $rs->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $re);
		if ( count($result) > 0 ){
			$mem_name = $re["mem_name"];
			$mem_sex = $re["mem_sex"];
			$mem_branch = $re["mem_branch"];
			$mem_single = $re["mem_single"];
			$mem_wbranch = $re["mem_wbranch"];
			$mem_who = $re["mem_who"];
			$pay_money = $re["pay_money"];
			$types = $re["types"];
		}
	}
}
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
						<legend style="color:#fc3bf5;font-weight:bold;">春天會館資料 - 新增諮詢紀錄</legend>
						<table width="650" border="0" align="center" cellpadding="3">
							<tr>
								<td colspan="2" bgcolor="#d9dbfd"><strong style="color: #1a218e;">▼ 請輸入處理結果</strong></td>
							</tr>
							<tr>
								<td bgcolor="#F0F0F0" colspan=2>
									<form style="margin:0px;" action="?st=read" method="post" id="form1" onSubmit="return chk_form1()">
										諮詢對象編號/手機/身分證： 
										<input name="keyword" type="text" id="keyword" value="" size="20"> <input type="submit" value="讀取資料">
										<?php
            							if ( $st == "read" ){
              								if ( $mem_level == "mem" ){ echo "&nbsp;&nbsp;&nbsp;&nbsp;<font color='blue'>會員 - 編號 [".$mem_num."]</font>";}
										}else{
              								if ( $mem_level == "mem" ){ echo "&nbsp;&nbsp;&nbsp;&nbsp;<font color='red'>未入會</font>";}
										}
            							?>
									</form>
								</td>
							</tr>
							<form action="?st=add" method="post" id="form2" onSubmit="return chk_form()">
								<tr>
									<td bgcolor="#F0F0F0">
										處理會館/秘書：
										<select name="branch" id="branch">
											<?php
											if ( $ran != "" ){
												echo "<option value='".$mem_branch."' selected>".$mem_branch."</option>";
											}else{
												if ( $mem_branch != "" ){
													echo "<option value='".$mem_branch."' selected>".$mem_branch."</option>";
												}else{
													echo "<option value='' selected>請選擇</option>";
												}

												if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
													//會館資料
													$SQL = "Select * From branch_data Where auto_no<>10 Order By admin_Sort";
													$rs = $SPConn->prepare($SQL);
													$rs->execute();
													$result=$rs->fetchAll(PDO::FETCH_ASSOC);    
													foreach($result as $re){ ?>
														<option value="<?php echo $re["admin_name"];?>"<?php if ( $branch == $re["admin_name"] ){?> selected<?php }?>><?php echo $re["admin_name"];?></option>
												<?php }
												}else{
													echo "<option value='".$_SESSION["branch"]."'>".$_SESSION["branch"]."</option>";
												}
											}?>
										</select>

										<select name="single" id="single">
											<?php
											if ( $ran != "" ){
			  									echo "<option value='".$mem_single."'>".SingleName($mem_single,"normal")."</option>";
											}else{
												if ( $mem_branch != "" ){
													$SQL = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".$mem_branch."' Order By p_desc2 Desc, lastlogintime Desc";
													$rs = $SPConn->prepare($SQL);
													$rs->execute();
													$result = $rs->fetchAll(PDO::FETCH_ASSOC);
													if ( count($result) > 0 ){
														foreach($result as $re){?>
															<option value="<?php echo $re["p_user"];?>"<?php if ( $mem_single == $re["p_user"] ){?> selected<?php }?>><?php echo $re["p_other_name"]?></option>
														<?php }?>
													<?php }?>
												<?php }?>
											<?php }?>
										</select>
									</td>
									<td bgcolor="#F0F0F0">
										講師：
										<select name="mem_wbranch" id="mem_wbranch">
											<?php
											if ( $ran != "" ){
												echo "<option value='".$mem_wbranch."' selected>".$mem_wbranch."</option>";
											}else{
												if ( $mem_branch != "" ){
													echo "<option value='".$mem_branch."' selected>".$mem_branch."</option>";
												}else{
													echo "<option value='' selected>請選擇</option>";
												}
												if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
													//會館資料
													$SQL = "Select * From branch_data Where auto_no<>10 Order By admin_Sort";
													$rs = $SPConn->prepare($SQL);
													$rs->execute();
													$result=$rs->fetchAll(PDO::FETCH_ASSOC);    
													foreach($result as $re){ ?>
														<option value="<?php echo $re["admin_name"];?>"<?php if ( $branch == $re["admin_name"] ){?> selected<?php }?>><?php echo $re["admin_name"];?></option>
													<?php } ?>
												<?php }?>
											<?php }?>
										</select>
										<select name="mem_who" id="mem_who">
											<option value="">請選擇</option>
										</select>
									</td>
								</tr>
								<tr>
									<td bgcolor="#F0F0F0" colspan=2>類型：
										<select name="types" id="types">
											<option value="一對一諮詢"<?php if ( $types == "一對一諮詢" ){ echo " selected"; }?>一對一諮詢</option>
											<option value="一對一造型諮詢"<?php if ( $types == "一對一造型諮詢" ){ echo " selected"; }?>>一對一造型諮詢</option>
											<option value="一對一愛情諮詢"<?php if ( $types == "一對一愛情諮詢" ){ echo " selected"; }?>>一對一愛情諮詢</option>
											<option value="魅力解析"<?php if ( $types == "魅力解析" ){ echo " selected"; }?>>魅力解析</option>      
											<option value="新會員先修"<?php if ( $types == "新會員先修" ){ echo " selected";}?>>>新會員先修</option>          	          	
											<option value="戀愛選修1"<?php if ( $types == "戀愛選修1" ){ echo " selected";}?>>戀愛選修1</option>      
											<option value="戀愛選修2"<?php if ( $types == "戀愛選修2" ){ echo " selected";}?>>戀愛選修2</option>      
											<option value="戀愛選修3"<?php if ( $types == "戀愛選修3" ){ echo " selected";}?>>戀愛選修3</option>      
											<option value="戀愛選修4"<?php if ( $types == "戀愛選修4" ){ echo " selected";}?>>戀愛選修4</option>      
											<option value="戀愛選修5"<?php if ( $types == "戀愛選修5" ){ echo " selected";}?>>戀愛選修5</option>      
											<option value="戀愛選修6"<?php if ( $types == "戀愛選修6" ){ echo " selected";}?>>戀愛選修6</option>      
										</select>
									</td>
								</tr>
								<tr>
									<td bgcolor="#F0F0F0" width="50%">姓名： <input name="mem_name" type="text" id="mem_name" value="<?php echo $mem_name;?>" size="20"></td>
									<td bgcolor="#F0F0F0">性別： 
										<select name="mem_sex" id="mem_sex">
											<option value="男"<?php if ( $mem_sex == "男" ){ echo " selected";}?>>男</option>
											<option value="女"<?php if ( $mem_sex == "女" ){ echo " selected";}?>>女</option>
										</select>
									</td>
								</tr>
								<tr>
									<td bgcolor="#F0F0F0">電話： <input name="mem_phone" type="text" id="mem_phone" value="<?php echo $mem_phone;?>" size="20"></td>
									<td bgcolor="#F0F0F0">手機： <input name="mem_mobile" type="text" id="mem_mobile" value="<?php echo $mem_mobile;?>" size="20"></td>
								</tr>
								<tr>
          							<td bgcolor="#F0F0F0" colspan="2">
										服務成本： 
										<?php
          								if ( $ap_4 <= 0 ){
          									echo "<font color='red'>0</font>";
          									$pay_money3_text = "<font color='red'>無成本可扣</font>";
										}else{
          									echo "<font color='blue'>".$ap_4."</font>";
          									$pay_mopney3_dis = "";
          									$pay_money3_text = "<font color='blue'>".$ap_4." 元可扣</font>";
										}
          								?>
          								&nbsp;&nbsp;
          								新服務成本： 
										<?php
          								if ( $ap_4new <= 0 ){
          									echo "<font color='red'>0</font>";          			
          									$pay_money4_text = "<font color='red'>無成本可扣</font>";
										}else{
          									echo "<font color='blue'>".$ap_4new."</font>";
          									$pay_mopney4_dis = "";
          									$pay_money4_text = "<font color='blue'>".$ap_4new." 元可扣</font>";
										}
          								?>
          							</td>
          						</tr>
								<tr>
            						<td bgcolor="#F0F0F0" colspan="2">
										諮詢時間：
										<select name="n11y" id="n11y">
											<?php
											for ( $i=date("Y");$i<=(date("date")+2);$i++ ){
              									echo "<option value='".$i."'";
												if ( $i == date("T") ){ echo " selected"; }
												echo ">".$i."</option>";
											}
											echo "<option value='".(date("Y")-1)."'>".(date("Y")-1)."</option>";
											?>
										</select> 年
										<select name="n11m" id="n11m">
											<?php
											echo "<option value='".date("m")."'>".date("m")."</option>";
											for ( $i=1;$i<=12;$i++ ){
              									echo "<option value='".$i."'";
												if ( $i == date("m") ){ echo " selected";}
												echo ">".$i."</option>";
											}
											?>
										</select> 月
										<select name="n11d" id="n11d">
											<?php
											for ( $i=1;$i<=31;$i++ ){
			  									echo "<option value='".$i."'";
												if ( $i == date("d") ){ echo " selected";}
												echo ">".$i."</option>";					
											}?>
										</select> 日 
										<select name="n11h" id="n11h">
			  								<option value="">請選擇</option>
											<?php
											for ( $i=10;$i<=22;$i++ ){
												echo "<optio value='".$i."'>".$i."</option>";
											}
											?>
              							</select> 時 
										<select name="n11mm" id="n11mm">
											<option value="00">00</option>
											<option value="15">15</option>
											<option value="30">30</option>
											<option value="45">45</option>
										</select> 分
									</td>			
          						</tr>
								<tr>
									<td bgcolor="#F0F0F0" colspan="2">
										諮詢費：
										現金 <input type="text" name="pay_money" id="pay_money" value="<?php echo $pay_money;?>" style="width:80px;">&nbsp;/&nbsp;
										刷卡 <input type="text" name="pay_money2" id="pay_money2" value="<?php echo $pay_money2;?>" style="width:80px;">
										<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										抵用卷 <input type="text" name="pay_money3" id="pay_money3" value="<?php echo $pay_money3;?>" style="width:80px;"<?php echo $pay_mopney3_dis;?>
										>&nbsp;&nbsp;<?php echo $pay_money3_text;?>
										<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										新抵用卷 <input type="text" name="pay_money4" id="pay_money4" value="<?php echo $pay_money4;?>" style="width:80px;"<?php echo $pay_mopney4_dis;?>>
										&nbsp;&nbsp;<?php echo $pay_money4_text;?>
									</td>
								</tr>
								<tr>
									<td bgcolor="#F0F0F0" colspan="2">備註：<br> <textarea name="notes" id="notes" style="width:95%" rows="3"></textarea></td>
								</tr>
								<tr bgcolor="#d9dbfd"> 
									<td colspan="2" align="center">
									<input name="ran" type="hidden" id="ran" value="<?php echo $ran;?>">
									<input name="mem_num" type="hidden" id="mem_num" value="<?php echo $mem_num;?>">
									<input name="ap_4" type="hidden" id="ap_4" value="<?php echo $ap_4;?>">
									<input name="ap_4new" type="hidden" id="ap_4new" value="<?php echo $ap_4new;?>">
									<input name="Submit" type="submit" id="Submit2" value="確定送出"></td>
								</tr>
							</form>
						</table>
					</fieldset>
				</td>
			</tr>
		</table>
	</body>
</html>

<script language="JavaScript">
	function chk_form1() {
		if (!$("#keyword").val()) {
			alert("請輸入要讀取資料的諮詢對象編號或手機。");
			$("#keyword").focus();
			return false;
		}
		return true;
	}

	function chk_form() {
		var $allc = {
				"mem_branch": "處理會館",
				"mem_single": "會員秘書",
				"mem_wbranch": "諮詢會館",
				"mem_who": "諮詢講師",
				"mem_name": "姓名",
				"mem_mobile": "手機",
				"n11h": "小時"
			},
			$allc2 = {
				"mem_phone": "電話",
				"mem_mobile": "手機",
				"n11h": "小時"
			},
			$rr = 0;
		$.each($allc, function(v, k) {
			if (!$("#" + v).val()) {
				alert("請輸入或選擇" + k + "。");
				$("#" + v).focus();
				$rr = 1;
				return false;
			}
		});
		$.each($allc2, function(v, k) {
			var $re = /^\d+$/;
			if ($("#" + v).val() && !$re.test($("#" + v).val())) {
				alert(k + "只能輸入數字。");
				$("#" + v).focus();
				$rr = 1;
				return false;
			}
		});

		if (!$rr) {
			var $p1 = $("#pay_money").val(),
				$p2 = $("#pay_money2").val(),
				$p3 = $("#pay_money3").val(),
				$p4 = $("#pay_money4").val();
			if (!$p1) $("#pay_money").val("0");
			if (!$p2) $("#pay_money2").val("0");
			if (!$p3) $("#pay_money3").val("0");
			if (!$p4) $("#pay_money4").val("0");

			/*if($p1 == 0 && $p2 == 0 && $p3 == 0) {
  		alert("請輸入正確的諮詢費用。");
  		$rr = 1;
  		$("#pay_money").focus();
     return false;  		
  	}*/
			var $re = /^\d+$/;
			if ($p1 && !$re.test($p1)) {
				alert("諮詢費用現金只能輸入數字。");
				$("#pay_money").focus();
				$rr = 1;
				return false;
			}
			if ($p2 && !$re.test($p2)) {
				alert("諮詢費用刷卡只能輸入數字。");
				$("#pay_money2").focus();
				$rr = 1;
				return false;
			}
			if ($p3 && !$re.test($p3)) {
				alert("抵用卷只能輸入數字。");
				$("#pay_money3").focus();
				$rr = 1;
				return false;
			}
			if ($p4 && !$re.test($p4)) {
				alert("新抵用卷只能輸入數字。");
				$("#pay_money4").focus();
				$rr = 1;
				return false;
			}

			/*if($p3 && $p3 > $("#ap_4").val() > 0) {
				alert("諮詢費用抵用卷不能超過服務成本。");
				$("#pay_money3").focus();
				$rr = 1;
			}*/

		}

		if ($rr) return false;
		else return true;
	}

	$(function() {

		$("select").each(function() {
			$(this).get(0).selectedIndex = 0;
		});

		$("#mem_branch").on("change", function() {
			personnel_get("mem_branch", "mem_single");
		});
		$("#mem_wbranch").on("change", function() {
			personnel_get("mem_wbranch", "mem_who");

		});
	});
</script>