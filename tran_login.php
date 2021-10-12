<?php
	$action = "login";
	require_once("./include/_inc.php");
	require_once("./include/_function.php");
	
	//登出
	if ( $_REQUEST["st"] == "out" ){
		session_destroy();
		call_alert("您已登出。","login.php",0);
	}

	//判斷session預留
	/*if($_SESSION['Manage']=='Yes' && strlen($_SESSION["Login_ID"])>0 && $_SESSION["private_key"]==secret()){
		 location_href("login.php");
		 exit();
	}*/
	
	//帳號傳值
	$strID = SqlFilter($_REQUEST["f_username"],"str");
	
	//密碼傳值
	$strPW = SqlFilter($_REQUEST["f_passwd"],"str");
	
	
	//判斷帳密是否為空值
	if ( $strID == "" || $strPW == "" ){
		call_alert("帳號或密碼錯誤，請重新輸入。","login.php",0);
	}
	
	if ( SqlFilter($_REQUEST["Submit"],"tab") == "登入" ){
		
		//取得IP變數
		$myip = sysgetrealip();
		
		//判斷帳號
		$SQL = "Select * From personnel_data Where p_user='".$strID."' Order By p_work Desc";
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result=$rs->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $re);
		
		if ( count($result) == 0 ) {
			//判斷帳號
			call_alert("帳號錯誤，請重新輸入。","login.php",0);
		}else{
			
			//判斷密碼並儲存log
			if ( $result[0]["b_year"] != $strPW ){                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
				//儲存ip_log
				$SQL  = "Insert Into limit_ip(ip, singlename, branch, single, singlelv, times, errmsg) Values ( '";
				$SQL .= SqlFilter($myip,"str")."',";
				$SQL .= "'".SqlFilter($re["p_name"],"str")."',";
				$SQL .= "'".SqlFilter($re["p_branch"],"str")."',";
				$SQL .= "'".SqlFilter($re["p_user"],"str")."',";
				$SQL .= "'".SqlFilter($re["p_level"],"str")."',";
				$SQL .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
				$SQL .= "'密碼錯誤')";
				$rs = $SPConn->prepare($SQL);
				$rs->execute(); 
				call_alert("密碼錯誤，請重新輸入。","login.php",0);
			}
			
			//判斷帳號是否可使用並儲存log
			if ( $re["p_work"] != 1 ){                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
				//儲存ip_log
				$SQL  = "Insert Into limit_ip(ip, singlename, branch, single, singlelv, times, errmsg) Values ( '";
				$SQL .= SqlFilter($myip,"str")."',";
				$SQL .= "'".SqlFilter($re["p_name"],"str")."',";
				$SQL .= "'".SqlFilter($re["p_branch"],"str")."',";
				$SQL .= "'".SqlFilter($re["p_user"],"str")."',";
				$SQL .= "'".SqlFilter($re["p_level"],"str")."',";
				$SQL .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
				$SQL .= "'帳號停用')";
				$rs = $SPConn->prepare($SQL);
				$rs->execute(); 
				call_alert("此帳號已被停止使用，請重新輸入。","login.php",0);
			}
			
			//取得組別
			$SQL = "Select team_name From personnel_data_aparty Where p_user='".$re["p_user"]."'";
			$rs = $SPConn->prepare($SQL);
			$rs->execute();
			$result1=$rs->fetchAll(PDO::FETCH_ASSOC); 
			foreach($result1 as $re1);
			if ( count($result1) > 0 ) {
				if ( $re1["team_name"] != "" ){
					$_SESSION["team_name"] = $re1["team_name"];
				}
			}
	
			//若前面的判斷為 eof
			if ( $_SESSION["team_name"] == "" ){
				$SQL = "Select team_name From personnel_data_aparty Where p_user='".$result[0]["p_user2"]."'";
				$rs = $SPConn->prepare($SQL);
				$rs->execute();
				$result2=$rs->fetchAll(PDO::FETCH_ASSOC); 
				foreach($result2 as $re2);
				if ( count($result2) > 0 ) {
					if ( $re2["team_name"] != "" ){
						$_SESSION["team_name"] = $re2["team_name"];
					}
				}
			}
			
			//判斷權限關閉的項目_測試p_user:S124101617
			$SQL = "Select * From managers_power Where p_user='".$re["p_user"]."'";
			//$SQL = "Select * From managers_power Where p_user='S124101617'";
			$rs = $SPConn->prepare($SQL);
			$rs->execute();
			$result3=$rs->fetchAll(PDO::FETCH_ASSOC) ; 
			if ( count($result3) > 0 ) {
				foreach($result3 as $re3) {
					$powers = $powers.$re3["page"].",";
				}
				$powers = substr($powers, 0, -1);
			}
			
			$_SESSION["page_powers"] = $powers;
			$_SESSION["MM_Username"] = strtoupper($re["p_user"]);
			if ( $re["p_user2"] != "" ){ $_SESSION["p_user2"] = strtoupper($re["p_user2"]); }
			$_SESSION["pauto"] = $re["p_auto"];
			$_SESSION["branch"] = $re["p_branch"];
			$_SESSION["pname"] = $re["p_name"];
			$_SESSION["p_other_name"] = $re["p_other_name"];
			$_SESSION["MM_UserAuthorization"] = $re["p_level"];
			$_SESSION["funtourpm"] = $re["p_funtourpm"];
			$_SESSION["funtourprint"] = $re["p_funtourprint"];
			$_SESSION["funtourtravel1"] = $re["p_funtourtravel1"];
			$_SESSION["funtourtravel2"] = $re["p_funtourtravel2"];
			$_SESSION["funtourall1"] = $re["p_funtourall1"];
			$_SESSION["funtourall2"] = $re["p_funtourall2"];
			$_SESSION["dmnweb"] = $re["p_dmnweb"];
			$_SESSION["singleweb"] = $re["p_singleweb"];
			$_SESSION["ip"] = $myip;
			$_SESSION["logintime"] = strftime("%Y/%m/%d %H:%M:%S");
			$_SESSION["action_level"] = $re["action_level"];
			$_SESSION["vertest"] = $re["vertest"];
			$_SESSION["lovebranch"] = $re["p_lovebranch"];
			//$_SESSION["firstlogin"] = 1 '原程式被mark
			$log_ip = 1;
			$p_user = $re["p_user"];
			$lastlogintime = $re["lastlogintime"];			
		}
	}
	
	$isacceptsn = 0;
	if ( $log_ip == 1 ){
		//start check ip
		$accept_login = 0;
		$check_ip = 0;
		
		switch ( $_SESSION["MM_UserAuthorization"] ){
			case "branch":
				$check_ip = 1;
				break;
			case "admin":
				$check_ip = 1;
				break;
			default:
				$check_ip = 0;
				break;
		}
		
		//check_ip = 1
		if ( $_SESSION["branch"] == "好好玩旅行社" || $myip == "60.250.92.145" ){
			$check_ip = 1;
		}
		if ( SqlFilter($_REQUEST["f_acceptsn"],"str") == "kyoe" ){
			$check_ip = 1;
		}
		
		//$check_ip = 0; //← ← ← ← ← ← ← ← ← ← ← ← ← 上線需mark 暫用
		if ( $check_ip == 0 ){
			
			
			if ( 1 == 1 ){ //Session("MM_Username") = "kyoe" then
				if ( $_SESSION["MM_Username"] == "A221335725" || $_SESSION["MM_Username"] == "CANDY8060" ){
					$SQL = "Select * From limit_ip Where nolimit = 1";
				}else{
					//$SQL = "Select * From limit_ip Where nolimit = 1 And branch='".$_SESSION["branch"]."'";
					$SQL = "Select * From limit_ip Where nolimit = 1 And branch='台中'";
				}
				$rs = $SPConn->prepare($SQL);
				$rs->execute();
				$result=$rs->fetchAll(PDO::FETCH_ASSOC);
			}
			
			if ( count($result) > 0 ) {
				foreach($result as $re) {
					$all_ip = $all_ip.$re["ip"].",";
				}
				$all_ip = substr($all_ip, 0, -1);
			}
			
			if ( member_array($all_ip, $myip) == 0 ){
				
				if ( SqlFilter($_REQUEST["f_acceptsn"],"str") == "" ){
					
					//儲存ip_log
					$SQL  = "Insert Into limit_ip(ip, singlename, branch, single, singlelv, times, errmsg) Values ( '";
					$SQL .= SqlFilter($myip,"str")."',";
					$SQL .= "'".SqlFilter($_SESSION["pname"],"str")."',";
					$SQL .= "'".SqlFilter($_SESSION["branch"],"str")."',";
					$SQL .= "'".SqlFilter($_SESSION["MM_Username"],"str")."',";
					$SQL .= "'".SqlFilter($_SESSION["MM_UserAuthorization"],"str")."',";
					$SQL .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
					$SQL .= "'嘗試使用未授權的位置登入')";
					$rs = $SPConn->prepare($SQL);
					$rs->execute(); 
					call_alert("由於您的連線位置未經授權，請和督導取得臨時授權碼。","login.php",0);
				}else{
					if ( date("H") >= 10 && date("H") <= 22 ){
						//原程式沒有寫code
					}else{
						call_alert("非可登入時段。","login.php",0);					
					}					
				
					//判斷授權碼
					$SQL = "Select * From limit_ip Where single='".$_SESSION["MM_Username"]."' And datediff(d, accepttime, '".strftime("%Y/%m/%d %H:%M:%S")."') = 0";
					$rs = $SPConn->prepare($SQL);
					$rs->execute();
					$result=$rs->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $re);
					if ( count($result) == 0 ){
						//儲存ip_log
						$SQL  = "Insert Into limit_ip(ip, singlename, branch, single, singlelv, times, errmsg) Values ('";
						$SQL .= SqlFilter($myip,"str")."',";
						$SQL .= "'".SqlFilter($_SESSION["pname"],"str")."',";
						$SQL .= "'".SqlFilter($_SESSION["branch"],"str")."',";
						$SQL .= "'".SqlFilter($_SESSION["MM_Username"],"str")."',";
						$SQL .= "'".SqlFilter($_SESSION["MM_UserAuthorization"],"str")."',";
						$SQL .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
						$SQL .= "'未產生 ".strftime("%Y/%m/%d %H:%M:%S")." 的授權碼')";
						$rs = $SPConn->prepare($SQL);
						$rs->execute(); 
						call_alert("未產生 ".strftime("%Y/%m/%d %H:%M:%S")." 的授權碼。","login.php",0);
					}else{
						if ( $re["acceptsn"] != $_REQUEST["f_acceptsn"] ){
							//儲存ip_log
							$SQL  = "Insert Into limit_ip(ip, singlename, branch, single, singlelv, times, errmsg) Values ( '";
							$SQL .= SqlFilter($myip,"str")."',";
							$SQL .= "'".SqlFilter($_SESSION["pname"],"str")."',";
							$SQL .= "'".SqlFilter($_SESSION["branch"],"str")."',";
							$SQL .= "'".SqlFilter($_SESSION["MM_Username"],"str")."',";
							$SQL .= "'".SqlFilter($_SESSION["MM_UserAuthorization"],"str")."',";
							$SQL .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
							$SQL .= "'授權碼錯誤')";
							$rs = $SPConn->prepare($SQL);
							$rs->execute(); 
							call_alert("授權碼錯誤","login.php",0);
						}
						$an = $re["auton"];
						$_SESSION["acceptsn_date"] = strftime("%Y/%m/%d %H:%M:%S");
						$isacceptsn = 1;
					}
					
					$accept_login = 1;
					$SQL = "Select Top 3 * From limit_ip Where single='".$_SESSION["MM_Username"]."' Order By times Desc";
					$rs = $SPConn->prepare($SQL);
					$rs->execute();
					$result=$rs->fetchAll(PDO::FETCH_ASSOC);
					if ( count($result) > 0 ){
						foreach($result as $re){
							$lastip = $lastip.$re["ip"]."-".$re["times"]."<br>";
						}
						$_SESSION["lastip"] = $lastip;
					}
					
					//update
					if ( $an != "" ){
						$SQL  = "Update limit_ip Set ";
						$SQL .= "ip='".$myip."',";
						$SQL .= "single='".$_SESSION["MM_Username"]."',";
						$SQL .= "singlelv='".$_SESSION["MM_UserAuthorization"]."',";
						$SQL .= "singlename='".$_SESSION["pname"]."',";
						$SQL .= "branch='".$_SESSION["branch"]."',";
						$SQL .= "times='".strftime("%Y/%m/%d %H:%M:%S")."' ";
						$SQL .= "Where auton=".$an."";
						$rs = $SPConn->prepare($SQL);
						$rs->execute();
					}
				}
			}
		}
	}
	
	if ( $accept_login == 0 ){
		$SQL = "Select Top 3 * From limit_ip Where single='".$_SESSION["MM_Username"]."' Order By times Desc";
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result=$rs->fetchAll(PDO::FETCH_ASSOC);
		if ( count($result) > 0 ){
			foreach($result as $re){
				$lastip = $lastip.$re["ip"]."-".$re["times"]."<br>";
			}
			$_SESSION["lastip"] = $lastip;
		}
		
		//儲存ip_log
		$SQL  = "Insert Into limit_ip(ip, single, singlelv, singlename, branch, times) Values ( '";
		$SQL .= SqlFilter($myip,"str")."',";
		$SQL .= "'".SqlFilter($_SESSION["MM_Username"],"str")."',";
		$SQL .= "'".SqlFilter($_SESSION["MM_UserAuthorization"],"str")."',";
		$SQL .= "'".SqlFilter($_SESSION["pname"],"str")."',";
		$SQL .= "'".SqlFilter($_SESSION["branch"],"str")."',";
		$SQL .= "'".strftime("%Y/%m/%d %H:%M:%S")."')";
		$rs1 = $SPConn->prepare($SQL);
		$rs1->execute(); 
		$limit_ip_an = $re["auton"];
	}
	
	//總管理處IP
	if ( $myip == "60.250.92.145" ){
		if ( $lastlogintime != "" || is_null($lastlogintime) ){ $lastlogintime = date("Y-m-d",strtotime("-1 day",strtotime(date("Y-m-d")))); }
		$date1 = date("d",strtotime($lastlogintime));
		$date2 = date("d");
		
		if ( $date2 - $date1 > 0 ){
			$SQL = "Update personnel_data Set lastlogintime='".strftime("%Y/%m/%d %H:%M:%S")."' Where p_user='".$p_user."'";
			$rs = $SPConn->prepare($SQL);
			$rs->execute();
			//更新第一次登入的值
			if ( $limit_ip_an != "" ){
				$SQL = "Update personnel_data Set first_login=1 Where auton=".$limit_ip_an."";
				$rs = $SPConn->prepare($SQL);
				$rs->execute();
			}
		}
	}
	
	//原為function updatemyreservation(),因有問題所以把function判斷移出
	
	if ( $_SESSION["MM_Username"] != "" ){ //登入中  	
		//$singleid = "E223522640"; //測試用
		$singleid = $_SESSION["MM_Username"];
		setcookie("reservation_alert","","","");
		$SQL = "Select Distinct log_6_time From log_data Where log_single='".$singleid."' And ((log_6 <> '' Or Not log_6 is null) And datediff(n, getdate(), log_6_time) >= 0 and datediff(d, getdate(), log_6_time) = 0) order by log_6_time asc";
		$rs = $SPConn->prepare($SQL);
		$rs->execute();
		$result=$rs->fetchAll(PDO::FETCH_ASSOC);
		if ( count($result) > 0 ){ // Not Eof
			foreach($result as $re){ //先取出當日的所有不重復時段
				//再取出各時段中的名稱
				$log_6_time = $re["log_6_time"];
				$SQL = "Select log_username From log_data Where log_single='".$singleid."' And ((log_6 <> '' or not log_6 is null) And datediff(n, '".date("Y-m-d H:s",strtotime($log_6_time))."', log_6_time) = 0) order by log_6_time asc";
				$rs1 = $SPConn->prepare($SQL);
				$rs1->execute();
				$result1=$rs1->fetchAll(PDO::FETCH_ASSOC);
				if ( count($result1) > 0 ){ // Not Eof
					foreach($result1 as $re1){ //先取出當日的所有不重復時段
						$log_username = $log_username.",".$re1["log_username"];
					}
				}
				$log_username = clear_left_par($log_username, ",");
				$reservation_alert_str = $reservation_alert_str."|o|".$log_6_time."|a|".$log_username;  		
			}
			$reservation_alert_str = clear_left_par($reservation_alert_str, "|o|");
			if ( $reservation_alert_str != "" ){ //寫入 cookie
				$reservation_alert_str = str_replace(" ", "|s|", $reservation_alert_str); //轉換空格
				setcookie("reservation_alert",$reservation_alert_str,time()+86400); //期限一天 86400秒
			}
		}
	}
	
	if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "manager" || $_SESSION["MM_UserAuthorization"] == "love_manager"){
		header('Location:index.php');
	}elseif( $_SESSION["MM_UserAuthorization"] == "single" ){
		header('Location:index.php');
	}elseif ( $_SESSION["MM_UserAuthorization"] == "pay" ){
		header('Location:index.php');
	}elseif ( $_SESSION["MM_UserAuthorization"] == "action" ){
		header('Location:index.php');
	}elseif ( $_SESSION["MM_UserAuthorization"] == "keyin" ){
		header('Location:ad_keyin_index.php');
	}elseif ( $_SESSION["MM_UserAuthorization"] == "count" ){
		header('Location:ad_count_index.php');
	}elseif ( $_SESSION["MM_UserAuthorization"] == "teacher" ){
		header('Location:ad_teacher_index.php');
	}elseif ( $_SESSION["branch"] == "好好玩旅行社" ){
		header('Location:ad_fun_mem.php');
	}
?>