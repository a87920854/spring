<?php
/**************************/
//檔案名稱：_mem_menu.php
//後台對應位置：會員資料menu
//新增日期：2022.01.03
//程式人員：Queena
/**************************/

$showfull = 0;
if ( $_SESSION["MM_UserAuthorization"] == "admin" || $_SESSION["MM_UserAuthorization"] == "branch" || $_SESSION["MM_UserAuthorization"] == "manager" || $_SESSION["MM_UserAuthorization"] == "pay" ){
    $ad_mem_fix_url = "ad_mem_fix.asp?mem_num=".$mem_num.$islovepages;
    $showfull = 1;
}elseif ( $_SESSION["MM_UserAuthorization"] == "love" || $_SESSION["MM_UserAuthorization"] == "love_manager" ){
    $ad_mem_fix_url = "ad_mem_fix_love.asp?mem_num=".$mem_num.$islovepages;    
    if ( $mb1 == $_SESSION["branch"] || $mb2 == $_SESSION["branch"] ){
        $showfull = 1;
    }
    $islovepages = "&love=1";
}else{
    $showfull = 1;
}

echo "<p>";
       
if ( $showfull == 1 ){
	echo "<a class='btn btn-primary' href='ad_mem_detail.asp?mem_num=".$mem_num.$islovepages."'>";
    if ( $n = 0 ){ echo "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>"; }
    echo "基本資料</a>&nbsp;";
    if ( $islovepages != "" ){
        echo "&nbsp;<a class='btn btn-success' href='ad_mem_rowv.asp?mem_num=".$mem_num.$islovepages."'>";
        if ( $n == 4 ){ echo "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>"; }
        echo "排約頁面</a>&nbsp;";
	}
    if ( $ad_mem_fix_url != "" ){
        echo "&nbsp;<a class='btn btn-blue' href='".$ad_mem_fix_url."'>";
        if ( $n == 6 ){ echo "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>"; }
        echo "修改資料</a>&nbsp;";
    }
    echo "&nbsp;<a class='btn btn-info' href='ad_mem_service.asp?mem_num=".$mem_num.$islovepages."'>";
    //if ( $n == 1 ){ echo "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>"; }
    if ( $n == 1 ){ echo "ddddddd"; }
    echo "服務紀錄</a>&nbsp;";
    echo "&nbsp;<a class='btn btn-danger' href='ad_mem_ptest.asp?mem_num=".$mem_num.$islovepages."'>";
    if ( $n == 2 ){ echo "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>"; }
    echo "心理測驗</a>&nbsp;";
    echo "&nbsp;<a class='btn btn-warning' href='ad_mem_login_log.asp?mem_num=".$mem_num.$islovepages."'>";
    if ( $n == 3 ){ echo "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>"; }
    echo "登入紀錄</a>&nbsp;";
    echo "&nbsp;<a class='btn btn-dirtygreen' href='ad_important_paper.asp?mem_num=".$mem_num.$islovepages."'>";
    if ( $n == 5 ){ echo "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>"; }
    echo "紙本資料</a>&nbsp;";
}else{
	if ( $islovepages != "" ){
		echo "&nbsp;<a class='btn btn-success' href='ad_mem_rowv.asp?mem_num=".$mem_num.$islovepages."'>";
        if ( $n == 4 ){ echo "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>"; }
        echo "排約頁面</a>&nbsp;";
    }
	
    if ( $ad_mem_fix_url != "" && $showfull == 1 ){
        echo "&nbsp;<a class='btn btn-blue' href='".$ad_mem_fix_url."'>";
        if ( $n == 6 ){ echo "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>"; }
        echo "修改資料</a>&nbsp;";
    }
    echo "&nbsp;<a class='btn btn-info' href='ad_mem_service.asp?mem_num=".$mem_num.$islovepages."'>";
    if ( $n == "1" ){ echo "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>"; }
    echo "服務紀錄B</a>&nbsp;";
    echo "<a class='btn btn-danger' href='ad_mem_ptest.asp?mem_num=".$mem_num.$islovepages."'>";
    if ( $n == 2 ){ echo "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>"; }
    echo "心理測驗</a>&nbsp;";
    echo "&nbsp;<a class='btn btn-warning' href='ad_mem_login_log.asp?mem_num=".$mem_num.$islovepages."'>";
    if ( $n == 3 ){ echo "<i class='fa fa-arrow-right' style='margin-top:3px;'></i>"; }
    echo "登入紀錄</a>&nbsp;";
}
echo "</p>";
?>