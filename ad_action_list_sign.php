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
            <li><a href="ad_action_list.asp">網站活動上傳</a></li>
            <li class="active">活動異動單 - 2021-10-17 11:30&nbsp;週末桌遊電影約[13415]</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>活動異動單 - 2021-10-17 11:30&nbsp;台北&nbsp;週末桌遊電影約[13415]</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><a href="ad_action_list_sign_add.asp?ac_auto=13415" class="btn btn-success">新增異動單</a></p>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th width=140>申請時間</th>
                            <th width=180>申請人</th>
                            <th width=160>類型</th>
                            <th>內容</th>
                            <th width=120>狀態</th>
                            <th>過程</th>
                            <th width=60></th>
                        </tr>
                    </thead>

                    <tr>
                        <td class="center">2021-10-19 16:20</td>
                        <td class="center">台北-張棟崴</td>
                        <td class="center">活動異動單<br>活動新增</td>
                        <td class="center">活動資訊：2021/10/17 上午 11:30:00 週末桌遊電影約[13415] 申請新增</td>
                        <td class="center"></td>
                        <td class="center">[2021-10-19 16:20] 張棟崴提出申請 - 活動新增<br>[2021-10-19 16:20] 由 系統自動 結案-已處理(活動標註為活動新增)</td>
                        <td class="center">

                        </td>

                    </tr>

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
require_once("./include/_bottom.php");
?>