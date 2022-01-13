<?php
/***************************************/
//檔案名稱：ad_mem_login.php
//後台對應位置：春天網站功能 > 網站照片審核
//改版日期：2022.1.11
//改版設計人員：Jack
//改版程式人員：Queena
/***************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

$auth_limit = 7;
require_once("./include/_limit.php");
check_page_power("ad_mem_login");   //頁面權限
$default_sql_num = 500;
if ( $vst == "full" ){
    $subSQL1 = "*";
}else{
    $subSQL1 = "top ".$default_sql_num." *";
}

$branch2 = SqlFilter($_REQUEST["branch2"],"tab");
if ( $branch2 == "1" ){
    $subSQL2 = "','+mem_branch2+',' Like '%,".$_SESSION["branch"].",%'";
    $tshow = "跨區會員";
}else{
	$subSQL2 = " And (mem_branch= '".$_SESSION["branch"]."' or ','+mem_branch2+',' Like '%,".$_SESSION["branch"].",%')";
}

if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
    if ( $branch2 == "1" ){
        $subSQL2 = " And mem_branch2 <> ''";
    }else{
      	$subSQL2 = "";
    }
    //sqls = "SELECT "&sqlv&" FROM member_data as dba WHERE mem_level = 'mem' and last_login <> ''"
	//sqls2 = "SELECT "&sqlv2&" as total_size FROM member_data as dba WHERE mem_level = 'mem' and last_login <> ''"&b2sql
}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ) {
    $subSQL2 = $subSQL2;
}elseif ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "manager" ) {
    $subSQL2 = "And UPPER(mem_single) = '".strtoupper($_SESSION["MM_username"])."'";
	//sqls2 = "SELECT "&sqlv2&" as total_size FROM member_data as dba Where mem_level = 'mem' and last_login <> '' and UPPER(mem_single) = '"&Ucase(Session("MM_username"))&"'"
}elseif ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "manager" ) {
    $subSQL1 = " top 10 * ";
    //sqls = "SELECT top 10 * FROM member_data as dba Where mem_level = 'mem' and last_login <> ''"&b2sql
    //sqls2 = "SELECT count(mem_auto) as total_size FROM member_data as dba Where mem_level = 'mem' and last_login <> ''"&b2sql
    $default_sql_num = "10";
}

$s1 = SqlFilter($_REQUEST["s1"],"tab");
$s2 = SqlFilter($_REQUEST["s2"],"tab");
$s3 = SqlFilter($_REQUEST["s3"],"tab");
$s4 = SqlFilter($_REQUEST["s4"],"tab");
$s7 = SqlFilter($_REQUEST["s7"],"tab");
$s8 = SqlFilter($_REQUEST["s8"],"tab");
$s10 = SqlFilter($_REQUEST["s10"],"tab");
$s11 = SqlFilter($_REQUEST["s11"],"tab");
$m1 = SqlFilter($_REQUEST["m1"],"tab");
$d1 = SqlFilter($_REQUEST["d1"],"tab");
$s21 = SqlFilter($_REQUEST["s21"],"tab");
$s22 = SqlFilter($_REQUEST["s22"],"tab");
$s23 = SqlFilter($_REQUEST["s23"],"tab");
$s26 = SqlFilter($_REQUEST["s26"],"tab");
$s27 = SqlFilter($_REQUEST["s27"],"tab");
$a1 = SqlFilter($_REQUEST["a1"],"tab");
$s97 = SqlFilter($_REQUEST["s97"],"tab");
$s77 = SqlFilter($_REQUEST["s77"],"tab");
//會員身份證號
if ( $s1 != "" ){
    $subSQL3 = $subSQL3 . " And mem_username Like '%" . str_Replace("'", "''", $s1) . "%'";
    $keyword = $s1;
}
//會員手機號碼
if ( $s2 != "" ){
    $cs2 = reset_number($s2);
    $subSQL3 = $subSQL3 . " And mem_mobile Like '%".$cs2. "%'";
    $keyword = $s2;
}
//會員姓名
if ( $s3 != "" ){
    $subSQL3 = $subSQL3 . " And mem_name Like N'%" . str_Replace("'", "''", $s3) . "%'";
    $keyword = $s3;
}
//會員編號
if ( $s4 != "" ){
    $subSQL3 = $subSQL3 . " And mem_num Like '%" . str_Replace("'", "''", $s4) . "%'";
    $keyword = $s4;
}
//受理祕書姓名
if ( $s7 != "" ){
    $subSQL3 = $subSQL3 . " And UPPER(mem_single) Like '%" . str_Replace("'", "''", strtoupper($s7)) . "%'";
}
//資料來源
if ( $s8 != "" ){
    $subSQL3 = $subSQL3 . " And mem_come Like '%" . str_Replace("'", "''", $s8) . "%'";
}
//會員學歷
if ( $s10 != "" ){
    $subSQL3 = $subSQL3 . " And mem_school Like '%" . str_Replace("'", "''", $s10) . "%'";
}
//受理會館
if ( $s11 != "" ){
    $subSQL3 = $subSQL3 . " And mem_branch Like '%" . str_Replace("'", "''", $s11) . "%'";
}
//會員生日月份
if ( $m1 != "" ){
    $subSQL3 = $subSQL3 . " And mem_bm Like '%" . str_Replace("'", "''", $m1) . "%'";
}
//會員生日日期
if ( $d1 != "" ){
    $subSQL3 = $subSQL3 . " And mem_bd Like '%" . str_Replace("'", "''", $d1) . "%'";
}
//會員性別
if ( $s21 != "" ){
    $subSQL3 = $subSQL3 . " And mem_sex Like '%" . str_Replace("'", "''", $s21) . "%'";
}
//會員入會年份
if ( $s22 != "" ){
    $subSQL3 = $subSQL3 . " And mem_jy between '".$s22."' And '".$s22."'";
}
//會員入會月份
if ( $s23 != "" && $s25 != "" ){
    $subSQL3 = $subSQL3 . " And mem_jm between '".$s23."' And '".$s25."'";
}
//會員是否待服務
if ( $s26 != "" ){
    $subSQL3 = $subSQL3 . " And mem_s1 Like '%" . str_Replace("'", "''", $s26) . "%'";
}
//會員出生年份
if ( $s27 != "" ){
    $subSQL3 = $subSQL3 . " And mem_by Like '%" . str_Replace("'", "''", $s27) . "%'";
}
//會員狀況
if ( $a1 != "" ){
    $subSQL3 = $subSQL3 . " And all_type Like '%" . str_Replace("'", "''", $a1) . "%'";
}
//自訂來源
if ( $s97 != "" ){
    $subSQL3 = $subSQL3 . " And mem_cc = '" . str_Replace("'", "''", $s97) . "'";
}
//會員最後登入時間
if ( $s77 != "" ){
    if ( $s77 == 12 ){
        $subSQL3 = $subSQL3 . " And datediff(m, last_login, getdate()) >= 12";
        $s77_txt = "12個月以上";
    }else{
        $subSQL3 = $subSQL3 . " And datediff(m, last_login, getdate()) < ".(int)($s77);
        $s77_txt = "近".$s77."個月";
    }
}
if ( $tshow == "" ){
	$tshow = "所有會員";
}

$subSQL4 = " Order By last_login Desc";

//取得總筆數
$SQL = "Select count(mem_auto) As total_size From member_data as dba Where mem_level = 'mem' and last_login <> ''".$subSQL2.$subSQL3;
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);
if ( count($result) == 0 || $re["total_size"] == 0 ) {
    $total_size = 0;
}else{
    if ( $re["total_size"] > 500 ){ $total_size = 500; }
    $total_size = $re["total_size"];
}

if ( $_SESSION["MM_UserAuthorization"] == "pay" ){ $total_size = 10; }

	
//查看清單連結文字
if ( SqlFilter($_REQUEST["vst"],"tab") == "full" ){
    $count_href = "　<a href='?vst=n'>[查看前五百筆]</a>";
}else{
    if ( $total_size > 500 ){ $total_size = 500;}
    $count_href = "　<a href='?vst=full'>[查看完整清單]</a>";
}

//取得分頁資料
$tPageSize = 50; //每頁幾筆
$tPage = 0; //目前頁數
if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
if ( $tPageSize*$tPage < $total_size ){
    $page2 = 50;
}else{
    $page2 = (50-(($tPageSize*$tPage)-$total_size));
}

//分頁語法
$SQL_list  = "Select Top ".$tPageSize." * ";
$SQL_list .= "From (Select row_number() ";
$SQL_list .= "over(".$subSQL4.") As rownumber,mem_cc,mem_come,mem_num,mem_name,mem_sex,mem_by,mem_bm,mem_bd,mem_school,last_login,mem_branch,love_single,call_branch,mem_come3,";
$SQL_list .= "mem_come4,mem_photo,web_startime,web_endtime,mem_auto,mem_username,all_type,all_note,mem_branch2,web_level,mem_mobile,mem_single,call_single ";
$SQL_list .= "From member_data as dba Where mem_level = 'mem' and last_login <> ''".$subSQL2.$subSQL3." ) temp_row ";
$SQL_list .= "Where rownumber > ".($tPageSize*$tPage)." Order By rownumber";
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
            <li class="active">會員登入狀態</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong><?php echo $tshow;?>登入狀態 - 數量：<?php echo $total_size.$count_href;?></strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form id="searchform" action="ad_mem_login.php?vst=full&sear=1" method="post" target="_self" class="form-inline" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type">
                            <option value="s2">手機</option>
                            <option value="s1"<?php if ( $s1 != "" ){?> selected<?php }?>>身分證字號</option>
                            <option value="s3"<?php if ( $s2 != "" ){?> selected<?php }?>>姓名</option>
                            <option value="s4"<?php if ( $s4 != "" ){?> selected<?php }?>>編號</option>
                        </select>
                        <input name="keyword" id="keyword" class="form-control" type="text" value="<?php echo $keyword;?>">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>
                <p style="clear:both">
                    <?php if ( $s77 != "" ){?>
                        <span class="text-status">資料範圍：<?php echo $s77_txt;?></span>&nbsp;▶&nbsp;
                    <?php }?>
                    <a class="btn btn-success<?php if ( $s77 == 1 ){?> btn-active<?php }?>" href="?s77=1">近一個月</a>
                    <a class="btn btn-success<?php if ( $s77 == 2 ){?> btn-active<?php }?>" href="?s77=2">近二個月</a>
                    <a class="btn btn-success<?php if ( $s77 == 3 ){?> btn-active<?php }?>" href="?s77=3">近三個月</a>
                    <a class="btn btn-success<?php if ( $s77 == 4 ){?> btn-active<?php }?>" href="?s77=4">近四個月</a>
                    <a class="btn btn-success<?php if ( $s77 == 5 ){?> btn-active<?php }?>" href="?s77=5">近五個月</a>
                    <a class="btn btn-success<?php if ( $s77 == 6 ){?> btn-active<?php }?>" href="?s77=6">近六個月</a>
                    <a class="btn btn-success<?php if ( $s77 == 7 ){?> btn-active<?php }?>" href="?s77=7">近七個月</a>
                    <a class="btn btn-success<?php if ( $s77 == 8 ){?> btn-active<?php }?>" href="?s77=8">近八個月</a>
                    <a class="btn btn-success<?php if ( $s77 == 9 ){?> btn-active<?php }?>" href="?s77=9">近九個月</a>
                    <a class="btn btn-success<?php if ( $s77 == 10 ){?> btn-active<?php }?>" href="?s77=10">近十個月</a>
                    <a class="btn btn-success<?php if ( $s77 == 11 ){?> btn-active<?php }?>" href="?s77=11">近十一個月</a>
                    <a class="btn btn-success<?php if ( $s77 == 12 ){?> btn-active<?php }?>" href="?s77=12">十二個月以上</a>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr>
                            <th width=180>資料來源</th>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>生日</th>
                            <th>學歷</th>
                            <th>登入時間</th>
                            <th width=180>秘書</th>
                            <th width=60>照片</th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if ( count($result_list) == 0 ){
                            echo "<tr><td colspan='10' height='200'>目前沒有資料</td></tr>";
                        }else{
                            foreach($result_list as $re_list){
                                if ( $re_list["mem_cc"] != "" ){
                                    $mem_cc = $re_list["mem_cc"];
                                    if ( substr_count($mem_cc, "sale-") > 0 ){
                                        $mem_cc_array = explode("sale-", $mem_cc);
                                        $mem_cc = "推廣：".SingleName($mem_cc_array[1],"auto");
                                    }
                                    $mem_cc = " [".$mem_cc."]";
                                }else{
                                    $mem_cc = "";
                                }?>
                                <tr>
                                    <td class="center"><?php echo $re_list["mem_come"];?><?php echo $mem_cc;?></td>
                                    <td><?php echo $re_list["mem_num"];?></td>
                                    <td class="center"><a href="ad_mem_detail.php?mem_num=<?php echo $re_list["mem_num"];?>" target="_blank"><?php echo $re_list["mem_name"];?></a>
                                        <div style="float:right"><?php echo $supay;?></div>
                                    </td>
                                    <td class="center"><?php echo $re_list["mem_sex"];?></td>
                                    <td class="center">
                                        <?php echo $re_list["mem_by"]." / ".$re_list["mem_bm"]." / ".$re_list["mem_bd"];?>
                                        <?php if ( $re_list["mem_by"] != "" ){ echo "　　".(date("Y")-date("Y",strtotime($re_list["mem_by"])))." 歲";}?></td>
                                    <td class="center"><?php echo $re_list["mem_school"];?></td>
                                    <td class="center">
                                    <?php
                                    if ( chkDate($re_list["last_login"] ) ){
                                        $times = strtotime($re_list["last_login"]);
                                        $today = strtotime(date("Y-m-d H:i:s"));
                                        $timesv=($today-$times) /60;
                                        $timesr = round($timesv) ." 分前";
                                        if ( $timesv > 60 ){
                                            $timesv = $timesv / 60;
                                            $timesr = round($timesv) ." 小時前";
                                            if ( $timesv > 24 ){
                                                $timesv = $timesv / 24;
                                                $timesr = round($timesv) ." 天前";
                                                if ( $timesv >= 31 ){
                                                    $timesv = $timesv / 31;
                                                    $timesr = "<font color='green'>".round($timesv) ." 個月前</font>";
                                                    if ( $timesv >= 8 ){
                                                        $timesr = "<font color='red'>8 個月前</font>";
                                                    }
                                                }
                                            }
                                        }
                                    }else{
                                        $timesr = "<font color='red'>8 個月前</font>";
                                    }
                                    echo changeDate($re_list["last_login"])."&nbsp&nbsp&nbsp".$timesr;
                                    ?>	
                                    </td>
                                    <?php
                                    if ( $re_list["mem_branch"] != "" ){
                                        $mem_single = "<font color='green'>受理：</font>".$re_list["mem_branch"]. " - ".SingleName($re_list["mem_single"],"normal");
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

                                    if ( $re_list["mem_come3"] != "" ){
                                        $sup_single = "<br><font color='green'>推薦：</font>".$re_list["mem_come3"]." - ".SingleName($re_list["mem_come4"],"normal");
                                    }else{
                                        $sup_single = "";
                                    }
                                    ?>
                                    <td class="center"><?php echo $mem_single.$love_single.$call_single.$sup_single;?></td>
                                    <td class="center">
                                        <?php if ( ($re_list["mem_sex"] == "男" && $re_list["mem_photo"] != "boy.jpg") || ($re_list["mem_sex"] == "女" && $re_list["mem_photo"] != "girl.jpg") ){?>
                                            <a href="../photo/<?php echo $re_list["mem_photo"];?>?t=<?php echo (int)(rand()*9999);?>" target="_blank" class="fancybox">有</a>
                                        <?php }else{?>
                                            無
                                        <?php }?>
                                    </td>
                                    <td class="center">
                                        <div class="btn-group">
                                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                            <ul class="dropdown-menu pull-right">
                                                <?php
                                                $reports = get_report_num($re_list["mem_mobile"]);
                                                if ( substr_count($reports, "|+|") > 0 ){
                                                    $reports_array = explode("|+|", $reports);
                                                    $report = $reports_array[0];
                                                    $report_text = $reports_array[1];
                                                }else{
                                                    $report = 0;
                                                    $report_text = "無";
                                                }
                                                ?>
                                                <li><a href="ad_mem_detail.php?mem_num=<?php echo $re_list["mem_num"];?>" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                                <li><a href="javascript:Mars_popup('ad_report.php?k_id=<?php echo $re_list["mem_auto"];?>&lu=<?php echo $re_list["mem_username"];?>&ty=member','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(<?php echo $report;?>)</a></li>
                                                <?php if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "pay" ){ ?>
                                                    <li><a href="ad_mem_fix.php?mem_num=<?php echo $re_list["mem_num"];?>" target="_blank"><i class="icon-file"></i> 修改</a></li>
                                                <?php }?>
                                            </ul>
                                        </div>								
                                    </td>
                                </tr>  

                                <tr>
                                    <td>
                                        <?php
                                        $wbl = "";
                                        switch ($re_list["web_level"]){
                                            case 1:
                                                $wbl = "資料認證會員";
                                                break;
                                            case 2:
                                                $wbl = "真人認證會員";
                                                break;
                                            case 3:
                                                $wbl = "璀璨會員-一年期";
                                                break;
                                            case 4:
                                                $wbl = "璀璨VIP會員-一年期";
                                                break;
                                            case 5:
                                                $wbl = "璀璨會員-二年期";
                                                break;
                                            case 6:
                                                $wbl = "璀璨VIP會員-二年期";
                                                break;
                                        }
                                        if ( $wbl != "" ){ echo "<span style='color:blue'>".$wbl."(".Date_EN($re_list["web_startime"],1)."~".Date_EN($re_list["web_endtime"],1).")</span>";}
                                        ?>
                                    </td>
                                    <td colspan="6" style="BORDER-bottom: #666666 1px dotted">
                                        (<a href="javascript:Mars_popup('ad_report.php?k_id=<?php echo $re_list["mem_auto"];?>&lu=<?php echo $re_list["mem_username"];?>&ty=member','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(<?php echo $report;?>)</a>
                                        處理情形：<font color="#FF0000" size="2"><?php echo $re_list["all_type"];?></font>) 內容：<?php echo $report_text;?>　　
                                        <?php if ( $re_list["all_note"] != "" ){?>
                                            <br><font color="blue">舊：</font><?php echo $re_list["all_note"];?>
                                        <?php }?>
                                    </td>
                                    <td colspan="3">
                                    <?php
                                    if ( $re_list["mem_branch2"] != "" ){
                                        echo "<font color='green'>跨區：</font>".$re_list["mem_branch2"];
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
        if (!$("#keyword_type").val()) {
            alert("請選擇要搜尋的類型。");
            $("#keyword_type").focus();
            return false;
        }
        if (!$("#keyword").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
        }
        location.href = "ad_mem_login.php?sear=1&vst=&s99=&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>