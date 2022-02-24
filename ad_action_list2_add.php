<?php
    /*****************************************/
    //檔案名稱：ad_action_list2_add.php
    //後台對應位置：管理系統/網站活動上傳/網站活動團控>新增參加人員
    //改版日期：2022.2.21
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/
    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
    if ($_SESSION["MM_Username"] == "") {
        call_alert("請重新登入。", "login.php", 0);
    }

    if($_REQUEST["st"] == "add"){
        if($_REQUEST["id"] != ""){
            $SQL = "SELECT * FROM action_data where ac_auto='".SqlFilter($_REQUEST["id"],"int")."'";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                $action_branch = $result["ac_branch"];
                $action_title = $result["ac_title"];
                $action_note = $result["ac_note"];
                $action_time = $result["ac_time"];
                $action_kind = $result["ac_kind"];
                $action_kind2 = $result["ac_kind2"];
                $action_auto = $result["ac_auto"];
            }else{
                call_alert("活動資料讀取錯誤。","ClOsE",0);
            }
        }

        // 更新與新增共用變數        
        if($_REQUEST["k_fid"] != ""){
            $k_fid = SqlFilter($_REQUEST["k_fid"],"tab");
        }
        $k_bday = SqlFilter($_REQUEST["k_year1"],"int")."/".SqlFilter($_REQUEST["k_year2"],"int")."/".SqlFilter($_REQUEST["k_year3"],"int");
        // checkbox陣列
        if($_REQUEST["k_2"] != ""){
            $k_2 = $_REQUEST["k_2"];
            $k_2 = implode(",",$k_2);
        }        
        $k_mobile = chk_mobile(SqlFilter($_REQUEST["k_mobile"],"tab"));
        $mymem_num = SqlFilter($_REQUEST["mymem_num"],"tab");
        if($_REQUEST["ac_car"] != ""){
            $ac_car = SqlFilter($_REQUEST["ac_car"],"tab");
        }

        if($_REQUEST["kid"] != ""){
            $SQL = "SELECT * FROM love_keyin where k_id=".SqlFilter($_REQUEST["kid"],"int")."";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if(!$result){
                call_alert("參加人員資料讀取錯誤。","ClOsE",0);
            }

            // 更新
            $SQL =  "UPDATE love_keyin SET 
                    k_name='".SqlFilter($_REQUEST["k_name"],"tab")."',
                    k_sex='".SqlFilter($_REQUEST["k_sex"],"tab")."',
                    k_fid='".$k_fid."',
                    k_bday='".$k_bday."', 
                    k_year='".SqlFilter($_REQUEST["k_year1"],"tab")."',
                    k_eat='".SqlFilter($_REQUEST["k_eat"],"tab")."',
                    k_phone='".SqlFilter($_REQUEST["k_phone"],"tab")."',
                    k_mobile='".$k_mobile."',
                    k_company='".SqlFilter($_REQUEST["k_company"],"tab")."',
                    k_company2='".SqlFilter($_REQUEST["k_company2"],"tab")."',
                    k_area='".SqlFilter($_REQUEST["k_area"],"tab")."',
                    k_address='".SqlFilter($_REQUEST["k_address"],"tab")."',
                    k_yn='".SqlFilter($_REQUEST["email"],"tab")."',
                    k_line='".SqlFilter($_REQUEST["lineid"],"tab")."',
                    k_fbname='".SqlFilter($_REQUEST["fbname"],"tab")."',
                    k_school='".SqlFilter($_REQUEST["k_school"],"tab")."',
                    k_money='".SqlFilter($_REQUEST["money"],"tab")."',
                    k_eat1='".SqlFilter($_REQUEST["k_eat1"],"tab")."',
                    k_eat2='".SqlFilter($_REQUEST["k_eat2"],"tab")."',
                    k_2='".$k_2."',
                    all_note2='".SqlFilter($_REQUEST["remark"],"str")."',
                    ac_car='".$ac_car."'
                    WHERE k_id=".SqlFilter($_REQUEST["kid"],"int")."";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
        }else{            
            $SQL = "SELECT top 1 * FROM love_keyin where all_kind='活動' and k_mobile = '".$k_mobile."' and action_auto='".$action_auto."'";
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result = $rs->fetch(PDO::FETCH_ASSOC);
            if($result){
                call_alert("這場活動已有此電話號碼存在。",0,0);
            }

            $confirm2_1 = 0;
            $confirm3_1 = 0;

            // 排約預訂 check
            if($mymem_num != "" && $k_mobile != "" && $_REQUEST["isdouble2_1"] == "1"){
                if($_REQUEST["mybranch"] == "八德"){
                    $checksql = " and ((n1b = '八德' and n10='".$k_mobile."') or (v1b = '八德' and v10 = '".$k_mobile."'))";
                }else{
                    $checksql = " and ((n1b <> '八德' and n10='".$k_mobile."') or (v1b <> '八德' and v10 = '".$k_mobile."'))";
                }

                $SQL = "select top 1 * from love_re_invite where datediff(day, n11, '".Date_EN($action_time,9)."') = 0".$checksql."";
                $rs = $SPConn->prepare($SQL);
                $rs->execute();
                $result = $rs->fetch(PDO::FETCH_ASSOC);
                if($result){
                    $confirm2_1 = 1;
                }
            }

            // 諮詢預訂 check
            if($mymem_num != "" && $k_mobile != "" && $_REQUEST["isdouble3_1"] != "1"){
                if($_REQUEST["mybranch"] == "八德"){
                    $checksql = " and mem_branch = '八德'";
                }else{
                    $checksql = " and mem_branch <> '八德'";
                }

                $SQL = "select top 1 * from ad_advisory_invite where (mem_mobile='".$k_mobile."') and datediff(day, itimes, '".Date_EN($action_time,9)."') = 0".$checksql."";
                $rs = $SPConn->prepare($SQL);
                $rs->execute();
                $result = $rs->fetch(PDO::FETCH_ASSOC);
                if($result){
                    $confirm3_1 = 1;
                }
            }

            if($confirm2_1 == 1 || $confirm3_1 == 1){ ?>
                <!doctype html>
                <html lang="en-US">
                    <head>
                        <meta charset="utf-8" />
                        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                        <title>SD CRM MEMBER Check</title>
                        <link href="assets/plugins/bootstrap/css/bootstrap.min.css?v=1.5" rel="stylesheet" type="text/css" />
                        <link href="assets/css/essentials.css?v=2.1" rel="stylesheet" type="text/css" />
                        <style>
                            .radio, .checkbox {
                                padding-left:25px;
                            }
                        </style>
                        <meta name="viewport" content="width=device-width, maximum-scale=5, minimum-scale=1.0, initial-scale=1, user-scalable=0" />
                    </head>
                    <body>                
                        <div class="content">
                            <div class="rowx" style="padding-top:150px;">
                                <form action="?st=add" method="post">		
                                <center>
                                    <?php if($confirm2_1 = 1){ ?>
                                        <div><label class="checkbox"><input type="checkbox" name="isdouble2_1" id="isdouble2_1" value="1" required><i></i> <font color=red>參加人員 <?php echo SqlFilter($_REQUEST["k_name"],"tab"); ?> 於 <?php echo Date_EN($action_time,9); ?> 已有預訂排約，請確認是否要在同一天報名活動</font></div></label>
                                    <?php } ?>
                                    <?php if($confirm3_1 = 1){ ?>
                                        <div><label class="checkbox"><input type="checkbox" name="isdouble3_1" id="isdouble3_1" value="1" required><i></i> <font color=red>參加人員 <?php echo SqlFilter($_REQUEST["k_name"],"tab"); ?> 於 <?php echo Date_EN($action_time,9); ?> 已有預訂諮詢 <?php echo $acname; ?>，請確認是否要在同一天報名活動</font></div></label>
                                    <?php } ?>
                                    <small>如要繼續報名請勾選方框</small>
                                    <?php 
                                        foreach($_REQUEST as $_R){
                                            echo "<input type='hidden' name='".$_R."' value='".$_REQUEST[$_R]."'>";
                                        }
                                    ?>                                    
                                    <div class="padding-top-30"><input type="button" onclick="history.back();" class="btn btn-danger" value="取消報名">&nbsp;&nbsp;<input type="submit" class="btn btn-success" value="確定報名"></div>
                                </center>
                                </form>
                            </div>
                        </div>
                    </body>
                </html>
            <?php 
                reURL("ad_action_list2_add.php?id=".$action_auto."&st=read&keyword=".$mymem_num."&p=".$k_mobile."&d=".Date_EN($action_time,9).$llink."");
            }            
        }

        // 新增
        if($_REQUEST["kid"] == ""){
            $k_time = date("Y/m/d H:i:s");
            $send_time = date("Y/m/d H:i:s");
            $k_come = "後台建立";
            $all_kind = "活動";
            if($_REQUEST["mymem_num"] != ""){
                $mem_num = SqlFilter($_REQUEST["mymem_num"],"tab");
                $all_branch = SqlFilter($_REQUEST["mybranch"],"tab");
                $all_single = SqlFilter($_REQUEST["mysingle"],"tab");
                $all_type = "已發送";	 
            }
        }
        $SQL =  "INSERT INTO love_keyin (k_time,send_time,k_come,all_kind,mem_num,all_branch,all_single,all_type,k_name,k_sex,k_fid,k_bday,k_year,
                k_eat,k_phone,k_mobile,k_company,k_company2,k_area,k_address,k_yn,k_line,k_fbname,k_school,k_money,k_eat1,k_eat2,k_2,all_note2,
                action_branch,action_title,action_note,action_time,action_auto,action_kind,action_kind2,ac_car) VALUES (
                '".$k_time."',
                '".$send_time."',
                '".$k_come."',
                '".$all_kind."',
                '".$mem_num."',
                '".$all_branch."',
                '".$all_single."',
                '".$all_type."',
                '".SqlFilter($_REQUEST["k_name"],"tab")."',
                '".SqlFilter($_REQUEST["k_sex"],"tab")."',
                '".SqlFilter($_REQUEST["k_fid"],"tab")."',
                '".$k_bday."',
                '".SqlFilter($_REQUEST["k_year1"],"int")."',
                '".SqlFilter($_REQUEST["k_eat"],"tab")."',
                '".SqlFilter($_REQUEST["k_phone"],"tab")."',
                '".$k_mobile."',
                '".SqlFilter($_REQUEST["k_company"],"tab")."',
                '".SqlFilter($_REQUEST["k_company2"],"tab")."',
                '".SqlFilter($_REQUEST["k_area"],"tab")."',
                '".SqlFilter($_REQUEST["k_address"],"tab")."',
                '".SqlFilter($_REQUEST["email"],"tab")."',
                '".SqlFilter($_REQUEST["lineid"],"tab")."',
                '".SqlFilter($_REQUEST["fbname"],"tab")."',
                '".SqlFilter($_REQUEST["k_school"],"tab")."',
                '".SqlFilter($_REQUEST["money"],"tab")."',
                '".SqlFilter($_REQUEST["k_eat1"],"tab")."',
                '".SqlFilter($_REQUEST["k_eat2"],"tab")."',
                '".$k_2."',
                '".SqlFilter($_REQUEST["remark"],"str")."',
                '".$action_branch."',
                '".$action_title."',
                '".$action_note."',
                '".$action_time."',
                '".$action_auto."',
                '".$action_kind."',
                '".$action_kind2."',
                '".$ac_car."')";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();

        $singlenames = SingleName($_SESSION["MM_Username"],"normal");
        if($_REQUEST["mymem_num"] != ""){
            $log_num = SqlFilter($_REQUEST["mymem_num"],"int");
        }
        if($_REQUEST["k_fid"] != ""){
            $log_fid = strtoupper(SqlFilter($_REQUEST["k_fid"],"tab"));
        }
        $log_4 = "由 ".$singlenames." 替 ".SqlFilter($_REQUEST["k_name"],"tab")." 報名[".$action_auto."]".$action_branch." - ".$action_time." - ".$action_title."";
        $SQL =  "INSERT INTO log_data (log_time,log_num,log_fid,log_username,log_name,log_branch,log_single,log_1,log_2,log_3,log_4,log_5,log_service) VALUES (
                '".date("Y/m/d H:i:s")."',
                '".$log_num."',
                '".$log_fid."',
                '".SqlFilter($_REQUEST["k_name"],"tab")."',
                '".$singlenames."',
                '".$_SESSION["branch"]."',
                '".$_SESSION["MM_Username"]."',
                '".$k_mobile."',
                '系統紀錄',
                '報名活動',
                '".$log_4."',
                'member',
                '1')";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();

        if($_REQUEST["kid"] != ""){
            reURL("ad_action_list2_add.php?kid=".SqlFilter($_REQUEST["kid"],"int")."&id=".SqlFilter($_REQUEST["id"],"int"));
        }else{
            reURL("ad_action_list2_add.php?id=".SqlFilter($_REQUEST["id"],"int"));
        }
    }

    // 讀活動資料
    if($_REQUEST["id"] != ""){
        $SQL = "SELECT * FROM action_data where ac_auto='".SqlFilter($_REQUEST["id"],"int")."'";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $ac_branch = $result["ac_branch"];
            $ac_title = $result["ac_title"];  
            $ac_eat1 = $result["ac_eat1"];
            $ac_eat2 = $result["ac_eat2"];
            $ac_car1 = $result["ac_car1"];
            $ac_car2 = $result["ac_car2"];
            $ac_car3 = $result["ac_car3"];
            $ac_car4 = $result["ac_car4"];
        }else{
            call_alert("活動資料讀取錯誤。","ClOsE",0);
        }
    }

    // 讀取參加人員資料
    if($_REQUEST["kid"] != ""){
        $SQL = "SELECT * FROM love_keyin where k_id='".SqlFilter($_REQUEST["kid"],"int")."'";
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $fsq = "&kid=".SqlFilter($_REQUEST["kid"],"int");
	        $fsb = "修改";
	  
			$k_name = $result["k_name"];
			$k_sex = $result["k_sex"];
			$k_fid = $result["k_fid"];
			$k_year = $result["k_bday"];
			$k_phone = $result["k_phone"];
			$k_mobile = $result["k_mobile"];
			$k_company = $result["k_company"];
			$k_company2 = $result["k_company2"];
			$k_area = $result["k_area"];
			$k_address = $result["k_address"];						
			$email = $result["k_yn"];			
			$fbname = $result["k_fbname"];			
			$lineid = $result["k_line"];
			$k_school = $result["k_school"];			
			$branch = $result["all_branch"];
            $msingle = $result["all_single"];
            $mymem_num = $result["mem_num"];
            $k_eat = $result["k_eat"];
            $k_eat1 = $result["k_eat1"];
            $k_eat2 = $result["k_eat2"];
            $money = $result["k_money"];
            $k_time = $result["k_time"];
            $ac_car = $result["ac_car"];
            $k_2 = $result["k_2"];
            $remark = $result["all_note2"];
        }else{
            call_alert("參加人員資料讀取錯誤。","ClOsE",0);
        }
    }else{
        $fsb = "新增";
        $k_time = date("Y/m/d H:i:s");
        $money = 0;
    }

    // 搜尋
    if($_REQUEST["keyword"] != ""){
        if(is_numeric(SqlFilter($_REQUEST["keyword"],"tab"))){
            $SQL = "SELECT * FROM member_data where (mem_num = '".SqlFilter($_REQUEST["keyword"],"tab")."') and mem_level='mem'";
        }else{
            $SQL = "SELECT * FROM member_data where (mem_username = '".SqlFilter($_REQUEST["keyword"],"tab")."') and mem_level='mem'";
        }
        $rs = $SPConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $k_name = $result["mem_name"];
			$k_sex = $result["mem_sex"];
			$k_fid = $result["mem_username"];
			$k_year = $result["mem_by"]."/".$result["mem_bm"]."/"&$result["mem_bd"];
			$k_phone = $result["mem_phone"];
			$k_mobile = $result["mem_mobile"];
			$k_company = $result["company"];
			$k_company2 = $result["mem_job2"];
			$k_area = $result["mem_area"];
			$k_address = $result["mem_address"];
			$email = $result["mem_mail"];
			$fbname = $result["fbname"];
			$lineid = $result["mem_msn"];
			$k_school = $result["mem_school"];			
			$branch = $result["mem_branch"];
            $msingle = $result["mem_single"];
            $mymem_num = $result["mem_num"];            
        }else{
            $nokeyword = 1;
        }
    }

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_action_list2.php">網站活動團控</a></li>
            <li><a href="ad_action_list2_view.php?id=<?php echo SqlFilter($_REQUEST["id"],"int"); ?>">網站活動團控 - <?php echo $ac_title; ?>[<?php echo SqlFilter($_REQUEST["id"],"int"); ?>]</a></li>
            <li class="active"><?php echo $fsb; ?>參加人員</li>
        </ol>
    </header>
    <!-- /page title -->
    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>網站活動團控 - <?php echo $ac_title; ?>[<?php echo SqlFilter($_REQUEST["id"],"int"); ?>] - <?php echo $fsb; ?>參加人員</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p>
                <form action="?st=read" method="post" id="form1" class="form-inline">
                    <input type="hidden" name="id" value="<?php echo SqlFilter($_REQUEST["id"],"int"); ?>">
                    <input type="text" name="keyword" id="keyword" class="form-control" value="<?php echo SqlFilter($_REQUEST["keyword"],"tab"); ?>" placeholder="會員編號/身分證字號帶入資料" required>&nbsp;<input type="submit" value="讀取" class="btn btn-default">

                </form>
                </p>
                <form action="?st=add<?php echo $fsq; ?>" method="post" id="form1" class="form-inline" onSubmit="return chk_form()">
                    <table class="table table-striped table-bordered bootstrap-datatable input_small" style="font-size:12px;">
                        <tbody>
                            <?php 
                                if($mymem_num != ""){ ?>
                                    <tr> 
                                        <td colspan=2>會員編號：<input class="form-control" type="text" value="<?php echo $mymem_num; ?>" disabled>&nbsp;&nbsp;排約預訂及諮詢預訂檢查僅適用有會員編號之參加人員</td>
                                        <input type="hidden" name="mymem_num" id="mymem_num" value="<?php echo $mymem_num; ?>">
                                        <input type="hidden" name="mybranch" id="mybranch" value="<?php echo $branch; ?>">
                                        <input type="hidden" name="mysingle" id="mysingle" value="<?php echo $msingle; ?>">            
                                    </tr>
                                <?php }
                            ?>

                            <tr>
                                <td>姓名：<input type="text" name="k_name" id="k_name" value="<?php echo $k_name; ?>" class="form-control" required></td>
                                <td>性別：<select name="k_sex" id="k_sex" required>                                        
                                        <?php 
                                            if($k_sex != ""){
                                                echo "<option value='".$k_sex."'>".$k_sex."</option>";
                                            }else{
                                                echo "<option value=''>請選擇</option>";
                                            }
                                        ?>
                                        <option value="男">男</option>
                                        <option value="女">女</option>
                                    </select>
                                    <?php 
                                        if($_REQUEST["a"] == "b"){ ?>
                                            婚姻：
											<select name="k_marry" id="k_marry" style="font-size: 9pt">
                                                <?php
                                                if($k_marry != ""){
                                                    echo "<option value='".$k_marry."'>".$k_marry."</option>";
                                                }else{
                                                    echo "<option value=''>請選擇</option>";
                                                } ?>
                                                <option value="單身">單身</option>
                                                <option value="二春">二春</option>
                                            </select>
                                        <?php }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>身分證字號：<input type="text" name="k_fid" id="k_fid" class="form-control" value="<?php echo $k_fid; ?>" required></td>
                                <td>生日：
                                    <select name="k_year1" id="k_year1" required>
                                        <?php 
                                            if($k_year != ""){
                                                echo "<option value='".date("Y",strtotime($k_year))."'>".date("Y",strtotime($k_year))."</option>";
                                            }else{
                                                echo "<option value=''>請選擇</option>";
                                            }
                                            for($i=date("Y")-80;$i<=date("Y")-20;$i++){
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }
                                        ?>
                                    </select> 年
                                    <select name="k_year2" id="k_year2" required>
                                        <?php 
                                            if($k_year != ""){
                                                echo "<option value='".date("m",strtotime($k_year))."'>".date("m",strtotime($k_year))."</option>";
                                            }else{
                                                echo "<option value=''>請選擇</option>";
                                            }
                                            for($i=1;$i<=12;$i++){
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }
                                        ?>
                                    </select> 月
                                    <select name="k_year3" id="k_year3" required>
                                        <?php 
                                            if($k_year != ""){
                                                echo "<option value='".date("d",strtotime($k_year))."'>".date("d",strtotime($k_year))."</option>";
                                            }else{
                                                echo "<option value=''>請選擇</option>";
                                            }
                                            for($i=1;$i<=31;$i++){
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }
                                        ?>
                                    </select> 日

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>飲食習慣：<select name="k_eat" id="k_eat" required>
                                        <?php 
                                            if($k_eat != ""){
                                                echo "<option value='".$k_eat."'>".$k_eat."</option>";
                                            }else{
                                                echo "<option value=''>請選擇</option>";
                                            }
                                        ?>
                                        <option value="葷食">葷食</option>
                                        <option value="素食">素食</option>
                                    </select></td>
                                <td>手機：<input type="text" name="k_mobile" id="k_mobile" class="form-control" value="<?php echo $k_mobile; ?>" required>&nbsp;&nbsp;電話：<input type="text" name="k_phone" value="<?php echo $k_phone; ?>" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>服務機關：<input type="text" name="k_company" class="form-control" value="<?php echo $k_company; ?>"></td>
                                <td>現任職稱：<input type="text" name="k_company2" class="form-control" value="<?php echo $k_company2; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan=2>地址：
                                    <select name="k_area" id="k_area" required>
                                        <option value="">請選擇</option>
                                        <option value="基隆市"<?php if($k_area == "基隆市") echo " selected"; ?>>基隆市</option>
                                        <option value="台北市"<?php if($k_area == "台北市") echo " selected"; ?>>台北市</option>
                                        <option value="新北市"<?php if($k_area == "新北市") echo " selected"; ?>>新北市</option>
                                        <option value="宜蘭縣"<?php if($k_area == "宜蘭縣") echo " selected"; ?>>宜蘭縣</option>
                                        <option value="桃園市"<?php if($k_area == "桃園市") echo " selected"; ?>>桃園市</option>
                                        <option value="新竹縣"<?php if($k_area == "新竹縣") echo " selected"; ?>>新竹縣</option>
                                        <option value="新竹市"<?php if($k_area == "新竹市") echo " selected"; ?>>新竹市</option>
                                        <option value="苗栗縣"<?php if($k_area == "苗栗縣") echo " selected"; ?>>苗栗縣</option>
                                        <option value="苗栗市"<?php if($k_area == "苗栗市") echo " selected"; ?>>苗栗市</option>
                                        <option value="台中縣"<?php if($k_area == "台中縣") echo " selected"; ?>>台中縣</option>
                                        <option value="台中市"<?php if($k_area == "台中市") echo " selected"; ?>>台中市</option>
                                        <option value="彰化縣"<?php if($k_area == "彰化縣") echo " selected"; ?>>彰化縣</option>
                                        <option value="彰化市"<?php if($k_area == "彰化市") echo " selected"; ?>>彰化市</option>
                                        <option value="南投縣"<?php if($k_area == "南投縣") echo " selected"; ?>>南投縣</option>
                                        <option value="嘉義縣"<?php if($k_area == "嘉義縣") echo " selected"; ?>>嘉義縣</option>
                                        <option value="嘉義市"<?php if($k_area == "嘉義市") echo " selected"; ?>>嘉義市</option>
                                        <option value="雲林縣"<?php if($k_area == "雲林縣") echo " selected"; ?>>雲林縣</option>
                                        <option value="台南縣"<?php if($k_area == "台南縣") echo " selected"; ?>>台南縣</option>
                                        <option value="台南市"<?php if($k_area == "台南市") echo " selected"; ?>>台南市</option>
                                        <option value="高雄市"<?php if($k_area == "高雄市") echo " selected"; ?>>高雄市</option>
                                        <option value="屏東縣"<?php if($k_area == "屏東縣") echo " selected"; ?>>屏東縣</option>
                                        <option value="花蓮縣"<?php if($k_area == "花蓮縣") echo " selected"; ?>>花蓮縣</option>
                                        <option value="台東縣"<?php if($k_area == "台東縣") echo " selected"; ?>>台東縣</option>
                                        <option value="澎湖縣"<?php if($k_area == "澎湖縣") echo " selected"; ?>>澎湖縣</option>
                                        <option value="金門縣"<?php if($k_area == "金門縣") echo " selected"; ?>>金門縣</option>
                                        <option value="馬祖"<?php if($k_area == "馬祖") echo " selected"; ?>>馬祖</option>
                                        <option value="綠島"<?php if($k_area == "綠島") echo " selected"; ?>>綠島</option>
                                        <option value="蘭嶼"<?php if($k_area == "蘭嶼") echo " selected"; ?>>蘭嶼</option>
                                        <option value="其他"<?php if($k_area == "其他") echo " selected"; ?>>其他</option>
                                    </select>
                                    　<input name="k_address" type="text" id="k_address" class="form-control" value="<?php echo $k_address; ?>" style="width:60%;">
                                </td>
                            </tr>
                            <tr>
                                <td>E-mail：<input name="email" id="email" type="text" class="form-control" value="<?php echo $email; ?>"></td>
                                <td>facebook帳號：<input name="fbname" type="text" class="form-control" value="<?php echo $fbname; ?>"> ＬＩＮＥ：<input name="lineid" id="lineid" type="text" class="form-control" value="<?php echo $lineid; ?>"></td>
                            </tr>
                            <!--  <tr>
		  <td>身高：<input name="ac_1" id="ac_1" type="text" class="form-control" value="<?php echo $ac_1; ?>"></td><td>體重：<input name="ac_2" id="ac_2" type="text" class="form-control" value="<?php echo $ac_2; ?>"></td>
        </r>-->
                            <tr>
                                <td>學歷：<select name="k_school" id="k_school" required>
                                        <?php 
                                            if($k_school != ""){
                                                echo "<option value='".$k_school."'>".$k_school."</option>";
                                            }else{
                                                echo "<option value=''>請選擇</option>";
                                            }
                                        ?>
                                        <option value="大學">大學</option>
                                        <option value="高中">高中</option>
                                        <option value="專科">專科</option>
                                        <option value="大學">大學</option>
                                        <option value="碩士">碩士</option>
                                        <option value="博士">博士</option>
                                    </select></td>
                                <td>費用：<input type="number" name="money" id="money" value="<?php echo $money; ?>" class="form-control"></td>
                            </tr>
                            <?php 
                                if($ac_eat1 != ""){
                                    $k_eat1_c = " required";
                                }
                                if($ac_eat2 != ""){
                                    $k_eat2_c = " required";
                                }
                            ?>
                            <tr>
                                <td>餐點：
                                    <select name="k_eat1"<?php echo $k_eat1_c; ?>>
                                        <option value="">請選擇</option>
                                        <?php
                                            if($ac_eat1 != ""){
                                                foreach(explode(",",$ac_eat1) as $eat1){
                                                    echo "<option value='".$eat1."'";
                                                    if($eat1 == $k_eat1){
                                                        echo " selected";
                                                    }
                                                    echo ">".$eat1."</option>";
                                                }
                                            }                                            
                                        ?>
                                    </select>
                                </td>
                                <td>飲品：
                                    <select name="k_eat2"<?php echo $k_eat2_c; ?>>
                                        <option value="">請選擇</option>
                                        <?php
                                            if($ac_eat2 != ""){
                                                foreach(explode(",",$ac_eat2) as $eat2){
                                                    echo "<option value='".$eat2."'";
                                                    if($eat2 == $k_eat2){
                                                        echo " selected";
                                                    }
                                                    echo ">".$eat2."</option>";
                                                }
                                            }                                            
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php 
                                        if($ac_car1 != "" || $ac_car2 != "" || $ac_car3 != "" || $ac_car4 != ""){ ?>
                                            上車地點：<select name="ac_car" id="ac_car" required>
								    		    <option value="">請選擇</option>
                                        <?php 
                                            if($ac_car1 != ""){
                                                echo "<option value='".$ac_car1."'";
                                                if($ac_car1 == $ac_car){
                                                    echo " selected";
                                                }
                                                echo ">".$ac_car1."</option>";
                                            }
                                            if($ac_car2 != ""){
                                                echo "<option value='".$ac_car2."'";
                                                if($ac_car2 == $ac_car){
                                                    echo " selected";
                                                }
                                                echo ">".$ac_car2."</option>";
                                            }
                                            if($ac_car3 != ""){
                                                echo "<option value='".$ac_car3."'";
                                                if($ac_car3 == $ac_car){
                                                    echo " selected";
                                                }
                                                echo ">".$ac_car3."</option>";
                                            }
                                            if($ac_car4 != ""){
                                                echo "<option value='".$ac_car4."'";
                                                if($ac_car4 == $ac_car){
                                                    echo " selected";
                                                }
                                                echo ">".$ac_car4."</option>";
                                            }                                            
                                        }
                                    ?>
                                </td>
                                <td>公開資料：
                                    <label class="form-check-label"><input class="form-check-input" type="checkbox" name="k_2[]" value="姓名"<?php if(stripos($k_2,"姓名") !== false) echo " checked"; ?>>
                                        姓名</label>

                                    <label class="form-check-label"><input class="form-check-input" type="checkbox" name="k_2[]" value="手機"<?php if(stripos($k_2,"手機") !== false) echo " checked"; ?>>
                                        手機</label>

                                    <label class="form-check-label"><input class="form-check-input" type="checkbox" name="k_2[]" value="信箱"<?php if(stripos($k_2,"信箱") !== false) echo " checked"; ?>>
                                        信箱</label>

                                    <label class="form-check-label"><input class="form-check-input" type="checkbox" name="k_2[]" value="服務單位"<?php if(stripos($k_2,"服務單位") !== false) echo " checked"; ?>>
                                        服務單位</label>

                                    <label class="form-check-label"><input class="form-check-input" type="checkbox" name="k_2[]" value="LINE"<?php if(stripos($k_2,"LINE") !== false) echo " checked"; ?>>
                                        LINE</label>

                                    <label class="form-check-label"><input class="form-check-input" type="checkbox" name="k_2[]" value="Facebook"<?php if(stripos($k_2,"Facebook") !== false) echo " checked"; ?>>
                                        Facebook</label>

                                    <label class="form-check-label"><input class="form-check-input" type="checkbox" name="k_2[]" value="不願意公開資料"<?php if(stripos($k_2,"不願意公開資料") !== false) echo " checked"; ?>>
                                        不願意公開資料</label>
                                </td>
                            </tr>
                            <?php 
                                if($_REQUEST["a"] == "b"){
                                    if($k_money == "" || !is_numeric($k_money)){
                                        $k_money = 0;
                                    } ?>
                                    <tr><td>參團價格：<input type="text" name="k_money" id="k_money" class="form-control" value="<?php echo $k_money; ?>"></td><td>出發日期：<?php echo SqlFilter($_REQUEST["da"],"tab"); ?><input type="hidden" name="da" value="<?php echo SqlFilter($_REQUEST["da"],"tab"); ?>"></td></tr>
                                    <tr><td>英文姓名：<input type="text" name="ename" id="ename" class="form-control" value="<?php echo $ename; ?>"></td><td>護照號碼：<input type="text" name="passport" id="passport" class="form-control" value="<?php echo $passport; ?>"></td></tr>
                                    <tr><td colspan=2>護照效期：發照 <input type="text" name="passport_t1" id="passport_t1" value="<?php echo $passport_t1; ?>" class="datepicker" autocomplete="off"> 截止 <input type="text" name="passport_t2" id="passport_t2" value="<?php echo $passport_t2; ?>" class="datepicker" autocomplete="off"></td></tr>
                                <?php }
                            ?>
                            <tr>
                                <td colspan=2>備註：<textarea name="remark" id="remark" class="form-control" style="width:70%;height:80px;"><?php echo $remark; ?></textarea></td>
                            </tr>
                            <tr>
                                <td colspan=2>報名時間：<?php echo changeDate($k_time); ?></td>
                            </tr>

                            <tr>
                                <td colspan=2>
                                    <div align="center">
                                        <input type="hidden" name="id" value="<?php echo SqlFilter($_REQUEST["id"],"int"); ?>">
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

<script type="text/javascript">
    $mtu = "ad_action_list2.";

    function chk_form() {

    }


    $(function() {

        $("input[name='k_2']").on("change", function() {
            if ($(this).val() == "不願意公開資料") {
                $("input[name='k_2']").not($(this)).prop("checked", !$(this).prop("checked"));
            }
        });

    });
</script>