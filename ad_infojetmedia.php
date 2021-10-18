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
            <li class="active">春天-億捷創意</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>春天-億捷創意 - 數量：1401</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <p><a href="ad_infojetmedia.php" class="btn btn-info disabled">未處理</a>&nbsp;&nbsp;<a href="ad_infojetmedia.php?stat=1" class="btn btn-warning ">已處理</a>&nbsp;&nbsp;<a href="ad_infojetmedia.php?stat=2" class="btn btn-primary ">重複</a>
                    </p>
                    <p>
                    <form name="form1" method="post" action="?vst=full&stat=0" style="margin:0px;">
                        &nbsp;&nbsp;日期：
                        <input type="text" class="datepicker" autocomplete="off" style="width:100px;" name="times1" value="2014/7/1">
                        ～
                        <input type="text" class="datepicker" autocomplete="off" style="width:100px;" name="times2" value="2021/10/15">
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
                                <td align="center">2016/6/21 上午 08:17:10</td>
                                <td align="center">廖紫君(<a href="ad_no_mem_s.php?mem_mobile=0911276170" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1984-12-29</td>
                                <td align="center">大學</td>
                                <td align="center">0911276170</td>
                                <td align="center">chun731229@hotmail.com</td>
                                <td align="center">花蓮縣</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-21 07:26:26</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1407"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1407','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 07:43:27</td>
                                <td align="center">品方(<a href="ad_no_mem_s.php?mem_mobile=0955502587" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1980-01-03</td>
                                <td align="center">大學</td>
                                <td align="center">0955502587</td>
                                <td align="center">vickywang@ms51.url.com.tw</td>
                                <td align="center">新北市</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-21 07:13:50</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1402"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1402','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 07:43:27</td>
                                <td align="center">徐雍淳(<a href="ad_no_mem_s.php?mem_mobile=0926861011" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1990-09-09</td>
                                <td align="center">碩士</td>
                                <td align="center">0926861011</td>
                                <td align="center">zoenana770@gmail.com</td>
                                <td align="center">新北市</td>
                                <td align="center">www.tw-hongbao.com</td>
                                <td align="center">2016-06-21 06:31:46</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1405"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1405','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 07:43:27</td>
                                <td align="center">孫宥蓁(<a href="ad_no_mem_s.php?mem_mobile=0985315683" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1991-11-26</td>
                                <td align="center">大學</td>
                                <td align="center">0985315683</td>
                                <td align="center">love_friend1126@yahoo.com.tw</td>
                                <td align="center">台南市</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-06-21 06:42:59</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1403"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1403','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 07:43:27</td>
                                <td align="center">王柏仁(<a href="ad_no_mem_s.php?mem_mobile=0977297901" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1991-02-22</td>
                                <td align="center">大學</td>
                                <td align="center">0977297901</td>
                                <td align="center">456985plk@gmail.com</td>
                                <td align="center">新北市</td>
                                <td align="center">www.tw-hongbao.com</td>
                                <td align="center">2016-06-21 06:58:37</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1406"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1406','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 07:43:27</td>
                                <td align="center">林信良(<a href="ad_no_mem_s.php?mem_mobile=0909590754" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1988-12-21</td>
                                <td align="center">專科</td>
                                <td align="center">0909590754</td>
                                <td align="center">a26689090@gmail.com</td>
                                <td align="center">新北市</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-21 06:24:51</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1404"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1404','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 06:44:11</td>
                                <td align="center">方曉薇(<a href="ad_no_mem_s.php?mem_mobile=0938326189" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1990-08-13</td>
                                <td align="center">大學</td>
                                <td align="center">0938326189</td>
                                <td align="center">vibeefang@hotmail.com</td>
                                <td align="center">台北市</td>
                                <td align="center">www.tw-hongbao.com</td>
                                <td align="center">2016-06-21 05:29:11</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1401"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1401','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 04:28:28</td>
                                <td align="center">陳建穎(<a href="ad_no_mem_s.php?mem_mobile=0973122791" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1990-01-23</td>
                                <td align="center">大學</td>
                                <td align="center">0973122791</td>
                                <td align="center">dgain0123@gmail.com</td>
                                <td align="center">台中市</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-21 03:28:23</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1400"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1400','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 03:44:22</td>
                                <td align="center">鄭學鴻(<a href="ad_no_mem_s.php?mem_mobile=0927398675" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1991-03-01</td>
                                <td align="center">大學</td>
                                <td align="center">0927398675</td>
                                <td align="center">b29562449@yahoo.com.tw</td>
                                <td align="center">新北市</td>
                                <td align="center">www.tw-hongbao.com</td>
                                <td align="center">2016-06-21 02:27:41</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1399"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1399','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 03:43:12</td>
                                <td align="center">吳連晟(<a href="ad_no_mem_s.php?mem_mobile=0937545216" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1988-07-27</td>
                                <td align="center">大學</td>
                                <td align="center">0937545216</td>
                                <td align="center">sony19880727@yahoo.com.tw</td>
                                <td align="center">嘉義縣</td>
                                <td align="center">www.tw-prizes.com</td>
                                <td align="center">2016-06-21 02:17:22</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1398"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1398','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 02:44:01</td>
                                <td align="center">黃成章(<a href="ad_no_mem_s.php?mem_mobile=0920037816" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1987-05-27</td>
                                <td align="center">大學</td>
                                <td align="center">0920037816</td>
                                <td align="center">bahamutezero2000@hotmail.com</td>
                                <td align="center">桃園市</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-21 01:47:14</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1395"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1395','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 02:44:01</td>
                                <td align="center">連皓淳(<a href="ad_no_mem_s.php?mem_mobile=0977453918" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1990-09-18</td>
                                <td align="center">大學</td>
                                <td align="center">0977453918</td>
                                <td align="center">pdsowloz@gmail.com</td>
                                <td align="center">新北市</td>
                                <td align="center">www.tw-hongbao.com</td>
                                <td align="center">2016-06-21 01:43:14</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1397"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1397','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 02:44:01</td>
                                <td align="center">楊錫恩(<a href="ad_no_mem_s.php?mem_mobile=0903299960" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1983-03-20</td>
                                <td align="center">大學</td>
                                <td align="center">0903299960</td>
                                <td align="center">sugizo320@hotmail.com</td>
                                <td align="center">高雄市</td>
                                <td align="center">www.tw-hongbao.com</td>
                                <td align="center">2016-06-21 01:25:41</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1396"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1396','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 02:10:40</td>
                                <td align="center">林奕諠(<a href="ad_no_mem_s.php?mem_mobile=0912377476" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1984-02-13</td>
                                <td align="center">大學</td>
                                <td align="center">0912377476</td>
                                <td align="center">avon0213@yahoo.com</td>
                                <td align="center">台中市</td>
                                <td align="center">www.tw-hongbao.com</td>
                                <td align="center">2016-06-21 01:40:16</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1394"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1394','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 01:55:27</td>
                                <td align="center">徐啟棠(<a href="ad_no_mem_s.php?mem_mobile=0910788569" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1988-12-15</td>
                                <td align="center">大學</td>
                                <td align="center">0910788569</td>
                                <td align="center">c971257c@gmail.com</td>
                                <td align="center">苗栗縣</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-19 01:38:23</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1391"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1391','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 01:55:27</td>
                                <td align="center">蘇民傑(<a href="ad_no_mem_s.php?mem_mobile=0921162356" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1983-01-17</td>
                                <td align="center">碩士</td>
                                <td align="center">0921162356</td>
                                <td align="center">js40456@gmail.com</td>
                                <td align="center">新北市</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-19 12:16:20</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1390"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1390','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 01:55:27</td>
                                <td align="center">郭玟伶(<a href="ad_no_mem_s.php?mem_mobile=0918834000" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1983-11-18</td>
                                <td align="center">大學</td>
                                <td align="center">0918834000</td>
                                <td align="center">debora0420@gmail.com</td>
                                <td align="center">台北市</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-19 01:22:59</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1393"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1393','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 01:55:27</td>
                                <td align="center">黃源凱(<a href="ad_no_mem_s.php?mem_mobile=0972602939" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1991-11-17</td>
                                <td align="center">大學</td>
                                <td align="center">0972602939</td>
                                <td align="center">hon56hklaa@gmail.com</td>
                                <td align="center">南投縣</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-19 10:42:48</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1392"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1392','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 01:54:17</td>
                                <td align="center">楊淑儀(<a href="ad_no_mem_s.php?mem_mobile=0903161590" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1991-10-21</td>
                                <td align="center">大學</td>
                                <td align="center">0903161590</td>
                                <td align="center">mi_lian_crush@yahoo.com.tw</td>
                                <td align="center">彰化縣</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-19 08:46:03</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1384"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1384','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 01:54:17</td>
                                <td align="center">高詩惠(<a href="ad_no_mem_s.php?mem_mobile=0975602099" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1990-03-24</td>
                                <td align="center">碩士</td>
                                <td align="center">0975602099</td>
                                <td align="center">bluesnowing@hotmail.com</td>
                                <td align="center">新竹市</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-19 13:46:23</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1385"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1385','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 01:54:17</td>
                                <td align="center">陳義超(<a href="ad_no_mem_s.php?mem_mobile=0985750705" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1989-01-19</td>
                                <td align="center">大學</td>
                                <td align="center">0985750705</td>
                                <td align="center">qaz6502@gmail.com</td>
                                <td align="center">新北市</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-19 08:50:38</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1388"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1388','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 01:54:17</td>
                                <td align="center">林淑澐(<a href="ad_no_mem_s.php?mem_mobile=0983976310" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1988-09-03</td>
                                <td align="center">大學</td>
                                <td align="center">0983976310</td>
                                <td align="center">kikia770903@yahoo.com.tw</td>
                                <td align="center">高雄市</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-19 07:49:05</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1389"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1389','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 01:54:17</td>
                                <td align="center">李錦程(<a href="ad_no_mem_s.php?mem_mobile=0926241376" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1982-12-05</td>
                                <td align="center">大學</td>
                                <td align="center">0926241376</td>
                                <td align="center">man49002055@msn.com</td>
                                <td align="center">台南市</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-19 14:00:52</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=trans&auton=1387"><i class="icon-share"></i> 轉入未入會資料</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1387','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 01:54:17</td>
                                <td align="center">羅玫(<a href="ad_no_mem_s.php?mem_mobile=0930792312" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1982-12-05</td>
                                <td align="center">大學</td>
                                <td align="center">0930792312</td>
                                <td align="center">cldesign07131205@gmail.com</td>
                                <td align="center">新北市</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-19 14:13:30</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1383"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1383','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 01:54:17</td>
                                <td align="center">林稟倉(<a href="ad_no_mem_s.php?mem_mobile=0975671373" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1991-07-18</td>
                                <td align="center">碩士</td>
                                <td align="center">0975671373</td>
                                <td align="center">michael80718@gmail.com</td>
                                <td align="center">高雄市</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-19 14:49:36</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1386"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1386','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 01:43:59</td>
                                <td align="center">王薏瑄(<a href="ad_no_mem_s.php?mem_mobile=0919117679" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1986-02-15</td>
                                <td align="center">大學</td>
                                <td align="center">0919117679</td>
                                <td align="center">popo900531@yahoo.com.tw</td>
                                <td align="center">台南市</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-21 01:11:07</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1381"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1381','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td align="center">2016/6/21 上午 01:43:59</td>
                                <td align="center">林立傑(<a href="ad_no_mem_s.php?mem_mobile=0963238468" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1990-07-15</td>
                                <td align="center">大學</td>
                                <td align="center">0963238468</td>
                                <td align="center">kissgg0314@gmail.com</td>
                                <td align="center">彰化縣</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-21 01:07:57</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1382"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1382','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 01:37:10</td>
                                <td align="center">林韋丞(<a href="ad_no_mem_s.php?mem_mobile=0921267500" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1987-11-25</td>
                                <td align="center">碩士</td>
                                <td align="center">0921267500</td>
                                <td align="center">joy91911@gmail.com</td>
                                <td align="center">台中市</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-19 07:07:54</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1375"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1375','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 01:37:10</td>
                                <td align="center">莊士漢(<a href="ad_no_mem_s.php?mem_mobile=0979040432" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1992-06-18</td>
                                <td align="center">大學</td>
                                <td align="center">0979040432</td>
                                <td align="center">war3custom@gmail.com</td>
                                <td align="center">雲林縣</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-19 01:19:48</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1374"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1374','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 01:37:10</td>
                                <td align="center">劉昱攢(<a href="ad_no_mem_s.php?mem_mobile=0905735066" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1982-07-02</td>
                                <td align="center">碩士</td>
                                <td align="center">0905735066</td>
                                <td align="center">b89603207@ntu.edu.tw</td>
                                <td align="center">台北市</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-19 06:45:12</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1376"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1376','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 01:37:10</td>
                                <td align="center">林宜漩(<a href="ad_no_mem_s.php?mem_mobile=0937164639" target="_blank">查</a>)</td>
                                <td align="center">女</td>
                                <td align="center">1988-10-03</td>
                                <td align="center">大學</td>
                                <td align="center">0937164639</td>
                                <td align="center">virahlin1003@gmail.com</td>
                                <td align="center">新北市</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-19 00:57:54</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1377"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1377','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>


                            <tr>
                                <td align="center">2016/6/21 上午 01:37:10</td>
                                <td align="center">盧奕龍(<a href="ad_no_mem_s.php?mem_mobile=0953672835" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1988-05-06</td>
                                <td align="center">大學</td>
                                <td align="center">0953672835</td>
                                <td align="center">sky2586889@gmail.com</td>
                                <td align="center">台南市</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-19 07:09:40</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1380"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1380','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td align="center">2016/6/21 上午 01:35:57</td>
                                <td align="center">陳洲正(<a href="ad_no_mem_s.php?mem_mobile=0912800758" target="_blank">查</a>)</td>
                                <td align="center">男</td>
                                <td align="center">1990-05-25</td>
                                <td align="center">大學</td>
                                <td align="center">0912800758</td>
                                <td align="center">chu79525@gmail.com</td>
                                <td align="center">台中市</td>
                                <td align="center">www.yourtest-taiwan.com</td>
                                <td align="center">2016-06-19 10:57:41</td>
                                <td align="center">

                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="?st=double&auton=1367"><i class="icon-share"></i> 此電話重複</a></li>

                                            <li><a href="javascript:Mars_popup2('ad_infojetmedia.php?st=del&auton=1367','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="text-center">共 1401 筆、第 1 頁／共 29 頁&nbsp;&nbsp;
                    <ul class='pagination pagination-md'>
                        <li><a href=/ad_infojetmedia.php?topage=1&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full>第一頁</a></li>
                        <li class='active'><a href="#">1</a></li>
                        <li><a href=/ad_infojetmedia.php?topage=2&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full class='text'>2</a></li>
                        <li><a href=/ad_infojetmedia.php?topage=3&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full class='text'>3</a></li>
                        <li><a href=/ad_infojetmedia.php?topage=4&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full class='text'>4</a></li>
                        <li><a href=/ad_infojetmedia.php?topage=5&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full class='text'>5</a></li>
                        <li><a href=/ad_infojetmedia.php?topage=6&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full class='text'>6</a></li>
                        <li><a href=/ad_infojetmedia.php?topage=7&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full class='text'>7</a></li>
                        <li><a href=/ad_infojetmedia.php?topage=8&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full class='text'>8</a></li>
                        <li><a href=/ad_infojetmedia.php?topage=9&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full class='text'>9</a></li>
                        <li><a href=/ad_infojetmedia.php?topage=10&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full class='text'>10</a></li>
                        <li><a href=/ad_infojetmedia.php?topage=2&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full class='text' title='Next'>下一頁</a></li>
                        <li><a href=/ad_infojetmedia.php?topage=29&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full class='text'>最後一頁</a></li>
                        <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                <option value="/ad_infojetmedia.php?topage=1&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full" selected>1</option>
                                <option value="/ad_infojetmedia.php?topage=2&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">2</option>
                                <option value="/ad_infojetmedia.php?topage=3&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">3</option>
                                <option value="/ad_infojetmedia.php?topage=4&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">4</option>
                                <option value="/ad_infojetmedia.php?topage=5&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">5</option>
                                <option value="/ad_infojetmedia.php?topage=6&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">6</option>
                                <option value="/ad_infojetmedia.php?topage=7&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">7</option>
                                <option value="/ad_infojetmedia.php?topage=8&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">8</option>
                                <option value="/ad_infojetmedia.php?topage=9&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">9</option>
                                <option value="/ad_infojetmedia.php?topage=10&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">10</option>
                                <option value="/ad_infojetmedia.php?topage=11&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">11</option>
                                <option value="/ad_infojetmedia.php?topage=12&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">12</option>
                                <option value="/ad_infojetmedia.php?topage=13&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">13</option>
                                <option value="/ad_infojetmedia.php?topage=14&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">14</option>
                                <option value="/ad_infojetmedia.php?topage=15&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">15</option>
                                <option value="/ad_infojetmedia.php?topage=16&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">16</option>
                                <option value="/ad_infojetmedia.php?topage=17&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">17</option>
                                <option value="/ad_infojetmedia.php?topage=18&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">18</option>
                                <option value="/ad_infojetmedia.php?topage=19&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">19</option>
                                <option value="/ad_infojetmedia.php?topage=20&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">20</option>
                                <option value="/ad_infojetmedia.php?topage=21&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">21</option>
                                <option value="/ad_infojetmedia.php?topage=22&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">22</option>
                                <option value="/ad_infojetmedia.php?topage=23&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">23</option>
                                <option value="/ad_infojetmedia.php?topage=24&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">24</option>
                                <option value="/ad_infojetmedia.php?topage=25&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">25</option>
                                <option value="/ad_infojetmedia.php?topage=26&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">26</option>
                                <option value="/ad_infojetmedia.php?topage=27&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">27</option>
                                <option value="/ad_infojetmedia.php?topage=28&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">28</option>
                                <option value="/ad_infojetmedia.php?topage=29&Submit=%E6%9F%A5%E8%A9%A2&times2=2021%2F10%2F15&times1=2014%2F7%2F1&stat=0&vst=full">29</option>
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