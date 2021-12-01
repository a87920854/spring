<?php
    /*****************************************/
    //檔案名稱：ad_fun_action_list_padd.php
    //後台對應位置：好好玩管理系統/好好玩國內團控/(活動名)/修改報名資料
    //改版日期：2021.11.25
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

    $ac = SqlFilter($_REQUEST["ac"],"int");
    $id = SqlFilter($_REQUEST["id"],"int");

    // 新增資料
    if($_REQUEST["st"] == "add"){
        $ttime = SqlFilter($_REQUEST["k_year1"],"int") . "/" . SqlFilter($_REQUEST["k_year2"],"int") . "/" . SqlFilter($_REQUEST["k_year3"],"int");
        if(chkDate($ttime)){
            call_alert("請選擇生日。",0,0);
        }
        if($_REQUEST["a"] == "b"){
            $SQL = "select ac_branch, ac_title, ac_note1, ac_time from actionf_data where ac_auto = " .$ac;
        }else{
            $SQL = "select ac_branch, ac_title, ac_note1, ac_time from action_data where ac_auto = " .$ac;
        }
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if($result){
            $action_branch = $result["ac_branch"];
            $action_title = $result["ac_title"];
            $action_note = $result["ac_note1"];
            $action_time = $result["ac_time"];
        }
        $k_time = date("Y/m/d H:i:s");
        $all_branch = $_SESSION["branch"];
        $all_single = $_SESSION["MM_Username"];
        $k_come =  SqlFilter($_REQUEST["k_come"],"tab");
        $k_area = SqlFilter($_REQUEST["k_area"],"tab");
        $k_name = SqlFilter($_REQUEST["k_name"],"tab");
        $k_sex = SqlFilter($_REQUEST["k_sex"],"tab");
        $k_marry = SqlFilter($_REQUEST["k_marry"],"tab");
        $k_star = SqlFilter($_REQUEST["k_star"],"tab");
        $k_workcity = SqlFilter($_REQUEST["mem_workcity"],"tab");
        $k_mobile = SqlFilter($_REQUEST["k_mobile"],"tab");
        $k_yn = SqlFilter($_REQUEST["k_yn"],"tab");
        $k_year = $ttime;
        $k_school = SqlFilter($_REQUEST["k_school"],"tab");
        $k_phone1 = SqlFilter($_REQUEST["k_phone1"],"tab");
        $k_phone2 = SqlFilter($_REQUEST["k_phone2"],"tab");
        $k_company = SqlFilter($_REQUEST["k_company"],"tab");
        $k_company2 = SqlFilter($_REQUEST["k_company2"],"tab");
        $k_address = SqlFilter($_REQUEST["k_address"],"tab");
        $k_user = strtoupper(SqlFilter($_REQUEST["k_user"],"tab"));
        $k_eat = SqlFilter($_REQUEST["k_eat"],"tab");
        $k_2 = SqlFilter($_REQUEST["k_2"],"tab");
        $lineid = SqlFilter($_REQUEST["lineid"],"tab");

        if($_REQUEST["a"] == "b"){
            $all_kind = "國外旅遊";
            $k_money = SqlFilter($_REQUEST["k_money"],"tab");
            $ename = SqlFilter($_REQUEST["ename"],"tab");
            $passport = SqlFilter($_REQUEST["passport"],"tab");
            if(chkDate($_REQUEST["passport_t1"])){
                $passport_t1 = SqlFilter($_REQUEST["passport_t1"],"tab");            
            }
            if(chkDate($_REQUEST["passport_t2"])){
                $passport_t2 = SqlFilter($_REQUEST["passport_t2"],"tab");
            }
            $action_time = SqlFilter($_REQUEST["da"],"tab");
            $rd = "ad_fun_action_list_singup2.php?a=b&da=".SqlFilter($_REQUEST["da"],"tab");
        }else{
            $all_kind = "活動";
            $action_time = $action_time;
            $rd = "ad_fun_action_list_singup1.php?a=a";
        }
        $all_type = "已發送";
        
        $ac_1 = SqlFilter($_REQUEST["ac_1"],"tab");
        $ac_2 = SqlFilter($_REQUEST["ac_2"],"tab");
        $ac_3 = SqlFilter($_REQUEST["ac_3"],"tab");
        $k_eat1 = SqlFilter($_REQUEST["k_eat1"],"tab");
        $k_eat2 = SqlFilter($_REQUEST["k_eat2"],"tab");
        $is_local = 1;
        
        if($_REQUEST["remark"] != ""){            
            $remark = SqlFilter($_REQUEST["remark"],"tab");
        }else{
           $remark = "";
        }        
        $SQL = "INSERT INTO love_keyin (k_time, all_branch, all_single, k_come, k_area, k_name, 
                k_sex, k_marry, k_star, k_workcity, k_mobile, k_yn, k_year, k_school, k_phone1, k_phone2, k_company, k_company2, 
                k_address, k_user, k_eat, k_2, lineid, action_branch, action_title, action_note, ac_auto,
                all_kind, k_money, ename, passport, passport_t1, passport_t2, action_time, all_type, 
                ac_1, ac_2, ac_3, k_eat1, k_eat2, is_local, remark) VALUES ('"
                .$k_time."', '"
                .$all_branch."', '"
                .$all_single."', '"
                .$k_come."', '"
                .$k_area."', '"
                .$k_name."', '"
                .$k_sex."', '"
                .$k_marry."', '"
                .$k_star."', '"
                .$k_workcity."', '"
                .$k_mobile."', '"
                .$k_yn."', '"
                .$k_year."', '"
                .$k_school."', '"
                .$k_phone1."', '"
                .$k_phone2."', '"
                .$k_company."', '"
                .$k_company2."', '"
                .$k_address."', '"
                .$k_user."', '"
                .$k_eat."', '"
                .$k_2."', '"
                .$lineid."', '"
                .$action_branch."', '"
                .$action_title."', '"
                .$action_note."', '"
                .$ac."', '"
                .$all_kind."', '"
                .$k_money."', '"
                .$ename."', '"
                .$passport."', '"
                .$passport_t1."', '"
                .$passport_t2."', '"
                .$action_time."', '"
                .$all_type."', '"
                .$ac_1."', '"
                .$ac_2."', '"
                .$ac_3."', '"
                .$k_eat1."', '"
                .$k_eat2."', '"
                .$is_local."', '"
                .$remark."')";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL($rd."&ac=".$ac);
            exit();
        }
    }

    // 修改資料
    if($_REQUEST["st"] == "edit"){
        if($_REQUEST["ac"] == "" || $_REQUEST["id"] == ""){
            call_alert("無法讀取資料。",0,0);
            exit();
        }
        $k_year = SqlFilter($_REQUEST["k_year1"],"int") . "/" . SqlFilter($_REQUEST["k_year2"],"int") . "/" . SqlFilter($_REQUEST["k_year3"],"int");
        $k_come =  SqlFilter($_REQUEST["k_come"],"tab");
        $k_area = SqlFilter($_REQUEST["k_area"],"tab");
        $k_name = SqlFilter($_REQUEST["k_name"],"tab");
        $k_sex = SqlFilter($_REQUEST["k_sex"],"tab");
        $k_marry = SqlFilter($_REQUEST["k_marry"],"tab");
        $k_star = SqlFilter($_REQUEST["k_star"],"tab");
        $k_workcity = SqlFilter($_REQUEST["mem_workcity"],"tab");
        $k_mobile = SqlFilter($_REQUEST["k_mobile"],"tab");
        $k_yn = SqlFilter($_REQUEST["k_yn"],"tab");
        $k_school = SqlFilter($_REQUEST["k_school"],"tab");
        $k_phone1 = SqlFilter($_REQUEST["k_phone1"],"tab");
        $k_phone2 = SqlFilter($_REQUEST["k_phone2"],"tab");
        $k_company = SqlFilter($_REQUEST["k_company"],"tab");
        $k_company2 = SqlFilter($_REQUEST["k_company2"],"tab");
        $k_address = SqlFilter($_REQUEST["k_address"],"tab");
        $k_user = strtoupper(SqlFilter($_REQUEST["k_user"],"tab"));
        $k_eat = SqlFilter($_REQUEST["k_eat"],"tab");
        $k_2 = SqlFilter($_REQUEST["k_2"],"tab");
        $lineid = SqlFilter($_REQUEST["lineid"],"tab");        
        $ac_1 = SqlFilter($_REQUEST["ac_1"],"tab");
        $ac_2 = SqlFilter($_REQUEST["ac_2"],"tab");
        $ac_3 = SqlFilter($_REQUEST["ac_3"],"tab");
        $k_eat1 = SqlFilter($_REQUEST["k_eat1"],"tab");
        $k_eat2 = SqlFilter($_REQUEST["k_eat2"],"tab");
        if($_REQUEST["a"] == "b"){            
            $k_money = SqlFilter($_REQUEST["k_money"],"tab");
            $ename = SqlFilter($_REQUEST["ename"],"tab");
            $passport = SqlFilter($_REQUEST["passport"],"tab");
            if(chkDate($_REQUEST["passport_t1"])){
                $passport_t1 = SqlFilter($_REQUEST["passport_t1"],"tab");            
            }
            if(chkDate($_REQUEST["passport_t2"])){
                $passport_t2 = SqlFilter($_REQUEST["passport_t2"],"tab");
            }
        }
        if($_REQUEST["remark"] != ""){            
            $remark = SqlFilter($_REQUEST["remark"],"tab");
        }else{
           $remark = "";
        }     
        $SQL = "UPDATE love_keyin SET                
                k_come = '".$k_come."',
                k_area = '".$k_area."', 
                k_name = '".$k_name."', 
                k_sex = '".$k_sex."', 
                k_marry = '".$k_marry."', 
                k_star = '".$k_star."', 
                k_workcity = '".$k_workcity."', 
                k_mobile = '".$k_mobile."', 
                k_yn = '".$k_yn."', 
                k_year = '".$k_year."', 
                k_school = '".$k_school."', 
                k_phone1 = '".$k_phone1."', 
                k_phone2 = '".$k_phone2."', 
                k_company = '".$k_company."', 
                k_company2 = '".$k_company2."', 
                k_address = '".$k_address."', 
                k_user = '".$k_user."', 
                k_eat = '".$k_eat."', 
                k_2 = '".$k_2."', 
                lineid = '".$lineid."', 
                k_money = '".$k_money."', 
                ename = '".$ename."', 
                passport = '".$passport."', 
                passport_t1 = '".$passport_t1."', 
                passport_t2 = '".$passport_t2."',
                ac_1 = '".$ac_1."', 
                ac_2 = '".$ac_2."', 
                ac_3 = '".$ac_3."', 
                k_eat1 = '".$k_eat1."', 
                k_eat2 = '".$k_eat2."', 
                remark = '".$remark."' WHERE k_id = '".$id."'";

        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            if($_REQUEST["a"] == "b"){
                reURL("ad_fun_action_list_singup2.php?ac=".$ac."&da=".SqlFilter($_REQUEST["da"],"tab"));
                exit();
            }else{
                reURL("ad_fun_action_list_padd.php?id=".$id."&ac=".$ac);
                exit();
            }            
        }
    }

    // 讀取本筆資料
    if($_REQUEST["a"] == "b"){
        $SQL = "elect ac_title from actionf_data where ac_auto = " .$ac;
    }else{
        $SQL = "select ac_title, ac_eat1, ac_eat2 from action_data where ac_auto = " .$ac;
    }

    $rs = $FunConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if($result){
        $ac_title = $result["ac_title"];
        if($_REQUEST["a"] != "b"){
            $ac_eat1 = $result["ac_eat1"];
            $ac_eat2 = $result["ac_eat2"];
        }
    } 

    if($_REQUEST["id"] != ""){
        $ww = "修改";
        if($_REQUEST["a"] == "b"){
            $ww2 = "edit&a=b&id=" .$id;
            $SQL = "select * from love_keyin where all_kind='國外旅遊' and k_id = " .$id;
        }else{
            $ww2 = "edit&id=" .$id;
            $SQL = "select * from love_keyin where k_id = " .$id;
        }
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            call_alert("無法讀取資料。",0,0);
        }else{
            $k_name = $result["k_name"];
            $k_sex = $result["k_sex"];
            $k_user = $result["k_user"];
            $k_year = $result["k_year"];
            $k_eat = $result["k_eat"];
            $k_marry = $result["k_marry"];
            $k_phone1 = $result["k_phone1"];
            $k_phone2 = $result["k_phone2"];
            $k_mobile = $result["k_mobile"];
            $k_company = $result["k_company"];
            $k_company2 = $result["k_company2"];
            $k_area = $result["k_area"];
            $k_address = $result["k_address"];
            $k_yn = $result["k_yn"];
            $ac_1 = $result["ac_1"];
            $ac_2 = $result["ac_2"];
            $ac_3 = $result["ac_3"];
            $lineid = $result["lineid"];
            $k_school = $result["k_school"];
            $k_come = $result["k_come"];
            $remark = $result["remark"];
            $k_time = $result["k_time"];
            $k_money = $result["k_money"];
            $ename = $result["ename"];
            $passport = $result["passport"];
            $passport_t1 = $result["passport_t1"];
            $passport_t2 = $result["passport_t2"];
            $k_eat1 = $result["k_eat1"];
            $k_eat2 = $result["k_eat2"];
            $k_star = $result["k_star"];
            $k_workcity = $result["k_workcity"];
        }
    }else{
        $ww = "新增";
        if($_REQUEST["a"] == "b"){
            $ww2 = "add&a=b&da=" .SqlFilter($_REQUEST["da"],"tab");
        }else{
            $ww2 = "add";
        }
        $k_time = date("Y/m/d H:i:s");
        $ac_1 = 0;
        $ac_2 = 0;
    }   

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <?php 
                if($_REQUEST["a"] == "b"){
                   echo "<li><a href='ad_fun_action_list2.php'>好好玩國外團控</a></li>";  
                }else{
                    echo "<li><a href='ad_fun_action_list1.php'>好好玩國內團控</a></li>";
                    echo "<li><a href=\"ad_fun_action_list_singup1.php?ac=".$ac."\">".$ac_title."</a></li>";
                }
            ?>
            <li class="active"><?php echo $ww; ?>報名資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong><?php echo $ac_title; ?> <?php echo $ww; ?>報名資料</strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">

                <form id="addform" action="?st=<?php echo $ww2; ?>" method="post" target="_self" class="form-inline" onsubmit="return chk_form()">
                    <table class="table table-striped table-bordered bootstrap-datatable input_small" style="font-size:12px;">
                        <tbody>
                            <tr>
                                <td>姓名：<input type="text" name="k_name" id="k_name" value="<?php echo $k_name; ?>" class="form-control"></td>
                                <td>性別：
                                    <select name="k_sex" id="k_sex">
                                        <option value="">請選擇</option>
                                        <?php  
                                            $gender = array("男","女");
                                            foreach($gender as $gen){
                                                if($k_sex == $gen){
                                                    echo "<option value='".$gen."' selected>".$gen."</option>";                                                    
                                                }else{
                                                    echo "<option value='".$gen."'>".$gen."</option>";
                                                }                                                
                                            }
                                        ?>                                       
                                    </select>

                                    　婚姻：
                                    <select name="k_marry" id="k_marry" style="font-size: 9pt">
                                        <option value="">請選擇</option>
                                        <?php
                                            $marry = array("未婚","已婚","二春");
                                            foreach($marry as $ma){
                                                if($k_marry == $ma){
                                                    echo "<option value='".$ma."' selected>".$ma."</option>";                                                    
                                                }else{
                                                    echo "<option value='".$ma."'>".$ma."</option>";
                                                }                                                
                                            }                                                                                        
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>身分證字號：<input type="text" name="k_user" id="k_user" class="form-control" value="<?php echo $k_user; ?>"></td>
                                <td>生日：
                                    <select name="k_year1" id="k_year1">
                                        <?php
                                            $year = date("Y", strtotime($k_year)); //出生年
                                            for( $i = date("Y")-20; $i >= date("Y")-80; $i--){
                                                if($k_year != "" && $i == $year){
                                                    echo "<option value='" .$i. "' selected>" .$i. "</option>";
                                                }else{
                                                    echo "<option value='" .$i. "'>" .$i. "</option>";
                                                }
                                            }                                        
                                        ?>
                                    </select> 年
                                    <select name="k_year2" id="k_year2">
                                        <?php
                                            $month = date("n", strtotime($k_year)); //出生月
                                            for( $i = 1; $i <= 12; $i++){
                                                if($k_year != "" && $i == $month){
                                                    echo "<option value='" .$i. "' selected>" .$i. "</option>";
                                                }else{
                                                    echo "<option value='" .$i. "'>" .$i. "</option>";
                                                }
                                            }                                        
                                        ?>
                                    </select> 月
                                    <select name="k_year3" id="k_year3">
                                        <?php
                                            $day = date("j", strtotime($k_year)); //出生日
                                            for( $i = 1; $i <= 31; $i++){
                                                if($k_year != "" && $i == $day){
                                                    echo "<option value='" .$i. "' selected>" .$i. "</option>";
                                                }else{
                                                    echo "<option value='" .$i. "'>" .$i. "</option>";
                                                }
                                            }                                        
                                        ?>
                                    </select> 日

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>星座：
                                    <select name="k_star" id="k_star">
                                        <option value=''>請選擇</option>
                                        <?php
                                            $star = array("水瓶座", "雙魚座", "牡羊座", "金牛座", "雙子座", "巨蟹座", "獅子座", "處女座", "天秤座", "天蠍座", "射手座", "魔羯座");
                                            foreach( $star as $st){
                                                if($st == $k_star){
                                                    echo "<option value='" .$st. "' selected>" .$st. "</option>";
                                                }else{
                                                    echo "<option value='" .$st. "'>" .$st. "</option>";
                                                }
                                            }
                                        ?>
                                    </select> </td>
                                <td>工作縣市：
                                    <select name="mem_workcity" id="mem_workcity">
                                        <option value="">請選擇</option>
                                        <?php
                                            $workcity = array("新北市", "台北市", "基隆市", "宜蘭縣", "桃園市", "新竹縣", "新竹市", "苗栗縣", "苗栗市", "台中市", "彰化縣", "彰化市", "南投縣", "嘉義縣", 
                                                    "嘉義市", "雲林縣", "台南市", "高雄市", "屏東縣", "花蓮縣", "台東縣", "澎湖縣", "金門縣", "馬祖", "綠島", "蘭嶼", "其他");
                                            foreach( $workcity as $work){
                                                if($work == $k_workcity){
                                                    echo "<option value='" .$work. "' selected>" .$work. "</option>";
                                                }else{
                                                    echo "<option value='" .$work. "'>" .$work. "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>飲食習慣：<select name="k_eat" id="k_eat">
                                        <option value="">請選擇</option>
                                        <?php
                                           
                                            $food = array("葷食","素食");
                                            foreach($food as $fo){
                                                if($k_eat == $fo){
                                                    echo "<option value='".$fo."' selected>".$fo."</option>";                                                    
                                                }else{
                                                    echo "<option value='".$fo."'>".$fo."</option>";
                                                }                                                
                                            }                                         
                                        ?>
                                    </select></td>
                                <td>電話(公)：<input type="text" name="k_phone1" value="<?php echo $k_phone1; ?>" class="form-control">　(家)：<input type="text" name="k_phone2" class="form-control" value="<?php echo $k_phone2; ?>">　手機：<input type="text" name="k_mobile" id="k_mobile" class="form-control" value="<?php echo $k_mobile; ?>"></td>
                            </tr>
                            <tr>
                                <td>服務機關：<input type="text" name="k_company" class="form-control" value="<?php echo $k_company; ?>"></td>
                                <td>現任職稱：<input type="text" name="k_company2" class="form-control" value="<?php echo $k_company2; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan=2>地址：
                                    <select name="k_area" id="k_area">
                                        <option value="">請選擇</option>
                                        <?php
                                            $area = array("新北市", "台北市", "基隆市", "宜蘭縣", "桃園市", "新竹縣", "新竹市", "苗栗縣", "苗栗市", "台中市", "彰化縣", "彰化市", "南投縣", "嘉義縣", 
                                                    "嘉義市", "雲林縣", "台南市", "高雄市", "屏東縣", "花蓮縣", "台東縣", "澎湖縣", "金門縣", "馬祖", "綠島", "蘭嶼", "其他");
                                            foreach( $area as $ar){
                                                if($ar == $k_area){
                                                    echo "<option value='" .$ar. "' selected>" .$ar. "</option>";
                                                }else{
                                                    echo "<option value='" .$ar. "'>" .$ar. "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                    　<input name="k_address" type="text" id="k_address" class="form-control" value="<?php echo $k_address; ?>" style="width:60%;">
                                </td>
                            </tr>
                            <tr>
                                <td>E-mail：<input name="k_yn" id="k_yn" type="text" class="form-control" value="<?php echo $k_yn; ?>"></td>
                                <td>facebook帳號：<input name="ac_3" type="text" class="form-control" value="<?php echo $ac_3; ?>"> ＬＩＮＥ：<input name="lineid" id="lineid" type="text" class="form-control" value="<?php echo $lineid; ?>"></td>
                            </tr>
                            <tr>
                                <td>身高：<input name="ac_1" id="ac_1" type="text" class="form-control" value="<?php echo $ac_1; ?>"></td>
                                <td>體重：<input name="ac_2" id="ac_2" type="text" class="form-control" value="<?php echo $ac_2; ?>"></td>
                            </tr>
                            <tr>
                                <td>學歷：<select name="k_school" id="k_school">
                                        <option value="">請選擇</option>
                                        <?php
                                            $school = array("高中","專科","大學","碩士","博士");
                                            foreach($school as $sc){
                                                if( $k_school == $sc ){
                                                    echo "<option value='" .$sc. "' selected>" .$sc. "</option>";
                                                }else{
                                                  echo "<option value='" .$sc. "'>" .$sc. "</option>";
                                                }
                                            }                                            
                                        ?>
                                    </select></td>
                                <td>訊息來源：<select name="k_come" id="k_come">
                                        <option value="">請選擇</option>
                                        <?php 
                                            $come = array("2014國際旅展","好好玩旅行社官方粉絲團","網路新聞","媒體報導","1111人力銀行","春天會館客服","活動宣傳","ＤＭ訊息","企業福委","CHEERS雜誌");
                                            foreach($come as $co){
                                                if( $k_come == $co ){
                                                    echo "<option value='" .$co. "' selected>" .$co. "</option>";
                                                }else{
                                                  echo "<option value='" .$co. "'>" .$co. "</option>";
                                                }
                                            }
                                        ?>                                        
                                    </select></td>
                            </tr>
                            <tr>
                                <td>餐點：
                                    <select name="k_eat1">
                                        <?php 
                                            if($ac_eat1 != "" && count(explode(",",$ac_eat1)) > 0){
                                                echo "<option value=''>請選擇</option>"; 
                                                foreach(explode(",",$ac_eat1) as $eat1){
                                                    if($k_eat1 != "" && $k_eat1 == $eat1){
                                                        echo "<option value='".$eat1."' selected>".$eat1."</option>";
                                                    }else{
                                                        echo "<option value='".$eat1."'>".$eat1."</option>";
                                                    }                                                    
                                                }
                                            }else{
                                                echo "<option value='' disabled>無餐點</option>";
                                            }
                                        ?>                                        
                                    </select>
                                </td>
                                <td>飲品：
                                    <select name="k_eat2">
                                    <?php 
                                            if($ac_eat2 != "" && count(explode(",",$ac_eat2)) > 0){
                                                echo "<option value=''>請選擇</option>"; 
                                                foreach(explode(",",$ac_eat2) as $eat2){
                                                    if($k_eat2 != "" && $k_eat2 == $eat2){
                                                        echo "<option value='".$eat2."' selected>".$eat2."</option>";
                                                    }else{
                                                        echo "<option value='".$eat2."'>".$eat2."</option>";
                                                    }                                                    
                                                }
                                            }else{
                                                echo "<option value='' disabled>無飲品</option>";
                                            }
                                        ?>                                         
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>公開資料：
                                    <input name="k_2" type="checkbox" id="k_2" value="姓名">
                                    姓名
                                    <input name="k_2" type="checkbox" id="k_2" value="手機">
                                    手機
                                    <input name="k_2" type="checkbox" id="k_2" value="信箱">
                                    信箱
                                    <input name="k_2" type="checkbox" id="k_2" value="服務單位">
                                    服務單位
                                    <input name="k_2" type="checkbox" id="k_2" value="不願意公開資料" checked>
                                    不願意公開資料
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
                                <td colspan=2>報名時間：<?php echo changeDate($k_time); ?><input type="hidden" name="ac" value="<?php echo $ac; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan=2 align="center"><input type="submit" name="Submit" value="確定<?php echo $ww; ?>" class="btn btn-info" style="width:50%;"></td>
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
    function chk_form() {
        var $rr = 0;
        <?php 
            if($_REQUEST["a"] == "b"){ ?>
                var $clist = {"k_name":"姓名","k_sex":"性別","k_user":"身分證字號","k_year1":"生日-年","k_year2":"生日-月","k_year3":"生日-日","k_mobile":"手機","k_area":"地址","k_come":"訊息來源","k_money":"參團價格"};
            <?php }else{ ?>
                var $clist = {"k_name":"姓名","k_sex":"性別","k_user":"身分證字號","k_year1":"生日-年","k_year2":"生日-月","k_year3":"生日-日","k_mobile":"手機","k_come":"訊息來源"};  
            <?php }
        ?>

        $.each($clist, function(n, v) {
            if (!$("#" + n).val()) {
                alert("請輸入或選擇" + v);
                $("#" + n).focus();
                $rr = 1;
                return false;
            }
        });

        if ($rr == 0) {
            <?php 
                if($_REQUEST["a"] == "b"){ ?>
                    var $cnlist = {"ac_1":"身高","ac_2":"體重","k_money":"參團價格"};
                <?php }else{ ?>
                    var $cnlist = {"ac_1":"身高","ac_2":"體重"};
                <?php }
            ?>
            var reg = /^\d+$/;
            $.each($cnlist, function(n, v) {
                if (!reg.test($("#" + n).val())) {
                    alert(v + "只能輸入數字。");
                    $("#" + n).focus();
                    $rr = 1;
                    return false;
                }
            });
        }

        if ($rr){
            return false;
        }else{
            return true;
        }
    }
</script>