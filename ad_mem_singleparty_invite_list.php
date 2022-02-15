<?php
/*********************************************/
//檔案名稱：ad_mem_singleparty_invite_list.php
//後台對應位置：約會專家功能->會員約會記錄
//改版日期：2022.02.14
//改版設計人員：Jack
//改版程式人員：Queena
/*********************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//權限判斷
$auth_limit = 6;
require_once("./include/_limit.php");
check_page_power("ad_mem_login_log_list");

//麵包屑
$unitprocess = $m_home.$icon."約會專家功能".$icon."會員約會記錄";

//接收值
$times1 = SqlFilter($_REQUEST["times1"],"tab");
$times2 = SqlFilter($_REQUEST["times2"],"tab");
$branch = SqlFilter($_REQUEST["branch"],"tab");
$single = SqlFilter($_REQUEST["single"],"tab");
$nostats0 = SqlFilter($_REQUEST["nostats0"],"tab");
$nowait = SqlFilter($_REQUEST["nowait"],"tab");
$types = SqlFilter($_REQUEST["types"],"tab");
$keyword = SqlFilter($_REQUEST["keyword"],"tab");
$vst = SqlFilter($_REQUEST["vst"],"tab");

//判斷日期
if ( $times1 != "" ){
    $acre_sign1 = $times1." 00:00";
    $vacre_sign1 = $times1;
    if ( chkDate($acre_sign1) == false ){
        call_alert("起始時間有誤。", 0, 0);
    }
}
if ( $times2 != "" ){
    $acre_sign2 = $times2." 23:59";
    $vacre_sign2 = $times2;
    if ( chkDate($acre_sign2) == false ){
        call_alert("結束時間有誤。", 0, 0);
    }
}

if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
    $subSQL1 = "1=1 ";
}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" ){
    $subSQL1 = "(mbranch='".$_SESSION["branc"]."' Or tbranch='".$_SESSION["branch"]."' Or datebranch='".$_SESSION["branch"]."') ";
}elseif ( $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
    $lovebranch = $_SESSION["lovebranch"];
    $lovebranch = str_replace(" ", "", $lovebranch);
    $lovebranch = str_replace(",", "','", $lovebranch);
    $subSQL1 = "(mbranch in ('".$lovebranch."') Or tbranch in ('".$lovebranch."') Or datebranch in ('".$lovebranch."')) ";
}elseif ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "manager" ){
    $subSQL1 ="(UPPER(msingle)='".strtoupper($_SESSION["MM_username"])."' Or UPPER(tsingle)='".strtoupper($_SESSION["MM_username"])."') ";
}else{
    exit;
}

//日期語法
if ( chkDate($acre_sign1) && chkDate($acre_sign2) ){
    $days = (strtotime($acre_sign2)-strtotime($acre_sign1))/86400;
    if ( $days < 0 ){
        call_alert("結束時間不能大於起始時間。", 0, 0);
    }
    $subSQL1 .= "And times Between '".$acre_sign1."' And '".$acre_sign2."' ";
}

//篩選條件(關鍵字)
if ( $keyword != "" ){
    $subSQL1 .= "And (mname Like N'%".$keyword."%' Or tname Like N'%".$keyword."%' Or mnum Like '%".$keyword."%' Or tnum Like '%".$keyword."%')";
}
//篩選條件(會館)
if ( $branch != "" ){
    $subSQL1 .= "And (mbranch='".$branch."' Or tbranch='".$branch."') ";
    $tshow = $branch."會館";
}
//篩選條件(祕書)
if ( $single != "" ){
    $subSQL1 .= "And (msingle='".$single."' Or tsingle='".$single."') ";
}
//篩選條件(排除邀約中)
if ( $nostats0 == "1" ){
    $subSQL1 .= "And Not stats = 0 ";
}
//篩選條件(排除過期)
if ( $nowait == "1" ){
    $subSQL1 .= "And (not stats = 0 or (stats = 0 and datediff(d, getdate(), dateadd(d, 15, times)) >= 0)) ";
}
//篩選條件(類型-fb.line)
if ( $types != "" ){
    if ( $type == "fb" || $type == "line" ){
        $subSQL1 .= "And types='".$types."' ";
    }else{
        $subSQL1 .= "And (types <> 'fb' and types <> 'line') ";
    }
}

if ( $tshow == "" ){
	$tshow = "所有會員";
}

//取得總筆數
$SQL = "Select count(auton) As total_size From si_invite as dba outer apply (select top 1 mem_name as mname from member_data where dba.mnum=mem_num) member_data1 outer apply (select top 1 mem_name as tname from member_data where dba.tnum=mem_num) member_data2 Where ".$subSQL1;
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result=$rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);
if ( count($result) == 0 || $re["total_size"] == 0 ) {
    $total_size = 0;
}else{
    $total_size = $re["total_size"];
}
//會計權限筆數
if  ( $_SESSION["MM_UserAuthorization"] == "pay" ){
    $total_size = 10;
}

//查看清單連結文字
if ( $vst == "full" ){
    $count_href = "　<a href=\"javascript:full_btn('n');\" class='btn btn-success'>查看前五百筆</a>";
}else{
    if ( $total_size > 500 ){ $total_size = 500;}
    $count_href = "　<a href=\"javascript:full_btn('full');\" class='btn btn-success'>查看完整清單</a>";
}

//取得分頁資料
$tPageSize = 50; //每頁幾筆
$tPage = 1; //目前頁數
$tPage_list = 0;
if ( $_REQUEST["tPage"] > 1 ){ 
    $tPage = $_REQUEST["tPage"];
    $tPage_list = ($tPage-1);
}
$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數

//分頁語法
$SQL_list  = "Select Top ".$tPageSize." * ";
$SQL_list .= "From (Select row_number() ";
$SQL_list .= "over(Order By times Desc) As rownumber,auton,types,times,mname,tname,mbranch,tbranch,mnum,tnum,datetime_stat,stats,statstime2,datetime_real,datebranch ";
$SQL_list .= "From si_invite as dba outer apply (select top 1 mem_name as mname from member_data where dba.mnum=mem_num) member_data1 outer apply (select top 1 mem_name as tname from member_data where dba.tnum=mem_num) member_data2 Where ".$subSQL1." ) temp_row ";
$SQL_list .= "Where rownumber > ".($tPageSize*$tPage_list);
$rs_list = $SPConn->prepare($SQL_list);
$rs_list->execute();
$result_list = $rs_list->fetchAll(PDO::FETCH_ASSOC);
?>
<script type="text/JavaScript" src="./include/script.js"></script>
<!-- MIDDLE -->
<section id="middle">

    <!-- 麵包屑 -->
    <header id="page-header">
        <div class="m-crumb"><i class="fa fa-folder-open-o"></i><?php echo $unitprocess;?></div>
    </header>
    <!-- /麵包屑 -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <h2 class="pageTitle">約會專家升級意願 》[<?php echo $tshow;?>]會員約會記錄 》資料列表 [ <i style="color: #76192e;">共計 <?php echo $total_size."筆資料</i> ]"; if ( $total_size >= 500 ){ echo $count_href;}?></h2>
            <form id="searchform" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" target="_self" class="form-inline" style="margin:0px;">
                <div class="m-search-bar">
                    <?php if  ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" ){?>
                        <span class="span-group">
                            <Select name="branch" id="branch" class="form-control">
                                <option value="">請選擇</option>
                                <?php
                                //會館資料
                                $SQL = "Select * From branch_data Where auto_no<>10 Order By admin_Sort";
                                $rs = $SPConn->prepare($SQL);
                                $rs->execute();
                                $result=$rs->fetchAll(PDO::FETCH_ASSOC);    
                                foreach($result as $re){ ?>
                                    <option value="<?php echo $re["admin_name"];?>"<?php if ( $branch == $re["admin_name"] ){?> selected<?php }?>><?php echo $re["admin_name"];?></option>
                                <?php }?>
                            </select>
                            秘書：
                            <select name="single" id="single">
                                <option value="">請選擇</option>
                                <?php
                                if ( $branch != "" ){
                                    $SQL = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".$branch."' Order By p_desc2 Desc, lastlogintime Desc";
                                    $rs = $SPConn->prepare($SQL);
                                    $rs->execute();
                                    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                    if ( count($result) > 0 ){
                                        foreach($result as $re){?>
                                            <option value="<?php echo $re["p_user"];?>"<?php if ( $single == $re["p_user"] ){?> selected<?php }?>><?php echo $re["p_other_name"]?></option>
                                        <?php }?>
                                    <?php }?>
                                <?php }?>
                            </select>
                        </span>
                    <?php }?>
                    <span class="span-group">
                        <select name="types">
                            <option value="">所有類型</option>
                            <option value="branch"<?php if ( $types == "branch" ){?> selected<?php }?>>會館約會</option>
                            <option value="fb"<?php if ( $types == "fb" ){?> selected<?php }?>>FB約會</option>
                            <option value="line"<?php if ( $types == "line" ){?> selected<?php }?>>LINE約會</option>
                        </select>
                    </span>
                    <span class="span-group">
                        發起時間：
                        <input type="text" class="datepicker" autocomplete="off" style="width:100px;" name="times1" value="<?php echo $vacre_sign1;?>">
                        ～
                        <input type="text" class="datepicker" autocomplete="off" style="width:100px;" name="times2" value="<?php echo $vacre_sign2;?>">
                    </span>
                    <span class="span-group">
                        <label style="display:inline"><input type="checkbox" data-no-uniform="true" name="nostats0" value="1"<?php if ( $nostats0 == "1" ){ echo " checked";}?>> 排除邀約中</label>
                        <label style="display:inline"><input type="checkbox" data-no-uniform="true" name="nowait" value="1"<?php if ( $nowait == "1" ){ echo " checked";}?>> 排除過期</label>
                    </span>
                    <span class="span-group">
                        <input name="keyword" id="keyword" class="form-control" type="text" placeholder="姓名/編號" value="<?php echo $keyword;?>">
                        <input type="submit" value="送出" class="btn btn-default">
                    </span>
                </div>
                <input type="hidden" name="vst" id="vst">
            </form>
            <span>
                <strong style="background-color: yellow; color:brown">※排序欄位：發起時間(由遠到近)。</strong>
            </span>
            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr>
                            <th width="6%" style="text-align: center;">系統編號</th>
                            <th width="8%">類型</th>
                            <th width="13%">發起日期</th>
                            <th width="22%">排約人</th>
                            <th>排約對象</th>
                            <th width="6%" style="text-align: center;">約會會館</th>
                            <th width="12%">約會時間</th>
                            <th width="8%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ( count($result_list) == 0 ){?>
                            <tr><td colspan="10" height="200">目前沒有資料</td></tr>
                        <?php }else{
                            foreach($result_list as $re_list){
                                switch ( $re_list["types"] ){
                                    case "fb":
                                        $tt = "FB約會";
                                        break;
                                    case "line":
                                        $tt = "LINE約會";
                                        break;
                                    default:
                                        $tt = "會館約會";
                                        break;
                                }
                                
                                //判斷會員有效天數(排約人)
                                $SQL = "Select web_level, web_endtime from member_data where mem_num='".$re_list["mnum"]."'";
                                $rs = $SPConn->prepare($SQL);
                                $rs->execute();
                                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                foreach($result as $re);
                                if ( count($result) > 0 ){
  			                        $mmsg = "　<b><span style='color: #b38929;'>".num_lv($re["web_level"])."</span></b>";
                                    if ( chkDate($re["web_endtime"]) ){
                                        $date1 = date_create($re["web_endtime"]);
                                        $date2 = date_create(date("Y-m-d"));
                                        $diff = date_diff($date2,$date1);
                                        $web_time_diff = $diff->format("%R%a");
          	                            if ( $web_time_diff > 0 ){
                                            $mmsg = $mmsg."&nbsp;<span style='background-color:green; color:white;'>".str_replace("+","",$web_time_diff)."天";
                                        }else{
                                            $mmsg = $mmsg."&nbsp;<span style='background-color:red; color:white;'>已過期</span>";
                                        }
                                    }
                                }
                                //判斷會員有效天數(被排約人)
                                $SQL = "Select web_level, web_endtime from member_data where mem_num='".$re_list["tnum"]."'";
                                $rs = $SPConn->prepare($SQL);
                                $rs->execute();
                                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                foreach($result as $re);
                                if ( count($result) > 0 ){
                                    $tmsg = "　<b><span style='color:#1d7ad7;'>".num_lv($re["web_level"])."</span></b>";
                                    if ( chkDate($re["web_endtime"]) ){
                                        $date1 = date_create($re["web_endtime"]);
                                        $date2 = date_create(date("Y-m-d"));
                                        $diff = date_diff($date2,$date1);
                                        $web_time_diff = $diff->format("%R%a");
                                        if ( $web_time_diff > 0 ){
                                            $tmsg = $tmsg."&nbsp;<span style='background-color:green; color:white;'>".str_replace("+","",$web_time_diff)."天";
                                        }else{
                                            $tmsg = $tmsg."&nbsp;<span style='background-color:red; color:white;'>已過期</span>";
                                        }
                                    }
                                } ?>
                                <tr>
                                    <td align="center"><?php echo $re_list["auton"];?></td>
                                    <td><?php echo $tt;?></td>
                                    <td><?php echo changeDate($re_list["times"]);?></td>
                                    <td>
                                        <?php
								        if ( $re_list["mbranch"] == $_SESSION["branch"] || $_SESSION["MM_UserAuthorization"] == "admin" ){
								            echo "<a href='ad_mem_detail.php?mem_num=".$re_list["mnum"]."' target='_blank'>";
								            echo $re_list["mbranch"]." - ".$re_list["mname"];
                                            echo "</a>";
                                        }else{
							                echo $re_list["mbranch"]." - ".$re_list["mname"];
							            }?>&nbsp;&nbsp;<?php echo $mmsg;?>
                                    </td>
							        <td>
                                        <?php
								        if ( $re_list["tbranch"] == $_SESSION["branch"] || $re_list["mbranch"] == $_SESSION["branch"] || $_SESSION["MM_UserAuthorization"] == "admin" ){
								            echo "<a href='ad_mem_detail.php?mem_num=".$re_list["tnum"]."' target='_blank'>";
								            echo $re_list["tbranch"]." - ".$re_list["tname"];
								            echo "</a>";
                                        }else{
							                echo $re_list["tbranch"]." - ".$re_list["tname"];
                                        } ?>&nbsp;&nbsp;<?php echo $tmsg;?>
                                    </td>
							        <td align="center"><?php echo $re_list["datebranch"];?></td>
							        <td>
                                        <?php
								        echo strtotime($re_list["datetime_real"]);
								        if ( $re_list["statstime2"] != "" && $re_list["stats"] == 8 ){
									        echo DATE_EN($re_list["statstime2"],5)." 同意";
                                        }?>
                                    </td>
							        <td>
								        <?php
								        switch ( $re_list["stats"] ){
									        case "0":
                                                //$date1 = date_create($re["web_endtime"]+15);
                                                $date1 = date_create(date("Y-m-d", strtotime ("+15 day", $re["web_endtime"])));                                                
                                                $date2 = date_create(date("Y-m-d"));
                                                $diff = date_diff($date2,$date1);
                                                $waittime = $diff->format("%R%a");
									            //waittime = datediff("d", now(), dateadd("d", 15, rs("times")))
									            if ( $waittime >= 0 ){
									                echo "邀約中-餘 ".$waittime." 天";
                                                }else{
								                    echo "<span style='color:#878787'>邀約中-過期</span>";
                                                }
                                                break;
									        case "1":
									            echo "<font color='red'>婉拒邀約</font>";
                                                break;
									        case "2":
									            if ( $re_list["types"] == "branch" ){
									                switch ( $re_list["datetime_stat"] ){
									  	                case "0":
									  	                    echo "<font color='green'>選擇時間</font>";
                                                            break;
                                                        case "1":
									  	                    echo "<font color='green'>時間重擇</font>";
                                                            break;
									  	                case "2":
									  	                    echo "<font color='green'>秘書聯絡</font>";
                                                            break;
									  	                case "3":
									  	                    echo "<font color='green'>完成約會</font>";
                                                            break;
                                                    }									
                                                }else{
									                echo "<font color='blue'>完成約會</font>";
                                                }
                                                break;
									        case "3":
									            if ( $re_list["types"] == "branch" ){
									                switch ( $re_list["datetime_stat"] ){
									  	                case "0":
									  	                    echo "<font color='green'>選擇時間</font>";
                                                            break;
									  	                case "1":
									  	                    echo "<font color='green'>時間重擇</font>";
                                                            break;
									  	                case "2":
									  	                    echo "<font color='green'>等待約會</font>";
                                                            break;
									  	                case "3":
									  	                    echo "<font color='green'>完成約會</font>";
                                                            break;
                                                    }
                                                }else{
									                echo "<font color='blue'>完成約會</font>";
                                                }
                                                break;
									        case "4":
									            echo "<font color='red'>約會未成功</font>";
                                                break;
									        case "8":
									            echo "<font color='blue'>完成約會</font>";
                                                break;
                                        }?>
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
    </div>
</section>

<?php require_once("./include/_bottom.php");?>

<script language="JavaScript">
    function full_btn(vst_val){
        document.getElementById("vst").value = vst_val;
        searchform.submit();
    }
</script>