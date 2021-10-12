<?php
	//春天會館
	function SPConOpen(){
		try {
			$opt = array(
				PDO::ATTR_EMULATE_PREPARES => false            
				//PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
			);
			return new PDO("sqlsrv:server=127.0.0.1;Database=springclub", "lab", "lab22225988", $opt);
		} catch(PDOException $e) {
			//show error
			echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			exit;
		}
	}
	
	//好好玩旅行社
	function FunOpen(){
		try {
			$opt = array(
				PDO::ATTR_EMULATE_PREPARES => false            
				//PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
			);
			return new PDO("sqlsrv:server=127.0.0.1;Database=fundb", "lab", "lab22225988", $opt);
		} catch(PDOException $e) {
			//show error
			echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			exit;
		}
	}

	//跟我約會吧
	function DMNOpen(){
		try {
			$opt = array(
				PDO::ATTR_EMULATE_PREPARES => false            
				//PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
			);
			return new PDO("sqlsrv:server=127.0.0.1;Database=datemenow", "lab", "lab22225988", $opt);
		} catch(PDOException $e) {
			//show error
			echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			exit;
		}
	}
	
	//設定conn name
	$SPConn = SPConOpen();	//春天會館
	$FunConn = FunOpen();	//好好玩旅行社
	$DMNConn = DMNOpen();	//datemenow
	
	session_start();	//啟動 session
	//------------------------------------------------------------------------
	header("Cache-control: private");
	header('Content-type: text/html; charset=utf-8');
	//------------------------------------------------------------------------
	error_reporting(E_ALL ^ E_NOTICE);//忽略提醒
	date_default_timezone_set('Asia/Taipei');
	
	//設定常態文字
	$txt_add = "新增";
	$txt_edit = "修改";
	$txt_del = "刪除";
	$txt_list = "列表";
	
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