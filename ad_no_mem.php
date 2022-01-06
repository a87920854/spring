<?php
/**********************************************/
//檔案名稱：ad_no_mem.php
//後台對應位置：名單/發送記錄>祕書履歷(未入會明細)
//改版日期：2022.1.05
//改版設計人員：Jack
//改版程式人員：Queena
/**********************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

check_page_power("ad_no_mem");

$st = SqlFilter($_REQUEST["st"],"tab");
//$d = SqlFilter($_REQUEST["d"],"tab");
//$a = SqlFilter($_REQUEST["a"],"tab");
$n = SqlFilter($_REQUEST[""],"tab");
$mem_num = SqlFilter($_REQUEST["mem_num"],"tab");

//原有一段2020年底跑的LINEPOINTS行銷程式，先移除。

//修正…什麼的
if ( $st == "mem_cc_fix" ){
    $SQL = "Select mem_cc From member_data Where mem_num='".$mem_num."'";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);
    if ( count($result) > 0 ){
        $mem_cc = $re["mem_cc"];
        $new_cc = "";
        if ( $mem_cc != "" ){
            if ( substr_count($mem_cc, "sale-") > 0 ){
                $mem_cc_array = explode("sale-", $mem_cc);
                $mem_cc = $mem_cc_arr[1];
                for ( $i=1;$i<strlen($mem_cc);$i++ ){
                    $scc = mb_substr($mem_cc, $i, 1);
                    if ( ! is_numeric($scc) ){
                        break;
                    }
                    $new_cc = $new_cc.$scc;
                }
                $new_cc = "sale-".$new_cc;
            }
        }

        if ( $new_cc != "" ){
            $SQL_u = "Update member_data Set mem_cc = '".$new_cc."'";
            $rs_d = $SPConn->prepare($SQL_u);
            $rs_d->execute();
        }
    }
    header("location:win_close.php?m=修正中...");
    exit;
}

//新增…什麼的
if ( $str == "addfav" && $n != "" ){
	//Set rs = Server.CreateObject("ADODB.Recordset")
    //Set qrs = Server.CreateObject("ADODB.Recordset")

    $SQL = "Select * From member_data Where mem_num='".$n."'";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);

    if ( count($result) > 0 ){
        //新增log_data
        $SQL_i  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, log_4, log_5) Values ( ";
        $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
        $SQL_i .= "'".$re["mem_auto"]."',";
        $SQL_i .= "'".$re["mem_username"]."',";
        $SQL_i .= "'".$re["mem_name"]."',";
        $SQL_i .= "'".$_SESSION["p_other_name"]."',";
        $SQL_i .= "'".$_SESSION["branch"]."',";
        $SQL_i .= "'".$_SESSION["MM_Username"]."',";
        $SQL_i .= "'".$re["mem_mobile"]."',";
        $SQL_i .= "'系統紀錄',";
        $SQL_i .= "'".$_SESSION["p_other_name"]."於".chtime(strftime("%Y/%m/%d %H:%M:%S"))."將本筆資料加入關注名單',";
        $SQL_i .= "'member')";
        $rs_i = $SPConn->prepare($SQL_i);
        $rs_i->execute();
    }
	//更新 member_data [mem_fav]
    $SQL_u = "Update member_data Set mem_fav=1 Where mem_num='".$n."'";
    $rs_u = $SPConn->prepare($SQL_u);
    $rs_u->execute();
    header("location:win_close.php?m=加入關注名單完成..");
    exit;
}

//未知
if ( $st == "refav" && $n != "" ){
    $SQL = "Select * From member_data Where mem_num='".$n."'";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);

    if ( count($result) > 0 ){
	    $mobile = $re["mem_mobile"];
        //新增log_data
        $SQL_i  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, log_4, log_5) Values ( ";
        $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
        $SQL_i .= "'".$re["mem_auto"]."',";
        $SQL_i .= "'".$re["mem_username"]."',";
        $SQL_i .= "'".$re["mem_name"]."',";
        $SQL_i .= "'".$_SESSION["p_other_name"]."',";
        $SQL_i .= "'".$_SESSION["branch"]."',";
        $SQL_i .= "'".$_SESSION["MM_Username"]."',";
        $SQL_i .= "'".$mobile."',";
        $SQL_i .= "'系統紀錄',";
        $SQL_i .= "'".$_SESSION["p_other_name"]."於".chtime(strftime("%Y/%m/%d %H:%M:%S"))."將本筆資料自關注名單移除',";
        $SQL_i .= "'member')";
        $rs_i = $SPConn->prepare($SQL_i);
        $rs_i->execute();
    }
    //更新 member_data [mem_fav]
    $SQL_u = "Update member_data Set mem_fav=0 Where mem_num='".$n."'";
    $rs_u = $SPConn->prepare($SQL_u);
    $rs_u->execute();
    exit;
}

//
if ( $st == "send_branch" ){
    $i1 = SqlFilter($_REQUEST["i1"],"tab");
    $i2 = SqlFilter($_REQUEST["i2"],"tab");
    $SQL = "Select * From member_data Where mem_num in (".$mem_num.")";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);

    if ( count($result) > 0 ){
        foreach($result as $re){
			if ( $re["mem_branch"] != "" ){
				$old_branch = $re["mem_branch"];
            }
			$re["mem_branch"] = $i1;
			if ( $re["mem_single"] != "" ){
				$old_single = $re["mem_single"];
            }
            if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
				$subSQL = ",send_time2 = '".strftime("%Y/%m/%d %H:%M:%S")."'";
			}

			//更新member_data
            $SQL_u = "Update member_data Set mem_single='".$i2."',all_type='已發送'".$subSQL.",send_time-'".strftime("%Y/%m/%d %H:%M:%S")."' Where mem_num=".$re["mem_num"];
            $rs_u = $SPConn->prepare($SQL_u);
            $rs_u->execute();

			$old_mobile = $re["mem_mobile"];
			$new_branch = $re["mem_branch"];
			$new_single = $re["mem_single"];
			$new_single_name = SingleName($new_single,"normal");
			
            //新增log_data
            $SQL_i  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, log_4, log_5) Values ( ";
            $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
            $SQL_i .= "'".$re["mem_auto"]."',";
            $SQL_i .= "'".$re["mem_username"]."',";
            $SQL_i .= "'".$re["mem_name"]."',";
            $SQL_i .= "'".$_SESSION["p_other_name"]."',";
            $SQL_i .= "'".$_SESSION["branch"]."',";
            $SQL_i .= "'".$_SESSION["MM_Username"]."',";
            $SQL_i .= "'".$re["mem_mobile"]."',";
            $SQL_i .= "'系統紀錄',";
            if ( $old_branch != "" || $old_single != "" ){
                $SQL_i .= "'".$_SESSION["p_other_name"]."於".strftime("%Y/%m/%d %H:%M:%S")."將本筆資料[未入會]自 ".$old_branch." - ".SingleName($old_single,"normal")." 轉送給 ".$new_branch&"-".$new_single_name."',";
            }else{
                $SQL_i .= "'".$_SESSION["p_other_name"]."於".strftime("%Y/%m/%d %H:%M:%S")."將本筆資料[未入會]發送給 ".$new_branch."-".$new_single_name."',";
            }
            $SQL_i .= "'member')";
            $rs_i = $SPConn->prepare($SQL_i);
            $rs_i->execute();

			//新增log_data(年紀小名單)
			if ( $new_single_name == "年紀小名單" ){
                //新增log_data
                $SQL_i  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, log_4, log_5) Values ( ";
                $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
                $SQL_i .= "'".$re["mem_auto"]."',";
                $SQL_i .= "'".$re["mem_username"]."',";
                $SQL_i .= "'".$re["mem_name"]."',";
                $SQL_i .= "'".$_SESSION["p_other_name"]."',";
                $SQL_i .= "'".$_SESSION["branch"]."',";
                $SQL_i .= "'".$_SESSION["MM_Username"]."',";
                $SQL_i .= "'".$re["mem_mobile"]."',";
                $SQL_i .= "'年紀太小',";
                $SQL_i .= "'因轉送 ".$new_branch."-".$new_single_name." 而自動更新狀態為年紀太小',";
                $SQL_i .= "'member')";
                $rs_i = $SPConn->prepare($SQL_i);
                $rs_i->execute();

                //更新member_data
                $SQL_u = "Update member_data Set all_type='年紀太小' Where mem_num=".$re["mem_num"];
                $rs_u = $SPConn->prepare($SQL_u);
                $rs_u->execute();
            }

            //新增log_data(未接4次以上)
			if ( $new_single_name == "未接4次以上" ){
                //新增log_data
                $SQL_i  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, log_4, log_5) Values ( ";
                $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
                $SQL_i .= "'".$re["mem_auto"]."',";
                $SQL_i .= "'".$re["mem_username"]."',";
                $SQL_i .= "'".$re["mem_name"]."',";
                $SQL_i .= "'".$_SESSION["p_other_name"]."',";
                $SQL_i .= "'".$_SESSION["branch"]."',";
                $SQL_i .= "'".$_SESSION["MM_Username"]."',";
                $SQL_i .= "'".$re["mem_mobile"]."',";
                $SQL_i .= "'未接4次以上',";
                $SQL_i .= "'因轉送 ".$new_branch."-".$new_single_name." 而自動更新狀態為未接4次以上',";
                $SQL_i .= "'member')";
                $rs_i = $SPConn->prepare($SQL_i);
                $rs_i->execute();

                //更新member_data
                $SQL_u = "Update member_data Set all_type='未接4次以上' Where mem_num=".$re["mem_num"];
                $rs_u = $SPConn->prepare($SQL_u);
                $rs_u->execute();
            }

            //新增log_data(暫時拒絕)
			if ( $new_single_name == "暫時拒絕" ){
                //新增log_data
                $SQL_i  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, log_4, log_5) Values ( ";
                $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
                $SQL_i .= "'".$re["mem_auto"]."',";
                $SQL_i .= "'".$re["mem_username"]."',";
                $SQL_i .= "'".$re["mem_name"]."',";
                $SQL_i .= "'".$_SESSION["p_other_name"]."',";
                $SQL_i .= "'".$_SESSION["branch"]."',";
                $SQL_i .= "'".$_SESSION["MM_Username"]."',";
                $SQL_i .= "'".$re["mem_mobile"]."',";
                $SQL_i .= "'暫時拒絕',";
                $SQL_i .= "'因轉送 ".$new_branch."-".$new_single_name." 而自動更新狀態為暫時拒絕',";
                $SQL_i .= "'member')";
                $rs_i = $SPConn->prepare($SQL_i);
                $rs_i->execute();

                //更新member_data
                $SQL_u = "Update member_data Set all_type='暫時拒絕' Where mem_num=".$re["mem_num"];
                $rs_u = $SPConn->prepare($SQL_u);
                $rs_u->execute();
            }

            //新增log_data(重覆名單)
			if ( $_SESSION["branch"] == "八德" && ( $new_single_name == "重覆名單" || $new_single_name == "23" ) ){
                //新增log_data
                $SQL_i  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, log_4, log_5) Values ( ";
                $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
                $SQL_i .= "'".$re["mem_auto"]."',";
                $SQL_i .= "'".$re["mem_username"]."',";
                $SQL_i .= "'".$re["mem_name"]."',";
                $SQL_i .= "'".$_SESSION["p_other_name"]."',";
                $SQL_i .= "'".$_SESSION["branch"]."',";
                $SQL_i .= "'".$_SESSION["MM_Username"]."',";
                $SQL_i .= "'".$re["mem_mobile"]."',";
                $SQL_i .= "'重覆名單',";
                $SQL_i .= "'因轉送 ".$new_branch."-".$new_single_name." 而自動更新狀態為重覆名單',";
                $SQL_i .= "'member')";
                $rs_i = $SPConn->prepare($SQL_i);
                $rs_i->execute();

                //更新member_data
                $SQL_u = "Update member_data Set all_type='重覆名單' Where mem_num=".$re["mem_num"];
                $rs_u = $SPConn->prepare($SQL_u);
                $rs_u->execute();
            }

            //新增log_data(黑名單)
            if ( $new_single_name == "黑名單" ){
                //新增log_data
                $SQL_i  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, log_4, log_5) Values ( ";
                $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
                $SQL_i .= "'".$re["mem_auto"]."',";
                $SQL_i .= "'".$re["mem_username"]."',";
                $SQL_i .= "'".$re["mem_name"]."',";
                $SQL_i .= "'".$_SESSION["p_other_name"]."',";
                $SQL_i .= "'".$_SESSION["branch"]."',";
                $SQL_i .= "'".$_SESSION["MM_Username"]."',";
                $SQL_i .= "'".$re["mem_mobile"]."',";
                $SQL_i .= "'黑名單',";
                $SQL_i .= "'因轉送 ".$new_branch."-".$new_single_name." 而自動更新狀態為黑名單',";
                $SQL_i .= "'member')";
                $rs_i = $SPConn->prepare($SQL_i);
                $rs_i->execute();

                //更新member_data
                $SQL_u = "Update member_data Set all_type='黑名單' Where mem_num=".$re["mem_num"];
                $rs_u = $SPConn->prepare($SQL_u);
                $rs_u->execute();
            }
        }
    }

    $changelog = SqlFilter($_REQUEST["changelog"],"tab");
	if ( $changelog == "1" ){
		if ( $new_single != $old_single ){
            $SQL_u = "Update log_data Set log_branch='".$new_branch."', log_single='".$new_single."' Where log_1='".$old_mobile."' And log_single='".$old_single."'";
            $rs_u = $SPConn->prepare($SQL_u);
            $rs_u->execute();
        }
	}
	exit;
}

if ( ( $_REQUEST["a1"] != "" && $_REQUEST["b1"] == "" ) || ( $_REQUEST["a1"] == "" && $_REQUEST["b1"] != "" ) ){ call_alert("資料日期選擇起始和結束時間。",0,0);}
if ( ( $_REQUEST["l1"] != "" && $_REQUEST["l2"] == "" ) || ( $_REQUEST["l2"] == "" && $_REQUEST["l1"] != "" ) ){ call_alert("最後回報日期選擇起始和結束時間。",0,0);}
if ( ( $_REQUEST["s27"] != "" && $_REQUEST["s28"] == "" ) || ( $_REQUEST["s27"] == "" && $_REQUEST["s28"] != "" )){ call_alert("年次選擇起始和結束。",0,0);}

$a1 = SqlFilter($_Request["a1"],"tab");
$b1 = SqlFilter($_Request["b1"],"tab");
if ( $a1 != "" && $b1 != "" ){
    if ( $a1 > $b1 ){ call_alert("日期請由小到大選擇",0,0); }
    $a1 = $a1 . " 00:00";
    $b1 = $b1 . " 23:59";
}

$a1 = SqlFilter($_Request["l1"],"tab");
$b1 = SqlFilter($_Request["l2"],"tab");
if ( $l1 != "" && $l1 != "" ){
    if ( $l1 > $l2 ){ call_alert("日期請由小到大選擇",0,0); }
    $l1 = $l1 . " 00:00";
    $l2 = $l2 . " 23:59";
}

$default_sql_num = 1000;

if ( $_SESSION["MM_UserAuthorization"] == "pay" ){
	$default_sql_num = 10;
}

if ( SqlFilter($_REQUEST["vst"],"tab") == "full" ){
    $sqlv = "*";
    $sqlv2 = "count(mem_auto)";
}else{
    $sqlv = "top ".$default_sql_num&" *";
    $sqlv2 = "count(mem_auto)";
}

$oasql = "";
$havemenu = 0;

if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
    if ( SqlFilter($_REQUEST["old"],"tab") != "" ){
        $oasql = "outer APPLY (SELECT TOP 1 log_time, log_branch, log_1, log_2, log_4, (select count(log_auto) from log_data where log_1=dba.mem_mobile) as logsize FROM log_data WHERE log_1 = dba.mem_mobile order by log_auto desc) log_data";
    }
    $sqls = "Select ".$sqlv." FROM member_data as dba outer APPLY (SELECT TOP 1 log_time, log_branch, log_1, log_2, log_4, (select count(log_auto) from log_data where log_1=dba.mem_mobile) as logsize FROM log_data WHERE log_1 = dba.mem_mobile order by log_auto desc) log_data WHERE mem_level = 'guest'";
	$sqls2 = "Select ".$sqlv2." as total_size FROM member_data as dba ".$oasql." WHERE mem_level = 'guest'";
    if ( SqlFilter($_REQUEST["sear"],"tab") != "1" ){
        if ( SqlFilter($_REQUEST["s99"],"tab") != "" ){
      		$sqlss = $sqlss . " and all_type <> '未處理'";
            $all_type = "已處理";
        }else{
      		$sqlss = $sqlss . " and all_type = '未處理'";
            $all_type = "未處理";
            $havemenu = 1;
            switch ( SqlFilter($_REQUEST["c"],"tab") ){
                case "1":
                    $sqlss = $sqlss & " and (mem_come <> '行銷活動' and mem_come5 = 'DateMeNow')";
	    			$c1h =  "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>";
                    break;
                case "2":
                    $sqlss = $sqlss . " and (mem_come = '行銷活動' and mem_come5 = '春天會館')";
                    $c2h =  "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>";
                    break;
                case "6":
					$sqlss = $sqlss . " and (mem_come = '行銷活動' and mem_come5 = '約會專家' and (mem_come2 <> '體驗排約' and mem_come2 <> '體驗課程' and mem_come2 <> '體驗諮詢' and mem_come2 <> '體驗排約-手機版' and mem_come2 <> '體驗課程-手機版' and mem_come2 <> '體驗諮詢-手機版'))";
                    $c6h =  "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>";
                    break;
                case "7":
                    $sqlss = $sqlss . " and (mem_come = '行銷活動' and mem_come5 = '約會專家' and (mem_come2 = '體驗排約' or mem_come2 = '體驗課程' or mem_come2 = '體驗諮詢' or mem_come2 = '體驗排約-手機版' or mem_come2 = '體驗課程-手機版' or mem_come2 = '體驗諮詢-手機版'))";
					$c7h =  "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>";
                    break;
                case "8":
					$sqlss = $sqlss . " and (mem_come = '行銷活動' and mem_come5 = '約會專家' and (mem_come2 = '體驗排約' or mem_come2 = '體驗課程' or mem_come2 = '體驗諮詢' or mem_come2 = '體驗排約-手機版' or mem_come2 = '體驗課程-手機版' or mem_come2 = '體驗諮詢-手機版'))";
					$c8h =  "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>";
                    break;
                case "5":
					$sqlss = $sqlss . " and (mem_come = '行銷活動' and mem_come5 = 'DateMeNow')";
					$c5h =  "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>";
                    break;
                case "3":
					$sqlss = $sqlss . " and (mem_come5 is null or (mem_come5 <> '春天會館' and mem_come5 <> 'DateMeNow' and mem_come5 <> '約會專家'))";
					$c3h =  "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>";
                    break;
                case "4":
					$sqlss = $sqlss . " and (mem_come <> '行銷活動' and mem_come5 = '約會專家' and mem_come2 <> '好好玩活動')";
					$c4h =  "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>";
                    break;
                case "9":
					$sqlss = $sqlss . " and (mem_come <> '行銷活動' and mem_come5 = '約會專家' and mem_come2 = '好好玩活動')";
					$c9h =  "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>";
                    break;
                case "10":
                    $sqlss = $sqlss . " and (mem_come <> '行銷活動' and mem_come5 = 'MiniDate')";
					$c10h = "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>";
                    break;
                case "11":
                    $sqlss = $sqlss . " and (mem_come = '行銷活動' and mem_come5 = 'MiniDate')";
					$c11h =  "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>";
                    break;
                default:
                    $sqlss = $sqlss & " and (mem_come <> '行銷活動' and mem_come5 = '春天會館')";
					$c0h =  "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>";
                    break;
            }
		}
    }else{
	    if ( $st == "checkdellist" ){
            $all_type = "資源回收區-資料搜尋";
        }else{
	    	$all_type = "資料搜尋";
        }
	}

	if ( SqlFilter($_REQUEST["s7"],"tab") != "" ){
        $sqlss = $sqlss . " and mem_single = '" + str_Replace("'", "''", $_REQUEST["s7"]) + "'";
    }
}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" ){	
    if ( SqlFilter($_REQUEST["old"],"tab") != "" ){
        $oasql = "outer APPLY (SELECT TOP 1 log_time, log_branch, log_1, log_2, log_4, (select count(log_auto) from log_data where log_1=dba.mem_mobile and log_branch= '".$_SESSION["branch"]."') as logsize FROM log_data WHERE log_1 = dba.mem_mobile and log_branch= '".$_SESSION["branch"]."' order by log_time desc) log_data";
    }
    $sqls = "Select ".$sqlv." FROM member_data as dba outer APPLY (SELECT TOP 1 log_time, log_branch, log_1, log_2, log_4, (select count(log_auto) from log_data where log_1=dba.mem_mobile and log_branch= '".$_SESSION["branch"]."') as logsize FROM log_data WHERE log_1 = dba.mem_mobile and log_branch= '".$_SESSION["branch"]."' order by log_time desc) log_data WHERE mem_level = 'guest' and mem_branch= '".$_SESSION["branch"]."'";
	$sqls2 = "Select ".$sqlv2." as total_size FROM member_data as dba ".$oasql." WHERE mem_level = 'guest' and mem_branch= '".$_SESSION["branch"]."'";	    
    $all_type = "";
    if ( SqlFilter($_REQUEST["br"],"tab") != "" ){
        $sqlss = $sqlss . " and mem_single = '".$_SESSION["MM_Username"]."'";
        $all_type = "已處理";
    }else{
	    $all_type = "未處理";
	}
	  
    if ( SqlFilter($_REQUEST["s7"],"tab") != "" ){
        $sqlss = $sqlss & " and mem_single like '%" + str_Replace("'", "''", $_REQUEST["s7"]) + "%'";
    }
}elseif ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "action" || $_SESSION["MM_UserAuthorization"] == "manager" ){
    if ( SqlFilter($_REQUEST["old"],"tab") != "" ){
        $oasql = "outer APPLY (SELECT TOP 1 log_time, log_branch, log_1, log_2, log_4, (select count(log_auto) from log_data where log_1=dba.mem_mobile and UPPER(log_single) = '".strtoupper($_SESSION["MM_username"])."') as logsize FROM log_data WHERE log_1 = dba.mem_mobile and UPPER(log_single) = '".strtoupper($_SESSION["MM_username"])."' order by log_time desc) log_data";
    }
    $sqls = "Select ".$sqlv." FROM member_data as dba outer APPLY (SELECT TOP 1 log_time, log_branch, log_1, log_2, log_4, (select count(log_auto) from log_data where log_1=dba.mem_mobile and UPPER(log_single) = '".strtoupper($_SESSION["MM_username"])."') as logsize FROM log_data WHERE log_1 = dba.mem_mobile and UPPER(log_single) = '".strtoupper($_SESSION["MM_username"])."' order by log_time desc) log_data Where mem_level = 'guest' and UPPER(mem_single) = '".strtoupper($_SESSION["MM_username"])."'";
    $sqls2 = "Select ".$sqlv2." as total_size FROM member_data as dba ".$oasql." Where mem_level = 'guest' and UPPER(mem_single) = '".strtoupper($_SESSION["MM_username"])."'";

    if ( SqlFilter($_REQUEST["sear"],"tab") != "1" ){
        if ( SqlFilter($_REQUEST["tr"],"tab") == "1" ){
            $sqlss = $sqlss . " and all_type <> '已發送'";
            $all_type = "已處理";
        }else{
            $sqlss = $sqlss . " and all_type = '已發送'";
            $all_type = "未處理";
        }
    }
}elseif ( $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
    if ( SqlFilter($_REQUEST["old"],"tab") != "" ){
        $oasql = "outer APPLY (SELECT TOP 1 log_time, log_branch, log_1, log_2, log_4, (select count(log_auto) from log_data where log_1=dba.mem_mobile and UPPER(log_single) = '".strtoupper($_SESSION["MM_username"])."') as logsize FROM log_data WHERE log_1 = dba.mem_mobile and UPPER(log_single) = '".strtoupper($_SESSION["MM_username"])."' order by log_time desc) log_data";
	}
    $sqls = "Select ".$sqlv." FROM member_data as dba outer APPLY (SELECT TOP 1 log_time, log_branch, log_1, log_2, log_4, (select count(log_auto) from log_data where log_1=dba.mem_mobile and UPPER(log_single) = '".strtoupper($_SESSION["MM_username"])&"') as logsize FROM log_data WHERE log_1 = dba.mem_mobile and UPPER(log_single) = '".strtoupper($_SESSION["MM_username"])."' order by log_time desc) log_data Where mem_level = 'guest' and UPPER(mem_single) = '".strtoupper($_SESSION["MM_username"])."'";
	$sqls2 = "Select ".$sqlv2." as total_size FROM member_data as dba ".$oasql." Where mem_level = 'guest' and UPPER(mem_single) = '".strtoupper($_SESSION["MM_username"])."'";
    if ( SqlFilter($_REQUEST["sear"],"tab") != "1" ){
        if ( SqlFilter($_REQUEST["tr"],"tab") == "1" ){
            $sqlss = $sqlss . " and all_type <> '已發送'";
            $all_type = "已處理";
        }else{
			$sqlss = $sqlss . " and all_type = '已發送'";
            $all_type = "未處理";
        }
    }
}elseif ( $_SESSION["MM_UserAuthorization"] == "pay" ){  	
    if ( SqlFilter($_REQUEST["old"],"tab") != "" ){
        $oasql = "outer APPLY (SELECT TOP 1 log_time, log_branch, log_1, log_2, log_4, (select count(log_auto) from log_data where log_1=dba.mem_mobile and log_branch= '".$_SESSION["branch"]."') as logsize FROM log_data WHERE log_1 = dba.mem_mobile and log_branch= '".$_SESSION["branch"]."' order by log_time desc) log_data";
    }
    $sqls = "Select ".$sqlv." FROM member_data as dba outer APPLY (SELECT TOP 1 log_time, log_branch, log_1, log_2, log_4, (select count(log_auto) from log_data where log_1=dba.mem_mobile and log_branch= '".$_SESSION["branch"]."') as logsize FROM log_data WHERE log_1 = dba.mem_mobile and log_branch= '".$_SESSION["branch"]."' order by log_time desc) log_data WHERE mem_level = 'guest' and mem_branch= '".$_SESSION["branch"]."'";
    $sqls2 = "Select ".$sqlv2." as total_size FROM member_data as dba ".$oasql." WHERE mem_level = 'guest' and mem_branch= '".$_SESSION["branch"]."'";
}

if ( $a1 != "" && $b1 != "" ){
    $sqlss = $sqlss . " and mem_time between '".$a1."' and '".$b1."'";
}

if ( $l1 != "" && $l2 != "" ){
    $sqlss = $sqlss . " and log_time between '".$l1."' and '".$l2."'";
}

if ( SqlFilter($_REQUEST["s21"],"tab") != "" ){
    $sqlss = $sqlss . " and mem_sex = '" + str_Replace("'", "''", $_REQUEST["s21"]) + "'";
}

if ( SqlFilter($_REQUEST["qhe1"],"tab") != "" && SqlFilter($_REQUEST["qhe2"],"tab") != "" ){
	$sqls = $sqls . " And mem_he between '".SqlFilter($_REQUEST["qhe1"],"tab")."' and '".SqlFilter($_REQUEST["qhe2"],"tab")."'";
}

if ( SqlFilter($_REQUEST["s11"],"tab") != "" ){
    $sqlss = $sqlss . " and mem_branch = '" + str_Replace("'", "''", $_REQUEST["s11"]) + "'";
}

if ( SqlFilter($_REQUEST["s12"],"tab") != "" ){
    $sqlss = $sqlss . " and mem_area = '" + str_Replace("'", "''", $_REQUEST["s12"]) + "'";
}

if ( SqlFilter($_REQUEST["fullm"],"tab") != "" ){
    $fullm = SqlFilter($_REQUEST["fullm"],"tab");
    $fullm = str_replace(",", "','", $fullm);
    $sqlss = $sqlss . " and mem_num in ('".$fullm."')";
}

if ( SqlFilter($_REQUEST["s4"],"tab") != "" ){
    $sqlss = $sqlss . " and mem_num like '%" . str_Replace("'", "''", $_REQUEST["s4"]) . "%'";
}

if ( SqlFilter($_REQUEST["s2"],"tab") != "" ){
    $cs2 = reset_number(SqlFilter($_REQUEST["s2"],"tab"));
    $sqlss = $sqlss . " and mem_mobile like '%".$cs2."%'";
}

if ( SqlFilter($_REQUEST["s17"],"tab") != "" ){
    $sqlss = $sqlss . " and mem_phone like '" . str_Replace("'", "''", $_REQUEST["s17"]) . "%'";
}

if ( SqlFilter($_REQUEST["s8"],"tab") != "" ){
    $sqlss = $sqlss . " and mem_come like '%" . str_Replace("'", "''", $_REQUEST["s8"]) . "%'";
 
    if ( SqlFilter($_REQUEST["s8_1"],"tab") != "" ){
        $sqlss = $sqlss . " and mem_come2 = '" . str_Replace("'", "''", $_REQUEST["s8_1"]) . "'";
    }

    if ( SqlFilter($_REQUEST["s8_6"],"tab") != "" ){
        $sqlss = $sqlss . " and mem_come6 = '" . str_Replace("'", "''", $_REQUEST["s8_6"]) . "'";
    }
}

if ( SqlFilter($_REQUEST["s5"],"tab") != "" ){
    $sqlss = $sqlss . " and si_account like '%" . str_Replace("'", "''", $_REQUEST["s5"]) . "%'";
}

if ( SqlFilter($_REQUEST["s10"],"tab") != "" ){
	$mem_school = str_replace(" ", "", $_REQUEST["s10"]);
	$mem_school = str_replace(",", "','", $mem_school);
	$sqlss = $sqlss . " and mem_school in ('".$mem_school."')";
}

if ( SqlFilter($_REQUEST["s19"],"tab") != "" ){
    $sqlss = $sqlss . " and mem_come3 = '" .str_Replace("'", "''", $_REQUEST["s19"])."'";
}

if ( SqlFilter($_REQUEST["s20"],"tab") != "" ){
    $sqlss = $sqlss . " and mem_come4 = '" . str_Replace("'", "''", $_REQUEST["s20"]) . "'";
}

if ( SqlFilter($_REQUEST["s22"],"tab") != "" ){
    $sqlss = $sqlss . " and mem_mail like '%" . str_Replace("'", "''", $_REQUEST["s22"]) . "%'";
}

if ( SqlFilter($_REQUEST["s23"],"tab") != "" ){
    $sqlss = $sqlss . " and mem_regip like '%" . str_Replace("'", "''", $_REQUEST["s23"]) . "%'";
}

if ( SqlFilter($_REQUEST["s32"],"tab") != "" ){
    $sqlss = $sqlss . " and mem_marry = '".$_REQUEST["s32"]."'";
}

if ( SqlFilter($_REQUEST["s3"],"tab") != "" ){
    $sqlss = $sqlss . " and (mem_name like N'%" . str_Replace("'", "''", $_REQUEST["s3"]) . "%' or mem_nick like '%" . str_Replace("'", "''", $_REQUEST["s3"]) . "%')";
}

if ( SqlFilter($_REQUEST["s6"],"tab") != "" ){
    $sqlss = $sqlss . " and mem_username like '%" . str_Replace("'", "''", $_REQUEST["s6"]) . "%'";
}

if ( SqlFilter($_REQUEST["s18"],"tab") != "" ){
    $sqlss = $sqlss . " and dmn_num like '%" . str_Replace("'", "''", $_REQUEST["s18"]) . "%'";
}

if ( SqlFilter($_REQUEST["serc"],"tab") != "" ){
    $sqlss = $sqlss . " and mem_serc like '%" . str_Replace("'", "''", $_REQUEST["serc"]) . "%'";
}

if ( SqlFilter($_REQUEST["s31"],"tab") != "" ){
    $sqlss = $sqlss . " and keyin_single = '" . str_Replace("'", "''", $_REQUEST["s31"]) . "'";
}

if ( SqlFilter($_REQUEST["mem_job1"],"tab") != "" ){
    $sqlss = $sqlss . " and mem_job1 = '" . str_Replace("'", "''", $_REQUEST["mem_job1"]) . "'";
}

if ( SqlFilter($_REQUEST["a4"],"tab") != "" ){
	$mem_money = str_replace(" ", "", $_REQUEST["a4"]);
	$mem_money = str_replace(",", "','", $mem_money);
	$sqlss = $sqlss . " and mem_money in ('".$mem_money."')";
}

if ( SqlFilter($_REQUEST["onlyshowphoto"],"tab") == "1" ){
	$sqlss = $sqlss . " and mem_photo <> '' and not mem_photo = 'girl.jpg' and not mem_photo = 'boy.jpg'";
}

if ( SqlFilter($_REQUEST["s13"],"tab") == "1" ){
    $sqlss = $sqlss . " and mem_time between '" . str_Replace("'", "''", $_REQUEST["s13"]) . "' and '" . str_Replace("'", "''", $_REQUEST["s14"]) . "'";
}
$tshow = "未入會";
if ( SqlFilter($_REQUEST["s15"],"tab") == "1" ){
    $sqlss = $sqlss . " and web_level = ".SqlFilter($_REQUEST["s15"],"tab");
    $tshow = "資料認證";
}

if ( SqlFilter($_REQUEST["s27"],"tab") != "" ){
    $sqlss = $sqlss . " and mem_by between '".SqlFilter($_REQUEST["s27"],"tab") . "' and '".SqlFilter($_REQUEST["s28"],"tab")."'";
}

if ( SqlFilter($_REQUEST["enterprise"],"tab") == "1" ){
    $sqlss = $sqlss . " and si_enterprise=1";
}

if ( SqlFilter($_REQUEST["s98"],"tab") == "1" ){
	$s98 = SqlFilter($_REQUEST["s98"],"tab");
	$s98 = str_replace(" ", "", trim($s98));
	$c98 = 0;
	if ( $s98 == "未處理" ){
		$c98 = 1;
		if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
			$sqlss = $sqlss . " and all_type = '未處理'";
        }elseif ( $_SESSION["MM_UserAuthorization"] == "branch" ){
			$sqlss = $sqlss . " and all_type = '已發送'";
		}else{
			$sqlss = $sqlss . " and all_type = '已發送'";
        }
	}

	if ( $s98 == "已處理" ){
		$c98 = 1;
		if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
			$sqlss = $sqlss . " and all_type <> '未處理'";
        }elseif ( $_SESSION["MM_UserAuthorization"] == "branch" ){
			$sqlss = $sqlss . " and all_type <> '已發送'";
        }else{
			$sqlss = $sqlss . " and all_type <> '已發送'";
		}
	}
	
    if ( $c98 == 0 ){
  	    $s98 = str_replace(",", "','", trim($s98));
  	    $sqlss = $sqlss . " and all_type in ('" .$s98."')";
    }
}

if ( SqlFilter($_REQUEST["s97"],"tab") == "1" ){
    $sqlss = $sqlss . " and mem_cc = '" .str_Replace("'", "''", SqlFilter($_REQUEST["s97"],"tab")) . "'";
}

if ( SqlFilter($_REQUEST["s97_2"],"tab") == "1" ){
    $sqlss = $sqlss . " and mem_cc = '" .str_Replace("'", "''", SqlFilter($_REQUEST["s97_2"],"tab")) . "'";
}

if ( SqlFilter($_REQUEST["nodouble"],"tab") == "1" ){
    switch ($_SESSION["MM_UserAuthorization"]){
		case "admin":
		    $sqlss = $sqlss . " and (SELECT count(mem_auto) FROM member_data as dbb Where (mem_level = 'guest') AND (mem_mobile = dba.mem_mobile)) <= 1";
            break;
		case "branch":
		    $sqlss = $sqlss . " and (SELECT count(mem_auto) FROM member_data as dbb Where (mem_level = 'guest') AND (mem_mobile = dba.mem_mobile) and (mem_branch = '".$_SESSION["branch"]."')) <= 1";
            break;
	    default:
	        $sqlss = $sqlss . " and (SELECT count(mem_auto) FROM member_data as dbb Where (mem_level = 'guest') AND (mem_mobile = dba.mem_mobile) and (mem_branch = '".$_SESSION["branch"]."') and (mem_single = '".$_SESSION["MM_username"]."')) <= 1";
    }
}

if ( SqlFilter($_REQUEST["s"],"tab") == "nokaifa" ){
	if ( SqlFilter($_REQUEST["u"],"tab") != "" ){
	    if ( substr_count($sqls, "mem_single") < 1 ){
		    $sqls = $sqls . " and mem_single='".SqlFilter($_REQUEST["u"],"tab")."'";
        }
	    if ( substr_count($sqls2, "mem_single") < 1 ){
		    $sqls2 = $sqls2 . " and mem_single='".SqlFilter($_REQUEST["u"],"tab")."'";
        }
	    $sqlss = " and (select count(log_auto) from log_data where log_1 = dba.mem_mobile and log_single=dba.mem_single) < 1 and mem_time >= '2015/01/01'";
	    $all_type = $all_type." - 尚未開發";
    }else{
	    echo "查無未開發資料 - 秘書帳號錯誤";
        exit;
    }
}

if ( $st = "checkdellist" ){
	if ( $_SESSION["MM_UserAuthorization"] != "admin" ){
        call_alert("權限不足。",0,0);
    }
	$sqlss = $sqlss ." and not del_mask is null";
}else{
	$sqlss = $sqlss . " and del_mask is null";
}

if ( $st == "fav" || SqlFilter($_REQUEST["onlyfav"],"tab") == "1" ){
	$sqlss = $sqlss . " and mem_fav = 1";
}

if ( SqlFilter($_REQUEST["old"],"tab") != "" ){
    switch (SqlFilter($_REQUEST["old"],"tab")){
        case "1":
            $sqlss = $sqlss . " and (datediff(d, mem_time, '2017/12/31 23:59:59') > 0)  and (datediff(d, log_time, getdate()) > 15) and (mem_sex='男') and (mem_by between 1990 and 1995)";
			$sqls2 = $sqls2 . " and (datediff(d, mem_time, '2017/12/31 23:59:59') > 0)  and (datediff(d, log_time, getdate()) > 15) and (mem_sex='男') and (mem_by between 1990 and 1995)";
			$sqlss = str_replace("and all_type = '未處理'", "", $sqlss);
	        $sqls2 = str_replace("and all_type = '未處理'", "", $sqls2);
			$oldrulesmsg = "舊資顯示條件：資料時間 2017/12/31 前/男生/年次 1990-1995/超過 15 天無回報記錄/預設排序最後回報時間近到遠";
            break;
        case "2":
            $sqlss = $sqlss & " and (datediff(d, mem_time, '2017/12/31 23:59:59') > 0)  and (datediff(d, log_time, getdate()) > 15) and (mem_sex='女') and (mem_by between 1990 and 1997)";
			$sqls2 = $sqls2 & " and (datediff(d, mem_time, '2017/12/31 23:59:59') > 0)  and (datediff(d, log_time, getdate()) > 15) and (mem_sex='女') and (mem_by between 1990 and 1997)";
			$sqlss = str_replace("and all_type = '未處理'", "", $sqlss);
	        $sqls2 = str_replace("and all_type = '未處理'", "", $sqls2);
			$oldrulesmsg = "舊資顯示條件：資料時間 2017/12/31 前/女生/年次 1990-1997/超過 15 天無回報記錄/預設排序最後回報時間近到遠";
            break;
        case "3":
			$sqlss = $sqlss . " and (datediff(d, mem_time, '2018/12/31 23:59:59') > 0)";
			$sqls2 = $sqls2 . " and (datediff(d, mem_time, '2018/12/31 23:59:59') > 0)";
			$sqlss = str_replace("and all_type = '未處理'", "", $sqlss);
	        $sqls2 = str_replace("and all_type = '未處理'", "", $sqls2);
            $oldrulesmsg = "舊資顯示條件：資料時間 2018/12/31 前";
            break;
    }
}

switch ( SqlFilter($_REQUEST["orderby"],"tab") ){
    case "1": //依資料時間排序
        $sqls = $sqls . $sqlss . " order by mem_time desc";
        break;
    case "2": //依資料時間排序
        $sqls = $sqls . $sqlss . " order by mem_time asc";
        break;
    case "3": //依督導發送排序
        $sqls = $sqls . $sqlss . " order by send_time desc";
        break;
    case "4": //依督導發送排序
        $sqls = $sqls . $sqlss . " order by send_time asc";
        break;
    case "5": //依回報時間排序
        $sqls = $sqls . $sqlss . " order by log_time desc";
        break;
    case "6": //依回報時間排序
        $sqls = $sqls . $sqlss . " order by log_time asc";
        break;
    default:
        if ( $l1 != "" && $l2 != "" ){
            $sqls = $sqls . $sqlss . " order by log_time desc";
            $sqls2 = "";
        }elseif ( SqlFilter($_REQUEST["old"],"tab") != "" ){
	        if ( SqlFilter($_REQUEST["old"],"tab") == "3" ){
	            $sqls = $sqls . $sqlss . " order by send_time desc";
            }else{
                $sqls = $sqls . $sqlss . " order by log_time asc";
            }
        }elseif ( SqlFilter($_REQUEST["c"],"tab") == "8" ){
            $sqls = $sqls . $sqlss . " order by send_time desc";
        }elseif ( SqlFilter($_REQUEST["st"],"tab") == "checkdellist" ){
            $sqls = $sqls . $sqlss . " order by del_mask_time desc";
        }elseif ( $_SESSION["MM_UserAuthorization"] == "admin" &&  SqlFilter($_REQUEST["s99"],"tab") != "1" && SqlFilter($_REQUEST["vst"],"tab") != "full" && SqlFilter($_REQUEST["sear"],"tab") != "1" ){
            $sqls = $sqls . $sqlss . " order by mem_mobile, mem_auto desc";
        }elseif ( SqlFilter($_REQUEST["s7"],"tab") == "DMNDMN" ){
            $sqls = $sqls . $sqlss . " order by mem_auto asc";
        }elseif ( $_SESSION["MM_UserAuthorization"] == "branch" ){
            $sqls = $sqls . $sqlss . " order by send_time2 desc, send_time desc";
        }else{
            $sqls = $sqls . $sqlss . " order by send_time desc";
        }
}

$sqls2 = $sqls2 . $sqlss;

if ( SqlFilter($_REQUEST["c"],"tab") == "8" ){
	$sqls = str_replace("and all_type = '未處理'", "", $sqls);
	$sqls2 = str_replace("and all_type = '未處理'", "", $sqls2);
}

if ( $_SESSION["MM_Username"] == "TSAIWEN216" ){
    echo $sqls."<br>";
    echo $sqls2."<br>";
}
?>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">未入會資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>未入會資料 未處理 - 數量：5　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <div class="pull-left">
                        <a href="ad_register_no.php" class="btn btn-info">新增未入會資料</a>&nbsp;&nbsp;
                        <div class="btn-group">
                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                            <ul class="dropdown-menu">

                                <li><a href="javascript:mutil_send();"><i class="icon-tag"></i> 多選發送</a></li>
                                <li><a href="javascript:mutil_del();"><i class="icon-remove-sign"></i> 多選刪除</a></li>
                                <li><a href="javascript:mutil_black();"><i class="icon-tag"></i> 多選黑名單</a></li>

                                <li><a href="javascript:mutil_del2();"><i class="icon-remove-sign"></i> 多選強刪</a></li>

                                <li><a href="?s99=1" target="_self"><i class="icon-resize-horizontal"></i> 切換已處理</a></li>

                                <li><a href="ad_register_no.php"><i class="icon-star"></i> 新增未入會資料</a></li>
                                <li><a href="ad_no_mem_f.php"><i class="icon-tag"></i> 進階搜尋</a></li>
                            </ul>
                        </div>　
                    </div>

                    <form id="searchform" action="ad_no_mem.php?vst=full&sear=1" method="post" target="_self" class="form-inline pull-left" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type" class="form-control">
                            <option value="s2">手機</option>
                            <option value="s17">電話</option>
                            <option value="s3">姓名</option>
                            <option value="s4">編號</option>
                            <option value="s5">約會專家帳號</option>
                            <option value="s6">身分證字號</option>
                            <option value="s22">電子信箱</option>


                            <option value="s18">DMN編號</option>

                            <option value="s23">IP</option>

                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text" value="">
                        <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                    </form>
                </div>
                </p>

                <p style="clear:both">
                <div class="inline-block">

                    <a class="btn btn-success" href="ad_no_mem.php?sear=1">所有未入會</a> <a class="btn btn-success" href="?s15=1&sear=1">資料認證</a> <a class="btn btn-success" href="ad_mem.php?s13=2">真人認證</a> <a class="btn btn-success" href="ad_mem.php?s13=3">璀璨會員</a> <a class="btn btn-success" href="ad_mem.php?s13=4">璀璨VIP會員</a>

                    <a class="btn btn-success" href="ad_mem.php?branch2=1">跨區會員</a>

                    <!--  <a class="btn btn-success" href="?sear=1&enterprise=1">企業會員</a>-->
                    <a class="btn btn-danger" href="ad_mem_reservation.php">預約總表</a>
                    <a class="btn btn-danger" href="ad_mem_reservation_v.php?t1=2021/9/28&t2=2021/9/28">本日預約</a>
                    <a class="btn btn-primary" href="ad_no_mem.php?st=fav&sear=1">關注名單</a>
                </div>
                <div class="inline-block btn-group">
                    <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown">舊資 <span class="caret"></span></button>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="ad_no_mem.php?old=1">2021-03 專案-男生</a></li>
                        <li><a href="ad_no_mem.php?old=2">2021-03 專案-女生</a></li>
                        <li><a href="ad_no_mem.php?old=3">2021-05 專案-2018 年前</a></li>
                    </ul>
                </div>

                <select class="form-control2 pull-right" onchange="location.href='ad_no_mem.php'+$(this).val()+''" autocomplete="off">
                    <option value="?orderby=0">預設排序</option>
                    <option value="?orderby=1">資料時間近到遠</option>
                    <option value="?orderby=2">資料時間遠到近</option>
                    <option value="?orderby=3">督導發送近到遠</option>
                    <option value="?orderby=4">督導發送遠到近</option>
                    <option value="?orderby=5">回報時間近到遠</option>
                    <option value="?orderby=6">回報時間遠到近</option>
                </select>
                </p>

                <p style="clear:both">

                    <a class="btn btn-info" href="?c=0"><i class="fa fa-arrow-right" style="margin-top:3px;"></i>春天會館 (5)</a>&nbsp;
                    <a class="btn btn-info" href="?c=2">行銷春天 (10)</a>&nbsp;
                    <a class="btn btn-info" href="?c=1">DateMeNow (1)</a>&nbsp;
                    <a class="btn btn-info" href="?c=5">行銷DMN (15)</a>&nbsp;
                    <a class="btn btn-info" href="?c=4">約會專家 (5)</a>&nbsp;
                    <a class="btn btn-info" href="?c=6">行銷約專 (11)</a>&nbsp;
                    <a class="btn btn-info" href="?c=10">MiniDate (0)</a>&nbsp;
                    <a class="btn btn-info" href="?c=11">行銷MD (0)</a>&nbsp;
                    <a class="btn btn-info" href="?c=9">好好玩活動 (0)</a>&nbsp;
                    <a class="btn btn-pink" href="?c=7">體驗 (0)</a>&nbsp;
                    <a class="btn btn-pink" href="?c=8">所有</a>&nbsp;


                    <a class="btn btn-info" href="?c=3">其他 (0)</a>&nbsp;

                    <a class="btn btn-warning" href="ad_single_atwork.php">秘書上班表</a>&nbsp;
                    <a class="btn btn-black" href="ad_no_mem.php?st=checkdellist&sear=1">資源回收區 (7922)</a>&nbsp;

                </p>


                <table class="table table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th><input data-no-uniform="true" type="checkbox" id="selnums"></th>
                            <th>資料來源</th>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>生日</th>
                            <th>學歷</th>
                            <th>秘書</th>
                            <th>照片</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr id="showtr_2082603" style="background-color:#f2f2f2">
                            <td style="background-color:#7868f5" class="nums_td"><input data-no-uniform="true" type="checkbox" name="nums" value="2082603" data-phone="0907961046"></td>
                            <td class="center">
                                春天網站-網站註冊-<font color=purple>春天會館</font><a href="ad_no_mem.php?sear=1&vst=full&s97_2=Springclub_Google_allproducts_Explore"> [Springclub_Google_allproducts_Explore]</a>

                            </td>
                            <td>2082603</td>

                            <td class="center"><a href="ad_mem_detail.php?mem_num=2082603" target="_blank">陳永華</a>
                                <div style="float:right"> <span class="label label-warning"><a href="#" style="color:white;">重</a></span>

                                    <a href="ad_no_mem_s.php?mem_mobile=0907961046" target="_blank"> <span class="label label-info">查</span></a>


                                    <a href="javascript:mem_send('2082603')"><span class="label label-success">苗栗縣</span>
                                    </a>

                                    <a href="#report" onclick="Mars_popup('ad_report.php?k_id=1984634&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><span class="label label-pp">回報(0)</span></a>

                                </div>
                            </td>
                            <td class="center">男</td>

                            <td class="center">0/0/0</td>
                            <td class="center"></td>

                            <td class="center"></td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:mem_send('2082603')"><i class="icon-arrow-right"></i> 發送</a></li>

                                        <li><a href="ad_mem_detail.php?mem_num=2082603" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_mem_card_print.php?mem_num=2082603" target="_blank"><i class="icon-file"></i> 貴賓諮詢卡</a></li>

                                        <li><a href="ad_mem_fix.php?mem_num=2082603" target="_blank"><i class="icon-file"></i> 修改</a></li>


                                        <li><a href="#fav" onclick="check_fav('2082603')"><i class="icon-star"></i> 加入關注</a></li>


                                        <li><a href="ad_register2.php?mem_num=2082603" target="_blank"><i class="icon-camera"></i> 照片</a></li>


                                        <li><a href="javascript:Mars_popup('send_mail_ksp.php?mem_auto=1984634&mem_mail=jghyt0210@gmail.com','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=520,top=10,left=10');"><i class="icon-envelope"></i> 春天開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp.php?mem_sex=男&mem_single=&mem_mail=jghyt0210@gmail.com&mem_num=2082603','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 春天速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_print0.php?mem_auto=1984634&mem_sex=男','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 五人擇友信</a></li>
                                        <!--<li><a href="javascript:Mars_popup('send_mail_action.php?mem_auto=1984634&mem_mail=jghyt0210@gmail.com','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 當月活動信</a></li>-->


                                        <li><a href="#j" onclick="Mars_popup('block_list.php?phone=0907961046','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=205,top=200,left=200');"><i class="icon-envelope"></i> 加入黑名單</a></li>

                                        <li><a href="javascript:Mars_popup('send_mail_ksp_dmn.php?mem_auto=1984634&mem_mail=jghyt0210@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=900,height=700,top=10,left=10');"><i class="icon-envelope"></i> DMN開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_dmn.php?mem_sex=男&mem_single=&mem_mail=jghyt0210@gmail.com&mem_num=2082603','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> DMN速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_ksp_sp.php?mem_auto=1984634&mem_mail=jghyt0210@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_sp.php?mem_sex=男&mem_single=&mem_mail=jghyt0210@gmail.com&mem_num=2082603','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專速配信</a></li>
                                        <li><a href="javascript:mem_del('2082603');"><i class="icon-trash"></i> 刪除</a></li>
                                        <li><a href="javascript:mem_del2('2082603');"><i class="icon-trash"></i> 強制刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr id="showtr_2082580" style="background-color:#ffffff">
                            <td style="background-color:#78f568" class="nums_td"><input data-no-uniform="true" type="checkbox" name="nums" value="2082580" data-phone="0909750066"></td>
                            <td class="center">
                                春天網站-網站註冊-<font color=purple>春天會館</font><a href="ad_no_mem.php?sear=1&vst=full&s97_2=sale-744"> [推廣：新竹-楊淑梅]</a>

                            </td>
                            <td>2082580</td>

                            <td class="center"><a href="ad_mem_detail.php?mem_num=2082580" target="_blank">陳正旺</a>
                                <div style="float:right"> <span class="label label-warning"><a href="#" style="color:white;">重</a></span>

                                    <a href="ad_no_mem_s.php?mem_mobile=0909750066" target="_blank"> <span class="label label-info">查</span></a>


                                    <a href="javascript:mem_send('2082580')"><span class="label label-success">雲林縣</span>
                                    </a>

                                    <a href="#report" onclick="Mars_popup('ad_report.php?k_id=1984611&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><span class="label label-pp">回報(4)</span></a>

                                </div>
                            </td>
                            <td class="center">男</td>

                            <td class="center">1990/4/28　31 歲</td>
                            <td class="center">高中</td>

                            <td class="center"><br>
                                <font color=green>推薦：</font>台中 - 台中督導
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:mem_send('2082580')"><i class="icon-arrow-right"></i> 發送</a></li>

                                        <li><a href="ad_mem_detail.php?mem_num=2082580" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_mem_card_print.php?mem_num=2082580" target="_blank"><i class="icon-file"></i> 貴賓諮詢卡</a></li>

                                        <li><a href="ad_mem_fix.php?mem_num=2082580" target="_blank"><i class="icon-file"></i> 修改</a></li>


                                        <li><a href="#fav" onclick="check_fav('2082580')"><i class="icon-star"></i> 加入關注</a></li>


                                        <li><a href="ad_register2.php?mem_num=2082580" target="_blank"><i class="icon-camera"></i> 照片</a></li>


                                        <li><a href="javascript:Mars_popup('send_mail_ksp.php?mem_auto=1984611&mem_mail=zxc0909750066@mail.com','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=520,top=10,left=10');"><i class="icon-envelope"></i> 春天開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp.php?mem_sex=男&mem_single=&mem_mail=zxc0909750066@mail.com&mem_num=2082580','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 春天速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_print0.php?mem_auto=1984611&mem_sex=男','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 五人擇友信</a></li>
                                        <!--<li><a href="javascript:Mars_popup('send_mail_action.php?mem_auto=1984611&mem_mail=zxc0909750066@mail.com','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 當月活動信</a></li>-->


                                        <li><a href="#j" onclick="Mars_popup('block_list.php?phone=0909750066','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=205,top=200,left=200');"><i class="icon-envelope"></i> 加入黑名單</a></li>

                                        <li><a href="javascript:Mars_popup('send_mail_ksp_dmn.php?mem_auto=1984611&mem_mail=zxc0909750066@mail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=900,height=700,top=10,left=10');"><i class="icon-envelope"></i> DMN開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_dmn.php?mem_sex=男&mem_single=&mem_mail=zxc0909750066@mail.com&mem_num=2082580','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> DMN速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_ksp_sp.php?mem_auto=1984611&mem_mail=zxc0909750066@mail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_sp.php?mem_sex=男&mem_single=&mem_mail=zxc0909750066@mail.com&mem_num=2082580','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專速配信</a></li>
                                        <li><a href="javascript:mem_del('2082580');"><i class="icon-trash"></i> 刪除</a></li>
                                        <li><a href="javascript:mem_del2('2082580');"><i class="icon-trash"></i> 強制刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr id="showtr_2082576" style="background-color:#f2f2f2">
                            <td style="background-color:#f6db44" class="nums_td"><input data-no-uniform="true" type="checkbox" name="nums" value="2082576" data-phone="0917257020"></td>
                            <td class="center">
                                春天網站-手機APP-首頁-<font color=purple>春天會館</font>

                            </td>
                            <td>2082576</td>

                            <td class="center"><a href="ad_mem_detail.php?mem_num=2082576" target="_blank">陳怡帆</a>
                                <div style="float:right"> <span class="label label-warning"><a href="#" style="color:white;">重</a></span>

                                    <a href="ad_no_mem_s.php?mem_mobile=0917257020" target="_blank"> <span class="label label-info">查</span></a>


                                    <a href="javascript:mem_send('2082576')"><span class="label label-success">新北市</span>
                                    </a>

                                    <a href="#report" onclick="Mars_popup('ad_report.php?k_id=1984607&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><span class="label label-pp">回報(1)</span></a>

                                </div>
                            </td>
                            <td class="center">女</td>

                            <td class="center">1985/6/8　36 歲</td>
                            <td class="center">大學</td>

                            <td class="center"></td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:mem_send('2082576')"><i class="icon-arrow-right"></i> 發送</a></li>

                                        <li><a href="ad_mem_detail.php?mem_num=2082576" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_mem_card_print.php?mem_num=2082576" target="_blank"><i class="icon-file"></i> 貴賓諮詢卡</a></li>

                                        <li><a href="ad_mem_fix.php?mem_num=2082576" target="_blank"><i class="icon-file"></i> 修改</a></li>


                                        <li><a href="#fav" onclick="check_fav('2082576')"><i class="icon-star"></i> 加入關注</a></li>


                                        <li><a href="ad_register2.php?mem_num=2082576" target="_blank"><i class="icon-camera"></i> 照片</a></li>


                                        <li><a href="javascript:Mars_popup('send_mail_ksp.php?mem_auto=1984607&mem_mail=gaigai520@yahoo.com.tw','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=520,top=10,left=10');"><i class="icon-envelope"></i> 春天開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp.php?mem_sex=女&mem_single=&mem_mail=gaigai520@yahoo.com.tw&mem_num=2082576','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 春天速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_print0.php?mem_auto=1984607&mem_sex=女','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 五人擇友信</a></li>
                                        <!--<li><a href="javascript:Mars_popup('send_mail_action.php?mem_auto=1984607&mem_mail=gaigai520@yahoo.com.tw','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 當月活動信</a></li>-->


                                        <li><a href="#j" onclick="Mars_popup('block_list.php?phone=0917257020','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=205,top=200,left=200');"><i class="icon-envelope"></i> 加入黑名單</a></li>

                                        <li><a href="javascript:Mars_popup('send_mail_ksp_dmn.php?mem_auto=1984607&mem_mail=gaigai520@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=900,height=700,top=10,left=10');"><i class="icon-envelope"></i> DMN開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_dmn.php?mem_sex=女&mem_single=&mem_mail=gaigai520@yahoo.com.tw&mem_num=2082576','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> DMN速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_ksp_sp.php?mem_auto=1984607&mem_mail=gaigai520@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_sp.php?mem_sex=女&mem_single=&mem_mail=gaigai520@yahoo.com.tw&mem_num=2082576','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專速配信</a></li>
                                        <li><a href="javascript:mem_del('2082576');"><i class="icon-trash"></i> 刪除</a></li>
                                        <li><a href="javascript:mem_del2('2082576');"><i class="icon-trash"></i> 強制刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr id="showtr_2082571" style="background-color:#ffffff">
                            <td style="background-color:#ea6d9a" class="nums_td"><input data-no-uniform="true" type="checkbox" name="nums" value="2082571" data-phone="0983868022"></td>
                            <td class="center">
                                春天網站-春網首頁-<font color=purple>春天會館</font><a href="ad_no_mem.php?sear=1&vst=full&s97_2=Yahoo_cpc_Asiapac"> [Yahoo_cpc_Asiapac]</a>

                            </td>
                            <td>2082571</td>

                            <td class="center"><a href="ad_mem_detail.php?mem_num=2082571" target="_blank">王詠柔</a>
                                <div style="float:right"> <span class="label label-warning"><a href="#" style="color:white;">重</a></span>

                                    <a href="ad_no_mem_s.php?mem_mobile=0983868022" target="_blank"> <span class="label label-info">查</span></a>


                                    <a href="javascript:mem_send('2082571')"><span class="label label-success">彰化縣</span>
                                    </a>

                                    <a href="#report" onclick="Mars_popup('ad_report.php?k_id=1984602&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><span class="label label-pp">回報(2)</span></a>

                                </div>
                            </td>
                            <td class="center">男</td>

                            <td class="center">1983/5/24　38 歲</td>
                            <td class="center">高職</td>

                            <td class="center"></td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:mem_send('2082571')"><i class="icon-arrow-right"></i> 發送</a></li>

                                        <li><a href="ad_mem_detail.php?mem_num=2082571" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_mem_card_print.php?mem_num=2082571" target="_blank"><i class="icon-file"></i> 貴賓諮詢卡</a></li>

                                        <li><a href="ad_mem_fix.php?mem_num=2082571" target="_blank"><i class="icon-file"></i> 修改</a></li>


                                        <li><a href="#fav" onclick="check_fav('2082571')"><i class="icon-star"></i> 加入關注</a></li>


                                        <li><a href="ad_register2.php?mem_num=2082571" target="_blank"><i class="icon-camera"></i> 照片</a></li>


                                        <li><a href="javascript:Mars_popup('send_mail_ksp.php?mem_auto=1984602&mem_mail=qoo05242477@yahoo.com.tw','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=520,top=10,left=10');"><i class="icon-envelope"></i> 春天開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp.php?mem_sex=男&mem_single=&mem_mail=qoo05242477@yahoo.com.tw&mem_num=2082571','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 春天速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_print0.php?mem_auto=1984602&mem_sex=男','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 五人擇友信</a></li>
                                        <!--<li><a href="javascript:Mars_popup('send_mail_action.php?mem_auto=1984602&mem_mail=qoo05242477@yahoo.com.tw','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 當月活動信</a></li>-->


                                        <li><a href="#j" onclick="Mars_popup('block_list.php?phone=0983868022','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=205,top=200,left=200');"><i class="icon-envelope"></i> 加入黑名單</a></li>

                                        <li><a href="javascript:Mars_popup('send_mail_ksp_dmn.php?mem_auto=1984602&mem_mail=qoo05242477@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=900,height=700,top=10,left=10');"><i class="icon-envelope"></i> DMN開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_dmn.php?mem_sex=男&mem_single=&mem_mail=qoo05242477@yahoo.com.tw&mem_num=2082571','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> DMN速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_ksp_sp.php?mem_auto=1984602&mem_mail=qoo05242477@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_sp.php?mem_sex=男&mem_single=&mem_mail=qoo05242477@yahoo.com.tw&mem_num=2082571','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專速配信</a></li>
                                        <li><a href="javascript:mem_del('2082571');"><i class="icon-trash"></i> 刪除</a></li>
                                        <li><a href="javascript:mem_del2('2082571');"><i class="icon-trash"></i> 強制刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr id="showtr_2082560" style="background-color:#f2f2f2">
                            <td style="background-color:#7868f5" class="nums_td"><input data-no-uniform="true" type="checkbox" name="nums" value="2082560" data-phone="0988205213"></td>
                            <td class="center">
                                春天網站-網站註冊-<font color=purple>春天會館</font><a href="ad_no_mem.php?sear=1&vst=full&s97_2=sale-997"> [推廣：新竹-妍瑀]</a>

                            </td>
                            <td>2082560</td>

                            <td class="center"><a href="ad_mem_detail.php?mem_num=2082560" target="_blank">陳歆</a>
                                <div style="float:right"> <span class="label label-warning"><a href="#" style="color:white;">重</a></span>

                                    <a href="ad_no_mem_s.php?mem_mobile=0988205213" target="_blank"> <span class="label label-info">查</span></a>


                                    <a href="javascript:mem_send('2082560')"><span class="label label-success">台北市</span>
                                    </a>

                                    <a href="#report" onclick="Mars_popup('ad_report.php?k_id=1984591&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><span class="label label-pp">回報(0)</span></a>

                                </div>
                            </td>
                            <td class="center">女</td>

                            <td class="center">0/0/0</td>
                            <td class="center"></td>

                            <td class="center"></td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:mem_send('2082560')"><i class="icon-arrow-right"></i> 發送</a></li>

                                        <li><a href="ad_mem_detail.php?mem_num=2082560" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_mem_card_print.php?mem_num=2082560" target="_blank"><i class="icon-file"></i> 貴賓諮詢卡</a></li>

                                        <li><a href="ad_mem_fix.php?mem_num=2082560" target="_blank"><i class="icon-file"></i> 修改</a></li>


                                        <li><a href="#fav" onclick="check_fav('2082560')"><i class="icon-star"></i> 加入關注</a></li>


                                        <li><a href="ad_register2.php?mem_num=2082560" target="_blank"><i class="icon-camera"></i> 照片</a></li>


                                        <li><a href="javascript:Mars_popup('send_mail_ksp.php?mem_auto=1984591&mem_mail=melody205213@gmail.com','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=520,top=10,left=10');"><i class="icon-envelope"></i> 春天開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp.php?mem_sex=女&mem_single=&mem_mail=melody205213@gmail.com&mem_num=2082560','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 春天速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_print0.php?mem_auto=1984591&mem_sex=女','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 五人擇友信</a></li>
                                        <!--<li><a href="javascript:Mars_popup('send_mail_action.php?mem_auto=1984591&mem_mail=melody205213@gmail.com','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 當月活動信</a></li>-->


                                        <li><a href="#j" onclick="Mars_popup('block_list.php?phone=0988205213','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=205,top=200,left=200');"><i class="icon-envelope"></i> 加入黑名單</a></li>

                                        <li><a href="javascript:Mars_popup('send_mail_ksp_dmn.php?mem_auto=1984591&mem_mail=melody205213@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=900,height=700,top=10,left=10');"><i class="icon-envelope"></i> DMN開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_dmn.php?mem_sex=女&mem_single=&mem_mail=melody205213@gmail.com&mem_num=2082560','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> DMN速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_ksp_sp.php?mem_auto=1984591&mem_mail=melody205213@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_sp.php?mem_sex=女&mem_single=&mem_mail=melody205213@gmail.com&mem_num=2082560','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專速配信</a></li>
                                        <li><a href="javascript:mem_del('2082560');"><i class="icon-trash"></i> 刪除</a></li>
                                        <li><a href="javascript:mem_del2('2082560');"><i class="icon-trash"></i> 強制刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 5 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_no_mem.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_no_mem.php?topage=1 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_no_mem.php?topage=1" selected>1</option>
                        </select></li>
                </ul>
            </div>

        </div>
        <!--/span-->

    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script language="JavaScript">
    <!--
    function reset_send_branch() {
        $("#send_branch_pay1").val("");
        $("#send_branch_pay2").val("");
        $("#send_branch_pay3").val("");
    }
    $(function() {
        console.log(_getCookie("reservation_alert") + "-alert");
        //alert(ismsie());
        $("#send_branch_div_close").on("click", function() {
            reset_send_branch();
        });
        $("#send_branch_div_close1").on("click", function() {
            reset_send_branch();
        });
        $("#send_branch_div_send").on("click", function() {
            var $i1 = $("#send_branch_pay1"),
                $i2 = $("#send_branch_pay2"),
                $i3 = $("#send_branch_pay3"),
                $i4 = $("#changelog"),
                $send_div = $("#send_branch_div");
            if (!$i1.val() || !$i2.val()) {
                alert("請選擇要發送的會館和秘書。");
                return false;
            }
            m = $i3.val();
            if (!m) {
                alert("發送編號讀取錯誤。");
                return false;
            }

            if ($i4.prop("checked")) $i4s = 1;
            else $i4s = 0;

            $("#send_branch_div").modal("hide");
            myApp.showPleaseWait();
            $s1 = m;
            $.ajax({
                url: "ad_no_mem.php",
                data: {
                    st: "send_branch",
                    mem_num: $s1,
                    i1: $i1.val(),
                    i2: $i2.val(),
                    changelog: $i4s
                },
                type: "POST",
                dataType: "text",
                success: function(msg) {
                    if (m.indexOf(",") > 0) {

                        $.each(m.split(","), function(i, val) {
                            $("#showtr_" + val).remove();
                            $("#showtr_" + val + "_2").remove();
                        });

                    } else {

                        $("#showtr_" + m + ",#showtr_" + m + "_2").remove();

                    }

                    myApp.hidePleaseWait();
                    reset_send_branch();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        });
        $("input[name='nums']").prop("checked", false);
        $("#selnums").on("click", function() {
            if ($(this).prop("checked"))
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", true);
                });
            else
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", false);
                });
        });

        $(".nums_td").on("click", function(e) {
            if (e.target.tagName.toUpperCase() != "INPUT") {
                var $myc = $(this).find("input:checkbox");
                if ($myc.prop("checked")) $myc.prop("checked", false);
                else $myc.prop("checked", true);
            }
        });

    });

    function mutil_send() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要發送的會員。");
        else mem_send($allnum);
    }

    function mutil_black() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).data("phone"));
        });
        if ($allnum.length <= 0) alert("請勾選要黑名單的會員。");
        else Mars_popup('block_list.php?allphone=' + $allnum + '', '', 'status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=205,top=200,left=200');
    }

    function mutil_del() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要刪除的資料。");
        else mem_del($allnum);
    }

    function mutil_del2() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要刪除的資料。");
        else mem_del_f($allnum);
    }

    function chk_search_form() {
        if (!$("#keyword_type").val()) {
            alert("請選擇要搜尋的類型。");
            $("#keyword_type").focus();
            return false;
        }
        if (!$("#keyword").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
        }
        location.href = "ad_no_mem.php?sear=1&st=&vst=&s99=&" + $("#keyword_type").val() + "=" + $("#keyword").val() + "&keyk=" + $("#keyword_type").val() + "&keyv=" + $("#keyword").val();
        return false;
    }

    function mem_del(m) {
        if (window.confirm("是否確定刪除？")) {
            myApp.showPleaseWait();
            if ($.isArray(m)) {
                $s1 = m.join(",");
                $s2 = $.each(m, function(i, val) {
                    $("#showtr_" + val + ",#showtr_" + val + "_2").remove();
                });
            } else {
                $s1 = m;
                $s2 = $("#showtr_" + m + ",#showtr_" + m + "_2").remove();
            }

            $.ajax({
                url: "ad_del_mask.php",
                data: {
                    t: "n",
                    mem_num: $s1
                },
                type: "POST",
                dataType: "text",
                success: function(msg) {
                    $s2;
                    myApp.hidePleaseWait();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        } else alert("請重新選擇。");
    }

    function mem_del_f(m) {
        if (window.confirm("是否確定刪除？")) {
            myApp.showPleaseWait();
            if ($.isArray(m)) {
                $s1 = m.join(",");
                $s2 = $.each(m, function(i, val) {
                    $("#showtr_" + val + ",#showtr_" + val + "_2").remove();
                });
            } else {
                $s1 = m;
                $s2 = $("#showtr_" + m + ",#showtr_" + m + "_2").remove();
            }

            $.ajax({
                url: "ad_del.php",
                data: {
                    t: "n",
                    mem_num: $s1
                },
                type: "POST",
                dataType: "text",
                success: function(msg) {
                    $s2;
                    myApp.hidePleaseWait();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        } else alert("請重新選擇。");
    }

    function mem_del2(m) {
        if (window.confirm("是否確定刪除？")) {
            myApp.showPleaseWait();
            if ($.isArray(m)) {
                $s1 = m.join(",");
                $s2 = $.each(m, function(i, val) {
                    $("#showtr_" + val + ",#showtr_" + val + "_2").remove();
                });
            } else {
                $s1 = m;
                $s2 = $("#showtr_" + m + ",#showtr_" + m + "_2").remove();
            }

            $.ajax({
                url: "ad_del.php",
                data: {
                    t: "n",
                    mem_num: $s1
                },
                type: "POST",
                dataType: "text",
                success: function(msg) {
                    $s2;
                    myApp.hidePleaseWait();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(xhr.responseText);
                    myApp.hidePleaseWait();
                }
            });

        } else alert("請重新選擇。");
    }

    function mem_send(m) {
        $("#send_branch_div").modal("show");
        $("#send_branch_pay1").on("change", function() {
            personnel_get_send("send_branch_pay1", "send_branch_pay2");
        });
        $("#send_branch_pay3").val(m);
        $("#changelog").prop("checked", false);
    }

    function check_fav(n) {
        if (window.confirm("是否要設定預約聯絡時間？")) {
            Mars_popup('ad_send_log6.php?fav=1&n=' + n, '', 'scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=500,height=500,top=100,left=200');
        } else {
            Mars_popup('ad_no_mem.php?st=addfav&n=' + n, '', 'scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=200,top=10,left=10');
        }
    }

    function remove_fav(n, m) {
        $.ajax({
            url: "ad_no_mem.php",
            data: {
                st: "refav",
                n: n
            },
            type: "POST",
            dataType: "text",
            success: function(msg) {
                $(".fav_tag_" + m).remove();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    }
    -->
</script>