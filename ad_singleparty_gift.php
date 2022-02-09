<?php
/***************************************/
//檔案名稱：ad_singleparty_gift.php
//後台對應位置：約會專家功能->會員禮物互動
//改版日期：2022.02.09
//改版設計人員：Jack
//改版程式人員：Queena
/***************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//權限判斷
check_page_power("ad_mem_gift");

//麵包屑
$unitprocess = $m_home.$icon."約會專家功能".$icon."會員禮物互動";

//接收值
$a1 = SqlFilter($_REQUEST["a1"],"tab");
$a2 = SqlFilter($_REQUEST["a2"],"tab");
$b1 = SqlFilter($_REQUEST["b1"],"tab");
$b2 = SqlFilter($_REQUEST["b2"],"tab");
$keyword_type = SqlFilter($_REQUEST["keyword_type"],"tab");
$keyword = SqlFilter($_REQUEST["keyword"],"tab");

//日期判斷
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

/*
default_sql_num = 500

If request("vst") = "full" Then
  sqlv = "*"
  sqlv2 = "count(gift_auto)"
Else
  sqlv = "top "&default_sql_num&" *"
  sqlv2 = "count(gift_auto)"
End If
*/

//語法 SELECT "&sqlv&" FROM si_gift_data WHERE gift_send_branch= '"&request("branch")&"' or gift_re_branch= '"&request("branch")&"'"
if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
    $subSQL1 = "gift_send_branch='".$branch."' Or gift_re_branch= '".$branch."' ";
}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
    $subSQL1 = "gift_send_branch='".$_SESSION["branch"]."' Or gift_re_branch='".$_SESSION["branch"]." '";
    $all_type = "";
}elseif ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "manager" ){
    $subSQL1 = "gift_send_single='".$_SESSION["MM_username"]."' Or gift_re_single='".$_SESSION["MM_username"]."' ";
}else{
    call_alert("您沒有查看此頁的權限。",0,0);
}

//篩選條件(姓名)
if ( $keyword_type == "s3"){
    $subSQL1 .= "And (gift_send_name Like '%".str_Replace("'", "''", $keyword)."%' Or gift_re_name Like '%".str_Replace("'", "''", $keyword)."%') ";
}
//篩選條件(編號)
if ( $keyword_type == "s4"){
    $subSQL1 .= "And (gift_send Like '%".str_Replace("'", "''", $keyword)."%' Or gift_re Like '%".str_Replace("'", "''", $keyword)."%') ";
}

//取得總筆數
$SQL = "Select count(gift_auto) As total_size From si_gift_data Where ".$subSQL1;
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
    $count_href = "　<a href='?vst=n'>[查看前五百筆]</a>";
}else{
    if ( $total_size > 500 ){ $total_size = 500;}
    $count_href = "　<a href='?vst=full'>[查看完整清單]</a>";
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

//分頁程式
$SQL_list  = "Select Top ".$tPageSize." * ";
$SQL_list .= "From (Select row_number() ";
$SQL_list .= "over(".$subSQL5." Asc) As rownumber,member_data.mem_num,mem_name ";
$SQL_list .= "From photo_data INNER JOIN member_data ON photo_data.mem_num = member_data.mem_num Where ".$subSQL2.$subSQL3.$subSQL4." ) temp_row ";
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
        <div class="m-crumb"><i class="fa fa-folder-open-o"></i><?php echo $unitprocess;?></div>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <h2 class="pageTitle">約會專家升級意願 》會員禮物互動 》資料列表 [ <i style="color: #76192e;">共計 <?php echo $total_size."筆資料</i> ]"; if ( $total_size >= 500 ){ echo $count_href;}?></h2>
            <form id="searchform" action="ad_no_mem.php?vst=full&sear=1" method="post" target="_self" class="form-inline">
                <div class="m-search-bar">
                    <?php if ( $_SESSION["MM_UserAuthorization"] == "admin" ){ ?>
                        <span class="span-group">
                            會館：
                            <select name="branch" id="branch">
                                <option value="">請選擇</option>
                                <?php
                                //會館資料
                                $SQL = "Select * From branch_data Where auto_no<>10 Order By admin_Sort";
                                $rs = $SPConn->prepare($SQL);
                                $rs->execute();
                                $result=$rs->fetchAll(PDO::FETCH_ASSOC);    
                                foreach($result as $re){ ?>
                                    <option value="<?php echo $re["admin_name"];?>"<?php if ( SqlFilter($_REQUEST["branch"],"tab") == $re["admin_name"] ){?> selected<?php }?>><?php echo $re["admin_name"];?></option>
                                <?php }?>
                            </select>
                        </span>
                        <span class="span-group">
                            <select name="single" id="single">
                                <option value="">請選擇</option>
                            </select>
                        </span>
                    <?php }?>
                    <span class="span-group">
                        <select name="keyword_type" id="keyword_type">
                            <option value="s3"<?php if ( $keyword_type == "s3" ){?> selected<?php }?>>姓名</option>
                            <option value="s4"<?php if ( $keyword_type == "s4" ){?> selected<?php }?>>編號</option>
                        </select>
                    </span>
                    <span class="span-group">
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text" value="<?php echo $keyword;?>">
                        <input type="submit" value="送出" class="btn btn-default">
                    </span>
                </div>
            </form>
            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr>
                            <th>時間</th>
                            <th>送禮人</th>
                            <th>收禮人</th>
                            <th>禮物</th>
                            <th width=400>招呼</th>
                            <th>送禮會秘</th>
                            <th>收禮會秘</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ( count($result_list) == 0 ){?>
                            <tr><td colspan="10" height="200">目前沒有資料或請最少選擇會館</td></tr>
                        <?php }else{
                            $gift_send_name = "<a href='ad_mem_detail.asp?mem_num=".$re("gift_send")&""">"&rs("gift_send_name")&"</a>"
                            $gift_re_name = "<a href=""ad_mem_detail.asp?mem_num="&rs("gift_re")&""">"&rs("gift_re_name")&"</a>"
                            
                            
                            ?>
                        <tr>
                            <td>2018/8/15 上午 10:24:10</th>
                            <td><a href="ad_mem_detail.php?mem_num=1308543">柯雯琪</a></td>
                            <td><a href="ad_mem_detail.php?mem_num=99998">張小天</a></td>
                            <td>閃耀皇冠</td>
                            <td>我們倆的興趣一樣喔！</td>
                            <td>-不明</td>
                            <td>台北-陳紅</td>

                        </tr>

                        <tr>
                            <td>2017/11/15 下午 06:19:57</th>
                            <td><a href="ad_mem_detail.php?mem_num=1308543">柯雯琪</a></td>
                            <td><a href="ad_mem_detail.php?mem_num=1356719">盧彥男</a></td>
                            <td>可愛小熊</td>
                            <td>很高興認識你喔！</td>
                            <td>-不明</td>
                            <td>八德-kitty</td>

                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 2 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_singleparty_gift.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_singleparty_gift.php?topage=1 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_singleparty_gift.php?topage=1" selected>1</option>
                        </select></li>
                </ul>
            </div>

        </div>
        <!--/span-->

    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php")
?>

<script language="JavaScript">
    $(function() {
        $("#branch").on("change", function() {
            personnel_get("branch", "single");
        });

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
        var $branch = $("#branch");
        if (!$branch.val() && !$("#keyword_type").val()) {
            alert("請選擇要搜尋的類型。");
            $("#keyword_type").focus();
            return false;
        }
        if (!$branch.val() && !$("#keyword").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
        }
        location.href = "ad_singleparty_gift.php?sear=1&vst=&branch=" + $branch.val() + "&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>