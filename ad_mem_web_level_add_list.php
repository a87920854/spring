<?php
/*****************************************/
//檔案名稱：ad_mem_web_level_add_list.php
//後台對應位置：排約/記錄功能 → 會員權益延長
//改版日期：2022.02.15
//改版設計人員：Jack
//改版程式人員：Queena
/*****************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

//麵包屑
$unitprocess = $m_home.$icon."排約/記錄功能".$icon."會員權益延長";

//接收值
$branch = SqlFilter($_REQUEST["branch"],"tab");

//取得總筆數
$SQL = "Select count(log_auto) As total_size From log_data where log_2='系統紀錄' And log_3='延長會員權益' And log_branch='".$branch."'";
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
$SQL_list .= "over(Order By log_time Desc) As rownumber,log_num,log_username,log_branch,now_single,log_single,log_4 ";
$SQL_list .= "From log_data where log_2='系統紀錄' And log_3='延長會員權益' ".$subSQL1.") temp_row ";
$SQL_list .= "Where rownumber > ".($tPageSize*$tPage_list);
$rs_list = $SPConn->prepare($SQL_list);
$rs_list->execute();
$result_list = $rs_list->fetchAll(PDO::FETCH_ASSOC);
?>

<section id="middle">

    <!-- 麵包屑 -->
    <header id="page-header">
        <div class="m-crumb"><i class="fa fa-folder-open-o"></i><?php echo $unitprocess;?></div>
    </header>
    <!-- /麵包屑 -->

    <div id="content" class="padding-20">
        
        <div class="panel panel-default">
            <h2 class="pageTitle">排約/記錄功能 》會員權益延長 》<?php if ( $branch != "" ){?>[<?php echo $branch;?>]<?php }?> 資料列表 [ <i style="color: #76192e;">共計 <?php echo $total_size."筆資料";?></i> ]</h2>
            <p>
            <?php
                //會館資料
                $SQL = "Select * From branch_data Where auto_no<>10 Order By admin_Sort";
                $rs = $SPConn->prepare($SQL);
                $rs->execute();
                $result=$rs->fetchAll(PDO::FETCH_ASSOC);
                foreach($result as $re){
                    if ( $branch == $re["admin_name"] ){
                        echo "<a href='javascript:void(0);' class='btn btn-success btn-active' style='color:black; cursor:not-allowed;' disabled>▶ ".$re["admin_name"]."</a>&nbsp;";
                    }else{
                        echo "<a href='?branch=".$re["admin_name"]."' class='btn btn-info'>".$re["admin_name"]."</a>&nbsp;";
                    }
                }
            ?>
            </p>
            <span>
                <br>
                <strong style="background-color: yellow; color:brown">
                    ※排序欄位：記錄時間(由近到遠)。<br>
                    ※系統僅顯示前 200 筆資料。<br>
                    ※每頁50筆資料。
                </strong>
            </span>
            <div class="panel-body">
                <table class="table table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr style="background-color: #FFDA96;">
                            <td width="6%">編號</td>
                            <td width="10%">姓名</td>
                            <td width="10%">會館</td>
                            <td width="15%">會員祕書/處理人</td>
                            <td>　</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ( $branch == "" ){?>
                            <tr><td colspan="5">請先選擇會館</td</tr>
                        <?php }else{
                            foreach($result_list as $re_list){ ?>
                                <tr>
                                    <td><?php echo $re_list["log_num"];?></td>
                                    <td><a href="ad_mem_detail.php?mem_num=<?php echo $re_list["log_num"];?>" target="_blank"><?php echo $re_list["log_username"];?></a></td>
                                    <td><?php echo $re_list["log_branch"];?></td>
                                    <td><?php echo SingleName($re_list["now_single"],"normal");?>/<?php echo SingleName($re_list["log_single"],"normal");?></td>
                                    <td><?php echo $re_list["log_4"];?></td>
                                </tr>
                            <?php }?>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <!--include頁碼-->
	        <?php require_once("./include/_page.php"); ?>
        </div>
    </div>
</section>

<?php require_once("./include/_bottom.php"); ?>