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
            <li class="active">活動報名資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">


        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會館活動報名資料　 - 數量：0　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <div class="btn-group pull-left margin-right-10">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">

                            <li><a href="ad_love_f.php"><i class="icon-tag"></i> 進階搜尋</a></li>
                            <li><a href="javascript:event_search();"><i class="icon-tag"></i> 活動搜尋</a></li>
                            <li><a href="ad_action_single_add.php"><i class="icon-tag"></i> 新增參加人員</a></li>
                        </ul>
                    </div>　

                    <form id="searchform" action="ad_love.php?vst=full&sear=1" method="post" target="_self" class="form-inline pull-left" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type" class="form-control">
                            <option value="s2">手機</option>
                            <option value="s3">姓名</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>

                <p style="clear:both">

                    <a class="btn btn-success" href="ad_action.php?ty=1">網站活動</a> <a class="btn btn-success" href="ad_action.php?ty=0" disabled>會館活動</a>
                    <select class="form-control2 pull-right" onchange="location.href='ad_action.php'+$(this).val()+''" autocomplete="off">
                        <option value="?orderby=0">預設排序</option>
                        <option value="?orderby=1">依資料時間排序</option>
                        <option value="?orderby=2">依督導發送排序</option>
                    </select>
                </p>
                <table class="table table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th><input data-no-uniform="true" type="checkbox" id="selnums"></th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>手機</th>
                            <th>地區</th>
                            <th>活動會館</th>
                            <th>參加活動</th>
                            <th>處理</th>

                            <th></th>
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

        $("#search_div_send").on("click", function() {
            var $sv = $("#search_div_event");
            if (!$sv.val()) {
                alert("請選擇活動。");
                $sv.focus();
            } else {
                location.href = "ad_action.php?sear=1&vst=full&sv=" + $sv.val();
            }
        });

    });

    function mutil_send() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要發送的會員。");
        else Mars_popup('ad_send_love_branch_mutil.php?k_id=' + $allnum, '', 'scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');
    }

    function mutil_del() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要刪除的資料。");
        else mem_del($allnum);
    }

    function mem_del(m) {
        if (window.confirm("是否確定刪除？")) {
            myApp.showPleaseWait();
            if ($.isArray(m)) {
                $s1 = m.join(",");
                $s2 = $.each(m, function(i, val) {
                    $("#showtr_" + val + ",#showtr_" + val + "_2").remove();
                });
            } else {
                $s1 = m;
                $s2 = $("#showtr_" + m + ",#showtr_" + m + "_2").remove();
            }

            $.ajax({
                url: "ad_love_del.php",
                data: {
                    t: "n",
                    k_id: $s1
                },
                type: "POST",
                dataType: "text",
                success: function(msg) {
                    $s2;
                    myApp.hidePleaseWait();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        } else alert("請重新選擇。");
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
        location.href = "ad_action.php?sear=1&vst=full&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }

    function event_search() {
        $("#search_div").modal("show");
    }
</script>