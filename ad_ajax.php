<?php
    /*****************************************/
	//檔案名稱：ad_ajax.php
	//後台對應位置：
	//改版日期：2021.11.16
	//改版設計人員：Jack
	//改版程式人員：Jack
	/*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");

    if($_REQUEST["st"] == "get_personnel"){
		if($_REQUEST["flag"] == 1){
			$sql = "select p_user, p_name, p_other_name, lastlogintime from personnel_data where p_branch = '".SqlFilter($_REQUEST["branch"],"tab")."' order by p_desc2 desc, lastlogintime desc";
		}else{
			$sql = "select p_user, p_name, p_other_name, lastlogintime from personnel_data where p_branch = '".SqlFilter($_REQUEST["branch"],"tab")."' and p_work=1 order by p_desc2 desc, lastlogintime desc";
		}
        $rs = $SPConn->prepare($sql);
		$rs->execute();
		$result = $rs->fetchAll(PDO::FETCH_ASSOC);
		$personnel_result = "";		
		if(!$result){
			echo "error" .$_REQUEST["branch"];
		}else{			
			foreach($result as $re){
				if($re["p_name"] != ""){
					$p_name = $re["p_name"];
				}
				if($re["p_other_name"] != ""){
					$p_name = $re["p_other_name"];
				}
				if($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch"){
					$lastlogintime = $re["lastlogintime"];
					if(!is_null($lastlogintime)){
						if(chkDate($lastlogintime)){
							$lastlogintime = Date_EN($re["lastlogintime"],2);
							$todaytime = date("Y-m-d") ."00:00";
							$isf = 0;
						}
						if(chkDate($lastlogintime) && chkDate($todaytime)){	
							if( strtotime($lastlogintime) < strtotime($todaytime) ){
								$p_name = $p_name ."(" .$lastlogintime. ")";
      							$isf = 1;
							}							
						}
					}
				}
				if($_REQUEST["invite"] == "1"){
					if($p_name != "" && strpos($p_name,"督導")){
						$p_name = strtoupper($re["p_user"]) . "|_|" . $p_name;
						$personnel_result = $personnel_result . $p_name . ",";
					}
				}else{
					if($p_name != ""){
						$p_name = strtoupper($re["p_user"]) . "|_|" . $p_name;
						$personnel_result = $personnel_result . $p_name . ",";
					}
				}
			}
			if(substr($personnel_result,-1) == ","){
				$personnel_result = chop($personnel_result,",");
			}
				
		}		
    }
	echo $personnel_result;
	// var_dump($result);

	exit;
?>