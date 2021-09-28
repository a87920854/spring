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
            <li class="active">會員排約時間</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員排約時間 - 數量：266　<a href="?vst=full&branch=台北&oby=love_time2 desc">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                <form name="form1" method="post" class="form-inline" action="ad_mem_love.php?vst=">

                    會館：
                    <select name="branch" id="branch">
                        <option value="">請選擇</option>
                        <option value="台北" selected>台北</option>
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


                    <select name="daysel" id="daysel" class="select2" style="width:150px;" multiple>
                        <option value="1">0 ~ 29 天</option>
                        <option value="2">30 ~ 59 天</option>
                        <option value="3">60 ~ 179 天</option>
                        <option value="4" selected>180 天以上</option>
                    </select>

                    <input id="keyword" name="keyword" class="form-control" type="text" placeholder="關鍵字" value="">
                    <select name="timeend" id="timeend">
                        <option value="">未過+已過</option>
                        <option value="1" selected>未過期</option>
                        <option value="2">已過期</option>
                    </select>
                    <select name="oby" id="oby">
                        <option value="1" selected>依最後排約時間近到遠</option>
                        <option value="2">依最後排約時間遠到近</option>
                        <option value="3">依入會時間近到遠</option>
                        <option value="4">依入會時間遠到近</option>
                    </select>

                    <input type="submit" value="送出" class="btn btn-default">
                </form>
                </p>
                <p>
                <div style="width:20px;height:20px;background:#5CC6F5;display:inline-block;"></div> 0 ~ 29 天
                &nbsp;
                <div style="width:20px;height:20px;background:#009900;display:inline-block;"></div> 30 ~ 59 天
                &nbsp;
                <div style="width:20px;height:20px;background:#ffcc33;display:inline-block;"></div> 60 ~ 179 天
                &nbsp;
                <div style="width:20px;height:20px;background:#990000;display:inline-block;"></div> 180 天以上
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>電話</th>
                            <th>次數</th>
                            <th>卡別</th>
                            <th>生日</th>
                            <th>學歷</th>
                            <th>照片</th>
                            <th>入會日</th>
                            <th>會館秘書</th>
                            <th width="100">　</th>
                        </tr>

                        <tr>
                            <td align="center">1864573</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1864573" target="_blank">韓樹溢</a></td>
                            <td align="center">男</td>
                            <td align="center">0976676301</td>

                            <td align="center">主：4&nbsp;被：0&nbsp;共：4&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1647264&lu=Q123712007&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(17)</a><br>最後一次排約：2021/4/1 下午 07:00:00&nbsp;(<font color="#990000">180 day</font>)</td>
                            <td align="center">
                                璀璨二年<br><span style="color:blue">&nbsp;&nbsp;餘 130 天</span></td>
                            <td align="center">1993/7/27</td>
                            <td align="center">專科</td>

                            <td align="center">
                                <a href="../photo/2019121022537_1864573_256985.jpg?t=7054" class="fancybox">有</a>
                            </td>
                            <td align="center">2019/12/7</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 高語鍹<br>
                                <font color=green>排約：</font>林馨彤<br>
                                <font color=green>邀約：</font>台北 - 高語鍹
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=1864573" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">1984230</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1984230" target="_blank">徐于庭</a></td>
                            <td align="center">女</td>
                            <td align="center">0919469518</td>

                            <td align="center">主：0&nbsp;被：5&nbsp;共：5&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1830071&lu=U221734672&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(24)</a><br>最後一次排約：2021/4/1 下午 07:00:00&nbsp;(<font color="#990000">180 day</font>)</td>
                            <td align="center">
                                璀璨一年<br><span style="color:blue">&nbsp;&nbsp;餘 109 天</span></td>
                            <td align="center">1995/12/31</td>
                            <td align="center">高中</td>

                            <td align="center">
                                <a href="../photo/20201114181452_1984230_229977.jpg?t=5333" class="fancybox">有</a>
                            </td>
                            <td align="center">2020/11/16</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 高語鍹<br>
                                <font color=green>排約：</font>陳紅<br>
                                <font color=green>邀約：</font>台北 - 點點
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=1984230" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">1992122</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1992122" target="_blank">吳孟庭</a></td>
                            <td align="center">男</td>
                            <td align="center">0905732203</td>

                            <td align="center">主：1&nbsp;被：0&nbsp;共：1&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1842903&lu=A127888456&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(14)</a><br>最後一次排約：2021/4/1 下午 06:00:00&nbsp;(<font color="#990000">180 day</font>)</td>
                            <td align="center">
                                璀璨一年<br><span style="color:blue">&nbsp;&nbsp;餘 131 天</span></td>
                            <td align="center">1993/3/18</td>
                            <td align="center">高中</td>

                            <td align="center">
                                <a href="../photo/2021731163736_1992122_257260.jpg?t=5794" class="fancybox">有</a>
                            </td>
                            <td align="center">2020/12/7</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 高語鍹<br>
                                <font color=green>排約：</font>陳紅<br>
                                <font color=green>邀約：</font>八德 - 吳孟玹
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=1992122" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2022187</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2022187" target="_blank">黃韶文</a></td>
                            <td align="center">男</td>
                            <td align="center">0908815650</td>

                            <td align="center">主：1&nbsp;被：0&nbsp;共：1&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1886785&lu=L122251725&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(20)</a><br>最後一次排約：2021/3/31 下午 04:00:00&nbsp;(<font color="#990000">181 day</font>)</td>
                            <td align="center">
                                璀璨二年<br><span style="color:blue">&nbsp;&nbsp;餘 576 天</span></td>
                            <td align="center">1977/10/15</td>
                            <td align="center">專科</td>

                            <td align="center">
                                <a href="../photo/20213395352_2022187_556561.jpeg?t=2895" class="fancybox">有</a>
                            </td>
                            <td align="center">2021/2/22</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 易珊<br>
                                <font color=green>排約：</font>李喬<br>
                                <font color=green>邀約：</font>台南 - 蒙芳敏
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=2022187" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">1983534</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1983534" target="_blank">朱育慶</a></td>
                            <td align="center">男</td>
                            <td align="center">0920828390</td>

                            <td align="center">主：6&nbsp;被：0&nbsp;共：6&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1829375&lu=F128518403&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(27)</a><br>最後一次排約：2021/3/28 下午 03:00:00&nbsp;(<font color="#990000">184 day</font>)</td>
                            <td align="center">
                                璀璨一年<br><span style="color:blue">&nbsp;&nbsp;餘 105 天</span></td>
                            <td align="center">1992/2/13</td>
                            <td align="center">大學</td>

                            <td align="center">
                                <a href="../photo/2020111522176_1983534_859157.jpeg?t=3019" class="fancybox">有</a>
                            </td>
                            <td align="center">2020/11/12</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 凱琳<br>
                                <font color=green>排約：</font>陳紅<br>
                                <font color=green>邀約：</font>高雄 - 沈海妮
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=1983534" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">1961870</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1961870" target="_blank">徐莉婷</a></td>
                            <td align="center">女</td>
                            <td align="center">0972860745</td>

                            <td align="center">主：0&nbsp;被：10&nbsp;共：10&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1795887&lu=F228234173&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(37)</a><br>最後一次排約：2021/3/28 下午 03:00:00&nbsp;(<font color="#990000">184 day</font>)</td>
                            <td align="center">
                                璀璨一年<br><span style="color:blue">&nbsp;&nbsp;餘 42 天</span></td>
                            <td align="center">1994/10/23</td>
                            <td align="center">大學</td>

                            <td align="center">
                                無
                            </td>
                            <td align="center">2020/9/6</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 高語鍹<br>
                                <font color=green>排約：</font>林馨彤<br>
                                <font color=green>邀約：</font>新竹 - 楊淑梅
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=1961870" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2012066</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2012066" target="_blank">徐湘琪</a></td>
                            <td align="center">女</td>
                            <td align="center">0918090047</td>

                            <td align="center">主：0&nbsp;被：6&nbsp;共：6&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1869769&lu=E220643204&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(21)</a><br>最後一次排約：2021/3/28 下午 02:00:00&nbsp;(<font color="#990000">184 day</font>)</td>
                            <td align="center">
                                璀璨一年<br><span style="color:blue">&nbsp;&nbsp;餘 174 天</span></td>
                            <td align="center">1982/11/19</td>
                            <td align="center">大學</td>

                            <td align="center">
                                無
                            </td>
                            <td align="center">2021/1/20</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 陳紅<br>
                                <font color=green>排約：</font>陳紅<br>
                                <font color=green>邀約：</font>台北 - 陳紅
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=2012066" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">1983952</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1983952" target="_blank">張文宏</a></td>
                            <td align="center">男</td>
                            <td align="center">0978536803</td>

                            <td align="center">主：5&nbsp;被：0&nbsp;共：5&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1829793&lu=G121170228&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(27)</a><br>最後一次排約：2021/3/28 下午 01:00:00&nbsp;(<font color="#990000">184 day</font>)</td>
                            <td align="center">
                                璀璨一年<br><span style="color:blue">&nbsp;&nbsp;餘 106 天</span></td>
                            <td align="center">1976/11/6</td>
                            <td align="center">專科</td>

                            <td align="center">
                                無
                            </td>
                            <td align="center">2020/11/13</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 洪儀<br>
                                <font color=green>排約：</font>陳紅<br>
                                <font color=green>邀約：</font>高雄 - 吳鳳英
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=1983952" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">1993228</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1993228" target="_blank">許嘉琦</a></td>
                            <td align="center">女</td>
                            <td align="center">0933743899</td>

                            <td align="center">主：0&nbsp;被：12&nbsp;共：12&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1844008&lu=N223093409&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(37)</a><br>最後一次排約：2021/3/27 下午 03:00:00&nbsp;(<font color="#990000">185 day</font>)</td>
                            <td align="center">
                                璀璨一年<br><span style="color:blue">&nbsp;&nbsp;餘 134 天</span></td>
                            <td align="center">1977/2/18</td>
                            <td align="center">專科</td>

                            <td align="center">
                                無
                            </td>
                            <td align="center">2020/12/11</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 高語鍹<br>
                                <font color=green>排約：</font>林馨彤<br>
                                <font color=green>邀約：</font>新竹 - 王敏之
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=1993228" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">1990919</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1990919" target="_blank">陳積璟</a></td>
                            <td align="center">女</td>
                            <td align="center">0920319186</td>

                            <td align="center">主：0&nbsp;被：4&nbsp;共：4&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1840712&lu=A224883997&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(29)</a><br>最後一次排約：2021/3/27 下午 03:00:00&nbsp;(<font color="#990000">185 day</font>)</td>
                            <td align="center">
                                璀璨二年<br><span style="color:blue">&nbsp;&nbsp;餘 492 天</span></td>
                            <td align="center">1980/2/5</td>
                            <td align="center">碩士</td>

                            <td align="center">
                                無
                            </td>
                            <td align="center">2020/12/3</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 易珊<br>
                                <font color=green>排約：</font>陳紅<br>
                                <font color=green>邀約：</font>八德 - 蔡佩蓁 Sunny
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=1990919" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">1989872</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1989872" target="_blank">洪瑞源</a></td>
                            <td align="center">男</td>
                            <td align="center">0921925936</td>

                            <td align="center">主：2&nbsp;被：0&nbsp;共：2&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1839665&lu=A125250418&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(18)</a><br>最後一次排約：2021/3/25 下午 07:00:00&nbsp;(<font color="#990000">187 day</font>)</td>
                            <td align="center">
                                璀璨二年<br><span style="color:blue">&nbsp;&nbsp;餘 489 天</span></td>
                            <td align="center">1980/3/1</td>
                            <td align="center">高職</td>

                            <td align="center">
                                無
                            </td>
                            <td align="center">2020/11/29</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 洪儀<br>
                                <font color=green>排約：</font>李喬<br>
                                <font color=green>邀約：</font>桃園 - 黃毓淳
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=1989872" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">1250455</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1250455" target="_blank">詹智翔</a></td>
                            <td align="center">男</td>
                            <td align="center">0916928712</td>

                            <td align="center">主：14&nbsp;被：0&nbsp;共：14&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=962348&lu=N125119968&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(73)</a><br>最後一次排約：2021/3/25 下午 06:00:00&nbsp;(<font color="#990000">187 day</font>)</td>
                            <td align="center">
                                璀璨頂級VIP二年<br><span style="color:blue">&nbsp;&nbsp;餘 396 天</span></td>
                            <td align="center">1987/9/27</td>
                            <td align="center">大學</td>

                            <td align="center">
                                <a href="../photo/2017417153947_1250455_865734.jpg?t=7746" class="fancybox">有</a>
                            </td>
                            <td align="center">2020/8/30</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 易珊<br>
                                <font color=green>排約：</font>陳紅<br>
                                <font color=green>邀約：</font>台北 - 易珊
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=1250455" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">1962684</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1962684" target="_blank">李姿謹</a></td>
                            <td align="center">女</td>
                            <td align="center">0920311593</td>

                            <td align="center">主：0&nbsp;被：17&nbsp;共：17&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1796701&lu=S223820713&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(56)</a><br>最後一次排約：2021/3/21 下午 04:00:00&nbsp;(<font color="#990000">191 day</font>)</td>
                            <td align="center">
                                璀璨二年<br><span style="color:blue">&nbsp;&nbsp;餘 410 天</span></td>
                            <td align="center">1985/8/16</td>
                            <td align="center">大學</td>

                            <td align="center">
                                無
                            </td>
                            <td align="center">2020/9/13</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 高語鍹<br>
                                <font color=green>排約：</font>陳紅<br>
                                <font color=green>邀約：</font>台北 - 高語鍹
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=1962684" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">1853366</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1853366" target="_blank">李柏逸</a></td>
                            <td align="center">男</td>
                            <td align="center">0986113342</td>

                            <td align="center">主：9&nbsp;被：0&nbsp;共：9&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1630113&lu=A127134695&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(30)</a><br>最後一次排約：2021/3/21 下午 03:00:00&nbsp;(<font color="#990000">191 day</font>)</td>
                            <td align="center">
                                璀璨二年<br><span style="color:blue">&nbsp;&nbsp;餘 99 天</span></td>
                            <td align="center">1988/2/2</td>
                            <td align="center">大學</td>

                            <td align="center">
                                <a href="../photo/201911621325_1853366_279873.jpg?t=140" class="fancybox">有</a>
                            </td>
                            <td align="center">2019/11/4</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 張茹茵<br>
                                <font color=green>排約：</font>林馨彤<br>
                                <font color=green>邀約：</font>新竹 - 劉恩妮
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=1853366" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">1421303</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1421303" target="_blank">洪煥評</a></td>
                            <td align="center">男</td>
                            <td align="center">0939309308</td>

                            <td align="center">主：27&nbsp;被：0&nbsp;共：27&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1116160&lu=F124351788&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(35)</a><br>最後一次排約：2021/3/21 下午 03:00:00&nbsp;(<font color="#990000">191 day</font>)</td>
                            <td align="center">
                                璀璨二年<br><span style="color:blue">&nbsp;&nbsp;餘 208 天</span></td>
                            <td align="center">1978/3/19</td>
                            <td align="center">碩士</td>

                            <td align="center">
                                <a href="../photo/2018227182546_1421303_448742.jpeg?t=7606" class="fancybox">有</a>
                            </td>
                            <td align="center">2018/2/23</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 張茹茵<br>
                                <font color=green>排約：</font>陳紅<br>
                                <font color=green>邀約：</font>高雄 - 謝宛萍
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=1421303" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">1824018</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1824018" target="_blank">董建華</a></td>
                            <td align="center">男</td>
                            <td align="center">0975068076</td>

                            <td align="center">主：37&nbsp;被：0&nbsp;共：37&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1583014&lu=F120787184&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(79)</a><br>最後一次排約：2021/3/21 下午 02:00:00&nbsp;(<font color="#990000">191 day</font>)</td>
                            <td align="center">
                                璀璨一年<br><span style="color:blue">&nbsp;&nbsp;餘 421 天</span></td>
                            <td align="center">1966/2/24</td>
                            <td align="center">碩士</td>

                            <td align="center">
                                無
                            </td>
                            <td align="center">2019/8/4</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 易珊<br>
                                <font color=green>排約：</font>林馨彤<br>
                                <font color=green>邀約：</font>高雄 - 沈海妮
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=1824018" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">1983846</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1983846" target="_blank">吳瑋琦</a></td>
                            <td align="center">女</td>
                            <td align="center">0932305730</td>

                            <td align="center">主：0&nbsp;被：9&nbsp;共：9&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1829687&lu=A224016058&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(42)</a><br>最後一次排約：2021/3/21 下午 01:30:00&nbsp;(<font color="#990000">191 day</font>)</td>
                            <td align="center">
                                璀璨二年<br><span style="color:blue">&nbsp;&nbsp;餘 471 天</span></td>
                            <td align="center">1975/9/30</td>
                            <td align="center">高中</td>

                            <td align="center">
                                無
                            </td>
                            <td align="center">2020/11/11</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 易珊<br>
                                <font color=green>排約：</font>陳紅<br>
                                <font color=green>邀約：</font>八德 - 柯素月 Joy
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=1983846" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2017517</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2017517" target="_blank">沈健雄</a></td>
                            <td align="center">男</td>
                            <td align="center">0955202843</td>

                            <td align="center">主：10&nbsp;被：0&nbsp;共：10&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1879178&lu=A124149238&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(46)</a><br>最後一次排約：2021/3/21 上午 11:30:00&nbsp;(<font color="#990000">191 day</font>)</td>
                            <td align="center">
                                璀璨一年<br><span style="color:blue">&nbsp;&nbsp;餘 193 天</span></td>
                            <td align="center">1965/8/22</td>
                            <td align="center">專科</td>

                            <td align="center">
                                無
                            </td>
                            <td align="center">2021/2/6</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 詹明錡<br>
                                <font color=green>排約：</font>李喬<br>
                                <font color=green>邀約：</font>桃園 - 趙可涵
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=2017517" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">1966244</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1966244" target="_blank">連日銘</a></td>
                            <td align="center">男</td>
                            <td align="center">0910370008</td>

                            <td align="center">主：9&nbsp;被：0&nbsp;共：9&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1802231&lu=F125865101&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(44)</a><br>最後一次排約：2021/3/20 下午 06:00:00&nbsp;(<font color="#990000">192 day</font>)</td>
                            <td align="center">
                                璀璨一年<br><span style="color:blue">&nbsp;&nbsp;餘 53 天</span></td>
                            <td align="center">1983/9/13</td>
                            <td align="center">大學</td>

                            <td align="center">
                                <a href="../photo/2020922151538_1966244_171368.jpg?t=8144" class="fancybox">有</a>
                            </td>
                            <td align="center">2020/9/20</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 易珊<br>
                                <font color=green>排約：</font>陳紅<br>
                                <font color=green>邀約：</font>台中 - 余致媛
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=1966244" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2015690</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2015690" target="_blank">王家文</a></td>
                            <td align="center">女</td>
                            <td align="center">0915918255</td>

                            <td align="center">主：0&nbsp;被：12&nbsp;共：12&nbsp;&nbsp;<a href="javascript:Mars_popup('ad_report.php?k_id=1876363&lu=A225081620&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(49)</a><br>最後一次排約：2021/3/20 下午 04:30:00&nbsp;(<font color="#990000">192 day</font>)</td>
                            <td align="center">
                                璀璨一年<br><span style="color:blue">&nbsp;&nbsp;餘 187 天</span></td>
                            <td align="center">1983/1/30</td>
                            <td align="center">大學</td>

                            <td align="center">
                                <a href="../photo/202192222017_2015690_197140.jpeg?t=7089" class="fancybox">有</a>
                            </td>
                            <td align="center">2021/1/30</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 詹明錡<br>
                                <font color=green>排約：</font>李喬<br>
                                <font color=green>邀約：</font>總管理處 - IVY
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_mem_detail.php?mem_num=2015690" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 266 筆、第 1 頁／共 14 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_mem_love.php?topage=1&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_mem_love.php?topage=2&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=class='text'>2</a></li>
                    <li><a href=/ad_mem_love.php?topage=3&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=class='text'>3</a></li>
                    <li><a href=/ad_mem_love.php?topage=4&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=class='text'>4</a></li>
                    <li><a href=/ad_mem_love.php?topage=5&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=class='text'>5</a></li>
                    <li><a href=/ad_mem_love.php?topage=6&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=class='text'>6</a></li>
                    <li><a href=/ad_mem_love.php?topage=7&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=class='text'>7</a></li>
                    <li><a href=/ad_mem_love.php?topage=8&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=class='text'>8</a></li>
                    <li><a href=/ad_mem_love.php?topage=9&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=class='text'>9</a></li>
                    <li><a href=/ad_mem_love.php?topage=10&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=class='text'>10</a></li>
                    <li><a href=/ad_mem_love.php?topage=2&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_mem_love.php?topage=14&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_mem_love.php?topage=1&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=" selected>1</option>
                            <option value="/ad_mem_love.php?topage=2&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=">2</option>
                            <option value="/ad_mem_love.php?topage=3&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=">3</option>
                            <option value="/ad_mem_love.php?topage=4&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=">4</option>
                            <option value="/ad_mem_love.php?topage=5&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=">5</option>
                            <option value="/ad_mem_love.php?topage=6&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=">6</option>
                            <option value="/ad_mem_love.php?topage=7&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=">7</option>
                            <option value="/ad_mem_love.php?topage=8&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=">8</option>
                            <option value="/ad_mem_love.php?topage=9&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=">9</option>
                            <option value="/ad_mem_love.php?topage=10&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=">10</option>
                            <option value="/ad_mem_love.php?topage=11&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=">11</option>
                            <option value="/ad_mem_love.php?topage=12&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=">12</option>
                            <option value="/ad_mem_love.php?topage=13&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=">13</option>
                            <option value="/ad_mem_love.php?topage=14&oby=1&timeend=1&keyword=&daysel=4&branch=%E5%8F%B0%E5%8C%97&vst=">14</option>
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