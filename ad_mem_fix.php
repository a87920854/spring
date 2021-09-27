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
            <li class="active">修改會員資料 - 2080022</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>修改會員資料 - 2080022</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p>
                    <a class="btn btn-primary" href="ad_mem_detail.php?mem_num=2080022">基本資料</a>
                    <a class="btn btn-blue" href="ad_mem_fix.php?mem_num=2080022"><i class="fa fa-arrow-right" style="margin-top:3px;"></i>修改資料</a>
                    <a class="btn btn-info" href="ad_mem_service.php?mem_num=2080022">服務紀錄</a>
                    <a class="btn btn-danger" href="ad_mem_ptest.php?mem_num=2080022">心理測驗</a>
                    <a class="btn btn-warning" href="ad_mem_login_log.php?mem_num=2080022">登入紀錄</a>
                    <a class="btn btn-dirtygreen" href="ad_important_paper.php?mem_num=2080022">紙本資料</a>
                </p>

                <form id="sform" action="?state=add" method="post" name="form5" onSubmit="return chk_form()" data-cansend="0" class="form-inline">
                    <table class="table table-striped table-bordered bootstrap-datatable input_small">
                        <tr>
                            <td style="font-size:150%;color:blue"><b>基本資料</b></td>
                        </tr>
                        <tr>
                            <td>


                                <font color="#FF0000">會員權益</font>：

                                <select name="mem_level" id="mem_level">
                                    <option value="guest">未入會</option>
                                    <option value="2">真人認證會員</option>
                                    <option value="10">菁英專案-三個月</option>
                                    <option value="11">菁英專案-六個月</option>
                                    <option value="3" selected>璀璨會員-一年期</option>
                                    <option value="5">璀璨會員-二年期</option>
                                    <option value="4">璀璨VIP會員-一年期</option>
                                    <option value="6">璀璨VIP會員-二年期</option>
                                </select>

                                <select name="ispay" id="ispay">
                                    <option value="0" selected>完款</option>
                                    <option value="1">付訂</option>
                                </select>

                                <input type="hidden" name="now_mem_level" id="now_mem_level" value="mem">

                                　
                                待服務名單：
                                <select name="mem_s1" id="select14">

                                    <option value="無" selected>無</option>
                                    <option value="有">有</option>
                                </select>

                            </td>
                        </tr>

                        <tr>
                            <td>
                                <font color=green>受理</font>：

                                <select name="mem_branch" id="mem_branch" required>
                                    <option value="">請選擇</option>
                                    <option value="台北">台北</option>
                                    <option value="桃園">桃園</option>
                                    <option value="新竹">新竹</option>
                                    <option value="台中">台中</option>
                                    <option value="台南" selected>台南</option>
                                    <option value="高雄">高雄</option>
                                    <option value="八德">八德</option>
                                    <option value="約專">約專</option>
                                    <option value="迷你約">迷你約</option>
                                    <option value="總管理處">總管理處</option>
                                </select>
                                <select name="mem_single" id="mem_single">
                                    <option value="">請選擇</option>
                                    <option value="D221429903" selected>杜佳倩</option>
                                </select>


                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=green>排約</font>：

                                <select name="love_single" id="love_single">
                                    <option value="">請選擇</option>
                                    <option value="R222349969" selected>顏琇</option>
                                </select>


                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=green>邀約</font>：

                                <select name="call_branch" id="call_branch">
                                    <option value="">請選擇</option>
                                    <option value="台北">台北</option>
                                    <option value="桃園">桃園</option>
                                    <option value="新竹">新竹</option>
                                    <option value="台中">台中</option>
                                    <option value="台南">台南</option>
                                    <option value="高雄" selected>高雄</option>
                                    <option value="八德">八德</option>
                                    <option value="約專">約專</option>
                                    <option value="迷你約">迷你約</option>
                                    <option value="總管理處">總管理處</option>
                                </select>
                                <select name="call_single" id="call_single">
                                    <option value="">請選擇</option>
                                    <option value="E290076419" selected>倪子淇</option>
                                </select>

                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;電訪員：倪子棋　　


                            </td>
                        </tr>

                        <tr>
                            <td>參加卡別：
                                <select name="mem_join" id="mem_join">
                                    <option value="0">無</option>
                                    <option value="107">真人認證</option>
                                    <option value="210">菁英專案三個月</option>
                                    <option value="211">菁英專案六個月</option>
                                    <option value="1" selected="selected">璀璨一年</option>
                                    <option value="200">璀璨一年+Ｍatch1</option>
                                    <option value="201">璀璨一年+尊榮一年</option>
                                    <option value="202">尊榮一年</option>
                                    <option value="203">璀璨頂級VIP一年</option>

                                    <option value="208">菁英約會一年</option>
                                    <option value="209">魅力成長一年</option>

                                    <option value="2">璀璨二年</option>
                                    <option value="204">璀璨二年+Ｍatch2</option>
                                    <option value="205">璀璨二年+尊榮二年</option>
                                    <option value="206">尊榮二年</option>
                                    <option value="207">璀璨頂級VIP二年</option>

                                    <option value="6">Match1</option>
                                    <option value="7">Match2</option>

                                    <option value="3">互動式</option>
                                    <option value="4">排約式</option>
                                    <option value="36">臨時卡</option>
                                    <option value="106">專案</option>
                                    <option value="101">黃金</option>
                                    <option value="102">鈦金</option>
                                    <option value="103">鑽金</option>
                                    <option value="104">藍鑽</option>
                                    <option value="105">彩鑽</option>
                                    <option value="212">VIP-三個月</option>
                                    <option value="213">VIP-六個月</option>
                                    <option value="214">VIP-十二個月</option>
                                    <option value="215">VIP-十五個月</option>
                                    <option value="216">VVIP-三個月</option>
                                    <option value="217">VVIP-六個月</option>
                                    <option value="218">VVIP-十二個月</option>

                                </select>
                                &nbsp;&nbsp;
                                入會日期：

                                <select name="mem_jy" id="mem_jy">
                                    <option value="">請選擇</option>
                                    <option value="2021" selected>2021 年</option>
                                    <option value="2020">2020 年</option>
                                    <option value="2019">2019 年</option>
                                    <option value="2018">2018 年</option>
                                    <option value="2017">2017 年</option>
                                    <option value="2016">2016 年</option>
                                    <option value="2015">2015 年</option>
                                    <option value="2014">2014 年</option>
                                    <option value="2013">2013 年</option>
                                    <option value="2012">2012 年</option>
                                    <option value="2011">2011 年</option>
                                    <option value="2010">2010 年</option>
                                    <option value="2009">2009 年</option>
                                    <option value="2008">2008 年</option>
                                </select>
                                <select name="mem_jm" id="mem_jm">
                                    <option value="">請選擇</option>
                                    <option value="1">1 月</option>
                                    <option value="2">2 月</option>
                                    <option value="3">3 月</option>
                                    <option value="4">4 月</option>
                                    <option value="5">5 月</option>
                                    <option value="6">6 月</option>
                                    <option value="7">7 月</option>
                                    <option value="8" selected>8 月</option>
                                    <option value="9">9 月</option>
                                    <option value="10">10 月</option>
                                    <option value="11">11 月</option>
                                    <option value="12">12 月</option>
                                </select>

                                <select name="mem_jd" id="mem_jd">
                                    <option value="">請選擇</option>
                                    <option value="1">1 日</option>
                                    <option value="2">2 日</option>
                                    <option value="3">3 日</option>
                                    <option value="4">4 日</option>
                                    <option value="5">5 日</option>
                                    <option value="6">6 日</option>
                                    <option value="7">7 日</option>
                                    <option value="8">8 日</option>
                                    <option value="9">9 日</option>
                                    <option value="10">10 日</option>
                                    <option value="11">11 日</option>
                                    <option value="12">12 日</option>
                                    <option value="13">13 日</option>
                                    <option value="14">14 日</option>
                                    <option value="15">15 日</option>
                                    <option value="16">16 日</option>
                                    <option value="17">17 日</option>
                                    <option value="18">18 日</option>
                                    <option value="19">19 日</option>
                                    <option value="20">20 日</option>
                                    <option value="21">21 日</option>
                                    <option value="22">22 日</option>
                                    <option value="23">23 日</option>
                                    <option value="24">24 日</option>
                                    <option value="25">25 日</option>
                                    <option value="26">26 日</option>
                                    <option value="27">27 日</option>
                                    <option value="28">28 日</option>
                                    <option value="29" selected>29 日</option>
                                    <option value="30">30 日</option>
                                    <option value="31">31 日</option>
                                </select>

                                &nbsp;&nbsp;<a href="ad_mem_fix_up.php?mem_num=2080022" class="btn btn-danger">續約升卡</a>

                            </td>
                        </tr>

                        <tr>
                            <td>身分證字號：
                                R121560195
                                <input type="hidden" name="mem_username" id="mem_username" class="form-control" value="R121560195">
                                <input name="old_mem_username" type="hidden" value="nocheck">

                                &nbsp;&nbsp;
                                <label id="iscaselabel" style="display:none;"><input type="checkbox" id="iscase" name="iscase" value="1"> 個案&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                &nbsp;&nbsp;帳號：
                                R121560195
                                <input type="hidden" name="si_account" id="si_account" value="R121560195">

                                &nbsp;&nbsp;密碼：<input name="mem_passwd" type="text" id="mem_passwd" class="form-control" value="560195" maxlength="20" disabled>

                                <br>
                                <small id="mem_username_chk" class="text-red" style="display:none;">自 2021/01/01 起，未在收支系統有收入紀錄的身分證字號將無法成為會員。</small>
                            </td>
                        </tr>
                        <tr>
                            <td>姓名：
                                <input name="mem_name" class="form-control" type="text" id="mem_name" value="林春福" required>
                                <font color="#999999">（請填入中文姓名）</font>暱稱：
                                <input name="mem_nick" class="form-control" type="text" id="mem_nick2" value="林先生" maxlength="8">
                                <font color="#999999">（網站顯示名稱）</font>
                            </td>
                        </tr>
                        <tr>
                            <td>性別：
                                <select name="mem_sex" id="mem_sex" required>
                                    <option value="">請選擇</option>
                                    <option value="男" selected>男</option>
                                    <option value="女">女</option>
                                </select>
                                &nbsp;&nbsp;
                                生日：
                                <select name="mem_by" id="mem_by">
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                    <option value="1970">1970</option>
                                    <option value="1969">1969</option>
                                    <option value="1968">1968</option>
                                    <option value="1967">1967</option>
                                    <option value="1966">1966</option>
                                    <option value="1965" selected>1965</option>
                                    <option value="1964">1964</option>
                                    <option value="1963">1963</option>
                                    <option value="1962">1962</option>
                                    <option value="1961">1961</option>
                                    <option value="1960">1960</option>
                                    <option value="1959">1959</option>
                                    <option value="1958">1958</option>
                                    <option value="1957">1957</option>
                                    <option value="1956">1956</option>
                                    <option value="1955">1955</option>
                                    <option value="1954">1954</option>
                                    <option value="1953">1953</option>
                                    <option value="1952">1952</option>
                                    <option value="1951">1951</option>
                                    <option value="1950">1950</option>
                                    <option value="1949">1949</option>
                                    <option value="1948">1948</option>
                                    <option value="1947">1947</option>
                                    <option value="1946">1946</option>
                                    <option value="1945">1945</option>
                                    <option value="1944">1944</option>
                                    <option value="1943">1943</option>
                                    <option value="1942">1942</option>
                                    <option value="1941">1941</option>
                                    <option value="1940">1940</option>
                                    <option value="1939">1939</option>
                                    <option value="1938">1938</option>
                                    <option value="1937">1937</option>
                                    <option value="1936">1936</option>
                                    <option value="1935">1935</option>
                                    <option value="1934">1934</option>
                                    <option value="1933">1933</option>
                                    <option value="1932">1932</option>
                                    <option value="1931">1931</option>
                                </select>
                                年
                                <select name="mem_bm" id="mem_bm">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7" selected>7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                月
                                <select name="mem_bd" id="mem_bd">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8" selected>8</option>
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
                                &nbsp;&nbsp;
                                星座：
                                <select name="mem_star" id="mem_star">
                                    <option value="">請選擇</option>
                                    <option value="牡羊座">牡羊座</option>
                                    <option value="金牛座">金牛座</option>
                                    <option value="雙子座">雙子座</option>
                                    <option value="巨蟹座">巨蟹座</option>
                                    <option value="獅子座">獅子座</option>
                                    <option value="處女座">處女座</option>
                                    <option value="天秤座">天秤座</option>
                                    <option value="天蠍座">天蠍座</option>
                                    <option value="射手座">射手座</option>
                                    <option value="魔羯座">魔羯座</option>
                                    <option value="水瓶座">水瓶座</option>
                                    <option value="雙魚座">雙魚座</option>
                                </select>
                                &nbsp;&nbsp;
                                血型：
                                <select name="mem_blood" id="mem_blood">
                                    <option value="">請選擇</option>
                                    <option value="A">A型</option>
                                    <option value="B" selected>B型</option>
                                    <option value="O">O型</option>
                                    <option value="AB">AB型</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>手機：
                                0932703652
                                &nbsp;&nbsp;手機2：
                                <input name="mem_mobile2" type="tel" id="mem_mobile2" class="form-control phone" pattern="^[09]{2}[0-9]{8}$" minlength="10" maxlength="10" title="請輸入 09 開頭的十位數手機號碼" value="">
                                &nbsp;&nbsp;居住電話：
                                <input tabindex="99" name="mem_phone" type="text" id="mem_phone" class="form-control" value="">
                                &nbsp;&nbsp;公司電話：
                                <input tabindex="99" name="mem_phone2" type="text" id="mem_phone2" class="form-control" value="">
                            </td>
                        </tr>

                        <tr>
                            <td>居住地地區：
                                <select name="mem_area" id="mem_area">
                                    <option value="">請選擇</option>
                                    <option value="基隆市">基隆市</option>
                                    <option value="台北市">台北市</option>
                                    <option value="新北市">新北市</option>
                                    <option value="宜蘭縣">宜蘭縣</option>
                                    <option value="桃園市">桃園市</option>
                                    <option value="新竹縣">新竹縣</option>
                                    <option value="新竹市">新竹市</option>
                                    <option value="苗栗縣">苗栗縣</option>
                                    <option value="苗栗市">苗栗市</option>
                                    <option value="台中市">台中市</option>
                                    <option value="彰化縣">彰化縣</option>
                                    <option value="彰化市">彰化市</option>
                                    <option value="南投縣">南投縣</option>
                                    <option value="嘉義縣">嘉義縣</option>
                                    <option value="嘉義市">嘉義市</option>
                                    <option value="雲林縣">雲林縣</option>
                                    <option value="台南市" selected>台南市</option>
                                    <option value="高雄市">高雄市</option>
                                    <option value="屏東縣">屏東縣</option>
                                    <option value="花蓮縣">花蓮縣</option>
                                    <option value="台東縣">台東縣</option>
                                    <option value="澎湖縣">澎湖縣</option>
                                    <option value="金門縣">金門縣</option>
                                    <option value="馬祖">馬祖</option>
                                    <option value="綠島">綠島</option>
                                    <option value="蘭嶼">蘭嶼</option>
                                    <option value="其他">其他</option>
                                </select>
                                &nbsp;&nbsp;地址：
                                <input name="mem_address" tabindex="99" type="text" id="mem_address" class="form-control" style="width:60%" value="新化區蔡厝仔14號">
                            </td>
                        </tr>
                        <tr>
                            <td>戶籍地地區：
                                <select name="mem_area2" id="mem_area2">
                                    <option value="">請選擇</option>
                                    <option value="基隆市">基隆市</option>
                                    <option value="台北市">台北市</option>
                                    <option value="新北市">新北市</option>
                                    <option value="宜蘭縣">宜蘭縣</option>
                                    <option value="桃園市">桃園市</option>
                                    <option value="新竹縣">新竹縣</option>
                                    <option value="新竹市">新竹市</option>
                                    <option value="苗栗縣">苗栗縣</option>
                                    <option value="苗栗市">苗栗市</option>
                                    <option value="台中市">台中市</option>
                                    <option value="彰化縣">彰化縣</option>
                                    <option value="彰化市">彰化市</option>
                                    <option value="南投縣">南投縣</option>
                                    <option value="嘉義縣">嘉義縣</option>
                                    <option value="嘉義市">嘉義市</option>
                                    <option value="雲林縣">雲林縣</option>
                                    <option value="台南市">台南市</option>
                                    <option value="高雄市">高雄市</option>
                                    <option value="屏東縣">屏東縣</option>
                                    <option value="花蓮縣">花蓮縣</option>
                                    <option value="台東縣">台東縣</option>
                                    <option value="澎湖縣">澎湖縣</option>
                                    <option value="金門縣">金門縣</option>
                                    <option value="馬祖">馬祖</option>
                                    <option value="綠島">綠島</option>
                                    <option value="蘭嶼">蘭嶼</option>
                                    <option value="其他">其他</option>
                                </select>
                                &nbsp;&nbsp;地址：
                                <input tabindex="99" name="mem_address2" type="text" id="mem_address2" class="form-control" style="width:60%" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>學歷：
                                <select name="mem_school" id="mem_school">
                                    <option value="">請選擇</option>
                                    <option value="博士">博士</option>
                                    <option value="碩士">碩士</option>
                                    <option value="大學">大學</option>
                                    <option value="專科">專科</option>
                                    <option value="高職" selected>高職</option>
                                    <option value="高中">高中</option>
                                    <option value="國中">國中</option>
                                    <option value="其他">其他</option>
                                </select>
                                　學校名稱：
                                <select name="mem_school4" id="mem_school4">
                                    <option value="">請選擇</option>
                                    <option value="國立" selected>國立</option>
                                    <option value="私立">私立</option>
                                    <option value="海外">海外</option>
                                </select>
                                <input name="mem_school2" type="text" id="mem_school2" class="form-control" value="新化高工">
                                　科系名稱：
                                <input name="mem_school3" type="text" id="mem_school3" class="form-control" value="">
                            </td>
                        </tr>

                        <tr>
                            <td>職業：
                                <select name="mem_job1" id="mem_job1">
                                    <option value="公務/國家機關">公務/國家機關</option>
                                    <option value="司法/法務">司法/法務</option>
                                    <option value="軍警單位">軍警單位</option>
                                    <option value="自營/投資" selected>自營/投資</option>
                                    <option value="電腦/網路">電腦/網路</option>
                                    <option value="電子/通信/電器">電子/通信/電器</option>
                                    <option value="教育/研究單位">教育/研究單位</option>
                                    <option value="醫療/護理服務業">醫療/護理服務業</option>
                                    <option value="媒體傳播/出版業">媒體傳播/出版業</option>
                                    <option value="藝術/音樂/設計">藝術/音樂/設計</option>
                                    <option value="建築/裝修/物業">建築/裝修/物業</option>
                                    <option value="營銷/業務">營銷/業務</option>
                                    <option value="文化/演藝/娛樂業">文化/演藝/娛樂業</option>
                                    <option value="金融/證券/財會/保險">金融/證券/財會/保險</option>
                                    <option value="專利商標/諮詢服務業">專利商標/諮詢服務業</option>
                                    <option value="生產製造業">生產製造業</option>
                                    <option value="旅遊服務業">旅遊服務業</option>
                                    <option value="運輸服務業">運輸服務業</option>
                                    <option value="百貨/零售業">百貨/零售業</option>
                                    <option value="餐飲服務業">餐飲服務業</option>
                                    <option value="美容/美髮業">美容/美髮業</option>
                                    <option value="農林漁牧業">農林漁牧業</option>
                                    <option value="自由業/其它">自由業/其它</option>
                                    <option value="在校學生">在校學生</option>
                                    <option value="業務/仲价業">業務/仲价業</option>

                                </select>
                                　公司名稱：
                                <input name="company" type="text" id="company" class="form-control" value="群茂工程行">
                                　年資：
                                <div class="input-group">
                                    <input name="company_year" type="number" id="company_year" class="form-control" style="width:100px" value="0">
                                    <div class="input-group-addon">年</div>
                                </div>
                                　職務名稱：
                                <input name="mem_job2" type="text" id="mem_job2" class="form-control" value="負責人">
                            </td>
                        </tr>
                        <tr>
                            <td>經濟狀況：年收入約 <select name="mem_money" id="mem_money">
                                    <option value="">請選擇</option>
                                    <option value="50萬以下">50萬以下</option>
                                    <option value="51萬到80萬">51萬到80萬</option>
                                    <option value="81萬到100萬">81萬到100萬</option>
                                    <option value="101萬到199萬" selected>101萬到199萬</option>
                                    <option value="200萬以上">200萬以上</option>
                                </select>&nbsp;&nbsp;
                                <select name="mem_money_des" id="mem_money_des">
                                    <option value="">請選擇</option>
                                    <option value="自足">自足</option>
                                    <option value="小康">小康</option>
                                    <option value="中上">中上</option>
                                    <option value="富有">富有</option>
                                </select>
                                <!--月收：<input type="number" name="mem_money_m" id="mem_money_m" class="form-control" value="">-->
                                年收：
                                <div class="input-group">
                                    <input type="number" name="mem_money_y" id="mem_money_y" class="form-control" value="0">
                                    <span class="input-group-addon">元</span>
                                </div>
                                &nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="mem_car" id="mem_car" value="1" checked><i></i>有車</label>&nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="mem_house" id="mem_house" value="1" checked><i></i>有房</label>
                            </td>
                        </tr>

                        <tr>
                        <tr>
                            <td>
                                身高：
                                <input name="mem_he" type="text" id="mem_he" class="form-control" value="165" onkeyup="bmicount()">
                                公分
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                體重：
                                <input name="mem_we" type="text" id="mem_we" class="form-control" value="90" onkeyup="bmicount()">
                                公斤
                                <select id="mem_wet" name="mem_wet">
                                    <option value="">體重描述(身型)</option>

                                    <option value="苗條">苗條</option>
                                    <option value="普通">普通</option>
                                    <option value="豐腴">豐腴</option>
                                    <option value="有肌肉">有肌肉</option>
                                    <option value="豐滿">豐滿</option>
                                    <option value="肥胖">肥胖</option>
                                    <option value="偏瘦">偏瘦(<18)< /option>
                                    <option value="中等">中等(18.1~24)</option>
                                    <option value="偏肉" selected>偏肉(>24)</option>
                                </select>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                BMI：
                                <input name="mem_bmi" type="text" id="mem_bmi" class="form-control" value="33.1" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>E-mail：
                                <input name="mem_mail" type="text" id="mem_mail" class="form-control" value="">
                                　LINE ID：
                                <input name="mem_msn" type="text" id="mem_msn" class="form-control" value="">
                            </td>
                        </tr>


                        <td>
                            個性：<select name="mem4">
                                <option value="" selected>請選擇</option>
                                <option value="內向">內向</option>
                                <option value="外向">外向</option>
                                <option value="隨和">隨和</option>
                                <option value="嚴謹">嚴謹</option>
                                <option value="善良熱情">善良熱情</option>
                                <option value="陽光">陽光</option>
                                <option value="不拘">不拘</option>
                            </select>
                            &nbsp;&nbsp;
                            抽菸：<select name="mem7">
                                <option value="">請選擇</option>
                                <option value="是">是</option>
                                <option value="否">否</option>
                                <option value="偶爾">偶爾</option>
                            </select>
                            &nbsp;&nbsp;
                            喝酒：<select name="mem8">
                                <option value="">請選擇</option>
                                <option value="是">是</option>
                                <option value="否">否</option>
                                <option value="偶爾">偶爾</option>
                            </select>
                            &nbsp;&nbsp;
                            飲食：<select name="mem22">
                                <option value="">請選擇</option>
                                <option value="不拘">不拘</option>
                                <option value="全素">全素</option>
                                <option value="鍋邊素">鍋邊素</option>
                                <option value="奶蛋素">奶蛋素</option>
                                <option value="吃辣">吃辣</option>
                                <option value="不吃辣">不吃辣</option>
                                <option value="葷食">葷食</option>
                            </select>
                            &nbsp;&nbsp;
                            信仰：
                            <select name="mem6" id="mem6">
                                <option value="無" selected>無</option>
                                <option value="佛道教">佛道教</option>
                                <option value="基督教">基督教</option>
                                <option value="天主教">天主教</option>
                                <option value="一貫道">一貫道</option>
                                <option value="其他">其他</option>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td>婚姻狀態：
                                <label class="radio"><input name="mem_marry" type="radio" value="未婚"><i></i>未婚</label><label class="radio"><input name="mem_marry" type="radio" value="離婚"><i></i>離婚</label><label class="radio"><input name="mem_marry" type="radio" value="離婚沒小孩"><i></i>離婚沒小孩</label><label class="radio"><input name="mem_marry" type="radio" value="離婚有小孩"><i></i>離婚有小孩</label><label class="radio"><input name="mem_marry" type="radio" value="喪偶" checked><i></i>喪偶</label><label class="radio"><input name="mem_marry" type="radio" value="已婚"><i></i>已婚</label><label class="radio"><input name="mem_marry" type="radio" value="保密"><i></i>保密</label><label class="radio"><input name="mem_marry" type="radio" value="交往中"><i></i>交往中</label><label class="radio"><input name="mem_marry" type="radio" value="有心儀對象"><i></i>有心儀對象</label>

                            </td>
                        </tr>
                        <tr>
                            <td>自我介紹：<font color=red>(請注意此區文字將會在網站顯示，除自我介紹外勿填入其他資訊，如需清除文字請輸入空格)</font><br>
                                <div id="mem_note_div"></div>
                                <a id="mem_note_a" href="#v" onclick="mem_note_edit()">點擊修改</a>
                                <textarea id="mem_note" name="mem_note" cols="100" rows="8" id="textarea" class="form-control" style="display:none"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox"><input type="checkbox" name="mem_photo_show" id="mem_photo_show" value="1"><i></i>前台不顯示照片</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="no_mail1" id="no_mail1" value="1"><i></i>電子信件通知</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="no_mail2" id="no_mail2" value="1"><i></i>簡訊通知</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="no_mail4" id="no_mail4" value="1"><i></i>約會邀請被拒絕通知</label>&nbsp;&nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="checkbox"><input type="checkbox" name="si_enterprise" id="si_enterprise" value="1"><i></i>企業會員</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_vip" id="mem_vip" value="1"><i></i>優質會員</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot" id="mem_hot" value="1"><i></i>超人氣會員</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot_in" id="mem_hot_in" value="1"><i></i>春天首頁超人氣會員</label>

                                <label class="checkbox"><input type="checkbox" name="singleparty_hot_check" id="singleparty_hot_check" value="1"><i></i>約專首頁推薦會員</label>

                            </td>
                        </tr>
                        <tr>
                            <td>

                                <label class="checkbox"><input type="checkbox" name="mem_hot3" id="mem_hot3" value="1"><i></i>醫師、教師、律師</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot1" id="mem_hot1" value="1"><i></i>碩博士、科技新貴</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot6" id="mem_hot6" value="1"><i></i>百萬年薪俱樂部</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot5" id="mem_hot5" value="1"><i></i>BOSS、高階主管</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot4" id="mem_hot4" value="1"><i></i>軍警、公務人員</label>&nbsp;&nbsp;
                                <label class="checkbox"><input type="checkbox" name="mem_hot2" id="mem_hot2" value="1"><i></i>金融服務</label>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                首頁頁籤：<select name="mem_tag" id="mem_tag">
                                    <option value="">無</option>
                                    <option value="百大科技">百大科技</option>
                                    <option value="公教醫護">公教醫護</option>
                                    <option value="傳播藝術">傳播藝術</option>
                                    <option value="餐飲服務">餐飲服務</option>
                                    <option value="金融保險">金融保險</option>
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <td>興趣：
                                <label class="checkbox"><input type="checkbox" name="mem18" value="做菜"><i></i>做菜</label><label class="checkbox"><input type="checkbox" name="mem18" value="郊遊"><i></i>郊遊</label><label class="checkbox"><input type="checkbox" name="mem18" value="登山"><i></i>登山</label><label class="checkbox"><input type="checkbox" name="mem18" value="兜風"><i></i>兜風</label><label class="checkbox"><input type="checkbox" name="mem18" value="逛街"><i></i>逛街</label><label class="checkbox"><input type="checkbox" name="mem18" value="看電影"><i></i>看電影</label><label class="checkbox"><input type="checkbox" name="mem18" value="閱讀"><i></i>閱讀</label><label class="checkbox"><input type="checkbox" name="mem18" value="騎小折"><i></i>騎小折</label><label class="checkbox"><input type="checkbox" name="mem18" value="游泳"><i></i>游泳</label><label class="checkbox"><input type="checkbox" name="mem18" value="品嘗美食"><i></i>品嘗美食</label><label class="checkbox"><input type="checkbox" name="mem18" value="旅遊"><i></i>旅遊</label><label class="checkbox"><input type="checkbox" name="mem18" value="冒險"><i></i>冒險</label><label class="checkbox"><input type="checkbox" name="mem18" value="寫作"><i></i>寫作</label><label class="checkbox"><input type="checkbox" name="mem18" value="上山下海"><i></i>上山下海</label><label class="checkbox"><input type="checkbox" name="mem18" value="運動"><i></i>運動</label><label class="checkbox"><input type="checkbox" name="mem18" value="慢跑"><i></i>慢跑</label><label class="checkbox"><input type="checkbox" name="mem18" value="看風景"><i></i>看風景</label><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="mem18" value="散步"><i></i>散步</label><label class="checkbox"><input type="checkbox" name="mem18" value="園藝"><i></i>園藝</label><label class="checkbox"><input type="checkbox" name="mem18" value="水族"><i></i>水族</label><label class="checkbox"><input type="checkbox" name="mem18" value="財經"><i></i>財經</label><label class="checkbox"><input type="checkbox" name="mem18" value="拼圖"><i></i>拼圖</label><label class="checkbox"><input type="checkbox" name="mem18" value="咖啡"><i></i>咖啡</label><label class="checkbox"><input type="checkbox" name="mem18" value="宅在家裡"><i></i>宅在家裡</label><label class="checkbox"><input type="checkbox" name="mem18" value="買東西"><i></i>買東西</label><label class="checkbox"><input type="checkbox" name="mem18" value="插花"><i></i>插花</label><label class="checkbox"><input type="checkbox" name="mem18" value="繪畫"><i></i>繪畫</label><label class="checkbox"><input type="checkbox" name="mem18" value="逛展覽"><i></i>逛展覽</label>

                                <br>
                                其他興趣：<input type="text" class="form-control" name="mem181" style="width:80%" value="">

                            </td>
                        </tr>
                        <tr>
                            <td>外型：<input type="text" name="mem_da2" id="mem_da2" class="form-control" style="width:80%" value=""></td>
                        </tr>
                        <tr>
                            <td>內在：<input type="text" name="mem_da3" id="mem_da3" class="form-control" style="width:80%" value=""></td>
                        </tr>
                        <tr>
                            <td>資料速報：<input type="text" name="mem_da6" id="mem_da6" class="form-control" style="width:80%" value=""></td>
                        </tr>

                        <tr>
                            <td style="font-size:150%;color:blue"><b>擇友條件</b></td>
                        </tr>
                        <tr>
                            <td>婚況：
                                <label class="checkbox"><input type="checkbox" name="sel_marry" value="未婚"><i></i>未婚</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="離婚"><i></i>離婚</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="離婚沒小孩"><i></i>離婚沒小孩</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="離婚有小孩"><i></i>離婚有小孩</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="喪偶"><i></i>喪偶</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="已婚"><i></i>已婚</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="保密"><i></i>保密</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="交往中"><i></i>交往中</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="有心儀對象"><i></i>有心儀對象</label><label class="checkbox"><input type="checkbox" name="sel_marry" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>學歷：
                                <label class="checkbox"><input type="checkbox" name="sel_school" value="博士"><i></i>博士</label><label class="checkbox"><input type="checkbox" name="sel_school" value="碩士"><i></i>碩士</label><label class="checkbox"><input type="checkbox" name="sel_school" value="大學"><i></i>大學</label><label class="checkbox"><input type="checkbox" name="sel_school" value="專科"><i></i>專科</label><label class="checkbox"><input type="checkbox" name="sel_school" value="高職"><i></i>高職</label><label class="checkbox"><input type="checkbox" name="sel_school" value="高中"><i></i>高中</label><label class="checkbox"><input type="checkbox" name="sel_school" value="國中"><i></i>國中</label><label class="checkbox"><input type="checkbox" name="sel_school" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>宗教：
                                <label class="checkbox"><input type="checkbox" name="sel_mem6" value="佛道教"><i></i>佛道教</label><label class="checkbox"><input type="checkbox" name="sel_mem6" value="基督教"><i></i>基督教</label><label class="checkbox"><input type="checkbox" name="sel_mem6" value="天主教"><i></i>天主教</label><label class="checkbox"><input type="checkbox" name="sel_mem6" value="一貫道"><i></i>一貫道</label><label class="checkbox"><input type="checkbox" name="sel_mem6" value="無"><i></i>無</label><label class="checkbox"><input type="checkbox" name="sel_mem6" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>職業：
                                <label class="checkbox"><input type="checkbox" name="sel_job" value="公務/國家機關"><i></i>公務/國家機關</label><label class="checkbox"><input type="checkbox" name="sel_job" value="司法/法務"><i></i>司法/法務</label><label class="checkbox"><input type="checkbox" name="sel_job" value="軍警單位"><i></i>軍警單位</label><label class="checkbox"><input type="checkbox" name="sel_job" value="自營/投資"><i></i>自營/投資</label><label class="checkbox"><input type="checkbox" name="sel_job" value="電腦/網路"><i></i>電腦/網路</label><label class="checkbox"><input type="checkbox" name="sel_job" value="電子/通信/電器"><i></i>電子/通信/電器</label><label class="checkbox"><input type="checkbox" name="sel_job" value="教育/研究單位"><i></i>教育/研究單位</label><label class="checkbox"><input type="checkbox" name="sel_job" value="醫療/護理服務業"><i></i>醫療/護理服務業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="媒體傳播/出版業"><i></i>媒體傳播/出版業</label><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="sel_job" value="藝術/音樂/設計"><i></i>藝術/音樂/設計</label><label class="checkbox"><input type="checkbox" name="sel_job" value="建築/裝修/物業"><i></i>建築/裝修/物業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="營銷/業務"><i></i>營銷/業務</label><label class="checkbox"><input type="checkbox" name="sel_job" value="文化/演藝/娛樂業"><i></i>文化/演藝/娛樂業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="金融/證券/財會/保險"><i></i>金融/證券/財會/保險</label><label class="checkbox"><input type="checkbox" name="sel_job" value="專利商標/諮詢服務業"><i></i>專利商標/諮詢服務業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="生產製造業"><i></i>生產製造業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="旅遊服務業"><i></i>旅遊服務業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="運輸服務業"><i></i>運輸服務業</label><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="checkbox"><input type="checkbox" name="sel_job" value="百貨/零售業"><i></i>百貨/零售業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="餐飲服務業"><i></i>餐飲服務業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="美容/美髮業"><i></i>美容/美髮業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="農林漁牧業"><i></i>農林漁牧業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="自由業/其它"><i></i>自由業/其它</label><label class="checkbox"><input type="checkbox" name="sel_job" value="在校學生"><i></i>在校學生</label><label class="checkbox"><input type="checkbox" name="sel_job" value="業務/仲价業"><i></i>業務/仲价業</label><label class="checkbox"><input type="checkbox" name="sel_job" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>個性：
                                <label class="checkbox"><input type="checkbox" name="sel_mem4" value="內向"><i></i>內向</label><label class="checkbox"><input type="checkbox" name="sel_mem4" value="外向"><i></i>外向</label><label class="checkbox"><input type="checkbox" name="sel_mem4" value="隨和"><i></i>隨和</label><label class="checkbox"><input type="checkbox" name="sel_mem4" value="嚴謹"><i></i>嚴謹</label><label class="checkbox"><input type="checkbox" name="sel_mem4" value="善良熱情"><i></i>善良熱情</label><label class="checkbox"><input type="checkbox" name="sel_mem4" value="陽光"><i></i>陽光</label><label class="checkbox"><input type="checkbox" name="sel_mem4" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>經濟：
                                <label class="checkbox"><input type="checkbox" name="sel_money_des" value="富有"><i></i>富有</label><label class="checkbox"><input type="checkbox" name="sel_money_des" value="中上"><i></i>中上</label><label class="checkbox"><input type="checkbox" name="sel_money_des" value="小康"><i></i>小康</label><label class="checkbox"><input type="checkbox" name="sel_money_des" value="自足"><i></i>自足</label><label class="checkbox"><input type="checkbox" name="sel_money_des" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>年收入：
                                <label class="checkbox"><input type="checkbox" name="sel_money" value="50萬以下"><i></i>50萬以下</label><label class="checkbox"><input type="checkbox" name="sel_money" value="51萬到80萬"><i></i>51萬到80萬</label><label class="checkbox"><input type="checkbox" name="sel_money" value="81萬到100萬"><i></i>81萬到100萬</label><label class="checkbox"><input type="checkbox" name="sel_money" value="101萬到199萬"><i></i>101萬到199萬</label><label class="checkbox"><input type="checkbox" name="sel_money" value="200萬以上"><i></i>200萬以上</label><label class="checkbox"><input type="checkbox" name="sel_money" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>年齡：
                                <select name="sel_y1" id="sel_y1">
                                    <option value="">不限</option>
                                    <option value="1941">1941 年/民國 30 年</option>
                                    <option value="1942">1942 年/民國 31 年</option>
                                    <option value="1943">1943 年/民國 32 年</option>
                                    <option value="1944">1944 年/民國 33 年</option>
                                    <option value="1945">1945 年/民國 34 年</option>
                                    <option value="1946">1946 年/民國 35 年</option>
                                    <option value="1947">1947 年/民國 36 年</option>
                                    <option value="1948">1948 年/民國 37 年</option>
                                    <option value="1949">1949 年/民國 38 年</option>
                                    <option value="1950">1950 年/民國 39 年</option>
                                    <option value="1951">1951 年/民國 40 年</option>
                                    <option value="1952">1952 年/民國 41 年</option>
                                    <option value="1953">1953 年/民國 42 年</option>
                                    <option value="1954">1954 年/民國 43 年</option>
                                    <option value="1955">1955 年/民國 44 年</option>
                                    <option value="1956">1956 年/民國 45 年</option>
                                    <option value="1957">1957 年/民國 46 年</option>
                                    <option value="1958">1958 年/民國 47 年</option>
                                    <option value="1959">1959 年/民國 48 年</option>
                                    <option value="1960">1960 年/民國 49 年</option>
                                    <option value="1961">1961 年/民國 50 年</option>
                                    <option value="1962">1962 年/民國 51 年</option>
                                    <option value="1963" selected>1963 年/民國 52 年</option>
                                    <option value="1964">1964 年/民國 53 年</option>
                                    <option value="1965">1965 年/民國 54 年</option>
                                    <option value="1966">1966 年/民國 55 年</option>
                                    <option value="1967">1967 年/民國 56 年</option>
                                    <option value="1968">1968 年/民國 57 年</option>
                                    <option value="1969">1969 年/民國 58 年</option>
                                    <option value="1970">1970 年/民國 59 年</option>
                                    <option value="1971">1971 年/民國 60 年</option>
                                    <option value="1972">1972 年/民國 61 年</option>
                                    <option value="1973">1973 年/民國 62 年</option>
                                    <option value="1974">1974 年/民國 63 年</option>
                                    <option value="1975">1975 年/民國 64 年</option>
                                    <option value="1976">1976 年/民國 65 年</option>
                                    <option value="1977">1977 年/民國 66 年</option>
                                    <option value="1978">1978 年/民國 67 年</option>
                                    <option value="1979">1979 年/民國 68 年</option>
                                    <option value="1980">1980 年/民國 69 年</option>
                                    <option value="1981">1981 年/民國 70 年</option>
                                    <option value="1982">1982 年/民國 71 年</option>
                                    <option value="1983">1983 年/民國 72 年</option>
                                    <option value="1984">1984 年/民國 73 年</option>
                                    <option value="1985">1985 年/民國 74 年</option>
                                    <option value="1986">1986 年/民國 75 年</option>
                                    <option value="1987">1987 年/民國 76 年</option>
                                    <option value="1988">1988 年/民國 77 年</option>
                                    <option value="1989">1989 年/民國 78 年</option>
                                    <option value="1990">1990 年/民國 79 年</option>
                                    <option value="1991">1991 年/民國 80 年</option>
                                    <option value="1992">1992 年/民國 81 年</option>
                                    <option value="1993">1993 年/民國 82 年</option>
                                    <option value="1994">1994 年/民國 83 年</option>
                                    <option value="1995">1995 年/民國 84 年</option>
                                    <option value="1996">1996 年/民國 85 年</option>
                                    <option value="1997">1997 年/民國 86 年</option>
                                    <option value="1998">1998 年/民國 87 年</option>
                                    <option value="1999">1999 年/民國 88 年</option>
                                    <option value="2000">2000 年/民國 89 年</option>
                                    <option value="2001">2001 年/民國 90 年</option>
                                </select>
                                到
                                <select name="sel_y2" id="sel_y2">
                                    <option value="">不限</option>
                                    <option value="1941">1941 年/民國 30 年</option>
                                    <option value="1942">1942 年/民國 31 年</option>
                                    <option value="1943">1943 年/民國 32 年</option>
                                    <option value="1944">1944 年/民國 33 年</option>
                                    <option value="1945">1945 年/民國 34 年</option>
                                    <option value="1946">1946 年/民國 35 年</option>
                                    <option value="1947">1947 年/民國 36 年</option>
                                    <option value="1948">1948 年/民國 37 年</option>
                                    <option value="1949">1949 年/民國 38 年</option>
                                    <option value="1950">1950 年/民國 39 年</option>
                                    <option value="1951">1951 年/民國 40 年</option>
                                    <option value="1952">1952 年/民國 41 年</option>
                                    <option value="1953">1953 年/民國 42 年</option>
                                    <option value="1954">1954 年/民國 43 年</option>
                                    <option value="1955">1955 年/民國 44 年</option>
                                    <option value="1956">1956 年/民國 45 年</option>
                                    <option value="1957">1957 年/民國 46 年</option>
                                    <option value="1958">1958 年/民國 47 年</option>
                                    <option value="1959">1959 年/民國 48 年</option>
                                    <option value="1960">1960 年/民國 49 年</option>
                                    <option value="1961">1961 年/民國 50 年</option>
                                    <option value="1962">1962 年/民國 51 年</option>
                                    <option value="1963">1963 年/民國 52 年</option>
                                    <option value="1964">1964 年/民國 53 年</option>
                                    <option value="1965">1965 年/民國 54 年</option>
                                    <option value="1966">1966 年/民國 55 年</option>
                                    <option value="1967">1967 年/民國 56 年</option>
                                    <option value="1968">1968 年/民國 57 年</option>
                                    <option value="1969">1969 年/民國 58 年</option>
                                    <option value="1970">1970 年/民國 59 年</option>
                                    <option value="1971">1971 年/民國 60 年</option>
                                    <option value="1972">1972 年/民國 61 年</option>
                                    <option value="1973" selected>1973 年/民國 62 年</option>
                                    <option value="1974">1974 年/民國 63 年</option>
                                    <option value="1975">1975 年/民國 64 年</option>
                                    <option value="1976">1976 年/民國 65 年</option>
                                    <option value="1977">1977 年/民國 66 年</option>
                                    <option value="1978">1978 年/民國 67 年</option>
                                    <option value="1979">1979 年/民國 68 年</option>
                                    <option value="1980">1980 年/民國 69 年</option>
                                    <option value="1981">1981 年/民國 70 年</option>
                                    <option value="1982">1982 年/民國 71 年</option>
                                    <option value="1983">1983 年/民國 72 年</option>
                                    <option value="1984">1984 年/民國 73 年</option>
                                    <option value="1985">1985 年/民國 74 年</option>
                                    <option value="1986">1986 年/民國 75 年</option>
                                    <option value="1987">1987 年/民國 76 年</option>
                                    <option value="1988">1988 年/民國 77 年</option>
                                    <option value="1989">1989 年/民國 78 年</option>
                                    <option value="1990">1990 年/民國 79 年</option>
                                    <option value="1991">1991 年/民國 80 年</option>
                                    <option value="1992">1992 年/民國 81 年</option>
                                    <option value="1993">1993 年/民國 82 年</option>
                                    <option value="1994">1994 年/民國 83 年</option>
                                    <option value="1995">1995 年/民國 84 年</option>
                                    <option value="1996">1996 年/民國 85 年</option>
                                    <option value="1997">1997 年/民國 86 年</option>
                                    <option value="1998">1998 年/民國 87 年</option>
                                    <option value="1999">1999 年/民國 88 年</option>
                                    <option value="2000">2000 年/民國 89 年</option>
                                    <option value="2001">2001 年/民國 90 年</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>居住區域：
                                <label class="checkbox"><input type="checkbox" name="sel_area" value="北部"><i></i>北部</label><label class="checkbox"><input type="checkbox" name="sel_area" value="中部"><i></i>中部</label><label class="checkbox"><input type="checkbox" name="sel_area" value="南部"><i></i>南部</label><label class="checkbox"><input type="checkbox" name="sel_area" value="台北"><i></i>台北</label><label class="checkbox"><input type="checkbox" name="sel_area" value="桃竹苗"><i></i>桃竹苗</label><label class="checkbox"><input type="checkbox" name="sel_area" value="中彰投"><i></i>中彰投</label><label class="checkbox"><input type="checkbox" name="sel_area" value="雲嘉南"><i></i>雲嘉南</label><label class="checkbox"><input type="checkbox" name="sel_area" value="高屏"><i></i>高屏</label><label class="checkbox"><input type="checkbox" name="sel_area" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>星座：
                                <label class="checkbox"><input type="checkbox" name="sel_star" value="牡羊座"><i></i>牡羊座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="金牛座"><i></i>金牛座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="雙子座"><i></i>雙子座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="巨蟹座"><i></i>巨蟹座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="獅子座"><i></i>獅子座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="處女座"><i></i>處女座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="天秤座"><i></i>天秤座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="天蠍座"><i></i>天蠍座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="射手座"><i></i>射手座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="魔羯座"><i></i>魔羯座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="水瓶座"><i></i>水瓶座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="雙魚座"><i></i>雙魚座</label><label class="checkbox"><input type="checkbox" name="sel_star" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>身高：<input type="text" name="sel_he1" id="sel_he1" class="form-control" style="width:100px" value=""> - <input type="text" name="sel_he2" id="sel_he2" class="form-control" style="width:100px" value=""> 公分
                            </td>
                        </tr>
                        <tr>
                            <td>身型：
                                <label class="checkbox"><input type="checkbox" name="sel_wet" value="苗條"><i></i>苗條</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="普通"><i></i>普通</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="豐腴"><i></i>豐腴</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="有肌肉"><i></i>有肌肉</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="豐滿"><i></i>豐滿</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="肥胖"><i></i>肥胖</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="偏瘦"><i></i>偏瘦(<18)< /label><label class="checkbox"><input type="checkbox" name="sel_wet" value="中等"><i></i>中等(18.1~24)</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="偏肉"><i></i>偏肉(>24)</label><label class="checkbox"><input type="checkbox" name="sel_wet" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>社交性：
                                <label class="checkbox"><input type="checkbox" name="sel_sociability" value="喜歡與多人相處"><i></i>喜歡與多人相處</label><label class="checkbox"><input type="checkbox" name="sel_sociability" value="喜歡與少數人相處"><i></i>喜歡與少數人相處</label><label class="checkbox"><input type="checkbox" name="sel_sociability" value="喜歡獨處"><i></i>喜歡獨處</label><label class="checkbox"><input type="checkbox" name="sel_sociability" value="很熟"><i></i>很熟</label><label class="checkbox"><input type="checkbox" name="sel_sociability" value="慢熟"><i></i>慢熟</label><label class="checkbox"><input type="checkbox" name="sel_sociability" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>交友觀點：
                                <label class="checkbox"><input type="checkbox" name="sel_view" value="純粹擴大交友"><i></i>純粹擴大交友</label><label class="checkbox"><input type="checkbox" name="sel_view" value="尋找談戀愛對象"><i></i>尋找談戀愛對象</label><label class="checkbox"><input type="checkbox" name="sel_view" value="尋找依靠終身伴侶"><i></i>尋找依靠終身伴侶</label><label class="checkbox"><input type="checkbox" name="sel_view" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>抽菸：
                                <label class="checkbox"><input type="checkbox" name="sel_mem7" value="是"><i></i>是</label><label class="checkbox"><input type="checkbox" name="sel_mem7" value="否"><i></i>否</label><label class="checkbox"><input type="checkbox" name="sel_mem7" value="偶爾"><i></i>偶爾</label><label class="checkbox"><input type="checkbox" name="sel_mem7" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>喝酒：
                                <label class="checkbox"><input type="checkbox" name="sel_mem8" value="是"><i></i>是</label><label class="checkbox"><input type="checkbox" name="sel_mem8" value="否"><i></i>否</label><label class="checkbox"><input type="checkbox" name="sel_mem8" value="偶爾"><i></i>偶爾</label><label class="checkbox"><input type="checkbox" name="sel_mem8" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>飲食：
                                <label class="checkbox"><input type="checkbox" name="sel_mem22" value="全素"><i></i>全素</label><label class="checkbox"><input type="checkbox" name="sel_mem22" value="鍋邊素"><i></i>鍋邊素</label><label class="checkbox"><input type="checkbox" name="sel_mem22" value="奶蛋素"><i></i>奶蛋素</label><label class="checkbox"><input type="checkbox" name="sel_mem22" value="吃辣"><i></i>吃辣</label><label class="checkbox"><input type="checkbox" name="sel_mem22" value="不吃辣"><i></i>不吃辣</label><label class="checkbox"><input type="checkbox" name="sel_mem22" value="葷食"><i></i>葷食</label><label class="checkbox"><input type="checkbox" name="sel_mem22" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>忌諱：<input type="text" name="mem_da4" id="mem_da4" class="form-control" style="width:80%" value=""></td>
                        </tr>
                        <tr>
                            <td>擇友條件：<input type="text" name="mem_da5" id="mem_da5" class="form-control" style="width:80%" value=""></td>
                        </tr>
                        <tr>
                            <td style="font-size:150%;color:blue"><b>其他事項</b></td>
                        </tr>
                        <tr>
                            <td>備註說明：<textarea id="sys_note" name="sys_note" style="width:80%" rows="8" id="textarea" class="form-control"></textarea> </td>
                        </tr>
                        <tr>
                            <td>備註說明：<textarea id="tosinglenote" name="tosinglenote" style="width:80%" rows="8" id="textarea" class="form-control" readonly></textarea></td>
                        </tr>
                        <tr>
                            <td>方便聯繫時間：
                                <label class="checkbox"><input type="checkbox" name="can_call" value="星期一"><i></i>星期一</label><label class="checkbox"><input type="checkbox" name="can_call" value="星期二"><i></i>星期二</label><label class="checkbox"><input type="checkbox" name="can_call" value="星期三"><i></i>星期三</label><label class="checkbox"><input type="checkbox" name="can_call" value="星期四"><i></i>星期四</label><label class="checkbox"><input type="checkbox" name="can_call" value="星期五"><i></i>星期五</label><label class="checkbox"><input type="checkbox" name="can_call" value="星期六"><i></i>星期六</label><label class="checkbox"><input type="checkbox" name="can_call" value="星期日"><i></i>星期日</label><label class="checkbox"><input type="checkbox" name="can_call" value="上午"><i></i>上午</label><label class="checkbox"><input type="checkbox" name="can_call" value="下午"><i></i>下午</label><label class="checkbox"><input type="checkbox" name="can_call" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>可以排約時間：
                                <label class="checkbox"><input type="checkbox" name="can_love" value="星期一"><i></i>星期一</label><label class="checkbox"><input type="checkbox" name="can_love" value="星期二"><i></i>星期二</label><label class="checkbox"><input type="checkbox" name="can_love" value="星期三"><i></i>星期三</label><label class="checkbox"><input type="checkbox" name="can_love" value="星期四"><i></i>星期四</label><label class="checkbox"><input type="checkbox" name="can_love" value="星期五"><i></i>星期五</label><label class="checkbox"><input type="checkbox" name="can_love" value="星期六"><i></i>星期六</label><label class="checkbox"><input type="checkbox" name="can_love" value="星期日"><i></i>星期日</label><label class="checkbox"><input type="checkbox" name="can_love" value="上午"><i></i>上午</label><label class="checkbox"><input type="checkbox" name="can_love" value="下午"><i></i>下午</label><label class="checkbox"><input type="checkbox" name="can_love" value="不拘" checked><i></i>不拘</label>
                            </td>
                        </tr>
                        <tr>
                            <td>魅力處方箋01：
                                <label class="checkbox"><input type="checkbox" name="recipe1" value="戀愛講堂"><i></i>戀愛講堂</label><label class="checkbox"><input type="checkbox" name="recipe1" value="魅力有約"><i></i>魅力有約</label><label class="checkbox"><input type="checkbox" name="recipe1" value="品味生活"><i></i>品味生活</label><label class="checkbox"><input type="checkbox" name="recipe1" value="互動美學"><i></i>互動美學</label>
                            </td>
                        </tr>
                        <tr>
                            <td>魅力處方箋02：
                                <label class="checkbox"><input type="checkbox" name="recipe2" value="輕旅行"><i></i>輕旅行</label><label class="checkbox"><input type="checkbox" name="recipe2" value="主題特別企劃"><i></i>主題特別企劃</label><label class="checkbox"><input type="checkbox" name="recipe2" value="主題精緻餐會"><i></i>主題精緻餐會</label><label class="checkbox"><input type="checkbox" name="recipe2" value="美味廚房"><i></i>美味廚房</label><label class="checkbox"><input type="checkbox" name="recipe2" value="健康料理"><i></i>健康料理</label><label class="checkbox"><input type="checkbox" name="recipe2" value="國外旅遊"><i></i>國外旅遊</label>
                            </td>
                        </tr>
                        <tr>
                            <td>魅力處方箋03：
                                <label class="checkbox"><input type="checkbox" name="recipe3" value="一對一排約"><i></i>一對一排約</label><label class="checkbox"><input type="checkbox" name="recipe3" value="多平台排約"><i></i>多平台排約</label><label class="checkbox"><input type="checkbox" name="recipe3" value="多對多約會"><i></i>多對多約會</label><label class="checkbox"><input type="checkbox" name="recipe3" value="主題式約會"><i></i>主題式約會</label><label class="checkbox"><input type="checkbox" name="recipe3" value="下午茶約會"><i></i>下午茶約會</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="center">
                                    <input name="Submit3" type="submit" value="確定修改" class="btn btn-primary" style="width:50%">
                                    <input name="mem_num" type="hidden" id="mem_num" value="2080022">
                                </div>
                            </td>
                        </tr>
                        </td>
                        </tr>
                    </table>
                </form>
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

<script language="JavaScript" type="text/JavaScript">
    $(function() {
	var $cchecks = "sel_marry,sel_school,sel_mem6,sel_job,sel_mem4,sel_money_des,can_call,can_love,sel_money,sel_area,sel_star,sel_wet,sel_sociability,sel_view,sel_mem7,sel_mem8,sel_mem22";
	$.each($cchecks.split(","), function($v, $k) {		
	$("input[name='"+$k+"']").on("click", function() {
		var $this = $(this);
		if($this.val() == "全選") {
			var $tt = $this.prop("checked");
			$("input[name='"+$k+"']").each(function() {
				if($(this).val() != $this.val() || $(this).val() != "不拘") $(this).prop("checked", $tt);
				if($(this).val() == "不拘") $(this).prop("checked", false);
			});
			return true;
		} else if($this.val() == "不拘") {
			$("input[name='"+$k+"']").each(function() {
				if($(this).val() != $this.val()) $(this).prop("checked", false);
			});
			return true;
		} else {
			$("input[name='"+$k+"']").each(function() {
				if($(this).val() == "不拘") $(this).prop("checked", false);
			});
		}
	});
 });

$("#mem_branch").on("change", function() {
personnel_get_find("mem_branch", "mem_single");
personnel_get_find("mem_branch", "love_single");	
});
$("#call_branch").on("change", function() {
personnel_get_find("call_branch", "call_single");
});


$("#mem_branch").val("台南");
personnel_get_find("mem_branch", "mem_single", "D221429903");
personnel_get_find("mem_branch", "love_single", "R222349969");

$("#call_branch").val("高雄");
personnel_get_find("call_branch", "call_single", "E290076419");

});
function mem_note_edit() {
	$("#mem_note_a,#mem_note_div").hide();	
	$("#mem_note").show();
}
function chk_form(){ //v2.0	
// submit if already checked
    if($("#sform").data("cansend") == 1) {    	
          return true;
    }
var $allc = {"mem_area":"地區","mem_name":"姓名"},
    $allc2 = {"mem_he":"身高","sel_he1":"擇友條件身高","sel_he2":"擇友條件身高","mem_we":"體重", "mem_bmi":"BMI"},
    $rr = 0;
$.each($allc, function(v, k) {
   if(!$("#"+v).val()) {
     alert("請輸入或選擇"+k+"。");
	 $("#"+v).focus();
	 $rr = 1;
	 return false;
   }
});
$.each($allc2, function(v, k) {
   if ($("#"+v).val() && !$.isNumeric($("#"+v).val())) {
     alert(k+"只能輸入數字。");
	 $("#"+v).focus();
	 $rr = 1;
     return false;
   }
});
  if($("#sel_he1").val() || $("#sel_he2").val()) {
  	if(($("#sel_he1").val() && !$("#sel_he2").val()) || ($("#sel_he2").val() && !$("#sel_he1").val())) {
  		alert("擇友條件身高需輸入範圍數字。");
  		$("#sel_he1").focus();	 
  		$rr = 1;
  	}
  	if($("#sel_he1").val() && $("#sel_he2").val()) {
  		if(parseInt($("#sel_he1").val()) > parseInt($("#sel_he2").val())) {
  		alert("擇友條件身高範圍應從小至大。");
  		$("#sel_he1").focus();	 
  		$rr = 1;
  		}
  	}
  }
	if($("#mem_level").val() != "guest") {
		if (!$("#mem_username").val()){		
			alert("入會會員必須要有身分證字號");
			$("#mem_username").focus();
			$rr = 1;
		}
		
		if (!$("#si_account").val()){		
			alert("入會會員必須要有帳號");
			$("#si_account").focus();
			$rr = 1;
		}		
	
		
		/*
		var $re = /.+@.+\.+.[a-zA-Z]{1,4}$/;
   if (!$rr && !$re.test($("#si_account").val())) {
     alert("請輸入正確的帳號(Email)格式。");
	 $rr = 1;
   }
				
		if (!$("#mem_passwd").val()){		
			alert("入會會員必須要有密碼");
			$("#mem_passwd").focus();
			$rr = 1;
		}*/
		
		if (!$("#mem_jy").val() || !$("#mem_jm").val() || !$("#mem_jd").val()){		
			alert("入會會員必須要有入會日");
			$("#mem_jy").focus();
			$rr = 1;
		}
		
	}	
	if($rr) return false;
	
	memusername = $("#mem_username");
	pay1 = $("#mem_branch");
	now_mem_level = $("#now_mem_level");
	
	if(now_mem_level.val() == "guest") {		
	if(pay1.val() && memusername.val() && !$("#iscase").is(":checked")) {
	$.ajax({
  url: "ad_register1.php?st=qusername&b="+pay1.val()+"&v="+memusername.val()
  }).done(function( msg ) {  	
  	
     if(msg == "ok") {
     	
     	$("#mem_username_chk").hide();
     	$("#iscaselabel").hide();
     	$("#iscase").prop("required", false);     	
     	$("#sform").data("cansend", 1);
     	$("#sform").submit();
    } else {
    	alert("未在收支系統有收入紀錄的身分證字號將無法成為會員");
    	$("#mem_username_chk").show();
     	$("#iscaselabel").show();
     	$("#iscase").prop("required", true);
    }
  });
  return false;
  }
  
  }
  	
  return true;
}

han = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789.,-+ ";
zen = "ＡＢＣＤＥＦＧＨＩＪＫＬＭＮＯＰＱＲＳＴＵＶＷＸＹＺ０１２３４５６７８９．，－＋　";
function toZenkakuNum(motoText)
{
	str = "";
	for (i=0; i<motoText.length; i++)
	{
		c = motoText.charAt(i);
		n = zen.indexOf(c,0);
		if (n >= 0) c = han.charAt(n);
		str += c;
	}
	return str;
}
function si_up() {
	
}
function jointimetoday($yy, $ym, $yd) {
	$("#mem_jy").val($yy);
	$("#mem_jm").val($ym);
	$("#mem_jd").val($yd);
}
function showpd() {
	$memusername = $("#mem_username");
	if($memusername.length > 0 && $("#mem_passwd").val() < 3) {
		if($memusername.val().length >= 10) {			
			$("#mem_passwd").val($memusername.val().substr($memusername.val().length - 6));
		}		
	}
}
function ajax_chk_username() {

  return rrt;
}
function bmicount() {
	var mem_he = $("#mem_he"), mem_we = $("#mem_we"), mem_wet = $("#mem_wet"), mem_bmi = $("#mem_bmi");
	mem_bmi.val("0");
	if($.isNumeric(mem_he.val()) && $.isNumeric(mem_we.val())) {		
		he = parseFloat(mem_he.val());
		we = parseFloat(mem_we.val());
		if(he <= 0 || we <= 0) mem_bmi.val("0");
		else {
			he /= 100;
			he *= he;
			bmi = we/he;
			bmi = bmi.toFixed(1);
			mem_bmi.val(bmi);
			bmicount_changewet(bmi, mem_wet);
	  }
	}
}
function bmicount_changewet(bmi, cn) {
	if(bmi <= 18) cn.val("偏瘦");
	else if(bmi > 18 && bmi < 24) cn.val("中等");
	else if(bmi >= 24) cn.val("偏肉");
}
</script>