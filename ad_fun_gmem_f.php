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
            <li><a href="ad_fun_gmem.php">金卡俱樂部</a></li>
            <li class="active">金卡會員資料搜尋</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>金卡會員資料搜尋</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form id="searchform" action="ad_fun_gmem.php?vst=full" method="post" target="_self" class="form-inline">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td>手機：
                                    <input name="s2" type="text" id="s2" class="form-control" size="20" maxlength="10">
                                </td>
                            </tr>
                            <tr>
                                <td>姓名：
                                    <input name="s3" type="text" id="s3" class="form-control" size="20">
                                </td>
                            </tr>
                            <tr>
                                <td>編號：
                                    <input name="s4" type="text" id="s4" class="form-control" size="20">
                                </td>
                            </tr>
                            <tr>
                                <td>信箱：
                                    <input name="s1" type="text" id="s1" class="form-control" size="20">
                                </td>
                            </tr>
                            <tr>
                                <td>年次：
                                    <select name="s27" id="s27">
                                        <option value="" selected>請選擇</option>
                                        <option value="1931">1931</option>
                                        <option value="1932">1932</option>
                                        <option value="1933">1933</option>
                                        <option value="1934">1934</option>
                                        <option value="1935">1935</option>
                                        <option value="1936">1936</option>
                                        <option value="1937">1937</option>
                                        <option value="1938">1938</option>
                                        <option value="1939">1939</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>加入日期：
                                    <select name="s22" id="select2">
                                        <option value="" selected>請選擇</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                    </select>
                                    年
                                    <select name="s23" id="select3">
                                        <option value="">請選擇</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    月至
                                    <select name="s24" id="s24">
                                        <option value="" selected>請選擇</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                    </select>
                                    年
                                    <select name="s25" id="select4">
                                        <option value="" selected>請選擇</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    月
                                </td>
                            </tr>
                            <tr>
                                <td>性別：
                                    <select name="s21" id="s21">
                                        <option value="">請選擇</option>
                                        <option value="男">男</option>
                                        <option value="女">女</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>來源：
                                    <select name="s8" id="s8">
                                        <option value="">請選擇</option>
                                        <option value="媒體報導">媒體報導</option>
                                        <option value="CHEERS雜誌">CHEERS雜誌</option>
                                        <option value="好好玩旅行社">好好玩旅行社</option>
                                        <option value="好好玩旅行社官方粉絲團">好好玩旅行社官方粉絲團</option>
                                        <option value="手機版">手機版</option>
                                        <option value="1111人力銀行">1111人力銀行</option>
                                        <option value="好好玩APP">好好玩APP</option>
                                        <option value="企業福委">企業福委</option>
                                        <option value="ＤＭ訊息">ＤＭ訊息</option>
                                        <option value="網路新聞">網路新聞</option>
                                        <option value="好好玩手機未完成">好好玩手機未完成</option>
                                        <option value="2014國際旅展">2014國際旅展</option>
                                        <option value="問卷-單身旅遊意見調查">問卷-單身旅遊意見調查</option>
                                        <option value="春天會館客服">春天會館客服</option>
                                        <option value="活動宣傳">活動宣傳</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>自訂來源：
                                    <select name="s97" id="s97">
                                        <option value="">請選擇</option>
                                        <option value="banner_funtour_0120">banner_funtour_0120</option>
                                        <option value="banner_funtour_0528">banner_funtour_0528</option>
                                        <option value="banner_funtour_0531">banner_funtour_0531</option>
                                        <option value="blog_PhotoAds_Funtour">blog_PhotoAds_Funtour</option>
                                        <option value="Email_EDM_0518">Email_EDM_0518</option>
                                        <option value="Email_EDM_Angus">Email_EDM_Angus</option>
                                        <option value="facebook">facebook</option>
                                        <option value="FACEBOOK_FUNTOUR">FACEBOOK_FUNTOUR</option>
                                        <option value="facebook_funtour_0113">facebook_funtour_0113</option>
                                        <option value="facebook_macao">facebook_macao</option>
                                        <option value="facebook_pofiles">facebook_pofiles</option>
                                        <option value="FB_ActionLink_Funtour">FB_ActionLink_Funtour</option>
                                        <option value="FB_PhotoAds_Funtour">FB_PhotoAds_Funtour</option>
                                        <option value="funtour.springclub">funtour.springclub</option>
                                        <option value="funtour_app">funtour_app</option>
                                        <option value="funtour_homepage">funtour_homepage</option>
                                        <option value="funtour_lineat_dialogue">funtour_lineat_dialogue</option>
                                        <option value="funtourfb__pofiles">funtourfb__pofiles</option>
                                        <option value="line@">line@</option>
                                        <option value="line_funtour_day1230">line_funtour_day1230</option>
                                        <option value="LINEat_join">LINEat_join</option>
                                        <option value="Yahoo_cpc_Asiapac">Yahoo_cpc_Asiapac</option>
                                        <option value="憟賢末?呸PP?冽">憟賢末?呸PP?冽</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>第二來源：
                                    <select name="s12" id="s12">
                                        <option value="">請選擇</option>
                                        <option value="1030414edmg">1030414edmg</option>
                                        <option value="1030513edm">1030513edm</option>
                                        <option value="1030611edm">1030611edm</option>
                                        <option value="140306edmout">140306edmout</option>
                                        <option value="140326edm">140326edm</option>
                                        <option value="140331edm">140331edm</option>
                                        <option value="20140611大量匯入">20140611大量匯入</option>
                                        <option value="20140625edm">20140625edm</option>
                                        <option value="手機版回報系統新增">手機版回報系統新增</option>
                                        <option value="手機版回報系統補資">手機版回報系統補資</option>
                                        <option value="好好玩APP新增">好好玩APP新增</option>
                                        <option value="網頁版回報系統新增">網頁版回報系統新增</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>學歷：
                                    <select name="s10" id="s10">
                                        <option value="">請選擇</option>
                                        <option value="國中">國中</option>
                                        <option value="高中">高中</option>
                                        <option value="高職">高職</option>
                                        <option value="專科">專科</option>
                                        <option value="大學">大學</option>
                                        <option value="碩士">碩士</option>
                                        <option value="博士">博士</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>地區：
                                    <select name="s11" id="s11">
                                        <option value="">請選擇</option>
                                        <option value="台北">台北</option>
                                        <option value="桃園">桃園</option>
                                        <option value="新竹">新竹</option>
                                        <option value="台中">台中</option>
                                        <option value="台南">台南</option>
                                        <option value="高雄">高雄</option>
                                        <option value="廈門">廈門</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>處理情形：
                                    <select name="a1" id="a1">
                                        <option value="">請選擇</option>
                                        <option value="">請選擇</option>
                                        <option value="有意願">有意願</option>
                                        <option value="無意願">無意願</option>
                                        <option value="下次聯絡">下次聯絡</option>
                                        <option value="未接">未接</option>
                                        <option value="停話">停話</option>
                                        <option value="PASS春天">PASS春天</option>
                                        <option value="勿再聯絡">勿再聯絡</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>會館：
                                    <select name="s13" id="s13">
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
                                    </select> <select name="s14" id="s14">
                                        <option value="">請選擇</option>
                                    </select> <input style="width:2%;" data-no-uniform="true" type="checkbox" id="showout"> 顯示離職
                                </td>
                            </tr>
                            <tr>
                                <td>生日：
                                    <select name="m1" id="m1">
                                        <option value="">請選擇</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    月
                                    <select name="d1" id="d1">
                                        <option value="">請選擇</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select>
                                    日
                                </td>
                            </tr>
                            <tr>
                                <td>秘書：
                                    <select name="s7" id="s7" data-rel="chosen">
                                        <option value="">請選擇</option>
                                        <option value="A220444458">八德 - 蔡佩蓁 Sunny</option>
                                        <option value="Q220171748">八德 - 柯宥如 Maggie</option>
                                        <option value="A225272644">八德 - 李宜蓁</option>
                                        <option value="hannah561">八德 - 小娟</option>
                                        <option value="DMN168">八德 - 未接4次以上</option>
                                        <option value="li2003avon811">八德 - 年紀小名單</option>
                                        <option value="li2003avon812">八德 - 暫時拒絕</option>
                                        <option value="12345">八德 - 黑名單</option>
                                        <option value="A221335725">八德 - 柯婉儀</option>
                                        <option value="F223916876">八德 - 周靖雯 Bella</option>
                                        <option value="80662419">八德 - 八德督導</option>
                                        <option value="F789325416">八德 - 23</option>
                                        <option value="dmn_change">八德 - 八德暫存</option>
                                        <option value="H222863127">八德 - 詹惠驛 惠惠</option>
                                        <option value="E224763574">八德 - 于庭萱 LiLy</option>
                                        <option value="P220554746">八德 - 柯素月 Joy</option>
                                        <option value="dmn_re">八德 - 重覆名單</option>
                                        <option value="R223400283">八德 - 劉宜姍</option>
                                        <option value="dmn_nouse1">八德 - 會員結婚</option>
                                        <option value="dmn_nouse2">八德 - 已解約</option>
                                        <option value="H224439638">八德 - 林嘉芮 芮芮</option>
                                        <option value="F228382101">八德 - 杜佳臻 Macy</option>
                                        <option value="D220676391">台中 - 蔡筠芳</option>
                                        <option value="M122437155">台中 - 威威</option>
                                        <option value="T123456789">台中 - 諮詢老師</option>
                                        <option value="B222933600">台中 - 陳立姍</option>
                                        <option value="12345678">台中 - 嚴雋凱</option>
                                        <option value="L221200968">台中 - 鄭郁湘</option>
                                        <option value="T9734">台中 - 職代</option>
                                        <option value="li2003avon4">台中 - 年紀小名單</option>
                                        <option value="J222135030">台中 - 葉宇婕</option>
                                        <option value="K220837489">台中 - 彭春福</option>
                                        <option value="B221169053">台中 - 陳素娟</option>
                                        <option value="B290008801">台中 - 閻秋波</option>
                                        <option value="L220226173">台中 - 亞芳</option>
                                        <option value="97348077">台中 - 台中督導</option>
                                        <option value="B220673478">台中 - 洪瑄琳</option>
                                        <option value="T97348077">台中 - 台中會計</option>
                                        <option value="m220694029">台中 - 余致媛</option>
                                        <option value="B290038087">台中 - 劉咪秀</option>
                                        <option value="U220591646">台中 - 童芷琳</option>
                                        <option value="L221300427">台中 - 張嘉玲</option>
                                        <option value="tp23811348">台北 - 台北KEYIN</option>
                                        <option value="c220578291">台北 - 易珊</option>
                                        <option value="J220528313">台北 - 洪儀</option>
                                        <option value="F221677492">台北 - 寶兒FIONA</option>
                                        <option value="T89867482">台北 - 吳主任</option>
                                        <option value="F220056613">台北 - 詹明錡</option>
                                        <option value="E200969869">台北 - 陳紅</option>
                                        <option value="C200302406">台北 - 王英華</option>
                                        <option value="J220390453">台北 - 高語鍹</option>
                                        <option value="89867482">台北 - 台北督導</option>
                                        <option value="123456">台北 - 上傳</option>
                                        <option value="test">台北 - 排約測試</option>
                                        <option value="li2003avon1">台北 - 年紀小名單</option>
                                        <option value="A224876769">台北 - 林馨彤</option>
                                        <option value="T8986">台北 - Key</option>
                                        <option value="F226722661">台北 - 凱琳</option>
                                        <option value="N222722197">台北 - 暫存名單</option>
                                        <option value="T222722198">台北 - 目前交往中</option>
                                        <option value="A227850285">台北 - 李喬</option>
                                        <option value="A130353266">台北 - Ethan</option>
                                        <option value="A225553998">台北 - 陳玉涵</option>
                                        <option value="F227398614">台北 - 筱雅</option>
                                        <option value="X220343730">台南 - 楊慧菁</option>
                                        <option value="R224113654">台南 - 劉淑娟</option>
                                        <option value="tainan_change">台南 - 台南暫存</option>
                                        <option value="R224357076">台南 - 謝宜庭</option>
                                        <option value="L222010502">台南 - 胡淑貞</option>
                                        <option value="F224874199">台南 - 羅悠菁</option>
                                        <option value="R221392340">台南 - 王秀玲</option>
                                        <option value="D220569524">台南 - 薛惠心</option>
                                        <option value="R223935389">台南 - 匡湘璇</option>
                                        <option value="li2003avon5">台南 - 年紀小名單</option>
                                        <option value="r222285595">台南 - 錢淑華</option>
                                        <option value="12989178">台南 - 台南督導</option>
                                        <option value="E222367725">台南 - 吳琪雅</option>
                                        <option value="R222349969">台南 - 顏琇</option>
                                        <option value="S221372241">台南 - 趙素蕙</option>
                                        <option value="C220093239">台南 - 金雪娟</option>
                                        <option value="D221429903">台南 - 杜佳倩</option>
                                        <option value="m200712973">台南 - 李梅子</option>
                                        <option value="D120674564">台南 - 安東尼</option>
                                        <option value="T12989178">台南 - 台南會計</option>
                                        <option value="D220411283">台南 - 蒙芳敏</option>
                                        <option value="P222063220">台南 - 陳秀英</option>
                                        <option value="Grisha">好好玩旅行社 - 葛莉莎</option>
                                        <option value="13085797">好好玩旅行社 - 好好玩</option>
                                        <option value="V221540975">好好玩旅行社 - 若忻</option>
                                        <option value="A221143987">約專 - 張茹茵</option>
                                        <option value="sherry12345">約專 - 會計</option>
                                        <option value="T289867482">約專 - 約專紅娘</option>
                                        <option value="F223616899">約專 - 楊守芳</option>
                                        <option value="N220685478">約專 - 珍珍</option>
                                        <option value="U221312229">桃園 - 陳月鎂</option>
                                        <option value="E221945038">桃園 - 陳顗妃</option>
                                        <option value="H221157817">桃園 - 莊惠茹</option>
                                        <option value="H222683094">桃園 - 趙庭</option>
                                        <option value="H223772036">桃園 - 趙可涵</option>
                                        <option value="P223403139">桃園 - 黃毓淳</option>
                                        <option value="H224712507">桃園 - 孫貫耘</option>
                                        <option value="F225859887">桃園 - test點</option>
                                        <option value="li2003avon10">桃園 - 交往中</option>
                                        <option value="li2003avon11">桃園 - 暫存名單</option>
                                        <option value="li2003avon2">桃園 - 年紀小名單</option>
                                        <option value="H221182963">桃園 - 蔡美鳳</option>
                                        <option value="T79980443">桃園 - 桃園會計</option>
                                        <option value="p221236130">桃園 - 廖盈綺</option>
                                        <option value="J122099279">桃園 - 阿綸</option>
                                        <option value="H220342741">桃園 - 江琳</option>
                                        <option value="N220184047">桃園 - 連督導</option>
                                        <option value="j2022273744">桃園 - 彭淑慧</option>
                                        <option value="J220528457">桃園 - 郁靜</option>
                                        <option value="79980443">桃園 - 桃園會館</option>
                                        <option value="F226546509">迷你約 - 周羽潔</option>
                                        <option value="F111111111">迷你約 - 排約部</option>
                                        <option value="sara06291">迷你約 - 會計</option>
                                        <option value="A225796340">迷你約 - 侯懿芳</option>
                                        <option value="F227591704">迷你約 - 程立彤</option>
                                        <option value="E222406290">高雄 - 謝宛倫</option>
                                        <option value="X220282965">高雄 - 謝宛萍</option>
                                        <option value="li2003avon6">高雄 - 年紀小名單</option>
                                        <option value="B120228622">高雄 - 吳哥</option>
                                        <option value="E124188935">高雄 - 嚴子爲</option>
                                        <option value="T220352344">高雄 - 劉明英</option>
                                        <option value="kaohsiung_change">高雄 - 高雄暫存</option>
                                        <option value="E125818763">高雄 - 李鴻</option>
                                        <option value="T124166182">高雄 - 郭文旗</option>
                                        <option value="S123592187">高雄 - 江孟樺</option>
                                        <option value="E220126780">高雄 - 王心祈</option>
                                        <option value="13161979">高雄 - 高雄督導</option>
                                        <option value="S222486977">高雄 - 沈海妮</option>
                                        <option value="E221011180">高雄 - 陳金鳳</option>
                                        <option value="E220856514">高雄 - 吳鳳英</option>
                                        <option value="E220911823">高雄 - 蕭雪麗</option>
                                        <option value="S122624117">高雄 - 姜沛紳</option>
                                        <option value="E224004114">高雄 - 怡君</option>
                                        <option value="E290076419">高雄 - 倪子淇</option>
                                        <option value="9717077">高雄 - KEYIN</option>
                                        <option value="T222629946">高雄 - 楊繡瑟</option>
                                        <option value="E220592364">高雄 - 李順慈</option>
                                        <option value="E223239266">高雄 - 藍淑貞</option>
                                        <option value="E221370746">高雄 - 謝璧如</option>
                                        <option value="E220217875">高雄 - 顏安妮</option>
                                        <option value="E223727396">高雄 - Amy</option>
                                        <option value="Q221566438">新竹 - 黃亮亮</option>
                                        <option value="k220855834">新竹 - 王敏之</option>
                                        <option value="j220142760">新竹 - 楊淑梅</option>
                                        <option value="C220462118">新竹 - 邱卉欣</option>
                                        <option value="J221115712">新竹 - 劉恩妮</option>
                                        <option value="16922467">新竹 - 新竹督導</option>
                                        <option value="O200299432">新竹 - 林羽柔</option>
                                        <option value="li2003avon3">新竹 - 年紀小名單</option>
                                        <option value="J220257944">新竹 - 陳淑惠</option>
                                        <option value="F227296026">新竹 - 妍瑀</option>
                                        <option value="J220097108">新竹 - 彭惠芝</option>
                                        <option value="H221009183">新竹 - 素蘭</option>
                                        <option value="JACK0906">總管理處 - JACK</option>
                                        <option value="tsaiwen216">總管理處 - 采雯</option>
                                        <option value="u9033025">總管理處 - Zoe周羿彤老師</option>
                                        <option value="202104list">總管理處 - 202104名單</option>
                                        <option value="F121287192">總管理處 - 董事長</option>
                                        <option value="system_linepoint">總管理處 - LINEPOINT</option>
                                        <option value="Q12345">總管理處 - 瑪那熊</option>
                                        <option value="DMNDMN">總管理處 - DMN名單</option>
                                        <option value="li2003avon">總管理處 - 回收名單</option>
                                        <option value="F555645667">總管理處 - TEST別名</option>
                                        <option value="20190719list">總管理處 - 暫存名單</option>
                                        <option value="nouse1">總管理處 - 無效名單</option>
                                        <option value="nouse2">總管理處 - 已結婚</option>
                                        <option value="nouse3">總管理處 - 空號</option>
                                        <option value="candy8060">總管理處 - 宜君</option>
                                        <option value="li2003avon818">總管理處 - 會員結婚</option>
                                        <option value="single">總管理處 - 秋如</option>
                                        <option value="li6954029">總管理處 - 黎總經理</option>
                                        <option value="hannah0807">總管理處 - 曉娟</option>
                                        <option value="F220902530">總管理處 - zoe</option>
                                        <option value="sheery03130513">總管理處 - 點點</option>
                                        <option value="funpm">總管理處 - 瑜婷</option>
                                        <option value="kyoe">總管理處 - 澔翰</option>
                                    </select><input type="hidden" name="sear" value="1">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="reset" name="reset" value="清空條件" style="height:28px;">　<input type="submit" name="Submit" value="開始搜尋" style="height:28px;"></td>
                            </tr>
                            </font>
                    </table>
                </form>
                </td>
                </tr>
                </tbody>
                </table>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    <hr>

    <footer>
    </footer>
    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script language="JavaScript">
    $mtu = "ad_fun_gmem."; <
    !--
    $(function() {
        $("#s13").on("change", function() {
            personnel_get("s13", "s14");
        });
        $("#showout").on("click", function() {
            if (!$("#s13").val()) {
                alert("請先選擇會館。");
                $(this).prop("checked", false);
                return false;
            }
            if ($(this).prop("checked")) {
                personnel_get_funsend("s13", "s14", 1);
            } else {
                personnel_get_funsend("s13", "s14", 0);
            }
        });
    });
    -- >
</script>