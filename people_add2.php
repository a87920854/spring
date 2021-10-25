<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>人事管理系統</title>
    <STYLE TYPE="text/css">
        body,
        th,
        td,
        input,
        select,
        textarea,
        select,
        checkbox {
            font: 10pt 新細明體
        }

        a:link {
            font: 10pt "新細明";
            text-decoration: underline;
            color: none
        }

        a:visited {
            font: 10pt "新細明";
            text-decoration: underline;
            color: 000099
        }

        a:active {
            font: 10pt "新細明";
            text-decoration: underline;
            color: 00CC66
        }

        a:hover {
            font: 10pt 新細明;
            text-decoration: underline;
            color: ff0000
        }
    </STYLE>
    <script language="JavaScript" type="text/JavaScript">

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

</script>
</head>

<body topmargin="0">
    <form name="form1" method="POST" action="?st=add">
        <table width="730" border="0" align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend>人事管理系統</legend>
                        <table width="720" border="0" align="center" cellpadding="3">
                            <tr bgcolor="#FBE6E8">
                                <td colspan="5">
                                    <div align="center">
                                        <font color="#FF3333" size="3">新增扶養眷屬資料</font>
                                    </div>
                                </td>
                            </tr>
                            <tr bgcolor="#F0F0F0">
                                <td colspan="5" bgcolor="#F0F0F0" style="word-break:break-all">姓名：
                                    <input name="p_name2" type="text" id="p_name2" style="font-size: 9pt" size="8">
                                    　身分證字號：
                                    <input name="p_user2" type="text" id="p_user2" style="font-size: 9pt" onBlur="NM_changeCase('p_user',0)" size="10">
                                    　出生日期：
                                    <select name="b_year2" id="b_year2" style="font-size: 9pt">
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
                                    年
                                    <select name="b_month2" id="b_month2" style="font-size: 9pt">
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
                                    <select name="b_date2" id="b_date2" style="font-size: 9pt">
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
                                    日　關係：
                                    <input name="p_relation" type="text" id="p_relation" style="font-size: 9pt" size="6">
                                    <input type="submit" name="Submit" value="新增" style="font-size: 9pt">
                                    <input name="p_auto" type="hidden" id="p_auto" value="1717">
                                </td>
                            </tr>
                            <tr bgcolor="#F0F0F0">
                                <td width="100" bgcolor="#FBE6E8" style="word-break:break-all">
                                    <div align="center">姓名</div>
                                </td>
                                <td width="160" bgcolor="#FBE6E8" style="word-break:break-all">
                                    <div align="center">身分證字號</div>
                                </td>
                                <td width="230" bgcolor="#FBE6E8" style="word-break:break-all">
                                    <div align="center">出生日期</div>
                                </td>
                                <td width="108" bgcolor="#FBE6E8" style="word-break:break-all">
                                    <div align="center">關係</div>
                                </td>
                                <td width="60" bgcolor="#FBE6E8" style="word-break:break-all">
                                    <div align="center">　</div>
                                </td>
                            </tr>

                            <tr bgcolor="#FBE6E8">
                                <td colspan="5" bgcolor="#FBE6E8" style="word-break:break-all">
                                    <div align="center">
                                        <input name="Submit2" type="button" style="font-size: 9pt" onClick="location.href='win_close.asp'" value="設定完成">
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



<STYLE TYPE="text/css">
    <!-- body,th,td,input,select,textarea,select,checkbox {font:10pt 新細明體}
    a:link {
        font: 10pt "新細明";
        text-decoration: underline;
        color: none
    }

    a:visited {
        font: 10pt "新細明";
        text-decoration: underline;
        color: 000099
    }

    a:active {
        font: 10pt "新細明";
        text-decoration: underline;
        color: 00CC66
    }

    a:hover {
        font: 10pt 新細明;
        text-decoration: underline;
        color: ff0000
    }
    -->
</STYLE>

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
//-->
</script>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>人事管理系統</title>
</head>

<body topmargin="0">
    <form name="form1" method="POST" action="?st=add">
        <table width="730" border="0" align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend>人事管理系統</legend>
                        <table width="720" border="0" align="center" cellpadding="3">
                            <tr bgcolor="#FBE6E8">
                                <td colspan="5">
                                    <div align="center">
                                        <font color="#FF3333" size="3">新增扶養眷屬資料</font>
                                    </div>
                                </td>
                            </tr>
                            <tr bgcolor="#F0F0F0">
                                <td colspan="5" bgcolor="#F0F0F0" style="word-break:break-all">姓名：
                                    <input name="p_name2" type="text" id="p_name2" style="font-size: 9pt" size="8">
                                    　身分證字號：
                                    <input name="p_user2" type="text" id="p_user2" style="font-size: 9pt" onBlur="NM_changeCase('p_user',0)" size="10">
                                    　出生日期：
                                    <select name="b_year2" id="b_year2" style="font-size: 9pt">
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
                                    年
                                    <select name="b_month2" id="b_month2" style="font-size: 9pt">
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
                                    <select name="b_date2" id="b_date2" style="font-size: 9pt">
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
                                    日　關係：
                                    <input name="p_relation" type="text" id="p_relation" style="font-size: 9pt" size="6">
                                    <input type="submit" name="Submit" value="新增" style="font-size: 9pt">
                                    <input name="p_auto" type="hidden" id="p_auto" value="1717">
                                </td>
                            </tr>
                            <tr bgcolor="#F0F0F0">
                                <td width="100" bgcolor="#FBE6E8" style="word-break:break-all">
                                    <div align="center">姓名</div>
                                </td>
                                <td width="160" bgcolor="#FBE6E8" style="word-break:break-all">
                                    <div align="center">身分證字號</div>
                                </td>
                                <td width="230" bgcolor="#FBE6E8" style="word-break:break-all">
                                    <div align="center">出生日期</div>
                                </td>
                                <td width="108" bgcolor="#FBE6E8" style="word-break:break-all">
                                    <div align="center">關係</div>
                                </td>
                                <td width="60" bgcolor="#FBE6E8" style="word-break:break-all">
                                    <div align="center">　</div>
                                </td>
                            </tr>

                            <tr bgcolor="#FBE6E8">
                                <td colspan="5" bgcolor="#FBE6E8" style="word-break:break-all">
                                    <div align="center">
                                        <input name="Submit2" type="button" style="font-size: 9pt" onClick="location.href='win_close.asp'" value="設定完成">
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