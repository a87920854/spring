<?php
/***********************************************/
//檔案名稱：ad_singleparty_invite_list_set.php
//後台對應位置：約會專家功能->會館約會(設定排約時間)
//改版日期：2022.01.26
//改版設計人員：Jack
//改版程式人員：Queena
/***********************************************/

require_once("_inc.php");
require_once("./include/_function.php");

//接收值
$st = SqlFilter($_REQUEST["st"],"tab");
$branch = SqlFilter($_REQUEST["branch"],"tab");
$single = SqlFilter($_REQUEST["single"],"tab");
$branch2 = SqlFilter($_REQUEST["branch2"],"tab");
$single2 = SqlFilter($_REQUEST["single2"],"tab");
$n11y = SqlFilter($_REQUEST["n11y"],"tab");
$n11m = SqlFilter($_REQUEST["n11m"],"tab");
$n11d = SqlFilter($_REQUEST["n11d"],"tab");
$n11h = SqlFilter($_REQUEST["n11h"],"tab");
$n11mm = SqlFilter($_REQUEST["n11mm"],"tab");
$mem_num1 = SqlFilter($_REQUEST["mem_num1"],"tab");
$mem_num2 = SqlFilter($_REQUEST["mem_num2"],"tab");
$n1b = SqlFilter($_REQUEST["n1b"],"tab");
$v1b = SqlFilter($_REQUEST["v1b"],"tab");
$types = SqlFilter($_REQUEST["types"],"tab");
$invitea = SqlFilter($_REQUEST["invitea"],"tab");

if ( $st == "add" ){
    if ( $branch == "" ){ call_alert("請選擇排約人秘書會館。",0,0); }
    if ( $single == "" ){ call_alert("請選擇排約人秘書。",0,0); }
    if ( $branch2 == "" ){ call_alert("請選擇排約對象秘書會館。",0,0); }
    if ( $single2 == "" ){ call_alert("請選擇排約對象秘書。",0,0); }

    for ( $i=0;$i<=12;$i++ ){
        //execute("n"&i&" = request(""n"&i&""")")
        ${"n".$i} = SqlFilter($_REQUEST["n".$i],"tab");
	}

	for ( $i=0;$i<=12;$i++ ){
        //execute("v"&i&" = request(""v"&i&""")")
        ${"v".$i} = SqlFilter($_REQUEST["v".$i],"tab");
    }

    $n11 = $n11y."/".$n11m."/".$n11d." ".$n11d.":".$n11h;
    $n11 = strtotime($n11);

    //判斷預訂時間
    if ( ! chkDate($n11) ){
        call_alert("預訂時間有誤。",0,0);
    }

    //設定變數
    $mem_num1 = $mem_num1;
    $mem_num2 = $mem_num2;
	
    //新增 love_re_invite
    $SQL_i  = "Insert Into love_re_invite(mem_num1, mem_num2, branch, single, branch2, single2, n0, n1, n1b, n2, n3, n4, n5, n6, n7, n8, n9, n10, n11, n12, v0, v1, v1b, v2, ";
    $SQL_i .= "v3, v4, v5, v6, v7, v8, v9, v10, times, types, si_invite) Values ( ";
    $SQL_i .= "'".$mem_num1."',";
    $SQL_i .= "'".$mem_num2."',";
    $SQL_i .= "'".$branch."',";
    $SQL_i .= "'".$single."',";
    $SQL_i .= "'".$branch2."',";
    $SQL_i .= "'".$single2."',";
    $SQL_i .= "'".strtoupper(trim($n0))."',";
    $SQL_i .= "'".$n1."',";
    $SQL_i .= "'".$n1b."',";
    $SQL_i .= "'".$n2."',";
    $SQL_i .= "'".$n3."',";
    $SQL_i .= "'".$n4."',";
    $SQL_i .= "'".$n5."',";
    $SQL_i .= "'".$n6."',";
    $SQL_i .= "'".$n7."',";
    $SQL_i .= "'".$n8."',";
    $SQL_i .= "'".$n9."',";
    $SQL_i .= "'".$n10."',";
    $SQL_i .= "'".$n11."',";
    $SQL_i .= "'".$n12."',";
    $SQL_i .= "'".strtoupper(trim($v0))."',";
    $SQL_i .= "'".$v1."',";
    $SQL_i .= "'".$v1b."',";
    $SQL_i .= "'".$v2."',";
    $SQL_i .= "'".$v3."',";
    $SQL_i .= "'".$v4."',";
    $SQL_i .= "'".$v5."',";
    $SQL_i .= "'".$v6."',";
    $SQL_i .= "'".$v7."',";
    $SQL_i .= "'".$v8."',";
    $SQL_i .= "'".$v9."',";
    $SQL_i .= "'".$v10."',";
    $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."',";
    $SQL_i .= "'".$types."',";
    $SQL_i .= "'".$invitea."')";
    $rs_i = $SPConn->prepare($SQL_i);
    $rs_i->execute();

    $SQL = "Select mem_auto, mem_username From member_data Where mem_num=".$mem_num1;
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);
    if ( count($result) > 0 ){
        $mem_auto1 = $re["mem_auto"];
        $lusername1 = $re["mem_username"];
    }

    //更新 si_invite
    $SQL = "Select * From si_invite Where auton=".$invitea;
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);
    if ( count($result) > 0 ){
        $SQL_u = "Update si_invite Set stats=3,statstime3='".strftime("%Y/%m/%d %H:%M:%S")."',eval_branch='".$branch."',";
        if ( $rsingle != "" ){	 	
            $SQL_u .= "eval_single='".$single."',eval_single_name='".SingleName($single,"normal")."'";
        }
        if ( $rsingle2 != "" ){	 	
            $SQL_u .= "eval_single2='".$single2."',eval_single2_name='".SingleName($single2,"normal")."'";
        }
        $SQL_u .= "datetime_real_old='".$re["datetime_real"]."',datetime_real='".$n11."' ";
        $SQL_u.= "Where auton=".$invitea;
        $rs_u = $SPConn->prepare($SQL_u);
        $rs_u->execute();
    }

    if ( $mem_auto1 != "" ){
        $SQL_u = "Update member_data Set all_type='已排約' Where mem_auto=".$mem_auto1;
        $rs_u = $SPConn->prepare($SQL_u);
        $rs_u->execute();

        //新增 log_data
        $SQL_i  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, log_4, log_5, log_service) Values ( ";
        $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."'";
        $SQL_i .= "'".$mem_auto1."',";
        $SQL_i .= "'".$lusername1."',";
        $SQL_i .= "'".$n1."',";
        $SQL_i .= "'".SingleName($single,"normal")."',";
        $SQL_i .= "'".$branch."',";
        $SQL_i .= "'".$_SESSION["MM_Username"]."',";
        $SQL_i .= "'".$n10."',";
        $SQL_i .= "'系統紀錄',";
        $SQL_i .= "由 ".SingleName($single,"normal")." 處理 ".$n1." 與 ".$v1." 於 ".$n11." 排約 - 系統紀錄"	 ;
        $SQL_i .= "'member',1)";
        $rs_i = $SPConn->prepare($SQL_i);
        $rs_i->execute();
    }

    $SQL = "Select mem_auto, mem_username From member_data Where mem_num=".$mem_num2;
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);    
    if ( count($result) > 0 ){
        $mem_auto2 = $re["mem_auto"];
        $lusername2 = $re["mem_username"];
    }

    if ( $mem_auto2 != "" ){
        $SQL_u = "Update member_data Set all_type='已排約' Where mem_auto=".$mem_auto2;
        $rs_u = $SPConn->prepare($SQL_u);
        $rs_u->execute();

        //新增 log_data
        $SQL_i  = "Insert Into log_data(log_time, log_num, log_fid, log_username, log_name, log_branch, log_single, log_1, log_2, log_4, log_5, log_service) Values ( ";
        $SQL_i .= "'".strftime("%Y/%m/%d %H:%M:%S")."'";
        $SQL_i .= "'".$mem_auto2."',";
        $SQL_i .= "'".$lusername2."',";
        $SQL_i .= "'".$v1."',";
        $SQL_i .= "'".SingleName($single,"normal")."',";
        $SQL_i .= "'".$branch."',";
        $SQL_i .= "'".$_SESSION["MM_Username"]."',";
        $SQL_i .= "'".$v10."',";
        $SQL_i .= "'系統紀錄',";
        $SQL_i .= "由 ".SingleName($single,"normal")." 處理 ".$n1." 與 ".$v1." 於 ".$n11." 排約 - 系統紀錄"	 ;
        $SQL_i .= "'member',1)";
        $rs_i = $SPConn->prepare($SQL_i);
        $rs_i->execute();
    }
	reURL("win_close.asp?m=預訂完成.......");
    exit;
}

if ( $st == "read" ){
    
    //接收值
    $keyword1 = SqlFilter($_REQUEST["keyword1"],"tab");
    $keyword2 = SqlFilter($_REQUEST["keyword2"],"tab");
    $SQL = "Select * From member_data where 1=1";
    if ( is_numeric($keyword1) ){
        $SQL .= " And (mem_num=".$keyword1." Or mem_mobile='".$keyword1."')";
    }else{
        $SQL .= " And mem_mobile='".$keyword1."'";
    }
    $SQL .= " Order By mem_time Desc";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);
    if ( count($result) == 0 ){
        call_alert("找不到此編號或手機的預訂排約人資料。", 1, 1);
	}else{
        $n0 = $re["mem_username"];
        $n1 = $re["mem_name"];
        $n1b= $re["mem_branch"];
        $n2 = $re["mem_sex"];
        $n3 = ($re["mem_by"]-1911);
        $n4 = $re["mem_school"];
        $n5 = $re["mem_he"];
        $n6 = $re["mem_we"];
        $n7 = $re["mem_job1"].$re["mem_job2"];
        $n10 = $re["mem_mobile"];
        $mem_num1 = $re["mem_num"];
    }
	
    $SQL = "Select * From member_data Where 1=1";
    if ( is_numeric($keyword2) ){
        $SQL .= " And (mem_num=".$keyword2." Or mem_mobile='".$keyword2."')";
    }else{
        $SQL .= " And mem_mobile='".$keyword2."'";
    }
    $SQL .= " Order By mem_time Desc";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);
    if ( count($result) == 0 ){
        call_alert("找不到此編號或手機的預訂排約對象資料。", 1, 1);
	}else{
        $v0 = $re["mem_username"];
        $v1 = $re["mem_name"];
        $v1b= $re["mem_branch"];
        $v2 = $re["mem_sex"];
        $v3 = ($re["mem_by"]-1911);
        $v4 = $re["mem_school"];
        $v5 = $re["mem_he"];
        $v6 = $re["mem_we"];
        $v7 = $re["mem_job1"].$re["mem_job2"];
        $v10 = $re["mem_mobile"];
        $mem_num2 = $re["mem_num"];
    }
}

$a = SqlFilter($_REQUEST["a"],"int");
$sts = "新增";
$SQL = "Select * From si_invite Where auton=".$a;
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);
if ( count($result) > 0 ){
    $datebranch = $re["datebranch"];
    $datetime_real = $re["datetime_real"];
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>約會專家</title>
        <script type="text/javascript" src="js/jquery-1.8.3.js"></script>
        <script type="text/javascript" src="js/util.js"></script>
    </head>

    <body leftmargin="0" topmargin="0">
        <table width="660" border="0" align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend style="color:#fc3bf5;font-weight:bold;">約會專家 - 轉入會館排約預訂表</legend>
                        <table width="650" align="center" cellpadding="3" style="font-size:14px; color:midnightblue;">
                            <tr>
                                <td bgcolor="#d9dbfd" colspan="2">
                                    <form style="margin:0px;" action="?st=read" method="post" id="form1" onSubmit="return chk_form1()">
                                        <strong style="color: #1a218e;">
                                        ▲ 預訂排約人編號或手機： <input name="keyword1" type="text" id="keyword1" value="<?php echo $keyword1;?>" size="6"> 
                                        　▲ 預訂排約對象編號或手機： <input name="keyword2" type="text" id="keyword2" value="<?php echo $keyword2;?>" size="6">
                                        </strong>
                                        <input type="hidden" name="a" value="<?php echo $a;?>"><input type="submit" value="讀取資料" class="css-radius">
                                    </form>
                                </td>
                            </tr>
                            <?php if ( $st == "read" ){ ?>
                                <tr>
                                    <td colspan="2" style="color: red;">
                                        <strong>
                                        ★ 請確定排約人必須在左邊(綠區)，排約對象必須在右邊(紅區)，如資料相反請
                                        <a href="?st=read&keyword1=<?php echo $keyword2;?>&keyword2=<?php echo $keyword1;?>&a=<?php echo $a;?>">點此交換</strong></a>
                                    </td>
                                </tr>
                            <?php }?>
                            <tr>
                                <td bgcolor="#91fded" width="50%"><strong>▼ ▼ ▼ 預訂排約人 ▼ ▼ ▼ </strong></td>
                                <td bgcolor="#fdbabe" width="50%"><strong>▼ ▼ ▼ 預訂排約對象 ▼ ▼ ▼ </strong></td>
                            </tr>
                            <form action="?st=add" method="post" id="form2" onSubmit="return chk_form()">
                                <tr>
                                    <td bgcolor="#91fded" width="50%">
                                        姓　名： <input name="n1" type="text" id="n1" value="<?php echo $n1;?>" size="15">　
                                        <br>性　別： 
                                        <select name="n2" id="n2">
                                            <option value="男"<?php if ( $n2 == "男" ){ echo " selected"; }?>>男</option>
                                            <option value="女"<?php if ( $n2 == "女" ){ echo " selected"; }?>>女</option>
                                        </select><br>
                                        身分證： <input name="n0" id="n0" type=text" value="<?php echo $n0;?>" size="10" maxlength="10"> 
                                        <br>會　館： <input type="text" value="<?php echo $n1b;?>" size="5" disabled>
                                        <input name="n1b" type="hidden" id="n1b" value="<?php echo $n1b;?>">
                                    </td>
                                    <td bgcolor="#fdbabe" width="50%">
                                        姓　名： <input name="v1" type="text" id="v1" value="<?php echo $v1;?>" size="15">　
                                        <br>性　別： 
                                        <select name="v2" id="v2">
                                            <option value="男"<?php if ( $v2 == "男" ){ echo " selected"; }?>>男</option>
                                            <option value="女"<?php if ( $v2 == "女" ){ echo " selected"; }?>>女</option>
                                        </select><br>
                                        身分證： <input name="v0" id="v0" type=text" value="<?php echo $v0;?>" size="10" maxlength="10"> 
                                        <br>會　館： <input type="text" value="<?php echo $v1b;?>" size="5" disabled>
                                        <input name="v1b" type="hidden" id="v1b" value="<?php echo $v1b;?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#91fded">
                                        年次： <input name="n3" type="text" id="n3" value="<?php echo $n3;?>" size="6">　
                                        學歷： 
                                        <select name="n4" id="n4">
                                            <option value="國中"<?php if ( $n4 == "國中" ){ echo " selected"; }?>>國中</option>
                                            <option value="高中"<?php if ( $n4 == "高中" ){ echo " selected"; }?>>高中</option>
                                            <option value="高職"<?php if ( $n4 == "高職" ){ echo " selected"; }?>>高職</option>
                                            <option value="專科"<?php if ( $n4 == "專科" ){ echo " selected"; }?>>專科</option>
                                            <option value="大學"<?php if ( $n4 == "大學" ){ echo " selected"; }?>>大學</option>
                                            <option value="碩士"<?php if ( $n4 == "碩士" ){ echo " selected"; }?>>碩士</option>
                                            <option value="博士"<?php if ( $n4 == "博士" ){ echo " selected"; }?>>博士</option>
                                            <option value="其他"<?php if ( $n4 == "其他" ){ echo " selected"; }?>>其他</option>
                                        </select>
                                    </td>
                                    <td bgcolor="#fdbabe">
                                        年次： <input name="v3" type="text" id="v3" value="<?php echo $v3;?>" size="6">　
                                        學歷： 
                                        <select name="v4" id="v4">
                                            <option value="國中"<?php if ( $v4 == "國中" ){ echo " selected"; }?>>國中</option>
                                            <option value="高中"<?php if ( $v4 == "高中" ){ echo " selected"; }?>>高中</option>
                                            <option value="高職"<?php if ( $v4 == "高職" ){ echo " selected"; }?>>高職</option>
                                            <option value="專科"<?php if ( $v4 == "專科" ){ echo " selected"; }?>>專科</option>
                                            <option value="大學"<?php if ( $v4 == "大學" ){ echo " selected"; }?>>大學</option>
                                            <option value="碩士"<?php if ( $v4 == "碩士" ){ echo " selected"; }?>>碩士</option>
                                            <option value="博士"<?php if ( $v4 == "博士" ){ echo " selected"; }?>>博士</option>
                                            <option value="其他"<?php if ( $v4 == "其他" ){ echo " selected"; }?>>其他</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#91fded">
                                        身高： <input name="n5" type="text" id="n5" value="<?php echo $n5;?>" size="6">　
                                        體重： <input name="n6" type="text" id="n6" value="<?php echo $n6;?>" size="6">
                                    </td>
                                    <td bgcolor="#fdbabe">
                                        身高： <input name="v5" type="text" id="v5" value="<?php echo $v5;?>" size="6">　
                                        體重： <input name="v6" type="text" id="v6" value="<?php echo $v6;?>" size="6">
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#91fded">工作情形： <input name="n7" type="text" id="n7" value="<?php echo $n7;?>" size="20"></td>
                                    <td bgcolor="#fdbabe">工作情形： <input name="v7" type="text" id="v7" value="<?php echo $v7;?>" size="20"></td>
                                </tr>
                                <tr>
                                    <td bgcolor="#91fded">手機： <input name="n10" type="text" id="n10" value="<?php echo $n10;?>" size="10" maxlength="10"></td>
                                    <td bgcolor="#fdbabe">手機： <input name="v10" type="text" id="v10" value="<?php echo $v10;?>" size="10" maxlength="10"></td>
                                </tr>
                                <tr>
                                    <td bgcolor="#fdf0d3" colspan="2">預訂時間：
                                        <?php
                                        if ( $datetime_real != "" && chkDate($datetime_real) ){
                                            $dry = date("Y",$datetime_real);
                                            $drm = date("m",$datetime_real);
                                            $drd = date("d",$datetime_real);
                                            $drh = date("H",$datetime_real);
                                        }
                                        ?>
                                        <select name="n11y" id="n11y">
                                            <?php
                                            for ( $i=date("Y");$i<=(date("Y")+2);$i++ ){
                                                echo "<option value='".$i."'";
                                                if ( $dry == $i ){ echo " selected";}
                                                echo ">".$i."</option>";
                                            }
                                            echo "<option value='".(date("Y")-1)."'>".(date("Y")-1)."</option>";
                                            ?>
                                        </select> 年
                                        <select name="n11m" id="n11m">
                                            <?php
                                            echo "<option value='".date("m")."'>".date("m")."</option>";
                                            for ( $i=1;$i<=12;$i++ ){
                                                echo "<option value='".$i."'";
                                                if ( $drm == $i ){ echo " selected"; }
                                                echo ">".$i."</option>";
                                            }
                                            ?>
                                        </select> 年
                                        <select name="n11d" id="n11d">
                                            <?php
                                                for ( $i=1;$i<=31;$i++ ){
                                                    echo "<option value='".$i."'";
                                                    if ( $drd == $i ){ echo " selected";}
                                                    echo ">".$i."</option>";
                                                }
                                            ?>
                                        </select> 日
                                        <select name="n11h" id="n11h">
                                            <option value="">請選擇</option>
                                            <?php
                                            for ( $i=10;$i<=22;$i++ ){
                                                echo "<option value='".$i."'";
                                                if ( $drh == $i ){ echo " selected";}
                                                echo ">".$i."</option>";
                                            }
                                            ?>
                                        </select> 時 
                                        <select name="n11mm" id="n11mm">
                                            <option value="00">00</option>
                                        </select> 分至 <?php echo $datebranch;?> 排約。
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#fdf0d3" colspan=2>
                                        排約人秘書：
                                        <select name="branch" id="branch" autocomplete="off">
                                            <option value="">請選擇</option>
                                            <?php
                                            if ( $ran != "" ){
                                                echo  "<option value='".$rbranch."' selected>".$rbranch."</option>";
                                            }else{
                                                if ( $_SESSION["branch"] != "" ){
                                                    if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
                                                        //會館資料
                                                        $SQL = "Select * From branch_data Where auto_no<>10 Order By admin_Sort";
                                                        $rs = $SPConn->prepare($SQL);
                                                        $rs->execute();
                                                        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
    	                                                foreach($result as $re){
    		                                                echo "<option value='".$re["admin_name"]."'>".$re["admin_name"]."</option>";
                                                        }
                                                    }else{
                                                            echo "<option value='".$_SESSION["branch"]."'>".$_SESSION["branch"]."</option>";
                                                    }
                                                }else{
                                                    echo "<option value='' selected>請選擇</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        <select name="single" id="single">
                                            <?php
                                            if ( $ran != "" ){
                                                echo "<option value='".$rsingle."'>".SingleName($rsingle,"normal")."</option>";
                                            }else{
                                                echo "<option value=''>請選擇</option>";
                                            }
                                            ?>
                                        </select>　
                                        類型：
                                        <select name="types">
                                            <option value="singleparty"<?php if ( $types == "singleparty" ){ echo " selected";}?>>約會專家</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#fdf0d3" colspan=2>
                                        排約對象秘書：
                                        <select name="branch2" id="branch2" autocomplete="off">
                                            <option value="">請選擇</option>
                                            <?php
                                            if ( $ran != "" ){
                                                echo "<option value='".$rbranch2."' selected>".$rbranch2."</option>";
                                            }else{
                                                if ( $_SESSION["branch"] != "" ){
                                                    if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
                                                        //會館資料
                                                        $SQL = "Select * From branch_data Where auto_no<>10 Order By admin_Sort";
                                                        $rs = $SPConn->prepare($SQL);
                                                        $rs->execute();
                                                        $result=$rs->fetchAll(PDO::FETCH_ASSOC);
    	                                                foreach($result as $re){
    		                                                echo "<option value='".$re["admin_name"]."'>".$re["admin_name"]."</option>";
                                                        }
                                                    }else{
                                                        echo "<option value='".$_SESSION["branch"]."'>".$_SESSION["branch"]."</option>";
                                                    }
                                                }else{
                                                    echo "<option value='' selected>請選擇</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        <select name="single2" id="single2">
                                            <?php
                                            if ( $ran != "" && $rsingle2 != "" ){
                                                echo "<option value='".$rsingle2."'>".SingleName($rsingle2,"normal")."</option>";
                                            }else{
                                                echo "<option value=''>請選擇</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#fdf0d3" colspan=2>接待注意事項及備註：<br> <textarea name="n12" id="n12" style="width:100%" rows=3><?php echo $n12;?></textarea></td>
                                </tr>
                                <tr bgcolor="#d9dbfd">
                                    <td colspan="2" align="center" style="color: midnightblue;">
                                        <input name="mem_num1" type="hidden" id="mem_num1" value="<?php echo $mem_num1;?>">
                                        <input name="mem_num2" type="hidden" id="mem_num2" value="<?php echo $mem_num2;?>">
                                        <input name="invitea" type="hidden" id="invitea" value="<?php echo $a;?>">
                                        <input name="Submit" type="submit" id="Submit2" value="確定送出">
                                    </td>
                                </tr>
                            </form>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>
    </body>
</html>

<script language="JavaScript">
    function chk_form1() {
        if (!$("#keyword1").val() && !$("#keyword2").val()) {
            alert("請輸入要讀取資料的編號或手機。");
            $("#keyword1").focus();
            return false;
        }
        return true;
    }

    function chk_form() {
        var $allc = {
                "branch": "排約人會館",
                "single": "排約人秘書",
                "branch2": "排約對象會館",
                "single2": "排約對象秘書",
                "n0": "排約人身分證",
                "v0": "排約對象身分證",
                "n1": "排約人姓名",
                "v1": "排約對象姓名",
                "n3": "排約人年次",
                "v3": "排約對象年次",
                "n4": "排約人學歷",
                "v4": "排約對象學歷",
                "n10": "排約人手機",
                "v10": "排約對象手機",
                "n11h": "小時"
            },
            $allc2 = {
                "n3": "排約人年次",
                "v3": "年次2",
                "n5": "排約人身高",
                "v5": "排約對象身高",
                "n6": "排約人體重",
                "v6": "排約對象體重",
                "n10": "排約人手機",
                "v10": "排約對象手機",
                "n11h": "小時"
            },
            $rr = 0;
        $.each($allc, function(v, k) {
            if (!$("#" + v).val()) {
                alert("請輸入或選擇" + k + "。");
                $("#" + v).focus();
                $rr = 1;
                return false;
            }
        });
        $.each($allc2, function(v, k) {
            var $re = /^\d+$/;
            if ($("#" + v).val() && !$re.test($("#" + v).val())) {
                alert(k + "只能輸入數字。");
                $("#" + v).focus();
                $rr = 1;
                return false;
            }
        });

        if ($rr) return false;
        else return true;
    }

    $(function() {
        window.resizeTo(720, 600); 
        <?php if ( $ran != "" ){?>
            personnel_get("branch", "single", "<?php echo $rsingle;?>"); 
            <?php if ( $rsingle2 != "" ){?>
                personnel_get("branch2", "single2", "<?php echo $rsingle2;?>");
            <?php }else{?>
                personnel_get("branch2", "single2"); 
            <?php }?>
        <?php }else{?>
            personnel_get("branch", "single", "<?php echo $_SESSION["MM_Username"];?>");
            personnel_get("branch2", "single2", "<?php echo $_SESSION["MM_Username"];?>");
        <?php }?>

        <?php if ( $st == "read" ){?>
            <?php if ( $n2 != "" ){?>
                $("#n2").val("<?php echo $n2;?>"); 
            <?php }?>
            <?php if ( $n4 != "" ){?>
                $("#n4").val("<?php echo $n4;?>");
            <?php }?>
            <?php if ( $n8 != "" ){?>
                $("#n8").val("<?php echo $n8;?>");
            <?php }?>
            <?php if ( $v2 != "" ){?>
                $("#v2").val("<?php echo $v2;?>");
            <?php }?>
            <?php if ( $v4 != "" ){?>
                $("#v4").val("<?php echo $v4;?>");
            <?php }?>
            <?php if ( $v8 != "" ){?>
                $("#v8").val("<?php echo $v8;?>");
            <?php }?>
        <?php }else{?>
            $("select").each(function() {
                $(this).get(0).selectedIndex = 0;
            });
        <?php }?>

        $("#branch").on("change", function() {
            personnel_get("branch", "single");
        });
        $("#branch2").on("change", function() {
            personnel_get("branch2", "single2");
        });

        $("#single").on("change", function() {

            if (!$("#branch2").val()) {
                $("#branch2").val($("#branch").val()).trigger("change");

                setTimeout(function() {
                    $("#single2").val($("#single").val());
                }, 50);

            }

        });
    });
</script>