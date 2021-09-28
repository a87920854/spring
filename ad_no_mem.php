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
            <li class="active">未入會資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>未入會資料 未處理 - 數量：5　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <div class="pull-left">
                        <a href="ad_register_no.php" class="btn btn-info">新增未入會資料</a>&nbsp;&nbsp;
                        <div class="btn-group">
                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                            <ul class="dropdown-menu">

                                <li><a href="javascript:mutil_send();"><i class="icon-tag"></i> 多選發送</a></li>
                                <li><a href="javascript:mutil_del();"><i class="icon-remove-sign"></i> 多選刪除</a></li>
                                <li><a href="javascript:mutil_black();"><i class="icon-tag"></i> 多選黑名單</a></li>

                                <li><a href="javascript:mutil_del2();"><i class="icon-remove-sign"></i> 多選強刪</a></li>

                                <li><a href="?s99=1" target="_self"><i class="icon-resize-horizontal"></i> 切換已處理</a></li>

                                <li><a href="ad_register_no.php"><i class="icon-star"></i> 新增未入會資料</a></li>
                                <li><a href="ad_no_mem_f.php"><i class="icon-tag"></i> 進階搜尋</a></li>
                            </ul>
                        </div>　
                    </div>

                    <form id="searchform" action="ad_no_mem.php?vst=full&sear=1" method="post" target="_self" class="form-inline pull-left" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type" class="form-control">
                            <option value="s2">手機</option>
                            <option value="s17">電話</option>
                            <option value="s3">姓名</option>
                            <option value="s4">編號</option>
                            <option value="s5">約會專家帳號</option>
                            <option value="s6">身分證字號</option>
                            <option value="s22">電子信箱</option>


                            <option value="s18">DMN編號</option>

                            <option value="s23">IP</option>

                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text" value="">
                        <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                    </form>
                </div>
                </p>

                <p style="clear:both">
                <div class="inline-block">

                    <a class="btn btn-success" href="ad_no_mem.php?sear=1">所有未入會</a> <a class="btn btn-success" href="?s15=1&sear=1">資料認證</a> <a class="btn btn-success" href="ad_mem.php?s13=2">真人認證</a> <a class="btn btn-success" href="ad_mem.php?s13=3">璀璨會員</a> <a class="btn btn-success" href="ad_mem.php?s13=4">璀璨VIP會員</a>

                    <a class="btn btn-success" href="ad_mem.php?branch2=1">跨區會員</a>

                    <!--  <a class="btn btn-success" href="?sear=1&enterprise=1">企業會員</a>-->
                    <a class="btn btn-danger" href="ad_mem_reservation.php">預約總表</a>
                    <a class="btn btn-danger" href="ad_mem_reservation_v.php?t1=2021/9/28&t2=2021/9/28">本日預約</a>
                    <a class="btn btn-primary" href="ad_no_mem.php?st=fav&sear=1">關注名單</a>
                </div>
                <div class="inline-block btn-group">
                    <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown">舊資 <span class="caret"></span></button>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="ad_no_mem.php?old=1">2021-03 專案-男生</a></li>
                        <li><a href="ad_no_mem.php?old=2">2021-03 專案-女生</a></li>
                        <li><a href="ad_no_mem.php?old=3">2021-05 專案-2018 年前</a></li>
                    </ul>
                </div>

                <select class="form-control2 pull-right" onchange="location.href='ad_no_mem.php'+$(this).val()+''" autocomplete="off">
                    <option value="?orderby=0">預設排序</option>
                    <option value="?orderby=1">資料時間近到遠</option>
                    <option value="?orderby=2">資料時間遠到近</option>
                    <option value="?orderby=3">督導發送近到遠</option>
                    <option value="?orderby=4">督導發送遠到近</option>
                    <option value="?orderby=5">回報時間近到遠</option>
                    <option value="?orderby=6">回報時間遠到近</option>
                </select>
                </p>

                <p style="clear:both">

                    <a class="btn btn-info" href="?c=0"><i class="fa fa-arrow-right" style="margin-top:3px;"></i>春天會館 (5)</a>&nbsp;
                    <a class="btn btn-info" href="?c=2">行銷春天 (10)</a>&nbsp;
                    <a class="btn btn-info" href="?c=1">DateMeNow (1)</a>&nbsp;
                    <a class="btn btn-info" href="?c=5">行銷DMN (15)</a>&nbsp;
                    <a class="btn btn-info" href="?c=4">約會專家 (5)</a>&nbsp;
                    <a class="btn btn-info" href="?c=6">行銷約專 (11)</a>&nbsp;
                    <a class="btn btn-info" href="?c=10">MiniDate (0)</a>&nbsp;
                    <a class="btn btn-info" href="?c=11">行銷MD (0)</a>&nbsp;
                    <a class="btn btn-info" href="?c=9">好好玩活動 (0)</a>&nbsp;
                    <a class="btn btn-pink" href="?c=7">體驗 (0)</a>&nbsp;
                    <a class="btn btn-pink" href="?c=8">所有</a>&nbsp;


                    <a class="btn btn-info" href="?c=3">其他 (0)</a>&nbsp;

                    <a class="btn btn-warning" href="ad_single_atwork.php">秘書上班表</a>&nbsp;
                    <a class="btn btn-black" href="ad_no_mem.php?st=checkdellist&sear=1">資源回收區 (7922)</a>&nbsp;

                </p>


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

                        <tr id="showtr_2082603" style="background-color:#f2f2f2">
                            <td style="background-color:#7868f5" class="nums_td"><input data-no-uniform="true" type="checkbox" name="nums" value="2082603" data-phone="0907961046"></td>
                            <td class="center">
                                春天網站-網站註冊-<font color=purple>春天會館</font><a href="ad_no_mem.php?sear=1&vst=full&s97_2=Springclub_Google_allproducts_Explore"> [Springclub_Google_allproducts_Explore]</a>

                            </td>
                            <td>2082603</td>

                            <td class="center"><a href="ad_mem_detail.php?mem_num=2082603" target="_blank">陳永華</a>
                                <div style="float:right"> <span class="label label-warning"><a href="#" style="color:white;">重</a></span>

                                    <a href="ad_no_mem_s.php?mem_mobile=0907961046" target="_blank"> <span class="label label-info">查</span></a>


                                    <a href="javascript:mem_send('2082603')"><span class="label label-success">苗栗縣</span>
                                    </a>

                                    <a href="#report" onclick="Mars_popup('ad_report.php?k_id=1984634&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><span class="label label-pp">回報(0)</span></a>

                                </div>
                            </td>
                            <td class="center">男</td>

                            <td class="center">0/0/0</td>
                            <td class="center"></td>

                            <td class="center"></td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:mem_send('2082603')"><i class="icon-arrow-right"></i> 發送</a></li>

                                        <li><a href="ad_mem_detail.php?mem_num=2082603" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_mem_card_print.php?mem_num=2082603" target="_blank"><i class="icon-file"></i> 貴賓諮詢卡</a></li>

                                        <li><a href="ad_mem_fix.php?mem_num=2082603" target="_blank"><i class="icon-file"></i> 修改</a></li>


                                        <li><a href="#fav" onclick="check_fav('2082603')"><i class="icon-star"></i> 加入關注</a></li>


                                        <li><a href="ad_register2.php?mem_num=2082603" target="_blank"><i class="icon-camera"></i> 照片</a></li>


                                        <li><a href="javascript:Mars_popup('send_mail_ksp.php?mem_auto=1984634&mem_mail=jghyt0210@gmail.com','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=520,top=10,left=10');"><i class="icon-envelope"></i> 春天開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp.php?mem_sex=男&mem_single=&mem_mail=jghyt0210@gmail.com&mem_num=2082603','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 春天速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_print0.php?mem_auto=1984634&mem_sex=男','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 五人擇友信</a></li>
                                        <!--<li><a href="javascript:Mars_popup('send_mail_action.php?mem_auto=1984634&mem_mail=jghyt0210@gmail.com','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 當月活動信</a></li>-->


                                        <li><a href="#j" onclick="Mars_popup('block_list.php?phone=0907961046','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=205,top=200,left=200');"><i class="icon-envelope"></i> 加入黑名單</a></li>

                                        <li><a href="javascript:Mars_popup('send_mail_ksp_dmn.php?mem_auto=1984634&mem_mail=jghyt0210@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=900,height=700,top=10,left=10');"><i class="icon-envelope"></i> DMN開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_dmn.php?mem_sex=男&mem_single=&mem_mail=jghyt0210@gmail.com&mem_num=2082603','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> DMN速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_ksp_sp.php?mem_auto=1984634&mem_mail=jghyt0210@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_sp.php?mem_sex=男&mem_single=&mem_mail=jghyt0210@gmail.com&mem_num=2082603','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專速配信</a></li>
                                        <li><a href="javascript:mem_del('2082603');"><i class="icon-trash"></i> 刪除</a></li>
                                        <li><a href="javascript:mem_del2('2082603');"><i class="icon-trash"></i> 強制刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr id="showtr_2082580" style="background-color:#ffffff">
                            <td style="background-color:#78f568" class="nums_td"><input data-no-uniform="true" type="checkbox" name="nums" value="2082580" data-phone="0909750066"></td>
                            <td class="center">
                                春天網站-網站註冊-<font color=purple>春天會館</font><a href="ad_no_mem.php?sear=1&vst=full&s97_2=sale-744"> [推廣：新竹-楊淑梅]</a>

                            </td>
                            <td>2082580</td>

                            <td class="center"><a href="ad_mem_detail.php?mem_num=2082580" target="_blank">陳正旺</a>
                                <div style="float:right"> <span class="label label-warning"><a href="#" style="color:white;">重</a></span>

                                    <a href="ad_no_mem_s.php?mem_mobile=0909750066" target="_blank"> <span class="label label-info">查</span></a>


                                    <a href="javascript:mem_send('2082580')"><span class="label label-success">雲林縣</span>
                                    </a>

                                    <a href="#report" onclick="Mars_popup('ad_report.php?k_id=1984611&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><span class="label label-pp">回報(4)</span></a>

                                </div>
                            </td>
                            <td class="center">男</td>

                            <td class="center">1990/4/28　31 歲</td>
                            <td class="center">高中</td>

                            <td class="center"><br>
                                <font color=green>推薦：</font>台中 - 台中督導
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:mem_send('2082580')"><i class="icon-arrow-right"></i> 發送</a></li>

                                        <li><a href="ad_mem_detail.php?mem_num=2082580" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_mem_card_print.php?mem_num=2082580" target="_blank"><i class="icon-file"></i> 貴賓諮詢卡</a></li>

                                        <li><a href="ad_mem_fix.php?mem_num=2082580" target="_blank"><i class="icon-file"></i> 修改</a></li>


                                        <li><a href="#fav" onclick="check_fav('2082580')"><i class="icon-star"></i> 加入關注</a></li>


                                        <li><a href="ad_register2.php?mem_num=2082580" target="_blank"><i class="icon-camera"></i> 照片</a></li>


                                        <li><a href="javascript:Mars_popup('send_mail_ksp.php?mem_auto=1984611&mem_mail=zxc0909750066@mail.com','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=520,top=10,left=10');"><i class="icon-envelope"></i> 春天開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp.php?mem_sex=男&mem_single=&mem_mail=zxc0909750066@mail.com&mem_num=2082580','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 春天速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_print0.php?mem_auto=1984611&mem_sex=男','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 五人擇友信</a></li>
                                        <!--<li><a href="javascript:Mars_popup('send_mail_action.php?mem_auto=1984611&mem_mail=zxc0909750066@mail.com','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 當月活動信</a></li>-->


                                        <li><a href="#j" onclick="Mars_popup('block_list.php?phone=0909750066','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=205,top=200,left=200');"><i class="icon-envelope"></i> 加入黑名單</a></li>

                                        <li><a href="javascript:Mars_popup('send_mail_ksp_dmn.php?mem_auto=1984611&mem_mail=zxc0909750066@mail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=900,height=700,top=10,left=10');"><i class="icon-envelope"></i> DMN開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_dmn.php?mem_sex=男&mem_single=&mem_mail=zxc0909750066@mail.com&mem_num=2082580','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> DMN速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_ksp_sp.php?mem_auto=1984611&mem_mail=zxc0909750066@mail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_sp.php?mem_sex=男&mem_single=&mem_mail=zxc0909750066@mail.com&mem_num=2082580','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專速配信</a></li>
                                        <li><a href="javascript:mem_del('2082580');"><i class="icon-trash"></i> 刪除</a></li>
                                        <li><a href="javascript:mem_del2('2082580');"><i class="icon-trash"></i> 強制刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr id="showtr_2082576" style="background-color:#f2f2f2">
                            <td style="background-color:#f6db44" class="nums_td"><input data-no-uniform="true" type="checkbox" name="nums" value="2082576" data-phone="0917257020"></td>
                            <td class="center">
                                春天網站-手機APP-首頁-<font color=purple>春天會館</font>

                            </td>
                            <td>2082576</td>

                            <td class="center"><a href="ad_mem_detail.php?mem_num=2082576" target="_blank">陳怡帆</a>
                                <div style="float:right"> <span class="label label-warning"><a href="#" style="color:white;">重</a></span>

                                    <a href="ad_no_mem_s.php?mem_mobile=0917257020" target="_blank"> <span class="label label-info">查</span></a>


                                    <a href="javascript:mem_send('2082576')"><span class="label label-success">新北市</span>
                                    </a>

                                    <a href="#report" onclick="Mars_popup('ad_report.php?k_id=1984607&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><span class="label label-pp">回報(1)</span></a>

                                </div>
                            </td>
                            <td class="center">女</td>

                            <td class="center">1985/6/8　36 歲</td>
                            <td class="center">大學</td>

                            <td class="center"></td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:mem_send('2082576')"><i class="icon-arrow-right"></i> 發送</a></li>

                                        <li><a href="ad_mem_detail.php?mem_num=2082576" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_mem_card_print.php?mem_num=2082576" target="_blank"><i class="icon-file"></i> 貴賓諮詢卡</a></li>

                                        <li><a href="ad_mem_fix.php?mem_num=2082576" target="_blank"><i class="icon-file"></i> 修改</a></li>


                                        <li><a href="#fav" onclick="check_fav('2082576')"><i class="icon-star"></i> 加入關注</a></li>


                                        <li><a href="ad_register2.php?mem_num=2082576" target="_blank"><i class="icon-camera"></i> 照片</a></li>


                                        <li><a href="javascript:Mars_popup('send_mail_ksp.php?mem_auto=1984607&mem_mail=gaigai520@yahoo.com.tw','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=520,top=10,left=10');"><i class="icon-envelope"></i> 春天開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp.php?mem_sex=女&mem_single=&mem_mail=gaigai520@yahoo.com.tw&mem_num=2082576','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 春天速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_print0.php?mem_auto=1984607&mem_sex=女','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 五人擇友信</a></li>
                                        <!--<li><a href="javascript:Mars_popup('send_mail_action.php?mem_auto=1984607&mem_mail=gaigai520@yahoo.com.tw','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 當月活動信</a></li>-->


                                        <li><a href="#j" onclick="Mars_popup('block_list.php?phone=0917257020','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=205,top=200,left=200');"><i class="icon-envelope"></i> 加入黑名單</a></li>

                                        <li><a href="javascript:Mars_popup('send_mail_ksp_dmn.php?mem_auto=1984607&mem_mail=gaigai520@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=900,height=700,top=10,left=10');"><i class="icon-envelope"></i> DMN開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_dmn.php?mem_sex=女&mem_single=&mem_mail=gaigai520@yahoo.com.tw&mem_num=2082576','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> DMN速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_ksp_sp.php?mem_auto=1984607&mem_mail=gaigai520@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_sp.php?mem_sex=女&mem_single=&mem_mail=gaigai520@yahoo.com.tw&mem_num=2082576','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專速配信</a></li>
                                        <li><a href="javascript:mem_del('2082576');"><i class="icon-trash"></i> 刪除</a></li>
                                        <li><a href="javascript:mem_del2('2082576');"><i class="icon-trash"></i> 強制刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr id="showtr_2082571" style="background-color:#ffffff">
                            <td style="background-color:#ea6d9a" class="nums_td"><input data-no-uniform="true" type="checkbox" name="nums" value="2082571" data-phone="0983868022"></td>
                            <td class="center">
                                春天網站-春網首頁-<font color=purple>春天會館</font><a href="ad_no_mem.php?sear=1&vst=full&s97_2=Yahoo_cpc_Asiapac"> [Yahoo_cpc_Asiapac]</a>

                            </td>
                            <td>2082571</td>

                            <td class="center"><a href="ad_mem_detail.php?mem_num=2082571" target="_blank">王詠柔</a>
                                <div style="float:right"> <span class="label label-warning"><a href="#" style="color:white;">重</a></span>

                                    <a href="ad_no_mem_s.php?mem_mobile=0983868022" target="_blank"> <span class="label label-info">查</span></a>


                                    <a href="javascript:mem_send('2082571')"><span class="label label-success">彰化縣</span>
                                    </a>

                                    <a href="#report" onclick="Mars_popup('ad_report.php?k_id=1984602&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><span class="label label-pp">回報(2)</span></a>

                                </div>
                            </td>
                            <td class="center">男</td>

                            <td class="center">1983/5/24　38 歲</td>
                            <td class="center">高職</td>

                            <td class="center"></td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:mem_send('2082571')"><i class="icon-arrow-right"></i> 發送</a></li>

                                        <li><a href="ad_mem_detail.php?mem_num=2082571" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_mem_card_print.php?mem_num=2082571" target="_blank"><i class="icon-file"></i> 貴賓諮詢卡</a></li>

                                        <li><a href="ad_mem_fix.php?mem_num=2082571" target="_blank"><i class="icon-file"></i> 修改</a></li>


                                        <li><a href="#fav" onclick="check_fav('2082571')"><i class="icon-star"></i> 加入關注</a></li>


                                        <li><a href="ad_register2.php?mem_num=2082571" target="_blank"><i class="icon-camera"></i> 照片</a></li>


                                        <li><a href="javascript:Mars_popup('send_mail_ksp.php?mem_auto=1984602&mem_mail=qoo05242477@yahoo.com.tw','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=520,top=10,left=10');"><i class="icon-envelope"></i> 春天開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp.php?mem_sex=男&mem_single=&mem_mail=qoo05242477@yahoo.com.tw&mem_num=2082571','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 春天速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_print0.php?mem_auto=1984602&mem_sex=男','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 五人擇友信</a></li>
                                        <!--<li><a href="javascript:Mars_popup('send_mail_action.php?mem_auto=1984602&mem_mail=qoo05242477@yahoo.com.tw','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 當月活動信</a></li>-->


                                        <li><a href="#j" onclick="Mars_popup('block_list.php?phone=0983868022','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=205,top=200,left=200');"><i class="icon-envelope"></i> 加入黑名單</a></li>

                                        <li><a href="javascript:Mars_popup('send_mail_ksp_dmn.php?mem_auto=1984602&mem_mail=qoo05242477@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=900,height=700,top=10,left=10');"><i class="icon-envelope"></i> DMN開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_dmn.php?mem_sex=男&mem_single=&mem_mail=qoo05242477@yahoo.com.tw&mem_num=2082571','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> DMN速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_ksp_sp.php?mem_auto=1984602&mem_mail=qoo05242477@yahoo.com.tw','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_sp.php?mem_sex=男&mem_single=&mem_mail=qoo05242477@yahoo.com.tw&mem_num=2082571','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專速配信</a></li>
                                        <li><a href="javascript:mem_del('2082571');"><i class="icon-trash"></i> 刪除</a></li>
                                        <li><a href="javascript:mem_del2('2082571');"><i class="icon-trash"></i> 強制刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr id="showtr_2082560" style="background-color:#f2f2f2">
                            <td style="background-color:#7868f5" class="nums_td"><input data-no-uniform="true" type="checkbox" name="nums" value="2082560" data-phone="0988205213"></td>
                            <td class="center">
                                春天網站-網站註冊-<font color=purple>春天會館</font><a href="ad_no_mem.php?sear=1&vst=full&s97_2=sale-997"> [推廣：新竹-妍瑀]</a>

                            </td>
                            <td>2082560</td>

                            <td class="center"><a href="ad_mem_detail.php?mem_num=2082560" target="_blank">陳歆</a>
                                <div style="float:right"> <span class="label label-warning"><a href="#" style="color:white;">重</a></span>

                                    <a href="ad_no_mem_s.php?mem_mobile=0988205213" target="_blank"> <span class="label label-info">查</span></a>


                                    <a href="javascript:mem_send('2082560')"><span class="label label-success">台北市</span>
                                    </a>

                                    <a href="#report" onclick="Mars_popup('ad_report.php?k_id=1984591&lu=&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><span class="label label-pp">回報(0)</span></a>

                                </div>
                            </td>
                            <td class="center">女</td>

                            <td class="center">0/0/0</td>
                            <td class="center"></td>

                            <td class="center"></td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:mem_send('2082560')"><i class="icon-arrow-right"></i> 發送</a></li>

                                        <li><a href="ad_mem_detail.php?mem_num=2082560" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="ad_mem_card_print.php?mem_num=2082560" target="_blank"><i class="icon-file"></i> 貴賓諮詢卡</a></li>

                                        <li><a href="ad_mem_fix.php?mem_num=2082560" target="_blank"><i class="icon-file"></i> 修改</a></li>


                                        <li><a href="#fav" onclick="check_fav('2082560')"><i class="icon-star"></i> 加入關注</a></li>


                                        <li><a href="ad_register2.php?mem_num=2082560" target="_blank"><i class="icon-camera"></i> 照片</a></li>


                                        <li><a href="javascript:Mars_popup('send_mail_ksp.php?mem_auto=1984591&mem_mail=melody205213@gmail.com','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=520,top=10,left=10');"><i class="icon-envelope"></i> 春天開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp.php?mem_sex=女&mem_single=&mem_mail=melody205213@gmail.com&mem_num=2082560','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 春天速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_print0.php?mem_auto=1984591&mem_sex=女','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 五人擇友信</a></li>
                                        <!--<li><a href="javascript:Mars_popup('send_mail_action.php?mem_auto=1984591&mem_mail=melody205213@gmail.com','_blank','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=200,top=200,left=200');"><i class="icon-envelope"></i> 當月活動信</a></li>-->


                                        <li><a href="#j" onclick="Mars_popup('block_list.php?phone=0988205213','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=205,top=200,left=200');"><i class="icon-envelope"></i> 加入黑名單</a></li>

                                        <li><a href="javascript:Mars_popup('send_mail_ksp_dmn.php?mem_auto=1984591&mem_mail=melody205213@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=900,height=700,top=10,left=10');"><i class="icon-envelope"></i> DMN開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_dmn.php?mem_sex=女&mem_single=&mem_mail=melody205213@gmail.com&mem_num=2082560','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> DMN速配信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_ksp_sp.php?mem_auto=1984591&mem_mail=melody205213@gmail.com','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專開發信</a></li>
                                        <li><a href="javascript:Mars_popup('send_mail_sp_sp.php?mem_sex=女&mem_single=&mem_mail=melody205213@gmail.com&mem_num=2082560','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=320,top=10,left=10');"><i class="icon-envelope"></i> 約專速配信</a></li>
                                        <li><a href="javascript:mem_del('2082560');"><i class="icon-trash"></i> 刪除</a></li>
                                        <li><a href="javascript:mem_del2('2082560');"><i class="icon-trash"></i> 強制刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 5 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_no_mem.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_no_mem.php?topage=1 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_no_mem.php?topage=1" selected>1</option>
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
    <!--
    function reset_send_branch() {
        $("#send_branch_pay1").val("");
        $("#send_branch_pay2").val("");
        $("#send_branch_pay3").val("");
    }
    $(function() {
        console.log(_getCookie("reservation_alert") + "-alert");
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
                $i4 = $("#changelog"),
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

            if ($i4.prop("checked")) $i4s = 1;
            else $i4s = 0;

            $("#send_branch_div").modal("hide");
            myApp.showPleaseWait();
            $s1 = m;
            $.ajax({
                url: "ad_no_mem.php",
                data: {
                    st: "send_branch",
                    mem_num: $s1,
                    i1: $i1.val(),
                    i2: $i2.val(),
                    changelog: $i4s
                },
                type: "POST",
                dataType: "text",
                success: function(msg) {
                    if (m.indexOf(",") > 0) {

                        $.each(m.split(","), function(i, val) {
                            $("#showtr_" + val).remove();
                            $("#showtr_" + val + "_2").remove();
                        });

                    } else {

                        $("#showtr_" + m + ",#showtr_" + m + "_2").remove();

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

        $(".nums_td").on("click", function(e) {
            if (e.target.tagName.toUpperCase() != "INPUT") {
                var $myc = $(this).find("input:checkbox");
                if ($myc.prop("checked")) $myc.prop("checked", false);
                else $myc.prop("checked", true);
            }
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

    function mutil_black() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).data("phone"));
        });
        if ($allnum.length <= 0) alert("請勾選要黑名單的會員。");
        else Mars_popup('block_list.php?allphone=' + $allnum + '', '', 'status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=380,height=205,top=200,left=200');
    }

    function mutil_del() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要刪除的資料。");
        else mem_del($allnum);
    }

    function mutil_del2() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要刪除的資料。");
        else mem_del_f($allnum);
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
        location.href = "ad_no_mem.php?sear=1&st=&vst=&s99=&" + $("#keyword_type").val() + "=" + $("#keyword").val() + "&keyk=" + $("#keyword_type").val() + "&keyv=" + $("#keyword").val();
        return false;
    }

    function mem_del(m) {
        if (window.confirm("是否確定刪除？")) {
            myApp.showPleaseWait();
            if ($.isArray(m)) {
                $s1 = m.join(",");
                $s2 = $.each(m, function(i, val) {
                    $("#showtr_" + val + ",#showtr_" + val + "_2").remove();
                });
            } else {
                $s1 = m;
                $s2 = $("#showtr_" + m + ",#showtr_" + m + "_2").remove();
            }

            $.ajax({
                url: "ad_del_mask.php",
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

    function mem_del_f(m) {
        if (window.confirm("是否確定刪除？")) {
            myApp.showPleaseWait();
            if ($.isArray(m)) {
                $s1 = m.join(",");
                $s2 = $.each(m, function(i, val) {
                    $("#showtr_" + val + ",#showtr_" + val + "_2").remove();
                });
            } else {
                $s1 = m;
                $s2 = $("#showtr_" + m + ",#showtr_" + m + "_2").remove();
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

    function mem_del2(m) {
        if (window.confirm("是否確定刪除？")) {
            myApp.showPleaseWait();
            if ($.isArray(m)) {
                $s1 = m.join(",");
                $s2 = $.each(m, function(i, val) {
                    $("#showtr_" + val + ",#showtr_" + val + "_2").remove();
                });
            } else {
                $s1 = m;
                $s2 = $("#showtr_" + m + ",#showtr_" + m + "_2").remove();
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
                    alert(xhr.responseText);
                    myApp.hidePleaseWait();
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
        $("#changelog").prop("checked", false);
    }

    function check_fav(n) {
        if (window.confirm("是否要設定預約聯絡時間？")) {
            Mars_popup('ad_send_log6.php?fav=1&n=' + n, '', 'scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=500,height=500,top=100,left=200');
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
    -->
</script>