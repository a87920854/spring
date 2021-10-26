<?php
    error_reporting(0); 
    /*****************************************/
    //檔案名稱：ad_quest.php
    //後台對應位置：名單/發送記錄>客服中心記錄
    //改版日期：2021.10.25
    //改版設計人員：Jack
    //改版程式人員：Queena
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //權限判斷
    $auth_limit = 3;
    require_once("./include/_limit.php");
    check_page_power("ad_guest");

    //組合SQL語法
    if ( $_SESSION["MM_UserAuthorization"] == "admin" ){
        $subSQL1 = "1=1";
    }else{
        $subSQL1 = "all_branch='".$_SESSION["branch"]."'";
    }
    
    //組合subSQL語法
    if ( SqlFilter($_REQUEST["s99"],"tab") != "1" ){
        $subSQL2 = " And (all_note IS NULL)";
        $all_type = "未處理";
    }else{
        $subSQL2 = " And Not (all_note IS NULL)";
        $all_type = "已處理";
    }

    if ( SqlFilter($_REQUEST["c"],"int") != "" ){
        $c = SqlFilter($_REQUEST["c"],"int");
    }else{
        $c = 0;
    }

    $subSQL3 = " And (web <> 'singleparty' Or web is null)"; //春天/DMN客服中心 
    $subSQL4 = " And (web = 'singleparty')"; //約專客服中心 
    $subSQL5 = " And (web = 'singleparty_report')"; //約專會員檢舉
    //$SQL .= $sqls3.$sqls2.$sqls4." Order By g_auto Desc";

    //取得總筆數(春天/DMN客服中心)
    $SQL = "Select count(g_auto) As total_size From guest Where ".$subSQL1.$subSQL2.$subSQL3;
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result=$rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);
    if ( count($result) == 0 || $re["total_size"] == 0 ) {
        $total_size1 = 0;
    }else{
        $total_size1 = $re["total_size"];
    }

    //取得總筆數(約專客服中心)
    $SQL = "Select count(g_auto) As total_size From guest Where ".$subSQL1.$subSQL2.$subSQL4;
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result=$rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);
    if ( count($result) == 0 || $re["total_size"] == 0 ) {
        $total_size2 = 0;
    }else{
        $total_size2 = $re["total_size"];
    }

    //取得總筆數(約專會員檢舉)
    $SQL = "Select count(g_auto) As total_size From guest Where ".$subSQL1.$subSQL2.$subSQL5;
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result=$rs->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $re);
    if ( count($result) == 0 || $re["total_size"] == 0 ) {
        $total_size3 = 0;
    }else{
        $total_size3 = $re["total_size"];
    }

    //取得分頁資料
    $tPageSize = 50; //每頁幾筆
    $tPage = 1; //目前頁數
    if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
    $tPageTotal = ceil((${"total_size".($c+1)}/$tPageSize)); //總頁數
    if ( $tPageSize*$tPage < ${"total_size".($c+1)} ){
        $page2 = 50;
    }else{
        $page2 = (50-(($tPageSize*$tPage)-${"total_size".($c+1)}));
    }

    //分頁程式
    if ( SqlFilter($_REQUEST["c"],"int") == 0 ){ //(春天/DMN客服中心)
        $SQL  = "Select * From (";
        $SQL .= "Select TOP ".$page2." * From (";
        $SQL .= "Select TOP ".($tPageSize*$tPage)." * From guest Where ".$subSQL1.$subSQL2.$subSQL3." Order By g_auto Desc) t1 ";
        $SQL .= "Where ".$subSQL1.$subSQL2.$subSQL3." Order By g_auto Asc ) t2 Where ".$subSQL1.$subSQL2.$subSQL3." Order By g_auto Desc ";
    }elseif (  SqlFilter($_REQUEST["c"],"int") == 1 ){ //(約專客服中心)
        $SQL  = "Select * From (";
        $SQL .= "Select TOP ".$page2." * From (";
        $SQL .= "Select TOP ".($tPageSize*$tPage)." * From guest Where ".$subSQL1.$subSQL2.$subSQL4." Order By g_auto Desc) t1 ";
        $SQL .= "Where ".$subSQL1.$subSQL2.$subSQL4." Order By g_auto Asc ) t2 Where ".$subSQL1.$subSQL2.$subSQL4." Order By g_auto Desc ";
    }elseif (  SqlFilter($_REQUEST["c"],"int") == 2 ){ //(約專會員檢舉)
        $SQL  = "Select * From (";
        $SQL .= "Select TOP ".$page2." * From (";
        $SQL .= "Select TOP ".($tPageSize*$tPage)." * From guest Where ".$subSQL1.$subSQL2.$subSQL5." Order By g_auto Desc) t1 ";
        $SQL .= "Where ".$subSQL1.$subSQL2.$subSQL5." Order By g_auto Asc ) t2 Where ".$subSQL1.$subSQL2.$subSQL5." Order By g_auto Desc ";
    }
    $rs = $SPConn->prepare($SQL);
    $rs->execute();
    $result=$rs->fetchAll(PDO::FETCH_ASSOC);
?>
<script type="text/JavaScript" src="./include/script.js"></script>
<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">客服中心</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>客服中心　<?php echo $all_type;?> - 數量：<?php echo ${"total_size".($c+1)};?></strong> <!-- panel title -->
                </span>
            </div>
            <div class="panel-body">
                <div class="col-md-12 padding-bottom-10">
                    <div class="btn-group margin-right-10">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <?php if ( SqlFilter($_REQUEST["s99"],"tab") == "" ){?>
                                <li><a href="?s99=1" target="_self"><i class="icon-resize-horizontal"></i> 切換已處理</a></li>
                            <?php }else{ ?>
                                <li><a href="ad_guest.php" target="_self"><i class="icon-resize-horizontal"></i> 切換未處理</a></li>
                            <?php }?>
                        </ul>
                    </div>
                    <a class="btn btn-info" href="?c=0" disabled>春天/DMN 客服中心 (<?php echo $total_size1;?>)</a>
                    &nbsp;&nbsp;<a class="btn btn-info" href="?c=1&s99=<?php echo SqlFilter($_REQUEST["s99"],"tab"); ?>">約專客服中心 (<?php echo $total_size2;?>)</a>
                    &nbsp;&nbsp;<a class="btn btn-info" href="?c=2&s99=<?php echo SqlFilter($_REQUEST["s99"],"tab"); ?>">約專會員檢舉 (<?php echo $total_size3;?>)</a>
                    &nbsp;&nbsp;<a class="btn btn-info" href="ad_custom_complaint.php">客戶申訴</a>
                </div>

                <!--資料列表-->
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>年次</th>
                            <th>學歷</th>
                            <th>地區</th>
                            <th>手機</th>
                            <th>E-mail</th>
                            <th>留言內容</th>
                            <th>會館</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ( count($result) == 0 ){
                            echo "<tr><td colspan='8' height='200'>目前沒有資料</td></tr>";
                        }else{
                            foreach($result as $re){ 
                                if ( $re["mem_num"] != "" ){
						            $g_name = "<a href='ad_mem_detail.asp?mem_num=".$re["mem_num"]."' target='_blank'>".$re["g_name"]."[".$re["mem_num"]."]</a>";
                                }else{
                                    $g_name = $re["g_name"];
                                } ?>
                                <tr>
                                    <td class="center"><?php echo $g_name; ?></td>
                                    <td class="center"><?php echo $re["g_sex"]; ?></td>
                                    <td class="center"><?php echo $re["g_year"]; ?></td>
                                    <td class="center"><?php echo $re["g_school"]; ?></td>
                                    <td class="center"><?php echo $re["g_area"]; ?></td>
                                    <td class="center"><?php echo $re["g_mobile"]; ?></td>
                                    <td class="center"><?php echo $re["g_mail"]; ?></td>
                                    <td style="word-break: break-all;min-width:300px;">
                                        <?php
                                        $g_note = $re["g_note"];
                                        if ( $g_note != "" ){
                                            //$g_note = RemoveHTML($g_note); //先mark 因格式與線上的不符，沒有刪除htmlcode
                                            echo str_replace("\r\n","<br>",$g_note);
                                        }?>
                                        <font color="#FF0000" size="2">
                                            <br>處理情形：
                                            <?php
                                            if ( $re["all_type"] != "未處理" ){
                                                echo "(".$re["all_type"].")";
                                            }
                                            echo $re["all_note"];?>
		                                </font><br><?php echo $re["g_time"];?>
                                    </td>
                                    <td class="center"><?php echo $re["all_branch"];?></td>
                                    <td width="80" class="center">
                                        <div class="btn-group">
                                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                            <ul class="dropdown-menu pull-right">
                                                <?php
                                                if ( $_SESSION["MM_UserAuthorization"] == "admin" ){ ?>
                                                    <li><a href="javascript:Mars_popup('ad_guard_send_branch.php?g_auto=<?php echo $re["g_auto"];?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                                    <li><a href="javascript:Mars_popup2('ad_guest_del.php?g_auto=<?php echo $re["g_auto"];?>','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>
                                                <?php }?>
                                                <li><a href="javascript:Mars_popup('ad_guest_fix.php?g_auto=<?php echo $re["g_auto"];?>','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
            <?php require_once("./include/_page.php"); ?>

        </div>
        <!--/span-->

    </div>
    <!--/row-->

</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php")
?>