<?php
/***************************************/
//檔案名稱：ad_mem_login.php
//後台對應位置：春天網站功能 > 網站照片審核
//改版日期：2022.1.11
//改版設計人員：Jack
//改版程式人員：Queena
/***************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

$auth_limit = 7;
require_once("./include/_limit.php");
check_page_power("ad_mem_login");   //頁面權限
$default_sql_num = 500;
if ( $vst == "full" ){
    $subSQL1 = "*";
    //$sqlv2 = "count(photo_auto)";
}else{
    $subSQL1 = "top ".$default_sql_num." *";
    //$sqlv2 = "count(photo_auto)";
}

$branch2 = SqlFilter($_REQUEST["branch2"],"tab");
if ( $branch2 == "1" ){
    $subSQL2 = "','+mem_branch2+',' Like '%,".$_SESSION["branch"].",%'";
    $tshow = "跨區會員";
}else{
	$subSQL2 = " And (mem_branch= '".$_SESSION["branch"]."' or ','+mem_branch2+',' Like '%,".$_SESSION["branch"].",%')";
}

if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
    if ( $branch2 == "1" ){
        $subSQL2 = " And mem_branch2 <> ''";
    }else{
      	$subSQL2 = "";
    }
    //sqls = "SELECT "&sqlv&" FROM member_data as dba WHERE mem_level = 'mem' and last_login <> ''"
	//sqls2 = "SELECT "&sqlv2&" as total_size FROM member_data as dba WHERE mem_level = 'mem' and last_login <> ''"&b2sql
}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ) {
    $subSQL2 = $subSQL2;
}elseif ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "manager" ) {
    $subSQL2 = "And UPPER(mem_single) = '".strtoupper($_SESSION["MM_username"])."'";
	//sqls2 = "SELECT "&sqlv2&" as total_size FROM member_data as dba Where mem_level = 'mem' and last_login <> '' and UPPER(mem_single) = '"&Ucase(Session("MM_username"))&"'"
}elseif ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "manager" ) {
    $subSQL1 = " top 10 * ";
    //sqls = "SELECT top 10 * FROM member_data as dba Where mem_level = 'mem' and last_login <> ''"&b2sql
    //sqls2 = "SELECT count(mem_auto) as total_size FROM member_data as dba Where mem_level = 'mem' and last_login <> ''"&b2sql
    $default_sql_num = "10";
}

$s1 = SqlFilter($_REQUEST["s1"],"tab");
$s2 = SqlFilter($_REQUEST["s2"],"tab");
$s3 = SqlFilter($_REQUEST["s3"],"tab");
$s4 = SqlFilter($_REQUEST["s4"],"tab");
$s7 = SqlFilter($_REQUEST["s7"],"tab");
$s8 = SqlFilter($_REQUEST["s8"],"tab");
$s10 = SqlFilter($_REQUEST["s10"],"tab");
$s11 = SqlFilter($_REQUEST["s11"],"tab");
$m1 = SqlFilter($_REQUEST["m1"],"tab");
$d1 = SqlFilter($_REQUEST["d1"],"tab");
$s21 = SqlFilter($_REQUEST["s21"],"tab");
$s22 = SqlFilter($_REQUEST["s22"],"tab");
$s23 = SqlFilter($_REQUEST["s23"],"tab");
$s26 = SqlFilter($_REQUEST["s26"],"tab");
$s27 = SqlFilter($_REQUEST["s27"],"tab");
$a1 = SqlFilter($_REQUEST["a1"],"tab");
$s97 = SqlFilter($_REQUEST["s97"],"tab");
$s77 = SqlFilter($_REQUEST["s77"],"tab");
//會員身份證號
if ( $s1 != "" ){
    $subSQL3 = $subSQL3 . " And mem_username Like '%" . str_Replace("'", "''", $s1) . "%'";
}
//會員手機號碼
if ( $s2 != "" ){
    $cs2 = reset_number($s2);
    $subSQL3 = $subSQL3 . " And mem_mobile Like '%".$cs2. "%'";
}
//會員姓名
if ( $s3 != "" ){
    $subSQL3 = $subSQL3 . " And mem_name Like N'%" . str_Replace("'", "''", $s3) . "%'";
}
//會員編號
if ( $s4 != "" ){
    $subSQL3 = $subSQL3 . " And mem_num Like '%" . str_Replace("'", "''", $s4) . "%'";
}
//受理祕書姓名
if ( $s7 != "" ){
    $subSQL3 = $subSQL3 . " And UPPER(mem_single) Like '%" . str_Replace("'", "''", strtoupper($s7)) . "%'";
}
//資料來源
if ( $s8 != "" ){
    $subSQL3 = $subSQL3 . " And mem_come Like '%" . str_Replace("'", "''", $s8) . "%'";
}
//會員學歷
if ( $s10 != "" ){
    $subSQL3 = $subSQL3 . " And mem_school Like '%" . str_Replace("'", "''", $s10) . "%'";
}
//受理會館
if ( $s11 != "" ){
    $subSQL3 = $subSQL3 . " And mem_branch Like '%" . str_Replace("'", "''", $s11) . "%'";
}
//會員生日月份
if ( $m1 != "" ){
    $subSQL3 = $subSQL3 . " And mem_bm Like '%" . str_Replace("'", "''", $m1) . "%'";
}
//會員生日日期
if ( $d1 != "" ){
    $subSQL3 = $subSQL3 . " And mem_bd Like '%" . str_Replace("'", "''", $d1) . "%'";
}
//會員性別
if ( $s21 != "" ){
    $subSQL3 = $subSQL3 . " And mem_sex Like '%" . str_Replace("'", "''", $s21) . "%'";
}
//會員入會年份
if ( $s22 != "" ){
    $subSQL3 = $subSQL3 . " And mem_jy between '".$s22."' And '".$s22."'";
}
//會員入會月份
if ( $s23 != "" && $s25 != "" ){
    $subSQL3 = $subSQL3 . " And mem_jm between '".$s23."' And '".$s25."'";
}
//會員是否待服務
if ( $s26 != "" ){
    $subSQL3 = $subSQL3 . " And mem_s1 Like '%" . str_Replace("'", "''", $s26) . "%'";
}
//會員出生年份
if ( $s27 != "" ){
    $subSQL3 = $subSQL3 . " And mem_by Like '%" . str_Replace("'", "''", $s27) . "%'";
}
//會員狀況
if ( $a1 != "" ){
    $subSQL3 = $subSQL3 . " And all_type Like '%" . str_Replace("'", "''", $a1) . "%'";
}
//自訂來源
if ( $s97 != "" ){
    $subSQL3 = $subSQL3 . " And mem_cc = '" . str_Replace("'", "''", $s97) . "'";
}
//會員最後登入時間
if ( $s77 != "" ){
    if ( $s77 > 12 ){
        $subSQL3 = $subSQL3 . " And datediff(m, last_login, getdate()) >= 12";
    }else{
        $subSQL3 = $subSQL3 . " And datediff(m, last_login, getdate()) < ".(int)($s77);
    }
}
if ( $tshow == "" ){
	$tshow = "所有會員";
}

$subSQL4 = " Order By last_login Desc";

//取得總筆數
$SQL = "Select count(mem_auto) As total_size From member_data as dba Where mem_level = 'mem' and last_login <> ''".$subSQL2.$subSQL3;
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);
if ( count($result) == 0 || $re["total_size"] == 0 ) {
    $total_size = 0;
}else{
    if ( $re["total_size"] > 500 ){ $total_size = 500; }
    $total_size = $re["total_size"];
}

if ( $_SESSION["MM_UserAuthorization"] == "pay" ){ $total_size = 10; }

	
//查看清單連結文字
if ( SqlFilter($_REQUEST["vst"],"tab") == "full" ){
    $count_href = "　<a href='?vst=n'>[查看前五百筆]</a>";
}else{
    if ( $total_size > 500 ){ $total_size = 500;}
    $count_href = "　<a href='?vst=full'>[查看完整清單]</a>";
}

//取得分頁資料
$tPageSize = 50; //每頁幾筆
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
$SQL_list .= "over(".$subSQL4.") As rownumber ";
$SQL_list .= "From member_data as dba Where mem_level = 'mem' and last_login <> ''".$subSQL2.$subSQL3." ) temp_row ";
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
            <li class="active">會員登入狀態</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong><?php echo $tshow;?>登入狀態 - 數量：<?php echo $total_size.$count_href;?></strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form id="searchform" action="ad_mem_login.php?vst=full&sear=1" method="post" target="_self" class="form-inline" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type">
                            <option value="s2">手機</option>
                            <option value="s1">身分證字號</option>
                            <option value="s3">姓名</option>
                            <option value="s4">編號</option>
                        </select>
                        <input name="keyword" id="keyword" class="form-control" type="text">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>
                <p style="clear:both">
                    <a class="btn btn-success" href="?s77=1">近一個月</a>
                    <a class="btn btn-success" href="?s77=2">近二個月</a>
                    <a class="btn btn-success" href="?s77=3">近三個月</a>
                    <a class="btn btn-success" href="?s77=4">近四個月</a>
                    <a class="btn btn-success" href="?s77=5">近五個月</a>
                    <a class="btn btn-success" href="?s77=6">近六個月</a>
                    <a class="btn btn-success" href="?s77=7">近七個月</a>
                    <a class="btn btn-success" href="?s77=8">近八個月</a>
                    <a class="btn btn-success" href="?s77=9">近九個月</a>
                    <a class="btn btn-success" href="?s77=10">近十個月</a>
                    <a class="btn btn-success" href="?s77=11">近十一個月</a>
                    <a class="btn btn-success" href="?s77=12">十二個月以上</a>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width=180>資料來源</th>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>生日</th>
                            <th>學歷</th>
                            <th>登入時間</th>
                            <th width=180>秘書</th>
                            <th width=60>照片</th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if ( count($result_list) == 0 ){
                        echo "<tr><td colspan='10' height='200'>目前沒有資料</td></tr>";
                    }else{
                        foreach($result_list as $re_list){
                            if ( $re_list["mem_cc"] != "" ){
					            $mem_cc = $re_list["mem_cc"];
					            if ( substr_count($mem_cc, "sale-") > 0 ){
                                    //$mem_cc_array = 
					  	            //$mem_cc = "推廣：".SingleName_auto(split(mem_cc, "-")(1))
                                }
						        $mem_cc = " [".$mem_cc."]";
                            }else{
						        $mem_cc = "";
					        }?>
                            <tr>
							    <td class="center"><?php echo $re_list["mem_come"];?><?php echo $mem_cc;?></td>
								<td><?php echo $re_list["mem_num"];?></td>
								<td class="center"><a href="ad_mem_detail.asp?mem_num=<?php echo $re_list["mem_num"];?>" target="_blank"><?php echo $re_list["mem_name"];?></a>
                                    <div style="float:right"><?php echo $supay;?></div>
                                </td>
								<td class="center"><?php echo $re_list["mem_sex"];?></td>
                                <td class="center">
                                    <?php echo $re_list["mem_by"]." / ".$re_list["mem_bm"]." / ".$re_list["mem_bd"];?>
                                    <?php if ( $re_list["mem_by"] != "" ){ echo "　　".(date("Y")-date("Y",strtotime($re_list["mem_by"])))." 歲";}?></td>
								<td class="center"><%=rs("mem_school")%></td>
								<td class="center">
								<%
 If isdate(rs("last_login")) Then
 times = FormatDateTime(rs("last_login"), 0)
 today = FormatDateTime(now, 0)

   timesv = datediff("n", times, today)
   timesr = clng(timesv) &" 分前"
   If timesv > 60 Then
   timesv = timesv / 60
   timesr = clng(timesv) &" 小時前"
   If timesv > 24 Then
   timesv = timesv / 24
   timesr = clng(timesv) &" 天前"
   If timesv > 31 Then
   timesv = timesv / 31
   timesr = "<font color=green>"&clng(timesv) &" 個月前</font>"   
   If timesv >= 8 Then
   timesr = "<font color=red>8 個月前</font>"
   End if
   End if
   End if   
   End if
 Else
    timesr = "<font color=red>8 個月前</font>"
 End if
 response.write rs("last_login")&"&nbsp&nbsp&nbsp"&timesr
								%>	
								</td>
								<%
								 If rs("mem_branch") <> "" Then
								  mem_single = "<font color=green>受理：</font>"&rs("mem_branch") & " - " & SingleName(rs("mem_single"))
								 else
								 	mem_single = ""
								 End if
								 
								 if rs("love_single") <> "" then
								 love_single = "<br><font color=green>排約：</font>"&	SingleName(rs("love_single"))
								 else
								 love_single = ""
								 end if

								 if rs("call_branch") <> "" then
								 call_single = "<br><font color=green>邀約：</font>"&rs("call_branch") & " - " & SingleName(rs("call_single"))
								 else
								 call_single = ""
								 end if

								 if rs("mem_come3") <> "" then
								 sup_single = "<br><font color=green>推薦：</font>"&rs("mem_come3") & " - " & SingleName(rs("mem_come4"))
								 else
								 sup_single = ""
								 end if
								 
								%>
								<td class="center"><%=mem_single&love_single&call_single&sup_single%></td>
								<td class="center"><%IF (rs("mem_sex") = "男" and rs("mem_photo") <> "boy.jpg") or (rs("mem_sex") = "女" and rs("mem_photo") <> "girl.jpg") Then%><a href="../photo/<%=rs("mem_photo")%>?t=<%=int(rnd()*9999)%>" target="_blank" class="fancybox">有</a><%Else%>無<%End IF%></font></td>
								<td class="center">
			    		<div class="btn-group">
							<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
							<ul class="dropdown-menu pull-right">
		  <%
		   reports = get_report_num(rs("mem_mobile"))		   
		   if instr(reports, "|+|") > 0 then
		     report = split(reports, "|+|")(0)
		     report_text = split(reports, "|+|")(1)
		   else
		   	 report = 0
		   	 report_text = "無"
		   end if
		  %><li><a href="ad_mem_detail.asp?mem_num=<%=rs("mem_num")%>" target="_blank"><i class="icon-file"></i> 詳細</a></li>
								<li><a href="javascript:Mars_popup('ad_report.asp?k_id=<%=rs("mem_auto")%>&lu=<%=rs("mem_username")%>&ty=member','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(<%=report%>)</a></li>
								<%IF Session("MM_UserAuthorization") = "admin" Or Session("MM_UserAuthorization") = "branch" Or Session("MM_UserAuthorization") = "pay" Then%>
								<li><a href="ad_mem_fix.asp?mem_num=<%=rs("mem_num")%>" target="_blank"><i class="icon-file"></i> 修改</a></li>
								<%End IF%>								
							</ul>
						</div>								
								</td>
							</tr>  









                        <tr>
                            <td>
                                <span style="color:blue">璀璨VIP會員-二年期(2019/1/1~2022/2/9)</span>
                            </td>
                            <td colspan="6" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_report.php?k_id=495029&lu=99998&ty=member','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(156)</a>，處理情形：<font color="#FF0000" size="2">已排約</font>) 內容：由 暫存名單/瑜婷 處理 test浩瀚2(主) 與 張小天(被) 於 2021/7/20 下午 10:00:00 預訂排約，結果：成功　　<font color=blue>舊：</font>[2020-08-17 16:31]愛情實驗室-不合格[2020-08-17 16:31]愛情實驗室-合格[2020-08-17 16:36]愛情實驗室-不合格[2020-08-17 16:37]愛情實驗室-合格[2020-08-17 16:37]愛情實驗室-合格[2020-08-17 17:11]愛情實驗室-不合格[2020-08-17 17:14]愛情實驗室-不合格[2020-08-17 17:14]愛情實驗室-不合格[2020-08-17 17:24]愛情實驗室-合格[2020-08-17 17:25]愛情實驗室-合格[2020-08-17 17:27]愛情實驗室-合格[2020-08-17 17:27]愛情實驗室-合格[2020-08-17 17:27]愛情實驗室-不合格[2020-08-18 13:53]愛情實驗室-不合格[2020-08-22 17:00]愛情實驗室-合格[2020-09-02 14:18]愛情實驗室-合格[2021-01-28 17:14]愛情實驗室-不合格</td>
                            <td colspan=3>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 10 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_mem_login.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_mem_login.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_mem_login.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_mem_login.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_mem_login.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_mem_login.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_mem_login.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_mem_login.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_mem_login.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_mem_login.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_mem_login.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_mem_login.php?topage=10 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_mem_login.php?topage=1" selected>1</option>
                            <option value="/ad_mem_login.php?topage=2">2</option>
                            <option value="/ad_mem_login.php?topage=3">3</option>
                            <option value="/ad_mem_login.php?topage=4">4</option>
                            <option value="/ad_mem_login.php?topage=5">5</option>
                            <option value="/ad_mem_login.php?topage=6">6</option>
                            <option value="/ad_mem_login.php?topage=7">7</option>
                            <option value="/ad_mem_login.php?topage=8">8</option>
                            <option value="/ad_mem_login.php?topage=9">9</option>
                            <option value="/ad_mem_login.php?topage=10">10</option>
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
        location.href = "ad_mem_login.php?sear=1&vst=&s99=&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>