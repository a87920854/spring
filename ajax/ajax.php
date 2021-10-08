<?php
	require_once("../include/_inc.php");
	require_once("../include/_function.php");
	
	$re_type = SqlFilter($_REQUEST["re_type"],"tab");
	$branch = SqlFilter($_REQUEST["branch"],"tab");
	
	if ( $re_type != "" ){
		$list = "";
		switch ( $re_type ) {
		    case "get_personnel":
				if ( $_REQUEST["flag"] == "1" ){ 
					$SQL = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".SqlFilter($_REQUEST["branch"],"tab")."' Order By p_desc2 Desc, lastlogintime Desc";
				}else{
					$SQL = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".SqlFilter($_REQUEST["branch"],"tab")."' And p_work=1 Order By p_desc2 Desc, lastlogintime Desc";
				}
				$rs = $SPConn->prepare($SQL);
				$rs->execute();
				$result=$rs->fetchAll(PDO::FETCH_ASSOC);
				if ( count($result) == 0 ) {
					$list = "error".$branch;
				}else{
					foreach($result as $re){
						if ( $re["p_name"] != "" ){
							$p_name = $re["p_name"];
						}
						
						if ( $re["p_other_name"] != "" ){
							$p_name = $re["p_other_name"];
						}
						
						if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" ){
							$lastlogintime = strtotime($re["lastlogintime"]);
							if ( $lastlogintime != "" ){
								if ( chkDate($lastlogintime) ){
									$lastlogintime = chtime($re["lastlogintime"]);
									$todaytime = chtime(date("Y-m-d")." 00:00");
									$isf = 0;
									if ( chkDate($lastlogintime) && chkDate($todaytime) ){
										$date1 = $lastlogintime;
										$date2 = $todaytime;
										if ( ( $date1 - $date2 ) > 0 ){
											$p_name = $p_name."(".$lastlogintime.")";
											$isf = 1;
										}
									}
								}
							}                   
						}
						
						if ( $_REQUEST["invite"] == "1" ){
							if ( $p_name != "" && strstr($p_name, "督導") > 0 ){
								//$p_name = strtoupper($re["p_user"])."|_|".$p_name;
								//$personnel_result = $personnel_result.$p_name.",";
							}
						}else{
							If ( $p_name != "" ){
								//$p_name = strtoupper($re["p_user"])."|_|".$p_name;
								//$personnel_result = $personnel_result.$p_name.",";
							}
						}
						$list .= "{ID:'".strtoupper($re["p_user"])."',Name:'".$p_name."'},";
					}
				}
				break;
		}

		if ( strlen($list) > 2 ){
			$list = substr($list,0,strlen($list)-1);
			$list = "{data:[". $list. "]}";	
		}
		echo $list; 	
	}
?>