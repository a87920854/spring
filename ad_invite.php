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
            <li class="active">約見紀錄表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>約見紀錄表</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <p>
                        <input type="button" value="新增約見紀錄" class="btn btn-info" onclick="Mars_popup('ad_invite_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=470,top=10,left=10');">
                        <a href="ad_invite_follow.php" class="btn btn-warning">約見未參追蹤表</a>
                        <a href="ad_invite_list.php?y=2021&m=9&branch=" class="btn btn-success">列表模式</a>
                        <select class="form-control2" id="selom">
                            <option value="">顯示設定</option>
                            <option value="1">只顯示自己</option>
                            <option value="2">只顯示本館</option>
                        </select>
                    </p>

                    <form id="searchform" action="ad_invite.php" method="post" target="_self" class="form-inline" onsubmit="return chk_search_form()">
                        <input type="text" class="form-control" placeholder="請輸入關鍵字" name="keyword" id="keyword">

                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>

                        <tr>
                            <td width="74%" colspan=4><strong>110 年9月 </strong></td>
                            <td width="13%">●<a href="?y=2021&m=9&branch=">本月</a></td>
                            <td width="13%" style="border:0px">▲<a href="?y=2021&m=8&branch=">上一個月</a></td>
                            <td width="11%" style="border:0px">▼<a href="?y=2021&m=10&branch=">下一個月</a></td>
                        </tr>
                        <tr>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期日</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期一</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期二</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期三</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期四</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期五</td>
                            <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期六</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=1&branch=">1</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=1&branch=">27 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=2&branch=">2</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=2&branch=">30 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=3&branch=">3</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=3&branch=">42 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=4&branch=">4</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=4&branch=">111 筆約見記錄</a></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=5&branch=">5</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=5&branch=">115 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=6&branch=">6</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=6&branch=">55 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=7&branch=">7</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=7&branch=">36 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=8&branch=">8</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=8&branch=">41 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=9&branch=">9</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=9&branch=">31 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#b6effb;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=10&branch=">10</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=10&branch=">33 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=11&branch=">11</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=11&branch=">65 筆約見記錄</a></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=12&branch=">12</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=12&branch=">84 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=13&branch=">13</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=13&branch=">20 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=14&branch=">14</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=14&branch=">11 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=15&branch=">15</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=15&branch=">6 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=16&branch=">16</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=16&branch=">8 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=17&branch=">17</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=17&branch=">3 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=18&branch=">18</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=18&branch=">12 筆約見記錄</a></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=19&branch=">19</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=19&branch=">11 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=20&branch=">20</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=20&branch=">2 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">21</div>
                                <div class="text-center size-18">無約見記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=22&branch=">22</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=22&branch=">1 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=23&branch=">23</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=23&branch=">2 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">24</div>
                                <div class="text-center size-18">無約見記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=25&branch=">25</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=25&branch=">5 筆約見記錄</a></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=26&branch=">26</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=26&branch=">3 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=27&branch=">27</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=27&branch=">1 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">28</div>
                                <div class="text-center size-18">無約見記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=29&branch=">29</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=29&branch=">2 筆約見記錄</a></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60"><a href="ad_invite_d.php?y=2021&m=9&d=30&branch=">30</a></div>
                                <div class="text-center size-18"><a href="ad_invite_d.php?y=2021&m=9&d=30&branch=">1 筆約見記錄</a></div>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>


                    </tbody>
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

<script language="JavaScript">
    function chk_search_form() {
        if (!$("#keyword").val() && !$("#branch").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
        }
        if ($("#keyword").val()) {
            $("#searchform").attr("action", "ad_invite_slist.php");
        }
        return true;
    }
    $(function() {
        var $curr = $(location).attr("search"),
            $path = $(location).attr("pathname");
        $("#selom").on("change", function() {
            if (!$(this).val()) location.href = $path + "?r=b";
            else location.href = $path + "?om=" + $(this).val() + "";
        });
    });
</script>