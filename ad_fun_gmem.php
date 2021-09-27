<?php
require_once("./include/_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php")
?>


<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">金卡俱樂部</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>金卡俱樂部　已處理 - 數量：500　<a href="?vst=full&s99=1">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <div class="btn-group pull-left margin-right-10">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <!--<li><a href="ad_register1.php" target="_blank"><i class="icon-star"></i> 新增會員資料</a></li>-->

                            <li><a href="javascript:mutil_send();"><i class="icon-tag"></i> 多選發送</a></li>

                            <li><a href="ad_fun_gmem.php" target="_self"><i class="icon-resize-horizontal"></i> 切換未處理</a></li>

                            <li><a href="ad_fun_gmem_f.php"><i class="icon-tag"></i> 進階搜尋</a></li>
                        </ul>
                    </div>　

                    <form id="searchform" action="ad_fun_gmem.php?vst=full&sear=1" method="post" target="_self" class="form-inline pull-left" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type">
                            <option value="s2">手機</option>
                            <option value="s5">身分證字號</option>
                            <option value="s1">信箱</option>
                            <option value="s3">姓名</option>
                            <option value="s4">編號</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text">
                        <input class="btn btn-default" type="submit" value="送出">
                    </form>

                </div>

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
                            <th>會館</th>
                            <th>秘書</th>
                            <th>照片</th>
                            <th width=80>證明</th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="3590"></td>

                            <td class="center">活動宣傳 [funtour_lineat_dialogue]</td>
                            <td>10003319</td>
                            <td class="center"><a href="ad_fun_gmem_detail.php?mem_auto=3590" target="_blank">顏孝先</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0627437740" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0627437740" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1981/8/6</td>
                            <td class="center">大學</td>
                            <td class="center">台中</td>

                            <td class="center">賴語蓁</td>
                            <td class="center">無</font>
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_gmem_detail.php?mem_auto=3590" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=3590&ty=gmember&rc=金卡會員','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_gmem_fix.php?mem_auto=3590','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>

                                        <li><a href="javascript:Mars_popup('ad_fun_send_gbranch.php?mem_auto=3590','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>

                                        <li><a href="javascript:Mars_popup2('ad_fun_gmem_del.php?mem_auto=3590&mem_num=10003319','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=sole0806@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                2016/8/15 上午 10:33:00(<a href="javascript:Mars_popup('ad_fun_report.php?k_id=3590&ty=gmember&rc=金卡會員','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">已發送　 台中賴語蓁</font>) 內容：無　　
                                <a href="javascript:Mars_popup('ad_fun_goldcard_point.php?mem_num=10003319&n=顏孝先','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">設定點數</a>
                                　<font color=blue>點數：</font>1000　
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 10 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_fun_gmem.php?topage=1&s99=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_fun_gmem.php?topage=2&s99=1 class='text'>2</a></li>
                    <li><a href=/ad_fun_gmem.php?topage=3&s99=1 class='text'>3</a></li>
                    <li><a href=/ad_fun_gmem.php?topage=4&s99=1 class='text'>4</a></li>
                    <li><a href=/ad_fun_gmem.php?topage=5&s99=1 class='text'>5</a></li>
                    <li><a href=/ad_fun_gmem.php?topage=6&s99=1 class='text'>6</a></li>
                    <li><a href=/ad_fun_gmem.php?topage=7&s99=1 class='text'>7</a></li>
                    <li><a href=/ad_fun_gmem.php?topage=8&s99=1 class='text'>8</a></li>
                    <li><a href=/ad_fun_gmem.php?topage=9&s99=1 class='text'>9</a></li>
                    <li><a href=/ad_fun_gmem.php?topage=10&s99=1 class='text'>10</a></li>
                    <li><a href=/ad_fun_gmem.php?topage=2&s99=1 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_fun_gmem.php?topage=10&s99=1 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_fun_gmem.php?topage=1&s99=1" selected>1</option>
                            <option value="/ad_fun_gmem.php?topage=2&s99=1">2</option>
                            <option value="/ad_fun_gmem.php?topage=3&s99=1">3</option>
                            <option value="/ad_fun_gmem.php?topage=4&s99=1">4</option>
                            <option value="/ad_fun_gmem.php?topage=5&s99=1">5</option>
                            <option value="/ad_fun_gmem.php?topage=6&s99=1">6</option>
                            <option value="/ad_fun_gmem.php?topage=7&s99=1">7</option>
                            <option value="/ad_fun_gmem.php?topage=8&s99=1">8</option>
                            <option value="/ad_fun_gmem.php?topage=9&s99=1">9</option>
                            <option value="/ad_fun_gmem.php?topage=10&s99=1">10</option>
                        </select></li>
                </ul>
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
        else Mars_popup('ad_fun_send_gbranch.php?mem_auto=' + $allnum, '', 'scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');
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
        location.href = "ad_fun_gmem.php?sear=1&vst=full&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>