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
            <li class="active">夏日璀璨之星</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>夏日璀璨之星</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                <form name="form1" method="post" action="?t=2&st=search" onsubmit="return chk_form()" style="border:0;margin:0;padding:0">
                    <select name="types" id="types">
                        <option value="">請選擇</option>
                        <option value="">類型</option>
                        <option value="姊姊型女孩">姊姊型女孩</option>
                        <option value="精豆型女孩">精豆型女孩</option>
                        <option value="(偽)素顏型女孩">(偽)素顏型女孩</option>
                    </select>
                    <input type="text" name="time1" id="time1" class="datepicker" autocomplete="off" placeholder="開始時間" value=""> - <input type="text" name="time2" id="time2" class="datepicker" autocomplete="off" placeholder="結束時間" value="">
                    <input type="submit" class="btn" value="查詢" style="margin-top:-10px;">
                </form>
                </p>
                <table class="table table-bordered bootstrap-datatable">

                    <tr>
                        <th width=20><input data-no-uniform="true" type="checkbox" id="selnums"></th>
                        <th width=20></th>
                        <th colspan=10><a href="javascript:mutil_send();" class="btn">多選轉換</a>　<a href="javascript:mutil_del();" class="btn">多選刪除</a></th>
                    </tr>
                    <tr id="showtr_63" style="background:#ffffff">
                        <td><input data-no-uniform="true" type="checkbox" name="nums" value="63"></td>
                        <td>1</td>
                        <td width=60>
                            <font style="color:blue">未轉換</font><br>已開放
                        </td>
                        <td width=80><a href="ad_mem_detail.php?mem_num=1346567" target="_blank">Reva</a>[facebook_pay0811]</td>
                        <td>0963069663<br>
                            <font color=red>春D會員</font>
                        </td>
                        <td width=60>show761004@hotmail.com<br></td>
                        <td width=100>(偽)素顏型女孩</td>
                        <td width=120>票數：724　<a href="#edit_votes_63" class="lightbox" data-lightbox="iframe" data-plugin-options='{"type":"inline", "closeOnContentClick":false}'>修改</a></td>
                        <td width=60>新竹市</td>
                        <td><a href="http://www.singleparty.com.tw/17summer/assets/photo/sum2017831204811_600.jpg" class="fancybox"><img src="http://www.singleparty.com.tw/17summer/assets/photo/sum2017831204811_600.jpg" height=50></a><br>人若精彩緣自在<a href="#edit_notes_63" class="lightbox" data-lightbox="iframe" data-plugin-options='{"type":"inline", "closeOnContentClick":false}'>修改</a></td>
                        <td width=160>2017/8/31 下午 08:47:32</td>
                        <td width="60"><a href="#c" onClick="Mars_popup('?st=setshow&v=0&a=63','','width=300,height=200,top=30,left=30')">關閉</a><br><a href="#c" onClick="Mars_popup2('?st=del&a=63','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <div id="edit_notes_63" class="mfp-hide white-popup">
                        <form action="?st=editnotes&an=63" method="POST">宣言：<input type="text" name="notes" id="notes_63" value="人若精彩緣自在"><br><input type="submit" value="修改"></form>
                    </div>
                    <div id="edit_votes_63" class="mfp-hide white-popup">
                        <form action="?st=editvotes&an=63" method="POST" onsubmit="return chk_form2('63')">票數：<input type="text" name="votes" id="votes_63" value="724"><br><input type="submit" value="修改"></form>
                    </div>
                    <tr id="showtr_62" style="background:#f9f9f9">
                        <td><input data-no-uniform="true" type="checkbox" name="nums" value="62"></td>
                        <td>2</td>
                        <td width=60>
                            <font style="color:blue">未轉換</font><br>已開放
                        </td>
                        <td width=80><a href="ad_mem_detail.php?mem_num=1343130" target="_blank">范</a>[sms]</td>
                        <td>0953124231<br>
                            <font color=red>春D會員</font>
                        </td>
                        <td width=60>angie790612@yahoo.com.tw<br></td>
                        <td width=100>精豆型女孩</td>
                        <td width=120>票數：164　<a href="#edit_votes_62" class="lightbox" data-lightbox="iframe" data-plugin-options='{"type":"inline", "closeOnContentClick":false}'>修改</a></td>
                        <td width=60>桃園市</td>
                        <td><a href="http://www.singleparty.com.tw/17summer/assets/photo/sum2017823131518_952.JPG" class="fancybox"><img src="http://www.singleparty.com.tw/17summer/assets/photo/sum2017823131518_952.JPG" height=50></a><br>命中註定的另一半，快出現吧！<a href="#edit_notes_62" class="lightbox" data-lightbox="iframe" data-plugin-options='{"type":"inline", "closeOnContentClick":false}'>修改</a></td>
                        <td width=160>2017/8/23 下午 01:14:30</td>
                        <td width="60"><a href="#c" onClick="Mars_popup('?st=setshow&v=0&a=62','','width=300,height=200,top=30,left=30')">關閉</a><br><a href="#c" onClick="Mars_popup2('?st=del&a=62','','width=300,height=200,top=30,left=30')">刪除</a></td>
                    </tr>
                    <div id="edit_notes_62" class="mfp-hide white-popup">
                        <form action="?st=editnotes&an=62" method="POST">宣言：<input type="text" name="notes" id="notes_62" value="命中註定的另一半，快出現吧！"><br><input type="submit" value="修改"></form>
                    </div>
                    <div id="edit_votes_62" class="mfp-hide white-popup">
                        <form action="?st=editvotes&an=62" method="POST" onsubmit="return chk_form2('62')">票數：<input type="text" name="votes" id="votes_62" value="164"><br><input type="submit" value="修改"></form>
                    </div>
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
                url: "springweb_fun21.php",
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
                url: "springweb_fun21.php",
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

    function chk_form2(an) {
        if (!$("#votes_" + an).val()) {
            alert("請輸入票數。");
            $("#votes_" + an).focus();
            return false;
        }
        if (!$.isNumeric($("#votes_" + an).val())) {
            alert("票數只能是數字。");
            $("#votes_" + an).focus();
            return false;
        }
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