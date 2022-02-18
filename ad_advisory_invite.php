<?php
/***************************************/
//檔案名稱：ad_advisory_invite.php
//後台對應位置：排約/記錄功能 → 諮詢預訂單
//改版日期：2022.02.17
//改版設計人員：Jack
//改版程式人員：Queena
/***************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//判斷權限
check_page_power("ad_advisory_invite");

//麵包屑
$unitprocess = $m_home.$icon."排約/記錄功能".$icon."諮詢預訂單";

//接收值
$y = SqlFilter($_REQUES["y"],"tab");
$m = SqlFilter($_REQUES["m"],"tab");
$d = SqlFilter($_REQUES["d"],"tab");
?>

<!-- MIDDLE -->
<section id="middle">

    <!-- 麵包屑 -->
    <header id="page-header">
        <div class="m-crumb"><i class="fa fa-folder-open-o"></i><?php echo $unitprocess;?></div>
    </header>
    <!-- /麵包屑 -->

    <div id="content" class="padding-20">
        <?php
        //判讀日期
        $y = (int)($y);
        $m = (int)($m);
        $d = (int)($d);

        if ( $y == 0 && $m == 0 && $d == 0 ){
            $thisdate = date("Y-m-d");
            $y = date("Y");
            $m = date("m");
        }else{
            if ( $m > 12 ){
                $y = ($y + 1);
                $m = 1;
            }
            if ( $m < 1 ){
                $y = ($y-1);
                $m = 12;
            }
            $thisdate = $y . "/" . $m . "/1";
        }
        
        //判讀當月第一天
        $strfirstday = cstr(date("Y",$thisdate))+"/"+cstr(date("m",$thisdate))+"/1";

        //變數宣告
        Dim strweek(6)
            strweek(0) = "<font color=red><b>日</b></font>"
            strweek(1) = "一"
            strweek(2) = "二"
            strweek(3) = "三"
            strweek(4) = "四"
            strweek(5) = "五"
            strweek(6) = "<font color=green><b>六</b></font>"
        
        '取的當月一號星期幾
        nweek=datepart("w",strfirstday) - 1
        
        '取的該月天數
        nmonthday=day(dateadd("d",-1,dateadd("m",1,year(thisdate)&"-"&month(thisdate)&"-1")))
        
        '上個月
        Function nprevmonth(thisdate)                  
            nprevmonth = dateadd("m",-1,thisdate)
        End Function
        
        '下個月
        Function nnextmonth(thisdate)                 
            nnextmonth = dateadd("m",1,thisdate)
        End Function
        
        '讀取該日資料
        choiceday = cstr(year(thisdate))+"/"+cstr(month(thisdate))+"/"+cstr(day(thisdate))
        choiceday = cdate(choiceday)
        choiceday_1 = dateadd("d",-1,choiceday)

            Set rs = Server.CreateObject("ADODB.Recordset")

            Select case Session("MM_UserAuthorization")
            case "admin"
            sqls = "SELECT top 1000 * FROM ad_advisory_invite WHERE year(itimes) = "&year(thisdate)&" and month(itimes) = "&month(thisdate)&""
            If request("branch") <> "" Then
            branch = request("branch")
            End if
        '      case "love","love_manager"
        '      sqls = "SELECT * FROM ad_advisory_invite WHERE year(itimes) = "&year(thisdate)&" and month(itimes) = "&month(thisdate)&""
        '      branch = session("lovebranch")
        '  if branch <> "" then
        '	branch = replace(branch, ",", "','")
        '  end if
            case else
            sqls = "SELECT * FROM ad_advisory_invite WHERE year(itimes) = "&year(thisdate)&" and month(itimes) = "&month(thisdate)&""
                branch = session("branch")
            'Case Else
            'sqls = "SELECT * FROM invite WHERE year(itimes) = "&year(thisdate)&" and month(itimes) = "&month(thisdate)&" and (single='"&Session("MM_Username")&"' or single3='"&Session("MM_Username")&"')"
            ' sqls = "SELECT * FROM ad_advisory_invite WHERE year(itimes) = "&year(thisdate)&" and month(itimes) = "&month(thisdate)&""
            End Select



            If branch <> "" Then
                sqls = sqls & " and (mem_branch in ('"&branch&"')"
                if Session("area_branch")="" Or Session("area_branch")=Null then
                    sqls = sqls & ")"
                end if
            End If

            if Session("area_branch")<>"" Or Session("area_branch")<>Null then
                area_branch = replace(replace(session("area_branch")," ",""), ",", "','")
                sqls = sqls & " or mem_branch in ('"&area_branch&"'))"
            end if

            sqls = sqls & " order by auton desc"
            'response.write sqls
	




        <div class="panel panel-default">
            <h2 class="pageTitle">排約/記錄功能 》諮詢預訂表</h2>

            <div class="panel-body">

                <div class="col-md-12">
                    <p>
                        <input type="button" value="新增預訂諮詢" class="btn btn-info" onclick="Mars_popup('ad_advisory_invite_add.asp','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=700,height=700,top=10,left=10');">
                        <a href="ad_advisory_invite.asp" class="btn btn-black">諮詢預訂表</a>
                        <a href="ad_advisory_invite_settime.asp" class="btn btn-green">設置諮詢時間</a>
                        <a href="ad_advisory_invite_timelist.asp" class="btn btn-blue">查詢講師時間</a>
                    </p>
                    <form id="searchform" action="ad_advisory_invite.asp" method="post" target="_self" class="form-inline" onsubmit="return chk_search_form()">
                        <input type="text" class="form-control" placeholder="請輸入關鍵字" name="keyword" id="keyword">

                        <select name="branch" id="branch">
                            <option value="">請選擇</option>
                            <option value="台北">台北</option>
                            <option value="桃園">桃園</option>
                            <option value="新竹">新竹</option>
                            <option value="台中">台中</option>
                            <option value="台南">台南</option>
                            <option value="高雄">高雄</option>
                            <option value="八德">八德</option>
                            <option value="約專">約專</option>
                            <option value="迷你約">迷你約</option>
                            <option value="總管理處">總管理處</option>
                        </select>

                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>

                        <tr>
                            <td width="74%" colspan=4><strong>110 年10月 </strong></td>
                            <td width="13%">●<a href="?y=2021&m=10&branch=">本月</a></td>
                            <td width="13%" style="border:0px">▲<a href="?y=2021&m=9&branch=">上一個月</a></td>
                            <td width="11%" style="border:0px">▼<a href="?y=2021&m=11&branch=">下一個月</a></td>
                        </tr>
                        <tr>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期日</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期一</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期二</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期三</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期四</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期五</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期六</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">1</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">2</div>
                                <div></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">3</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">4</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">5</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">6</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">7</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">8</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">9</div>
                                <div></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">10</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">11</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">12</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">13</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">14</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">15</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">16</div>
                                <div></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">17</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#b6effb;">
                                <div style="height:28px;">18</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">19</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">20</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">21</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">22</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">23</div>
                                <div></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">24</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">25</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">26</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">27</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">28</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">29</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">30</div>
                                <div></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">31</div>
                                <div></div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
require_once("./include/_bottom.php")
?>

<script language="JavaScript">
    function chk_search_form() {
        if (!$("#keyword").val() && !$("#branch").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
        }
        if ($("#keyword").val()) {
            $("#searchform").attr("action", "ad_advisory_invite_slist.php");
        }
        return true;
    }
</script>