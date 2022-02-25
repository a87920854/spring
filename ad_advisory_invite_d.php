
<?php
/****************************************/
//檔案名稱：ad_advisory_invite_d.php
//後台對應位置：排約/記錄功能 → 諮詢預訂列表
//改版日期：2022.02.24
//改版設計人員：Jack
//改版程式人員：Queena
/****************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//麵包屑
$unitprocess = $m_home.$icon."排約/記錄功能".$icon."諮詢預訂明細列表";

//接收值
$st = SqlFilter($_REQUEST["st"],"tab");
$an = SqlFilter($_REQUEST["an"],"tab");
$y = SqlFilter($_REQUEST["y"],"tab");
$m = SqlFilter($_REQUEST["m"],"tab");
$d = SqlFilter($_REQUEST["d"],"tab");

//刪除
if ( $st == "del" ){
    $SQL_d = "Delete From ad_advisory_invite Where auton=".$an;
    $rs_d = $SPConn->prepare($SQL_d);
    $rs_d->execute();
    reURL("win_close.php?m=刪除中.....");
}

//取消
if ( $st == "cancel" ){
    $SQL_u = "Update ad_advisory_invite Set stat=2 Where auton=".$an;
    $rs_u = $SPConn->prepare($SQL_u);
    $rs_u->execute();
    reURL("win_close.php?m=取消中.....");
}

//判讀日期
$y = (int)($y);
$m = (int)($m);
$d = (int)($d);

if ( $y == 0 && $m == 0 && $d == 0 ){
    $thisdate = date("Y-m-d");
}else{
    $thisdate = $y . "/" . $m . "/1";
}

//語法
$SQL = "Select * From ad_advisory_invite ";
if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
    $SQL .= "Where year(itimes)=".date("Y",$thisdate)." And month(itimes)=".date("m",$thisdate)." ";
    if ( $branch != "" ){
        $branch = $branch;
    }
}elseif ( $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
    $SQL .= "Where year(itimes)=".date("Y",$thisdate)." And month(itimes)=".date("m",$thisdate)." ";
    $branch = $_SESSION["lovebranch"];
    if ( $branch != "" ){
	    $branch = str_replace(",", "','", $branch);
    }
}else{
    $SQL .= "Where year(itimes)=".date("Y",$thisdate)." And month(itimes)=".date("m",$thisdate)." ";
    $branch = $_SESSION["branch"];
}

$tt = $y." 年".$m." 月";

if ( $d > 0 ){
    $tt = $tt . $d ." 日";
    $thisdate = date("Y",$thisdate)."/".date("m",$thisdate)."/".$d;
    $SQL .= "And day(itimes)=".$d." ";
}

if ( $branch != "" ){
    $SQL .= "And (mem_branch in ('".$branch."') ";
    if ( $_SESSION["area_branch"] == "" || is_null($_SESSION["area_branch"]) ){
        $SQL .= ") ";
    }
}

if ( $_SESSION["area_branch"] != "" || ! is_null($_SESSION["area_branch"]) ){
    $area_branch = str_replace(",", "','", str_replace(" ","", $_SESSION["area_branch"]));
    $SQL .= "Or mem_branch in ('".$area_branch."')) ";
}

$SQL .= "Order By itimes Asc";

 //判讀當月第一天
 $strfirstday = strval(date("Y",strtotime($thisdate)))."/".strval(date("m",strtotime($thisdate)))."/1";

 //取得該月天數
 $nmonthday = date("t",strtotime($thisdate));
  
 //上一天
$nprevmonth = strtotime(date('Y-m-d H:i:s', strtotime("-1 day", strtotime($thisdate))));
  
//下一天
$nnextmonth = strtotime(date('Y-m-d H:i:s', strtotime("+1 day", strtotime($thisdate))));

//執行
$rs = $SPConn->prepare($SQL);
$rs->execute();
$result = $rs->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $re);
?>

<!-- MIDDLE -->
<section id="middle">

    <!-- 麵包屑 -->
    <header id="page-header">
        <div class="m-crumb"><i class="fa fa-folder-open-o"></i><?php echo $unitprocess;?></div>
    </header>
    <!-- /麵包屑 -->

    <div id="content" class="padding-20">

        <div class="panel panel-default">
            <h2 class="pageTitle">排約/記錄功能 》諮詢預訂表 》<?php echo $tt;?></h2>
            <p>
                <input type="button" value="列印本頁" class="btn btn-info" onclick="Mars_popup('ad_advisory_invite_print.asp?thisdate=2022/2/24&branch=','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=470,top=10,left=10');">
            </p>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <td width="70%"><strong><?php echo date("Y",($thisdate-1911));?> 年 <?php echo date("m",$thisdate);?> 月 <?php echo $d;?> 日</strong></td>
                            <td width="10%">●<a href="?y=<?php date("Y");?>&m=<?php echo date("m");?>&d=<?php echo date("d");?>">🟢 今天</a></td>
                            <td width="10%" style="border:0px">▲<a href="?y=<?php echo date("Y",$nprevmonths);?>&m=<?php echo date("m",$nprevmonths);?>&d=<?php echo date("d",$nprevmonths);?>">🔺 昨天</a></td>
                            <td width="10%" style="border:0px">▼<a href="?y=<?php echo date("Y",$nnextmonths);?>&m=<?php echo date("m",$nnextmonths);?>&d=<?php echo date("d",$nnextmonths);?>">🔻 明天</a></td>
						  </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <tbody>
                        <tr style="background-color: #FFDA96;">
                            <td width="30">NO.</td>
                            <td width="160">類型</td>
                            <td width="150">時間</td>
                            <td>姓名</td>
                            <td width="160">受理</td>
                            <td width="160">講師</td>
                            <td width="220"></td>
                        </tr>
                        <?php
                        if ( count($result) == 0 ){
                            echo "<tr><td colspan='10'>今日無預訂諮詢資料。</td></tr>";
                        }else{
                            $i = 1;
                            foreach($result as $re){
			                    //取得諮詢地點
			                    if rs("con_id") > 0 then
				set rsLo = server.CreateObject("ADODB.Recordset")
				sqlstr = "Select * From branch_data Where auto_no="&rs("con_id")
				rsLo.Open sqlstr, SPCon, 1, 3
				address = rsLo("branch_name")&"　"&rsLo("branch_address")
			else
				address = "未設定"
			end if
				
						  %>
						  <tr>
               <td><%=i%></td><td><%=rs("types")%></td><td><%=timevalue(rs("itimes"))%></td>
               <td>
               	<%if Session("MM_UserAuthorization") = "admin" or Session("MM_UserAuthorization") = "branch" or Session("MM_UserAuthorization") = "manager" or Session("MM_UserAuthorization")="pay" or rs("mem_single") = Session("MM_Username") then%>
               	<a href="ad_mem_detail.asp?mem_num=<%=rs("mem_num")%>" target="_blank"><%=rs("mem_name")%></a>
				<br>諮詢地點：<%=address%>
               	<%else%>
               	<%=rs("mem_name")%><br>諮詢地點：<%=address%>
               	<%end if%>
               	</td>
               <td><%=rs("mem_branch")%>-<%=rs("mem_singlename")%></td>
               <td><%=rs("mem_wbranch")%>-<%=rs("mem_whoname")%></td>
               <td>               
               
               <%select case rs("stat")
               case 1
               response.write "已轉入"
               case 2
               response.write "已取消"
               %>
               
               <%case else%>
               <%if Session("MM_UserAuthorization") = "admin" or Session("MM_UserAuthorization") = "branch" or Session("MM_UserAuthorization") = "manager" or Session("MM_UserAuthorization")="pay" then%>
						   <a class="btn btn-success" href="javascript:Mars_popup('ad_advisory_invite_trans.asp?an=<%=rs("auton")%>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=470,top=10,left=10');">轉入</a>
						   <a class="btn btn-default" href="javascript:Mars_popup3('ad_advisory_invite_d.asp?an=<%=rs("auton")%>&st=cancel','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=300,height=150,top=100,left=100');">取消</a>
						   <%end if%>
						   <%end select%>
						   
						   <%if Session("MM_UserAuthorization") = "admin" or ((Session("MM_UserAuthorization") = "branch" or Session("MM_UserAuthorization") = "manager" or Session("MM_UserAuthorization")="pay") and datediff("d", thisdate, now) <= 0) and stat=0 then%>
						   <a class="btn btn-danger" href="javascript:Mars_popup2('ad_advisory_invite_d.asp?an=<%=rs("auton")%>&st=del','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=300,height=150,top=100,left=100');">刪除</a>
						   <%end if%>
						   </td>						   
               </tr>









                    </tbody>
                </table>
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
require_once("./include/_bottom.php");
?>

<script language="JavaScript">
    $mtu = "ad_advisory_invite.";

    function Mars_popup3(theURL, winName, features) {
        if (window.confirm("是否確定取消？") == true) {
            window.open(theURL, winName, features);
        } else {

        }
    }
</script>