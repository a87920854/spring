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
            <li class="active">排約預訂表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>排約預訂表</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <p>
                        <input type="button" value="新增預訂排約" class="btn btn-info" onclick="Mars_popup('ad_mem_love_re_invite_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=760,height=750,top=10,left=10');">
                        <a href="ad_mem_love_re_invite_list.php?y=2021&m=10" class="btn btn-success">列表模式</a>
                        <select class="form-control2" id="selom">
                            <option value="">顯示設定</option>
                            <option value="2">只顯示本館</option>
                        </select>
                    </p>
                    <form id="searchform" action="ad_mem_love_re_invite_slist.php" method="post" target="_self" class="form-inline" onsubmit="return chk_search_form()">
                        <select name="branch" id="branch">
                            <option value="">不拘</option>
                            <option value="台北">台北</option>
                            <option value="桃園">桃園</option>
                            <option value="新竹">新竹</option>
                            <option value="台中">台中</option>
                            <option value="台南">台南</option>
                            <option value="高雄">高雄</option>
                            <option value="八德">八德</option>
                            <option value="約專">約專</option>
                            <option value="迷你約">迷你約</option>
                            <option value="總管理處">總管理處</option>
                        </select>
                        <input type="text" placeholder="請輸入關鍵字" class="form-control" name="keyword" id="keyword">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>

                        <tr>
                            <td width="74%" colspan=4><strong>110 年10月 </strong></td>
                            <td width="13%">●<a href="?y=2021&m=10">本月</a></td>
                            <td width="13%" style="border:0px">▲<a href="?y=2021&m=9">上一個月</a></td>
                            <td width="11%" style="border:0px">▼<a href="?y=2021&m=11">下一個月</a></td>
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
                            <td></td>
                            <td></td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">1</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div class="text-center size-60">2</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div class="text-center size-60">3</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">4</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">5</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">6</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">7</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">8</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div class="text-center size-60">9</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div class="text-center size-60">10</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">11</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">12</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">13</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">14</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">15</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div class="text-center size-60">16</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div class="text-center size-60">17</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">18</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">19</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">20</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">21</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">22</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div class="text-center size-60">23</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div class="text-center size-60">24</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">25</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">26</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">27</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">28</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div class="text-center size-60">29</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div class="text-center size-60">30</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div class="text-center size-60">31</div>
                                <div class="text-center size-18">無排約預定記錄</div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
require_once("./include/_bottom.php");
?>

<script language="JavaScript">
    function chk_search_form() {
        if (!$("#branch").val() && !$("#keyword").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
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