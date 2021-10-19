<?php
	require_once("_inc.php");
	require_once("./include/_function.php");
	require_once("./include/_top.php");
	require_once("./include/_sidebar.php");
	
	$mem_num = SqlFilter($_REQUEST["mem_num"],"int");
	$mem_au = SqlFilter($_REQUEST["mem_au"],"int");
	$mem_mobile = SqlFilter($_REQUEST["mem_mobile"],"tab");
	$member_item = 1; //for button

	if ( $mem_num == "" && $mem_au == "" && $mem_mobile == "" ){ call_alert("會員編號讀取有誤。", "ClOsE",0);}
	
	$st = SqlFilter($_REQUEST["st"],"tab");

	if ( $st == "addsirealinvite" ){
		$SQL_d = "Update si_real_invite Set sk_real_invite=1 Where mem_num='".$mem_num."'";
		$rs_d = $SPConn->prepare($SQL_d);
		$rs_d->execute();
		header("location:ad_mem_detail.asp?mem_num=".$mem_num);
		exit;
	}
	
	if ( $st == "proofdel" ){
		$SQL = "Select * From proof_data Where photo_auto='".SqlFilter($_REQUEST["a"],"tab")."'";
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result=$rs->fetchAll(PDO::FETCH_ASSOC);
		if ( count($result) > 0 ){
			$path = dirname(__FILE__)."\idcard\\".$re["photo_name"];
			//刪除實體檔案
			DelFile($path);
			//刪除資料庫資料
			$SQL_d = "Delete From proof_data Where photo_auto='".SqlFilter($_REQUEST["a"],"tab")."'";
			$rs_d = $SPConn->prepare($SQL_d);
			$rs_d->execute();
		}
		header("location:ad_mem_detail.asp?mem_num=".$mem_num);
		exit;
	}
	
	//審核不通過
	if ( $st == "checknook" ){
		$SQL = "Select mem_auto,mem_username, mem_name, mem_mobile, si_errmsg From member_data Where mem_num='".$mem_num."'";
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result=$rs->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $re);
		if ( count($result) > 0 ){
			if ( SqlFilter($_REQUEST["errmsg"],"tab") != "" ){
				$SQL_u = "Update member_data Set si_errmsg=N'".SqlFilter($_REQUEST["errmsg"],"tab")."' Where mem_num='".$mem_num."'";
				$rs_u = $SPConn->prepare($SQL_u);
				$rs_u->execute();
			}
			$mem_au = $re["mem_auto"];
			$lusername = $re["mem_username"];
			$n1 = $re["mem_name"];
			$n10 = $re["mem_mobile"];
		}
	
		if ( SqlFilter($_REQUEST["errmsg"],"tab") != "" ){
			//新增
			$SQL_i  = "Insert Into log_data(log_time,log_num,log_fid,log_username,log_name,log_branch,log_single,log_1,log_2,log_4,log_5) Values ( '";
			$SQL_i .= SqlFilter(date("Y-m-d"),"tab")."',";
			$SQL_i .= "'".SqlFilter($mem_au,"tab")."',";
			$SQL_i .= "'".SqlFilter($lusername,"tab")."',";
			$SQL_i .= "'".SqlFilter($n1,"tab")."',";
			$SQL_i .= "'".SqlFilter($_SESSION["p_other_name"],"tab")."',";
			$SQL_i .= "'".SqlFilter($_SESSION["branch"],"tab")."',";
			$SQL_i .= "'".SqlFilter($_SESSION["MM_Username"],"tab")."',";
			$SQL_i .= "'".SqlFilter($n10,"tab")."',";
			$SQL_i .= "'系統計錄',";
			$SQL_i .= "'".$_SESSION["p_other_name"]."於".date("Y-m-d")."不通過資料審核，原因：".SqlFilter($_REQUEST["errmsg"],"tab")."',";
			$SQL_i .= "'member')";
			$rs_i = $SPConn->prepare($SQL_i);
			$rs_i->execute();
			header("location:ad_mem_detail.asp?mem_num=".$mem_num);
			exit;
		}
	}

	//審核通過
	if ( $st == "checkok" ){
		$cardid = strtoupper(str_replace(" ", "", SqlFilter($_REQUEST["cardid"],"tab")));
		$SQL = "Select mem_auto, mem_name, mem_username,mem_num,mem_passwd, si_account, mem_level,mem_mobile, web_level, web_startime, web_endtime, si_enterprise, mem_branch, mem_single From member_data Where mem_num='".$mem_num."'";
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result=$rs->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $re);
		if ( count($result) == 0 ){
			call_alert("會員編號讀取有誤。", 0,0);
		}else{
			$isbranch = 0;
			$rsreopen = 0;
			$canpic = 0;
			if ( is_null($re["web_level"]) == false && $re["web_level"] != 0 ){
				call_alert("此會員已審核通過。", 0,0);
			}
			if ( (integer)SqlFilter($_REQUEST["web_level"],"int") >= 2 && $re["mem_level"] == "mem" ){
				call_alert("要升級成真人認證或璀璨會員須先將會員等級變更成已入會。", 0,0);
			}
			
			
			
			$havefid = 0;
			$SQL1 = "Select mem_num, web_level From member_data Where mem_username = '".$cardid."'";
			$rs1 = $SPConn->prepare($SQL1);
			$rs1->execute();
			$result1=$rs1->fetchAll(PDO::FETCH_ASSOC);
			if ( count($result1) > 0 ){
				foreach($result1 as $re1){
					if ( $re["mem_num"] != $re1["mem_num"] ){
						$havefid = 1;
					}
				}
			}
    
			if ( $havefid == 1 ){
				call_alert("此身分證字號重覆，請聯絡總公司處理。".$cardid, 0,0);
			}
			
			$mem_au = $re["mem_auto"];
			$lusername = $re["mem_username"];
			$n1 = $re["mem_name"];
			$n10 = $re["mem_mobile"];
			$mem_branch = $re["mem_branch"];
			$mem_single = $re["mem_single"];				
			
			if ( $re["mem_username"] == "" || is_null($re["mem_username"]) ) {
				$in_mem_username = cardid;
				$mem_username = cardid;
				$isbranch = 1;
			}else{
				$in_mem_username = "";
				$mem_username = $re["mem_username"];
			}

			if ( $re["si_account"] == "" || $re["si_account"] == "0" || is_null($re["si_account"]) ){
				$si_account = $cardid;
			}

			if ( $re["mem_passwd"] == "" || is_null($re["mem_passwd"]) ){
				$mem_passwd = substr($mem_username, -5);
			}
				
			$web_level = (integer)SqlFilter($_REQUEST["web_level"],"int");
			$web_startime = date("Y-m-d");
			
			switch ($web_level){
				case "1":
					$web_endtime = date("Y/m/d",strtotime("+2 day"));
					$timemsg = date("Y/m/d")."~".date("Y/m/d",strtotime("+2 day"));
				case "2":
					$web_endtime = date("Y/m/d",strtotime("+6 day"));
					$timemsg = date("Y/m/d")."~".date("Y/m/d",strtotime("+6 day"));
				case "3":
					$web_endtime = "";
					$timemsg = "視服務期間而定";
			}
				
			if ( $re["si_enterprise"] == 99 ){
				$si_enterprise = 1;
			}
			
			$SQL_u  = "Update member_data Set ";
			$SQL_u .= "mem_username='".$$in_mem_username."',";
			$SQL_u .= "si_account=".$si_account."',";
			$SQL_u .= "mem_passwd=".$mem_passwd."',";
			$SQL_u .= "web_level='".$web_level."',";
			$SQL_u .= "web_startime='".$web_startime."',";
			$SQL_u .= "web_endtime='".$web_endtime."',";
			$SQL_u .= "si_enterprise='".$si_enterprise."'";
			$SQL_u .= " Where mem_num='".$mem_num."'";
			$rs_u = $SPConn->prepare($SQL);
			$rs_u->execute();
		
			//新增 log_data
			if ( $isbranch == 1 ){
				$branch_set = "，由審核人員設定帳號";
			}else{
				$branch_set = "";
			}
			$SQL_i  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, log_4, log_5) Values ( ";
			$SQL_i .= "'".SqlFilter(date("H:s:i"),"tab")."',";
			$SQL_i .= "'".SqlFilter($mem_au,"tab")."',";
			$SQL_i .= "'".SqlFilter($lusername,"tab")."',";
			$SQL_i .= "'".SqlFilter($n1,"tab")."',";
			$SQL_i .= "'".SqlFilter($_SESSION["p_other_name"],"tab")."',";
			$SQL_i .= "'".SqlFilter($_SESSION["branch"],"tab")."',";
			$SQL_i .= "'".SqlFilter($_SESSION["MM_Username"],"tab")."',";
			$SQL_i .= "'".SqlFilter($n10,"tab")."',";
			$SQL_i .= "'系統紀錄',";
			$SQL_i .= "'".$_SESSION["p_other_name"]."於".date("H:s:i")."通過資料審核，並變更成".num_lv($web_level)." - 效期至".$timemsg.$branch_set;
			$SQL_i .= "'member')";
			$rs_i = $SPConn->prepare($SQL_i);
			$rs_i->execute();
			
			//新增 single_sysmsg
			$mem_single_name = SingleName($mem_single);
			$SQL_i  = "Insert Into log_data(mem_num, msg, url, branch, single, singlename, times, types, types2, log_single, index_show) Values ( ";
			$SQL_i .= "'".SqlFilter($mem_num,"tab")."',";
			$SQL_i .= "'".$mem_single_name."您好，您的會員".$n1." [".$mem_num."] 資料，已由總公司審核通過，麻煩您協助進一步邀請對方到會館進行面對面認證。";
			$SQL_i .= "'ad_no_mem.asp?fullm=".$mem_num;
			$SQL_i .= "'".SqlFilter($mem_branch,"tab")."',";
			$SQL_i .= "'".SqlFilter($mem_single,"tab")."',";
			$SQL_i .= "'".SqlFilter($mem_single_name,"tab")."',";
			$SQL_i .= "'".date("H:s:i")."',";
			$SQL_i .= "'系統訊息',";
			$SQL_i .= "'網站認證',";
			$SQL_i .= "'".SqlFilter($_SESSION["MM_Username"],"tab")."',";
			$SQL_i .= "'1')";
			$rs_i = $SPConn->prepare($SQL_i);
			$rs_i->execute();
			header("location:ad_mem_detail.asp?mem_num=".$mem_num);
		}
		exit;
	}
	
	if ( SqlFilter($_REQUEST["st"],"tab") == "delpic" ){
		$log_save = 0;
		$SQL = "Select mem_name, mem_username, mem_mobile, mem_photo, mem_p1, mem_p2, mem_p3, mem_p4 From member_data Where mem_auto=".$mem_au;
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result=$rs->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $re);
		if ( count($result) > 0 ){
			if ( SqlFilter($_REQUEST["v"],"tab") != "" ){
				$lusername = $re["mem_username"];
				$n1 = $re["mem_name"];
				$n10 = $re["mem_mobile"];
				$rrv = SqlFilter($_REQUEST["v"],"tab");
				if ( $rrv == "mem_photo" ){
					$n4 = "本人照片";
				}elseif ( $rrv == "mem_p1" ){
					$n4 = "身分證正面";
				}elseif ( $rrv == "mem_p2" ){
					$n4 = "身分證反面";
				}elseif ( $rrv == "mem_p3" ){
					$n4 = "工作證";
				}else{
					$n4 = "學力證明";
				}
				$rr = $re["rrv"];
				if ( $rrv == "mem_photo" ){
					$path = dirname(__FILE__)."\photo\\".$rr;
					//rmfile(server.mappath("photo\"&rr))
				}else{
					$path = dirname(__FILE__)."\idcard\\".$rr;
					//rmfile(server.mappath("idcard\"&rr))
				}
				
				//更新 member_data
				$SQL_u  = "Update member_data Set ";
				$SQL_u .= "rrv='' Where mem_num='".$mem_num."'";
				$rs_u = $SPConn->prepare($SQL);
				$rs_u->execute();
				$log_save = 1;
			}
		}
		
		if ( $log_save == 1 ){		
			//新增 log_data
			$SQL_u  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, log_4, log_5) Values ( '";
			$SQL_u .= SqlFilter(date("H:m:s"),"tab")."',";
			$SQL_u .= "'".SqlFilter($mem_au,"tab")."',";
			$SQL_u .= "'".SqlFilter($lusername,"tab")."',";
			$SQL_u .= "'".SqlFilter($n1,"tab")."',";
			$SQL_u .= "'".SqlFilter(_SESSION["p_other_name"],"tab")."',";
			$SQL_u .= "'".SqlFilter(_SESSION["branch"],"tab")."',";
			$SQL_u .= "'".SqlFilter(_SESSION["MM_Username"],"tab")."',";
			$SQL_u .= "'".SqlFilter($n10,"tab")."',";
			$SQL_u .= "'系統紀錄',";
			$SQL_u .= "'".$_SESSION["p_other_name"]."於".date("H:m:s")."刪除".$n4."'";
			$SQL_u .= "'member')";
			$rs_u = $SPConn->prepare($SQL);
			$rs_u->execute();
		}
		header("location:ad_mem_detail.asp?mem_num=".$mem_num);
	}
	
	//刪除 log_data
	if ( SqlFilter($_REQUEST["st"],"tab") == "log_del" ){
		$SQL_d = "Delete From log_data Where log_auto='".SqlFilter($_REQUEST["la"],"int");
		$rs_d = $SPConn->prepare($SQL_d);
		$rs_d->execute();
		header("location:ad_mem_detail.asp?mem_num=".SqlFilter($_REQUEST["mem_num"],"tab"));
	}
	
	if ( SqlFilter($_REQUEST["st"],"tab") == "log_send" ){
		$log_6_time = SqlFilter($_REQUEST["log_6"],"tab")." ".SqlFilter($_REQUEST["log_6_time1"],"tab").":".SqlFilter($_REQUEST["log_6_time2"],"tab");
		$log_6_time = date("Y-m-d H:m:i",$log_6_time);
		if ( chkDate($log_6_time) == false ){
			call_alert("預約時間有誤。",0,0);
		}
	
		//更新 member_data
		$SQL_u = "Update member_data Set all_type='".SqlFilter($_REQUEST["log_2"],"tab")."' Where mem_auto=".SqlFilter(_REQUEST["mem_auto"],"int");
		$rs_u = $SPConn->prepare($SQL_u);
		$rs_u->execute();

		//新增 log_data
		if ( SqlFilter($_REQUEST["log_6"],"tab") != "點此預約下次通話" && chkDate($_REQUEST["log_6"]) ){
			$log_6 = SqlFilter($_REQUEST["log_6"],"tab");
			$in_log_6_time = $log_6_time;
			$log_4 = $_SESSION["p_other_name"]."於".date("H:m:s")."預約 ".$log_6_time." 聯絡，內容：".SqlFilter($_REQUEST["log_4"],"tab");
		}else{
			$in_log_6_time = "";
			$log_4 = SqlFilter($_REQUEST["log_4"],"tab");
		}
		
		
		$SQL_i  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, log_3, log_5, log_6, log_4) Values ( ";
		$SQL_i .= "'".SqlFilter(date("H:s:i"),"tab")."',";
		$SQL_i .= "'".SqlFilter($_REQUEST["mem_auto"],"tab")."',";
		$SQL_i .= "'".SqlFilter($_REQUEST["lusername"],"tab")."',";
		$SQL_i .= "'".SqlFilter($_REQUEST["log_username"],"tab")."',";
		$SQL_i .= "'".SqlFilter($_REQUEST["log_name"],"tab")."',";
		$SQL_i .= "'".SqlFilter($_REQUEST["log_branch"],"tab")."',";
		$SQL_i .= "'".SqlFilter($_REQUEST["MM_Username"],"tab")."',";
		$SQL_i .= "'".SqlFilter($_REQUEST["mem_mobile"],"tab")."',";
		$SQL_i .= "'預約聯絡',";
		$SQL_i .= "'".SqlFilter($_REQUEST["log_3"],"tab")."',";
		$SQL_i .= "'".SqlFilter($_REQUEST["ty"],"tab")."',";
		$SQL_i .= "'".SqlFilter($$in_log_6_time,"tab")."',";
		$SQL_i .= "'".SqlFilter($log_4,"tab")."')";
		$rs_i = $SPConn->prepare($SQL_i);
		$rs_i->execute();
		updatemyreservation();
		header("location:ad_mem_detail.asp?mem_num=".$_REQUEST["mem_num"]);
	}		


	if ( $mem_num != "" ){
		$SQL = "Select * From member_data Where mem_num = '".$mem_num."'";
	}elseif ( $mem_mobile != "" ){
		$SQL = "Select * From member_data Where mem_mobile = '".$mem_mobile."'";
	}else{
		$SQL = "Select * From member_data Where mem_auto = ".$mem_au;
	}
	$rs = $SPConn->prepare($SQL);
	$rs->execute();
	$result=$rs->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $re);
	if ( count($result) == 0 ){
		call_alert("會員資料讀取有誤或無此會員。", 0,0);
	}else{
		$this_single = strtoupper($_SESSION["MM_Username"]);
		$this_branch = $_SESSION["branch"];
		$lovebranch = $_SESSION["lovebranch"];
		$mem_num = $re["mem_num"];
		$mem_branch = $re["mem_branch"];
		$mem_branch2 = $re["mem_branch2"];
		$mem_single = strtoupper($re["mem_single"]);
		$mem_single2 = strtoupper($re["mem_single2"]);
		$love_single = strtoupper($re["love_single"]);
		$call_branch = $re["call_branch"];
		$call_single = strtoupper($re["call_single"]);
		$cansee = 0;
		$block_msg = "<font color='red'>不可見</font>";
		
		if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
			$cansee = 1;
		}elseif ( $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
			$cmem_branch = ",".$mem_branch.",";
			$cmem_branch2 = ",".$mem_branch2.",";
			$ccall_branch = ",".$$call_branch.",";
			$lovebranch = ",".$lovebranch.",";			
			if ( strstr($lovebranch, $cmem_branch) > 0 || strstr($lovebranch, $cmem_branch2) > 0 || strstr($lovebranch, $ccall_branch) > 0 ){
				$cansee = 1;
			}
		}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "pay" ){
			if ( $this_branch == $mem_branch || $this_branch == $mem_branch2 || $this_branch == $call_branch ){
				$cansee = 1;
			}
		}elseif ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "action" || $_SESSION["MM_UserAuthorization"] == "keyin" || $_SESSION["MM_UserAuthorization"] == "manager" ){			
			if ( $this_single == $mem_single || $this_single == $mem_single2 || $this_single == $love_single || $this_single == $call_single ){
				$cansee = 1;
			}
		}else{
			$cansee = 0;
		}
		
		if ( $re["mem_level"] == "mem" ){
			$mem_lv = "會員";
		}else{
			$mem_lv = "未入會";
		}

		if ( $mem_branch == "八德"){
			$bfont = "<font color='green'>DateMeNow</font>";
		}elseif ( $re["mem_come"] == "約會專家" ){
			$bfont = "<font color='red'>約會專家</font>";
		}else{
			$bfont = "<font color='red'>春天會館</font>";
		}

		if ( $mem_branch == "" || empty($mem_branch) ){
			$bfont = "";
		}
	
		if ( $re["si_account"] != "" && $re["si_account"] != "0" ){
			$bfont = "<font color='#c22c7d'>約會專家主帳號</font>";
		}

		$mem_username = trim($re["mem_username"]);
		if ( $mem_username != "" ){
			$mem_username = str_replace(" ", "", $mem_username);
		}
		
		//取得卡別
		$SQL_card = "Select card_name From card_type Where card_no=".$re["mem_join"];
		$rs_card = $SPConn->prepare($SQL_card);
		$rs_card->execute();
		$result_card=$rs_card->fetchAll(PDO::FETCH_ASSOC);
		foreach($result_card as $re_card);
		if ( count($result_card) > 0 ){
			$card_name = $re_card["card_name"];
		}else{
			$card_name = "不明";
		}
	}
?>
<style>
	label.checkbox {
		padding-left:12px;
		margin-left:12px;
	}
	label.checkbox i {
		left:-12px;
	}
</style>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_mem.php">會員管理系統</a></li>
            <li class="active"><?php echo $mem_lv;?>詳細資料 - 編號 <?php echo $mem_num;?> - <?php echo $re["mem_name"];?></li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong><?php echo $mem_lv;?>詳細資料 - 編號 <?php echo $mem_num;?> - <?php echo $re["mem_name"];?><?php if ( $bfont != "" ){ echo " - " . $bfont;}?></strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <p>
					<span class="text-status">操作項目 ▶▶</span>
					<a class="btn btn-info<?php if ( $member_item == 1 ){ echo " btn-active";}?>" href="ad_mem_detail.php?mem_num=<?php echo $mem_num;?>">基本資料</a>
					<a class="btn btn-info<?php if ( $member_item == 2 ){ echo " btn-active";}?>" href="ad_mem_fix.php?mem_num=<?php echo $mem_num;?>">修改資料</a>
					<a class="btn btn-info<?php if ( $member_item == 3 ){ echo " btn-active";}?>" href="ad_mem_service.php?mem_num=<?php echo $mem_num;?>">服務紀錄</a>
					<a class="btn btn-info<?php if ( $member_item == 4 ){ echo " btn-active";}?>" href="ad_mem_ptest.php?mem_num=<?php echo $mem_num;?>">心理測驗</a>
					<a class="btn btn-info<?php if ( $member_item == 5 ){ echo " btn-active";}?>" href="ad_mem_login_log.php?mem_num=<?php echo $mem_num;?>">登入紀錄</a>
					<a class="btn btn-info<?php if ( $member_item == 6 ){ echo " btn-active";}?>" href="ad_important_paper.php?mem_num=<?php echo $mem_num;?>">紙本資料</a>
                </p>
				<?php mem_detail_menu(0, $mem_branch, $mem_branch2);?>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <td colspan="4" style="font-size:150%;color:blue"><b>▶&nbsp;基本資料</b></td>
                        </tr>
                        <tr>
                            <td width="92">
                                <div align="right">權益：</div>
                            </td>
                            <td colspan="3"><b>
								<?php
								if ( $re["ispay"] == 1 ){
									echo "<font color='red'>[付訂]</font>";
								}

								echo num_lv($re["web_level"]);
								if ( $re["web_level"] > 0 ){
									echo "(".Date_EN($re["web_startime"],1)."~".Date_EN($re["web_endtime"],1).")";
								}
								
								if ( chkDate($re["web_endtime"]) ){
									$date1 = $re["web_endtime"];
									$date2 = date("Y-m-d H:i:s");
									$web_time_diff = floor((strtotime($date1)-strtotime($date2))/86400)+1;
									if ( $web_time_diff > 0 ){
										echo "&nbsp;&nbsp;餘 ".$web_time_diff." 天";
									}else{
										echo "&nbsp;&nbsp;<span class='label label-danger'>已過期</span>";
									}
								}
								//卡別
								$SQL_card = "Select * From card_type Where card_no=".$re["mem_join"];
								$rs_card = $SPConn->prepare($SQL_card);
								$rs_card->execute();
								$result_card=$rs_card->fetchAll(PDO::FETCH_ASSOC);
								foreach($result_card as $re_card);
								$card_name = "不明";
								if ( count($result) > 0 ){ $card_name = $re_card["card_name"];}
								?>
								</b>&nbsp;&nbsp;<?php echo $card_name;?>
                            </td>
                        </tr>
                        <tr>
                            <td width="92">
                                <div align="right">編號：</div>
                            </td>
                            <td width="267"><?php echo $re["mem_num"];?></td>
                            <td width="94">
                                <div align="right">身分證字號：</div>
                            </td>
                            <td width="269">
								<?php
								if ( $cansee == 1 ){
									echo $mem_username;
									$canseepay = 0;
									if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
										$canseepay = 1;
									}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" ){
										$canseepay = 1;
									}elseif ( $_SESSION["MM_UserAuthorization"] == "manager" ){
										$canseepay = 1;
									}elseif ( $_SESSION["MM_UserAuthorization"] == "pay" ){
										$canseepay = 1;
									}elseif ( $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
										if ( $this_branch == $mem_branch || $this_branch == $mem_branch2 || $this_branch == $call_branch ){
											$canseepay = 1;
										}
									}          		
									if ( $re["mem_level"] == "mem" && $re["mem_name"] != "" && $canseepay == 1 ){
										echo "&nbsp;▶&nbsp;<a href='ad_mem_pay_detail.asp?mem_username=".$mem_username."&uname=".Authcode($re["mem_name"],'ENCODE')."' style='color:#FF19FF;'>收支</a>";
									}
								}else{
									echo $block_msg;
								} ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">姓名：</div>
                            </td>
                            <td><?php echo $re["mem_name"];?></td>
                            <td>
                                <div align="right">帳號/密碼：</div>
                            </td>
                            <td>
								<?php
								if ( $cansee == 1 ){
									echo "帳號：";
									if ( $re["si_account"] != "0" || $re["si_account"] != "" ){
										echo $re["si_account"]."<br>";
									}
									echo "密碼：".$re["mem_passwd"];
								}else{
									echo $block_msg;
								}?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">暱稱：</div>
                            </td>
                            <td><?php echo $re["mem_nick"];?></td>
                            <td>
                                <div align="right">性別：</div>
                            </td>
                            <td><?php echo $re["mem_sex"];?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">生日：</div>
                            </td>
                            <td>
                                <?php
								if ( $cansee == 1 ){
									echo $re["mem_by"]?>/<?php echo $re["mem_bm"];?>/<?php echo $re["mem_bd"];
								}else{
									echo $block_msg;
								}
								
								if ( $re["mem_by"] != "" && $re["mem_by"] > 0 ){
									echo "&nbsp;&nbsp;".(date("Y")-$re["mem_by"])." 歲";
								}
								?>&nbsp;&nbsp;<?php echo $re["mem_star"];?>
                            </td>
                            <td>
                                <div align="right">手機：</div>
                            </td>
                            <td>
                                <?php
								if ( $cansee == 1 ){
									$mem_mobile = $re["mem_mobile"];
									$new_mobile = "";
									if ( strlen($mem_mobile) == 10 ){
										$new_mobile = substr($mem_mobile,0,4)."-".substr($mem_mobile,4,3)."-".substr($mem_mobile,-3);
									}else{
          								$new_mobile = $mem_mobile;
									}
									echo $new_mobile;
									if ( $re["mem_mobile2"] != "" ){
										echo "&nbsp;&nbsp;&nbsp;&nbsp;手機2：".$re["mem_mobile2"];
									}
								}else{
									echo $block_msg;
								}?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">血型：</div>
                            </td>
                            <td><?php echo $re["mem_blood"]?></td>
                            <td>
                                <div align="right">信仰：</div>
                            </td>
                            <td><?php echo $re["mem6"];?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">學歷：</div>
                            </td>
                            <td>
								<?php echo $re["mem_school"];?>
								&nbsp;&nbsp;&nbsp;&nbsp;
								<?php echo $re["mem_school4"];?>
								<?php echo $re["mem_school2"];?>
								&nbsp;&nbsp;&nbsp;&nbsp;
								<?php echo $re["mem_school3"];?>
							</td>
                            <td>
                                <div align="right">身高/體重：</div>
                            </td>
                            <td>
								<?php
								if ( $re["mem_he"] != "" && $re["mem_we"] != "" ){
									echo $re["mem_he"]." cm/".$re["mem_we"]." kg";
								}elseif ( $re["mem_he"] != "" ){
									echo $re["mem_he"] ." cm";
								}elseif ( $re["mem_we"] != "" ){
									echo $re["mem_we"] ." kg";
								}else{
									echo "無";
								}
								
								if ( $re["mem_wet"] != "" ){
									echo "&nbsp;&nbsp;".wetstrreplace($re["mem_wet"]);
								}
          
								if ( $re["mem_bmi"] != "" ){
									if ( $re["mem_bmi"] > 0 ){
										echo "&nbsp;&nbsp;BMI：".$re["mem_bmi"];
									}
								}?>
							</td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">職業：</div>
                            </td>
                            <td><?php echo $re["mem_job1"]?>&nbsp;&nbsp;公司名稱：<?php echo $re["company"];?></td>
                            <td>
                                <div align="right">職務名稱：</div>
                            </td>
                            <td><?php echo $re["mem_job2"]?>&nbsp;&nbsp;年資：<?php echo $re["company_year"];?> 年</td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">經濟狀況：</div>
                            </td>
                            <td>
							<?php
							if ( $re["mem_money"] != "" ){ echo "年收入約 ".$re["mem_money"];}
							if ( $re["mem_money_des"] != "" ){ echo "&nbsp;&nbsp;".$re["mem_money_des"];}
							if ( $re["mem_money_y"] != "" ){
								if ( $re["mem_money_y"] > 0 ){
									$mem_money_y = FormatCurrency($re["mem_money_y"], 0);
									$mem_money_y = str_replace("NT$", "", $mem_money_y);
									echo "&nbsp;&nbsp;年收：".$mem_money_y." 元";
								}
							}?>
                            </td>
                            <td>
                                <div align="right">車房：</div>
                            </td>
                            <td><label class="checkbox"><input disabled style="width:20px;" type="checkbox" name="mem_car" id="mem_car" value="1"<?php if ( $re["mem_car"] == "1" ){ echo " checked";}?>><i></i> 有車</label>
                                <label class="checkbox"><input disabled style="width:20px;" type="checkbox" name="mem_house" id="mem_house" value="1"<?php if ( $re["mem_house"] == "1" ){ echo " checked";}?>><i></i> 有房</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">E-mail：</div>
                            </td>
                            <td>
                                <?php
								if ( $cansee == 1 ){
									echo $re["mem_mail"];
								}else{
									echo $block_msg;
								}?>
                            </td>
                            <td>
                                <div align="right">電話：</div>
                            </td>
                            <td>
								<?php
								if ( $cansee == 1 ){
									echo $re["mem_phone"];
									if ( $re["mem_phone2"] != "" ){
										echo "&nbsp;&nbsp;&nbsp;&nbsp;電話2：".$re["mem_phone2"];
									}
								}else{
									echo $block_msg;
								}?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">地址：</div>
                            </td>
                            <td>
								居住地：<?php echo $re["mem_area"];?>　
								<?php
								if ( $cansee == 1 ){
									echo $re["mem_address"];
								}else{
									echo $block_msg;
								}?>
								<br>戶籍地：<?php echo $re["mem_area2"]?>
								<?php
								if ( $cansee == 1 ){
									echo $re["mem_address2"];
								}else{
									echo $block_msg;
								}?>
                            </td>
                            <td>
                                <div align="right">MSN/LINE/FB：</div>
                            </td>
                            <td>
								<?php
								if ( $cansee == 1 ){
									echo "MSN/LINE：".$re["mem_msn"]."<br>";
									echo "FB ID：".$re["fbidurl"]."<br>";
									echo "FB NAME：".$re["fbname"]."<br>";
								}else{
									echo $block_msg;
								}?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="right">個性：</div>
                            </td>
                            <td>
								<?php echo $re["mem4"];?>&nbsp;&nbsp;&nbsp;&nbsp;
								抽菸：<?php echo $re["mem7"];?>&nbsp;&nbsp;&nbsp;&nbsp;
								喝酒：<?php echo $re["mem8"];?>&nbsp;&nbsp;&nbsp;&nbsp;
								飲食：<?php echo $re["mem22"];?>&nbsp;&nbsp;&nbsp;&nbsp;
                            </td>
                            <td>
                                <div align="right">婚姻狀態：</div>
                            </td>
                            <td><?php echo $re["mem_marry"];?></td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">興趣：</div>
                            </td>
                            <td colspan="3"><?php echo $re["mem18"]?><br>其他興趣：<?php echo $re["mem181"];?></td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">外型：</div>
                            </td>
                            <td colspan="3"><?php echo $re["mem_da2"];?></td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">內在：</div>
                            </td>
                            <td colspan="3"><?php echo $re["mem_da3"];?></td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">資料速報：</div>
                            </td>
                            <td colspan="3"><?php echo $re["mem_da6"];?></td>
                        </tr>

                        <tr>
                            <td valign="top">
                                <div align="right">自我介紹：</div>
                            </td>
                            <td colspan="3"><?php echo $re["mem_note"];?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan=3>
                                <label class="checkbox"><input type="checkbox" disabled name="mem_photo_show" id="mem_photo_show" value="1"<?php if ( $re["mem_photo_show"] == "1" ){ echo " checked";}?>><i></i>前台不顯示照片</label>
                                <label class="checkbox"><input type="checkbox" disabled name="no_mail1" id="no_mail1" value="1"<?php if ( $re["si_no_mail1"] != "1" ){ echo " checked";}?>><i></i>電子信件通知</label>
                                <label class="checkbox"><input type="checkbox" disabled name="no_mail2" id="no_mail2" value="1"<?php if ( $re["si_no_mail2"] != "1" ){ echo " checked";}?>><i></i>簡訊通知</label>
                                <label class="checkbox"><input type="checkbox" disabled name="no_mail4" id="no_mail4" value="1"<?php if ( $re["si_no_mail4"] != "1" ){ echo " checked";}?>><i></i>約會邀請被拒絕通知</label>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">網站資料：</div>
                            </td>
                            <td colspan="3">
                                <table class="table table-bordered">
									     	<?php        	
          	$allnums = array("1,2,3,4,5,6,7,8,9,91,10,11,12,13,14,15,16,17,18,181,19,191,20,201,21,211,22,23,231,24,25,251,26,27,271,28,29,291,30,31,32,321,33");
          	$ii = 0;
          	foreach ($allnums as $ai){
				if ($ii == 0 ){
					echo "<tr>";
				}
				echo "<td>".$re["mem".$ai]."</td>";
          	
				if ($ii == 8 ){
					$ii = 0;
					echo "</tr>";
				}else{
					$ii = $ii+1;
				}
            }
            
          	?>
									
									
									
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="right">類型：</div>
                            </td>
                            <td colspan=2>
                                <label class="checkbox"><input disabled type="checkbox" name="si_enterprise" id="si_enterprise" value="1"<?php if ( $re["si_enterprise"] == "1" ){ echo " checked";}?>><i></i> 企業會員</label>
                                <label class="checkbox"><input disabled type="checkbox" name="mem_vip" id="mem_vip" value="1"<?php if ( $re["mem_vip"] == "1" ){ echo " checked";}?>><i></i> 優質會員</label>
                                <label class="checkbox"><input disabled type="checkbox" name="mem_hot" id="mem_hot" value="1"<?php if ( $re["mem_hot"] == "1" ){ echo " checked";}?>><i></i> 超人氣會員</label>
                                <label class="checkbox"><input disabled type="checkbox" name="mem_hot_in" id="mem_hot_in" value="1"<?php if ( $re["mem_hot_in"] == "1" ){ echo " checked";}?>><i></i> 春天首頁超人氣會員</label>
                                <label class="checkbox"><input disabled type="checkbox" name="singleparty_hot_check" id="singleparty_hot_check" value="1"<?php if ( $re["singleparty_hot_check"] == "1" ){ echo " checked";}?>><i></i> 約專首頁推薦會員</label>
                                <br>
                                <label class="checkbox"><input disabled type="checkbox" name="mem_hot3" id="mem_hot3" value="1"<?php if ( $re["mem_hot3"] == "1" ){ echo " checked";}?>><i></i> 醫師、教師、律師</label>
                                <label class="checkbox"><input disabled type="checkbox" name="mem_hot1" id="mem_hot1" value="1"<?php if ( $re["mem_hot1"] == "1" ){ echo " checked";}?>><i></i> 碩博士、科技新貴</label>
                                <label class="checkbox"><input disabled type="checkbox" name="mem_hot6" id="mem_hot6" value="1"<?php if ( $re["mem_hot6"] == "1" ){ echo " checked";}?>><i></i> 百萬年薪俱樂部</label>
                                <label class="checkbox"><input disabled type="checkbox" name="mem_hot5" id="mem_hot5" value="1"<?php if ( $re["mem_hot5"] == "1" ){ echo " checked";}?>><i></i> BOSS、高階主管</label>
                                <label class="checkbox"><input disabled type="checkbox" name="mem_hot4" id="mem_hot4" value="1"<?php if ( $re["mem_hot4"] == "1" ){ echo " checked";}?>><i></i> 軍警、公務人員</label>
                                <label class="checkbox"><input disabled type="checkbox" name="mem_hot2" id="mem_hot2" value="1"<?php if ( $re["mem_hot2"] == "1" ){ echo " checked";}?>><i></i> 金融服務</label>
                            </td>
                            <td>
								<?php if ( $_SESSION["MM_UserAuthorization"] == "admin" ){ echo "首頁頁籤：".$re["mem_tag"];}?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div align="left">token:<?php echo $re["mem_token"];?><br>gcmid:<?php echo $re["gcmid"];?></div>
                            </td>
						</tr>
                        <tr>
                            <td colspan=4 style="font-size:150%;color:blue"><b>擇友條件</b></td>
                        </tr>
                        <tr>
                            <td>婚況：</td>
                            <td colspan="3">
								<?php
									$allstr = array("未婚","離婚","離婚沒小孩","離婚有小孩","喪偶","已婚","保密","交往中","有心儀對象","不拘");
									for ( $i=0;$i<count($allstr);$i++ ){
										echo "<label class='checkbox'><input type='checkbox' name='sel_marry' value='".$allstr[$i]."'";
										if ( $re["sel_marry"] == $allstr[$i] ){ echo "checked=\"checked\"";}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>學歷：</td>
                            <td colspan="3">
                                <?php
									$sel_school = "";
									if ( $re["sel_school"] != "" ){ $sel_school = $re["sel_school"]; }else{ $sel_school = "不拘"; }
									$allstr = array("博士","碩士","大學","專科","高職","高中","國中","不拘");
									for ( $i=0;$i<count($allstr);$i++ ){
										echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$allstr[$i]."'";
										if ( $sel_school == $allstr[$i] ){ echo "checked=\"checked\"";}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>宗教：</td>
                            <td colspan="3">
                                <?php
									$sel_mem6 = "";
									if ( $re["sel_mem6"] != "" ){ $sel_mem6 = $re["sel_mem6"]; }else{ $sel_mem6 = "不拘"; }
									$allstr = array("佛道教","基督教","天主教","一貫道","無","不拘");
									for ( $i=0;$i<count($allstr);$i++ ){
										echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$allstr[$i]."'";
										if ( $sel_mem6 == $allstr[$i] ){ echo "checked=\"checked\"";}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>職業：</td>
                            <td colspan="3">
                                <?php
									$sel_job = "";
									if ( $re["sel_job"] != "" ){ $sel_job = $re["sel_job"]; }else{ $sel_job = "不拘"; }
									$allstr = array("公務/國家機關","司法/法務","軍警單位","自營/投資","電腦/網路","電子/通信/電器","教育/研究單位","醫療/護理服務業","媒體傳播/出版業","藝術/音樂/設計","建築/裝修/物業","營銷/業務","文化/演藝/娛樂業","金融/證券/財會/保險","專利商標/諮詢服務業","生產製造業","旅遊服務業","運輸服務業","百貨/零售業","餐飲服務業","美容/美髮業","農林漁牧業","自由業/其它","在校學生","業務/仲价業","不拘");
									for ( $i=0;$i<count($allstr);$i++ ){
										echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$allstr[$i]."'";
										if ( $sel_job == $allstr[$i] ){ echo "checked=\"checked\"";}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>個性：</td>
                            <td colspan="3">
                                <?php
									$sel_mem4 = "";
									if ( $re["sel_mem4"] != "" ){ 
										$sel_mem4 = $re["sel_mem4"];
										$sel_mem4 = explode(",",$re["sel_mem4"]);
									}else{
										$sel_mem4 = "不拘";
									}
									$allstr = array("內向","外向","隨和","嚴謹","善良熱情","陽光","不拘");
									$allstr1= "內向,外向,隨和,嚴謹,善良熱情,陽光,不拘";
									for ( $i=0;$i<count($allstr);$i++ ){
										//echo strpos($allstr1,$re["sel_mem4"]);
									
										echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$allstr[$i]."'";
										if( is_array($sel_mem4) ){
											foreach ($sel_mem4 as $value) {
												//if ( in_array($value,$allstr) ){ echo "checked=\"checked\"";}
												if ( strpos($allstr1,$value) > 0 ){ echo " checked=\"checked\"";}
												
											}
										}else{
											if ( $sel_mem4 == $allstr[$i] ){ echo " checked=\"checked\"";}
										}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>經濟：</td>
                            <td colspan="3">
                                <?php
									$sel_money_des = "";
									if ( $re["sel_money_des"] != "" ){ $sel_money_des = $re["sel_money_des"]; }else{ $sel_money_des = "不拘"; }
									$allstr = array("富有","中上","小康","自足","不拘");
									for ( $i=0;$i<count($allstr);$i++ ){
										echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$allstr[$i]."'";
										if ( $sel_money_des == $allstr[$i] ){ echo "checked=\"checked\"";}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>年收入：</td>
                            <td colspan=3>
                                <?php
									$sel_money = "";
									if ( $re["sel_money"] != "" ){ $sel_money = $re["sel_money"]; }else{ $sel_money = "不拘"; }
									$allstr = array("50萬以下","51萬到80萬","81萬到100萬","101萬到199萬","200萬以上","不拘");
									for ( $i=0;$i<count($allstr);$i++ ){
										echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$allstr[$i]."'";
										if ( $sel_money == $allstr[$i] ){ echo "checked=\"checked\"";}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>年齡：</td>
                            <td colspan="3">
                                <select name="sel_y2" id="sel_y2" disabled>
									<option value="">不限</option>
									<?php          		
									for ( $i=(date("Y")-80);$i<=(date("Y")-20);$i++ ){
										echo "<option value='".$i."'";
										if ( $re["sel_y2"] == $i ){
											echo " selected";
										}
										echo ">".$i." 年/民國 ".($i-1911)." 年/ ".date("Y")." 歲</option>";
									}
									?>
								</select>
                                到
                                <select name="sel_y1" id="sel_y1" disabled>
                                    <option value="">不限</option>
                                    <?php          		
									for ( $i=(date("Y")-80);$i<=(date("Y")-20);$i++ ){
										echo "<option value='".$i."'";
										if ( $re["sel_y1"] == $i ){
											echo " selected";
										}
										echo ">".$i." 年/民國 ".($i-1911)." 年/ ".date("Y")." 歲</option>";
									}
									?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>居住區域：</td>
                            <td colspan="3">
								<?php
									$sel_area = "";
									if ( $re["sel_area"] != "" ){ $sel_area = $re["sel_area"]; }else{ $sel_area = "不拘"; }
									$allstr = array("北部","中部","南部","台北","桃竹苗","中彰投","雲嘉南","高屏","不拘");
									for ( $i=0;$i<count($allstr);$i++ ){
										echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$allstr[$i]."'";
										if ( $sel_area == $allstr[$i] ){ echo "checked=\"checked\"";}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>星座：</td>
                            <td colspan="3">
								<?php
									$sel_star = "";
									if ( $re["sel_star"] != "" ){ $sel_star = $re["sel_star"]; }else{ $sel_star = "不拘"; }
									$allstr = array("牡羊座","金牛座","雙子座","巨蟹座","獅子座","處女座","天秤座","天蠍座","射手座","魔羯座","水瓶座","雙魚座","不拘");
									for ( $i=0;$i<count($allstr);$i++ ){
										echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$allstr[$i]."'";
										if ( $sel_star == $allstr[$i] ){ echo "checked=\"checked\"";}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>身高：</td>
                            <td colspan="3">
								<input type="text" name="sel_he1" id="sel_he1" class="form-control" style="width:100px;display:inline-block;" value="<?php echo $re["sel_he1"];?>" disabled> - 
								<input type="text" name="sel_he2" id="sel_he2" class="form-control" style="width:100px;display:inline-block;" value="<?php echo $re["sel_he2"];?>" disabled> 公分
                            </td>
                        </tr>
                        <tr>
                            <td>身型：</td>
                            <td colspan="3">
                                <?php
									$sel_wet = "";
									if ( $re["sel_wet"] != "" ){ $sel_wet = $re["sel_wet"]; }else{ $sel_wet = "不拘"; }
									$allstr = array("苗條","普通","豐腴","有肌肉","豐滿","肥胖","偏瘦","中等","偏肉","不拘");
									for ( $i=0;$i<count($allstr);$i++ ){
										echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$allstr[$i]."'";
										if ( $sel_wet == $allstr[$i] ){ echo "checked=\"checked\"";}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>社交性：</td>
                            <td colspan="3">
                                <?php
									$sel_sociability = "";
									if ( $re["sel_sociability"] != "" ){ $sel_sociability = $re["sel_sociability"]; }else{ $sel_sociability = "不拘"; }
									$allstr = array("喜歡與多人相處","喜歡與少數人相處","喜歡獨處","很熟","慢熟","不拘");
									for ( $i=0;$i<count($allstr);$i++ ){
										echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$allstr[$i]."'";
										if ( $sel_sociability == $allstr[$i] ){ echo "checked=\"checked\"";}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>交友觀點：</td>
                            <td colspan="3">
                                <?php
									$sel_view = "";
									if ( $re["sel_view"] != "" ){ $sel_view = $re["sel_view"]; }else{ $sel_view = "不拘"; }
									$allstr = array("純粹擴大交友","尋找談戀愛對象","尋找依靠終身伴侶","不拘");
									for ( $i=0;$i<count($allstr);$i++ ){
										echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$allstr[$i]."'";
										if ( $sel_view == $allstr[$i] ){ echo "checked=\"checked\"";}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>抽菸：</td>
                            <td colspan="3">
                                <?php
									$sel_mem7 = "";
									if ( $re["sel_mem7"] != "" ){ $sel_mem7 = $re["sel_mem7"]; }else{ $sel_mem7 = "不拘"; }
									$allstr = array("是","否","偶爾","不拘");
									for ( $i=0;$i<count($allstr);$i++ ){
										echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$allstr[$i]."'";
										if ( $sel_mem7 == $allstr[$i] ){ echo "checked=\"checked\"";}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>喝酒：</td>
                            <td colspan="3">
                                <?php
									$sel_mem8 = "";
									if ( $re["sel_mem8"] != "" ){ $sel_mem8 = $re["sel_mem8"]; }else{ $sel_mem8 = "不拘"; }
									$allstr = array("是","否","偶爾","不拘");
									for ( $i=0;$i<count($allstr);$i++ ){
										echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$allstr[$i]."'";
										if ( $sel_mem8 == $allstr[$i] ){ echo "checked=\"checked\"";}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>飲食：</td>
                            <td colspan="3">
                                <?php
									$sel_mem22 = "";
									if ( $re["sel_mem22"] != "" ){ $sel_mem22 = $re["sel_mem22"]; }else{ $sel_mem22 = "不拘"; }
									$allstr = array("全素","鍋邊素","奶蛋素","吃辣","不吃辣","葷食","不拘");
									for ( $i=0;$i<count($allstr);$i++ ){
										echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$allstr[$i]."'";
										if ( $sel_mem22 == $allstr[$i] ){ echo "checked=\"checked\"";}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">忌諱：</div>
                            </td>
                            <td colspan="3"><?php echo $re["mem_da4"];?></td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">擇友條件：</div>
                            </td>
                            <td colspan="3"><?php echo $re["mem_da5"];?></td>
                        </tr>
                        <tr>
                            <td colspan=4 style="font-size:150%;color:blue"><b>其他事項</b></td>
                        </tr>
                        <tr>
                            <td>備註說明：</td>
                            <td colspan=3><textarea id="sys_note" name="sys_note" cols="100" rows="5" id="textarea" style="width:50%;height:60px" readonly><?php echo $re["sys_note"];?></textarea></td>
                        </tr>
                        <tr>
                            <td>會員備註：</td>
                            <td colspan=3><textarea id="tosinglenote" name="tosinglenote" cols="100" rows="5" id="textarea" style="width:50%;height:60px" readonly><?php echo $re["tosinglenote"];?></textarea></td>
                        </tr>

                        <tr>
                            <td>方便聯繫時間：</td>
                            <td colspan="3">
                                <?php
									$can_call = "";
									if ( $re["can_call"] != "" ){ $can_call = $re["can_call"]; }else{ $can_call = "不拘"; }
									$allstr = array("星期一","星期二","星期三","星期四","星期五","星期六","星期日","上午","下午","不拘");
									for ( $i=0;$i<count($allstr);$i++ ){
										echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$allstr[$i]."'";
										if ( $can_call == $allstr[$i] ){ echo "checked=\"checked\"";}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>方便排約時間：</td>
                            <td colspan="3">
                                <?php
									$can_love = "";
									if ( $re["can_love"] != "" ){ $can_love = $re["can_love"]; }else{ $can_love = "不拘"; }
									$allstr = array("星期一","星期二","星期三","星期四","星期五","星期六","星期日","上午","下午","不拘");
									for ( $i=0;$i<count($allstr);$i++ ){
										echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$allstr[$i]."'";
										if ( $can_love == $allstr[$i] ){ echo "checked=\"checked\"";}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>魅力處方箋01：</td>
                            <td colspan="3">
                                <?php
									$recipe1 = "";
									if ( $re["recipe1"] != "" ){ $recipe1 = $re["recipe1"]; }else{ $recipe1 = "不拘"; }
									$allstr = array("戀愛講堂","魅力有約","品味生活","互動美學");
									for ( $i=0;$i<count($allstr);$i++ ){
										echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$allstr[$i]."'";
										if ( $recipe1 == $allstr[$i] ){ echo "checked=\"checked\"";}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>魅力處方箋02：</td>
                            <td colspan="3">
                                <?php
									$recipe2 = "";
									if ( $re["recipe2"] != "" ){ $recipe2 = $re["recipe2"]; }else{ $recipe2 = "不拘"; }
									$allstr = array("輕旅行","主題特別企劃","主題精緻餐會","美味廚房","健康料理","國外旅遊");
									for ( $i=0;$i<count($allstr);$i++ ){
										echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$allstr[$i]."'";
										if ( $recipe2 == $allstr[$i] ){ echo "checked=\"checked\"";}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>魅力處方箋03：</td>
                            <td colspan="3">
                                <?php
									$recipe3 = "";
									if ( $re["recipe3"] != "" ){ $recipe3 = $re["recipe3"]; }else{ $recipe3 = "不拘"; }
									$allstr = array("一對一排約","多平台排約","多對多約會","主題式約會","下午茶約會");
									for ( $i=0;$i<count($allstr);$i++ ){
										echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$allstr[$i]."'";
										if ( $recipe3 == $allstr[$i] ){ echo "checked=\"checked\"";}
										echo "><i></i>".$allstr[$i]."</label>";
									}
								?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="right">會館/秘書：</div>
                            </td>
                            <td colspan=4>
                                <font color=green>受理</font>：<?php echo $mem_branch;?>-<?php echo SingleName($mem_single);?>
								<?php if ( $mem_branch2 != "" ){?>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="green">跨區</font>：<?php echo $mem_branch2?>-<?php echo SingleName($mem_single2);?>
								<?php }?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=green>排約</font>：
                                <?php
									if ( $re["love_single"] != "" ){
										echo SingleName($re["love_single"]);
									}else{
										echo "無";
									}
								?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=green>邀約</font>：
                                <?php
									if ( $re["call_branch"] != "" ){
										echo $re["call_branch"]." - ".SingleName($re["call_single"]);
									}else{
										echo "無";
									}
								?>
								<?php if ( $re["mem_serc"] != "" ){ ?>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;電訪員：<?php echo $re["mem_serc"];?>
								<?php }?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">是否入會：</div>
                            </td>
                            <td>
                                <?php
									if ( $re["mem_level"] != "guest" ){
										echo "已入會";
									}else{
										echo "未入會";
									}
									
									if ( $re["web_level"] != "" ){
										switch ($re["web_level"]){
											case 1:
												$wbl = "資料認證會員(".$re["web_startime"]."~".$re["web_endtime"].")";
												break;
											case 2:
												$wbl = "真人認證會員(".$re["web_startime"]."~".$re["web_endtime"].")";
												break;
											case 3:
												$wbl = "璀璨會員(".$re["web_startime"]."~".$re["web_endtime"].")";
												break;
											case 4:
												$wbl = "璀璨VIP會員(".$re["web_startime"]."~".$re["web_endtime"].")";
												break;
										}
										echo $wbl;
									}
								?>
                            </td>
                            <td>
                                <div align="right">參加卡別：</div>
                            </td>
                            <td><?php echo $card_name;?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">入會日期：</div>
                            </td>
                            <td><?php echo $re["mem_jy"];?>/<?php echo $re["mem_jm"];?>/<?php echo $re["mem_jd"];?></td>
                            <td>
                                <div align="right">來源：</div>
                            </td>
                            <td>
								<?php
									echo $re["mem_come"];
									if ( $re["mem_come5"] != "" ){
										echo "-".$re["mem_come5"];
									}
									if ( $re["mem_come2"] != "" ){
										echo "-".$re["mem_come2"];
									}
									
									if ( $re["mem_cc"] != "" ){
										$mem_cc = $re["mem_cc"];
										if ( strstr($mem_cc, "sale-") > 0 ){
											$mem_cc = "推廣：".SingleName_auto(split($mem_cc, "-")(1));
										}
										$mem_cc = " [".$mem_cc."]";
									}else{
										$mem_cc = "";
									}
									if ( $mem_cc != "" ){ echo $mem_cc;}
									if ( $re["mem_regip"] != "" ){ echo "<br>".$re["mem_regip"];}?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">資料時間：</div>
                            </td>
                            <td><?php echo $re["mem_time"];?></td>
                            <td>
                                <div align="right">更新時間：</div>
                            </td>
                            <td><?php echo $re["mem_uptime"];?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">最後登入時間：</div>
                            </td>
                            <td><?php echo $re["last_login"];?></td>
                            <td>
                                <div align="right">輸入：</div>
                            </td>
                            <td><?php echo SingleName($re["keyin_single"]);?></td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">最後排約時間：</div>
                            </td>
                            <td><?php echo $re["love_time2"];?></td>
                            <td>
                                <div align="right">推薦人：</div>
                            </td>
                            <td>
								<?php
								echo $re["mem_come2"];
								echo "（推薦會館秘書：";
								if ( $re["mem_come3"] != "" ){
									if ( is_numeric($re["mem_come3"] ) ){
										echo num_branch($re["mem_come3"]);
									}else{
										echo $re["mem_come3"];
									}
								}
								if ( $re["mem_come4"] != "" && $re["mem_come3"] != "無" ){
									echo SingleName($re["mem_come4"]);
								}
								echo "）";
								?>
                            </td>
                        </tr>
						<?php
						//Set qrs = Server.CreateObject("ADODB.Recordset")
						$reports = get_report_num($re["mem_mobile"]);
						if ( strstr($reports, "|+|") > 0 ){
							$report = split($reports, "|+|")(0);
							$report_text = split(reports, "|+|")(1);
						}else{
							$report = 0;
							$report_text = "無";
						}?>
                        <tr>
                            <td valign="top">
                                <div align="right">處理情形：</div>
                            </td>
                            <td colspan="3">
								<?php echo $re["all_type"];?>
								<a href="javascript:Mars_popup('ad_report.asp?k_id=<?php echo $re["mem_auto"];?>&lu=<?php echo $mem_username;?>&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(<?php echo $report?>)</a>
							</td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">處理內容：</div>
                            </td>
                            <td colspan="3"><?php echo $report_text;?>　<font color="blue">舊：</font>><?php echo $re["all_note"];?></td>
                        </tr>
                        <tr>
                            <td colspan=＂4＂>
                                會員照片及生活照&nbsp;&nbsp;<a href="ad_photo_check.asp?sear=1&vst=&s99=&s4=<?php echo $mem_num;?>" target="_blank">前往審核</a><br>
                                <div class="lightbox" data-plugin-options='{"delegate": "a", "gallery": {"enabled": true}}'>
									<?php
									$mem_photo = $re["mem_photo"];
									$inupload1 = 1;																		
									if ( $mem_photo != "" && !strstr($mem_photo, "boy.") > 0 && !strstr($mem_photo, "girl.") > 0 ){
										echo "<div style='text-align:center;display:inline-block;'>";
										if ( strstr($mem_photo, "photo/") > 0 ){
											echo "<a href='dphoto/".$mem_photo."?t=".(int)(rand()*9999)."' class='popup'><img width='200' src='dphoto/".$mem_photo."'></a>";
									    	$mem_photo = str_replace("photo/", "", $mem_photo);
										}else{
											echo "<a href='../photo/".$mem_photo."?t=".(int)(rand()*9999)."' class='popup'><img width='200' src='../photo/".$mem_photo."'></a>";
										}
										$inupload1 = 0;
										echo "<br>封面照";
										echo "</div>";
									}
									
									$SQL_q = "Select * From photo_data Where mem_num=".$mem_num." And Not photo_name='".$mem_photo."'";
									$rs_q = $SPConn->prepare($SQL_q);
									$rs_q->execute();
									$result_q=$rs_q->fetchAll(PDO::FETCH_ASSOC);
									if ( count($result_q) > 0 ){
										foreach($result_q as $re_q){
											echo "<div style='text-align:center;display:inline-block;'>";
											if ( $re_q["types"] == "dmn" ){
												echo "<a href='dphoto/photo/".$re_q["photo_name"]."' class='popup'><img width='200' src='dphoto/photo/".$re_q["photo_name"]."' style='margin-left:15px;'></a>";
											}else{
												echo "<a href='photo/".$re_q["photo_name"]."' class='popup'><img width='200' src='photo/".$re_q["photo_name"]."' style='margin-left:15px;'></a>";
											}
											
											if ( $re_q["accept"] == "1" ){
												echo "<br><font color='blue'>審核通過</font>";
												if ( $re_q["accept_single"] != "" ){
													echo " - ".SingleName($re_q["accept_single"])."審";
												}
											elseif ( $re_q["accept"] == "-1" ){ 
												echo "<br><font color='blue'>審核不通過，".$re_q["acceptm"]."</font>";
											}else{
												echo "<br><font color='green'>待審核</font>";
											}
											echo "</div>";										
										}
									}
									?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" colspan="4">
                                <div style="text-align:center;display:inline-block;">
									<?php
									$inupload2 = 1;
									$inupload3 = 1;
									if ( $re["mem_p1"] != "" ){
										$inupload2 = 0;
										if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" || $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "action" || $_SESSION["MM_UserAuthorization"] == "pay" ){
											if ( is_null($re["web_level"]) || $re["web_level"] = 0  || $_SESSION["MM_UserAuthorization"] == "admin" ){
												echo "身分證正面&nbsp;&nbsp;<a href='ad_mem_detail.asp?st=delpic&v=mem_p1&mem_num=".$mem_num."&mem_au=".$re["mem_auto"]."'>刪除並開放重新上傳</a><br>";
											}
											echo "<a href='idcard/".$re["mem_p1"]."' class='fancybox'><img width='200' src='idcard/".$re["mem_p1"]."'></a>";
										}else{
											echo "已上傳身分證正面";
										}
									}else{
										echo "未上傳身分證正面";
									} ?>
                                </div>
                                <div style="text-align:center;display:inline-block;">
                                    <?php
									if ( $re["mem_p2"] != "" ){
										$inupload3 = 0;
										if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" || $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "action" ||  $_SESSION["MM_UserAuthorization"] == "pay" ){
											if ( is_null($re["web_level"]) || $re["web_level"] == 0 || $_SESSION["MM_UserAuthorization"] == "admin" ){
												echo "身分證反面&nbsp;&nbsp;<a href='ad_mem_detail.asp?st=delpic&v=mem_p2&mem_num=".$mem_num."&mem_au=".$re["mem_auto"]."'>刪除並開放重新上傳</a><br>";
											}
											echo "<a href='idcard/"&rs("mem_p2")&"' class='fancybox'><img width='200' src='idcard/".$re["mem_p2"]."'></a>";
										}else{
											echo "已上傳身分證反面";
										}
									}else{
										echo "未上傳身分證反面";
									} ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
								<?php          
								if ( $re["mem_p3"] != "" ){
									if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" || $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "action" || $_SESSION["MM_UserAuthorization"] == "pay" ){
										if ( is_null($re["web_level"]) || $re["web_level"] == 0 || $_SESSION["MM_UserAuthorization"] == "admin" ){
											echo "<a href='ad_mem_detail.asp?st=delpic&v=mem_p3&mem_num=".$mem_num."&mem_au=".$re["mem_auto"]."'>刪除工作證開放重新上傳</a><br>";
										}
										echo "<a href='idcard/".$re["mem_p3"]."' class='fancybox'><img width='200' src='idcard/".$re["mem_p3"]."'></a>";
									}else{
										echo "已上傳工作證";
									}
								}else{
									echo "未上傳工作證";
								}?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
								<?php
								if ( $re["mem_school"] == "大學" || $re["mem_school"] == "碩士" || $re["mem_school"] == "博士" ){
									echo "此會員學歷為".$re["mem_school"]."<font color=blue>應</font>上傳學歷證明文件<br>";
									$inupload5 = 1;
								}else{
									echo "此會員學歷為".$re["mem_school"]."<font color='red'>可不需</font>學歷證明文件<br>";
									$inupload5 = 0;
								}
								
								if ( $re["mem_p4"] != "" ){
									$inupload5 = 0;
									if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" || $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "action" || $_SESSION["MM_UserAuthorization"] == "pay" ){
										if ( is_null($re["web_level"]) || $re["web_level"] == 0 || $_SESSION["MM_UserAuthorization"] == "admin" ){
											echo "<a href='ad_mem_detail.asp?st=delpic&v=mem_p4&mem_num=".$mem_num."&mem_au=".$re["mem_auto"]."'>刪除學歷證明文件開放重新上傳</a><br>";
										}
										echo "<a href='idcard/".$re["mem_p4"]."' class='fancybox'><img width='200' src='idcard/".$re["mem_p4"]."'></a>";
									}else{
										echo "已上傳學歷證明文件";
									}            
								}else{
									echo "未上傳學歷證明文件";
								}?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                財力證明文件<br>
                                <?php
								if ( $re["mem_money"] == "101萬到199萬" || $re["mem_money"] == "200萬以上" ){
									echo "此會員財力為".$re["mem_money"]."<font color='blue'>應</font>上傳財力證明文件<br>";
									$inupload6 = 1;
								}else{
									echo "此會員財力為".$re["mem_money"]."<font color='red'>可不需</font>財力證明文件<br>";
									$inupload6 = 0;
								}
								$SQL_q = "Select * From proof_data Where mem_num=".$mem_num." And Not photo_name='".$mem_photo."'";
								$rs_q = $SPConn->prepare($SQL_q);
								$rs_q->execute();
								$result_q=$rs_q->fetchAll(PDO::FETCH_ASSOC);
								if ( count($result_q) > 0 ){
									foreach($result as $re_q){
										echo "<div style='text-align:center;display:inline-block;'>";
										echo "<a href='idcard/".$re_q["photo_name"]."' class='fancybox'><img width='200' src='idcard/".$re_q["photo_name"]."' style='margin-left:15px;'></a>";
										if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "action" || $_SESSION["MM_UserAuthorization"] == "pay" ){
											echo "<br><a href='?st=proofdel&a=".$re_q["photo_auto"]."&mem_num=".$_REQUEST["mem_num"]."'>刪除</a>";
										}
										echo "</div>";
										$inupload6 = 0;
									}
								}?>
                            </td>
                        </tr>
                        <?php
						if ( 1 == 1 ){
							if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "action" || $_SESSION["MM_UserAuthorization"] == "pay" ){
								if ( $re["mem_photo"] == "" && $re["mem_p1"] == "" && $re["mem_p2"] == "" ){
									$SQL_u = "Update member_data Set web_level = 0, web_endtime = NULL Where mem_num=".$re["mem_num"];
									$rs_u = $SPConn->prepare($SQL_u);
									$rs_u->execute();
								}          
								$p1 = 0;
								$p2 = 0;
								$SQL_q = "Select Count(love_user) As pp From love_data_re Where love_user='".$mem_username."' And love_time2 Between '".$re["web_startime"]."' And '".$re["web_endtime"]."'";
								$rs_q = $SPConn->prepare($SQL_q);
								$rs_q->execute();
								$result_q=$rs_q->fetchAll(PDO::FETCH_ASSOC);
								foreach($result_q as $re_q);
								if ( count($result_q) > 0 ){
									$p1 = $re_q["pp"];
								}
								$SQL_q = "Select Count(love_user) As pp From love_data_re Where love_user2='".$mem_username."' And love_time2 Between '".$re["web_startime"]."' And '".$re["web_endtime"]."'";
								$rs_q = $SPConn->prepare($SQL_q);
								$rs_q->execute();
								$result_q=$rs_q->fetchAll(PDO::FETCH_ASSOC);
								foreach($result_q as $re_q);
								if ( count($result_q) > 0 ){
									$p2 = $re_q["pp"];
								}
								
								switch ($re["web_level"]){
									case 1:
										echo "<tr><td colspan='4'>此會員目前為資料認證會員(".$re["web_startime"]."~".$re["web_endtime"]."]</td></tr>";
										echo "<tr><td colspan='4'>資料效期內共主動排約 ".$p1." 次、被動排約 ".$p2." 次</td></tr>";
										break;
									case 2:
										echo "<tr><td colspan='4'>此會員目前為真人認證會員(".$re["web_startime"]."~".$re["web_endtime"]."]</td></tr>";
										echo "<tr><td colspan='4'>資料效期內共主動排約 ".$p1." 次、被動排約 ".$p2." 次、約會專家可排約 ".$re["si_real_invite"]." 次";
										if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
											echo "<a href='?st=addsirealinvite&mem_num=".$re["mem_num"]."'>+1</a>";
										}
										echo "</td></tr>";
										break;
									case 3:
										$SQL_q = "Select Count(love_user) As pp From love_data_re Where love_user='".$mem_username."'";
										$rs_q = $SPConn->prepare($SQL_q);
										$rs_q->execute();
										$result_q=$rs_q->fetchAll(PDO::FETCH_ASSOC);
										foreach($result_q as $re_q);
										if ( count($result_q) > 0 ){
											$p1 = $rs_q["pp"];
										}
										$SQL_q = "Select Count(love_user) As pp FROM love_data_re Where love_user2='".$mem_username."'";
										$rs_q = $SPConn->prepare($SQL_q);
										$rs_q->execute();
										$result_q=$rs_q->fetchAll(PDO::FETCH_ASSOC);
										foreach($result_q as $re_q);
										if ( count($result_q) > 0 ){
											$p2 = $re_q["pp"];
										}
										echo "<tr><td colspan='4'>此會員目前為璀璨會員(視服務期間而定)</td></tr>";
										echo "<tr><td colspan='4'>資料效期內共主動排約 ".$p1." 次、被動排約 ".$p2." 次</td></tr>";
										break;
									case 4:
										$SQL_q = "Select Count(love_user) As pp From love_data_re Where love_user='".$mem_username."'";
										$rs_q = $SPConn->prepare($SQL_q);
										$rs_q->execute();
										$result_q=$rs_q->fetchAll(PDO::FETCH_ASSOC);
										foreach($result_q as $re_q);
										if ( count($result_q) > 0 ){
											$p1 = $rs_q["pp"];
										}
										$SQL_q = "Select Count(love_user) As pp FROM love_data_re Where love_user2='".$mem_username."'";
										$rs_q = $SPConn->prepare($SQL_q);
										$rs_q->execute();
										$result_q=$rs_q->fetchAll(PDO::FETCH_ASSOC);
										foreach($result_q as $re_q);
										if ( count($result_q) > 0 ){
											$p2 = $re_q["pp"];
										}
										echo "<tr><td colspan='4'>此會員目前為璀璨VIP會員(視服務期間而定)</td></tr>";
										echo "<tr><td colspan='4'>資料效期內共主動排約 ".$p1." 次、被動排約 ".$p2." 次</td></tr>";
										break;
									default:
								}
							}
						}
									if ( $inupload == 0 && $inupload2 == 0 && $inupload3 == 0 && $inupload4 == 0 && $inupload5 == 0 && $inupload6 == 0 ){ }?>
                        <tr>
                            <td colspan=4>資料效期內共主動排約 0 次、被動排約 47 次</td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <form method="post" action="?st=log_send">
                        <input type="hidden" name="mem_auto" value="85689">
                        <input type="hidden" name="lusername" value="A000000002">
                        <input type="hidden" name="mem_num" value="173134">
                        <input type="hidden" name="mem_mobile" value="0900000001">
                        <input type="hidden" name="log_name" value="JACK">
                        <input type="hidden" name="log_username" value="鄭小姐">
                        <input type="hidden" name="log_branch" value="總管理處">
                        <input type="hidden" name="ty" value="member">
                        <tr>
                            <td colspan=3>預約聯絡：
                                <input type="text" style="width:120px;height:34px;" name="log_6" id="log_6" class="datepickert" placeholder="點此預約下次通話" autocomplete="off" required>
                                <select name="log_6_time1" id="log_6_time1" required>
                                    <option value="">請選擇</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option> 時
                                </select><select name="log_6_time2" id="log_6_time2">
                                    <option value="00">00</option>
                                    <option value="30">30</option>
                                </select> 分
                                &nbsp;&nbsp;內容：<input type="text" name="log_4" id="log_4" style="width:300px;height:34px;">　<input type="submit" value="送出" class="btn btn-default">
                    </form>
                    </td>
                    </tr>

                    <!--<tr><td style="color:blue">處理時間</td><td style="color:blue">處理內容</td><td style="color:blue" width="120">下次通話時間</td></tr>

<tr><td>2020/10/21 下午 05:51:00<br>澔翰</td><td>系統紀錄-由 瑪那熊 擔任講師於 2020/10/21 下午 04:00:00 在台北 諮詢[一對一諮詢] - 諮詢紀錄</td><td></td></tr><tr><td>2020/10/21 下午 05:38:00<br>秋如</td><td>系統紀錄-由 瑪那熊 擔任講師於 2020/10/21 下午 04:00:00 在台北 諮詢[一對一諮詢] - 諮詢紀錄</td><td></td></tr>-->
                </table>




                <div style="color:red">相關服務紀錄請點擊本頁面上方的[服務紀錄]按鈕查閱</div>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    <hr>

    <footer>
    </footer>
    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require("./include/_bottom.php");
?>

<script type="text/javascript">
    loadScript(plugin_path + 'bootstrap.datepicker/js/bootstrap-datepicker.min.js?v=1.1', function() {
        $(".datepickert").datepicker({
            startDate: new Date(),
            format: 'yyyy-mm-dd',
            language: 'tw'
        });
    });

    function checkok() {
        if (!$("#chk1").prop("checked")) {
            alert("請確認本人照片。");
            return false;
        }
        if (!$("#chk2").prop("checked")) {
            alert("請確認身分證正面。");
            return false;
        }
        if (!$("#chk3").prop("checked")) {
            alert("請確認身分證反面。");
            return false;
        }
        if (!$("#cardid").val()) {
            alert("請輸入圖片內的身分證字號。");
            $("#cardid").focus();
            return false;
        }

        if ($("#cardid").val().toUpperCase() != "A000000002") {
            alert("圖片內的身分證字號與會員自行輸入的身分證字號不同。");
            return false;
        }

        return true;
    }

    function checknook() {
        location.href = 'ad_mem_detail.php?st=checknook&mem_num=173134&errmsg=' + $("#si_errmsg").val();
    }
</script>