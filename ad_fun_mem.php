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
            <li class="active">會員管理系統</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員管理系統 - 數量：500　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <div class="btn-group pull-left margin-right-10">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <!--<li><a href="ad_register1.php" target="_blank"><i class="icon-star"></i> 新增會員資料</a></li>-->

                            <li><a href="javascript:mutil_send();"><i class="icon-tag"></i> 多選發送</a></li>

                            <li><a href="ad_fun_mem_f.php"><i class="icon-tag"></i> 進階搜尋</a></li>

                        </ul>
                    </div>　
                    <form id="searchform" action="ad_fun_mem.php?vst=full&sear=1" method="post" target="_self" class="form-inline pull-left" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type">
                            <option value="s2">手機</option>
                            <option value="s1">信箱</option>
                            <option value="s3">姓名</option>
                            <option value="s4">編號</option>
                            <option value="s5">身分證字號</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text">
                        <input class="btn btn-default" type="submit" value="送出">
                    </form>
                </div>

                <p style="clear:both">
                    <a class="btn btn-success" href="?sear=1&ff=1">同意 Match</a>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th><input data-no-uniform="true" type="checkbox" id="selnums"></th>
                            <th>資料來源</th>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>生日</th>
                            <th>學歷</th>
                            <th>會館</th>
                            <th>秘書</th>
                            <th>照片</th>
                            <th width=80>證件</th>
                            <th width=80>系統來源</th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14070"></td>

                            <td class="center">好好玩網站</td>
                            <td>14070</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14070" target="_blank">柯宏明</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0986225859&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0986225859" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1990/3/10</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14070" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14070&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14070','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14070','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14070" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14070','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=endex12345601@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14070&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14069"></td>

                            <td class="center">好好玩旅行社</td>
                            <td>14069</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14069" target="_blank">吳惠芳</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0975708358&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0975708358" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1990/1/29</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14069" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14069&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14069','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14069','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14069" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14069','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=tirahwu@hotmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14069&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14068"></td>

                            <td class="center">好好玩網站</td>
                            <td>14068</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14068" target="_blank">葉韋池</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0920716633&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0920716633" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1985/3/3</td>
                            <td class="center">碩士</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14068" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14068&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14068','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14068','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14068" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14068','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=u9311134@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14068&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14067"></td>

                            <td class="center">活動宣傳</td>
                            <td>14067</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14067" target="_blank">鄭智謙</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0988516981&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0988516981" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1991/11/3</td>
                            <td class="center">碩士</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14067" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14067&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14067','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14067','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14067" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14067','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=fove1618@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14067&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14066"></td>

                            <td class="center">好好玩旅行社官方粉絲團</td>
                            <td>14066</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14066" target="_blank">郭國豪</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0912136008&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0912136008" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1986/12/10</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14066" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14066&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14066','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14066','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14066" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14066','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=ok342@yahoo.com.te','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14066&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14065"></td>

                            <td class="center">好好玩旅行社官方粉絲團</td>
                            <td>14065</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14065" target="_blank">周嘉豪</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0908728655&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0908728655" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1992/6/3</td>
                            <td class="center">碩士</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center"><a href="http://www.funtour.com.tw/images/photo/10009219_mem_photo_826670202192418125700.png?t=2810" target="_blank" class="fancybox">有</a></font>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14065" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14065&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14065','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14065','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14065" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14065','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=ttps870515@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14065&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14064"></td>

                            <td class="center">網路新聞</td>
                            <td>14064</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14064" target="_blank">黃瑞祥</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0982753321&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0982753321" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1986/11/14</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14064" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14064&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14064','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14064','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14064" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14064','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=disra98@hotmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14064&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14063"></td>

                            <td class="center">網路新聞</td>
                            <td>14063</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14063" target="_blank">鍾志明</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0978511559&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0978511559" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1976/6/19</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14063" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14063&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14063','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14063','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14063" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14063','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=royming88@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14063&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14062"></td>

                            <td class="center">好好玩旅行社官方粉絲團 [singleparty_funtourevent_FB_0802]</td>
                            <td>14062</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14062" target="_blank">劉孝先</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0988662289&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0988662289" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1979/5/13</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14062" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14062&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14062','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14062','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14062" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14062','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=vickyliu513@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14062&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14061"></td>

                            <td class="center">好好玩網站</td>
                            <td>14061</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14061" target="_blank">Test</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0911245784&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0911245784" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">2000/1/1</td>
                            <td class="center">高中</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14061" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14061&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14061','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14061','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14061" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14061','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=fheisjf@fusidur.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14061&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14060"></td>

                            <td class="center">好好玩旅行社</td>
                            <td>14060</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14060" target="_blank">張又禎</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0912169623&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0912169623" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1984/3/6</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14060" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14060&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14060','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14060','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14060" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14060','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=mtyofcyc@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14060&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14059"></td>

                            <td class="center">活動宣傳</td>
                            <td>14059</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14059" target="_blank">金依依</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0909560526&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0909560526" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1977/1/15</td>
                            <td class="center">碩士</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14059" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14059&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14059','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14059','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14059" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14059','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=chin_i_i_2@yahoo.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14059&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14058"></td>

                            <td class="center">春天會館客服-台北- 林馨彤</td>
                            <td>14058</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14058" target="_blank">TEST</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0926275129&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0926275129" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1977/12/7</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center"><a href="http://www.funtour.com.tw/images/photo/10009212_mem_photo_3000142021914111316234.jpg?t=4472" target="_blank" class="fancybox">有</a></font>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14058" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14058&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14058','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14058','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14058" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14058','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=a87920854@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14058&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14057"></td>

                            <td class="center">好好玩旅行社官方粉絲團</td>
                            <td>14057</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14057" target="_blank">曾靖文</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0926528286&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0926528286" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1994/7/4</td>
                            <td class="center">高中</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14057" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14057&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14057','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14057','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14057" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14057','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=oonly_loveo@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14057&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14056"></td>

                            <td class="center">好好玩網站 [singleparty_funtour_website]</td>
                            <td>14056</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14056" target="_blank">尹小君</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0916920837&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0916920837" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1989/8/6</td>
                            <td class="center">專科</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                身正
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14056" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14056&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14056','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14056','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14056" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14056','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=498495@jdiojfoid.gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14056&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14055"></td>

                            <td class="center">活動宣傳</td>
                            <td>14055</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14055" target="_blank">張維麟</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0975083865&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0975083865" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1978/10/2</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14055" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14055&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14055','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14055','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14055" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14055','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=soott123@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14055&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14054"></td>

                            <td class="center">好好玩旅行社</td>
                            <td>14054</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14054" target="_blank">邱育騏</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0905375289&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0905375289" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1991/10/30</td>
                            <td class="center">碩士</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center"><a href="http://www.funtour.com.tw/images/photo/10009208_mem_photo_923426202192263635738.jpg?t=9158" target="_blank" class="fancybox">有</a></font>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14054" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14054&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14054','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14054','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14054" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14054','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=yuu.hage.1030@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14054&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14053"></td>

                            <td class="center">好好玩網站</td>
                            <td>14053</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14053" target="_blank">胡金耀</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0971890960&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0971890960" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1976/10/10</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                身正<br>身反<br>工證
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14053" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14053&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14053','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14053','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14053" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14053','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=knightmai@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14053&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14052"></td>

                            <td class="center">好好玩旅行社官方粉絲團</td>
                            <td>14052</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14052" target="_blank">陳宇新</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0907095975&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0907095975" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1980/4/30</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14052" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14052&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14052','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14052','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14052" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14052','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=yuxinc85@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14052&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14051"></td>

                            <td class="center">好好玩網站</td>
                            <td>14051</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14051" target="_blank">董作軒</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0910305059&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0910305059" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1994/8/3</td>
                            <td class="center">碩士</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center"><a href="http://www.funtour.com.tw/images/photo/10009205_mem_photo_93700202191720533337.jpg?t=458" target="_blank" class="fancybox">有</a></font>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14051" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14051&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14051','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14051','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14051" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14051','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=jeff52135218@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14051&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14050"></td>

                            <td class="center">網路新聞</td>
                            <td>14050</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14050" target="_blank">謝永芳</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0980313770&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0980313770" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1971/6/14</td>
                            <td class="center">專科</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14050" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14050&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14050','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14050','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14050" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14050','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=hsiehuf@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14050&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14049"></td>

                            <td class="center">好好玩旅行社官方粉絲團 [sale-777]</td>
                            <td>14049</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14049" target="_blank">蔡青志</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0982588382&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0982588382" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1983/7/29</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14049" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14049&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14049','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14049','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14049" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14049','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=blucegod@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14049&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14048"></td>

                            <td class="center">好好玩網站</td>
                            <td>14048</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14048" target="_blank">蔡如華</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0930127015&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0930127015" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1993/3/29</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14048" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14048&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14048','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14048','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14048" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14048','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=chaishedvd@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14048&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14047"></td>

                            <td class="center">春天會館客服-新竹- 楊淑梅</td>
                            <td>14047</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14047" target="_blank">李奇芳</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0908233321&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0908233321" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1987/5/21</td>
                            <td class="center">專科</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14047" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14047&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14047','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14047','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14047" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14047','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=lkjhgfds99@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14047&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14046"></td>

                            <td class="center">好好玩旅行社</td>
                            <td>14046</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14046" target="_blank">楊詔文</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0978217367&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0978217367" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1996/11/23</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14046" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14046&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14046','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14046','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14046" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14046','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=haren741852963@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14046&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14045"></td>

                            <td class="center">網路新聞</td>
                            <td>14045</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14045" target="_blank">李庭葦</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0987500923&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0987500923" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1975/5/16</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14045" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14045&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14045','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14045','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14045" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14045','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=faywei@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14045&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14044"></td>

                            <td class="center">好好玩旅行社官方粉絲團</td>
                            <td>14044</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14044" target="_blank">張明仁</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0935197223&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0935197223" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1980/10/29</td>
                            <td class="center">專科</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14044" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14044&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14044','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14044','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14044" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14044','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=luke20831@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14044&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14043"></td>

                            <td class="center">好好玩旅行社 [sale-777]</td>
                            <td>14043</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14043" target="_blank">藍晏全</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0980160718&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0980160718" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1989/5/25</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14043" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14043&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14043','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14043','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14043" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14043','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=a0980160718@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14043&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14042"></td>

                            <td class="center">好好玩網站 [singleparty_funtour_website]</td>
                            <td>14042</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14042" target="_blank">總公司小君帳號勿刪</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0919123456&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0919123456" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1983/3/17</td>
                            <td class="center">專科</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14042" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14042&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14042','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14042','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14042" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14042','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=123456@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14042&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14041"></td>

                            <td class="center">好好玩旅行社</td>
                            <td>14041</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14041" target="_blank">Stella</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0961309276&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0961309276" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1986/11/22</td>
                            <td class="center">碩士</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14041" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14041&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14041','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14041','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14041" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14041','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=stellachenc78@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14041&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14040"></td>

                            <td class="center">好好玩網站</td>
                            <td>14040</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14040" target="_blank">劉家佑</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0987820620&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0987820620" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1984/3/3</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14040" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14040&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14040','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14040','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14040" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14040','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=steven730303@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14040&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14039"></td>

                            <td class="center">好好玩網站 [sale-696]</td>
                            <td>14039</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14039" target="_blank">TEST點點</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0988521745&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0988521745" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1992/9/13</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center"><a href="http://www.funtour.com.tw/images/photo/10009193_mem_photo_3943592021915142256310.jpg?t=7360" target="_blank" class="fancybox">有</a></font>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14039" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14039&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14039','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14039','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14039" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14039','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=she9@outlook.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14039&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14038"></td>

                            <td class="center">ＤＭ訊息</td>
                            <td>14038</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14038" target="_blank">李玉蘭</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0909846840&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0909846840" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1974/4/15</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14038" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14038&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14038','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14038','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14038" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14038','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=a0909846840@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14038&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14037"></td>

                            <td class="center">網路新聞</td>
                            <td>14037</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14037" target="_blank">羅美珊</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0953131930&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0953131930" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1977/11/12</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14037" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14037&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14037','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14037','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14037" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14037','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=alice@hacontrols.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14037&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14036"></td>

                            <td class="center">好好玩旅行社</td>
                            <td>14036</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14036" target="_blank">張智偉</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0908988626&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0908988626" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1972/8/17</td>
                            <td class="center">專科</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center"><a href="http://www.funtour.com.tw/images/photo/10009190_mem_photo_326854202162015749387.jpg?t=3626" target="_blank" class="fancybox">有</a></font>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14036" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14036&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14036','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14036','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14036" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14036','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=patrickc3459@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14036&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14035"></td>

                            <td class="center">春天會館客服-台北- 林馨彤</td>
                            <td>14035</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14035" target="_blank">李平平</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0937371742&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0937371742" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1992/6/12</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14035" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14035&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14035','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14035','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14035" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14035','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=ss501810612@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14035&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14034"></td>

                            <td class="center">網路新聞</td>
                            <td>14034</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14034" target="_blank">陳曦</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0978405750&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0978405750" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1990/12/28</td>
                            <td class="center">高中</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14034" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14034&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14034','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14034','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14034" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14034','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=andy4025252@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14034&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14033"></td>

                            <td class="center">好好玩網站</td>
                            <td>14033</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14033" target="_blank">郭姿君</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0952571178&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0952571178" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1993/1/12</td>
                            <td class="center">專科</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center"><a href="http://www.funtour.com.tw/images/photo/10009187_mem_photo_4114792021511221515290.jpeg?t=5781" target="_blank" class="fancybox">有</a></font>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14033" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14033&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14033','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14033','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14033" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14033','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=ohoh0112@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14033&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14032"></td>

                            <td class="center">好好玩旅行社官方粉絲團</td>
                            <td>14032</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14032" target="_blank">鄧力豪</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0989005802&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0989005802" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1990/10/22</td>
                            <td class="center">高中</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14032" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14032&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14032','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14032','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14032" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14032','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=a0989005802@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14032&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14031"></td>

                            <td class="center">好好玩旅行社</td>
                            <td>14031</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14031" target="_blank">謝宜玲</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0912109250&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0912109250" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1983/8/5</td>
                            <td class="center">碩士</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14031" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14031&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14031','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14031','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14031" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14031','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=nike200237@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14031&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14030"></td>

                            <td class="center">好好玩網站</td>
                            <td>14030</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14030" target="_blank">范世光</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0937190763&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0937190763" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1976/8/4</td>
                            <td class="center">博士</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14030" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14030&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14030','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14030','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14030" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14030','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=fan_angela@hotmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14030&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14029"></td>

                            <td class="center">好好玩旅行社官方粉絲團</td>
                            <td>14029</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14029" target="_blank">劉曉螢</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0978632968&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0978632968" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1981/7/11</td>
                            <td class="center">專科</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14029" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14029&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14029','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14029','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14029" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14029','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=hsiaoying711@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14029&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14028"></td>

                            <td class="center">好好玩旅行社官方粉絲團</td>
                            <td>14028</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14028" target="_blank">吳虹冰</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0912932650&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0912932650" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1990/10/16</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14028" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14028&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14028','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14028','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14028" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14028','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=dorarawu@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14028&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14027"></td>

                            <td class="center">網路新聞</td>
                            <td>14027</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14027" target="_blank">彭孜婷</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0933049938&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0933049938" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1980/5/11</td>
                            <td class="center">碩士</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14027" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14027&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14027','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14027','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14027" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14027','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=a876223@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14027&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14026"></td>

                            <td class="center">好好玩旅行社官方粉絲團</td>
                            <td>14026</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14026" target="_blank">張智鈞</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0930801030&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0930801030" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1989/2/28</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center"><a href="http://www.funtour.com.tw/images/photo/10009180_mem_photo_64313820214273192314.jpeg?t=836" target="_blank" class="fancybox">有</a></font>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14026" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14026&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14026','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14026','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14026" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14026','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=sky900313@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14026&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14025"></td>

                            <td class="center">好好玩網站</td>
                            <td>14025</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14025" target="_blank">楊真紋</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0961057161&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0961057161" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1982/1/1</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14025" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14025&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14025','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14025','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14025" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14025','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=vivi4831@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14025&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14024"></td>

                            <td class="center">好好玩旅行社</td>
                            <td>14024</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14024" target="_blank">劉清富</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0973105318&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0973105318" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1975/3/13</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14024" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14024&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14024','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14024','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14024" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14024','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=a0973105318@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14024&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14023"></td>

                            <td class="center">好好玩網站</td>
                            <td>14023</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14023" target="_blank">陳婕婷</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0912589778&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0912589778" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1989/8/7</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14023" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14023&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14023','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14023','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14023" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14023','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=syja87@hotmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14023&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14022"></td>

                            <td class="center">好好玩旅行社官方粉絲團</td>
                            <td>14022</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14022" target="_blank">梁筑鈞</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0937789805&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0937789805" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1988/11/21</td>
                            <td class="center">大學</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14022" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14022&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14022','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14022','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14022" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14022','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=j002942003@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14022&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="14021"></td>

                            <td class="center">好好玩網站</td>
                            <td>14021</td>
                            <td class="center"><a href="ad_fun_mem_detail.php?mem_auto=14021" target="_blank">林梅卿</a>

                                <a href="ad_no_mem_s.php?mem_mobile=0975501858&fr=f" target="_blank">[查]</a>
                                　<a href="ad_mem_detail.php?mem_mobile=0975501858" target="_blank">[查春天]</a>
                            </td>
                            <td class="center">女</td>
                            <td class="center">1972/5/30</td>
                            <td class="center">專科</td>
                            <td class="center"></td>

                            <td class="center">無</td>
                            <td class="center">無</td>
                            </td>

                            <td class="center">
                                無
                            </td>

                            <td class="center"></td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_mem_detail.php?mem_auto=14021" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_report.php?k_id=14021&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>


                                        <li><a href="javascript:Mars_popup('ad_fun_send_branch.php?mem_auto=14021','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_fun_mem_fix.php?mem_auto=14021','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>
                                        <!--<li><a href="ad_register2.php?mem_auto=14021" target="_blank"><i class="icon-camera"></i> 照片</a></li>-->

                                        <li><a href="javascript:Mars_popup2('ad_fun_mem_del.php?mem_auto=14021','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                        <!--<li><a href="javascript:Mars_popup('ad_fun_send_fun.php?mem_mail=may0975501858@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>-->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_fun_report.php?k_id=14021&ty=member&rc=會員列表','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2">未處理　 </font>) 內容：無
                                &nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>舊：</font>
                                &nbsp;&nbsp;

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 10 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_fun_mem.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_fun_mem.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_fun_mem.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_fun_mem.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_fun_mem.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_fun_mem.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_fun_mem.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_fun_mem.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_fun_mem.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_fun_mem.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_fun_mem.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_fun_mem.php?topage=10 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_fun_mem.php?topage=1" selected>1</option>
                            <option value="/ad_fun_mem.php?topage=2">2</option>
                            <option value="/ad_fun_mem.php?topage=3">3</option>
                            <option value="/ad_fun_mem.php?topage=4">4</option>
                            <option value="/ad_fun_mem.php?topage=5">5</option>
                            <option value="/ad_fun_mem.php?topage=6">6</option>
                            <option value="/ad_fun_mem.php?topage=7">7</option>
                            <option value="/ad_fun_mem.php?topage=8">8</option>
                            <option value="/ad_fun_mem.php?topage=9">9</option>
                            <option value="/ad_fun_mem.php?topage=10">10</option>
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



        $("#selnums").on("click", function() {
            if ($(this).prop("checked"))
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", true);
                });
            else
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", false);
                });
        });

    });

    function mutil_send() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要發送的會員。");
        else Mars_popup('ad_fun_send_branch.php?mem_auto=' + $allnum, '', 'scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');
    }

    function chk_search_form() {
        if (!$("#keyword_type").val()) {
            alert("請選擇要搜尋的類型。");
            $("#keyword_type").focus();
            return false;
        }
        if (!$("#keyword").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
        }
        location.href = "ad_fun_mem.php?sear=1&vst=full&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>