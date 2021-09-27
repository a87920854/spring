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
            <li>好好玩管理系統</li>
            <li class="active">企業委辦</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>企業委辦　未處理 - 數量：4</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <p>
                    <div class="btn-group">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">

                            <li><a href="?s99=1" target="_self"><i class="icon-resize-horizontal"></i> 切換已處理</a></li>

                        </ul>
                    </div>
                    </p>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th>委辦公司</th>
                            <th>聯絡人</th>
                            <th>性別</th>
                            <th>電話</th>
                            <th>E-mail</th>
                            <th>留言內容</th>
                            <th>處理情形</th>
                            <th width=120>處理人員</th>
                            <th></th>
                        </tr>

                        <tr>
                            <td class="center">Always Marketing</td>
                            <td class="center">Cathy </td>
                            <td class="center">女</td>
                            <td class="center">0952022267</td>
                            <td class="center">cathy.chueh@alwaysmkt.com</td>
                            <td class="center">你好，我是活動公司的企劃窗口Cathy，希望可以委託你們安排一個戀愛聯誼主題的兩天一夜行程，包含交通、食宿、景點的安排，再煩請聯絡我，電話會再說明需求細節，謝謝幫忙！</td>
                            <td>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2019/4/1 下午 02:44:00
                            </td>
                            <td class="center"> - 不明</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_fun_enterprise_service_send_branch.php?an=21','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_fun_enterprise_service.php?st=del&an=21','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_fun_enterprise_service_fix.php?an=21','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">Panasonic Taiwan</td>
                            <td class="center">Steven</td>
                            <td class="center">男</td>
                            <td class="center">0933882715</td>
                            <td class="center">wang.steven@tw.panasonic.com</td>
                            <td class="center">貴旅行社 您好:

                                敝部門近日要開始規畫年底的部門旅遊，請您提供一日遊(為主)與二日遊(為輔)的報價:
                                一日遊需求:
                                1. 平均1人費用1400左右
                                2. 參加人數約33~40人左右
                                3. 請安排當日午餐，不需安排晚餐
                                4. 4~10歲兒童約6~10人
                                5. 請安排適合小朋友的DIY活動
                                6. 中部以北的行程較合適
                                7. 隨車請安排導遊一名

                                二日遊需求:
                                1. 平均1人費用2400左右
                                2. 參加人數約33~40人左右
                                3. 請安排第一天午晚餐、第二天早午餐，不需第二天晚餐
                                4. 4~10歲兒童約6~10人
                                5. 請安排適合小朋友的DIY活動
                                6. 中南部行程皆可
                                7. 隨車請安排導遊一名
                            </td>
                            <td>
                                <font color="#FF0000" size="2">處理情形：已回信
                                </font><br>2018/9/13 上午 09:27:00
                            </td>
                            <td class="center"> - 不明</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_fun_enterprise_service_send_branch.php?an=20','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_fun_enterprise_service.php?st=del&an=20','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_fun_enterprise_service_fix.php?an=20','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">華新麗華股份有限公司台中分公司</td>
                            <td class="center">王鐿錞</td>
                            <td class="center">女</td>
                            <td class="center">04-26595552#6231</td>
                            <td class="center">Yichun_Wang@walsin.com</td>
                            <td class="center">您好：
                                我們公司預計於10月份辦理一場單身戶外聯誼一日遊(國內中部地區)，之前有跟別家廠商合作過，未來單身聯誼活動會是我們公司每年提供給單身員工之福利之一。這次我們希望可以多瞭解其他優質廠商的服務內容與價格，作為10月份活動參考，請貴司撥冗於上班時間(08:00-17:00)回覆電話，謝謝您^^</td>
                            <td>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2018/5/28 下午 01:20:00
                            </td>
                            <td class="center"> - 不明</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_fun_enterprise_service_send_branch.php?an=19','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_fun_enterprise_service.php?st=del&an=19','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_fun_enterprise_service_fix.php?an=19','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">醫師青年聯誼會</td>
                            <td class="center">胡信豪</td>
                            <td class="center">男</td>
                            <td class="center">0978706686</td>
                            <td class="center">udoctor5200@gmail.com</td>
                            <td class="center">您好，我是胡信豪醫師，想與您合作聯誼事宜。
                                我們目前有一個未婚聯誼團體，稱為醫師青年聯誼會，是醫師公會與藥師公會未婚醫師，藥師及親屬與公教職業等共同組成的未婚團體，將近200位未婚男女，想與貴公司合辦師級聯誼(西牙中醫師、律師、會計師、教師、藥師、護理師等或其他師級專業人士)，聯絡相關事宜由我統籌，若您有意願與我們合作，細節可以詳談，歡迎與我聯繫。
                                醫師青年聯誼會介紹：
                                http://erbpalsy.wixsite.com/lookforadate/
                                Line id:drhu
                            </td>
                            <td>
                                <font color="#FF0000" size="2">處理情形：
                                </font><br>2016/12/9 上午 12:58:00
                            </td>
                            <td class="center"> - 不明</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_fun_enterprise_service_send_branch.php?an=18','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_fun_enterprise_service.php?st=del&an=18','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_fun_enterprise_service_fix.php?an=18','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 4 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_fun_enterprise_service.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_fun_enterprise_service.php?topage=1 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_fun_enterprise_service.php?topage=1" selected>1</option>
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