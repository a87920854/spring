<?php

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
?>