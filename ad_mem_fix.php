<?php
/************************************************/
//檔案名稱：ad_mem_fix.php
//後台對應位置：共用檔案
//改版日期：2022.1.19
//改版設計人員：Jack
//改版程式人員：Queena
/************************************************/
require_once("./include/_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//接收值
$mem_num = SqlFilter($_REQUEST["mem_num"],"tab"); //會員編號
$state = SqlFilter($_REQUEST["state"],"tab"); //執行項目
$mem_username = SqlFilter($_REQUEST["mem_username"],"tab"); //會員帳號
$si_account = SqlFilter($_REQUEST["si_account"],"tab");
$old_mem_username = SqlFilter($_REQUEST["old_mem_username"],"tab"); //舊的會員帳號
$sel_y1 = SqlFilter($_REQUEST["sel_y1"],"tab"); //對象條件年齡(起)
$sel_y2 = SqlFilter($_REQUEST["sel_y2"],"tab"); //對象條件年齡(訖)
$mem_money_y = SqlFilter($_REQUEST["mem_money_y"],"tab"); //會員年收入
$mem_branch = SqlFilter($_REQUEST["mem_branch"],"tab"); //受理會館
$mem_single = SqlFilter($_REQUEST["mem_single"],"tab"); //受理祕書
$mem_level = SqlFilter($_REQUEST["mem_single"],"tab"); //受理祕書


//新增會員資料
if ( $state == "add" ){
    if ( $mem_username == "TETETE" || $mem_username == "TETETE2" || $mem_username == "99998" ){
	    $mem_username = $mem_username;
    }else{
	    $mem_username = Checkid($mem_username);
    }

    $si_account = reset_number($si_account);
    $old_mem_username = Checkid($old_mem_username);

    //擇友條件年齡
    if ( ( $sel_y1 != "" && $sel_y2 == "" ) || ( $sel_y2 != "" && $sel_y1 == "" ) ){
	    call_alert("擇友條件的年齡必須兩項均填。", 0,0);
    }
    if ( $sel_y1 != "" && $sel_y2 != "" ){
	    if ( $sel_y1 > $sel_y2 ){ call_alert("擇友條件的年齡必須從小至大。", 0,0); }
    }

    //會員年收入
    if ( $mem_money_y != "" ){
	    if ( ! is_numeric($mem_money_y) ){
		    call_alert("年收入只能輸入數字。", 0,0);
        }
	    $mem_money_y = round($mem_money_y);
    }else{
	    $mem_money_y = 0;
    }

    //受理會館/祕書
    if ( $mem_branch != "" && $mem_single == "" ){
	    call_alert("如選擇受理會館則必須選擇受理秘書。", 0,0);
    }

    $checkok = 0;
    if ( $si_account != "" && $si_account != "0" ){ //所有有帳號都 check
	$fsi_account = 0;
    $SQL = "Select mem_num From member_data Where si_account = '".$si_account."'";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    if ( count($result) > 0 ){
        foreach($result as $re){
		    if ( chstr($re["mem_num"]) != chstr($mem_num) ){
	            $fsi_account = 1;
            }
		}
    }
      
    if ( $fsi_account == 1 ){
		call_alert("此網站帳號重覆，請聯絡總公司處理。".$si_account, 0,0);
    }
}

$SQL = "Select * From member_data Where mem_num='".$mem_num."'";
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);

$web_level = $re["web_level"];
if ( $web_level == "" || is_null($web_level) ){
	$web_level = 0;
}

//接收值
$mem_level = SqlFilter($_REQUEST["mem_level"],"tab");
$mem_branch = SqlFilter($_REQUEST["mem_branch"],"tab");
$mem_single = SqlFilter($_REQUEST["mem_single"],"tab");
$call_branch = SqlFilter($_REQUEST["call_branch"],"tab");
$call_single = SqlFilter($_REQUEST["call_single"],"tab");
$mem_passwd = SqlFilter($_REQUEST["mem_passwd"],"tab");
$stop_str = SqlFilter($_REQUEST["stop_str"],"tab");
$stop_sy = SqlFilter($_REQUEST["stop_sy"],"tab");
$stop_sm = SqlFilter($_REQUEST["stop_sm"],"tab");
$stop_sd = SqlFilter($_REQUEST["stop_sd"],"tab");
$stop_ey = SqlFilter($_REQUEST["stop_ey"],"tab");
$stop_em = SqlFilter($_REQUEST["stop_em"],"tab");
$stop_ed = SqlFilter($_REQUEST["stop_ed"],"tab");
$noupdatememusername = 0;

if ( $mem_level == "guest" ){
	if ( $re["web_level"] != 0 ){
		if ( $re["mem_branch"] != $_SESSION["branch"] && $_SESSION["MM_UserAuthorization"] != "admin" ){
			call_alert("非受理會館無法修改成未入會。", 0, 0);
        }
        $SQL1 = "Select Top 1 * From log_data";
        $rs1 = $SPConn->prepare($SQL1);
        $rs1->execute();
        $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);

        //新增log
        $SQL_i  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, log_4, log_5, log_service ) Values ( ";
        $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
        $SQL_i .= "'".$re["mem_auto"]."',";
        $SQL_i .= "'".$re["mem_username"]."',";
        $SQL_i .= "'".$re["mem_name"]."',";
        $SQL_i .= "'".$_SESSION["p_other_name"]."',";
        $SQL_i .= "'".$_SESSION["branch"]."',";
        $SQL_i .= "'".$_SESSION["MM_Username"]."',";
        $SQL_i .= "'".$re["mem_mobile"]."',";
        $SQL_i .= "'系統紀錄',";
        $SQL_i .= "'".$_SESSION["p_other_name"]."於".chtime(date("Y-d-m H:m:i"))."將會員權益自".num_lv($re["web_level"])."修改成".num_lv(0)."',";
        $SQL_i .= "'member',1)";
        $rs_i = $SPConn->prepare($SQL_i);
        $rs_i->execute();
    }

    //會員帳號
  	if ( $re["mem_username"] != "" ){
  		$subSQL = ",mem_username_last = '".$re["mem_username"]."',mem_username='NULL'";
  		$noupdatememusername = 1;
    }
      $subSQL .= ",web_level=0,web_endtime='NULL',mem_level='guest'";
}else{
    if ( $_SESSION["MM_UserAuthorization"] == "admin" || ( ($_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "pay") && $re["mem_branch"] == $_SESSION["branch"]) ){
		if ( $mem_branch == "" ){ call_alert("請選擇受理會館。", 0, 0); }
  		if ( $mem_single == "" ){ call_alert("請選擇受理秘書。", 0, 0); }
  		if ( $call_branch == "" ){ call_alert("請選擇邀約會館。", 0, 0); }
  		if ( $call_single == "" ){ call_alert("請選擇邀約秘書。", 0, 0); }
    }
	if ( $mem_username == "" ){ call_alert("請輸入身分證字號。", 0, 0); }
	if ( $si_account == "" || $si_account == "0" ){ call_alert("請輸入帳號。", 0, 0); }	
	if ( $mem_passwd != "" ){
		if ( strlen($mem_passwd) < 5 ){ call_alert("密碼請填入5至8字元的英文或數字。", 0, 0); }
    }

	//判斷暫停欄位是否填寫 20211027 By Queena
	if ( $stop_str == "是" ){
		if ( $stop_sy == "" ){ call_alert("暫停日期(起)年份未選擇。",0,0); }
        if ( $stop_sm == "" ){ call_alert("暫停日期(起)月份未選擇。",0,0); }
        if ( $stop_sd == "" ){ call_alert("暫停日期(起)日期未選擇。",0,0); }
        if ( $stop_ey == "" ){ call_alert("暫停日期(訖)年份未選擇。",0,0); }
        if ( $stop_em == "" ){ call_alert("暫停日期(訖)月份未選擇。",0,0); }
        if ( $stop_ed == "" ){ call_alert("暫停日期(訖)日期未選擇。",0,0); }
		$stop_date1 = $stop_sy."-".$stop_sm."-".$stop_sd;
		$stop_date2 = $stop_ey."-".$stop_em."-".$stop_ed;
		if ( $stop_date2 < $stop_date1 ){ call_alert("暫停日期錯誤。",0,0); }
    }
	//判斷暫停欄位是否填寫 20211027 By Queena
	
	$havefid = 0;
    $SQL1 = "Select mem_num, web_level From member_data Where mem_username = '".$mem_username."' And mem_level='mem'";
    $rs1 = $SPConn->prepare($SQL);
    $rs1->execute();
    $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
	if ( count($result1) > 0 ){
        foreach($result1 as $re1){
		    if ( $re["mem_num"] != $re1["mem_num"] ){
	            $havefid = 1;
            }
        }
    }
    if ( $havefid == 1 ){
		call_alert("\n此身分證字號重覆，請聯絡總公司處理。\n\n請拜託務必「不要」輸入錯誤的身分證字號來閃避系統檢查，謝謝。\n\n".$mem_username, 0,0);
	}
	
	$havesiaccount = 0;
    $SQL1 = "Select mem_num, si_account From member_data Where si_account = '".$si_account."'";
    $rs1 = $SPConn->prepare($SQL);
    $rs1->execute();
    $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
	if ( count($result1) > 0 ){
        foreach($result1 as $re1){
		    if ( $re["mem_num"] != $re1["mem_num"] ){
	            $havesiaccount = 1;
            }
		}
    }
    if ( $havesiaccount == 1 ){
		call_alert("此帳號重覆，請聯絡總公司處理。".$si_account, 0,0);
	}

	$subSQL .= ",mem_level = 'mem'";
	
	if ( $web_level != round($mem_level) ){
		if ( ( round($mem_level) == 10 || round($mem_level) == 11 ) && $web_level == 3 ){

        }else{
		    $checkok = 1;
        }
	}	
}

//接收值
$mem_s1 = SqlFilter($_REQUEST["mem_s1"],"tab");

//若權限不為single
if ( $_SESSION["MM_UserAuthorization"] != "single" ){
    $subSQL .= ",mem_s1 = '".$mem_s1."'";
}else{
	$subSQL .= ",mem_s1 = '無'";
}
$change_log_msg = "";
$old_mem_au = $re["mem_auto"];

if ( $noupdatememusername == 0 ){
	if ( $re["mem_username"] != $mem_username ){
		$change_log_msg = $change_log_msg."[身分證字號]".$re["mem_username"]."=>".$mem_username;
  		$change_memusername_loveandpay_old = $re["mem_username"];
  		$change_memusername_loveandpay_new = $mem_username;
    }
	$subSQL .= ",mem_username = '". $mem_username."'";
}
$subSQL .= "si_account = '".$si_account."'";

if ( $mem_passwd != "" ){
    $subSQL .= ",mem_passwd = ".$mem_passwd."'";
}else{
	if ( $re["si_account"] == "" ){
		$subSQL .= ",mem_passwd = 'NULL'";
    }
	if ( $re["mem_username"] != "" && ( $re["mem_passwd"] == "" || is_null($re["mem_passwd"] )) ){
		$subSQL .= ",mem_passwd = '".substr($re["mem_username"], -6)."'";
    }
}
$subSQL .= ",mem_name='".$mem_name."',mem_sex='".$mem_sex."',mem_by='".$mem_by."',mem_bm='".$mem_bm."',mem_bd='".$mem_bd."',mem_phone='".$mem_phone."'";
$mem_mobile = chk_mobile($mem_mobile);
if ( $_SESSION["MM_Username"] == "TSAIWEN216" || $_SESSION["MM_Username"] == "SHEERY03130513" || $_SESSION["MM_Username"] == "LI6954029"){
	if ( $re["mem_mobile"] != $mem_mobile ){
		$change_log_msg = $change_log_msg."[手機]".$re["mem_mobile"]."=>".$mem_mobile;
		$old_mem_mobile = $re["mem_mobile"];
		$subSQL .= ",mem_mobile = '".$mem_mobile."'";
    }
}

//寫入暫停相關欄位 20211027 By Queena
$subSQL .= ",mem_stop = '".$stop_str."'";
if ( $stop_str == "是" ){
    $subSQL .= ",mem_stop_sy='".$stop_sy."',mem_stop_sm='".$stop_sm."',mem_stop_sd='".$stop_sd."',mem_stop_ey='".$stop_ey."',mem_stop_em='".$stop_em."',mem_stop_ed='".$stop_ed."'";
}else{
    $subSQL .= ",mem_stop_sy='NULL',mem_stop_sm='NULL',mem_stop_sd='NULL',mem_stop_ey='NULL',mem_stop_em='NULL',mem_stop_ed='NULL'";

}
//寫入暫停相關欄位 20211027 By Queena

//接收值
$mem_mobile2 = SqlFilter($_REQUEST["mem_mobile2"],"tab");
$mem_mail = SqlFilter($_REQUEST["mem_mail"],"tab");
$mem_msn = SqlFilter($_REQUEST["mem_msn"],"tab");
$mem_address = SqlFilter($_REQUEST["mem_address"],"tab");
$mem_area = SqlFilter($_REQUEST["mem_area"],"tab");
$mem_address2 = SqlFilter($_REQUEST["mem_address2"],"tab");
$mem_area2 = SqlFilter($_REQUEST["mem_area2"],"tab");
$mem_nick = SqlFilter($_REQUEST["mem_nick"],"tab");
$mem_he = SqlFilter($_REQUEST["mem_he"],"tab");
$mem_we = SqlFilter($_REQUEST["mem_we"],"tab");
$mem_wet = SqlFilter($_REQUEST["mem_wet"],"tab");
$mem_bmi = SqlFilter($_REQUEST["mem_bmi"],"tab");

$subSQL .= ",mem_mobile2='".$mem_mobile2."',mem_mail='".$mem_mail."',mem_msn='".$mem_msn."',mem_address='".$mem_address."',mem_area='".$mem_area."',mem_address2='".$mem_address2."'";
$subSQL .= ",mem_area2='".$mem_area2."',mem_nick='".$mem_nick."',mem_he='".$mem_he."',mem_we='".$mem_we."',mem_wet='".$mem_wet."'";

if ( is_numeric($mem_bmi) ){
	$mem_bmi = $mem_bmi;
}else{
	$mem_bmi = 0;
}

//接收值
$mem_star = SqlFilter($_REQUEST["mem_star"],"tab");         //星座
$mem_blood = SqlFilter($_REQUEST["mem_blood"],"tab");       //血型
$mem_school = SqlFilter($_REQUEST["mem_school"],"tab");     //學歷1
$mem_school2 = SqlFilter($_REQUEST["mem_school2"],"tab");   //學歷2
$mem_school3 = SqlFilter($_REQUEST["mem_school3"],"tab");   //學歷3
$mem_school4 = SqlFilter($_REQUEST["mem_school4"],"tab");   //學歷4
$mem_job1 = SqlFilter($_REQUEST["mem_job1"],"tab");
$mem_job2 = SqlFilter($_REQUEST["mem_job2"],"tab");
$company = SqlFilter($_REQUEST["company"],"tab");           //公司名稱
$company_year = SqlFilter($_REQUEST["company_year"],"tab"); //年資
$dmn_num = SqlFilter($_REQUEST["dmn_num"],"tab");
$mem_marry = SqlFilter($_REQUEST["mem_marry"],"tab");       //婚姻狀況
$mem_note = SqlFilter($_REQUEST["mem_marry"],"tab");        //會員備註
$ispay = SqlFilter($_REQUEST["ispay"],"tab");
$si_enterprise = SqlFilter($_REQUEST["si_enterprise"],"tab");
$mem_vip = SqlFilter($_REQUEST["mem_vip"],"tab");
$mem_hot = SqlFilter($_REQUEST["mem_hot"],"tab");
$mem_hot_in = SqlFilter($_REQUEST["mem_hot_in"],"tab");
$singleparty_hot_check = SqlFilter($_REQUEST["singleparty_hot_check"],"tab");
$mem_hot1 = SqlFilter($_REQUEST["mem_hot1"],"tab");
$mem_hot2 = SqlFilter($_REQUEST["mem_hot2"],"tab");
$mem_hot3 = SqlFilter($_REQUEST["mem_hot3"],"tab");
$mem_hot4 = SqlFilter($_REQUEST["mem_hot4"],"tab");
$mem_hot5 = SqlFilter($_REQUEST["mem_hot5"],"tab");
$mem_hot6 = SqlFilter($_REQUEST["mem_hot6"],"tab");
$mem_photo_show = SqlFilter($_REQUEST["mem_photo_show"],"tab");
$no_mail1 = SqlFilter($_REQUEST["no_mail1"],"tab");
$no_mail2 = SqlFilter($_REQUEST["no_mail2"],"tab");
$no_mail4 = SqlFilter($_REQUEST["no_mail4"],"tab");

$subSQL .= ",mem_bmi='".$mem_bmi."',mem_star='".$mem_star."',mem_blood='".$mem_blood."',mem_school='".$mem_school."',mem_school2='".$mem_school2."',mem_school3='".$mem_school3."'";
$subSQL .= ",mem_school4='".$mem_school4."',mem_job1='".$mem_job1."',mem_job2='".$mem_job2."',company='".$company."',company_year='".$company_year."'";

//年資
if ( is_numeric($company_year) ){
    $company_year = $company_year;
}else{
	$company_year = 0;
}
$subSQL .= ",company_year='".$company_year."'";
//婚姻狀況
if ( $dmn_num != "" && $_SESSION["MM_UserAuthorization"] == "admin" ){
    $subSQL .= ",dmn_num='".$dmn_num."'";
}
$subSQL .= ",mem_marry='".$mem_marry."'";
//會員備註
if ( $mem_note != "" ){
    $subSQL .= ",mem_note='".nl2br($mem_note)."'";
}

if ( $ispay == "1" ){ $subSQL .= ",ispay=1"; }else{ $subSQL .= ",ispay=0"; }
if ( $si_enterprise == "1" ){ $subSQL .= ",si_enterprise=1"; }else{ $subSQL .= ",si_enterprise=0"; }
if ( $mem_vip == "1" ){ $subSQL .= ",mem_vip=1"; }else{ $subSQL .= ",mem_vip=0"; }
if ( $mem_hot == "1" ){ $subSQL .= ",mem_hot=1"; }else{ $subSQL .= ",mem_hot=0"; }
if ( $mem_hot_in == "1" ){ $subSQL .= ",mem_hot_in=1"; }else{ $subSQL .= ",mem_hot_in=0"; }
if ( $singleparty_hot_check == "1" ){ $subSQL .= ",singleparty_hot_check=1"; }else{ $subSQL .= ",singleparty_hot_check=0"; }
if ( $mem_hot1 == "1" ){ $subSQL .= ",mem_hot1=1"; }else{ $subSQL .= ",mem_hot1=0"; }
if ( $mem_hot2 == "1" ){ $subSQL .= ",mem_hot2=1"; }else{ $subSQL .= ",mem_hot2=0"; }
if ( $mem_hot3 == "1" ){ $subSQL .= ",mem_hot3=1"; }else{ $subSQL .= ",mem_hot3=0"; }
if ( $mem_hot4 == "1" ){ $subSQL .= ",mem_hot4=1"; }else{ $subSQL .= ",mem_hot4=0"; }
if ( $mem_hot5 == "1" ){ $subSQL .= ",mem_hot5=1"; }else{ $subSQL .= ",mem_hot5=0"; }
if ( $mem_hot6 == "1" ){ $subSQL .= ",mem_hot6=1"; }else{ $subSQL .= ",mem_hot6=0"; }
if ( $mem_photo_show == "1" ){ $subSQL .= ",mem_photo_show=1"; }else{ $subSQL .= ",mem_photo_show=0"; }
if ( $no_mail1 == "1" ){ $subSQL .= ",si_no_mail1=1"; }else{ $subSQL .= ",si_no_mail1=0"; }
if ( $no_mail2 == "1" ){ $subSQL .= ",si_no_mail2=1"; }else{ $subSQL .= ",si_no_mail2=0"; }
if ( $no_mail4 == "1" ){ $subSQL .= ",si_no_mail4=1"; }else{ $subSQL .= ",si_no_mail4=0"; }


//接收值
$mem4 = SqlFilter($_REQUEST["mem4"],"tab");
$mem6 = SqlFilter($_REQUEST["mem6"],"tab");
$mem7 = SqlFilter($_REQUEST["mem7"],"tab");
$mem8 = SqlFilter($_REQUEST["mem8"],"tab");
$mem22 = SqlFilter($_REQUEST["mem22"],"tab");
$mem18 = SqlFilter($_REQUEST["mem18"],"tab");
$mem181 = SqlFilter($_REQUEST["mem181"],"tab");
$mem_join = SqlFilter($_REQUEST["mem_join"],"tab");
$mem_jy = SqlFilter($_REQUEST["mem_jy"],"tab");
$mem_jm = SqlFilter($_REQUEST["mem_jm"],"tab");
$mem_jd = SqlFilter($_REQUEST["mem_jd"],"tab");
$sel_marry = SqlFilter($_REQUEST["sel_marry"],"tab");
$sel_school = SqlFilter($_REQUEST["sel_school"],"tab");
$sel_mem6 = SqlFilter($_REQUEST["sel_mem6"],"tab");
$sel_job = SqlFilter($_REQUEST["sel_job"],"tab");
$sel_mem4 = SqlFilter($_REQUEST["sel_mem4"],"tab");
$sel_money_des = SqlFilter($_REQUEST["sel_money_des"],"tab");
$sel_y1 = SqlFilter($_REQUEST["sel_y1"],"tab");
$sel_y2 = SqlFilter($_REQUEST["sel_y2"],"tab");
$sel_area = SqlFilter($_REQUEST["sel_area"],"tab");
$sel_star = SqlFilter($_REQUEST["sel_star"],"tab");
$sel_wet = SqlFilter($_REQUEST["sel_wet"],"tab");
$sel_money = SqlFilter($_REQUEST["sel_money"],"tab");
$sel_sociability = SqlFilter($_REQUEST["sel_sociability"],"tab");
$sel_view = SqlFilter($_REQUEST["sel_view"],"tab");
$sel_mem7 = SqlFilter($_REQUEST["sel_mem7"],"tab");
$sel_mem8 = SqlFilter($_REQUEST["sel_mem8"],"tab");
$sel_mem22 = SqlFilter($_REQUEST["sel_mem22"],"tab");
$can_call = SqlFilter($_REQUEST["can_call"],"tab");
$sys_note = SqlFilter($_REQUEST["sys_note"],"tab");
$can_love = SqlFilter($_REQUEST["can_love"],"tab");
$recipe1 = SqlFilter($_REQUEST["recipe1"],"tab");
$recipe2 = SqlFilter($_REQUEST["recipe2"],"tab");
$recipe3 = SqlFilter($_REQUEST["recipe3"],"tab");
$mem_money = SqlFilter($_REQUEST["mem_money"],"tab");
$mem_money_des = SqlFilter($_REQUEST["mem_money_des"],"tab");
$mem_car = SqlFilter($_REQUEST["mem_car"],"tab");
$mem_house = SqlFilter($_REQUEST["mem_house"],"tab");
for ( $i=2;$i<=5;$i++ ){
    ${"mem_da".$i} = SqlFilter($_REQUEST["mem_da".$i],"tab");
}

$subSQL .= ",mem4='".$mem4."',mem6='".$mem6."',mem7='".$mem7."',mem8='".$mem8."',mem22='".$mem22."',mem18='".$mem18."',mem181='".$mem181."',mem_join='".$mem_join."'";

if ( $mem_jy != "" ){ $subSQL .= ",mem_jy='".$mem_jy."'"; }
if ( $mem_jm != "" ){ $subSQL .= ",mem_jm='".$mem_jm."'"; }
if ( $mem_jd != "" ){ 
    $subSQL .= ",mem_jm='".$mem_jd."',mem_jointime='".$mem_jy."/".$mem_jm."/".$mem_jd."'"; 
}

if ( $sel_marry == "不拘" ){ $subSQL .= ",sel_marry=NULL"; }else{ $subSQL .= ",sel_marry='".$sel_marry."'"; }
if ( $sel_school == "不拘" ){ $subSQL .= ",sel_school=NULL"; }else{ $subSQL .= ",sel_school='".$sel_school."'"; }
if ( $sel_mem6 == "不拘" ){ $subSQL .= ",sel_mem6=NULL"; }else{ $subSQL .= ",sel_mem6='".$sel_mem6."'"; }
if ( $sel_job == "不拘" ){ $subSQL .= ",sel_job=NULL"; }else{ $subSQL .= ",sel_job='".$sel_job."'"; }
if ( $sel_mem4 == "不拘" ){ $subSQL .= ",sel_mem4=NULL"; }else{ $subSQL .= ",sel_mem4='".$sel_mem4."'"; }
if ( $sel_money_des == "不拘" ){ $subSQL .= ",sel_money_des=NULL"; }else{ $subSQL .= ",sel_money_des='".$sel_money_des."'"; }
if ( $sel_y1 != "" ){ $subSQL .= ",sel_y1='".$sel_y1."'"; }else{ $subSQL .= ",sel_y1='0'"; }
if ( $sel_y2 != "" ){ $subSQL .= ",sel_y2='".$sel_y2."'"; }else{ $subSQL .= ",sel_y2='0'"; }
if ( $sel_mem4 == "不拘" ){ $subSQL .= ",sel_area=NULL"; }else{ $subSQL .= ",sel_area='".$sel_area."'"; }
if ( $sel_star == "不拘" ){ $subSQL .= ",sel_star=NULL"; }else{ $subSQL .= ",sel_star='".$sel_star."'"; }
$subSQL .= ",sel_he1='".$sel_he1."',sel_he2='".$sel_he2."'"; 
if ( $sel_wet == "不拘" ){ $subSQL .= ",sel_wet=NULL"; }else{ $subSQL .= ",sel_wet='".$sel_wet."'"; }
if ( $sel_money == "不拘" ){ $subSQL .= ",sel_money=NULL"; }else{ $subSQL .= ",sel_money='".$sel_money."'"; }
if ( $sel_sociability == "不拘" ){ $subSQL .= ",sel_sociability=NULL"; }else{ $subSQL .= ",sel_sociability='".$sel_sociability."'"; }
if ( $sel_view == "不拘" ){ $subSQL .= ",sel_view=NULL"; }else{ $subSQL .= ",sel_view='".$sel_view."'"; }
if ( $sel_mem7 == "不拘" ){ $subSQL .= ",sel_mem7=NULL"; }else{ $subSQL .= ",sel_mem7='".$sel_mem7."'"; }
if ( $sel_mem8 == "不拘" ){ $subSQL .= ",sel_mem8=NULL"; }else{ $subSQL .= ",sel_mem8='".$sel_mem8."'"; }
if ( $sel_mem8 == "不拘" ){ $subSQL .= ",sel_mem22=NULL"; }else{ $subSQL .= ",sel_mem22='".$sel_mem22."'"; }
$subSQL .= ",sys_note='".$sys_note."'"; 
if ( $can_call == "不拘" ){ $subSQL .= ",can_call=NULL"; }else{ $subSQL .= ",can_call='".$can_call."'"; }
if ( $can_love == "不拘" ){ $subSQL .= ",can_love=NULL"; }else{ $subSQL .= ",can_love='".$can_love."'"; }
$subSQL .= ",recipe1='".$recipe1."',recipe2='".$recipe2."',recipe3='".$recipe3."',mem_money='".$mem_money."',mem_money_y='".$mem_money_y."',mem_money_des='".$mem_money_des."'"; 
if ( $mem_car == "1" ){ $subSQL .= ",mem_car=1"; }else{ $subSQL .= ",mem_car=0"; }
if ( $mem_house == "1" ){ $subSQL .= ",mem_house=1"; }else{ $subSQL .= ",mem_house=0"; }
$subSQL .= ",mem_da2='".$mem_da2."',mem_da3='".$mem_da3."',mem_da4='".$mem_da4."',mem_da5='".$mem_da5."',mem_da6='".$mem_da6."'"; 

$old_branch = $re["mem_branch"];

//接收值
$mem_branch = SqlFilter($_REQUEST["mem_branch"],"tab");
$mem_single = SqlFilter($_REQUEST["mem_single"],"tab");
$love_single = SqlFilter($_REQUEST["love_single"],"tab");
$call_branch = SqlFilter($_REQUEST["call_branch"],"tab");
$call_single = SqlFilter($_REQUEST["call_single"],"tab");
$mem_tag = SqlFilter($_REQUEST["mem_tag"],"tab");

if ( $_SESSION["MM_UserAuthorization"] == "admin" || ( ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "pay" ) && $old_branch == $_SESSION["branch"] ) ){
	if ( $mem_branch != "" ){ $subSQL .= ",mem_branch='".$mem_branch."'"; }else{ $subSQL .= ",mem_branch=NULL"; }
	if ( $mem_single != "" ){
		if ( $re["mem_single"] != $mem_single ){
			$change_log_msg = $change_log_msg."[秘書]".$old_branch&"-".SingleName($re["mem_single"],"normal")."=>".$mem_branch."-".SingleName($mem_single,"normal");
        }
        $subSQL .= ",mem_single='".$mem_da2."'"; 
    }else{
		$change_log_msg = $change_log_msg."[秘書]".$old_branch."-".SingleName($re["mem_single"],"normal")."=>NULL";
        $subSQL .= ",mem_single=NULL"; 
	}
}

if ( $love_single != "" ){
	if ( is_null($re["love_single"]) ){
		$change_log_msg = $change_log_msg."[排約]NULL=>".SingleName($love_single,"normal");
    }elseif ( $re["love_single"] != $love_single ){
		$change_log_msg = $change_log_msg."[排約]".SingleName($re["love_single"],"normal")."=>".SingleName($love_single,"normal");
	}
    $subSQL .= ",love_single='".$love_single."'"; 
}else{
	if ( $re["love_single"] != "" ){
		$change_log_msg = $change_log_msg."[排約]".SingleName($re["love_single"],"normal")."=>NULL";
    }
    $subSQL .= ",love_single=NULL"; 
}

if ( $call_branch != "" ){
    $subSQL .= ",call_branch='".$call_branch."'";
}else{
    $subSQL .= ",call_branch=NULL";
}

if ( $call_single != "" ){
	if ( is_null($re["call_single"]) ){
		$change_log_msg = $change_log_msg."[邀約]NULL=>".SingleName($call_single,"normal");
    }elseif ( $re["call_single"] != $call_single ){
		$change_log_msg = $change_log_msg."[邀約]".$re["call_branch"]."-".SingleName($re["call_single"],"normal")."=>".$call_branch."-".SingleName($call_single,"normal");
	}
    $subSQL .= ",call_single='".$call_single."'";
}else{
	if ( $re["call_single"] != "" ){
		$change_log_msg = $change_log_msg."[邀約]".$re["call_branch"]."-".SingleName($re["call_single"],"normal")."=>NULL";
    }
    $subSQL .= ",call_single=NULL";
}

if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
    $subSQL .= ",mem_tag='".$mem_tag."'";
}
$subSQL .= ",mem_uptime='".strftime("%Y/%m/%d %H:%M:%S")."'";

$SQL_u = "Update member_data Set mem_msn=mem_msn".$subSQL." Where mem_num='".$mem_num."'";
echo $SQL_u;
exit;
$rs_u = $SPConn->prepare($SQL_u);
$rs_u->execute();

$mem_branch = $re["mem_branch"];
$jointime = $re["mem_jointime"];
$mem_mobile = $re["mem_mobile"];

if ( $change_log_msg != "" ){
    if ( $old_mem_mobile != "" ){
        //新增log_data
        $SQL_i  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, , log_4, log_5) Values ( ";
        $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
        $SQL_i .= "'".$old_mem_au."',";
        $SQL_i .= "'".$lusername."',";
        $SQL_i .= "'".$n1."',";
        $SQL_i .= "'".$_SESSION["p_other_name"]."',";
        $SQL_i .= "'".$_SESSION["branch"]."',";
        $SQL_i .= "'".$_SESSION["MM_Username"]."',";
        $SQL_i .= "'".$old_mem_mobile."',";
        $SQL_i .= "'系統紀錄',";
        $SQL_i .= "'".$_SESSION["p_other_name"]."於".strftime("%Y/%m/%d %H:%M:%S")."修改資料".$change_log_msg."',";
        $SQL_i .= "'member')";
        $rs_i = $SPConn->prepare($SQL_i);
        $rs_i->execute();
    }
    //新增log_data
    $SQL_i  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, , log_4, log_5) Values ( ";
    $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
    $SQL_i .= "'".$old_mem_au."',";
    $SQL_i .= "'".$lusername."',";
    $SQL_i .= "'".$n1."',";
    $SQL_i .= "'".$_SESSION["p_other_name"]."',";
    $SQL_i .= "'".$_SESSION["branch"]."',";
    $SQL_i .= "'".$_SESSION["MM_Username"]."',";
    $SQL_i .= "'".$mem_mobile."',";
    $SQL_i .= "'系統紀錄',";
    $SQL_i .= "'".$_SESSION["p_other_name"]."於".strftime("%Y/%m/%d %H:%M:%S")."修改資料".$change_log_msg."',";
    $SQL_i .= "'member')";
    $rs_i = $SPConn->prepare($SQL_i);
    $rs_i->execute();
}

if ( $change_memusername_loveandpay_old != "" && $change_memusername_loveandpay_new != "" ){
	if ( strlen($change_memusername_loveandpay_old) > 5 && strlen($change_memusername_loveandpay_new) > 5 ){
        $SQL_u = "Update pay_main Set pay_user='".$change_memusername_loveandpay_new."' Where pay_user='".$change_memusername_loveandpay_old."'";
        $rs_u = $SPConn->prepare($SQL_i);
        $rs_u->execute();
        $SQL_u = "Update love_data_re Set love_user='".$change_memusername_loveandpay_new."' Where love_user='".$change_memusername_loveandpay_old."'"
        $rs_u = $SPConn->prepare($SQL_i);
        $rs_u->execute();
        $SQL_u = "Update love_data_re Set love_user2='".$change_memusername_loveandpay_new."' Where love_user2='".$change_memusername_loveandpay_old."'";
        $rs_u = $SPConn->prepare($SQL_i);
        $rs_u->execute();        
    }
}

if checkok = 1 then
	
	if jointime <> "" then
		if isdate(jointime) then
			if datediff("d", jointime, date) < 0 then
				jointime = date()
			end if
		end if
	end if
	
	if not isdate(jointime) then
		jointime = date()
	end if
	
	
	rs.open "select mem_auto, mem_username, mem_passwd, mem_name, mem_mail, mem_level,mem_mobile, mem_mobile2,web_level, real_web_level, web_startime, web_endtime, si_real_invite, si_enterprise,si_no_mail1, si_no_mail2 from member_data where mem_num="&mem_num&"", SPCon, 1, 3
	if not rs.eof then	
		mem_au = rs("mem_auto")
		lusername = rs("mem_username")
		n1 = rs("mem_name")
		mem_name = n1
		mem_mail = rs("mem_mail")
		nomail = rs("si_no_mail1")
		nomail2 = rs("si_no_mail2")
		n10 = rs("mem_mobile")
		mem_mobile2 = rs("mem_mobile2")
		old_level = rs("web_level")
		web_level = clng(request("mem_level"))
		
		rs("web_startime") = jointime		
		web_level_name = num_lv(web_level)
		select case web_level
			case 1
		rs("web_endtime") = dateadd("m", 2, jointime)
		timemsg = jointime&"~"&dateadd("m", 2, jointime)
			case 2
		rs("web_endtime") = dateadd("m", 3, jointime)	
		timemsg = jointime&"~"&dateadd("m", 3, jointime)
		rs("si_real_invite") = 1
			case 3
		rs("web_endtime") = dateadd("m", 12, jointime)	
		timemsg = jointime&"~"&dateadd("m", 12, jointime)
			case 4
		rs("web_endtime") = dateadd("m", 12, jointime)	
		timemsg = jointime&"~"&dateadd("m", 12, jointime)
			case 5
		rs("web_endtime") = dateadd("m", 24, jointime)	
		timemsg = jointime&"~"&dateadd("m", 24, jointime)
			case 6
		rs("web_endtime") = dateadd("m", 24, jointime)	
		timemsg = jointime&"~"&dateadd("m", 24, jointime)
		case 10 '專案3
		rs("web_endtime") = dateadd("m", 3, jointime)	
		timemsg = jointime&"~"&dateadd("m", 3, jointime)
		web_level = 3
		case 11 '專案6
		rs("web_endtime") = dateadd("m", 6, jointime)	
		timemsg = jointime&"~"&dateadd("m", 6, jointime)
		web_level = 3
		end select

		rs("web_level") = web_level		
		rs("real_web_level") = request("mem_level")
		
		if rs("si_enterprise") = 99 then
		  rs("si_enterprise") = 1
	  end if
	  
		rs.update
		rs.close
rs.open "select top 1 * from log_data", SPCon, 1, 3
rs.addnew
rs("log_time") = now
rs("log_num") = mem_au
rs("log_fid") = lusername
rs("log_username") = n1
rs("log_name") = Session("p_other_name")
rs("log_branch") = Session("branch")
rs("log_single") = Session("MM_Username")
rs("log_1") = n10
rs("log_2") = "系統紀錄"
rs("log_4") = Session("p_other_name")&"於"&chtime(now)&"將會員權益自"&num_lv(old_level)&"修改成"&web_level_name&" - 效期至"&timemsg&""
rs("log_5") = "member"
rs("log_service") = 1
rs.update
rs.close

if mem_branch = "八德" then
  call notice_new_member( "dmn", mem_mail, nomail, mem_name)
  call notice_new_member_sms("dmn", n10, nomail2, mem_name)
elseif mem_branch = "迷你約" then
	'call notice_new_member( "minibar", mem_mail, nomail, mem_name)
	'call notice_new_member_sms("minibar", n10, nomail2, mem_name)
elseif mem_branch = "約專" then
	call notice_new_member( "singleparty", mem_mail, nomail, mem_name)
	call notice_new_member_sms("singleparty", n10, nomail2, mem_name)
else
	call notice_new_member( "spring", mem_mail, nomail, mem_name)
	call notice_new_member_sms("spring", n10, nomail2, mem_name)
end if

	if request("mem_sex") = "男" then
		rsex = 1
	else
		rsex = 2
	end if
	on error resume next
Set httpRequest = Server.CreateObject("MSXML2.ServerXMLHTTP")
httpRequest.Open "POST", "https://edm.springclub.com.tw/si_mem_cron_get.php"
httpRequest.setRequestHeader "Content-Type", "application/x-www-form-urlencoded; charset=utf-8"
httpRequest.Send "email="&mem_mail&"&name="&mem_name&"&sex="&rsex&"&company=singleparty"
response.write httpRequest.responseText
Set httpRequest = nothing

'	response.write "email="&mem_mail&"&name="&mem_name&"&sex="&rsex&"&company=singleparty<Br>"	
	

	end if
end if

if mem_branch = "八德" then
Dim DMNCon
DMNConOpen
if request("mem_level") = "guest" then
'	if mem_username <> "" then
'	rs.open "select HeadPhotoURL from UserData where mem_username='"&mem_username&"'", DMNCon, 1, 3
'	if not rs.eof then
'		hpurl = rs("HeadPhotoURL")		
'		if hpurl <> "" then			
'	    rmfile(server.mappath("dphoto/"&hpurl))
'		end if
'		rs.delete
'		rs.update
'	end if
'	rs.close
'	rs.open "select * from photo_data where mem_num='"&mem_num&"' and types='dmn'", SPCon, 1, 3
'	if not rs.eof then
'		while not rs.eof
'		rmfile(server.mappath("dphoto/"&hpurl))		
'		rs.delete
'		rs.movenext
'		wend
'	end if
'	rs.close
'	rs.open "update member_data set mem_photo=NULL where mem_username='"&mem_username&"'", SPCon, 1, 3
'	
'  end if  
else

if mem_username <> "" then	
Set qrs = Server.CreateObject("ADODB.Recordset")
qrs.open "select * from member_data where mem_username='"&mem_username&"'", SPCon, 1, 1
if not qrs.eof then
rs.open "select * from UserData where mem_username='"&mem_username&"'", DMNCon, 1, 3
if rs.eof then
			rs.addnew
			rs("mem_username") = ucase(qrs("mem_username"))
			rs("UserID") = qrs("mem_num")
			rs("Password") = qrs("mem_passwd")
			rs("FirstName") = qrs("mem_name")
			rs("Nickname") = qrs("mem_nick")
			rs("birthday") = qrs("mem_by")&"/"&qrs("mem_bm")&"/"&qrs("mem_bd")
			rs("Generation") = qrs("mem_by")
			if qrs("mem_sex") = "男" then
				sex = "M"
			else
				sex = "F"
			end if
			rs("Gender") = sex
			rs("Email") = qrs("mem_mail")
			rs("city") = qrs("mem_area")
			rs("Address") = qrs("mem_address")
			rs("telnum") = qrs("mem_mobile")
			rs("Education") = qrs("mem_school")
			rs("Occupation") = qrs("mem_job1")
			if qrs("mem_photo") <> "" then
			rs("HeadPhotoURL") = "photo/"&qrs("mem_photo")
		  end if
			rs("Constellation") = qrs("mem_star")
			rs("tall") = qrs("mem_he")
			rs("fullregtime") = now
			rs("q37") = qrs("mem_by")
			rs("mem_photo_show") = qrs("mem_photo_show")
			rs.update
else
			rs("Password") = qrs("mem_passwd")
			rs("FirstName") = qrs("mem_name")
			rs("Nickname") = qrs("mem_nick")
			rs("birthday") = qrs("mem_by")&"/"&qrs("mem_bm")&"/"&qrs("mem_bd")
			rs("Generation") = qrs("mem_by")
			if qrs("mem_sex") = "男" then
				sex = "M"
			else
				sex = "F"
			end if
			rs("Gender") = sex
			rs("Email") = qrs("mem_mail")
			rs("city") = qrs("mem_area")
			rs("Address") = qrs("mem_address")
			rs("telnum") = qrs("mem_mobile")
			rs("Education") = qrs("mem_school")
			rs("Occupation") = qrs("mem_job1")			
			rs("Constellation") = qrs("mem_star")
			rs("tall") = qrs("mem_he")			
			rs("q37") = qrs("mem_by")
			rs("mem_photo_show") = qrs("mem_photo_show")
			rs.update
end if
rs.close
end if
end if
end if
end if
set qrs=nothing
Set rs = nothing
Call alert("修改完成。","ad_mem_fix.asp?mem_num="&mem_num&"", 0)
Response.end
End IF

rs.Open "SELECT * FROM member_data Where mem_num='"&mem_num&"'",SPCon,1,1
mem_branch = rs("mem_branch")
mem_single = ucase(rs("mem_single"))

mem_branch2 = rs("mem_branch2")
mem_single2 = rs("mem_single2")

love_single = rs("love_single")
love_single2 = rs("love_single2")

call_branch = rs("call_branch")
call_single = rs("call_single")

if Session("MM_Username") = "KYOE" Or Session("MM_Username") = "SHEERY03130513" or Session("MM_Username") = "LI6954029" Or Session("MM_Username") = "TSAIWEN216" Then
	power_edit = 1
else
	power_edit = 0
end if

if rs("mem_level") = "mem" and not Session("MM_UserAuthorization") = "admin" and not Session("MM_UserAuthorization") = "branch" and not Session("MM_UserAuthorization") = "manager" and not Session("MM_UserAuthorization") = "love_manager" and not Session("MM_UserAuthorization") = "pay" then
	Call alert("權限不足。",0, 0)
end if
?>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_mem.php">會員管理系統</a></li>
            <li class="active">修改會員資料 - 2080022</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>修改會員資料 - 2080022</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p>
                    <a class="btn btn-primary" href="ad_mem_detail.php?mem_num=2080022">基本資料</a>
                    <a class="btn btn-blue" href="ad_mem_fix.php?mem_num=2080022"><i class="fa fa-arrow-right" style="margin-top:3px;"></i>修改資料</a>
                    <a class="btn btn-info" href="ad_mem_service.php?mem_num=2080022">服務紀錄</a>
                    <a class="btn btn-danger" href="ad_mem_ptest.php?mem_num=2080022">心理測驗</a>
                    <a class="btn btn-warning" href="ad_mem_login_log.php?mem_num=2080022">登入紀錄</a>
                    <a class="btn btn-dirtygreen" href="ad_important_paper.php?mem_num=2080022">紙本資料</a>
                </p>

                <form id="sform" action="?state=add" method="post" name="form5" onSubmit="return chk_form()" data-cansend="0" class="form-inline">
                    <table class="table table-striped table-bordered bootstrap-datatable input_small">
                        <tr>
                            <td style="font-size:150%;color:blue"><b>基本資料</b></td>
                        </tr>
                        <tr>
                            <td>


                                <font color="#FF0000">會員權益</font>：

                                <select name="mem_level" id="mem_level">
                                    <option value="guest">未入會</option>
                                    <option value="2">真人認證會員</option>
                                    <option value="10">菁英專案-三個月</option>
                                    <option value="11">菁英專案-六個月</option>
                                    <option value="3" selected>璀璨會員-一年期</option>
                                    <option value="5">璀璨會員-二年期</option>
                                    <option value="4">璀璨VIP會員-一年期</option>
                                    <option value="6">璀璨VIP會員-二年期</option>
                                </select>

                                <select name="ispay" id="ispay">
                                    <option value="0" selected>完款</option>
                                    <option value="1">付訂</option>
                                </select>

                                <input type="hidden" name="now_mem_level" id="now_mem_level" value="mem">

                                　
                                待服務名單：
                                <select name="mem_s1" id="select14">

                                    <option value="無" selected>無</option>
                                    <option value="有">有</option>
                                </select>

                            </td>
                        </tr>

                        <tr>
                            <td>
                                <font color=green>受理</font>：

                                <select name="mem_branch" id="mem_branch" required>
                                    <option value="">請選擇</option>
                                    <option value="台北">台北</option>
                                    <option value="桃園">桃園</option>
                                    <option value="新竹">新竹</option>
                                    <option value="台中">台中</option>
                                    <option value="台南" selected>台南</option>
                                    <option value="高雄">高雄</option>
                                    <option value="八德">八德</option>
                                    <option value="約專">約專</option>
                                    <option value="迷你約">迷你約</option>
                                    <option value="總管理處">總管理處</option>
                                </select>
                                <select name="mem_single" id="mem_single">
                                    <option value="">請選擇</option>
                                    <option value="D221429903" selected>杜佳倩</option>
                                </select>


                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=green>排約</font>：

                                <select name="love_single" id="love_single">
                                    <option value="">請選擇</option>
                                    <option value="R222349969" selected>顏琇</option>
                                </select>


                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=green>邀約</font>：

                                <select name="call_branch" id="call_branch">
                                    <option value="">請選擇</option>
                                    <option value="台北">台北</option>
                                    <option value="桃園">桃園</option>
                                    <option value="新竹">新竹</option>
                                    <option value="台中">台中</option>
                                    <option value="台南">台南</option>
                                    <option value="高雄" selected>高雄</option>
                                    <option value="八德">八德</option>
                                    <option value="約專">約專</option>
                                    <option value="迷你約">迷你約</option>
                                    <option value="總管理處">總管理處</option>
                                </select>
                                <select name="call_single" id="call_single">
                                    <option value="">請選擇</option>
                                    <option value="E290076419" selected>倪子淇</option>
                                </select>

                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;電訪員：倪子棋　　


                            </td>
                        </tr>

                        <tr>
                            <td>參加卡別：
                                <select name="mem_join" id="mem_join">
                                    <option value="0">無</option>
                                    <option value="107">真人認證</option>
                                    <option value="210">菁英專案三個月</option>
                                    <option value="211">菁英專案六個月</option>
                                    <option value="1" selected="selected">璀璨一年</option>
                                    <option value="200">璀璨一年+Ｍatch1</option>
                                    <option value="201">璀璨一年+尊榮一年</option>
                                    <option value="202">尊榮一年</option>
                                    <option value="203">璀璨頂級VIP一年</option>

                                    <option value="208">菁英約會一年</option>
                                    <option value="209">魅力成長一年</option>

                                    <option value="2">璀璨二年</option>
                                    <option value="204">璀璨二年+Ｍatch2</option>
                                    <option value="205">璀璨二年+尊榮二年</option>
                                    <option value="206">尊榮二年</option>
                                    <option value="207">璀璨頂級VIP二年</option>

                                    <option value="6">Match1</option>
                                    <option value="7">Match2</option>

                                    <option value="3">互動式</option>
                                    <option value="4">排約式</option>
                                    <option value="36">臨時卡</option>
                                    <option value="106">專案</option>
                                    <option value="101">黃金</option>
                                    <option value="102">鈦金</option>
                                    <option value="103">鑽金</option>
                                    <option value="104">藍鑽</option>
                                    <option value="105">彩鑽</option>
                                    <option value="212">VIP-三個月</option>
                                    <option value="213">VIP-六個月</option>
                                    <option value="214">VIP-十二個月</option>
                                    <option value="215">VIP-十五個月</option>
                                    <option value="216">VVIP-三個月</option>
                                    <option value="217">VVIP-六個月</option>
                                    <option value="218">VVIP-十二個月</option>

                                </select>
                                &nbsp;&nbsp;
                                入會日期：

                                <select name="mem_jy" id="mem_jy">
                                    <option value="">請選擇</option>
                                    <option value="2021" selected>2021 年</option>
                                    <option value="2020">2020 年</option>
                                    <option value="2019">2019 年</option>
                                    <option value="2018">2018 年</option>
                                    <option value="2017">2017 年</option>
                                    <option value="2016">2016 年</option>
                                    <option value="2015">2015 年</option>
                                    <option value="2014">2014 年</option>
                                    <option value="2013">2013 年</option>
                                    <option value="2012">2012 年</option>
                                    <option value="2011">2011 年</option>
                                    <option value="2010">2010 年</option>
                                    <option value="2009">2009 年</option>
                                    <option value="2008">2008 年</option>
                                </select>
                                <select name="mem_jm" id="mem_jm">
                                    <option value="">請選擇</option>
                                    <option value="1">1 月</option>
                                    <option value="2">2 月</option>
                                    <option value="3">3 月</option>
                                    <option value="4">4 月</option>
                                    <option value="5">5 月</option>
                                    <option value="6">6 月</option>
                                    <option value="7">7 月</option>
                                    <option value="8" selected>8 月</option>
                                    <option value="9">9 月</option>
                                    <option value="10">10 月</option>
                                    <option value="11">11 月</option>
                                    <option value="12">12 月</option>
                                </select>

                                <select name="mem_jd" id="mem_jd">
                                    <option value="">請選擇</option>
                                    <option value="1">1 日</option>
                                    <option value="2">2 日</option>
                                    <option value="3">3 日</option>
                                    <option value="4">4 日</option>
                                    <option value="5">5 日</option>
                                    <option value="6">6 日</option>
                                    <option value="7">7 日</option>
                                    <option value="8">8 日</option>
                                    <option value="9">9 日</option>
                                    <option value="10">10 日</option>
                                    <option value="11">11 日</option>
                                    <option value="12">12 日</option>
                                    <option value="13">13 日</option>
                                    <option value="14">14 日</option>
                                    <option value="15">15 日</option>
                                    <option value="16">16 日</option>
                                    <option value="17">17 日</option>
                                    <option value="18">18 日</option>
                                    <option value="19">19 日</option>
                                    <option value="20">20 日</option>
                                    <option value="21">21 日</option>
                                    <option value="22">22 日</option>
                                    <option value="23">23 日</option>
                                    <option value="24">24 日</option>
                                    <option value="25">25 日</option>
                                    <option value="26">26 日</option>
                                    <option value="27">27 日</option>
                                    <option value="28">28 日</option>
                                    <option value="29" selected>29 日</option>
                                    <option value="30">30 日</option>
                                    <option value="31">31 日</option>
                                </select>

                                &nbsp;&nbsp;<a href="ad_mem_fix_up.php?mem_num=2080022" class="btn btn-danger">續約升卡</a>

                            </td>
                        </tr>

                        <tr>
                            <td>身分證字號：
                                R121560195
                                <input type="hidden" name="mem_username" id="mem_username" class="form-control" value="R121560195">
                                <input name="old_mem_username" type="hidden" value="nocheck">

                                &nbsp;&nbsp;
                                <label id="iscaselabel" style="display:none;"><input type="checkbox" id="iscase" name="iscase" value="1"> 個案&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                &nbsp;&nbsp;帳號：
                                R121560195
                                <input type="hidden" name="si_account" id="si_account" value="R121560195">

                                &nbsp;&nbsp;密碼：<input name="mem_passwd" type="text" id="mem_passwd" class="form-control" value="560195" maxlength="20" disabled>

                                <br>
                                <small id="mem_username_chk" class="text-red" style="display:none;">自 2021/01/01 起，未在收支系統有收入紀錄的身分證字號將無法成為會員。</small>
                            </td>
                        </tr>
                        <tr>
                            <td>姓名：
                                <input name="mem_name" class="form-control" type="text" id="mem_name" value="林春福" required>
                                <font color="#999999">（請填入中文姓名）</font>暱稱：
                                <input name="mem_nick" class="form-control" type="text" id="mem_nick2" value="林先生" maxlength="8">
                                <font color="#999999">（網站顯示名稱）</font>
                            </td>
                        </tr>
                        <tr>
                            <td>性別：
                                <select name="mem_sex" id="mem_sex" required>
                                    <option value="">請選擇</option>
                                    <option value="男" selected>男</option>
                                    <option value="女">女</option>
                                </select>
                                &nbsp;&nbsp;
                                生日：
                                <select name="mem_by" id="mem_by">
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                    <option value="1970">1970</option>
                                    <option value="1969">1969</option>
                                    <option value="1968">1968</option>
                                    <option value="1967">1967</option>
                                    <option value="1966">1966</option>
                                    <option value="1965" selected>1965</option>
                                    <option value="1964">1964</option>
                                    <option value="1963">1963</option>
                                    <option value="1962">1962</option>
                                    <option value="1961">1961</option>
                                    <option value="1960">1960</option>
                                    <option value="1959">1959</option>
                                    <option value="1958">1958</option>
                                    <option value="1957">1957</option>
                                    <option value="1956">1956</option>
                                    <option value="1955">1955</option>
                                    <option value="1954">1954</option>
                                    <option value="1953">1953</option>
                                    <option value="1952">1952</option>
                                    <option value="1951">1951</option>
                                    <option value="1950">1950</option>
                                    <option value="1949">1949</option>
                                    <option value="1948">1948</option>
                                    <option value="1947">1947</option>
                                    <option value="1946">1946</option>
                                    <option value="1945">1945</option>
                                    <option value="1944">1944</option>
                                    <option value="1943">1943</option>
                                    <option value="1942">1942</option>
                                    <option value="1941">1941</option>
                                    <option value="1940">1940</option>
                                    <option value="1939">1939</option>
                                    <option value="1938">1938</option>
                                    <option value="1937">1937</option>
                                    <option value="1936">1936</option>
                                    <option value="1935">1935</option>
                                    <option value="1934">1934</option>
                                    <option value="1933">1933</option>
                                    <option value="1932">1932</option>
                                    <option value="1931">1931</option>
                                </select>
                                年
                                <select name="mem_bm" id="mem_bm">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7" selected>7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                月
                                <select name="mem_bd" id="mem_bd">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8" selected>8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                                日
                                &nbsp;&nbsp;
                                星座：
                                <select name="mem_star" id="mem_star">
                                    <option value="">請選擇</option>
                                    <option value="牡羊座">牡羊座</option>
                                    <option value="金牛座">金牛座</option>
                                    <option value="雙子座">雙子座</option>
                                    <option value="巨蟹座">巨蟹座</option>
                                    <option value="獅子座">獅子座</option>
                                    <option value="處女座">處女座</option>
                                    <option value="天秤座">天秤座</option>
                                    <option value="天蠍座">天蠍座</option>
                                    <option value="射手座">射手座</option>
                                    <option value="魔羯座">魔羯座</option>
                                    <option value="水瓶座">水瓶座</option>
                                    <option value="雙魚座">雙魚座</option>
                                </select>
                                &nbsp;&nbsp;
                                血型：
                                <select name="mem_blood" id="mem_blood">
                                    <option value="">請選擇</option>
                                    <option value="A">A型</option>
                                    <option value="B" selected>B型</option>
                                    <option value="O">O型</option>
                                    <option value="AB">AB型</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>手機：
                                0932703652
                                &nbsp;&nbsp;手機2：
                                <input name="mem_mobile2" type="tel" id="mem_mobile2" class="form-control phone" pattern="^[09]{2}[0-9]{8}$" minlength="10" maxlength="10" title="請輸入 09 開頭的十位數手機號碼" value="">
                                &nbsp;&nbsp;居住電話：
                                <input tabindex="99" name="mem_phone" type="text" id="mem_phone" class="form-control" value="">
                                &nbsp;&nbsp;公司電話：
                                <input tabindex="99" name="mem_phone2" type="text" id="mem_phone2" class="form-control" value="">
                            </td>
                        </tr>

                        <tr>
                            <td>居住地地區：
                                <select name="mem_area" id="mem_area">
                                    <option value="">請選擇</option>
                                    <option value="基隆市">基隆市</option>
                                    <option value="台北市">台北市</option>
                                    <option value="新北市">新北市</option>
                                    <option value="宜蘭縣">宜蘭縣</option>
                                    <option value="桃園市">桃園市</option>
                                    <option value="新竹縣">新竹縣</option>
                                    <option value="新竹市">新竹市</option>
                                    <option value="苗栗縣">苗栗縣</option>
                                    <option value="苗栗市">苗栗市</option>
                                    <option value="台中市">台中市</option>
                                    <option value="彰化縣">彰化縣</option>
                                    <option value="彰化市">彰化市</option>
                                    <option value="南投縣">南投縣</option>
                                    <option value="嘉義縣">嘉義縣</option>
                                    <option value="嘉義市">嘉義市</option>
                                    <option value="雲林縣">雲林縣</option>
                                    <option value="台南市" selected>台南市</option>
                                    <option value="高雄市">高雄市</option>
                                    <option value="屏東縣">屏東縣</option>
                                    <option value="花蓮縣">花蓮縣</option>
                                    <option value="台東縣">台東縣</option>
                                    <option value="澎湖縣">澎湖縣</option>
                                    <option value="金門縣">金門縣</option>
                                    <option value="馬祖">馬祖</option>
                                    <option value="綠島">綠島</option>
                                    <option value="蘭嶼">蘭嶼</option>
                                    <option value="其他">其他</option>
                                </select>
                                &nbsp;&nbsp;地址：
                                <input name="mem_address" tabindex="99" type="text" id="mem_address" class="form-control" style="width:60%" value="新化區蔡厝仔14號">
                            </td>
                        </tr>
                        <tr>
                            <td>戶籍地地區：
                                <select name="mem_area2" id="mem_area2">
                                    <option value="">請選擇</option>
                                    <option value="基隆市">基隆市</option>
                                    <option value="台北市">台北市</option>
                                    <option value="新北市">新北市</option>
                                    <option value="宜蘭縣">宜蘭縣</option>
                                    <option value="桃園市">桃園市</option>
                                    <option value="新竹縣">新竹縣</option>
                                    <option value="新竹市">新竹市</option>
                                    <option value="苗栗縣">苗栗縣</option>
                                    <option value="苗栗市">苗栗市</option>
                                    <option value="台中市">台中市</option>
                                    <option value="彰化縣">彰化縣</option>
                                    <option value="彰化市">彰化市</option>
                                    <option value="南投縣">南投縣</option>
                                    <option value="嘉義縣">嘉義縣</option>
                                    <option value="嘉義市">嘉義市</option>
                                    <option value="雲林縣">雲林縣</option>
                                    <option value="台南市">台南市</option>
                                    <option value="高雄市">高雄市</option>
                                    <option value="屏東縣">屏東縣</option>
                                    <option value="花蓮縣">花蓮縣</option>
                                    <option value="台東縣">台東縣</option>
                                    <option value="澎湖縣">澎湖縣</option>
                                    <option value="金門縣">金門縣</option>
                                    <option value="馬祖">馬祖</option>
                                    <option value="綠島">綠島</option>
                                    <option value="蘭嶼">蘭嶼</option>
                                    <option value="其他">其他</option>
                                </select>
                                &nbsp;&nbsp;地址：
                                <input tabindex="99" name="mem_address2" type="text" id="mem_address2" class="form-control" style="width:60%" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>學歷：
                                <select name="mem_school" id="mem_school">
                                    <option value="">請選擇</option>
                                    <option value="博士">博士</option>
                                    <option value="碩士">碩士</option>
                                    <option value="大學">大學</option>
                                    <option value="專科">專科</option>
                                    <option value="高職" selected>高職</option>
                                    <option value="高中">高中</option>
                                    <option value="國中">國中</option>
                                    <option value="其他">其他</option>
                                </select>
                                　學校名稱：
                                <select name="mem_school4" id="mem_school4">
                                    <option value="">請選擇</option>
                                    <option value="國立" selected>國立</option>
                                    <option value="私立">私立</option>
                                    <option value="海外">海外</option>
                                </select>
                                <input name="mem_school2" type="text" id="mem_school2" class="form-control" value="新化高工">
                                　科系名稱：
                                <input name="mem_school3" type="text" id="mem_school3" class="form-control" value="">
                            </td>
                        </tr>

                        <tr>
                            <td>職業：
                                <select name="mem_job1" id="mem_job1">
                                    <option value="公務/國家機關">公務/國家機關</option>
                                    <option value="司法/法務">司法/法務</option>
                                    <option value="軍警單位">軍警單位</option>
                                    <option value="自營/投資" selected>自營/投資</option>
                                    <option value="電腦/網路">電腦/網路</option>
                                    <option value="電子/通信/電器">電子/通信/電器</option>
                                    <option value="教育/研究單位">教育/研究單位</option>
                                    <option value="醫療/護理服務業">醫療/護理服務業</option>
                                    <option value="媒體傳播/出版業">媒體傳播/出版業</option>
                                    <option value="藝術/音樂/設計">藝術/音樂/設計</option>
                                    <option value="建築/裝修/物業">建築/裝修/物業</option>
                                    <option value="營銷/業務">營銷/業務</option>
                                    <option value="文化/演藝/娛樂業">文化/演藝/娛樂業</option>
                                    <option value="金融/證券/財會/保險">金融/證券/財會/保險</option>
                                    <option value="專利商標/諮詢服務業">專利商標/諮詢服務業</option>
                                    <option value="生產製造業">生產製造業</option>
                                    <option value="旅遊服務業">旅遊服務業</option>
                                    <option value="運輸服務業">運輸服務業</option>
                                    <option value="百貨/零售業">百貨/零售業</option>
                                    <option value="餐飲服務業">餐飲服務業</option>
                                    <option value="美容/美髮業">美容/美髮業</option>
                                    <option value="農林漁牧業">農林漁牧業</option>
                                    <option value="自由業/其它">自由業/其它</option>
                                    <option value="在校學生">在校學生</option>
                                    <option value="業務/仲价業">業務/仲价業</option>

                                </select>
                                　公司名稱：
                                <input name="company" type="text" id="company" class="form-control" value="群茂工程行">
                                　年資：
                                <div class="input-group">
                                    <input name="company_year" type="number" id="company_year" class="form-control" style="width:100px" value="0">
                                    <div class="input-group-addon">年</div>
                                </div>
                                　職務名稱：
                                <input name="mem_job2" type="text" id="mem_job2" class="form-control" value="負責人">
                            </td>
                        </tr>
                        <tr>
                            <td>經濟狀況：年收入約 <select name="mem_money" id="mem_money">
                                    <option value="">請選擇</option>
                                    <option value="50萬以下">50萬以下</option>
                                    <option value="51萬到80萬">51萬到80萬</option>
                                    <option value="81萬到100萬">81萬到100萬</option>
                                    <option value="101萬到199萬" selected>101萬到199萬</option>
                                    <option value="200萬以上">200萬以上</option>
                                </select>&nbsp;&nbsp;
                                <select name="mem_money_des" id="mem_money_des">
                                    <option value="">請選擇</option>
                                    <option value="自足">自足</option>
                                    <option value="小康">小康</option>
                                    <option value="中上">中上</option>
                                    <option value="富有">富有</option>
                                </select>
                                <!--月收：<input type="number" name="mem_money_m" id="mem_money_m" class="form-control" value="">-->
                                年收：
                                <div class="input-group">
                                    <input type="number" name="mem_money_y" id="mem_money_y" class="form-control" value="0">
                                    <span class="input-group-addon">元</span>
                                </div>
                                &nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="mem_car" id="mem_car" value="1" checked><i></i>有車</label>&nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="mem_house" id="mem_house" value="1" checked><i></i>有房</label>
                            </td>
                        </tr>

                        <tr>
                        <tr>
                            <td>
                                身高：
                                <input name="mem_he" type="text" id="mem_he" class="form-control" value="165" onkeyup="bmicount()">
                                公分
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                體重：
                                <input name="mem_we" type="text" id="mem_we" class="form-control" value="90" onkeyup="bmicount()">
                                公斤
                                <select id="mem_wet" name="mem_wet">
                                    <option value="">體重描述(身型)</option>

                                    <option value="苗條">苗條</option>
                                    <option value="普通">普通</option>
                                    <option value="豐腴">豐腴</option>
                                    <option value="有肌肉">有肌肉</option>
                                    <option value="豐滿">豐滿</option>
                                    <option value="肥胖">肥胖</option>
                                    <option value="偏瘦">偏瘦(<18)< /option>
                                    <option value="中等">中等(18.1~24)</option>
                                    <option value="偏肉" selected>偏肉(>24)</option>
                                </select>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                BMI：
                                <input name="mem_bmi" type="text" id="mem_bmi" class="form-control" value="33.1" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>E-mail：
                                <input name="mem_mail" type="text" id="mem_mail" class="form-control" value="">
                                　LINE ID：
                                <input name="mem_msn" type="text" id="mem_msn" class="form-control" value="">
                            </td>
                        </tr>


                        <td>
                            個性：<select name="mem4">
                                <option value="" selected>請選擇</option>
                                <option value="內向">內向</option>
                                <option value="外向">外向</option>
                                <option value="隨和">隨和</option>
                                <option value="嚴謹">嚴謹</option>
                                <option value="善良熱情">善良熱情</option>
                                <option value="陽光">陽光</option>
                                <option value="不拘">不拘</option>
                            </select>
                            &nbsp;&nbsp;
                            抽菸：<select name="mem7">
                                <option value="">請選擇</option>
                                <option value="是">是</option>
                                <option value="否">否</option>
                                <option value="偶爾">偶爾</option>
                            </select>
                            &nbsp;&nbsp;
                            喝酒：<select name="mem8">
                                <option value="">請選擇</option>
                                <option value="是">是</option>
                                <option value="否">否</option>
                                <option value="偶爾">偶爾</option>
                            </select>
                            &nbsp;&nbsp;
                            飲食：<select name="mem22">
                                <option value="">請選擇</option>
                                <option value="不拘">不拘</option>
                                <option value="全素">全素</option>
                                <option value="鍋邊素">鍋邊素</option>
                                <option value="奶蛋素">奶蛋素</option>
                                <option value="吃辣">吃辣</option>
                                <option value="不吃辣">不吃辣</option>
                                <option value="葷食">葷食</option>
                            </select>
                            &nbsp;&nbsp;
                            信仰：
                            <select name="mem6" id="mem6">
                                <option value="無" selected>無</option>
                                <option value="佛道教">佛道教</option>
                                <option value="基督教">基督教</option>
                                <option value="天主教">天主教</option>
                                <option value="一貫道">一貫道</option>
                                <option value="其他">其他</option>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td>婚姻狀態：
                                <label class="radio"><input name="mem_marry" type="radio" value="未婚"><i></i>未婚</label><label class="radio"><input name="mem_marry" type="radio" value="離婚"><i></i>離婚</label><label class="radio"><input name="mem_marry" type="radio" value="離婚沒小孩"><i></i>離婚沒小孩</label><label class="radio"><input name="mem_marry" type="radio" value="離婚有小孩"><i></i>離婚有小孩</label><label class="radio"><input name="mem_marry" type="radio" value="喪偶" checked><i></i>喪偶</label><label class="radio"><input name="mem_marry" type="radio" value="已婚"><i></i>已婚</label><label class="radio"><input name="mem_marry" type="radio" value="保密"><i></i>保密</label><label class="radio"><input name="mem_marry" type="radio" value="交往中"><i></i>交往中</label><label class="radio"><input name="mem_marry" type="radio" value="有心儀對象"><i></i>有心儀對象</label>

                            </td>
                        </tr>
                        <tr>
                            <td>自我介紹：<font color=red>(請注意此區文字將會在網站顯示，除自我介紹外勿填入其他資訊，如需清除文字請輸入空格)</font><br>
                                <div id="mem_note_div"></div>
                                <a id="mem_note_a" href="#v" onclick="mem_note_edit()">點擊修改</a>
                                <textarea id="mem_note" name="mem_note" cols="100" rows="8" id="textarea" class="form-control" style="display:none"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox"><input type="checkbox" name="mem_photo_show" id="mem_photo_show" value="1"><i></i>前台不顯示照片</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="no_mail1" id="no_mail1" value="1"><i></i>電子信件通知</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="no_mail2" id="no_mail2" value="1"><i></i>簡訊通知</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="no_mail4" id="no_mail4" value="1"><i></i>約會邀請被拒絕通知</label>&nbsp;&nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="checkbox"><input type="checkbox" name="si_enterprise" id="si_enterprise" value="1"><i></i>企業會員</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_vip" id="mem_vip" value="1"><i></i>優質會員</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot" id="mem_hot" value="1"><i></i>超人氣會員</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot_in" id="mem_hot_in" value="1"><i></i>春天首頁超人氣會員</label>

                                <label class="checkbox"><input type="checkbox" name="singleparty_hot_check" id="singleparty_hot_check" value="1"><i></i>約專首頁推薦會員</label>

                            </td>
                        </tr>
                        <tr>
                            <td>

                                <label class="checkbox"><input type="checkbox" name="mem_hot3" id="mem_hot3" value="1"><i></i>醫師、教師、律師</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot1" id="mem_hot1" value="1"><i></i>碩博士、科技新貴</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot6" id="mem_hot6" value="1"><i></i>百萬年薪俱樂部</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot5" id="mem_hot5" value="1"><i></i>BOSS、高階主管</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot4" id="mem_hot4" value="1"><i></i>軍警、公務人員</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot2" id="mem_hot2" value="1"><i></i>金融服務</label>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                首頁頁籤：<select name="mem_tag" id="mem_tag">
                                    <option value="">無</option>
                                    <option value="百大科技">百大科技</option>
                                    <option value="公教醫護">公教醫護</option>
                                    <option value="傳播藝術">傳播藝術</option>
                                    <option value="餐飲服務">餐飲服務</option>
                                    <option value="金融保險">金融保險</option>
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <td>興趣：
                                <label class="checkbox"><input type="checkbox" name="mem18" value="做菜"><i></i>做菜</label><label class="checkbox"><input type="checkbox" name="mem18" value="郊遊"><i></i>郊遊</label><label class="checkbox"><input type="checkbox" name="mem18" value="登山"><i></i>登山</label><label class="checkbox"><input type="checkbox" name="mem18" value="兜風"><i></i>兜風</label><label class="checkbox"><input type="checkbox" name="mem18" value="逛街"><i></i>逛街</label><label class="checkbox"><input type="checkbox" name="mem18" value="看電影"><i></i>看電影</label><label class="checkbox"><input type="checkbox" name="mem18" value="閱讀"><i></i>閱讀</label><label class="checkbox"><input type="checkbox" name="mem18" value="騎小折"><i></i>騎小折</label><label class="checkbox"><input type="checkbox" name="mem18" value="游泳"><i></i>游泳</label><label class="checkbox"><input type="checkbox" name="mem18" value="品嘗美食"><i></i>品嘗美食</label><label class="checkbox"><input type="checkbox" name="mem18" value="旅遊"><i></i>旅遊</label><label class="checkbox"><input type="checkbox" name="mem18" value="冒險"><i></i>冒險</label><label class="checkbox"><input type="checkbox" name="mem18" value="寫作"><i></i>寫作</label><label class="checkbox"><input type="checkbox" name="mem18" value="上山下海"><i></i>上山下海</label><label class="checkbox"><input type="checkbox" name="mem18" value="運動"><i></i>運動</label><label class="checkbox"><input type="checkbox" name="mem18" value="慢跑"><i></i>慢跑</label><label class="checkbox"><input type="checkbox" name="mem18" value="看風景"><i></i>看風景</label><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="mem18" value="散步"><i></i>散步</label><label class="checkbox"><input type="checkbox" name="mem18" value="園藝"><i></i>園藝</label><label class="checkbox"><input type="checkbox" name="mem18" value="水族"><i></i>水族</label><label class="checkbox"><input type="checkbox" name="mem18" value="財經"><i></i>財經</label><label class="checkbox"><input type="checkbox" name="mem18" value="拼圖"><i></i>拼圖</label><label class="checkbox"><input type="checkbox" name="mem18" value="咖啡"><i></i>咖啡</label><label class="checkbox"><input type="checkbox" name="mem18" value="宅在家裡"><i></i>宅在家裡</label><label class="checkbox"><input type="checkbox" name="mem18" value="買東西"><i></i>買東西</label><label class="checkbox"><input type="checkbox" name="mem18" value="插花"><i></i>插花</label><label class="checkbox"><input type="checkbox" name="mem18" value="繪畫"><i></i>繪畫</label><label class="checkbox"><input type="checkbox" name="mem18" value="逛展覽"><i></i>逛展覽</label>

                                <br>
                                其他興趣：<input type="text" class="form-control" name="mem181" style="width:80%" value="">

                            </td>
                        </tr>
                        <tr>
                            <td>外型：<input type="text" name="mem_da2" id="mem_da2" class="form-control" style="width:80%" value=""></td>
                        </tr>
                        <tr>
                            <td>內在：<input type="text" name="mem_da3" id="mem_da3" class="form-control" style="width:80%" value=""></td>
                        </tr>
                        <tr>
                            <td>資料速報：<input type="text" name="mem_da6" id="mem_da6" class="form-control" style="width:80%" value=""></td>
                        </tr>

                        <tr>
                            <td style="font-size:150%;color:blue"><b>擇友條件</b></td>
                        </tr>
                        <tr>
                            <td>婚況：
                                <label class="checkbox"><input type="checkbox" name="sel_marry" value="未婚"><i></i>未婚</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="離婚"><i></i>離婚</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="離婚沒小孩"><i></i>離婚沒小孩</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="離婚有小孩"><i></i>離婚有小孩</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="喪偶"><i></i>喪偶</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="已婚"><i></i>已婚</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="保密"><i></i>保密</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="交往中"><i></i>交往中</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="有心儀對象"><i></i>有心儀對象</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>學歷：
                                <label class="checkbox"><input type="checkbox" name="sel_school" value="博士"><i></i>博士</label><label class="checkbox"><input type="checkbox" name="sel_school" value="碩士"><i></i>碩士</label><label class="checkbox"><input type="checkbox" name="sel_school" value="大學"><i></i>大學</label><label class="checkbox"><input type="checkbox" name="sel_school" value="專科"><i></i>專科</label><label class="checkbox"><input type="checkbox" name="sel_school" value="高職"><i></i>高職</label><label class="checkbox"><input type="checkbox" name="sel_school" value="高中"><i></i>高中</label><label class="checkbox"><input type="checkbox" name="sel_school" value="國中"><i></i>國中</label><label class="checkbox"><input type="checkbox" name="sel_school" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>宗教：
                                <label class="checkbox"><input type="checkbox" name="sel_mem6" value="佛道教"><i></i>佛道教</label><label class="checkbox"><input type="checkbox" name="sel_mem6" value="基督教"><i></i>基督教</label><label class="checkbox"><input type="checkbox" name="sel_mem6" value="天主教"><i></i>天主教</label><label class="checkbox"><input type="checkbox" name="sel_mem6" value="一貫道"><i></i>一貫道</label><label class="checkbox"><input type="checkbox" name="sel_mem6" value="無"><i></i>無</label><label class="checkbox"><input type="checkbox" name="sel_mem6" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>職業：
                                <label class="checkbox"><input type="checkbox" name="sel_job" value="公務/國家機關"><i></i>公務/國家機關</label><label class="checkbox"><input type="checkbox" name="sel_job" value="司法/法務"><i></i>司法/法務</label><label class="checkbox"><input type="checkbox" name="sel_job" value="軍警單位"><i></i>軍警單位</label><label class="checkbox"><input type="checkbox" name="sel_job" value="自營/投資"><i></i>自營/投資</label><label class="checkbox"><input type="checkbox" name="sel_job" value="電腦/網路"><i></i>電腦/網路</label><label class="checkbox"><input type="checkbox" name="sel_job" value="電子/通信/電器"><i></i>電子/通信/電器</label><label class="checkbox"><input type="checkbox" name="sel_job" value="教育/研究單位"><i></i>教育/研究單位</label><label class="checkbox"><input type="checkbox" name="sel_job" value="醫療/護理服務業"><i></i>醫療/護理服務業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="媒體傳播/出版業"><i></i>媒體傳播/出版業</label><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="sel_job" value="藝術/音樂/設計"><i></i>藝術/音樂/設計</label><label class="checkbox"><input type="checkbox" name="sel_job" value="建築/裝修/物業"><i></i>建築/裝修/物業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="營銷/業務"><i></i>營銷/業務</label><label class="checkbox"><input type="checkbox" name="sel_job" value="文化/演藝/娛樂業"><i></i>文化/演藝/娛樂業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="金融/證券/財會/保險"><i></i>金融/證券/財會/保險</label><label class="checkbox"><input type="checkbox" name="sel_job" value="專利商標/諮詢服務業"><i></i>專利商標/諮詢服務業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="生產製造業"><i></i>生產製造業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="旅遊服務業"><i></i>旅遊服務業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="運輸服務業"><i></i>運輸服務業</label><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="sel_job" value="百貨/零售業"><i></i>百貨/零售業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="餐飲服務業"><i></i>餐飲服務業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="美容/美髮業"><i></i>美容/美髮業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="農林漁牧業"><i></i>農林漁牧業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="自由業/其它"><i></i>自由業/其它</label><label class="checkbox"><input type="checkbox" name="sel_job" value="在校學生"><i></i>在校學生</label><label class="checkbox"><input type="checkbox" name="sel_job" value="業務/仲价業"><i></i>業務/仲价業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>個性：
                                <label class="checkbox"><input type="checkbox" name="sel_mem4" value="內向"><i></i>內向</label><label class="checkbox"><input type="checkbox" name="sel_mem4" value="外向"><i></i>外向</label><label class="checkbox"><input type="checkbox" name="sel_mem4" value="隨和"><i></i>隨和</label><label class="checkbox"><input type="checkbox" name="sel_mem4" value="嚴謹"><i></i>嚴謹</label><label class="checkbox"><input type="checkbox" name="sel_mem4" value="善良熱情"><i></i>善良熱情</label><label class="checkbox"><input type="checkbox" name="sel_mem4" value="陽光"><i></i>陽光</label><label class="checkbox"><input type="checkbox" name="sel_mem4" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>經濟：
                                <label class="checkbox"><input type="checkbox" name="sel_money_des" value="富有"><i></i>富有</label><label class="checkbox"><input type="checkbox" name="sel_money_des" value="中上"><i></i>中上</label><label class="checkbox"><input type="checkbox" name="sel_money_des" value="小康"><i></i>小康</label><label class="checkbox"><input type="checkbox" name="sel_money_des" value="自足"><i></i>自足</label><label class="checkbox"><input type="checkbox" name="sel_money_des" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>年收入：
                                <label class="checkbox"><input type="checkbox" name="sel_money" value="50萬以下"><i></i>50萬以下</label><label class="checkbox"><input type="checkbox" name="sel_money" value="51萬到80萬"><i></i>51萬到80萬</label><label class="checkbox"><input type="checkbox" name="sel_money" value="81萬到100萬"><i></i>81萬到100萬</label><label class="checkbox"><input type="checkbox" name="sel_money" value="101萬到199萬"><i></i>101萬到199萬</label><label class="checkbox"><input type="checkbox" name="sel_money" value="200萬以上"><i></i>200萬以上</label><label class="checkbox"><input type="checkbox" name="sel_money" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>年齡：
                                <select name="sel_y1" id="sel_y1">
                                    <option value="">不限</option>
                                    <option value="1941">1941 年/民國 30 年</option>
                                    <option value="1942">1942 年/民國 31 年</option>
                                    <option value="1943">1943 年/民國 32 年</option>
                                    <option value="1944">1944 年/民國 33 年</option>
                                    <option value="1945">1945 年/民國 34 年</option>
                                    <option value="1946">1946 年/民國 35 年</option>
                                    <option value="1947">1947 年/民國 36 年</option>
                                    <option value="1948">1948 年/民國 37 年</option>
                                    <option value="1949">1949 年/民國 38 年</option>
                                    <option value="1950">1950 年/民國 39 年</option>
                                    <option value="1951">1951 年/民國 40 年</option>
                                    <option value="1952">1952 年/民國 41 年</option>
                                    <option value="1953">1953 年/民國 42 年</option>
                                    <option value="1954">1954 年/民國 43 年</option>
                                    <option value="1955">1955 年/民國 44 年</option>
                                    <option value="1956">1956 年/民國 45 年</option>
                                    <option value="1957">1957 年/民國 46 年</option>
                                    <option value="1958">1958 年/民國 47 年</option>
                                    <option value="1959">1959 年/民國 48 年</option>
                                    <option value="1960">1960 年/民國 49 年</option>
                                    <option value="1961">1961 年/民國 50 年</option>
                                    <option value="1962">1962 年/民國 51 年</option>
                                    <option value="1963" selected>1963 年/民國 52 年</option>
                                    <option value="1964">1964 年/民國 53 年</option>
                                    <option value="1965">1965 年/民國 54 年</option>
                                    <option value="1966">1966 年/民國 55 年</option>
                                    <option value="1967">1967 年/民國 56 年</option>
                                    <option value="1968">1968 年/民國 57 年</option>
                                    <option value="1969">1969 年/民國 58 年</option>
                                    <option value="1970">1970 年/民國 59 年</option>
                                    <option value="1971">1971 年/民國 60 年</option>
                                    <option value="1972">1972 年/民國 61 年</option>
                                    <option value="1973">1973 年/民國 62 年</option>
                                    <option value="1974">1974 年/民國 63 年</option>
                                    <option value="1975">1975 年/民國 64 年</option>
                                    <option value="1976">1976 年/民國 65 年</option>
                                    <option value="1977">1977 年/民國 66 年</option>
                                    <option value="1978">1978 年/民國 67 年</option>
                                    <option value="1979">1979 年/民國 68 年</option>
                                    <option value="1980">1980 年/民國 69 年</option>
                                    <option value="1981">1981 年/民國 70 年</option>
                                    <option value="1982">1982 年/民國 71 年</option>
                                    <option value="1983">1983 年/民國 72 年</option>
                                    <option value="1984">1984 年/民國 73 年</option>
                                    <option value="1985">1985 年/民國 74 年</option>
                                    <option value="1986">1986 年/民國 75 年</option>
                                    <option value="1987">1987 年/民國 76 年</option>
                                    <option value="1988">1988 年/民國 77 年</option>
                                    <option value="1989">1989 年/民國 78 年</option>
                                    <option value="1990">1990 年/民國 79 年</option>
                                    <option value="1991">1991 年/民國 80 年</option>
                                    <option value="1992">1992 年/民國 81 年</option>
                                    <option value="1993">1993 年/民國 82 年</option>
                                    <option value="1994">1994 年/民國 83 年</option>
                                    <option value="1995">1995 年/民國 84 年</option>
                                    <option value="1996">1996 年/民國 85 年</option>
                                    <option value="1997">1997 年/民國 86 年</option>
                                    <option value="1998">1998 年/民國 87 年</option>
                                    <option value="1999">1999 年/民國 88 年</option>
                                    <option value="2000">2000 年/民國 89 年</option>
                                    <option value="2001">2001 年/民國 90 年</option>
                                </select>
                                到
                                <select name="sel_y2" id="sel_y2">
                                    <option value="">不限</option>
                                    <option value="1941">1941 年/民國 30 年</option>
                                    <option value="1942">1942 年/民國 31 年</option>
                                    <option value="1943">1943 年/民國 32 年</option>
                                    <option value="1944">1944 年/民國 33 年</option>
                                    <option value="1945">1945 年/民國 34 年</option>
                                    <option value="1946">1946 年/民國 35 年</option>
                                    <option value="1947">1947 年/民國 36 年</option>
                                    <option value="1948">1948 年/民國 37 年</option>
                                    <option value="1949">1949 年/民國 38 年</option>
                                    <option value="1950">1950 年/民國 39 年</option>
                                    <option value="1951">1951 年/民國 40 年</option>
                                    <option value="1952">1952 年/民國 41 年</option>
                                    <option value="1953">1953 年/民國 42 年</option>
                                    <option value="1954">1954 年/民國 43 年</option>
                                    <option value="1955">1955 年/民國 44 年</option>
                                    <option value="1956">1956 年/民國 45 年</option>
                                    <option value="1957">1957 年/民國 46 年</option>
                                    <option value="1958">1958 年/民國 47 年</option>
                                    <option value="1959">1959 年/民國 48 年</option>
                                    <option value="1960">1960 年/民國 49 年</option>
                                    <option value="1961">1961 年/民國 50 年</option>
                                    <option value="1962">1962 年/民國 51 年</option>
                                    <option value="1963">1963 年/民國 52 年</option>
                                    <option value="1964">1964 年/民國 53 年</option>
                                    <option value="1965">1965 年/民國 54 年</option>
                                    <option value="1966">1966 年/民國 55 年</option>
                                    <option value="1967">1967 年/民國 56 年</option>
                                    <option value="1968">1968 年/民國 57 年</option>
                                    <option value="1969">1969 年/民國 58 年</option>
                                    <option value="1970">1970 年/民國 59 年</option>
                                    <option value="1971">1971 年/民國 60 年</option>
                                    <option value="1972">1972 年/民國 61 年</option>
                                    <option value="1973" selected>1973 年/民國 62 年</option>
                                    <option value="1974">1974 年/民國 63 年</option>
                                    <option value="1975">1975 年/民國 64 年</option>
                                    <option value="1976">1976 年/民國 65 年</option>
                                    <option value="1977">1977 年/民國 66 年</option>
                                    <option value="1978">1978 年/民國 67 年</option>
                                    <option value="1979">1979 年/民國 68 年</option>
                                    <option value="1980">1980 年/民國 69 年</option>
                                    <option value="1981">1981 年/民國 70 年</option>
                                    <option value="1982">1982 年/民國 71 年</option>
                                    <option value="1983">1983 年/民國 72 年</option>
                                    <option value="1984">1984 年/民國 73 年</option>
                                    <option value="1985">1985 年/民國 74 年</option>
                                    <option value="1986">1986 年/民國 75 年</option>
                                    <option value="1987">1987 年/民國 76 年</option>
                                    <option value="1988">1988 年/民國 77 年</option>
                                    <option value="1989">1989 年/民國 78 年</option>
                                    <option value="1990">1990 年/民國 79 年</option>
                                    <option value="1991">1991 年/民國 80 年</option>
                                    <option value="1992">1992 年/民國 81 年</option>
                                    <option value="1993">1993 年/民國 82 年</option>
                                    <option value="1994">1994 年/民國 83 年</option>
                                    <option value="1995">1995 年/民國 84 年</option>
                                    <option value="1996">1996 年/民國 85 年</option>
                                    <option value="1997">1997 年/民國 86 年</option>
                                    <option value="1998">1998 年/民國 87 年</option>
                                    <option value="1999">1999 年/民國 88 年</option>
                                    <option value="2000">2000 年/民國 89 年</option>
                                    <option value="2001">2001 年/民國 90 年</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>居住區域：
                                <label class="checkbox"><input type="checkbox" name="sel_area" value="北部"><i></i>北部</label><label class="checkbox"><input type="checkbox" name="sel_area" value="中部"><i></i>中部</label><label class="checkbox"><input type="checkbox" name="sel_area" value="南部"><i></i>南部</label><label class="checkbox"><input type="checkbox" name="sel_area" value="台北"><i></i>台北</label><label class="checkbox"><input type="checkbox" name="sel_area" value="桃竹苗"><i></i>桃竹苗</label><label class="checkbox"><input type="checkbox" name="sel_area" value="中彰投"><i></i>中彰投</label><label class="checkbox"><input type="checkbox" name="sel_area" value="雲嘉南"><i></i>雲嘉南</label><label class="checkbox"><input type="checkbox" name="sel_area" value="高屏"><i></i>高屏</label><label class="checkbox"><input type="checkbox" name="sel_area" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>星座：
                                <label class="checkbox"><input type="checkbox" name="sel_star" value="牡羊座"><i></i>牡羊座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="金牛座"><i></i>金牛座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="雙子座"><i></i>雙子座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="巨蟹座"><i></i>巨蟹座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="獅子座"><i></i>獅子座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="處女座"><i></i>處女座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="天秤座"><i></i>天秤座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="天蠍座"><i></i>天蠍座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="射手座"><i></i>射手座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="魔羯座"><i></i>魔羯座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="水瓶座"><i></i>水瓶座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="雙魚座"><i></i>雙魚座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>身高：<input type="text" name="sel_he1" id="sel_he1" class="form-control" style="width:100px" value=""> - <input type="text" name="sel_he2" id="sel_he2" class="form-control" style="width:100px" value=""> 公分
                            </td>
                        </tr>
                        <tr>
                            <td>身型：
                                <label class="checkbox"><input type="checkbox" name="sel_wet" value="苗條"><i></i>苗條</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="普通"><i></i>普通</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="豐腴"><i></i>豐腴</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="有肌肉"><i></i>有肌肉</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="豐滿"><i></i>豐滿</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="肥胖"><i></i>肥胖</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="偏瘦"><i></i>偏瘦(<18)< /label><label class="checkbox"><input type="checkbox" name="sel_wet" value="中等"><i></i>中等(18.1~24)</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="偏肉"><i></i>偏肉(>24)</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>社交性：
                                <label class="checkbox"><input type="checkbox" name="sel_sociability" value="喜歡與多人相處"><i></i>喜歡與多人相處</label><label class="checkbox"><input type="checkbox" name="sel_sociability" value="喜歡與少數人相處"><i></i>喜歡與少數人相處</label><label class="checkbox"><input type="checkbox" name="sel_sociability" value="喜歡獨處"><i></i>喜歡獨處</label><label class="checkbox"><input type="checkbox" name="sel_sociability" value="很熟"><i></i>很熟</label><label class="checkbox"><input type="checkbox" name="sel_sociability" value="慢熟"><i></i>慢熟</label><label class="checkbox"><input type="checkbox" name="sel_sociability" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>交友觀點：
                                <label class="checkbox"><input type="checkbox" name="sel_view" value="純粹擴大交友"><i></i>純粹擴大交友</label><label class="checkbox"><input type="checkbox" name="sel_view" value="尋找談戀愛對象"><i></i>尋找談戀愛對象</label><label class="checkbox"><input type="checkbox" name="sel_view" value="尋找依靠終身伴侶"><i></i>尋找依靠終身伴侶</label><label class="checkbox"><input type="checkbox" name="sel_view" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>抽菸：
                                <label class="checkbox"><input type="checkbox" name="sel_mem7" value="是"><i></i>是</label><label class="checkbox"><input type="checkbox" name="sel_mem7" value="否"><i></i>否</label><label class="checkbox"><input type="checkbox" name="sel_mem7" value="偶爾"><i></i>偶爾</label><label class="checkbox"><input type="checkbox" name="sel_mem7" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>喝酒：
                                <label class="checkbox"><input type="checkbox" name="sel_mem8" value="是"><i></i>是</label><label class="checkbox"><input type="checkbox" name="sel_mem8" value="否"><i></i>否</label><label class="checkbox"><input type="checkbox" name="sel_mem8" value="偶爾"><i></i>偶爾</label><label class="checkbox"><input type="checkbox" name="sel_mem8" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>飲食：
                                <label class="checkbox"><input type="checkbox" name="sel_mem22" value="全素"><i></i>全素</label><label class="checkbox"><input type="checkbox" name="sel_mem22" value="鍋邊素"><i></i>鍋邊素</label><label class="checkbox"><input type="checkbox" name="sel_mem22" value="奶蛋素"><i></i>奶蛋素</label><label class="checkbox"><input type="checkbox" name="sel_mem22" value="吃辣"><i></i>吃辣</label><label class="checkbox"><input type="checkbox" name="sel_mem22" value="不吃辣"><i></i>不吃辣</label><label class="checkbox"><input type="checkbox" name="sel_mem22" value="葷食"><i></i>葷食</label><label class="checkbox"><input type="checkbox" name="sel_mem22" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>忌諱：<input type="text" name="mem_da4" id="mem_da4" class="form-control" style="width:80%" value=""></td>
                        </tr>
                        <tr>
                            <td>擇友條件：<input type="text" name="mem_da5" id="mem_da5" class="form-control" style="width:80%" value=""></td>
                        </tr>
                        <tr>
                            <td style="font-size:150%;color:blue"><b>其他事項</b></td>
                        </tr>
                        <tr>
                            <td>備註說明：<textarea id="sys_note" name="sys_note" style="width:80%" rows="8" id="textarea" class="form-control"></textarea> </td>
                        </tr>
                        <tr>
                            <td>備註說明：<textarea id="tosinglenote" name="tosinglenote" style="width:80%" rows="8" id="textarea" class="form-control" readonly></textarea></td>
                        </tr>
                        <tr>
                            <td>方便聯繫時間：
                                <label class="checkbox"><input type="checkbox" name="can_call" value="星期一"><i></i>星期一</label><label class="checkbox"><input type="checkbox" name="can_call" value="星期二"><i></i>星期二</label><label class="checkbox"><input type="checkbox" name="can_call" value="星期三"><i></i>星期三</label><label class="checkbox"><input type="checkbox" name="can_call" value="星期四"><i></i>星期四</label><label class="checkbox"><input type="checkbox" name="can_call" value="星期五"><i></i>星期五</label><label class="checkbox"><input type="checkbox" name="can_call" value="星期六"><i></i>星期六</label><label class="checkbox"><input type="checkbox" name="can_call" value="星期日"><i></i>星期日</label><label class="checkbox"><input type="checkbox" name="can_call" value="上午"><i></i>上午</label><label class="checkbox"><input type="checkbox" name="can_call" value="下午"><i></i>下午</label><label class="checkbox"><input type="checkbox" name="can_call" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>可以排約時間：
                                <label class="checkbox"><input type="checkbox" name="can_love" value="星期一"><i></i>星期一</label><label class="checkbox"><input type="checkbox" name="can_love" value="星期二"><i></i>星期二</label><label class="checkbox"><input type="checkbox" name="can_love" value="星期三"><i></i>星期三</label><label class="checkbox"><input type="checkbox" name="can_love" value="星期四"><i></i>星期四</label><label class="checkbox"><input type="checkbox" name="can_love" value="星期五"><i></i>星期五</label><label class="checkbox"><input type="checkbox" name="can_love" value="星期六"><i></i>星期六</label><label class="checkbox"><input type="checkbox" name="can_love" value="星期日"><i></i>星期日</label><label class="checkbox"><input type="checkbox" name="can_love" value="上午"><i></i>上午</label><label class="checkbox"><input type="checkbox" name="can_love" value="下午"><i></i>下午</label><label class="checkbox"><input type="checkbox" name="can_love" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>魅力處方箋01：
                                <label class="checkbox"><input type="checkbox" name="recipe1" value="戀愛講堂"><i></i>戀愛講堂</label><label class="checkbox"><input type="checkbox" name="recipe1" value="魅力有約"><i></i>魅力有約</label><label class="checkbox"><input type="checkbox" name="recipe1" value="品味生活"><i></i>品味生活</label><label class="checkbox"><input type="checkbox" name="recipe1" value="互動美學"><i></i>互動美學</label>
                            </td>
                        </tr>
                        <tr>
                            <td>魅力處方箋02：
                                <label class="checkbox"><input type="checkbox" name="recipe2" value="輕旅行"><i></i>輕旅行</label><label class="checkbox"><input type="checkbox" name="recipe2" value="主題特別企劃"><i></i>主題特別企劃</label><label class="checkbox"><input type="checkbox" name="recipe2" value="主題精緻餐會"><i></i>主題精緻餐會</label><label class="checkbox"><input type="checkbox" name="recipe2" value="美味廚房"><i></i>美味廚房</label><label class="checkbox"><input type="checkbox" name="recipe2" value="健康料理"><i></i>健康料理</label><label class="checkbox"><input type="checkbox" name="recipe2" value="國外旅遊"><i></i>國外旅遊</label>
                            </td>
                        </tr>
                        <tr>
                            <td>魅力處方箋03：
                                <label class="checkbox"><input type="checkbox" name="recipe3" value="一對一排約"><i></i>一對一排約</label><label class="checkbox"><input type="checkbox" name="recipe3" value="多平台排約"><i></i>多平台排約</label><label class="checkbox"><input type="checkbox" name="recipe3" value="多對多約會"><i></i>多對多約會</label><label class="checkbox"><input type="checkbox" name="recipe3" value="主題式約會"><i></i>主題式約會</label><label class="checkbox"><input type="checkbox" name="recipe3" value="下午茶約會"><i></i>下午茶約會</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="center">
                                    <input name="Submit3" type="submit" value="確定修改" class="btn btn-primary" style="width:50%">
                                    <input name="mem_num" type="hidden" id="mem_num" value="2080022">
                                </div>
                            </td>
                        </tr>
                        </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    <hr>


    <footer>
    </footer>
    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script language="JavaScript" type="text/JavaScript">
    $(function() {
	var $cchecks = "sel_marry,sel_school,sel_mem6,sel_job,sel_mem4,sel_money_des,can_call,can_love,sel_money,sel_area,sel_star,sel_wet,sel_sociability,sel_view,sel_mem7,sel_mem8,sel_mem22";
	$.each($cchecks.split(","), function($v, $k) {		
	$("input[name='"+$k+"']").on("click", function() {
		var $this = $(this);
		if($this.val() == "全選") {
			var $tt = $this.prop("checked");
			$("input[name='"+$k+"']").each(function() {
				if($(this).val() != $this.val() || $(this).val() != "不拘") $(this).prop("checked", $tt);
				if($(this).val() == "不拘") $(this).prop("checked", false);
			});
			return true;
		} else if($this.val() == "不拘") {
			$("input[name='"+$k+"']").each(function() {
				if($(this).val() != $this.val()) $(this).prop("checked", false);
			});
			return true;
		} else {
			$("input[name='"+$k+"']").each(function() {
				if($(this).val() == "不拘") $(this).prop("checked", false);
			});
		}
	});
 });

$("#mem_branch").on("change", function() {
personnel_get_find("mem_branch", "mem_single");
personnel_get_find("mem_branch", "love_single");	
});
$("#call_branch").on("change", function() {
personnel_get_find("call_branch", "call_single");
});


$("#mem_branch").val("台南");
personnel_get_find("mem_branch", "mem_single", "D221429903");
personnel_get_find("mem_branch", "love_single", "R222349969");

$("#call_branch").val("高雄");
personnel_get_find("call_branch", "call_single", "E290076419");

});
function mem_note_edit() {
	$("#mem_note_a,#mem_note_div").hide();	
	$("#mem_note").show();
}
function chk_form(){ //v2.0	
// submit if already checked
    if($("#sform").data("cansend") == 1) {    	
          return true;
    }
var $allc = {"mem_area":"地區","mem_name":"姓名"},
    $allc2 = {"mem_he":"身高","sel_he1":"擇友條件身高","sel_he2":"擇友條件身高","mem_we":"體重", "mem_bmi":"BMI"},
    $rr = 0;
$.each($allc, function(v, k) {
   if(!$("#"+v).val()) {
     alert("請輸入或選擇"+k+"。");
	 $("#"+v).focus();
	 $rr = 1;
	 return false;
   }
});
$.each($allc2, function(v, k) {
   if ($("#"+v).val() && !$.isNumeric($("#"+v).val())) {
     alert(k+"只能輸入數字。");
	 $("#"+v).focus();
	 $rr = 1;
     return false;
   }
});
  if($("#sel_he1").val() || $("#sel_he2").val()) {
  	if(($("#sel_he1").val() && !$("#sel_he2").val()) || ($("#sel_he2").val() && !$("#sel_he1").val())) {
  		alert("擇友條件身高需輸入範圍數字。");
  		$("#sel_he1").focus();	 
  		$rr = 1;
  	}
  	if($("#sel_he1").val() && $("#sel_he2").val()) {
  		if(parseInt($("#sel_he1").val()) > parseInt($("#sel_he2").val())) {
  		alert("擇友條件身高範圍應從小至大。");
  		$("#sel_he1").focus();	 
  		$rr = 1;
  		}
  	}
  }
	if($("#mem_level").val() != "guest") {
		if (!$("#mem_username").val()){		
			alert("入會會員必須要有身分證字號");
			$("#mem_username").focus();
			$rr = 1;
		}
		
		if (!$("#si_account").val()){		
			alert("入會會員必須要有帳號");
			$("#si_account").focus();
			$rr = 1;
		}		
	
		
		/*
		var $re = /.+@.+\.+.[a-zA-Z]{1,4}$/;
   if (!$rr && !$re.test($("#si_account").val())) {
     alert("請輸入正確的帳號(Email)格式。");
	 $rr = 1;
   }
				
		if (!$("#mem_passwd").val()){		
			alert("入會會員必須要有密碼");
			$("#mem_passwd").focus();
			$rr = 1;
		}*/
		
		if (!$("#mem_jy").val() || !$("#mem_jm").val() || !$("#mem_jd").val()){		
			alert("入會會員必須要有入會日");
			$("#mem_jy").focus();
			$rr = 1;
		}
		
	}	
	if($rr) return false;
	
	memusername = $("#mem_username");
	pay1 = $("#mem_branch");
	now_mem_level = $("#now_mem_level");
	
	if(now_mem_level.val() == "guest") {		
	if(pay1.val() && memusername.val() && !$("#iscase").is(":checked")) {
	$.ajax({
  url: "ad_register1.php?st=qusername&b="+pay1.val()+"&v="+memusername.val()
  }).done(function( msg ) {  	
  	
     if(msg == "ok") {
     	
     	$("#mem_username_chk").hide();
     	$("#iscaselabel").hide();
     	$("#iscase").prop("required", false);     	
     	$("#sform").data("cansend", 1);
     	$("#sform").submit();
    } else {
    	alert("未在收支系統有收入紀錄的身分證字號將無法成為會員");
    	$("#mem_username_chk").show();
     	$("#iscaselabel").show();
     	$("#iscase").prop("required", true);
    }
  });
  return false;
  }
  
  }
  	
  return true;
}

han = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789.,-+ ";
zen = "ＡＢＣＤＥＦＧＨＩＪＫＬＭＮＯＰＱＲＳＴＵＶＷＸＹＺ０１２３４５６７８９．，－＋　";
function toZenkakuNum(motoText)
{
	str = "";
	for (i=0; i<motoText.length; i++)
	{
		c = motoText.charAt(i);
		n = zen.indexOf(c,0);
		if (n >= 0) c = han.charAt(n);
		str += c;
	}
	return str;
}
function si_up() {
	
}
function jointimetoday($yy, $ym, $yd) {
	$("#mem_jy").val($yy);
	$("#mem_jm").val($ym);
	$("#mem_jd").val($yd);
}
function showpd() {
	$memusername = $("#mem_username");
	if($memusername.length > 0 && $("#mem_passwd").val() < 3) {
		if($memusername.val().length >= 10) {			
			$("#mem_passwd").val($memusername.val().substr($memusername.val().length - 6));
		}		
	}
}
function ajax_chk_username() {

  return rrt;
}
function bmicount() {
	var mem_he = $("#mem_he"), mem_we = $("#mem_we"), mem_wet = $("#mem_wet"), mem_bmi = $("#mem_bmi");
	mem_bmi.val("0");
	if($.isNumeric(mem_he.val()) && $.isNumeric(mem_we.val())) {		
		he = parseFloat(mem_he.val());
		we = parseFloat(mem_we.val());
		if(he <= 0 || we <= 0) mem_bmi.val("0");
		else {
			he /= 100;
			he *= he;
			bmi = we/he;
			bmi = bmi.toFixed(1);
			mem_bmi.val(bmi);
			bmicount_changewet(bmi, mem_wet);
	  }
	}
}
function bmicount_changewet(bmi, cn) {
	if(bmi <= 18) cn.val("偏瘦");
	else if(bmi > 18 && bmi < 24) cn.val("中等");
	else if(bmi >= 24) cn.val("偏肉");
}
</script>