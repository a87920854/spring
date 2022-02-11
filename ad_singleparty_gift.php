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
$branch = SqlFilter($_REQUEST["branch"],"tab");
$single = SqlFilter($_REQUEST["single"],"tab");
$vst = SqlFilter($_REQUEST["vst"],"tab");

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
    if ( $branch != "" ){
        if ( $single != "" ){
            $subSQL1 = "(gift_send_branch='".$branch."' And gift_send_single='".$single."') Or (gift_re_branch= '".$branch."' And gift_re_single='".$single."') ";
        }else{
            $subSQL1 = "(gift_send_branch='".$branch."' Or gift_re_branch= '".$branch."') ";
        }
    }
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
    if ( $branch != "" ){
        $subSQL1 .= "And (gift_send_name Like '%".str_Replace("'", "''", $keyword)."%' Or gift_re_name Like '%".str_Replace("'", "''", $keyword)."%') ";
    }else{
        $subSQL1 .= "(gift_send_name Like '%".str_Replace("'", "''", $keyword)."%' Or gift_re_name Like '%".str_Replace("'", "''", $keyword)."%') ";
    }
}
//篩選條件(編號)
if ( $keyword_type == "s4"){
    if ( $branch != "" ){
        $subSQL1 .= "And (gift_send Like '%".str_Replace("'", "''", $keyword)."%' Or gift_re Like '%".str_Replace("'", "''", $keyword)."%') ";
    }else{
        $subSQL1 .= "(gift_send Like '%".str_Replace("'", "''", $keyword)."%' Or gift_re Like '%".str_Replace("'", "''", $keyword)."%') ";
    }
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

//分頁程式
$SQL_list  = "Select Top ".$tPageSize." * ";
$SQL_list .= "From (Select row_number() ";
$SQL_list .= "over( Order By gift_time Desc ) As rownumber,gift_send,gift_send_name,gift_re,gift_re_name,gift_time,gift_title,gift_note,gift_send_branch,gift_re_branch,gift_send_single,gift_re_single ";
$SQL_list .= "From si_gift_data Where ".$subSQL1." ) temp_row ";
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
            <form id="searchform" action="ad_singleparty_gift.php" method="post" target="_self" class="form-inline">
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
                <input type="hidden" name="vst" id="vst" value="">
            </form>
            <span style="background-color: yellow; color:brown;"><strong>※排序欄位：送禮時間(由近至遠)排序。</strong></span>
            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr style="background-color: #FFDA96;">
                            <th width="15%">時間</th>
                            <th width="6%">送禮人</th>
                            <th width="6%">收禮人</th>
                            <th width="10%">禮物</th>
                            <th>招呼</th>
                            <th width="10%">送禮會秘</th>
                            <th width="10%">收禮會秘</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ( count($result_list) == 0 ){?>
                            <tr><td colspan="10" height="200">目前沒有資料或請最少選擇會館</td></tr>
                        <?php }else{
                            foreach($result_list as $re_list){
                                $gift_send_name = "<a href='ad_mem_detail.php?mem_num=".$re_list["gift_send"]."'>".$re_list["gift_send_name"]."</a>";
                                $gift_re_name = "<a href='ad_mem_detail.php?mem_num=".$re_list["gift_re"]."'>".$re_list["gift_re_name"]."</a>"; ?>
                                <tr>
								    <td><?php echo changeDate($re_list["gift_time"]);?></th>
								    <td><?php echo $gift_send_name;?></td>
								    <td><?php echo $gift_re_name;?></td>
								    <td><?php echo $re_list["gift_title"];?></td>
								    <td><?php echo $re_list["gift_note"];?></td>
								    <td><?php echo $re_list["gift_send_branch"]."-".SingleName($re_list["gift_send_single"],"normal");?></td>
								    <td><?php echo $re_list["gift_re_branch"];?>-<?php echo SingleName($re_list["gift_re_single"],"normal");?></td>
							  </tr>
                            <?php }?>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <!--include頁碼-->
	        <?php require_once("./include/_page.php"); ?>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->

<?php require_once("./include/_bottom.php");?>

<script language="JavaScript">
    function full_btn(vst_val){
        document.getElementById("vst").value = vst_val;
        searchform.submit();
    }
</script>