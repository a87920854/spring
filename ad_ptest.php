<?php
/****************************************/
//檔案名稱：ad_ptest.php
//後台對應位置：春天網站功能 > 愛的五種語言
//改版日期：2022.1.18
//改版設計人員：Jack
//改版程式人員：Queena
/****************************************/
require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//接收值
$st = SqlFilter($_REQUEST["st"],"tab");
$tv_auto = SqlFilter($_REQUEST["tv_auto"],"tab");
$times1 = SqlFilter($_REQUEST["times1"],"tab");
$times2 = SqlFilter($_REQUEST["times2"],"tab");
$branch = SqlFilter($_REQUEST["branch"],"tab");
$single = SqlFilter($_REQUEST["single"],"tab");
$test_branch = SqlFilter($_REQUEST["test_branch"],"tab");
$vst = SqlFilter($_REQUEST["vst"],"tab");

//刪除
if ( $st == "del" ){
    $SQL_d = "Delect From love_tv Where tv_auto=".$tv_auto;
    $rs_d = $SPConn->prepare($SQL_d);
    $rs_d->execute();
    reURL("reload_window.asp?m=資料刪除中...");
    exit;
}

if ( $times1 != "" ){
    $acre_sign1 = $times1;
    if ( ! chkDate($acre_sign1) ) {
        call_alert("起始日期有誤。",0,0);
    }
}

if ( $times2 != "" ){
    $acre_sign2 = $times2;
    if ( ! chkDate($acre_sign2) ) {
        call_alert("結束日期有誤。",0,0);
    }
}

//語法 "SELECT "&sqlv&" FROM ptest Where 1=1"
if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
    $subSQL1 = $subSQL1 . "1 = 1";
}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "action" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "pay" ){
    $subSQL1 = $subSQL1 . "(mem_branch= '".$_SESSION["branch"]."')";
}

//判斷日期起迄日
if ( chkDate($acre_sign1) && chkDate($acre_sign2) ){
    $days=(strtotime($acre_sign2)-strtotime($acre_sign1))/86400;
    if ( $days < 0 ){
        call_alert("結束日期不能大於起始日期。", 0, 0);
    }
    $subSQL1 = $subSQL1 . " And times Between '".$acre_sign1."' And '".$acre_sign2."'";
}

if ( $branch != "" ){ //會員會館
    $subSQL1 = $subSQL1 . " And (mem_branch = '".$branch."')";
}

if ( $single != "" ){ //祕書
    $subSQL1 = $subSQL1 . " And (mem_single = '".$single."')";
}

if ( $test_branch != "" ){ //受測會館
    $subSQL1 = $subSQL1 . " And (branch = '".$test_branch."')";
}

$subSQL2 = " Order By auton Desc";

//取得總筆數
$SQL = "Select count(auton) As total_size From ptest Where ".$subSQL1;
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result=$rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);
if ( count($result) == 0 || $re["total_size"] == 0 ) {
    $total_size = 0;
}else{
    $total_size = $re["total_size"];
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

//查看清單連結文字
if ( SqlFilter($_REQUEST["vst"],"tab") == "full" ){
    $count_href = "　<a href='?vst=n'>[查看前五百筆]</a>";
}else{
    if ( $total_size > 500 ){ $total_size = 500;}
    $count_href = "　<a href='?vst=full'>[查看完整清單]</a>";
}

//分頁語法
$SQL_list  = "Select Top ".$tPageSize." * ";
$SQL_list .= "From (Select row_number() ";
$SQL_list .= "over(Order By auton Desc) As rownumber,*";
$SQL_list .= "From ptest Where ".$subSQL1.") temp_row ";
$SQL_list .= "Where rownumber > ".($tPageSize*$tPage_list);
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
            <li class="active">愛的五種語言</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>愛的五種語言 - 數量：<?php echo $total_size.$count_href;?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form name="form1" method="post" action="?vst=full" class="form-inline">
                        <p>測驗日期：
                            <input type="text" class="datepicker" autocomplete="off" name="times1" value="<?php echo $times1;?>">
                            ～
                            <input type="text" class="datepicker" autocomplete="off" name="times2" value="<?php echo $times2;?>">
                        </p>
                        <p>
                            <?php
                            $SQL = "Select * From branch_data Where auto_no<>10 and auto_no<>12 Order By admin_Sort";
                            $rs = $SPConn->prepare($SQL);
                            $rs->execute();
                            $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            會員會館：
                            <select name="branch" id="branch">
                                <option value="">請選擇</option>
                                <?php foreach($result as $re){ ?>
			                        <option value="<?php echo $re["admin_name"];?>"<?php if ( SqlFilter($_REQUEST["branch"],"tab") == $re["admin_name"] ){?> selected<?php }?>><?php echo $re["admin_name"];?></option>
		                        <?php }?>
                            </select>
                            秘書：
                            <Select name="single" id="single" class="form-control">
                                <option value="">請選擇</option>
                            </select>
                            　　受測會館：
                            <select name="test_branch" id="test_branch">
                                <option value="">請選擇</option>
                                <?php foreach($result as $re){ ?>
			                        <option value="<?php echo $re["admin_name"];?>"<?php if ( SqlFilter($_REQUEST["branch"],"tab") == $re["admin_name"] ){?> selected<?php }?>><?php echo $re["admin_name"];?></option>
		                        <?php }?>
                            </select>

                            <input type="submit" value="送出" class="btn btn-default">
                        </p>
                    </form>
                </div>
                <span style="background-color: yellow; color:brown;"><strong>※排序欄位：資料庫編號(由大至小)排序。</strong></span>
                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr>
                            <th width="6%" style="text-align: center;">姓名</th>
                            <th width="10%" style="text-align: center;">會員會館 / 秘書</th>
                            <th width="15%" style="text-align: center;">受理會館 / 秘書</th>
                            <th width="5%"><div align="center">A</div></td>
                            <th width="5%"><div align="center">B</div></td>
                            <th width="5%"><div align="center">C</div></td>
                            <th width="5%"><div align="center">D</div></td>
                            <th width="5%"><div align="center">E</div></td>
                            <th width="10%" style="text-align: center;">受測時間</th>
                            <th width="5%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if ( count($result_list) == 0 ){
                            echo "<tr><td colspan='8' height='200'>目前沒有資料</td></tr>";
                        }else{
                            foreach($result_list as $re_list){ ?>
                                <tr> 
                                    <td align="center"><a href="ad_mem_detail.php?mem_num=<?php echo $re_list["mem_num"];?>" target="_blank"><?php echo $re_list["mem_name"];?></a></td>
                                    <td align="center"><?php echo $re_list["mem_branch"];?> - <?php echo SingleName($re_list["mem_single"],"normal");?></td>
                                    <td align="center"><?php echo $re_list["branch"];?> - <?php echo SingleName($re_list["single"],"normal");?></td>
                                    <td><div align="center"><?php echo $re_list["pa"];?></div></td>
                                    <td><div align="center"><?php echo $re_list["pb"];?></div></td>
                                    <td><div align="center"><?php echo $re_list["pc"];?></div></td>
                                    <td><div align="center"><?php echo $re_list["pd"];?></div></td>
                                    <td><div align="center"><?php echo $re_list["pe"];?></div></td>   
                                    <td align="center"><?php echo $re_list["times"];?></td>    
                                    <td align="center">
                                        <a href="ad_mem_ptest_print.php?id=<?php echo $re_list["auton"];?>" target="_blank">查看/列印</a>
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