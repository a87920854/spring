<?php
	//載入時間
	//dim pageload_timer
	//pageload_timer = timer

	//預設編碼
	//ini_set('default_charset', 'Big5');
	
	//取得檔名
	$logfsql_url = $_SERVER["SCRIPT_NAME"];
	$logfsql_nolog = 1;
	
	//取得整串網址包含參數
	$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	
	if ( strstr($logfsql_url,"ad_mem_fix") > 0 || strstr($url, "upload") > 0 || strstr($url, "photo") > 0 ){
		$logfsql_nolog = 1;
	}
	
	if ( $logfsql_nolog == 0 ){
		$logfsql_msg = $_SERVER['HTTP_HOST'] . $logfsql_url . "?" . $_SERVER["QUERY_STRING"];
		$logfsql_us = $_SESSION["MM_Username"];
		$logfsql_starttimes = changeDate(date("Y-m-d H:i:s"));
	}
	
	if ( $_SESSION["branch"] == "好好玩旅行社" ){
		$show_menu_1 = 1;
	}
						  						  						  
	switch ( $_SESSION["MM_UserAuthorization"] ) {
		case "admin":
			$show_menu_2 = 1;
			break;
		case "branch":
			$show_menu_3 = 1;
			break;
		case "manager":
			$show_menu_8 = 1;
			break;
		case "love_manager":
			$show_menu_9 = 1;
			break;
		case "single":
			$show_menu_4 = 1;
			break;
		case "action":
			$show_menu_5 = 1;
			break;
		case "pay";
			$show_menu_6 = 1;
			break;
		case "love":
			$show_menu_7 = 1;
			break;
		case "keyin":
			//call KEYIN_TOP
			//exit sub
		case "count":
			//call COUNT_TOP
			//exit sub
		case "teacher":
			//call TEACHER_TOP
			//exit sub
		default:
			call_alert("您沒有查看此頁的權限。","login.php",0);
	}
						  
	if ( strtoupper($_SESSION["MM_Username"]) == "V221540975" ){
		//call CC_TOP
		//exit sub
	}
						  
	//lconstr = "Provider=SQLOLEDB;Persist Security Info=False;UID=lab;PWD=lab22225988;Initial Catalog=springclub;Data Source=127.0.0.1;"
?>
<!-- header -->
<?php require_once("_topmenu.php");?>
<!-- aside -->
<aside id="aside" class="no-print">
    <nav id="sideNav">
        <ul class="nav nav-list">

            <!-- ### 1. permissions=好好玩旅行社 ##################################################################################################################################################################-->
			<?php if ( $show_menu_1 == 1 ){ ?>
				<h3 style="background-color: #000; color: #fff">1. 好好玩旅行社</h3>
				<h3> --- 好好玩管理系統 ---</h3>
				<?php // if ( $_SESSION["MM_UserAuthorization"] == "keyin" ){ //備註：原程式=keyin就什麼都不做else就顯示下列六行，可直接<>keyin就好 ?>
				<?php if ( $_SESSION["MM_UserAuthorization"] != "keyin" ){?>
					<li><a href="ad_fun_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩會員資料</span></a></li>
					<li><a href="ad_fun_mem_pcheck2.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩生活照審核</span></a></li>
					<li><a href="ad_fun_mem_pcheck.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩證件審核</span></a></li>
					<li><a href="ad_fun_action1.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國內報名</span></a></li>
					<li><a href="ad_fun_action2.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國外報名</span></a></li>
					<li><a href="ad_fun_gmem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 金卡俱樂部(舊)</span></a></li>
				<?php }?>
				<?php if ( $_SESSION["funtourtravel1"] == "1" ){ ?>
					<li><a href="ad_fun_action_list1.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國內團控</span></a></li>
				<?php }?>
				<li><a href="ad_fun_action_list2.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國外團控</span></a></li>
				<li><a href="ad_fun_enterprise_service.php"><i class="main-icon fa fa-angle-double-right"></i><span> 企業委辦</span></a></li>
				<?php if ( $_SESSION["MM_Username"] == "HANNAH0807" || $_SESSION["MM_Username"] == "S124101617" ){ ?>
					<li><a href="ad_fun_nofix.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩手機未完成名單</span></a></li>
					<li><a href="ad_fun_report_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩回報紀錄表</span></a></li>
					<li><a href="ad_fun_counts.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩註冊統計</span></a></li>
					<li><a href="ad_fun_achievement.php"><i class="main-icon fa fa-angle-double-right"></i><span> 業務績效表</span></a></li>
					<li><a href="ad_fun_allemail_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩-電子信箱列表</span></a></li>
					<li><a href="ad_allemail_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 春天-電子信箱列表</span></a></li>            
					<li><a href="ad_dmn_business.php"><i class="main-icon fa fa-angle-double-right"></i><span> DMN企業專區</span></a></li>
				<?php }?>
				<li><a href="ad_action_note.php"><i class="main-icon fa fa-angle-double-right"></i><span> 工作日誌</span></a></li>
				<li><a href="ad_noemail_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 不願收到廣告信</span></a></li>
				<li><a href="ad_fun_indexnew.php"><i class="main-icon fa fa-angle-double-right"></i><span> 國內首頁最新消息</span></a></li>
				<li><a href="ad_fun_emailpaper_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 電子報訂閱</span></a></li>
			<?php }?>

			<!-- ### 2. permissions=admin ##################################################################################################################################################################-->
			<?php if ( $show_menu_2 == 1 ){ ?>
				<h3> --- 客戶管理系統 ---</h3>
				<li><a href="index.php"><i class="main-icon fa fa-dashboard"></i><span> 個人頁面</span></a></li>
				<li><a href="ad_system_report_list.php"><i class="main-icon fa fa-exchange"></i><span> 意見反映</span></a></li>
				<li><a href="ad_action_note.php"><i class="main-icon fa fa-book"></i><span> 工作日誌</span></a></li>
				<li><a href="tool/" target="_blank"><i class="main-icon fa fa-cog"></i><span> 訪談秘笈</span></a></li>
				<li><a href="ad_announce.php"><i class="main-icon fa fa-bullhorn"></i><span> 公告訊息</span></a></li>
				<?php
				$SQL = "Select count(auton) As tt From system_sign where stat=-1";
				$rs = $SPConn->prepare($SQL);
				$rs->execute();
				$result=$rs->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $re);
				$jt = 0;
				if ( count($result) > 0 ) {
					$jt = $re["tt"];
				}?>
				<li><a href="ad_system_sign_list.php"><i class="main-icon fa fa-file-text-o"></i><span> 申請簽核<font color="red">(<?php echo $jt;?>)</font></span></a></li>					
				<li class="collapse-menu">
					<a class="dropdown-toggle" data-toggle="collapse" href="#menu2" data-parent="#menu_group">
					<i class="fa fa-menu-arrow pull-right"></i>
                    <i class="main-icon fa fa-folder"></i>
                    <span class="title">名單/發送功能</span>		
					</a>
					<ul class="collapse" id="menu2">
						<li><a href="ad_single_optimization.php"><i class="fa fa-angle-right"></i><span> 優化單身資料庫</span></a></li>
						<li><a href="ad_single_atm.php"><i class="fa fa-angle-right"></i><span> 分期服務記錄</span></a></li>
						<li><a href="ad_admin_diff_list_team.php"><i class="fa fa-angle-right"></i><span> 小組業績表</span></a></li>
						<li><a href="ad_single_count_love.php"><i class="fa fa-angle-right"></i><span> 排約人次統計</span></a></li>
						<li><a href="ad_mem_love.php"><i class="fa fa-angle-right"></i><span> 會員排約時間</span></a></li>
						<li><a href="ad_mem_service_list.php"><i class="fa fa-angle-right"></i><span> 會員排約次數查詢</span></a></li>
						<li><a href="ad_action_service.php"><i class="fa fa-angle-right"></i><span> 會員服務紀錄查詢</span></a></li>
						<li><a href="ad_single_list.php"><i class="fa fa-angle-right"></i><span> 秘書履歷</span></a></li>
						<li><a href="ad_mem.php"><i class="fa fa-angle-right"></i><span> 會員管理系統</span></a></li>
						<?php
						$SQL = "Select count(mem_auto) as tt from member_data where mem_level='guest' and all_type = '未處理'";
						$rs = $SPConn->prepare($SQL);
						$rs->execute();
						$result=$rs->fetchAll(PDO::FETCH_ASSOC);
						foreach($result as $re);
						$jt = 0;
						if ( count($result) > 0 ) {
							$jt = $re["tt"];
						}?>
						<li><a href="ad_no_mem.php"><i class="fa fa-angle-right"></i><span> 未入會資料<font color="red">(<?php echo $jt;?>)</font></span></a></li>
						<li><a href="ad_no_mem_noreport.php"><i class="fa fa-angle-right"></i><span> 無回報未入會</span></a></li>	
						<?php
						$SQL = "select count(k_id) as tt from love_keyin where all_kind='排約' and all_type = '未處理'";
						$rs = $SPConn->prepare($SQL);
						$rs->execute();
						$result=$rs->fetchAll(PDO::FETCH_ASSOC);
						foreach($result as $re);
						$jt = 0;
						if ( count($result) > 0 ) {
							$jt = $re["tt"];
						}?>
						<li><a href="ad_love.php"><i class="fa fa-angle-right"></i><span> 排約報名資料<font color="red">(<?php echo $jt;?>)</font></span></a></li>
						<li><a href="ad_action.php"><i class="fa fa-angle-right"></i><span> 活動報名資料</span></a></li>
						<?php //20211116 hide By Queena 已無使用 
						/*
						$SQL = "select count(auton) as tt from quest where all_type = '未處理'";
						$rs = $SPConn->prepare($SQL);
						$rs->execute();
						$result=$rs->fetchAll(PDO::FETCH_ASSOC);
						foreach($result as $re);
						$jt = 0;
						if ( count($result) > 0 ) {
							$jt = $re["tt"];
						}*/?>
						<!--<li><a href="ad_quest.php"><i class="fa fa-angle-right"></i><span> 問卷報名資料<font color="red">(<?php //echo $jt;?>)</font></span></a></li>-->
						<?php
						$SQL = "select count(auton) as tt from join_log";
						$rs = $SPConn->prepare($SQL);
						$rs->execute();
						$result=$rs->fetchAll(PDO::FETCH_ASSOC);
						foreach($result as $re);
						$jt = 0;
						if ( count($result) > 0 ) {
							$jt = $re["tt"];
						}?>
						<li><a href="ad_nofix.php"><i class="fa fa-angle-right"></i><span> 未完成名單資料<font color="red">(<?php echo $jt;?>)</font></span></a></li>
						<!--<li><a href="ad_otherc.php"><i class="fa fa-angle-right-list"></i><span> 外部名單</span></a></li>-->
						<?php //20211116 Hide By Queena 久久合作一次先隱藏
						/*
						$SQL = "select count(auton) as tt from infojetmedia where stat = 0";
						$rs = $SPConn->prepare($SQL);
						$rs->execute();
						$result=$rs->fetchAll(PDO::FETCH_ASSOC);
						foreach($result as $re);
						$jt = 0;
						if ( count($result) > 0 ) {
							$jt = $re["tt"];
						}*/?>
						<!--<li><a href="ad_infojetmedia.php"><i class="fa fa-angle-right"></i><span> 春天-億捷創意<font color="red">(<?php //echo $jt;?>)</font></span></a></li>20211116 hide By Queena 久久合作一次先隱藏-->
						<?php //20211116 hide By Queena 久久合作一次先隱藏
						/*
						$SQL = "select count(auton) as tt from infojetmedia_dmn where stat = 0";
						$rs = $SPConn->prepare($SQL);
						$rs->execute();
						$result=$rs->fetchAll(PDO::FETCH_ASSOC);
						$jt = 0;
						if ( count($result) > 0 ) {
							$jt = $re["tt"];
						}*/?>
						<!--<li><a href="ad_infojetmedia_dmn.php"><i class="fa fa-angle-right"></i><span> DMN-億捷創意<font color="red">(<?php //echo $jt;?>)</font></span></a></li>20211116 hide By Queena 久久合作一次先隱藏--->
						<?php
						//$SQL = "select count(g_auto) as tt from guest where all_type = '未處理' and (all_note IS NULL)"; //原程式，應需符合★名單發送功能>客服中心資料頁面數字
						$SQL = "select count(g_auto) as tt from guest Where 1=1 And (all_note IS NULL) And (web <> 'singleparty' Or web is null)";
						$rs = $SPConn->prepare($SQL);
						$rs->execute();
						$result=$rs->fetchAll(PDO::FETCH_ASSOC);
						foreach($result as $re);
						$jt = 0;
						if ( count($result) > 0 ) {
							$jt = $re["tt"];
						}?>
						<li><a href="ad_guest.php"><i class="fa fa-angle-right"></i><span> 客服中心資料<font color="red">(<?php echo $jt;?>)</font></span></a></li>
						<?php
						$SQL = "select count(id) as tt from business_contact where all_type = '未處理' and (all_note IS NULL)";
						$rs = $DMNConn->prepare($SQL);
						$rs->execute();
						$result=$rs->fetchAll(PDO::FETCH_ASSOC);
						foreach($result as $re);
						$jt = 0;
						if ( count($result) > 0 ) {
							$jt = $re["tt"];
						}?>
						<li><a href="ad_dmn_business.php"><i class="fa fa-angle-right"></i><span> DMN企業專區<font color="red">(<?php echo $jt;?>)</font></span></a></li>
						<?php
						$SQL = "select count(auton) as tt from job where all_type = '未處理' and (all_note IS NULL)";
						$rs = $SPConn->prepare($SQL);
						$rs->execute();
						$result=$rs->fetchAll(PDO::FETCH_ASSOC);
						foreach($result as $re);
						$jt = 0;
						if ( count($result) > 0 ) {
							$jt = $re["tt"];
						}?>
						<li><a href="ad_job.php"><i class="fa fa-angle-right"></i><span> 徵人資料<font color="red">(<?php echo $jt;?>)</font></span></a></li> 
						<li><a href="ad_b2b_list.php"><i class="fa fa-angle-right"></i><span> 廠商認列表</span></a></li>
					</ul>
				</li>
				
				<!--*START* 春天網站功能-->
				<li class="collapse-menu">
					<a class="dropdown-toggle" data-toggle="collapse" href="#menu1" data-parent="#menu_group">
                    <i class="fa fa-menu-arrow pull-right"></i>
                    <i class="main-icon fa fa-folder"></i>
                    <span class="title">春天網站功能</span>					
					</a>
					<ul class="collapse" id="menu1">
						<?php
						$photojt = 0;
						$SQL = "select count(photo_auto) as tt from photo_data outer apply (select top 1 mem_branch, mem_level from member_data where mem_num = photo_data.mem_num) b where mem_branch='".$_SESSION["branch"]."' and accept=0 and mem_level='mem'";
						$rs = $SPConn->prepare($SQL);
						$rs->execute();
						$result=$rs->fetchAll(PDO::FETCH_ASSOC);
						foreach($result as $re);
						if ( count($result) > 0 ){							
							$photojt = $re["tt"];
						}?>
						<li><a href="ad_photo_check.php"><i class="fa fa-angle-right"></i><span> 春D約照片審核<font color="red">(<?php echo $photojt;?>)</font></span></a></li>            
						<li><a href="ad_mem_login.php"><i class="fa fa-angle-right"></i><span> 會員登入狀態</span></a></li>							
						<li><a href="ad_needlvup.php"><i class="fa fa-angle-right"></i><span> 春天會員升級意願</span></a></li>						
						<li><a href="web_mem.php"><i class="fa fa-angle-right"></i><span> 網站認證專區</span></a></li>
						<!--<li><a href="ad_mem_gift.php"><i class="fa fa-angle-right"></i><span> 會員禮物互動</span></a></li>
						<li><a href="ad_mem_guestbook.php"><i class="fa fa-angle-right"></i><span> 會員留言互動</span></a></li>-->
						<li><a href="ad_cs_data.php"><i class="fa fa-angle-right"></i><span> 服務滿意度調查</span></a></li>
						<!--<li><a href="ad_web_invite_list.php"><i class="fa fa-angle-right"></i><span> 自主排約</span></a></li>-->
						<li><a href="ad_bday_set.php"><i class="fa fa-angle-right"></i><span> 生日簡訊</span></a></li>
						<li><a href="ad_ptest.php"><i class="fa fa-angle-right"></i><span> 愛的五種語言</span></a></li>
					</ul>
				</li>
				<!--*END* 春天網站功能-->

				<!--*START* 約會專家功能-->
				<li class="collapse-menu">
					<a class="dropdown-toggle" data-toggle="collapse" href="#menu9" data-parent="#menu_group">
                    <i class="fa fa-menu-arrow pull-right"></i>
                    <i class="main-icon fa fa-folder"></i>
                    <span class="title">約會專家功能</span>										
					</a>
					<ul class="collapse" id="menu9">
						<li><a href="ad_photo_check.php?m=2"><i class="fa fa-angle-right"></i><span> 春D約照片審核<font color="red">(<?php echo $photojt;?>)</font></span></a></li>
						<li><a href="ad_singleparty_invite_list.php"><i class="fa fa-angle-right"></i><span> 會館約會</span></a></li>
						<li><a href="ad_singleparty_waitdateing.php"><i class="fa fa-angle-right"></i><span> 約會升級審核</span></a></li>            
						<li><a href="ad_needlvup_singleparty.php"><i class="fa fa-angle-right"></i><span> 約會專家升級意願</span></a></li>
						<li><a href="web_mem.php?c=1"><i class="fa fa-angle-right"></i><span> 網站認證專區</span></a></li>
						<li><a href="ad_singleparty_gift.php"><i class="fa fa-angle-right"></i><span> 會員禮物互動</span></a></li>
						<li><a href="ad_singleparty_guestbook.php"><i class="fa fa-angle-right"></i><span> 會員留言互動</span></a></li>
						<li><a href="ad_mem_login_log_list.php"><i class="fa fa-angle-right"></i><span> 會員登入紀錄</span></a></li>	
						<li><a href="ad_singleparty_online.php"><i class="fa fa-angle-right"></i><span> 約專會員在線</span></a></li>
						<li><a href="ad_mem_singleparty_invite_list.php"><i class="fa fa-angle-right"></i><span> 會員約會紀錄</span></a></li>	
						<li><a href="ad_mem_singleparty_consult.php"><i class="fa fa-angle-right"></i><span> 情感諮詢預約</span></a></li>	                        
						<li><a href="ad_singleparty_level.php"><i class="fa fa-angle-right"></i><span> 會員權益表</span></a></li>	   
					</ul>
				</li>
				<!--*END* 約會專家功能-->
				
				<!--*START* 排約/紀錄功能-->
				<li class="collapse-menu">
					<a class="dropdown-toggle" data-toggle="collapse" href="#menu3" data-parent="#menu_group">
                    <i class="fa fa-menu-arrow pull-right"></i>
                    <i class="main-icon fa fa-folder"></i>
                    <span class="title">排約/紀錄功能</span>                    
					</a>
					<ul class="collapse" id="menu3">
						<li><a href="ad_mem_web_level_add_list.php"><i class="fa fa-angle-right"></i><span> 會員權益延長</span></a></li>
						<li><a href="ad_advisory.php"><i class="fa fa-angle-right"></i><span> 諮詢紀錄表</span></a></li>
						<li><a href="ad_advisory_invite.php"><i class="fa fa-angle-right"></i><span> 諮詢預訂表</span></a></li>						
						<li><a href="ad_invite.php"><i class="fa fa-angle-right"></i><span> 約見紀錄表</span></a></li>
						<li><a href="ad_report_list.php"><i class="fa fa-angle-right"></i><span> 回報紀錄表</span></a></li>
						<li><a href="ad_report_list_count.php"><i class="fa fa-angle-right"></i><span> 回報統計表</span></a></li>
						<li><a href="ad_invite_count.php"><i class="fa fa-angle-right"></i><span> 約見統計表</span></a></li>
						<li><a href="ad_mem_action_re_list.php"><i class="fa fa-angle-right"></i><span> 活動明細表</span></a></li>
						<li><a href="ad_mem_row.php"><i class="fa fa-angle-right"></i><span> 排約部系統</span></a></li>
						<li><a href="ad_mem_love_re_invite.php"><i class="fa fa-angle-right"></i><span> 排約預訂表</span></a></li>
						<li><a href="ad_mem_love_re_list.php"><i class="fa fa-angle-right"></i><span> 一般排約表</span></a></li>
						<li><a href="ad_mem_love_reply_list.php"><i class="fa fa-angle-right"></i><span> 約後關懷表</span></a></li>
						<li><a href="ad_mem_love_re_list_report.php"><i class="fa fa-angle-right"></i><span> 未回饋排約表</span></a></li>
						<li><a href="ad_mem_love_re_list_report2.php"><i class="fa fa-angle-right"></i><span> 排約回饋表</span></a></li>
						<li><a href="ad_mem_love_re_list_report3.php"><i class="fa fa-angle-right"></i><span> 排約回饋統計表</span></a></li>
						<li><a href="ad_love_tv_list.php"><i class="fa fa-angle-right"></i><span> 視訊排約表(舊)</span></a></li>
						<li><a href="ad_mem_reservation.php"><i class="fa fa-angle-right"></i><span> 預約聯絡表</span></a></li>
					</ul>
				</li>
				<!--*END* 排約/紀錄功能-->
				
				<!--*START* 其他功能-->
				<li class="collapse-menu">
					<a class="dropdown-toggle" data-toggle="collapse" href="#menu4" data-parent="#menu_group">
                    <i class="fa fa-menu-arrow pull-right"></i>
                    <i class="main-icon fa fa-folder"></i>
                    <span class="title">其他功能</span>                
					</a>
					<ul class="collapse" id="menu4">						
						<li><a href="ad_secretary.php"><i class="fa fa-angle-right"></i><span> 秘書資料</span></a></li>	
						<li><a href="teach_video.php"><i class="fa fa-angle-right"></i><span> 教學影片</span></a></li>	
						<li><a href="ad_b2b_manager.php"><i class="fa fa-angle-right"></i><span> 通路管理</span></a></li>									
						<li><a href="ad_action_list.php"><i class="fa fa-angle-right"></i><span> 網站活動上傳</span></a></li>
						<li><a href="ad_action_list_sign_manager.php"><i class="fa fa-angle-right"></i><span> 活動異動單列表</span></a></li>
						<li><a href="ad_action_note.php"><i class="fa fa-angle-right"></i><span> 工作日誌</span></a></li>
						<li><a href="ad_email_list.php"><i class="fa fa-angle-right"></i><span> 信箱對照</span></a></li>
						<li><a href="ad_noemail_list.php"><i class="fa fa-angle-right"></i><span> 不願收到廣告信</span></a></li>
						<li><a href="ad_emailpaper_list.php"><i class="fa fa-angle-right"></i><span> 春天-電子報訂閱</span></a></li>
						<li><a href="ad_allemail_list.php"><i class="fa fa-angle-right"></i><span> 春天-電子信箱列表</span></a></li>
						<li><a href="ad_emailpaper_list_dmn.php"><i class="fa fa-angle-right"></i><span> DMN-電子報訂閱</span></a></li>            
						<li><a href="ad_cheers_check.php"><i class="fa fa-angle-right"></i><span> Cheers 檢校</span></a></li>
						<li><a href="ad_funtour_check.php"><i class="fa fa-angle-right"></i><span> 好好玩檢校</span></a></li>                      
						<li><a href="ad_system_report.php"><i class="fa fa-angle-right"></i><span> 同仁意見反映</span></a></li>             
					</ul>
				</li>
				<!--*END* 其他功能-->
				
				<!--*START* 報表統計功能-->
				<li class="collapse-menu">
					<a class="dropdown-toggle" data-toggle="collapse" href="#menu7" data-parent="#menu_group">
						<i class="fa fa-menu-arrow pull-right"></i>
						<i class="main-icon fa fa-folder"></i>
						<span class="title">報表統計功能</span>					
					</a>
					<ul class="collapse" id="menu7">
						<li><a href="ad_counts_branch.php"><i class="fa fa-angle-right"></i><span> 會館新增未入會統計</span></a></li>
						<li><a href="ad_counts.php"><i class="fa fa-angle-right"></i><span> 春天-未入會統計</span></a></li>
						<li><a href="ad_count_ads.php"><i class="fa fa-angle-right"></i><span> 春天-未入會統計[廣告]</span></a></li>
						<li><a href="ad_counts2.php"><i class="fa fa-angle-right"></i><span> 春天-已入會會員統計</span></a></li>
						<li><a href="ad_count_ads2.php"><i class="fa fa-angle-right"></i><span> 春天-已入會統計[廣告]</span></a></li>                    
						<li><a href="ad_dmn_counts.php"><i class="fa fa-angle-right"></i><span> DMN-未入會統計</span></a></li>
						<li><a href="ad_dmn_count_ads.php"><i class="fa fa-angle-right"></i><span> DMN-未入會統計[廣告]</span></a></li>						
						<li><a href="ad_dmn_counts2.php"><i class="fa fa-angle-right"></i><span> DMN-活動統計</span></a></li>                                            
						<li><a href="ad_singleparty_counts.php"><i class="fa fa-angle-right"></i><span> 約專-未入會統計</span></a></li>
						<li><a href="ad_singleparty_count_ads.php"><i class="fa fa-angle-right"></i><span> 約專-未入會統計[廣告]</span></a></li>						
						<li><a href="ad_singleparty_counts3.php"><i class="fa fa-angle-right"></i><span> 約專-愛情實驗室統計</span></a></li>
						<li><a href="ad_counts7.php"><i class="fa fa-angle-right"></i><span> 網路名單圖表</span></a></li>
						<!--<li><a href="ad_dmn_counts2.php"><i class="fa fa-angle-right"></i><span> DMN-活動統計</span></a></li>-->
						<!--<li><a href="ad_counts3.php"><i class="fa fa-angle-right"></i><span> 活動統計</span></a></li>
						<li><a href="ad_count_ads3.php"><i class="fa fa-angle-right"></i><span> 活動統計[廣告]</span></a></li>
						<li><a href="ad_counts4.php"><i class="fa fa-angle-right"></i><span> 我想認識他統計</span></a></li>
						<li><a href="ad_counts5.php"><i class="fa fa-angle-right"></i><span> 廣告統計</span></a></li>
						<li><a href="ad_counts6.php"><i class="fa fa-angle-right"></i><span> 熱戀區-區域統計</span></a></li>-->
					</ul>
				</li>
				<!--*END* 報表統計功能-->
				
				<!--*START* 行銷活動功能-->
				<li class="collapse-menu">
					<a class="dropdown-toggle" data-toggle="collapse" href="#menu8" data-parent="#menu_group">
						<i class="fa fa-menu-arrow pull-right"></i>
						<i class="main-icon fa fa-folder"></i>
						<span class="title">行銷活動功能</span>					
					</a>
					<ul class="collapse" id="menu8">
						<li><a href="ad_market1.php"><i class="fa fa-angle-right"></i><span> 行銷活動管理</span></a></li>
						<li><a href="ad_market2.php"><i class="fa fa-angle-right"></i><span> 行銷活動統計</span></a></li>
						<li><a href="ad_market5.php"><i class="fa fa-angle-right"></i><span> 行銷活動統計-特1</span></a></li>
					</ul>
				</li>
				<!--*END* 行銷活動功能-->
				
				<!--*START* 好好玩管理系統-->
				<li class="collapse-menu">
					<a class="dropdown-toggle" data-toggle="collapse" href="#menu5" data-parent="#menu_group">
						<i class="fa fa-menu-arrow pull-right"></i>
						<i class="main-icon fa fa-folder"></i>
						<span class="title">好好玩管理系統</span>
					</a>
					<ul class="collapse" id="menu5">						
						<li><a href="ad_fun_mem.php"><i class="fa fa-angle-right"></i><span> 好好玩會員資料</span></a></li>
						<li><a href="ad_fun_mem_pcheck2.php"><i class="fa fa-angle-right"></i><span> 好好玩生活照審核</span></a></li>
						<li><a href="ad_fun_mem_pcheck.php"><i class="fa fa-angle-right"></i><span> 好好玩證件審核</span></a></li>
						<li><a href="ad_fun_action1.php"><i class="fa fa-angle-right"></i><span> 好好玩國內報名</span></a></li>
						<li><a href="ad_fun_action2.php"><i class="fa fa-angle-right"></i><span> 好好玩國外報名</span></a></li>
						<li><a href="ad_fun_gmem.php"><i class="fa fa-angle-right"></i><span> 金卡俱樂部(舊)</span></a></li>
						<li><a href="ad_fun_action_list1.php"><i class="fa fa-angle-right"></i><span> 好好玩國內團控</span></a></li>
						<li><a href="ad_fun_action_list2.php"><i class="fa fa-angle-right"></i><span> 好好玩國外團控</span></a></li>
						<li><a href="ad_fun_nofix.php"><i class="fa fa-angle-right"></i><span> 好好玩手機未完成名單</span></a></li>
						<li><a href="ad_fun_report_list.php"><i class="fa fa-angle-right"></i><span> 好好玩回報紀錄表</span></a></li>
						<li><a href="ad_fun_enterprise_service.php"><i class="fa fa-angle-right"></i><span> 企業委辦</span></a></li>
						<li><a href="ad_fun_email_list.php"><i class="fa fa-angle-right"></i><span> 好好玩信箱對照</span></a></li>
						<li><a href="ad_fun_counts.php"><i class="fa fa-angle-right"></i><span> 好好玩註冊統計</span></a></li>
						<li><a href="ad_fun_achievement.php"><i class="fa fa-angle-right"></i><span> 業務績效表</span></a></li>
						<li><a href="ad_fun_history_count.php"><i class="fa fa-angle-right"></i><span> 歷史統計圖表</span></a></li>
						<li><a href="ad_fun_indexnew.php"><i class="fa fa-angle-right"></i><span> 國內首頁最新消息</span></a></li>
						<li><a href="ad_fun_emailpaper_list.php"><i class="fa fa-angle-right"></i><span> 電子報訂閱</span></a></li>
						<li><a href="ad_fun_allemail_list.php"><i class="fa fa-angle-right"></i><span> 電子信箱列表</span></a></li>
					</ul>
				</li>
				<!--*END* 好好玩管理系統-->
				
				<!--*START* 好好玩同業系統-->
				<li class="collapse-menu">
					<a class="dropdown-toggle" data-toggle="collapse" href="#menu6" data-parent="#menu_group">
                        <i class="fa fa-menu-arrow pull-right"></i>
                        <i class="main-icon fa fa-folder"></i>
                        <span class="title">好好玩同業系統</span>
					</a>
					<ul class="collapse" id="menu6">						
						<li><a href="ad_b2b_mem.php"><i class="fa fa-angle-right"></i><span> 同業會員資料</span></a></li>
						<li><a href="ad_b2b_apply_list.php"><i class="fa fa-angle-right"></i><span> 同業報名單管理</span></a></li>
                    </ul>
				</li>
				<!--*END* 好好玩同業系統-->
				
				<?php
				if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
					if ( $_SESSION["keepconnect"] == 1 ){
						$keepconnect_check = " checked";
					}else{
						$keepconnect_check = "";
					}
				}?>
				<h3><label><input type="checkbox" name="keepconnect" id="keepconnect"> 保持連線</label> <span id="kepcs"></span></h3>
			<?php }?>

			<!-- ### 3. permissions=branch ##################################################################################################################################################################-->
			<?php if ( $show_menu_3 == 1 ){?>
				<h3 style="background-color: #000; color: #fff">3. branch</h3>
				<h3> --- 客戶管理系統 ---</h3>
				<li><a href="index.php"><i class="main-icon fa fa-dashboard"></i><span> 個人頁面</span></a></li>
				<li><a href="ad_system_report_list.php"><i class="main-icon fa fa-exchange"></i><span> 意見反映</span></a></li>
				<li><a href="ad_action_note.php"><i class="main-icon fa fa-book"></i><span> 工作日誌</span></a></li>
				<li><a href="ad_announce.php"><i class="main-icon fa fa-bullhorn"></i><span> 公告訊息</span></a></li>
				<?php
				$jt = 0;
				$SQL = "select count(auton) as tt from system_sign where stat=0 and needbranch=1 and branch='".$_SESSION["branch"]."'";
				$rs = $SPConn->prepare($SQL);
				$rs->execute();
				$result=$rs->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $re);
				if ( count($result) > 0 ){
					$jt = $re["tt"];
				}
				?>
				<li><a href="ad_system_sign_list.php"><i class="main-icon fa fa-file-text-o"></i><span> 申請簽核<font color="red">(<?php echo $jt;?>)</font></span></a></li>					    
				<h3> --- 升級意願 ---</h3>			
				<li><a href="ad_needlvup.php"><i class="main-icon fa fa-angle-double-right"></i><span> 春天升級意願</span></a></li>						
				<li><a href="ad_needlvup_singleparty.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約專升級意願</span></a></li>
				<li><a href="ad_singleparty_waitdateing.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約會升級審核</span></a></li>
				<h3> --- 名單處理 ---</h3>
				<li><a href="ad_no_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 未入會資料</span></a></li>
				<li><a href="ad_no_mem_noreport.php"><i class="main-icon fa fa-angle-double-right"></i><span> 無回報未入會</span></a></li>						
				<li><a href="ad_counts_branch.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會館新增未入會統計</span></a></li>						
				<li><a href="ad_love.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約報名資料</span></a></li>
				<li><a href="ad_action.php"><i class="main-icon fa fa-angle-double-right"></i><span> 活動報名資料</span></a></li>
				<!--<li><a href="ad_quest.php"><i class="main-icon fa fa-angle-double-right"></i><span> 問卷報名資料</span></a></li> 20211116 Hide By Queena 已無使用-->
				<?php
				$jt2 = 0;
				$SQL = "select count(auton) as tt from invite where stats=0 and datediff(d, n11, getdate()) = 0 and (branch='".$_SESSION["branch"]."' or branch3='".$_SESSION["branch"]&"')";
				$rs = $SPConn->prepare($SQL);
				$rs->execute();
				$result=$rs->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $re);
				if ( count($result) > 0 ){
					$jt2 = $re["tt"];
				}?>
				<li><a href="ad_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約見紀錄表<font color="red">(<?php echo $jt2;?>)</font></span></a></li>
				<li><a href="ad_invite_count.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約見統計表</span></a></li>            
				<li><a href="ad_report_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 回報紀錄表</span></a></li>
				<li><a href="ad_report_list_count.php"><i class="main-icon fa fa-angle-double-right"></i><span> 回報統計表</span></a></li>
				<li><a href="ad_mem_reservation.php"><i class="main-icon fa fa-angle-double-right"></i><span> 預約聯絡表</span></a></li>						
				<h3> --- 會員服務 ---</h3>
				<li><a href="ad_single_optimization.php"><i class="main-icon fa fa-angle-double-right"></i><span> 優化單身資料庫</span></a></li>
				<li><a href="ad_single_atm.php"><i class="main-icon fa fa-angle-double-right"></i><span> 分期服務記錄</span></a></li>
				<li><a href="ad_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員管理系統</span></a></li>								  
				<li><a href="ad_advisory_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 諮詢預訂表</span></a></li>			
				<li><a href="ad_mem_login.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員登入狀態</span></a></li>
				<li><a href="ad_mem_love.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員排約時間</span></a></li>
				<li><a href="ad_single_count_love.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約人次統計</span></a></li>
				<li><a href="ad_mem_service_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員排約次數查詢</span></a></li>						
				<!--<li><a href="ad_mem_gift.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員互動區</span></a></li>-->
				<li><a href="ad_mem_action_re_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 活動明細表</span></a></li>
				<li><a href="ad_mem_row.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約部系統</span></a></li>
				<li><a href="ad_mem_love_re_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約預訂表</span></a></li>
				<li><a href="ad_mem_love_re_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 一般排約表</span></a></li>
				<li><a href="ad_mem_love_reply_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約後關懷表</span></a></li>
				<li><a href="ad_mem_love_re_list_report.php"><i class="main-icon fa fa-angle-double-right"></i><span> 未回饋排約表</span></a></li>
				<li><a href="ad_mem_love_re_list_report2.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約回饋表</span></a></li>
				<li><a href="ad_mem_love_re_list_report3.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約回饋統計表</span></a></li>
				<li><a href="ad_love_tv_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 視訊排約表(舊)</span></a></li>	
				<li><a href="springweb_fun3.php"><i class="main-icon fa fa-angle-double-right"></i><span> 愛情見證</span></a></li>												
				<h3> --- 其他功能 ---</h3>					  
				<li><a href="teach_video.php"><i class="main-icon fa fa-angle-double-right"></i><span> 教學影片</span></a></li>
				<li><a href="ad_admin_diff_list_team.php"><i class="main-icon fa fa-angle-double-right"></i><span> 小組業績表</span></a></li>
				<li><a href="ad_single_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 秘書履歷</span></a></li>						
				<li><a href="ad_guest.php"><i class="main-icon fa fa-angle-double-right"></i><span> 客服中心資料</span></a></li>
				<li><a href="ad_job.php"><i class="main-icon fa fa-angle-double-right"></i><span> 徵人資料</span></a></li>
				<li><a href="ad_cs_data.php"><i class="main-icon fa fa-angle-double-right"></i><span> 服務滿意度調查</span></a></li>
				<li><a href="ad_action_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 網站活動上傳</span></a></li>
				<li><a href="ad_action_note.php"><i class="main-icon fa fa-angle-double-right"></i><span> 工作日誌</span></a></li>			
				<?php if ($_SESSION["branch"] == "八德" ){?>				
					<li><a href="ad_dmn_business.php"><i class="main-icon fa fa-angle-double-right"></i><span> DMN企業專區</span></a></li>
				<?php }?>
				<h3> --- 約會專家功能 ---</h3>
				<?php
				$photojt = 0;
				$SQL  = "select count(photo_auto) as tt from photo_data outer apply (select top 1 mem_branch, mem_level from member_data where mem_num = photo_data.mem_num) b where ";
				$SQL .= "mem_branch='".$_SESSION["branch"]."' and accept=0 and mem_level='mem'";
				$rs = $SPConn->prepare($SQL);
				$rs->execute();
				$result=$rs->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $re);
				if ( count($result) > 0 ){
					$photojt = $re["tt"];
				}?>
				<li><a href="ad_photo_check.php"><i class="main-icon fa fa-angle-double-right"></i><span> 網站照片審核<font color="red">(<?php echo $photojt;?>)</font></span></a></li>
				<li><a href="ad_singleparty_invite_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會館約會</span></a></li>						
				<li><a href="web_mem.php?c=1"><i class="main-icon fa fa-angle-double-right"></i><span> 網站認證專區</span></a></li>
				<li><a href="ad_singleparty_gift.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員禮物互動</span></a></li>
				<li><a href="ad_mem_login_log_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員登入紀錄</span></a></li>	
				<li><a href="ad_mem_singleparty_invite_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員約會紀錄</span></a></li>	
				<li><a href="ad_singleparty_level.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員權益表</span></a></li>
				<?php if ($_SESSION["branch"] != "八德" ){?>
					<h3> --- 好好玩管理系統 ---</h3>
					<li><a href="ad_fun_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩會員資料</span></a></li>
					<li><a href="ad_fun_action1.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國內報名</span></a></li>
					<li><a href="ad_fun_action2.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國外報名</span></a></li>
					<li><a href="ad_fun_gmem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 金卡俱樂部(舊)</span></a></li>	
					<?php if ( $_SESSION["funtourtravel1"] == "1" ){?>
						<li><a href="ad_fun_action_list1.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國內團控</span></a></li>
					<?php }?>
					<?php if ( $_SESSION["funtourtravel1"] == "1" ){?>					
						<li><a href="ad_fun_action_list2.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國外團控</span></a></li>
					<?php }?>
				<?php }?>
			<?php }?>

			<!-- ### 4. permissions=single ##################################################################################################################################################################-->
			<?php if ( $show_menu_4 == 1 ){?>
				<h3 style="background-color: #000; color: #fff">4. single</h3>
				<h3> --- 客戶管理系統 ---</h3>
				<li><a href="index.php"><i class="main-icon fa fa-dashboard"></i><span> 個人頁面</span></a></li>
				<li><a href="ad_system_report_list.php"><i class="main-icon fa fa-exchange"></i><span> 意見反映</span></a></li>				
				<li><a href="ad_action_note.php"><i class="main-icon fa fa-book"></i><span> 工作日誌</span></a></li>
				<li><a href="ad_announce.php"><i class="main-icon fa fa-bullhorn"></i><span> 公告訊息</span></a></li>
				<h3> --- 升級意願 ---</h3>			
				<li><a href="ad_needlvup.php"><i class="main-icon fa fa-angle-double-right"></i><span> 春天升級意願</span></a></li>						
				<li><a href="ad_needlvup_singleparty.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約專升級意願</span></a></li>
				<li><a href="ad_singleparty_waitdateing.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約會升級審核</span></a></li>	
				<h3> --- 名單處理 ---</h3>					  
				<li><a href="ad_no_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 未入會資料</span></a></li>
				<li><a href="ad_no_mem_noreport.php"><i class="main-icon fa fa-angle-double-right"></i><span> 無回報未入會</span></a></li>
				<li><a href="ad_mem_reservation.php"><i class="main-icon fa fa-angle-double-right"></i><span> 預約聯絡表</span></a></li>						
				<li><a href="ad_love.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約報名資料</span></a></li>
				<li><a href="ad_action.php"><i class="main-icon fa fa-angle-double-right"></i><span> 活動報名資料</span></a></li>			
				<li><a href="ad_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約見紀錄表</span></a></li>
				<li><a href="ad_invite_count.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約見統計表</span></a></li>
				<li><a href="ad_report_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 回報紀錄表</span></a></li>			
				<h3> --- 會員服務 ---</h3>
				<li><a href="ad_single_optimization.php"><i class="main-icon fa fa-angle-double-right"></i><span> 優化單身資料庫</span></a></li>
				<li><a href="ad_single_atm.php"><i class="main-icon fa fa-angle-double-right"></i><span> 分期服務記錄</span></a></li>
				<li><a href="ad_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員管理系統</span></a></li>
				<li><a href="ad_mem_love_re_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約預訂表</span></a></li>
				<li><a href="ad_mem_love_reply_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約後關懷表</span></a></li>
				<li><a href="ad_advisory_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 諮詢預訂表</span></a></li>
				<li><a href="ad_mem_login.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員登入狀態</span></a></li>
				<li><a href="ad_mem_love.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員排約時間</span></a></li>		
				<li><a href="ad_mem_service_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員排約次數查詢</span></a></li>
				<li><a href="ad_single_count_love.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約人次統計</span></a></li>					  
				<!--<li><a href="ad_mem_gift.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員互動區</span></a></li>-->
				<li><a href="springweb_fun3.php"><i class="main-icon fa fa-angle-double-right"></i><span> 愛情見證</span></a></li>                                    
				<h3> --- 其他功能 ---</h3>					  
				<li><a href="teach_video.php"><i class="main-icon fa fa-angle-double-right"></i><span> 教學影片</span></a></li>
				<li><a href="ad_admin_diff_list_team.php"><i class="main-icon fa fa-angle-double-right"></i><span> 小組業績表</span></a></li>
				<li><a href="ad_single_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 秘書履歷</span></a></li>		
				<h3> --- 約會專家功能 ---</h3>
				<li><a href="ad_photo_check.php"><i class="main-icon fa fa-angle-double-right"></i><span> 網站照片審核</span></a></li>
				<li><a href="ad_singleparty_invite_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會館約會</span></a></li>						
				<li><a href="web_mem.php?c=1"><i class="main-icon fa fa-angle-double-right"></i><span> 網站認證專區</span></a></li>
				<li><a href="ad_singleparty_gift.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員禮物互動</span></a></li>
				<li><a href="ad_mem_login_log_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員登入紀錄</span></a></li>	
				<li><a href="ad_mem_singleparty_invite_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員約會紀錄</span></a></li>	
				<li><a href="ad_singleparty_level.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員權益表</span></a></li>
				<?php if ( $_SESSION["branch"] != "八德" ){?>
					<h3> --- 好好玩管理系統 ---</h3>
					<li><a href="ad_fun_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩會員資料</span></a></li>
					<li><a href="ad_fun_action1.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國內報名</span></a></li>
					<li><a href="ad_fun_action2.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國外報名</span></a></li>
					<li><a href="ad_fun_gmem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 金卡俱樂部(舊)</span></a></li>
					<li><a href="ad_fun_report_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩回報紀錄表</span></a></li> 
					<?php if ( $_SESSION["funtourtravel1"] == "1" ){?>
						<li><a href="ad_fun_action_list1.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國內團控</span></a></li>            
					<?php }?>
					<?php if ( $_SESSION["funtourtrave12"] == "1" ){?>
						<li><a href="ad_fun_action_list2.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國外團控</span></a></li>
					<?php }?>
				<?php }?>
			<?php }?>

			<!-- ### 5. permissions=action ##################################################################################################################################################################-->
			<?php if ( $show_menu_5 == 1 ){?>
				<h3 style="background-color: #000; color: #fff">5. action</h3>
				<li><a href="index.php"><i class="main-icon fa fa-dashboard"></i><span> 個人頁面</span></a></li>
				<li><a href="ad_system_report_list.php"><i class="main-icon fa fa-exchange"></i><span> 意見反映</span></a></li>			
				<li><a href="ad_action_note.php"><i class="main-icon fa fa-book"></i><span> 工作日誌</span></a></li>		
				<li><a href="ad_announce.php"><i class="main-icon fa fa-bullhorn"></i><span> 公告訊息</span></a></li>
				<h3> --- 名單處理 ---</h3>
				<li><a href="ad_no_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 未入會資料</span></a></li>
				<li><a href="ad_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約見紀錄表</span></a></li>
				<li><a href="ad_action.php"><i class="main-icon fa fa-angle-double-right"></i><span> 活動報名資料</span></a></li>			
				<!--<li><a href="ad_quest.php"><i class="main-icon fa fa-angle-double-right"></i><span> 問卷報名資料</span></a></li>20211116 Hide By Queena 已無使用-->
				<h3> --- 會員服務 ---</h3>
				<li><a href="ad_single_optimization.php"><i class="main-icon fa fa-angle-double-right"></i><span> 優化單身資料庫</span></a></li>
				<li><a href="ad_single_atm.php"><i class="main-icon fa fa-angle-double-right"></i><span> 分期服務記錄</span></a></li>
				<li><a href="ad_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員管理系統</span></a></li>
				<li><a href="ad_advisory.php"><i class="main-icon fa fa-angle-double-right"></i><span> 諮詢紀錄表</span></a></li>
				<li><a href="ad_advisory_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 諮詢預訂表</span></a></li>
				<li><a href="ad_action_service.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員服務紀錄查詢</span></a></li>
				<li><a href="ad_mem_action_re_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 活動明細表</span></a></li>
				<li><a href="springweb_fun3.php"><i class="main-icon fa fa-angle-double-right"></i><span> 愛情見證</span></a></li>
				<h3> --- 其他功能 ---</h3>					  
				<li><a href="teach_video.php"><i class="main-icon fa fa-angle-double-right"></i><span> 教學影片</span></a></li>
				<li><a href="ad_action_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 網站活動上傳</span></a></li>
				<li><a href="ad_single_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 秘書履歷</span></a></li>
				<li><a href="ad_action_list_sign_manager.php"><i class="main-icon fa fa-angle-double-right"></i><span> 活動異動單列表</span></a></li>
				<li><a href="ad_action_note.php"><i class="main-icon fa fa-angle-double-right"></i><span> 工作日誌</span></a></li>						
				<li><a href="singleweb_fun6.php"><i class="main-icon fa fa-angle-double-right"></i><span> 講師資料</span></a></li>	
				<h3> --- 約會專家功能 ---</h3>
				<?php
				$SQL  = "select count(photo_auto) as tt from photo_data outer apply (select top 1 mem_branch, mem_level from member_data where mem_num = photo_data.mem_num) b where ";
				$SQL .= "mem_branch='".$_SESSION["branch"]."' and accept=0 and mem_level='mem'";
				$rs = $SPConn->prepare($SQL);
				$rs->execute();
				$result=$rs->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $re);
				if ( count($result) > 0 ) {
					$photojt = $re["tt"];
				}?>
				<li><a href="ad_photo_check.php"><i class="main-icon fa fa-angle-double-right"></i><span> 網站照片審核<font color="red">(<?php echo $photojt;?>)</font></span></a></li>
				<li><a href="web_mem.php?c=1"><i class="main-icon fa fa-angle-double-right"></i><span> 網站認證專區</span></a></li>
				<?php if ( $_SESSION["branch"] != "八德" ){?>
					<h3> --- 好好玩管理系統 ---</h3>
					<li><a href="ad_fun_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩會員資料</span></a></li>						
					<li><a href="ad_fun_action1.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國內報名</span></a></li>						
					<li><a href="ad_fun_action2.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國外報名</span></a></li>
					<li><a href="ad_fun_gmem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 金卡俱樂部(舊)</span></a></li>
					<?php if ( $_SESSION["funtourtravel1"] == "1" ){?>
						<li><a href="ad_fun_action_list1.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國內團控</span></a></li>
					<?php }?>
					<?php if ( $_SESSION["funtourtravel2"] == "1" ){?>
						<li><a href="ad_fun_action_list2.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國外團控</span></a></li>
					<?php }?>
				<?php }?>
			<?php }?>

			<!-- ### 6. permissions=pay ##################################################################################################################################################################-->
			<?php if ( $show_menu_6 == 1 ){?>
				<h3 style="background-color: #000; color: #fff">6. pay</h3>
				<li><a href="index.php"><i class="main-icon fa fa-dashboard"></i><span> 個人頁面</span></a></li>
				<li><a href="ad_system_report_list.php"><i class="main-icon fa fa-exchange"></i><span> 意見反映</span></a></li>
				<li><a href="ad_action_note.php"><i class="main-icon fa fa-book"></i><span> 工作日誌</span></a></li>
				<li><a href="ad_announce.php"><i class="main-icon fa fa-bullhorn"></i><span> 公告訊息</span></a></li>
				<li><a href="ad_system_sign_list.php"><i class="main-icon fa fa-file-text-o"></i><span> 申請簽核</span></a></li>
				<h3> --- 名單處理 ---</h3>
				<li><a href="ad_no_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 未入會資料</span></a></li>	
				<h3> --- 會員服務 ---</h3>
				<li><a href="ad_single_optimization.php"><i class="main-icon fa fa-angle-double-right"></i><span> 優化單身資料庫</span></a></li>					  
				<li><a href="ad_single_atm.php"><i class="main-icon fa fa-angle-double-right"></i><span> 分期服務記錄</span></a></li>
				<li><a href="ad_single_count_love.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約人次統計</span></a></li>
				<li><a href="ad_mem_service_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員排約次數查詢</span></a></li>						
				<li><a href="ad_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員管理系統</span></a></li>
				<li><a href="ad_mem_love_re_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約預訂表</span></a></li>
				<li><a href="ad_mem_love_re_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 一般排約表</span></a></li>			
				<li><a href="ad_mem_love_reply_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約後關懷表</span></a></li>			
				<li><a href="ad_mem_love_re_list_report.php"><i class="main-icon fa fa-angle-double-right"></i><span> 未回饋排約表</span></a></li>
				<li><a href="ad_mem_love_re_list_report2.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約回饋表</span></a></li>
				<li><a href="ad_love_tv_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 視訊排約表(舊)</span></a></li>
				<li><a href="ad_advisory.php"><i class="main-icon fa fa-angle-double-right"></i><span> 諮詢紀錄表</span></a></li>
				<li><a href="ad_advisory_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 諮詢預訂表</span></a></li>
				<li><a href="ad_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約見紀錄表</span></a></li>
				<li><a href="ad_mem_action_re_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 活動明細表</span></a></li>			
				<li><a href="springweb_fun3.php"><i class="main-icon fa fa-angle-double-right"></i><span> 愛情見證</span></a></li>	
				<h3> --- 其他功能 ---</h3>					  
				<li><a href="teach_video.php"><i class="main-icon fa fa-angle-double-right"></i><span> 教學影片</span></a></li>
				<h3> --- 約會專家功能 ---</h3>
				<?php
				$SQL  = "select count(photo_auto) as tt from photo_data outer apply (select top 1 mem_branch, mem_level from member_data where mem_num = photo_data.mem_num) b where ";
				$SQL .= "mem_branch='".$_SESSION["branch"]."' and accept=0 and mem_level='mem'";
				$rs = $SPConn->prepare($SQL);
				$rs->execute();
				$result=$rs->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $re);
				if ( count($result1) > 0 ) {
					$photojt = $re["tt"];
				}?>
				<li><a href="ad_photo_check.php"><i class="main-icon fa fa-angle-double-right"></i><span> 網站照片審核<font color="red">(<?php echo $photojt;?>)</font></span></a></li>
				<li><a href="web_mem.php?c=1"><i class="main-icon fa fa-angle-double-right"></i><span> 網站認證專區</span></a></li>
			<?php }?>

			<!-- ### 7. permissions=love ##################################################################################################################################################################-->
			<?php if ( $show_menu_7 == 1 ){?>
				<h3 style="background-color: #000; color: #fff">7. love</h3>
				<li><a href="index.php"><i class="main-icon fa fa-dashboard"></i><span> 個人頁面</span></a></li>
				<li><a href="ad_system_report_list.php"><i class="main-icon fa fa-exchange"></i><span> 意見反映</span></a></li>				
				<li><a href="ad_action_note.php"><i class="main-icon fa fa-book"></i><span> 工作日誌</span></a></li>	
				<li><a href="ad_announce.php"><i class="main-icon fa fa-bullhorn"></i><span> 公告訊息</span></a></li>            
				<h3> --- 升級意願 ---</h3>			
				<li><a href="ad_needlvup.php"><i class="main-icon fa fa-angle-double-right"></i><span> 春天升級意願</span></a></li>						
				<li><a href="ad_needlvup_singleparty.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約專升級意願</span></a></li>
				<li><a href="ad_singleparty_waitdateing.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約會升級審核</span></a></li>
				<h3> --- 會員服務 ---</h3>					  
				<li><a href="ad_single_optimization.php"><i class="main-icon fa fa-angle-double-right"></i><span> 優化單身資料庫</span></a></li>
				<li><a href="ad_single_atm.php"><i class="main-icon fa fa-angle-double-right"></i><span> 分期服務記錄</span></a></li>
				<li><a href="ad_single_count_love.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約人次統計</span></a></li>				
				<li><a href="ad_mem_service_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員排約次數查詢</span></a></li>	  
				<li><a href="ad_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員管理系統</span></a></li>
				<li><a href="ad_mem_login.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員登入狀態</span></a></li>	
				<li><a href="ad_mem_love.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員排約時間</span></a></li>	
				<!--<li><a href="ad_mem_gift.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員互動區</span></a></li>-->
				<li><a href="ad_mem_row.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約部系統</span></a></li>
				<li><a href="ad_mem_love_re_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約預訂表</span></a></li>
				<li><a href="ad_mem_love_re_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 一般排約表</span></a></li>
				<li><a href="ad_mem_love_reply_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約後關懷表</span></a></li>
				<li><a href="ad_advisory_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 諮詢預訂表</span></a></li>
				<li><a href="ad_mem_love_re_list_report.php"><i class="main-icon fa fa-angle-double-right"></i><span> 未回饋排約表</span></a></li>
				<li><a href="ad_mem_love_re_list_report2.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約回饋表</span></a></li>	
				<li><a href="ad_love_tv_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 視訊排約表(舊)</span></a></li>
				<li><a href="springweb_fun3.php"><i class="main-icon fa fa-angle-double-right"></i><span> 愛情見證</span></a></li>
				<?php if ( $_SESSION["MM_Username"] == "A224258841" || $_SESSION["MM_Username"] == "A229457620" ){?>
					<li><a href="ad_mem_action_re_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 活動明細表</span></a></li>
				<?php }?>
				<h3> --- 約會專家功能 ---</h3>	
				<?php
					$photojt = 0;
					$SQL  = "select count(photo_auto) as tt from photo_data outer apply (select top 1 mem_branch, mem_level from member_data where mem_num = photo_data.mem_num) b where ";
					$SQL .= "mem_branch='".$_SESSION["branch"]."' and accept=0 and mem_level='mem'";
					$rs = $SPConn->prepare($SQL);
					$rs->execute();
					$result=$rs->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $re);
					if ( count($result) > 0 ) {
						$photojt = $re["tt"];
				}?>				
				<li><a href="ad_photo_check.php"><i class="main-icon fa fa-angle-double-right"></i><span> 網站照片審核<font color="red">(<?php echo $photojt;?>)</font></span></a></li>
				<li><a href="ad_singleparty_invite_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會館約會</span></a></li>
				<li><a href="web_mem.php?c=1"><i class="main-icon fa fa-angle-double-right"></i><span> 網站認證專區</span></a></li>
				<li><a href="ad_singleparty_gift.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員禮物互動</span></a></li>
				<li><a href="ad_mem_login_log_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員登入紀錄</span></a></li>	
				<li><a href="ad_mem_singleparty_invite_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員約會紀錄</span></a></li>	
				<li><a href="ad_singleparty_level.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員權益表</span></a></li>	 
				<h3> --- 名單處理 ---</h3>
				<li><a href="ad_no_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 未入會資料</span></a></li>
				<li><a href="ad_no_mem_noreport.php"><i class="main-icon fa fa-angle-double-right"></i><span> 無回報未入會</span></a></li>
				<li><a href="ad_love.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約報名資料</span></a></li>
				<li><a href="ad_action.php"><i class="main-icon fa fa-angle-double-right"></i><span> 活動報名資料</span></a></li>
				<li><a href="ad_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約見紀錄表</span></a></li>
				<li><a href="ad_mem_reservation.php"><i class="main-icon fa fa-angle-double-right"></i><span> 預約聯絡表</span></a></li>
				<li><a href="ad_report_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 回報紀錄表</span></a></li>
				<h3> --- 其他功能 ---</h3>			
				<li><a href="ad_single_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 秘書履歷</span></a></li>						
				<li><a href="teach_video.php"><i class="main-icon fa fa-angle-double-right"></i><span> 教學影片</span></a></li>		
				<!--<li><a href="ad_friend.php"><i class="main-icon fa fa-angle-double-right"></i><span> 親友推薦資料</span></a></li>
				<li><a href="ad_witness.php"><i class="main-icon fa fa-angle-double-right"></i><span> 愛情見證資料</span></a></li>-->
				<?php if ( $_SESSION["branch"] != "八德" ){?>
					<h3> --- 好好玩管理系統 ---</h3>
					<li><a href="ad_fun_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩會員資料</span></a></li>
					<li><a href="ad_fun_action1.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國內報名</span></a></li>
				<?php }?>
			<?php }?>

			<!-- ### 8. permissions=manager ##################################################################################################################################################################-->
			<?php if ( $show_menu_8 == 1 ){?>
				<h3 style="background-color: #000; color: #fff">8. manager</h3>
				<h3> --- 客戶管理系統 ---</h3>
				<li><a href="index.php"><i class="main-icon fa fa-dashboard"></i><span> 個人頁面</span></a></li>
				<li><a href="ad_system_report_list.php"><i class="main-icon fa fa-exchange"></i><span> 意見反映</span></a></li>
				<li><a href="ad_action_note.php"><i class="main-icon fa fa-book"></i><span> 工作日誌</span></a></li>
				<li><a href="ad_announce.php"><i class="main-icon fa fa-bullhorn"></i><span> 公告訊息</span></a></li>
				<?php
				$jt = 0;
				$SQL = "select count(auton) as tt from system_sign where stat=0 and needbranch=1 and branch='".$_SESSION["branch"]."'";
				$rs = $SPConn->prepare($SQL);
				$rs->execute();
				$result=$rs->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $re);
				if ( count($result1) > 0 ) {
					$jt = $re["tt"];
				}?>
				<li><a href="ad_system_sign_list.php"><i class="main-icon fa fa-file-text-o"></i><span> 申請簽核<font color="red">(<?php echo $jt;?>)</font></span></a></li>					
				<h3> --- 升級意願 ---</h3>			
				<li><a href="ad_needlvup.php"><i class="main-icon fa fa-angle-double-right"></i><span> 春天升級意願</span></a></li>						
				<li><a href="ad_needlvup_singleparty.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約專升級意願</span></a></li>
				<li><a href="ad_singleparty_waitdateing.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約會升級審核</span></a></li>
				<h3> --- 名單處理 ---</h3>
				<li><a href="ad_no_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 未入會資料</span></a></li>						
				<li><a href="ad_no_mem_noreport.php"><i class="main-icon fa fa-angle-double-right"></i><span> 無回報未入會</span></a></li>						
				<li><a href="ad_counts_branch.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會館新增未入會統計</span></a></li>
				<li><a href="ad_love.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約報名資料</span></a></li>
				<li><a href="ad_action.php"><i class="main-icon fa fa-angle-double-right"></i><span> 活動報名資料</span></a></li>
				<li><a href="ad_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約見紀錄表</span></a></li>
				<li><a href="ad_invite_count.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約見統計表</span></a></li>
				<li><a href="ad_report_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 回報紀錄表</span></a></li>
				<li><a href="ad_report_list_count.php"><i class="main-icon fa fa-angle-double-right"></i><span> 回報統計表</span></a></li>	
				<li><a href="ad_mem_reservation.php"><i class="main-icon fa fa-angle-double-right"></i><span> 預約聯絡表</span></a></li>
				<h3> --- 會員服務 ---</h3>
				<li><a href="ad_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員管理系統</span></a></li>
				<li><a href="ad_advisory_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 諮詢預訂表</span></a></li>			
				<li><a href="ad_mem_login.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員登入狀態</span></a></li>
				<li><a href="ad_mem_love.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員排約時間</span></a></li>
				<li><a href="ad_single_optimization.php"><i class="main-icon fa fa-angle-double-right"></i><span> 優化單身資料庫</span></a></li>
				<li><a href="ad_single_atm.php"><i class="main-icon fa fa-angle-double-right"></i><span> 分期服務記錄</span></a></li>
				<li><a href="ad_single_count_love.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約人次統計</span></a></li>
				<li><a href="ad_mem_service_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員排約次數查詢</span></a></li>  						
				<!--<li><a href="ad_mem_gift.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員互動區</span></a></li>-->
				<li><a href="ad_mem_love_re_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約預訂表</span></a></li>			
				<li><a href="ad_mem_love_reply_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約後關懷表</span></a></li>			
				<li><a href="springweb_fun3.php"><i class="main-icon fa fa-angle-double-right"></i><span> 愛情見證</span></a></li>
				<h3> --- 其他功能 ---</h3>
				<li><a href="teach_video.php"><i class="main-icon fa fa-angle-double-right"></i><span> 教學影片</span></a></li>					  
				<li><a href="ad_single_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 秘書履歷</span></a></li>
				<li><a href="ad_guest.php"><i class="main-icon fa fa-angle-double-right"></i><span> 客服中心資料</span></a></li>
				<li><a href="ad_job.php"><i class="main-icon fa fa-angle-double-right"></i><span> 徵人資料</span></a></li>
				<li><a href="ad_cs_data.php"><i class="main-icon fa fa-angle-double-right"></i><span> 服務滿意度調查</span></a></li> 
				<?php if ( $_SESSION["branch"] == "八德" ){?>
					<li><a href="ad_dmn_business.php"><i class="main-icon fa fa-angle-double-right"></i><span> DMN企業專區</span></a></li>
				<?php }?>
				<h3> --- 約會專家功能 ---</h3>
				<?php
				$photojt = 0;
				$SQL  = "select count(photo_auto) as tt from photo_data outer apply (select top 1 mem_branch, mem_level from member_data where ";
				$SQL .= "mem_num = photo_data.mem_num) b where mem_branch='".$_SESSION["branch"]."' and accept=0 and mem_level='mem'";
				$rs = $SPConn->prepare($SQL);
				$rs->execute();
				$result=$rs->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $re);
				if ( count($result1) > 0 ) {
					$photojt = $re["tt"];
				}?>
				<li><a href="ad_photo_check.php"><i class="main-icon fa fa-angle-double-right"></i><span> 網站照片審核<font color="red">(<?php echo $photojt;?>)</font></span></a></li>
				<li><a href="ad_singleparty_invite_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會館約會</span></a></li>
				<li><a href="ad_singleparty_waitdateing.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約會升級審核</span></a></li>						
				<li><a href="web_mem.php?c=1"><i class="main-icon fa fa-angle-double-right"></i><span> 網站認證專區</span></a></li>
				<li><a href="ad_singleparty_gift.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員禮物互動</span></a></li>
				<li><a href="ad_mem_login_log_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員登入紀錄</span></a></li>	
				<li><a href="ad_mem_singleparty_invite_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員約會紀錄</span></a></li>												
				<li><a href="ad_singleparty_level.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員權益表</span></a></li>	   
				<h3> --- 業績查詢 ---</h3>
				<li><a href="payment_list_diff.php"><i class="main-icon fa fa-th"></i><span> 區段總表</span></a></li>
				<!--<li><a href="payment_list_month.php"><i class="main-icon fa fa-th"></i><span> 月總表</span></a></li>-->
				<li><a href="ad_admin_diff_list_team.php"><i class="main-icon fa fa-angle-double-right"></i><span> 小組業績表</span></a></li>
				<?php if ( $_SESSION["branch"] != "八德" ){?>
					<h3> --- 好好玩管理系統---</h3>
					<li><a href="ad_fun_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩會員資料</span></a></li>
					<li><a href="ad_fun_action1.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國內報名</span></a></li>
					<li><a href="ad_fun_action2.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國外報名</span></a></li>
					<li><a href="ad_fun_gmem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 金卡俱樂部(舊)</span></a></li>
				<?php }?>
			<?php }?>

			<!-- ### 9. permissions=manager ##################################################################################################################################################################-->
			<?php if ( $show_menu_9 == 1 ){?>
				<h3 style="background-color: #000; color: #fff">9. love manager</h3>
				<h3> --- 客戶管理系統 ---</h3>
				<li><a href="index.php"><i class="main-icon fa fa-dashboard"></i><span> 個人頁面</span></a></li>
				<li><a href="ad_system_report_list.php"><i class="main-icon fa fa-exchange"></i><span> 意見反映</span></a></li>
				<li><a href="ad_action_note.php"><i class="main-icon fa fa-book"></i><span> 工作日誌</span></a></li>
				<li><a href="ad_announce.php"><i class="main-icon fa fa-bullhorn"></i><span> 公告訊息</span></a></li>
				<?php
				$jt = 0;
				$SQL = "select count(auton) as tt from system_sign where stat=0 and needbranch=1 and branch='".$_SESSION["branch"]."'";
				$rs = $SPConn->prepare($SQL);
				$rs->execute();
				$result=$rs->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $re);
				if ( count($result1) > 0 ) {
					$jt = $re["tt"];
				}?>
				<li><a href="ad_system_sign_list.php"><i class="main-icon fa fa-file-text-o"></i><span> 申請簽核<font color="red">(<?php echo $jt;?>)</font></span></a></li>
				<h3> --- 升級意願 ---</h3>			
				<li><a href="ad_needlvup.php"><i class="main-icon fa fa-angle-double-right"></i><span> 春天升級意願</span></a></li>						
				<li><a href="ad_needlvup_singleparty.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約專升級意願</span></a></li>
				<li><a href="ad_singleparty_waitdateing.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約會升級審核</span></a></li>			
				<h3> --- 會員服務 ---</h3>
				<li><a href="ad_single_optimization.php"><i class="main-icon fa fa-angle-double-right"></i><span> 優化單身資料庫</span></a></li>
				<li><a href="ad_single_atm.php"><i class="main-icon fa fa-angle-double-right"></i><span> 分期服務記錄</span></a></li>
				<li><a href="ad_single_count_love.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約人次統計</span></a></li>			
				<li><a href="ad_mem_service_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員排約次數查詢</span></a></li>  						
				<li><a href="ad_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員管理系統</span></a></li>
				<li><a href="ad_mem_login.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員登入狀態</span></a></li>	
				<li><a href="ad_mem_love.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員排約時間</span></a></li>	
				<!--<li><a href="ad_mem_gift.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員互動區</span></a></li>																-->
				<li><a href="ad_mem_row.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約部系統</span></a></li>
				<li><a href="ad_mem_love_re_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約預訂表</span></a></li>
				<li><a href="ad_mem_love_re_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 一般排約表</span></a></li>
				<li><a href="ad_mem_love_reply_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約後關懷表</span></a></li>
				<li><a href="ad_advisory_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 諮詢預訂表</span></a></li>
				<li><a href="ad_mem_love_re_list_report.php"><i class="main-icon fa fa-angle-double-right"></i><span> 未回饋排約表</span></a></li>
				<li><a href="ad_mem_love_re_list_report2.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約回饋表</span></a></li>	
				<li><a href="ad_love_tv_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 視訊排約表(舊)</span></a></li>			
				<li><a href="springweb_fun3.php"><i class="main-icon fa fa-angle-double-right"></i><span> 愛情見證</span></a></li>	
				<h3> --- 約會專家功能 ---</h3>
				<?php
				$photojt = 0;
				$SQL  = "select count(photo_auto) as tt from photo_data outer apply (select top 1 mem_branch, mem_level from member_data where mem_num = photo_data.mem_num) b where ";
				$SQL .= "mem_branch='".$_SESSION["branch"]."' and accept=0 and mem_level='mem'";
				$rs = $SPConn->prepare($SQL);
				$rs->execute();
				$result=$rs->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $re);
				if ( count($result1) > 0 ) {
					$photojt = $re["tt"];
				}?>
				<li><a href="ad_photo_check.php"><i class="main-icon fa fa-angle-double-right"></i><span> 網站照片審核<font color="red">(<?php echo $photojt;?>)</font></span></a></li>
				<li><a href="ad_singleparty_invite_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會館約會</span></a></li>						
				<li><a href="web_mem.php?c=1"><i class="main-icon fa fa-angle-double-right"></i><span> 網站認證專區</span></a></li>
				<li><a href="ad_singleparty_gift.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員禮物互動</span></a></li>
				<li><a href="ad_mem_login_log_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員登入紀錄</span></a></li>	
				<li><a href="ad_mem_singleparty_invite_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員約會紀錄</span></a></li>												
				<li><a href="ad_singleparty_level.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會員權益表</span></a></li>	   
				<h3> --- 業績查詢 ---</h3>
				<li><a href="payment_list_diff.php"><i class="main-icon fa fa-th"></i><span> 區段總表</span></a></li>
				<!--<li><a href="payment_list_month.php"><i class="main-icon fa fa-th"></i><span> 月總表</span></a></li>-->
				<li><a href="ad_admin_diff_list_team.php"><i class="main-icon fa fa-angle-double-right"></i><span> 小組業績表</span></a></li>
				<h3> --- 名單處理 ---</h3>
				<li><a href="ad_no_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 未入會資料</span></a></li>						
				<li><a href="ad_no_mem_noreport.php"><i class="main-icon fa fa-angle-double-right"></i><span> 無回報未入會</span></a></li>						
				<li><a href="ad_counts_branch.php"><i class="main-icon fa fa-angle-double-right"></i><span> 會館新增未入會統計</span></a></li>
				<li><a href="ad_love.php"><i class="main-icon fa fa-angle-double-right"></i><span> 排約報名資料</span></a></li>
				<li><a href="ad_action.php"><i class="main-icon fa fa-angle-double-right"></i><span> 活動報名資料</span></a></li>
				<li><a href="ad_invite.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約見紀錄表</span></a></li>
				<li><a href="ad_invite_count.php"><i class="main-icon fa fa-angle-double-right"></i><span> 約見統計表</span></a></li>
				<li><a href="ad_report_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 回報紀錄表</span></a></li>
				<li><a href="ad_report_list_count.php"><i class="main-icon fa fa-angle-double-right"></i><span> 回報統計表</span></a></li>	
				<li><a href="ad_mem_reservation.php"><i class="main-icon fa fa-angle-double-right"></i><span> 預約聯絡表</span></a></li>
				<h3> --- 其他功能 ---</h3>
				<li><a href="teach_video.php"><i class="main-icon fa fa-angle-double-right"></i><span> 教學影片</span></a></li>					  
				<li><a href="ad_single_list.php"><i class="main-icon fa fa-angle-double-right"></i><span> 秘書履歷</span></a></li>
				<li><a href="ad_guest.php"><i class="main-icon fa fa-angle-double-right"></i><span> 客服中心資料</span></a></li>
				<li><a href="ad_job.php"><i class="main-icon fa fa-angle-double-right"></i><span> 徵人資料</span></a></li>
				<li><a href="ad_cs_data.php"><i class="main-icon fa fa-angle-double-right"></i><span> 服務滿意度調查</span></a></li>  
				<li><a href="ad_dmn_business.php"><i class="main-icon fa fa-angle-double-right"></i><span> DMN企業專區</span></a></li>
				<h3> --- 好好玩管理系統 ---</h3>
				<li><a href="ad_fun_mem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩會員資料</span></a></li>
				<li><a href="ad_fun_action1.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國內報名</span></a></li>
				<li><a href="ad_fun_action2.php"><i class="main-icon fa fa-angle-double-right"></i><span> 好好玩國外報名</span></a></li>
				<li><a href="ad_fun_gmem.php"><i class="main-icon fa fa-angle-double-right"></i><span> 金卡俱樂部(舊)</span></a></li>
			<?php }?>

        </ul>
    </nav>
    <span id="asidebg"></span>
</aside>