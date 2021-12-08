<?php

    /*****************************************/
    //檔案名稱：ad_fun_action_list1_add.php
    //後台對應位置：好好玩管理系統/好好玩國內團控/新增(修改)國內活動
    //改版日期：2021.12.6
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
	if ( $_SESSION["MM_Username"] == "" ){ call_alert("請重新登入。","login.php",0);}

    $ac = SqlFilter($_REQUEST["ac"],"int");

    // 上傳圖片
    if($_REQUEST["st"] == "upload"){
        $types = SqlFilter($_REQUEST["type"],"tab");
        $old_pic = SqlFilter($_REQUEST["old_pic"],"tab");
    }

    // 刪除圖片
    if($_REQUEST["st"] == "delp"){
        $pic = SqlFilter($_REQUEST["v"],"tab");
        $SQL = "SELECT * FROM action_data where ac_auto='" .$ac. "'";
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC); 
        if($result){
            DelFile("webfile\\funtour\\upload_image\\".$result[$pic]); //刪除實體檔案
            $pic = SqlFilter($_REQUEST["v"],"tab");
            $SQL = "UPDATE action_data SET ".$pic." = NULL where ac_auto='" .$ac. "'";
            $rs2 = $FunConn->prepare($SQL);
            $rs2->execute();
            if($rs2){                
                reURL("ad_fun_action_list1_add.php?ac=".$ac);
            }            
        }
    }

    // 新增國內活動
    if($_REQUEST["st"] == "add"){

    }

    // 修改國內活動
    if($_REQUEST["st"] == "edit"){
        if($_REQUEST["ac"] == ""){
            call_alert("無法讀取資料。",0,0);
        }
    }

   
    if($_REQUEST["ac"] != ""){
        $ww = "修改";
        $ww2 = "edit&ac=".$ac;
        $SQL = "select * from action_data where ac_auto = ".$ac;
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        $result = $rs->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            call_alert("無法讀取資料。",0,0);
        }else{
            $sub5_auto = $result["sub5_auto"];
            $ac_1 = $result["ac_1"];
            $ac_2 = $result["ac_2"];
            $ac_3 = $result["ac_3"];
            $ac_4 = $result["ac_4"];
            $ac_5 = $result["ac_5"];
            $ac_1 = $result["ac_1"];
            $$ac_car1 = $result["ac_car1"];
            $ac_car2 = $result["ac_car2"];
            $ac_car3 = $result["ac_car3"];
            $ac_car4 = $result["ac_car4"];
            $ac_branch = $result["ac_branch"];
            $ac_kind = $result["ac_kind"];
            $ac_kind3 = $result["ac_kind3"];
            $ac_money1 = $result["ac_money1"];
            $ac_money2 = $result["ac_money2"];
            $ac_money3 = $result["ac_money3"];
            $ac_money4 = $result["ac_money4"];
            $ac_money5 = $result["ac_money5"];
            $ac_money6 = $result["ac_money6"];
            $ac_money7 = $result["ac_money7"];
            $deadline = $result["deadline"];
            $signup = $result["signup"];
            $ac_title = $result["ac_title"];
            $ac_index_title = $result["ac_index_title"];
            $ac_note1 = $result["ac_note1"];
            $ac_note2 = $result["ac_note2"];
            $ac_note3 = $result["ac_note3"];
            $ac_note4 = $result["ac_note4"];
            $ac_pic = $result["ac_pic"];
            $ac_pic2 = $result["ac_pic2"];
            $ac_pic3 = $result["ac_pic3"];
            $ac_pic4 = $result["ac_pic4"];
            $ac_time = $result["ac_time"];
            $ac_come = $result["ac_come"];
            $ac_open1 = $result["ac_open1"];
            $ac_open2 = $result["ac_open2"];
            $ac_run1 = $result["ac_run1"];
            $ac_run2 = $result["ac_run2"];
            $ac_show = $result["ac_show"];
            $ac_eat1 = $result["ac_eat1"];
            $ac_eat2 = $result["ac_eat2"];
            $ac_area = $result["ac_area"];
            $ac_msg4 = $result["ac_msg4"];
        }
    }else{
        $ww = "新增";
        $ww2 = "add";
        $sub5_auto = "好好玩旅行社";
        $ac_money1 = "0";
        $ac_money2 = "0";
        $ac_money3 = "0";
        $ac_money4 = "0";
        $ac_money5 = "0";
        $ac_money6 = "0";
        $ac_money7 = "0";
        $signup = "0";
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
            <li>好好玩管理系統</li>
            <li><a href="ad_fun_action_list1.php">好好玩國內活動</a></li>
            <li class="active"><?php echo $ww ?>國內活動</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong><?php echo $ww ?>國內活動</strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <form id="addform" action="?st=<?php echo $ww2 ?>" method="post" target="_self" class="form-inline" onsubmit="return chk_form()">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td colspan=2>
                                    來源：
                                    <select name="ac_come" id="ac_come">
                                        <option value="">請選擇</option>
                                        <?php 
                                            $arr1 = ["新開發","回客","推薦","其他"];
                                            foreach($arr1 as $a1){
                                                if($ac_come == $a1){
                                                    echo "<option value=".$a1." selected>".$a1."</option>";
                                                }else{
                                                    echo "<option value=".$a1.">".$a1."</option>";
                                                }                                                
                                            }                                            
                                        ?> 
                                    </select>　
                                    開發者：
                                    <select name="ac_open1" id="branch">
                                        <option value="">請選擇</option>
                                        <?php
                                            $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' Order By admin_SOrt";
                                            $rs = $SPConn->prepare($SQL);
                                            $rs->execute();
                                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($result as $re){ ?>
                                                <option value="<?php echo $re["admin_name"];?>"<?php if ( $ac_open1 == $re["admin_name"] ){?> selected<?php }?>><?php echo $re["admin_name"];?></option>
                                        <?php }?>
                                    </select>
                                    <select name="ac_open2" id="single">
                                        <option value="">請選擇</option>
                                        <?php
                                            if ( $_REQUEST["flag"] == "1" ){ 
                                                $SQL_er = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".SqlFilter($_REQUEST["branch"],"tab")."' Order By p_desc2 Desc, lastlogintime Desc";
                                            }else{
                                                $SQL_er = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".SqlFilter($_REQUEST["branch"],"tab")."' And p_work=1 Order By p_desc2 Desc, lastlogintime Desc";
                                            }
                                            if ( $branch != "" ){
                                                $rs_er = $SPConn->prepare($SQL_er);
                                                $rs_er->execute();
                                                $result_er=$rs_er->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($result_er as $re_er){
                                                    if ( $re_er["p_name"] != "" ){ $p_name = $re_er["p_name"]; }
                                                    if ( $re_er["p_other_name"] != "" ){ $p_name = $re_er["p_other_name"]; }
                                                    echo "<option value='".$re_er["p_user"]."'";
                                                    if ( $ac_open2 == $re_er["p_user"] ){ echo " selected";}
                                                    echo ">".$p_name."</option>";
                                                }
                                        }?>
                                    </select>　
                                    執行者：
                                    <select name="ac_run1" id="branch2">
                                        <option value="">請選擇</option>
                                        <?php
                                            $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' Order By admin_SOrt";
                                            $rs = $SPConn->prepare($SQL);
                                            $rs->execute();
                                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($result as $re){ ?>
                                                <option value="<?php echo $re["admin_name"];?>"<?php if ( $ac_run1 == $re["admin_name"] ){?> selected<?php }?>><?php echo $re["admin_name"];?></option>
                                        <?php }?>
                                    </select>
                                    <select name="ac_run2" id="single2">
                                        <option value="">請選擇</option>
                                        <?php
                                            if ( $_REQUEST["flag"] == "1" ){ 
                                                $SQL_er = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".SqlFilter($_REQUEST["branch"],"tab")."' Order By p_desc2 Desc, lastlogintime Desc";
                                            }else{
                                                $SQL_er = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".SqlFilter($_REQUEST["branch"],"tab")."' And p_work=1 Order By p_desc2 Desc, lastlogintime Desc";
                                            }
                                            if ( $branch != "" ){
                                                $rs_er = $SPConn->prepare($SQL_er);
                                                $rs_er->execute();
                                                $result_er=$rs_er->fetchAll(PDO::FETCH_ASSOC);
                                                foreach($result_er as $re_er){
                                                    if ( $re_er["p_name"] != "" ){ $p_name = $re_er["p_name"]; }
                                                    if ( $re_er["p_other_name"] != "" ){ $p_name = $re_er["p_other_name"]; }
                                                    echo "<option value='".$re_er["p_user"]."'";
                                                    if ( $ac_run2 == $re_er["p_user"] ){ echo " selected";}
                                                    echo ">".$p_name."</option>";
                                                }
                                        }?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2><label><input type="checkbox" name="ac_show" value="1" <?php if($ac_show == "1"){echo "checked";} ?>> 前台不顯示</label>
                                    <?php 
                                        if($_REQUEST["ac"] == ""){ ?>
                                            &nbsp;<label><input type="checkbox" name="sync" value="1" onchange="sync_div($(this))"> 同步至約會專家</label>
                                        <?php }                                    
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>主辦單位：<input type="text" name="sub5_auto" value="<?php echo $sub5_auto; ?>" class="form-control"></td>
                                <td>主辦單位2：<input type="text" name="ac_1" value="<?php echo $ac_1; ?>" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>承辦單位：<input type="text" name="ac_5" value="<?php echo $ac_5; ?>" class="form-control"></td>
                                <td>上車地點一：<input type="text" name="ac_car1" value="<?php echo $ac_car1; ?>" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>協辦單位：<input type="text" name="ac_2" value="<?php echo $ac_2; ?>" class="form-control"></td>
                                <td>上車地點二：<input type="text" name="ac_car2" value="<?php echo $ac_car2; ?>" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>指導單位：<input type="text" name="ac_3" value="<?php echo $ac_3; ?>" class="form-control"></td>
                                <td>上車地點三：<input type="text" name="ac_car3" value="<?php echo $ac_car3; ?>" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>贙助單位：<input type="text" name="ac_4" value="<?php echo $ac_4; ?>" class="form-control"></td>
                                <td>上車地點四：<input type="text" name="ac_car4" value="<?php echo $ac_car4; ?>" class="form-control"></td>
                            </tr>
                            <tr>
                                <td colspan=2>
                                    地區會館：
                                    <select name="ac_branch" id="ac_branch">
                                        <?php 
                                            if($ac_branch != ""){
                                                echo "<option value='".$ac_branch."'>".$ac_branch."</option>";
                                            }
                                        ?>
                                        <option value="好好玩旅行社">好好玩旅行社</option>
                                    </select>　
                                    活動類別： 
                                    <select name="ac_kind3" id="ac_kind3" class="form-control" required>
                                        <option value="">請選擇</option>
                                        <?php 
                                            $arr2 = ["約會活動","主題活動"];
                                            foreach($arr2 as $a2){
                                                if($ac_kind3 == $a2){
                                                    echo "<option value=".$a2." selected>".$a2."</option>";
                                                }else{
                                                    echo "<option value=".$a2.">".$a2."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                    &nbsp;&nbsp;<select name="ac_kind" id="ac_kind" required>
                                        <option value="">請選擇</option>
                                        <?php 
                                            $arr3 = ["戶外踏青","午茶約會","主題系列","熟齡專區","小資首選"];
                                            foreach($arr3 as $a3){
                                                if($ac_kind == $a3){
                                                    echo "<option value=".$a3." selected>".$a3."</option>";
                                                }else{
                                                    echo "<option value=".$a3.">".$a3."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                    &nbsp;&nbsp;
                                    活動地點：<select name="ac_area" id="ac_area">
                                        <option value="">請選擇</option>
                                        <?php
                                            $area = array("新北市", "台北市", "基隆市", "宜蘭縣", "桃園市", "新竹縣", "新竹市", "苗栗縣", "苗栗市", "台中市", "彰化縣", "彰化市", "南投縣", "嘉義縣", 
                                                    "嘉義市", "雲林縣", "台南市", "高雄市", "屏東縣", "花蓮縣", "台東縣", "澎湖縣", "金門縣", "馬祖", "綠島", "蘭嶼", "其他");
                                            foreach($area as $ar){
                                                if($ar == $ac_area){
                                                    echo "<option value=" .$ar. " selected>" .$ar. "</option>";
                                                }else{
                                                    echo "<option value=" .$ar. ">" .$ar. "</option>";
                                                }
                                            }
                                        ?> 
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>
                                    <p><b>好好玩網站價格顯示</b></p>
                                    原價：<input type="text" name="ac_money1" id="ac_money1" value="<?php echo $ac_money1; ?>" class="form-control">
                                    &nbsp;&nbsp;結盟廠商價男生費用：<input type="text" name="ac_money2" id="ac_money2" value="<?php echo $ac_money2; ?>" class="form-control">
                                    &nbsp;&nbsp;結盟廠商價女生費用：<input type="text" name="ac_money6" id="ac_money6" value="<?php echo $ac_money6; ?>" class="form-control">
                                    <br>
                                    &nbsp;&nbsp;男生費用：<input type="text" name="ac_money4" id="ac_money4" value="<?php echo $ac_money4; ?>" class="form-control">
                                    &nbsp;&nbsp;女生費用：<input type="text" name="ac_money5" id="ac_money5" value="<?php echo $ac_money5; ?>" class="form-control" required>
                                    &nbsp;&nbsp;女生2人同行價：<input type="text" name="ac_money7" id="ac_money7" value="<?php echo $ac_money7; ?>" class="form-control">
                                </td>
                            </tr>
                            <tr class="sync_hide">
                                <td colspan=2>
                                    <p><b>約會專家網站價格顯示</b></p>
                                    約會專家價-男：<input type="number" name="si_ac_money2" id="si_ac_money2" value="0" class="form-control">
                                    &nbsp;&nbsp;約會專家價-女：<input type="number" name="si_ac_money3" id="si_ac_money3" value="0" class="form-control">
                                    &nbsp;&nbsp;春天會員價-男：<input type="number" name="si_ac_money6" id="si_ac_money6" value="0" class="form-control">
                                    &nbsp;&nbsp;春天會員價-女：<input type="number" name="si_ac_money7" id="si_ac_money7" value="0" class="form-control">
                                    <br>
                                    DMN會員價-男：<input type="number" name="si_ac_money8" id="si_ac_money8" value="0" class="form-control">
                                    &nbsp;&nbsp;DMN會員價-女：<input type="number" name="si_ac_money9" id="si_ac_money9" value="0" class="form-control">
                                    &nbsp;&nbsp;好好玩會員價-男：<input type="number" name="si_ac_money10" id="si_ac_money10" value="0" class="form-control">
                                    &nbsp;&nbsp;好好玩會員價-女：<input type="number" name="si_ac_money11" id="si_ac_money11" value="0" class="form-control">
                                    <br>
                                    結盟廠商價-男：<input type="number" name="si_ac_money4" id="si_ac_money4" value="0" class="form-control">
                                    &nbsp;&nbsp;結盟廠商價-女：<input type="number" name="si_ac_money5" id="si_ac_money5" value="0" class="form-control">

                                </td>
                            </tr>
                            <tr>
                                <?php 
                                    if($ac_time != ""){
                                        $ac_time1 = Date_EN($ac_time,1);
                                        $ac_time2 = date("G",strtotime($ac_time));
                                        $ac_time3 = date("i",strtotime($ac_time));
                                    }
                                ?>   
                                <td colspan=2>活動時間：<input type="text" name="ac_time1" id="ac_time1" class="datepicker" autocomplete="off" value="<?php echo $ac_time1; ?>">
                                <select name="ac_time2" id="ac_time2">
                                        <option value="">請選擇</option>
                                        <?php 
                                            for($i=1; $i<=24; $i++){
                                                if($i == $ac_time2){
                                                    echo "<option value='".$i."' selected>".$i."</option>";
                                                }else{
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                }
                                            }
                                        ?>
                                    </select> 
                                    時　
                                    <select name="ac_time3" id="ac_time3">
                                        <option value="">請選擇</option>
                                        <?php 
                                            $minArr = ["00","30"];
                                            foreach($minArr as $minA){
                                                if($ac_time3 == $minA){
                                                    echo "<option value=".$minA." selected>".$minA."</option>";
                                                }else{
                                                    echo "<option value=".$minA.">".$minA."</option>";
                                                }
                                            }
                                        ?>
                                    </select> 分</td>
                            </tr>
                            <tr>
                                <td colspan=2>報名截止日期：<input name="deadline" id="deadline" type="text" class="datepicker" autocomplete="off" value="<?php echo Date_EN($deadline,1); ?>">　報名人數：<input type="text" name="signup" id="signup" value="<?php echo $signup; ?>" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>餐點：<input type="text" name="ac_eat1" id="ac_eat1" value="<?php echo $ac_eat1; ?>" class="form-control">&nbsp&nbsp&nbsp請使用,做餐點區格，如：排骨飯,雞腿飯,帝王蟹</td>
                                <td>飲品：<input type="text" name="ac_eat2" id="ac_eat2" value="<?php echo $ac_eat2; ?>" class="form-control">&nbsp&nbsp&nbsp請使用,做飲品區格，如：紅茶,綠茶,奶茶</td>
                            </tr>
                            <tr>
                                <td colspan=2>活動標題：<input type="text" name="ac_title" id="ac_title" style="width:50%" class="form-control" value="<?php echo $ac_title; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan=2>首頁簡短標題：<input type="text" name="ac_index_title" id="ac_index_title" style="width:50%" class="form-control" value="<?php echo $ac_index_title; ?>"></td>
                            </tr>
                            <tr>
                                <td>活動特色：<textarea name="ac_note1" id="ac_note1" style="width:80%;height:150px;" class="form-control"><?php echo $ac_note1; ?></textarea></td>
                                <td>報名方式：<textarea name="ac_note3" id="ac_note3" style="width:80%;height:150px;" class="form-control"><?php echo $ac_note3; ?></textarea></td>
                            </tr>
                            <tr>
                                <td>活動介紹：<textarea name="ac_note2" id="ac_note2" style="width:80%;height:150px;" class="form-control"><?php echo $ac_note2; ?></textarea></td>
                                <td>注意事項：<textarea name="ac_note4" id="ac_note4" style="width:80%;height:150px;" class="form-control"><?php echo $ac_note4; ?></textarea></td>
                            </tr>

                            <tr>
                                <td>洽詢專線：<input name="ac_msg4" type="text" id="ac_msg4" value="<?php echo $ac_msg4; ?>" class="form-control"> </td>
                            </tr>
                            <tr>
                                <td colspan=2>活動照片：
                                    <table border=1 width="100%" style="border-collapse: collapse;border:1px solid #999;">
                                        <tr>
                                            <td width="25%" align="center" height="100">
                                                <span id="ac_pic_img"></span>
                                                <?php 
                                                    if($ac_pic != ""){ ?>
                                                        <a href="?st=delp&v=ac_pic&ac=<?php echo $ac; ?>">刪除</a>
                                                        <br><a href="webfile/funtour/upload_image/<?php echo $ac_pic; ?>" class="fancybox"><img width=300 src="webfile/funtour/upload_image/<?php echo $ac_pic; ?>" border=0></a>
                                                    <?php }
                                                ?>
                                                <div>
                                                    <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_uploads1" name="file_uploads1" type="file" class="file_upload_d" data-n="1" <?php if($ac_pic != ""){echo " data-op='".$ac_pic."'"; } ?>></span>
                                                    <div id="progress" class="progress progress-striped" style="display:none">
                                                        <div class="bar progress-bar progress-bar-lovepy"></div>
                                                    </div>
                                                    <div id="fileupload_show1"></div>
                                                    <input type="hidden" name="ac_pic1" id="ac_pic1" value="<?php echo $ac_pic; ?>">
                                                </div>
                                            </td>
                                            <td width="25%" align="center">
                                                <span id="ac_pic2_img"></span>
                                                <?php 
                                                    if($ac_pic2 != ""){ ?>
                                                        <a href="?st=delp&v=ac_pic2&ac=<?php echo $ac; ?>">刪除</a>
                                                        <br><a href="webfile/funtour/upload_image/<?php echo $ac_pic2; ?>" class="fancybox"><img width=300 src="webfile/funtour/upload_image/<?php echo $ac_pic2; ?>" border=0></a>
                                                    <?php }
                                                ?>
                                                <div>
                                                    <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_uploads2" name="file_uploads2" type="file" class="file_upload_d" data-n="2" <?php if($ac_pic != ""){echo " data-op='".$ac_pic2."'"; } ?>></span>
                                                    <div id="progress" class="progress progress-striped" style="display:none">
                                                        <div class="bar progress-bar progress-bar-lovepy"></div>
                                                    </div>
                                                    <div id="fileupload_show2"></div>
                                                    <input type="hidden" name="ac_pic2" id="ac_pic2" value="<?php echo $ac_pic2; ?>">
                                                </div>
                                            </td>
                                            <td width="25%" align="center">
                                                <span id="ac_pic3_img"></span>
                                                <?php 
                                                    if($ac_pic3 != ""){ ?>
                                                        <a href="?st=delp&v=ac_pic3&ac=<?php echo $ac; ?>">刪除</a>
                                                        <br><a href="webfile/funtour/upload_image/<?php echo $ac_pic3; ?>" class="fancybox"><img width=300 src="webfile/funtour/upload_image/<?php echo $ac_pic3; ?>" border=0></a>
                                                    <?php }
                                                ?>
                                                <div>
                                                    <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_uploads3" name="file_uploads3" type="file" class="file_upload_d" data-n="3" <?php if($ac_pic != ""){echo " data-op='".$ac_pic3."'"; } ?>></span>
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
                                                        <a href="?st=delp&v=ac_pic4&ac=<?php echo $ac; ?>">刪除</a>
                                                        <br><a href="webfile/funtour/upload_image/<?php echo $ac_pic4; ?>" class="fancybox"><img width=300 src="webfile/funtour/upload_image/<?php echo $ac_pic4; ?>" border=0></a>
                                                    <?php }
                                                ?>
                                                <div>
                                                    <span class="btn btn-danger fileinput-button"><span>上傳檔案</span><input id="file_uploads4" name="file_uploads4" type="file" class="file_upload_d" data-n="4" <?php if($ac_pic != ""){echo " data-op='".$ac_pic4."'"; } ?>></span>
                                                    <div id="progress" class="progress progress-striped" style="display:none">
                                                        <div class="bar progress-bar progress-bar-lovepy"></div>
                                                    </div>
                                                    <div id="fileupload_show4"></div>
                                                    <input type="hidden" name="ac_pic4" id="ac_pic4" value="<?php echo $ac_pic4; ?>">
                                                </div>
                                            </td>

                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2 align="center"><input type="submit" name="Submit" value="確定新增" class="btn btn-info" style="width:50%;"></td>
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
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="assets/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.fileupload.js"></script>
<script type="text/javascript">
    // 開發者的會館、秘書自動選取(修改模式)
    $("#branch").val("<?php echo $ac_open1; ?>");
        $.ajax({
			type: "POST",
		   	url: "ajax/ajax.php",
		   	data: "branch=<?php echo $ac_open1; ?>&re_type=get_personnel" ,
		   	success: function(json){
			    onComplete("single",json);
			}
		}).done(function(data){
            $("#single").val("<?php echo $ac_open2; ?>");
    });
    // 執行的會館、秘書自動選取(修改模式)
    $("#branch2").val("<?php echo $ac_run1; ?>");
        $.ajax({
			type: "POST",
		   	url: "ajax/ajax.php",
		   	data: "branch=<?php echo $ac_run1; ?>&re_type=get_personnel" ,
		   	success: function(json){
			    onComplete("single2",json);
			}
		}).done(function(data){
            $("#single2").val("<?php echo $ac_run2; ?>");
    });
    // 執行的會館選擇後ajax秘書名單
    $("#branch2").change(function () {
		var branch = $("#branch2").val();
		removeOptions('single2');
		AjaxLoadSuccess("single2", branch, "get_personnel");
	});


    var $ff = [];
    var $nowffc = 0,
        $uploadc = 1;
    $(".sync_hide").hide();

    function sync_div($this) {
        if (!$this.prop("checked")) $(".sync_hide").hide();
        else $(".sync_hide").show();
    }

    function chk_form() {
        var $clist = {
                "ac_come": "來源",
                "ac_open2": "開發者",
                "ac_money1": "原價",
                "ac_area": "活動地點",
                "ac_time1": "活動時間",
                "ac_time2": "活動時間-小時",
                "ac_time3": "活動時間-分鐘",
                "ac_title": "活動標題",
                "deadline": "報名截止日期"
            },
            $rr = 0;
        $.each($clist, function(n, v) {
            if (!$("#" + n).val()) {
                alert("請輸入或選擇" + v);
                $("#" + n).focus();
                $rr = 1;
            }
            if ($rr) return false;
        });
        if ($rr) return false;

        var $cnlist = {
                "ac_money1": "原價",
                "ac_money2": "結盟廠商價男生費用",
                "ac_money6": "結盟廠商價女生費用",
                "ac_money4": "男生費用",
                "ac_money5": "女生費用",
                "ac_money7": "女生2人同行價",
                "signup": "報名人數"
            },
            $rr = 0;
        var reg = /^\d+$/;
        $.each($cnlist, function(n, v) {
            if (!reg.test($("#" + n).val())) {
                alert(v + "只能輸入數字。");
                $("#" + n).focus();
                $rr = 1;
            }
            if ($rr) return false;
        });

        if ($rr) return false;
        if ($ff.length && $uploadc) {
            $.each($ff, function(i) {
                $(this).submit();
            });
            return false;
        }

        return true;

    }
    $(function() {
        $("#ac_open1").on("change", function() {
            personnel_get("ac_open1", "ac_open2");
        });
        $("#ac_run1").on("change", function() {
            personnel_get("ac_run1", "ac_run2");
        });
        $(".file_upload_d").each(function() {

            var $this = $(this),
                $thisid = $this.attr("id"),
                $progress = $this.closest("div").find(".progress");
            var $imgs = $(this).closest("span").find("#cimg").val();
            var $types = $this.data("types"),
                $op = $this.data("op"),
                $n = $this.data("n");

            $this.fileupload({
                    url: "ad_fun_action_list1_add.php?st=upload&old_pic=" + $op + "&types=" + $types,
                    type: "POST",
                    dropZone: $this,
                    dataType: 'html',
                    autoUpload: false,
                    done: function(e, data) {

                        if (data.result) {
                            var $ffc = $ff.length;
                            $("#ac_pic" + $n).val(data.result);
                            if ($ffc == $nowffc + 1) {
                                $uploadc = 0;
                                //console.log("send"+$nowffc);
                                $("#addform").submit();
                            }
                            $nowffc++;
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
                        }
                    }
                }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

        });
    });
</script>