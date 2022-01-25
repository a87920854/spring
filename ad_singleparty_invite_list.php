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

//接收值
$st = SqlFilter($_REQUEST["st"],"tab");
$an = SqlFilter($_REQUEST["an"],"int");
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
    $SQL_d = "Delect From si_invite Where auton=".$an;
    $rs_d = $SPConn->prepare($SQL_d);
    $rs_d -> execute();        
    reURL("reload_window.asp?m=資料刪除中...");
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
    $acre_sign2 = $times2 . " 00:00";
    $acre_sign2 = $times2;
    if ( ! chkDate($acre_sign2) ){
        call_alert("結束日期有誤。", 0, 0);
    }
}

//default_sql_num = 500
/*If request("vst") = "full" Then
    sqlv = "*"
    sqlv2 = "count(auton)"
Else
    sqlv = "top "&default_sql_num&" *"
    sqlv2 = "count(auton)"
End If    */

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
    $subSQL .= "And (mbranch Like '%".$branch."%' Or tbranch Like '%"$branch."%' Or datebranch Like '%".$branch."%')";
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
$SQL = "Select count(auton) As total_size From si_invite Where".$subSQL;
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
    $count_href = "　<a href='?vst=n'>[查看前五百筆]</a>";
}else{
    if ( $total_size > 500 ){ $total_size = 500;}
    $count_href = "　<a href='?vst=full'>[查看完整清單]</a>";
}

//取得分頁資料
$tPageSize = 20; //每頁幾筆
$tPage = 1; //目前頁數
$tPage_list = 0;
if ( $tPage > 1 ){ 
    $tPage = $tPage;
    $tPage_list = ($tPage-1);
}

//分頁程式
$SQL_list  = "Select Top ".$tPageSize." * ";
$SQL_list .= "From (Select row_number() ";
$SQL_list .= "over(".$orderSQL.") As rownumber ";
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
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">會館約會</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <?php
        $linkd1 = " disabled";
        $linkd2 = "";
        $linkd1h = "javascript:void(0)";
        $linkd2h = "ad_singleparty_invite_list.asp?t=1";
        $head_t = "等待秘書聯繫";
        if ( $t == "1" ){
            $linkd1 = "";
            $linkd2 = " disabled";
            $linkd1h = "ad_singleparty_invite_list.asp";
            $linkd2h = "javascript:void(0)";
            $head_t = "已邀約未同意";
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會館約會 - <?php echo $head_t;?> - 數量：<?php echo $total_size;?></strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <p>
                        <a href="<?php echo $linkd1h;?>" class="btn btn-success" <?php echo $linkd1;?>>等待秘書聯繫</a>&nbsp;
                        <a href="<?php echo $linkd2h;?>" class="btn btn-info" <?php echo $linkd2;?>>已邀約未同意</a>
                    </p>
                    <form name="form1" method="post" action="?vst=full" class="form-inline">
                        <p>
                            排約日期：
                            <input type="text" class="datepicker" autocomplete="off" name="times1" value="<?php echo $vacre_sign1;?>" autocomplete="off">
                            ～ 
                            <input type="text" class="datepicker" autocomplete="off" name="times2" value="<?php echo $vacre_sign2;?>" autocomplete="off">
                            
                            <?php
                            if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
                                //會館資料
                                $SQL = "Select * From branch_data Where auto_no<>10 Order By admin_Sort";
                                $rs = $SPConn->prepare($SQL);
                                $rs->execute();
                                $result = $rs->fetchAll(PDO::FETCH_ASSOC);?>
                                <select name="branch" id="branch">
                                    <option value="">請選擇會館</option>
                                    <?php
                                        foreach($result as $re){
                                            echo "<option value='".$re["admin_name"]."'>".$re["admin_name"]."</option>";
                                        }
                                    ?>
                                </select>
                                <select name="single" id="single">
                                    <option value="">請選擇秘書</option>
                                </select>
                                <input type="text" name="keyword" placeholder="編號" class="form-control" value="<?php echo $keyword;?>">
                            <?php }?>
                            <input type="submit" value="送出" class="btn btn-default">
                        </p>
                    </form>
                    <p style="color:blue">受理會館務必與<font color=red>發起人及被邀約人</font>兩方都聯絡確認後，才能設定排約時間。<br>如果有一方不願排約或取消，請一樣設定排約時間後再到排約預定表中選取取消原因。</p>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr>
                            <th width=160>發起人</th>
                            <th width=120>發起人會館</th>
                            <th width=160>被邀約人</th>
                            <th width=120>被邀約會館</th>
                            <th width=120>約會會館</th>
                            <th>詳細時間</th>
                            <th>狀態</th>
                            <th width="100">　</th>
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
                                    $mem_phone = "<br>[".$re1["mem_mobile"]."]";
                                    $web_endtime = $re1["web_endtime"];
                                }
                                $SQL1 = "Select mem_name,mem_mobile,web_endtime From member_data Where mem_num=".$re_list["tnum"];
                                $rs1 = $SPConn->prepare($SQL1);
                                $rs1->execute();
                                $result1 = $rs1->fetchAll(PDO::FETCH_ASSOC);
                                foreach($result1 as $re1);                                
                                if ( count($result1) > 0 ){
                                    $mem_name2 = $re1["mem_name"];
                                    $mem_phone2 = "<br>[".$re1["mem_mobile"]."]";
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
                                $statmsg = $statmsg . $mem_name."於 ".strtotime($re_list["times"])." 發出邀請";
                                if ( $re_list["statstime2"] != "" && chkDate($re_list["statstime2"]) ){
                                    if ( $re_list["stats"] == 1 ){
                                        $statmsg = $statmsg."<br>".$mem_name2."於 ".strtotime($re_list["statstime2"])." 拒絕邀請";
                                    }else{
                                        $statmsg = $statmsg."<br>".$mem_name2."於 ".strtotime($re_list["statstime2"])." 同意邀請";
                                    }
                                }

                                $selfix = 0;
                                $nouse = 0;
                                $dayadd15 = date('Y-m-d H:i:s', strtotime ("+15 day", $re_list["times"]));

                                if ( $re_list["stats"] == 0 ){
                                    $days = ( $dayadd15-strtotime(date()))/86400;
                                    if ( $days <= 0 ){
                                        $nouse = 1;
                                    }
                                    $statmsg = $statmsg.$mem_name."對".$mem_name2."發起約會邀請，正在等待".$mem_name2."同意 - ".strtotime($re_list["times"]);
                                }elseif ( $re_list["stats"] == 1 ){
                                    $statmsg = $statmsg.$mem_name."對".$mem_name2."發起約會邀請，".$mem_name2."已經拒絕 - ".strtotime($re_list["times"]);
                                }elseif ( $re_list["stats"] == 2 ){
                                    $days = ( $dayadd15-strtotime(date()))/86400;
                                    if ( $days <= 0 ){
                                        $nouse = 1;
                                    }
                                    if ( $re_list["datetime_stat"] == 2 ){
                                        $statmsg = $statmsg."<br>雙方選定 ".strtotime($re_list["datetime_real"])." 到 ".$re_list["datebranch"]."會館 約會";
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
                                        $statmsg = $statmsg."<br>雙方選定 ".strtotime($re_list["datetime_real"])." 到 ".$re_list["datebranch"]."會館 約會";
                                    }
                                    if ( $re_list["statstime3"] != "" ){
                                        if ( chkDate($re_list["statstime3"]) ) {
                                            $statmsg = $statmsg."<br>秘書已於 ".strtotime($re_list["statstime3"])." 與雙方聯絡完畢並轉入";
                                        }
                                    }
                                    if ( $re_list["invite_stats"] != "" ){
                                        $statmsg = $statmsg."<br><font color='purple'>結果：".invite_stats($re_list["invite_stats"])."</font>";
                                    }else{
                                        $statmsg = $statmsg."<br><font color=purple>結果：約會未成功</font>";
                                    }
                                }else{
                                    $statmsg = $statmsg."<br>雙方選定 ".strtotime($re_list["datetime_real"])." 到 ".$re_list["datebranch"]."會館 約會";
                                    $statmsg = $statmsg."<br><font color=blue>秘書於 ".strtotime($re_list["statstime3"])." 已與雙方聯絡完畢並將資料轉入排約預訂表</font>";
                                }
                                
                                if ( $nouse == 1 ){
                                    $statmsg = $statmsg."<br><font color='red'>本筆邀約已超過 15 天已失效。</font>";
                                    $mem_phone = "";
                                    $mem_phone2 = "";
                                }

                                if ( chkDate($web_endtime) ){
                                    $web_time_diff = ( $web_endtime-strtotime(date()))/86400;
                                    if ( $web_time_diff > 0 ){
                                        $web_time = "/".$web_time_diff."天";
                                    }else{
                                        $web_time = "/<font color='red'>過期</font>";
                                    }
                                }

                                if ( chkDate($web_endtime2) ){
                                    $web_time_diff = ( $web_endtime2-strtotime(date()))/86400;
                                    if ( $web_time_diff2 > 0 ){
                                        $web_time2 = "/".$web_time_diff2."天";
                                    }else{
                                        $web_time2 = "/<font color='red'>過期</font>";
                                    }
                                }
                            }
                        }
                        ?>
                        <tr> 
                            <td align="center">
                                <a href="ad_mem_detail.asp?mem_num=<?php echo $re_list["mnum"];?>" target="_blank">
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
                            <td align="center">
    	                        <?php $re_list["stats"]."-".$re_list["datetime_stat"]."-".$re_list["invite_stats"]."-".$re_list["auton"];?>
    	                        <%if (selfix = 1 and selfix2 = 1) or (Session("MM_Username")="KYOE") or (Session("MM_Username")="SHEERY03130513") then%>
			    		<div class="btn-group">
							<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
							<ul class="dropdown-menu pull-right">
                <li><a href="#set" onclick="Mars_popup('ad_singleparty_invite_list_set.asp?st=read&a=<%=rs("auton")%>&keyword1=<%=rs("mnum")%>&keyword2=<%=rs("tnum")%>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=700,height=550,top=10,left=10');">設定排約時間</a></li>
                <%if Session("MM_UserAuthorization")="admin" then%>
                <li><a href="#del" onclick="Mars_popup2('ad_singleparty_invite_list.asp?st=del&an=<%=rs("auton")%>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=300,height=150,top=10,left=10');">刪除</a></li>
                <%end if%>
              </ul>
						</div>
						<%end if%>
   </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1826609" target="_blank">謝穎成</a><br>[0933252789]/12天</td>
                            <td align="center">八德 - 八德督導</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1869129" target="_blank">邱佩娟</a><br>[0933713603]/<font color=red>過期</font>
                            </td>
                            <td align="center">八德 - 蔡佩蓁 Sunny</td>
                            <td align="center">八德</td>
                            <td align="left">
                                謝穎成於 2020-07-01 22:14 發出邀請<br>邱佩娟於 2020-07-02 08:22 同意邀請<br>雙方選定 2020-07-05 13:00 到 八德會館 約會<br>秘書已於 2020-07-02 21:05 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-30557
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1108089" target="_blank">陸裕慶</a><br>[0922260191]/<font color=red>過期</font>
                            </td>
                            <td align="center">八德 - 八德督導</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1916756" target="_blank">陳云嫆</a><br>[0910368482]/267天</td>
                            <td align="center">台北 - 張茹茵</td>
                            <td align="center">台北</td>
                            <td align="left">
                                陸裕慶於 2020-05-31 01:00 發出邀請<br>陳云嫆於 2020-06-01 19:50 同意邀請<br>雙方選定 2020-06-06 15:00 到 台北會館 約會<br>秘書已於 2020-06-02 14:33 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：等待回報</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                4-2-0-30435
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1860282" target="_blank">何國睿X</a><br>[0988413228]/<font color=red>過期</font>
                            </td>
                            <td align="center">八德 - 蔡佩蓁 Sunny</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1902625" target="_blank">陳映禎</a><br>[0955268864]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 江琳</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                何國睿X於 2020-04-10 11:38 發出邀請<br>陳映禎於 2020-04-10 16:08 同意邀請<br>雙方選定 2020-04-18 14:00 到 桃園會館 約會<br>秘書已於 2020-04-22 14:57 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-26054
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1895819" target="_blank">余明芬</a><br>[0928737271]/206天</td>
                            <td align="center">台北 - 易珊</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1848708" target="_blank">廖正興</a><br>[0927206566]/<font color=red>過期</font>
                            </td>
                            <td align="center">台北 - 高語鍹</td>
                            <td align="center">台北</td>
                            <td align="left">
                                余明芬於 2020-03-23 16:56 發出邀請<br>廖正興於 2020-03-23 17:05 同意邀請<br>雙方選定 2020-04-06 20:00 到 台北會館 約會<br>
                                <font color=purple>結果：等待回報</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                4-2-0-25939
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1839699" target="_blank">王其文</a><br>[0985365682]/<font color=red>過期</font>
                            </td>
                            <td align="center">八德 - 周靖雯 Bella</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1598498" target="_blank">許家榛</a><br>[0917132271]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                王其文於 2019-12-19 17:53 發出邀請<br>許家榛於 2019-12-19 22:26 同意邀請<br>雙方選定 2019-12-24 19:00 到 桃園會館 約會<br>秘書已於 2019-12-20 17:39 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-22288
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1839699" target="_blank">王其文</a><br>[0985365682]/<font color=red>過期</font>
                            </td>
                            <td align="center">八德 - 周靖雯 Bella</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1598498" target="_blank">許家榛</a><br>[0917132271]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                王其文於 2019-11-29 15:59 發出邀請<br>許家榛於 2019-11-29 16:15 同意邀請<br>雙方選定 2019-12-05 19:00 到 桃園會館 約會<br>秘書已於 2019-11-29 16:42 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：主約人取消</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                4-2-3-22196
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1829497" target="_blank">謝承原</a><br>[0989425875]/10天</td>
                            <td align="center">桃園 - 江琳</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1827335" target="_blank">許薽尹</a><br>[0910609906]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                謝承原於 2019-11-14 23:55 發出邀請<br>許薽尹於 2019-11-18 17:44 同意邀請<br>雙方選定 2019-11-30 14:00 到 桃園會館 約會<br>秘書已於 2019-11-19 13:45 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-22085
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1607336" target="_blank">何冠威</a><br>[0910278039]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 江琳</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1827335" target="_blank">許薽尹</a><br>[0910609906]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                何冠威於 2019-11-08 00:01 發出邀請<br>許薽尹於 2019-11-12 16:49 同意邀請<br>雙方選定 2019-11-16 15:00 到 桃園會館 約會<br>秘書已於 2019-11-12 19:02 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-22040
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1108089" target="_blank">陸裕慶</a><br>[0922260191]/<font color=red>過期</font>
                            </td>
                            <td align="center">八德 - 張利 Liz</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1598498" target="_blank">許家榛</a><br>[0917132271]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                陸裕慶於 2019-09-28 23:03 發出邀請<br>許家榛於 2019-09-28 23:49 同意邀請<br>雙方選定 2019-10-03 15:00 到 桃園會館 約會<br>秘書已於 2019-09-29 14:49 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-19801
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1583781" target="_blank">梁智勇</a><br>[0966009699]/161天</td>
                            <td align="center">台中 - 林彥妤</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1835434" target="_blank">許玲毓</a><br>[0928052566]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                梁智勇於 2019-09-13 21:59 發出邀請<br>許玲毓於 2019-09-13 22:01 同意邀請<br>雙方選定 2019-09-29 15:00 到 桃園會館 約會<br>秘書已於 2019-10-01 18:13 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-18735
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1546178" target="_blank">姜志輝</a><br>[0982185977]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1827335" target="_blank">許薽尹</a><br>[0910609906]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                姜志輝於 2019-08-24 20:24 發出邀請<br>許薽尹於 2019-08-25 16:33 同意邀請<br>雙方選定 2019-09-12 19:00 到 桃園會館 約會<br>秘書已於 2019-08-26 14:49 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-17618
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1509041" target="_blank">巴克斯-許士豪</a><br>[0912345280]/<font color=red>過期</font>
                            </td>
                            <td align="center">總管理處 - 點點</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1509046" target="_blank">巴克斯-吳雅義</a><br>[0912345283]/<font color=red>過期</font>
                            </td>
                            <td align="center">總管理處 - 點點</td>
                            <td align="center">高雄</td>
                            <td align="left">
                                巴克斯-許士豪於 2019-08-14 14:11 發出邀請<br>巴克斯-吳雅義於 2019-08-14 14:38 同意邀請<br>雙方選定 2019-08-17 14:00 到 高雄會館 約會<br>秘書已於 2019-08-15 13:59 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-17548
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1509041" target="_blank">巴克斯-許士豪</a><br>[0912345280]/<font color=red>過期</font>
                            </td>
                            <td align="center">總管理處 - 點點</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1509238" target="_blank">巴克斯-王蕙吟</a><br>[0918757262]/<font color=red>過期</font>
                            </td>
                            <td align="center">總管理處 - 點點</td>
                            <td align="center">台南</td>
                            <td align="left">
                                巴克斯-許士豪於 2019-08-14 11:41 發出邀請<br>巴克斯-王蕙吟於 2019-08-14 11:44 同意邀請<br>雙方選定 2019-08-18 12:00 到 台南會館 約會<br>秘書已於 2019-08-15 13:59 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-17546
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1520293" target="_blank">林志傳</a><br>[0919045290]/<font color=red>過期</font>
                            </td>
                            <td align="center">台北 - 張茹茵</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1597002" target="_blank">蔡愛平WM</a><br>[0915888008]/<font color=red>過期</font>
                            </td>
                            <td align="center">八德 - 周靖雯 Bella</td>
                            <td align="center">八德</td>
                            <td align="left">
                                林志傳於 2019-08-10 23:05 發出邀請<br>蔡愛平WM於 2019-08-16 16:45 同意邀請<br>雙方選定 2019-08-31 16:00 到 八德會館 約會<br>秘書已於 2019-08-20 16:15 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-16506
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1613473" target="_blank">張昱政</a><br>[0928253076]/<font color=red>過期</font>
                            </td>
                            <td align="center">八德 - 蔡佩蓁 Sunny</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1598498" target="_blank">許家榛</a><br>[0917132271]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                張昱政於 2019-07-24 21:30 發出邀請<br>許家榛於 2019-07-25 00:05 同意邀請<br>雙方選定 2019-08-12 18:00 到 桃園會館 約會<br>秘書已於 2019-07-30 17:43 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-15369
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1546178" target="_blank">姜志輝</a><br>[0982185977]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1619412" target="_blank">賴怡文</a><br>[0910216549]/<font color=red>過期</font>
                            </td>
                            <td align="center">台北 - 易珊</td>
                            <td align="center">台北</td>
                            <td align="left">
                                姜志輝於 2019-07-22 10:26 發出邀請<br>賴怡文於 2019-07-27 18:20 同意邀請<br>雙方選定 2019-08-04 14:00 到 台北會館 約會<br>秘書已於 2019-07-27 20:29 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-15348
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1546178" target="_blank">姜志輝</a><br>[0982185977]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1561326" target="_blank">陳玟嵐</a><br>[0968919075]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                姜志輝於 2019-07-22 09:37 發出邀請<br>陳玟嵐於 2019-07-22 20:29 同意邀請<br>雙方選定 2019-07-27 17:00 到 桃園會館 約會<br>秘書已於 2019-07-23 13:59 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-15346
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1519286" target="_blank">葉倫宇</a><br>[0970707638]/<font color=red>過期</font>
                            </td>
                            <td align="center">台南 - 杜佳倩</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1617150" target="_blank">張玟玉</a><br>[0976820203]/<font color=red>過期</font>
                            </td>
                            <td align="center">台南 - 錢淑華</td>
                            <td align="center">台南</td>
                            <td align="left">
                                葉倫宇於 2019-07-08 09:38 發出邀請<br>張玟玉於 2019-07-15 16:25 同意邀請<br>雙方選定 2019-07-29 20:00 到 台南會館 約會<br>秘書已於 2019-07-26 20:36 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-15270
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1601611" target="_blank">吳耀庭</a><br>[0982659664]/<font color=red>過期</font>
                            </td>
                            <td align="center">台中 - 亞芳</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1619352" target="_blank">王湘誼</a><br>[0903524017]/<font color=red>過期</font>
                            </td>
                            <td align="center">台南 - 杜佳倩</td>
                            <td align="center">台中</td>
                            <td align="left">
                                吳耀庭於 2019-07-08 00:16 發出邀請<br>王湘誼於 2019-07-08 07:10 同意邀請<br>雙方選定 2019-07-20 15:00 到 台中會館 約會<br>秘書已於 2019-07-15 14:01 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：排約對象取消</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                4-2-7-15269
                            </td>
                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 71 筆、第 1 頁／共 4 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_singleparty_invite_list.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_singleparty_invite_list.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_singleparty_invite_list.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_singleparty_invite_list.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_singleparty_invite_list.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_singleparty_invite_list.php?topage=4 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_singleparty_invite_list.php?topage=1" selected>1</option>
                            <option value="/ad_singleparty_invite_list.php?topage=2">2</option>
                            <option value="/ad_singleparty_invite_list.php?topage=3">3</option>
                            <option value="/ad_singleparty_invite_list.php?topage=4">4</option>
                        </select></li>
                </ul>
            </div>

        </div>
        <!--/span-->

    </div>
    <!--/row-->
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php")
?>