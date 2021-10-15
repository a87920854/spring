<?php
	//設定conn name
	$SPConn = SPConOpen();	//春天會館
	$FunConn = FunOpen();	//好好玩旅行社
	$DMNConn = DMNOpen();	//datemenow

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
?>