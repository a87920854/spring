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
            <li>春天網站系統</li>
            <li>微電影活動</li>
            <li class="active">留言管理</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>留言管理</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p>
                    <a href="springweb_fun9.php" class="btn btn-success">留言管理</a>
                    <a href="springweb_fun9.php?t=2" class="btn btn-warning">資料管理</a>
                    <a href="ad_counts_springweb_fun9.php" class="btn btn-danger">統計報表</a>
                </p>
                <p>
                <form name="form1" method="post" action="?t=2&st=search" onsubmit="return chk_form()" style="border:0;margin:0;padding:0">
                    <select name="marrys" id="marrys">
                        <option value="">請選擇</option>
                        <option value="單身">單身</option>
                        <option value="已婚">已婚</option>
                        <option value="有男/女朋友">有男/女朋友</option>
                    </select>
                    <input type="text" name="time1" id="time1" class="datepicker" autocomplete="off" placeholder="開始時間" value=""> - <input type="text" name="time2" id="time2" class="datepicker" autocomplete="off" placeholder="結束時間" value="">
                    <input type="submit" class="btn" value="查詢" style="margin-top:-10px;">
                </form>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <tr>
                        <td width=20>1210</td>
                        <td width=30>no</td>
                        <td width=80>阿元</td>
                        <td>緣份是很神奇的，隨時隨地都在你身旁。</td>
                        <td width=60>web</td>
                        <td width=160>2015/2/6 下午 08:33:54</td>
                        <td width="60"><a href="javascript:;" onClick="Mars_popup2('?st=del&a=1210','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=20>1208</td>
                        <td width=30>no</td>
                        <td width=80>手捲</td>
                        <td>姻緣天注定</td>
                        <td width=60>web</td>
                        <td width=160>2015/2/6 下午 05:32:42</td>
                        <td width="60"><a href="javascript:;" onClick="Mars_popup2('?st=del&a=1208','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <tr>
                        <td width=20>52</td>
                        <td width=30>no</td>
                        <td width=80>南君</td>
                        <td>繞了一圈，其實真的不要想太多，緣份總是很難說的!</td>
                        <td width=60>mobile</td>
                        <td width=160>2014/12/22 下午 02:35:02</td>
                        <td width="60"><a href="javascript:;" onClick="Mars_popup2('?st=del&a=52','','width=300,height=200,top=30,left=30')">刪除</a></td>
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

<script language="JavaScript">
    $(function() {
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
    });

    function mutil_send() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要轉換的資料。");
        else mem_send($allnum);
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
                    $("#showtr_" + val).remove();
                });
            } else {
                $s1 = m;
                $s2 = $("#showtr_" + m).remove();
            }

            $.ajax({
                url: "springweb_fun9.php",
                data: {
                    st: "del",
                    a: $s1
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

    function mem_send(m) {
        if (window.confirm("是否確定轉換？")) {
            myApp.showPleaseWait();
            if ($.isArray(m)) {
                $s1 = m.join(",");
                $s2 = $s1.split(",").length;
                //$s2 = $.each(m, function(i, val) { $("#showtr_"+val).remove(); }); 
            } else {
                $s1 = m;
                $s2 = 1;
                //$s2 = $("#showtr_"+m).remove();
            }
            $.ajax({
                url: "springweb_fun9.php",
                data: {
                    st: "trans",
                    a: $s1
                },
                type: "POST",
                dataType: "text",
                success: function(msg) {
                    //$s2;
                    myApp.hidePleaseWait();
                    alert($s2 + "筆資料轉換完成。");
                    location.reload();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        } else alert("請重新選擇。");
    }

    function chk_form() {
        if (!$("#marrys").val() && !$("#time1").val() && !$("#time2").val()) {
            alert("請選擇婚姻狀態。");
            return false;
        }
        if (($("#time1").val() && !$("#time2").val()) || ($("#time2").val() && !$("#time1").val())) {
            alert("開始時間和結束時間必須都要有日期。");
            return false;
        }
        return true;
    }
</script>