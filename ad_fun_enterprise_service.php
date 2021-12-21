<?php
    /*****************************************/
    //檔案名稱：ad_fun_enterprise_service.php
    //後台對應位置：好好玩管理系統/企業委辦
    //改版日期：2021.12.14
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/
    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar.php");

    //程式開始 *****
    if ($_SESSION["MM_Username"] == "") {
        call_alert("請重新登入。", "login.php", 0);
    }
    if($_SESSION["MM_UserAuthorization"] != "admin"){
        call_alert("您沒有查看此頁的權限。","login.php",0);
    }

    // 刪除
    if($_REQUEST['st'] == "del"){
        $SQL = "delete from enterprise_service where auton=" .SqlFilter($_REQUEST["an"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("win_close.php?m=刪除中");
        }
    }

    $default_sql_num = 500; // 初始查詢數字    
    if( $_REQUEST["vst"] == "full" ){
        $sqlv = "*";
        $sqlv2 = "count(auton)";        
    }else{
        $sqlv = "top " .$default_sql_num. " *";
        $sqlv2 = "count(auton)";
    }

    // 檢查權限查詢-總筆數
    switch($_SESSION["MM_UserAuthorization"]){
        case "admin":
            $sqls2 = "SELECT ".$sqlv2." as total_size FROM enterprise_service WHERE 1=1";
            break;
        default:
            $sqls2 = "SELECT ".$sqlv2." as total_size FROM enterprise_service WHERE all_branch= '".$_SESSION["branch"]."'";
    }

    if($_REQUEST["s99"] != "1"){
        if($_SESSION["MM_UserAuthorization"] == "admin"){
            $sqlss = " and all_type <> '已發送'";
            $sqls2 = $sqls2 . " and all_type <> '已發送'";
        }else{
            $sqlss = " and all_type = '已發送' and contents is null";
            $sqls2 = $sqls2 . " and all_type = '已發送' and contents is null";
        }
        $all_type = "未處理";
    }else{
        if($_SESSION["MM_UserAuthorization"] == "admin"){
            $sqlss = " and all_type = '已發送'";
            $sqls2 = $sqls2 . " and all_type = '已發送'";
        }else{
            $sqlss = " and all_type = '已發送' and not contents is null";
            $sqls2 = $sqls2 . " and all_type = '已發送' and not contents is null";
        }
        $all_type = "已處理";
    }

    // 總筆數SQL
    $sqls2 = $sqls2 . $sqlss;
    // 查詢總筆數
    $rs = $FunConn->prepare($sqls2);
    $rs->execute();
    $result = $rs->fetch(PDO::FETCH_ASSOC);
    if (!$result){
        $total_size = 0;
    }else{
        if( $_REQUEST["vst"] == "full" ){
            $total_size = $result["total_size"]; //總筆數
        }else{
            if($result["total_size"] > 500 ) {
                $total_size =  500;
            }else{
                $total_size =  $result["total_size"];
            }  
        }
    }
    $tPage = 1; //目前頁數
    $tPageSize = 50; //每頁幾筆
	if ( $_REQUEST["tPage"] > 1 ){ $tPage = $_REQUEST["tPage"];}
	$tPageTotal = ceil(($total_size/$tPageSize)); //總頁數
	if ( $tPageSize*$tPage < $total_size ){
		$page2 = 50;
	}else{
		$page2 = (50-(($tPageSize*$tPage)-$total_size));
	}
   
    // 檢查權限查詢-每筆資料
    switch($_SESSION["MM_UserAuthorization"]){
        case "admin":
            $sqls = "SELECT ".$sqlv." FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM enterprise_service Where 1=1";
            break;
        default:
            $sqls = "SELECT ".$sqlv." FROM (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM enterprise_service WHERE all_branch= '".$_SESSION["branch"]."'";
    }
    
    // SQL
    $sqls = $sqls . $sqlss . " order by auton desc ) t1 order by auton) t2 order by auton desc";
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">企業委辦</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>企業委辦　<?php echo $all_type; ?> - 數量：<?php echo $total_size; ?></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <p>
                    <div class="btn-group">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <?php 
                                if($all_type == "未處理"){
                                    echo "<li><a href='?s99=1' target='_self'><i class='icon-resize-horizontal'></i> 切換已處理</a></li>";
                                }
                                if($all_type == "已處理"){
                                    echo "<li><a href='ad_fun_enterprise_service.php' target='_self'><i class='icon-resize-horizontal'></i> 切換未處理</a></li>";
                                }
                            ?>
                        </ul>
                    </div>
                    </p>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th>委辦公司</th>
                            <th>聯絡人</th>
                            <th>性別</th>
                            <th>電話</th>
                            <th>E-mail</th>
                            <th>留言內容</th>
                            <th>處理情形</th>
                            <th width=120>處理人員</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $rs = $FunConn->prepare($sqls);
                            $rs->execute();
                            $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                            if(!$result){
                                echo "<tr><td colspan=8 height=200>目前沒有資料</td></tr>";
                            }else{
                                foreach($result as $re){ ?>
                                    <tr> 
                                        <td class="center"><?php echo $re["comp"]; ?></td>
                                        <td class="center"><?php echo $re["cname"]; ?></td>
                                        <td class="center"><?php echo $re["sex"]; ?></td>
                                        <td class="center"><?php echo $re["phone"]; ?></td>
                                        <td class="center"><?php echo $re["email"]; ?></td>
                                        <td class="center"><?php echo $re["contents"]; ?></td>
                                        <td>
                                            <font color="#FF0000" size="2">處理情形：
                                                <?php 
                                                    if($re["all_type"] != "未處理"){
                                                        echo $re["all_type"] ." ". $re["all_note"];
                                                    }
                                                ?>                                                
                                            </font>
                                            <br><?php echo changeDate($re["times"]); ?>
                                        </td>
                                        <td class="center"><?php echo $re["all_branch"]; ?> - <?php echo SingleName($re["all_single"],'normal'); ?></td>
                                        <td width=80 class="center">
                                            <div class="btn-group">							
                                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                                <ul class="dropdown-menu pull-right">
                                                    <?php 
                                                        if($_SESSION["MM_UserAuthorization"] == "admin" && $_SESSION["branch"] != "好好玩旅行社"){ ?>
                                                            <li><a href="javascript:Mars_popup('ad_fun_enterprise_service_send_branch.php?an=<?php echo $re["auton"]; ?>','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
								                            <li><a href="javascript:Mars_popup2('ad_fun_enterprise_service.php?st=del&an=<?php echo $re["auton"]; ?>','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>
                                                        <?php }
                                                    ?>
                                                    <li><a href="javascript:Mars_popup('ad_fun_enterprise_service_fix.php?an=<?php echo $re["auton"]; ?>','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- 頁碼 -->
            <?php require_once("./include/_page.php"); ?>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
    require_once("./include/_bottom.php");
?>