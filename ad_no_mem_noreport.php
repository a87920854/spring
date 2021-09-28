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
            <li><a href="ad_mem.php">會員管理系統</a></li>
            <li class="active">無回報未入會資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>前 500 筆無回報未入會資料 </strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p>
                    <a href="?s=all" class="btn btn-primary">全部</a>&nbsp;<a href="?branch=台北" class="btn btn-primary">台北</a>&nbsp;<a href="?branch=桃園" class="btn btn-primary">桃園</a>&nbsp;<a href="?branch=新竹" class="btn btn-primary">新竹</a>&nbsp;<a href="?branch=台中" class="btn btn-primary">台中</a>&nbsp;<a href="?branch=台南" class="btn btn-primary">台南</a>&nbsp;<a href="?branch=高雄" class="btn btn-primary">高雄</a>&nbsp;<a href="?branch=八德" class="btn btn-primary">八德</a>&nbsp;<a href="?branch=約專" class="btn btn-primary">約專</a>&nbsp;<a href="?branch=迷你約" class="btn btn-primary">迷你約</a>&nbsp;<a href="?branch=總管理處" class="btn btn-primary">總管理處</a>&nbsp;

                </p>
                <p><a href="#s" onclick="mutil_send();" class="btn btn-warning">多選發送</a></p>
                <p>篩選條件：督導已發送給秘書 + 排除系統紀錄 + 依督導發送時間排序</p>
                <table class="table table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th><input data-no-uniform="true" type="checkbox" id="selnums"></th>
                            <th>資料來源</th>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>生日</th>
                            <th>學歷</th>
                            <th>秘書</th>
                            <th>照片</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr id="showtr_2087076" style="background-color:#f9f9f9">
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="2087076"></td>
                            <td class="center">春天網站-春網首頁</td>
                            <td>2087076</td>

                            <td class="center"><a href="ad_mem_detail.php?mem_num=2087076" target="_blank">江琳是渾蛋虛偽死騙子</a>
                                <div style="float:right"> <span class="label label-warning"><a href="#" target="_blank" style="color:white;">重</a></span>

                                    <a href="ad_no_mem_s.php?mem_mobile=0911597597" target="_blank"> <span class="label label-info">查</span></a>

                                    <span class="label" style="background:black"><a href="#m" data-toggle="tooltip" data-original-title="心理問題" style="color:white;">黑</a></span>
                                    <a href="javascript:mem_send('2087076')"><span class="label label-success">桃園市</span>
                                    </a>

                                </div>
                            </td>
                            <td class="center">男</td>

                            <td class="center">1958/7/3　63 歲</td>
                            <td class="center">國中</td>

                            <td class="center">
                                <font color=green>受理：</font>總管理處 - 回收名單
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:mem_send('2087076')"><i class="icon-arrow-right"></i> 發送</a></li>

                                        <li><a href="ad_mem_detail.php?mem_num=2087076" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1990074&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>
                                        <li><a href="javascript:Mars_popup('ad_invite_add.php?st=read&keyword=2087076','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=470,top=10,left=10');"><i class="icon-resize-full"></i> 約見</a></li>

                                        <li><a href="ad_mem_fix.php?mem_num=2087076" target="_blank"><i class="icon-file"></i> 修改</a></li>


                                        <li><a href="javascript:Mars_popup('send_mail_ksp.php?mem_auto=1990074&mem_mail=su3fm4n3@yahoo.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=520,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp.php?mem_sex=男&mem_single=LI2003AVON&mem_mail=su3fm4n3@yahoo.com&mem_num=2087076','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_print0.php?mem_auto=1990074&mem_sex=男','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 五人擇友信</a></li>
                                        <!--								<li><a href="javascript:Mars_popup('send_mail_action.php?mem_auto=1990074&mem_mail=su3fm4n3@yahoo.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 當月活動信</a></li>-->




                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr style="background-color:#f9f9f9">
                            <td colspan=2>

                                資料：2021-09-28 16:58&nbsp;&nbsp;發送：2021-09-28 17:02
                            </td>

                            <td colspan="8" style="BORDER-bottom: #666666 1px dotted;width:75%;word-break: normal;">
                                <a href="#r" onclick="Mars_popup('ad_report.php?k_id=1990074&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>-<font color=red>已發送</font>&nbsp;-&nbsp;黎總經理於2021/9/28 下午 05:02:08將本筆資料[未入會]發送給 總管理處-回收名單
                                &nbsp;&nbsp;<font color=blue>舊：</font>
                            </td>
                        </tr>

                        <tr id="showtr_2087075" style="background-color:#ffffff">
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="2087075"></td>
                            <td class="center">行銷活動-2021年12星座愛情指數測驗 [DMN_FB_post_12starsigns_20210423]</td>
                            <td>2087075</td>

                            <td class="center"><a href="ad_mem_detail.php?mem_num=2087075" target="_blank">高稜宜</a>
                                <div style="float:right">

                                    <a href="ad_no_mem_s.php?mem_mobile=0905110825" target="_blank"> <span class="label label-info">查</span></a>


                                    <a href="javascript:mem_send('2087075')"><span class="label label-success">台南市</span>
                                    </a>

                                </div>
                            </td>
                            <td class="center">女</td>

                            <td class="center">1999/4/10　22 歲</td>
                            <td class="center"></td>

                            <td class="center">
                                <font color=green>受理：</font>八德 - 八德督導
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:mem_send('2087075')"><i class="icon-arrow-right"></i> 發送</a></li>

                                        <li><a href="ad_mem_detail.php?mem_num=2087075" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1990073&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>
                                        <li><a href="javascript:Mars_popup('ad_invite_add.php?st=read&keyword=2087075','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=470,top=10,left=10');"><i class="icon-resize-full"></i> 約見</a></li>

                                        <li><a href="ad_mem_fix.php?mem_num=2087075" target="_blank"><i class="icon-file"></i> 修改</a></li>


                                        <li><a href="javascript:Mars_popup('send_mail_ksp.php?mem_auto=1990073&mem_mail=','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=520,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp.php?mem_sex=女&mem_single=80662419&mem_mail=&mem_num=2087075','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_print0.php?mem_auto=1990073&mem_sex=女','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 五人擇友信</a></li>
                                        <!--								<li><a href="javascript:Mars_popup('send_mail_action.php?mem_auto=1990073&mem_mail=','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 當月活動信</a></li>-->




                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr style="background-color:#ffffff">
                            <td colspan=2>

                                資料：2021-09-28 16:57&nbsp;&nbsp;發送：2021-09-28 17:02
                            </td>

                            <td colspan="8" style="BORDER-bottom: #666666 1px dotted;width:75%;word-break: normal;">
                                <a href="#r" onclick="Mars_popup('ad_report.php?k_id=1990073&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>-<font color=red>已發送</font>&nbsp;-&nbsp;黎總經理於2021/9/28 下午 05:02:15將本筆資料[未入會]自 八德 - 不明 轉送給 八德-八德督導
                                &nbsp;&nbsp;<font color=blue>舊：</font>有勾選確認單身身分
                            </td>
                        </tr>

                        <tr id="showtr_2087063" style="background-color:#f9f9f9">
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="2087063"></td>
                            <td class="center">行銷活動-2021年12星座愛情指數測驗 [DMN_FB_post_12starsigns_20210423]</td>
                            <td>2087063</td>

                            <td class="center"><a href="ad_mem_detail.php?mem_num=2087063" target="_blank">唐子淇</a>
                                <div style="float:right">

                                    <a href="ad_no_mem_s.php?mem_mobile=0903111335" target="_blank"> <span class="label label-info">查</span></a>


                                    <a href="javascript:mem_send('2087063')"><span class="label label-success">桃園市</span>
                                    </a>

                                </div>
                            </td>
                            <td class="center">女</td>

                            <td class="center">1985/1/3　36 歲</td>
                            <td class="center"></td>

                            <td class="center">
                                <font color=green>受理：</font>約專 - 珍珍
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:mem_send('2087063')"><i class="icon-arrow-right"></i> 發送</a></li>

                                        <li><a href="ad_mem_detail.php?mem_num=2087063" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1990061&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>
                                        <li><a href="javascript:Mars_popup('ad_invite_add.php?st=read&keyword=2087063','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=470,top=10,left=10');"><i class="icon-resize-full"></i> 約見</a></li>

                                        <li><a href="ad_mem_fix.php?mem_num=2087063" target="_blank"><i class="icon-file"></i> 修改</a></li>


                                        <li><a href="javascript:Mars_popup('send_mail_ksp.php?mem_auto=1990061&mem_mail=','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=520,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp.php?mem_sex=女&mem_single=N220685478&mem_mail=&mem_num=2087063','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_print0.php?mem_auto=1990061&mem_sex=女','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 五人擇友信</a></li>
                                        <!--								<li><a href="javascript:Mars_popup('send_mail_action.php?mem_auto=1990061&mem_mail=','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 當月活動信</a></li>-->




                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr style="background-color:#f9f9f9">
                            <td colspan=2>

                                資料：2021-09-28 16:34&nbsp;&nbsp;發送：2021-09-28 16:49
                            </td>

                            <td colspan="8" style="BORDER-bottom: #666666 1px dotted;width:75%;word-break: normal;">
                                <a href="#r" onclick="Mars_popup('ad_report.php?k_id=1990061&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>-<font color=red>已發送</font>&nbsp;-&nbsp;黎總經理於2021/9/28 下午 04:49:53將本筆資料[未入會]自 八德 - 不明 轉送給 約專-珍珍
                                &nbsp;&nbsp;<font color=blue>舊：</font>
                            </td>
                        </tr>

                        <tr id="showtr_2087047" style="background-color:#ffffff">
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="2087047"></td>
                            <td class="center">行銷活動-你的戀愛能力有多強-手機版 [singleparty_loveability_keywords_iProspect]</td>
                            <td>2087047</td>

                            <td class="center"><a href="ad_mem_detail.php?mem_num=2087047" target="_blank">Judy</a>
                                <div style="float:right">

                                    <a href="ad_no_mem_s.php?mem_mobile=0928698102" target="_blank"> <span class="label label-info">查</span></a>


                                    <a href="javascript:mem_send('2087047')"><span class="label label-success">屏東縣</span>
                                    </a>

                                </div>
                            </td>
                            <td class="center">女</td>

                            <td class="center">1992/0/0　29 歲</td>
                            <td class="center"></td>

                            <td class="center">
                                <font color=green>受理：</font>高雄 - 高雄督導
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:mem_send('2087047')"><i class="icon-arrow-right"></i> 發送</a></li>

                                        <li><a href="ad_mem_detail.php?mem_num=2087047" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1990045&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>
                                        <li><a href="javascript:Mars_popup('ad_invite_add.php?st=read&keyword=2087047','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=470,top=10,left=10');"><i class="icon-resize-full"></i> 約見</a></li>

                                        <li><a href="ad_mem_fix.php?mem_num=2087047" target="_blank"><i class="icon-file"></i> 修改</a></li>


                                        <li><a href="javascript:Mars_popup('send_mail_ksp.php?mem_auto=1990045&mem_mail=judy6718@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=520,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp.php?mem_sex=女&mem_single=13161979&mem_mail=judy6718@yahoo.com.tw&mem_num=2087047','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_print0.php?mem_auto=1990045&mem_sex=女','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 五人擇友信</a></li>
                                        <!--								<li><a href="javascript:Mars_popup('send_mail_action.php?mem_auto=1990045&mem_mail=judy6718@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 當月活動信</a></li>-->




                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr style="background-color:#ffffff">
                            <td colspan=2>

                                資料：2021-09-28 15:55&nbsp;&nbsp;發送：2021-09-28 16:20
                            </td>

                            <td colspan="8" style="BORDER-bottom: #666666 1px dotted;width:75%;word-break: normal;">
                                <a href="#r" onclick="Mars_popup('ad_report.php?k_id=1990045&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>-<font color=red>已發送</font>&nbsp;-&nbsp;黎總經理於2021/9/28 下午 04:20:28將本筆資料[未入會]發送給 高雄-高雄督導
                                &nbsp;&nbsp;<font color=blue>舊：</font>
                            </td>
                        </tr>

                        <tr id="showtr_1969436" style="background-color:#f9f9f9">
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value="1969436"></td>
                            <td class="center">行銷活動-你的戀愛能力有多強-手機版 [singleparty_loveability_fbC_iProspect]</td>
                            <td>1969436</td>

                            <td class="center"><a href="ad_mem_detail.php?mem_num=1969436" target="_blank">殷佩瑜</a>
                                <div style="float:right">

                                    <a href="ad_no_mem_s.php?mem_mobile=0909318231" target="_blank"> <span class="label label-info">查</span></a>


                                    <a href="javascript:mem_send('1969436')"><span class="label label-success">高雄市</span>
                                    </a>

                                </div>
                            </td>
                            <td class="center">男</td>

                            <td class="center">1998/0/0　23 歲</td>
                            <td class="center"></td>

                            <td class="center">
                                <font color=green>受理：</font>高雄 - 謝璧如
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:mem_send('1969436')"><i class="icon-arrow-right"></i> 發送</a></li>

                                        <li><a href="ad_mem_detail.php?mem_num=1969436" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1808375&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>
                                        <li><a href="javascript:Mars_popup('ad_invite_add.php?st=read&keyword=1969436','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=470,top=10,left=10');"><i class="icon-resize-full"></i> 約見</a></li>

                                        <li><a href="ad_mem_fix.php?mem_num=1969436" target="_blank"><i class="icon-file"></i> 修改</a></li>


                                        <li><a href="javascript:Mars_popup('send_mail_ksp.php?mem_auto=1808375&mem_mail=aa0938408676@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=520,top=10,left=10');"><i class="icon-envelope"></i> 開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp.php?mem_sex=男&mem_single=E221370746&mem_mail=aa0938408676@gmail.com&mem_num=1969436','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_print0.php?mem_auto=1808375&mem_sex=男','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 五人擇友信</a></li>
                                        <!--								<li><a href="javascript:Mars_popup('send_mail_action.php?mem_auto=1808375&mem_mail=aa0938408676@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 當月活動信</a></li>-->




                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr style="background-color:#f9f9f9">
                            <td colspan=2>

                                資料：2020-09-30 11:39&nbsp;&nbsp;發送：2021-09-28 15:59
                            </td>

                            <td colspan="8" style="BORDER-bottom: #666666 1px dotted;width:75%;word-break: normal;">
                                <a href="#r" onclick="Mars_popup('ad_report.php?k_id=1808375&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>-<font color=red>已發送</font>&nbsp;-&nbsp;高雄督導於2021/9/28 下午 03:59:24將本筆資料[未入會]自 高雄 - 高雄督導 轉送給 高雄-謝璧如
                                &nbsp;&nbsp;<font color=blue>舊：</font>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 10 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_no_mem_noreport.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_no_mem_noreport.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_no_mem_noreport.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_no_mem_noreport.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_no_mem_noreport.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_no_mem_noreport.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_no_mem_noreport.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_no_mem_noreport.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_no_mem_noreport.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_no_mem_noreport.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_no_mem_noreport.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_no_mem_noreport.php?topage=10 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_no_mem_noreport.php?topage=1" selected>1</option>
                            <option value="/ad_no_mem_noreport.php?topage=2">2</option>
                            <option value="/ad_no_mem_noreport.php?topage=3">3</option>
                            <option value="/ad_no_mem_noreport.php?topage=4">4</option>
                            <option value="/ad_no_mem_noreport.php?topage=5">5</option>
                            <option value="/ad_no_mem_noreport.php?topage=6">6</option>
                            <option value="/ad_no_mem_noreport.php?topage=7">7</option>
                            <option value="/ad_no_mem_noreport.php?topage=8">8</option>
                            <option value="/ad_no_mem_noreport.php?topage=9">9</option>
                            <option value="/ad_no_mem_noreport.php?topage=10">10</option>
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
require_once("./include/_bottom.php");
?>

<script language="JavaScript">
    function ch_single() {
        if ($("#single").length) {
            location.href = "ad_no_mem_noreport.php?branch=&single=" + $("#single").val();

        }
    }

    function reset_send_branch() {
        $("#send_branch_pay1").val("");
        $("#send_branch_pay2").val("");
        $("#send_branch_pay3").val("");
    }
    $(function() {

        //alert(ismsie());
        $("#send_branch_div_close").on("click", function() {
            reset_send_branch();
        });
        $("#send_branch_div_close1").on("click", function() {
            reset_send_branch();
        });
        $("#send_branch_div_send").on("click", function() {
            var $i1 = $("#send_branch_pay1"),
                $i2 = $("#send_branch_pay2"),
                $i3 = $("#send_branch_pay3"),
                $send_div = $("#send_branch_div");
            if (!$i1.val() || !$i2.val()) {
                alert("請選擇要發送的會館和秘書。");
                return false;
            }
            m = $i3.val();
            if (!m) {
                alert("發送編號讀取錯誤。");
                return false;
            }
            $("#send_branch_div").modal("hide");
            myApp.showPleaseWait();
            $s1 = m;
            $.ajax({
                url: "ad_no_mem.php",
                data: {
                    st: "send_branch",
                    mem_num: $s1,
                    i1: $i1.val(),
                    i2: $i2.val()
                },
                type: "POST",
                dataType: "text",
                success: function(msg) {
                    if (m.indexOf(",") > 0) {

                        $.each(m.split(","), function(i, val) {
                            $("#showtr_" + val).remove();
                        });

                    } else {

                        $("#showtr_" + m).remove();

                    }

                    myApp.hidePleaseWait();
                    reset_send_branch();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        });

        $("input[name='nums']").prop("checked", false);
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
        else mem_send($allnum);
    }

    function mutil_del() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要刪除的資料。");
        else mem_del($allnum);
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
        location.href = "ad_no_mem.php?sear=1&vst=&s99=&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }

    function mem_del(m) {
        if (window.confirm("是否確定刪除？")) {
            myApp.showPleaseWait();
            if ($.isArray(m)) {
                $s1 = m.join(",");
                $s2 = $.each(m, function(i, val) {
                    $("#showtr_" + val).remove();
                });
            } else {
                $s1 = m;
                $s2 = $("#showtr_" + m).remove();
            }

            $.ajax({
                url: "ad_del.php",
                data: {
                    t: "n",
                    mem_num: $s1
                },
                type: "POST",
                dataType: "text",
                success: function(msg) {
                    $s2;
                    myApp.hidePleaseWait();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        } else alert("請重新選擇。");
    }

    function mem_send(m) {
        $("#send_branch_div").modal("show");
        $("#send_branch_pay1").on("change", function() {
            personnel_get_send("send_branch_pay1", "send_branch_pay2");
        });
        $("#send_branch_pay3").val(m);
    }

    function check_fav(n) {
        if (window.confirm("是否要設定預約聯絡時間？")) {
            Mars_popup('ad_send_log6.php?ty=m&n=' + n, '', 'scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=500,height=500,top=100,left=200');
        } else {
            Mars_popup('ad_no_mem.php?st=addfav&n=' + n, '', 'scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=200,top=10,left=10');
        }
    }

    function remove_fav(n, m) {
        $.ajax({
            url: "ad_no_mem.php",
            data: {
                st: "refav",
                n: n
            },
            type: "POST",
            dataType: "text",
            success: function(msg) {
                $(".fav_tag_" + m).remove();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    }
</script>