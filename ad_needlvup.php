<?php
/***************************************/
//檔案名稱：ad_needlvup.php
//後台對應位置：春天網站功能 > 會員升級意願
//改版日期：2022.1.13
//改版設計人員：Jack
//改版程式人員：Queena
/***************************************/
require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

$auth_limit = 7;
require_once("./include/_limit.php");
check_page_power("ad_needlvup");   //頁面權限

//傳遞值
$st = SqlFilter($_REQUEST["st"],"tab");
$a = SqlFilter($_REQUEST["a"],"tab");
$s99 = SqlFilter($_REQUEST["s99"],"tab");
$s1 = SqlFilter($_REQUEST["s1"],"tab");
$keyword_type = SqlFilter($_REQUEST["keyword_type"],"tab");
$keyword = SqlFilter($_REQUEST["keyword"],"tab");

//刪除
if ( $st == "del" ){
    $SQL_d = "Delete From needlvup Where auton=".$a;
    $rs_d = $SPConn->prepare($SQL_d);
    $rs_d->execute();    
	reURL("win_close.php?m=刪除中....");
}

$default_sql_num = 500;

//已處理/未處理
if ( $s99 == "1" ){
    $subSQL2 = " fix = 1";
    $types = "已處理";
}else{
    $subSQL2 = " fix = 0";
    $types = "未處理";
}

//SQL語法
if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
    $subSQL3 = "";
}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "pay" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ) {
    $subSQL3 = $subSQL2." And mem_branch='".$_SESSION["branch"]."'";
}elseif ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "manager" ) {    
    $subSQL3 = $subSQL2." And UPPER(mem_single) = '".strtoupper($_SESSION["MM_username"])."'";
}

if ( $keyword_type == "s2" ){
    $cs2 = reset_number($keyword);
    $subSQL3 = $subSQL3 . " And mem_mobile Like '%".$cs2."%'";
}

if ( $keyword_type == "s3" ){
    $subSQL3 = $subSQL3 . " And mem_name Like N'%" . str_Replace("'", "''", $keyword) . "%'";
}

if ( $keyword_type == "s4" ){
    $subSQL3 = $subSQL3 . " And mem_num Like '%" . str_Replace("'", "''", $keyword) . "%'";
}

$subSQL3 = $subSQL3 . " And (up_come Is Null Or not up_come Like '%約會專家%')";
$subSQL4 = "Order By auton Desc";

//取得總筆數
$SQL = "Select count(auton) As total_size From needlvup Where".$subSQL2.$subSQL3;
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result=$rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);
if ( count($result) == 0 || $re["total_size"] == 0 ) {
    $total_size = 0;
}else{
    $total_size = $re["total_size"];
}

if ( $_SESSION["MM_UserAuthorization"] == "pay" ){
    $total_size = 10;
}

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
$SQL_list .= "over(".$subSQL4.") As rownumber,";
$SQL_list .= "mem_come,mem_num,mem_name,mem_sex,mem_mobile,mem_by,mem_bm,mem_bd,mem_school,web_startime,web_endtime,web_level,times,mem_single,mem_branch,auton,msg  ";
$SQL_list .= "From needlvup Where".$subSQL2.$subSQL3." ) temp_row ";
$SQL_list .= "Where rownumber > ".($tPageSize*$tPage)." Order By rownumber";
$rs_list = $SPConn->prepare($SQL_list);
$rs_list->execute();
$result_list = $rs_list->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">會員升級意願</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員升級意願 - <?php echo $types;?> 數量：<?php echo $total_size.$count_href;?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <?php if ( $s99 == "1" ){ ?>
                        <a href="ad_needlvup.php" class="btn btn-warning pull-left margin-right-10">切換未處理</a>
                    <?php }else{?>
                        <a href="?s99=1" class="btn btn-danger pull-left margin-right-10">切換已處理</a>
                    <?php }?>
                    <form id="searchform" action="ad_needlvup.php?vst=full&sear=1" method="post" class="form-inline" target="_self">
                        <select name="keyword_type" id="keyword_type" style="width:100px;">
                            <option value="s2">手機</option>
                            <option value="s3"<?php if ( $keyword_type == "s3" ){?> selected<?php }?>>姓名</option>
                            <option value="s4"<?php if ( $keyword_type == "s4" ){?> selected<?php }?>>編號</option>
                        </select>
                        <input name="keyword" id="keyword" class="form-control" type="text" value="<?php echo $keyword;?>">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                        <thead>
                            <tr>
                                <th width="60">升級來源</th>
                                <th width="180">資料來源</th>
                                <th>編號</th>
                                <th>姓名</th>
                                <th>性別</th>
                                <th>電話</th>
                                <th>生日</th>
                                <th>學歷</th>
                                <th>會員權益</th>
                                <th>秘書</th>
                                <th>處理結果</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ( count($result_list) == 0 ){
                                echo "<tr><td colspan='10' height='200'>目前沒有資料</td></tr>";
                            }else{
                                foreach($result_list as $re_list){
                                    if ( $re_list["up_come"] != "" ){
						                $up_come = $re_list["up_come"];
                                    }else{
						                $up_come = "春天會館";
                                    }?>
                                    <tr>
								        <td class="center"><b><?php echo $up_come;?></b></td>
                                        <td class="center"><?php echo $re_list["mem_come"];?></td>
                                        <td><?php echo $re_list["mem_num"];?></td>
                                        <td class="center"><a href="ad_mem_detail.asp?mem_num=<?php echo $re_list["mem_num"];?>" target="_blank"><?php echo $re_list["mem_name"];?></a></td>
                                        <td class="center"><?php echo $re_list["mem_sex"];?></td>
                                        <td class="center"><?php echo $re_list["mem_mobile"];?></td>
                                        <td class="center">
                                            <?php echo $re_list["mem_by"]."/".$re_list["mem_bm"]."/".$re_list["mem_bd"];?>
                                            <?php if ( $re_list["mem_by"] != "" ){ echo "　　".(date("Y")-date("Y",strtotime($re_list["mem_by"])))." 歲";}?>
                                        </td>
                                        <td class="center"><?php echo $re_list["mem_school"];?></td>
                                        <td class="center">
                                            <?php
                                            $wbl = "";
                                            $wbl2 = "";
                                            $wel_txt = "(".Date_EN($re_list["web_startime"],1)."~".Date_EN($re_list["web_endtime"],1).")";
                                            switch ($re_list["web_level"]){
                                                case 0:
                                                    $wel_txt = "(無)";
                                                    $wbl = "目前為網站會員";
                                                    $wbl2 = "<br>可升級資料認證會員,真人認證,璀璨會員,璀璨VIP會員";
                                                    break;
                                                case 1:
                                                    $wbl = "目前為資料認證會員";
                                                    $wbl2 = "<br>可升級真人認證,璀璨會員,璀璨VIP會員";
                                                    break;
                                                case 2:
                                                    $wbl = "目前為真人認證會員";
                                                    $wbl2 = "<br>可升級璀璨會員,璀璨VIP會員";
                                                    break;
                                                case 3:
                                                    $wbl = "目前為璀璨會員-一年期";
                                                    $wbl2 = "<br>可升級璀璨VIP會員";
                                                    break;
                                                case 4:
                                                    $wbl = "目前為璀璨VIP會員-一年期";
                                                    break;
                                                case 5:
                                                    $wbl = "目前為璀璨會員-二年期";
                                                    $wbl2 = "<br>可升級璀璨VIP會員";
                                                    break;
                                                case 6:
                                                    $wbl = "目前為璀璨VIP會員-二年期";
                                                    break;
                                                default:
                                                    $wel_txt = "(無)";
                                                    $wbl = "目前為網站會員";
                                                    $wbl2 = "<br>可升級資料認證會員,真人認證,璀璨會員,璀璨VIP會員";            	
                                            }
                                            if ( $wbl != "" ){ echo "<span style='color:blue'>".$wbl.$wel_txt.$wbl2."</span>";}
                                            if ( $re_list["times"] != "" ){ echo "<br>By ".changeDate($re_list["times"]); }
                                            ?>								
                                        </td>
                                        <?php
                                        $mem_single = $re_list["mem_single"];
                                        if ( $mem_single != "" ){
                                            $SQL = "Select p_other_name From personnel_data Where p_user='".$mem_single."'";
                                            $rs = $SPConn->prepare($SQL);
                                            $rs->execute();
                                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($result as $re);
                                            if ( count($result) == 0 ){
                                                $mem_single = "無";
                                            }else{
                                                $mem_single = $re["p_other_name"];
                                            }
                                        }else{
                                            $mem_single = "無";
                                        }
                                        if ( $re_list["mem_branch"] != "" ){
                                            $mem_single = $re_list["mem_branch"] . " - " . $mem_single;
                                        }
                                        ?>
                                        <td class="center"><?php echo $mem_single;?></td>								
                                        <td class="center">
                                            <?php
                                            if ( $s99 == "1" ){
                                                echo $re_list["msg"];
                                            }else{
                                                $reports = get_report_num($re_list["mem_mobile"]);
                                                if ( substr_count($reports, "|+|") > 0 ){
                                                    $reports_array = explode("|+|",$reports);
                                                    $report = $reports_array[0];
                                                    $report_text = $reports_array[0];
                                                }else{
                                                    $report = 0;
                                                    $report_text = "無";
                                                }
                                            ?>
                                            <a href="javascript:Mars_popup('ad_needlvup_report.php?a=<?php echo $re_list["auton"];?>&mnum=<?php echo $re_list["mem_num"];?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>
                                            <br>
                                            <a href="javascript:Mars_popup('ad_report.php?mem_num=<?php echo $re_list["mem_num"];?>&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報系統(<?php echo $report;?>)</a>
                                            <?php }?>
                                            <?php if ( $_SESSION["MM_UserAuthorization"] == "admin" ){?>
                                                <br>
                                                <a href="javascript:Mars_popup2('ad_needlvup.php?st=del&a=<?php echo $re_list["auton"];?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=300,height=240,top=10,left=10');">刪除</a>			
                                            <?php }?>
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
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->
<?php require_once("./include/_bottom.php"); ?>