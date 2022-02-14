<?php
/*****************************************/
//檔案名稱：ad_mem_singleparty_consult.php
//後台對應位置：約會專家功能->情感諮詢預約
//改版日期：2022.02.14
//改版設計人員：Jack
//改版程式人員：Queena
/*****************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//權限判斷
$auth_limit = 6;
require_once("./include/_limit.php");
check_page_power("ad_mem_singleparty_consult");

//麵包屑
$unitprocess = $m_home.$icon."約會專家功能".$icon."情感諮詢預約";

//接收值
$st = SqlFilter($_REQUEST["st"],"tab");
$an = SqlFilter($_REQUEST["an"],"tab");
$times1 = SqlFilter($_REQUEST["times1"],"tab");
$times2 = SqlFilter($_REQUEST["times2"],"tab");
$keyword_type = SqlFilter($_REQUEST["keyword_type"],"tab");
$keyword = SqlFilter($_REQUEST["keyword"],"tab");

//刪除
if ( $st == "del" ){
    $SQL_d = "Delete From si_salon_teacher_consult Where auton='".$an."'";
    $rs_d = $SPConn->prepare($SQL_d);
    $rs_d->execute();
    reURL("win_close.php?m=刪除中");
    exit;
}

//??
if ( $st =="fixc" ){
    $SQL = "Select * from si_salon_teacher_consult where auton='".$an."'";
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result = $rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);
    if ( count($result) > 0 ){
        $SQL_u = "Update si_salon_teacher_consult Set stat=1,t2='".strftime("%Y/%m/%d %H:%M:%S")."'";
        $rs_u = $SPConn->prepare($SQL_u);
        $rs_u->execute();        
    }
    reURL("win_close.php");
    exit;
}

//判斷日期
if ( $times1 != "" ){
    $acre_sign1 = $times1." 00:00";
    $vacre_sign1 = $times1;
    if ( chkDate($acre_sign1) == false ){
        call_alert("起始時間有誤。", 0, 0);
    }
}
if ( $times2 != "" ){
    $acre_sign2 = $times2." 23:59";
    $vacre_sign2 = $times2;
    if ( chkDate($acre_sign2) == false ){
        call_alert("結束時間有誤。", 0, 0);
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
End if
*/

//語法 sqls = "SELECT "&sqlv&" FROM si_salon_teacher_consult WHERE 1=1"
if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
    $subSQL1 = "Where 1=1 ";
}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
    $subSQL1 = "Where mbranch='".$_SESSION["branch"]."'";
}elseif ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "manager" ){
	$subSQL1 = "UPPER(msingle)='".strtoupper($_SESSION["MM_username"])."'";
}

if ( chkDate($acre_sign1) && chkDate($acre_sign2) ){
    $days = (strtotime($acre_sign2)-strtotime($acre_sign1))/86400;
    if ( $days < 0 ){
        call_alert("結束時間不能大於起始時間。", 0, 0);
    }
    $subSQL1 .= "And times Between '".$acre_sign1."' And '".$acre_sign2."'";
}

//篩選條件(姓名)
if ( $keyword_type == "s3" ){
    $subSQL1 .= "And (mname Like N'%".$keyword."%') ";
}
//篩選條件(編號)
if ( $keyword_type == "s4" ){
    $subSQL1 = "And (mem_num Like '%".$keyword."%') ";
}
//篩選條件(會館)
if ( $branch != "" ){
    $subSQL1 .= "And (mbranch='".$branch."') ";
    $tshow = $branch."會館";
}
//篩選條件(祕書)
if ( $single != "" ){
    $subSQL1 .= "And (msingle='".$single."') ";
}
if ( $tshow == "" ){
	$tshow = "所有會員";
}

//order by stat asc, times desc


//取得總筆數
$SQL = "Select count(auton) As total_size From si_salon_teacher_consult ".$subSQL1;
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result=$rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);
if ( count($result) == 0 || $re["total_size"] == 0 ) {
    $total_size = 0;
}else{
    $total_size = $re["total_size"];
}
//會計權限筆數
if  ( $_SESSION["MM_UserAuthorization"] == "pay" ){
    $total_size = 10;
}

//查看清單連結文字
if ( $vst == "full" ){
    $count_href = "　<a href=\"javascript:full_btn('n');\" class='btn btn-success'>查看前五百筆</a>";
}else{
    if ( $total_size > 500 ){ $total_size = 500;}
    $count_href = "　<a href=\"javascript:full_btn('full');\" class='btn btn-success'>查看完整清單</a>";
}

//取得分頁資料
$tPageSize = 50; //每頁幾筆
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
$SQL_list .= "over(Order By stat Asc) As rownumber ";
$SQL_list .= "From si_salon_teacher_consult".$subSQL1.") temp_row ";
$SQL_list .= "Where rownumber > ".($tPageSize*$tPage_list)." Order By stat Asc, times Desc";
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
            <h2 class="pageTitle">約會專家升級意願 》情感諮詢預約(<?php echo $tshow;?>) 》資料列表 [ <i style="color: #76192e;">共計 <?php echo $total_size."筆資料</i> ]"; if ( $total_size >= 500 ){ echo $count_href;}?></h2>
            <form id="searchform" action="?vst=full&sear=1" method="post" target="_self" class="form-inline" style="margin:0px;">
                <div class="m-search-bar">
                    <?php if  ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" ){?>
                        <span class="span-group">
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
                            秘書：
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
                    <?php }?>
                    <span class="span-group">
                    預約時間：
                        <input type="text" class="datepicker" autocomplete="off" style="width:100px;" name="times1" value="<?php echo $vacre_sign1;?>">
                        ～
                        <input type="text" class="datepicker" autocomplete="off" style="width:100px;" name="times2" value="<?php echo $vacre_sign2;?>">
                    </span>
                    <span class="span-group">
                    <select name="keyword_type" id="keyword_type">
                            <option value="">請選擇</option>
                            <option value="s3"<?php if ( $types == "s3" ){?> selected<?php }?>>姓名</option>
                            <option value="s4"<?php if ( $types == "s4" ){?> selected<?php }?>>編號</option>
                        </select>
                    </span>
                    <span class="span-group">
                        <input name="keyword" id="keyword" class="form-control" type="text" placeholder="姓名/編號" value="<?php echo $keyword;?>">
                        <input type="submit" value="送出" class="btn btn-default">
                    </span>
                </div>
                <input type="hidden" name="vst" id="vst">
            </form>
            <span>
                <strong style="background-color: yellow; color:brown">※排序欄位：諮詢結果→預約時間(由近到遠)。</strong>
            </span>
            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr>
                            <th>預約教練</th>
                            <th>預約時間</th>
                            <th>姓名</th>
                            <th>Line ID</th>
                            <th>Email</th>
                            <th>手機號碼</th>
                            <th>會館秘書</th>
                            <th>諮詢結果</th>
                            <th>狀態</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>黃宇綸</td>
                            <td>2021/8/8&nbsp;&nbsp;10:00</td>
                            <td><a href="ad_mem_detail.php?mem_num=414544" target="_blank">彭詳程</a></td>
                            <td>ponbu1121</td>
                            <td>spon5945@gmail.com</td>
                            <td>0907225594</td>
                            <td>桃園黃毓淳</td>
                            <td></td>
                            <td>
                                發起諮詢預約：2021-07-30 20:48
                                <br>
                                確認雙方時間：<a href="javascript:Mars_popup('ad_mem_singleparty_consult_changetime.php?an=31','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=220,top=300,left=300');">修改時間</a>&nbsp;&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_mem_singleparty_consult.php?st=fixc&an=31','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=220,top=300,left=300');">已確認</a>
                                <br>
                                諮詢完成：尚未開始&nbsp;&nbsp;<a href="javascript:Mars_popup2('ad_mem_singleparty_consult.php?st=del&an=31','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=220,top=300,left=300');">刪</a>
                            </td>
                        </tr>

                        <tr>
                            <td>瑪那熊</td>
                            <td>2021/8/27&nbsp;&nbsp;14:00</td>
                            <td><a href="ad_mem_detail.php?mem_num=99998" target="_blank">張小天</a></td>
                            <td>hhhhh</td>
                            <td>lovekyoe@gmail.com</td>
                            <td>0988706831</td>
                            <td>台北陳紅</td>
                            <td></td>
                            <td>
                                發起諮詢預約：2021-08-24 17:31
                                <br>
                                確認雙方時間：2021-08-24 17:33
                                <br>
                                諮詢完成：尚未開始&nbsp;&nbsp;<a href="javascript:Mars_popup2('ad_mem_singleparty_consult.php?st=del&an=32','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=220,top=300,left=300');">刪</a>
                            </td>
                        </tr>

                        <tr>
                            <td>姜沛紳</td>
                            <td>2021/3/6&nbsp;&nbsp;15:00</td>
                            <td><a href="ad_mem_detail.php?mem_num=1980038" target="_blank">賴永晏</a></td>
                            <td>ffyy43</td>
                            <td>identify8840@yahoo.com</td>
                            <td>0938662583</td>
                            <td>高雄李順慈</td>
                            <td></td>
                            <td>
                                發起諮詢預約：2021-02-28 22:40
                                <br>
                                確認雙方時間：<a href="javascript:Mars_popup('ad_mem_singleparty_consult_changetime.php?an=28','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=220,top=300,left=300');">修改時間</a>&nbsp;&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_mem_singleparty_consult.php?st=fixc&an=28','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=220,top=300,left=300');">已確認</a>
                                <br>
                                諮詢完成：尚未開始&nbsp;&nbsp;<a href="javascript:Mars_popup2('ad_mem_singleparty_consult.php?st=del&an=28','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=220,top=300,left=300');">刪</a>
                            </td>
                        </tr>

                        <tr>
                            <td>瑪那熊</td>
                            <td>2021/6/28&nbsp;&nbsp;19:00</td>
                            <td><a href="ad_mem_detail.php?mem_num=99998" target="_blank">張小天</a></td>
                            <td>ddddddd</td>
                            <td>Lovesingleclub@gmail.com</td>
                            <td>0988706831</td>
                            <td>台北陳紅</td>
                            <td>已完成</td>
                            <td>
                                發起諮詢預約：2021-06-21 16:44
                                <br>
                                確認雙方時間：2021-06-21 17:56
                                <br>
                                諮詢完成：2021-06-21 17:58&nbsp;&nbsp;<a href="javascript:Mars_popup2('ad_mem_singleparty_consult.php?st=del&an=30','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=220,top=300,left=300');">刪</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 6 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_mem_singleparty_consult.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_mem_singleparty_consult.php?topage=1 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_mem_singleparty_consult.php?topage=1" selected>1</option>
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

<script type="text/javascript">
    $(function() {
        $("#s6").on("change", function() {
            personnel_get("s6", "s7");

        });
    });

    function chk_search_form() {

        /*  if(!$("#keyword_type").val()) {
            alert("請選擇要搜尋的類型。");
            $("#keyword_type").focus();
        	return false;
          }
          if(!$("#keyword").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
        	return false;
          }*/
        return true;
    }
</script>