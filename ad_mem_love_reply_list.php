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
            <li class="active">約後關懷表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>約後關懷表 - 數量：500　<a href="?vst=full&s99=">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <form name="form1" method="post" action="?vst=full" class="form-inline">
                        <p>
                            排約日期：
                            <input type="text" class="datepicker" autocomplete="off" name="times1">
                            ～
                            <input type="text" class="datepicker" autocomplete="off" name="times2">

                            &nbsp;&nbsp;<input id="keyword" name="keyword" id="keyword" class="form-control" type="text" placeholder="身分證字號搜尋">
                            <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                        </p>
                        <p>

                            會館：
                            <select name="s6" id="s6">
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
                            秘書：
                            <select name="s7" id="s7">
                                <option value="">請選擇</option>
                            </select>

                            <select name="types" id="types">
                                <option value="">所有排約</option>
                                <option value="line">Line排約</option>
                                <option value="tv">視訊排約</option>
                                <option value="singleparty">約會專家</option>
                            </select>
                            <input type="submit" value="送出" class="btn btn-default">
                        </p>
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>排約日期</th>
                            <th>類型</th>
                            <th>排約人</th>
                            <th>排約人茶水費</th>
                            <th>排約對象</th>
                            <th>對象茶水費</th>
                            <th></th>
                            <th>排約人秘書</th>
                            <th>排約對象秘書</th>

                            <th width="100">　</th>
                        </tr>

                        <tr>
                            <td align="center">2021/9/8 下午 08:00:00</td>
                            <td align="center">
                                一般排約</td>
                            <td align="center">
                                劉夢湘(54)(高中)(<a href="javascript:Mars_popup('ad_report.php?k_id=1978767&lu=T121428596&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">0925221262</a>)

                            </td>
                            <td align="center">(茶卷)300
                            </td>
                            <td align="center">
                                胡翠霞(57)(高中)(<a href="javascript:Mars_popup('ad_report.php?k_id=1725321&lu=T225534293&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">0927083718</a>)

                            </td>
                            <td align="center">
                                (茶卷)0
                            </td>
                            <td align="center">無</td>
                            <td align="center">高雄-Amy</td>
                            <td align="center">高雄-Amy</td>
                            <td align="center">
                                <a href="javascript:Mars_popup('ad_mem_love_re_fix_reply.php?love_auto=262641','','width=600,height=300,top=200,left=200')" class="btn btn-info btn-sm">約後關懷</a>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 25 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_mem_love_reply_list.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_mem_love_reply_list.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_mem_love_reply_list.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_mem_love_reply_list.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_mem_love_reply_list.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_mem_love_reply_list.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_mem_love_reply_list.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_mem_love_reply_list.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_mem_love_reply_list.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_mem_love_reply_list.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_mem_love_reply_list.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_mem_love_reply_list.php?topage=25 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_mem_love_reply_list.php?topage=1" selected>1</option>
                            <option value="/ad_mem_love_reply_list.php?topage=2">2</option>
                            <option value="/ad_mem_love_reply_list.php?topage=3">3</option>
                            <option value="/ad_mem_love_reply_list.php?topage=4">4</option>
                            <option value="/ad_mem_love_reply_list.php?topage=5">5</option>
                            <option value="/ad_mem_love_reply_list.php?topage=6">6</option>
                            <option value="/ad_mem_love_reply_list.php?topage=7">7</option>
                            <option value="/ad_mem_love_reply_list.php?topage=8">8</option>
                            <option value="/ad_mem_love_reply_list.php?topage=9">9</option>
                            <option value="/ad_mem_love_reply_list.php?topage=10">10</option>
                            <option value="/ad_mem_love_reply_list.php?topage=11">11</option>
                            <option value="/ad_mem_love_reply_list.php?topage=12">12</option>
                            <option value="/ad_mem_love_reply_list.php?topage=13">13</option>
                            <option value="/ad_mem_love_reply_list.php?topage=14">14</option>
                            <option value="/ad_mem_love_reply_list.php?topage=15">15</option>
                            <option value="/ad_mem_love_reply_list.php?topage=16">16</option>
                            <option value="/ad_mem_love_reply_list.php?topage=17">17</option>
                            <option value="/ad_mem_love_reply_list.php?topage=18">18</option>
                            <option value="/ad_mem_love_reply_list.php?topage=19">19</option>
                            <option value="/ad_mem_love_reply_list.php?topage=20">20</option>
                            <option value="/ad_mem_love_reply_list.php?topage=21">21</option>
                            <option value="/ad_mem_love_reply_list.php?topage=22">22</option>
                            <option value="/ad_mem_love_reply_list.php?topage=23">23</option>
                            <option value="/ad_mem_love_reply_list.php?topage=24">24</option>
                            <option value="/ad_mem_love_reply_list.php?topage=25">25</option>
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
        $("#s6").on("change", function() {
            personnel_get("s6", "s7");
        });
        $("#member_query_button").on("click", function() {
            if (!$("#qkword").val()) {
                alert("請輸入要查詢的會員相關資料，如姓名、電話等。");
                $("#qkword").focus();
                return false;
            }
            Mars_popup('ad_mem_love_re_list.php?st=query_member&qkword=' + $("#qkword").val(), '', 'width=500,height=250,top=250,left=250');
        });

    });
</script>