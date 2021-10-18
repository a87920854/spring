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
            <li class="active">網站認證專區</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>網站認證專區　未處理 - 數量：269　<a href="?vst=full&s99=">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <div class="btn-group pull-left margin-right-10">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">

                            <!--<li><a href="javascript:mutil_send();"><i class="icon-tag"></i> 多選發送</a></li>
								<li><a href="javascript:mutil_del();"><i class="icon-remove-sign"></i> 多選刪除</a></li>-->

                            <li><a href="?s99=1" target="_self"><i class="icon-resize-horizontal"></i> 切換已處理</a></li>

                            <!--<li><a href="ad_register_no.php"><i class="icon-star"></i> 新增未入會資料</a></li>-->

                        </ul>
                    </div>　

                    <form id="searchform" action="ad_no_mem.php?vst=full&sear=1" method="post" class="form-inline pull-left" target="_self" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type" style="width:100px;">
                            <option value="s2">手機</option>
                            <option value="s3">姓名</option>
                            <option value="s4">編號</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>
                <p style="clear:both">
                    <a class="btn btn-info" href="?c=0"><i class="icon-arrow-down" style="margin-top:3px;"></i> 春天會館</a> <a class="btn btn-info" href="?c=1">約會專家</a>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">

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
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="2081917"></td>
                            <td class="center">春天網站</td>
                            <td>2081917</td>

                            <td class="center"><a href="ad_mem_detail.php?mem_num=2081917" target="_blank">陳建明</a>　

                                [<a href="ad_no_mem_s.php?mem_mobile=0960701326" target="_blank">查</a>]


                            </td>
                            <td class="center">男</td>

                            <td class="center">1965/8/22　56 歲</td>
                            <td class="center">大學</td>

                            <td class="center">新竹 - 王敏之</td>
                            <td class="center"><a href="photo/2109052303562081917_23600.jpg?t=8063" target="_blank" class="fancybox">有</a></font>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=2081917" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1983948&lu=&ty=member','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(3)</a></li>

                                        <li><a href="ad_mem_fix.php?mem_num=2081917" target="_blank"><i class="icon-file"></i> 修改</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                <span style="color:blue">資料認證會員(待認證)　<a href="ad_mem_detail.php?mem_num=2081917">進入會員頁面審核</a></span>
                            </td>
                            <td colspan="8" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_report.php?k_id=1983948&lu=&ty=member','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(3</a>)，處理情形：<font color="#FF0000" size="2">已邀約</font>) 內容：由 開發：王敏之，邀約：王敏之 預約 2021/9/7 下午 07:00:00 至 新竹 參觀(會館約見)，聯絡情形及接待注意事項： - 系統紀錄　　<font color=blue>舊：</font>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center">共 269 筆、第 1 頁／共 6 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/web_mem.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/web_mem.php?topage=2 class='text'>2</a></li>
                    <li><a href=/web_mem.php?topage=3 class='text'>3</a></li>
                    <li><a href=/web_mem.php?topage=4 class='text'>4</a></li>
                    <li><a href=/web_mem.php?topage=5 class='text'>5</a></li>
                    <li><a href=/web_mem.php?topage=6 class='text'>6</a></li>
                    <li><a href=/web_mem.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/web_mem.php?topage=6 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/web_mem.php?topage=1" selected>1</option>
                            <option value="/web_mem.php?topage=2">2</option>
                            <option value="/web_mem.php?topage=3">3</option>
                            <option value="/web_mem.php?topage=4">4</option>
                            <option value="/web_mem.php?topage=5">5</option>
                            <option value="/web_mem.php?topage=6">6</option>
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
        if ($allnum.length <= 0) alert("請勾選要發送的會員。");
        else Mars_popup('ad_send_branch.php?mem_num=' + $allnum, '', 'scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');
    }

    function mutil_del() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要刪除的資料。");
        else Mars_popup2('ad_del.php?t=n&mem_num=' + $allnum, '', 'scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');
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
        location.href = "web_mem.php?sear=1&vst=&s99=&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>