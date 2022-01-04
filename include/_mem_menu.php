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
	//基本資料按鈕
    echo "<a class='btn btn-info";
    if ( $n == 0 ){ echo " btn-active"; }
    echo "' href='ad_mem_detail.asp?mem_num=".$mem_num.$islovepages."'>基本資料</a>&nbsp;";
    //排約頁面按鈕
    if ( $islovepages != "" ){
        echo "&nbsp;<a class='btn btn-info";
        if ( $n == 4 ){ echo " btn-active"; }
        echo "' href='ad_mem_rowv.asp?mem_num=".$mem_num.$islovepages."'>排約頁面</a>&nbsp;";
	}
    //修改資料按鈕
    if ( $ad_mem_fix_url != "" ){
        echo "&nbsp;<a class='btn btn-info";
        if ( $n == 6 ){ echo " btn-active"; }
        echo "' href='".$ad_mem_fix_url."'>修改資料</a>&nbsp;";
    }
    //服務紀錄按鈕
    if ( $n == 1 ){
        echo "&nbsp;<a class='btn btn-info btn-active' href='javascript:void(0);' style='background-color: gray; cursor:no-drop'>服務紀錄</a>&nbsp;";
    }else{
        echo "&nbsp;<a class='btn btn-info' href='ad_mem_service.asp?mem_num=".$mem_num.$islovepages."'>服務紀錄</a>&nbsp;";
    }
    //心理測驗按鈕
    echo "&nbsp;<a class='btn btn-info";
    if ( $n == 2 ){ echo " btn-active"; }
    echo "' href='ad_mem_ptest.asp?mem_num=".$mem_num.$islovepages."'>心理測驗</a>&nbsp;";
    //登入記錄按鈕
    echo "&nbsp;<a class='btn btn-info";
    if ( $n == 3 ){ echo " btn-active"; }
    echo "' href='ad_mem_login_log.asp?mem_num=".$mem_num.$islovepages."'>登入紀錄</a>&nbsp;";
    //紙本資料按鈕
    echo "&nbsp;<a class='btn btn-info";
    if ( $n == 5 ){ echo " btn-active"; }
    echo "' href='ad_important_paper.asp?mem_num=".$mem_num.$islovepages."'>紙本資料</a>&nbsp;";
}else{
    //排約頁面按鈕
	if ( $islovepages != "" ){
		echo "&nbsp;<a class='btn btn-info";
        if ( $n == 4 ){ echo " btn-active"; }
        echo "' href='ad_mem_rowv.asp?mem_num=".$mem_num.$islovepages."'>排約頁面</a>&nbsp;";
    }
    //修改資料按鈕  
    if ( $ad_mem_fix_url != "" && $showfull == 1 ){
        echo "&nbsp;<a class='btn btn-info";
        if ( $n == 6 ){ echo " btn-active"; }
        echo "' href='".$ad_mem_fix_url."'>修改資料</a>&nbsp;";
    }
    //服務紀錄按鈕
    if ( $n == 1 ){
        echo "&nbsp;<a class='btn btn-info btn-active' href='javascript:void(0);' style='background-color: gray; cursor:no-drop'>服務紀錄</a>&nbsp;";
    }else{
        echo "&nbsp;<a class='btn btn-info' href='ad_mem_service.asp?mem_num=".$mem_num.$islovepages."'>服務紀錄</a>&nbsp;";
    }
    //心理測驗按鈕
    echo "<a class='btn btn-info";
    if ( $n == 2 ){ echo " btn-active"; }
    echo "' href='ad_mem_ptest.asp?mem_num=".$mem_num.$islovepages."'>心理測驗</a>&nbsp;";
    //登入記錄按鈕
    echo "&nbsp;<a class='btn btn-info";
    if ( $n == 3 ){ echo " btn-active"; }
    echo "' href='ad_mem_login_log.asp?mem_num=".$mem_num.$islovepages."'>登入紀錄</a>&nbsp;";
}
echo "</p>";
?>