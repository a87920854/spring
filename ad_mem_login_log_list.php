<?php
/******************************************/
//檔案名稱：ad_mem_login_log_list.php
//後台對應位置：約會專家功能->會員登入紀錄
//改版日期：2022.02.11
//改版設計人員：Jack
//改版程式人員：Queena
/******************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//權限判斷
$auth_limit = 6;
require_once("./include/_limit.php");
check_page_power("ad_mem_login_log_list");

//麵包屑
$unitprocess = $m_home.$icon."約會專家功能".$icon."會員登入紀錄";

//接收值
$times1 = SqlFilter($_REQUEST["times1"],"tab");
$times2 = SqlFilter($_REQUEST["times2"],"tab");
$branch = SqlFilter($_REQUEST["branch"],"tab");
$single = SqlFilter($_REQUEST["single"],"tab");
$search_sex = SqlFilter($_REQUEST["search_sex"],"tab");
$keyword_type = SqlFilter($_REQUEST["keyword_type"],"tab");
$keyword = SqlFilter($_REQUEST["keyword"],"tab");
$vst = SqlFilter($_REQUEST["vst"],"tab");

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
    if ( chkDate($vacre_sign2) == false ){
        call_alert("結束時間有誤。", 0, 0);
    }
}

//語法
if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
    $subSQL1 = "1=1 ";
}elseif ( $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
    $subSQL1 ="branch='".$_SESSION["branch"]."' ";
}elseif ( $_SESSION["MM_UserAuthorization"] == "single" || $_SESSION["MM_UserAuthorization"] == "manager" ){
    $subSQL1 = "UPPER(single)='".strtoupper($_SESSION["MM_username"])."' Or UPPER(single2)='".strtoupper($_SESSION["MM_username"])."' ";
}else{
    exit;
}

//日期遠近判斷
if ( chkDate($acre_sign1) && chkDate($acre_sign2) ){
    $days = (strtotime($acre_sign2)-strtotime($acre_sign1))/86400;
    if ( $days < 0 ){
        call_alert("結束時間不能大於起始時間。", 0, 0);
    }
    $subSQL1 .= "And times Between '".$acre_sign1."' And '".$acre_sign2."'";
}

//篩選條件(姓名)
if ( $keyword_type == "s3" ){
    $subSQL1 .= "And name Like '%".$keyword."%' ";
}
//篩選條件(編號)
if ( $keyword_type == "s4" ){
    $subSQL1 .= "And mem_num Like '%".$keyword."%' ";
}

//篩選條件(性別)
if ( $search_sex != "" ){
    $subSQL1 .= "And sex='".$search_sex."' ";
}

//篩選條件(會館)      
if ( $branch != "" ){
    $subSQL1 .= "And (branch='".$branch."' Or branch2='".$branch."') ";
    $tshow = $branch."會館";
}

//篩選條件(祕書)
if ( $single != "" ){
    $subSQL1 .= "And (single='".$single."' Or single2='".$single."') ";
}

if ( $tshow == "" ){
    $tshow = "所有會員";
}

//取得總筆數
$SQL = "Select count(auton) As total_size From si_log_ip as dba Where ".$subSQL1;
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

//分頁語法
$SQL_list  = "Select Top ".$tPageSize." * ";
$SQL_list .= "From (Select row_number() ";
$SQL_list .= "over(Order By times Desc) As rownumber,mem_num,name,sex,branch,single,branch2,ip,times,single2 ";
$SQL_list .= "From si_log_ip as dba Where ".$subSQL1." ) temp_row ";
$SQL_list .= "Where rownumber > ".($tPageSize*$tPage_list)." Order By times Desc";
$rs_list = $SPConn->prepare($SQL_list);
$rs_list->execute();
$result_list = $rs_list->fetchAll(PDO::FETCH_ASSOC);
?>
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
            <h2 class="pageTitle">約會專家升級意願 》會員登入紀錄 》資料列表 [ <i style="color: #76192e;">共計 <?php echo $total_size."筆資料</i> ]"; if ( $total_size >= 500 ){ echo $count_href;}?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="ad_mem_login_log_list_count.php" class="btn btn-info">各會館統計</a></h2>
            <form id="searchform" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" target="_self" class="form-inline" style="margin:0px;">
                <div class="m-search-bar">
                    <span class="span-group">
                        會館：
                        <select name="branch" id="branch" style="width:100px;">
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
                    <span class="span-group">
                        性別：
                        <select name="search_sex" id="search_sex" style="width:100px;">
                            <option value="">請選擇</option>
                            <option value="男"<?php if ( $search_sex == "男" ){?> selected<?php }?>>男生</option>
                            <option value="女"<?php if ( $search_sex == "女" ){?> selected<?php }?>>女生</option>
                        </select>
                    </span>
                    <span class="span-group">
                        登入時間：
                        <input type="text" class="datepicker" autocomplete="off" name="times1" value="<?php echo $times1;?>">
                        ～
                        <input type="text" class="datepicker" autocomplete="off" name="times2" value="<?php echo $times2;?>">
                    </span>
                    <span class="span-group">
                        <select name="keyword_type" id="keyword_type">
                            <option value="">請選擇</option>
                            <option value="s3"<?php if ( $keyword_type == "s3" ){?> selected<?php }?>>姓名</option>
                            <option value="s4"<?php if ( $keyword_type == "s4" ){?> selected<?php }?>>編號</option>
                        </select>
                    </span>
                    <span class="span-group">
                        <input name="keyword" id="keyword" class="form-control" type="text" value="<?php echo $keyword;?>">
                        <input type="submit" value="送出" class="btn btn-default">
                    </span>
                </div>
                <input type="hidden" name="vst" id="vst">
            </form>
            <span>
                <strong style="background-color: yellow; color:brown">※排序欄位：登入時間(由遠到近)。</strong>
            </span>   
            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr style="background-color: #FFDA96;">
                            <th width="10%">編號</th>
                            <th width="10%">姓名</th>
                            <th width="10%">性別</th>
                            <th width="10%">會館</th>
                            <th width="15%">秘書</th>
                            <th width="10%">位置</th>
                            <th>時間</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ( count($result_list) == 0 ){?>
                            <tr><td colspan="10" height="200">目前沒有資料</td></tr>
                        <?php }else{
                            foreach($result_list as $re_list){ ?>
                                <tr>
                                    <td><a href="ad_mem_detail.php?mem_num=<?php echo $re_list["mem_num"];?>" target="_blank"><?php echo $re_list["mem_num"];?></a></td>
                                    <td><?php echo $re_list["name"];?></td>
                                    <td><?php echo $re_list["sex"];?></td>
                                    <td><?php echo $re_list["branch"];?></td>
                                    <td>
                                        <?php
                                        if ( $re_list["single"] != "" ){
                                            echo SingleName($re_list["single"],"normal");
                                        }
                                        if ( $re_list["branch2"] != "" ){
                                            echo "/跨區：".$re_list["branch2"].SingleName($re_list["single2"],"normal");
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $re_list["ip"];?></td>
                                    <td><?php echo $re_list["times"];?></td>														
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