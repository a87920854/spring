<?php
error_reporting(0); 
/*****************************************/
//檔案名稱：ad_dmn_business.php
//後台對應位置：名單/發送記錄>DMN企業專區
//改版日期：2021.10.22
//改版設計人員：Jack
//改版程式人員：Queena
/*****************************************/

require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");

$auth_limit = 4;
require_once("./include/_limit.php");

if ( SqlFilter($_REQUEST["st"],"tab") == "del" ){
    $SQL = "Delete From business_contact Where id='".SqlFilter($_REQUEST["id"],"tab")."'";
    $rs = $DMNConn->prepare($SQL);
    $rs->execute();
    reURL("win_close.php?m=刪除中...");
    //header("location:win_close.php?m=刪除中...");
    //exit;
}
?>
<script type="text/JavaScript" src="./include/script.js"></script>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">DMN企業專區</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <?php
        //Set rs = Server.CreateObject("ADODB.Recordset")
        $SQL = "Select * From business_contact Where 1 = 1";
        if ( SqlFilter($_REQUEST["s99"],"tab") != "1" ){
            $subSQL = " And (all_note IS NULL)";
            $all_type = "未處理";
        }else{
            $subSQL = " And not (all_note IS NULL)";
            $all_type = "已處理";
        }
        $SQL .= $subSQL." Order By id Desc";

        //取得總筆數
        $SQL = "Select count(id) As total_size From business_contact Where 1 = 1".$subSQL;
        $rs = $DMNConn->prepare($SQL);
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
        if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
        $tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
        if ( $tPageSize*$tPage < $total_size ){
            $page2 = 50;
        }else{
            $page2 = (50-(($tPageSize*$tPage)-$total_size));
        }

        //分頁程式
        $SQL  = "Select * From (";
        $SQL .= "Select TOP ".$page2." * From (";
        $SQL .= "Select TOP ".($tPageSize*$tPage)." * From business_contact Where 1=1".$subSQL." Order By id Asc) t1 Where 1=1".$subSQL." Order By id Desc ) t2 Where 1=1".$subSQL." Order By id Desc ";
        $rs = $DMNConn->prepare($SQL);
        $rs->execute();
        $result=$rs->fetchAll(PDO::FETCH_ASSOC); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>DMN企業專區　<?php echo $all_type; ?> - 數量：<?php echo $total_size; ?></strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <div class="col-md-12 margin-bottom-10">
                    <div class="btn-group">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <?php if ( $all_type == "未處理" ){ ?>
                                <li><a href="?s99=1" target="_self"><i class="icon-resize-horizontal"></i> 切換已處理</a></li>
                            <?php }else{ ?>
                                <li><a href="ad_dmn_business.php" target="_self"><i class="icon-resize-horizontal"></i> 切換未處理</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width="6%">姓名</th>
                            <th width="10%">E-mail</th>
                            <th width="10%">電話</th>
                            <th width="10%">公司名稱</th>
                            <th width="15%">留言時間</th>
                            <th>&nbsp;</th>
                            <th width="8%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ( count($result) == 0 ){
                            echo "<tr><td colspan='8' height='200'>目前沒有資料</td></tr>";
                        }else{ 
                            foreach($result as $re){ ?>
                                <tr>
                                    <td class="center"><?php echo $re["name"]; ?></td>
                                    <td class="center"><?php echo $re["email"]; ?></td>
                                    <td class="center"><?php echo $re["companyphone"]; ?></td>
                                    <td class="center"><?php echo $re["company"]; ?></td>
                                    <td class="center"><?php echo changeDate($re["create_time"]); ?></td>
                                    <td>
                                        <font color="#FF0000" size="2">處理情形：
                                            <?php
                                            if ( $re["all_type"] == "已處理" ){
                                                echo "(".$re["all_type"].")";
                                            }
                                            echo $re["all_note"]; ?>
                                        </font>
                                    </td>
                                    <td width="80" class="center">
                                        <div class="btn-group">
                                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                            <ul class="dropdown-menu pull-right">
                                                <?php if ( $_SESSION["MM_UserAuthorization"] == "admin" ){ ?>
                                                    <li><a href="javascript:Mars_popup2('ad_dmn_business.php?st=del&id=<?php echo $re["id"];?>','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>
                                                <?php }?>
                                                <li><a href="javascript:Mars_popup('ad_dmn_business_fix.php?id=<?php echo $re["id"];?>','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php }?>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <?php require_once("./include/_page.php"); ?>
        </div>
        <!--/span-->
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->
<?php require_once("./include/_bottom.php"); ?>