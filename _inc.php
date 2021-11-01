<?php
ini_set('session.gc_maxlifetime', 1800);	//session時間
session_start();	//啟動 session
//------------------------------------------------------------------------
header("Cache-control: private");
header('Content-type: text/html; charset=utf-8');
//------------------------------------------------------------------------
error_reporting(E_ALL ^ E_NOTICE);//忽略提醒
date_default_timezone_set('Asia/Taipei');
	
require_once(dirname(__FILE__)."/include/_conn.php");//引入文件
	
//設定常態文字
$txt_add = "新增";
$txt_edit = "修改";
$txt_del = "刪除";
$txt_list = "列表";
	
//SESSION登入時間判斷
if ( $action != "login" ){
	if ( $_SESSION["MM_Username"] == "" ){
		echo "<script language=\"javascript\">" ;
		echo "alert('請重新登入');";
		echo "location.href='login.php';";
		echo "</script>";
		exit;
	}
	}
?>