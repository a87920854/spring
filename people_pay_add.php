<html>
<script language="JavaScript" type="text/JavaScript">
    <!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function NM_changeCase(){
	if(document.getElementById){var args=NM_changeCase.arguments;
	for(var i=0;i<args.length;i=i+2){var obj=MM_findObj(args[i]);
	if(obj){(args[i+1])?obj.value=obj.value.toLowerCase():obj.value=obj.value.toUpperCase();}}}
}

function addall()
{
	 b1 = document.form1.p_name.value;
	 document.form1.p_other_name.value = b1;
}
//-->
</script>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>人事管理系統</title>
</head>

<STYLE TYPE="text/css">
    table {
        font-size: 13px;
    }

    table td {
        height: 30px;
    }

    table select {
        height: 30px;
        border: #ddd 1px solid;
        padding-left: 5px;
    }

    table input {
        height: 30px;
        color: #555;
        border: #ddd 1px solid;
        padding-left: 5px;
    }

    .ttable td {
        padding: 3px;
        padding-left: 5px;
    }

    .btn {
        text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.4);
        height: 33px;
        color: #333;
        background-color: #fff;
        border: #666 1px solid !important;
        display: inline-block;
        padding: 6px 12px !important;
        ;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .btn:hover {
        color: #000;
        background-color: #ddd;
    }
</STYLE>

<body topmargin="0">
    <form name="form1" method="POST" action="?st=add">
        <table width="100%" border="0" align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend>人事管理系統</legend>
                        <table width="100%" border="0" align="center" cellpadding="3">
                            <tr bgcolor="#FBE6E8">
                                <td>
                                    <div align="center">
                                        <font color="#FF3333" size="3">人事資料卡</font>
                                    </div>
                                </td>
                            </tr>
                            <tr bgcolor="#F0F0F0">
                                <td bgcolor="#F0F0F0" style="word-break:break-all">姓名：
                                    <input name="p_name" type="text" id="p_name" size="10">
                                    　身分證字號：
                                    <input name="p_user" type="text" id="p_user" onBlur="NM_changeCase('p_user',0)" size="12">
                                    　出生日期：
                                    <select name="b_year" id="b_year">
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
                                    </select>
                                    年
                                    <select name="b_month" id="b_month">
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
                                    <select name="b_date" id="b_date">
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
                            <tr bgcolor="#F0F0F0">
                                <td bgcolor="#F0F0F0" style="word-break:break-all">公司單位名稱：
                                    <select name="p_branch" id="p_branch">
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
                                    　正(兼)職：
                                    <select name="p_job" id="p_job">
                                        <option value="正職">正職</option>
                                        <option value="兼職">兼職</option>
                                    </select>
                                    　職稱：
                                    <select name="p_job2" id="p_job2">
                                        <option value="愛情顧問">愛情顧問</option>
                                        <option value="諮詢顧問">諮詢顧問</option>
                                        <option value="組織副督導">組織副督導</option>
                                        <option value="客戶主任">客戶主任</option>
                                        <option value="客戶部經理">客戶部經理</option>
                                        <option value="服務部經理">服務部經理</option>
                                        <option value="服務部主任">服務部主任</option>
                                        <option value="服務部副督導">服務部副督導</option>
                                        <option value="諮詢部組長">諮詢部組長</option>
                                        <option value="諮詢部主任">諮詢部主任</option>
                                        <option value="活動組長">活動組長</option>
                                        <option value="電訪員">電訪員</option>
                                        <option value="工讀生">工讀生</option>
                                        <option value="假日櫃台">假日櫃台</option>
                                        <option value="通路企劃">通路企劃</option>
                                        <option value="行銷企劃">行銷企劃</option>
                                        <option value="行銷副理">行銷副理</option>
                                        <option value="行銷部經理">行銷部經理</option>
                                        <option value="督導">督導</option>
                                        <option value="櫃台">櫃台</option>
                                        <option value="企劃">企劃</option>
                                        <option value="美編">美編</option>
                                        <option value="會計">會計</option>
                                        <option value="特助">特助</option>
                                        <option value="活動總監">活動總監</option>
                                        <option value="國外部銷售總監">國外部銷售總監</option>
                                        <option value="情感諮商師">情感諮商師</option>
                                        <option value="會務部副督導">會務部副督導</option>
                                        <option value="會計主任">會計主任</option>
                                        <option value="北區經理">北區經理</option>
                                        <option value="業務助理">業務助理</option>
                                        <option value="客服助理">客服助理</option>
                                        <option value="外部業務">外部業務</option>
                                        <option value="其他">其他</option>
                                        <option value="董事長">董事長</option>
                                        <option value="總經理">總經理</option>
                                        <option value="工程師">工程師</option>
                                        <option value="企業部專案主任">企業部專案主任</option>
                                        <option value="資深客戶經理">資深客戶經理</option>
                                        <option value="企業專員">企業專員</option>
                                        <option value="企業專案合作">企業專案合作</option>
                                        <option value="通路企劃">通路企劃</option>
                                        <option value="行銷公關副理">行銷公關副理</option>
                                        <option value="旅遊業務專員">旅遊業務專員</option>
                                        <option value="清潔人員">清潔人員</option>
                                        <option value="OP">OP</option>
                                    </select>
                                </td>
                            </tr>
                            <tr bgcolor="#F0F0F0">
                                <td bgcolor="#F0F0F0" style="word-break:break-all">到職日：
                                    <select name="j_year" id="j_year">
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
                                    年
                                    <select name="j_month" id="j_month">
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
                                    <select name="j_date" id="j_date">
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
                                    日　離職日：
                                    <select name="q_year" id="q_year">
                                        <option value="0">無</option>
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
                                    年
                                    <select name="q_month" id="q_month">
                                        <option value="0">無</option>
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
                                    <select name="q_date" id="q_date">
                                        <option value="0">無</option>
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
                            <tr bgcolor="#F0F0F0">
                                <td bgcolor="#FFFFE6" style="word-break:break-all">專線電話：
                                    <input name="phone_num" type="text" id="phone_num" size="20">
                                    　專線電話建立時間：
                                    <select name="phone_y" id="phone_y">
                                        <option value="0">無</option>
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
                                    年
                                    <select name="phone_m" id="phone_m">
                                        <option value="0">無</option>
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
                                    <select name="phone_d" id="phone_d">
                                        <option value="0">無</option>
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
                            <tr bgcolor="#F0F0F0">
                                <td bgcolor="#F0F0F0" style="word-break:break-all">通訊地址：
                                    <input name="p_address" type="text" id="p_address" size="50">
                                    　電話：
                                    <input name="p_ph1" type="text" id="p_ph1" size="3" maxlength="3">
                                    -
                                    <input name="p_ph2" type="text" id="p_ph2" size="15">
                                </td>
                            </tr>
                            <tr bgcolor="#F0F0F0">
                                <td bgcolor="#F0F0F0" style="word-break:break-all">戶籍地址：
                                    <input name="p_address2" type="text" id="p_address2" size="50">
                                    　手機：
                                    <input name="p_mobile" type="text" id="p_mobile" size="15">
                                </td>
                            </tr>
                            <tr bgcolor="#F0F0F0">
                                <td bgcolor="#F0F0F0" style="word-break:break-all">緊急聯絡姓名：
                                    <input name="emergency_name" type="text" id="emergency_name" size="15">
                                    　緊急聯絡電話：
                                    <input name="emergency_phone" type="text" id="emergency_phone" size="15">
                                </td>
                            </tr>
                            <tr bgcolor="#F0F0F0">
                                <td bgcolor="#F0F0F0" style="word-break:break-all">加保額度：
                                    <input name="safe_money" type="text" id="safe_money" size="8" value="0">
                                    　加入勞健保：
                                    <select name="sj_year" id="sj_year">
                                        <option value="0">無</option>
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
                                    年
                                    <select name="sj_month" id="sj_month">
                                        <option value="0">無</option>
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
                                    <select name="sj_date" id="sj_date">
                                        <option value="0">無</option>
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
                                    日　退出勞健保：
                                    <select name="sq_year" id="sq_year">
                                        <option value="0">無</option>
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
                                    年
                                    <select name="sq_month" id="sq_month">
                                        <option value="0">無</option>
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
                                    <select name="sq_date" id="sq_date">
                                        <option value="0">無</option>
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
                            <tr bgcolor="#F0F0F0">
                                <td bgcolor="#F0F0F0" style="word-break:break-all">協會健保：
                                    <input name="safe_money2" type="text" id="safe_money2" size="8" value="0">
                                    　加入健保：
                                    <select name="sj2_year" id="sj2_year">
                                        <option value="0">無</option>
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
                                    年
                                    <select name="sj2_month" id="sj2_month">
                                        <option value="0">無</option>
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
                                    <select name="sj2_date" id="sj2_date">
                                        <option value="0">無</option>
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
                                    日　　退出健保：
                                    <select name="sq2_year" id="sq2_year">
                                        <option value="0">無</option>
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
                                    年
                                    <select name="sq2_month" id="sq2_month">
                                        <option value="0">無</option>
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
                                    <select name="sq2_date" id="sq2_date">
                                        <option value="0">無</option>
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
                            <tr bgcolor="#FBE6E8">
                                <td bgcolor="#F0F0F0" style="word-break:break-all">備註：
                                    <input name="p_note" type="text" id="p_note" size="100">
                                </td>
                            </tr>
                            <tr bgcolor="#FBE6E8">
                                <td style="word-break:break-all">
                                    <div align="center">
                                        <input type="submit" name="Submit" class="btn" value="下一步">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
<script type="text/javascript" src="assets/plugins/jquery/jquery-2.2.3.min.js"></script>

<script type="text/javascript">
    $(function() {
        window.resizeTo(850, 600);
    });
</script>