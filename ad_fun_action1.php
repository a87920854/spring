<?php
require("./include/_top.php");
require("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">好好玩國內報名</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>好好玩國內報名　 - 數量：0　<a href="?vst=full&s99=">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <div class="btn-group pull-left margin-right-10">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="ad_fun_action3.php" target="_self"><i class="icon-resize-full"></i> 切換資料版</a></li>

                            <li><a href="ad_fun_love_f.php?t=0"><i class="icon-tag"></i> 進階搜尋</a></li>
                            <li><a href="ad_fun_action_add.php"><i class="icon-plus-sign"></i> 新增報名資料</a></li>
                        </ul>
                    </div>　

                    <form id="searchform" action="ad_fun_action1.php?vst=full&sear=1" method="post" target="_self" class="form-inline pull-left" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type" class="form-control">
                            <option value="s2">手機</option>
                            <option value="s1">信箱</option>
                            <option value="s4">活動</option>
                            <option value="s3">姓名</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text">
                        <input class="btn btn-default" type="submit" value="送出">
                    </form>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable">

                        <thead>
                            <tr>
                                <th><input data-no-uniform="true" type="checkbox" id="selnums"></th>
                                <th>姓名</th>
                                <th>性別</th>
                                <th>手機</th>
                                <th>地區</th>
                                <th>活動會館</th>
                                <th>參加活動</th>
                                <th width=80>證件</th>
                                <th width=80></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan=8 height=200>目前沒有資料</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
require("./include/_bottom.php");
?>

<script type="text/javascript">
    $(function() {


        $("#selnums").on("click", function() {
            if ($(this).prop("checked"))
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", true);
                });
            else
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", false);
                });
        });
    });

    function mutil_send() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要發送的會員。");
        else Mars_popup('ad_fun_send_love_branch.php?k_id=' + $allnum, '', 'scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');
    }

    function chk_search_form() {
        if (!$("#keyword_type").val()) {
            alert("請選擇要搜尋的類型。");
            $("#keyword_type").focus();
            return false;
        }
        if (!$("#keyword").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
        }
        location.href = "ad_fun_action1.php?sear=1&vst=full&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>