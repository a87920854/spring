<?php
	//代碼轉換姓名
	function singlename($sn){
		if ( $sn == "" || is_null($sn) == true ){
			$SingleName = "不明";
		}else{
			$SPConn2 = SPConOpen();
			$SQL = "Select p_other_name From personnel_data Where p_user='".$sn."' Order By p_work Desc";
			$sn_rs = $SPConn2->prepare($SQL);
			$sn_rs->execute();
			$sn_result=$sn_rs->fetchAll(PDO::FETCH_ASSOC);
			foreach( $sn_result as $sn_re );
			if ( count($sn_result) == 0 ){
				$SingleName = "不明-".$sn;
			}else{
				$SingleName = $sn_re["p_other_name"];
			}
		}
		return $SingleName;
	}
	
	//??
	function get_report_num($mobile){
		$gresult = 0;
		$SPConn1 = SPConOpen();
		if ( $mobile != "" ){
			if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
				$report_sql1 = "Select count(log_auto) As r From log_data Where log_1 ='".$mobile."'";
				$report_sql2 = "Select log_time, log_2, log_4 From log_data Where log_1 ='".$mobile."' Order By log_auto Desc";
			}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" ){
				$report_sql1 = "Select count(log_auto) As r From log_data Where log_1 ='".$mobile."' And log_branch='".$_SESSION["branch"]."'";
				$report_sql2 = "Select log_time, log_2, log_4 From log_data Where log_1 ='".$mobile."' And log_branch='".$_SESSION["branch"]."' Order By log_auto Desc";
			}elseif ( $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
				$rbranch = $_SESSION["lovebranch"];
				$rbranch1 = str_replace($rbranch, ",", "','");
				$report_sql1 = "Select count(log_auto) As r FROM log_data Where log_1 ='".$mobile."' And log_branch in ('".$rbranch1."')";
				$report_sql2 = "Select log_time, log_2, log_4 FROM log_data Where log_1 ='".$mobile."' And log_branch in ('".$rbranch1."') Order By log_auto Desc";
			}else{
			   $report_sql1 = "Select count(log_auto) As r From log_data Where log_1 ='".$mobile."' And ((log_single = '".$_SESSION["MM_Username"]."') or (log_branch='".$_SESSION["branch"]."' And log_service=1))";
			   $report_sql2 = "Select log_time, log_2, log_4 From log_data Where log_1 ='".$mobile."' And ((log_single = '".$_SESSION["MM_Username"]."') or (log_branch='".$_SESSION["branch"]."' And log_service=1)) Order By log_auto Desc";
			}
			$rs_grn = $SPConn1->prepare($report_sql2);
			$rs_grn->execute();
			$result_grn=$rs_grn->fetchAll(PDO::FETCH_ASSOC);
			foreach($result_grn as $re_grn);
			if ( count($result_grn) == 0 ){
				$gresult = "0|+|無|+|無|+|NULL";
			}else{
				$gresult = count($result_grn)."|+|".$re_grn["log_4"]."|+|".$re_grn["log_2"]."|+|".$re_grn["log_time"];
			}
			
		}
		return $gresult;
	}
	
	//彈跳訊息
	function call_alert( $msg, $url, $outtime ){
		echo "<script language=\"javascript\">" ;
		echo "alert('" . $msg ."');" ;
		echo "location.href='" . $url . "';" ;
		echo "</script>" ;
		exit() ;
	}
	
	function SqlFilter($content,$strType){
		//函數功能：過濾字符參數中的單引號，對於數字參數進行判斷，如果不是數值類型，則賦值-1
		//參數意義：str        ---- 要過濾的參數
		// strType ---- 參數類型，分為字符型和數字型，字符型為"str"，數字型為"int"
		$strTmp = '';
		switch($strType){
			case "str" :
				if (is_string($content) || is_numeric($content)){
					//$conn = sql_conn();
					$strTmp = xss_clean($content);
					$strTmp = htmlspecialchars($strTmp,ENT_QUOTES);
					//$strTmp = mysqli_real_escape_string($conn,$strTmp);
					$strTmp = xssafe($strTmp);
				}
				break;
			case "tab" :
				if (is_string($content) || is_numeric($content)){			
				$strTmp = Trim($content);
				$strTmp = str_ireplace("\\", "\\\\", $strTmp);
				$strTmp = str_ireplace("'", "\'", $strTmp);
				// Remove javascript: and vbscript: protocols
				$strTmp = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $strTmp);
				$strTmp = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $strTmp);
				$strTmp = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $strTmp);			
				}
				break;
			case "int" :
				if (!is_numeric($content)|| empty($content)){
					$strTmp = 0;
				}Else{
					$strTmp = $content;
				}
				break;
		}	
		return $strTmp;
	}
	
	//SqlFilter用
	function xss_clean($data)	{
		// Fix &entity\n;
		$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
		$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
		$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
		$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

		// Remove any attribute starting with "on" or xmlns
		$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

		// Remove javascript: and vbscript: protocols
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

		// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

		// Remove namespaced elements (we do not need them)
		$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

		do
		{
			// Remove really unwanted tags
			$old_data = $data;
			$data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
		}
		while ($old_data !== $data);

		// we are done...
		return $data;
	}
	
	
	//SqlFilter用
	function xssafe($data,$encoding='UTF-8'){
	   return htmlspecialchars($data,ENT_QUOTES | ENT_HTML401,$encoding);
	}
	
	//判斷IP
	function sysgetrealip(){
		$sysgetrealip = $_SERVER["REMOTE_ADDR"];
		return $sysgetrealip; 
	}
	
	//判斷IP/阻擋IP
	function member_array($list,$cc){
		if ( $list == "" ){
			$member_array = 0;
		}
		$member_array = 0;
		$output = explode(",", $list);
		if ( in_array($cc,$output) ) {
			$member_array = 1;
		}
		return $member_array; 
	}
	
	//登入有使用到的funcion，不知作用為何
	/*function updatemyreservation(){
		if ( $_SESSION["MM_Username"] != "" ){ //登入中  	
			//$singleid = "E223522640"; //測試用
			$singleid = $_SESSION["MM_Username"];
			//setcookie("reservation_alert","","","");
			//$SQL = "Select Distinct log_6_time From log_data Where log_single='".$singleid."' And ((log_6 <> '' Or Not log_6 is null) And datediff(n, getdate(), log_6_time) >= 0 and datediff(d, getdate(), log_6_time) = 0) order by log_6_time asc";
			$SQL = "Select top 10 * From log_data";
			$rsd = $SPConn->prepare($SQL);
			$rsd->execute();
			$resultd=$rsd->fetchAll(PDO::FETCH_ASSOC);
			echo "**";
			exit;
			/*if ( count($result) > 0 ){ // Not Eof
				foreach($result as $re){ //先取出當日的所有不重復時段
					//再取出各時段中的名稱
					$log_6_time = chtime($re["log_6_time"]);
					$SQL = "Select log_username From log_data Where log_single='".$singleid."' And ((log_6 <> '' or not log_6 is null) And datediff(n, '".$log_6_time."', log_6_time) = 0) order by log_6_time asc";
					$rs1 = $SPConn->prepare($SQL);
					$rs1->execute();
					$result1=$rs1->fetchAll(PDO::FETCH_ASSOC);
					if ( count($result1) > 0 ){ // Not Eof
						foreach($result1 as $re1){ //先取出當日的所有不重復時段
							$log_username = $log_username.",".$re2["log_username"];
						}
					}
					echo $log_username;
					exit;
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
	}*/

	function chtime($thetime){
		if ( chkDate($thetime) ){
			$thetimes = date("Y-d-m H:M:S");
			$chtime = date("Y",$thetimes)."-".date("M",$thetimes)."-".date("d",$thetimes)." ".date("H",$thetimes).":".date("M",$thetimes);
		}else{
			$chtime = $thetime;
		}
		return $chtime;
	}

	//驗證字串是否為日期格式
	function chkDate($str){
		if (!isset($str) || $str==""){
			return false;
		}
		if (stristr($str,"-"))
			list($yy,$mm,$dd)=explode("-",$str);
		if (stristr($str,"/"))
			list($yy,$mm,$dd)=explode("/",$str);
		if ($dd!="" && $mm!="" && $yy!=""){
			return checkdate($mm,$dd,$yy);
		}
		return false;
	}
	
	//英文日期格式(yyyy/mm/dd)
	function Date_EN($dtDate,$num){
		if (chkDate($dtDate)){
			switch ($num) {
			case 1:
				$reDate = date("Y/m/d",strtotime($dtDate));
				break;
			case 2:
				$reDate = date("Y-m-d",strtotime($dtDate));
				break;
			case 3:
				$reDate = date("Y.m.d",strtotime($dtDate));
				break;
			case 4:
				$reDate = date("d.m.Y",strtotime($dtDate));
				break;
			case 5:
				$reDate = date("Y/m/d H:i",strtotime($dtDate));
				break;
			case 6:
				$reDate = date("Y/m/d H:i:s",strtotime($dtDate));
				break;
			case 7:
				$reDate = date("Y.m.d H:i:s",strtotime($dtDate));
				break;
			case 8:
				$reDate = date("Y.m",strtotime($dtDate));
				break;
			case 9:
				$reDate = date("Y-m-d H:i",strtotime($dtDate));
				break;
			}
			return $reDate;
		}
	}
	
	//轉換日期(上午.下午)
	function changeDate($chDate){
		$xDate = strtotime($chDate);
		$cDate = date("Y/m/d",$xDate);
		if ( date("H",$xDate) >= 12  ){
			$cTime = " 下午 ".date("h:i:s",$xDate);
		}else{
			$cTime = " 上午 ".date("h:i:s",$xDate);
		}
		$cDate = $cDate.$cTime;
		return $cDate;
	}
	
	//將數字改為金額(3位一撇)
	function FormatCurrency($num){
		if ( is_numeric($num) ){
			$num = number_format($num);
		}else{
			$num = 0;
		}
		return $num;
	}
	
	//數值轉換月份文字
	function monthname($num){
		switch($num){
			Case 1:
				$strTxt = "一月";
				break;
			Case 2:
				$strTxt = "二月";
				break;
			Case 3:
				$strTxt = "三月";
				break;
			Case 4:
				$strTxt = "四月";
				break;
			Case 5:
				$strTxt = "五月";
				break;
			Case 6:
				$strTxt = "六月";
				break;
			Case 7:
				$strTxt = "七月";
				break;
			Case 8:
				$strTxt = "八月";
				break;
			Case 9:
				$strTxt = "九月";
				break;
			Case 10:
				$strTxt = "十月";
				break;
			Case 11:
				$strTxt = "十一月";
				break;
			Case 12:
				$strTxt = "十二月";
				break;
		}
		return $strTxt;
	}
?>