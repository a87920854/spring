<?php
error_reporting(0); 
/*****************************************/
//檔案名稱：ad_mem_service_list.php
//後台對應位置：名單/發送記錄>會員排約次數查詢
//改版日期：2021.12.29
//改版設計人員：Jack
//改版程式人員：Queena
/*****************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

$auth_limit = 7;
require_once("./include/_limit.php");

$default_sql_num = 200;

if ( SqlFilter($_REQUEST["vst"],"tab") == "full" ){
  $subSQL1 = "*";
  //sqlv2 = "count(mem_auto)"
}else{
  $subSQL1 = "Top ".$default_sql_num." * ";
  //sqlv2 = "count(mem_auto)"
}

$branch = $_REQUEST["branch"];
if ( $branch != "" ){
    //$rbranch = str_replace(",", "','", $branch);
    for ( $r=0;$r<count($branch);$r++ ){
        $rbranch = $rbranch."'".$branch[$r]."',";
    }
}

$rbranch = substr($rbranch, 0, -1);


if ( $rbranch != "" ){
    if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "love" ){
        //$subSQL2 = " And (mem_branch in ('".$rbranch."') Or mem_branch2 in ('".$rbranch."'))";
        $subSQL = " (mem_branch in (".$rbranch.") Or mem_branch2 in (".$rbranch."))";
    }else{
      	//$subSQL2 = " And (mem_branch = '".$_SESSION["branch"]."' Or mem_branch2 = '".$_SESSION["branch"]."')";
        $subSQL = " (mem_branch = '".$_SESSION["branch"]."' Or mem_branch2 = '".$_SESSION["branch"]."')";
    }
}else{
    //$subSQL2 = "And 1 = 0";
    $subSQL = " 1 = 0";
}

if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager"){
    //sqls = "SELECT "&sqlv&"                 FROM member_data WHERE mem_level = 'mem'"&b2sql
    //sqls2 = "SELECT "&sqlv2&" as total_size FROM member_data WHERE mem_level = 'mem'"&b2sql
    //$subSQL3 = "mem_level = 'mem'";
    $subSQL = $subSQL . " And mem_level = 'mem'";
}elseif ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "manager" ) {
    //sqls = "SELECT "&sqlv&" FROM member_data Where mem_level = 'mem' and (UPPER(mem_single) = '"&Ucase(Session("MM_username"))&"' or UPPER(mem_single2) = '"&Ucase(Session("MM_username"))&"')"
    //sqls2 = "SELECT "&sqlv2&" as total_size FROM member_data Where mem_level = 'mem' and (UPPER(mem_single) = '"&Ucase(Session("MM_username"))&"' or UPPER(mem_single2) = '"&Ucase(Session("MM_username"))&"')"
    //$subSQL3 = "mem_level = 'mem' And ( UPPER(mem_single) = '".strtoupper($_SESSION["MM_username"])."' Or UPPER(mem_single2) = '".strtoupper($_SESSION["MM_username"])."')";
    $subSQL = $subSQL . " And mem_level = 'mem' And ( UPPER(mem_single) = '".strtoupper($_SESSION["MM_username"])."' Or UPPER(mem_single2) = '".strtoupper($_SESSION["MM_username"])."')";
}elseif ( $_SESSION["MM_UserAuthorization"] == "pay" ){
    //sqls = "SELECT top 10 * FROM member_data Where mem_level = 'mem'"&b2sql
    //sqls2 = "SELECT count(mem_auto) as total_size FROM member_data Where mem_level = 'mem'"&b2sql
    $default_sql_num = "10";
}

//篩選條件[排約次數-起]
$lovesize1 = SqlFilter($_REQUEST["lovesize1"],"tab");
if ( $lovesize1 == "" && ! is_numeric($lovesize1) ){
	$lovesize1 = 0;
}
//篩選條件[排約次數-迄]
$lovesize2 = SqlFilter($_REQUEST["lovesize2"],"tab");
if ( $lovesize2 == "" && is_numeric($lovesize2) == false ){
	$lovesize2 = 5;
}
//篩選條件[排約時間-起]
$lovedate1 = SqlFilter($_REQUEST["lovedate1"],"tab");
if ( $lovedate1 == "" && ! chkDate($lovedate1) ){
	$lovedate1 = "";
}
//篩選條件[排約時間-迄]
$lovedate2 = SqlFilter($_REQUEST["lovedate2"],"tab");
if ( $lovedate2 == "" && ! chkDate($lovedate2) ){
	$lovedate2 = "";
}
//篩選條件[加入時間-起]
$joindate1 = SqlFilter($_REQUEST["joindate1"],"tab");
if ( $joindate1 == "" && ! chkDate($joindate1) ){
	$joindate1 = "";
}
//篩選條件[加入時間-迄]
$joindate2 = SqlFilter($_REQUEST["joindate2"],"tab");
if ( $joindate2 == "" && ! chkDate($joindate2) ){
	$joindate2 = "";
}

//篩選條件語法[排約次數-起]
if ( $lovesize1 != "" && $lovesize1 >= 0 ){
    $subSQL = $subSQL . " And love_size2 >='".$lovesize1."'";
}
//篩選條件語法[排約次數-迄]
if ( $lovesize2 != "" && $lovesize2 >= 1 ){
    $subSQL = $subSQL . " And love_size2 <='".$lovesize2."'";
}
//篩選條件語法[排約時間-起]
if ( $lovedate1 != "" ){
    $subSQL = $subSQL . " And love_time2 >='".$lovedate1." 00:00'";
}
//篩選條件語法[排約時間-迄]
if ( $lovedate1 != "" ){
    $subSQL = $subSQL . " And love_time2 <='".$lovedate2." 23:59'";
}
//篩選條件語法[加入時間-起]
if ( $joindate1 != "" ){
    $subSQL = $subSQL . " And mem_jointime >='".$joindate1." 00:00'";
}
//篩選條件語法[加入時間-迄]
if ( $joindate2 != "" ){
    $subSQL = $subSQL . " And mem_jointime <='".$joindate2." 23:59'";
}
//篩選條件語法[性別]
$sex = SqlFilter($_REQUEST["sex"],"tab");
if ( $sex != "" ){
    $subSQL = $subSQL . " And mem_sex ='".$sex."'";
}

/*非本頁欄位，可能有其他頁面會submit至此頁，先保留。

If request("s3") <> "" Then
 sqlss = sqlss & " and mem_name like N'%" + Replace(request("s3"), "'", "''") + "%'"
End If

If request("s4") <> "" Then
 sqlss = sqlss & " and mem_num like '%" + Replace(request("s4"), "'", "''") + "%'"
End If

If request("s5") <> "" Then
 sqlss = sqlss & " and si_account like '%" + Replace(request("s5"), "'", "''") + "%'"
End If

If request("s7") <> "" Then
 sqlss = sqlss & " and (UPPER(mem_single) like '%"&Ucase(request("s7"))&"%' or UPPER(mem_single2) like '%"&Ucase(request("s7"))&"%')"
End If

If request("s8") <> "" Then
 sqlss = sqlss & " and mem_come like '%" + Replace(request("s8"), "'", "''") + "%'"
 
If request("s8_1") <> "" Then
 sqlss = sqlss & " and mem_come2 = '" + Replace(request("s8_1"), "'", "''") + "'"
End if
End if

If request("s10") <> "" Then
 sqlss = sqlss & " and mem_school like '%" + Replace(request("s10"), "'", "''") + "%'"
End If

If request("s11") <> "" Then
 sqlss = sqlss & " and mem_branch like '%" + Replace(request("s11"), "'", "''") + "%'"
End If

If request("m1") <> "" Then
 sqlss = sqlss & " and mem_bm like '%" + Replace(request("m1"), "'", "''") + "%'"
End If

If request("d1") <> "" Then
 sqlss = sqlss & " and mem_bd like '%" + Replace(request("d1"), "'", "''") + "%'"
End If

If request("s21") <> "" Then
 sqlss = sqlss & " and mem_sex like '%" + Replace(request("s21"), "'", "''") + "%'"
End If

If request("s22") <> "" And  request("s22") <> "" Then
 sqlss = sqlss & " and mem_jy between '"&request("s22")&"' and '"&request("s24")&"'"
End If

If request("s23") <> "" And  request("s25") <> "" Then
 sqlss = sqlss & " and mem_jm between '"&request("s23")&"' and '"&request("s25")&"'"
End If

If request("s26") <> "" Then
 sqlss = sqlss & " and mem_s1 like '%" + Replace(request("s26"), "'", "''") + "%'"
End if

If request("s27") <> "" Then
 sqlss = sqlss & " and mem_by between '"&request("s27")&"' and '"&request("s28")&"'"
End If

If request("s29") <> "" Then
 sqlss = sqlss & " and mem_join = '"&request("s29")&"'"
End If

If request("a1") <> "" Then
 sqlss = sqlss & " and all_type like '%" + Replace(request("a1"), "'", "''") + "%'"
End If

If request("s97") <> "" Then
 sqlss = sqlss & " and mem_cc = '" + Replace(request("s97"), "'", "''") + "'"
End If

If request("s13") <> "" Then
 sqlss = sqlss & " and web_level = "&request("s13")&""
 select case request("s13")
 Case "2"
 tshow = "真人認證會員"
 Case "3","5"
 tshow = "璀璨會員"
 Case "4","6"
 tshow = "璀璨VIP會員"
 end select
End If

if tshow = "" then
	tshow = "所有會員"
end if
*/

//排序條件語法
$od = SqlFilter($_REQUEST["od"],"tab");
switch ( $od ){
    case "1":
        $subSQL7 = " Order By love_size2 Desc";
        $subSQL71 = " Order By love_size2";
        break;
    case "2":
        $subSQL7 = " Order By love_time2 Desc";
        $subSQL71 = " Order By love_time2";
        break;
    case "3":
        $subSQL7 = " Order By love_time2 Asc";
        $subSQL71 = " Order By love_time2";
        break;
    case "4":
        $subSQL7 = " Order By mem_jointime Desc";
        $subSQL71 = " Order By mem_jointime";
        break;
    case "5":
        $subSQL7 = " Order By mem_jointime Asc";
        $subSQL71 = " Order By mem_jointime";
        break;
    default:
        $subSQL7 = " Order By love_size2 Asc";
        $subSQL71 = " Order By love_size2";
        break;
}

//取得總筆數
$SQL = "Select count(mem_auto) As total_size From member_data Where ".$subSQL;
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result=$rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);
if ( count($result) == 0 || $re["total_size"] == 0 ) {
    $total_size = 0;
}else{
    $total_size = $re["total_size"];
}

//查看清單連結文字
if ( SqlFilter($_REQUEST["vst"],"tab") == "full" ){
    $count_href = "　<a href='?vst=n'>[查看前二百筆]</a>";
}else{
    if ( $total_size > 200 ){ $total_size = 200;}
    $count_href = "　<a href='?vst=full'>[查看完整清單]</a>";
}

//取得分頁資料
$tPageSize = 50; //每頁幾筆
$tPage = 1; //目前頁數
if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
if ( $tPageSize*$tPage < $total_size ){
    $page2 = 50;
}else{
    $page2 = (50-(($tPageSize*$tPage)-$total_size));
}

//分頁語法
$SQL_list  = "Select ".$subSQL1." From (";
$SQL_list .= "Select TOP ".$page2." * From (";
$SQL_list .= "Select TOP ".($tPageSize*$tPage)." * From member_data Where ".$subSQL." ".$subSQL7.") t1 Where".$subSQL." ".$subSQL71." Asc ) t2 Where".$subSQL." ".$subSQL7." ";
$rs_list = $SPConn->prepare($SQL_list);
$rs_list->execute();
$result_list = $rs_list->fetchAll(PDO::FETCH_ASSOC);
?>
<script type="text/JavaScript" src="./include/script.js"></script>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active"><a href="ad_mem_service_list.php">會員排約次數查詢</a></li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員排約次數查詢 - 數量：<?php echo $total_size;?>　<?php echo $count_href;?></strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <p style="clear:both">
                    <form id="searchform" action="ad_mem_service_list.php" method="post" target="_self" onsubmit="return chk_search_form()" class="pull-left form-inline">
                        性別：<select name="sex" style="width:80px;">
                            <option value="">不拘</option>
                            <option value="男"<?php if ( $sex == "男" ){ echo " selected";}?>>男</option>
                            <option value="女"<?php if ( $sex == "女" ){ echo " selected";}?>>女</option>
                        </select>&nbsp;&nbsp;&nbsp;&nbsp;
                    
                        排約次數：
                        <input type="number" id="lovesize1" name="lovesize1" style="width:40px;" value="<?php echo $lovesize1;?>"> 次以上 
                        <input type="number" id="lovesize2" name="lovesize2" style="width:40px;" value="<?php echo $lovesize2;?>"> 次以下
                        <p>
                            排約時間：
                            <input type="text" id="lovedate1" name="lovedate1" class="datepicker" autocomplete="off" style="width:100px;" value="<?php echo $lovedate1;?>"> 到 
                            <input type="text" id="lovedate2" name="lovedate2" class="datepicker" autocomplete="off" style="width:100px;" value="<?php echo $lovedate2;?>">
                            　　加入時間：
                            <input type="text" id="joindate1" name="joindate1" class="datepicker" autocomplete="off" style="width:100px;" value="<?php echo $joindate1;?>"> 到 
                            <input type="text" id="joindate2" name="joindate2" class="datepicker" autocomplete="off" style="width:100px;" value="<?php echo $joindate2;?>">
                        </p>
                        <?php
                        $showbranch = "";
						if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
                            $showbranch = get_branch('好好玩旅行社');		
                        }else{
                            $showbranch = $_SESSION["branch"];
                        }
                        $showbranch = clear_left_par($showbranch, ",");
                        /*if ( $branch != "" ){
                            $branch = str_replace(" ", "", $branch);
                        }*/
                        $showbranch = substr($showbranch, 0, -1);
                        $showbranch = explode(",", $showbranch);

                        for ( $b=0;$b<count($showbranch);$b++ ){
                            echo "<label><input type='checkbox' id='branch[]' name='branch[]' value='".$showbranch[$b]."'";
                            if ( $showbranch[$b] == $branch[$b] ) { echo " checked";}
                            echo ">&nbsp;".$showbranch[$b]."</label>&nbsp;&nbsp;";
                        }
                        ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" id="search_send" class="btn btn-default" value="送出查詢">
                    </form>
                </p>
                <select name="od" id="od" class="pull-right form-control2" onchange="location.href='ad_mem_service_list.php'+$(this).val()+'&branch=%E5%8F%B0%E5%8C%97&joindate2=&joindate1=&lovedate2=2021%2F09%2F28&lovedate1=2021%2F09%2F01&lovesize2=5&lovesize1=0&sex=%E7%94%B7'">
                    <option value="?od=0"<?php if ( $od = "0" ){ echo " selected";}?>>排約次數從低至高</option>
                    <option value="?od=1"<?php if ( $od = "1" ){ echo " selected";}?>>排約次數從高至低</option>
                    <option value="?od=2"<?php if ( $od = "2" ){ echo " selected";}?>>排約時間從近至遠</option>
                    <option value="?od=3"<?php if ( $od = "3" ){ echo " selected";}?>>排約時間從遠至近</option>
                    <option value="?od=4"<?php if ( $od = "4" ){ echo " selected";}?>>加入時間從近至遠</option>
                    <option value="?od=5"<?php if ( $od = "5" ){ echo " selected";}?>>加入時間從遠至近</option>
                </select>
                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr>
                            <th width="15%">資料來源</th>
                            <th width="8%">編號</th>
                            <th>姓名</th>
                            <th width="4%">性別</th>
                            <th width="10%">生日</th>
                            <th width="6%">學歷</th>
                            <th width="6%">排約次數</th>
                            <th width="6%">最後排約</th>
                            <th width="12%">秘書</th>
                            <th width="6%">照片</th>
                            <th width="8%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ( count($result_list) == 0 ){
                            if ( $branch == "" ){
                                echo "<tr><td colspan='11' height='200'>請先選擇會館</td></tr>";
                            }else{
                                echo "<tr><td colspan='11' height='200'>目前沒有資料</td></tr>";
                            }
                        }else{
                            foreach($result_list as $re_list){
                                $xv = "<a href=cad_no_mem_s.php?mem_mobile=".$re_list["mem_mobile"]."' target='_blank'> <span class='label label-info'>查詢</span></a>";
                                if ( $re_list["mem_cc"] != "" ){
                                    $mem_cc = " [".$re_list["mem_cc"]."]";
                                }else{
                                    $mem_cc = "";
                                }

                                if ( $re_list["mem_lc"] != "" ){
                                    $mem_cc = $mem_cc." [lc:".$re_list["mem_lc"]."]";
                                }
                        ?>
                                <tr>
                                    <td class="center">
                                        <?php
                                        echo $re_list["mem_come"];
                                        if ( $re_list["mem_come2"] != "" ){ echo "-".$re_list["mem_come2"];} 
                                        echo $mem_cc;
                                        ?>
                                    </td>
                                    <td><?php echo $re_list["mem_num"];?></td>
                                    <td class="center">
                                        <a href="ad_mem_detail.php?mem_num=<?php echo $re_list["mem_num"];?>" target="_blank"><?php echo $re_list["mem_name"];?></a>
                                        <div style="float:right">
                                            <?php
                                            if ( $re_list["si_account"] != "" && $re_list["si_account"] != "0" ){
                                                echo "&nbsp;<span class='label' style='background:#c22c7d'><span style='color:white;' data-toggle='tooltip' data-original-title='約會專家主帳號'>專</span></span>";
                                            }
                                            if ( $re_list["si_enterprise"] == 1 ){
                                                echo "&nbsp;<span class='label' style='background:blue'><a href='#' style='color:white;' data-toggle='tooltip' data-original-title='企業會員-".$re_list["company"]."'>企</a></span>";
                                            }
                                            echo $xv;
                                            ?>
                                        </div>
                                    </td>
                                    <td class="center"><?php echo $re_list["mem_sex"];?></td>
                                    <td class="center">
                                        <?php
                                        echo $re_list["mem_by"]."/".$re_list["mem_bm"]."/".$re_list["mem_bd"];
                                        if ( $re_list["mem_by"] != "" ){ echo "&nbsp;&nbsp;".(date("Y")-$re_list["mem_by"])." 歲";}
                                        ?>
                                    </td>
                                    <td class="center"><?php echo $re_list["mem_school"];?></td>
                                    <td class="center"><?php echo $re_list["love_size2"];?></td>
                                    <?php
                                    if ( chkDate($re_list["love_time2"] )){
                                        $love_time2 = $re_list["love_time2"];
                                    }else{
                                        $love_time2 = "無紀錄";
                                    }
                                    ?>
                                    <td class="center"><?php echo $love_time2;?></td>
                                    <?
                                    if ( $re_list["mem_branch"] != "" ){
                                        $mem_single = "<font color='green'>受理：</font>".$re_list["mem_branch"]." - ".SingleName($re_list["mem_single"],"normal");
                                    }else{
                                        $mem_single = "";
                                    }
                                    
                                    if ( $re_list["love_single"] != "" ){
                                        $love_single = "<br><font color='green'>排約：</font>".SingleName($re_list["love_single"],"normal");
                                    }else{
                                        $love_single = "";
                                    }

                                    if ( $re_list["call_branch"] != "" ){
                                        $call_single = "<br><font color='green'>邀約：</font>".$re_list["call_branch"]." - ".SingleName($re_list["call_single"],"normal");
                                    }else{
                                        $call_single = "";
                                    }
                                    ?>
                                    <td class="center"><?php echo $mem_single.$love_single.$call_single;?></td>
                                    <td class="center">
                                    <?php
                                        $mem_photo = $re_list["mem_photo"];
                                        
                                        if ( ( $re_list["mem_sex"] == "男" && $mem_photo != "boy.jpg" ) || ( $re_list["mem_sex"] == "女" && $mem_photo != "girl.jpg" ) ){
                                            if ( substr_count($mem_photo, "photo/") > 0 ){
                                                if ( $_REQUEST["s30"] != "" ){
                                                    echo "<a href='dphoto/".$mem_photo."?t=".(int)(rand()*9999)&"' class='fancybox'><img src='dphoto/".$mem_photo."?t=".(int)(rand()*9999)."' width='100'></a>";
                                                }else{
                                                    echo "<a href='dphoto/".$mem_photo."?t=".(int)(rand()*9999)."' class='fancybox'>有</a>";
                                                }
                                            }else{
                                                if ( $_REQUEST["s30"] != "" ){
                                                    echo "<a href='../photo/".$mem_photo."?t=".(int)(rand()*9999)."' class='fancybox'><img src='../photo/".$mem_photo."?t=".(int)(rand()*9999)."' width='100'></a>";
                                                }else{
                                                    echo "<a href='../photo/".$mem_photo."?t=".(int)(rand()*9999)."' class='fancybox'>有</a>";
                                                }
                                            }
                                        }else{
                                            echo "無";
                                        }
                                    ?>
                                    </td>
                                    <td class="center">
                                        <div class="btn-group">							
                                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <?php
                                                $reports = get_report_num($re_list["mem_mobile"]);
                                                if ( substr_count($reports, "|+|") > 0 ){
                                                    $report_array = explode("|+|", $reports);
                                                    $report = $report_array[0];
                                                    $report_text = $report_array[1];
                                                }else{
                                                    $report = 0;
                                                    $report_text = "無";
                                                }
                                                ?>
                                                <li><a href="ad_mem_detail.php?mem_num=<?php echo $re_list["mem_num"];?>" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                                <li><a href="javascript:Mars_popup('ad_report.php?k_id=<?php echo $re_list["mem_auto"]?>&lu=<?php echo $re_list["mem_username"];?>&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(<?php echo $report;?>)</a></li>
                                            </ul>
                                        </div>								
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php
                                        $wbl = "";
                                        $wbl_date = date("Y/m/d",strtotime($re_list["web_startime"]))."~".date("Y/m/d",strtotime($re_list["web_endtime"]));
                                        switch ( $re_list["web_level"] ){
                                            case 1:
                                                $wbl = "資料認證會員(".$wbl_date.")";
                                                break;
                                            case 2:
                                                $wbl = "真人認證會員(".$wbl_date.")";
                                                break;
                                            case 3:
                                                $wbl = "璀璨會員-一年期(".$wbl_date.")";
                                                break;
                                            case 4:
                                                $wbl = "璀璨VIP會員-一年期(".$wbl_date.")";
                                                break;
                                            case 5:
                                                $wbl = "璀璨會員-二年期(".$wbl_date.")";
                                                break;
                                            case 6:
                                                $wbl = "璀璨VIP會員-二年期(".$wbl_date.")";
                                                break;
                                        }
                                        if ( $wbl != "" ){ echo "<span style='color:blue'>".$wbl."</span>";}
                                        ?>
                                    </td>
                                    <td colspan="9" style="BORDER-bottom: #666666 1px dotted">
                                        (<a href="#re" onclick="Mars_popup('ad_report.php?k_id=<?php echo $re_list["mem_auto"];?>&lu=<?php echo $re_list["mem_username"];?>&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(<?php echo $report;?>)</a>，處理情形：<font color="#FF0000" size="2"><?php echo $re_list["all_type"];?></font>)
                                        <?php
                                            if ( SqlFilter($_REQUEST["s14"],"tab") != "" ){
                                                echo "最後排約時間：".$re_list["love_time2"];
                                            }else{
                                                echo "內容：".$report_text;
                                                if ( $re_list["all_note"] != "" ){
                                                    echo "<font color='blue'>舊：</font>";
                                                    echo $re_list["all_note"];
                                                }
                                            }
                                        ?>
                                    </td>
                                    <td colspan="3">
                                        <?php
                                        if ( $re_list["mem_branch2"] != "" ){
                                            echo "跨區：".$re_list["mem_branch2"]."-".SingleName($re_list["mem_single2"],"normal");
                                        }else{
                                            echo "&nbsp;";
                                        }

                                        if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
                                            echo $re_list["mem_tag"];
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php }?>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <!--include頁碼-->
	        <?php require_once("./include/_page.php"); ?>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->

<?php require_once("./include/_bottom.php");?>

<script type="text/javascript">
    function chk_search_form() {
        return true;
    }
</script>