<?php
require_once("_inc.php");
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
            <li class="active">行銷活動統計</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>行銷活動統計</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form action="?st=send" method="post" name="counts_form" id="counts_form" onsubmit="return check_form()">
                    <p>請選擇時段：<input type="text" name="start_time" id="start_time" class="datepicker" autocomplete="off" value="">　～　<input type="text" name="end_time" id="end_time" class="datepicker" autocomplete="off" value="">　<select id="fasttime" onchange="fast_sel_time($(this).val())">
                            <option value="">快速選擇</option>
                            <option value="0">今天</option>
                            <option value="1">昨天</option>
                            <option value="2">前天</option>
                            <option value="3">本周</option>
                            <option value="4">上周</option>
                            <option value="5">本月</option>
                            <option value="6">上月</option>
                            <option value="7">今年</option>
                            <option value="8">去年</option>
                        </select></p>
                    <p>
                        <!--<a data-toggle="collapse" href="#marking_action_list" data-parent="#menu_group" class="btn btn-info">活動選擇</a>--><input id="send_submit" type="submit" class="btn btn-default" value="送出">
                    <div class="" id="marking_action_list">
                        <div>
                            <!--<label><input type="checkbox" id="allcheckbox"> 全選</label>
						  	<label><input type="checkbox" id="allcheckbox2"> 春天會館全選</label>
						  	<label><input type="checkbox" id="allcheckbox3"> DateMeNow全選</label>
						  	<label><input type="checkbox" id="allcheckbox4"> 約會專家全選</label>-->
                        </div>


                        <ul class="nav nav-tabs">
                            <li class="nav-item active">
                                <a class="nav-link" data-toggle="tab" href="#tab1">春天會館</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab2">DateMeNow</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab3">約會專家</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane fade in active"><label><input type="checkbox" id="allcheckbox2"> 全選</label>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="186"> [春天會館] 2021/10/5 - 春天會館5倍券</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="187"> [春天會館] 2021/10/5 - 春天會館5倍券-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="178"> [春天會館] 2021/7/10 - 窩在家也能開啟浪漫約會</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="179"> [春天會館] 2021/7/10 - 窩在家也能開啟浪漫約會-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="176"> [春天會館] 2021/6/25 - 單身交友約會聯誼活動</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="177"> [春天會館] 2021/6/25 - 單身交友約會聯誼活動-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="168"> [春天會館] 2021/5/28 - 來一場認真安全交友</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="169"> [春天會館] 2021/5/28 - 來一場認真安全交友-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="164"> [春天會館] 2021/5/25 - 現代月老陪你戀愛交友</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="165"> [春天會館] 2021/5/25 - 現代月老陪你戀愛交友-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="156"> [春天會館] 2021/4/8 - 202104名單</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="154"> [春天會館] 2021/3/15 - 七分鐘找出你的理想情人</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="155"> [春天會館] 2021/3/15 - 七分鐘找出你的理想情人-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="144"> [春天會館] 2020/12/1 - 線上祈福戀愛御守</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="145"> [春天會館] 2020/12/1 - 線上祈福戀愛御守-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="138"> [春天會館] 2020/9/10 - 你在愛情中是哪一種情人</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="139"> [春天會館] 2020/9/10 - 你在愛情中是哪一種情人-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="134"> [春天會館] 2020/7/15 - 愛情電力脫單指數</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="135"> [春天會館] 2020/7/15 - 愛情電力脫單指數-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="112"> [春天會館] 2019/8/1 - 想找好對象請到這兒來</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="113"> [春天會館] 2019/8/1 - 想找好對象請到這兒來-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="111"> [春天會館] 2019/7/20 - 201907名單</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="107"> [春天會館] 2019/7/20 - 你與妳將與幸福隨行</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="108"> [春天會館] 2019/7/20 - 你與妳將與幸福隨行-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="81"> [春天會館] 2019/5/5 - 團拜月老廟</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="82"> [春天會館] 2019/5/5 - 團拜月老廟-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="69"> [春天會館] 2019/5/1 - 生命靈數測驗</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="70"> [春天會館] 2019/5/1 - 生命靈數測驗-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="79"> [春天會館] 2019/4/25 - 戀愛不歪腰</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="80"> [春天會館] 2019/4/25 - 戀愛不歪腰-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="67"> [春天會館] 2019/4/1 - 你最近3個月桃花指數有多高</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="68"> [春天會館] 2019/4/1 - 你最近3個月桃花指數有多高-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="61"> [春天會館] 2018/11/20 - 對的時間遇見對的人</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="62"> [春天會館] 2018/11/20 - 對的時間遇見對的人-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="49"> [春天會館] 2018/9/20 - 線上召喚女神</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="50"> [春天會館] 2018/9/20 - 線上召喚女神-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="58"> [春天會館] 2018/9/20 - 線上召喚女神-APP</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="45"> [春天會館] 2018/8/1 - 對的時間，遇見愛情</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="46"> [春天會館] 2018/8/1 - 對的時間，遇見愛情-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="47"> [春天會館] 2018/8/1 - 愛情五Go力</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="48"> [春天會館] 2018/8/1 - 愛情五Go力-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="95"> [春天會館] 2018/8/1 - 今年告別單身戀愛去</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="96"> [春天會館] 2018/8/1 - 今年告別單身戀愛去-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="40"> [春天會館] 2018/6/1 - 手機號碼看你的桃花愛情</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="41"> [春天會館] 2018/6/1 - 手機號碼看你的桃花愛情-橙果</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="42"> [春天會館] 2018/6/1 - 手機號碼看你的桃花愛情-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="38"> [春天會館] 2018/5/10 - 12星座單身的原因</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="39"> [春天會館] 2018/5/10 - 12星座單身的原因-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="33"> [春天會館] 2018/4/1 - 12生肖看戀愛運</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="34"> [春天會館] 2018/4/1 - 12生肖看戀愛運-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="30"> [春天會館] 2018/3/1 - 我很棒為何還是單身</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="19"> [春天會館] 2017/9/30 - 人生不能沒有伴</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="18"> [春天會館] 2017/9/20 - 雲端月老廟-月老姻緣靈籤</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="15"> [春天會館] 2017/8/1 - 精緻約會尋找愛情</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="13"> [春天會館] 2017/6/10 - 這樣說，那樣愛</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="10"> [春天會館] 2017/4/30 - 春天迎桃花</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="12"> [春天會館] 2017/4/30 - 春天迎桃花-APP</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="1"> [春天會館] 2017/2/25 - 雲端月老廟-點亮姻緣燈</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="4"> [春天會館] 2017/2/1 - 仲夏童話七夕情</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="5"> [春天會館] 2017/2/1 - 天公疼好人活動</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="93"> [春天會館] 2016/12/31 - 如何增加自己的戀愛運？</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="94"> [春天會館] 2016/12/31 - 如何增加自己的戀愛運？-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="103"> [春天會館] 2016/9/30 - 單身菁英男孩</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="104"> [春天會館] 2016/9/30 - 單身菁英男孩-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="7"> [春天會館] 2016/6/24 - 雲端月老廟-APP</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="2"> [春天會館] 2016/6/24 - 雲端月老廟</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="101"> [春天會館] 2016/6/1 - 元氣女孩</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="102"> [春天會館] 2016/6/1 - 元氣女孩-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="97"> [春天會館] 2016/4/1 - 閃耀愛情，近乎苛求</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="98"> [春天會館] 2016/4/1 - 閃耀愛情，近乎苛求-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="89"> [春天會館] 2016/2/20 - 12星座男生遇到喜歡女生的表現</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="90"> [春天會館] 2016/2/20 - 12星座男生遇到喜歡女生的表現-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="91"> [春天會館] 2016/1/10 - 人生最好的禮物</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="92"> [春天會館] 2016/1/10 - 人生最好的禮物-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="109"> [春天會館] 2015/8/16 - 仲夏童話七夕情</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="110"> [春天會館] 2015/8/16 - 仲夏童話七夕情-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="99"> [春天會館] 2015/3/1 - 戀愛志工</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="春天會館" value="100"> [春天會館] 2015/3/1 - 戀愛志工-手機版</label></p>
                            </div>
                            <div id="tab2" class="tab-pane fade in"><label><input type="checkbox" id="allcheckbox3"> 全選</label>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="184"> [DateMeNow] 2021/10/7 - 振興5倍券幸福更加倍</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="185"> [DateMeNow] 2021/10/7 - 振興5倍券幸福更加倍-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="172"> [DateMeNow] 2021/6/10 - 讓美好的你遇見美好的他</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="173"> [DateMeNow] 2021/6/10 - 讓美好的你遇見美好的他-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="162"> [DateMeNow] 2021/5/25 - DMN不出門也要好好談戀愛</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="163"> [DateMeNow] 2021/5/25 - DMN不出門也要好好談戀愛-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="142"> [DateMeNow] 2020/11/15 - 2021年12星座愛情指數測驗</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="143"> [DateMeNow] 2020/11/15 - 2021年12星座愛情指數測驗-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="130"> [DateMeNow] 2020/5/10 - 穩定交往的秘訣</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="131"> [DateMeNow] 2020/5/10 - 穩定交往的秘訣-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="116"> [DateMeNow] 2019/11/15 - 2020年12星座愛情指數測驗</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="117"> [DateMeNow] 2019/11/15 - 2020年12星座愛情指數測驗-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="75"> [DateMeNow] 2019/4/10 - 檢測你的戀愛觀念_行銷</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="76"> [DateMeNow] 2019/4/10 - 檢測你的戀愛觀念_訪客</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="63"> [DateMeNow] 2019/1/10 - 生日測桃花</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="64"> [DateMeNow] 2019/1/10 - 生日測桃花-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="54"> [DateMeNow] 2018/10/10 - 真愛旅程</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="55"> [DateMeNow] 2018/10/10 - 真愛旅程-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="52"> [DateMeNow] 2018/10/1 - 與愛神同行</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="53"> [DateMeNow] 2018/10/1 - 與愛神同行-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="43"> [DateMeNow] 2018/6/10 - DateMeNow戀愛分析量表</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="44"> [DateMeNow] 2018/6/10 - DateMeNow戀愛分析量表-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="35"> [DateMeNow] 2018/4/15 - 2018年12星座愛情指數測驗-APP</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="36"> [DateMeNow] 2018/4/15 - 戀愛神社</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="37"> [DateMeNow] 2018/4/15 - 戀愛神社-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="31"> [DateMeNow] 2018/3/10 - 上班族不能不約會</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="32"> [DateMeNow] 2018/3/10 - 上班族不能不約會-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="26"> [DateMeNow] 2018/1/1 - 2018年12星座愛情指數測驗</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="27"> [DateMeNow] 2018/1/1 - DateMeNow介紹頁</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="28"> [DateMeNow] 2018/1/1 - DateMeNow介紹頁-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="29"> [DateMeNow] 2018/1/1 - DateMeNow介紹頁-APP</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="21"> [DateMeNow] 2017/10/30 - 戀愛必勝十倍奉還</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="22"> [DateMeNow] 2017/10/30 - 戀愛必勝十倍奉還-APP</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="23"> [DateMeNow] 2017/9/30 - 單身無懼-APP</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="20"> [DateMeNow] 2017/9/30 - 單身無懼</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="16"> [DateMeNow] 2017/8/10 - 愛情學分班</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="17"> [DateMeNow] 2017/8/10 - 愛情學分班-APP</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="8"> [DateMeNow] 2017/4/27 - 邱比特測字</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="DateMeNow" value="9"> [DateMeNow] 2017/4/27 - 邱比特測字-APP</label></p>
                            </div>
                            <div id="tab3" class="tab-pane fade in"><label><input type="checkbox" id="allcheckbox4"> 全選</label>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="182"> [約會專家] 2021/10/5 - 幸福五倍券</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="183"> [約會專家] 2021/10/5 - 幸福五倍券-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="180"> [約會專家] 2021/7/25 - Online聯誼交友趣</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="181"> [約會專家] 2021/7/25 - Online聯誼交友趣-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="174"> [約會專家] 2021/6/25 - 迷你塔羅愛情占卜</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="175"> [約會專家] 2021/6/25 - 迷你塔羅愛情占卜-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="170"> [約會專家] 2021/6/1 - 結合實體與線上的交友新體驗</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="171"> [約會專家] 2021/6/1 - 結合實體與線上的交友新體驗-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="166"> [約會專家] 2021/5/26 - 防疫一起來視訊排約</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="167"> [約會專家] 2021/5/26 - 防疫一起來視訊排約-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="160"> [約會專家] 2021/5/25 - 不出門也要好好談戀愛</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="161"> [約會專家] 2021/5/25 - 不出門也要好好談戀愛-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="158"> [約會專家] 2021/5/15 - 約專簡訊專頁</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="159"> [約會專家] 2021/5/15 - 約專簡訊專頁-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="152"> [約會專家] 2021/3/10 - 戀愛決勝盤</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="153"> [約會專家] 2021/3/10 - 戀愛決勝盤-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="146"> [約會專家] 2020/12/25 - 單身剋星_LINEPOINT</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="147"> [約會專家] 2020/12/25 - 單身剋星_LINEPOINT-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="150"> [約會專家] 2020/12/20 - 女子時光</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="151"> [約會專家] 2020/12/20 - 女子時光-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="148"> [約會專家] 2020/12/15 - 天菜底家啦</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="149"> [約會專家] 2020/12/15 - 天菜底家啦-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="140"> [約會專家] 2020/9/25 - 小資想婚成家專案</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="141"> [約會專家] 2020/9/25 - 小資想婚成家專案-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="136"> [約會專家] 2020/8/1 - 七夕振興券活動</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="137"> [約會專家] 2020/8/1 - 七夕振興券活動-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="132"> [約會專家] 2020/6/10 - 一對一約會</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="133"> [約會專家] 2020/6/10 - 一對一約會-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="128"> [約會專家] 2020/4/25 - 我的約會初體驗</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="129"> [約會專家] 2020/4/25 - 我的約會初體驗-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="126"> [約會專家] 2020/4/15 - 陪你疫起過情關</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="127"> [約會專家] 2020/4/15 - 陪你疫起過情關-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="124"> [約會專家] 2020/2/10 - 不出門，也能認識對的人</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="125"> [約會專家] 2020/2/10 - 不出門，也能認識對的人-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="118"> [約會專家] 2020/1/1 - 體驗排約</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="119"> [約會專家] 2020/1/1 - 體驗課程</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="120"> [約會專家] 2020/1/1 - 體驗諮詢</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="121"> [約會專家] 2020/1/1 - 體驗排約-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="122"> [約會專家] 2020/1/1 - 體驗課程-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="123"> [約會專家] 2020/1/1 - 體驗諮詢-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="114"> [約會專家] 2019/11/25 - 你的戀愛能力有多強</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="115"> [約會專家] 2019/10/25 - 你的戀愛能力有多強-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="105"> [約會專家] 2019/7/20 - 愛情童話</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="106"> [約會專家] 2019/7/20 - 愛情童話-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="87"> [約會專家] 2019/7/10 - 夏日戀情</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="88"> [約會專家] 2019/7/10 - 夏日戀情-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="85"> [約會專家] 2019/6/20 - 愛情實驗室</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="86"> [約會專家] 2019/6/20 - 愛情實驗室-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="83"> [約會專家] 2019/5/25 - 我在約會專家戀愛惹</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="84"> [約會專家] 2019/5/25 - 我在約會專家戀愛惹-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="77"> [約會專家] 2019/4/20 - 嘿一起出去玩吧_企業</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="78"> [約會專家] 2019/4/20 - 嘿一起出去玩吧_企業-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="73"> [約會專家] 2019/4/11 - 預約吧戀愛會客室</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="74"> [約會專家] 2019/4/11 - 預約吧戀愛會客室-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="65"> [約會專家] 2019/2/25 - 邱比特幫幫我</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="66"> [約會專家] 2019/2/25 - 邱比特幫幫我-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="59"> [約會專家] 2018/11/10 - 嘿一起出去玩吧</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="60"> [約會專家] 2018/11/10 - 嘿一起出去玩吧-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="56"> [約會專家] 2018/11/1 - 十年後</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="57"> [約會專家] 2018/11/1 - 十年後-手機版</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="51"> [約會專家] 2018/10/1 - 徵心啟事</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="25"> [約會專家] 2017/12/1 - 2017約會專家真人免費認證</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="24"> [約會專家] 2017/10/30 - 九型戀愛人格分析</label></p>
                                <p><label><input type="checkbox" name="marking_list" data-web="約會專家" value="14"> [約會專家] 2017/8/1 - 夏日璀璨之星</label></p>
                            </div>
                        </div>
                    </div>
                    </p>
                </form>

                </table>

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

        $("#allcheckbox").on("click", function() {
            if ($(this).prop("checked"))
                $("input[name='marking_list']").each(function() {
                    $(this).prop("checked", true);
                });
            else
                $("input[name='marking_list']").each(function() {
                    $(this).prop("checked", false);
                });
        });

        $("#allcheckbox2").on("click", function() {
            $("#allcheckbox3, #allcheckbox4, input[name='marking_list']").prop("checked", false);
            if ($(this).prop("checked"))
                $("input[name='marking_list']").each(function() {
                    if ($(this).data("web") == "春天會館") $(this).prop("checked", true);
                });
            else
                $("input[name='marking_list']").each(function() {
                    if ($(this).data("web") == "春天會館") $(this).prop("checked", false);
                });
        });

        $("#allcheckbox3").on("click", function() {
            $("#allcheckbox2, #allcheckbox4, input[name='marking_list']").prop("checked", false);
            if ($(this).prop("checked"))
                $("input[name='marking_list']").each(function() {
                    if ($(this).data("web") == "DateMeNow") $(this).prop("checked", true);
                });
            else
                $("input[name='marking_list']").each(function() {
                    if ($(this).data("web") == "DateMeNow") $(this).prop("checked", false);
                });
        });

        $("#allcheckbox4").on("click", function() {
            $("#allcheckbox2, #allcheckbox3, input[name='marking_list']").prop("checked", false);
            if ($(this).prop("checked"))
                $("input[name='marking_list']").each(function() {
                    if ($(this).data("web") == "約會專家") $(this).prop("checked", true);
                });
            else
                $("input[name='marking_list']").each(function() {
                    if ($(this).data("web") == "約會專家") $(this).prop("checked", false);
                });
        });

    });
    Date.prototype.DateAdd = function(strInterval, Number) {
        var dtTmp = this;
        switch (strInterval) {
            case 's':
                return new Date(Date.parse(dtTmp) + (1000 * Number));
            case 'n':
                return new Date(Date.parse(dtTmp) + (60000 * Number));
            case 'h':
                return new Date(Date.parse(dtTmp) + (3600000 * Number));
            case 'd':
                return new Date(Date.parse(dtTmp) + (86400000 * Number));
            case 'w':
                return new Date(Date.parse(dtTmp) + ((86400000 * 7) * Number));
            case 'q':
                return new Date(dtTmp.getFullYear(), (dtTmp.getMonth()) + Number * 3, dtTmp.getDate(), dtTmp.getHours(), dtTmp.getMinutes(), dtTmp.getSeconds());
            case 'm':
                return new Date(dtTmp.getFullYear(), (dtTmp.getMonth()) + Number, dtTmp.getDate(), dtTmp.getHours(), dtTmp.getMinutes(), dtTmp.getSeconds());
            case 'y':
                return new Date((dtTmp.getFullYear() + Number), dtTmp.getMonth(), dtTmp.getDate(), dtTmp.getHours(), dtTmp.getMinutes(), dtTmp.getSeconds());
        }
    }

    function check_form() {
        if (!$("#start_time").val()) {
            alert("請輸入開始時段。");
            $("#start_time").focus();
            return false;
        }
        if (!$("#end_time").val()) {
            alert("請輸入結束時段。");
            $("#end_time").focus();
            return false;
        }
        if (isNaN(Date.parse($("#start_time").val()))) {
            alert("你輸入的開始時段不是日期格式。");
            $("#start_time").val("");
            $("#start_time").focus();
            return false;
        }
        if (isNaN(Date.parse($("#end_time").val()))) {
            alert("你輸入的結束時段不是日期格式。");
            $("#end_time").val("");
            $("#end_time").focus();
            return false;
        }
        if ($("input[name='marking_list']:checked").length <= 0) {
            alert("請選擇活動。");
            $("#marking_action_list").collapse("show");
            return false;
        }
        return true;
    }

    function GetDateStr(AddDayCount) {
        var dd = new Date();
        dd.setDate(dd.getDate() + AddDayCount);
        return dd.pattern("yyyy-MM-dd");
    }
    Date.prototype.pattern = function(fmt) {
        var o = {
            "M+": this.getMonth() + 1, //月份     
            "d+": this.getDate(), //日     
            "h+": this.getHours() % 12 == 0 ? 12 : this.getHours() % 12, //小?     
            "H+": this.getHours(), //小?     
            "m+": this.getMinutes(), //分     
            "s+": this.getSeconds(), //秒     
            "q+": Math.floor((this.getMonth() + 3) / 3), //季度     
            "S": this.getMilliseconds() //毫秒     
        };
        var week = {
            "0": "\u65e5",
            "1": "\u4e00",
            "2": "\u4e8c",
            "3": "\u4e09",
            "4": "\u56db",
            "5": "\u4e94",
            "6": "\u516d"
        };
        if (/(y+)/.test(fmt)) {
            fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        }
        if (/(E+)/.test(fmt)) {
            fmt = fmt.replace(RegExp.$1, ((RegExp.$1.length > 1) ? (RegExp.$1.length > 2 ? "\u661f\u671f" : "\u5468") : "") + week[this.getDay() + ""]);
        }
        for (var k in o) {
            if (new RegExp("(" + k + ")").test(fmt)) {
                fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
            }
        }
        return fmt;
    }
    var today = new Date();
    var _day = 1000 * 60 * 60 * 24;

    this.getThisWeekDate = getThisWeekDate;
    this.getPrevWeekDate = getPrevWeekDate;
    this.getThisMonthDate = getThisMonthDate;
    this.getPrevMonthDate = getPrevMonthDate;
    this.getThisYearDate = getThisYearDate;
    this.getPrevYearDate = getPrevYearDate;

    function getThisWeekDate() {
        // 第一天日期
        var firstDay = new Date(today - (today.getDay() - 1) * _day);
        // 最后一天日期
        var lastDay = new Date((firstDay * 1) + 6 * _day);
        return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
    }

    function getPrevWeekDate() {
        // 取上周?束日期
        var lastDay = new Date(today - (today.getDay()) * _day);
        // 取上周?始日期
        var firstDay = new Date((lastDay * 1) - 6 * _day);
        return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
    }

    function getThisMonthDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear(), today.getMonth() + 1, 1);
        var lastDay = new Date(nextDat - _day);
        return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
    }

    function getPrevMonthDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear(), today.getMonth() - 1, 1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear(), today.getMonth(), 1);
        var lastDay = new Date(nextDat - _day);
        return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
    }

    function getThisYearDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear(), 0, 1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear() + 1, 0, 1);
        var lastDay = new Date(nextDat - _day);
        return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
    }

    function getPrevYearDate() {
        // 第一天日期
        var firstDay = new Date(today.getFullYear() - 1, 0, 1);
        // 最后一天日期
        var nextDat = new Date(today.getFullYear(), 0, 1);
        var lastDay = new Date(nextDat - _day);
        return [firstDay.pattern("yyyy-MM-dd"), lastDay.pattern("yyyy-MM-dd")];
    }

    function fast_sel_time(flag) {
        switch (flag) {
            case "0":
                $("#start_time").val(GetDateStr(0));
                $("#end_time").val(GetDateStr(0));
                break;
            case "1":
                $("#start_time").val(GetDateStr(-1));
                $("#end_time").val(GetDateStr(-1));
                break;
            case "2":
                $("#start_time").val(GetDateStr(-2));
                $("#end_time").val(GetDateStr(-2));
                break;
            case "3":
                $("#start_time").val(getThisWeekDate()[0]);
                $("#end_time").val(getThisWeekDate()[1]);
                break;
            case "4":
                $("#start_time").val(getPrevWeekDate()[0]);
                $("#end_time").val(getPrevWeekDate()[1]);
                break;
            case "5":
                $("#start_time").val(getThisMonthDate()[0]);
                $("#end_time").val(getThisMonthDate()[1]);
                break;
            case "6":
                $("#start_time").val(getPrevMonthDate()[0]);
                $("#end_time").val(getPrevMonthDate()[1]);
                break;
            case "7":
                $("#start_time").val(getThisYearDate()[0]);
                $("#end_time").val(getThisYearDate()[1]);
                break;
            case "8":
                $("#start_time").val(getPrevYearDate()[0]);
                $("#end_time").val(getPrevYearDate()[1]);
                break;
        }
    }
</script>