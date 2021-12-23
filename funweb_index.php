<?php
    /*****************************************/
    //檔案名稱：funweb_index.php
    //後台對應位置：好好玩管理系統/網站主機資訊
    //改版日期：2021.12.23
    //改版設計人員：Jack
    //改版程式人員：Jack
    /*****************************************/

    require_once("_inc.php");
    require_once("./include/_function.php");
    require_once("./include/_top.php");
    require_once("./include/_sidebar_fun.php");

    //程式開始 *****
	if($_SESSION["MM_Username"] == "" ){ 
        call_alert("請重新登入。","login.php",0);
    }
    if($_SESSION["MM_UserAuthorization"] != "admin" && $_SESSION["funtourpm"] != "1"){
        call_alert("您沒有查看此頁的權限。","login.php",0);
    }
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li>好好玩網站管理系統</li>
            <li class="active">網站主機資訊</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>網站主機資訊</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <td width="110">服務器地址</td>
                            <td width="390">名稱 <?php echo $_SERVER['SERVER_NAME'] ; ?> (IP:<?php echo $_SERVER["LOCAL_ADDR"]; ?>) 端口:<?php echo $_SERVER["SERVER_PORT"]; ?></td>
                        </tr>

                        <tr>
                            <td>服務器時間</td>
                            <td><?php echo changeDate(date("Y/m/d H:i:s")) ?></td>
                        </tr>
                        <tr>
                            <td>IIS版本</td>
                            <td><?php echo $_SERVER["SERVER_SOFTWARE"]; ?></td>
                        </tr>
                        <tr>
                            <td>腳本超時時間</td>
                            <td><?php echo ini_get("max_execution_time"); ?> 秒</td>
                        </tr>
                        <tr>
                            <td>服務器腳本引擎</td>
                            <td>PHP version: <?php echo phpversion(); ?></td>
                        </tr>
                        <tr>
                            <td>服務器操作系統</td>
                            <td><?php echo php_uname('s'); ?></td>
                        </tr>

                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php")
?>