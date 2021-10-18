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
            <li class="active">約會升級審核</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>約會升級審核 - 未處理 - 數量：500　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <p><a href="#" class="btn btn-success" disabled>未處理</a>&nbsp;<a href="ad_singleparty_waitdateing.php?t=1" class="btn btn-info">已處理</a></p>
                    <form name="form1" method="post" action="?vst=full" class="form-inline">
                        <p>排約日期：
                            <input type="text" class="datepicker" autocomplete="off" name="times1">
                            ～
                            <input type="text" class="datepicker" autocomplete="off" name="times2">
                        </p>
                        <p>

                            會館：
                            <select name="s6" id="s6">
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
                            </select>
                            秘書：
                            <select name="s7" id="s7">
                                <option value="">請選擇</option>
                            </select>

                            <input type="submit" value="送出" class="btn btn-default">
                        </p>
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width=80>類型</th>
                            <th width=120>發起人</th>
                            <th width=120>發起人會館</th>
                            <th width=120>被邀約人</th>
                            <th width=120>被邀約會館</th>
                            <th>詳細時間</th>
                            <th width="100">　</th>
                        </tr>

                        <tr>
                            <td align="center">會館約會</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2081921" target="_blank">洪碩駿</a><br>璀璨會員-一年期(2021/9/7~2022/9/7)</td>
                            <td align="center">台南 - 杜佳倩</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2020684" target="_blank">鄭聿珊</a><br>真人認證會員(2021/2/21~2021/5/21)</td>
                            <td align="center">台南 - 顏琇</td>
                            <td align="center">
                                洪碩駿於 2021-09-09 01:20 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49655','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        <tr>
                            <td align="center">LINE</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2059164" target="_blank">王聖逸</a><br>璀璨會員-一年期(2021/7/17~2022/7/17)</td>
                            <td align="center">台北 - 高語鍹</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1332140" target="_blank">劉炘慧</a><br>真人認證會員(2017/7/17~2018/1/17)</td>
                            <td align="center">台北 - 葉佳蓉</td>
                            <td align="center">
                                王聖逸於 2021-09-08 23:01 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49650','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        <tr>
                            <td align="center">LINE</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2059164" target="_blank">王聖逸</a><br>璀璨會員-一年期(2021/7/17~2022/7/17)</td>
                            <td align="center">台北 - 高語鍹</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1928835" target="_blank">曾允希</a><br>網站會員(~)</td>
                            <td align="center">台南 - 杜佳倩</td>
                            <td align="center">
                                王聖逸於 2021-09-08 22:59 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49649','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        <tr>
                            <td align="center">LINE</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2059164" target="_blank">王聖逸</a><br>璀璨會員-一年期(2021/7/17~2022/7/17)</td>
                            <td align="center">台北 - 高語鍹</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2047506" target="_blank">李文甯</a><br>網站會員(~)</td>
                            <td align="center">八德 - 周靖雯 Bella</td>
                            <td align="center">
                                王聖逸於 2021-09-08 22:57 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49648','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        <tr>
                            <td align="center">LINE</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1980943" target="_blank">鄭旭森</a><br>璀璨會員-一年期(2020/11/4~2021/11/4)</td>
                            <td align="center">台南 - 金雪娟</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1361608" target="_blank">黃凱琳</a><br>真人認證會員(2017/10/9~2018/4/9)</td>
                            <td align="center">台南 - 錢淑華</td>
                            <td align="center">
                                鄭旭森於 2021-09-08 09:00 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49632','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        <tr>
                            <td align="center">LINE</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1980943" target="_blank">鄭旭森</a><br>璀璨會員-一年期(2020/11/4~2021/11/4)</td>
                            <td align="center">台南 - 金雪娟</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2070215" target="_blank">王薇雁</a><br>網站會員(2021/7/23~)</td>
                            <td align="center">台南 - 陳秀英</td>
                            <td align="center">
                                鄭旭森於 2021-09-08 09:00 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49631','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        <tr>
                            <td align="center">LINE</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1989297" target="_blank">黃崐陽</a><br>璀璨VIP會員-二年期(2020/12/6~2022/12/6)</td>
                            <td align="center">高雄 - 沈海妮</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2030739" target="_blank">黃煒玲</a><br>真人認證會員(2021/4/20~2021/7/20)</td>
                            <td align="center">台南 - 陳秀英</td>
                            <td align="center">
                                黃崐陽於 2021-09-07 23:20 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49628','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        <tr>
                            <td align="center">LINE</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2076752" target="_blank">朱家榮</a><br>璀璨會員-一年期(2021/8/28~2021/11/28)</td>
                            <td align="center">八德 - 蔡佩蓁 Sunny</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1955475" target="_blank">張逸寧</a><br>真人認證會員(2020/9/9~2020/12/9)</td>
                            <td align="center">台北 - 詹明錡</td>
                            <td align="center">
                                朱家榮於 2021-09-07 21:53 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49623','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        <tr>
                            <td align="center">LINE</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2068276" target="_blank">王志華</a><br>璀璨VIP會員-二年期(2021/7/15~2023/7/15)</td>
                            <td align="center">高雄 - 沈海妮</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1579468" target="_blank">蔡沅樺</a><br>真人認證會員(2020/8/4~2020/11/4)</td>
                            <td align="center">台南 - 杜佳倩</td>
                            <td align="center">
                                王志華於 2021-09-07 11:03 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49613','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        <tr>
                            <td align="center">LINE</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1944237" target="_blank">徐名成</a><br>璀璨會員-一年期(2021/7/11~2022/7/11)</td>
                            <td align="center">台北 - 詹明錡</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1028179" target="_blank">王麗惠</a><br>真人認證會員(2016/4/17~2016/10/17)</td>
                            <td align="center">台北 - 高語鍹</td>
                            <td align="center">
                                徐名成於 2021-09-06 21:31 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49601','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        <tr>
                            <td align="center">LINE</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1944237" target="_blank">徐名成</a><br>璀璨會員-一年期(2021/7/11~2022/7/11)</td>
                            <td align="center">台北 - 詹明錡</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1383207" target="_blank">陳霓慧</a><br>真人認證會員(2020/12/20~2021/3/20)</td>
                            <td align="center">桃園 - 蔡美鳳</td>
                            <td align="center">
                                徐名成於 2021-09-06 21:23 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49600','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        <tr>
                            <td align="center">LINE</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1944237" target="_blank">徐名成</a><br>璀璨會員-一年期(2021/7/11~2022/7/11)</td>
                            <td align="center">台北 - 詹明錡</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1547548" target="_blank">簡如君</a><br>網站會員(~)</td>
                            <td align="center">台北 - 高語鍹</td>
                            <td align="center">
                                徐名成於 2021-09-06 21:16 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49599','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        <tr>
                            <td align="center">LINE</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2066898" target="_blank">鄭小斐</a><br>璀璨VIP會員-二年期(2021/7/10~2023/7/10)</td>
                            <td align="center">台中 - 閻秋波</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1828493" target="_blank">吳梅菁</a><br>真人認證會員(2019/11/25~2020/5/25)</td>
                            <td align="center">台中 - 亞芳</td>
                            <td align="center">
                                鄭小斐於 2021-09-06 14:51 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49586','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        <tr>
                            <td align="center">LINE</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2066898" target="_blank">鄭小斐</a><br>璀璨VIP會員-二年期(2021/7/10~2023/7/10)</td>
                            <td align="center">台中 - 閻秋波</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2008109" target="_blank">曾妤葻</a><br>資料認證會員(2021/1/18~2021/3/18)</td>
                            <td align="center">台中 - 彭春福</td>
                            <td align="center">
                                鄭小斐於 2021-09-06 14:50 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49585','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        <tr>
                            <td align="center">LINE</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2069293" target="_blank">李啟民</a><br>璀璨會員-一年期(2021/7/19~2022/7/19)</td>
                            <td align="center">台中 - 余致媛</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1603226" target="_blank">吳雅琳</a><br>真人認證會員(2019/5/19~2019/11/19)</td>
                            <td align="center">高雄 - 陳金鳳</td>
                            <td align="center">
                                李啟民於 2021-09-06 08:21 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49579','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        <tr>
                            <td align="center">LINE</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2080660" target="_blank">翁逸旻</a><br>璀璨會員-一年期(2021/8/31~2022/8/31)</td>
                            <td align="center">桃園 - 蔡美鳳</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1383207" target="_blank">陳霓慧</a><br>真人認證會員(2020/12/20~2021/3/20)</td>
                            <td align="center">桃園 - 蔡美鳳</td>
                            <td align="center">
                                翁逸旻於 2021-09-06 00:00 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49573','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        <tr>
                            <td align="center">LINE</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2022187" target="_blank">黃韶文</a><br>璀璨會員-二年期(2021/2/26~2023/4/27)</td>
                            <td align="center">台北 - 易珊</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1439419" target="_blank">林哲</a><br>網站會員(~)</td>
                            <td align="center">總管理處 - 已結婚</td>
                            <td align="center">
                                黃韶文於 2021-09-05 21:43 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49571','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        <tr>
                            <td align="center">LINE</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2022187" target="_blank">黃韶文</a><br>璀璨會員-二年期(2021/2/26~2023/4/27)</td>
                            <td align="center">台北 - 易珊</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1563219" target="_blank">程書琦</a><br>真人認證會員(2019/2/1~2019/8/1)</td>
                            <td align="center">八德 - 詹惠驛 惠惠</td>
                            <td align="center">
                                黃韶文於 2021-09-05 21:42 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49570','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        <tr>
                            <td align="center">LINE</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2022187" target="_blank">黃韶文</a><br>璀璨會員-二年期(2021/2/26~2023/4/27)</td>
                            <td align="center">台北 - 易珊</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1566136" target="_blank">陳羽珊</a><br>真人認證會員(2019/2/2~2019/8/2)</td>
                            <td align="center">八德 - 八德督導</td>
                            <td align="center">
                                黃韶文於 2021-09-05 21:41 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49569','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        <tr>
                            <td align="center">會館約會</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=2032781" target="_blank">湯宏偉</a><br>璀璨會員-一年期(2021/4/4~2022/4/5)</td>
                            <td align="center">高雄 - 嚴子爲</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1880221" target="_blank">林品妏</a><br>真人認證會員(2020/1/30~2020/7/30)</td>
                            <td align="center">高雄 - 謝宛萍</td>
                            <td align="center">
                                湯宏偉於 2021-09-05 18:31 發出邀請



                            </td>

                            <td align="center">

                                <a href="javascript:Mars_popup('ad_singleparty_waitdateing_report.php?a=49561','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');">處理結果</a>

                            </td>
                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 25 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_singleparty_waitdateing.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_singleparty_waitdateing.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_singleparty_waitdateing.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_singleparty_waitdateing.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_singleparty_waitdateing.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_singleparty_waitdateing.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_singleparty_waitdateing.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_singleparty_waitdateing.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_singleparty_waitdateing.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_singleparty_waitdateing.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_singleparty_waitdateing.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_singleparty_waitdateing.php?topage=25 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_singleparty_waitdateing.php?topage=1" selected>1</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=2">2</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=3">3</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=4">4</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=5">5</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=6">6</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=7">7</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=8">8</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=9">9</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=10">10</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=11">11</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=12">12</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=13">13</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=14">14</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=15">15</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=16">16</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=17">17</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=18">18</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=19">19</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=20">20</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=21">21</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=22">22</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=23">23</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=24">24</option>
                            <option value="/ad_singleparty_waitdateing.php?topage=25">25</option>
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
require_once("./include/_bottom.php")
?>