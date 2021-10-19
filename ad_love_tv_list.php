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
            <li class="active">視訊排約紀錄表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>視訊排約紀錄表 - 數量：488　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form name="form1" method="post" action="?vst=full" class="form-inline">
                        <p>排約日期：
                            <input type="text" class="datepicker" autocomplete="off" name="times1">
                            ～
                            <input type="text" class="datepicker" autocomplete="off" name="times2">
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
                            <th>排約日期</th>
                            <th>排約人地區</th>
                            <th>排約人</th>
                            <th>排約對象地區</th>
                            <th>排約對象</th>
                            <th>處理會館</th>
                            <th>處理秘書</th>
                            <th width="100">　</th>
                        </tr>

                        <tr>
                            <td align="center">2016/3/5 下午 07:00:00</td>
                            <td align="center">桃園</td>
                            <td align="center">柯銘峰(70)(大學)</td>
                            <td align="center">廈門</td>
                            <td align="center">葉's(76)(大學)</td>
                            <td align="center">桃園</td>
                            <td align="center">彭淑慧</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_love_tv_list.php?st=del&tv_auto=625','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2016/1/27 下午 06:00:00</td>
                            <td align="center">台南</td>
                            <td align="center">孫毅成(49)(碩士)</td>
                            <td align="center">桃園</td>
                            <td align="center">殷莉(65)(高中)</td>
                            <td align="center">桃園</td>
                            <td align="center">詹蘊庭</td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_love_tv_list.php?st=del&tv_auto=623','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>
            <div class="text-center">共 488 筆、第 1 頁／共 25 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_love_tv_list.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_love_tv_list.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_love_tv_list.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_love_tv_list.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_love_tv_list.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_love_tv_list.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_love_tv_list.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_love_tv_list.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_love_tv_list.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_love_tv_list.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_love_tv_list.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_love_tv_list.php?topage=25 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_love_tv_list.php?topage=1" selected>1</option>
                            <option value="/ad_love_tv_list.php?topage=2">2</option>
                            <option value="/ad_love_tv_list.php?topage=3">3</option>
                            <option value="/ad_love_tv_list.php?topage=4">4</option>
                            <option value="/ad_love_tv_list.php?topage=5">5</option>
                            <option value="/ad_love_tv_list.php?topage=6">6</option>
                            <option value="/ad_love_tv_list.php?topage=7">7</option>
                            <option value="/ad_love_tv_list.php?topage=8">8</option>
                            <option value="/ad_love_tv_list.php?topage=9">9</option>
                            <option value="/ad_love_tv_list.php?topage=10">10</option>
                            <option value="/ad_love_tv_list.php?topage=11">11</option>
                            <option value="/ad_love_tv_list.php?topage=12">12</option>
                            <option value="/ad_love_tv_list.php?topage=13">13</option>
                            <option value="/ad_love_tv_list.php?topage=14">14</option>
                            <option value="/ad_love_tv_list.php?topage=15">15</option>
                            <option value="/ad_love_tv_list.php?topage=16">16</option>
                            <option value="/ad_love_tv_list.php?topage=17">17</option>
                            <option value="/ad_love_tv_list.php?topage=18">18</option>
                            <option value="/ad_love_tv_list.php?topage=19">19</option>
                            <option value="/ad_love_tv_list.php?topage=20">20</option>
                            <option value="/ad_love_tv_list.php?topage=21">21</option>
                            <option value="/ad_love_tv_list.php?topage=22">22</option>
                            <option value="/ad_love_tv_list.php?topage=23">23</option>
                            <option value="/ad_love_tv_list.php?topage=24">24</option>
                            <option value="/ad_love_tv_list.php?topage=25">25</option>
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