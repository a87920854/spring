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
            <li><a href="index.php">管理系統</a></li>
            <li class="active">活動明細表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->


        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>活動明細表 - 數量：500　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <input type="text" name="qkword" id="qkword" class="form-control2"> <input type="button" id="member_query_button" class="btn btn-danger" value="查詢會員">
                    <form action="ad_mem_action_re_list.php?vst=full" method="post" name="form1">
                        <p><span>
                                <div class="btn-group pull-left margin-right-10">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_action_re.php"><i class="fa fa-edit"></i> 新增活動明細</a></li>
                                        <li><a href="ad_mem_action_re_list.php"><i class="fa fa-th-large"></i> 活動明細表</a></li>
                                        <li><a href="ad_mem_action_re_day.php"><i class="fa fa-th-list"></i> 每日活動記錄</a></li>
                                        <li><a href="ad_mem_action_re_ac1.php"><i class="fa fa-th-list"></i> 單一活動記錄</a></li>
                                        <li><a href="ad_mem_action_re_list_turn.php"><i class="fa fa-share"></i> 待轉資料查詢</a></li>
                                        <li><a href="ad_mem_action_re_list_turn2.php"><i class="fa fa-arrow-circle-right"></i> 退費資料查詢</a></li>

                                    </ul>
                                </div>　
                            </span>
                            回報日期：
                            <input type="text" name="t1" id="t1" class="datepicker" autocomplete="off" placeholder="時間區間" value=""> ~ <input type="text" name="t2" id="t2" class="datepicker" autocomplete="off" placeholder="時間區間" value="">
                        </p>
                        <p>
                            會館：
                            <select name="s6" id="s6" style="width:100px;">
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
                                <option value="好好玩旅行社">好好玩旅行社</option>
                            </select>
                            秘書：
                            <select name="s7" id="s7" style="width:100px;">
                                <option value="">請選擇</option>
                            </select>
                            <input type="submit" value="送出" class="btn btn-default">
                        </p>
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>報名日期</th>
                            <th>活動日期和地區/活動名稱</th>
                            <th>參加人員</th>
                            <th>收費金額</th>
                            <th width="150">活動備註</th>
                            <th>處理會館</th>
                            <th>處理秘書</th>
                            <th>狀態</th>
                            <th width="100">　</th>
                        </tr>

                        <tr>
                            <td align="center">2021/9/8 下午 09:01:00</td>
                            <td align="center">2021/9/7 下午 07:00:00(台北)每月藝文分享，好書好劇好音樂<br>

                            </td>

                            <td align="center">高雅瑩(F226885109)<br>(1988/3/27 , 0930556292)</td>
                            <td align="center">（現金）<font color="#FF0000" size="3">0</td>
                            <td align="center"></td>
                            <td align="center">桃園</td>
                            <td align="center">阿綸</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_mem_action_re_list.php?st=del&acre_auto=87397','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_list.php?st=on&acre_auto=87397','','width=300,height=200,top=100,left=100')"><i class="icon-ok-sign"></i> 參加</a></li>
                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_list.php?st=off&acre_auto=87397','','width=300,height=200,top=100,left=100')"><i class="icon-remove-sign"></i> 未參加</a></li>

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=87397','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2021/9/8 下午 09:00:00</td>
                            <td align="center">2021/9/7 下午 07:00:00(台北)每月藝文分享，好書好劇好音樂<br>

                            </td>

                            <td align="center">嚴秉均(K122091747)<br>(1981/11/16 , 0987286276)</td>
                            <td align="center">（現金）<font color="#FF0000" size="3">0</td>
                            <td align="center"></td>
                            <td align="center">桃園</td>
                            <td align="center">阿綸</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_mem_action_re_list.php?st=del&acre_auto=87396','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_list.php?st=on&acre_auto=87396','','width=300,height=200,top=100,left=100')"><i class="icon-ok-sign"></i> 參加</a></li>
                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_list.php?st=off&acre_auto=87396','','width=300,height=200,top=100,left=100')"><i class="icon-remove-sign"></i> 未參加</a></li>

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=87396','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2021/9/8 下午 09:00:00</td>
                            <td align="center">2021/9/7 下午 07:00:00(台北)每月藝文分享，好書好劇好音樂<br>

                            </td>

                            <td align="center">劉家宏(A129070827)<br>(1990/1/29 , 0970998366)</td>
                            <td align="center">（現金）<font color="#FF0000" size="3">0</td>
                            <td align="center"></td>
                            <td align="center">桃園</td>
                            <td align="center">阿綸</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_mem_action_re_list.php?st=del&acre_auto=87395','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_list.php?st=on&acre_auto=87395','','width=300,height=200,top=100,left=100')"><i class="icon-ok-sign"></i> 參加</a></li>
                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_list.php?st=off&acre_auto=87395','','width=300,height=200,top=100,left=100')"><i class="icon-remove-sign"></i> 未參加</a></li>

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=87395','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 25 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_mem_action_re_list.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_mem_action_re_list.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_mem_action_re_list.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_mem_action_re_list.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_mem_action_re_list.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_mem_action_re_list.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_mem_action_re_list.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_mem_action_re_list.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_mem_action_re_list.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_mem_action_re_list.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_mem_action_re_list.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_mem_action_re_list.php?topage=25 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_mem_action_re_list.php?topage=1" selected>1</option>
                            <option value="/ad_mem_action_re_list.php?topage=2">2</option>
                            <option value="/ad_mem_action_re_list.php?topage=3">3</option>
                            <option value="/ad_mem_action_re_list.php?topage=4">4</option>
                            <option value="/ad_mem_action_re_list.php?topage=5">5</option>
                            <option value="/ad_mem_action_re_list.php?topage=6">6</option>
                            <option value="/ad_mem_action_re_list.php?topage=7">7</option>
                            <option value="/ad_mem_action_re_list.php?topage=8">8</option>
                            <option value="/ad_mem_action_re_list.php?topage=9">9</option>
                            <option value="/ad_mem_action_re_list.php?topage=10">10</option>
                            <option value="/ad_mem_action_re_list.php?topage=11">11</option>
                            <option value="/ad_mem_action_re_list.php?topage=12">12</option>
                            <option value="/ad_mem_action_re_list.php?topage=13">13</option>
                            <option value="/ad_mem_action_re_list.php?topage=14">14</option>
                            <option value="/ad_mem_action_re_list.php?topage=15">15</option>
                            <option value="/ad_mem_action_re_list.php?topage=16">16</option>
                            <option value="/ad_mem_action_re_list.php?topage=17">17</option>
                            <option value="/ad_mem_action_re_list.php?topage=18">18</option>
                            <option value="/ad_mem_action_re_list.php?topage=19">19</option>
                            <option value="/ad_mem_action_re_list.php?topage=20">20</option>
                            <option value="/ad_mem_action_re_list.php?topage=21">21</option>
                            <option value="/ad_mem_action_re_list.php?topage=22">22</option>
                            <option value="/ad_mem_action_re_list.php?topage=23">23</option>
                            <option value="/ad_mem_action_re_list.php?topage=24">24</option>
                            <option value="/ad_mem_action_re_list.php?topage=25">25</option>
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