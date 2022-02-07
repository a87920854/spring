<?php
/*****************************************/
//檔案名稱：ad_singleparty_invite_list.php
//後台對應位置：約會專家功能->會館約會
//改版日期：2022.01.25
//改版設計人員：Jack
//改版程式人員：Queena
/*****************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//麵包屑
$unitprocess = $m_home.$icon."約會專家功能".$icon."會館約會";

//接收值
$st = SqlFilter($_REQUEST["st"],"tab");
$an = SqlFilter($_REQUEST["an"],"tab");
$times1 = SqlFilter($_REQUEST["times1"],"tab");
$times2 = SqlFilter($_REQUEST["times2"],"tab");
$branch = SqlFilter($_REQUEST["branch"],"tab");
$single = SqlFilter($_REQUEST["single"],"tab");
$vst = SqlFilter($_REQUEST["vst"],"tab");
$t = SqlFilter($_REQUEST["t"],"tab");
$keyword = SqlFilter($_REQUEST["keyword"],"tab");
$tPage = SqlFilter($_REQUEST["tPage"],"tab");

//刪除資料
iF ( $st == "del" ){
    $SQL_d = "Delete From si_invite Where auton=".$an;
    $rs_d = $SPConn->prepare($SQL_d);
    $rs_d -> execute();        
    reURL("reload_window.php?m=資料刪除中...");
    exit;
}

//判斷日期格式
if ( $times1 != "" && chkDate($times1) ){
    $acre_sign1 = $times1 . " 00:00";
    $vacre_sign1 = $times1;
    if ( ! chkDate($acre_sign1) ){
        call_alert("起始日期有誤。", 0, 0);
    }
}

if ( $times2 != "" && chkDate($times2) ){
    $acre_sign2 = $times2 . " 23:59";
    $vacre_sign2 = $times2;
    if ( ! chkDate($acre_sign2) ){
        call_alert("結束日期有誤。", 0, 0);
    }
}

//組合語法 si_invite Where types='branch'
$subSQL = "types='branch' ";
if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
    $subSQL = $subSQL;
    $selfix2 = 1;
}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
    $subSQL .= "And (mbranch = '".$_SESSION["branch"]."' Or tbranch = '".$_SESSION["branch"]."' Or datebranch = '".$_SESSION["branch"]."') ";
}elseif ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "manager" ){
    $subSQL .= "And (msingle = '".$_SESSION["MM_username"]."' Or tsingle = '".$_SESSION["MM_username"]."') ";
}else{
    call_alert("您沒有查看此頁的權限。",0,0);
}

//判斷日期區間
if ( chkDate($acre_sign1) && chkDate($acre_sign2) ){
    $days = (strtotime($acre_sign2)-strtotime($acre_sign1))/86400;
    if ( $days < 0 ){ call_alert("結束日期不能大於起始日期。", 0, 0); }
    $subSQL .= "And times Between '".$acre_sign1."' And '".$acre_sign2."' ";
}

//篩選條件-會館名稱
if ( $branch != "" ){
    $subSQL .= "And (mbranch Like '%".$branch."%' Or tbranch Like '%".$branch."%' Or datebranch Like '%".$branch."%')";
}

//篩選條件-祕書
if ( $single != "" ){
    $subSQL .= "And (msingle Like '%".$single."%' Or tsingle Like '%".$single."%')";
}

if ( $vst != "full" ){
    if ( $t == "1" ){
	    $subSQL .= "And stats < 3 ";
    }else{
	    $subSQL .= "And datetime_stat = 2 ";
    }
}

//編號搜尋
if ( $keyword != "" ){
	$subSQL .= "And (mnum Like '%".$keyword."%' Or tnum Like '%".$keyword."%') ";
}

$orderSQL = " Order By times Desc, statstime2 Desc";

//取得總筆數
$SQL = "Select count(auton) As total_size From si_invite Where ".$subSQL;
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetchAll(PDO::FETCH_ASSOC);
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
$SQL_list .= "over(".$orderSQL.") As rownumber,mnum,tnum,datebranch,statstime2,stats,times,msingle,mbranch,tbranch,tsingle,datetime_stat,datetime_real,invite_stats,auton ";
$SQL_list .= "From si_invite Where ".$subSQL." ) temp_row ";
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

        <?php
        $linkd1 = " disabled";
        $linkd2 = "";
        $linkd1h = "javascript:void(0)";
        $linkd2h = "ad_singleparty_invite_list.php?t=1";
        $head_t = "等待秘書聯繫";
        if ( $t == "1" ){
            $linkd1 = "";
            $linkd2 = " disabled";
            $linkd1h = "ad_singleparty_invite_list.php";
            $linkd2h = "javascript:void(0)";
            $head_t = "已邀約未同意";
        }
        ?>

        <div class="panel panel-default">
            <h2 class="pageTitle">會館約會 》<?php echo $head_t;?> 》資料列表 [ <i style="color: #76192e;">共計 <?php echo $total_size."筆資料</i> ]".$count_href;?></h2>
            <p>
                <?php if ( $t == "" ){?>
                    <a href="javascript:void(0);" class="btn btn-success btn-active" style="color:black" disabled>▶ 等待秘書聯繫</a>&nbsp;
                    <a href="ad_singleparty_invite_list.php?t=1" class="btn btn-info">已邀約未同意</a>
                <?php }else{?>
                    <a href="ad_singleparty_invite_list.php" class="btn btn-info">等待秘書聯繫</a>&nbsp;
                    <a href="javascript:void(0);" class="btn btn-info btn-active" style="color:black; cursor:not-allowed;" disabled>▶ 已邀約未同意</a>
                <?php }?>
            </p>
            <form name="form1" method="post" id="form1" action="<?php echo $_SERVER["PHP_SELF"]?>">
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
                        <span class="span-group">
                            <input type="text" name="keyword" placeholder="編號" class="form-control" value="<?php echo $keyword;?>">
                        </span>
                    <?php }?>
                    <span class="span-group">
                        <input type="submit" value="送出" class="btn btn-default">
                    </span>
                    <input type="hidden" name="vst" id="vst" value="<?php echo $vst;?>">
                    <input type="hidden" name="t" id="t" value="<?php echo $t;?>">
                </div>
            </form>
            <span>
                <strong style="background-color: yellow; color:brown">
                    ※受理會館務必與<font color="red">發起人及被邀約人</font>兩方都聯絡確認後，才能設定排約時間。<br>
                    ※如果有一方不願排約或取消，請一樣設定排約時間後再到排約預定表中選取取消原因。<br>
                    ※排序欄位：新增/更新時間(由大至小)→開始時間(由大至小)排序。
                </strong>
            </span>
            <div class="panel-body">
                
                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr style="background-color:#FFDA96">
                            <th width="10%" style="text-align: center;">發起人</th>
                            <th width="10%" style="text-align: center;">發起人會館</th>
                            <th width="10%" style="text-align: center;">被邀約人</th>
                            <th width="10%" style="text-align: center;">被邀約會館</th>
                            <th width="8%" style="text-align: center;">約會會館</th>
                            <th>詳細時間 / 內容</th>
                            <th width="5%" style="text-align: center;">狀態</th>
                            <th width="8%">　</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ( count($result_list) == 0 ){
                            echo "<tr><td colspan='8' height='200'>目前沒有資料</td></tr>";
                        }else{
                            foreach($result_list as $re_list){
                                $selfix2 = 0;
                                $see_phone = 0;
                                $mem_phone = "";
                                $mem_phone2 = "";
                                $SQL1 = "Select mem_name,mem_mobile,web_endtime From member_data Where mem_num=".$re_list["mnum"];
                                $rs1 = $SPConn->prepare($SQL1);
                                $rs1->execute();
                                $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
                                foreach($result1 as $re1);
                                if ( count($result1) > 0 ){
                                    $mem_name = $re1["mem_name"];
                                    $mem_phone = "<br><u>".$re1["mem_mobile"]."</u>";
                                    $web_endtime = $re1["web_endtime"];
                                }
                                $SQL1 = "Select mem_name,mem_mobile,web_endtime From member_data Where mem_num=".$re_list["tnum"];
                                $rs1 = $SPConn->prepare($SQL1);
                                $rs1->execute();
                                $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
                                foreach($result1 as $re1);                                
                                if ( count($result1) > 0 ){
                                    $mem_name2 = $re1["mem_name"];
                                    $mem_phone2 = "<br><u>".$re1["mem_mobile"]."</u>";
                                    $web_endtime2 = $re1["web_endtime"];
                                }
                                if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
                                    $see_phone = 1;
                                }

                                if ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" || $_SESSION["MM_UserAuthorization"] == "love" ){
                                    if ( $re_list["datebranch"] == $_SESSION["branch"] ){
                                        $see_phone = 1;
                                        $selfix2 = 1;
                                    }
                                }

                                if ( $t == 1 ){
                                    if ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" || $_SESSION["MM_UserAuthorization"] == "love" ){
                                        if ( $re_list["mbranch"] == $_SESSION["branch"] ){
                                            $see_phone = 1;
                                            $selfix2 = 1;
                                        }
                                    }
                                }

                                if ( $see_phone == 0 ){
                                    $mem_phone = "";
                                    $mem_phone2 = "";
                                }

                                $statmsg = "";
                                $statmsg = $statmsg . $mem_name."於 ".date("Y-m-d H:i",strtotime($re_list["times"]))." 發出邀請";
                                if ( $re_list["statstime2"] != "" && chkDate($re_list["statstime2"]) ){
                                    if ( $re_list["stats"] == 1 ){
                                        $statmsg = $statmsg."<br>".$mem_name2."於 ".date("Y-m-d H:i",strtotime($re_list["statstime2"]))." 拒絕邀請";
                                    }else{
                                        $statmsg = $statmsg."<br>".$mem_name2."於 ".date("Y-m-d H:i",strtotime($re_list["statstime2"]))." 同意邀請";
                                    }
                                }

                                $selfix = 0;
                                $nouse = 0;
                                $dayadd15 = date('Y-m-d H:i:s', strtotime ("+15 day", $re_list["times"]));

                                if ( $re_list["stats"] == 0 ){
                                    $days = ( $dayadd15-strtotime(date("Y-m-d")))/86400;
                                    if ( $days <= 0 ){
                                        $nouse = 1;
                                    }
                                    $statmsg = $statmsg.$mem_name."對".$mem_name2."發起約會邀請，正在等待".$mem_name2."同意 - ".date("Y-m-d H:i",strtotime($re_list["times"]));
                                }elseif ( $re_list["stats"] == 1 ){
                                    $statmsg = $statmsg.$mem_name."對".$mem_name2."發起約會邀請，".$mem_name2."已經拒絕 - ".date("Y-m-d H:i",strtotime($re_list["times"]));
                                }elseif ( $re_list["stats"] == 2 ){
                                    $days = ( $dayadd15-strtotime(date("Y-m-d")))/86400;
                                    if ( $days <= 0 ){
                                        $nouse = 1;
                                    }
                                    if ( $re_list["datetime_stat"] == 2 ){
                                        $statmsg = $statmsg."<br>雙方選定 ".date("Y-m-d H:i",strtotime($re_list["datetime_real"]))." 到 ".$re_list["datebranch"]."會館 約會";
                                        $statmsg = $statmsg."<br><font color='red'>正在等待<b>".$re_list["datebranch"]."會館</b>秘書與雙方聯絡</font>";
                                        $selfix = 1;
                                        $nouse = 0;
                                    }elseif ( $re_list["datetime_stat"] == 1 ){
                                        $statmsg = $statmsg."<br>正在等候".$mem_name."重新選擇約會時間";
                                        $nouse = 0;
                                    }else{
                                        $statmsg = $statmsg."<br>正在等候".$mem_name."選擇約會時間";
                                        $nouse = 0;
                                    }
                                }elseif ( $re_list["stats"] == 4 || $re_list["stats"] == 8 ){
                                    if ( $re_list["datetime_stat"] == 2 ){
                                        $statmsg = $statmsg."<br>雙方選定 ".date("Y-m-d H:i",strtotime($re_list["datetime_real"]))." 到 ".$re_list["datebranch"]."會館 約會";
                                    }
                                    if ( $re_list["statstime3"] != "" ){
                                        if ( chkDate($re_list["statstime3"]) ) {
                                            $statmsg = $statmsg."<br>秘書已於 ".date("Y-m-d H:i",strtotime($re_list["statstime3"]))." 與雙方聯絡完畢並轉入";
                                        }
                                    }
                                    if ( $re_list["invite_stats"] != "" ){
                                        $statmsg = $statmsg."<br><strong><font color='blue'>結果：".invite_stats($re_list["invite_stats"])."</font></strong>";
                                    }else{
                                        $statmsg = $statmsg."<br><font color=purple>結果：約會未成功</font>";
                                    }
                                }else{
                                    $statmsg = $statmsg."<br>雙方選定 ".strtotime($re_list["datetime_real"])." 到 ".$re_list["datebranch"]."會館 約會";
                                    $statmsg = $statmsg."<br><font color=blue>秘書於 ".strtotime("Y-m-d",$re_list["statstime3"])." 已與雙方聯絡完畢並將資料轉入排約預訂表</font>";
                                }
                                
                                if ( $nouse == 1 ){
                                    $statmsg = $statmsg."<br><font color='red'>本筆邀約已超過 15 天已失效。</font>";
                                    $mem_phone = "";
                                    $mem_phone2 = "";
                                }

                                if ( chkDate($web_endtime) ){
                                    $date1 = date_create($web_endtime);
                                    $date2 = date_create(date("Y-m-d"));
                                    $diff = date_diff($date2,$date1);
                                    $web_time_diff = $diff->format("%R%a");
                                    if ( $web_time_diff > 0 ){
                                        $web_time = "&nbsp;<span style='background-color:green; color:white;'>".str_replace("+","",$web_time_diff)."天";
                                    }else{
                                        $web_time = "&nbsp;<span style='background-color:red; color:white;'>過期</span>";
                                    }
                                }

                                if ( chkDate($web_endtime2) ){
                                    $date1 = date_create($web_endtime2);
                                    $date2 = date_create(date("Y-m-d"));
                                    $diff = date_diff($date2,$date1);
                                    $web_time_diff2 = $diff->format("%R%a");
                                    if ( $web_time_diff2 > 0 ){
                                        $web_time2 = "&nbsp;<span style='background-color:green; color:white;'>".str_replace("+","",$web_time_diff2)."天";
                                    }else{
                                        $web_time2 = "&nbsp;<span style='background-color:red; color:white;'>過期</span>";
                                    }
                                }
                            
                            ?>
                                <tr> <div style="background-color:violet; color:darkred">
                                    <td align="center">
                                        <a href="ad_mem_detail.php?mem_num=<?php echo $re_list["mnum"];?>" target="_blank">
                                        <?php echo $mem_name;?></a><?php echo $mem_phone;?><?php echo $web_time;?>
                                    </td>
                                    <td align="center"><?php echo $re_list["mbranch"];?> - <?php echo SingleName($re_list["msingle"],"normal");?></td>
                                    <td align="center">
                                        <a href="ad_mem_detail.php?mem_num=<?php echo $re_list["tnum"];?>" target="_blank">
                                        <?php echo $mem_name2;?></a><?php echo $mem_phone2;?><?php echo $web_time2;?>
                                    </td>
                                    <td align="center"><?php echo $re_list["tbranch"];?> - <?php echo SingleName($re_list["tsingle"],"normal");?></td>
                                    <td align="center"><?php echo $re_list["datebranch"];?></td>
                                    <td align="left"><?php echo $statmsg;?></td>
                                    <td align="center"></td>
                                    <td align="center" style="color: #207e77;">
                                        <strong><?php echo $re_list["stats"]."-".$re_list["datetime_stat"]."-".$re_list["invite_stats"]."-".$re_list["auton"];?></strong>
                                        <?php if ( ($selfix == 1 && $selfix2 == 1) || $_SESSION["MM_Username"] == "TSAIWEN216" ) { ?>
                                            <div class="btn-group">
                                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="#set" onclick="Mars_popup('ad_singleparty_invite_list_set.php?st=read&a=<?php echo $re_list["auton"];?>&keyword1=<?php echo $re_list["mnum"];?>&keyword2=<?php echo $re_list["tnum"];?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=700,height=550,top=10,left=10');">設定排約時間</a></li>
                                                    <?php if ( $_SESSION["MM_UserAuthorization"] == "admin" ){?>
                                                        <li><a href="#del" onclick="Mars_popup2('ad_singleparty_invite_list.php?st=del&an=<?php echo $re_list["auton"];?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=300,height=150,top=10,left=10');">刪除</a></li>
                                                    <?php }?>
                                                </ul>
                                                </div>
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
    <!--/row-->
</section>
<!-- /MIDDLE -->
<?php require_once("./include/_bottom.php");?>