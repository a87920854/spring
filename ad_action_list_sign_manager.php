<?php
require("./include/_top.php");
require("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">活動異動單列表</li>
        </ol>
    </header>
    <!-- /page title -->


    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>活動異動單列表 - 數量：0</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                <form id="searchform" action="ad_action_list_sign_manager.php" method="post" target="_self" class="form-inline">
                    <span>
                        <div class="btn-group pull-left margin-right-10">
                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="ad_mem_action_re.php"><i class="fa fa-edit"></i> 新增活動明細</a></li>
                                <li><a href="ad_mem_action_re_list.php"><i class="fa fa-th-large"></i> 活動明細表</a></li>
                                <li><a href="ad_mem_action_re_day.php"><i class="fa fa-th-list"></i> 每日活動記錄</a></li>
                                <li><a href="ad_mem_action_re_ac1.php"><i class="fa fa-th-list"></i> 單一活動記錄</a></li>
                                <li><a href="ad_mem_action_re_list_turn.php"><i class="fa fa-share"></i> 待轉資料查詢</a></li>
                                <li><a href="ad_mem_action_re_list_turn2.php"><i class="fa fa-arrow-circle-right"></i> 退費資料查詢</a></li>

                            </ul>
                        </div>　
                    </span>
                    <input type="text" name="start_time" id="start_time" class="datepicker" autocomplete="off" value="" placeholder="申請日期開始">　～　<input type="text" name="end_time" id="end_time" class="datepicker" autocomplete="off" value="" placeholder="申請日期結束">
                    <input id="keyword" name="keyword" id="keyword" class="form-control" type="text" placeholder="搜尋內容" value="">
                    <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                </form>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td colspan=8>暫無資料</td>
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
require("./include/_bottom.php");
?>

<script type="text/javascript">
    $mtu = "ad_action_list_sign_manager.";
    $(function() {});
</script>