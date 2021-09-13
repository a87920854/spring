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
            <li class="active">問卷報名資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>問卷報名資料　未處理 - 數量：6　<a href="?vst=full&s99=">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <div class="btn-group">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">

                            <li><a href="?s99=1" target="_self"><i class="icon-resize-horizontal"></i> 切換已處理</a></li>

                        </ul>
                    </div>

                    <form id="searchform" action="ad_love.php?vst=full&sear=1" method="post" target="_self" class="form-inline pull-left" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type">
                            <option value="s2">手機</option>
                            <option value="s3">姓名</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th><input data-no-uniform="true" type="checkbox" id="selnums"></th>
                            <th>問卷編號</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>手機</th>
                            <th>地區</th>
                            <th>婚姻</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="50"></td>
                            <td class="center">20151111狂歡禮免費送 - 總管理處</td>
                            <td class="center"><a href="javascript:Mars_popup('ad_quest_v.php?an=50','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=700,top=150,left=150');">曾玉惠</a> [<a href="ad_no_mem_s.php?mem_mobile=0912606720" target="_blank">查</a>]</td>
                            <td class="center">女</td>
                            <td class="center">0912606720</td>
                            <td class="center">宜蘭縣</td>
                            <td class="center">曾有婚姻</td>
                            <td class="center"></td>
                            <td class="center">2015/11/26 下午 01:06:46</td>
                            <td class="center">

                                <a href="javascript:Mars_popup('ad_quest_v.php?an=50','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=600,height=700,top=200,left=200');">詳細</a>　
                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="49"></td>
                            <td class="center">20151111狂歡禮免費送 - 總管理處</td>
                            <td class="center"><a href="javascript:Mars_popup('ad_quest_v.php?an=49','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=700,top=150,left=150');">劉信宏</a> [<a href="ad_no_mem_s.php?mem_mobile=0987853385" target="_blank">查</a>]</td>
                            <td class="center">男</td>
                            <td class="center">0987853385</td>
                            <td class="center">台南市</td>
                            <td class="center">未婚</td>
                            <td class="center"></td>
                            <td class="center">2015/11/24 下午 11:04:43</td>
                            <td class="center">

                                <a href="javascript:Mars_popup('ad_quest_v.php?an=49','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=600,height=700,top=200,left=200');">詳細</a>　
                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="46"></td>
                            <td class="center">20151111狂歡禮免費送 - 總管理處</td>
                            <td class="center"><a href="javascript:Mars_popup('ad_quest_v.php?an=46','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=700,top=150,left=150');">賴映涵</a> [<a href="ad_no_mem_s.php?mem_mobile=0972776937" target="_blank">查</a>]</td>
                            <td class="center">女</td>
                            <td class="center">0972776937</td>
                            <td class="center">台中市</td>
                            <td class="center">未婚</td>
                            <td class="center"></td>
                            <td class="center">2015/11/19 下午 04:36:36</td>
                            <td class="center">

                                <a href="javascript:Mars_popup('ad_quest_v.php?an=46','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=600,height=700,top=200,left=200');">詳細</a>　
                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="42"></td>
                            <td class="center">20151111狂歡禮免費送 - 總管理處</td>
                            <td class="center"><a href="javascript:Mars_popup('ad_quest_v.php?an=42','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=700,top=150,left=150');">曾鈺雯</a> [<a href="ad_no_mem_s.php?mem_mobile=0975288127" target="_blank">查</a>]</td>
                            <td class="center">女</td>
                            <td class="center">0975288127</td>
                            <td class="center">台中市</td>
                            <td class="center">未婚</td>
                            <td class="center"></td>
                            <td class="center">2015/11/14 上午 01:10:19</td>
                            <td class="center">

                                <a href="javascript:Mars_popup('ad_quest_v.php?an=42','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=600,height=700,top=200,left=200');">詳細</a>　
                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="39"></td>
                            <td class="center">20151111狂歡禮免費送 - 總管理處</td>
                            <td class="center"><a href="javascript:Mars_popup('ad_quest_v.php?an=39','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=700,top=150,left=150');">黃賴賢</a> [<a href="ad_no_mem_s.php?mem_mobile=0985118717" target="_blank">查</a>]</td>
                            <td class="center">男</td>
                            <td class="center">0985118717</td>
                            <td class="center">宜蘭縣</td>
                            <td class="center">未婚</td>
                            <td class="center"></td>
                            <td class="center">2015/11/10 下午 10:23:27</td>
                            <td class="center">

                                <a href="javascript:Mars_popup('ad_quest_v.php?an=39','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=600,height=700,top=200,left=200');">詳細</a>　
                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="38"></td>
                            <td class="center">20151111狂歡禮免費送 - 總管理處</td>
                            <td class="center"><a href="javascript:Mars_popup('ad_quest_v.php?an=38','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=600,height=700,top=150,left=150');">郭婉玲</a> [<a href="ad_no_mem_s.php?mem_mobile=0931741544" target="_blank">查</a>]</td>
                            <td class="center">女</td>
                            <td class="center">0931741544</td>
                            <td class="center">台南市</td>
                            <td class="center">未婚</td>
                            <td class="center"></td>
                            <td class="center">2015/11/8 下午 03:30:58</td>
                            <td class="center">

                                <a href="javascript:Mars_popup('ad_quest_v.php?an=38','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=600,height=700,top=200,left=200');">詳細</a>　
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 6 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_quest.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_quest.php?topage=1 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_quest.php?topage=1" selected>1</option>
                        </select></li>
                </ul>
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

    });

    function mutil_send() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要發送的會員。");
        else Mars_popup('ad_send_love_branch_mutil.php?k_id=' + $allnum, '', 'scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');
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
        location.href = "ad_quest.php?sear=1&vst=full&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>