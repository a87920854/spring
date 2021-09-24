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
            <li>好好玩管理系統</li>
            <li class="active"><a href="ad_fun_action_list2.php">好好玩國外團控-FUN旅遊&LOVE旅遊</a></li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>國外旅遊列表 - FUN旅遊&LOVE旅遊 - 數量：104　<a href="?vst=full&s99=">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">


                    <a href="ad_fun_action_fast.php" class="btn btn-warning"><i class="icon-volume-up"></i> 出團情報</a>

                    <a href="ad_fun_action_list2_add.php" class="btn btn-info"><i class="icon-plus-sign"></i> 新增國外旅遊</a>

                    <form id="searchform" action="ad_fun_action_list2.php?vst=full" method="post" target="_self" class="form-inline" onsubmit="return check_send_submit()">
                        <table class="table table-striped table-bordered bootstrap-datatable">
                            <tr>
                                <td>類型：<select name="t">
                                        <option value="">所有類型</option>
                                        <option value="LOVE旅遊">LOVE旅遊</option>
                                        <option value="FUN旅遊">FUN旅遊</option>
                                    </select></td>
                                <td>活動時間：<input name="s21" id="s21" type="text" class="datepicker" autocomplete="off">～<input name="s22" id="s22" type="text" class="datepicker" autocomplete="off"></td>
                                <td>活動標題：<input name="s3" type="text" class="form-control"></td>
                                <td><input type="submit" value="搜尋" class="btn btn-default"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th></th>
                            <th width=70>類型</th>
                            <th width=70>活動類型</th>
                            <th width=70>旅遊國家</th>
                            <th>活動標題</th>
                            <th width=500></th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2020320164245_action_162.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2020320164245_action_162.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">FUN旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">韓國釜山</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1983">釜山滑出萌萌的愛5日</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1983">http://www.funtour.com.tw/otravel.php?id=1983</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1983" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1983"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1983"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1983"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1983','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2020326154434_action_168.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2020326154434_action_168.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">FUN旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">日本</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1982">小日本愛玩大軌跡5日</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1982">http://www.funtour.com.tw/otravel.php?id=1982</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1982" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1982"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1982"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1982"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1982','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/202032016431_action_529.jpg" class="fancybox"><img src="webfile/funtour/upload_image/202032016431_action_529.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">FUN旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">韓國首爾</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1981">愛韓風情人視角之旅5日</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1981">http://www.funtour.com.tw/otravel.php?id=1981</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1981" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1981"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1981"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1981"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1981','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2020318152052_action_351.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2020318152052_action_351.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">小島渡假</td>
                            <td class="center">菲律賓</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1980">巴拉望愛純淨物語5日</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1980">http://www.funtour.com.tw/otravel.php?id=1980</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1980" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1980"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1980"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1980"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1980','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2019119152550_action_794.JPG" class="fancybox"><img src="webfile/funtour/upload_image/2019119152550_action_794.JPG" border=0 width=90 height=60></a></td>
                            <td class="center">FUN旅遊</td>
                            <td class="center">小島渡假</td>
                            <td class="center">馬來西亞+新加坡</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1979">馬新派對紅花奇緣5日</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1979">http://www.funtour.com.tw/otravel.php?id=1979</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1979" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1979"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1979"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1979"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1979','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2019112163730_action_17.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2019112163730_action_17.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">FUN旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">泰國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1978">泰愛潑水在暹羅6+1日</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1978">http://www.funtour.com.tw/otravel.php?id=1978</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1978" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1978"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1978"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1978"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1978','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/201961515727_action_21.jpeg" class="fancybox"><img src="webfile/funtour/upload_image/201961515727_action_21.jpeg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">韓國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1977">小資女孩~哈韓好好玩</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1977">http://www.funtour.com.tw/otravel.php?id=1977</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1977" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1977"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1977"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1977"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1977','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/201963185635_action_972.jpg" class="fancybox"><img src="webfile/funtour/upload_image/201963185635_action_972.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">高檔精緻</td>
                            <td class="center">泰國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1976">94玩翻天，不去泰可惜</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1976">http://www.funtour.com.tw/otravel.php?id=1976</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1976" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1976"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1976"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1976"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1976','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/201961191143_action_355.jpg" class="fancybox"><img src="webfile/funtour/upload_image/201961191143_action_355.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">FUN旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">澳洲</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1975">小資女孩~愛的抱抱</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1975">http://www.funtour.com.tw/otravel.php?id=1975</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1975" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1975"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1975"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1975"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1975','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2019523143129_action_209.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2019523143129_action_209.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">越南</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1974">驚芽無限~東方馬爾地夫</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1974">http://www.funtour.com.tw/otravel.php?id=1974</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1974" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1974"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1974"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1974"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1974','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/201951411497_action_530.jpg" class="fancybox"><img src="webfile/funtour/upload_image/201951411497_action_530.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">日本</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1973">韓日雙國-釜山關西8日</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1973">http://www.funtour.com.tw/otravel.php?id=1973</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1973" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1973"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1973"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1973"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1973','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/" class="fancybox"><img src="webfile/funtour/upload_image/" border=0 width=90 height=60></a></td>
                            <td class="center">FUN旅遊</td>
                            <td class="center">小島渡假</td>
                            <td class="center">中國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1972">江西篁嶺古村16天</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1972">http://www.funtour.com.tw/otravel.php?id=1972</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1972" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1972"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1972"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1972"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1972','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2019410144534_action_89.jpeg" class="fancybox"><img src="webfile/funtour/upload_image/2019410144534_action_89.jpeg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">小島渡假</td>
                            <td class="center">越南</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1971">富國島+東方小巴黎</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1971">http://www.funtour.com.tw/otravel.php?id=1971</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1971" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1971"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1971"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1971"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1971','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/" class="fancybox"><img src="webfile/funtour/upload_image/" border=0 width=90 height=60></a></td>
                            <td class="center">FUN旅遊</td>
                            <td class="center">高檔精緻</td>
                            <td class="center">中國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1970">江蘇鎮江戀愛都市15天</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1970">http://www.funtour.com.tw/otravel.php?id=1970</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1970" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1970"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1970"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1970"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1970','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/20194220618_action_465.jpg" class="fancybox"><img src="webfile/funtour/upload_image/20194220618_action_465.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">小島渡假</td>
                            <td class="center">菲律賓</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1969">戀上巴拉望與海共舞５日</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1969">http://www.funtour.com.tw/otravel.php?id=1969</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1969" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1969"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1969"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1969"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1969','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/201942919100_action_552.jpg" class="fancybox"><img src="webfile/funtour/upload_image/201942919100_action_552.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">小島渡假</td>
                            <td class="center">中國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1968">絕美絲路10日</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1968">http://www.funtour.com.tw/otravel.php?id=1968</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1968" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1968"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1968"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1968"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1968','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/201942161127_action_942.jpg" class="fancybox"><img src="webfile/funtour/upload_image/201942161127_action_942.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">高檔精緻</td>
                            <td class="center">土耳其</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1967">迷戀土耳其奇幻之旅</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1967">http://www.funtour.com.tw/otravel.php?id=1967</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1967" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1967"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1967"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1967"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1967','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/201942155246_action_561.JPG" class="fancybox"><img src="webfile/funtour/upload_image/201942155246_action_561.JPG" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">韓國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1966">特愛釜山吃到飽美食5日</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1966">http://www.funtour.com.tw/otravel.php?id=1966</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1966" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1966"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1966"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1966"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1966','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/20194212502_action_477.JPG" class="fancybox"><img src="webfile/funtour/upload_image/20194212502_action_477.JPG" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">高檔精緻</td>
                            <td class="center">日本</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1965">相遇北陸秘境5日</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1965">http://www.funtour.com.tw/otravel.php?id=1965</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1965" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1965"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1965"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1965"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1965','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/201941193119_action_92.JPG" class="fancybox"><img src="webfile/funtour/upload_image/201941193119_action_92.JPG" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">中國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1964">情繫重慶山城風情5日</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1964">http://www.funtour.com.tw/otravel.php?id=1964</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1964" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1964"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1964"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1964"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1964','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/201941171735_action_724.png" class="fancybox"><img src="webfile/funtour/upload_image/201941171735_action_724.png" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">中國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1963">情繫重慶山城風情4日</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1963">http://www.funtour.com.tw/otravel.php?id=1963</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1963" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1963"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1963"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1963"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1963','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2018118194454_action_646.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2018118194454_action_646.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">FUN旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">中國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1962">相遇在白櫻飛雪的季節</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1962">http://www.funtour.com.tw/otravel.php?id=1962</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1962" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1962"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1962"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1962"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1962','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/" class="fancybox"><img src="webfile/funtour/upload_image/" border=0 width=90 height=60></a></td>
                            <td class="center">FUN旅遊</td>
                            <td class="center">高檔精緻</td>
                            <td class="center">中國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1961">雪鄉戀歌俄羅斯風情５天</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1961">http://www.funtour.com.tw/otravel.php?id=1961</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1961" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1961"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1961"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1961"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1961','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2018926153717_action_466.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2018926153717_action_466.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">小島渡假</td>
                            <td class="center">印尼</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1960">巴里遇到愛一次玩雙島</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1960">http://www.funtour.com.tw/otravel.php?id=1960</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1960" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1960"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1960"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1960"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1960','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2018930104717_action_736.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2018930104717_action_736.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">高檔精緻</td>
                            <td class="center">韓國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1959">相遇韓國樂翻天5日</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1959">http://www.funtour.com.tw/otravel.php?id=1959</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1959" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1959"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1959"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1959"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1959','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/201892117118_action_799.JPG" class="fancybox"><img src="webfile/funtour/upload_image/201892117118_action_799.JPG" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">韓國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1958">愛戀韓國華川鱒魚冰雪節</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1958">http://www.funtour.com.tw/otravel.php?id=1958</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1958" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1958"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1958"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1958"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1958','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2018921143226_action_296.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2018921143226_action_296.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">小島渡假</td>
                            <td class="center">菲律賓</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1957">擁抱鯨鯊雙島情緣</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1957">http://www.funtour.com.tw/otravel.php?id=1957</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1957" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1957"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1957"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1957"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1957','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2018921122643_action_585.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2018921122643_action_585.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">高檔精緻</td>
                            <td class="center">日本</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1956">日本之最山陽四國大蒐秘</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1956">http://www.funtour.com.tw/otravel.php?id=1956</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1956" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1956"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1956"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1956"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1956','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/201892019330_action_781.jpg" class="fancybox"><img src="webfile/funtour/upload_image/201892019330_action_781.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">高檔精緻</td>
                            <td class="center">歐洲</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1955">童話城堡三大遊船荷比法</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1955">http://www.funtour.com.tw/otravel.php?id=1955</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1955" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1955"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1955"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1955"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1955','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2018920152640_action_23.jpeg" class="fancybox"><img src="webfile/funtour/upload_image/2018920152640_action_23.jpeg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">情定兩岸</td>
                            <td class="center">中國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1954">華人廈門約會趣情定兩岸</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1954">http://www.funtour.com.tw/otravel.php?id=1954</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1954" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1954"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1954"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1954"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1954','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/20187895424_action_362.jpg" class="fancybox"><img src="webfile/funtour/upload_image/20187895424_action_362.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">小島渡假</td>
                            <td class="center">泰國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1953">揪愛泰國～絕色沙美島</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1953">http://www.funtour.com.tw/otravel.php?id=1953</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1953" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1953"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1953"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1953"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1953','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/201874183238_action_19.jpg" class="fancybox"><img src="webfile/funtour/upload_image/201874183238_action_19.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">小島渡假</td>
                            <td class="center">馬來西亞</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1952">潔淨與美的海角樂園─古晉市區躲貓貓！</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1952">http://www.funtour.com.tw/otravel.php?id=1952</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1952" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1952"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1952"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1952"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1952','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/201861420521_action_787.jpg" class="fancybox"><img src="webfile/funtour/upload_image/201861420521_action_787.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">高檔精緻</td>
                            <td class="center">泰國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1951">泰愛你～泰國甜心號、開心趴趴GO、5+1日</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1951">http://www.funtour.com.tw/otravel.php?id=1951</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1951" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1951"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1951"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1951"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1951','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2018614191030_action_726.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2018614191030_action_726.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">高檔精緻</td>
                            <td class="center">韓國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1950">雙城雙戀LOVE遊5日</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1950">http://www.funtour.com.tw/otravel.php?id=1950</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1950" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1950"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1950"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1950"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1950','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/201861416534_action_149.jpg" class="fancybox"><img src="webfile/funtour/upload_image/201861416534_action_149.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">FUN旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">日本</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1949">FUN鬆九州鐵道輕旅行4日</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1949">http://www.funtour.com.tw/otravel.php?id=1949</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1949" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1949"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1949"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1949"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1949','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2018614151443_action_55.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2018614151443_action_55.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">FUN旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">日本</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1948">FUN鬆九州鐵道輕旅行4日</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1948">http://www.funtour.com.tw/otravel.php?id=1948</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1948" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1948"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1948"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1948"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1948','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2018613192742_action_521.JPG" class="fancybox"><img src="webfile/funtour/upload_image/2018613192742_action_521.JPG" border=0 width=90 height=60></a></td>
                            <td class="center">FUN旅遊</td>
                            <td class="center">小島渡假</td>
                            <td class="center">日本</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1947">FUN鬆遊沖繩~浪漫小希臘~瀨長島.海水與愛情神話傳說~古宇利島</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1947">http://www.funtour.com.tw/otravel.php?id=1947</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1947" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1947"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1947"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1947"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1947','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2018531193836_action_572.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2018531193836_action_572.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">小島渡假</td>
                            <td class="center">菲律賓</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1946">超級新玩家~巴拉望一島一飯店渡假村</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1946">http://www.funtour.com.tw/otravel.php?id=1946</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1946" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1946"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1946"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1946"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1946','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/201853119265_action_702.PNG" class="fancybox"><img src="webfile/funtour/upload_image/201853119265_action_702.PNG" border=0 width=90 height=60></a></td>
                            <td class="center">FUN旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">新加坡</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1945">新印雙國跳島遊４天</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1945">http://www.funtour.com.tw/otravel.php?id=1945</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1945" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1945"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1945"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1945"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1945','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2018531171311_action_945.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2018531171311_action_945.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">中國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1944">澳港饗宴～精選四日【無購物】</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1944">http://www.funtour.com.tw/otravel.php?id=1944</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1944" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1944"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1944"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1944"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1944','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2018530145336_action_619.PNG" class="fancybox"><img src="webfile/funtour/upload_image/2018530145336_action_619.PNG" border=0 width=90 height=60></a></td>
                            <td class="center">FUN旅遊</td>
                            <td class="center">小島渡假</td>
                            <td class="center">日本</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1943">太陽公主號～石垣、沖繩、宮古島自主遊５日(內艙)</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1943">http://www.funtour.com.tw/otravel.php?id=1943</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1943" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1943"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1943"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1943"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1943','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2018518151056_action_847.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2018518151056_action_847.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">小島渡假</td>
                            <td class="center">菲律賓</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1942">菲要你好玩-看見心宿霧</a></td>
                            <td class="center">
                                <font color=red>尚未設定行程</font>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="ad_fun_action_list2_date.php?ac=1942"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1942"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1942"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1942','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2018517183049_action_993.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2018517183049_action_993.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">高檔精緻</td>
                            <td class="center">越南</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1941">北越~山水雙龍灣-海上公主號、萍水小舟、纜車摩天輪、五星飯店下午茶</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1941">http://www.funtour.com.tw/otravel.php?id=1941</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1941" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1941"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1941"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1941"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1941','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/201851716129_action_582.jpg" class="fancybox"><img src="webfile/funtour/upload_image/201851716129_action_582.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">FUN旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">新加坡</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1940">《玩雙國》FUN新玩時尚新加坡＋悠閒印尼巴淡島</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1940">http://www.funtour.com.tw/otravel.php?id=1940</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1940" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1940"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1940"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1940"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1940','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2018517141058_action_875.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2018517141058_action_875.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">高檔精緻</td>
                            <td class="center">韓國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1939">慢活濟州2大主題生態探索</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1939">http://www.funtour.com.tw/otravel.php?id=1939</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1939" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1939"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1939"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1939"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1939','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/201832135458_action_199.jpg" class="fancybox"><img src="webfile/funtour/upload_image/201832135458_action_199.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">小島渡假</td>
                            <td class="center">宿霧</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1938">「宿霧」浪漫海底精靈遊</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1938">http://www.funtour.com.tw/otravel.php?id=1938</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1938" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1938"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1938"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1938"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1938','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/201822710519_action_433.jpg" class="fancybox"><img src="webfile/funtour/upload_image/201822710519_action_433.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">伊豆箱根</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1937"> </a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1937">http://www.funtour.com.tw/otravel.php?id=1937</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1937" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1937"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1937"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1937"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1937','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/20178317148_action_566.jpg" class="fancybox"><img src="webfile/funtour/upload_image/20178317148_action_566.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">馬來西亞</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1921">美食探索大馬尋情記 </a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1921">http://www.funtour.com.tw/otravel.php?id=1921</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1921" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1921"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1921"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1921"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1921','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2017629165151_action_411.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2017629165151_action_411.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">時尚城市</td>
                            <td class="center">首爾</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1920">孤單又燦爛的鬼怪之旅 </a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1920">http://www.funtour.com.tw/otravel.php?id=1920</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1920" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1920"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1920"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1920"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1920','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center"><a href="webfile/funtour/upload_image/2017412162449_action_991.jpg" class="fancybox"><img src="webfile/funtour/upload_image/2017412162449_action_991.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">LOVE旅遊</td>
                            <td class="center">高檔精緻</td>
                            <td class="center">泰國</td>
                            <td class="center"><a href="ad_fun_action_list2_date.php?ac=1919"> 泰瘋癲之食尚贏家</a></td>
                            <td class="center">
                                <a href="http://www.funtour.com.tw/otravel.php?id=1919">http://www.funtour.com.tw/otravel.php?id=1919</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="http://funtour.com.tw/otravel.php?id=1919" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_fun_action_list2_date.php?ac=1919"><i class="icon-file"></i> 報名/花絮</a></li>

                                        <li><a href="ad_fun_action_list2_set.php?ac=1919"><i class="icon-th-list"></i> 行程頁設計</a></li>
                                        <li><a href="ad_fun_action_list2_add.php?ac=1919"><i class="icon-edit"></i> 修改</a></li>

                                        <li><a href="#" onClick="Mars_popup2('ad_fun_action_list2.php?st=del&ac=1919','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 104 筆、第 1 頁／共 3 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_fun_action_list2.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_fun_action_list2.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_fun_action_list2.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_fun_action_list2.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_fun_action_list2.php?topage=3 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_fun_action_list2.php?topage=1" selected>1</option>
                            <option value="/ad_fun_action_list2.php?topage=2">2</option>
                            <option value="/ad_fun_action_list2.php?topage=3">3</option>
                        </select></li>
                </ul>
            </div>

        </div>
        <!--/span-->

    </div>
    <!--/row-->


    <hr>
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    $(function() {

    });

    function check_send_submit() {
        if (($("#s21").val() && !$("#s22").val()) || ($("#s22").val() && !$("#s21").val())) {
            alert("請正確選擇活動時間的兩個區間時間。");
            return false;
        }
        if ($("#s21").val() && $("#s22").val()) {
            if ($("#s21").val() > $("#s22").val()) {
                alert("起始活動時間不可以比結束活動時間大。");
                return false;
            }
        }

        return true;
    }
</script>