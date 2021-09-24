<?php
	require_once("include/_inc.php");
	require_once("include/_function.php");
	
	$SPConn = SPConOpen();
	
	call_alert("我是測試訊息","123.php",0);
	
	$query = $SPConn->prepare("SELECT count(*) as t FROM menu_m");
      if (!empty($gender)) $query->bindValue(':gender', $gender, PDO::PARAM_STR);
      $query->execute();
	  $numsrow = $query->fetch()["t"];
	  echo $numsrow;
?>