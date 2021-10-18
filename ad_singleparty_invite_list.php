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
            <li class="active">會館約會</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會館約會 - 等待秘書聯繫 - 數量：71　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <!--<p><a href="#" class="btn btn-success"  disabled>未完成</a>&nbsp;<a href="ad_singleparty_invite_list.php?t=1" class="btn btn-info" >已完成</a></p>-->
                    <p><a href="#" class="btn btn-success" disabled>等待秘書聯繫</a>&nbsp;<a href="ad_singleparty_invite_list.php?t=1" class="btn btn-info">已邀約未同意</a></p>
                    <form name="form1" method="post" action="?vst=full" class="form-inline">
                        <p>排約日期：
                            <input type="text" class="datepicker" autocomplete="off" name="times1" value="" autocomplete="off">
                            ～
                            <input type="text" class="datepicker" autocomplete="off" name="times2" value="" autocomplete="off">


                            <select name="s6" id="s6">
                                <option value="">請選擇會館</option>
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
                            <select name="s7" id="s7">
                                <option value="">請選擇秘書</option>
                            </select>
                            <input type="text" name="keyword" placeholder="編號" class="form-control" value="">

                            <input type="submit" value="送出" class="btn btn-default">
                        </p>
                    </form>
                    <p style="color:blue">受理會館務必與<font color=red>發起人及被邀約人</font>兩方都聯絡確認後，才能設定排約時間。<br>如果有一方不願排約或取消，請一樣設定排約時間後再到排約預定表中選取取消原因。</p>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width=160>發起人</th>
                            <th width=120>發起人會館</th>
                            <th width=160>被邀約人</th>
                            <th width=120>被邀約會館</th>
                            <th width=120>約會會館</th>
                            <th>詳細時間</th>
                            <th>狀態</th>
                            <th width="100">　</th>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1606486" target="_blank">測試小君</a><br>[0955789456]/223天</td>
                            <td align="center">總管理處 - 宜君</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1503490" target="_blank">測試-尹宜君</a><br>[0916920837]/588天</td>
                            <td align="center">總管理處 - 宜君</td>
                            <td align="center">總管理處</td>
                            <td align="left">
                                測試小君於 2021-05-26 11:08 發出邀請<br>測試-尹宜君於 2021-05-26 11:10 同意邀請<br>雙方選定 2021-05-31 16:00 到 總管理處會館 約會<br>
                                <font color=purple>結果：等待回報</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                4-2-0-36931
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1826609" target="_blank">謝穎成</a><br>[0933252789]/12天</td>
                            <td align="center">八德 - 八德督導</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1869129" target="_blank">邱佩娟</a><br>[0933713603]/<font color=red>過期</font>
                            </td>
                            <td align="center">八德 - 蔡佩蓁 Sunny</td>
                            <td align="center">八德</td>
                            <td align="left">
                                謝穎成於 2020-07-01 22:14 發出邀請<br>邱佩娟於 2020-07-02 08:22 同意邀請<br>雙方選定 2020-07-05 13:00 到 八德會館 約會<br>秘書已於 2020-07-02 21:05 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-30557
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1108089" target="_blank">陸裕慶</a><br>[0922260191]/<font color=red>過期</font>
                            </td>
                            <td align="center">八德 - 八德督導</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1916756" target="_blank">陳云嫆</a><br>[0910368482]/267天</td>
                            <td align="center">台北 - 張茹茵</td>
                            <td align="center">台北</td>
                            <td align="left">
                                陸裕慶於 2020-05-31 01:00 發出邀請<br>陳云嫆於 2020-06-01 19:50 同意邀請<br>雙方選定 2020-06-06 15:00 到 台北會館 約會<br>秘書已於 2020-06-02 14:33 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：等待回報</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                4-2-0-30435
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1860282" target="_blank">何國睿X</a><br>[0988413228]/<font color=red>過期</font>
                            </td>
                            <td align="center">八德 - 蔡佩蓁 Sunny</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1902625" target="_blank">陳映禎</a><br>[0955268864]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 江琳</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                何國睿X於 2020-04-10 11:38 發出邀請<br>陳映禎於 2020-04-10 16:08 同意邀請<br>雙方選定 2020-04-18 14:00 到 桃園會館 約會<br>秘書已於 2020-04-22 14:57 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-26054
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1895819" target="_blank">余明芬</a><br>[0928737271]/206天</td>
                            <td align="center">台北 - 易珊</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1848708" target="_blank">廖正興</a><br>[0927206566]/<font color=red>過期</font>
                            </td>
                            <td align="center">台北 - 高語鍹</td>
                            <td align="center">台北</td>
                            <td align="left">
                                余明芬於 2020-03-23 16:56 發出邀請<br>廖正興於 2020-03-23 17:05 同意邀請<br>雙方選定 2020-04-06 20:00 到 台北會館 約會<br>
                                <font color=purple>結果：等待回報</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                4-2-0-25939
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1839699" target="_blank">王其文</a><br>[0985365682]/<font color=red>過期</font>
                            </td>
                            <td align="center">八德 - 周靖雯 Bella</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1598498" target="_blank">許家榛</a><br>[0917132271]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                王其文於 2019-12-19 17:53 發出邀請<br>許家榛於 2019-12-19 22:26 同意邀請<br>雙方選定 2019-12-24 19:00 到 桃園會館 約會<br>秘書已於 2019-12-20 17:39 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-22288
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1839699" target="_blank">王其文</a><br>[0985365682]/<font color=red>過期</font>
                            </td>
                            <td align="center">八德 - 周靖雯 Bella</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1598498" target="_blank">許家榛</a><br>[0917132271]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                王其文於 2019-11-29 15:59 發出邀請<br>許家榛於 2019-11-29 16:15 同意邀請<br>雙方選定 2019-12-05 19:00 到 桃園會館 約會<br>秘書已於 2019-11-29 16:42 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：主約人取消</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                4-2-3-22196
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1829497" target="_blank">謝承原</a><br>[0989425875]/10天</td>
                            <td align="center">桃園 - 江琳</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1827335" target="_blank">許薽尹</a><br>[0910609906]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                謝承原於 2019-11-14 23:55 發出邀請<br>許薽尹於 2019-11-18 17:44 同意邀請<br>雙方選定 2019-11-30 14:00 到 桃園會館 約會<br>秘書已於 2019-11-19 13:45 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-22085
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1607336" target="_blank">何冠威</a><br>[0910278039]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 江琳</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1827335" target="_blank">許薽尹</a><br>[0910609906]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                何冠威於 2019-11-08 00:01 發出邀請<br>許薽尹於 2019-11-12 16:49 同意邀請<br>雙方選定 2019-11-16 15:00 到 桃園會館 約會<br>秘書已於 2019-11-12 19:02 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-22040
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1108089" target="_blank">陸裕慶</a><br>[0922260191]/<font color=red>過期</font>
                            </td>
                            <td align="center">八德 - 張利 Liz</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1598498" target="_blank">許家榛</a><br>[0917132271]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                陸裕慶於 2019-09-28 23:03 發出邀請<br>許家榛於 2019-09-28 23:49 同意邀請<br>雙方選定 2019-10-03 15:00 到 桃園會館 約會<br>秘書已於 2019-09-29 14:49 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-19801
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1583781" target="_blank">梁智勇</a><br>[0966009699]/161天</td>
                            <td align="center">台中 - 林彥妤</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1835434" target="_blank">許玲毓</a><br>[0928052566]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                梁智勇於 2019-09-13 21:59 發出邀請<br>許玲毓於 2019-09-13 22:01 同意邀請<br>雙方選定 2019-09-29 15:00 到 桃園會館 約會<br>秘書已於 2019-10-01 18:13 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-18735
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1546178" target="_blank">姜志輝</a><br>[0982185977]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1827335" target="_blank">許薽尹</a><br>[0910609906]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                姜志輝於 2019-08-24 20:24 發出邀請<br>許薽尹於 2019-08-25 16:33 同意邀請<br>雙方選定 2019-09-12 19:00 到 桃園會館 約會<br>秘書已於 2019-08-26 14:49 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-17618
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1509041" target="_blank">巴克斯-許士豪</a><br>[0912345280]/<font color=red>過期</font>
                            </td>
                            <td align="center">總管理處 - 點點</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1509046" target="_blank">巴克斯-吳雅義</a><br>[0912345283]/<font color=red>過期</font>
                            </td>
                            <td align="center">總管理處 - 點點</td>
                            <td align="center">高雄</td>
                            <td align="left">
                                巴克斯-許士豪於 2019-08-14 14:11 發出邀請<br>巴克斯-吳雅義於 2019-08-14 14:38 同意邀請<br>雙方選定 2019-08-17 14:00 到 高雄會館 約會<br>秘書已於 2019-08-15 13:59 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-17548
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1509041" target="_blank">巴克斯-許士豪</a><br>[0912345280]/<font color=red>過期</font>
                            </td>
                            <td align="center">總管理處 - 點點</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1509238" target="_blank">巴克斯-王蕙吟</a><br>[0918757262]/<font color=red>過期</font>
                            </td>
                            <td align="center">總管理處 - 點點</td>
                            <td align="center">台南</td>
                            <td align="left">
                                巴克斯-許士豪於 2019-08-14 11:41 發出邀請<br>巴克斯-王蕙吟於 2019-08-14 11:44 同意邀請<br>雙方選定 2019-08-18 12:00 到 台南會館 約會<br>秘書已於 2019-08-15 13:59 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-17546
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1520293" target="_blank">林志傳</a><br>[0919045290]/<font color=red>過期</font>
                            </td>
                            <td align="center">台北 - 張茹茵</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1597002" target="_blank">蔡愛平WM</a><br>[0915888008]/<font color=red>過期</font>
                            </td>
                            <td align="center">八德 - 周靖雯 Bella</td>
                            <td align="center">八德</td>
                            <td align="left">
                                林志傳於 2019-08-10 23:05 發出邀請<br>蔡愛平WM於 2019-08-16 16:45 同意邀請<br>雙方選定 2019-08-31 16:00 到 八德會館 約會<br>秘書已於 2019-08-20 16:15 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-16506
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1613473" target="_blank">張昱政</a><br>[0928253076]/<font color=red>過期</font>
                            </td>
                            <td align="center">八德 - 蔡佩蓁 Sunny</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1598498" target="_blank">許家榛</a><br>[0917132271]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                張昱政於 2019-07-24 21:30 發出邀請<br>許家榛於 2019-07-25 00:05 同意邀請<br>雙方選定 2019-08-12 18:00 到 桃園會館 約會<br>秘書已於 2019-07-30 17:43 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-15369
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1546178" target="_blank">姜志輝</a><br>[0982185977]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1619412" target="_blank">賴怡文</a><br>[0910216549]/<font color=red>過期</font>
                            </td>
                            <td align="center">台北 - 易珊</td>
                            <td align="center">台北</td>
                            <td align="left">
                                姜志輝於 2019-07-22 10:26 發出邀請<br>賴怡文於 2019-07-27 18:20 同意邀請<br>雙方選定 2019-08-04 14:00 到 台北會館 約會<br>秘書已於 2019-07-27 20:29 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-15348
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1546178" target="_blank">姜志輝</a><br>[0982185977]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1561326" target="_blank">陳玟嵐</a><br>[0968919075]/<font color=red>過期</font>
                            </td>
                            <td align="center">桃園 - 林保欽</td>
                            <td align="center">桃園</td>
                            <td align="left">
                                姜志輝於 2019-07-22 09:37 發出邀請<br>陳玟嵐於 2019-07-22 20:29 同意邀請<br>雙方選定 2019-07-27 17:00 到 桃園會館 約會<br>秘書已於 2019-07-23 13:59 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-15346
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1519286" target="_blank">葉倫宇</a><br>[0970707638]/<font color=red>過期</font>
                            </td>
                            <td align="center">台南 - 杜佳倩</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1617150" target="_blank">張玟玉</a><br>[0976820203]/<font color=red>過期</font>
                            </td>
                            <td align="center">台南 - 錢淑華</td>
                            <td align="center">台南</td>
                            <td align="left">
                                葉倫宇於 2019-07-08 09:38 發出邀請<br>張玟玉於 2019-07-15 16:25 同意邀請<br>雙方選定 2019-07-29 20:00 到 台南會館 約會<br>秘書已於 2019-07-26 20:36 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：成功</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                8-2-1-15270
                            </td>
                        </tr>

                        <tr>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1601611" target="_blank">吳耀庭</a><br>[0982659664]/<font color=red>過期</font>
                            </td>
                            <td align="center">台中 - 亞芳</td>
                            <td align="center"><a href="ad_mem_detail.php?mem_num=1619352" target="_blank">王湘誼</a><br>[0903524017]/<font color=red>過期</font>
                            </td>
                            <td align="center">台南 - 杜佳倩</td>
                            <td align="center">台中</td>
                            <td align="left">
                                吳耀庭於 2019-07-08 00:16 發出邀請<br>王湘誼於 2019-07-08 07:10 同意邀請<br>雙方選定 2019-07-20 15:00 到 台中會館 約會<br>秘書已於 2019-07-15 14:01 與雙方聯絡完畢並轉入<br>
                                <font color=purple>結果：排約對象取消</font>



                            </td>
                            <td align="center">

                            </td>
                            <td align="center">
                                4-2-7-15269
                            </td>
                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 71 筆、第 1 頁／共 4 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_singleparty_invite_list.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_singleparty_invite_list.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_singleparty_invite_list.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_singleparty_invite_list.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_singleparty_invite_list.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_singleparty_invite_list.php?topage=4 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_singleparty_invite_list.php?topage=1" selected>1</option>
                            <option value="/ad_singleparty_invite_list.php?topage=2">2</option>
                            <option value="/ad_singleparty_invite_list.php?topage=3">3</option>
                            <option value="/ad_singleparty_invite_list.php?topage=4">4</option>
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