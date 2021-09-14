<?php
require("./include/_top.php");
require("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">會員服務紀錄查詢</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員服務紀錄查詢</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p style="clear:both">
                <form id="searchform" action="ad_action_service.php" method="post" target="_self" onsubmit="return chk_search_form()" class="form-inline pull-left">

                    <select name="keyword_type" id="keyword_type" class="form-control">
                        <option value="s2">手機</option>
                        <option value="s17">電話</option>
                        <option value="s3">姓名</option>
                        <option value="s4">編號</option>
                        <option value="s5">約會專家帳號</option>
                        <option value="s6">身分證字號</option>
                        <option value="s22">電子信箱</option>
                    </select>
                    <input id="keyword" name="keyword" id="keyword" class="form-control" type="text">
                    <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                </form>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th></th>
                            <th width=50>編號</th>
                            <th>姓名</th>
                            <th width=50>性別</th>
                            <th>生日</th>
                            <th width=60>學歷</th>
                            <th width=180>秘書</th>
                            <th width=60>照片</th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(~)</span>
                            </td>
                            <td>723940</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=723940" target="_blank">鄭財明</a></td>
                            <td class="center">男</td>
                            <td class="center">1980/11/11&nbsp;&nbsp;41 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 澔翰
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=723940" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨VIP會員-二年期(2019/6/28~2022/6/9)</span>
                            </td>
                            <td>939601</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=939601" target="_blank">廖牧竹</a></td>
                            <td class="center">男</td>
                            <td class="center">1984/11/26&nbsp;&nbsp;37 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>新竹 - 邱卉欣<br>
                                <font color=green>排約：</font>黃亮亮<br>
                                <font color=green>邀約：</font>新竹 - 邱卉欣
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=939601" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">真人認證會員(2016/6/18~2016/12/18)</span>
                            </td>
                            <td>1092766</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1092766" target="_blank">黃馨儀(結婚)</a></td>
                            <td class="center">女</td>
                            <td class="center">1984/10/19&nbsp;&nbsp;37 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 會員結婚<br>
                                <font color=green>邀約：</font>八德 - 八德督導
                            </td>
                            <td class="center">
                                <a href="dphoto/photo/2016623195648_1092766_362.jpg?t=3646" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1092766" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-二年期(2020/1/1~2022/1/1)</span>
                            </td>
                            <td>1286667</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1286667" target="_blank">TEST陳家維</a></td>
                            <td class="center">男</td>
                            <td class="center">1984/3/13&nbsp;&nbsp;37 歲</td>
                            <td class="center">碩士</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 澔翰<br>
                                <font color=green>邀約：</font>總管理處 - 澔翰
                            </td>
                            <td class="center">
                                <a href="../photo/2017322114410_1286667_907802.jpg?t=2902" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1286667" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">真人認證會員(2017/4/21~2017/10/21)</span>
                            </td>
                            <td>1297317</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1297317" target="_blank">曾鏡諭</a></td>
                            <td class="center">女</td>
                            <td class="center">1988/8/25&nbsp;&nbsp;33 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - zoe
                            </td>
                            <td class="center">
                                <a href="../photo/2017417172152_1297317_970607.JPG?t=1057" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1297317" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨VIP會員-一年期(2008/1/1~2021/12/11)</span>
                            </td>
                            <td>1347058</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1347058" target="_blank">box70001</a></td>
                            <td class="center">男</td>
                            <td class="center">1984/12/27&nbsp;&nbsp;37 歲</td>
                            <td class="center">高中</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 澔翰<br>
                                <font color=green>邀約：</font>總管理處 - 點點
                            </td>
                            <td class="center">
                                <a href="../photo/girl.jpg?t=3202" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1347058" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2008/1/1~2009/1/1)</span>
                            </td>
                            <td>1381375</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1381375" target="_blank">陳小姐</a></td>
                            <td class="center">女</td>
                            <td class="center">1954/6/7&nbsp;&nbsp;67 歲</td>
                            <td class="center">專科</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 澔翰
                            </td>
                            <td class="center">
                                <a href="../photo/20171127105917_1381375_544232.jpg?t=3817" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1381375" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">真人認證會員(2019/1/1~2019/7/1)</span>
                            </td>
                            <td>1390778</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1390778" target="_blank">測試app</a></td>
                            <td class="center">男</td>
                            <td class="center">1987/1/1&nbsp;&nbsp;34 歲</td>
                            <td class="center">博士</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 點點<br>
                                <font color=green>排約：</font>點點<br>
                                <font color=green>邀約：</font>總管理處 - 點點
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1390778" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨VIP會員-二年期(2017/1/1~2019/1/1)</span>
                            </td>
                            <td>1393955</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1393955" target="_blank">何承寯</a></td>
                            <td class="center">男</td>
                            <td class="center">1985/1/25&nbsp;&nbsp;36 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 點點
                            </td>
                            <td class="center">
                                <a href="../photo/2017122513341_1393955_42355.jpg?t=196" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1393955" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨VIP會員-一年期(2008/1/1~2019/7/3)</span>
                            </td>
                            <td>1394068</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1394068" target="_blank">box</a></td>
                            <td class="center">男</td>
                            <td class="center">1990/9/8&nbsp;&nbsp;31 歲</td>
                            <td class="center">碩士</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 澔翰
                            </td>
                            <td class="center">
                                <a href="../photo/20171225161557_1394068_471005.jpg?t=8260" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1394068" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">真人認證會員(2008/1/1~2008/4/1)</span>
                            </td>
                            <td>1419966</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1419966" target="_blank">Test facebook</a></td>
                            <td class="center">女</td>
                            <td class="center">2000/1/1&nbsp;&nbsp;21 歲</td>
                            <td class="center"></td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 澔翰<br>
                                <font color=green>邀約：</font>總管理處 - 澔翰
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1419966" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨VIP會員-二年期(2021/5/26~2023/5/26)</span>
                            </td>
                            <td>1503490</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1503490" target="_blank">測試-尹宜君</a></td>
                            <td class="center">男</td>
                            <td class="center">1989/8/6&nbsp;&nbsp;32 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 宜君<br>
                                <font color=green>排約：</font>宜君<br>
                                <font color=green>邀約：</font>總管理處 - 宜君
                            </td>
                            <td class="center">
                                <a href="../photo/201883013245_1503490_890453.jpg?t=6836" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1503490" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨VIP會員-二年期(2018/9/1~2020/9/1)</span>
                            </td>
                            <td>1509039</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1509039" target="_blank">巴克斯-吳俊岑</a></td>
                            <td class="center">男</td>
                            <td class="center">1990/1/1&nbsp;&nbsp;31 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 點點
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1509039" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨VIP會員-二年期(2018/9/1~2020/9/1)</span>
                            </td>
                            <td>1509041</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1509041" target="_blank">巴克斯-許士豪</a></td>
                            <td class="center">男</td>
                            <td class="center">1990/2/1&nbsp;&nbsp;31 歲</td>
                            <td class="center">國中</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 點點
                            </td>
                            <td class="center">
                                <a href="../photo/20181127142234_1509041_166424.jpg?t=9672" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1509041" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨VIP會員-二年期(2018/9/1~2020/9/1)</span>
                            </td>
                            <td>1509044</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1509044" target="_blank">巴克斯-黃任州</a></td>
                            <td class="center">男</td>
                            <td class="center">1990/3/1&nbsp;&nbsp;31 歲</td>
                            <td class="center">國中</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 點點
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1509044" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨VIP會員-二年期(2018/9/1~2020/9/1)</span>
                            </td>
                            <td>1509045</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1509045" target="_blank">巴克斯-張馨安</a></td>
                            <td class="center">男</td>
                            <td class="center">1990/4/1&nbsp;&nbsp;31 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 點點<br>
                                <font color=green>邀約：</font>總管理處 - 點點
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1509045" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨VIP會員-二年期(2018/9/1~2020/9/1)</span>
                            </td>
                            <td>1509046</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1509046" target="_blank">巴克斯-吳雅義</a></td>
                            <td class="center">女</td>
                            <td class="center">1990/6/1&nbsp;&nbsp;31 歲</td>
                            <td class="center">高職</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 點點
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1509046" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨VIP會員-二年期(2018/9/1~2020/9/1)</span>
                            </td>
                            <td>1509048</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1509048" target="_blank">巴克斯-王雅建</a></td>
                            <td class="center">女</td>
                            <td class="center">1990/3/1&nbsp;&nbsp;31 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 點點
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1509048" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨VIP會員-二年期(2018/9/1~2020/9/1)</span>
                            </td>
                            <td>1509236</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1509236" target="_blank">巴克斯-林于君</a></td>
                            <td class="center">女</td>
                            <td class="center">1990/4/1&nbsp;&nbsp;31 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 點點
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1509236" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨VIP會員-二年期(2018/9/1~2020/9/1)</span>
                            </td>
                            <td>1509238</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1509238" target="_blank">巴克斯-王蕙吟</a></td>
                            <td class="center">女</td>
                            <td class="center">1990/5/1&nbsp;&nbsp;31 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 點點
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1509238" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨VIP會員-二年期(2018/9/1~2020/9/1)</span>
                            </td>
                            <td>1509239</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1509239" target="_blank">巴克斯-鄭昆斌</a></td>
                            <td class="center">女</td>
                            <td class="center">1990/5/1&nbsp;&nbsp;31 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 點點
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1509239" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2021/5/26~2022/5/26)</span>
                            </td>
                            <td>1606486</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1606486" target="_blank">測試小君</a></td>
                            <td class="center">女</td>
                            <td class="center">1995/4/5&nbsp;&nbsp;26 歲</td>
                            <td class="center">高中</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 宜君<br>
                                <font color=green>排約：</font>宜君<br>
                                <font color=green>邀約：</font>總管理處 - 宜君
                            </td>
                            <td class="center">
                                <a href="../photo/2019528172947_1606486_878109.jpg?t=4849" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1606486" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2021/4/13~2022/4/13)</span>
                            </td>
                            <td>2042945</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=2042945" target="_blank">sara</a></td>
                            <td class="center">女</td>
                            <td class="center">1980/1/1&nbsp;&nbsp;41 歲</td>
                            <td class="center">碩士</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 周羽潔<br>
                                <font color=green>排約：</font>周羽潔<br>
                                <font color=green>邀約：</font>總管理處 - 周羽潔
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=2042945" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨VIP會員-一年期(2018/5/20~2019/5/20)</span>
                            </td>
                            <td>1451383</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1451383" target="_blank">吳明璋</a></td>
                            <td class="center">男</td>
                            <td class="center">1987/4/16&nbsp;&nbsp;34 歲</td>
                            <td class="center">碩士</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 彭淑慧<br>
                                <font color=green>排約：</font>彭淑慧<br>
                                <font color=green>邀約：</font>桃園 - 彭淑慧
                            </td>
                            <td class="center">
                                <a href="../photo/201852423510_1451383_166150.jpg?t=144" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1451383" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2019/8/22~2021/10/25)</span>
                            </td>
                            <td>1829497</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1829497" target="_blank">謝承原</a></td>
                            <td class="center">男</td>
                            <td class="center">1985/10/2&nbsp;&nbsp;36 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>桃園 - 江琳<br>
                                <font color=green>排約：</font>彭淑慧<br>
                                <font color=green>邀約：</font>新竹 - Cali卡麗
                            </td>
                            <td class="center">
                                <a href="../photo/201982310714_1829497_433560.jpeg?t=6160" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1829497" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2017/7/27~2021/11/5)</span>
                            </td>
                            <td>1335930</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1335930" target="_blank">蔡宗穎</a></td>
                            <td class="center">男</td>
                            <td class="center">1985/3/15&nbsp;&nbsp;36 歲</td>
                            <td class="center">碩士</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 陳紅<br>
                                <font color=green>排約：</font>陳紅<br>
                                <font color=green>邀約：</font>台北 - 陳紅
                            </td>
                            <td class="center">
                                <a href="../photo/202151719958_1335930_192166.jpg?t=9281" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1335930" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-二年期(2019/3/30~2021/3/30)</span>
                            </td>
                            <td>1427357</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1427357" target="_blank">彭雨喬</a></td>
                            <td class="center">女</td>
                            <td class="center">1984/12/8&nbsp;&nbsp;37 歲</td>
                            <td class="center">專科</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 高語鍹<br>
                                <font color=green>排約：</font>林馨彤<br>
                                <font color=green>邀約：</font>八德 - 朱芳葦
                            </td>
                            <td class="center">
                                <a href="../photo/201951814412_1427357_103451.jpg?t=5778" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1427357" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2019/10/13~2020/10/13)</span>
                            </td>
                            <td>1821208</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1821208" target="_blank">張倫誌</a></td>
                            <td class="center">男</td>
                            <td class="center">1977/10/30&nbsp;&nbsp;44 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 黃泯甄<br>
                                <font color=green>排約：</font>陳紅<br>
                                <font color=green>邀約：</font>台北 - 高語鍹
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1821208" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2020/1/22~2021/1/22)</span>
                            </td>
                            <td>1879714</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1879714" target="_blank">林孟臻</a></td>
                            <td class="center">女</td>
                            <td class="center">1977/5/10&nbsp;&nbsp;44 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 詹明錡<br>
                                <font color=green>排約：</font>林馨彤<br>
                                <font color=green>邀約：</font>八德 - 蔡佩蓁 Sunny
                            </td>
                            <td class="center">
                                <a href="../photo/202024164256_1879714_869243.jpg?t=582" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1879714" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨VIP會員-一年期(2017/4/16~2021/4/30)</span>
                            </td>
                            <td>1088195</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1088195" target="_blank">關裕弘</a></td>
                            <td class="center">男</td>
                            <td class="center">1972/5/30&nbsp;&nbsp;49 歲</td>
                            <td class="center">碩士</td>

                            <td class="center">
                                <font color=green>受理：</font>八德 - IVY
                            </td>
                            <td class="center">
                                <a href="dphoto/photo/20174820519_1088195_345806.jpg?t=7672" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1088195" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2020/12/26~2022/2/24)</span>
                            </td>
                            <td>1090834</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1090834" target="_blank">葉峻銘</a></td>
                            <td class="center">男</td>
                            <td class="center">1978/4/12&nbsp;&nbsp;43 歲</td>
                            <td class="center">博士</td>

                            <td class="center">
                                <font color=green>受理：</font>八德 - 周靖雯 Bella<br>
                                <font color=green>排約：</font>詹惠驛 惠惠<br>
                                <font color=green>邀約：</font>總管理處 - 張利 Liz
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1090834" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2020/4/21~2021/4/21)</span>
                            </td>
                            <td>1091894</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1091894" target="_blank">黃慶明</a></td>
                            <td class="center">男</td>
                            <td class="center">1977/9/17&nbsp;&nbsp;44 歲</td>
                            <td class="center">專科</td>

                            <td class="center">
                                <font color=green>受理：</font>八德 - 八德督導<br>
                                <font color=green>排約：</font>柯婉儀<br>
                                <font color=green>邀約：</font>八德 - kitty
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1091894" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">真人認證會員(2019/5/30~2019/11/30)</span>
                            </td>
                            <td>1387854</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1387854" target="_blank">吳禎薇XZ</a></td>
                            <td class="center">女</td>
                            <td class="center">1989/5/14&nbsp;&nbsp;32 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>八德 - 蔡佩蓁 Sunny<br>
                                <font color=green>排約：</font>詹惠驛 惠惠<br>
                                <font color=green>邀約：</font>八德 - 八德督導
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1387854" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">真人認證會員(2020/6/13~2020/9/13)</span>
                            </td>
                            <td>1560412</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1560412" target="_blank">祝婉庭</a></td>
                            <td class="center">女</td>
                            <td class="center">1979/8/9&nbsp;&nbsp;42 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>八德 - 柯宥如 Maggie<br>
                                <font color=green>邀約：</font>總管理處 - 張利 Liz
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1560412" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">真人認證會員(2020/2/27~2020/8/27)</span>
                            </td>
                            <td>1884991</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1884991" target="_blank">鄭如妤</a></td>
                            <td class="center">女</td>
                            <td class="center">1984/5/29&nbsp;&nbsp;37 歲</td>
                            <td class="center">大學</td>

                            <td class="center">
                                <font color=green>受理：</font>八德 - 柯宥如 Maggie<br>
                                <font color=green>排約：</font>柯宥如 Maggie<br>
                                <font color=green>邀約：</font>總管理處 - IVY
                            </td>
                            <td class="center">
                                <a href="../photo/20202822428_1884991_503781.jpg?t=8772" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1884991" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="color:blue">真人認證會員(2020/3/14~2020/9/14)</span>
                            </td>
                            <td>1893467</td>
                            <td class="center"><a href="ad_mem_service.php?mem_num=1893467" target="_blank">許寶仁</a></td>
                            <td class="center">女</td>
                            <td class="center">1981/1/23&nbsp;&nbsp;40 歲</td>
                            <td class="center">碩士</td>

                            <td class="center">
                                <font color=green>受理：</font>八德 - 柯宥如 Maggie<br>
                                <font color=green>排約：</font>張利 Liz<br>
                                <font color=green>邀約：</font>總管理處 - 張利 Liz
                            </td>
                            <td class="center">
                                <a href="../photo/202036135730_1893467_234967.jpg?t=7730" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_service.php?mem_num=1893467" target="_blank"><i class="icon-file"></i> 服務紀錄</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 36 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_action_service.php?topage=1&keyword=&keyword_type=s17>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_action_service.php?topage=1&keyword=&keyword_type=s17 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_action_service.php?topage=1&keyword=&keyword_type=s17" selected>1</option>
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
require("./include/_bottom.php");
?>

<script type="text/javascript">
    function chk_search_form() {

        return true;
    }
</script>