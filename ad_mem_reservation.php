<?php
    include("top.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.asp">管理系統</a></li>
            <li class="active">預約聯絡表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>預約聯絡表</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <p><a href="ad_mem_reservation_list.asp?y=2021&m=9" class="btn btn-info">列表模式</a>
                        <label class="checkbox" style="padding-left:24px;"><input type="checkbox" id="om" value="1"><i></i>只顯示自己</label>
                    </p>
                    <form class="form-inline" id="searchform" action="ad_mem_reservation_slist.asp" method="post" target="_self" onsubmit="return chk_search_form()">


                        <input type="text" class="form-control" name="keyword" id="keyword">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>

                        <tr>
                            <td width="74%" colspan=4><strong>110 年9月 </strong></td>
                            <td width="13%">●<a href="?y=2021&m=9">本月</a></td>
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
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">1</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">2</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">3</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div style="height:28px;">4</div>
                                <div></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div style="height:28px;">5</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">6</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">7</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">8</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">9</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">10</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div style="height:28px;">11</div>
                                <div></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div style="height:28px;">12</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">13</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">14</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">15</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">16</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">17</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div style="height:28px;">18</div>
                                <div></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
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
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">23</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">24</div>
                                <div></div>
                            </td>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
                                <div style="height:28px;">25</div>
                                <div></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:14%;height:100px;background:#e0f3fd;">
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
                            <td style="width:14%;height:100px;background:#ffffff;">
                                <div style="height:28px;">30</div>
                                <div></div>
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
    include("bottom.php");
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
        $("#om").on("change", function() {
            if ($(this).prop("checked")) {
                location.href = $path + ($curr ? $curr + "&om=1" : "?om=1");
            } else {
                location.href = $path + ($curr ? $curr.replace("&om=1", "").replace("?om=1", "") : "");
            }
        });
    });
</script>