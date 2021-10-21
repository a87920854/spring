<html>
<SCRIPT LANGUAGE="JavaScript" src="checkform.js"></script>
<script language="JavaScript" type="text/JavaScript"><!--
function VF_form5(){ //v2.0
<!--start_of_saved_settings-->
    <!--type,checkbox,name,s1,isChecked,errMsg,a123-->
    <!--type,text,name,mem_address,required,true,errMsg,a123-->
    <!--type,text,name,mem_mail,required,true,isEmail,errMsg,a123-->
    <!--type,text,name,mem_mobile,required,true,isNum,errMsg,a123-->
    <!--type,radio-g,name,mem_sex,isChecked,errMsg,a123-->
    <!--type,text,name,mem_name,required,true,errMsg,a123-->
    <!--type,password,name,mem_ckpasswd,required,true,isEqualTo,mem_passwd,errMsg,a123-->
    <!--type,password,name,mem_passwd,required,true,isEqualTo,mem_ckpasswd,errMsg,a123-->
    <!--type,text,name,mem_username,required,true,errMsg,a123-->
    <!--end_of_saved_settings-->
    var theForm = document.form5;
    var numRE = /^\d+$/;
    var emailRE = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
    var rFlg_mem_sex = false;
    var rFlg_mem_school = false;
    var rFlg_mem_blood = false;
    var sFlg_mem_star = false;
    var sFlg_mem_area = false;
    var errMsg = "";
    var setfocus = "";

    for(var r8=0;r8<theForm['mem_sex'].length;r8++){if(theForm['mem_sex'][r8].checked)rFlg_mem_sex=true;} for(var r6=0;r6<theForm['mem_school'].length;r6++){if(theForm['mem_school'][r6].checked)rFlg_mem_school=true;} for(var r5=0;r5<theForm['mem_blood'].length;r5++){if(theForm['mem_blood'][r5].checked)rFlg_mem_blood=true;} for(var s4=0;s4<theForm['mem_star'].length;s4++){if(theForm['mem_star'].options[s4].selected){if(theForm['mem_star'].options[s4].text==theForm['mem_star'].options[0].text)sFlg_mem_star=true;}} for(var s0=0;s0<theForm['mem_area'].length;s0++){if(theForm['mem_area'].options[s0].selected){if(theForm['mem_area'].options[s0].text==theForm['mem_area'].options[0].text)sFlg_mem_area=true;}} if (!rFlg_mem_school){ errMsg="學歷沒有選擇" ; setfocus="['mem_school'][0]" ; } if (!rFlg_mem_blood){ errMsg="血型沒有選擇" ; setfocus="['mem_blood'][0]" ; } if (sFlg_mem_star){ errMsg="星座沒有選擇" ; setfocus="['mem_star']" ; } if (theForm['mem_nick'].value=="" ){ errMsg="暱稱沒有填" ; setfocus="['mem_nick']" ; } if (sFlg_mem_area){ errMsg="地區沒有選擇" ; setfocus="['mem_area']" ; } if (theForm['mem_address'].value=="" ){ errMsg="地址沒有填" ; setfocus="['mem_address']" ; } if (!rFlg_mem_sex){ errMsg="性別沒有選擇" ; setfocus="['mem_sex'][0]" ; } if (theForm['mem_name'].value=="" ){ errMsg="姓名沒有填" ; setfocus="['mem_name']" ; } if (errMsg !="" ){ alert(errMsg); eval("theForm" + setfocus + ".focus()" ); } else theForm.submit(); } function MM_findObj(n, d) { //v4.01 var p,i,x; if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
        d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
        if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n]; for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document); if(!x && d.getElementById) x=d.getElementById(n); return x; } function NM_changeCase(){ if(document.getElementById){var args=NM_changeCase.arguments; for(var i=0;i<args.length;i=i+2){var obj=MM_findObj(args[i]); if(obj){(args[i+1])?obj.value=obj.value.toLowerCase():obj.value=obj.value.toUpperCase();}}} } //-->

            han = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789.,-+ ";
            zen = "ＡＢＣＤＥＦＧＨＩＪＫＬＭＮＯＰＱＲＳＴＵＶＷＸＹＺ０１２３４５６７８９．，－＋　";
            function toZenkakuNum(motoText)
            {
            str = "";
            for (i=0; i<motoText.length; i++) { c=motoText.charAt(i); n=zen.indexOf(c,0); if (n>= 0) c = han.charAt(n);
                str += c;
                }
                return str;
                }


                //-->
</script>
<STYLE TYPE="text/css">
    body {
        overflow-y: auto;
    }

    table {
        font-size: 13px;
    }
</STYLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<body text="#333333" leftmargin="0" topmargin="0">

    <table width="652" border="0" cellspacing="0">
        <tr>
            <td width="650" valign="top">
                <form action="ad_fun_mem_fix.php?state=add" method="post" name="form5" onSubmit="VF_form5();return false;">
                    <table width="650" border="1">
                        <tr>
                            <td height="25" bgcolor="#336699">
                                <div align="center">
                                    <font color="#990066" size="3"><strong>
                                            <font color="#FFFFFF">修改資料</font>
                                        </strong></font>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>處理單位：</td>
                        </tr>
                        <tr>
                            <td>帳號：
                                <input name="mem_username" type="text" id="mem_username" style="font-size: 9pt" onBlur="NM_changeCase('mem_username',0);this.value=toZenkakuNum(this.value)" value="A230477316" size="15" maxlength="10">
                                <font color="#999999">（ 請填入<font color="#FF0000">身分證字號</font>）</font>密碼：<font color="#999999">
                                    <input name="mem_passwd" type="text" id="mem_passwd" style="font-size: 9pt" value="h0714714" size="15" maxlength="8">
                                    <font color="#999999">（請填入5至8字元的英文或數字）</font>
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td>姓名：
                                <input name="mem_name" type="text" id="mem_name" style="font-size: 9pt" value="蔡詩涵" size="15">
                                <font color="#999999">（請填入中文姓名）</font>
                            </td>
                        </tr>
                        <tr>
                            <td>性別：
                                <input type="radio" name="mem_sex" value="男">
                                男
                                <input CHECKED name="mem_sex" type="radio" value="女">
                                女<font color="#999999">（請謹慎選擇）</font>
                            </td>
                        </tr>
                        <tr>
                            <td>出生年月日：西元
                                <select name="mem_by" id="mem_by" style="font-size: 9pt">
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
                                    <option value="1984" SELECTED>1984</option>
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
                                    <option value="1965">1965</option>
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
                                </select>
                                年
                                <select name="mem_bm" id="mem_bm" style="font-size: 9pt">
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
                                    <option value="12" SELECTED>12</option>
                                </select>
                                月
                                <select name="mem_bd" id="mem_bd" style="font-size: 9pt">
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
                                    <option value="26" SELECTED>26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                                日　星座：<font size="2">
                                    <select name="mem_star" id="select" style="font-size: 9pt">
                                        <option value="">請選擇</option>
                                        <option value="水瓶座">水瓶座</option>
                                        <option value="雙魚座">雙魚座</option>
                                        <option value="牡羊座">牡羊座</option>
                                        <option value="金牛座">金牛座</option>
                                        <option value="雙子座">雙子座</option>
                                        <option value="巨蟹座">巨蟹座</option>
                                        <option value="獅子座">獅子座</option>
                                        <option value="處女座">處女座</option>
                                        <option value="天秤座">天秤座</option>
                                        <option value="天蠍座">天蠍座</option>
                                        <option value="射手座">射手座</option>
                                        <option value="魔羯座" SELECTED>魔羯座</option>
                                    </select>
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td>手機：0978086055　　
                                電話： <font color="#999999"><input name="mem_phone" type="text" id="mem_phone" style="font-size: 9pt" value="0978086055" size="15"></font>
                            </td>
                        </tr>
                        <tr>
                            <td>E-mail：
                                <input name="mem_mail" type="text" id="mem_mail" style="font-size: 9pt" value="hebe524575408@gmail.com" size="35">
                                　MSN/LINE：
                                <input name="mem_msn" type="text" id="mem_msn" style="font-size: 9pt" value="" size="35">
                            </td>
                        </tr>
                        <tr>
                            <td>地區：<font size="2">
                                    <select name="mem_area" id="mem_area" style="font-size: 9pt">
                                        <option value="">請選擇</option>
                                        <option value="新北市">新北市</option>
                                        <option value="台北市">台北市</option>
                                        <option value="基隆市">基隆市</option>
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
                                        <option value="金門縣" selected="selected">金門縣</option>
                                        <option value="馬祖">馬祖</option>
                                        <option value="綠島">綠島</option>
                                        <option value="蘭嶼">蘭嶼</option>

                                        <option value="其他">其他</option>
                                    </select>
                                </font>地址：
                                <input name="mem_address" type="text" id="mem_address" style="font-size: 9pt" value="金寧鄉湖南310號" size="60">
                            </td>
                        </tr>
                        <tr>
                            <td>身高：
                                <input name="mem_he" type="text" id="mem_he2" style="font-size: 9pt" onBlur="document.form5.mem_he.value=toZenkakuNum(document.form5.mem_he" value="153" size="5">
                                公分　體重：
                                <input name="mem_we" type="text" id="mem_we2" style="font-size: 9pt" onBlur="document.form5.mem_we.value=toZenkakuNum(document.form5.mem_we" value="45" size="5">
                                公斤
                            </td>
                        </tr>
                        <tr>
                            <td>血型：
                                <input type="radio" name="mem_blood" value="A">
                                A型
                                <input type="radio" name="mem_blood" value="B">
                                B型
                                <input type="radio" name="mem_blood" value="O">
                                O型
                                <input type="radio" name="mem_blood" value="AB">
                                AB型
                            </td>
                        </tr>
                        <tr>
                            <td>學歷：<font size="2">
                                    <input type="radio" name="mem_school" value="國中">
                                    國中
                                    <input type="radio" name="mem_school" value="高中">
                                    高中
                                    <input type="radio" name="mem_school" value="高職">
                                    高職
                                    <input CHECKED type="radio" name="mem_school" value="專科">
                                    專科
                                    <input type="radio" name="mem_school" value="大學">
                                    大學
                                    <input type="radio" name="mem_school" value="碩士">
                                    碩士
                                    <input type="radio" name="mem_school" value="博士">
                                    博士
                                    <input type="radio" name="mem_school" value="其他">
                                    其他
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td>職業：<font size="2">
                                    <select name="mem_job1" id="mem_job1" style="font-size: 9pt">
                                        <option value="公務/國家機關" SELECTED>公務/國家機關</option>
                                        <option value="司法/法務">司法/法務</option>
                                        <option value="軍警單位">軍警單位</option>
                                        <option value="自營/投資">自營/投資</option>
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
                                </font>　職務名稱：
                                <input name="mem_job2" type="text" id="mem_job2" style="font-size: 9pt" value="服務人員" size="20" maxlength="8">
                            </td>
                        </tr>
                        <tr>
                            <td>婚姻狀態：
                                <input CHECKED name="mem_marry" type="radio" value="未婚" checked>
                                未婚
                                <input type="radio" name="mem_marry" value="已婚">
                                已婚
                                <input type="radio" name="mem_marry" value="離婚">
                                離婚
                                <input type="radio" name="mem_marry" value="喪偶">
                                喪偶
                                <input type="radio" name="mem_marry" value="保密">
                                保密 <input type="radio" name="mem_marry" value="交往中">
                                交往中
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="center">
                                    <input name="Submit3" type="submit" value="確定修改" style="font-size: 9pt">
                                    <input name="mem_auto" type="hidden" id="mem_auto" value="14089">
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</body>

</html>