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
            <li class="active">活動明細表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->


        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>活動明細表 - 數量：33　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <input type="text" name="qkword" id="qkword" class="form-control2"> <input type="button" id="member_query_button" class="btn btn-danger" value="查詢會員">
                    <form action="ad_mem_action_re_list.php?vst=full" method="post" name="form1">
                        <p><span>
                                <div class="btn-group pull-left margin-right-10">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_action_re.php"><i class="fa fa-edit"></i> 新增活動明細</a></li>
                                        <li><a href="ad_mem_action_re_list.php"><i class="fa fa-th-large"></i> 活動明細表</a></li>
                                        <li><a href="ad_mem_action_re_day.php"><i class="fa fa-th-list"></i> 每日活動記錄</a></li>
                                        <li><a href="ad_mem_action_re_ac1.php"><i class="fa fa-th-list"></i> 單一活動記錄</a></li>
                                        <li><a href="ad_mem_action_re_list_turn.php"><i class="fa fa-share"></i> 待轉資料查詢</a></li>
                                        <li><a href="ad_mem_action_re_list_turn2.php"><i class="fa fa-arrow-circle-right"></i> 退費資料查詢</a></li>

                                    </ul>
                                </div>　
                            </span>
                            回報日期：
                            <input type="text" name="t1" id="t1" class="datepicker" autocomplete="off" placeholder="時間區間" value=""> ~ <input type="text" name="t2" id="t2" class="datepicker" autocomplete="off" placeholder="時間區間" value="">
                        </p>
                        <p>
                            會館：
                            <select name="s6" id="s6" style="width:100px;">
                                <option value="">請選擇</option>
                                <option value="台北">台北</option>
                                <option value="桃園">桃園</option>
                                <option value="新竹">新竹</option>
                                <option value="台中">台中</option>
                                <option value="台南">台南</option>
                                <option value="高雄">高雄</option>
                                <option value="八德">八德</option>
                                <option value="約專">約專</option>
                                <option value="迷你約">迷你約</option>
                                <option value="總管理處">總管理處</option>
                                <option value="好好玩旅行社">好好玩旅行社</option>
                            </select>
                            秘書：
                            <select name="s7" id="s7" style="width:100px;">
                                <option value="">請選擇</option>
                            </select>
                            <input type="submit" value="送出" class="btn btn-default">
                        </p>
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>報名日期</th>
                            <th>活動日期和地區/活動名稱</th>
                            <th>參加人員</th>
                            <th>收費金額</th>
                            <th width="150">活動備註</th>
                            <th>處理會館</th>
                            <th>處理秘書</th>
                            <th>狀態</th>
                            <th width="100">　</th>
                        </tr>

                        <tr>
                            <td align="center">2020/11/13 下午 04:04:00</td>
                            <td align="center">2020/11/15 下午 02:00:00(好好玩旅行社)5565百萬靠譜優質男專屬<br>

                            </td>

                            <td align="center">楊富瑄(C220541374)<br>(1971/1/27 , 0927290818)</td>
                            <td align="center">（現金）<font color="#FF0000" size="3">699</td>
                            <td align="center">11/15 #7766*</td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=77154','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/11/13 上午 09:43:00</td>
                            <td align="center">2020/11/15 下午 02:00:00(好好玩旅行社)5565百萬靠譜優質男專屬<br>

                            </td>

                            <td align="center"></td>
                            <td align="center">（現金）<font color="#FF0000" size="3">699</td>
                            <td align="center">11/15 #5473*</td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=77107','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/11/13 上午 09:43:00</td>
                            <td align="center">2020/11/15 下午 02:00:00(好好玩旅行社)5565百萬靠譜優質男專屬<br>

                            </td>

                            <td align="center">郭乃瑜(Y220042668)<br>(1972/3/13 , 0937182269)</td>
                            <td align="center">（現金）<font color="#FF0000" size="3">699</td>
                            <td align="center">11/15 #6229*</td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=77106','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/11/13 上午 09:41:00</td>
                            <td align="center">2020/11/15 下午 02:00:00(好好玩旅行社)5565百萬靠譜優質男專屬<br>

                            </td>

                            <td align="center">謝寶文(F122087945)<br>(1967/9/28 , 0975923318)</td>
                            <td align="center">（現金）<font color="#FF0000" size="3">690</td>
                            <td align="center">11/15 #0708*</td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=77105','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/11/13 上午 09:41:00</td>
                            <td align="center">2020/11/15 下午 02:00:00(好好玩旅行社)5565百萬靠譜優質男專屬<br>

                            </td>

                            <td align="center">董建華(F120787184)<br>(1966/2/24 , 0975068076)</td>
                            <td align="center">（現金）<font color="#FF0000" size="3">690</td>
                            <td align="center">11/15 現場付費</td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=77104','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/11/13 上午 09:40:00</td>
                            <td align="center">2020/11/15 下午 02:00:00(好好玩旅行社)5565百萬靠譜優質男專屬<br>

                            </td>

                            <td align="center">高明煌(Y120063656)<br>(1967/8/14 , 0935935728)</td>
                            <td align="center">（現金）<font color="#FF0000" size="3">690</td>
                            <td align="center">11/15 #1317*</td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=77103','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/10/27 下午 01:50:00</td>
                            <td align="center">2020/10/28 下午 07:00:00(好好玩旅行社)六年級百萬靠譜優質男專屬<br>

                            </td>

                            <td align="center">林宏銘(G120159172)<br>(1973/8/24 , 0920311889)</td>
                            <td align="center">（現金）<font color="#FF0000" size="3">999</td>
                            <td align="center">10/28 現場付費</td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=76643','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/10/27 下午 01:49:00</td>
                            <td align="center">2020/10/28 下午 07:00:00(好好玩旅行社)六年級百萬靠譜優質男專屬<br>

                            </td>

                            <td align="center">許雅芳(A228390260)<br>(1980/12/29 , 0953036487)</td>
                            <td align="center">（現金）<font color="#FF0000" size="3">399</td>
                            <td align="center">10/28 #0817*</td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=76642','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/10/27 下午 01:49:00</td>
                            <td align="center">2020/10/28 下午 07:00:00(好好玩旅行社)六年級百萬靠譜優質男專屬<br>

                            </td>

                            <td align="center">林佳穎(A225634274)<br>(1984/11/14 , 0912582155)</td>
                            <td align="center">（現金）<font color="#FF0000" size="3">399</td>
                            <td align="center">10/28 #1975*</td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=76641','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/10/27 下午 01:48:00</td>
                            <td align="center">2020/10/28 下午 07:00:00(好好玩旅行社)六年級百萬靠譜優質男專屬<br>

                            </td>

                            <td align="center">楊雅婷(S222389259)<br>(1978/11/4 , 0910811942)</td>
                            <td align="center">（現金）<font color="#FF0000" size="3">399</td>
                            <td align="center">10/28 #5309*</td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=76640','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/10/27 下午 01:46:00</td>
                            <td align="center">2020/10/28 下午 07:00:00(好好玩旅行社)六年級百萬靠譜優質男專屬<br>

                            </td>

                            <td align="center"></td>
                            <td align="center">（現金）<font color="#FF0000" size="3">999</td>
                            <td align="center">10/28 #4439*</td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=76639','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/10/27 下午 01:45:00</td>
                            <td align="center">2020/10/28 下午 07:00:00(好好玩旅行社)六年級百萬靠譜優質男專屬<br>

                            </td>

                            <td align="center">陳威村(Q121362027)<br>(1973/12/5 , 0920813505)</td>
                            <td align="center">（現金）<font color="#FF0000" size="3">999</td>
                            <td align="center">10/28 #9032*</td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=76638','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/10/8 下午 05:00:00</td>
                            <td align="center">2020/10/7 下午 07:00:00(好好玩旅行社)輕熟齡聯誼 專屬質感約會<br>

                            </td>

                            <td align="center">連日銘(F125865101)<br>(1983/9/13 , 0910370008)</td>
                            <td align="center">（匯款）<font color="#FF0000" size="3">300</td>
                            <td align="center">10/07 #6016*</td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=76208','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/10/8 下午 04:58:00</td>
                            <td align="center">2020/10/7 下午 07:00:00(好好玩旅行社)輕熟齡聯誼 專屬質感約會<br>

                            </td>

                            <td align="center"></td>
                            <td align="center">（匯款）<font color="#FF0000" size="3">999</td>
                            <td align="center">非會員-蕭賢泰 10/07 #1834*</td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=76207','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/10/8 下午 04:56:00</td>
                            <td align="center">2020/10/7 下午 07:00:00(好好玩旅行社)輕熟齡聯誼 專屬質感約會<br>

                            </td>

                            <td align="center"></td>
                            <td align="center">（匯款）<font color="#FF0000" size="3">999</td>
                            <td align="center">非會員-陳怡平 10/07 #8294*</td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=76206','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/10/8 上午 09:27:00</td>
                            <td align="center">2020/10/7 下午 07:00:00(好好玩旅行社)輕熟齡聯誼 專屬質感約會<br>

                            </td>

                            <td align="center">楊琰琛(E122513654)<br>(1977/12/7 , 0926275129)</td>
                            <td align="center">（現金）<font color="#FF0000" size="3">300</td>
                            <td align="center"></td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=76198','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/9/28 上午 11:25:00</td>
                            <td align="center">2020/9/27 下午 02:00:00(總管理處)175UP挺拔歐爸專屬！精選3<br>

                            </td>

                            <td align="center">王馨誼(A228275473)<br>(1985/1/9 , 0936377508)</td>
                            <td align="center">（匯款）<font color="#FF0000" size="3">399</td>
                            <td align="center">09/27 #8824*</td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=75967','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/9/28 上午 11:22:00</td>
                            <td align="center">2020/9/27 下午 02:00:00(總管理處)175UP挺拔歐爸專屬！精選3<br>

                            </td>

                            <td align="center">林惠文(E222999496)<br>(1982/5/16 , 0988253652)</td>
                            <td align="center">（匯款）<font color="#FF0000" size="3">399</td>
                            <td align="center">09/27 #1702*</td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=75966','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/9/28 上午 11:20:00</td>
                            <td align="center">2020/9/27 下午 02:00:00(總管理處)175UP挺拔歐爸專屬！精選3<br>

                            </td>

                            <td align="center">蔡忻璇(A225794480)<br>(1987/1/17 , 0965073790)</td>
                            <td align="center">（匯款）<font color="#FF0000" size="3">399</td>
                            <td align="center">09/27 行動網</td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=75965','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">2020/9/28 上午 11:18:00</td>
                            <td align="center">2020/9/27 下午 02:00:00(總管理處)175UP挺拔歐爸專屬！精選3<br>

                            </td>

                            <td align="center">李昱昇(H123284664)<br>(1984/10/6 , 0919334055)</td>
                            <td align="center">（匯款）<font color="#FF0000" size="3">690</td>
                            <td align="center">09/27 #3720*</td>
                            <td align="center">總管理處</td>
                            <td align="center">張利 Liz</td>
                            <td align="center">
                                已報名
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup('ad_mem_action_re_print.php?acre_auto=75964','','width=700,height=520,top=100,left=100')"><i class="icon-print"></i> 列印收據</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 33 筆、第 1 頁／共 2 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_mem_action_re_list.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_mem_action_re_list.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_mem_action_re_list.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_mem_action_re_list.php?topage=2 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_mem_action_re_list.php?topage=1" selected>1</option>
                            <option value="/ad_mem_action_re_list.php?topage=2">2</option>
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
    $(function() {
        $("#s6").on("change", function() {
            personnel_get("s6", "s7");
        });
        $("#member_query_button").on("click", function() {
            if (!$("#qkword").val()) {
                alert("請輸入要查詢的會員相關資料，如姓名、電話等。");
                $("#qkword").focus();
                return false;
            }
            Mars_popup('ad_mem_love_re_list.php?st=query_member&qkword=' + $("#qkword").val(), '', 'width=500,height=250,top=250,left=250');
        });
    });
</script>