<?php
/*****************************************/
//檔案名稱：ad_cs_data.php
//後台對應位置：春天網站功能 > 服務滿意度調查
//改版日期：2022.1.18
//改版設計人員：Jack
//改版程式人員：Queena
/*****************************************/
require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

$auth_limit == "3";
require_once("./include/_limit.php");
check_page_power("ad_cs_data");

//接收值
$st = SqlFilter($_REQUEST["st"],"tab");
$a = SqlFilter($_REQUEST["a"],"tab");
$s99 = SqlFilter($_REQUEST["s99"],"tab");

//刪除
if ( $st == "del" ){
    $SQL_d = "Delete From cs_data Where cs_auto = ".$a;
    $rs_d = $SPConn->prepare($SQL_d);
    $rs_d->execute();
    reURL("win_close.php?m=刪除中...........");
    exit;
}
/*
default_sql_num = 500
If request("vst") = "full" Then
  sqlv = "*"
  sqlv2 = "count(cs_auto)"
Else
  sqlv = "top "&default_sql_num&" *"
  sqlv2 = "count(cs_auto)"
End If
*/

//語法 SELECT "&sqlv&" FROM cs_data 
if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
    $subSQL1 = " 1 = 1 ";
}else{
    $subSQL1 = " all_branch= '".$_SESSION["branch"]."'";
}

if ( $s99 != "1" ){
	$subSQL1 = $subSQL1 . " And (all_note IS NULL)";
    $all_type = "未處理";
}else{
	$subSQL1 = $subSQL1 . " And (not all_note IS NULL)";
    $all_type = "已處理";
}
$subSQL2 = "Order By cs_auto Desc";

//取得總筆數
$SQL = "Select count(cs_auto) As total_size From cs_data Where".$subSQL1;
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
$tPage = SqlFilter($_REQUEST["tPage"],"int");
if ( $tPage == 1 ){ $tPage_list = 0; }else{ $tPage_list = $tPage;}
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
$SQL_list .= "over(".$subSQL2.") As rownumber,mem_num,cs_name,cs_year,cs_ck,all_type,all_note,all_branch,all_single,cs_time,cs_note,cs_auto ";
$SQL_list .= "From cs_data Where ".$subSQL1." ) temp_row ";
$SQL_list .= "Where rownumber > ".($tPageSize*$tPage_list);
$rs_list = $SPConn->prepare($SQL_list);
$rs_list->execute();
$result_list = $rs_list->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">服務滿意度調查</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>服務滿意度調查　<?php echo $all_type;?> - 數量：<?php echo $total_size;?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12 margin-bottom-10">
                    <div class="btn-group">
                        <span class="text-status">目前資料：<?php echo $all_type;?></span>&nbsp;
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>&nbsp;&nbsp;
                        <ul class="dropdown-menu">
                            <?php if ( $all_type == "未處理" ){ ?>
						        <li><a href="?s99=1" target="_self"><i class="icon-resize-horizontal"></i> 切換已處理</a></li>
							<?php }?>
                            <?php if ( $all_type == "已處理" ){ ?>
                                <li><a href="ad_cs_data.php" target="_self"><i class="icon-resize-horizontal"></i> 切換未處理</a></li>
                            <?php }?>
                        </ul>
                    </div>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable table-hover">
                    <thead>
                        <tr>
                            <th width="5%">編號</th>
                            <th width="5%">姓名</th>
                            <th width="5%">年次</th>
                            <th width=120>調查</th>
                            <th>留言內容</th>
                            <th width="8%">會館</th>
                            <th width="12%">時間</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ( count($result) == 0 ){?>
                            <tr><td colspan="8" height="200">目前沒有資料</td></tr>";
                        <?php }else{
                            foreach($result_list as $re_list){?>
                                <tr> 
                                    <td class="center"><a href="ad_mem_detail.php?mem_num=<?php echo $re_list["mem_num"];?>" target="_blank"><?php echo $re_list["mem_num"];?></a></td>
                                    <td class="center"><a href="ad_mem_detail.php?mem_num=<?php echo $re_list["mem_num"];?>" target="_blank"><?php echo $re_list["cs_name"];?></a></td>
                                    <td class="center"><?php echo $re_list["cs_year"];?></td>
                                    <td class="center"><?php echo $re_list["cs_ck"];?></td>
                                    <td>
                                        <?php echo $re_list["cs_note"];?><br>
                                        <font color="#FF0000" size="2">
                                            處理情形：
                                            <?php if ( $re_list["all_type"] != "未處理" ){ echo "(".$re_list["all_type"].")"; }?>
                                            <?php echo $re_list["all_note"];?>
		                                </font>
                                    </td>
	                                <td class="center"><?php echo $re_list["all_branch"];?>
                                        <?php
                                        if ( $re_list["all_single"] != "" ){
                                            echo SingleName($re_list["all_single"],"normal");
                                        } ?>	
	                                </td>
	                                <td class="center"><?php echo changeDate($re_list["cs_time"]);?></td>
                                    <td width="80" class="center">
			    		                <div class="btn-group">
							                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
							                <ul class="dropdown-menu pull-right">
							                    <?php if ( $_SESSION["MM_UserAuthorization"] == "admin" ){ //admin才有刪除權限?>                                
								                    <li><a href="javascript:Mars_popup2('ad_cs_data.php?st=del&a=<?php echo $re_list["cs_auto"];?>','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>
						                        <?php }?>
								                <li><a href="javascript:Mars_popup('ad_cs_data_fix.php?a=<?php echo $re_list["cs_auto"];?>','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php }?>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <?php require_once("./include/_page.php"); //頁碼?>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->
<?php require_once("./include/_bottom.php");?>