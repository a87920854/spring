<?php
require_once("_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li>DateMeNow網站系統</li>
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
                            <td width="390">名稱 www.datemenow.com.tw,www.datemenow.tw (IP:210.71.228.45) 端口:443</td>
                        </tr>

                        <tr>
                            <td>服務器時間</td>
                            <td>2021/10/26 下午 01:21:32</td>
                        </tr>
                        <tr>
                            <td>IIS版本</td>
                            <td>Microsoft-IIS/10.0</td>
                        </tr>
                        <tr>
                            <td>腳本超時時間</td>
                            <td>90 秒</td>
                        </tr>
                        <tr>
                            <td>服務器腳本引擎</td>
                            <td>VBScript/5.8.16384 , JScript/5.8.16384</td>
                        </tr>
                        <tr>
                            <td>服務器操作系統</td>
                            <td>Windows Server</td>
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