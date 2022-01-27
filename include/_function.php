<?php
	//代碼轉換姓名
	/*function singlename($sn){
		if ( $sn == "" || empty($sn) == true ){
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
	
	//代碼轉換姓名_real
	function SingleName_real($sn){
		$SPConn1 = SPConOpen();
		if ( $sn == "" || is_null($sn) == 1 ){
			$SingleName_real = "不明";
		}else{
			$SQL_real = "Select p_name, p_other_name From personnel_data Where p_user='".$sn."' Order By p_work Desc";
			$rs_real = $SPConn1->prepare($SQL_real);
			$rs_real->execute();
			$result_real=$rs_real->fetchAll(PDO::FETCH_ASSOC);
			foreach($result_real as $re_real);
			if ( count($result_real) == 0 ){		
				$SingleName_real == "不明-".$sn;
			}else{
				$SingleName_real = $re_real["p_name"];
				if ( $SingleName_real == "" ){ $SingleName_real = $re_real["p_other_name"];}
			}
		}
		return $SingleName_real;
	}*/
	
	function SingleName($sn,$type){ 
		$SPConn3 = SPConOpen();
		switch ($type){
			case "normal":
				if ( $sn == "" || empty($sn) == true ){
					$SingleName = "不明";
				}else{
					$SQL = "Select p_other_name From personnel_data Where p_user='".$sn."' Order By p_work Desc";
					$rs = $SPConn3->prepare($SQL);
					$rs->execute();
					$result=$rs->fetchAll(PDO::FETCH_ASSOC);
					foreach( $result as $re );
						if ( count($result) == 0 ){
							$SingleName = "不明-".$sn;
						}else{
							$SingleName = $re["p_other_name"];
					}
				}
				break;
			case "real":
				if ( $sn == "" || is_null($sn) == 1 ){
					$SingleName = "不明";
				}else{
					$SQL = "Select p_name, p_other_name From personnel_data Where p_user='".$sn."' Order By p_work Desc";
					$rs = $SPConn3->prepare($SQL);
					$rs->execute();
					$result=$rs->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $re);
					if ( count($result) == 0 ){		
						$SingleName = "不明-".$sn;
					}else{
						$SingleName = $re["p_name"];
						if ( $SingleName == "" ){ $SingleName = $re["p_other_name"];}
					}
				}
				break;
			case "auto":
				if ( $sn == "" || is_null($sn) == 1 ){
					$SingleName = "不明";
				}else{
					$SQL = "SELECT p_branch, p_other_name FROM personnel_data Where p_auto='".$sn."' order by p_work desc";
					$rs = $SPConn3->prepare($SQL);
					$rs->execute();
					$result=$rs->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $re);				
					if ( count($result) == 0 ){	
						$SingleName = "不明-無此編號";							
					}else{
						$SingleName = $re["p_branch"]. "-" .$re["p_other_name"];
					}
				}
				break;
			case "ch":
				if ( $sn == "" || is_null($sn) == 1 ){
					$SingleName = "不明";
				}else{
					$SQL = "SELECT name FROM b2b_manager Where uid='".$sn."'";
					$rs = $SPConn3->prepare($SQL);
					$rs->execute();
					$result=$rs->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $re);
					if ( count($result) == 0 ){		
						$SingleName = "不明-無此編號";
					}else{
						$SingleName = $re["name"];
					}
				}
				break;				
		}
		return $SingleName;
	}

	//取得回報數量
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
			$result_grn = $rs_grn->fetchAll(PDO::FETCH_ASSOC);
			if ( count($result_grn) == 0 ){
				$gresult = "0|+|無|+|無|+|NULL";
			}else{
				$c = 0;
				foreach($result_grn as $re_grn){
					$c++;
					if ( $c == 1 ){
						$gresult = count($result_grn)."|+|".$re_grn["log_4"]."|+|".$re_grn["log_2"]."|+|".$re_grn["log_time"];
					}
				}
			}
			
		}
		return $gresult;
	}
	
	//彈跳訊息
	function call_alert( $msg, $url, $outtime ){
		switch($url){			
			case 0:
				echo "<script language=\"javascript\">" ;
				echo "alert('" . $msg ."');";
				echo "window.setTimeout(location.href='history.back(1)'," . $outtime .");";
				echo "</script>" ;
				break;
			case "ClOsE":
				echo "<script language='JavaScript'>";
				if( $msg != "" ){
					echo "alert('" .$msg. "');";
				}
				echo "window.setTimeout('window.close();');";	
				echo "</script>";
				break;
			case "UpLoAd":
				echo "<script language='javascript1.2'>";
				echo "alert('" .$msg. "');opener.window.location.reload();window.setTimeout('window.close();');";
				echo "</script>";
				break;
			case "Reload":
				echo "<script language='javascript1.2'>";
				echo "window.location.reload();";
				echo "</script>";
				break;
			default:
				echo "<script language=\"javascript\">" ;
				echo "alert('" . $msg ."');";
				if ( $url != "" && is_string($url)){
					echo "window.setTimeout(location.href='" . $url . "'," . $outtime .");";
				}else {
					echo "window.setTimeout(location.href='history.back(1)'," . $outtime .");";
				}
				echo "</script>" ;
				break;
		}
		// exit();
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
	function updatemyreservation(){
		if ( $_SESSION["MM_Username"] != "" ){ //'登入中
			//$singleid = "E223522640"; maybe測試用的
			$singleid = $_SESSION["MM_Username"];
			setcookie("reservation_alert","",time()+3600); //建立cookie
			$SQL = "Select Distinct log_6_time From log_data Where log_single='".$singleid."' And ((log_6 <> '' Or Not log_6 Is Null) And datediff(n, getdate(), log_6_time) >= 0 And datediff(d, getdate(), log_6_time) = 0) Order By log_6_time Asc";
			$rs = $SPConn2->prepare($SQL);
			$rs->execute();
			$result=$rs->fetchAll(PDO::FETCH_ASSOC);
			if ( count($result) > 0 ){
				foreach($result as $re){ //先取出當日的所有不重復時段
					//再取出各時段中的名稱
					$log_6_time = chtime($re["log_6_time"]);
					$SQL2 = "Select log_username From log_data where log_single='".$singleid."' And ((log_6 <> '' Or Not log_6 is null) And datediff(n, '".$log_6_time."', log_6_time) = 0) Order By log_6_time Asc";
					$rs2 = $SPConn->prepare($SQL2);
					$rs2->execute();
					$result2=$rs2->fetchAll(PDO::FETCH_ASSOC);
					if ( count($result2) > 0 ){
						foreach($result2 as $re2){
							$log_username = $log_username.",".$re2["log_username"];
						}
					}
					$log_username = clear_left_par($log_username, ",");
					$reservation_alert_str = $reservation_alert_str."|o|".$log_6_time."|a|".$log_username;
				}
				$reservation_alert_str = clear_left_par($reservation_alert_str, "|o|");
				
				if ( $reservation_alert_str != "" ){ //寫入 cookie
					$reservation_alert_str = str_replace(" ", "|s|", $reservation_alert_str); //轉換空格
					//reservation_alert_str = replace(reservation_alert_str, "2018-08-30|s|17:00", "2018-08-30|s|14:37") //test
					setcookie( "reservation_alert",$reservation_alert_str,date("Y/m/d",strtotime("+1 day")) ); //期限一天
				}
			}
		}
	}

	function chtime($thetime){
		if ( chkDate($thetime) ){
			$thetimes = date("Y-d-m H:m:i");
			$chtime = date("Y",$thetimes)."-".date("m",$thetimes)."-".date("d",$thetimes)." ".date("H",$thetimes).":".date("m",$thetimes);
		}else{
			$chtime = $thetime;
		}
		return $chtime;
	}
	
	//原程式
	function clear_left_par($t, $n){
		if ( $t != "" ){
			$nx = strlen($n);
			if ( substr($t, 0, $nx) == strval($n) ){
				$t = substr($t, -(strlen($t)-$nx));
			}
		}
		return $t;
	}

	//驗證字串是否為日期格式
	function chkDate($str){
		if (!isset($str) || $str==""){
			return false;
		}
		if ( stristr($str,"-") ){
			list($yy,$mm,$dd)=explode("-",$str); }
		if ( stristr($str,"/") ){
			list($yy,$mm,$dd)=explode("/",$str); }
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
					$reDate = date("Y-m-d H:i:s",strtotime($dtDate));
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
	
	//轉換日期(上午.下午)不含日期
	function changeTime($chDate){
		$xDate = strtotime($chDate);
		if ( date("H",$xDate) >= 12  ){
			$cTime = "下午 ".date("h:i:s",$xDate);
		}else{
			$cTime = "上午 ".date("h:i:s",$xDate);
		}
		return $cTime;
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
	
	//刪除檔案
	function DelFile($sFileName){
		//參數意義：檔案名稱
		//判斷檔案是否存在
		if(is_file($sFileName)){
			unlink($sFileName);
		}
	}
	
	//轉換會員級別中文名稱
	function num_lv($n){
		switch ($n){
			case "1":
				$num_lv = "資料認證會員";
				break;
			case "2":
				$num_lv = "真人認證會員";
				break;
			case "3":
				$num_lv = "璀璨會員-一年期";
				break;
			case "4":
				$num_lv = "璀璨VIP會員-一年期";
				break;
			case "5":
				$num_lv = "璀璨會員-二年期";
				break;
			case "6":
				$num_lv = "璀璨VIP會員-二年期";
				break;
			case "10":
				$num_lv = "菁英專案-三個月";
				break;
			case "11":
				$num_lv = "菁英專案-六個月";
				break;
			default:
				$num_lv = "網站會員";
				break;
		}
		return $num_lv;
	}
	
	//不知用途,舊有程式
	function mem_detail_menu($n, $mb1, $mb2){  
		$showfull = 0;
		if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" || $_SESSION["MM_UserAuthorization"] == "pay" ){
			$ad_mem_fix_url = "ad_mem_fix.asp?mem_num=".$mem_num.$islovepages;
			$showfull = 1;
		}elseif ( $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
			$ad_mem_fix_url = "ad_mem_fix_love.asp?mem_num=".$mem_num.islovepages;
			if ( $mb1 == $_SESSION["branch"] || $mb2 == $_SESSION["branch"] ){
				$showfull = 1;
			}
			$islovepages = "&love=1";
		}else{
			$showfull = 1;
		}
		return $showfull;
	}
	
	// 參數解釋
	// $string： 明文 或 密文
	// $operation：DECODE表示解密,其它表示加密
	// $key： 密匙
	// $expiry：密文有效期
	function Authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
		if( $operation == 'DECODE') $string=str_replace(array("-","_"), array('+','/'),$string);
		$ckey_length = 4;
		$key = md5($key ? $key : $GLOBALS['discuz_auth_key']);
		$keya = md5(substr($key, 0, 16));
		$keyb = md5(substr($key, 16, 16));
		$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';
		$cryptkey = $keya.md5($keya.$keyc);
		$key_length = strlen($cryptkey);
		$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
		$string_length = strlen($string);
		$result = '';
		$box = range(0, 255);
		$rndkey = array();
		for($i = 0; $i <= 255; $i++) {
			$rndkey[$i] = ord($cryptkey[$i % $key_length]);
		}
		for($j = $i = 0; $i < 256; $i++) {
			$j = ($j + $box[$i] + $rndkey[$i]) % 256;
			$tmp = $box[$i];
			$box[$i] = $box[$j];
			$box[$j] = $tmp;
		}
		for($a = $j = $i = 0; $i < $string_length; $i++) {
			$a = ($a + 1) % 256;
			$j = ($j + $box[$a]) % 256;
			$tmp = $box[$a];
			$box[$a] = $box[$j];
			$box[$j] = $tmp;
			$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
		}
		if($operation == 'DECODE') {
			if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
				return substr($result, 26);
			} else {
				return '';
			}
		} else {
			return $keyc.str_replace(array("=","+","/"), array('','-','_'), base64_encode($result));
		}
	}
	
	//身材顯示
	function wetstrreplace($t){
		if ( $t == "偏瘦" ){ $t = $t."(<18)";}
		if ( $t == "中等" ){ $t = $t."(18.1~24)";}
		if ( $t == "偏肉" ){ $t = $t."(>24)";}
		return $t;
	}
	
	$all_branchs_arr = Array("台北", "桃園", "新竹", "台中", "台南", "高雄", "八德", "約專", "迷你約", "總管理處", "好好玩旅行社");
	function num_branch($num){
		global $all_branchs_arr;
		$num_branchnum = $num-1;
		if ( $num_branchnum < 0 || $num_branchnum > count($all_branchs_arr) ){
			$num_branch = "err";
		}else{
			$num_branch = $all_branchs_arr[$num_branchnum];
		}
		return $num_branch;
	}
	
	//權限檢查
	function check_page_power($page){
		$mypowers = $_SESSION["page_powers"];
		if ( $mypowers != "" ){
			if ( in_array($page, $mypowers) ){ call_alert("您沒有查看此頁的權限。",0,0);}
		}
	}

	//清除Html Code
	function RemoveHTML($Contents){
		$txt = preg_replace('/<[^>]*>/', '', $Contents);
		$txt = str_ireplace("\r\n","",$txt);
		//$txt=str_ireplace(" ","",$txt);
		return $txt;
	}


	//狀態文字 for ad_custom_complaint.php
	function custom_complaint_stats($t){
    	switch ($t){
    		case 0:
				$custom_complaint_stats = "處理中";
				break;
    		case 1:
				//
				break;
    		case 2:
    	  		$custom_complaint_stats = "結案";
			  	break;
			default:
      			$custom_complaint_stats = "不明";
				break;
		}
		return $custom_complaint_stats;
	}

	//新增記錄到資料庫 for ad_custom_complaint_add.php
	function addreport($mname, $num, $fid, $mobile, $types, $txt){
		$SPConn2 = SPConOpen();
  		if ( $_SESSION["MM_Username"] != "" ){
			$SQL_i  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, log_4, log_5) Values ('";
			$SQL_i .= strftime("%Y/%m/%d %H:%M:%S")."',";
			$SQL_i .= $num.",";
			$SQL_i .= "'".$fid."',";
			$SQL_i .= "'".$mname."',";
			$SQL_i .= "'".$_SESSION["p_other_name"]."',";
			$SQL_i .= "'".$_SESSION["branch"]."',";
			$SQL_i .= "'".$_SESSION["MM_Username"]."',";
			$SQL_i .= "'".$mobile."',";
			$SQL_i .= "'".$types."',";
			$SQL_i .= "'".$txt."',";
			$SQL_i .= "'system')";
			$rs_i = $SPConn2->prepare($SQL_i);
			$rs_i->execute();
		}
	}
	
	// 格式化數字(全形→半形)
	function reset_number($n){
		if( $n != ""){
			$n = trim(str_replace("-", "", $n));
			$n = str_replace("_", "", $n);
			$n = str_replace("'", "", $n);
			$n = str_replace("０", "0", $n);
			$n = str_replace("１", "1", $n);
			$n = str_replace("２", "2", $n);
			$n = str_replace("３", "3", $n);
			$n = str_replace("４", "4", $n);
			$n = str_replace("５", "5", $n);
			$n = str_replace("６", "6", $n);
			$n = str_replace("７", "7", $n);
			$n = str_replace("８", "8", $n);
			$n = str_replace("９", "9", $n);
		}
		return $n;
	}

	//轉址
	function reURL( $rurl ){
		echo "<script language=\"javascript\">" ;
		echo "window.location.href = '".$rurl."'";
		echo "</script>" ;
	}

	// 去除字串的特殊符號(, . ")
	function fixtext($strs){
        if($strs != ""){
            $strs = str_replace(" ", "", $strs);
            $strs = str_replace(",", "", $strs);
            $strs = str_replace(".", "", $strs);
            $strs = str_replace("\"", "", $strs);
        }
        return $strs;
    }
    
	// 推廣來源
    function chk_cc($cc, $mm, $lc){
        if($cc != ""){
            if(explode("-",$cc)[0] == "sale"){
                $sales = fixtext(explode("-",$cc)[1]);
                $mem_cc_single = SingleName($sales, "auto");
                if( strpos($mem_cc_single,"不明")> 0){
                    $cc = "推廣：" .$mem_cc_single. "&nbsp;<a href='#r' onclick=\"Mars_popup('ad_no_mem.asp?st=mem_cc_fix&mem_num=" .$mm. "','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=300,height=150,top=10,left=10');\">修正</a>";
                }else{
                    $cc = "推廣：" .$mem_cc_single;
                }                
            }
			$cc = " [" .$cc. "]";  					    
        }else{
			$cc = "";
		}
		if($lc != ""){
			$cc = $cc. " [lc:".$lc."]";
		}
        return $cc;
    }

	// 把REQUEST轉成字串
	function requestStr(){		
		if($_REQUEST){
			$requestStr = "";
			foreach($_REQUEST as $key => $value){
				$requestStr = $requestStr . "&" . $key . "=" .$value;
			}
		}else{
			$requestStr = "";
		}
		return $requestStr;
	}

	// 好好玩處理情形下拉選單
	function fun_report_option(){
		$alloptions = Array("請選擇","有意願","無意願","下次聯絡","未接","停話","PASS春天","勿再聯絡");
		foreach($alloptions as $opt){
			if($opt == "請選擇"){
				$opt1 = "";
			}else{
				$opt1 = $opt;
			}
			echo "<option value='".$opt1."'>".$opt."</option>";
		}
	}

	//茶券名稱
	function teacoupon_types($t){
    	switch ($t){
    		case "free":
    	  		$teacoupon_types = "免費茶卷";
				break;
    		case "normal":
    	  		$teacoupon_types = "付費茶卷";
				break;
      		default:
      			$teacoupon_types = "不明";
				break;
		}
	}

	//取得各會館名稱陣列
	function get_branch($not){
		$notIn = str_replace(",", "','", $not);
		$SQL = "Select * From branch_data Where admin_name Not In ('".$notIn."') Order By admin_sort Desc";
		$SPConn2 = SPConOpen();
		$rs = $SPConn2->prepare($SQL);
		$rs->execute();
		$result=$rs->fetchAll(PDO::FETCH_ASSOC);
		$branch_name = "";
		foreach($result as $re){
			$branch_name = $re["admin_name"].",".$branch_name;
		}

		return $branch_name;
	}

	//日期區間文字顏色 for 會員排約時間 / 排約部系統
	function daycolor($n){
  		if ( $n > 1 && $n < 8 ){
			$daycolor = "<font color='#5CC6F5'>".$n." day</font>";
		}

		if ( $n > 9 && $n < 30 ){
			$daycolor = "<font color='#7F00DB'>".$n." day</font>";
		}

		if ( $n >= 30 ){
			$daycolor = "<font color='#009900'>".$n." day</font>";
		}

		if ( $n >= 60 ){
			$daycolor = "<font color='#ffcc33'>".$n." day</font>";
		}

		if ( $n >= 180 ){
			$daycolor = "<font color='#990000'>".$n." day</font>";
		}

		return $daycolor;
	}

	//取得卡別
	function get_card($ano){
		$SQL = "Select * From card_type Where card_no = '".$ano."'";
		$SPConn2 = SPConOpen();
		$rs = $SPConn2->prepare($SQL);
		$rs->execute();
		$result = $rs->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $re);
		$card_name = $re["card_name"];

		return $card_name;
	}

	function sysmsg($mnum, $msg, $url){
		//新增
		$SPConn2 = SPConOpen();
		$SQL_i  = "Insert Into si_sysmsg(mnum, msg, url) Values ( '";
		$SQL_i .= SqlFilter($mnum,"tab")."',";
		$SQL_i .= "'".SqlFilter($msg,"tab")."',";
		$SQL_i .= "'".SqlFilter($url,"tab")."')";
		$rs_i = $SPConn2->prepare($SQL_i);
		$rs_i->execute();
	}

	//取得星期幾
	function weekchinesename($n){
        switch($n){
            case 1:
                return "一";
                break;
            case 2:
                return "二";
                break;
            case 3:
                return "三";
                break;
            case 4:
                return "四";
                break;
            case 5:
                return "五";
                break;
            case 6:
                return "六";
                break;
            case 0:
                return "日";
                break;
            default:
                return "不明";
        }
    }

	// 職等
	function joblv($lv,$a){
		switch($lv){
			case "admin":
				return "總管理者";
				break;
			case "paytop":
				return "會計主任";
				break;
			case "actiontop":
				return "活動主任";
				break;
			case "branch":
				return "會館督導";
				break;
			case "manager":
				return "經理";
				break;
			case "love_manager":
				return "服務部經理";
				break;
			case "single":
				return "秘書";
				break;
			case "action":
				if($a == 1){
					return "南區企劃經理";
				}elseif($a == 2){
					return "北區企劃經理";
				}elseif($a == 3){
					return "企劃總監";
				}else{
					return "企劃";
				}				
				break;
			case "love":
				return "排約部";
				break;
			case "pay":
				return "會計部";
				break;
			case "keyin":
				return "資料輸入";
				break;
			case "count":
				return "數據統計";
				break;
			case "teacher":
				return "講師";
				break;
			default:
				return "不明";
		}
	}

	//檢查身份證字號
	function Checkid($id){
		$id = strtoupper($id);
		//建立字母分數陣列
		$headPoint = array(
			'A'=>1,'I'=>39,'O'=>48,'B'=>10,'C'=>19,'D'=>28,
			'E'=>37,'F'=>46,'G'=>55,'H'=>64,'J'=>73,'K'=>82,
			'L'=>2,'M'=>11,'N'=>20,'P'=>29,'Q'=>38,'R'=>47,
			'S'=>56,'T'=>65,'U'=>74,'V'=>83,'W'=>21,'X'=>3,
			'Y'=>12,'Z'=>30
		);
		//建立加權基數陣列
		$multiply = array(8,7,6,5,4,3,2,1);
		//檢查身份字格式是否正確
		if (ereg("^[a-zA-Z][1-2][0-9]+$",$id) AND strlen($id) == 10 AND $id != 'A123456789'){
			//切開字串
			$len = strlen($id);
			for($i=0; $i<$len; $i++){
				$stringArray[$i] = substr($id,$i,1);
			}
			//取得字母分數
			$total = $headPoint[array_shift($stringArray)];
			//取得比對碼
			$point = array_pop($stringArray);
			//取得數字分數
			$len = count($stringArray);
			for($j=0; $j<$len; $j++){
				$total += $stringArray[$j]*$multiply[$j];
			}
			//計算餘數碼並比對
			$last = (($total%10) == 0 )?0:(10-($total%10));
			if ($last != $point) {
				return false;
			} else {
				return true;
			}
		}  else {
		return false;
		}
	}

	//轉字串
	function chstr($n){
		if ( $n != "" ){
			$chstr = strval($n);
		}else{
			$chstr = "";

		}
		return $chstr;
	}

	//判斷手機號碼
	function chk_mobile($m){
    	$chk_mobile_result = "";
    	if ( $m != "" && strlen($m) == 10 ){
			$m = trim(str_replace(" ", "", $m));
			$m = str_replace("-", "", $m);
			$m = str_replace("_", "", $m);
			$m = str_replace("'", "", $m); 
			$m = str_replace("０", "0", $m );
			$m = str_replace("１", "1", $m );
			$m = str_replace("２", "2", $m );
			$m = str_replace("３", "3", $m );
			$m = str_replace("４", "4", $m );
			$m = str_replace("５", "5", $m );
			$m = str_replace("６", "6", $m );
			$m = str_replace("７", "7", $m );
			$m = str_replace("８", "8", $m );
			$m = str_replace("９", "9", $m );
			$chk_mobile_result = $m;
		}
	  	if ( $chk_mobile_result != "" ){
	  		$chk_mobile = $chk_mobile_result;
		}else{
	  		$chk_mobile = "";
		}
		return $chk_mobile;
	}

	//排約狀態	
	function invite_stats($b){
		switch ($b){
			case 0:
				$invite_stats = "等待回報";
				break;
			case 1:
				$invite_stats = "成功";
				break;
			case 2:
				$invite_stats = "主約人改期";
				break;
  			case 3:
				$invite_stats = "主約人取消";
				break;
  			case 4:
				$invite_stats = "主約人未到";
				break;
			case 5:
				$invite_stats = "排約對象未到";
				break;
  			case 6:
				$invite_stats = "排約對象改期";
				break;
  			case 7:
				$invite_stats = "排約對象取消";
				break;
  			default:
  				$invite_stats = "";
		}
		return $invite_stats;
	}
?>