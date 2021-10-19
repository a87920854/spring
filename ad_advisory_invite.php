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
            <li><a href="index.asp">管理系統</a></li>
            <li class="active">諮詢預訂表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>諮詢預訂表</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <p>
                        <input type="button" value="新增預訂諮詢" class="btn btn-info" onclick="Mars_popup('ad_advisory_invite_add.asp','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=700,height=700,top=10,left=10');">
                        <a href="ad_advisory_invite.asp" class="btn btn-black">諮詢預訂表</a>
                        <a href="ad_advisory_invite_settime.asp" class="btn btn-green">設置諮詢時間</a>
                        <a href="ad_advisory_invite_timelist.asp" class="btn btn-blue">查詢講師時間</a>
                    </p>
                    <form id="searchform" action="ad_advisory_invite.asp" method="post" target="_self" class="form-inline" onsubmit="return chk_search_form()">
                        <input type="text" class="form-control" placeholder="請輸入關鍵字" name="keyword" id="keyword">

                        <select name="branch" id="branch">
                            <option value="">請選擇</option>
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

                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>

                        <tr>
                            <td width="74%" colspan=4><strong>110 年10月 </strong></td>
                            <td width="13%">●<a href="?y=2021&m=10&branch=">本月</a></td>
                            <td width="13%" style="border:0px">▲<a href="?y=2021&m=9&branch=">上一個月</a></td>
                            <td width="11%" style="border:0px">▼<a href="?y=2021&m=11&branch=">下一個月</a></td>
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
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">1</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">2</div>
                                <div></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">3</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">4</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">5</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">6</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">7</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">8</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">9</div>
                                <div></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">10</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">11</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">12</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">13</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">14</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#f9f9f9;">
                                <div style="height:28px;">15</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">16</div>
                                <div></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">17</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#b6effb;">
                                <div style="height:28px;">18</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">19</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">20</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">21</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">22</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">23</div>
                                <div></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">24</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">25</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">26</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">27</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">28</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">29</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">30</div>
                                <div></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#fbb4b4;">
                                <div style="height:28px;">31</div>
                                <div></div>
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
require_once("./include/_bottom.php")
?>

<script language="JavaScript">
    function chk_search_form() {
        if (!$("#keyword").val() && !$("#branch").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
        }
        if ($("#keyword").val()) {
            $("#searchform").attr("action", "ad_advisory_invite_slist.php");
        }
        return true;
    }
</script>