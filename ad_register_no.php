<?php
    include("top.php");
?>

<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.asp">管理系統</a></li>
            <li><a href="ad_no_mem.asp">未入會資料</a></li>
            <li class="active">新增未入會資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>新增未入會資料</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form id="addform" action="?st=add" method="post" target="_self" class="form-inline">
                    <small style="color:red">向日葵名單已整合至通路合作中</small>
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td><span class="text-blue">資料來源：</span>
                                    <select name="mem_come" id="mem_come">
                                        <option value="流水陌call">流水陌call</option>
                                        <option value="樂得流水call">樂得流水call</option>
                                        <option value="樂得系統回call">樂得系統回call</option>
                                        <option value="萊優流水call">萊優流水call</option>
                                        <option value="萊優Robotcall">萊優Robotcall</option>
                                        <option value="手機1111">手機1111</option>
                                        <option value="客人自來電">客人自來電</option>
                                        <option value="訪客自來">訪客自來</option>
                                        <option value="來過未參追">來過未參追</option>
                                        <option value="活動宣傳">活動宣傳</option>
                                        <option value="五人未入會">五人未入會</option>
                                        <option value="外部A名單">外部A名單</option>
                                        <option value="外部B名單">外部B名單</option>
                                        <option value="外部C名單">外部C名單</option>
                                        <option value="春天部落格">春天部落格</option>
                                        <option value="通路王">通路王</option>
                                        <option value="高接觸率流水號">高接觸率流水號</option>
                                        <option value="台灣電話流水序號開發">台灣電話流水序號開發</option>
                                        <option value="手機123">手機123</option>
                                        <option value="手機104">手機104</option>
                                        <option value="台灣推薦名單">台灣推薦名單</option>
                                        <option value="舊資料再開發">舊資料再開發</option>
                                        <option value="好好玩名單">好好玩名單</option>
                                        <option value="Cheers雜誌報導">Cheers雜誌報導</option>
                                        <option value="2016Cheers名單">2016Cheers名單</option>
                                        <option value="人力銀行">人力銀行</option>
                                        <option value="網站行銷">網站行銷</option>
                                        <option value="春天網站">春天網站</option>
                                        <option value="DMN名單">DMN名單</option>
                                        <option value="DMN網站">DMN網站</option>
                                        <option value="約會專家">約會專家</option>
                                        <option value="迷你約">迷你約</option>
                                        <option value="網站活動">網站活動</option>
                                        <option value="網站排約">網站排約</option>
                                        <option value="舊系統資料">舊系統資料</option>
                                        <option value="台灣舊資料">台灣舊資料</option>
                                        <option value="廈門舊資料">廈門舊資料</option>
                                        <option value="上海舊資料">上海舊資料</option>
                                        <option value="舊資料卡">舊資料卡</option>
                                        <option value="520940網站名單">520940網站名單</option>
                                        <option value="台灣畢冊開發">台灣畢冊開發</option>
                                        <option value="彰化委外名單">彰化委外名單</option>
                                        <option value="媒體報導名單">媒體報導名單</option>
                                        <option value="合辦活動名單">合辦活動名單</option>
                                        <option value="春天會館FB">春天會館FB</option>
                                        <option value="微電影活動">微電影活動</option>
                                        <option value="億捷創意回收名單">億捷創意回收名單</option>
                                        <option value="行銷活動">行銷活動</option>
                                        <option value="通路合作">通路合作</option>
                                        <option value="FB名單">FB名單</option>
                                        <option value="新書發表會">新書發表會</option>
                                        <option value="購書贈送活動">購書贈送活動</option>
                                        <option value="瑪那熊">瑪那熊</option>
                                        <option value="活動通Accupass">活動通Accupass</option>
                                        <option value="企劃活動名單">企劃活動名單</option>
                                        <option value="其他">其他</option>
                                    </select>
                                    <span id="mem_cc_div"></span><input type="hidden" id="mem_come2" name="mem_come2"><input type="hidden" id="mem_come6" name="mem_come6"><input type="hidden" id="mem_come6_name" name="mem_come6_name">
                                    　 <span class="text-blue">受理： </span>
                                    <select name="pay1" id="pay1" autocomplete="off">
                                        <option value="" selected>請選擇</option>
                                        <option value="總管理處">總管理處</option>
                                    </select>
                                    <select name="pay2" id="pay2" autocomplete="off">
                                        <option value="">請選擇</option>
                                    </select>
                                    　電訪員：
                                    <input name="mem_serc" type="text" id="mem_serc" maxlength="8" class="form-control">
                                </td>
                            </tr>
                            <!-- <tr> 
            <td>帳號：
              <input name="mid" type="text" id="mid" AutoComplete="Off" class="form-control">
              &nbsp;&nbsp;           
              密碼： 
              <input name="mpd" type="text" id="mpd" maxlength="20" AutoComplete="Off" class="form-control"> 
              <font color="#999999">（請填入5至8字元的英文或數字）</font></td>
          </tr>-->
                            <tr>
                                <td><span class="text-blue">姓名： </span>
                                    <input name="mem_name" type="text" id="mem_name" class="form-control" required>
                                    <font color="#999999">（請填入中文姓名）</font>
                                    <span class="text-blue">暱稱：</span>
                                    <input name="mem_nick" type="text" id="mem_nick" class="form-control" maxlength="8">
                                    <font color="#999999">（8個中文字以內）</font>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="text-blue">性別：</span>
                                    <select name="mem_sex" id="mem_sex" required>
                                        <option value="">請選擇</option>
                                        <option value="男">男</option>
                                        <option value="女">女</option>
                                    </select>
                                    &nbsp;&nbsp;
                                    <span class="text-blue">生日：</span>
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
                                        <option value="1980" selected>1980</option>
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
                                        <option value="7">7</option>
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
                                    &nbsp;&nbsp;
                                    星座：
                                    <select name="mem_star" id="select">
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
                                        <option value="魔羯座">魔羯座</option>
                                    </select>
                                    &nbsp;&nbsp;
                                    血型：
                                    <select name="mem_blood" id="mem_blood">
                                        <option value="">請選擇</option>
                                        <option value="A">A型</option>
                                        <option value="B">B型</option>
                                        <option value="O">O型</option>
                                        <option value="AB">AB型</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="text-blue">手機1：</span>
                                    <input name="mem_mobile" type="tel" id="mem_mobile" class="form-control phone" pattern="^[09]{2}[0-9]{8}$" minlength="10" maxlength="10" title="請輸入 09 開頭的十位數手機號碼" required>
                                    &nbsp;&nbsp;手機2：
                                    <input name="mem_mobile2" type="tel" id="mem_mobile2" class="form-control phone" pattern="^[09]{2}[0-9]{8}$" minlength="10" maxlength="10" title="請輸入 09 開頭的十位數手機號碼">
                                    &nbsp;&nbsp;居住電話：
                                    <input tabindex="99" name="mem_phone" type="text" id="mem_phone" class="form-control">
                                    &nbsp;&nbsp;公司電話：
                                    <input tabindex="99" name="mem_phone2" type="text" id="mem_phone2" class="form-control">
                                </td>
                            </tr>

                            <tr>
                                <td><span class="text-blue">居住地地區：</span>
                                    <select name="mem_area" id="mem_area" required>
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
                                    <input tabindex="99" name="mem_address" type="text" id="mem_address" class="form-control" style="width:60%">
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
                                    <input tabindex="99" name="mem_address2" type="text" id="mem_address2" class="form-control" style="width:60%">
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
                                        <option value="高職">高職</option>
                                        <option value="高中">高中</option>
                                        <option value="國中">國中</option>
                                        <option value="其他">其他</option>
                                    </select>
                                    　學校名稱：
                                    <select name="mem_school4" id="mem_school4">
                                        <option value="">請選擇</option>
                                        <option value="國立">國立</option>
                                        <option value="私立">私立</option>
                                        <option value="海外">海外</option>
                                    </select>
                                    <input name="mem_school2" type="text" id="mem_school2" class="form-control" value="">
                                    　科系名稱：
                                    <input name="mem_school3" type="text" id="mem_school3" class="form-control" value="">
                                </td>
                            </tr>

                            <tr>
                                <td>職業：
                                    <select name="mem_job1" id="mem_job1">
                                        <option value="公務/國家機關">公務/國家機關</option>
                                        <option value="高科技產業">高科技產業</option>
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
                                    　公司名稱：
                                    <input name="company" type="text" id="company" class="form-control" maxlength="20">
                                    　年資：
                                    <div class="input-group">
                                        <input name="company_year" type="number" id="company_year" style="width:100px" class="form-control">
                                        <div class="input-group-addon">年</div>
                                    </div>
                                    　職務名稱：
                                    <input name="mem_job2" type="text" id="mem_job2" class="form-control" maxlength="20">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    身高：
                                    <input name="mem_he" type="number" id="mem_he" class="form-control" value="" onkeyup="bmicount()">
                                    公分
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    體重：
                                    <input name="mem_we" type="number" id="mem_we" class="form-control" value="" onkeyup="bmicount()">
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
                                        <option value="偏肉">偏肉(>24)</option>
                                    </select>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    BMI：
                                    <input name="mem_bmi" type="text" id="mem_bmi" class="form-control" value="" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>E-mail：
                                    <input name="mem_mail" type="email" id="mem_mail" class="form-control mail">
                                    　LINE ID：
                                    <input name="mem_msn" type="text" id="mem_msn" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    個性：<select name="mem4">
                                        <option value="">請選擇</option>
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
                                    信仰：<select name="mem6" id="mem6">
                                        <option value="無">無</option>
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
                                    <label class="radio"><input name="mem_marry" type="radio" value="未婚" checked><i></i>未婚</label><label class="radio"><input name="mem_marry" type="radio" value="離婚"><i></i>離婚</label><label class="radio"><input name="mem_marry" type="radio" value="離婚沒小孩"><i></i>離婚沒小孩</label><label class="radio"><input name="mem_marry" type="radio" value="離婚有小孩"><i></i>離婚有小孩</label><label class="radio"><input name="mem_marry" type="radio" value="喪偶"><i></i>喪偶</label><label class="radio"><input name="mem_marry" type="radio" value="已婚"><i></i>已婚</label><label class="radio"><input name="mem_marry" type="radio" value="保密"><i></i>保密</label><label class="radio"><input name="mem_marry" type="radio" value="交往中"><i></i>交往中</label><label class="radio"><input name="mem_marry" type="radio" value="有心儀對象"><i></i>有心儀對象</label>
                                </td>
                            </tr>
                            <tr>
                                <td>自我介紹：<font color=red>(請注意此區文字將會在網站顯示，除自我介紹外勿填入其他資訊)</font><br>
                                    <div id="mem_note_div"></div>
                                    <a id="mem_note_a" href="#v" onclick="mem_note_edit()">點擊修改</a>
                                    <textarea id="mem_note" name="mem_note" class="form-control" cols="100" rows="8" id="textarea" style="height:160px;display:none"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size:150%;color:blue"><b>其他事項</b></td>
                            </tr>
                            <tr>
                                <td>備註說明：<textarea id="sys_note" name="sys_note" class="form-control" style="width:80%" rows="8" id="textarea"></textarea> </td>
                            </tr>
                            <tr>
                                <td style="font-size:150%;color:blue"><b>預約專區：</b>(如無需預約則請不要選擇開發秘書)</td>
                            </tr>
                            <tr>
                                <td>
                                    <p> 開發秘書：<select name="single" id="single">
                                            <option value="" selected>請選擇</option>
                                        </select>
                                        邀約：<select name="single2" id="single2">
                                            <option value="" selected>請選擇</option>
                                        </select>
                                        受理：<select name="branch3" id="branch3">
                                            <option value="" selected>請選擇</option>
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
                                        </select><select name="single3" id="single3">
                                            <option value="" selected>請選擇</option>
                                        </select>(跨區請選擇該區督導)</p>

                                    <p>已預約：
                                        <select name="n11y" id="n11y">
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2020">2020</option>
                                        </select> 年
                                        <select name="n11m" id="n11m">
                                            <option value="9">9</option>
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
                                        </select> 年
                                        <select name="n11d" id="n11d">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9" selected>9</option>
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
                                        </select> 日 <select name="n11h" id="n11h">
                                            <option value="">請選擇</option>
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
                                        </select> 時 <select name="n11mm" id="n11mm">
                                            <option value="00">00</option>
                                            <option value="30">30</option>
                                        </select> 分

                                        <span id="obranch">至 待選擇</span> 參觀。
                                    </p>
                                    <p>聯絡情形及接待注意事項：<br> <textarea name="n12" id="n12" class="form-control" cols="100" rows="8"></textarea></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div align="center">
                                        <input type="hidden" name="r" value="">
                                        <input name="Submit3" type="submit" value="確定註冊" class="btn btn-info" style="width:50%;">
                                    </div>
                                </td>
                            </tr>
                    </table>
                </form>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->


    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
    include("bottom.php");
?>

<script type="text/javascript">
$mtu = "ad_no_mem.";
function mem_note_edit() {
	$("#mem_note_a,#mem_note_div").hide();	
	$("#mem_note").show();
}
$(function() {
  $("#pay1").on( "change", function() {
     personnel_get("pay1", "pay2");
     personnel_get("pay1", "single");
     personnel_get("pay1", "single2");          
});

$("#mem_come").on("change", function() {
	var $cc_div = $("#mem_cc_div");
	switch($(this).val()) {
		case "DMN網站":
		var $sel = $("<select>");
		$sel.attr("name","mem_ccs");
		$sel.attr("id","mem_ccs");
		$sel.append($("<option></option>").attr("value", "").text("請選擇"));
		$sel.append($("<option></option>").attr("value", "談情說愛").text("談情說愛"));
		$sel.append($("<option></option>").attr("value", "許願池").text("許願池"));
		$sel.append($("<option></option>").attr("value", "一對一約會").text("一對一約會"));
		$sel.append($("<option></option>").attr("value", "閃婚專案").text("閃婚專案"));
		$sel.append($("<option></option>").attr("value", "活動通Accupass").text("活動通Accupass"));
		$cc_div.append($sel);
		$sel.on("change", function() {
			$("#mem_come2").val($(this).val());
		}).attr("required","required");
		break;
		
		case "通路合作":
		var $sel = $("<select>");
		$sel.attr("name","mem_ccs");
		$sel.attr("id","mem_ccs");
		$sel.append($("<option></option>").attr("value", "").text("請選擇"));
		$sel.append($("<option></option>").attr("value", "ninesun").text("向日葵"));
		$cc_div.append($sel);
		$sel.on("change", function() {
			$("#mem_come6").val($(this).val());
			$("#mem_come6_name").val($(this).find(":selected").text());
		}).attr("required","required");
		break;
		
		case "FB名單":
		var $sel = $("<select>");
		$sel.attr("name","mem_ccs");
		$sel.attr("id","mem_ccs");
		$sel.append($("<option></option>").attr("value", "").text("請選擇"));
		$sel.append($("<option></option>").attr("value", "台北會館FB").text("台北會館FB"));
		$sel.append($("<option></option>").attr("value", "八德會館FB").text("八德會館FB"));
		$sel.append($("<option></option>").attr("value", "桃園會館FB").text("桃園會館FB"));
		$sel.append($("<option></option>").attr("value", "新竹會館FB").text("新竹會館FB"));
		$sel.append($("<option></option>").attr("value", "台中會館FB").text("台中會館FB"));
		$sel.append($("<option></option>").attr("value", "台南會館FB").text("台南會館FB"));
		$sel.append($("<option></option>").attr("value", "高雄會館FB").text("高雄會館FB"));
		$sel.append($("<option></option>").attr("value", "春天會館FB").text("春天會館FB"));
		$sel.append($("<option></option>").attr("value", "DateMeNowFB").text("DateMeNowFB"));
		$sel.append($("<option></option>").attr("value", "約專FB").text("約專FB"));
		$sel.append($("<option></option>").attr("value", "迷你約FB").text("迷你約FB"));
		$sel.append($("<option></option>").attr("value", "企劃FB名單").text("企劃FB名單"));
		$sel.append($("<option></option>").attr("value", "會計FB名單").text("會計FB名單"));
		$cc_div.append($sel);
		$sel.on("change", function() {
			$("#mem_come2").val($(this).val());
		}).attr("required","required");
		break;
		
		default:
		  $cc_div.find("select").remove();
		break;
	}
});

  $("#branch3").on( "change", function() {
     personnel_get("branch3", "single3");
     wgo();
});
  $("#addform").on( "submit", function() {  	
    var $result = true,
	    $resultv = true;

	var $allc2 = {"mem_he":"身高","mem_we":"體重","mem_bmi":"BMI"};    
$.each($allc2, function(v, k) {
   if ($("#"+v).val() && !$.isNumeric($("#"+v).val())) {
     alert(k+"只能輸入數字。");
	 $("#"+v).focus();	 
     $result = false;
   }
});

	if($("#single").val()) {
		if(!$("#single2").val()) {
			alert("請選擇邀約秘書。"+$("#single2").val());
			return false;
		}
		if(!$("#branch3").val()) {
			alert("請選擇受理會館。");
			return false;
		}
		if(!$("#single3").val()) {
			alert("請選擇受理秘書。");
			return false;
		}
		if(!$("#n11h").val()) {
			alert("請輸入小時。");
			$("#n11h").focus();	 
			return false;
		}
   var $re = /^\d+$/;
   if(!$re.test($("#n11h").val())) {
     alert("小時只能輸入數字。");
     $("#n11h").val("");
	 $("#n11h").focus();	 
     return false;
   }
	}
	
    return $result;
  });  

});
function wgo() {
  var $outdiv = $("#obranch"),
  $b1v = $("#pay1").val(),
  $b2v = $("#branch3").val();
  if($b1v && $b2v) {
    if($b1v == $b2v) {
	  $outdiv.html("至 " + $b1v);
      return false;
	}
    $outdiv.html("由 " + $b1v +" 約至 " + $b2v + " ");
  } else if($b1v) {
    $outdiv.html("至 " + $b1v);
  } else {
  $("#pay1").val("");
  $outdiv.html("至 待選擇");
  }
}
</script>