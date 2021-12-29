<?php
error_reporting(0); 
/*****************************************/
//檔案名稱：ad_mem_love.php
//後台對應位置：名單/發送記錄>會員排約時間
//改版日期：2021.12.27
//改版設計人員：Jack
//改版程式人員：Queena
/*****************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

$auth_limit = 7;
require_once("./include/_limit.php");
check_page_power("ad_mem_love");

$default_sql_num = 500;

if ( $_REQUEST["vst"] == "full" ){
    $sqlv = "*";
}else{
    $sqlv = "top ".$default_sql_num." *";
}

$sqlss = "";

if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
    $branch = SqlFilter($_REQUEST["branch"],"tab");
    $subSQL1 = "mem_level='mem' And mem_branch='".$branch."' ";
}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
    $branch = $_SESSION["branch"];
    $subSQL1 = "mem_level='mem' And mem_branch='".$branch."' ";
}else{
    $branch = $_SESSION["branch"];
    $subSQL1 = "mem_level='mem' And mem_branch='".$branch."' And UPPER(mem_single) = '".strtoupper($_SESSION["MM_username"])&"' ";
}

//篩選條件[關鍵字搜尋]
$keyword = SqlFilter($_REQUEST["keyword"],"tab");
if ( $keyword != "" ){
    $subSQL5 = " And (mem_phone='".$keyword."' Or mem_name Like N'%".$keyword."%' Or mem_num like '%".$keyword."%' Or mem_username='".$keyword."' Or mem_mobile='".$keyword."')";
}

//篩選條件[是否過期]
$timeend = SqlFilter($_REQUEST["timeend"],"tab");
if ( $timeend != "" ){
	if ( $timeend == "1" ){
        $subSQL2 = " And (web_endtime > getdate())";
    }
	if ( $timeend == "2" ){
		$subSQL2 = " And (web_endtime < getdate())";
    }
}

//篩選條件[排約天數區間]
$daysel = $_REQUEST["daysel"];
if ( $daysel != "" ){
    $d1 = "(datediff(d, love_time2, getdate()) < 8)";
    $d2 = "((datediff(d, love_time2, getdate()) >= 8) and (datediff(d, love_time2, getdate()) < 30))";
    $d3 = "((datediff(d, love_time2, getdate()) >= 30) and (datediff(d, love_time2, getdate()) < 60))";
    $d4 = "((datediff(d, love_time2, getdate()) >= 60) and (datediff(d, love_time2, getdate()) < 180))";
    $d5 = "(datediff(d, love_time2, getdate()) >= 180)";
    if ( count($daysel) == 1 ){
        $subSQL3 = " And ".${"d".$daysel[0]};
    }else{
        $subSQL3 = " And (".${"d".$daysel[0]};
        for ( $i=1;$i<count($daysel);$i++ ){
            $subSQL3 .= " Or ". ${"d".$daysel[$i]};
        }
        $subSQL3 .= ")";
    }
}else{
    $daysel = array();
	$subSQL3 = " And (datediff(d, love_time2, getdate()) >= 180)";
}

//echo "select * from member_data Where ".$subSQL1.$subSQL2.$subSQL3;

//排序條件
$oby = SqlFilter($_REQUEST["oby"],"int");
switch ( $oby ){
    case "2":
		$subSQL4 = "love_time2 Asc";
        $subSQL41 = "love_time2";
        break;
	case "3":
		$subSQL4 = "mem_jointime Desc";
        $subSQL41 = "mem_jointime";
        break;
	case "4":
		$subSQL4 = "mem_jointime Asc";
        $subSQL41 = "mem_jointime";
        break;
	case "5":
		$subSQL4 = "mem_by Desc";
        $subSQL41 = "mem_by";
        break;
	case "6":
		$subSQL4 = "mem_by Asc";
        $subSQL41 = "mem_by";
        break;
  	default:
		$subSQL4 = "love_time2 Desc";
        $subSQL41 = "love_time2";
        break;
}

//取得總筆數
$SQL = "Select count(mem_auto) As total_size From member_data Where ".$subSQL1.$subSQL2.$subSQL3.$subSQL5;
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
    $count_href = "　<a href='?vst=n&branch=".$branch."&oby=".$oby."'>[查看前五百筆]</a>";
}else{
    if ( $total_size > 500 ){ $total_size = 500;}
    $count_href = "　<a href='?vst=full&branch=".$branch."&oby=".$oby."'>[查看完整清單]</a>";
}

//取得分頁資料
$tPageSize = 20; //每頁幾筆
$tPage = 1; //目前頁數
if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
if ( $tPageSize*$tPage < $total_size ){
    $page2 = 20;
}else{
    $page2 = (20-(($tPageSize*$tPage)-$total_size));
}

//分頁語法
$SQL_list  = "Select ".$sqlv." From (";
$SQL_list .= "Select TOP ".$page2." * From (";
$SQL_list .= "Select TOP ".($tPageSize*$tPage)." * From member_data Where ".$subSQL1.$subSQL2.$subSQL3.$subSQL5." Order By ".$subSQL4.") t1 ";
$SQL_list .= "Where ".$subSQL1.$subSQL2.$subSQL3.$subSQL5." Order By ".$subSQL41." Asc) t2 Where ".$subSQL1.$subSQL2.$subSQL3.$subSQL5." Order By ".$subSQL4." ";
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
            <li class="active">會員排約時間</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員排約時間 - 數量：<?php echo $total_size;?>　<?php echo $count_href;?></strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <p>
                    <form name="form1" method="post" class="form-inline" action="ad_mem_love.php?vst=<?php echo $_REQUEST["vst"];?>">

                        <!--會員選項-->
                        <?php
                        if ( $_SESSION["MM_UserAuthorization"] == "admin" ){ 
                            echo "會館：";
                            echo "<select name='branch' id='branch'>";
                            echo "<option value=''>請選擇</option>";
                            $get_branch = substr(get_branch('好好玩旅行社'), 0, -1);
                            $get_branch = explode(",",$get_branch);
                            for ( $i=0;$i<count($get_branch);$i++ ){
                                echo "<option value='".$get_branch[$i]."'";
                                if ( $branch == $get_branch[$i] ){ echo " selected";}
                                echo ">".$get_branch[$i]."</option>";
                            }
                            echo "</select>";
                        }
                        ?>

                        <!--日期區間選項-->
                        <select name="daysel[]" id="daysel[]" class="select2" style="width:150px;" multiple>	
                            <option value="1"<?php if ( in_array("1",$daysel) ){ echo " selected";}?>>0 ~ 7 天</option>
                            <option value="2"<?php if ( in_array("2",$daysel) ){ echo " selected";}?>>8 ~ 29 天</option>
                            <option value="3"<?php if ( in_array("3",$daysel) ){ echo " selected";}?>>30 ~ 59 天</option>
                            <option value="4"<?php if ( in_array("4",$daysel) ){ echo " selected";}?>>60 ~ 179 天</option>
                            <option value="5"<?php if ( in_array("5",$daysel) || count($daysel) == 0 ){ echo " selected";}?>>180 天以上</option>
                        </select>

                        <!--關鍵字-->
                        <input id="keyword" name="keyword" class="form-control" type="text" placeholder="關鍵字" value="<?php echo $keyword;?>">

                        <!--是否過期選項-->
                        <select name="timeend" id="timeend">
                            <option value=""<?php if ( $timeend == "" ){ echo " selected";}?>>未過+已過</option>
                            <option value="1"<?php if ( $timeend == "1" ){ echo " selected";}?>>未過期</option>
                            <option value="2"<?php if ( $timeend == "2" ){ echo " selected";}?>>已過期</option>	
                        </select>

                        <!--排序欄位-->
                        <select name="oby" id="oby">
                            <option value="1"<?php if ( $oby == "1" ){ echo " selected";}?>>依最後排約時間近到遠</option>
                            <option value="2"<?php if ( $oby == "2" ){ echo " selected";}?>>依最後排約時間遠到近</option>
                            <option value="3"<?php if ( $oby == "3" ){ echo " selected";}?>>依入會時間近到遠</option>
                            <option value="4"<?php if ( $oby == "4" ){ echo " selected";}?>>依入會時間遠到近</option>
                            <option value="5"<?php if ( $oby == "5" ){ echo " selected";}?>>依年次近到遠</option>
                            <option value="6"<?php if ( $oby == "6" ){ echo " selected";}?>>依年次遠到近</option>
                        </select>
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </p>
                <p>
                    <div style="width:20px;height:20px;background:#5CC6F5;display:inline-block;"></div> 0 ~ 7 天
                    &nbsp;
                    <div style="width:20px;height:20px;background:#7F00DB;display:inline-block;"></div> 8 ~ 29 天
                    &nbsp;
                    <div style="width:20px;height:20px;background:#009900;display:inline-block;"></div> 30 ~ 59 天
                    &nbsp;
                    <div style="width:20px;height:20px;background:#ffcc33;display:inline-block;"></div> 60 ~ 179 天
                    &nbsp;
                    <div style="width:20px;height:20px;background:#990000;display:inline-block;"></div> 180 天以上
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>電話</th>
                            <th>次數</th>
                            <th>卡別</th>
                            <th>生日</th>
                            <th>學歷</th>
                            <th>照片</th>
                            <th>入會日</th>
                            <th>會館秘書</th>
                            <th width="100">　</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        if ( $branch == "" ){ 
                            echo "<tr><td colspan='12' height='200'>請先選擇會館</td></tr>";
                        }else{
                            if ( count($result_list) == 0 ){
                                echo "<tr><td colspan='12' height='200'>目前沒有資料</td></tr>";
                            }else{
                                foreach( $result_list as $re_list){ ?>
                                    <tr>
                                        <td align="center"><?php echo $re_list["mem_num"];?></td>
                                        <td align="center"><a href="ad_mem_detail.php?mem_num=<?php $re_list["mem_num"];?>" target="_blank"><?php echo $re_list["mem_name"];?></a></td>
                                        <td align="center"><?php echo $re_list["mem_sex"];?></td>
                                        <td align="center"><?php echo $re_list["mem_mobile"];?></td>
                                        <?php
                                        $la2 = 0;
                                        $la3 = 0;
                                        $la4 = "";
                                        $bsql = "";
                                        $mem_username = $re_list["mem_username"];
                                        $mem_branch = $re_list["mem_branch"];
                                        
                                        if ( $mem_branch != "" ){
                                            if ( $mem_branch == "八德" ){
                                                $bsql = " And all_branch='八德'";
                                            }else{
                                                $bsql = "";
                                            }
                                        }

                                        if ( $mem_username != "" ){
                                            //主約次數
                                            $SQL = "Select count(love_auto) As la1 From love_data_re Where love_user = '".$mem_username."'";
                                            $rs = $SPConn->prepare($SQL);
                                            $rs->execute();
                                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($result as $re);
                                            if ( count($result) == 0 ){ $la1 = 0; }else{ $la1 = $re["la1"];}

                                            //被約次數
                                            $SQL = "Select count(love_auto) As la2 From love_data_re Where love_user2 = '".$mem_username."'";
                                            $rs = $SPConn->prepare($SQL);
                                            $rs->execute();
                                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($result as $re);
                                            if ( count($result) == 0 ){ $la2 = 0; }else{ $la2 = $re["la2"];}
                                            
                                            //總次數
                                            $la3 = $la1 + $la2;
                                        }
                                        
                                        if ( chkDate($re_list["love_time2"]) ){
                                            $date1 = strtotime(date("Y-m-d"));
                                            $date2 = strtotime($re_list["love_time2"]);
                                            $days=ceil(($date1-$date2)/86400);
                                            $la4 = "最後一次排約：" . changeDate($re_list["love_time2"])."&nbsp;(".daycolor($days).")"; 
                                        }else{
                                            $la4 = "<font color='#990000'>最後一次排約：無紀錄</font>";
                                        }
                                        
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
                                        <td align="center">
                                            主：<?php echo $la1;?>&nbsp;被：<?php echo $la2;?>&nbsp;共：<?php echo $la3;?>&nbsp;&nbsp;
                                            <a href="javascript:Mars_popup('ad_report.php?k_id=<?php echo $re_list["mem_auto"];?>&lu=<?php echo $re_list["mem_username"];?>&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(<?php echo $report;?>)</a>
                                            <br><?php echo $la4;?>
                                        </td>
                                        <td align="center">
                                            <?php
                                            echo get_card($re_list["mem_join"]);
                                            $wbl = "";
                                            if ( chkDate($re_list["web_endtime"]) ){
                                                $date1 = strtotime(date("Y-m-d"));
                                                $date2 = strtotime($re_list["web_endtime"]);
                                                $web_time_diff = ($date2-$date1) / 86400;
                                                if ( $web_time_diff > 0 ){
                                                    $wbl = $wbl."&nbsp;&nbsp;餘 ".$web_time_diff." 天";
                                                }else{
                                                    $wbl = $wbl."&nbsp;&nbsp;<span class='label label-danger'>已過期</span>";
                                                }
                                            }
                                            if ( $wbl != "" ){ echo "<br><span style='color:blue'>".$wbl."</span>";}
                                            ?>
                                        </td>
                                        <td align="center"><?php echo $re_list["mem_by"]."/".$re_list["mem_bm"]."/".$re_list["mem_bd"];?></td>
                                        <td align="center"><?php echo $re_list["mem_school"];?></td>
                                        <td align="center">
                                            <?php
                                            $mem_photo = $re_list["mem_photo"];
                                            echo $mem_photo;
                                            if ( $mem_photo != "" ){
                                                $mem_photo = str_replace("http://pic.datemenow.tw/", "", $mem_photo);
                                            }
                                            if ( ($re_list["mem_sex"] == "男" && $mem_photo != "boy.jpg") || ($re_list["mem_sex"] == "女" && $mem_photo != "girl.jpg") ){
                                                if ( $re_list["mem_branch"] == "八德" ){
                                                    echo "<a href='http://pic.datemenow.tw/".$mem_photo."?t=".(int)(rand()*9999)."' class='fancybox'>有</a>";
                                                }else{
                                                    echo "<a href='../photo/".$mem_photo."?t=".(int)(rand()*9999)."' class='fancybox'>有</a>";
                                                }
                                            }else{
                                                echo "無";
                                            }
                                            ?>
                                        </td>
                                        <td align="center"><?php echo date("Y/m/d",strtotime($re_list["mem_jointime"]));?></td>
                                        <?php
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
                                        <td align="center">
                                            <div class="btn-group">
                                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="ad_mem_detail.php?mem_num=<?php echo $re_list["mem_num"];?>" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                                    <li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }?>
                            <?php }?>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <?php require_once("./include/_page.php"); ?>
        </div>
        <!--/row-->
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->
<?php require_once("./include/_bottom.php"); ?>