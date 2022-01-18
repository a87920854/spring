<?php
/***************************************/
//檔案名稱：web_mem.php
//後台對應位置：春天網站功能 > 網站認證專區
//改版日期：2022.1.14
//改版設計人員：Jack
//改版程式人員：Queena
/***************************************/
require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

$auth_limit == "8";
require_once("./include/_limit.php");

//接收值
$a1 = SqlFilter($_REQUEST["a1"],"tab");
$a2 = SqlFilter($_REQUEST["a2"],"tab");
$b1 = SqlFilter($_REQUEST["b1"],"tab");
$b2 = SqlFilter($_REQUEST["b2"],"tab");
$vst = SqlFilter($_REQUEST["vst"],"tab");
$sear = SqlFilter($_REQUEST["sear"],"tab");
$s99 = SqlFilter($_REQUEST["s99"],"tab");
$s7 = SqlFilter($_REQUEST["s7"],"tab");
$br = SqlFilter($_REQUEST["br"],"tab");
$app = SqlFilter($_REQUEST["c"],"tab"); //春天or約專按鈕參數
$keyword_type = SqlFilter($_REQUEST["keyword_type"],"tab"); //搜尋條件
$keyword = SqlFilter($_REQUEST["keyword"],"tab"); //關鍵字

if ( $a1 > $b1 ){ call_alert("日期請由小到大選擇",0,0);}
if ( $a1 != "" ){
    $a1 = $a1."/".$a2."/1";
}else{
    $a1 = "1900/1/1";
}
if ( $b1 != "" ){
    $b1 = $b1."/".$b2."/31";
}else{
    $b1 = "2020/12/31";
}

$default_sql_num = 500;
/*if ( $vst == "full" ){
  $sub = "*"
  sqlv2 = "count(mem_auto)"
Else
  sqlv = "top "&default_sql_num&" *"
  sqlv2 = "count(mem_auto)"
End If*/

//語法
if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
    $subSQL1 = "1 = 1";
    if ( $sear != 1 ){
        if ( $s99 != "" ){
            $subSQL1 = $subSQL1 . " and web_level = 1";
	        $all_type = "已處理";
        }else{
            $subSQL1 = $subSQL1 . " And (Not web_level > 0 Or web_level IS NULL)";
	        $all_type = "未處理";
        }
    }else{
	    $all_type = "資料搜尋";
    }
    if ( $s7 != "" ){
        $subSQL1 = $subSQL1 . " And mem_single = '" . str_Replace("'", "''", $s7) . "'";
    }
}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" ){
    $subSQL1 = "mem_branch= '".$_SESSION["branch"]."'";
    $all_type = "";
    if ( $br != "" ){
        $subSQL1 = $subSQL1 . " And mem_single = '".$_SESSION["MM_Username"]."'";
	    $all_type = "已處理";
    }else{
      	$subSQL1 = $subSQL1 . " And (not web_level > 0 Or web_level IS NULL)";
	    $all_type = "未處理";
    }	  
    if ( $_SESSION["s7"] != "" ){
        $subSQL1 = $subSQL1 . " And mem_single Like '%" . str_Replace("'", "''", $s7) . "%'";
    }
}elseif ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "action" || $_SESSION["MM_UserAuthorization"] == "manager" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
    $subSQL1 = "mem_single = '".$_SESSION["MM_username"]."'";
	$subSQL1 = $subSQL . " And all_type <> '未處理' And (not web_level > 0 or web_level IS NULL)";
	$all_type = "未處理";
}elseif ( $_SESSION["MM_UserAuthorization"] == "love" ){	
	$subSQL1 = "mem_single = '".$_SESSION["MM_username"]."' And all_type <> '未處理'";
	$all_type = "未處理";
}elseif ( $_SESSION["MM_UserAuthorization"] == "pay" ){
    $subSQL1 = "mem_branch='".$_SESSION["branch"]."'";
    $default_sql_num = "10";
}

switch ($app){
    case "1":
        $subSQL1 = $subSQL1 . " And (si_account<>'0')";
        break;
    default:
        $subSQL1 = $subSQL1 . " And (si_account='0')";
}

$s21 = SqlFilter($_REQUEST["s21"],"tab");
$s11 = SqlFilter($_REQUEST["s11"],"tab");
$s4 = SqlFilter($_REQUEST["s4"],"tab");
$s2 = SqlFilter($_REQUEST["s2"],"tab");
$s8 = SqlFilter($_REQUEST["s8"],"tab");
$s10 = SqlFilter($_REQUEST["s10"],"tab");
$s3 = SqlFilter($_REQUEST["s3"],"tab");
$s27 = SqlFilter($_REQUEST["s27"],"tab");
$s13 = SqlFilter($_REQUEST["s13"],"tab");
$s14 = SqlFilter($_REQUEST["s14"],"tab");

if ( $s21 != "" ){
    $subSQL1 = $subSQL2 . " And mem_sex Like '%" . str_Replace("'", "''", $s21) . "%'";
}

if ( $s11 != "" ){
    $subSQL1 = $subSQL1 . " And mem_branch Like '" . str_Replace("'", "''", $s11) . "'";
}

if ( $keyword_type == "s4" ){
    $subSQL1 = $subSQL1 . " And mem_num Like '%" . str_Replace("'", "''", $keyword) . "%'";
}

if ( $keyword_type == "s2" ){
    $keyword = reset_number($keyword);
    $subSQL1 = $subSQL1 . " And mem_mobile Like '%". str_Replace("'", "''", $keyword)."%'";
}

if ( $s8 != "" ){
    $subSQL1 = $subSQL1 . " And mem_come Like '%" . str_Replace("'", "''", $s8) . "%'";
}

if ( $s10 != "" ){
    $subSQL1 = $subSQL1 . " And mem_school Like '%" . str_Replace("'", "''", $s10) . "%'";
}

if ( $keyword_type == "s3" ){
    $subSQL1 = $subSQL1 . " And mem_name Like N'%" . str_Replace("'", "''", $keyword) . "%'";
}

if ( $s27 != "" ){
    $subSQL1 = $subSQL1 . " And mem_by like '%" . str_Replace("'", "''", $s27) . "%'";
}

if ( $s13 != "" ){
    $subSQL1 = $subSQL1 . " And mem_time Between '" . str_Replace("'", "''", $s13) . "' And '" . str_Replace("'", "''", $s14) . "'";
}

$subSQL1 = $subSQL1 . " And mem_p1 <> '' and mem_p2 <> '' and mem_photo <> '' and charindex(mem_photo, 'girl.jpg') <= 0 and charindex(mem_photo, 'boy.jpg') <= 0";
$subSQL1 = $subSQL1 . " And ( ((mem_school = '博士' or mem_school = '碩士' or mem_school = '大學') and (mem_p4 <> '' and not mem_p4 is null)) or ((not mem_school = '博士' and not mem_school = '碩士' and not mem_school = '大學') and (mem_p4 is null or mem_p4 = '')) )";
$subSQL1 = $subSQL1 . " And ( ((mem_money = '101萬到199萬' or mem_money = '200萬以上') and (select count(photo_auto) from proof_data where mem_num=member_data.mem_num) > 0) or ((not mem_money = '101萬到199萬' and not mem_money = '200萬以上') and (select count(photo_auto) from proof_data where mem_num=member_data.mem_num) <= 0) )";

$subSQL2 = "Order By mem_num Desc";

//取得總筆數
$SQL = "Select count(mem_auto) As total_size From member_data Where ".$subSQL1;
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
    $count_href = "　<a href='?vst=n&s99=".$s99."&c=".$c."'>[查看前五百筆]</a>";
}else{
    if ( $total_size > 500 ){ $total_size = 500;}
    $count_href = "　<a href='?vst=full&s99=".$s99."&c=".$c."'>[查看完整清單]</a>";
}

//取得分頁資料
$tPageSize = 50; //每頁幾筆
$tPage = SqlFilter($_REQUEST["tPage"],"int");
$tPage = 1; //目前頁數
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
$SQL_list .= "over(".$subSQL2.") As rownumber,mem_come,mem_num,mem_mobile,si_account,mem_name,mem_sex,mem_by,mem_bm,mem_bd,mem_auto,mem_username,mem_school,mem_single,mem_branch ";
$SQL_list .= "From member_data Where ".$subSQL1." ) temp_row ";
$SQL_list .= "Where rownumber > ".($tPageSize*$tPage);
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
            <li class="active">網站認證專區</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>網站認證專區　<?php echo $all_type;?> - 數量：<?php echo $total_size.$count_href;?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <div class="btn-group pull-left margin-right-10">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <?php if ( $_SESSION["MM_UserAuthorization"] == "admin" ){?>
							    <?php if ( $all_type == "未處理" ){?>
								    <li><a href="?s99=1" target="_self"><i class="icon-resize-horizontal"></i> 切換已處理</a></li>
								<?php }?>
								<?if ( $all_type == "已處理" ){?>
								    <li><a href="web_mem.asp" target="_self"><i class="icon-resize-horizontal"></i> 切換未處理</a></li>
								<?php }?>
                            <?php }?>

                            <?php if ( $_SESSION["MM_UserAuthorization"] == "branch" ){ ?>
							    <?php if ( $all_type == "未處理" ){ ?>
								    <li><a href="?br=1" target="_self"><i class="icon-resize-horizontal"></i> 切換已處理</a></li>
								<?php }?>
								<?php if ( $all_type == "已處理" ){ ?>
								    <li><a href="web_mem.asp" target="_self"><i class="icon-resize-horizontal"></i> 切換未處理</a></li>
								<?php }?>
                            <?php }?>
                        </ul>
                    </div>　

                    <form id="searchform" action="web_mem.php?vst=full&sear=1" method="post" class="form-inline pull-left" target="_self">
                        <select name="keyword_type" id="keyword_type" style="width:100px;">
                            <option value="s2"<?php if ( $keyword_type == "s2" ){?> selected<?php }?>>手機</option>
                            <option value="s3"<?php if ( $keyword_type == "s3" ){?> selected<?php }?>>姓名</option>
                            <option value="s4"<?php if ( $keyword_type == "s4" ){?> selected<?php }?>>編號</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text" value="<?php echo $keyword;?>">
                        <input type="hidden" name="app" id="app" value="<?php echo $app;?>">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>

                <p>
					<span class="text-status">目前資料會館：
                        <?php if ( $app == 0 || $app == "" ){ echo "春天會館";}else{ echo "約會專家";} ?>
                    </span>&nbsp;▶&nbsp;
					<a class="btn btn-info<?php if ( $app == 0 || $app == "" ){ echo " btn-active";} ?>" href="?app=0">春天會館</a>
					<a class="btn btn-info<?php if ( $app == 1 ){ echo " btn-active";} ?>" href="?app=1">約會專家</a>
				</p>


                <span style="background-color: yellow; color:brown;"><strong>※排序欄位：會員編號(由大至小)排序。</strong></span>
                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr>
                            <th><input data-no-uniform="true" type="checkbox" id="selnums"></th>
                            <th>資料來源</th>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>生日</th>
                            <th>學歷</th>
                            <th>秘書</th>
                            <th>照片</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ( count($result_list) == 0 ){?>
                            <tr>
                                <td colspan="10" height="200">目前沒有資料</td>
                            </tr>
                        <?php }else{
                            foreach($result_list as $re_list){?>
                                <tr>
                                    <td><input data-no-uniform="true" type="checkbox" name="nums" value="<?php echo $re_list["mem_num"];?>"></td>
                                    <td class="center"><?php echo $re_list["mem_come"];?></td>
                                    <td><?php echo $re_list["mem_num"];?></td>
                                    <?php
                                    $doub = "";
                                    if ( $re_list["mem_mobile"] != "" && ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" ) ){
                                        $SQL = "Select count(mem_auto) As check_doub From member_data Where mem_mobile='".$re_list["mem_mobile"]."'";
                                        $rs = $SPConn->prepare($SQL);
                                        $rs->execute();
                                        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($result as $re);                                    
                                        if ( count($result) > 0 ){
                                            if ( $re["check_doub"] > 1 ){
                                                $doub = "　<font color='red'>重</font>";
                                            }
                                        }			        
                                    }
                                    ?>
                                    <td class="center">
                                        <a href="ad_mem_detail.php?mem_num=<?php echo $re_list["mem_num"];?>" target="_blank"><?php echo $re_list["mem_name"];?></a>　									
                                        [<a href="ad_no_mem_s.php?mem_mobile=<?php echo $re_list["mem_mobile"];?>" target="_blank">查</a>]<?php echo $doub;?>
                                        <?php
                                        if ( $re_list["si_account"] != "0" ){
                                            echo "&nbsp;<span class='label' style='background:#c22c7d'><a href='#' style='color:white;' data-toggle='tooltip' data-original-title='約會專家主帳號'>專</a></span>";
                                        }
                                        ?>													
                                    </td>
                                    <td class="center"><?php echo $re_list["mem_sex"];?></td>
                                    <?php
                                    if ( is_numeric($re_list["mem_by"]) && $re_list["mem_by"] > 1911 ){
                                        $bday = "　".(date("Y")-date("Y",strtotime($re_list["mem_by"])))." 歲";
                                    }
                                    ?>
                                    <td class="center"><?php echo $re_list["mem_by"]."/".$re_list["mem_bm"]."/".$re_list["mem_bd"].$bday;?></td>
                                    <td class="center"><?php echo $re_list["mem_school"];?></td>
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

                                    If ( $re_list["mem_branch"] != "" ){
                                        $mem_single = $re_list["mem_branch"] . " - " . $mem_single;
                                    }
                                    ?>
                                    <td class="center"><?php echo $mem_single;?></td>
                                    <td class="center">
                                        <?php if ( ( $re_list["mem_sex"] == "男" && $re_list["mem_photo"] != "boy.jpg") || ( $re_list["mem_sex"] == "女" && $re_list["mem_photo"] != "girl.jpg" ) ){?>
                                            <a href="photo/<?php echo $re_list["mem_photo"];?>?t=<?php echo (int)(rand()*9999);?>" target="_blank" class="fancybox">有</a>
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
                                                    $report_array = explode("|+|", $reports);
                                                    $report = $report_array[0];
                                                    $report_text = $report_array[1];
                                                }else{
                                                    $report = 0;
                                                    $report_text = "無";
                                                }
                                                ?>
                                                <li><a href="ad_mem_detail.php?mem_num=<?php echo $re_list["mem_num"];?>" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                                <li><a href="javascript:Mars_popup('ad_report.php?k_id=<?php echo $re_list["mem_auto"];?>&lu=<?php echo $re_list["mem_username"];?>&ty=member','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(<?php echo $report;?>)</a></li>
                                                <?php if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "pay" ){?>
                                                    <li><a href="ad_mem_fix.php?mem_num=<?php echo $re_list["mem_num"];?>" target="_blank"><i class="icon-file"></i> 修改</a></li>
                                                <?php }?>
                                            </ul>
                                        </div>						
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <?php
                                        $wbl_txt = "(".$re_list["web_startime"]."~".$re_list["web_endtime"].")";
                                        switch($re_list["web_level"]){
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
                                            default:
                                                $wbl_txt = "";
                                                if ( ( $re_list["mem_photo"] != "" && $re_list["mem_photo"] != "girl.jpg" && $re_list["mem_photo"] != "boy.jpg" ) && $re_list["mem_p1"] != "" && $re_list["mem_p2"] != "" ){
                                                    $wbl = "資料認證會員(待認證)";
                                                    if ( ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "single" ) || $_SESSION["MM_UserAuthorization"] == "action" || $_SESSION["MM_UserAuthorization"] == "pay" ){
                                                        $wbl = $wbl. "　<a href='ad_mem_detail.asp?mem_num=".$re_list["mem_num"]."'>進入會員頁面審核</a>";
                                                    }
                                                }
                                                break;
                                        }
                                        if ( $wbl != "" ){ echo "<span style='color:blue'>".$wbl.$wbl_txt."</span>";}
                                        ?>
                                    </td>
                                    <td colspan="8" style="BORDER-bottom: #666666 1px dotted">			
                                        (<a href="javascript:Mars_popup('ad_report.php?k_id=<?php echo $re_list["mem_auto"];?>&lu=<?php echo $re_list["mem_username"];?>&ty=member','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(<?php echo $report;?></a>)，
                                        處理情形：<font color="#FF0000" size="2"><?php echo $re_list["all_type"];?></font>) 內容：<?php echo $report_text;?>　　<font color="blue">舊：</font><?php echo $re_list["all_note"];?>
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
    <!--/row-->
</section>
<!-- /MIDDLE -->
<?php require("./include/_bottom.php"); ?>

<script language="JavaScript">
    $(function() {


        $("input[name='nums']").prop("checked", false);
        $("#selnums").on("click", function() {
            if ($(this).prop("checked"))
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", true);
                });
            else
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", false);
                });
        });
    });

    function mutil_send() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要發送的會員。");
        else Mars_popup('ad_send_branch.php?mem_num=' + $allnum, '', 'scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');
    }

    function mutil_del() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要刪除的資料。");
        else Mars_popup2('ad_del.php?t=n&mem_num=' + $allnum, '', 'scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');
    }

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
        location.href = "web_mem.php?sear=1&vst=&s99=&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>