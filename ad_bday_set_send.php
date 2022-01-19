<?php
/********************************************/
//檔案名稱：ad_bday_set_send.php
//後台對應位置：春天網站功能 > 生日簡訊(發送記錄)
//改版日期：2022.1.18
//改版設計人員：Jack
//改版程式人員：Queena
/********************************************/
require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");
$auth_limit == "6";
require_once("./include/_limit.php");

//取得總筆數
$SQL = "Select count(auton) As total_size From bday_msg";
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
$tPageSize = 20; //每頁幾筆
$tPage = 1; //目前頁數
$tPage = SqlFilter($_REQUEST["tPage"],"int");
if ( $tPage == 1 ){ $tPage_list = 0; }else{ $tPage_list = $tPage;}
if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數

//分頁語法
$SQL_list  = "Select Top ".$tPageSize." * ";
$SQL_list .= "From (Select row_number() ";
$SQL_list .= "over(Order By times Desc) As rownumber,mem_num,name,mobile,msg,times,bday ";
$SQL_list .= "From bday_msg ) temp_row ";
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
            <li class="active">生日簡訊發送紀錄</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>生日簡訊發送紀錄</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><input type="button" value="簡訊內容" class="btn btn-info" onclick="location.href='ad_bday_set.php'">&nbsp&nbsp<input type="button" class="btn btn-warning btn-active" value="發送紀錄" style="color:black;" disabled></p>
                <p>每日早上 10:00 發送生日簡訊給會員</p>
                <span style="background-color: yellow; color:brown;"><strong>※排序欄位：發送日期(由大至小)排序。</strong></span>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <th width=100>會員編號</th>
                    <th width=80>姓名</th>
                    <th width=80>電話</th>
                    <th width=80>生日</th>
                    <th>訊息</th>
                    <th width=160>發送時間</th>
                    <?php
                    
                    if ( count($result_list) == 0 ){
                        echo "<tr><td colspan='6'>目前無紀錄</td></tr>";
                    }else{
                        foreach($result_list as $re_list){ 
                            echo "<tr>";
                            echo "<td>".$re_list["mem_num"]."</td>";
                            echo "<td>".$re_list["name"]."</td>";
                            echo "<td>".$re_list["mobile"]."</td>";
                            echo "<td>".Date_EN($re_list["bday"],1)."</td>";
                            echo "<td>".$re_list["msg"]."</td>";
                            echo "<td>".changeDate($re_list["times"])."</td>";
                            echo "</tr>";
                        }?>
                    <?php }?>
                </table>
            </div>
            <?php require_once("./include/_page.php"); ?>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->
<?php require_once("./include/_bottom.php");?>