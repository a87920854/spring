<?php
    /*****************************************/ 
    //檔案名稱：ad_secretary_fix.php
    //後台對應位置：管理系統/秘書資料>修改秘書資料
    //改版日期：2022.1.11
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
	if($_SESSION["MM_Username"] == "" ){ 
        call_alert("請重新登入。","login.php",0);
    }
    if($_SESSION["MM_UserAuthorization"] != "admin"){
        call_alert("您沒有查看此頁的權限。","login.php",0);
    }

    // 儲存
    if($_REQUEST["st"] == "addsave"){
        $p_auto = SqlFilter($_REQUEST["p_auto"],"int");
        $p_level_r = SqlFilter($_REQUEST["p_level"],"tab");
        if($p_level_r == "admin" || $p_level_r == "branch" || $_REQUEST["p_branch"] == "總管理處" || $_SESSION["MM_Username"] == "KYOE"){
            $p_user = trim(str_replace(" ", "",SqlFilter($_REQUEST["p_user"],"tab")));
        }else{
            $p_user = reset_number(SqlFilter($_REQUEST["p_user"],"tab"));
        }

        if(($p_level_r == "love" || $p_level_r == "love_manager") && $_REQUEST["p_lovebranch"] == ""){
            call_alert("排約部權限必須設定會員會館。",0,0);
        }

        if($p_user == ""){
            call_alert("身分證字號錯誤。",0,0);
        }

        if($p_auto != ""){
            $SQL = "SELECT * FROM personnel_data Where p_auto = ".$p_auto;
            $rs = $SPConn->prepare($SQL);
            $rs->execute();
            $result1 = $rs->fetch(PDO::FETCH_ASSOC);           
        }else{
            $SQL2 = "SELECT * FROM personnel_data where p_user='".$p_user."'";
            $rs = $SPConn->prepare($SQL2);
            $rs->execute();
            $result2 = $rs->fetch(PDO::FETCH_ASSOC);
            if($result2){
                call_alert("帳號重複。",0,0);                
            }
        }
        
        if(!$result1){
            //新增
            if($p_level_r == "action_1"){
                $p_level_r = "action";
                $action_level = 1;
            }elseif($p_level == "action_2"){
                $p_level_r = "action";
                $action_level = 2;
            }elseif($p_level == "action_3"){
                $p_level_r = "action";
                $action_level = 3;
            }
            if($_REQUEST["p_funtourpm"] == "1"){
                $p_funtourpm = 1;
            }else{
                $p_funtourpm = 0;
            }
            if($_REQUEST["p_funtourtravel1"] == "1"){
                $p_funtourtravel1 = 1;
            }else{
                $p_funtourtravel1 = 0;	
            }
            if($_REQUEST["p_funtourtravel2"] == "1"){
                $p_funtourtravel2 = 1;
            }else{
                $p_funtourtravel2 = 0;	
            }
            if($_REQUEST["p_funtourprint"] == "1"){
                $p_funtourprint = 1;
            }else{
                $p_funtourprint = 0;
            }
            if($_REQUEST["p_funtourall1"] == "1"){
                $p_funtourall1 = 1;
            }else{
                $p_funtourall1 = 0;	
            }
            if($_REQUEST["p_funtourall2"] == "1"){
                $p_funtourall2 = 1;
            }else{
                $p_funtourall2 = 0;	
            }
            if($_REQUEST["p_dmnweb"] == "1"){
                $p_dmnweb = 1;
            }else{
                $p_dmnweb = 0;	
            }
            if($_REQUEST["p_singleweb"] == "1"){
                $p_singleweb = 1;
            }else{
                $p_singleweb = 0;	
            }
            if($_REQUEST["vertest"] == "1"){
                $vertest = 1;
            }else{
                $vertest = 0;	
            }
            if($p_level == "love" || $p_level = "love_manager"){
                $p_lovebranch = SqlFilter($_REQUEST["p_lovebranch"],"tab");
                if($p_lovebranch != ""){
                    $p_lovebranch = trim(str_replace(" ", "",$p_lovebranch));                        
                }
            }else{
                $p_lovebranch = NULL;
            }
            if($_REQUEST["area_branch"] != ""){
                $area_branch = implode(",",$_REQUEST["area_branch"]);
            }else{
                $area_branch = "";
            }            
            $SQL2 = "INSERT INTO personnel_data (p_user,p_user2,p_branch,p_name,p_other_name,b_year,p_job2,p_level,p_note,p_desc,p_desc2,action_level,p_funtourpm,p_funtourtravel1,p_funtourtravel2,p_funtourprint,p_funtourall1,p_funtourall2,p_dmnweb,p_singleweb,vertest,p_lovebranch,area_branch) VALUES ('"
                    .$p_user."', '"
                    .SqlFilter($_REQUEST["p_user2"],"tab")."', '"
                    .SqlFilter($_REQUEST["p_branch"],"tab")."', '"
                    .SqlFilter($_REQUEST["p_name"],"tab")."', '"
                    .SqlFilter($_REQUEST["p_other_name"],"tab")."', '"
                    .SqlFilter($_REQUEST["b_year"],"tab")."', '"
                    .SqlFilter($_REQUEST["p_job2"],"tab")."', '"
                    .$p_level_r."', '"
                    .SqlFilter($_REQUEST["p_note"],"tab")."', '"
                    .SqlFilter($_REQUEST["p_desc"],"tab")."', '"
                    .SqlFilter($_REQUEST["p_desc2"],"tab")."', '"
                    .$action_level."', '"
                    .$p_funtourpm."', '"
                    .$p_funtourtravel1."', '"
                    .$p_funtourtravel2."', '"
                    .$p_funtourprint."', '"
                    .$p_funtourall1."', '"
                    .$p_funtourall2."', '"
                    .$p_dmnweb."', '"
                    .$p_singleweb."', '"
                    .$vertest."', '"
                    .$p_lovebranch."', '"
                    .$area_branch."')";
            $rs = $SPConn->prepare($SQL2);
            $rs->execute();
            // 取得 last_id
            $p_auto = $SPConn->lastInsertId();

            if(is_array($_REQUEST["pages"])){
                $pages = $_REQUEST["pages"];
            }else{
                $pages = "";
            }            
            if(is_array($pages)){                      
                $SQL3 = "delete from managers_power where p_user='".$p_user."'";
                $rs = $SPConn->prepare($SQL3);
                $rs->execute();
                foreach($pages as $page){
                    $page = str_replace(" ", "",$page);
                    $SQL3 = "INSERT INTO managers_power (p_user,page) VALUES ('".$p_user."','".$page."')";
                    $rs = $SPConn->prepare($SQL3);
                    $rs->execute();
                }           
            }else{
                $SQL3 = "delete from managers_power where p_user='".$p_user."'";
                $rs = $SPConn->prepare($SQL3);
                $rs->execute();
            }
        }else{
            //修改
            $p_level = SqlFilter($_REQUEST["p_level"],"tab");
            if($p_level == "action_1"){
                $p_level = "action";
                $action_level = 1;
            }elseif($p_level == "action_2"){
                $p_level = "action";
                $action_level = 2;
            }elseif($p_level == "action_3"){
                $p_level = "action";
                $action_level = 3;
            }
            if($_REQUEST["p_funtourpm"] == "1"){
                $p_funtourpm = 1;
            }else{
                $p_funtourpm = 0;
            }
            if($_REQUEST["p_funtourtravel1"] == "1"){
                $p_funtourtravel1 = 1;
            }else{
                $p_funtourtravel1 = 0;	
            }
            if($_REQUEST["p_funtourtravel2"] == "1"){
                $p_funtourtravel2 = 1;
            }else{
                $p_funtourtravel2 = 0;	
            }
            if($_REQUEST["p_funtourprint"] == "1"){
                $p_funtourprint = 1;
            }else{
                $p_funtourprint = 0;
            }
            if($_REQUEST["p_funtourall1"] == "1"){
                $p_funtourall1 = 1;
            }else{
                $p_funtourall1 = 0;	
            }
            if($_REQUEST["p_funtourall2"] == "1"){
                $p_funtourall2 = 1;
            }else{
                $p_funtourall2 = 0;	
            }
            if($_REQUEST["p_dmnweb"] == "1"){
                $p_dmnweb = 1;
            }else{
                $p_dmnweb = 0;	
            }
            if($_REQUEST["p_singleweb"] == "1"){
                $p_singleweb = 1;
            }else{
                $p_singleweb = 0;	
            }
            if($_REQUEST["vertest"] == "1"){
                $vertest = 1;
            }else{
                $vertest = 0;	
            }
            if($p_level == "love" || $p_level = "love_manager"){
                $p_lovebranch = SqlFilter($_REQUEST["p_lovebranch"],"tab");
                if($p_lovebranch != ""){
                    $p_lovebranch = trim(str_replace(" ", "",$p_lovebranch));                        
                }
            }else{
                $p_lovebranch = NULL;
            }
            if($_REQUEST["area_branch"] != ""){
                $area_branch = implode(",",$_REQUEST["area_branch"]);
            }else{
                $area_branch = "";
            }  
            $SQL2 = "UPDATE personnel_data SET 
                    p_user = '".$p_user."', 
                    p_user2 = '".SqlFilter($_REQUEST["p_user2"],"tab")."', 
                    p_branch = '".SqlFilter($_REQUEST["p_branch"],"tab")."', 
                    p_name = '".SqlFilter($_REQUEST["p_name"],"tab")."', 
                    p_other_name = '".SqlFilter($_REQUEST["p_other_name"],"tab")."', 
                    b_year = '".SqlFilter($_REQUEST["b_year"],"tab")."', 
                    p_job2 = '".SqlFilter($_REQUEST["p_job2"],"tab")."', 
                    p_level = '".$p_level_r."', 
                    p_note = '".SqlFilter($_REQUEST["p_note"],"tab")."', 
                    p_desc = '".SqlFilter($_REQUEST["p_desc"],"tab")."', 
                    p_desc2 = '".SqlFilter($_REQUEST["p_desc2"],"tab")."', 
                    video = '".SqlFilter($_REQUEST["video"],"tab")."', 
                    line = '".SqlFilter($_REQUEST["line"],"tab")."', 
                    action_level = '".SqlFilter($_REQUEST["b_year"],"tab")."', 
                    p_funtourpm = '".$p_funtourpm."', 
                    p_funtourtravel1 = '".$p_funtourtravel1."', 
                    p_funtourtravel2 = '".$p_funtourtravel2."', 
                    p_funtourprint = '".$p_funtourprint."', 
                    p_funtourall1 = '".$p_funtourall1."', 
                    p_funtourall2 = '".$p_funtourall2."', 
                    p_dmnweb = '".$p_dmnweb."', 
                    p_singleweb = '".$p_singleweb."', 
                    vertest = '".$vertest."', 
                    p_lovebranch = '".$p_lovebranch."', 
                    area_branch = '".$area_branch."'
                    Where p_auto = ".$p_auto;
            $rs = $SPConn->prepare($SQL2);
            $rs->execute();

            if(is_array($_REQUEST["pages"])){
                $pages = $_REQUEST["pages"];
            }else{
                $pages = "";
            }            
            if(is_array($pages)){                    
                $SQL3 = "delete from managers_power where p_user='".$p_user."'";
                $rs = $SPConn->prepare($SQL3);
                $rs->execute();
                foreach($pages as $page){
                    $page = str_replace(" ", "",$page);
                    $SQL3 = "INSERT INTO managers_power (p_user,page) VALUES ('".$p_user."','".$page."')";
                    $rs = $SPConn->prepare($SQL3);
                    $rs->execute();
                }           
            }else{
                $SQL3 = "delete from managers_power where p_user='".$p_user."'";
                $rs = $SPConn->prepare($SQL3);
                $rs->execute();
            }             
        }
        if($p_auto != ""){
            reURL("ad_secretary_photo.php?p_auto=".$p_auto);
        }       
    }

    if($_REQUEST["p_auto"] != ""){
        $tt = "修改";
	    $tt2 = "?st=addsave";
        $p_auto = SqlFilter($_REQUEST["p_auto"],"int");
        $SQL = "SELECT * FROM personnel_data where p_auto=".$p_auto;        
    }else{
        $tt = "新增";
        $tt2 = "?st=addsave";
        $SQL = "SELECT * FROM personnel_data where p_auto=".$p_auto;
    }
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if($result){
        $p_user = $result["p_user"];
        $p_user2 = $result["p_user2"];
        $p_name = $result["p_name"];
        $p_other_name = $result["p_other_name"];
        $p_branch = $result["p_branch"];
        $b_year = $result["b_year"];
        $p_job2 = $result["p_job2"];
        $p_level = $result["p_level"];
        $p_desc = $result["p_desc"];
        $p_desc2 = $result["p_desc2"];
        $p_note = $result["p_note"];
        $p_pic = $result["p_pic"];
        $p_funtourpm = $result["p_funtourpm"];
        $p_funtourtravel1 = $result["p_funtourtravel1"];
        $p_funtourtravel2 = $result["p_funtourtravel2"];
        $p_funtourprint = $result["p_funtourprint"];
        $p_funtourall1 = $result["p_funtourall1"];
        $p_funtourall2 = $result["p_funtourall2"];
        $p_dmnweb = $result["p_dmnweb"];
        $p_singleweb = $result["p_singleweb"];
        $action_level = $result["action_level"];
        $vertest = $result["vertest"];
        $video = $result["video"];
        $lines = $result["line"];
        $p_lovebranch = $result["p_lovebranch"];           
        $area_branch = $result["area_branch"];
    }
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_secretary.php">秘書資料</a></li>
            <li class="active"><?php echo $tt; ?>秘書資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong><?php echo $tt; ?>秘書資料</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <form name="form1" method="post" action="ad_secretary_fix.php?st=addsave" class="form-inline" onsubmit="return chk_form()">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <thead>
                            <tr>
                                <td width="80">會館：
                                    <select name="p_branch" id="p_branch" style="width:100px;">
                                        <option value="">選擇會館</option>
                                        <?php                                        
                                        $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' Order By admin_SOrt";
                                        $rs = $SPConn->prepare($SQL);
                                        $rs->execute();
                                        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($result as $re){ ?>
                                            <option value="<?php echo $re["admin_name"];?>"><?php echo $re["admin_name"];?></option>
                                        <?php }?>
                                    </select>
                                    　姓名：
                                    <input name="p_name" type="text" id="p_name" value="<?php echo $p_name; ?>" class="form-control">
                                    　別名：
                                    <input name="p_other_name" type="text" id="p_other_name" value="<?php echo $p_other_name; ?>" class="form-control">
                                    　前臺顯示權重：<select name="p_desc" id="p_desc">
                                        <option value="">請選擇</option>
                                        <option value="-2" <?php if($p_desc == -2){echo " selected";} ?>>前台不顯示</option>
                                        <?php 
                                            for($i=0;$i<=13;$i++){
                                                if($i == $p_desc){
                                                    echo "<option value='".$i."' selected>".$i."</option>";
                                                }else{
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                    後臺顯示權重：<select name="p_desc2" id="p_desc2">
                                        <option value="0">請選擇</option>
                                        <?php 
                                            for($i=0;$i<=13;$i++){
                                                if($i == $p_desc2){
                                                    echo "<option value='".$i."' selected>".$i."</option>";
                                                }else{
                                                    echo "<option value='".$i."'>".$i."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                    (數字越大越前面)
                                </td>
                            </tr>
                            <tr>
                                <td>帳號：
                                    <input name="p_user" type="text" id="p_user" class="form-control" value="<?php echo $p_user; ?>">
                                    密碼：
                                    <input name="b_year" type="text" id="b_year" class="form-control" value="<?php echo $b_year; ?>">
                                    　職務：
                                    <input name="p_job2" type="text" id="p_job2" class="form-control" value="<?php echo $p_job2; ?>">
                                    　等級：
                                    <select name="p_level" id="p_level" onchange="plevel_change($(this))">
                                        <option value="">請選擇</option>
                                        <option value="admin"<?php if($p_level == "admin"){echo " selected";} ?>>總管理者</option>
                                        <option value="action"<?php if($p_level == "action"){echo " selected";} ?>>企劃</option>
                                        <option value="action_1"<?php if($p_level == "action" && $action_level == 1){echo " selected";} ?>>南區企劃經理</option>
                                        <option value="action_2"<?php if($p_level == "action" && $action_level == 2){echo " selected";} ?>>北區企劃經理</option>
                                        <option value="action_3"<?php if($p_level == "action" && $action_level == 3){echo " selected";} ?>>企劃總監</option>
                                        <option value="single"<?php if($p_level == "single"){echo " selected";} ?>>秘書</option>
                                        <option value="branch"<?php if($p_level == "branch"){echo " selected";} ?>>督導</option>
                                        <option value="manager"<?php if($p_level == "manager"){echo " selected";} ?>>經理</option>
                                        <option value="love_manager"<?php if($p_level == "love_manager"){echo " selected";} ?>>服務部經理</option>
                                        <option value="love"<?php if($p_level == "love"){echo " selected";} ?>>排約部</option>
                                        <option value="pay"<?php if($p_level == "pay"){echo " selected";} ?>>會計部</option>
                                        <option value="keyin"<?php if($p_level == "keyin"){echo " selected";} ?>>資料輸入</option>
                                        <option value="count"<?php if($p_level == "count"){echo " selected";} ?>>數據統計</option>
                                        <option value="teacher"<?php if($p_level == "teacher"){echo " selected";} ?>>講師</option>
                                    </select>                                    
                                    <span id="plevel_span" style=""><a href="ad_secretary_group.php?manager=<?php echo $p_user; ?>" class="btn btn-xs btn-warning">設定團隊成員</a></span>
                                </td>
                            </tr>
                            <tr>
                                <td>會計對應(無免填)：
                                    <input name="p_user2" type="text" id="p_user2" class="form-control" value="<?php echo $p_user2; ?>">
                                    &nbsp;&nbsp;影片：<input name="video" type="text" id="video" class="form-control" value="<?php echo $video; ?>" style="width:20%">
                                    &nbsp;&nbsp;LINE：<input name="line" type="text" id="line" class="form-control" value="<?php echo $lines; ?>" style="width:20%">
                                </td>
                            </tr>
                            <tr>
                                <td align="left">自我介紹：<textarea name="p_note" id="p_note" class="form-control" style="width:60%;height:140px;"><?php echo $p_note; ?></textarea></td>
                            </tr>
                            <tr>
								<td align="left" style="color: brown;">
									跨區諮詢設定：
                                    <?php 
                                        $SQL = "Select * From branch_data Where auto_no < 10";
                                        $rs = $SPConn->prepare($SQL);
                                        $rs->execute();
                                        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                        if($result){
                                            foreach($result as $re){                                                
                                                echo "<input type='checkbox' id='area_branch' name='area_branch[]' value='".trim($re["admin_name"])."'";
                                                if(preg_match("/".trim($re["admin_name"])."/i", $area_branch) || $p_branch == $re["admin_name"]){echo " checked";}
                                                echo "> ".$re["admin_name"]." ";                                                
                                            }
                                        }                                        
                                    ?>
                                </td>
                            </tr>
                            <tr class="lovebranch_span">
                                <td class="lovebranch_span">
                                    <p>排約部-會員會館選擇：(預設開啟 <?php echo $p_branch; ?>)</p>
                                    <table class="table table-striped table-bordered bootstrap-datatable">
                                        <tr class="lovebranch_span">
                                        <?php                                        
                                            $SQL = "Select * From branch_data Where admin_name<>'線上諮詢' and admin_name<>'好好玩旅行社' Order By admin_SOrt";
                                            $rs = $SPConn->prepare($SQL);
                                            $rs->execute();
                                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($result as $re){
                                                $p_lovebranch_sel = "";
                                                if($p_branch == $re["admin_name"]){
                                                    $p_lovebranch_sel = " checked";
                                                }
                                                if(member_array($p_lovebranch,$re["admin_name"]) == 1){
                                                    $p_lovebranch_sel = " checked";
                                                }
                                                echo "<td class='lovebranch_span'><label><input type='checkbox' name='p_lovebranch' value='".$re["admin_name"]."'".$p_lovebranch_sel.">&nbsp;&nbsp;".$re["admin_name"]."</leabel></td>";
                                            }
                                        ?>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p>權限表-勾選開啟：</p>
                                    <table class="table table-striped table-bordered bootstrap-datatable">
                                        <tr>
                                            <td>
                                                <label><input type="checkbox" name="p_funtourpm" value="1" <?php if($p_funtourpm == "1"){echo "checked";} ?>> 好好玩前台頁面設計</leabel>
                                            </td>
                                            <td>
                                                <label><input type="checkbox" name="p_funtourtravel1" value="1" <?php if($p_funtourtravel1 == "1"){echo "checked";} ?>> 好好玩國內團控</leabel>
                                            </td>
                                            <td>
                                                <label><input type="checkbox" name="p_funtourtravel2" value="1" <?php if($p_funtourtravel2 == "1"){echo "checked";} ?>> 好好玩國外團控</leabel>
                                            </td>
                                            <td>
                                                <label><input type="checkbox" name="p_funtourall1" value="1" <?php if($p_funtourall1 == "1"){echo "checked";} ?>> 可見好好玩國內團控報名清單</leabel>
                                            </td>　
                                            <td>
                                                <label><input type="checkbox" name="p_funtourall2" value="1" <?php if($p_funtourall2 == "1"){echo "checked";} ?>> 可見好好玩國外團控報名清單</leabel>
                                            </td>
                                            <td>
                                                <label><input type="checkbox" name="p_funtourprint" value="1" <?php if($p_funtourprint == "1"){echo "checked";} ?>> 列印要保明細</leabel>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label><input type="checkbox" name="p_dmnweb" value="1" <?php if($p_dmnweb == "1"){echo "checked";} ?>> DMN網站</leabel>
                                            </td>
                                            <td>
                                                <label><input type="checkbox" name="p_singleweb" value="1" <?php if($p_singleweb == "1"){echo "checked";} ?>> 約會專家</leabel>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="vertest" value="1" <?php if($vertest == "1"){echo "checked";} ?>> 版本測試
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php
                                        $SQL = "select * from managers_power where p_user='".$p_user."'";
                                        $rs = $SPConn->prepare($SQL);
                                        $rs->execute();
                                        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                        if($result){
                                            foreach($result as $re){
                                                $powers = $powers . $re["page"].",";
                                            }
                                        }
                                        if(substr($powers,-1) == ","){
                                            $powers = substr($powers,0,-1);
                                        }
                                    ?>  
                                    <p>權限表-勾選關閉：</p>                                            
                                    <table class="table table-striped table-bordered bootstrap-datatable">
                                        <tr>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_admin_diff_list_team"<?php if(member_array($powers,"ad_admin_diff_list_team")){ echo " checked";} ?>> 小組業績表</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_single_list"<?php if(member_array($powers,"ad_single_list")){ echo " checked";} ?>> 秘書履歷</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_mem"<?php if(member_array($powers,"ad_mem")){ echo " checked";} ?>> 會員管理系統</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_photo_check"<?php if(member_array($powers,"ad_photo_check")){ echo " checked";} ?>> 網站照片審核</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_mem_login"<?php if(member_array($powers,"ad_mem_login")){ echo " checked";} ?>> 會員登入狀態</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_mem_love"<?php if(member_array($powers,"ad_mem_love")){ echo " checked";} ?>> 會員排約時間</leabel>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_no_mem"<?php if(member_array($powers,"ad_no_mem")){ echo " checked";} ?>> 未入會資料</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_fav"<?php if(member_array($powers,"ad_fav")){ echo " checked";} ?>> 關注名單</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_needlvup"<?php if(member_array($powers,"ad_needlvup")){ echo " checked";} ?>> 會員升級意願</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="web_mem"<?php if(member_array($powers,"web_mem")){ echo " checked";} ?>> 網站認證專區</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_mem_gift"<?php if(member_array($powers,"ad_mem_gift")){ echo " checked";} ?>> 會員互動區</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_love"<?php if(member_array($powers,"ad_love")){ echo " checked";} ?>> 排約報名資料</leabel>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_action"<?php if(member_array($powers,"ad_action")){ echo " checked";} ?>> 活動報名資料</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_quest"<?php if(member_array($powers,"ad_quest")){ echo " checked";} ?>> 問卷報名資料</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_guest"<?php if(member_array($powers,"ad_guest")){ echo " checked";} ?>> 客服中心資料</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_job"<?php if(member_array($powers,"ad_job")){ echo " checked";} ?>> 徵人資料</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_cs_data"<?php if(member_array($powers,"ad_cs_data")){ echo " checked";} ?>> 服務滿意度調查</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_invite"<?php if(member_array($powers,"ad_invite")){ echo " checked";} ?>> 約見紀錄表</leabel>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_report_list"<?php if(member_array($powers,"ad_report_list")){ echo " checked";} ?>> 回報紀錄表</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_report_list_count"<?php if(member_array($powers,"ad_report_list_count")){ echo " checked";} ?>> 回報統計表</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_mem_action_re_list"<?php if(member_array($powers,"ad_mem_action_re_list")){ echo " checked";} ?>> 活動明細表</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_mem_row"<?php if(member_array($powers,"ad_mem_row")){ echo " checked";} ?>> 排約部系統</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_mem_love_re_invite"<?php if(member_array($powers,"ad_mem_love_re_invite")){ echo " checked";} ?>> 排約預訂表</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_mem_love_re_list"<?php if(member_array($powers,"ad_mem_love_re_list")){ echo " checked";} ?>> 一般排約表</leabel>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_action_list"<?php if(member_array($powers,"ad_action_list")){ echo " checked";} ?>> 網站活動上傳</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_action_list2"<?php if(member_array($powers,"ad_action_list2")){ echo " checked";} ?>> 網站活動團控</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_action_note"<?php if(member_array($powers,"ad_action_note")){ echo " checked";} ?>> 企劃工作日誌</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_fun_mem"<?php if(member_array($powers,"ad_fun_mem")){ echo " checked";} ?>> 好好玩會員資料</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_fun_action1"<?php if(member_array($powers,"ad_fun_action1")){ echo " checked";} ?>> 好好玩國內報名</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_fun_action2"<?php if(member_array($powers,"ad_fun_action2")){ echo " checked";} ?>> 好好玩國外報名</leabel>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="ad_mem_login_log_list"<?php if(member_array($powers,"ad_mem_login_log_list")){ echo " checked";} ?>> 會員登入紀錄</leabel>
                                            </td>
                                            <td><label><input type="checkbox" name="pages[]" id="pages" value="teach_video"<?php if(member_array($powers,"teach_video")){ echo " checked";} ?>> 教學影片</leabel>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div align="center">
                                        <?php 
                                            if($p_auto != ""){ ?>
                                                <input type="submit" name="Submit" value="確定修改" class="btn btn-info" style="width:50%;">
                                                <input type="hidden" id="p_auto" name="p_auto" value="<?php echo $p_auto; ?>">
                                            <?php }else{ ?>
                                                <input type="submit" name="submit" value="確定新增" class="btn btn-info" style="width:50%;">
                                            <?php }
                                        ?>
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
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php")
?>

<script type="text/javascript">
    $mtu = "ad_secretary.";
    $(function() {
        <?php
            if($p_branch != ""){
                echo "$('#p_branch').val('".$p_branch."');";
            }
            if($p_level == "love" || $p_level == "love_manager"){
                echo "$('.lovebranch_span').show();";
            }else{
                echo "$('.lovebranch_span').hide();";
            }
        ?>        
    });

    function chk_form() {
        if (!$("#p_branch").val()) {
            alert("請選擇會館。");
            $("#p_branch").focus();
            return false;
        }
        if (!$("#p_name").val()) {
            alert("請輸入姓名。");
            $("#p_name").focus();
            return false;
        }
        if (!$("#p_other_name").val()) {
            alert("請輸入別名。");
            $("#p_other_name").focus();
            return false;
        }
        if (!$("#p_desc").val()) {
            alert("請選擇前臺顯示權重。");
            $("#p_desc").focus();
            return false;
        }
        if (!$("#p_user").val()) {
            alert("請輸入帳號。");
            $("#p_user").focus();
            return false;
        }
        if (!$("#b_year").val()) {
            alert("請輸入密碼。");
            $("#b_year").focus();
            return false;
        }
        if (!$("#p_job2").val()) {
            alert("請輸入職務。");
            $("#p_job2").focus();
            return false;
        }
        if (!$("#p_level").val()) {
            alert("請選擇等級。");
            $("#p_level").focus();
            return false;
        }



        return true;
    }

    function plevel_change($this) {
        /*	if($this.val() == "manager") {
        		$("#plevel_span").show();
        	} else {
        		$("#plevel_span").hide();
        	}*/
        if ($this.val() == "love" || $this.val() == "love_manager") {
            $(".lovebranch_span").show();
        } else {
            $(".lovebranch_span").hide();
        }

    }
</script>