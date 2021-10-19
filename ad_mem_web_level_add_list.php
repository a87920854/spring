<?php
require_once("./include/_inc.php");
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
            <li class="active">會員權益延長</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員權益延長</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p>
                    <a href="?branch=台北" class="btn btn-primary">台北</a>&nbsp;<a href="?branch=桃園" class="btn btn-primary">桃園</a>&nbsp;<a href="?branch=新竹" class="btn btn-primary">新竹</a>&nbsp;<a href="?branch=台中" class="btn btn-primary">台中</a>&nbsp;<a href="?branch=台南" class="btn btn-primary">台南</a>&nbsp;<a href="?branch=高雄" class="btn btn-primary">高雄</a>&nbsp;<a href="?branch=八德" class="btn btn-primary">八德</a>&nbsp;<a href="?branch=約專" class="btn btn-primary">約專</a>&nbsp;<a href="?branch=迷你約" class="btn btn-primary">迷你約</a>&nbsp;<a href="?branch=總管理處" class="btn btn-primary">總管理處</a>&nbsp;
                </p>
                <table class="table table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <td width="100">編號</td>
                            <td width="100">姓名</td>
                            <td width="100">會館</td>
                            <td width="160">會員祕書/處理人</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>                    
                        <tr>
                            <td>1503490</td>
                            <td><a href="ad_mem_detail.php?mem_num=1503490" target="_blank">測試-尹宜君</a></td>
                            <td>總管理處</td>
                            <td>宜君/宜君</td>
                            <td>宜君於2021-10-15 17:02延長會員權益[真人認證會員]至 2021-08-26 => 2022-10-15，原因：11</td>
                        </tr>
                        <tr>
                            <td>1503490</td>
                            <td><a href="ad_mem_detail.php?mem_num=1503490" target="_blank">測試-尹宜君</a></td>
                            <td>總管理處</td>
                            <td>宜君/宜君</td>
                            <td>宜君於2021-10-15 17:02延長會員權益[璀璨VIP會員-二年期]至 2023-05-26 => 2022-10-15，原因：11</td>
                        </tr>
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