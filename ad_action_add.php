<?php

/*****************************************/
//檔案名稱：ad_action_add.php
//後台對應位置：管理系統/網站活動上傳>新增(修改)網站活動
//改版日期：2022.2.14
//改版設計人員：Jack
//改版程式人員：Jack
/*****************************************/
require_once("_inc.php");
require_once("./include/_function.php");
//上傳圖片功能
if ($_REQUEST["st"] == "upload") {
    $old_pic = SqlFilter($_REQUEST["old_pic"], "tab");
    $ext = pathinfo($_FILES["file_uploads2"]["name"], PATHINFO_EXTENSION); //附檔名  
    $fileName = date("Y") . date("n") . date("j") . date("H") . date("i") . date("s") . "_action_" . rand(1, 999) . "." . $ext; //檔名
    $fullpath = "upload_image/" . $fileName; // 完整路徑
    list($width, $height) = getimagesize($_FILES['file_uploads2']['tmp_name']); //圖片寬度、高度

    // 圖檔寬度小於500刪除
    if ($width < 500) {
        echo "nowidth";
        DelFile($fullpath);
        exit();
    }
    
    // 檢查圖片是否被旋轉過，並轉回來(待功能開啟)
    $image = imagecreatefromstring(file_get_contents($_FILES['file_uploads2']['tmp_name']));
    $exif = exif_read_data($_FILES['file_uploads2']['tmp_name']);    
    if (!empty($exif['Orientation'])) {
        switch ($exif['Orientation']) {
            case 8:
                $image = imagerotate($image, 90, 0);
                break;
            case 3:
                $image = imagerotate($image, 180, 0);
                break;
            case 6:
                $image = imagerotate($image, -90, 0);
                break;
        }
    }

    // 上傳成功便移動檔案
    if ($_FILES["file_uploads2"]["error"] > 0){
        echo "Error: " . $_FILES["file_uploads2"]["error"];
    }else{        
        move_uploaded_file($_FILES["file_uploads2"]["tmp_name"],$fullpath);
    }   
    
    // 刪除舊圖
    if($fileName != "" && $old_pic != ""){
        DelFile("upload_image/".$old_pic);
    }

    echo $fileName;
    exit();
}
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//程式開始 *****
if ($_SESSION["MM_Username"] == "") {
    call_alert("請重新登入。", "login.php", 0);
}

//刪除圖檔
if($_REQUEST["st"] == "delp"){
    $SQL = "SELECT * FROM action_data where ac_auto='".SqlFilter($_REQUEST["ac"],"int")."'";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if($result){
        $vv = SqlFilter($_REQUEST["v"],"tab");
        if($result[$vv] != ""){
            $dpic = $result[$vv];
            DelFile("upload_image/".$dpic);
        }
        // 更新資料
        $SQL = "UPDATE action_data SET ".$vv."=NULL where ac_auto='".SqlFilter($_REQUEST["ac"],"int")."'";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
    }
    reURL("ad_action_add.php?ac_auto=".SqlFilter($_REQUEST["ac"],"int"));
}

// 新增或修改活動
if($_REQUEST["st"] == "add"){
    $ac_time = SqlFilter($_REQUEST["actime"],"tab")." ".SqlFilter($_REQUEST["ahr"],"tab").":".SqlFilter($_REQUEST["amin"],"tab")."";    
    if(!chkDate($ac_time)){
        call_alert("舉行時間不正確。",1, 1);
    }

    if($_REQUEST["ac_teacher_auton"] != ""){
        $SQL = "SELECT auton, name FROM si_salon_teacher where auton='".SqlFilter($_REQUEST["ac_teacher_auton"],"int")."'";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $ac_teacher_auton = $result["auton"];
    	    $ac_teacher_name = $result["name"];
        }
    }else{
        $ac_teacher_auton = "null";
    }

    if($_REQUEST["ac_show"] == "1"){
        $ac_show = 1;
    }else{
        $ac_show = 0;
    }

    if($_REQUEST["deadline"] != ""){
        $deadline = SqlFilter($_REQUEST["deadline"],"tab");
    }else{
        $deadline = NULL;
    }

    if($_REQUEST["ac_money2"] != ""){
        $ac_money2 = SqlFilter($_REQUEST["ac_money2"],"tab");
    }else{
        $ac_money2 = NULL;
    }

    if($_REQUEST["ac_money3"] != ""){
        $ac_money3 = SqlFilter($_REQUEST["ac_money3"],"tab");
    }else{
        $ac_money3 = NULL;
    }

    if($_REQUEST["ac_money4"] != ""){
        $ac_money4 = SqlFilter($_REQUEST["ac_money4"],"tab");
    }else{
        $ac_money4 = NULL;
    }

    if($_REQUEST["ac_money5"] != ""){
        $ac_money5 = SqlFilter($_REQUEST["ac_money5"],"tab");
    }else{
        $ac_money5 = NULL;
    }

    if($_REQUEST["ac_money6"] != ""){
        $ac_money6 = SqlFilter($_REQUEST["ac_money6"],"tab");
    }else{
        $ac_money6 = NULL;
    }

    if($_REQUEST["ac_money7"] != ""){
        $ac_money7 = SqlFilter($_REQUEST["ac_money7"],"tab");
    }else{
        $ac_money7 = NULL;
    }

    if($_REQUEST["ac_money8"] != ""){
        $ac_money8 = SqlFilter($_REQUEST["ac_money8"],"tab");
    }else{
        $ac_money8 = NULL;
    }

    if($_REQUEST["ac_money9"] != ""){
        $ac_money9 = SqlFilter($_REQUEST["ac_money9"],"tab");
    }else{
        $ac_money9 = NULL;
    }

    if($_REQUEST["ac_money10"] != ""){
        $ac_money10 = SqlFilter($_REQUEST["ac_money10"],"tab");
    }else{
        $ac_money10 = NULL;
    }

    if($_REQUEST["ac_money11"] != ""){
        $ac_money11 = SqlFilter($_REQUEST["ac_money11"],"tab");
    }else{
        $ac_money11 = NULL;
    }

    if($_REQUEST["ac_note"] != ""){
        $ac_note = SqlFilter($_REQUEST["ac_note"],"tab");
    }else{
        $ac_note = "";
    }

    if($_REQUEST["ac_content"] != ""){
        $ac_content = SqlFilter($_REQUEST["ac_content"],"tab");
    }else{
        $ac_content = "";
    }

    if($_REQUEST["ac_note2"] != ""){
        $ac_note2 = SqlFilter($_REQUEST["ac_note2"],"tab");
    }else{
        $ac_note2 = "";
    }

    if($_REQUEST["ac_note3"] != ""){
        $ac_note3 = SqlFilter($_REQUEST["ac_note3"],"tab");
    }else{
        $ac_note3 = "";
    }

    if($ac_teacher_auton == "null"){
        $ac_teacher_auton = NULL;
        $ac_teacher_name = NULL;
    }

    if($_REQUEST["needidcard"] == "1"){
        $needidcard = 1;
    }else{
        $needidcard = 0;
    }

    if($_REQUEST["needworkcard"] == "1"){
        $needworkcard = 1;
    }else{
        $needworkcard = 0;
    }

    if($_REQUEST["needidcardt"] == "1"){
        $needidcardt = 1;
    }else{
        $needidcardt = 0;
    }

    if($_REQUEST["crossarea"] == "1"){
        $crossarea = 1;
    }else{
        $crossarea = 0;
    }

    if($_REQUEST["event210725"] == "1"){
        $event210725 = 1;
    }else{
        $event210725 = 0;
    }

    $isedit = 0; // 標題、時間修改權限-否
    if($_REQUEST["ac_auto"] != ""){
        // 以下為修改活動
        if($_SESSION["MM_UserAuthorization"] == "admin"){
            $isedit = 1; // 標題、時間修改權限-可
        }
        $SQL = "SELECT * FROM action_data where ac_auto='".SqlFilter($_REQUEST["ac_auto"],"int")."'";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            call_alert("活動資料讀取錯誤。","ClOsE",0);
        }
        
        if($isedit == 1){
            $ac_title = SqlFilter($_REQUEST["ac_title"],"tab");
        }else{
            $ac_time = $result["ac_time"];
            $ac_title = $result["ac_title"];
        }
        
        $SQL =  "UPDATE action_data SET 
                ac_come='".SqlFilter($_REQUEST["ac_come"],"tab")."', 
                ac_open1='".SqlFilter($_REQUEST["ac_open1"],"tab")."', 
                ac_open2='".SqlFilter($_REQUEST["ac_open2"],"tab")."', 
                ac_run1='".SqlFilter($_REQUEST["ac_run1"],"tab")."', 
                ac_run2='".SqlFilter($_REQUEST["ac_run2"],"tab")."', 
                ac_con1='".SqlFilter($_REQUEST["ac_con1"],"tab")."', 
                ac_con2='".SqlFilter($_REQUEST["ac_con2"],"tab")."', 
                ac_show='".$ac_show."', 
                ac_1='".SqlFilter($_REQUEST["ac_1"],"tab")."', 
                ac_2='".SqlFilter($_REQUEST["ac_2"],"tab")."', 
                ac_3='".SqlFilter($_REQUEST["ac_3"],"tab")."', 
                ac_4='".SqlFilter($_REQUEST["ac_4"],"tab")."', 
                ac_support='".SqlFilter($_REQUEST["ac_support"],"tab")."', 
                ac_car1='".SqlFilter($_REQUEST["ac_car1"],"tab")."', 
                ac_car2='".SqlFilter($_REQUEST["ac_car2"],"tab")."', 
                ac_car3='".SqlFilter($_REQUEST["ac_car3"],"tab")."', 
                ac_car4='".SqlFilter($_REQUEST["ac_car4"],"tab")."', 
                ac_branch='".SqlFilter($_REQUEST["ac_branch"],"tab")."', 
                ac_kind='".SqlFilter($_REQUEST["ac_kind"],"tab")."', 
                ac_kind2='".SqlFilter($_REQUEST["ac_kind2"],"tab")."', 
                ac_kind3='".SqlFilter($_REQUEST["ac_kind3"],"tab")."', 
                ac_tag='".SqlFilter($_REQUEST["ac_tag"],"tab")."', 
                ac_title='".$ac_title."', 
                ac_time='".$ac_time."', 
                deadline='".$deadline."', 
                ac_money2='".$ac_money2."', 
                ac_money3='".$ac_money3."', 
                ac_money4='".$ac_money4."', 
                ac_money5='".$ac_money5."', 
                ac_money6='".$ac_money6."', 
                ac_money7='".$ac_money7."', 
                ac_money8='".$ac_money8."', 
                ac_money9='".$ac_money9."', 
                ac_money10='".$ac_money10."', 
                ac_money11='".$ac_money11."', 
                ac_area='".SqlFilter($_REQUEST["ac_area"],"tab")."', 
                ac_msg2='".SqlFilter($_REQUEST["ac_msg2"],"tab")."', 
                ac_eat1='".SqlFilter($_REQUEST["ac_eat1"],"tab")."', 
                ac_eat2='".SqlFilter($_REQUEST["ac_eat2"],"tab")."', 
                ac_note='".$ac_note."', 
                ac_content='".$ac_content."', 
                ac_note2='".$ac_note2."', 
                ac_note3='".$ac_note3."', 
                ac_msg3='".SqlFilter($_REQUEST["ac_msg3"],"tab")."', 
                ac_msg4='".SqlFilter($_REQUEST["ac_msg4"],"tab")."', 
                ac_pic2='".SqlFilter($_REQUEST["ac_pic2"],"tab")."', 
                ac_pic3='".SqlFilter($_REQUEST["ac_pic3"],"tab")."', 
                ac_pic4='".SqlFilter($_REQUEST["ac_pic4"],"tab")."', 
                ac_pic5='".SqlFilter($_REQUEST["ac_pic5"],"tab")."', 
                ac_teacher_auton='".$ac_teacher_auton."', 
                ac_teacher_name='".$ac_teacher_name."', 
                needidcard='".$needidcard."', 
                needworkcard='".$needworkcard."', 
                needidcardt='".$needidcardt."', 
                crossarea='".$crossarea."', 
                event210725='".$event210725."', 
                springclub_show='".SqlFilter($_REQUEST["springclub_show"],"tab")."' 
                WHERE ac_auto='".SqlFilter($_REQUEST["ac_auto"],"int")."'";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
    }else{
        // 以下為新增活動      
        $SQL = "INSERT INTO action_data (ac_come,ac_open1,ac_open2,ac_run1,ac_run2,ac_con1,ac_con2,ac_show,ac_1,ac_2,ac_3,ac_4,
                ac_support,ac_car1,ac_car2,ac_car3,ac_car4,ac_branch,ac_kind,ac_kind2,ac_kind3,ac_tag,ac_title,ac_time,deadline,
                ac_money2,ac_money3,ac_money4,ac_money5,ac_money6,ac_money7,ac_money8,ac_money9,ac_money10,ac_money11,ac_area,ac_msg2,
                ac_eat1,ac_eat2,ac_note,ac_content,ac_note2,ac_note3,ac_msg3,ac_msg4,ac_pic2,ac_pic3,ac_pic4,ac_pic5,ac_teacher_auton,
                ac_teacher_name,needidcard,needworkcard,needidcardt,crossarea,event210725,springclub_show)
                OUTPUT INSERTED.ac_auto_time, INSERTED.ac_auto 
                VALUES (
                '".SqlFilter($_REQUEST["ac_come"],"tab")."',
                '".SqlFilter($_REQUEST["ac_open1"],"tab")."',
                '".SqlFilter($_REQUEST["ac_open2"],"tab")."',
                '".SqlFilter($_REQUEST["ac_run1"],"tab")."',
                '".SqlFilter($_REQUEST["ac_run2"],"tab")."',
                '".SqlFilter($_REQUEST["ac_con1"],"tab")."',
                '".SqlFilter($_REQUEST["ac_con2"],"tab")."',
                '".$ac_show."',
                '".SqlFilter($_REQUEST["ac_1"],"tab")."',
                '".SqlFilter($_REQUEST["ac_2"],"tab")."',
                '".SqlFilter($_REQUEST["ac_3"],"tab")."',
                '".SqlFilter($_REQUEST["ac_4"],"tab")."',
                '".SqlFilter($_REQUEST["ac_support"],"tab")."',
                '".SqlFilter($_REQUEST["ac_car1"],"tab")."',
                '".SqlFilter($_REQUEST["ac_car2"],"tab")."',
                '".SqlFilter($_REQUEST["ac_car3"],"tab")."',
                '".SqlFilter($_REQUEST["ac_car4"],"tab")."',
                '".SqlFilter($_REQUEST["ac_branch"],"tab")."',
                '".SqlFilter($_REQUEST["ac_kind"],"tab")."',
                '".SqlFilter($_REQUEST["ac_kind2"],"tab")."',
                '".SqlFilter($_REQUEST["ac_kind3"],"tab")."',
                '".SqlFilter($_REQUEST["ac_tag"],"tab")."',
                '".SqlFilter($_REQUEST["ac_title"],"tab")."',
                '".$ac_time."',
                '".$deadline."',
                '".$ac_money2."',
                '".$ac_money3."',
                '".$ac_money4."',
                '".$ac_money5."',
                '".$ac_money6."',
                '".$ac_money7."',
                '".$ac_money8."',
                '".$ac_money9."',
                '".$ac_money10."',
                '".$ac_money11."',
                '".SqlFilter($_REQUEST["ac_area"],"tab")."',
                '".SqlFilter($_REQUEST["ac_msg2"],"tab")."',
                '".SqlFilter($_REQUEST["ac_eat1"],"tab")."',
                '".SqlFilter($_REQUEST["ac_eat2"],"tab")."',
                '".$ac_note."',
                '".$ac_content."',
                '".$ac_note2."',
                '".$ac_note3."',
                '".SqlFilter($_REQUEST["ac_msg3"],"tab")."',
                '".SqlFilter($_REQUEST["ac_msg4"],"tab")."',
                '".SqlFilter($_REQUEST["ac_pic2"],"tab")."',
                '".SqlFilter($_REQUEST["ac_pic3"],"tab")."',
                '".SqlFilter($_REQUEST["ac_pic4"],"tab")."',
                '".SqlFilter($_REQUEST["ac_pic5"],"tab")."',
                '".$ac_teacher_auton."',
                '".$ac_teacher_name."',
                '".$needidcard."',
                '".$needworkcard."',
                '".$needidcardt."',
                '".$crossarea."',
                '".$event210725."',
                '".SqlFilter($_REQUEST["springclub_show"],"tab")."')";        
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $ac_auto_time = $result["ac_auto_time"]; //讀取新增資料的自動時間
            $ac_auto = $result["ac_auto"]; //讀取新增資料的ac_auto
        }
    }

    // 判斷活動是否符合時間段
    $noaddtag = 0;
    if($ac_auto_time != "" && $ac_time != ""){
        $ac_time_unix = strtotime($ac_time);
        $ac_auto_time_unix = strtotime($ac_auto_time);
        if(chkDate($ac_time)){
            // 12/20 - 12/31 = next year 1/1-3/31
            $time1 = strtotime(date("Y",$ac_auto_time_unix)."/12/20 00:00");
            $time2 = strtotime(date("Y",$ac_auto_time_unix)."/12/31 23:59");
            $time3 = strtotime((date("Y",$ac_auto_time_unix)+1)."/01/01 00:00");
            $time4 = strtotime((date("Y",$ac_auto_time_unix)+1)."/03/31 23:59");
            if($ac_auto_time_unix > $time1 && $ac_auto_time_unix < $time2 && $ac_time_unix > $time3 && $ac_time_unix < $time4){
                $noaddtag = 1;
            }

            // 3/20 - 3/31 = 4/1-6/30
            $time1 = strtotime(date("Y",$ac_auto_time_unix)."/03/20 00:00");
            $time2 = strtotime(date("Y",$ac_auto_time_unix)."/03/31 23:59");
            $time3 = strtotime(date("Y",$ac_auto_time_unix)."/04/01 00:00");
            $time4 = strtotime(date("Y",$ac_auto_time_unix)."/06/30 23:59");
            if($ac_auto_time_unix > $time1 && $ac_auto_time_unix < $time2 && $ac_time_unix > $time3 && $ac_time_unix < $time4){
                $noaddtag = 1;
            }

            // 6/20 - 6/30 = 7/1-9/30
            $time1 = strtotime(date("Y",$ac_auto_time_unix)."/06/20 00:00");
            $time2 = strtotime(date("Y",$ac_auto_time_unix)."/06/30 23:59");
            $time3 = strtotime(date("Y",$ac_auto_time_unix)."/07/01 00:00");
            $time4 = strtotime(date("Y",$ac_auto_time_unix)."/09/30 23:59");
            if($ac_auto_time_unix > $time1 && $ac_auto_time_unix < $time2 && $ac_time_unix > $time3 && $ac_time_unix < $time4){
                $noaddtag = 1;
            }

            // 9/20 - 9/30 = 10/1-12/31
            $time1 = strtotime(date("Y",$ac_auto_time_unix)."/09/20 00:00");
            $time2 = strtotime(date("Y",$ac_auto_time_unix)."/09/30 23:59");
            $time3 = strtotime(date("Y",$ac_auto_time_unix)."/10/01 00:00");
            $time4 = strtotime(date("Y",$ac_auto_time_unix)."/12/31 23:59");
            if($ac_auto_time_unix > $time1 && $ac_auto_time_unix < $time2 && $ac_time_unix > $time3 && $ac_time_unix < $time4){
                $noaddtag = 1;
            }
        }
    }

    // 若不在上述日期內則新增活動異動單
    if($noaddtag == 0){
        $SQL =  "INSERT INTO system_sign (branch,singlename,single,types,types2,notes,num,statnote,stat) VALUES (
                '".$_SESSION["branch"]."',
                '".$_SESSION["pname"]."',
                '".$_SESSION["MM_Username"]."',
                '活動異動單',
                '活動新增',
                '".("活動資訊：".$ac_time." ".$ac_title."[".$ac_auto."] 申請新增")."',
                '".$ac_auto."',
                '".("[".date("Y-m-d H:i:s")."] ".$_SESSION["pname"]."提出申請 - 活動新增<br>[".date("Y-m-d H:i:s")."] 由 系統自動 結案-已處理(活動標註為活動新增)")."',
                '8')";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();

        $SQL = "update action_data set ac_stat=2, ac_stat_time=getdate() wh++ere ac_auto='".$ac_auto."'";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
    }

    if($_REQUEST["goresize"] == "1"){
        reURL("ad_action_add2.php?a=".$ac_auto);
    }else{
        reURL("ad_action_list.php");
    }   
}

// 讀取活動資料
if($_REQUEST["ac_auto"] != ""){
    $SQL = "SELECT * FROM action_data where ac_auto=".SqlFilter($_REQUEST["ac_auto"],"int")."";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if($result){
        $ac_come = $result["ac_come"];
        $ac_open1 = $result["ac_open1"];
        $ac_open2 = $result["ac_open2"];
        $ac_run1 = $result["ac_run1"];
        $ac_run2 = $result["ac_run2"];
        $ac_con1 = $result["ac_con1"];
        $ac_con2 = $result["ac_con2"];
        $ac_show = $result["ac_show"];
        $ac_1 = $result["ac_1"];
        $ac_2 = $result["ac_2"];
        $ac_3 = $result["ac_3"];
        $ac_4 = $result["ac_4"];
        $ac_support = $result["ac_support"];
        $ac_car1 = $result["ac_car1"];
        $ac_car2 = $result["ac_car2"];
        $ac_car3 = $result["ac_car3"];
        $ac_car4 = $result["ac_car4"];
        $ac_branch = $result["ac_branch"];
        $ac_kind = $result["ac_kind"];
        $ac_kind2 = $result["ac_kind2"];
        $ac_kind3 = $result["ac_kind3"];
        $ac_tag = $result["ac_tag"];
        $ac_title = $result["ac_title"];
        $ac_time = $result["ac_time"];
        $deadline = Date_EN($result["deadline"],1);            
        $ac_money2 = $result["ac_money2"];
        $ac_money3 = $result["ac_money3"];
        $ac_money4 = $result["ac_money4"];
        $ac_money5 = $result["ac_money5"];
        $ac_money6 = $result["ac_money6"];
        $ac_money7 = $result["ac_money7"];
        $ac_money8 = $result["ac_money8"];
        $ac_money9 = $result["ac_money9"];
        $ac_money10 = $result["ac_money10"];
        $ac_money11 = $result["ac_money11"];
        $ac_area = $result["ac_area"];
        $ac_msg2 = $result["ac_msg2"];
        $ac_eat1 = $result["ac_eat1"];
        $ac_eat2 = $result["ac_eat2"];
        $ac_note = $result["ac_note"];	
        $ac_content = $result["ac_content"];	
        $ac_note2 = $result["ac_note2"];	
        $ac_note3 = $result["ac_note3"];	
        $ac_msg3 = $result["ac_msg3"];	
        $ac_msg4 = $result["ac_msg4"];        
        $ac_pic2 = $result["ac_pic2"];	
        $ac_pic3 = $result["ac_pic3"];	
        $ac_pic4 = $result["ac_pic4"];	
        $ac_pic5 = $result["ac_pic5"];	
        $needidcard = $result["needidcard"];
        $needworkcard = $result["needworkcard"];
        $needidcardt = $result["needidcardt"];
        $crossarea = $result["crossarea"];
        $event210725 = $result["event210725"];
        $springclub_show = $result["springclub_show"];        
        $ac_teacher_name = $result["ac_teacher_name"];	
        $ac_teacher_auton = $result["ac_teacher_auton"];

        $fsq = "&ac_auto=".SqlFilter($_REQUEST["ac_auto"],"int");
        $fsb = "修改";
        $ay = date("Y/m/d",strtotime($ac_time));
        $ahr = date("H",strtotime($ac_time));
        $amin = date("i",strtotime($ac_time));
    }else{
        call_alert("活動資料讀取錯誤。","ClOsE",0);
    }
}else{
    $ay = date("Y/m/d");
    $ad = "";
    $ahr= "";
    $amin="00";
    $fsb = "新增";
}

?>

<link rel="stylesheet" href="css/jquery.fileupload.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_action_list.php">網站活動上傳</a></li>
            <li class="active"><?php echo $fsb; ?>網站活動</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong><?php echo $fsb; ?>網站活動</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form action="?st=add<?php echo $fsq; ?>" method="post" id="addform" class="form-inline" onSubmit="return chk_form()">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td colspan=2>
                                    <span class="text-red"><i class="fa fa-star"></i></span>
                                    來源：
                                    <select name="ac_come" id="ac_come" required>
                                        <option value="">請選擇</option>
                                        <?php 
                                            $ac_come_arr = ["新開發","回客","推薦","其他"];
                                            foreach($ac_come_arr as $ac_c){
                                                if($ac_come == $ac_c){
                                                    echo "<option value=".$ac_c." selected>".$ac_c."</option>";
                                                }else{
                                                    echo "<option value=".$ac_c.">".$ac_c."</option>";
                                                }
                                            }
                                        ?>  
                                    </select>
                                    &nbsp;&nbsp;<span class="text-red"><i class="fa fa-star"></i></span> 
                                    開發者：
                                    <select name="ac_open1" id="ac_open1" required>
                                        <option value="">請選擇</option>
                                        <?php 
                                            $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' and admin_name<>'好好玩旅行社' Order By admin_SOrt";
                                            $rs = $SPConn->prepare($SQL);
                                            $rs->execute();
                                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);                                
                                            foreach($result as $re){
                                                if($re["admin_name"] == $ac_open1){
                                                    echo "<option value='".$re["admin_name"]."' selected>".$re["admin_name"]."</option>"; 
                                                }else{
                                                    echo "<option value='".$re["admin_name"]."'>".$re["admin_name"]."</option>"; 
                                                }                                                                              
                                            }
                                        ?> 
                                    </select>
                                    <select name="ac_open2" id="ac_open2" required>
                                        <option value="">請選擇</option>
                                        <?php
                                            if($ac_open1 != ""){
                                                $SQL = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".$ac_open1."' Order By p_desc2 Desc, lastlogintime Desc";
                                                $rs = $SPConn->prepare($SQL);
                                                $rs->execute();
                                                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                                if ( count($result) > 0 ){
                                                    foreach($result as $re){?>
                                                        <option value="<?php echo $re["p_user"];?>"<?php if ( $ac_open2 == $re["p_user"] ){?> selected<?php }?>><?php echo $re["p_other_name"]; ?></option>
                                                    <?php }
                                                }
                                            } 
                                        ?>
                                    </select>
                                    &nbsp;&nbsp;<span class="text-red"><i class="fa fa-star"></i></span> 
                                    執行者：
                                    <select name="ac_run1" id="ac_run1" required>
                                        <option value="">請選擇</option>
                                        <?php 
                                            $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' and admin_name<>'好好玩旅行社' Order By admin_SOrt";
                                            $rs = $SPConn->prepare($SQL);
                                            $rs->execute();
                                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);                                
                                            foreach($result as $re){
                                                if($re["admin_name"] == $ac_run1){
                                                    echo "<option value='".$re["admin_name"]."' selected>".$re["admin_name"]."</option>"; 
                                                }else{
                                                    echo "<option value='".$re["admin_name"]."'>".$re["admin_name"]."</option>"; 
                                                }                                                                              
                                            }
                                        ?>
                                    </select>
                                    <select name="ac_run2" id="ac_run2" required>
                                        <option value="">請選擇</option>
                                        <?php
                                            if($ac_run1 != ""){
                                                $SQL = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".$ac_run1."' Order By p_desc2 Desc, lastlogintime Desc";
                                                $rs = $SPConn->prepare($SQL);
                                                $rs->execute();
                                                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                                if ( count($result) > 0 ){
                                                    foreach($result as $re){?>
                                                        <option value="<?php echo $re["p_user"];?>"<?php if ( $ac_run2 == $re["p_user"] ){?> selected<?php }?>><?php echo $re["p_other_name"]; ?></option>
                                                    <?php }
                                                }
                                            } 
                                        ?>
                                    </select>

                                    &nbsp;&nbsp;講師：<select name="ac_teacher_auton" id="ac_teacher_auton">
                                        <option value="">請選擇</option>
                                        <?php 
                                            $SQL = "SELECT auton, name FROM si_salon_teacher where review=1 order by descs desc";
                                            $rs = $SPConn->prepare($SQL);
                                            $rs->execute();
                                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);                                
                                            foreach($result as $re){
                                                if($re["auton"] == $ac_teacher_auton){
                                                    echo "<option value='".$re["auton"]."' selected>".$re["name"]."</option>";
                                                }else{
                                                    echo "<option value='".$re["auton"]."'>".$re["name"]."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>
                                    <label><input type="checkbox" name="ac_show" value="1" <?php if($ac_show == "1") echo "checked" ?>> 前台不顯示</label>
                                    <label><input type="checkbox" name="needidcardt" value="1" <?php if($needidcardt == "1") echo "checked" ?>> 需輸入身分證字號</label>
                                    <label><input type="checkbox" name="needidcard" value="1" <?php if($needidcard == "1") echo "checked" ?>> 需上傳身分證</label>
                                    <label><input type="checkbox" name="event210725" value="1" <?php if($event210725 == "1") echo "checked" ?>> 好好玩講師列表</label>
                                    <label><input type="checkbox" name="crossarea" value="1" <?php if($crossarea == "1") echo "checked" ?>> 跨區活動</label>
                                    <!--<label><input type="checkbox" name="needworkcard" value="1" <?php if($needworkcard == "1") echo "checked" ?>> 需上傳工作證</label>        	-->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-red"><i class="fa fa-star"></i></span> 
                                    主辦單位：<input type="text" name="ac_1" value="<?php echo $ac_1; ?>" class="form-control" required>
                                    &nbsp;&nbsp;協辦單位：<input type="text" name="ac_2" value="<?php echo $ac_2; ?>" class="form-control">
                                    &nbsp;&nbsp;指導單位：<input type="text" name="ac_3" value="<?php echo $ac_3; ?>" class="form-control">
                                    &nbsp;&nbsp;贙助單位：<input type="text" name="ac_4" value="<?php echo $ac_4; ?>" class="form-control">
                                    &nbsp;&nbsp;承辦廠商：<input type="text" name="ac_support" value="<?php echo $ac_support; ?>" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    上車地點一：<input type="text" name="ac_car1" value="<?php echo $ac_car1; ?>" class="form-control">
                                    &nbsp;&nbsp;上車地點二：<input type="text" name="ac_car2" value="<?php echo $ac_car2; ?>" class="form-control">
                                    &nbsp;&nbsp;上車地點三：<input type="text" name="ac_car3" value="<?php echo $ac_car3; ?>" class="form-control">
                                    &nbsp;&nbsp;上車地點四：<input type="text" name="ac_car4" value="<?php echo $ac_car4; ?>" class="form-control">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <span class="text-red"><i class="fa fa-star"></i></span> 
                                    承辦會館：
                                    <select name="ac_branch" id="ac_branch" class="form-control" required>                                        
                                        <?php
                                            if($ac_branch != ""){
                                                echo "<option value='".$ac_branch."' selected>".$ac_branch."</option>";
                                            }else{
                                                echo "<option value=''>請選擇</option>";
                                            }
                                            if($_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "count"){
                                                $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' and admin_name<>'好好玩旅行社' Order By admin_SOrt";
                                                $rs = $SPConn->prepare($SQL);
                                                $rs->execute();
                                                $result=$rs->fetchAll(PDO::FETCH_ASSOC);                                            
                                                foreach($result as $re){
                                                    echo "<option value='".$re["admin_name"]."'>".$re["admin_name"]."</option>";                                                                             
                                                }  
                                            }else{
                                                echo "<option value='".$_SESSION["branch"]."'>".$_SESSION["branch"]."</option>";
                                                if($_SESSION["action_level"] == 1){ // 南區企劃經理
                                                    echo "<option value='台南'>台南</option>";
                                                    echo "<option value='高雄'>高雄</option>";
                                                    echo "<option value='台北'>台北</option>";
                                                }elseif($_SESSION["action_level"] == 2){ // 北區企劃經理
                                                    echo "<option value='台北'>台北</option>";
                                                    echo "<option value='桃園'>桃園</option>";
                                                    echo "<option value='新竹'>新竹</option>";
                                                    echo "<option value='台中'>台中</option>";
                                                }elseif($_SESSION["action_level"] == 3){ // 企劃總監
                                                    $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' and admin_name<>'好好玩旅行社' and admin_name<>'總管理處' Order By admin_SOrt";
                                                    $rs = $SPConn->prepare($SQL);
                                                    $rs->execute();
                                                    $result=$rs->fetchAll(PDO::FETCH_ASSOC);                                            
                                                    foreach($result as $re){
                                                        echo "<option value='".$re["admin_name"]."'>".$re["admin_name"]."</option>";                                                                             
                                                    } 
                                                }
                                            } 
                                        ?>
                                    </select>
                                    <span id="issingleparty_div" style="display:none">
                                        &nbsp;&nbsp;
                                        <input type="checkbox" name="springclub_show" value="spring" <?php if(stripos($springclub_show,"spring") != false) echo "checked"; ?>> 春天
                                        <input type="checkbox" name="springclub_show" value="dmn" <?php if(stripos($springclub_show,"dmn") != false) echo "checked"; ?>> DMN
                                    </span>

                                    &nbsp;&nbsp;<span class="text-red"><i class="fa fa-star"></i></span> 
                                    活動類別： 
                                    <select name="ac_kind3" id="ac_kind3" class="form-control" autocomplete="off" required>
                                        <option value="">請選擇</option>
                                        <option value="約會活動" <?php if($ac_kind3 == "約會活動") echo "selected"; ?>>約會活動</option>
                                        <option value="主題活動" <?php if($ac_kind3 == "主題活動") echo "selected"; ?>>主題活動</option>
                                    </select>
                                    &nbsp;&nbsp;<select name="ac_kind" id="ac_kind" class="form-control" autocomplete="off" required>
                                        <option value="">請選擇</option>
                                    </select>
                                    <select name="ac_kind2" id="ac_kind2" class="form-control" autocomplete="off" required>
                                        <option value="">請選擇</option>
                                    </select>
                                    &nbsp;&nbsp;歸屬：<select class="form-control" name="ac_tag" id="ac_tag">
                                        <option value="">如無免選</option>
                                        <option value="委外活動23" <?php if($ac_tag == "委外活動23") echo "selected"; ?>>委外活動23</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-red"><i class="fa fa-star"></i></span> 活動標題(15字)： <input name="ac_title" type="text" id="ac_title" class="form-control" value="<?php echo $ac_title; ?>" maxlength="15" style="width:70%" required>
                                    <?php
                                        if($_SESSION["MM_UserAuthorization"] != "admin"){
                                            echo "&nbsp;&nbsp;<font color=red>無法修改</font>";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="text-red"><i class="fa fa-star"></i></span> 活動時間：<input type="text" name="actime" id="actime" value="<?php echo $ay; ?>" class="datepicker" autocomplete="off" required>
                                    <input type="number" name="ahr" id="ahr" value="<?php echo $ahr; ?>" class="form-control" min="1" max="24" required>
                                    時
                                    <select name="amin" id="amin" class="form-control" required>
                                        <option value="00" <?php if($amin == "00") echo "selected"; ?>>00</option>
                                        <option value="15" <?php if($amin == "15") echo "selected"; ?>>15</option>
                                        <option value="30" <?php if($amin == "30") echo "selected"; ?>>30</option>
                                        <option value="45" <?php if($amin == "45") echo "selected"; ?>>45</option>
                                    </select>
                                    分
                                    <?php
                                        if($_SESSION["MM_UserAuthorization"] != "admin"){
                                            echo "&nbsp;&nbsp;<font color=red>無法修改</font>";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>報名截止日期：<input name="deadline" id="deadline" type="text" class="datepicker" autocomplete="off" value="<?php echo $deadline; ?>"></td>
                            </tr>

                            <tr>
                                <td>
                                    <small>(填 0 顯示電洽，不填寫不顯示)</small>
                                    <br>
                                    約會專家價-男：<input type="number" name="ac_money2" id="ac_money2" value="<?php echo $ac_money2; ?>" class="form-control">
                                    &nbsp;&nbsp;約會專家價-女：<input type="number" name="ac_money3" id="ac_money3" value="<?php echo $ac_money3; ?>" class="form-control">
                                    &nbsp;&nbsp;春天會員價-男：<input type="number" name="ac_money6" id="ac_money6" value="<?php echo $ac_money6; ?>" class="form-control">
                                    &nbsp;&nbsp;春天會員價-女：<input type="number" name="ac_money7" id="ac_money7" value="<?php echo $ac_money7; ?>" class="form-control">
                                    <br>
                                    DMN會員價-男：<input type="number" name="ac_money8" id="ac_money8" value="<?php echo $ac_money8; ?>" class="form-control">
                                    &nbsp;&nbsp;DMN會員價-女：<input type="number" name="ac_money9" id="ac_money9" value="<?php echo $ac_money9; ?>" class="form-control">
                                    &nbsp;&nbsp;好好玩會員價-男：<input type="number" name="ac_money10" id="ac_money10" value="<?php echo $ac_money10; ?>" class="form-control">
                                    &nbsp;&nbsp;好好玩會員價-女：<input type="number" name="ac_money11" id="ac_money11" value="<?php echo $ac_money11; ?>" class="form-control">
                                    <br>
                                    結盟廠商價-男：<input type="number" name="ac_money4" id="ac_money4" value="<?php echo $ac_money4; ?>" class="form-control">
                                    &nbsp;&nbsp;結盟廠商價-女：<input type="number" name="ac_money5" id="ac_money5" value="<?php echo $ac_money5; ?>" class="form-control">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <span class="text-red"><i class="fa fa-star"></i></span> 活動地點： <select class="form-control" name="ac_area" id="ac_area" required>
                                        <option value="">請選擇</option>
                                        <?php
                                            if($ac_area != ""){
                                                echo "<option value='".$ac_area."' selected>".$ac_area."</option>";
                                            }
                                        ?>
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
                                    </select>
                                    &nbsp;&nbsp;報名人數：<input name="ac_msg2" type="text" id="ac_msg2" value="<?php echo $ac_msg2; ?>" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>餐點：<input type="text" name="ac_eat1" id="ac_eat1" value="<?php echo $ac_eat1; ?>" class="form-control">&nbsp&nbsp&nbsp請使用,做餐點區格，如：排骨飯,雞腿飯,帝王蟹<br>
                                    飲品：<input type="text" name="ac_eat2" id="ac_eat2" value="<?php echo $ac_eat2; ?>" class="form-control">&nbsp&nbsp&nbsp請使用,做飲品區格，如：紅茶,綠茶,奶茶</td>
                            </tr>

                            <tr>
                                <td>
                                    <?php 
                                        if($ac_note != ""){
                                            $ac_note = SqlFilter(str_replace("<br>",PHP_EOL,$ac_note),"str");
                                        }
                                        if($ac_content != ""){
                                            $ac_content = SqlFilter(str_replace("<br>",PHP_EOL,$ac_content),"str");
                                        }
                                        if($ac_note2 != ""){
                                            $ac_note2 = SqlFilter(str_replace("<br>",PHP_EOL,$ac_note2),"str");
                                        }
                                        if($ac_note3 != ""){
                                            $ac_note3 = SqlFilter(str_replace("<br>",PHP_EOL,$ac_note3),"str");
                                        }
                                    ?>
                                    <table class="nomargin nopadding" style="width:100%;">
                                        <tr>
                                            <td>
                                                <span class="text-red"><i class="fa fa-star"></i></span>活動特色：(請輸入至少50字)<br>
                                                <textarea name="ac_note" id="ac_note" style="width:80%;height:150px;" minlength="50" class="form-control" required><?php echo $ac_note; ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>報名方式：<br><textarea name="ac_note2" id="ac_note2" style="width:80%;height:150px;" class="form-control"><?php echo $ac_note2; ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>                                                
                                                <span class="text-red"><i class="fa fa-star"></i></span>活動介紹：(請輸入至少100字)<br>
                                                <textarea name="ac_content" id="ac_content" style="width:80%;height:150px;" minlength="100" class="form-control" required><?php echo $ac_content; ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>注意事項：<br><textarea name="ac_note3" id="ac_note3" style="width:80%;height:150px;" class="form-control"><?php echo $ac_note3; ?></textarea></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    洽詢專線：<input name="ac_msg4" type="text" id="ac_msg4" value="<?php echo $ac_msg4; ?>" class="form-control">
                                    &nbsp;&nbsp;聯絡人：
                                    <select name="ac_con1" id="ac_con1">
                                        <option value="">請選擇</option>
                                        <?php 
                                            $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' and admin_name<>'好好玩旅行社' Order By admin_SOrt";
                                            $rs = $SPConn->prepare($SQL);
                                            $rs->execute();
                                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);                                
                                            foreach($result as $re){
                                                if($re["admin_name"] == $ac_con1){
                                                    echo "<option value='".$re["admin_name"]."' selected>".$re["admin_name"]."</option>"; 
                                                }else{
                                                    echo "<option value='".$re["admin_name"]."'>".$re["admin_name"]."</option>"; 
                                                }                                                                              
                                            }
                                        ?>                                        
                                    </select>
                                    <select name="ac_con2" id="ac_con2">
                                        <option value="">請選擇</option>
                                        <?php
                                            if($ac_con1 != ""){
                                                $SQL = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".$ac_con1."' Order By p_desc2 Desc, lastlogintime Desc";
                                                $rs = $SPConn->prepare($SQL);
                                                $rs->execute();
                                                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                                if ( count($result) > 0 ){
                                                    foreach($result as $re){?>
                                                        <option value="<?php echo $re["p_user"];?>"<?php if ( $ac_con2 == $re["p_user"] || $ac_con2 == $re["p_other_name"]){?> selected<?php }?>><?php echo $re["p_other_name"]; ?></option>
                                                    <?php }
                                                }
                                            } 
                                        ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td colspan=2>活動照片：<font color=red>至少 518 x 345</font>
                                    <table border=1 width="100%" style="border-collapse: collapse;border:1px solid #999;">
                                        <tr>
                                            <td width="25%" align="center">
                                                <span id="ac_pic2_img"></span>
                                                <?php 
                                                    if($ac_pic2 != ""){ ?>
                                                        <a href="?st=delp&v=ac_pic2&ac=<?php echo SqlFilter($_REQUEST["ac_auto"],"int"); ?>">刪除</a>
                                                        <br><a href="upload_image/<?php echo $ac_pic2; ?>" class="fancybox"><img width=300 src="upload_image//<?php echo $ac_pic2; ?>" border=0></a>
                                                    <?php }
                                                ?>       
                                                <div>
                                                    <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_uploads2" name="file_uploads2" type="file" class="file_upload_d" data-n="2" <?php if($ac_pic2 != "") echo "data-op='".$ac_pic2."'"; ?>></span>
                                                    <div id="progress" class="progress progress-striped" style="display:none">
                                                        <div class="bar progress-bar progress-bar-lovepy"></div>
                                                    </div>
                                                    <div id="fileupload_show2"></div>
                                                    <input type="hidden" name="ac_pic2" id="ac_pic2" value="<?php echo $ac_pic2; ?>">
                                                </div>
                                            </td>
                                            <!-- 
                                            <td width="25%" align="center">
                                                <span id="ac_pic3_img"></span>
                                                <?php 
                                                    if($ac_pic3 != ""){ ?>
                                                        <a href="?st=delp&v=ac_pic3&ac=<?php echo SqlFilter($_REQUEST["ac_auto"],"int"); ?>">刪除</a>
                                                        <br><a href="upload_image/<?php echo $ac_pic3; ?>" class="fancybox"><img width=300 src="upload_image/<?php echo $ac_pic3; ?>" border=0></a
                                                    <?php }
                                                ?>
                                                <div>
                                                    <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_uploads3" name="file_uploads3" type="file" class="file_upload_d" data-n="3" <?php if($ac_pic3 != "") echo "data-op='".$ac_pic3."'"; ?>></span>
                                                    <div id="progress" class="progress progress-striped" style="display:none">
                                                        <div class="bar progress-bar progress-bar-lovepy"></div>
                                                    </div>
                                                    <div id="fileupload_show3"></div>
                                                    <input type="hidden" name="ac_pic3" id="ac_pic3" value="<?php echo $ac_pic3; ?>">
                                                </div>
                                            </td>
                                            <td width="25%" align="center">
                                                <span id="ac_pic4_img"></span>
                                                <?php 
                                                    if($ac_pic4 != ""){ ?>
                                                        <a href="?st=delp&v=ac_pic4&ac=<?php echo SqlFilter($_REQUEST["ac_auto"],"int"); ?>">刪除</a>
                                                        <br><a href="upload_image/<?php echo $ac_pic4; ?>" class="fancybox"><img width=300 src="upload_image/<?php echo $ac_pic4; ?>" border=0></a
                                                    <?php }
                                                ?>
                                                <div>
                                                    <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_uploads4" name="file_uploads4" type="file" class="file_upload_d" data-n="4" <?php if($ac_pic4 != "") echo "data-op='".$ac_pic4."'"; ?>></span>
                                                    <div id="progress" class="progress progress-striped" style="display:none">
                                                        <div class="bar progress-bar progress-bar-lovepy"></div>
                                                    </div>
                                                    <div id="fileupload_show4"></div>
                                                    <input type="hidden" name="ac_pic4" id="ac_pic4" value="<?php echo $ac_pic4; ?>">
                                                </div>
                                            </td>
                                            <td width="25%" height="100" align="center">
                                                <span id="ac_pic5_img"></span>
                                                <?php 
                                                    if($ac_pic5 != ""){ ?>
                                                        <a href="?st=delp&v=ac_pic5&ac=<?php echo SqlFilter($_REQUEST["ac_auto"],"int"); ?>">刪除</a>
                                                        <br><a href="upload_image/<?php echo $ac_pic5; ?>" class="fancybox"><img width=300 src="upload_image/<?php echo $ac_pic5; ?>" border=0></a
                                                    <?php }
                                                ?>
                                                <div>
                                                    <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_uploads5" name="file_uploads5" type="file" class="file_upload_d" data-n="5" <?php if($ac_pic5 != "") echo "data-op='".$ac_pic5."'"; ?>></span>
                                                    <div id="progress" class="progress progress-striped" style="display:none">
                                                        <div class="bar progress-bar progress-bar-lovepy"></div>
                                                    </div>
                                                    <div id="fileupload_show5"></div>
                                                    <input type="hidden" name="ac_pic5" id="ac_pic5" value="<?php echo $ac_pic5; ?>">
                                                </div>
                                            </td> -->

                                        </tr>
                                    </table>
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <div align="center">
                                        <input type="hidden" id="goresize" name="goresize" value="0">
                                        <input id="submit3" type="submit" value="確定<?php echo $fsb; ?>" class="btn btn-info" style="width:50%;">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->


    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script type="text/javascript" src="assets/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.fileupload.js"></script>
<script type="text/javascript">
    $mtu = "ad_action_list.";
    var $ff = [];
    var $nowffc = 0,
        $uploadc = 1;

    function chk_form() {
        if ($ff.length && $uploadc) {
            $.each($ff, function(i) {
                $(this).submit();
            });
            return false;
        }
        return true;
    }


    $(function() {

        //產生開發者下拉選單
        $("#ac_open1").change(function () {
            var branch = $("#ac_open1").val();
            removeOptions('ac_open2');
            AjaxLoadSuccess("ac_open2", branch, "get_personnel");
        });        
       
        //產生執行者下拉選單
        $("#ac_run1").change(function () {
            var branch = $("#ac_run1").val();
            removeOptions('ac_run2');
            AjaxLoadSuccess("ac_run2", branch, "get_personnel");
        });

        //產生聯絡人下拉選單
        $("#ac_con1").change(function () {
            var branch = $("#ac_con1").val();
            removeOptions('ac_con2');
            AjaxLoadSuccess("ac_con2", branch, "get_personnel");
        });

        $(".file_upload_d").each(function() {

            var $this = $(this),
                $thisid = $this.attr("id"),
                $progress = $this.closest("div").find(".progress");
            var $imgs = $(this).closest("span").find("#cimg").val();
            var $op = $this.data("op"),
                $n = $this.data("n");

            $this.fileupload({
                    url: "ad_action_add.php?st=upload&old_pic=" + $op,
                    type: "POST",
                    dropZone: $this,
                    dataType: 'html',
                    autoUpload: false,
                    done: function(e, data) {

                        if (data.result) {

                            switch (data.result) {
                                case "nowidth":
                                    $progress.find(".progress-bar").css("width", "0px").stop().parent().hide();
                                    alert("上傳的照片寬度過小，請上傳大於 500 px 的照片。");
                                    break;
                                case "noext":
                                    $progress.find(".progress-bar").css("width", "0px").stop().parent().hide();
                                    alert("上傳的照片無副檔名請確認後再上傳。");
                                    break;
                                default:
                                    var $ffc = $ff.length;
                                    $("#ac_pic" + $n).val(data.result);
                                    if ($ffc == $nowffc + 1) {
                                        $uploadc = 0;
                                        //console.log("send"+$nowffc);
                                        $("#goresize").val("1");
                                        $("#addform").submit();
                                    }
                                    $nowffc++;
                                    break;
                            }

                        }
                    },
                    fail: function(e, data) {

                    },
                    progressall: function(e, data) {
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        $progress.show().find(".progress-bar").css(
                            'width',
                            progress + '%'
                        );
                    },
                    add: function(e, data) {
                        var uploadErrors = [];
                        var acceptFileTypes = /^image\/(gif|jpe?g|png)$/i;
                        if (data.originalFiles[0]['type'].length && !acceptFileTypes.test(data.originalFiles[0]['type'])) {
                            uploadErrors.push('目前僅開放上傳 gif, jpg, jpeg, png 檔案。');
                        }
                        if (data.originalFiles[0]['size'] > 5000000) {
                            uploadErrors.push('檔案大小超過限制。');
                        }
                        if (uploadErrors.length > 0) {
                            alert(uploadErrors.join("\n"));
                        }
                        if (data.files) {
                            $("#fileupload_show" + $n).html(data.files[data.files.length - 1].name);
                            $ //("#ac_pic"+$n).val(data.files[data.files.length-1].name);        	
                            var $funame = "file_uploads" + $n,
                                $fsplice = -1;
                            if ($ff.length > 0) {
                                $.each($ff, function(j) {
                                    if ($ff[j]["paramName"] == $funame) $fsplice = j;
                                });
                            }
                            if ($fsplice >= 0) $ff.splice($fsplice, 1);

                            $ff.push(data);
                            console.log($ff);
                        }
                    }
                }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

        });


        var $allkind = {
            "心約會": "戀愛講堂,魅力有約,品味生活,互動美學",
            "趣約會": "輕旅行,主題特別企劃,國外旅遊",
            "饗約會": "主題精緻餐會,美味廚房,健康料理",
            "愛約會": "一對一排約,多平台排約",
            "揪約會": "多對多約會,主題式約會,下午茶約會",
            "戀愛會客室": "與名人有約,一對一個人解析諮詢,一對一整體造型諮詢,一對一愛情諮詢,約後一對一諮詢",
            "好好玩類型": "戶外踏青,午茶約會,主題系列,熟齡專區,小資首選"
        };

        $("#ac_kind").on("change", function() {
            var $os = $("#ac_kind2"),
                $this = $(this);
            $os.find("option").remove();
            $os.append($("<option></option>").attr("value", "").text("請選擇"));
            $.each($allkind, function($key, $item) {
                if ($key == $this.val()) {
                    $.each($item.split(","), function($v1, $v2) {
                        $os.append($("<option></option>").attr("value", $v2).text($v2));
                    });
                }
            });

        });

        $("#ac_branch").on("change", function() {
            var $os = $("#ac_kind"),
                $this = $(this);
            $os.find("option").remove();

            if ($this.val() == "好好玩旅行社") {
                $os.append($("<option></option>").attr("value", "好好玩類型").text("好好玩類型"));
            } else {
                $os.append($("<option></option>").attr("value", "心約會").text("心約會"));
                $os.append($("<option></option>").attr("value", "趣約會").text("趣約會"));
                $os.append($("<option></option>").attr("value", "饗約會").text("饗約會"));
                $os.append($("<option></option>").attr("value", "愛約會").text("愛約會"));
                $os.append($("<option></option>").attr("value", "揪約會").text("揪約會"));
                $os.append($("<option></option>").attr("value", "戀愛會客室").text("戀愛會客室"));
            }
            $("#ac_kind").trigger("change");

            if ($this.val() == "約專") {
                $("#issingleparty_div").show();
            } else {
                $("#issingleparty_div").hide();
            }

        });

        $("#ac_teacher_auton").on("change", function() {
            var $this = $(this),
                $event210725 = $("input[name='event210725']");

            if ($this.val() == "51" ||
                $this.val() == "52" ||
                $this.val() == "53" ||
                $this.val() == "13"
            ) {
                $event210725.prop("checked", true);
            } else {
                $event210725.prop("checked", false);
            }

        });

        <?php 
            if($_REQUEST["ac_auto"] != ""){ ?>
                $("#ac_branch").val("<?php echo $ac_branch; ?>").trigger("change");
                $("#ac_kind").val("<?php echo $ac_kind; ?>").trigger("change");
                $("#ac_kind2").val("<?php echo $ac_kind2; ?>");
            <?php }   
        ?>
    });
</script>