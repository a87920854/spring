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
            <li><a href="index.asp">管理系統</a></li>
            <li class="active">約會專家-會員登入紀錄-年度統計圖表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>約會專家-會員登入紀錄-年度統計圖表</strong> <!-- panel title -->
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="ad_mem_login_log_list.asp" class="btn btn-info">會員登入紀錄</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="ad_mem_login_log_list_count.asp" class="btn btn-info">各會館統計</a>
                </span>
            </div>

            <div class="panel-body">
                <input type="checkbox" id="ismem" name="ismem" value="1" onclick="ismem_send()"> 僅會員
                <div class="col-md-12">

                </div>
                <p>不重覆登入紀錄</p>
                <table class="table table-striped table-bordered bootstrap-datatable input_small">

                    <tr>
                        <td>2022 年 1 月</td>
                        <td>2 月</td>
                        <td>3 月</td>
                        <td>4 月</td>
                        <td>5 月</td>
                        <td>6 月</td>
                        <td>7 月</td>
                        <td>8 月</td>
                        <td>9 月</td>
                        <td>10 月</td>
                        <td>11 月</td>
                        <td>12 月</td>
                    </tr>
                    <tr>
                        <td>1202</td>
                        <td>902</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>2021 年 1 月</td>
                        <td>2 月</td>
                        <td>3 月</td>
                        <td>4 月</td>
                        <td>5 月</td>
                        <td>6 月</td>
                        <td>7 月</td>
                        <td>8 月</td>
                        <td>9 月</td>
                        <td>10 月</td>
                        <td>11 月</td>
                        <td>12 月</td>
                    </tr>
                    <tr>
                        <td>546</td>
                        <td>441</td>
                        <td>461</td>
                        <td>437</td>
                        <td>587</td>
                        <td>676</td>
                        <td>632</td>
                        <td>678</td>
                        <td>641</td>
                        <td>692</td>
                        <td>671</td>
                        <td>958</td>
                    </tr>
                    <tr>
                        <td>2020 年 1 月</td>
                        <td>2 月</td>
                        <td>3 月</td>
                        <td>4 月</td>
                        <td>5 月</td>
                        <td>6 月</td>
                        <td>7 月</td>
                        <td>8 月</td>
                        <td>9 月</td>
                        <td>10 月</td>
                        <td>11 月</td>
                        <td>12 月</td>
                    </tr>
                    <tr>
                        <td>328</td>
                        <td>355</td>
                        <td>452</td>
                        <td>432</td>
                        <td>615</td>
                        <td>378</td>
                        <td>470</td>
                        <td>677</td>
                        <td>583</td>
                        <td>557</td>
                        <td>560</td>
                        <td>552</td>
                    </tr>

                </table>
                <div>
                    <div id="flot-sin" class="flot-chart">
                        <!-- FLOT CONTAINER -->
                    </div>
                </div>
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
require_once("./include/_bottom.php");
?>