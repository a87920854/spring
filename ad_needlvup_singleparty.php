<?php
/******************************************/
//檔案名稱：ad_needlvup_singleparty.php
//後台對應位置：約會專家功能->約會專家升級意願
//改版日期：2022.02.07
//改版設計人員：Jack
//改版程式人員：Queena
/******************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//權限判斷
$auth_limit = 6;
require_once("./include/_limit.php");
check_page_power("ad_needlvup");

//麵包屑
$unitprocess = $m_home.$icon."約會專家功能".$icon."約會專家升級意願";

//接收值
$st = SqlFilter($_REQUEST["st"],"tab");
$a = SqlFilter($_REQUEST["a"],"tab");
$s99 = SqlFilter($_REQUEST["s99"],"tab");
$keyword_type = SqlFilter($_REQUEST["keyword_type"],"tab");
$keyword = SqlFilter($_REQUEST["keyword"],"tab");
$vst = SqlFilter($_REQUEST["vst"],"tab");

//刪除
if ( $st == "del" ){
    $SQL_d = "Delete From needlvup Where auton=".$a;
    $rs_d = $SPConn->prepare($SQL_d);
    $rs_d->execute();
    reURL("win_close.php?m=刪除中....");
    exit;
}

if ( $s99 == "1" ){
    $subSQL = " fix=1";
    $types = "已處理";
}else{
    $subSQL = " fix=0";
    $types = "未處理";
}

$selfix2 = 0;
//"SELECT "&sqlv&" FROM needlvup WHERE "&sqls2
if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
    $subSQL1 = $subSQL;
    $selfix2 = 1;
}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "pay" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
    $subSQL1 = $subSQL." And mem_branch='".$_SESSION["branch"]."'";
    $selfix2 = 1;
}elseif ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "manager" ){
    $subSQL1 = $subSQL." And UPPER(mem_single) = '".strtoupper($_SESSION["MM_username"])."'";
    $selfix2 = 1;
}else{
    call_alert("您沒有查看此頁的權限。",0,0);
}

//搜尋關鍵字(手機)
if ( $keyword_type == "s2" ){
    $cs2 = reset_number($keyword);
    $subSQL1 .= "And mem_mobile Like '%".$cs2."%' ";
}

//搜尋關鍵字(姓名)
if ( $keyword_type == "s3" ){
    $subSQL1 .= " And mem_name Like N'%".str_replace("'", "''", $keyword)."%' ";
}

//搜尋關鍵字(編號)
if ( $keyword_type == "s4" ){
    $subSQL1 .= " And mem_num Like '%".str_Replace("'", "''", $keyword)."%' ";
}

$subSQL1 .= " And up_come Like '約會專家%' ";
$subSQL2 = " Order By auton Desc";

//取得總筆數
$SQL = "Select count(auton) As total_size From needlvup Where ".$subSQL1;
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);
if ( count($result) == 0 || $re["total_size"] == 0 ) {
    $total_size = 0;
}else{
    $total_size = $re["total_size"];
}
//會計權限僅能看到20筆資料
if ( $_SESSION["MM_UserAuthorization"] == "pay" ){
    $total_size = 10;
}

//查看清單連結文字
if ( $vst == "full" ){
    $count_href = "　<a href='?vst=n' class='btn btn-success'>查看前五百筆</a>";
}else{
    if ( $total_size > 500 ){ $total_size = 500;}
    $count_href = "　<a href='?vst=full' class='btn btn-success'>查看完整清單</a>";
}

//取得分頁資料
$tPageSize = 50; //每頁幾筆
$tPage_list = 0;
$tPage = SqlFilter($_REQUEST["tPage"],"int");
if ( $tPage >= 1 ){ 
    $tPage = $tPage;
    $tPage_list = ($tPage-1);
}else{
    $tPage = 1;
}
$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數

//分頁程式
$SQL_list  = "Select Top ".$tPageSize." * ";
$SQL_list .= "From (Select row_number() ";
$SQL_list .= "over(".$subSQL2.") As rownumber,mem_come,mem_num,mem_name,mem_sex,mem_mobile,mem_by,mem_bm,mem_bd,mem_school,times,mem_branch,mem_single,msg,auton ";
$SQL_list .= "From needlvup Where ".$subSQL1." ) temp_row ";
$SQL_list .= "Where rownumber > ".($tPageSize*$tPage_list);
$rs_list = $SPConn->prepare($SQL_list);
$rs_list->execute();
$result_list = $rs_list->fetchAll(PDO::FETCH_ASSOC);
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
            <?php
            $head_t = "未完成";
            if ( $s99 == "1" ){
                $head_t = "已完成";
            }
            ?>
            <h2 class="pageTitle">約會專家升級意願 》<?php echo $head_t;?> 》資料列表 [ <i style="color: #76192e;">共計 <?php echo $total_size."筆資料</i> ]"; if ( $total_size >= 500 ){ echo $count_href;}?></h2>
            <p>
                <?php if ( $s99 == "" ){?>
                    <a href="javascript:void(0);" class="btn btn-success btn-active" style="color:black" disabled>▶ 未完成</a>&nbsp;
                    <a href="ad_needlvup_singleparty.php?s99=1" class="btn btn-info">已完成</a>
                <?php }else{?>
                    <a href="ad_needlvup_singleparty.php" class="btn btn-info">未完成</a>&nbsp;
                    <a href="javascript:void(0);" class="btn btn-info btn-active" style="color:black; cursor:not-allowed;" disabled>▶ 已完成</a>
                <?php }?>
            </p>
            <form name="form1" method="post" id="form1" action="ad_needlvup_singleparty.php" target="_self" class="form-inline">
                <div class="m-search-bar">
                    <span class="span-group">
                        <select name="keyword_type" id="keyword_type" style="width:100px;">
                            <option value="s2"<?php if ( $keyword_type == "s2" ){?> selected<?php }?>>手機</option>
                            <option value="s3"<?php if ( $keyword_type == "s3" ){?> selected<?php }?>>姓名</option>
                            <option value="s4"<?php if ( $keyword_type == "s4" ){?> selected<?php }?>>編號</option>
                        </select>
                    </span>
                    <span class="span-group">
                        <input name="keyword" id="keyword" class="form-control" type="text" value="<?php echo $keyword;?>">
                    </span>
                    <input type="hidden" name="s99" id="s99" value="<?php echo $s99;?>">
                    <input type="submit" value="送出" class="btn btn-default">
                </div>
            </form>
            <span>
                <strong style="background-color: yellow; color:brown">
                    ※排序欄位：系統編號(由大到小)。
                </strong>
            </span>
            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr style="background-color:#FFDA96">
                            <th width="6%" style="text-align: center;">升級來源</th>
                            <th width="12%">資料來源</th>
                            <th width="5%" style="text-align: center;">編號</th>
                            <th width="5%">姓名</th>
                            <th width="3%">性別</th>
                            <th width="6%">電話</th>
                            <th width="6%">生日</th>
                            <th width="5%" style="text-align: center;">年齡</th>
                            <th width="6%" style="text-align: center;">學歷</th>
                            <th>會員權益</th>
                            <th width="10%">秘書</th>
                            <th>處理結果</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ( count($result_list) == 0 ){?>
                            <tr><td colspan="12" height="200">目前沒有資料</td></tr>
                        <?php }else{
                            foreach($result_list as $re_list){
                                if ( $re_list["up_come"] != "" ){
                                    $up_come = $re_list["up_come"];
                                }else{
                                    $up_come = "春天會館";
                                }
                                $bday = "　".(date("Y")-date("Y",strtotime($re_list["mem_by"])))." 歲"; ?>
                                <tr>
                                    <td style="text-align: center;"><b><?php echo $up_come;?></b></td>
                                    <td class="center"><?php echo $re_list["mem_come"];?></td>
                                    <td style="text-align: center;"><?php echo $re_list["mem_num"];?></td>
                                    <td class="center"><a href="ad_mem_detail.php?mem_num=<?php echo $re_list["mem_num"];?>" target="_blank"><?php echo $re_list["mem_name"];?></a></td>
								    <td style="text-align: center;"><?php echo $re_list["mem_sex"];?></td>
                                    <td class="center"><?php echo $re_list["mem_mobile"];?></td>
                                    <td class="center"><?php echo $re_list["mem_by"]."/".$re_list["mem_bm"]."/".$re_list["mem_bd"];?></td>
                                    <td><?php if ( $re_list["mem_by"] != "" ){ echo $bday;}else{echo "--";}?></td>
								    <td style="text-align: center;"><?php echo $re_list["mem_school"];?></td>
                                    <td class="center">
                                        <?php
                                        $wbl = "";
                                        $wbl2 = "";
                                        $wbl_time = "(".$re_list["web_startime"]."~".$re_list["web_endtime"].")";
                                        switch ( $re_list["web_level"] ){
                                            case 0:
                                                $wbl = "目前為網站會員(無)";
                                                $wbl2 = "<br>可升級資料認證會員,真人認證,璀璨會員,璀璨VIP會員";
                                                break;
                                            case 1:
                                                $wbl = "目前為資料認證會員".$wbl_time;
                                                $wbl2 = "<br>可升級真人認證,璀璨會員,璀璨VIP會員";
                                                break;
                                            case 2:
                                                $wbl = "目前為真人認證會員".$wbl_time;
                                                $wbl2 = "<br>可升級璀璨會員,璀璨VIP會員";
                                                break;
                                            case 3:
                                                $wbl = "目前為璀璨會員-一年期".$wbl_time;
                                                $wbl2 = "<br>可升級璀璨VIP會員";
                                                break;
                                            case 4:
                                                $wbl = "目前為璀璨VIP會員-一年期".$wbl_time;
                                                break;
                                            case 5:
                                                $wbl = "目前為璀璨會員-二年期".$wbl_time;
                                                $wbl2 = "<br>可升級璀璨VIP會員";
                                                break;
                                            case 6:
                                                $wbl = "目前為璀璨VIP會員-二年期".$wbl_time;
                                                break;
                                            default:
                                                $wbl = "目前為網站會員(無)";
                                                $wbl2 = "<br>可升級資料認證會員,真人認證,璀璨會員,璀璨VIP會員";
                                                break;
                                        }
                                        if ( $wbl != "" ){ echo "<span style='color:blue'>".$wbl.$wbl2."</span><br>by<span style='color: orangered;'> ".changeDate($re_list["times"])."</span>";}?>
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
                                        $mem_single = $re_list["mem_branch"]." - ".$mem_single;
                                    } ?>
                                    <td class="center"><?php echo $mem_single;?></td>
                                    <td class="center">
                                        <?php
                                        if ( $s99 == "1" ){
                                            echo $re_list["msg"];
                                        }else{
                                            $reports = get_report_num($re_list["mem_mobile"]);
                                            if ( substr_count($reports, "|+|") > 0 ){
                                                $report_array = explode("|+|",$reports);
                                                $report = $report_array[0];
                                                $report_text = $report_array[1];
                                            }else{
                                                $report = 0;
                                                $report_text = "無";
                                            }
                                            if ( $selfix2 == 1 ){ ?>
                                                <a href="javascript:Mars_popup('ad_needlvup_report.php?a=<?php echo $re_list["auton"];?>&mnum=<?php echo $re_list["mem_num"];?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>
                                                <br>
                                                <a href="javascript:Mars_popup('ad_report.php?mem_num=<?php echo $re_list["mem_num"];?>&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報系統(<?php echo $report;?>)</a>
                                            <?php }?>
                                        <?php }?>
                                        <?php if ( $_SESSION["MM_UserAuthorization"] == "admin" ){ ?>
                                            <br>
                                            <a href="javascript:Mars_popup2('ad_needlvup_singleparty.php?st=del&a=<?php echo $re_list["auton"];?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=300,height=240,top=10,left=10');">刪除</a>
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
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->
<?php require_once("./include/_bottom.php");?>

<script type="text/javascript">
    $(function() {
    });

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
        location.href = "ad_needlvup_singleparty.php?sear=1&vst=&s99=&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>