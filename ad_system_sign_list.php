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
            <li class="active">申請簽核</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>申請簽核 - 數量：4310</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                <form id="searchform" action="ad_system_sign_list.php" method="post" target="_self" class="form-inline">
                    <a class="btn btn-info" href="ad_system_sign_list_add.php">提出申請</a>
                    <select name="types" id="types">
                        <option value="">請選擇</option>
                        <option value="修改身分證字號">修改身分證字號</option>
                        <option value="修改手機號碼">修改手機號碼</option>
                        <option value="開秘書後台">開秘書後台</option>
                        <option value="關秘書後台">關秘書後台</option>
                        <option value="跨區/身分證重覆">跨區/身分證重覆</option>
                        <option value="再開發資料">再開發資料</option>
                        <option value="其他">其他</option>
                        <option value="活動異動單">活動異動單</option>
                    </select>
                    <input type="text" name="start_time" id="start_time" class="datepicker" autocomplete="off" value="" placeholder="申請日期開始">　～　<input type="text" name="end_time" id="end_time" class="datepicker" autocomplete="off" value="" placeholder="申請日期結束">

                    <select name="branch" id="branch" class="form-control">
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
                        <option value="好好玩旅行社">好好玩旅行社</option>
                    </select>

                    <input id="keyword" name="keyword" id="keyword" class="form-control" type="text" placeholder="搜尋內容" value="">
                    <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                    </p>
                    <p>
                        <a class="btn btn-success" href="ad_system_sign_list.php?w=1">待審核</a>

                        <a class="btn btn-success" href="ad_system_sign_list.php?w=2">待處理</a>


                        <a class="btn btn-success" href="ad_system_sign_list.php">所有</a>

                        <a class="btn btn-warning" href="#p" onclick="print_action()">異動單列印</a>

                </form>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th width=140>申請時間</th>
                            <th width=180>申請人</th>
                            <th width=160>類型</th>
                            <th>內容</th>
                            <th width=120>狀態</th>
                            <th>過程</th>
                            <th width=60></th>
                        </tr>

                        <tr>
                            <td class="center">2021-06-03 14:58</td>
                            <td class="center">桃園-桃園會計</td>
                            <td class="center">跨區/身分證重覆</td>
                            <td class="center">&#26371;&#21729;&#24429;&#35443;&#31243; (F129593375) &#30340;&#36523;&#20998;&#35657;&#23383;&#34399;&#37325;&#35206;&#65292;&#30003;&#35531;&#36328;&#21312;</td>
                            <td class="center">督導/經理駁回</td>
                            <td class="center">[2021-06-03 14:58] 桃園會計提出申請 - 跨區/身分證重覆<br>[2021-06-03 14:58] 正在等候督導/經理核准<br>[2021-06-03 15:24] 由 黎總經理 督導/經理 駁回(本來就是桃園會員)</td>
                            <td class="center">


                            </td>

                        </tr>

                        <tr>
                            <td class="center">2020-07-12 12:36</td>
                            <td class="center">桃園-林婕希</td>
                            <td class="center">修改手機號碼</td>
                            <td class="center">&#26371;&#21729; (&#36664;&#20837;&#26371;&#21729;&#32232;&#34399;&#25110;&#25163;&#27231;&#34399;&#30908;) &#30340;&#25163;&#27231;&#34399;&#30908;&#26356;&#25913;&#28858;&#65306;(&#36664;&#20837;&#26032;&#30340;&#25163;&#27231;&#34399;&#30908;)<br><br>&#26371;&#21729;&#32232;&#34399;&#65306;103074<br>&#26371;&#21729;&#65306;&#21555;&#23478;&#35946;<br>&#21407;&#26412;&#25163;&#27231;&#34399;&#65306;0920-762-650<br>&#35531;&#26356;&#25913;&#28858;(&#26032;&#25163;&#27231;&#34399;)&#65306;0983005575<br><br>&#35613;&#35613;</td>
                            <td class="center">督導/經理駁回</td>
                            <td class="center">[2020-07-12 12:36] 林婕希提出申請 - 修改手機號碼<br>[2020-07-12 12:36] 正在等候督導/經理核准<br>[2020-07-12 12:46] 由 連杏枌 督導/經理 駁回(可以請會員自行修改.)</td>
                            <td class="center">


                            </td>

                        </tr>

                        <tr>
                            <td class="center">2020-05-11 19:17</td>
                            <td class="center">桃園-林婕希</td>
                            <td class="center">跨區/身分證重覆</td>
                            <td class="center">&#26371;&#21729; (&#36664;&#20837;&#26371;&#21729;&#32232;&#34399;&#25110;&#36523;&#20998;&#35657;&#23383;&#34399;) &#30340;&#36523;&#20998;&#35657;&#23383;&#34399;&#37325;&#35206;&#65292;&#30003;&#35531;&#36328;&#21312;<br><br>&#22995;&#21517;&#65306;&#26131;&#33459;&#22914;<br>ID&#65306;H224306090<br>&#36523;&#20998;&#35657;&#23383;&#34399;&#37325;&#35206;&#65292;&#30003;&#35531;&#36328;&#21312;<br>&#35613;&#35613;<br></td>
                            <td class="center">督導/經理駁回</td>
                            <td class="center">[2020-05-11 19:17] 林婕希提出申請 - 跨區/身分證重覆<br>[2020-05-11 19:17] 正在等候督導/經理核准<br>[2020-05-11 19:18] 由 連杏枌 督導/經理 駁回(已在桃園系統)</td>
                            <td class="center">


                            </td>

                        </tr>

                        <tr>
                            <td class="center">2019-09-19 17:19</td>
                            <td class="center">桃園-孫貫耘</td>
                            <td class="center">跨區/身分證重覆</td>
                            <td class="center">&#26371;&#21729; : &#21570;&#29642;&#29734; <br>&#36523;&#20998;&#35657;&#23383;&#34399;&#37325;&#35206;:F225868024<br>&#30003;&#35531;&#36328;&#21312;</td>
                            <td class="center">督導/經理駁回</td>
                            <td class="center">[2019-09-19 17:19] 孫貫耘提出申請 - 跨區/身分證重覆<br>[2019-09-19 17:19] 正在等候督導/經理核准<br>[2019-09-19 18:41] 由 桃園督導 督導/經理 駁回(舊會員，系統入會有。)</td>
                            <td class="center">


                            </td>

                        </tr>

                        <tr>
                            <td class="center">2018-10-28 14:36</td>
                            <td class="center">新竹-莊妏翎</td>
                            <td class="center">修改手機號碼</td>
                            <td class="center">&#26371;&#21729; (0970118896) &#30340;&#25163;&#27231;&#34399;&#30908;&#26356;&#25913;&#28858;&#65306;(0909949145)</td>
                            <td class="center">督導/經理駁回</td>
                            <td class="center">[2018-10-28 14:36] 莊妏翎提出申請 - 修改手機號碼<br>[2018-10-28 14:36] 正在等候督導/經理核准<br>[2018-10-28 14:42] 由 新竹督導 督導/經理 駁回(會員名子.沒填上)</td>
                            <td class="center">


                            </td>

                        </tr>

                        <tr>
                            <td class="center">2019-06-27 18:53</td>
                            <td class="center">新竹-新竹督導</td>
                            <td class="center">再開發資料</td>
                            <td class="center">&#26371;&#39208;&#65306;&#26032;&#31481;&#65292;(&#36984;&#25799;&#26410;&#20837;&#26371;/&#24050;&#20837;&#26371;)&#36039;&#26009;&#65292;&#36039;&#26009;&#26085;&#26399;(2019/5/27 &#21040; 2019/6/27)</td>
                            <td class="center">總經理駁回</td>
                            <td class="center">[2019-06-27 18:53] 新竹督導提出申請 - 再開發資料<br>[2019-06-27 18:53] 正在等候督導/經理核准<br>[2019-06-27 18:53] 由 新竹督導 督導/經理 核准(自申請)<br>[2019-06-27 18:53] 正在等候總經理核准<br>[2019-06-27 18:58] 由 黎總經理 總經理 駁回(資料日期(2019/5/27 到 2019/6/27) 只有一個月嗎)</td>
                            <td class="center">


                            </td>

                        </tr>

                        <tr>
                            <td class="center">2019-06-27 17:49</td>
                            <td class="center">新竹-新竹督導</td>
                            <td class="center">再開發資料</td>
                            <td class="center">&#26371;&#39208;&#65306;&#26032;&#31481;&#65292;(&#36984;&#25799;&#26410;&#20837;&#26371;/&#24050;&#20837;&#26371;)&#36039;&#26009;&#65292;&#36039;&#26009;&#26085;&#26399;2019/6/23</td>
                            <td class="center">總經理駁回</td>
                            <td class="center">[2019-06-27 17:49] 新竹督導提出申請 - 再開發資料<br>[2019-06-27 17:49] 正在等候督導/經理核准<br>[2019-06-27 17:49] 由 新竹督導 督導/經理 核准(自申請)<br>[2019-06-27 17:49] 正在等候總經理核准<br>[2019-06-27 18:52] 由 黎總經理 總經理 駁回(未填寫任何年度資料)</td>
                            <td class="center">


                            </td>

                        </tr>

                        <tr>
                            <td class="center">2021-09-04 14:44</td>
                            <td class="center">台南-台南督導</td>
                            <td class="center">其他</td>
                            <td class="center">(&#36664;&#20837;&#20854;&#20182;&#30003;&#35531;&#20107;&#38917;)<br>&#19981;&#29992;&#34389;&#29702;--<br>&#24050;OK<br>&#25289;&#20837;&#26371;&#21363;&#21487;<br><br>(&#36664;&#20837;&#20854;&#20182;&#30003;&#35531;&#20107;&#38917;)<br>S223113928<br>&#21253;&#33298;&#20113;<br><br>&#28961;&#27861;&#25289;&#21319;&#21345;<br>&#21487;&#33021;&#22240;&#28858;&#30070;&#21021;&#26377;&#36864;&#36027;&#35299;&#32004;<br>&#37329;&#38634;&#23071;&#28317;&#36890;&#21319;&#21345;<br></td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-09-04 14:44] 台南督導提出申請 - 其他<br>[2021-09-04 14:44] 正在等候督導/經理核准<br>[2021-09-04 14:44] 由 台南督導 督導/經理 核准(自申請)<br>[2021-09-04 14:46] 由 黎總經理 結案-不需處理( )</td>
                            <td class="center">


                            </td>

                        </tr>

                        <tr>
                            <td class="center">2021-09-04 14:41</td>
                            <td class="center">台南-台南督導</td>
                            <td class="center">其他</td>
                            <td class="center">(&#36664;&#20837;&#20854;&#20182;&#30003;&#35531;&#20107;&#38917;)<br>S223113928<br>&#21253;&#33298;&#20113;<br><br>&#28961;&#27861;&#25289;&#21319;&#21345;<br>&#21487;&#33021;&#22240;&#28858;&#30070;&#21021;&#26377;&#36864;&#36027;&#35299;&#32004;<br>&#37329;&#38634;&#23071;&#28317;&#36890;&#21319;&#21345;</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-09-04 14:41] 台南督導提出申請 - 其他<br>[2021-09-04 14:41] 正在等候督導/經理核准<br>[2021-09-04 14:41] 由 台南督導 督導/經理 核准(自申請)<br>[2021-09-04 14:46] 由 黎總經理 結案-不需處理( )</td>
                            <td class="center">


                            </td>

                        </tr>

                        <tr>
                            <td class="center">2021-08-20 18:24</td>
                            <td class="center">台南-台南督導</td>
                            <td class="center">跨區/身分證重覆</td>
                            <td class="center">&#26371;&#21729; (&#36664;&#20837;&#26371;&#21729;&#32232;&#34399;&#25110;&#36523;&#20998;&#35657;&#23383;&#34399;) &#30340;&#36523;&#20998;&#35657;&#23383;&#34399;&#37325;&#35206;&#65292;&#30003;&#35531;&#36328;&#21312;<br>&#38515;&#33509;&#34224;<br>R223580633<br>0906368627<br>&#36523;&#20221;&#35657;&#23383;&#34399;&#37325;&#35206;<br>&#19968;&#30452;&#36339;&#20986;--&#28961;&#27861;KEY&#20837;&#26371;</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-08-20 18:24] 台南督導提出申請 - 跨區/身分證重覆<br>[2021-08-20 18:24] 正在等候督導/經理核准<br>[2021-08-20 18:24] 由 台南督導 督導/經理 核准(自申請)<br>[2021-08-21 00:56] 由 黎總經理 結案-不需處理(R223580633 台南舊會員)</td>
                            <td class="center">


                            </td>

                        </tr>

                        <tr>
                            <td class="center">2021-08-10 14:09</td>
                            <td class="center">新竹-林羽柔</td>
                            <td class="center">其他</td>
                            <td class="center">&#26371;&#21729;&#65306;&#24373;&#28580;&#24681;&#12290;&#36523;&#20998;&#35657;&#23383;&#34399;&#65306;Y120262882<br>&#26371;&#21729;&#35498;&#19981;&#24076;&#26395;&#20182;&#30340;&#36039;&#26009;&#22312;&#32178;&#31449;&#19978;&#20986;&#29694;&#65292;&#25812;&#24515;&#26371;&#34987;&#35469;&#35672;&#30340;&#20154;&#30475;&#21040;&#12290;</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-08-10 14:09] 林羽柔提出申請 - 其他<br>[2021-08-10 14:09] 正在等候督導/經理核准<br>[2021-08-10 14:21] 由 新竹督導 督導/經理 核准(本身是台積電高層主管..不要顯示資料)<br>[2021-08-10 14:35] 由 黎總經理 結案-不需處理(OK)</td>
                            <td class="center">


                            </td>

                        </tr>

                        <tr>
                            <td class="center">2021-08-01 16:26</td>
                            <td class="center">台南-台南督導</td>
                            <td class="center">其他</td>
                            <td class="center">(&#36664;&#20837;&#20854;&#20182;&#30003;&#35531;&#20107;&#38917;)<br>&#21555;&#29600;&#24535;<br>A129153554<br>0965-377-626<br>&#24050;&#25104;&#20132;--&#19981;&#30693;&#36947;&#28858;&#20309;&#19981;&#33021;&#23637;&#31034;&#29031;&#29255;<br>&#20986;&#29694;&#37679;&#35492;</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-08-01 16:26] 台南督導提出申請 - 其他<br>[2021-08-01 16:26] 正在等候督導/經理核准<br>[2021-08-01 16:26] 由 台南督導 督導/經理 核准(自申請)<br>[2021-08-02 14:18] 由 黎總經理 結案-不需處理(這筆有先留言問台南，欣怡和工程師目前看都有照片~)</td>
                            <td class="center">


                            </td>

                        </tr>

                        <tr>
                            <td class="center">2021-08-01 15:08</td>
                            <td class="center">台北-台北Key</td>
                            <td class="center">修改手機號碼</td>
                            <td class="center">&#26371;&#21729; (0919998722) &#30340;&#25163;&#27231;&#34399;&#30908;&#26356;&#25913;&#28858;&#65306;(0983260725)</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-08-01 15:08] 台北Key提出申請 - 修改手機號碼<br>[2021-08-01 15:08] 正在等候督導/經理核准<br>[2021-08-01 17:22] 由 余宗嶼 督導/經理 核准(會員更改)<br>[2021-08-02 10:20] 由 欣怡 結案-不需處理(請先拉取邀約會館，才能做修改唷)</td>
                            <td class="center">


                            </td>

                        </tr>

                        <tr>
                            <td class="center">2021-07-23 16:30</td>
                            <td class="center">台南-台南督導</td>
                            <td class="center">其他</td>
                            <td class="center">(&#36664;&#20837;&#20854;&#20182;&#30003;&#35531;&#20107;&#38917;)<br>&#21488;&#21335;&#26283;&#23384;<br>&#26371;&#21729;&#21312;<br>&#21487;&#21542;&#36681;&#26460;&#20339;&#20521;<br>&#32879;&#32097;&#21839;&#20505;&#30475;&#30475;<br>&#26377;&#28961;&#21487;&#26381;&#21209;&#21450;&#21487;&#32396;&#21345;&#30340;<br>&#26371;&#21729;<br>&#21488;&#21335;&#26283;&#23384;&#21312;--&#36681;&#26460;&#20339;&#20521;</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-07-23 16:30] 台南督導提出申請 - 其他<br>[2021-07-23 16:30] 正在等候督導/經理核准<br>[2021-07-23 16:30] 由 台南督導 督導/經理 核准(自申請)<br>[2021-07-23 16:52] 由 黎總經理 結案-不需處理(一堆暫存會員，你們都設黑名單 如果是因全卡設黑名單，約專前台不會顯示 沒幾筆不是黑名單，請你自己處理)</td>
                            <td class="center">


                            </td>

                        </tr>

                        <tr>
                            <td class="center">2021-07-15 08:33</td>
                            <td class="center">台南-台南督導</td>
                            <td class="center">其他</td>
                            <td class="center">(&#36664;&#20837;&#20854;&#20182;&#30003;&#35531;&#20107;&#38917;<br>&#34311;&#21927;&#23637;<br>&#24050;&#25490;&#32004;&#20108;&#20301;<br>&#31995;&#32113;&#19981;&#23567;&#24515;&#25289;&#21040;&#22283;&#20013;<br><br>&#20182;&#26159;&#21335;&#21488;&#32900;&#26989;<br>&#39640;&#20013;&#30050;&#26989;<br>&#20294;&#19981;&#26159;&#22283;&#20013;<br>&#21487;&#33021;&#21010;&#25163;<br>&#21487;&#21542;&#25913;&#39640;&#20013;</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-07-15 08:33] 台南督導提出申請 - 其他<br>[2021-07-15 08:33] 正在等候督導/經理核准<br>[2021-07-15 08:33] 由 台南督導 督導/經理 核准(自申請)<br>[2021-07-15 14:24] 由 黎總經理 結案-不需處理( )</td>
                            <td class="center">


                            </td>

                        </tr>

                        <tr>
                            <td class="center">2021-06-27 14:13</td>
                            <td class="center">台中-台中督導</td>
                            <td class="center">修改手機號碼</td>
                            <td class="center">&#26371;&#21729;&#26446;&#20581;&#24179;0970179438 &#30340;&#25163;&#27231;&#34399;&#30908;&#26356;&#25913;&#28858;&#65306;0988224785</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-06-27 14:13] 台中督導提出申請 - 修改手機號碼<br>[2021-06-27 14:13] 正在等候督導/經理核准<br>[2021-06-27 14:13] 由 台中督導 督導/經理 核准(自申請)<br>[2021-06-27 16:57] 由 黎總經理 結案-不需處理(同上)</td>
                            <td class="center">


                            </td>

                        </tr>

                        <tr>
                            <td class="center">2021-06-26 17:47</td>
                            <td class="center">約專-張茹茵</td>
                            <td class="center">跨區/身分證重覆</td>
                            <td class="center">&#26519;&#24314;&#23439; G121815017 &#38651;&#35441;:0910860039 &#30003;&#35531;&#26032;&#26371;&#21729;</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-06-26 17:47] 張茹茵提出申請 - 跨區/身分證重覆<br>[2021-06-26 17:47] 正在等候督導/經理核准<br>[2021-06-26 17:47] 由 張茹茵 督導/經理 核准(自申請)<br>[2021-06-26 18:02] 由 黎總經理 結案-不需處理(約專未入會去修改入會即可)</td>
                            <td class="center">


                            </td>

                        </tr>

                        <tr>
                            <td class="center">2021-06-17 10:47</td>
                            <td class="center">台南-台南督導</td>
                            <td class="center">其他</td>
                            <td class="center">(&#36664;&#20837;&#20854;&#20182;&#30003;&#35531;&#20107;&#38917;)<br>&#40654;&#32317;--<br>&#21488;&#21335;&#36249;&#32032;&#34137;&#24819;&#35201;&#19968;&#21488;&#36774;&#20844;&#23460;&#38651;&#33126;<br>&#20063;&#24605;&#32771;&#22810;&#26085;<br>&#33509;&#21487;---&#21487;&#21542;&#26377;&#27231;&#26371;&#30003;&#35531;<br>&#26989;&#32318;/&#30408;&#25910;/&#21033;&#28516;&#26371;&#21162;&#21147;<br>&#26377;&#40723;&#21237;&#33258;&#25552;&#26119;&#33258;&#24049;&#24037;&#20855;&#25104;&#26412;<br>&#20294;&#25928;&#26524;&#26377;&#38480;<br>&#30475;&#36249;&#32032;&#34137;&#36039;&#28145;<br>&#19988;&#20854;&#26377;&#24847;&#39000;&#20351;&#29992;&#38651;&#33126;&#38283;&#22987;<br>&#25552;&#20986;&#30003;&#35531;<br>&#20063;&#24076;&#26395;&#22312;&#26412;&#32771;&#37327;&#19979;&#20173;&#26377;&#27231;&#26371;&#30003;&#35531;&#19968;&#21488;&#36774;&#20844;&#23460;&#38651;&#33126;<br>&#32102;&#36039;&#28145;&#31192;&#26360;&#36249;&#32032;&#34137;&#20351;&#29992;</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-06-17 10:47] 台南督導提出申請 - 其他<br>[2021-06-17 10:47] 正在等候督導/經理核准<br>[2021-06-17 10:47] 由 台南督導 督導/經理 核准(自申請)<br>[2021-06-17 13:44] 由 黎總經理 結案-不需處理(請同仁自備筆電)</td>
                            <td class="center">


                            </td>

                        </tr>

                        <tr>
                            <td class="center">2021-06-06 11:36</td>
                            <td class="center">台南-台南督導</td>
                            <td class="center">其他</td>
                            <td class="center">(&#36664;&#20837;&#20854;&#20182;&#30003;&#35531;&#20107;&#38917;)<br>520940.tw<br>&#32218;&#19978;&#22635;&#21934;<br>&#33509;&#21487;&#35373;&#35336;--&#21487;&#21015;&#21360;&#30452;&#25509;&#36028;&#36039;&#26009;&#21345;<br>&#33509;&#20837;&#26371;&#32025;&#26412;</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-06-06 11:36] 台南督導提出申請 - 其他<br>[2021-06-06 11:36] 正在等候督導/經理核准<br>[2021-06-06 11:36] 由 台南督導 督導/經理 核准(自申請)<br>[2021-06-07 10:47] 由 欣怡 結案-不需處理(請問意思是 讓祕書可以把資料卡印出來嗎? 秘書印出來後可在上面貼資料再作備註? 若是的話，目前列印部分我們還在討論處理，有些技術問題要克服，可能要再等我們一下下)</td>
                            <td class="center">


                            </td>

                        </tr>

                        <tr>
                            <td class="center">2021-05-30 13:27</td>
                            <td class="center">桃園-桃園會計</td>
                            <td class="center">跨區/身分證重覆</td>
                            <td class="center">&#26371;&#21729; &#24429;&#26093;&#24344;(J120543014) &#30340;&#36523;&#20998;&#35657;&#23383;&#34399;&#37325;&#35206;&#65292;&#30003;&#35531;&#36328;&#21312;</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-05-30 13:27] 桃園會計提出申請 - 跨區/身分證重覆<br>[2021-05-30 13:27] 正在等候督導/經理核准<br>[2021-05-30 13:34] 由 連杏枌 督導/經理 核准(請協助 謝謝)<br>[2021-05-30 15:05] 由 黎總經理 結案-不需處理(本是桃園會員)</td>
                            <td class="center">


                            </td>

                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 25 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_system_sign_list.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_system_sign_list.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_system_sign_list.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_system_sign_list.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_system_sign_list.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_system_sign_list.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_system_sign_list.php?topage=7 class='text'>7</a></li>
                    <li>< a href=/ad_system_sign_list.php?topage=8 class='text'>8</></li>
                    <li><a href=/ad_system_sign_list.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_system_sign_list.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_system_sign_list.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_system_sign_list.php?topage=25 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_system_sign_list.php?topage=1" selected>1</option>
                            <option value="/ad_system_sign_list.php?topage=2">2</option>
                            <option value="/ad_system_sign_list.php?topage=3">3</option>
                            <option value="/ad_system_sign_list.php?topage=4">4</option>
                            <option value="/ad_system_sign_list.php?topage=5">5</option>
                            <option value="/ad_system_sign_list.php?topage=6">6</option>
                            <option value="/ad_system_sign_list.php?topage=7">7</option>
                            <option value="/ad_system_sign_list.php?topage=8">8</option>
                            <option value="/ad_system_sign_list.php?topage=9">9</option>
                            <option value="/ad_system_sign_list.php?topage=10">10</option>
                            <option value="/ad_system_sign_list.php?topage=11">11</option>
                            <option value="/ad_system_sign_list.php?topage=12">12</option>
                            <option value="/ad_system_sign_list.php?topage=13">13</option>
                            <option value="/ad_system_sign_list.php?topage=14">14</option>
                            <option value="/ad_system_sign_list.php?topage=15">15</option>
                            <option value="/ad_system_sign_list.php?topage=16">16</option>
                            <option value="/ad_system_sign_list.php?topage=17">17</option>
                            <option value="/ad_system_sign_list.php?topage=18">18</option>
                            <option value="/ad_system_sign_list.php?topage=19">19</option>
                            <option value="/ad_system_sign_list.php?topage=20">20</option>
                            <option value="/ad_system_sign_list.php?topage=21">21</option>
                            <option value="/ad_system_sign_list.php?topage=22">22</option>
                            <option value="/ad_system_sign_list.php?topage=23">23</option>
                            <option value="/ad_system_sign_list.php?topage=24">24</option>
                            <option value="/ad_system_sign_list.php?topage=25">25</option>
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
    function chk_form_system_sign() {
        if (!$("#system_sign_types").val()) {
            alert("請選擇意見類型");
            return false;
        }

        if (!$("#system_sign_note").val()) {
            alert("請輸入意見內容");
            return false;
        }
        return true;
    }

    function print_action() {
        if (!$("#start_time").val()) {
            alert("請選擇開始時間。");
            return false;
        }
        if (!$("#end_time").val()) {
            alert("請選擇結束時間。");
            return false;
        }
        Mars_popup('ad_system_sign_list_print.php?start_time=' + $("#start_time").val() + '&end_time=' + $("#end_time").val() + '', '', 'scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');
        return true;
    }
</script>