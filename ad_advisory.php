<?php
/***************************************/
//檔案名稱：ad_advisory.php
//後台對應位置：排約/記錄功能 → 諮詢記錄表
//改版日期：2022.02.16
//改版設計人員：Jack
//改版程式人員：Queena
/***************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//麵包屑
$unitprocess = $m_home.$icon."排約/記錄功能".$icon."諮詢記錄表";

//接收值
$st = SqlFilter($_REQUEST["st"],"tab");
$an = SqlFilter($_REQUEST["an"],"tab");
$time1 = SqlFilter($_REQUEST["time1"],"tab");
$time2 = SqlFilter($_REQUEST["time2"],"tab");
$qtime1 = SqlFilter($_REQUEST["qtime1"],"tab");
$qtime2 = SqlFilter($_REQUEST["qtime2"],"tab");
$branch = SqlFilter($_REQUEST["branch"],"tab");
$single = SqlFilter($_REQUEST["single"],"tab");
$s8 = SqlFilter($_REQUEST["s8"],"tab");
$vst = SqlFilter($_REQUEST["vst"],"tab");

//20211224 add by Queena 跨區諮詢設定
if ( $_SESSION["area_branch"] != "" ){
	$area_branch = str_replace(str_replace($_SESSION["area_branch"]," ",""), ",", "','");
}
            
//刪除
if ( $st == "del" ){
    $SQL = "Select * From ad_advisory Where auton='".$an."'";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);
    if ( count($result) > 0 ){    
    	$acre_auto = $re["acre_auto"];
        $SQL_d = "Delete From ad_advisory Where auton='".$an."'";
        $rs_d = $SPConn->prepare($SQL_d);
        $rs_d->execute();
    }
    
	if ( $acre_auto != "" ){
        $SQL_d = "Delete From ac_data_re Where acre_auto='".$acre_auto."'";
        $rs_d = $SPConn->prepare($SQL_d);
        $rs_d->execute();
    }
    reURL("reload_window.php?m=資料刪除中...");
	exit;
}

//判斷日期
if ( $time1 != "" ){
	$time1 = $time1;
    if ( chkDate($time1) == false ){
		call_alert("起始日期有誤。", 0, 0);
	}
}

if ( $time2 != "" ){
	$time2 = $time2;
	if ( chkDate($time2) == false ){
		call_alert("結束日期有誤。", 0, 0);
    }
}

if ( $qtime1 != "" ){
	$qtime1 = $qtime1;
	if ( chkDate($qtime1) == false ){
		call_alert("起始日期有誤。", 0, 0);
    }
}

if ( $qtime2 != "" ){
	$qtime2 = $qtime2;
	if ( chkDate($qtime2) == false ){
		call_alert("結束日期有誤。", 0, 0);
    }
}

//語法
if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
    $subSQL1 = "1=1 ";
}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "action" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "pay" || $_SESSION["MM_UserAuthorization"] == "teacher" ){
    if ( $_SESSION["area_branch"] == "" || is_Null($_SESSION["area_branch"]) ){
        $subSQL1 = "mem_branch='".$_SESSION["branch"]."' ";
    }else{
        $subSQL1 = "1=1 ";
    }
}

//日期+語法
if ( chkDate($time1) && chkDate($time2) ){
    $days = (strtotime($time2)-strtotime($time1))/86400;
    if ( $days < 0 ){
        call_alert("結束時間不能大於起始時間。", 0, 0);
    }
    $subSQL1 .= "And itimes between '".$time1." 00:00' and '".$time2." 23:59' ";
}

if ( chkDate($qtime1) && chkDate($qtime2) ){
    $days = (strtotime($qtime2)-strtotime($qtime1))/86400;
    if ( $days < 0 ){
        call_alert("結束時間不能大於起始時間。", 0, 0);
    }
    $subSQL1 .= "And times between '".$qtime1." 00:00' and '".$qtime2." 23:59' ";
}

//篩選條件(會館)
if ( $branch != "" ){
    $subSQL1 .= "And (mem_branch Like '%".$branch."%' or ac_branch like '%".$branch."%') ";
 	if ( $_SESSION["area_branch"] == "" || $_SESSION["area_branch"] == NULL ){
	 	if ( substr($subSQL1,-1) != "1" ){
 			//$subSQL1 .= ") ";
        }
    }else{
		$subSQL1 .= "Or (mem_branch in ('".$area_branch."') or ac_branch in ('".$area_branch."')) ";
    }
}else{        
	if ( $_SESSION["area_branch"] != "" || $_SESSION["area_branch"] != NULL ){
		$subSQL1 .= "And (mem_branch in ('".$area_branch."') or ac_branch in ('".$area_branch."')) ";
    }
}
//篩選條件(祕書)
if ( $single != "" ){
	$subSQL1 .= "And mem_single Like '%".str_Replace("'", "''", $single)."%' ";
}

//篩選條件(講師)
if ( $s8 != "" ){
	$subSQL1 .= "And mem_who = '".$s8."'";
}

//篩選條件(關鍵字)
if ( $keyword != "" ){
	$subSQL1 .= "And (mem_name like N'%".str_Replace("'", "''", $keyword)."%' or mem_num like '%".str_Replace("'", "''", $keyword)."%') ";
}

//order by auton desc

//取得總筆數
$SQL = "Select count(auton) As total_size From ad_advisory Where ".$subSQL1;
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
    $count_href = "　<a href=\"javascript:full_btn('n');\" class='btn btn-success'>查看前五百筆</a>";
}else{
    if ( $total_size > 500 ){ $total_size = 500;}
    $count_href = "　<a href=\"javascript:full_btn('full');\" class='btn btn-success'>查看完整清單</a>";
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
$SQL_list .= "over(Order By auton Desc) As rownumber,itimes,types,ac_branch,mem_branch,mem_num,mem_name,pay_money,pay_money2,pay_money3,pay_money4,last_money,last_money2,mem_single,mem_wbranch,mem_who,times,auton ";
$SQL_list .= "From ad_advisory Where ".$subSQL1.") temp_row ";
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
            <h2 class="pageTitle">排約/記錄功能 》諮詢記錄表 》資料列表 [ <i style="color: #76192e;">共計 <?php echo $total_size."筆資料</i> ]"; if ( $total_size >= 500 ){ echo $count_href;}?></h2>
            
            <div class="panel-body">
                <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" name="searchform" id="searchform" class="form-inline">
                    <div class="m-search-bar">
                        <span class="span-group">
                            諮詢時間： <input type="text" name="time1" id="time1" class="datepicker" autocomplete="off" value="<?php echo $time1;?>"> 到 <input type="text" name="time2" id="time2" class="datepicker" autocomplete="off" value="<?php echo $time2;?>">
                        </span>
                        <span class="span-group">
                            紀錄時間： <input type="text" name="qtime1" id="qtime1" class="datepicker" autocomplete="off" value="<?php echo $qtime1;?>"> 到 <input type="text" name="qtime2" id="qtime2" class="datepicker" autocomplete="off" value="<?php echo $qtime2;?>">
                            <input name="keyword" id="keyword" type="text" class="form-control" placeholder="姓名/編號">
                        </span>
                        <br>
                        <span class="span-group">
                            諮詢會館：
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
                        <span class="span-group">
                            講師：
                            <select name="s8" id="s8" class="form-control">
                                <option value="">請選擇</option>
                                <?php
                                $SQL = "Select distinct mem_who From ad_advisory";
                                $rs = $SPConn->prepare($SQL);
                                $rs->execute();
                                $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                                foreach($result as $re){
                                    echo "<option value='".$re["mem_who"]."'";
                                    if ( $s8 == $re["mem_who"] ){ echo " selected";}
                                    echo ">".SingleName($re["mem_who"],"normal")."</option>";
                                }?>
                            </select>
                            <input type="submit" value="送出" class="btn btn-default">
                        </span>
                    </div>
                    <input type="hidden" name="vst" id="vst">
                </form>
                <span>
                    <strong style="background-color: yellow; color:brown">
                        ※排序欄位：系統編號(由大到小)。<br>
                        ※每頁20筆資料。
                    </strong>
                </span>
                <div class="panel-body">
                    <table class="table table-bordered bootstrap-datatable table-hover">
                        <thead>
                            <tr style="background-color: #FFDA96;">
                                <th width="12%">諮詢時間</th>
                                <th width="8%">諮詢類型</th>
                                <th width="12%">諮詢對象</th>
                                <th width="10%">諮詢費</th>
                                <th width="6%" style="text-align: center;">剩餘成本</th>
                                <th width="8%">新剩餘成本</th>
                                <th>會員會館秘書</th>
                                <th>講師會館</th>
                                <th>諮詢講師</th>
                                <th>紀錄時間</th>
                                <th width="8%">　</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ( count($result_list) == 0 ){?>
                                <tr><td colspan="10" height="200">目前沒有資料</td></tr>
                            <?php }else{
                                foreach($result_list as $re_list){ ?>
                                    <tr>
                                        <td><?php echo changeDate($re_list["itimes"]);?></td>  
                                        <td>
                                            <?php echo $re_list["types"];?>
                                            <?php if ( $re_list["ac_branch"] != "" ){ echo " - ".$re_list["ac_branch"];}?>
                                        </td>
                                        <td>
                                            <?php if ( $re_list["mem_branch"] == $_SESSION["branch"] || $_SESSION["MM_UserAuthorization"]  == "admin" ){ ?>
                                                <a href="ad_mem_detail.php?mem_num=<?php echo $re_list["mem_num"];?>" target="_blank"><?php echo $re_list["mem_name"];?>　[<?php echo $re_list["mem_num"];?>]</a>
                                            <?php }else{?>
                                                <?php echo $re_list["mem_name"];?>[<?php echo $re_list["mem_num"];?>]
                                            <?php }?>
                                        </td>
                                        <td>
                                            <?php
                                            if ( $re_list["pay_money"] > 0 ){
                                                echo "現金：".$re_list["pay_money"]." 元";
                                            }
                                            if ( $re_list["pay_money2"] > 0 ){
                                                echo "刷卡：".$re_list["pay_money2"]." 元";
                                            }
                                            if ( $re_list["pay_money3"] > 0 ){
                                                echo "抵用卷：".$re_list["pay_money3"]." 元";
                                            }
                                            if ( $re_list["pay_money4"] > 0 ){
                                                echo "新抵用卷：".$re_list["pay_money4"]." 元";
                                            }
                                            ?>
                                        </td>
                                        <td align="center"><?php echo $re_list["last_money"]." 元";?></td>
                                        <td><?php echo $re_list["last_money2"]." 元";?></td>
                                        <td><?php echo $re_list["mem_branch"];?>/<?php echo SingleName($re_list["mem_single"],"normal");?></td>
                                        <td align="center"><?php echo $re_list["mem_wbranch"];?></td>
                                        <td align="center"><?php echo SingleName($re_list["mem_who"],"normal");?></td>
                                        <td align="center"><?php echo $re_list["times"];?></td>    
                                        <td align="center">
                                            <div class="btn-group">
                                                <?php if ( $re_list["types"] != "活動取款" ){?>
                                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <?php if ( $_SESSION["MM_UserAuthorization"] == "admin" ){ ?>
                                                            <li><a href="javascript:Mars_popup('ad_advisory_fix.php?an=<?php echo $re_list["auton"];?>','','width=690,height=470,top=100,left=100')"><i class="icon-trash"></i> 修改</a></li>
                                                            <li><a href="javascript:Mars_popup2('ad_advisory.php?st=del&an=<?php echo $re_list["auton"];?>','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                                        <?php }elseif ( date("Y",$re_list["times"]) ==  date("Y") && date("m",$re_list["times"]) == date("m") ){ ?>
                                                            <li><a href="javascript:Mars_popup2('ad_advisory.php?st=del&an=<?php echo $re_list["auton"];?>','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                                        <?php }?>
                                                    </ul>
                                                <?php }else{?>
                                                    <span style="color: #A3A300;;">活動取款<br>無法修改及刪除</span>
                                                <?php }?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }?>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--include頁碼-->
	        <?php require_once("./include/_page.php"); ?>
        </div>
    </div>
</section>
<?php require_once("./include/_bottom.php"); ?>
<script language="JavaScript">
    function full_btn(vst_val){
        document.getElementById("vst").value = vst_val;
        searchform.submit();
    }
</script>