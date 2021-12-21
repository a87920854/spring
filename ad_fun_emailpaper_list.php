<?php
    /*****************************************/
    //檔案名稱：ad_fun_emailpaper_list.php
    //後台對應位置：好好玩管理系統/電子報訂閱
    //改版日期：2021.12.21
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
    if ($_SESSION["MM_UserAuthorization"] != "admin") {
        if($_SESSION["funtourpm"] != "1"){
            call_alert("您沒有查看此頁的權限。", 0, 0);
        }        
    }

    // 刪除mail
    if($_REQUEST["st"] == "del"){
        $SQL = "delete from emailpaper where auton=" .SqlFilter($_REQUEST["an"],"int");
        $rs = $FunConn->prepare($SQL);
        $rs->execute();
        if($rs){
            reURL("win_close.php?m=刪除中");
        }
    }

?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">電子報訂閱</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>電子報訂閱</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <th width=200>時間</th>
                        <th>信箱</th>
                        <th width=200>管理</th>
                    </tr>
                    <?php 
                        $SQL2 = "select count(auton) as total_size from emailpaper Where 1=1";
                        $rs = $FunConn->prepare($SQL2);
                        $rs->execute();
                        $result = $rs->fetch(PDO::FETCH_ASSOC);
                        if (!$result){
                            $total_size = 0;
                        }else{
                            $total_size =  $result["total_size"];
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

                        $SQL = "select * from (SELECT TOP " .$page2. " * FROM (SELECT TOP " .($tPageSize*$tPage). " * FROM emailpaper order by times desc ) t1 order by times) t2 order by times desc";
                        $rs = $FunConn->prepare($SQL);
                        $rs->execute();
                        $result = $rs->fetchAll(PDO::FETCH_ASSOC);
                        if($result){
                            foreach($result as $re){
                                echo "<tr><td>".changeDate($re["times"])."</td><td>".$re["email"]."</td><td><a href=\"javascript:Mars_popup2('?st=del&an=".$re["auton"]."','','width=300,height=200,top=100,left=100');\">刪除</a></td></tr>";
                            }
                        }
                    ?>
                </table>
            </div>
            <?php 
                require_once("./include/_page.php"); 
            ?>
        </div>
        <!--/span-->

    </div>
    <!--/row-->


    <hr>
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>