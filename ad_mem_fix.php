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
$mem_sex = SqlFilter($_REQUEST["mem_sex"],"tab"); //會員性別


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
        $SQL_u = "Update love_data_re Set love_user='".$change_memusername_loveandpay_new."' Where love_user='".$change_memusername_loveandpay_old."'";
        $rs_u = $SPConn->prepare($SQL_i);
        $rs_u->execute();
        $SQL_u = "Update love_data_re Set love_user2='".$change_memusername_loveandpay_new."' Where love_user2='".$change_memusername_loveandpay_old."'";
        $rs_u = $SPConn->prepare($SQL_i);
        $rs_u->execute();        
    }
}

if ( $checkok == 1 ){
	if ( $jointime != "" ){
		if ( is_date($jointime) ){
            $days=(now()-strtotime($jointime))/86400;
			if ( $days < 0 ){
				$jointime = date("Y/m/d");
            }
		}
	}
	
	if ( is_date($jointime) == false ){
		$jointime = date("Y/m/d");
    }
	
    $SQL  = "Select mem_auto, mem_username, mem_passwd, mem_name, mem_mail, mem_level,mem_mobile, mem_mobile2,web_level, real_web_level, web_startime, web_endtime, si_real_invite, ";
    $SQL .= "si_enterprise,si_no_mail1, si_no_mail2 From member_data Where mem_num=".$mem_num;
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);    
    if ( count($result) > 0 ){
		$mem_au = $re["mem_auto"];
		$lusername = $re["mem_username"];
		$n1 = $re["mem_name"];
		$mem_name = $n1;
		$mem_mail = $re["mem_mail"];
		$nomail = $re["si_no_mail1"];
		$nomail2 = $re["si_no_mail2"];
		$n10 = $re["mem_mobile"];
		$mem_mobile2 = $re["mem_mobile2"];
		$old_level = $re["web_level"];
		$web_level = round($mem_level);
		$web_level_name = num_lv($web_level);

        $subSQL = ",web_startime='".$jointime."'";
		switch ( $web_level ){
			case 1:
                $n_web_endtime = date($jointime,strtotime('+2 month'));
                $subSQL .= ",web_endtime='".$n_web_endtime."'";
        		$timemsg = $jointime."~".$n_web_endtime;
                break;
			case 2:
                $n_web_endtime = date($jointime,strtotime('+3 month'));
		        $timemsg .= $jointime."~".$n_web_endtime;
                $subSQL = ",web_endtime='".$n_web_endtime."',si_real_invite=1";
                break;
			case 3:
                $n_web_endtime = date($jointime,strtotime('+12 month'));
                $subSQL .= ",web_endtime='".$n_web_endtime."'";
		        $timemsg = $jointime."~".$n_web_endtime;
                break;
			case 4:
                $n_web_endtime = date($jointime,strtotime('+12 month'));
                $subSQL .= ",web_endtime='".$n_web_endtime."'";
		        $timemsg = $jointime."~".$n_web_endtime;
                break;
			case 5:
                $n_web_endtime = date($jointime,strtotime('+24 month'));
		        $subSQL .= ",web_endtime='".$n_web_endtime."'";
		        $timemsg = $jointime."~".$n_web_endtime;
                break;
			case 6:
                $n_web_endtime = date($jointime,strtotime('+24 month'));
		        $subSQL .= ",web_endtime='".$n_web_endtime."'";
		        $timemsg = $jointime."~".$n_web_endtime;
                break;
		    case 10: //專案3
                $n_web_endtime = date($jointime,strtotime('+3 month'));
		        $subSQL .= ",web_endtime='".$n_web_endtime."'";
		        $timemsg = $jointime."~".$n_web_endtime;
                $web_level = 3;
                break;
		    case 11: //專案6
                $n_web_endtime = date($jointime,strtotime('+6 month'));
                $subSQL .= ",web_endtime='".$n_web_endtime."'";
                $timemsg = $jointime."~".$n_web_endtime;
                $web_level = 3;
        }

        $subSQL .= ",web_level='".$web_level."',real_web_level='".$mem_level."'";
		
		if ( $re["si_enterprise"] == 99 ){
		    $subSQL .=",si_enterprise = 1";
        }

        //更新member_data
        $SQL_u = "Update member_data Set mem_branch=mem_branch".$subSQL." Where mem_num=".$mem_num;;
        $rs_u = $SPConn->prepare($SQL_u);
        $rs_u->execute();

        //新增log_data
        $SQL_i  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, log_4, log_5, log_service) Values ( ";
        $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
        $SQL_i .= "'".$mem_au."',";
        $SQL_i .= "'".$lusername."',";
        $SQL_i .= "'".$n1."',";
        $SQL_i .= "'".$_SESSION["p_other_name"]."',";
        $SQL_i .= "'".$_SESSION["branch"]."',";
        $SQL_i .= "'".$_SESSION["MM_Username"]."',";
        $SQL_i .= "'".$n10."',";
        $SQL_i .= "'系統紀錄',";
        $SQL_i .= "'".$_SESSION["p_other_name"]."於".changeDate(now())."將會員權益自".num_lv($old_level)."修改成".$web_level_name." - 效期至".$timemsg."',";
        $SQL_i .= "'member',";        
        $SQL_i .= "1)";
        $rs_i = $SPConn->prepare($SQL_i);
        $rs_i->execute();        

        //寄信未處理
        if ( $mem_branch == "八德" ){
            //call notice_new_member( "dmn", mem_mail, nomail, mem_name)
            //call notice_new_member_sms("dmn", n10, nomail2, mem_name)
        }elseif ( $mem_branch == "約專" ){
	        //call notice_new_member( "singleparty", mem_mail, nomail, mem_name)
	        //call notice_new_member_sms("singleparty", n10, nomail2, mem_name)
        }else{
	        //call notice_new_member( "spring", mem_mail, nomail, mem_name)
	        //call notice_new_member_sms("spring", n10, nomail2, mem_name)
        }

	    if ( $mem_sex = "男" ){ $rsex = 1; }else{ $rsex = 2; }

	    /*on error resume next  寄信
        Set httpRequest = Server.CreateObject("MSXML2.ServerXMLHTTP")
        httpRequest.Open "POST", "https://edm.springclub.com.tw/si_mem_cron_get.php"
        httpRequest.setRequestHeader "Content-Type", "application/x-www-form-urlencoded; charset=utf-8"
        httpRequest.Send "email="&mem_mail&"&name="&mem_name&"&sex="&rsex&"&company=singleparty"
        response.write httpRequest.responseText
        Set httpRequest = nothing*/
        //'response.write "email="&mem_mail&"&name="&mem_name&"&sex="&rsex&"&company=singleparty<Br>"	
    }
}

if ( $mem_branch == "八德" ){
    if ( $mem_level == "guest" ){
        //*
    }else{
        if ( $mem_username != "" ){
            $SQL1 = "Select * From member_data Where mem_username='".$mem_username."'";
            $rs1 = $SPConn->prepare($SQL1);
            $rs1->execute();
            $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
            foreach($result1 as $re1);
            if ( count($result1) > 0 ){
                $SQL2 = "Select * From UserData Where mem_username='".$mem_username."'";
                $rs2 = $DMNOpen->prepare($SQL2);
                $rs2->execute();
                $result1 = $rs2->fetchAll(PDO::FETCH_ASSOC);
                foreach($result2 as $re2);
                if ( count($result2) == 0 ){
                    if ( $re1["mem_sex"] == "男" ){ $sex = "M"; }else{ $sex = "F"; }
                    if ( $re1["mem_photo"] != "" ){ $mem_photo = "photo/".$re1["mem_photo"];}
                    //新增UserData
                    $SQL_i  = "Insert Into UserData(mem_username, UserID, Password, FirstName, Nickname, birthday, Generation, Gender, Email, city, Address, telnum, Education, ";
                    $SQL_i .= "Occupation, HeadPhotoURL, Constellation, tall, fullregtime, q37, mem_photo_show) Values ( ";
                    $SQL_i .= "'".strtoupper($re1["mem_username"])."',";
                    $SQL_i .= "'".$re1["mem_num"]."',";
                    $SQL_i .= "'".$re1["mem_passwd"]."',";
                    $SQL_i .= "'".$re1["mem_name"]."',";
                    $SQL_i .= "'".$re1["mem_nick"]."',";
                    $SQL_i .= "'".$re1["mem_by"]."/".$re1["mem_bm"]."/".$re1["mem_bd"]."',";
                    $SQL_i .= "'".$sex."',";
                    $SQL_i .= "'".$re1["mem_mail"]."',";
                    $SQL_i .= "'".$re1["mem_area"]."',";
                    $SQL_i .= "'".$re1["mem_address"]."',";
                    $SQL_i .= "'".$re1["mem_mobile"]."',";
                    $SQL_i .= "'".$re1["mem_school"]."',";
                    $SQL_i .= "'".$re1["mem_job1"]."',";
                    $SQL_i .= "'".$mem_photo."',";
                    $SQL_i .= "'".$re1["mem_star"]."',";
                    $SQL_i .= "'".$re1["mem_he"]."',";
                    $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
                    $SQL_i .= "'".$re1["mem_by"]."',";
                    $SQL_i .= "'".$re1["mem_photo_show"]."')";
                    $rs_i = $SPConn->prepare($SQL_i);
                    $rs_i->execute();
                }else{
                    if ( $re1["mem_sex"] == "男" ){ $sex = "M"; }else{ $sex = "F"; }

                    //新增UserData
                    $SQL_i  = "Insert Into UserData(Password, FirstName, Nickname, birthday, Generation, Gender, Email, city, Address, telnum, Education, Occupation, Constellation, ";
                    $SQL_i .= "tall, q37, mem_photo_show) Values ( ";
                    $SQL_i .= "'".$re1["mem_passwd"]."',";
                    $SQL_i .= "'".$re1["mem_name"]."',";
                    $SQL_i .= "'".$re1["mem_nick"]."',";
                    $SQL_i .= "'".$re1["mem_by"]."/".$re1["mem_bm"]."/".$re1["mem_bd"]."',";
                    $SQL_i .= "'".$re1["mem_by"]."',";
                    $SQL_i .= "'".$sex."',";
                    $SQL_i .= "'".$re1["mem_mail"]."',";
                    $SQL_i .= "'".$re1["mem_area"]."',";
                    $SQL_i .= "'".$re1["mem_address"]."',";
                    $SQL_i .= "'".$re1["mem_mobile"]."',";
                    $SQL_i .= "'".$re1["mem_school"]."',";
                    $SQL_i .= "'".$re1["mem_job1"]."',";
                    $SQL_i .= "'".$re1["mem_star"]."',";
                    $SQL_i .= "'".$re1["mem_he"]."',";
                    $SQL_i .= "'".$re1["mem_by"]."',";
                    $SQL_i .= "'".$re1["mem_photo_show"]."')";
                    $rs_i = $SPConn->prepare($SQL_i);
                    $rs_i->execute();
                }
            }
        }
    }
    call_alert("修改完成。","ad_mem_fix.php?mem_num=".$mem_num."", 0);
    exit;
}

//取得會員已存在資料
$SQL = "Select * From member_data Where mem_num='".$mem_num."'";
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);

$mem_branch = $re["mem_branch"];
$mem_single = strtoupper($re["mem_single"]);
$mem_branch2 = $re["mem_branch2"];
$mem_single2 = $re["mem_single2"];
$love_single = $re["love_single"];
$love_single2 = $re["love_single2"];
$call_branch = $re["call_branch"];
$call_single = $re["call_single"];

if ( $_SESSION["MM_Username"] == "TSAIWEN216" || $_SESSION["MM_Username"] == "SHEERY03130513" || $_SESSION["MM_Username"] == "LI6954029" ){
	$power_edit = 1;
}else{
	$power_edit = 0;
}

if ( $re["mem_level"] == "mem" && $_SESSION["MM_UserAuthorization"] != "admin" && $_SESSION["MM_UserAuthorization"] != "branch" && $_SESSION["MM_UserAuthorization"] != "manager" && $_SESSION["MM_UserAuthorization"] != "love_manager" && $_SESSION["MM_UserAuthorization"] != "pay" ){
	call_alert("權限不足。",0, 0);
}
?>
<script src="js/area.js"></script>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_mem.php">會員管理系統</a></li>
            <li class="active">修改會員資料 - <?php echo $mem_num;?></li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>修改會員資料 - <?php echo $mem_num;?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <?php require_once("./include/mem_menu.php");?>
                <form id="sform" action="?state=add" method="post" name="form5" onSubmit="return chk_form()" data-cansend="0" class="form-inline">
                    <table class="table table-striped table-bordered bootstrap-datatable input_small">
                        

                        <!--姓名-->
                        <tr> 
                            <td>姓名： 
                                <input name="mem_name" class="form-control" type="text" id="mem_name" value="<?php echo $re["mem_name"];?>" required> 
                                <font color="#999999">（請填入中文姓名）</font>暱稱：
                                <input name="mem_nick" class="form-control" type="text" id="mem_nick2" value="<?php echo $re["mem_nick"];?>" maxlength="8">
                                <font color="#999999">（網站顯示名稱）</font>
                            </td>
                        </tr>
                        
                        <!--性別/生日/星座/血型-->
                        <tr>
                            <td>性別： 
                                <select name="mem_sex" id="mem_sex" required>
                                    <option value="">請選擇</option>
                                    <option value="男"<?php if ( $re["mem_sex"] == "男" ){ echo " selected"; }?>>男</option>
                                    <option value="女"<?php if ( $re["mem_sex"] == "女" ){ echo " selected"; }?>>女</option>
                                </select>
                                &nbsp;&nbsp;
                                
                                生日：
                                <select name="mem_by" id="mem_by">
                                    <?php
                                    for ( $i=(date("Y")-20);$i>=(date("Y")-90);$i-- ){
                                        if ( $re["mem_by"] == $i ){
                                            echo "<option value='".$i."' selected>".$i."</option>";
                                        }else{
                                            echo "<option value='".$i."'>".$i."</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                年 
                                <select name="mem_bm" id="mem_bm">
                                    <?php
                                    for ( $i=1;$i<=12;$i++ ){
                                        if ( $re["mem_bm"] == $i ){
                                            echo "<option value='".$i."' selected>".$i."</option>";
                                        }else{
                                            echo "<option value='".$i."'>".$i."</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                月 
                                <select name="mem_bd" id="mem_bd">
                                <?php
                                    for ( $i=1;$i<=31;$i++ ){
                                        if ( $re["mem_bd"] == $i ){
                                            echo "<option value='".$i."' selected>".$i."</option>";
                                        }else{
                                            echo "<option value='".$i."'>".$i."</option>";
                                        }
                                    }
                                ?>
                                </select>
                                日
                                &nbsp;&nbsp;
                                
                                星座：
                                <select name="mem_star" id="mem_star">
                                    <option value="">請選擇</option>
                                    <?php
                                    $star_array = array("牡羊座","金牛座","雙子座","巨蟹座","獅子座","處女座","天秤座","天蠍座","射手座","魔羯座","水瓶座","雙魚座");
                                    for ( $s=0;$s<12;$s++ ){
                                        echo "<option value='".$star_array[$i]."'";
                                        if ( $re["mem_star"] == $star_array[$i] ){ echo " selected";}
                                        echo ">".$star_array[$i]."</option>";
                                    }?>
                                </select>
                                &nbsp;&nbsp;
                                
                                血型： 
                                <select name="mem_blood" id="mem_blood">
                                    <option value="">請選擇</option>
                                    <?php
                                    $blood_array = array("A型","B型","C型","AB型");
                                    for ( $s=0;$s<4;$s++ ){
                                        echo "<option value='".$blood_array[$i]."'";
                                        if ( $re["mem_blood"] == $blood_array[$i] ){ echo " selected";}
                                        echo ">".$blood_array[$i]."</option>";
                                    }?>
                                </select>
                            </td>
                        </tr>

                        <!--手機/手機2/居住電話/公司電話-->
                        <tr>
                            <td>
                                手機：
                                <?php
			                    if ( $power_edit == 1 ){
                                    echo "<input name='mem_mobile' type='text' id='mem_mobile' class='form-control' value='".$re["mem_mobile"]."'>";
                                }else{
			                        echo $re["mem_mobile"];
                                }
			                    ?>
                                &nbsp;&nbsp;手機2：
                                <input name="mem_mobile2" type="tel" id="mem_mobile2"  class="form-control phone" pattern="^[09]{2}[0-9]{8}$" minlength="10" maxlength="10" title="請輸入 09 開頭的十位數手機號碼" value="<?php echo $re["mem_mobile2"];?>">
                                &nbsp;&nbsp;居住電話：
                                <input tabindex="99" name="mem_phone" type="text" id="mem_phone" class="form-control" value="<?php echo $re["mem_phone"];?>">
                                &nbsp;&nbsp;公司電話：
                                <input tabindex="99" name="mem_phone2" type="text" id="mem_phone2" class="form-control" value="<?php echo $re["mem_phone2"];?>">
                            </td>
                        </tr>

                        <!--居住地地區-->
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

                        <!---戶籍地地區-->
                        <tr>
                            <td>戶籍地地區：
                            <input name="PostCode" type="hidden" class="form-control fd_input1" id="PostCode" value="<?php echo $PostCode ?>" size="5" readonly />
                                <select name="strCountry" id="strCountry" class="form-control fd_select" onChange="changeZone(document.form1.strCountry, document.form1.strCity, document.form1.PostCode)">
                                </select>&nbsp;&nbsp;
                                <select name="strCity" id="strCity" class="form-control fd_select" onChange="showZipCode(document.form1.strCountry, document.form1.strCity, document.form1.PostCode)">
                                </select>
                                <script type="text/javascript"> 
                                    initCounty2(document.form1.strCountry,"<?php echo $strCountry ?>");
                                    initZone2(document.form1.strCountry, document.form1.strCity, document.form1.PostCode,"<?php echo $strCity ?>");
                                </script>
                                &nbsp;&nbsp;地址：
                                <input tabindex="99" name="mem_address2" type="text" id="mem_address2" class="form-control" style="width:60%" value="">
                            </td>
                        </tr>

                        <!---學歷/學校名稱/科系名稱-->
                        <tr>
                            <td>學歷：
                                <select name="mem_school" id="mem_school">
                                    <option value="">請選擇</option>
                                    <?php
                                    $school_array = array("博士","碩士","大學","專科","高職","高中","國中","其他");
                                    for ( $s=0;$s<8;$s++ ){
                                        echo "<option value='".$school_array[$i]."'";
                                        if ( $re["mem_school"] == $school_array[$i] ){ echo " selected";}
                                        echo ">".$school_array[$i]."</option>";
                                    }?>
                                </select>
                                　學校名稱：
                                <select name="mem_school4" id="mem_school4">
                                    <option value="">請選擇</option>
                                    <?php
                                    $school4_array = array("國立","私立","海外");
                                    for ( $s=0;$s<3;$s++ ){
                                        echo "<option value='".$school4_array[$i]."'";
                                        if ( $re["mem_school"] == $school4_array[$i] ){ echo " selected";}
                                        echo ">".$school4_array[$i]."</option>";
                                    }?>
                                </select>
                                <input name="mem_school2" type="text" id="mem_school2" class="form-control" value="<?php echo $re["mem_school2"];?>">
                                　科系名稱： 
                                <input name="mem_school3" type="text" id="mem_school3" class="form-control" value="<?php echo $re["mem_school3"];?>">
                            </td>
                        </tr>

                        <!---職業/公司名稱/年資/職務名稱-->
                        <tr>
                            <td>職業：
                                <select name="mem_job1" id="mem_job1">
                                    <?php
                                    $job1_array = array("公務/國家機關","司法/法務","軍警單位","自營/投資","電腦/網路","電子/通信/電器","教育/研究單位","醫療/護理服務業","媒體傳播/出版業","藝術/音樂/設計","建築/裝修/物業","營銷/業務,文化/演藝/娛樂業","金融/證券/財會/保險","專利商標/諮詢服務業","生產製造業","旅遊服務業","運輸服務業","百貨/零售業","餐飲服務業","美容/美髮業","農林漁牧業","自由業/其它","在校學生","業務/仲价業");
                                    for ( $s=0;$s<24;$s++ ){
                                        echo "<option value='".$job1_array[$i]."'";
                                        if ( $re["mem_school"] == $job1_array[$i] ){ echo " selected";}
                                        echo ">".$job1_array[$i]."</option>";
                                    }?>
                                </select>
                                　公司名稱： 
                                <input name="company" type="text" id="company" class="form-control" value="<?php echo $re["company"];?>">
                                　年資： 
                                <div class="input-group">
                                    <input name="company_year" type="number" id="company_year" class="form-control" style="width:100px" value="<?php echo $re["company_year"];?>"><div class="input-group-addon">年</div>
                                </div>
                                　職務名稱： 
                                <input name="mem_job2" type="text" id="mem_job2" class="form-control" value="<?php $re["mem_job2"];?>">
                            </td>
                        </tr>

                        <!--年收入-->
                        <tr>
                            <td>經濟狀況：年收入約 
                                <select name="mem_money" id="mem_money">
                                    <option value="">請選擇</option>
                                    <?php
                                    $money_array = array("50萬以下","51萬到80萬","81萬到100萬","101萬到199萬","200萬以上");
                                    for ( $s=0;$s<5;$s++ ){
                                        echo "<option value='".$money_array[$i]."'";
                                        if ( $re["mem_money"] == $money_array[$i] ){ echo " selected";}
                                        echo ">".$money_array[$i]."</option>";
                                    }?>
                                </select>
                                &nbsp;&nbsp;
                                <select name="mem_money_des" id="mem_money_des">
                                    <option value="">請選擇</option>
                                    <?php
                                    $money_des_array = array("自足","小康","中上","富有");
                                    for ( $s=0;$s<4;$s++ ){
                                        echo "<option value='".$money_des_array[$i]."'";
                                        if ( $re["mem_money_des"] == $money_des_array[$i] ){ echo " selected";}
                                        echo ">".$money_des_array[$i]."</option>";
                                    }?>
                                </select>
                                年收：
                                <div class="input-group">
                                    <input type="number" name="mem_money_y" id="mem_money_y" class="form-control" value="<?php echo $re["mem_money_y"];?>">
                                    <span class="input-group-addon">元</span>
                                </div>
                                &nbsp;&nbsp;
                                <label class="checkbox">
                                    <input type="checkbox" name="mem_car" id="mem_car" value="1"<?php if ( $re["mem_car"] == "1" ){ echo " checked"; }?>><i></i>有車
                                </label>
                                &nbsp;&nbsp;
                                <label class="checkbox">
                                    <input type="checkbox" name="mem_house" id="mem_house" value="1"<?php if ( $re["mem_house"] == "1" ){ echo " checked"; }?>><i></i>有房
                                </label>
                            </td>
                        </tr>

                        <!--身高/體重/BMI-->
                        <tr>
                            <td>
                                身高：             	
                                <input name="mem_he" type="text" id="mem_he" class="form-control" value="<?php echo $re["mem_he"];?>" onkeyup="bmicount()">公分
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                體重： 
                                <input name="mem_we" type="text" id="mem_we" class="form-control" value="<?php echo $re["mem_we"];?>" onkeyup="bmicount()">公斤 
                                <select id="mem_wet" name="mem_wet">
                                    <option value="">體重描述(身型)</option>
                                    <?php
                                    $we_array = array("苗條","普通","豐腴","有肌肉","豐滿","肥胖","偏瘦","中等","偏肉");
                                    for ( $s=0;$s<9;$s++ ){
                                        echo "<option value='".$we_array[$i]."'";
                                        if ( $re["mem_wet"] == $we_array[$i] ){ echo " selected";}
                                        echo ">".$we_array[$i]."</option>";
                                    }?>			
                                </select>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                BMI： 
                                <input name="mem_bmi" type="text" id="mem_bmi" class="form-control" value="<?php echo $re["mem_bmi"];?>" readonly>
                            </td>
                        </tr>

                        <!--Email/LINDID-->
                        <tr>
                            <td>E-mail：
                                <input name="mem_mail" type="text" id="mem_mail" class="form-control" value="<?php echo $re["mem_mail"];?>">
                                　LINE ID：
                                <input name="mem_msn" type="text" id="mem_msn" class="form-control" value="<?php echo $re["mem_msn"];?>">
                            </td>
                        </tr>

                        <!--個性/抽菸/喝酒/飲食/信仰-->
                        <tr>
                            <td>
                                個性：
                                <select name="mem4" id="mem4">
                                    <option value="">請選擇</option>
                                    <?php
                                    $mem4_array = array("內向","外向","隨和","嚴謹","善良熱情","陽光","不拘");
                                    for ( $s=0;$s<7;$s++ ){
                                        echo "<option value='".$mem4_array[$i]."'";
                                        if ( $re["mem4"] == $mem4_array[$i] ){ echo " selected";}
                                        echo ">".$mem4_array[$i]."</option>";
                                    }?>
                                </select>
                                &nbsp;&nbsp;
                                抽菸：
                                <select name="mem7" id="mem7">
                                    <option value="">請選擇</option>
                                    <?php
                                    $mem7_array = array("是","否","偶爾");
                                    for ( $s=0;$s<3;$s++ ){
                                        echo "<option value='".$mem7_array[$i]."'";
                                        if ( $re["mem7"] == $mem7_array[$i] ){ echo " selected";}
                                        echo ">".$mem7_array[$i]."</option>";
                                    }?>
                                </select>
                                &nbsp;&nbsp;
                                喝酒：
                                <select name="mem8">
                                    <option value="">請選擇</option>
                                    <?php
                                    $mem8_array = array("是","否","偶爾");
                                    for ( $s=0;$s<3;$s++ ){
                                        echo "<option value='".$mem8_array[$i]."'";
                                        if ( $re["mem8"] == $mem8_array[$i] ){ echo " selected";}
                                        echo ">".$mem8_array[$i]."</option>";
                                    }?>
                                </select>
                                &nbsp;&nbsp;
                                飲食：
                                <select name="mem22">
                                    <option value="">請選擇</option>
                                    <?php
                                    $mem22_array = array("不拘","全素","鍋邊素","奶蛋素","吃辣","不吃辣","葷食");
                                    for ( $s=0;$s<7;$s++ ){
                                        echo "<option value='".$mem22_array[$i]."'";
                                        if ( $re["mem22"] == $mem22_array[$i] ){ echo " selected";}
                                        echo ">".$mem22_array[$i]."</option>";
                                    }?>
                                </select>
                                &nbsp;&nbsp;
                                信仰：
                                <select name="mem6" id="mem6">
                                    <option value="">請選擇</option>
                                    <?php
                                    $mem6_array = array("無","佛道教","基督教","天主教","一貫道","其他");
                                    for ( $s=0;$s<7;$s++ ){
                                        echo "<option value='".$mem6_array[$i]."'";
                                        if ( $re["mem6"] == $mem6_array[$i] ){ echo " selected";}
                                        echo ">".$mem6_array[$i]."</option>";
                                    }?>
                                </select>
                            </td>
                        </tr>
                        <!--婚姻狀態-->
                        <tr>
                            <td>
                                <?php
                                $marry_array = array("未婚","離婚","離婚沒小孩","離婚有小孩","喪偶","已婚","保密","交往中","有心儀對象");
                                echo "婚姻狀態：";
                                for ( $m=0;$m<9;$m++ ){
                                    echo "<label class='radio'><input name='mem_marry' type='radio' value='".$marry_array[$m]."'><i></i></label>";
                                }
                                ?>
                            </td>
                        </tr>
                        <!--自我介紹-->
                        <tr> 
                            <td>
                                自我介紹：<font color='red'>(請注意此區文字將會在網站顯示，除自我介紹外勿填入其他資訊，如需清除文字請輸入空格)</font><br>
                                <div id="mem_note_div"><?php echo $re["mem_note"];?></div>
                                <a id="mem_note_a" href="#v" onclick="mem_note_edit()">點擊修改</a> 
                                <textarea id="mem_note" name="mem_note" cols="100" rows="8" id="textarea" class="form-control" style="display:none">
                                <?php
                                    if ( $re["mem_note"] != "" ){
                                        echo str_replace("\r\n","<br>",$re["mem_note"]);
                                    }
                                ?>
                                </textarea> 
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <label class="checkbox"><input type="checkbox" name="mem_photo_show" id="mem_photo_show" value="1"<?php if ( $re["mem_photo_show"] == "1" ){ echo " checked";}?>><i></i>前台不顯示照片</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="no_mail1" id="no_mail1" value="1"<?php if ( $re["si_no_mail1"] != "1" ){ echo " checked";}?>><i></i>電子信件通知</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="no_mail2" id="no_mail2" value="1"<?php if ( $re["si_no_mail2"] != "1" ){ echo " checked";}?>><i></i>簡訊通知</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="no_mail4" id="no_mail4" value="1"<?php if ( $re["si_no_mail4"] != "1" ){ echo " checked";}?>><i></i>約會邀請被拒絕通知</label>&nbsp;&nbsp;
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <label class="checkbox"><input type="checkbox" name="si_enterprise" id="si_enterprise" value="1"<?php if ( $re["si_enterprise"] == "1" || $re["si_enterprise"] == "99" ){ echo " checked";} ?>><i></i>企業會員</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_vip" id="mem_vip" value="1"<?php if ( $re["mem_vip"] == "1" ){ echo " checked"; }?>><i></i>優質會員</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot" id="mem_hot" value="1"<?php if ( $re["mem_hot"] == "1" ){ echo " checked";}?>><i></i>超人氣會員</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot_in" id="mem_hot_in" value="1"<?php if ( $re["mem_hot_in"] == "1" ){ echo " checked"; }?>><i></i>春天首頁超人氣會員</label>
                                <?php if ( $re["mem_level"] != "guest" ){ ?>
                                    <label class="checkbox"><input type="checkbox" name="singleparty_hot_check" id="singleparty_hot_check" value="1"<?php if ( $re["singleparty_hot_check"] == "1" ){ echo " checked";?>><i></i>約專首頁推薦會員</label>
                                <?php }?>
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <label class="checkbox"><input type="checkbox" name="mem_hot3" id="mem_hot3" value="1"<?php if ( $re["mem_hot3"] == "1" ){ echo " checked";} ?>><i></i>醫師、教師、律師</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot1" id="mem_hot1" value="1"<?php if ( $re["mem_hot1"] == "1" ){ echo " checked";} ?>><i></i>碩博士、科技新貴</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot6" id="mem_hot6" value="1"<?php if ( $re["mem_hot6"] == "1" ){ echo " checked";} ?>><i></i>百萬年薪俱樂部</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot5" id="mem_hot5" value="1"<?php if ( $re["mem_hot5"] == "1" ){ echo " checked";} ?>><i></i>BOSS、高階主管</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot4" id="mem_hot4" value="1"<?php if ( $re["mem_hot4"] == "1" ){ echo " checked";} ?>><i></i>軍警、公務人員</label>&nbsp;&nbsp;            	
                                <label class="checkbox"><input type="checkbox" name="mem_hot2" id="mem_hot2" value="1"<?php if ( $re["mem_hot2"] == "1" ){ echo " checked";} ?>><i></i>金融服務</label>
                            </td>
                        </tr>

                        <!--首頁頁籤-->
                        <?php if ( $_SESSION["MM_UserAuthorization"] == "admin" ){ ?>
                            <tr>
                                <td>
                                    首頁頁籤：
                                    <select name="mem_tag" id="mem_tag">
                                        <option value="">請選擇</option>
                                        <?php
                                        $tag_array = array("百大科技","公教醫護","傳播藝術","餐飲服務","金融保險");
                                        for ( $s=0;$s<5;$s++ ){
                                            echo "<option value='".$tag_array[$s]."'";
                                            if ( $re["mem_tag"] == $tag_array[$s] || $tag == $s ){ echo " selected";}
                                            echo ">".$tag_array[$s]."</option>";
                                        }?>
                                    </select>
                                </td>
                            </tr>
                        <?php }?>

                        <!--興趣/其他興趣-->
                        <tr>
                            <td>
                                興趣：
  								<?php
                                $mem18_array = array("做菜","郊遊","登山","兜風","逛街","看電影","閱讀","騎小折","游泳","品嘗美食","旅遊","冒險","寫作","上山下海","運動","慢跑","看風景","散步","園藝","水族","財經","拼圖","咖啡","宅在家裡","買東西","插花","繪畫","逛展覽","不拘");
                                for ( $i=0;$i<count($mem18_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='mem18' value='".$mem18_array[$i]."'";
                                    if ( substr_count($re["mem18"],$mem18_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$mem18_array[$i]."</label>";
                                }
                                ?>
                                <br>
                                其他興趣：<input type="text" class="form-control" name="mem181" style="width:80%" value="<?php echo $re["mem181"];?>">									  
                            </td>
                        </tr>
                        <tr><td>外型：<input type="text" name="mem_da2" id="mem_da2" class="form-control" style="width:80%" value="<?php echo $re["mem_da2"];?>"></td></tr>
                        <tr><td>內在：<input type="text" name="mem_da3" id="mem_da3" class="form-control" style="width:80%" value="<?php echo $re["mem_da3"];?>"></td></tr>
                        <tr><td>資料速報：<input type="text" name="mem_da6" id="mem_da6" class="form-control" style="width:80%" value="<?php echo $re["mem_da6"];?>"></td></tr>
                        <tr>
                            <td style="font-size:150%;color:blue"><b>擇友條件</b></td>
                        </tr>
                        <!--婚況-->
                        <tr>
                            <td>
                                婚況：
          	                    <?php          	        
                                $sel_marry_array = array("未婚","離婚","離婚沒小孩","離婚有小孩","喪偶","已婚","保密","交往中","有心儀對象","不拘");
                                for ( $i=0;$i<count($sel_marry_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='sel_marry' value='".$sel_marry_array[$i]."'";
                                    if ( substr_count($re["sel_marry"],$sel_marry_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$sel_marry_array[$i]."</label>";
                                }
                                ?>
                            </td>
                        </tr>
                        <!--學歷-->
                        <tr>
                            <td>
                                學歷：
                                <?php          	        
                                $sel_school_array = array("博士","碩士","大學","專科","高職","高中","國中","不拘");
                                for ( $i=0;$i<count($sel_school_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='sel_school' value='".$sel_school_array[$i]."'";
                                    if ( substr_count($re["sel_school"],$sel_school_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$sel_school_array[$i]."</label>";
                                }
                                ?>
                            </td>
                        </tr>
                        <!--宗教-->
                        <tr>
                            <td>
                                宗教：
                                <?php          	        
                                $sel_mem6_array = array("佛道教","基督教","天主教","一貫道","無","不拘");
                                for ( $i=0;$i<count($sel_mem6_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='sel_mem6' value='".$sel_mem6_array[$i]."'";
                                    if ( substr_count($re["sel_mem6"],$sel_mem6_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$sel_mem6_array[$i]."</label>";
                                }
                                ?>
                          </td>
                        </tr>
                        <!--職業：-->
                        <tr>
                            <td>
                                職業：
                                <?php          	        
                                $sel_job_array = array("公務/國家機關","司法/法務","軍警單位","自營/投資","電腦/網路","電子/通信/電器","教育/研究單位","醫療/護理服務業","媒體傳播/出版業","藝術/音樂/設計","建築/裝修/物業","營銷/業務","文化/演藝/娛樂業","金融/證券/財會/保險","專利商標/諮詢服務業","生產製造業","旅遊服務業","運輸服務業","百貨/零售業","餐飲服務業","美容/美髮業","農林漁牧業","自由業/其它","在校學生","業務/仲价業","不拘");
                                for ( $i=0;$i<count($sel_job_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='sel_job' value='".$sel_job_array[$i]."'";
                                    if ( substr_count($re["sel_job"],$sel_job_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$sel_job_array[$i]."</label>";
                                }
                                ?>    
                            </td>
                        </tr>
                        <!--個性-->
                        <tr>
                            <td>
                                個性：
                                <?php          	        
                                $sel_mem4_array = array("內向","外向","隨和","嚴謹","善良熱情","陽光","不拘");
                                for ( $i=0;$i<count($sel_mem4_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='sel_mem4' value='".$sel_mem4_array[$i]."'";
                                    if ( substr_count($re["sel_mem4"],$sel_mem4_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$sel_mem4_array[$i]."</label>";
                                }
                                ?>                                      	
                            </td>
                        </tr>
                        <!--經濟-->
                        <tr>
                            <td>
                                經濟：
                                <?php          	        
                                $sel_money_des_array = array("富有","中上","小康","自足","不拘");
                                for ( $i=0;$i<count($sel_money_des_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='sel_money_des' value='".$sel_money_des_array[$i]."'";
                                    if ( substr_count($re["sel_money_des"],$sel_money_des_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$sel_money_des_array[$i]."</label>";
                                }
                                ?> 
                            </td>
                        </tr>
                        <!--年收入-->
                        <tr>
                            <td>
                                年收入：
                                <?php          	        
                                $sel_money_array = array("50萬以下","51萬到80萬","81萬到100萬","101萬到199萬","200萬以上","不拘");
                                for ( $i=0;$i<count($sel_money_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='sel_money' value='".$sel_money_array[$i]."'";
                                    if ( substr_count($re["sel_money"],$sel_money_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$sel_money_array[$i]."</label>";
                                }
                                ?>
                            </td>
                        </tr>
                        <!--年齡-->
                        <tr>
                            <td>
                                年齡：
                                <select name="sel_y1" id="sel_y1">
                                    <option value="">不限</option>
                                    <?php
                                    for ( $i=(date("Y")-80);$i>=(date("Y")-20);$i-- ){
                                        echo "<option value='".$i."'";
                                        if ( strval($re["sel_y1"]) == strval($i) ){
                                            echo " selected";
                                        }
                                        echo ">".$i." 年/民國 ".($i-1911)." 年</option>";
                                    }
                                    ?>
                                </select>
                                到 
                                <select name="sel_y2" id="sel_y2">
                                    <option value="">不限</option>
                                    <?
                                    for ( $i=(date("Y")-80);$i>=(date("Y")-20);$i-- ){
                                        echo "<option value='".$i."'";
                                        if ( strval($re["sel_y2"]) == strval($i) ){
                                            echo " selected";
                                        }
                                        echo ">".$i." 年/民國 ".($i-1911)." 年</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <!--居住區域-->
                        <tr>
                            <td>
                                居住區域：
                                <?php          	        
                                $sel_area_array = array("北部","中部","南部","台北","桃竹苗","中彰投","雲嘉南","高屏","不拘");
                                for ( $i=0;$i<count($sel_area_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='sel_area' value='".$sel_area_array[$i]."'";
                                    if ( substr_count($re["sel_area"],$sel_area_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$sel_area_array[$i]."</label>";
                                }
                                ?>
                            </td>
                        </tr>
                        <!--星座-->
                        <tr>
                            <td>
                                星座：
                                <?php          	        
                                $sel_star_array = array("牡羊座","金牛座","雙子座","巨蟹座","獅子座","處女座","天秤座","天蠍座","射手座","魔羯座","水瓶座","雙魚座","不拘");
                                for ( $i=0;$i<count($sel_star_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='sel_star' value='".$sel_star_array[$i]."'";
                                    if ( substr_count($re["sel_star"],$sel_star_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$sel_star_array[$i]."</label>";
                                }
                                ?>
                            </td>
                        </tr>
                        <!--身高-->
                        <tr>
                            <td>
                                身高：<input type="text" name="sel_he1" id="sel_he1" class="form-control" style="width:100px" value="<?php echo $re["sel_he1"];?>"> - <input type="text" name="sel_he2" id="sel_he2" class="form-control" style="width:100px" value="<?php echo $re["sel_he2"];?>"> 公分
                            </td>
                        </tr>
                        <!--身型-->
                        <tr>
                            <td>
                                身型：
                                <?php          	        
                                $sel_wet_array = array("苗條","普通","豐腴","有肌肉","豐滿","肥胖","偏瘦","中等","偏肉","不拘");
                                for ( $i=0;$i<count($sel_wet_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='sel_wet' value='".$sel_wet_array[$i]."'";
                                    if ( substr_count($re["sel_wet"],$sel_wet_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$sel_wet_array[$i]."</label>";
                                }
                                ?>
                            </td>
                        </tr>
                        <!--社交性-->
                        <tr>
                            <td>
                                社交性：
                                <?php          	        
                                $sel_sociability_array = array("喜歡與多人相處","喜歡與少數人相處","喜歡獨處","很熟","慢熟","不拘");
                                for ( $i=0;$i<count($sel_sociability_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='sel_sociability' value='".$sel_sociability_array[$i]."'";
                                    if ( substr_count($re["sel_sociability"],$sel_sociability_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$sel_sociability_array[$i]."</label>";
                                }
                                ?>
                            </td>
                        </tr>
                        <!--交友觀點-->
                        <tr>
                            <td>
                                交友觀點：
                                <?php          	        
                                $sel_view_array = array("純粹擴大交友","尋找談戀愛對象","尋找依靠終身伴侶","不拘");
                                for ( $i=0;$i<count($sel_view_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='sel_view' value='".$sel_view_array[$i]."'";
                                    if ( substr_count($re["sel_view"],$sel_view_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$sel_view_array[$i]."</label>";
                                }
                                ?>
                            </td>
                        </tr>
                        <!--抽菸-->
                        <tr>
                            <td>
                                抽菸：
                                <?php          	        
                                $sel_mem7_array = array("是","否","偶爾","不拘");
                                for ( $i=0;$i<count($sel_mem7_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='sel_mem7' value='".$sel_mem7_array[$i]."'";
                                    if ( substr_count($re["sel_mem7"],$sel_mem7_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$sel_mem7_array[$i]."</label>";
                                }
                                ?>
                            </td>
                        </tr>
                        <!--喝酒-->
                        <tr>
                            <td>
                                喝酒：
                                <?php          	        
                                $sel_mem8_array = array("是","否","偶爾","不拘");
                                for ( $i=0;$i<count($sel_mem8_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='sel_mem8' value='".$sel_mem8_array[$i]."'";
                                    if ( substr_count($re["sel_mem8"],$sel_mem8_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$sel_mem8_array[$i]."</label>";
                                }
                                ?>
                            </td>
                        </tr>
                        <!--飲食-->
                        <tr>
                            <td>
                                飲食：
                                <?php          	        
                                $sel_mem22_array = array("全素","鍋邊素","奶蛋素","吃辣","不吃辣","葷食","不拘");
                                for ( $i=0;$i<count($sel_mem22_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='sel_mem22' value='".$sel_mem22_array[$i]."'";
                                    if ( substr_count($re["sel_mem22"],$sel_mem22_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$sel_mem22_array[$i]."</label>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr><td>忌諱：<input type="text" name="mem_da4" id="mem_da4" class="form-control" style="width:80%" value="<?php echo $re["mem_da4"];?>"></td></tr>
                        <tr><td>擇友條件：<input type="text" name="mem_da5" id="mem_da5" class="form-control" style="width:80%" value="<?php echo $re["mem_da5"];?>"></td></tr>
                        <tr><td style="font-size:150%;color:blue"><b>其他事項</b></td></tr>
                        <tr><td>備註說明：<textarea id="sys_note" name="sys_note" style="width:80%" rows="8" id="textarea" class="form-control"><?php echo $re["sys_note"];?></textarea> </td></tr>
                        <tr><td>備註說明：<textarea id="tosinglenote" name="tosinglenote" style="width:80%" rows="8" id="textarea" class="form-control" readonly><?php echo $re["tosinglenote"];?></textarea></td></tr>
                        <!--方便聯繫時間-->
                        <tr>
                            <td>
                                方便聯繫時間：
                                <?php          	        
                                $can_call_array = array("星期一","星期二","星期三","星期四","星期五","星期六","星期日","上午","下午","不拘");
                                for ( $i=0;$i<count($can_call_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='can_call' value='".$can_call_array[$i]."'";
                                    if ( substr_count($re["can_call"],$can_call_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$can_call_array[$i]."</label>";
                                }
                                ?>
                            </td>
                        </tr>
                        <!--可以排約時間-->
                        <tr>
                            <td>
                                可以排約時間：
                                <?php          	        
                                $can_love_array = array("星期一","星期二","星期三","星期四","星期五","星期六","星期日","上午","下午","不拘");
                                for ( $i=0;$i<count($can_love_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='can_love' value='".$can_love_array[$i]."'";
                                    if ( substr_count($re["can_love"],$can_love_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$can_love_array[$i]."</label>";
                                }
                                ?>
                            </td>
                        </tr>
                        <!--魅力處方箋01-->
                        <tr>
                            <td>
                                魅力處方箋01：
                                <?php          	        
                                $recipe1_array = array("戀愛講堂","魅力有約","品味生活","互動美學");
                                for ( $i=0;$i<count($recipe1_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='recipe1' value='".$recipe1_array[$i]."'";
                                    if ( substr_count($re["recipe1"],$recipe1_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$recipe1_array[$i]."</label>";
                                }
                                ?>   	  
                            </td>
                        </tr>
                        <!--魅力處方箋02-->
                        <tr>
                            <td>
                                魅力處方箋02：
                                <?php          	        
                                $recipe2_array = array("輕旅行","主題特別企劃","主題精緻餐會","美味廚房","健康料理","國外旅遊");
                                for ( $i=0;$i<count($recipe2_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='recipe2' value='".$recipe2_array[$i]."'";
                                    if ( substr_count($re["recipe2"],$recipe2_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$recipe2_array[$i]."</label>";
                                }
                                ?>      	  
                            </td>
                        </tr>
                        <!--魅力處方箋03-->
                        <tr>
                            <td>
                                魅力處方箋03：
                                <?php          	        
                                $recipe3_array = array("輕旅行","主題特別企劃","主題精緻餐會","美味廚房","健康料理","國外旅遊");
                                for ( $i=0;$i<count($recipe3_array);$i++ ){
                                    echo "<label class='checkbox'><input type='checkbox' name='recipe3' value='".$recipe3_array[$i]."'";
                                    if ( substr_count($re["recipe3"],$recipe3_array[$i]) > 0 ){
                                        echo " checked";
                                    }
                                    echo "><i></i>".$recipe3_array[$i]."</label>";
                                }
                                ?>      	  
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="center">
                                    <input name="Submit3" type="submit" value="確定修改" class="btn btn-primary" style="width:50%">
                                    <<input name="mem_num" type="hidden" id="mem_num" value="<?php echo $re["mem_num"];?>">
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <hr>
</div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<!--若暫停選項為「是」則日期欄位區間就要show，反之hide-->
<script lanaguage="javascript">
	function chkstop(){
		var stop_str_val = $('input[name=stop_str]:checked').val()
		if ( stop_str_val == "是" ){
			var stop_sy_val = $('input[name=stop_sm]:checked').val()
			var stop_ey_val = $('input[name=stop_em]:checked').val()
			if ( stop_sy_val == "" || stop_ey_val == "" ){ $("#stop_sy").focus;}
			$("#stop_date").show();
		}else{
			$("#stop_date").hide();
		}
	}
</script>
<!--//若暫停選項為「是」則日期欄位區間就要show，反之hide-->

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