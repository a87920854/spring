<?php
	/*****************************************/
	//檔案名稱：_limit.php
	//檔案說明：權限判斷檔案
	//新增日期：2021.10.22
	//程式人員：Queena
	/*****************************************/

	//**您沒有查看此頁的權限
	if ( $auth_limit == "1" ){
		call_alert("您沒有查看此頁的權限", 1,0);
		exit;
	}

    //**您沒有權限
	if ( $auth_limit == "2" ){
        if ( $_SESSION["MM_UserAuthorization"] != "admin" && $_SESSION["MM_UserAuthorization"] != "branch" ){
            call_alert("您沒有權限", 1,0);
            exit;
        }
	}

	//**您沒有權限-1
	if ( $auth_limit == "3" ){
		if ( $_SESSION["MM_UserAuthorization"] != "admin" && $_SESSION["MM_UserAuthorization"] != "branch" && $_SESSION["MM_UserAuthorization"] != "manager" && $_SESSION["MM_UserAuthorization"] != "love_manager" ){
			call_alert("您沒有權限", 1,0);
			exit;
		}
	}

	//**您沒有權限 for ad_dmn_business.php
	if ( $auth_limit == "4" ){
		if ( $_SESSION["MM_UserAuthorization"] != "admin" && $_SESSION["MM_UserAuthorization"] != "branch" && $_SESSION["MM_UserAuthorization"] != "manager" && $_SESSION["MM_UserAuthorization"] != "love_manager" && $_SESSION["dmnweb"] != "1" ){
			call_alert("您沒有權限", 1,0);
			exit;
		}
	}

	//**您沒有權限 for ad_dmn_business_fix.php
	if ( $auth_limit == "5" ){
		if ( $_SESSION["MM_UserAuthorization"] != "admin" && $_SESSION["MM_UserAuthorization"] != "branch" && $_SESSION["dmnweb"] != "1" ){
			call_alert("您沒有權限", 1,0);
			exit;
		}
	}

	//**您沒有權限 for ad_guest_del.php
	if ( $auth_limit == "6" ){
        if ( $_SESSION["MM_UserAuthorization"] != "admin" ){
            call_alert("您沒有權限", 1,0);
            exit;
        }
	}

	//**您沒有權限 for ad_nofix.php
	if ( $auth_limit == "7" ){
        if ( $_SESSION["MM_UserAuthorization"] == "action" ){
            call_alert("您沒有權限", 1,0);
            exit;
        }
	}
?>