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
            <li>諮詢預訂表</li>
            <li class="active">查詢講師時間</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>諮詢預訂表-查詢講師時間</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <p>
                        <input type="button" value="新增預訂諮詢" class="btn btn-info" onclick="Mars_popup('ad_advisory_invite_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=700,height=700,top=10,left=10');">
                        <a href="ad_advisory_invite.php" class="btn btn-black">諮詢預訂表</a>
                        <a href="ad_advisory_invite_settime.php" class="btn btn-green">設置諮詢時間</a>
                        <a href="ad_advisory_invite_timelist.php" class="btn btn-blue">查詢講師時間</a>
                    </p>

                    <p>
                    <form action="?vst=qu" method="post" name="form1" class="form-inline">
                        會館：
                        <select name="branch" id="branch" class="form-control2">
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
                        講師：
                        <select name="single" id="single" class="form-control2">
                            <option value="">請選擇</option>
                        </select>
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                    </p>

                    <form method="post" target="_self">
                        <input type="hidden" name="nowt" value="2021/9/13">
                        <table class="table table-striped table-bordered bootstrap-datatable">
                            <tbody>

                                <tr>
                                    <td width="74%" colspan=4><strong>110 年9月 </strong></td>
                                    <td width="13%">●<a href="?y=2021&m=9">本月</a></td>
                                    <td width="13%" style="border:0px">▲<a href="?y=2021&m=8">上一個月</a></td>
                                    <td width="11%" style="border:0px">▼<a href="?y=2021&m=10">下一個月</a></td>
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
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">1</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">2</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">3</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">4</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">5</div>
                                        <div>
                                            <div style="height:28px;">11:00</div>
                                            <div style="height:28px;">12:00</div>
                                            <div style="height:28px;">13:00</div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">6</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">7</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">8</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">9</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">10</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">11</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">12</div>
                                        <div>
                                            <div style="height:28px;">11:00</div>
                                            <div style="height:28px;">12:00</div>
                                            <div style="height:28px;">13:00</div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">13</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">14</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">15</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">16</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">17</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">18</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">19</div>
                                        <div>
                                            <div style="height:28px;">11:00</div>
                                            <div style="height:28px;">12:00</div>
                                            <div style="height:28px;">13:00</div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">20</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">21</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">22</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">23</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">24</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">25</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">26</div>
                                        <div>
                                            <div style="height:28px;">11:00</div>
                                            <div style="height:28px;">12:00</div>
                                            <div style="height:28px;">13:00</div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">27</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">28</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">29</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">30</div>
                                        <div>
                                            <div style="height:28px;">14:00</div>
                                            <div style="height:28px;">15:00</div>
                                            <div style="height:28px;">16:00</div>
                                            <div style="height:28px;">17:00</div>
                                            <div style="height:28px;">18:00</div>
                                            <div style="height:28px;">19:00</div>
                                            <div style="height:28px;">20:00</div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>


                            </tbody>
                        </table>
                    </form>

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
    var $mtu = "ad_advisory_invite.";

    $(function() {
        $("#branch").on("change", function() {
            personnel_get("branch", "single");
        });


        $("#branch").val("台中");
        personnel_get("branch", "single", "B290008801");

    });
</script>