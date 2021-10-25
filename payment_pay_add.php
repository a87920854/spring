<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>收支管理系統</title>
    <link href="assets/css/inputcss.css" rel="stylesheet" type="text/css" />
</head>

<body leftmargin="0" topmargin="0">
    <form action="?st=add" method="POST" name="form" id="form" onsubmit="return ckall()">
        <table width="100%" border="0" align="center">
            <tr>
                <td>
                    <table width="100%" border="0" align="center">
                        <tr>
                            <td>
                                <fieldset>
                                    <legend>收支管理系統</legend>
                                    <table width="100%" border="0" align="center" class="ttable">
                                        <tr bgcolor="#FBE6E8">
                                            <td colspan="4" bgcolor="#E6E6FF">
                                                <div align="center">
                                                    <font color="#330099" style="font-weight:bold;letter-spacing: 10px;">新增收入憑證</font>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#F0F0F0">
                                            <td colspan="4" bgcolor="#F0F0F0" style="word-break:break-all">日期：
                                                <select name="pay_year" id="pay_year">
                                                    <option value="2021" selected>2021</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2017">2017</option>
                                                </select>
                                                年
                                                <select name="pay_month" id="pay_month">
                                                    <option value="10" selected>10</option>
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
                                                <select name="pay_date" id="pay_date">
                                                    <option value="25" selected>25</option>
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
                                                日 &nbsp;&nbsp;
                                                <select name="pay_branch" id="pay_branch" class="getpaysingle" data-child="pay_sec" required>
                                                    <option value="" selected>請選擇會館</option>
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
                                                </select> &nbsp;&nbsp;
                                                <select name="pay_sec" id="pay_sec" required>
                                                    <option value="">請選擇</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#F0F0F0">
                                            <td colspan="4" bgcolor="#F0F0F0" style="word-break:break-all">姓名：<input name="pay_name" type="text" id="pay_name" style="width:100px;" required>
                                                　身分證字號：
                                                <input name="pay_user" type="text" id="pay_user" style="width:120px;" onkeyup="reset_pay_user();" required>
                                                　年次：
                                                <select name="pay_b_year" id="pay_b_year">
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>
                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>
                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="56">56</option>
                                                    <option value="57">57</option>
                                                    <option value="58">58</option>
                                                    <option value="59">59</option>
                                                    <option value="60">60</option>
                                                    <option value="61">61</option>
                                                    <option value="62">62</option>
                                                    <option value="63">63</option>
                                                    <option value="64">64</option>
                                                    <option value="65">65</option>
                                                    <option value="66">66</option>
                                                    <option value="67">67</option>
                                                    <option value="68">68</option>
                                                    <option value="69">69</option>
                                                    <option value="70">70</option>
                                                    <option value="71">71</option>
                                                    <option value="72">72</option>
                                                    <option value="73">73</option>
                                                    <option value="74">74</option>
                                                    <option value="75">75</option>
                                                    <option value="76">76</option>
                                                    <option value="77">77</option>
                                                    <option value="78">78</option>
                                                    <option value="79">79</option>
                                                    <option value="80">80</option>
                                                    <option value="81">81</option>
                                                    <option value="82">82</option>
                                                    <option value="83">83</option>
                                                    <option value="84">84</option>
                                                    <option value="85">85</option>
                                                    <option value="86">86</option>
                                                    <option value="87">87</option>
                                                    <option value="88">88</option>
                                                    <option value="89">89</option>
                                                    <option value="90">90</option>
                                                    <option value="91">91</option>
                                                    <option value="92">92</option>
                                                    <option value="93">93</option>
                                                    <option value="94">94</option>
                                                    <option value="95">95</option>
                                                    <option value="96">96</option>
                                                    <option value="97">97</option>
                                                    <option value="98">98</option>
                                                    <option value="99">99</option>
                                                    <option value="100">100</option>
                                                    <option value="101">101</option>
                                                    <option value="102">102</option>
                                                    <option value="103">103</option>
                                                    <option value="104">104</option>
                                                    <option value="105">105</option>
                                                    <option value="106">106</option>
                                                    <option value="107">107</option>
                                                    <option value="108">108</option>
                                                    <option value="109">109</option>
                                                    <option value="110">110</option>
                                                </select>
                                                　學歷：
                                                <select name="pay_school" id="pay_school">
                                                    <option value="國小">國小</option>
                                                    <option value="國中">國中</option>
                                                    <option value="高中">高中</option>
                                                    <option value="高職">高職</option>
                                                    <option value="專科">專科</option>
                                                    <option value="大學" selected>大學</option>
                                                    <option value="碩士">碩士</option>
                                                    <option value="博士">博士</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#F0F0F0">
                                            <td colspan="4" bgcolor="#F0F0F0" style="word-break:break-all">類型：
                                                <select name="pay_detail" id="pay_detail" onChange="setform()" required>
                                                    <option value="">請選擇</option>
                                                    <option value="入會">入會</option>
                                                    <option value="升卡">升卡</option>
                                                    <option value="會費尾款">會費尾款</option>
                                                    <option value="退費會費">退費會費</option>
                                                    <option value="國外旅遊">國外旅遊</option>
                                                    <option value="茶卷販售">茶卷販售</option>
                                                    <option value="儲值點數">儲值點數</option>
                                                </select>

                                                <span id="withdrawspan" style="display:none;">
                                                    <label><input type="checkbox" name="teacoupon2_remove" id="teacoupon2_remove" value="1" checked> 扣回所有茶卷</label>
                                                </span>

                                                <span id="teacouponspan" style="display:none;">
                                                    &nbsp;&nbsp;
                                                    <select name="teacoupon1" id="teacoupon1" style="display:none;">
                                                        <option value="">贈送免費茶卷</option>
                                                        <option value="0">不送</option>
                                                        <option value="1">1 張</option>
                                                        <option value="2">2 張</option>
                                                        <option value="3">3 張</option>
                                                        <option value="4">4 張</option>
                                                        <option value="5">5 張</option>
                                                        <option value="6">6 張</option>
                                                        <option value="7">7 張</option>
                                                        <option value="8">8 張</option>
                                                        <option value="9">9 張</option>
                                                        <option value="10">10 張</option>
                                                        <option value="11">11 張</option>
                                                        <option value="12">12 張</option>
                                                        <option value="13">13 張</option>
                                                        <option value="14">14 張</option>
                                                        <option value="15">15 張</option>
                                                        <option value="16">16 張</option>
                                                        <option value="17">17 張</option>
                                                        <option value="18">18 張</option>
                                                        <option value="19">19 張</option>
                                                        <option value="20">20 張</option>
                                                        <option value="21">21 張</option>
                                                        <option value="22">22 張</option>
                                                        <option value="23">23 張</option>
                                                        <option value="24">24 張</option>
                                                        <option value="25">25 張</option>
                                                        <option value="26">26 張</option>
                                                        <option value="27">27 張</option>
                                                        <option value="28">28 張</option>
                                                        <option value="29">29 張</option>
                                                        <option value="30">30 張</option>
                                                        <option value="31">31 張</option>
                                                        <option value="32">32 張</option>
                                                        <option value="33">33 張</option>
                                                        <option value="34">34 張</option>
                                                        <option value="35">35 張</option>
                                                        <option value="36">36 張</option>
                                                        <option value="37">37 張</option>
                                                        <option value="38">38 張</option>
                                                        <option value="39">39 張</option>
                                                        <option value="40">40 張</option>
                                                        <option value="41">41 張</option>
                                                        <option value="42">42 張</option>
                                                        <option value="43">43 張</option>
                                                        <option value="44">44 張</option>
                                                        <option value="45">45 張</option>
                                                        <option value="46">46 張</option>
                                                        <option value="47">47 張</option>
                                                        <option value="48">48 張</option>
                                                        <option value="49">49 張</option>
                                                        <option value="50">50 張</option>
                                                    </select>
                                                    &nbsp;&nbsp;
                                                    <select name="teacoupon2" id="teacoupon2" style="display:none;">
                                                        <option value="">購買付費茶卷</option>
                                                        <option value="1">1 張</option>
                                                        <option value="2">2 張</option>
                                                        <option value="3">3 張</option>
                                                        <option value="4">4 張</option>
                                                        <option value="5">5 張</option>
                                                        <option value="6">6 張</option>
                                                        <option value="7">7 張</option>
                                                        <option value="8">8 張</option>
                                                        <option value="9">9 張</option>
                                                        <option value="10">10 張</option>
                                                        <option value="11">11 張</option>
                                                        <option value="12">12 張</option>
                                                        <option value="13">13 張</option>
                                                        <option value="14">14 張</option>
                                                        <option value="15">15 張</option>
                                                        <option value="16">16 張</option>
                                                        <option value="17">17 張</option>
                                                        <option value="18">18 張</option>
                                                        <option value="19">19 張</option>
                                                        <option value="20">20 張</option>
                                                        <option value="21">21 張</option>
                                                        <option value="22">22 張</option>
                                                        <option value="23">23 張</option>
                                                        <option value="24">24 張</option>
                                                        <option value="25">25 張</option>
                                                        <option value="26">26 張</option>
                                                        <option value="27">27 張</option>
                                                        <option value="28">28 張</option>
                                                        <option value="29">29 張</option>
                                                        <option value="30">30 張</option>
                                                        <option value="31">31 張</option>
                                                        <option value="32">32 張</option>
                                                        <option value="33">33 張</option>
                                                        <option value="34">34 張</option>
                                                        <option value="35">35 張</option>
                                                        <option value="36">36 張</option>
                                                        <option value="37">37 張</option>
                                                        <option value="38">38 張</option>
                                                        <option value="39">39 張</option>
                                                        <option value="40">40 張</option>
                                                        <option value="41">41 張</option>
                                                        <option value="42">42 張</option>
                                                        <option value="43">43 張</option>
                                                        <option value="44">44 張</option>
                                                        <option value="45">45 張</option>
                                                        <option value="46">46 張</option>
                                                        <option value="47">47 張</option>
                                                        <option value="48">48 張</option>
                                                        <option value="49">49 張</option>
                                                        <option value="50">50 張</option>
                                                    </select>
                                                </span>

                                                <span id="upcardspan" style="display:none;">
                                                    &nbsp;&nbsp;到期日：
                                                    <select name="n11y" id="n11y">
                                                        <option value="2021">2021 年</option>
                                                        <option value="2022">2022 年</option>
                                                        <option value="2023">2023 年</option>
                                                        <option value="2024">2024 年</option>
                                                    </select>

                                                    <select name="n11m" id="n11m">
                                                        <option value="1">1 月</option>
                                                        <option value="2">2 月</option>
                                                        <option value="3">3 月</option>
                                                        <option value="4">4 月</option>
                                                        <option value="5">5 月</option>
                                                        <option value="6">6 月</option>
                                                        <option value="7">7 月</option>
                                                        <option value="8">8 月</option>
                                                        <option value="9">9 月</option>
                                                        <option value="10" selected>10 月</option>
                                                        <option value="11">11 月</option>
                                                        <option value="12">12 月</option>
                                                    </select>

                                                    <select name="n11d" id="n11d">
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
                                                        <option value="25" selected>25 日</option>
                                                        <option value="26">26 日</option>
                                                        <option value="27">27 日</option>
                                                        <option value="28">28 日</option>
                                                        <option value="29">29 日</option>
                                                        <option value="30">30 日</option>
                                                        <option value="31">31 日</option>
                                                    </select>

                                                </span>

                                            </td>
                                        </tr>
                                        <tr bgcolor="#F0F0F0">
                                            <td colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                                說明：
                                                <select name="pay_detail2" id="pay_detail2">
                                                    <option value="0">無</option>
                                                    <option value="107">真人認證</option>

                                                    <option value="210">菁英專案三個月</option>
                                                    <option value="211">菁英專案六個月</option>

                                                    <option value="1">璀璨一年</option>
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

                                                    <option value="會費">會費</option>
                                                    <option value="升卡">升卡</option>
                                                    <option value="銀行存款">銀行存款</option>
                                                    <option value="零用金">零用金</option>
                                                    <option value="刷退">刷退</option>
                                                    <option value="其他">其他</option>
                                                    <option value="520940">520940</option>

                                                </select>
                                            </td>
                                            <td colspan=2>
                                                應收金額：<input type="number" name="pay_total" id="pay_total" value="0" required> 元
                                            </td>
                                        </tr>
                                        <tr bgcolor="#F0F0F0">
                                            <td width="50%" colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                                現金：<input type="number" name="pay_cash" id="pay_cash" value="0" onkeyup="addall();" style="width:100px;"> 元
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                支票：<input type="number" name="pay_check" id="pay_check" value="0" onkeyup="addall();" style="width:100px;"> 元
                                            </td>
                                            <td colspan=2>
                                                實收金額：<input type="number" name="pay_total2" id="pay_total2" value="0" onblur="addall()" required> 元
                                            </td>
                                        </tr>
                                        <tr bgcolor="#F0F0F0">
                                            <td colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                                超商：<input type="number" name="pay_card3" id="pay_card3" value="0" onkeyup="addall();openno($(this),'pay_card4');" style="width:100px;"> 元
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                NO.<input type="text" name="pay_card4" id="pay_card4" style="width:120px;" disabled></td>
                                            <td colspan="2" rowspan="2" valign="top" bgcolor="#F0F0F0" style="word-break:break-all">
                                                新服務成本：<input type="number" name="ap_4new" id="ap_4new" value="0" style="width:100px;"> 元
                                            </td>
                                        </tr>
                                        <tr bgcolor="#F0F0F0">
                                            <td colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                                轉帳：<input type="number" name="pay_atm" id="pay_atm" value="0" onkeyup="addall();openno($(this),'pay_atm2');" style="width:100px;"> 元
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                NO.<input name="pay_atm2" type="text" id="pay_atm2" style="width:120px;" disabled>
                                            </td>

                                        </tr>
                                        <tr bgcolor="#F0F0F0">
                                            <td colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                                刷卡：<input type="number" name="pay_card" id="pay_card" value="0" onkeyup="addall();openno($(this),'pay_card2');" style="width:100px;"> 元
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                NO.<input type="text" name="pay_card2" id="pay_card2" style="width:120px;" disabled></td>
                                            <td colspan="2" bgcolor="#F0F0F0" style="word-break:break-all">
                                                代收尾款業績：
                                                <select name="b_1" id="b_1" class="getpaysingle" data-child="bs_1">
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
                                                </select> &nbsp;&nbsp;
                                                <select name="bs_1" id="bs_1">
                                                    <option value="">請選擇</option>
                                                </select> &nbsp;&nbsp;
                                                <input type="number" name="bp_1" id="bp_1" value="0" style="width:100px;"> 元
                                            </td>
                                        </tr>
                                        <tr bgcolor="#F0F0F0">
                                            <td width="65" rowspan="5" bgcolor="#F0F0F0" style="word-break:break-all">
                                                <div align="center">會館業績</div>
                                            </td>
                                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                                1. 本館：
                                                <select name="a_1" id="a_1">
                                                    <option value="無">請選擇</option>
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

                                                <select name="ap_1" id="ap_1">
                                                    <option value="0">0</option>
                                                    <option value="0.1">10</option>
                                                    <option value="0.125">12.5</option>
                                                    <option value="0.15">15</option>
                                                    <option value="0.18">18</option>
                                                    <option value="0.2">20</option>
                                                    <option value="0.24">24</option>
                                                    <option value="0.25">25</option>
                                                    <option value="0.3">30</option>
                                                    <option value="0.35">35</option>
                                                    <option value="0.38">38</option>
                                                    <option value="0.4">40</option>
                                                    <option value="0.42">42</option>
                                                    <option value="0.45">45</option>
                                                    <option value="0.5">50</option>
                                                    <option value="0.55">55</option>
                                                    <option value="0.6">60</option>
                                                    <option value="0.65">65</option>
                                                    <option value="0.7">70</option>
                                                    <option value="0.75">75</option>
                                                    <option value="0.8">80</option>
                                                    <option value="0.85">85</option>
                                                    <option value="0.9">90</option>
                                                    <option value="1">100</option>
                                                </select> %
                                            </td>
                                            <td width="65" rowspan="5" bgcolor="#F0F0F0" style="word-break:break-all">
                                                <div align="center">個人業績</div>
                                            </td>
                                            <td bgcolor="#F0F0F0" style="word-break:break-all">1.
                                                <select name="b_2" id="b_2" class="getpaysingle" data-child="bs_2">
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
                                                </select> &nbsp;&nbsp;
                                                <select name="bs_2" id="bs_2">
                                                    <option value="">請選擇</option>
                                                </select> &nbsp;&nbsp;
                                                <select name="bp_2" id="bp_2" onChange="secretaryall()">
                                                    <option value="0">0</option>
                                                    <option value="0.05">5</option>
                                                    <option value="0.1">10</option>
                                                    <option value="0.125">12.5</option>
                                                    <option value="0.15">15</option>
                                                    <option value="0.18">18</option>
                                                    <option value="0.2">20</option>
                                                    <option value="0.25">25</option>
                                                    <option value="0.3">30</option>
                                                    <option value="0.35">35</option>
                                                    <option value="0.38">38</option>
                                                    <option value="0.4">40</option>
                                                    <option value="0.42">42</option>
                                                    <option value="0.45">45</option>
                                                    <option value="0.5">50</option>
                                                    <option value="0.55">55</option>
                                                    <option value="0.6">60</option>
                                                    <option value="0.65">65</option>
                                                    <option value="0.7">70</option>
                                                    <option value="0.75">75</option>
                                                    <option value="0.8">80</option>
                                                    <option value="0.85">85</option>
                                                    <option value="0.9">90</option>
                                                    <option value="0.97">97</option>
                                                    <option value="1">100</option>
                                                </select> %
                                            </td>
                                        </tr>
                                        <tr bgcolor="#F0F0F0">
                                            <td bgcolor="#F0F0F0" style="word-break:break-all">
                                                2. 會館：
                                                <select name="a_2" id="a_2">
                                                    <option value="無">請選擇</option>
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
                                                <select name="ap_2" id="ap_2">
                                                    <option value="0">0</option>
                                                    <option value="0.1">10</option>
                                                    <option value="0.125">12.5</option>
                                                    <option value="0.15">15</option>
                                                    <option value="0.18">18</option>
                                                    <option value="0.2">20</option>
                                                    <option value="0.24">24</option>
                                                    <option value="0.25">25</option>
                                                    <option value="0.3">30</option>
                                                    <option value="0.35">35</option>
                                                    <option value="0.38">38</option>
                                                    <option value="0.4">40</option>
                                                    <option value="0.42">42</option>
                                                    <option value="0.45">45</option>
                                                    <option value="0.5">50</option>
                                                    <option value="0.55">55</option>
                                                    <option value="0.6">60</option>
                                                    <option value="0.65">65</option>
                                                    <option value="0.7">70</option>
                                                    <option value="0.75">75</option>
                                                    <option value="0.8">80</option>
                                                    <option value="0.85">85</option>
                                                    <option value="0.9">90</option>
                                                    <option value="1">100</option>
                                                </select> %
                                            </td>
                                            <td bgcolor="#F0F0F0" style="word-break:break-all">2.
                                                <select name="b_3" id="b_3" class="getpaysingle" data-child="bs_3">
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
                                                </select> &nbsp;&nbsp;
                                                <select name="bs_3" id="bs_3">
                                                    <option value="">請選擇</option>
                                                </select> &nbsp;&nbsp;
                                                <select name="bp_3" id="bp_3" onChange="secretaryall()">
                                                    <option value="0">0</option>
                                                    <option value="0.05">5</option>
                                                    <option value="0.1">10</option>
                                                    <option value="0.125">12.5</option>
                                                    <option value="0.15">15</option>
                                                    <option value="0.18">18</option>
                                                    <option value="0.2">20</option>
                                                    <option value="0.25">25</option>
                                                    <option value="0.3">30</option>
                                                    <option value="0.35">35</option>
                                                    <option value="0.38">38</option>
                                                    <option value="0.4">40</option>
                                                    <option value="0.42">42</option>
                                                    <option value="0.45">45</option>
                                                    <option value="0.5">50</option>
                                                    <option value="0.55">55</option>
                                                    <option value="0.6">60</option>
                                                    <option value="0.65">65</option>
                                                    <option value="0.7">70</option>
                                                    <option value="0.75">75</option>
                                                    <option value="0.8">80</option>
                                                    <option value="0.85">85</option>
                                                    <option value="0.9">90</option>
                                                    <option value="0.97">97</option>
                                                    <option value="1">100</option>
                                                </select> %
                                            </td>
                                        </tr>
                                        <tr bgcolor="#F0F0F0">
                                            <td width="275" bgcolor="#F0F0F0" style="word-break:break-all">
                                                3. 會館：
                                                <select name="a_3" id="a_3">
                                                    <option value="無">請選擇</option>
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
                                                <select name="ap_3" id="ap_3">
                                                    <option value="0">0</option>
                                                    <option value="0.1">10</option>
                                                    <option value="0.125">12.5</option>
                                                    <option value="0.15">15</option>
                                                    <option value="0.18">18</option>
                                                    <option value="0.2">20</option>
                                                    <option value="0.24">24</option>
                                                    <option value="0.25">25</option>
                                                    <option value="0.3">30</option>
                                                    <option value="0.35">35</option>
                                                    <option value="0.38">38</option>
                                                    <option value="0.4">40</option>
                                                    <option value="0.42">42</option>
                                                    <option value="0.45">45</option>
                                                    <option value="0.5">50</option>
                                                    <option value="0.55">55</option>
                                                    <option value="0.6">60</option>
                                                    <option value="0.65">65</option>
                                                    <option value="0.7">70</option>
                                                    <option value="0.75">75</option>
                                                    <option value="0.8">80</option>
                                                    <option value="0.85">85</option>
                                                    <option value="0.9">90</option>
                                                    <option value="1">100</option>
                                                </select> %
                                            </td>
                                            <td width="281" bgcolor="#F0F0F0" style="word-break:break-all">3.
                                                <select name="b_4" id="b_4" class="getpaysingle" data-child="bs_4">
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
                                                </select> &nbsp;&nbsp;
                                                <select name="bs_4" id="bs_4">
                                                    <option value="">請選擇</option>
                                                </select> &nbsp;&nbsp;
                                                <select name="bp_4" id="bp_4" onChange="secretaryall()">
                                                    <option value="0">0</option>
                                                    <option value="0.05">5</option>
                                                    <option value="0.1">10</option>
                                                    <option value="0.125">12.5</option>
                                                    <option value="0.15">15</option>
                                                    <option value="0.18">18</option>
                                                    <option value="0.2">20</option>
                                                    <option value="0.25">25</option>
                                                    <option value="0.3">30</option>
                                                    <option value="0.35">35</option>
                                                    <option value="0.38">38</option>
                                                    <option value="0.4">40</option>
                                                    <option value="0.42">42</option>
                                                    <option value="0.45">45</option>
                                                    <option value="0.5">50</option>
                                                    <option value="0.55">55</option>
                                                    <option value="0.6">60</option>
                                                    <option value="0.65">65</option>
                                                    <option value="0.7">70</option>
                                                    <option value="0.75">75</option>
                                                    <option value="0.8">80</option>
                                                    <option value="0.85">85</option>
                                                    <option value="0.9">90</option>
                                                    <option value="0.97">97</option>
                                                    <option value="1">100</option>
                                                </select> %
                                            </td>
                                        </tr>
                                        <tr bgcolor="#F0F0F0">
                                            <td width="275" bgcolor="#F0F0F0" style="word-break:break-all">
                                                4. 會館：
                                                <select name="a_5" id="a_5">
                                                    <option value="無">請選擇</option>
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
                                                <select name="ap_5" id="ap_5">
                                                    <option value="0">0</option>
                                                    <option value="0.1">10</option>
                                                    <option value="0.125">12.5</option>
                                                    <option value="0.15">15</option>
                                                    <option value="0.18">18</option>
                                                    <option value="0.2">20</option>
                                                    <option value="0.24">24</option>
                                                    <option value="0.25">25</option>
                                                    <option value="0.3">30</option>
                                                    <option value="0.35">35</option>
                                                    <option value="0.38">38</option>
                                                    <option value="0.4">40</option>
                                                    <option value="0.42">42</option>
                                                    <option value="0.45">45</option>
                                                    <option value="0.5">50</option>
                                                    <option value="0.55">55</option>
                                                    <option value="0.6">60</option>
                                                    <option value="0.65">65</option>
                                                    <option value="0.7">70</option>
                                                    <option value="0.75">75</option>
                                                    <option value="0.8">80</option>
                                                    <option value="0.85">85</option>
                                                    <option value="0.9">90</option>
                                                    <option value="1">100</option>
                                                </select> %
                                            </td>
                                            <td width="281" bgcolor="#F0F0F0" style="word-break:break-all">4.
                                                <select name="b_5" id="b_5" class="getpaysingle" data-child="bs_5">
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
                                                </select> &nbsp;&nbsp;
                                                <select name="bs_5" id="bs_5">
                                                    <option value="">請選擇</option>
                                                </select> &nbsp;&nbsp;
                                                <select name="bp_5" id="bp_5" onChange="secretaryall()">
                                                    <option value="0">0</option>
                                                    <option value="0.05">5</option>
                                                    <option value="0.1">10</option>
                                                    <option value="0.125">12.5</option>
                                                    <option value="0.15">15</option>
                                                    <option value="0.18">18</option>
                                                    <option value="0.2">20</option>
                                                    <option value="0.25">25</option>
                                                    <option value="0.3">30</option>
                                                    <option value="0.35">35</option>
                                                    <option value="0.38">38</option>
                                                    <option value="0.4">40</option>
                                                    <option value="0.42">42</option>
                                                    <option value="0.45">45</option>
                                                    <option value="0.5">50</option>
                                                    <option value="0.55">55</option>
                                                    <option value="0.6">60</option>
                                                    <option value="0.65">65</option>
                                                    <option value="0.7">70</option>
                                                    <option value="0.75">75</option>
                                                    <option value="0.8">80</option>
                                                    <option value="0.85">85</option>
                                                    <option value="0.9">90</option>
                                                    <option value="0.97">97</option>
                                                    <option value="1">100</option>
                                                </select> %
                                            </td>
                                        </tr>
                                        <tr bgcolor="#F0F0F0">
                                            <td width="275" bgcolor="#F0F0F0" style="word-break:break-all">
                                                5. 會館：
                                                <select name="a_6" id="a_6">
                                                    <option value="無">請選擇</option>
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
                                                <select name="ap_6" id="ap_6">
                                                    <option value="0">0</option>
                                                    <option value="0.1">10</option>
                                                    <option value="0.125">12.5</option>
                                                    <option value="0.15">15</option>
                                                    <option value="0.18">18</option>
                                                    <option value="0.2">20</option>
                                                    <option value="0.24">24</option>
                                                    <option value="0.25">25</option>
                                                    <option value="0.3">30</option>
                                                    <option value="0.35">35</option>
                                                    <option value="0.38">38</option>
                                                    <option value="0.4">40</option>
                                                    <option value="0.42">42</option>
                                                    <option value="0.45">45</option>
                                                    <option value="0.5">50</option>
                                                    <option value="0.55">55</option>
                                                    <option value="0.6">60</option>
                                                    <option value="0.65">65</option>
                                                    <option value="0.7">70</option>
                                                    <option value="0.75">75</option>
                                                    <option value="0.8">80</option>
                                                    <option value="0.85">85</option>
                                                    <option value="0.9">90</option>
                                                    <option value="1">100</option>
                                                </select> %
                                            </td>
                                            <td width="281" bgcolor="#F0F0F0" style="word-break:break-all">5.
                                                <select name="b_6" id="b_6" class="getpaysingle" data-child="bs_6">
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
                                                </select> &nbsp;&nbsp;
                                                <select name="bs_6" id="bs_6">
                                                    <option value="">請選擇</option>
                                                </select> &nbsp;&nbsp;
                                                <select name="bp_6" id="bp_6" onChange="secretaryall()">
                                                    <option value="0">0</option>
                                                    <option value="0.05">5</option>
                                                    <option value="0.1">10</option>
                                                    <option value="0.125">12.5</option>
                                                    <option value="0.15">15</option>
                                                    <option value="0.18">18</option>
                                                    <option value="0.2">20</option>
                                                    <option value="0.25">25</option>
                                                    <option value="0.3">30</option>
                                                    <option value="0.35">35</option>
                                                    <option value="0.38">38</option>
                                                    <option value="0.4">40</option>
                                                    <option value="0.42">42</option>
                                                    <option value="0.45">45</option>
                                                    <option value="0.5">50</option>
                                                    <option value="0.55">55</option>
                                                    <option value="0.6">60</option>
                                                    <option value="0.65">65</option>
                                                    <option value="0.7">70</option>
                                                    <option value="0.75">75</option>
                                                    <option value="0.8">80</option>
                                                    <option value="0.85">85</option>
                                                    <option value="0.9">90</option>
                                                    <option value="0.97">97</option>
                                                    <option value="1">100</option>
                                                </select> %
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" bgcolor="#E6E6FF" style="word-break:break-all">
                                                <div align="center">
                                                    <input type="submit" name="Submit" class="btn" value="確定送出">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </fieldset>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>


    <script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>
    <script src="js/util.js?v=1.4"></script>

    <script type="text/javascript">
        $(function() {
            window.resizeTo(850, 730);
            $(".getpaysingle").each(function() {
                var $this = $(this),
                    $thisid = $this.attr("id"),
                    $childid = $this.data("child");
                $this.on("change", function() {
                    pay_personnel_get($thisid, $childid);
                });
            });

        });

        function openno($t, $c) {
            $("#" + $c).prop("disabled", true);
            if ($.isNumeric($t.val())) {
                if ($t.val() > 0) $("#" + $c).prop("disabled", false);
            }
        }

        han = "0123456789.,-+";
        zen = "０１２３４５６７８９．，－＋";

        function toZenkakuNum(motoText) {
            str = "";
            for (i = 0; i < motoText.length; i++) {
                c = motoText.charAt(i);
                n = zen.indexOf(c, 0);
                if (n >= 0) c = han.charAt(n);
                str += c;
            }
            return str;
        }

        //浮點數相加
        function FloatAdd(arg1, arg2) {
            var r1, r2, m;
            try {
                r1 = arg1.toString().split(".")[1].length;
            } catch (e) {
                r1 = 0;
            }
            try {
                r2 = arg2.toString().split(".")[1].length;
            } catch (e) {
                r2 = 0;
            }
            m = Math.pow(10, Math.max(r1, r2));
            return (FloatMul(arg1, m) + FloatMul(arg2, m)) / m;
        }
        //浮點數相減
        function FloatSubtraction(arg1, arg2) {
            var r1, r2, m, n;
            try {
                r1 = arg1.toString().split(".")[1].length
            } catch (e) {
                r1 = 0
            }
            try {
                r2 = arg2.toString().split(".")[1].length
            } catch (e) {
                r2 = 0
            }
            m = Math.pow(10, Math.max(r1, r2));
            n = (r1 >= r2) ? r1 : r2;
            return ((arg1 * m - arg2 * m) / m).toFixed(n);
        }
        //浮點數相乘
        function FloatMul(arg1, arg2) {
            var m = 0,
                s1 = arg1.toString(),
                s2 = arg2.toString();
            try {
                m += s1.split(".")[1].length;
            } catch (e) {}
            try {
                m += s2.split(".")[1].length;
            } catch (e) {}
            return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m);
        }
        //浮點數相除
        function FloatDiv(arg1, arg2) {
            var t1 = 0,
                t2 = 0,
                r1, r2;
            try {
                t1 = arg1.toString().split(".")[1].length
            } catch (e) {}
            try {
                t2 = arg2.toString().split(".")[1].length
            } catch (e) {}
            with(Math) {
                r1 = Number(arg1.toString().replace(".", ""))
                r2 = Number(arg2.toString().replace(".", ""))
                return (r1 / r2) * pow(10, t2 - t1);
            }
        }

        function setform() {
            $a1 = $("#pay_detail").val();
            if ($a1 == "會費尾款" || $a1 == "退費會費" || $a1 == "茶卷販售" || $a1 == "儲值點數") {
                $("#pay_total").prop("disabled", true);
            } else {
                $("#pay_total").prop("disabled", false);
            }

            reset_spans();


            if ($a1 == "入會") {
                $("#teacoupon1").show().prop("required", true);
                $("#teacouponspan").show();
            }

            if ($a1 == "升卡") {
                if (!$("#pay_user").val()) {
                    alert("升卡請先輸入身分證字號。");
                    $("#pay_detail").val("");
                    $("#pay_user").focus();
                    $("#upcardspan").hide();
                } else {
                    $("#upcardspan").show();
                    $("#teacoupon1").show().prop("required", true);
                    $("#teacouponspan").show();
                    $.ajax({
                        url: "payment_pay_add.asp?st=queryupcard&uid=" + $("#pay_user").val()
                    }).done(function(msg) {

                        if (msg == "ok") {

                        } else {
                            alert(msg);
                            reset_pay_user();
                        }
                    });
                }
            }

            if ($a1 == "茶卷販售") {
                $("#teacoupon2").show().prop("required", true);
                $("#teacouponspan").show();
            }

            if ($a1 == "退費會費") {
                $("#withdrawspan").show();
            }

        }

        function reset_pay_user() {
            reset_spans();
            $("#pay_detail").val("");
        }

        function reset_spans() {
            $("#teacouponspan").hide();
            $("#teacoupon1").val("").hide().prop("required", false);
            $("#teacoupon2").val("").hide().prop("required", false);

            $("#upcardspan").hide();

            $("#teacoupon2_remove").prop("checked", true);
            $("#withdrawspan").hide();
        }

        function addall() {
            $b1 = $("#pay_cash");
            $b2 = $("#pay_check");
            $b3 = $("#pay_atm");
            $b4 = $("#pay_card");
            $b5 = $("#pay_card3");

            $b1v = parseInt($b1.val());
            $b2v = parseInt($b2.val());
            $b3v = parseInt($b3.val());
            $b4v = parseInt($b4.val());
            $b5v = parseInt($b5.val());

            $("#pay_total2").val($b1v + $b2v + $b3v + $b4v + $b5v);
        }

        function branchall() {
            ba1 = parseFloat($("#ap_1").val());
            ba2 = parseFloat($("#ap_2").val());
            ba3 = parseFloat($("#ap_3").val());
            ba4 = parseFloat($("#ap_5").val());
            ba5 = parseFloat($("#ap_6").val());
            ba6 = FloatAdd(ba1, ba2);
            ba6 = FloatAdd(ba6, ba3);
            ba6 = FloatAdd(ba6, ba4);
            ba6 = FloatAdd(ba6, ba5);
            if (ba1 > 0 && $("#a_1").val() == "無") {
                alert("分配趴數後請選擇會館");
                return false;
            }
            if (ba2 > 0 && $("#a_2").val() == "無") {
                alert("分配趴數後請選擇會館");
                return false;
            }
            if (ba3 > 0 && $("#a_3").val() == "無") {
                alert("分配趴數後請選擇會館");
                return false;
            }
            if (ba4 > 0 && $("#a_4").val() == "無") {
                alert("分配趴數後請選擇會館");
                return false;
            }
            if (ba5 > 0 && $("#a_5").val() == "無") {
                alert("分配趴數後請選擇會館");
                return false;
            }

            if (ba6 != 1) {
                alert("分配比例錯誤，會館業績趴數超過或未達 100%");
                return false;
            }
            return true;
        }

        function secretaryall() {
            sa1 = parseFloat($("#bp_2").val());
            sa2 = parseFloat($("#bp_3").val());
            sa3 = parseFloat($("#bp_4").val());
            sa4 = parseFloat($("#bp_5").val());
            sa5 = parseFloat($("#bp_6").val());
            sa6 = FloatAdd(sa1, sa2);
            sa6 = FloatAdd(sa6, sa3);
            sa6 = FloatAdd(sa6, sa4);
            sa6 = FloatAdd(sa6, sa5);
            if (sa6 > 1) {
                alert("分配比例錯誤，秘書業績趴數超過 100%");
                return false;
            }
            return true;
        }

        function ckall() {


            if ($("#pay_cash").val() == "") $("#pay_cash").val("0");
            if ($("#pay_check").val() == "") $("#pay_check").val("0");
            if ($("#pay_atm").val() == "") $("#pay_atm").val("0");
            if ($("#pay_card").val() == "") $("#pay_card").val("0");
            if ($("#pay_card3").val() == "") $("#pay_card3").val("0");

            var $pay_user = $("#pay_user").val();
            if ($pay_user.length != 10 && $pay_user.length != 11) {
                alert("身分證字號錯誤。\n只能為：\n1.手機 - 10 位數字\n2.身分證字號 - 11 字元");
                $("#pay_user").focus();
                return false;
            }
            $pay_detail = $("#pay_detail").val();
            if ($pay_detail != "會費尾款" && $pay_detail != "退費會費" && $pay_detail != "茶卷販售" && $pay_detail != "儲值點數") {
                $pay_total = $("#pay_total").val();
                if ($pay_total == "" || $pay_total == "0" || $pay_total == 0) {
                    alert("應收金額不能是 0。");
                    $("#pay_total").focus();
                    return false;
                }
            }

            $pay_total2 = $("#pay_total2").val();
            if ($pay_total2 == "" || $pay_total2 == "0" || $pay_total2 == 0) {
                alert("實收金額不能是 0。");
                $("#pay_total2").focus();
                return false;
            }

            ck1 = $("#pay_detail").val();
            if (ck1 == "退費會費") {
                var $mm = $("#pay_total2");
                if ($mm.length > 0 && $mm.val() > 0) $mm.val(-1 * $mm.val());
                var $mm = $("#bp_1");
                if ($mm.length > 0 && $mm.val() > 0) $mm.val(-1 * $mm.val());
                var $mm = $("#ap_4new");
                if ($mm.length > 0 && $mm.val() > 0) $mm.val(-1 * $mm.val());
            }

            if ($("#pay_cash").val() == "") $("#pay_cash").val("0");
            if ($("#pay_check").val() == "") $("#pay_check").val("0");
            if ($("#pay_atm").val() == "") $("#pay_atm").val("0");
            if ($("#pay_card").val() == "") $("#pay_card").val("0");
            if ($("#pay_card3").val() == "") $("#pay_card3").val("0");

            if (!branchall()) return false;
            if (!secretaryall()) return false;

            return true;
        }
    </script>

</body>

</html>