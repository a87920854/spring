<?php
/*****************************************/
//檔案名稱：ad_singleparty_waitdateing.php
//後台對應位置：約會專家功能/約會升級審核
//改版日期：2022.02.07
//改版設計人員：Jack
//改版程式人員：Queena
/*****************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//麵包屑
$unitprocess = $m_home.$icon."約會專家功能".$icon."會員升級審核";

//接收值
$times1 = SqlFilter($_REQUEST["times1"],"tab");
$times2 = SqlFilter($_REQUEST["times2"],"tab");
$branch = SqlFilter($_REQUEST["branch"],"tab");
$single = SqlFilter($_REQUEST["single"],"tab");
$t = SqlFilter($_REQUEST["t"],"tab");
$vst = SqlFilter($_REQUEST["vst"],"tab");

//判斷日期
if ( $times1 != "" ){
    $acre_sign1 = $times1;
    if ( chkDate($acre_sign1) == false ){        
        call_alert("起始日期有誤。".$acre_sign1, 0, 0);
    }
}

if ( $times2 != "" ){
    $acre_sign2 = $times2;
    if ( chkDate($acre_sign2) == false ){        
        call_alert("結束日期有誤。".$acre_sign2, 0, 0);
    }
}

/*
default_sql_num = 500

If request("vst") = "full" Then
  sqlv = "*"
  sqlv2 = "count(auton)"
Else
  sqlv = "top "&default_sql_num&" *"
  sqlv2 = "count(auton)"
End If
*/

$selfix2 = 0;
//sqls = "SELECT "&sqlv&" FROM si_invite Where 1=1"
if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
    $subSQL1 = "1=1 ";
    $selfix2 = 1;
}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "pay" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
    $subSQL1 = "(mbranch= '".$_SESSION["branch"]."' or tbranch='".$_SESSION["branch"]."' or datebranch='".$_SESSION["branch"]."') ";
    $selfix2 = 1;
}elseif ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "manager" ){
    $subSQL1 = "(msingle= '".$_SESSION["MM_username"]."' or tsingle='".$_SESSION["MM_username"]."') ";
    $selfix2 = 1;
}else{
    call_alert("您沒有查看此頁的權限。",0,0);
}

//組合日期語法
if ( chkDate($acre_sign1) && chkDate($acre_sign2) ){
	$days=(strtotime($acre_sign2)-strtotime($acre_sign1))/86400;
    if ( $days < 0 ){
        call_alert("結束日期不能大於起始日期。", 0, 0);
    }
    $subSQL1 .= "And times Between '".$acre_sign1."' And '".$acre_sign2."' ";
}

//搜尋[會館]
if ( $branch != "" ){
    $subSQL1 .=  "And (mbranch Like '%".$branch."%' Or tbranch Like '%".$branch."%' Or datebranch Like '%".$branch."%') ";
}
//搜尋[祕書]
if ( $single != "" ){
    $subSQL1 .= "And (msingle Like '%".$single."%' Or tsingle Like '%".$single."%') ";
}

if ( $t == "1" ){
    $subSQL1 .= "And power_near = 2 ";
}else{
	$subSQL1 .= "And power_near=1 and stats = 0";
}

$subSQL2 = " Order By times Desc";

//取得總筆數
$SQL = "Select count(auton) As total_size From si_invite Where ".$subSQL1;
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
if ( $vst == "full" ){
    $count_href = "　<a href='?vst=n' class='btn btn-success'>查看前五百筆</a>";
}else{
    if ( $total_size > 500 ){ $total_size = 500;}
    $count_href = "　<a href='?vst=full' class='btn btn-success'>查看完整清單</a>";
}

//取得分頁資料
$tPageSize = 20; //每頁幾筆
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
$SQL_list .= "over(".$subSQL2.") As rownumber,mnum,tnum,types,mbranch,msingle,tbranch,tsingle,times,auton,power_near_note ";
$SQL_list .= "From si_invite Where ".$subSQL1." ) temp_row ";
$SQL_list .= "Where rownumber > ".($tPageSize*$tPage_list);
$rs_list = $SPConn->prepare($SQL_list);
$rs_list->execute();
$result_list = $rs_list->fetchAll(PDO::FETCH_ASSOC);

//列表title
$head_t = "未處理";
if ( $t == 1){ $head_t = "已處理";}
?>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <div class="m-crumb"><i class="fa fa-folder-open-o"></i><?php echo $unitprocess;?></div>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <h2 class="pageTitle">會員升級審核 》<?php echo $head_t;?> 》資料列表 [ <i style="color: #76192e;">共計 <?php echo $total_size."筆資料</i> ]"; if ( $total_size >= 500 ){ echo $count_href;}?></h2>
            <p>
                <?php if ( $t == "" ){?>
                    <a href="javascript:void(0);" class="btn btn-success btn-active" style="color:black" disabled>▶ 未處理</a>&nbsp;
                    <a href="ad_singleparty_waitdateing.php?t=1" class="btn btn-info">已處理</a>
                <?php }else{?>
                    <a href="ad_singleparty_waitdateing.php" class="btn btn-info">未處理</a>&nbsp;
                    <a href="javascript:void(0);" class="btn btn-info btn-active" style="color:black; cursor:not-allowed;" disabled>▶ 已處理</a>
                <?php }?>
            </p>
            
            <form name="form1" method="post" action="?vst=full">
                <div class="m-search-bar">
                    <span class="span-group">
                        排約日期：
                        <input type="text" class="datepicker" autocomplete="off" name="times1" value="<?php echo $vacre_sign1;?>" autocomplete="off">
                        ～ 
                        <input type="text" class="datepicker" autocomplete="off" name="times2" value="<?php echo $vacre_sign2;?>" autocomplete="off">
                    </span>
                    <?php
                    if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
                        //會館資料
                        $SQL = "Select * From branch_data Where auto_no<>10 Order By admin_Sort";
                        $rs = $SPConn->prepare($SQL);
                        $rs->execute();
                        $result = $rs->fetchAll(PDO::FETCH_ASSOC);?>
                        <span class="span-group">
                            <select name="branch" id="branch">
                                <option value="">請選擇會館</option>
                                <?php
                                    foreach($result as $re){
                                        echo "<option value='".$re["admin_name"]."'";
                                        if ( $branch == $re["admin_name"] ) { echo " selected";}
                                        echo ">".$re["admin_name"]."</option>";
                                    }
                                ?>
                            </select>
                            <select name="single" id="single">
                                <option value="">請選擇秘書</option>
                                <?php
                                $SQL = "Select p_user, p_name, p_other_name, lastlogintime From personnel_data Where p_branch = '".$branch."' And p_work=1 Order By p_desc2 Desc, lastlogintime Desc";
                                $rs = $SPConn->prepare($SQL);
                                $rs->execute();
                                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                foreach($result as $re){
                                    echo "<option value='".$re["p_other_name"]."'";
                                    if ( $single == $re["p_user"] ){ echo " selected";}
                                    echo ">".$re["p_other_name"]."</option>";
                                }
                                ?>
                            </select>
                        </span>
                    <?php }?>
                    <span class="span-group">
                        <input type="submit" value="送出" class="btn btn-default">
                    </span>
                    <input type="hidden" name="vst" id="vst" value="<?php echo $vst;?>">
                    <input type="hidden" name="t" id="t" value="<?php echo $t;?>">
                </div>
            </form>
        </div>

        <div class="panel-body">
            <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                <thead>
                    <tr style="background-color:#FFDA96">
                        <th width="6%" style="text-align: center;">類型</th>
                        <th width="22%">發起人</th>
                        <th width="10%" style="text-align: center;">發起人會館</th>
                        <th width="22%">被邀約人</th>
                        <th width="10%" style="text-align: center;">被邀約會館</th>
                        <th>詳細時間</th>
                        <th width="6%">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ( count($result_list) == 0 ){?>
                        <tr><td colspan="8" height="200">目前沒有資料</td></tr>
                    <?php }else{
                        foreach($result_list as $re_list){
                            $SQL = "Select mem_name,web_level, web_startime, web_endtime From member_data Where mem_num='".$re_list["mnum"]."'";
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result as $re);
                            if ( count($result) > 0 ){
                                $mem_name = $re["mem_name"];
                                $mweb_level = $re["web_level"];
                                $mweb_startime = Date_EN($re["web_startime"],1);
                                $mweb_endtime = Date_EN($re["web_endtime"],1);
                            }
                            $SQL = "Select mem_name,web_level, web_startime, web_endtime From member_data Where mem_num='".$re_list["tnum"]."'";
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            foreach($result as $re);
                            if ( count($result) > 0 ){
                                $mem_name2 = $re["mem_name"];
                                $tweb_level = $re["web_level"];
                                $tweb_startime = Date_EN($re["web_startime"],1);
                                $tweb_endtime = Date_EN($re["web_endtime"],1);
                            }
                            $myweb_diff = -1;
                            if ( chkDate($mweb_endtime) ){
                                $myweb_diff=(strtotime(date("Y-d-m"))-strtotime($mweb_endtime))/86400;
                            }
                            $tweb_diff = -1;
                            if ( chkDate($tweb_endtime) ){
                                $tweb_diff=(strtotime(date("Y-d-m"))-strtotime($tweb_endtime))/86400;
                            }
                            $types = $re_list["types"];
                            switch ($types){
                                case "fb":
                                    $types = "Facebook";
                                    break;
                                case "line":
                                    $types = "LINE";
                                    break;
                                default:
                                    $types = "會館約會";
                                    break;
                            }?>
                            <tr>
                                <td align="center"><?php echo $types;?></td><span style="color: orangered;">
                                <td>
                                    <a href="ad_mem_detail.php?mem_num=<?php echo $re_list["mnum"];?>" target="_blank" style="color: green;"><strong><?php echo $mem_name;?></strong></a>
                                    <br><strong><span style="color: blue;"><?php echo num_lv($mweb_level);?></span></strong>
                                    <?php if ( $mweb_startime != "" || $mweb_endtime != "" ){?>
                                        &nbsp;[&nbsp;<?php echo $mweb_startime;?>~<?php echo $mweb_endtime;?>&nbsp;]
                                    <?php }?>
                                </td>
                                <td align="center"><?php echo $re_list["mbranch"];?> - <?php echo SingleName($re_list["msingle"],"normal");?></td>
                                <td>
                                    <a href="ad_mem_detail.php?mem_num=<?php echo $re_list["mnum"];?>" target="_blank" style="color: red;"><strong><?php echo $mem_name2;?></strong></a>
                                    <br><strong><span style="color: blue;"><?php echo num_lv($tweb_level);?></span></strong>
                                    <?php if ( $tweb_startime != "" || $tweb_endtime != "" ){?>
                                        &nbsp;[&nbsp;<?php echo $tweb_startime;?>~<?php echo $tweb_endtime;?>&nbsp;]
                                    <?php }?>
                                </td>
                                <td align="center"><?php echo $re_list["tbranch"];?> - <?php echo SingleName($re_list["tsingle"],"normal");?></td>
                                <td align="center">
                                    <?php
                                    echo $mem_name."於<span style='color: orangered;'> ".Date_EN($re_list["times"],5)." </span>發出邀請";
                                    if ( $re_list["statstime2"] != "" && chkDate($re_list["statstime2"]) ){
                                        if ( $re_list["stats"] == 1 ){
                                            echo "<br>".$mem_name2."於 ".chtime($re_list["statstime2"])." 拒絕邀請";
                                        }else{
                                            echo "<br>".$mem_name2."於 ".chtime($re_list["statstime2"])." 同意邀請";
                                        }
                                    }
                                    ?>
                                </td>
                                <td align="center">
    	                            <?php
                                    if ( $t == "1" ){
    		                            echo $re_list["power_near_note"];
                                    }elseif ( $selfix2 == 1 ){ ?>
    	                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=<?php echo $re_list["auton"];?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>
    	                            <?php }?>
                                </td>
                            </tr>
                        <?php }?>
                    <?php }?>
                </tbody>
            </table>
        </div>
        <?php require_once("./include/_page.php"); ?>
    </div>
    <!--/span-->
</section>
<!-- /MIDDLE -->

<?php require_once("./include/_bottom.php"); ?>