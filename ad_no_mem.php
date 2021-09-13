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
            <li class="active">未入會資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>未入會資料 未處理 - 數量：0　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <div class="pull-left">
                        <a href="ad_register_no.php" class="btn btn-info">新增未入會資料</a>&nbsp;&nbsp;
                        <div class="btn-group">
                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                            <ul class="dropdown-menu">

                                <li><a href="ad_register_no.php"><i class="icon-star"></i> 新增未入會資料</a></li>
                                <li><a href="ad_no_mem_f.php"><i class="icon-tag"></i> 進階搜尋</a></li>
                            </ul>
                        </div>　
                    </div>

                    <form id="searchform" action="ad_no_mem.php?vst=full&sear=1" method="post" target="_self" class="form-inline pull-left" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type" class="form-control">
                            <option value="s2">手機</option>
                            <option value="s17">電話</option>
                            <option value="s3">姓名</option>
                            <option value="s4">編號</option>
                            <option value="s5">約會專家帳號</option>
                            <option value="s6">身分證字號</option>
                            <option value="s22">電子信箱</option>


                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text" value="">
                        <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                    </form>
                </div>
                </p>

                <p style="clear:both">
                <div class="inline-block">

                    <a class="btn btn-info" href="ad_no_mem.php">未處理</a> <a class="btn btn-info" href="ad_no_mem.php?tr=1">已處理</a>

                    <a class="btn btn-success" href="ad_no_mem.php?sear=1">所有未入會</a> <a class="btn btn-success" href="?s15=1&sear=1">資料認證</a> <a class="btn btn-success" href="ad_mem.php?s13=2">真人認證</a> <a class="btn btn-success" href="ad_mem.php?s13=3">璀璨會員</a> <a class="btn btn-success" href="ad_mem.php?s13=4">璀璨VIP會員</a>

                    <!--  <a class="btn btn-success" href="?sear=1&enterprise=1">企業會員</a>-->
                    <a class="btn btn-danger" href="ad_mem_reservation.php">預約總表</a>
                    <a class="btn btn-danger" href="ad_mem_reservation_v.php?t1=2021/9/9&t2=2021/9/9">本日預約</a>
                    <a class="btn btn-primary" href="ad_no_mem.php?st=fav&sear=1">關注名單</a>
                </div>
                <div class="inline-block btn-group">
                    <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown">舊資 <span class="caret"></span></button>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="ad_no_mem.php?old=1">2021-03 專案-男生</a></li>
                        <li><a href="ad_no_mem.php?old=2">2021-03 專案-女生</a></li>
                        <li><a href="ad_no_mem.php?old=3">2021-05 專案-2018 年前</a></li>
                    </ul>
                </div>

                <select class="form-control2 pull-right" onchange="location.href='ad_no_mem.php'+$(this).val()+''" autocomplete="off">
                    <option value="?orderby=0">預設排序</option>
                    <option value="?orderby=1">資料時間近到遠</option>
                    <option value="?orderby=2">資料時間遠到近</option>
                    <option value="?orderby=3">督導發送近到遠</option>
                    <option value="?orderby=4">督導發送遠到近</option>
                    <option value="?orderby=5">回報時間近到遠</option>
                    <option value="?orderby=6">回報時間遠到近</option>
                </select>
                </p>

                <p style="clear:both">


                <table class="table table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th><input data-no-uniform="true" type="checkbox" id="selnums"></th>
                            <th>資料來源</th>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>生日</th>
                            <th>學歷</th>
                            <th>秘書</th>
                            <th>照片</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan=10 height=200>目前沒有資料</td>
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

<script language="JavaScript">
    function reset_send_branch() {
        $("#send_branch_pay1").val("");
        $("#send_branch_pay2").val("");
        $("#send_branch_pay3").val("");
    }
    $(function() {
        console.log(_getCookie("reservation_alert") + "-alert");
        //alert(ismsie());
        $("#send_branch_div_close").on("click", function() {
            reset_send_branch();
        });
        $("#send_branch_div_close1").on("click", function() {
            reset_send_branch();
        });
        $("#send_branch_div_send").on("click", function() {
            var $i1 = $("#send_branch_pay1"),
                $i2 = $("#send_branch_pay2"),
                $i3 = $("#send_branch_pay3"),
                $i4 = $("#changelog"),
                $send_div = $("#send_branch_div");
            if (!$i1.val() || !$i2.val()) {
                alert("請選擇要發送的會館和秘書。");
                return false;
            }
            m = $i3.val();
            if (!m) {
                alert("發送編號讀取錯誤。");
                return false;
            }

            if ($i4.prop("checked")) $i4s = 1;
            else $i4s = 0;

            $("#send_branch_div").modal("hide");
            myApp.showPleaseWait();
            $s1 = m;
            $.ajax({
                url: "ad_no_mem.php",
                data: {
                    st: "send_branch",
                    mem_num: $s1,
                    i1: $i1.val(),
                    i2: $i2.val(),
                    changelog: $i4s
                },
                type: "POST",
                dataType: "text",
                success: function(msg) {
                    if (m.indexOf(",") > 0) {

                        $.each(m.split(","), function(i, val) {
                            $("#showtr_" + val).remove();
                            $("#showtr_" + val + "_2").remove();
                        });

                    } else {

                        $("#showtr_" + m + ",#showtr_" + m + "_2").remove();

                    }

                    myApp.hidePleaseWait();
                    reset_send_branch();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        });
        $("input[name='nums']").prop("checked", false);
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

        $(".nums_td").on("click", function(e) {
            if (e.target.tagName.toUpperCase() != "INPUT") {
                var $myc = $(this).find("input:checkbox");
                if ($myc.prop("checked")) $myc.prop("checked", false);
                else $myc.prop("checked", true);
            }
        });

    });

    function mutil_send() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要發送的會員。");
        else mem_send($allnum);
    }

    function mutil_black() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).data("phone"));
        });
        if ($allnum.length <= 0) alert("請勾選要黑名單的會員。");
        else Mars_popup('block_list.php?allphone=' + $allnum + '', '', 'status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=205,top=200,left=200');
    }

    function mutil_del() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要刪除的資料。");
        else mem_del($allnum);
    }

    function mutil_del2() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要刪除的資料。");
        else mem_del_f($allnum);
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
        location.href = "ad_no_mem.php?sear=1&st=&vst=&s99=&" + $("#keyword_type").val() + "=" + $("#keyword").val() + "&keyk=" + $("#keyword_type").val() + "&keyv=" + $("#keyword").val();
        return false;
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
                url: "ad_del_mask.php",
                data: {
                    t: "n",
                    mem_num: $s1
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

    function mem_del2(m) {
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
                url: "ad_del.php",
                data: {
                    t: "n",
                    mem_num: $s1
                },
                type: "POST",
                dataType: "text",
                success: function(msg) {
                    $s2;
                    myApp.hidePleaseWait();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(xhr.responseText);
                    myApp.hidePleaseWait();
                }
            });

        } else alert("請重新選擇。");
    }

    function mem_send(m) {
        $("#send_branch_div").modal("show");
        $("#send_branch_pay1").on("change", function() {
            personnel_get_send("send_branch_pay1", "send_branch_pay2");
        });
        $("#send_branch_pay3").val(m);
        $("#changelog").prop("checked", false);
    }

    function check_fav(n) {
        if (window.confirm("是否要設定預約聯絡時間？")) {
            Mars_popup('ad_send_log6.php?fav=1&n=' + n, '', 'scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=500,height=500,top=100,left=200');
        } else {
            Mars_popup('ad_no_mem.php?st=addfav&n=' + n, '', 'scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=200,top=10,left=10');
        }
    }

    function remove_fav(n, m) {
        $.ajax({
            url: "ad_no_mem.php",
            data: {
                st: "refav",
                n: n
            },
            type: "POST",
            dataType: "text",
            success: function(msg) {
                $(".fav_tag_" + m).remove();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    }
</script>