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
            <li><a href="index.asp">管理系統</a></li>
            <li class="active">活動異動單列表</li>
        </ol>
    </header>
    <!-- /page title -->


    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>活動異動單列表 - 數量：3077</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                <form id="searchform" action="ad_action_list_sign_manager.asp" method="post" target="_self" class="form-inline">
                    <span>
                        <div class="btn-group pull-left margin-right-10">
                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="ad_mem_action_re.asp"><i class="fa fa-edit"></i> 新增活動明細</a></li>
                                <li><a href="ad_mem_action_re_list.asp"><i class="fa fa-th-large"></i> 活動明細表</a></li>
                                <li><a href="ad_mem_action_re_day.asp"><i class="fa fa-th-list"></i> 每日活動記錄</a></li>
                                <li><a href="ad_mem_action_re_ac1.asp"><i class="fa fa-th-list"></i> 單一活動記錄</a></li>
                                <li><a href="ad_mem_action_re_list_turn.asp"><i class="fa fa-share"></i> 待轉資料查詢</a></li>
                                <li><a href="ad_mem_action_re_list_turn2.asp"><i class="fa fa-arrow-circle-right"></i> 退費資料查詢</a></li>

                            </ul>
                        </div>　
                    </span>
                    <input type="text" name="start_time" id="start_time" class="datepicker" autocomplete="off" value="" placeholder="申請日期開始">　～　<input type="text" name="end_time" id="end_time" class="datepicker" autocomplete="off" value="" placeholder="申請日期結束">
                    <input id="keyword" name="keyword" id="keyword" class="form-control" type="text" placeholder="搜尋內容" value="">
                    <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                </form>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th width=140>申請時間</th>
                            <th width=180>申請人</th>
                            <th width=160>類型</th>
                            <th>內容</th>
                            <th width=120>狀態</th>
                            <th>過程</th>
                        </tr>
                    </thead>

                    <tr>
                        <td class="center">2021-10-19 16:20</td>
                        <td class="center">台北-張棟崴</td>
                        <td class="center">活動異動單<br>活動新增</td>
                        <td class="center">活動資訊：2021/10/17 上午 11:30:00 週末桌遊電影約[13415] 申請新增</td>
                        <td class="center">已處理</td>
                        <td class="center">[2021-10-19 16:20] 張棟崴提出申請 - 活動新增<br>[2021-10-19 16:20] 由 系統自動 結案-已處理(活動標註為活動新增)</td>

                    </tr>

                    <tr>
                        <td class="center">2021-10-19 16:15</td>
                        <td class="center">台北-張棟崴</td>
                        <td class="center">活動異動單<br>活動取消</td>
                        <td class="center">&#27963;&#21205;&#36039;&#35338;&#65306;2021/10/17 &#19978;&#21320; 11:00:00 &#23526;&#39636;&#65306;&#31179;&#39640;&#27683;&#29245;&#21934;&#36554;&#26376;&#32769;&#24287;&#20043;&#26053;[13330] &#30003;&#35531;&#21462;&#28040;<br>&#22825;&#20505;&#22240;&#32032;&#65306;&#38477;&#38632;&#27231;&#29575;&#39640;&#65292;&#25913;&#28858;&#23460;&#20839;&#27963;&#21205;</td>
                        <td class="center">待核准</td>
                        <td class="center">[2021-10-19 16:15] 張棟崴提出申請 - 活動取消<br>[2021-10-19 16:15] 正在等候督導/經理核准</td>

                    </tr>
                </table>

            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 25 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_action_list_sign_manager.asp?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_action_list_sign_manager.asp?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_action_list_sign_manager.asp?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_action_list_sign_manager.asp?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_action_list_sign_manager.asp?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_action_list_sign_manager.asp?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_action_list_sign_manager.asp?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_action_list_sign_manager.asp?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_action_list_sign_manager.asp?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_action_list_sign_manager.asp?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_action_list_sign_manager.asp?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_action_list_sign_manager.asp?topage=25 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_action_list_sign_manager.asp?topage=1" selected>1</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=2">2</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=3">3</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=4">4</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=5">5</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=6">6</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=7">7</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=8">8</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=9">9</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=10">10</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=11">11</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=12">12</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=13">13</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=14">14</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=15">15</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=16">16</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=17">17</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=18">18</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=19">19</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=20">20</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=21">21</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=22">22</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=23">23</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=24">24</option>
                            <option value="/ad_action_list_sign_manager.asp?topage=25">25</option>
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