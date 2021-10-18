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
            <li class="active">DateMeNow-億捷創意</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->


        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>DateMeNow-億捷創意 - 數量：300</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <p><a href="ad_infojetmedia_dmn.php" class="btn btn-info disabled">未處理</a>&nbsp;&nbsp;<a href="ad_infojetmedia_dmn.php?stat=1" class="btn btn-warning ">已處理</a>&nbsp;&nbsp;<a href="ad_infojetmedia_dmn.php?stat=2" class="btn btn-primary ">重複</a>
                    </p>
                    <p>
                    <form name="form1" method="post" action="?vst=full&stat=0" style="margin:0px;">
                        &nbsp;&nbsp;日期：
                        <input type="text" class="datepicker" autocomplete="off" style="width:100px;" name="times1" value="">
                        ～
                        <input type="text" class="datepicker" autocomplete="off" style="width:100px;" name="times2" value="">
                        <input type="submit" name="Submit" style="height:28px;margin-top:-7px;" value="查詢">
                    </form>
                    </p>
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <thead>
                            <tr>
                                <th>時間</th>
                                <th>姓名</th>
                                <th>性別</th>
                                <th>生日</th>
                                <th>學歷</th>
                                <th>手機</th>
                                <th>Email</th>
                                <th>地區</th>
                                <th>註冊來源</th>
                                <th>註冊時間</th>
                                <th></th>
                            </tr>

                            <tr>
                                <td align="center">2016/7/26 上午 12:43:25</td>
                                <td align="center">李芳庭(<a href="ad_no_mem_s.php?mem_mobile=0952270286" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1991-11-14</td>
                                <td align="center">大學</td>
                                <td align="center">0952270286</td>
                                <td align="center">tryagain2286289@yahoo.com.tw</td>
                                <td align="center">新北市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-25 11:50:30</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1708"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1708','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/26 上午 12:43:25</td>
                                <td align="center">陳廷亦(<a href="ad_no_mem_s.php?mem_mobile=0918322170" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1981-11-21</td>
                                <td align="center">大學</td>
                                <td align="center">0918322170</td>
                                <td align="center">tingyi1121@yahoo.com.tw</td>
                                <td align="center">台北市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-25 11:49:56</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1709"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1709','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/26 上午 12:42:13</td>
                                <td align="center">曾郁玲(<a href="ad_no_mem_s.php?mem_mobile=0966093999" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1981-01-21</td>
                                <td align="center">大學</td>
                                <td align="center">0966093999</td>
                                <td align="center">joyce0121@gmail.com</td>
                                <td align="center">台北市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-25 14:36:05</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=trans&auton=1706"><i class="icon-share"></i> 轉入未入會資料</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1706','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/26 上午 12:42:13</td>
                                <td align="center">陳致愷(<a href="ad_no_mem_s.php?mem_mobile=0982112471" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1990-11-25</td>
                                <td align="center">大學</td>
                                <td align="center">0982112471</td>
                                <td align="center">ppolp0301@gmail.com</td>
                                <td align="center">新北市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-25 13:45:20</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=trans&auton=1707"><i class="icon-share"></i> 轉入未入會資料</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1707','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/26 上午 12:39:55</td>
                                <td align="center">廖憶蓁(<a href="ad_no_mem_s.php?mem_mobile=0903559345" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1979-12-25</td>
                                <td align="center">大學</td>
                                <td align="center">0903559345</td>
                                <td align="center">joyceliao1225@yahoo.com.tw</td>
                                <td align="center">新北市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-25 20:08:01</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1701"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1701','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/26 上午 12:39:55</td>
                                <td align="center">林沛緹(<a href="ad_no_mem_s.php?mem_mobile=0975723816" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1986-03-24</td>
                                <td align="center">大學</td>
                                <td align="center">0975723816</td>
                                <td align="center">abawpenny@gmail.com</td>
                                <td align="center">桃園市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-25 20:22:24</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=trans&auton=1702"><i class="icon-share"></i> 轉入未入會資料</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1702','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/26 上午 12:39:55</td>
                                <td align="center">李承寰(<a href="ad_no_mem_s.php?mem_mobile=0926051755" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1992-06-09</td>
                                <td align="center">大學</td>
                                <td align="center">0926051755</td>
                                <td align="center">a1237002003@yahoo.com.tw</td>
                                <td align="center">新北市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-25 19:29:53</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=trans&auton=1703"><i class="icon-share"></i> 轉入未入會資料</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1703','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/26 上午 12:39:55</td>
                                <td align="center">黃昕慧(<a href="ad_no_mem_s.php?mem_mobile=0913012887" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1992-05-08</td>
                                <td align="center">大學</td>
                                <td align="center">0913012887</td>
                                <td align="center">yoyo508123@yahoo.com.tw</td>
                                <td align="center">桃園市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-25 19:21:56</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=trans&auton=1704"><i class="icon-share"></i> 轉入未入會資料</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1704','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/26 上午 12:39:55</td>
                                <td align="center">呂竹軒(<a href="ad_no_mem_s.php?mem_mobile=0926567056" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1986-11-15</td>
                                <td align="center">大學</td>
                                <td align="center">0926567056</td>
                                <td align="center">cntwbot@gmail.com</td>
                                <td align="center">新北市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-25 20:20:09</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=trans&auton=1705"><i class="icon-share"></i> 轉入未入會資料</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1705','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/26 上午 12:38:42</td>
                                <td align="center">呂鎮良(<a href="ad_no_mem_s.php?mem_mobile=0925256176" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1991-12-16</td>
                                <td align="center">大學</td>
                                <td align="center">0925256176</td>
                                <td align="center">liang_1216@yahoo.com.tw</td>
                                <td align="center">桃園市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-25 20:27:43</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1697"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1697','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/26 上午 12:38:42</td>
                                <td align="center">石瑞渝(<a href="ad_no_mem_s.php?mem_mobile=0979151099" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1987-01-05</td>
                                <td align="center">大學</td>
                                <td align="center">0979151099</td>
                                <td align="center">a912873465@gmail.com</td>
                                <td align="center">台北市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-25 21:28:44</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=trans&auton=1698"><i class="icon-share"></i> 轉入未入會資料</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1698','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/26 上午 12:38:42</td>
                                <td align="center">紀至軒(<a href="ad_no_mem_s.php?mem_mobile=0930820199" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1992-09-26</td>
                                <td align="center">大學</td>
                                <td align="center">0930820199</td>
                                <td align="center">riventw78213@gmail.com</td>
                                <td align="center">桃園市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-25 21:54:45</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=trans&auton=1699"><i class="icon-share"></i> 轉入未入會資料</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1699','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/26 上午 12:38:42</td>
                                <td align="center">吳珮瑄(<a href="ad_no_mem_s.php?mem_mobile=0955697266" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1992-01-03</td>
                                <td align="center">大學</td>
                                <td align="center">0955697266</td>
                                <td align="center">aa28520@gmail.com</td>
                                <td align="center">新北市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-25 22:25:35</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1700"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1700','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td align="center">2016/7/24 上午 01:24:09</td>
                                <td align="center">陳怡靜(<a href="ad_no_mem_s.php?mem_mobile=0956928610" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1992-04-20</td>
                                <td align="center">大學</td>
                                <td align="center">0956928610</td>
                                <td align="center">mary2003729@yahoo.com.tw</td>
                                <td align="center">新北市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-23 21:59:20</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1671"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1671','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/24 上午 01:22:53</td>
                                <td align="center">周辰陽(<a href="ad_no_mem_s.php?mem_mobile=0930807201" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1992-06-14</td>
                                <td align="center">大學</td>
                                <td align="center">0930807201</td>
                                <td align="center">sweet_810614@yahoo.com.tw</td>
                                <td align="center">台北市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-24 00:26:32</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=trans&auton=1669"><i class="icon-share"></i> 轉入未入會資料</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1669','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/24 上午 01:09:55</td>
                                <td align="center">黃誌韋(<a href="ad_no_mem_s.php?mem_mobile=0980817340" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1990-09-22</td>
                                <td align="center">大學</td>
                                <td align="center">0980817340</td>
                                <td align="center">a32343234@yahoo.com.tw</td>
                                <td align="center">新北市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-24 00:39:57</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1668"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1668','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/24 上午 12:45:44</td>
                                <td align="center">張雪芳(<a href="ad_no_mem_s.php?mem_mobile=0911211802" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1987-08-05</td>
                                <td align="center">大學</td>
                                <td align="center">0911211802</td>
                                <td align="center">sa760805@gmail.com</td>
                                <td align="center">台北市</td>
                                <td align="center">www.tw-hongbao.com</td>
                                <td align="center">2016-07-23 23:18:27</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=trans&auton=1667"><i class="icon-share"></i> 轉入未入會資料</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1667','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/24 上午 12:44:26</td>
                                <td align="center">鄭立昇(<a href="ad_no_mem_s.php?mem_mobile=0917690701" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1993-04-26</td>
                                <td align="center">大學</td>
                                <td align="center">0917690701</td>
                                <td align="center">smile690701@yahoo.com.tw</td>
                                <td align="center">新北市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-23 22:39:07</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=trans&auton=1665"><i class="icon-share"></i> 轉入未入會資料</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1665','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/24 上午 12:44:26</td>
                                <td align="center">陳星瑋(<a href="ad_no_mem_s.php?mem_mobile=0972150239" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1989-04-14</td>
                                <td align="center">大學</td>
                                <td align="center">0972150239</td>
                                <td align="center">h78414@gmail.com</td>
                                <td align="center">桃園市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-23 23:19:17</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1666"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1666','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/23 上午 12:42:02</td>
                                <td align="center">王吉宏(<a href="ad_no_mem_s.php?mem_mobile=0976072589" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1979-07-25</td>
                                <td align="center">大學</td>
                                <td align="center">0976072589</td>
                                <td align="center">jerrywang0725@hotmail.com.tw</td>
                                <td align="center">新北市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-22 14:42:41</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=trans&auton=1664"><i class="icon-share"></i> 轉入未入會資料</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1664','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/23 上午 12:40:48</td>
                                <td align="center">黃彥達(<a href="ad_no_mem_s.php?mem_mobile=0911011102" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1987-08-09</td>
                                <td align="center">專科</td>
                                <td align="center">0911011102</td>
                                <td align="center">da19870809@gmail.com</td>
                                <td align="center">新北市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-22 19:46:21</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=trans&auton=1658"><i class="icon-share"></i> 轉入未入會資料</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1658','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/23 上午 12:40:48</td>
                                <td align="center">魏立涵(<a href="ad_no_mem_s.php?mem_mobile=0911843686" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1993-01-30</td>
                                <td align="center">大學</td>
                                <td align="center">0911843686</td>
                                <td align="center">andywei0130@gmail.com</td>
                                <td align="center">新北市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-22 17:50:47</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=trans&auton=1659"><i class="icon-share"></i> 轉入未入會資料</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1659','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/23 上午 12:40:48</td>
                                <td align="center">黃星凱(<a href="ad_no_mem_s.php?mem_mobile=0916117616" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1981-06-06</td>
                                <td align="center">專科</td>
                                <td align="center">0916117616</td>
                                <td align="center">duersbh66@yahoo.com.com</td>
                                <td align="center">新北市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-22 20:11:41</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=trans&auton=1660"><i class="icon-share"></i> 轉入未入會資料</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1660','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/7/23 上午 12:40:48</td>
                                <td align="center">楊正瑜(<a href="ad_no_mem_s.php?mem_mobile=0980305511" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1981-04-09</td>
                                <td align="center">碩士</td>
                                <td align="center">0980305511</td>
                                <td align="center">qing41000@gmail.com</td>
                                <td align="center">台北市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-07-22 19:23:31</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=trans&auton=1661"><i class="icon-share"></i> 轉入未入會資料</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia_dmn.php?st=del&auton=1661','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            </tbody>
                    </table>
                </div>
                <div class="text-center">共 300 筆、第 1 頁／共 6 頁&nbsp;&nbsp;
                    <ul class='pagination pagination-md'>
                        <li><a href=/ad_infojetmedia_dmn.php?topage=1&Submit=%E6%9F%A5%E8%A9%A2&times2=&times1=&stat=0&vst=full>第一頁</a></li>
                        <li class='active'><a href="#">1</a></li>
                        <li><a href=/ad_infojetmedia_dmn.php?topage=2&Submit=%E6%9F%A5%E8%A9%A2&times2=&times1=&stat=0&vst=full class='text'>2</a></li>
                        <li><a href=/ad_infojetmedia_dmn.php?topage=3&Submit=%E6%9F%A5%E8%A9%A2&times2=&times1=&stat=0&vst=full class='text'>3</a></li>
                        <li><a href=/ad_infojetmedia_dmn.php?topage=4&Submit=%E6%9F%A5%E8%A9%A2&times2=&times1=&stat=0&vst=full class='text'>4</a></li>
                        <li><a href=/ad_infojetmedia_dmn.php?topage=5&Submit=%E6%9F%A5%E8%A9%A2&times2=&times1=&stat=0&vst=full class='text'>5</a></li>
                        <li><a href=/ad_infojetmedia_dmn.php?topage=6&Submit=%E6%9F%A5%E8%A9%A2&times2=&times1=&stat=0&vst=full class='text'>6</a></li>
                        <li><a href=/ad_infojetmedia_dmn.php?topage=2&Submit=%E6%9F%A5%E8%A9%A2&times2=&times1=&stat=0&vst=full class='text' title='Next'>下一頁</a></li>
                        <li><a href=/ad_infojetmedia_dmn.php?topage=6&Submit=%E6%9F%A5%E8%A9%A2&times2=&times1=&stat=0&vst=full class='text'>最後一頁</a></li>
                        <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                <option value="/ad_infojetmedia_dmn.php?topage=1&Submit=%E6%9F%A5%E8%A9%A2&times2=&times1=&stat=0&vst=full" selected>1</option>
                                <option value="/ad_infojetmedia_dmn.php?topage=2&Submit=%E6%9F%A5%E8%A9%A2&times2=&times1=&stat=0&vst=full">2</option>
                                <option value="/ad_infojetmedia_dmn.php?topage=3&Submit=%E6%9F%A5%E8%A9%A2&times2=&times1=&stat=0&vst=full">3</option>
                                <option value="/ad_infojetmedia_dmn.php?topage=4&Submit=%E6%9F%A5%E8%A9%A2&times2=&times1=&stat=0&vst=full">4</option>
                                <option value="/ad_infojetmedia_dmn.php?topage=5&Submit=%E6%9F%A5%E8%A9%A2&times2=&times1=&stat=0&vst=full">5</option>
                                <option value="/ad_infojetmedia_dmn.php?topage=6&Submit=%E6%9F%A5%E8%A9%A2&times2=&times1=&stat=0&vst=full">6</option>
                            </select></li>
                    </ul>
                </div>

            </div>
            <!--/span-->

        </div>
        <!--/row-->

</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php")
?>