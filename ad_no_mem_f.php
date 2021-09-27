<?php
require("./include/_top.php");
require("./include/_sidebar.php");
?>

<link href="css/select2.min.css" rel="stylesheet">

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_no_mem.php">未入會資料</a></li>
            <li class="active">未入會資料搜尋</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>未入會資料搜尋</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <form id="searchform" action="ad_no_mem.php?vst=full&sear=1" method="post" class="form-inline" target="_self">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td><label class="pull-left vcenter" style="height:34px;line-height:34px;">手機：</label>
                                    <input name="s2" type="text" id="s2" class="form-control width-200 pull-left" size="20" maxlength="10">
                                </td>
                            </tr>
                            <tr>
                                <td><label class="pull-left vcenter" style="height:34px;line-height:34px;">姓名：</label>
                                    <input name="s3" type="text" id="s3" class="form-control width-200 pull-left" size="20">
                                </td>
                            </tr>
                            <tr>
                                <td><label class="pull-left vcenter" style="height:34px;line-height:34px;">編號：</label>
                                    <input name="s4" type="text" id="s4" class="form-control width-200 pull-left" size="20">
                                </td>
                            </tr>
                            <tr>
                                <td><label class="pull-left vcenter" style="height:34px;line-height:34px;">身分證字號：</label>
                                    <input name="s6" type="text" id="s6" class="form-control width-200 pull-left" size="20" maxlength="10">
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
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                    </select>
                                    ～
                                    <select name="s28" id="s28">
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
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>資料日期：
                                    <input type="text" name="a1" class="datepicker" autocomplete="off"> ~ <input type="text" name="b1" class="datepicker" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td>最後回報時間(以回報時間排序)：
                                    <input type="text" name="l1" class="datepicker" autocomplete="off"> ~ <input type="text" name="l2" class="datepicker" autocomplete="off">
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
                                <td>婚姻狀態：
                                    <select name="s32" id="s32">
                                        <option value="">請選擇</option>
                                        <option value="未婚">未婚</option>
                                        <option value="離婚">離婚</option>
                                        <option value="離婚沒小孩">離婚沒小孩</option>
                                        <option value="離婚有小孩">離婚有小孩</option>
                                        <option value="喪偶">喪偶</option>
                                        <option value="已婚">已婚</option>
                                        <option value="保密">保密</option>
                                        <option value="交往中">交往中</option>
                                        <option value="有心儀對象">有心儀對象</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>身高：
                                    <select name="qhe1" style="width:120px;font-size: 9pt">
                                        <option value="">不限</option>
                                        <option value="140">140 cm</option>
                                        <option value="141">141 cm</option>
                                        <option value="142">142 cm</option>
                                        <option value="143">143 cm</option>
                                        <option value="144">144 cm</option>
                                        <option value="145">145 cm</option>
                                        <option value="146">146 cm</option>
                                        <option value="147">147 cm</option>
                                        <option value="148">148 cm</option>
                                        <option value="149">149 cm</option>
                                        <option value="150">150 cm</option>
                                        <option value="151">151 cm</option>
                                        <option value="152">152 cm</option>
                                        <option value="153">153 cm</option>
                                        <option value="154">154 cm</option>
                                        <option value="155">155 cm</option>
                                        <option value="156">156 cm</option>
                                        <option value="157">157 cm</option>
                                        <option value="158">158 cm</option>
                                        <option value="159">159 cm</option>
                                        <option value="160">160 cm</option>
                                        <option value="161">161 cm</option>
                                        <option value="162">162 cm</option>
                                        <option value="163">163 cm</option>
                                        <option value="164">164 cm</option>
                                        <option value="165">165 cm</option>
                                        <option value="166">166 cm</option>
                                        <option value="167">167 cm</option>
                                        <option value="168">168 cm</option>
                                        <option value="169">169 cm</option>
                                        <option value="170">170 cm</option>
                                        <option value="171">171 cm</option>
                                        <option value="172">172 cm</option>
                                        <option value="173">173 cm</option>
                                        <option value="174">174 cm</option>
                                        <option value="175">175 cm</option>
                                        <option value="176">176 cm</option>
                                        <option value="177">177 cm</option>
                                        <option value="178">178 cm</option>
                                        <option value="179">179 cm</option>
                                        <option value="180">180 cm</option>
                                        <option value="181">181 cm</option>
                                        <option value="182">182 cm</option>
                                        <option value="183">183 cm</option>
                                        <option value="184">184 cm</option>
                                        <option value="185">185 cm</option>
                                        <option value="186">186 cm</option>
                                        <option value="187">187 cm</option>
                                        <option value="188">188 cm</option>
                                        <option value="189">189 cm</option>
                                        <option value="190">190 cm</option>
                                        <option value="191">191 cm</option>
                                        <option value="192">192 cm</option>
                                        <option value="193">193 cm</option>
                                        <option value="194">194 cm</option>
                                        <option value="195">195 cm</option>
                                        <option value="196">196 cm</option>
                                        <option value="197">197 cm</option>
                                        <option value="198">198 cm</option>
                                        <option value="199">199 cm</option>
                                        <option value="200">200 cm</option>
                                        <option value="201">201 cm</option>
                                        <option value="202">202 cm</option>
                                        <option value="203">203 cm</option>
                                        <option value="204">204 cm</option>
                                        <option value="205">205 cm</option>
                                        <option value="206">206 cm</option>
                                        <option value="207">207 cm</option>
                                        <option value="208">208 cm</option>
                                        <option value="209">209 cm</option>
                                        <option value="210">210 cm</option>
                                    </select>~<select name="qhe2" style="width:120px;font-size: 9pt">
                                        <option value="">不限</option>
                                        <option value="140">140 cm</option>
                                        <option value="141">141 cm</option>
                                        <option value="142">142 cm</option>
                                        <option value="143">143 cm</option>
                                        <option value="144">144 cm</option>
                                        <option value="145">145 cm</option>
                                        <option value="146">146 cm</option>
                                        <option value="147">147 cm</option>
                                        <option value="148">148 cm</option>
                                        <option value="149">149 cm</option>
                                        <option value="150">150 cm</option>
                                        <option value="151">151 cm</option>
                                        <option value="152">152 cm</option>
                                        <option value="153">153 cm</option>
                                        <option value="154">154 cm</option>
                                        <option value="155">155 cm</option>
                                        <option value="156">156 cm</option>
                                        <option value="157">157 cm</option>
                                        <option value="158">158 cm</option>
                                        <option value="159">159 cm</option>
                                        <option value="160">160 cm</option>
                                        <option value="161">161 cm</option>
                                        <option value="162">162 cm</option>
                                        <option value="163">163 cm</option>
                                        <option value="164">164 cm</option>
                                        <option value="165">165 cm</option>
                                        <option value="166">166 cm</option>
                                        <option value="167">167 cm</option>
                                        <option value="168">168 cm</option>
                                        <option value="169">169 cm</option>
                                        <option value="170">170 cm</option>
                                        <option value="171">171 cm</option>
                                        <option value="172">172 cm</option>
                                        <option value="173">173 cm</option>
                                        <option value="174">174 cm</option>
                                        <option value="175">175 cm</option>
                                        <option value="176">176 cm</option>
                                        <option value="177">177 cm</option>
                                        <option value="178">178 cm</option>
                                        <option value="179">179 cm</option>
                                        <option value="180">180 cm</option>
                                        <option value="181">181 cm</option>
                                        <option value="182">182 cm</option>
                                        <option value="183">183 cm</option>
                                        <option value="184">184 cm</option>
                                        <option value="185">185 cm</option>
                                        <option value="186">186 cm</option>
                                        <option value="187">187 cm</option>
                                        <option value="188">188 cm</option>
                                        <option value="189">189 cm</option>
                                        <option value="190">190 cm</option>
                                        <option value="191">191 cm</option>
                                        <option value="192">192 cm</option>
                                        <option value="193">193 cm</option>
                                        <option value="194">194 cm</option>
                                        <option value="195">195 cm</option>
                                        <option value="196">196 cm</option>
                                        <option value="197">197 cm</option>
                                        <option value="198">198 cm</option>
                                        <option value="199">199 cm</option>
                                        <option value="200">200 cm</option>
                                        <option value="201">201 cm</option>
                                        <option value="202">202 cm</option>
                                        <option value="203">203 cm</option>
                                        <option value="204">204 cm</option>
                                        <option value="205">205 cm</option>
                                        <option value="206">206 cm</option>
                                        <option value="207">207 cm</option>
                                        <option value="208">208 cm</option>
                                        <option value="209">209 cm</option>
                                        <option value="210">210 cm</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>學歷：
                                    <select name="s10" id="s10" class="select2" multiple>
                                        <option value="">請選擇</option>
                                        <option value="國中">國中</option>
                                        <option value="高中">高中</option>
                                        <option value="高職">高職</option>
                                        <option value="專科">專科</option>
                                        <option value="大學">大學</option>
                                        <option value="碩士">碩士</option>
                                        <option value="博士">博士</option>
                                        <option value="其他">其他</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>職業：
                                    <select name="mem_job1" id="mem_job1">
                                        <option value="">請選擇</option>
                                        <option value="公務/國家機關">公務/國家機關</option>
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
                                </td>
                            </tr>
                            <tr>
                                <td>地區：
                                    <select name="s12" id="s12">
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
                                </td>
                            </tr>
                            <tr>
                                <td>來源：
                                    <select name="s8" id="s8">
                                        <option value="">請選擇</option>
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
                                        <option value="貴賓諮詢卡">貴賓諮詢卡</option>
                                    </select>
                                    <span id="s8_1_div"></span><input type="hidden" name="s8_1" id="s8_1"><input type="hidden" name="s8_6" id="s8_6">
                                </td>
                            </tr>
                            <tr>
                                <td>自訂來源：
                                    <select name="s97" id="s97">
                                        <option value="">請選擇</option>
                                        <option value="~請先瀏覽官網.謝謝~單身聯誼凱琳">~請先瀏覽官網.謝謝~單身聯誼凱琳</option>
                                        <option value="10倍奉還">10倍奉還</option>
                                        <option value="1111">1111</option>
                                        <option value="1112">1112</option>
                                        <option value="20171209AirChina_day_trip_activities">20171209AirChina_day_trip_activities</option>
                                        <option value="aboutus">aboutus</option>
                                        <option value="accupass">accupass</option>
                                        <option value="accupass_20170816">accupass_20170816</option>
                                        <option value="accupass_introduction_20190704">accupass_introduction_20190704</option>
                                        <option value="activeblog">activeblog</option>
                                        <option value="Activity_Table201610~12">Activity_Table201610~12</option>
                                        <option value="affiliates">affiliates</option>
                                        <option value="APP">APP</option>
                                        <option value="app_Introduction">app_Introduction</option>
                                        <option value="banner_funtour_0528">banner_funtour_0528</option>
                                        <option value="blog">blog</option>
                                        <option value="blog_fontour">blog_fontour</option>
                                        <option value="blog_google_20160804">blog_google_20160804</option>
                                        <option value="blog_pofiles">blog_pofiles</option>
                                        <option value="blog_wordpress_article">blog_wordpress_article</option>
                                        <option value="Blogger_BigA">Blogger_BigA</option>
                                        <option value="brand">brand</option>
                                        <option value="cc=springclub_officialwebsite_homepage_Match function">cc=springclub_officialwebsite_homepage_Match function</option>
                                        <option value="cc=yahoo_news_giftpage">cc=yahoo_news_giftpage</option>
                                        <option value="cheers">cheers</option>
                                        <option value="cheers_20150415">cheers_20150415</option>
                                        <option value="cheers_copywriter_listpage">cheers_copywriter_listpage</option>
                                        <option value="cheers_magazine">cheers_magazine</option>
                                        <option value="cheers_officialwebsite_Wedding">cheers_officialwebsite_Wedding</option>
                                        <option value="citytalk">citytalk</option>
                                        <option value="D57travel">D57travel</option>
                                        <option value="datemenow_Develop0516">datemenow_Develop0516</option>
                                        <option value="datemenow=post">datemenow=post</option>
                                        <option value="DevelopmentLetter">DevelopmentLetter</option>
                                        <option value="DM12starsigns_star004_20180116">DM12starsigns_star004_20180116</option>
                                        <option value="dmn_accupass">dmn_accupass</option>
                                        <option value="dmn_accupass_20171225">dmn_accupass_20171225</option>
                                        <option value="DMN_Email_EDM20160714">DMN_Email_EDM20160714</option>
                                        <option value="DMN_facebook_Contact">DMN_facebook_Contact</option>
                                        <option value="dmn_facebook_pay20170711th">dmn_facebook_pay20170711th</option>
                                        <option value="dmn_facebook_pay20170713th">dmn_facebook_pay20170713th</option>
                                        <option value="dmn_facebook_pay20170718th">dmn_facebook_pay20170718th</option>
                                        <option value="dmn_fb_2018">dmn_fb_2018</option>
                                        <option value="dmn_fb_20181005">dmn_fb_20181005</option>
                                        <option value="dmn_fb_20190920">dmn_fb_20190920</option>
                                        <option value="dmn_fb_changevideo">dmn_fb_changevideo</option>
                                        <option value="DMN_FB_list_introduction_1st_20180116">DMN_FB_list_introduction_1st_20180116</option>
                                        <option value="DMN_FB_list_workdate_1st_20180312">DMN_FB_list_workdate_1st_20180312</option>
                                        <option value="DMN_FB_list_workdate_1st_20180314">DMN_FB_list_workdate_1st_20180314</option>
                                        <option value="DMN_FB_list_workdate_2nd_20180314">DMN_FB_list_workdate_2nd_20180314</option>
                                        <option value="DMN_FB_list_workdate_3th_20180502">DMN_FB_list_workdate_3th_20180502</option>
                                        <option value="DMN_FB_post_12starsigns_20201117A">DMN_FB_post_12starsigns_20201117A</option>
                                        <option value="DMN_FB_post_12starsigns_20201117B">DMN_FB_post_12starsigns_20201117B</option>
                                        <option value="DMN_FB_post_12starsigns_20210201A">DMN_FB_post_12starsigns_20210201A</option>
                                        <option value="DMN_FB_post_12starsigns_20210204B">DMN_FB_post_12starsigns_20210204B</option>
                                        <option value="DMN_FB_post_12starsigns_20210208C">DMN_FB_post_12starsigns_20210208C</option>
                                        <option value="DMN_FB_post_12starsigns_20210423">DMN_FB_post_12starsigns_20210423</option>
                                        <option value="DMN_FB_post_12starsigns_new_20191128">DMN_FB_post_12starsigns_new_20191128</option>
                                        <option value="DMN_FB_post_12starsigns_new_20191210">DMN_FB_post_12starsigns_new_20191210</option>
                                        <option value="DMN_FB_post_12starsigns_new_20200722">DMN_FB_post_12starsigns_new_20200722</option>
                                        <option value="DMN_FB_post_12starsigns_star003_20171229">DMN_FB_post_12starsigns_star003_20171229</option>
                                        <option value="DMN_FB_post_12starsigns_star004_20180116">DMN_FB_post_12starsigns_star004_20180116</option>
                                        <option value="DMN_FB_post_12starsigns_star005_20181128">DMN_FB_post_12starsigns_star005_20181128</option>
                                        <option value="DMN_FB_post_12starsigns_star006_20181128">DMN_FB_post_12starsigns_star006_20181128</option>
                                        <option value="DMN_FB_post_12starsigns_star007_20181128">DMN_FB_post_12starsigns_star007_20181128</option>
                                        <option value="DMN_FB_post_12starsigns_star008_20190108">DMN_FB_post_12starsigns_star008_20190108</option>
                                        <option value="DMN_FB_post_1st_20180525">DMN_FB_post_1st_20180525</option>
                                        <option value="DMN_FB_post_20200520">DMN_FB_post_20200520</option>
                                        <option value="DMN_FB_post_introduction_1st_20180122">DMN_FB_post_introduction_1st_20180122</option>
                                        <option value="DMN_FB_post_journey_20210407E">DMN_FB_post_journey_20210407E</option>
                                        <option value="DMN_FB_post_journey_20210421A">DMN_FB_post_journey_20210421A</option>
                                        <option value="DMN_FB_post_journey_20210504A2">DMN_FB_post_journey_20210504A2</option>
                                        <option value="DMN_FB_post_member">DMN_FB_post_member</option>
                                        <option value="DMN_FB_post_memberB_20200331">DMN_FB_post_memberB_20200331</option>
                                        <option value="DMN_FB_post_online_20210713">DMN_FB_post_online_20210713</option>
                                        <option value="DMN_FB_post_online_20210816">DMN_FB_post_online_20210816</option>
                                        <option value="DMN_FB_post_scale01_20180625">DMN_FB_post_scale01_20180625</option>
                                        <option value="DMN_FB_post_stable_20200722">DMN_FB_post_stable_20200722</option>
                                        <option value="DMN_FB_post_stable_20210331">DMN_FB_post_stable_20210331</option>
                                        <option value="DMN_FB_post_With_the_love_god01_20181105">DMN_FB_post_With_the_love_god01_20181105</option>
                                        <option value="DMN_FB_post_With_the_love_god02_20181105">DMN_FB_post_With_the_love_god02_20181105</option>
                                        <option value="DMN_FB_post_With_the_love_god03_20181128">DMN_FB_post_With_the_love_god03_20181128</option>
                                        <option value="DMN_FB_post_With_the_love_god04_20190108">DMN_FB_post_With_the_love_god04_20190108</option>
                                        <option value="DMN_FB_post_With_the_love_god05_20190318">DMN_FB_post_With_the_love_god05_20190318</option>
                                        <option value="DMN_fb_routine">DMN_fb_routine</option>
                                        <option value="dmn_google_gdn_12starsigns_01">dmn_google_gdn_12starsigns_01</option>
                                        <option value="dmn_google_gdn_12starsigns_02">dmn_google_gdn_12starsigns_02</option>
                                        <option value="dmn_google_store">dmn_google_store</option>
                                        <option value="DMN_homepage_icon">DMN_homepage_icon</option>
                                        <option value="dmn_lineat_dialogue">dmn_lineat_dialogue</option>
                                        <option value="dmn_lineat_Information">dmn_lineat_Information</option>
                                        <option value="dmn_lovestory">dmn_lovestory</option>
                                        <option value="DMN_Member_password_notification">DMN_Member_password_notification</option>
                                        <option value="dmn_mobile_homepage_Banner181001">dmn_mobile_homepage_Banner181001</option>
                                        <option value="dmn_officialwebsite_homepage_Banner0713">dmn_officialwebsite_homepage_Banner0713</option>
                                        <option value="dmn_officialwebsite_homepage_Banner1105">dmn_officialwebsite_homepage_Banner1105</option>
                                        <option value="DMN_youtube_20180220">DMN_youtube_20180220</option>
                                        <option value="dmnfb_2019">dmnfb_2019</option>
                                        <option value="EDM_0519">EDM_0519</option>
                                        <option value="EDM_0604">EDM_0604</option>
                                        <option value="EDM_20150521">EDM_20150521</option>
                                        <option value="EDM_20160310">EDM_20160310</option>
                                        <option value="edm_system_15">edm_system_15</option>
                                        <option value="edm_system_24">edm_system_24</option>
                                        <option value="edm_system_3">edm_system_3</option>
                                        <option value="edm20191016_Angus">edm20191016_Angus</option>
                                        <option value="email_1_edm20190625_Angus">email_1_edm20190625_Angus</option>
                                        <option value="email_2_edm20190625_Angus">email_2_edm20190625_Angus</option>
                                        <option value="email_3_edm20190625_Angus">email_3_edm20190625_Angus</option>
                                        <option value="email_4_edm20190625_Angus">email_4_edm20190625_Angus</option>
                                        <option value="email_5_edm20190625_Angus">email_5_edm20190625_Angus</option>
                                        <option value="Email_EDM_Angus">Email_EDM_Angus</option>
                                        <option value="Email_EDM20151117_Angus">Email_EDM20151117_Angus</option>
                                        <option value="Email_EDM20160106_Angus">Email_EDM20160106_Angus</option>
                                        <option value="Email_EDM20160708_Angus">Email_EDM20160708_Angus</option>
                                        <option value="Email_EDM201610_Angus">Email_EDM201610_Angus</option>
                                        <option value="Email_EDM201612_Angus">Email_EDM201612_Angus</option>
                                        <option value="Email_EDM2016831_Angus">Email_EDM2016831_Angus</option>
                                        <option value="Email_EDM20170214_Angus">Email_EDM20170214_Angus</option>
                                        <option value="Email_EDM20170418_Angus">Email_EDM20170418_Angus</option>
                                        <option value="facebook">facebook</option>
                                        <option value="facebook_20170830">facebook_20170830</option>
                                        <option value="facebook_about_20171214">facebook_about_20171214</option>
                                        <option value="facebook_active">facebook_active</option>
                                        <option value="facebook_active_1212">facebook_active_1212</option>
                                        <option value="facebook_cupidhelpme_190308">facebook_cupidhelpme_190308</option>
                                        <option value="facebook_dmn_0907">facebook_dmn_0907</option>
                                        <option value="facebook_dmn_20171107">facebook_dmn_20171107</option>
                                        <option value="facebook_dmn_about">facebook_dmn_about</option>
                                        <option value="facebook_dmn_pofiles">facebook_dmn_pofiles</option>
                                        <option value="facebook_dmn_poster0831">facebook_dmn_poster0831</option>
                                        <option value="facebook_dmn_top">facebook_dmn_top</option>
                                        <option value="facebook_funtour">facebook_funtour</option>
                                        <option value="facebook_funtour_Concert1219">facebook_funtour_Concert1219</option>
                                        <option value="facebook_liveshow">facebook_liveshow</option>
                                        <option value="facebook_liveshow_1129">facebook_liveshow_1129</option>
                                        <option value="facebook_logon">facebook_logon</option>
                                        <option value="facebook_lovesharing_20170830">facebook_lovesharing_20170830</option>
                                        <option value="facebook_lovesharing_20170922">facebook_lovesharing_20170922</option>
                                        <option value="facebook_lovesharing_20170927">facebook_lovesharing_20170927</option>
                                        <option value="facebook_lovesharing_20171025">facebook_lovesharing_20171025</option>
                                        <option value="facebook_lovesharing_20171031">facebook_lovesharing_20171031</option>
                                        <option value="facebook_lovesharing_20171117">facebook_lovesharing_20171117</option>
                                        <option value="facebook_lovesharing_20181017">facebook_lovesharing_20181017</option>
                                        <option value="facebook_lovesharing_20181031">facebook_lovesharing_20181031</option>
                                        <option value="facebook_lovesharing_20181109">facebook_lovesharing_20181109</option>
                                        <option value="facebook_lovesharing_20181129">facebook_lovesharing_20181129</option>
                                        <option value="facebook_message">facebook_message</option>
                                        <option value="facebook_openfree_190610">facebook_openfree_190610</option>
                                        <option value="facebook_pay">facebook_pay</option>
                                        <option value="facebook_pay_Image_12constellations">facebook_pay_Image_12constellations</option>
                                        <option value="facebook_pay0306">facebook_pay0306</option>
                                        <option value="facebook_pay0330">facebook_pay0330</option>
                                        <option value="facebook_pay0330測看看">facebook_pay0330測看看</option>
                                        <option value="facebook_pay0419">facebook_pay0419</option>
                                        <option value="facebook_pay0426">facebook_pay0426</option>
                                        <option value="facebook_pay0428">facebook_pay0428</option>
                                        <option value="facebook_pay0811">facebook_pay0811</option>
                                        <option value="facebook_pay1016">facebook_pay1016</option>
                                        <option value="facebook_pay1101">facebook_pay1101</option>
                                        <option value="facebook_pay201509164th">facebook_pay201509164th</option>
                                        <option value="facebook_pay20151006">facebook_pay20151006</option>
                                        <option value="facebook_pay20151016th">facebook_pay20151016th</option>
                                        <option value="facebook_pay20151103th">facebook_pay20151103th</option>
                                        <option value="facebook_pay20151228th">facebook_pay20151228th</option>
                                        <option value="facebook_pay20160111th">facebook_pay20160111th</option>
                                        <option value="facebook_pay20160308th">facebook_pay20160308th</option>
                                        <option value="facebook_pay20160411th">facebook_pay20160411th</option>
                                        <option value="facebook_pay20160420th">facebook_pay20160420th</option>
                                        <option value="facebook_pay20160525th">facebook_pay20160525th</option>
                                        <option value="facebook_pay20160601th">facebook_pay20160601th</option>
                                        <option value="facebook_pay20160630gril">facebook_pay20160630gril</option>
                                        <option value="facebook_pay20160630th">facebook_pay20160630th</option>
                                        <option value="facebook_pay20160721th">facebook_pay20160721th</option>
                                        <option value="facebook_pay20160811th">facebook_pay20160811th</option>
                                        <option value="facebook_pay20160824th">facebook_pay20160824th</option>
                                        <option value="facebook_pay20160901th">facebook_pay20160901th</option>
                                        <option value="facebook_pay20160915th">facebook_pay20160915th</option>
                                        <option value="facebook_pay20160920th">facebook_pay20160920th</option>
                                        <option value="facebook_pay20161005th">facebook_pay20161005th</option>
                                        <option value="facebook_pay20161014th">facebook_pay20161014th</option>
                                        <option value="facebook_pay20161024th">facebook_pay20161024th</option>
                                        <option value="facebook_pay20161027th">facebook_pay20161027th</option>
                                        <option value="facebook_pay20161104th">facebook_pay20161104th</option>
                                        <option value="facebook_pay20161118th">facebook_pay20161118th</option>
                                        <option value="facebook_pay20161201th">facebook_pay20161201th</option>
                                        <option value="facebook_pay20161215th">facebook_pay20161215th</option>
                                        <option value="facebook_pay20161222th">facebook_pay20161222th</option>
                                        <option value="facebook_pay20170124th">facebook_pay20170124th</option>
                                        <option value="facebook_pay20170206th">facebook_pay20170206th</option>
                                        <option value="facebook_pay20170406th">facebook_pay20170406th</option>
                                        <option value="facebook_pay20170414th">facebook_pay20170414th</option>
                                        <option value="facebook_pay20170421th">facebook_pay20170421th</option>
                                        <option value="facebook_pay20170427th">facebook_pay20170427th</option>
                                        <option value="facebook_pay20170814th">facebook_pay20170814th</option>
                                        <option value="facebook_pay20170901th">facebook_pay20170901th</option>
                                        <option value="facebook_pay20170911th">facebook_pay20170911th</option>
                                        <option value="facebook_pay20171101th">facebook_pay20171101th</option>
                                        <option value="facebook_pay20171124_01th">facebook_pay20171124_01th</option>
                                        <option value="facebook_pay20171124_02th">facebook_pay20171124_02th</option>
                                        <option value="facebook_pay20171124th">facebook_pay20171124th</option>
                                        <option value="facebook_playtogether_181203">facebook_playtogether_181203</option>
                                        <option value="facebook_pofiles">facebook_pofiles</option>
                                        <option value="facebook_pofiles_top">facebook_pofiles_top</option>
                                        <option value="facebook_poster">facebook_poster</option>
                                        <option value="facebook_saylove">facebook_saylove</option>
                                        <option value="facebook_singleparty_po">facebook_singleparty_po</option>
                                        <option value="facebook_spring">facebook_spring</option>
                                        <option value="facebook_springclub_Concert1219">facebook_springclub_Concert1219</option>
                                        <option value="facebook_springclub_pofiles">facebook_springclub_pofiles</option>
                                        <option value="facebook_title_page">facebook_title_page</option>
                                        <option value="facebook_TopBanner">facebook_TopBanner</option>
                                        <option value="fb">fb</option>
                                        <option value="fb_0314">fb_0314</option>
                                        <option value="FB_1018">FB_1018</option>
                                        <option value="FB_cpc_allproducts_DMN0701a">FB_cpc_allproducts_DMN0701a</option>
                                        <option value="fb_dmn_20190806">fb_dmn_20190806</option>
                                        <option value="fb_dmn_20190823">fb_dmn_20190823</option>
                                        <option value="fb_dmnroutine">fb_dmnroutine</option>
                                        <option value="fb_Message20150818">fb_Message20150818</option>
                                        <option value="fb_pay">fb_pay</option>
                                        <option value="fb_pay_List_type">fb_pay_List_type</option>
                                        <option value="fb_pay20150826">fb_pay20150826</option>
                                        <option value="FB_PhotoAds_Funtour">FB_PhotoAds_Funtour</option>
                                        <option value="fbdmnroutine">fbdmnroutine</option>
                                        <option value="fb撠楊??嗅閮敺??∪翰????">fb撠楊??嗅閮敺??∪翰????</option>
                                        <option value="Form">Form</option>
                                        <option value="funtor_lineat">funtor_lineat</option>
                                        <option value="funtour">funtour</option>
                                        <option value="funtour_banner">funtour_banner</option>
                                        <option value="funtour_blog">funtour_blog</option>
                                        <option value="funtour_edm_20200806">funtour_edm_20200806</option>
                                        <option value="funtour_edm_20200827">funtour_edm_20200827</option>
                                        <option value="funtour_facebook">funtour_facebook</option>
                                        <option value="funtour_fb">funtour_fb</option>
                                        <option value="funtour_lineat_0813">funtour_lineat_0813</option>
                                        <option value="funtour_lineat_dialogue">funtour_lineat_dialogue</option>
                                        <option value="funtour_Official">funtour_Official</option>
                                        <option value="funtour_SMS_20200728">funtour_SMS_20200728</option>
                                        <option value="good_you">good_you</option>
                                        <option value="Googl_GDN_banner_12constellations">Googl_GDN_banner_12constellations</option>
                                        <option value="Googl_GSP_12constellations">Googl_GSP_12constellations</option>
                                        <option value="Google_blog_po files20150306">Google_blog_po files20150306</option>
                                        <option value="Google_business_Hsinchu">Google_business_Hsinchu</option>
                                        <option value="Google_cpc_">Google_cpc_</option>
                                        <option value="Google_cpc_allproducts">Google_cpc_allproducts</option>
                                        <option value="Google_cpc_allproducts_12constellations">Google_cpc_allproducts_12constellations</option>
                                        <option value="Google_cpc_allproducts_DMN">Google_cpc_allproducts_DMN</option>
                                        <option value="Google_cpc_allproducts_extra">Google_cpc_allproducts_extra</option>
                                        <option value="google_gdn">google_gdn</option>
                                        <option value="Google_GSP">Google_GSP</option>
                                        <option value="Google_LoveSpringclub_blog">Google_LoveSpringclub_blog</option>
                                        <option value="Google_Merchant">Google_Merchant</option>
                                        <option value="google_mystore">google_mystore</option>
                                        <option value="Google_Springclub_blog">Google_Springclub_blog</option>
                                        <option value="ig">ig</option>
                                        <option value="IG_pay20170124th">IG_pay20170124th</option>
                                        <option value="introduction">introduction</option>
                                        <option value="ipeen_kaohsiung">ipeen_kaohsiung</option>
                                        <option value="ipeen_taichung">ipeen_taichung</option>
                                        <option value="ipeen_taipei">ipeen_taipei</option>
                                        <option value="ipeen_taoyuan">ipeen_taoyuan</option>
                                        <option value="kktix_introduction_20190824">kktix_introduction_20190824</option>
                                        <option value="Lecturer_ManaBear_Course_DM">Lecturer_ManaBear_Course_DM</option>
                                        <option value="line">line</option>
                                        <option value="line_Home_page">line_Home_page</option>
                                        <option value="lineat_active">lineat_active</option>
                                        <option value="lineat_funtour_1230">lineat_funtour_1230</option>
                                        <option value="lineat_funtour_Concert1219">lineat_funtour_Concert1219</option>
                                        <option value="LINEPOINT_無回報_210413">LINEPOINT_無回報_210413</option>
                                        <option value="love">love</option>
                                        <option value="loveauditorium">loveauditorium</option>
                                        <option value="m1">m1</option>
                                        <option value="m4">m4</option>
                                        <option value="Match_letter_springclub">Match_letter_springclub</option>
                                        <option value="mobile_homepage_Banner0410">mobile_homepage_Banner0410</option>
                                        <option value="mobile_homepage_Banner0502">mobile_homepage_Banner0502</option>
                                        <option value="mobile_homepage_Banner1030">mobile_homepage_Banner1030</option>
                                        <option value="mobile_homepage_Banner1113">mobile_homepage_Banner1113</option>
                                        <option value="mobile_homepage_Banner180110">mobile_homepage_Banner180110</option>
                                        <option value="mobile_homepage_Banner180625">mobile_homepage_Banner180625</option>
                                        <option value="mobile_homepage_Banner210111">mobile_homepage_Banner210111</option>
                                        <option value="mobile_officialwebsite_homepage_banner181005">mobile_officialwebsite_homepage_banner181005</option>
                                        <option value="mobile_officialwebsite_homepage_banner181102">mobile_officialwebsite_homepage_banner181102</option>
                                        <option value="niunews_pay">niunews_pay</option>
                                        <option value="niusnews_banner_tks">niusnews_banner_tks</option>
                                        <option value="Official Home_banner0318_02">Official Home_banner0318_02</option>
                                        <option value="Official Home_banner0318_03">Official Home_banner0318_03</option>
                                        <option value="Official Home_banner0318_04">Official Home_banner0318_04</option>
                                        <option value="Official Home_banner0318_05">Official Home_banner0318_05</option>
                                        <option value="Official_Home">Official_Home</option>
                                        <option value="Official_Home_banner">Official_Home_banner</option>
                                        <option value="Official_Home_banner0318_02">Official_Home_banner0318_02</option>
                                        <option value="Official_Home_banner0318_03">Official_Home_banner0318_03</option>
                                        <option value="Official_Home_banner0318_04">Official_Home_banner0318_04</option>
                                        <option value="Official_Home_banner0318_05">Official_Home_banner0318_05</option>
                                        <option value="Official_Home_banner20150925_6">Official_Home_banner20150925_6</option>
                                        <option value="Official_Home_banner20151023_activity1108">Official_Home_banner20151023_activity1108</option>
                                        <option value="Official_Home_banner20151023_activity1122">Official_Home_banner20151023_activity1122</option>
                                        <option value="Official_Home_banner20151023_activity1206">Official_Home_banner20151023_activity1206</option>
                                        <option value="Official_Home_banner20151023_activity1219">Official_Home_banner20151023_activity1219</option>
                                        <option value="Official_Home_banner20151230_activity0121">Official_Home_banner20151230_activity0121</option>
                                        <option value="Official_Home_banner20151230_activity0131">Official_Home_banner20151230_activity0131</option>
                                        <option value="Official_Home_banner20151230_activity0225">Official_Home_banner20151230_activity0225</option>
                                        <option value="Official_Home_banner20151230_activity0227">Official_Home_banner20151230_activity0227</option>
                                        <option value="Official_Home_banner20160304_activity0313">Official_Home_banner20160304_activity0313</option>
                                        <option value="Official_Home_banner20160325_activity0325">Official_Home_banner20160325_activity0325</option>
                                        <option value="Official_Home_banner20160325_activity0625">Official_Home_banner20160325_activity0625</option>
                                        <option value="Official_Home_banner20160325_activity0626">Official_Home_banner20160325_activity0626</option>
                                        <option value="Official_Home_banner20160325_activity0703">Official_Home_banner20160325_activity0703</option>
                                        <option value="Official_Home_banner20160325_activity0709">Official_Home_banner20160325_activity0709</option>
                                        <option value="Official_Home_banner20160325_activity0724">Official_Home_banner20160325_activity0724</option>
                                        <option value="Official_Home_banner20160325_activity0814">Official_Home_banner20160325_activity0814</option>
                                        <option value="Official_Home_banner20160325_activity0911">Official_Home_banner20160325_activity0911</option>
                                        <option value="Official_Home_banner20160325_activity0924">Official_Home_banner20160325_activity0924</option>
                                        <option value="Official_Home_banner20160330_activity0409">Official_Home_banner20160330_activity0409</option>
                                        <option value="Official_Home_banner20160330_activity0410">Official_Home_banner20160330_activity0410</option>
                                        <option value="Official_Home_banner20160330_activity0420">Official_Home_banner20160330_activity0420</option>
                                        <option value="Official_Home_banner20160330_activity0501">Official_Home_banner20160330_activity0501</option>
                                        <option value="Official_Home_banner20160330_activity0511">Official_Home_banner20160330_activity0511</option>
                                        <option value="Official_Home_banner20160330_activity0605">Official_Home_banner20160330_activity0605</option>
                                        <option value="Official_Home_banner20160330_activity0619">Official_Home_banner20160330_activity0619</option>
                                        <option value="Official_Home_banner20160812_activityPokemon">Official_Home_banner20160812_activityPokemon</option>
                                        <option value="Official_Home_banner20160812_activityPok矇mon">Official_Home_banner20160812_activityPok矇mon</option>
                                        <option value="Official_Home_banner20160921_activity1012">Official_Home_banner20160921_activity1012</option>
                                        <option value="Official_Home_banner20160921_activity1015">Official_Home_banner20160921_activity1015</option>
                                        <option value="Official_Home_banner201611_activity">Official_Home_banner201611_activity</option>
                                        <option value="Official_Home_banner201612_activity1204">Official_Home_banner201612_activity1204</option>
                                        <option value="Official_Home_banner201612_activity1210">Official_Home_banner201612_activity1210</option>
                                        <option value="Official_Home_banner201612_activity1225">Official_Home_banner201612_activity1225</option>
                                        <option value="Official_Home_lovestory">Official_Home_lovestory</option>
                                        <option value="Official_Home_SpringPeach">Official_Home_SpringPeach</option>
                                        <option value="officialwebsite_homepage_Banner0410">officialwebsite_homepage_Banner0410</option>
                                        <option value="officialwebsite_homepage_Banner0502">officialwebsite_homepage_Banner0502</option>
                                        <option value="officialwebsite_homepage_Banner0625">officialwebsite_homepage_Banner0625</option>
                                        <option value="officialwebsite_homepage_Banner0811">officialwebsite_homepage_Banner0811</option>
                                        <option value="officialwebsite_homepage_Banner1025">officialwebsite_homepage_Banner1025</option>
                                        <option value="officialwebsite_homepage_Banner1114">officialwebsite_homepage_Banner1114</option>
                                        <option value="officialwebsite_homepage_Banner1219">officialwebsite_homepage_Banner1219</option>
                                        <option value="officialwebsite_homepage_Banner180313">officialwebsite_homepage_Banner180313</option>
                                        <option value="officialwebsite_homepage_banner181005">officialwebsite_homepage_banner181005</option>
                                        <option value="officialwebsite_homepage_banner190308">officialwebsite_homepage_banner190308</option>
                                        <option value="officialwebsite_homepage_banner190403">officialwebsite_homepage_banner190403</option>
                                        <option value="popdaily_video_facebook_12constellations">popdaily_video_facebook_12constellations</option>
                                        <option value="popdaily_wideseries_springclub">popdaily_wideseries_springclub</option>
                                        <option value="s">s</option>
                                        <option value="sa">sa</option>
                                        <option value="sale">sale</option>
                                        <option value="sale~1041">sale~1041</option>
                                        <option value="sale986">sale986</option>
                                        <option value="SC_facebook_pay1101">SC_facebook_pay1101</option>
                                        <option value="SC_facebook_pay20180103">SC_facebook_pay20180103</option>
                                        <option value="SC_Facebook_pay20180511">SC_Facebook_pay20180511</option>
                                        <option value="SC_facebook_pofiles">SC_facebook_pofiles</option>
                                        <option value="SC_Google_GDN">SC_Google_GDN</option>
                                        <option value="SC_officialwebsite_activity">SC_officialwebsite_activity</option>
                                        <option value="SC_officialwebsite_homepage">SC_officialwebsite_homepage</option>
                                        <option value="scale_201806">scale_201806</option>
                                        <option value="scale_accupass_0629">scale_accupass_0629</option>
                                        <option value="singleparty">singleparty</option>
                                        <option value="singleparty_ EDM_I">singleparty_ EDM_I</option>
                                        <option value="singleparty_001_Angus">singleparty_001_Angus</option>
                                        <option value="singleparty_002_Angus">singleparty_002_Angus</option>
                                        <option value="singleparty_003_Angus">singleparty_003_Angus</option>
                                        <option value="singleparty_004_Angus">singleparty_004_Angus</option>
                                        <option value="singleparty_005_Angus">singleparty_005_Angus</option>
                                        <option value="singleparty_006_Angus">singleparty_006_Angus</option>
                                        <option value="singleparty_007_Angus">singleparty_007_Angus</option>
                                        <option value="singleparty_008_Angus">singleparty_008_Angus</option>
                                        <option value="singleparty_009_Angus">singleparty_009_Angus</option>
                                        <option value="singleparty_010_Angus">singleparty_010_Angus</option>
                                        <option value="singleparty_0512message">singleparty_0512message</option>
                                        <option value="singleparty_0625_Angus">singleparty_0625_Angus</option>
                                        <option value="singleparty_accupass_manchange_20190814">singleparty_accupass_manchange_20190814</option>
                                        <option value="singleparty_accupass_mrright_20190814">singleparty_accupass_mrright_20190814</option>
                                        <option value="singleparty_agilove_pay">singleparty_agilove_pay</option>
                                        <option value="singleparty_covid19_edm">singleparty_covid19_edm</option>
                                        <option value="singleparty_date_facebookpo">singleparty_date_facebookpo</option>
                                        <option value="singleparty_EDM_All_platforms_Not_enrolled">singleparty_EDM_All_platforms_Not_enrolled</option>
                                        <option value="singleparty_EDM_D">singleparty_EDM_D</option>
                                        <option value="singleparty_EDM_E">singleparty_EDM_E</option>
                                        <option value="singleparty_EDM_F">singleparty_EDM_F</option>
                                        <option value="singleparty_EDM_G">singleparty_EDM_G</option>
                                        <option value="singleparty_EDM_sponly0419">singleparty_EDM_sponly0419</option>
                                        <option value="singleparty_External_publicity_card">singleparty_External_publicity_card</option>
                                        <option value="singleparty_facebook">singleparty_facebook</option>
                                        <option value="singleparty_facebook_pay_GlobalSocial">singleparty_facebook_pay_GlobalSocial</option>
                                        <option value="singleparty_facebook_po">singleparty_facebook_po</option>
                                        <option value="singleparty_facebookpo_homedate">singleparty_facebookpo_homedate</option>
                                        <option value="singleparty_fb_getmarried_B_iProspect">singleparty_fb_getmarried_B_iProspect</option>
                                        <option value="singleparty_fb_getmarried_C_iProspect">singleparty_fb_getmarried_C_iProspect</option>
                                        <option value="singleparty_fb_getmarried_newyear_iProspect">singleparty_fb_getmarried_newyear_iProspect</option>
                                        <option value="singleparty_fb_getmarried_travel_iProspect">singleparty_fb_getmarried_travel_iProspect</option>
                                        <option value="singleparty_fb_getmarried_xmas_iProspect">singleparty_fb_getmarried_xmas_iProspect</option>
                                        <option value="singleparty_fb_loveroulette_A_iProspect">singleparty_fb_loveroulette_A_iProspect</option>
                                        <option value="singleparty_fb_loveroulette_B_iProspect">singleparty_fb_loveroulette_B_iProspect</option>
                                        <option value="singleparty_fb_loveroulette_C_iProspect">singleparty_fb_loveroulette_C_iProspect</option>
                                        <option value="singleparty_fb_loveroulette_D_iProspect">singleparty_fb_loveroulette_D_iProspect</option>
                                        <option value="singleparty_fb_loveroulette_E_iProspect">singleparty_fb_loveroulette_E_iProspect</option>
                                        <option value="singleparty_fb_onlinedate_0719_iProspect">singleparty_fb_onlinedate_0719_iProspect</option>
                                        <option value="singleparty_fb_onlinedate_0831_iProspect">singleparty_fb_onlinedate_0831_iProspect</option>
                                        <option value="singleparty_fb_onlinedate_1_iProspect">singleparty_fb_onlinedate_1_iProspect</option>
                                        <option value="singleparty_fb_onlinedate_2_iProspect">singleparty_fb_onlinedate_2_iProspect</option>
                                        <option value="singleparty_fb_onlinedate_4_iProspect">singleparty_fb_onlinedate_4_iProspect</option>
                                        <option value="singleparty_fb_onlinedate_5_iProspect">singleparty_fb_onlinedate_5_iProspect</option>
                                        <option value="singleparty_fb_onlinedate_iProspect">singleparty_fb_onlinedate_iProspect</option>
                                        <option value="singleparty_fb_tiantsaiA_iProspect">singleparty_fb_tiantsaiA_iProspect</option>
                                        <option value="singleparty_fb_tiantsaiB_iProspect">singleparty_fb_tiantsaiB_iProspect</option>
                                        <option value="singleparty_fb_tiantsaiC_iProspect">singleparty_fb_tiantsaiC_iProspect</option>
                                        <option value="singleparty_fb_tiantsaiD_iProspect">singleparty_fb_tiantsaiD_iProspect</option>
                                        <option value="singleparty_fb_tiantsaiE_iProspect">singleparty_fb_tiantsaiE_iProspect</option>
                                        <option value="singleparty_fb_tiantsaiF_iProspect">singleparty_fb_tiantsaiF_iProspect</option>
                                        <option value="singleparty_fb_tiantsaiG_iProspect">singleparty_fb_tiantsaiG_iProspect</option>
                                        <option value="singleparty_fb_tiantsaiH_iProspect">singleparty_fb_tiantsaiH_iProspect</option>
                                        <option value="singleparty_fb_Valentinesday_iProspect">singleparty_fb_Valentinesday_iProspect</option>
                                        <option value="singleparty_five_love">singleparty_five_love</option>
                                        <option value="singleparty_function1217_EDM">singleparty_function1217_EDM</option>
                                        <option value="singleparty_funtour_website">singleparty_funtour_website</option>
                                        <option value="singleparty_GDN_pay_iProspect">singleparty_GDN_pay_iProspect</option>
                                        <option value="singleparty_getmarried_0928_edm">singleparty_getmarried_0928_edm</option>
                                        <option value="singleparty_homepage_upbanner">singleparty_homepage_upbanner</option>
                                        <option value="singleparty_homepage_upbanner_mobile">singleparty_homepage_upbanner_mobile</option>
                                        <option value="singleparty_Instagram">singleparty_Instagram</option>
                                        <option value="singleparty_instagram_pofiles">singleparty_instagram_pofiles</option>
                                        <option value="singleparty_keywords_pay_iProspect">singleparty_keywords_pay_iProspect</option>
                                        <option value="singleparty_line@">singleparty_line@</option>
                                        <option value="singleparty_linedate_GDN_">singleparty_linedate_GDN_</option>
                                        <option value="singleparty_linedate_GDN_TaipeiDigital">singleparty_linedate_GDN_TaipeiDigital</option>
                                        <option value="singleparty_linedate_GDN0719_TaipeiDigital">singleparty_linedate_GDN0719_TaipeiDigital</option>
                                        <option value="singleparty_linedate_GDN0820_TaipeiDigital">singleparty_linedate_GDN0820_TaipeiDigital</option>
                                        <option value="singleparty_linepoints_edm">singleparty_linepoints_edm</option>
                                        <option value="singleparty_linepoints_message0114">singleparty_linepoints_message0114</option>
                                        <option value="singleparty_love_ability">singleparty_love_ability</option>
                                        <option value="singleparty_loveability_fbA1_iProspect">singleparty_loveability_fbA1_iProspect</option>
                                        <option value="singleparty_loveability_fbB1_iProspect">singleparty_loveability_fbB1_iProspect</option>
                                        <option value="singleparty_loveability_fbC_iProspect">singleparty_loveability_fbC_iProspect</option>
                                        <option value="singleparty_loveability_keywords_iProspect">singleparty_loveability_keywords_iProspect</option>
                                        <option value="singleparty_lovelab_fb_iProspect">singleparty_lovelab_fb_iProspect</option>
                                        <option value="singleparty_lovelab_fb11_iProspect">singleparty_lovelab_fb11_iProspect</option>
                                        <option value="singleparty_lovelab_fb2_iProspect">singleparty_lovelab_fb2_iProspect</option>
                                        <option value="singleparty_lovelab_fb3_iProspect">singleparty_lovelab_fb3_iProspect</option>
                                        <option value="singleparty_lovelab_fb4_iProspect">singleparty_lovelab_fb4_iProspect</option>
                                        <option value="singleparty_lovelab_fb5_iProspect">singleparty_lovelab_fb5_iProspect</option>
                                        <option value="singleparty_lovelab_fb7_iProspect">singleparty_lovelab_fb7_iProspect</option>
                                        <option value="singleparty_message_linefbdate_20200214">singleparty_message_linefbdate_20200214</option>
                                        <option value="singleparty_mobile_officialwebsite_activity">singleparty_mobile_officialwebsite_activity</option>
                                        <option value="singleparty_mobile_officialwebsite_homepage">singleparty_mobile_officialwebsite_homepage</option>
                                        <option value="singleparty_mobile_officialwebsite_homepage_banner181203">singleparty_mobile_officialwebsite_homepage_banner181203</option>
                                        <option value="singleparty_mobile_officialwebsite_homepage_banner190308">singleparty_mobile_officialwebsite_homepage_banner190308</option>
                                        <option value="singleparty_mobile_officialwebsite_homepage_banner190403">singleparty_mobile_officialwebsite_homepage_banner190403</option>
                                        <option value="singleparty_monthly2107_event_EDM">singleparty_monthly2107_event_EDM</option>
                                        <option value="singleparty_monthly2108_event_EDM">singleparty_monthly2108_event_EDM</option>
                                        <option value="singleparty_officialwebsite_homepage">singleparty_officialwebsite_homepage</option>
                                        <option value="singleparty_officialwebsite_homepage?cc=sale-474">singleparty_officialwebsite_homepage?cc=sale-474</option>
                                        <option value="singleparty_officialwebsite_homepage?cc=singleparty_mobile_officialwebsite_homepage">singleparty_officialwebsite_homepage?cc=singleparty_mobile_officialwebsite_homepage</option>
                                        <option value="singleparty_officialwebsite_homepage_banner181203">singleparty_officialwebsite_homepage_banner181203</option>
                                        <option value="singleparty_officialwebsite_m_homepage">singleparty_officialwebsite_m_homepage</option>
                                        <option value="singleparty_sale_logo">singleparty_sale_logo</option>
                                        <option value="singleparty_shopee_manchange_20190822">singleparty_shopee_manchange_20190822</option>
                                        <option value="singleparty_toby_line@">singleparty_toby_line@</option>
                                        <option value="singleparty_youtube">singleparty_youtube</option>
                                        <option value="singleparty20190621_a_Angus">singleparty20190621_a_Angus</option>
                                        <option value="singleparty20190621_b_Angus">singleparty20190621_b_Angus</option>
                                        <option value="singparty_test_0726">singparty_test_0726</option>
                                        <option value="sle-769">sle-769</option>
                                        <option value="sms">sms</option>
                                        <option value="sms_03move_20190619">sms_03move_20190619</option>
                                        <option value="sms_auto_send">sms_auto_send</option>
                                        <option value="sms_DMN_nojoin">sms_DMN_nojoin</option>
                                        <option value="sms_DMN_sunflower">sms_DMN_sunflower</option>
                                        <option value="sms_funtour">sms_funtour</option>
                                        <option value="sms_spring_good">sms_spring_good</option>
                                        <option value="sms_spring_nojoin">sms_spring_nojoin</option>
                                        <option value="sms_springclub_sunflower">sms_springclub_sunflower</option>
                                        <option value="social_pofiles">social_pofiles</option>
                                        <option value="SP_Facebook_pay_globalsocia">SP_Facebook_pay_globalsocia</option>
                                        <option value="SP_Facebook_pay_globalsocial_12">SP_Facebook_pay_globalsocial_12</option>
                                        <option value="SP_Facebook_pay_globalsocial_2">SP_Facebook_pay_globalsocial_2</option>
                                        <option value="SP_Facebook_pay_globalsocial_4">SP_Facebook_pay_globalsocial_4</option>
                                        <option value="SP_Facebook_pay_globalsocial_7">SP_Facebook_pay_globalsocial_7</option>
                                        <option value="SP_Facebook_pay0402">SP_Facebook_pay0402</option>
                                        <option value="SP_Facebook_pay20181015">SP_Facebook_pay20181015</option>
                                        <option value="SP_Google_GSP">SP_Google_GSP</option>
                                        <option value="SP_officialwebsite_activity">SP_officialwebsite_activity</option>
                                        <option value="SP_officialwebsite_m_homepage">SP_officialwebsite_m_homepage</option>
                                        <option value="spring_accupass">spring_accupass</option>
                                        <option value="spring_facebook">spring_facebook</option>
                                        <option value="spring_Member_password_notification">spring_Member_password_notification</option>
                                        <option value="Spring_oldcapital20210315_EDM">Spring_oldcapital20210315_EDM</option>
                                        <option value="SPRING_SOCIAL_FACEBOOK">SPRING_SOCIAL_FACEBOOK</option>
                                        <option value="springclub">springclub</option>
                                        <option value="springclub official website_home page_Super Match_02">springclub official website_home page_Super Match_02</option>
                                        <option value="springclub_1111TYC">springclub_1111TYC</option>
                                        <option value="springclub_activities_banner0830">springclub_activities_banner0830</option>
                                        <option value="Springclub_allproducts_Facebook_pay0408">Springclub_allproducts_Facebook_pay0408</option>
                                        <option value="Springclub_allproducts_Facebook_pay0409">Springclub_allproducts_Facebook_pay0409</option>
                                        <option value="Springclub_allproducts_Facebook_pay0709">Springclub_allproducts_Facebook_pay0709</option>
                                        <option value="Springclub_allproducts_Facebook_pay1121">Springclub_allproducts_Facebook_pay1121</option>
                                        <option value="Springclub_allproducts_Facebook_pay1122">Springclub_allproducts_Facebook_pay1122</option>
                                        <option value="Springclub_allproducts_Facebook_pay1128">Springclub_allproducts_Facebook_pay1128</option>
                                        <option value="Springclub_allproducts_Facebook_pay20181220">Springclub_allproducts_Facebook_pay20181220</option>
                                        <option value="Springclub_allproducts_Facebook_pay20190130">Springclub_allproducts_Facebook_pay20190130</option>
                                        <option value="Springclub_allproducts_Facebook_pay20190715">Springclub_allproducts_Facebook_pay20190715</option>
                                        <option value="Springclub_allproducts_Facebook_pay20190815">Springclub_allproducts_Facebook_pay20190815</option>
                                        <option value="Springclub_allproducts_Facebook_pay20191002">Springclub_allproducts_Facebook_pay20191002</option>
                                        <option value="Springclub_allproducts_Facebook_pay20200522">Springclub_allproducts_Facebook_pay20200522</option>
                                        <option value="Springclub_allproducts_Facebook_pay20200525">Springclub_allproducts_Facebook_pay20200525</option>
                                        <option value="Springclub_allproducts_Facebook_pay20200703">Springclub_allproducts_Facebook_pay20200703</option>
                                        <option value="Springclub_allproducts_Facebook_pay20200721">Springclub_allproducts_Facebook_pay20200721</option>
                                        <option value="Springclub_allproducts_Facebook_pay20200916">Springclub_allproducts_Facebook_pay20200916</option>
                                        <option value="Springclub_allproducts_Facebook_pay20201029">Springclub_allproducts_Facebook_pay20201029</option>
                                        <option value="Springclub_allproducts_Facebook_pay20201224">Springclub_allproducts_Facebook_pay20201224</option>
                                        <option value="Springclub_allproducts_Facebook_pay20210205">Springclub_allproducts_Facebook_pay20210205</option>
                                        <option value="Springclub_allproducts_Facebook_pay2021020501">Springclub_allproducts_Facebook_pay2021020501</option>
                                        <option value="Springclub_allproducts_Facebook_pay20210318">Springclub_allproducts_Facebook_pay20210318</option>
                                        <option value="Springclub_allproducts_Facebook_pay20210331">Springclub_allproducts_Facebook_pay20210331</option>
                                        <option value="Springclub_allproducts_Facebook_pay20210707">Springclub_allproducts_Facebook_pay20210707</option>
                                        <option value="Springclub_allproducts_Google_GDN">Springclub_allproducts_Google_GDN</option>
                                        <option value="Springclub_allproducts_Google_GDN20210202-2">Springclub_allproducts_Google_GDN20210202-2</option>
                                        <option value="Springclub_allproducts_instagram_pay20200916">Springclub_allproducts_instagram_pay20200916</option>
                                        <option value="Springclub_allproducts_instagram_pay20200916-1">Springclub_allproducts_instagram_pay20200916-1</option>
                                        <option value="Springclub_allproducts_instagram_pay20210127">Springclub_allproducts_instagram_pay20210127</option>
                                        <option value="Springclub_allproducts_instagram_pay20210127-1">Springclub_allproducts_instagram_pay20210127-1</option>
                                        <option value="Springclub_blog">Springclub_blog</option>
                                        <option value="Springclub_blog嚗?">Springclub_blog嚗?</option>
                                        <option value="springclub_bnext_20181205">springclub_bnext_20181205</option>
                                        <option value="springclub_chailease_app">springclub_chailease_app</option>
                                        <option value="springclub_chailease_web">springclub_chailease_web</option>
                                        <option value="springclub_facebook">springclub_facebook</option>
                                        <option value="springclub_facebook_20190123">springclub_facebook_20190123</option>
                                        <option value="springclub_facebook_calltoaction_12constellations">springclub_facebook_calltoaction_12constellations</option>
                                        <option value="springclub_facebook_calltoaction_matchmaker">springclub_facebook_calltoaction_matchmaker</option>
                                        <option value="springclub_facebook_niusnewspost_20190215">springclub_facebook_niusnewspost_20190215</option>
                                        <option value="Springclub_Facebook_pay0524">Springclub_Facebook_pay0524</option>
                                        <option value="springclub_facebook_pay0726_animal">springclub_facebook_pay0726_animal</option>
                                        <option value="springclub_facebook_pay0820">springclub_facebook_pay0820</option>
                                        <option value="springclub_facebook_pay0904">springclub_facebook_pay0904</option>
                                        <option value="Springclub_Facebook_pay20191105">Springclub_Facebook_pay20191105</option>
                                        <option value="springclub_facebook_pay376">springclub_facebook_pay376</option>
                                        <option value="springclub_facebook_pofiles">springclub_facebook_pofiles</option>
                                        <option value="Springclub_Google_allproducts_Explore">Springclub_Google_allproducts_Explore</option>
                                        <option value="Springclub_Google_allproducts_GDN">Springclub_Google_allproducts_GDN</option>
                                        <option value="Springclub_Google_cpc_allproducts">Springclub_Google_cpc_allproducts</option>
                                        <option value="springclub_google_gdn">springclub_google_gdn</option>
                                        <option value="Springclub_Google_GDN_allproducts">Springclub_Google_GDN_allproducts</option>
                                        <option value="springclub_Google_GDN20180905">springclub_Google_GDN20180905</option>
                                        <option value="springclub_Google_GDN20181008">springclub_Google_GDN20181008</option>
                                        <option value="Springclub_Google_GSP">Springclub_Google_GSP</option>
                                        <option value="springclub_Google_Merchant_pofiles">springclub_Google_Merchant_pofiles</option>
                                        <option value="springclub_hsinchuactivities_banner0725">springclub_hsinchuactivities_banner0725</option>
                                        <option value="springclub_hsinchuactivities_banner0802">springclub_hsinchuactivities_banner0802</option>
                                        <option value="Springclub_instagram">Springclub_instagram</option>
                                        <option value="Springclub_LoveForum">Springclub_LoveForum</option>
                                        <option value="springclub_mail">springclub_mail</option>
                                        <option value="springclub_mail_Monthedm">springclub_mail_Monthedm</option>
                                        <option value="springclub_mail_Monthedm0331">springclub_mail_Monthedm0331</option>
                                        <option value="springclub_mail_Monthedm0615">springclub_mail_Monthedm0615</option>
                                        <option value="springclub_mail_Monthedm0728">springclub_mail_Monthedm0728</option>
                                        <option value="springclub_mail_Monthedm0929">springclub_mail_Monthedm0929</option>
                                        <option value="springclub_mail_Monthedm1109">springclub_mail_Monthedm1109</option>
                                        <option value="springclub_mail_Monthedm1201">springclub_mail_Monthedm1201</option>
                                        <option value="springclub_mail_Monthedm12011201">springclub_mail_Monthedm12011201</option>
                                        <option value="springclub_mail_Monthedm1214">springclub_mail_Monthedm1214</option>
                                        <option value="springclub_mobile_officialwebsite_homepage">springclub_mobile_officialwebsite_homepage</option>
                                        <option value="springclub_niusnews_article_20190212">springclub_niusnews_article_20190212</option>
                                        <option value="Springclub_Official_activity_banner">Springclub_Official_activity_banner</option>
                                        <option value="springclub_officialwebsite">springclub_officialwebsite</option>
                                        <option value="springclub_officialwebsite_action">springclub_officialwebsite_action</option>
                                        <option value="springclub_officialwebsite_activity">springclub_officialwebsite_activity</option>
                                        <option value="springclub_officialwebsite_homepage">springclub_officialwebsite_homepage</option>
                                        <option value="springclub_officialwebsite_homepage, sale-474">springclub_officialwebsite_homepage, sale-474</option>
                                        <option value="springclub_officialwebsite_homepage_12constellations">springclub_officialwebsite_homepage_12constellations</option>
                                        <option value="springclub_officialwebsite_homepage_cheers">springclub_officialwebsite_homepage_cheers</option>
                                        <option value="springclub_officialwebsite_homepage_giftpage">springclub_officialwebsite_homepage_giftpage</option>
                                        <option value="springclub_officialwebsite_homepage_God">springclub_officialwebsite_homepage_God</option>
                                        <option value="springclub_officialwebsite_homepage_kabedon">springclub_officialwebsite_homepage_kabedon</option>
                                        <option value="springclub_officialwebsite_homepage_LoveVolunteering_01">springclub_officialwebsite_homepage_LoveVolunteering_01</option>
                                        <option value="springclub_officialwebsite_homepage_match">springclub_officialwebsite_homepage_match</option>
                                        <option value="springclub_officialwebsite_homepage_peach">springclub_officialwebsite_homepage_peach</option>
                                        <option value="springclub_officialwebsite_homepage_sign_up_01">springclub_officialwebsite_homepage_sign_up_01</option>
                                        <option value="springclub_officialwebsite_homepage_sign_up0904">springclub_officialwebsite_homepage_sign_up0904</option>
                                        <option value="springclub_officialwebsite_homepage_SpeedDating_01">springclub_officialwebsite_homepage_SpeedDating_01</option>
                                        <option value="springclub_officialwebsite_homepage_SuperMatch_02">springclub_officialwebsite_homepage_SuperMatch_02</option>
                                        <option value="springclub_officialwebsite_homepage_wedding_ring">springclub_officialwebsite_homepage_wedding_ring</option>
                                        <option value="springclub_officialwebsite_homepage_Weddingwitness_01">springclub_officialwebsite_homepage_Weddingwitness_01</option>
                                        <option value="springclub_officialwebsite_homepage_Yun_love">springclub_officialwebsite_homepage_Yun_love</option>
                                        <option value="springclub_officialwebsite_LoveVolunteering">springclub_officialwebsite_LoveVolunteering</option>
                                        <option value="springclub_provinceactivities_banner0816">springclub_provinceactivities_banner0816</option>
                                        <option value="springclub_Store_personal_data">springclub_Store_personal_data</option>
                                        <option value="springclub_taichungactivities_banner0712">springclub_taichungactivities_banner0712</option>
                                        <option value="springclub_Taichungactivities_banner0912">springclub_Taichungactivities_banner0912</option>
                                        <option value="springclub_Tainanactivities_banner0802">springclub_Tainanactivities_banner0802</option>
                                        <option value="springclub_taipeiactivities_banner0725">springclub_taipeiactivities_banner0725</option>
                                        <option value="springclub_taipeiactivities_banner0926">springclub_taipeiactivities_banner0926</option>
                                        <option value="springclub_taoyuanactivities_banner0905">springclub_taoyuanactivities_banner0905</option>
                                        <option value="springclub_youtube">springclub_youtube</option>
                                        <option value="springclub_youtube_12constellations">springclub_youtube_12constellations</option>
                                        <option value="springclub_youtube_cheers_12constellations">springclub_youtube_cheers_12constellations</option>
                                        <option value="Tainan_poster">Tainan_poster</option>
                                        <option value="TEEPR_singleparty_10years201811">TEEPR_singleparty_10years201811</option>
                                        <option value="TEEPR_singleparty_enterprise201811">TEEPR_singleparty_enterprise201811</option>
                                        <option value="WEB">WEB</option>
                                        <option value="WEB_優質會員推薦">WEB_優質會員推薦</option>
                                        <option value="womany_pay201710">womany_pay201710</option>
                                        <option value="wordpress">wordpress</option>
                                        <option value="workdate">workdate</option>
                                        <option value="www.tw-hongbao.com">www.tw-hongbao.com</option>
                                        <option value="www.tw-prizes.com">www.tw-prizes.com</option>
                                        <option value="www.yourtest-taiwan.com">www.yourtest-taiwan.com</option>
                                        <option value="yahoo_cpc">yahoo_cpc</option>
                                        <option value="Yahoo_cpc_Asiapac">Yahoo_cpc_Asiapac</option>
                                        <option value="Yahoo_cpc_Asiapac_DMN">Yahoo_cpc_Asiapac_DMN</option>
                                        <option value="youtube_groupon0311-0611">youtube_groupon0311-0611</option>
                                        <option value="小周末淑女之夜">小周末淑女之夜</option>
                                        <option value="小熊">小熊</option>
                                        <option value="手機簡訊">手機簡訊</option>
                                        <option value="免費婚活相親">免費婚活相親</option>
                                        <option value="找個珍愛你的人">找個珍愛你的人</option>
                                        <option value="活動通Accupass">活動通Accupass</option>
                                        <option value="談情說愛">談情說愛</option>
                                        <option value="摰??APP">摰??APP</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>推廣來源：
                                    <select name="s97_2" id="s97_2">
                                        <option value="">請選擇</option>
                                        <option value="sale-">sale-</option>
                                        <option value="sale-1007">sale-1007</option>
                                        <option value="sale-1016">sale-1016</option>
                                        <option value="sale-1019">sale-1019</option>
                                        <option value="sale-1025">sale-1025</option>
                                        <option value="sale-1036">sale-1036</option>
                                        <option value="sale-1041">sale-1041</option>
                                        <option value="sale-1042">sale-1042</option>
                                        <option value="sale-1049">sale-1049</option>
                                        <option value="sale-1050">sale-1050</option>
                                        <option value="sale-1060">sale-1060</option>
                                        <option value="sale-1060擃?摰Ｘ??寧蟡?砌?">sale-1060擃?摰Ｘ??寧蟡?砌?</option>
                                        <option value="sale-1061蝘??憪?">sale-1061蝘??憪?</option>
                                        <option value="sale-1062">sale-1062</option>
                                        <option value="sale-1066">sale-1066</option>
                                        <option value="sale-1068">sale-1068</option>
                                        <option value="sale-1070">sale-1070</option>
                                        <option value="sale-1070，�??�調?��??�網?��?，您?�撥空瀏覽官網上�?活�??��?級速�?資�?庫電�?">sale-1070，�??�調?��??�網?��?，您?�撥空瀏覽官網上�?活�??��?級速�?資�?庫電�?</option>
                                        <option value="sale-1072">sale-1072</option>
                                        <option value="sale-1075">sale-1075</option>
                                        <option value="sale-1078">sale-1078</option>
                                        <option value="sale-108">sale-108</option>
                                        <option value="sale-1083">sale-1083</option>
                                        <option value="sale-1086">sale-1086</option>
                                        <option value="sale-1087">sale-1087</option>
                                        <option value="sale-1090">sale-1090</option>
                                        <option value="sale-1094">sale-1094</option>
                                        <option value="sale-1095">sale-1095</option>
                                        <option value="sale-1097">sale-1097</option>
                                        <option value="sale-1098">sale-1098</option>
                                        <option value="sale-1099">sale-1099</option>
                                        <option value="sale-1101">sale-1101</option>
                                        <option value="sale-1105">sale-1105</option>
                                        <option value="sale-1106">sale-1106</option>
                                        <option value="sale-1107">sale-1107</option>
                                        <option value="sale-1108">sale-1108</option>
                                        <option value="sale-1109">sale-1109</option>
                                        <option value="sale-1110">sale-1110</option>
                                        <option value="sale-1111">sale-1111</option>
                                        <option value="sale-1112">sale-1112</option>
                                        <option value="sale-1113">sale-1113</option>
                                        <option value="sale-1115">sale-1115</option>
                                        <option value="sale-1116">sale-1116</option>
                                        <option value="sale-1117">sale-1117</option>
                                        <option value="sale-1118">sale-1118</option>
                                        <option value="sale-1119">sale-1119</option>
                                        <option value="sale-1121">sale-1121</option>
                                        <option value="sale-1122">sale-1122</option>
                                        <option value="sale-1125">sale-1125</option>
                                        <option value="sale-1127">sale-1127</option>
                                        <option value="sale-1130">sale-1130</option>
                                        <option value="sale-1131">sale-1131</option>
                                        <option value="sale-1137">sale-1137</option>
                                        <option value="sale-1140">sale-1140</option>
                                        <option value="sale-1141">sale-1141</option>
                                        <option value="sale-1143">sale-1143</option>
                                        <option value="sale-1144">sale-1144</option>
                                        <option value="sale-1149">sale-1149</option>
                                        <option value="sale-1151">sale-1151</option>
                                        <option value="sale-1154">sale-1154</option>
                                        <option value="sale-1156">sale-1156</option>
                                        <option value="sale-1158">sale-1158</option>
                                        <option value="sale-1159">sale-1159</option>
                                        <option value="sale-1160">sale-1160</option>
                                        <option value="sale-1161">sale-1161</option>
                                        <option value="sale-1162">sale-1162</option>
                                        <option value="sale-1170">sale-1170</option>
                                        <option value="sale-1171">sale-1171</option>
                                        <option value="sale-1173">sale-1173</option>
                                        <option value="sale-1175">sale-1175</option>
                                        <option value="sale-1176">sale-1176</option>
                                        <option value="sale-1178">sale-1178</option>
                                        <option value="sale-1179">sale-1179</option>
                                        <option value="sale-1180">sale-1180</option>
                                        <option value="sale-1187">sale-1187</option>
                                        <option value="sale-1188">sale-1188</option>
                                        <option value="sale-1189">sale-1189</option>
                                        <option value="sale-119">sale-119</option>
                                        <option value="sale-1190">sale-1190</option>
                                        <option value="sale-1191">sale-1191</option>
                                        <option value="sale-1192">sale-1192</option>
                                        <option value="sale-1194">sale-1194</option>
                                        <option value="sale-1195">sale-1195</option>
                                        <option value="sale-1197">sale-1197</option>
                                        <option value="sale-1200">sale-1200</option>
                                        <option value="sale-1201">sale-1201</option>
                                        <option value="sale-1202">sale-1202</option>
                                        <option value="sale-1206">sale-1206</option>
                                        <option value="sale-1212">sale-1212</option>
                                        <option value="sale-1214">sale-1214</option>
                                        <option value="sale-1215">sale-1215</option>
                                        <option value="sale-1216">sale-1216</option>
                                        <option value="sale-1217">sale-1217</option>
                                        <option value="sale-1218">sale-1218</option>
                                        <option value="sale-1220">sale-1220</option>
                                        <option value="sale-1220,">sale-1220,</option>
                                        <option value="sale-1221">sale-1221</option>
                                        <option value="sale-1222">sale-1222</option>
                                        <option value="sale-1223">sale-1223</option>
                                        <option value="sale-1225">sale-1225</option>
                                        <option value="sale-1227">sale-1227</option>
                                        <option value="sale-1229">sale-1229</option>
                                        <option value="sale-123">sale-123</option>
                                        <option value="sale-1230">sale-1230</option>
                                        <option value="sale-1231">sale-1231</option>
                                        <option value="sale-1233">sale-1233</option>
                                        <option value="sale-1235">sale-1235</option>
                                        <option value="sale-1236">sale-1236</option>
                                        <option value="sale-1237">sale-1237</option>
                                        <option value="sale-1238">sale-1238</option>
                                        <option value="sale-1241">sale-1241</option>
                                        <option value="sale-1242">sale-1242</option>
                                        <option value="sale-1243">sale-1243</option>
                                        <option value="sale-1246">sale-1246</option>
                                        <option value="sale-1248">sale-1248</option>
                                        <option value="sale-1249">sale-1249</option>
                                        <option value="sale-1252">sale-1252</option>
                                        <option value="sale-1257">sale-1257</option>
                                        <option value="sale-1260">sale-1260</option>
                                        <option value="sale-1261">sale-1261</option>
                                        <option value="sale-1262">sale-1262</option>
                                        <option value="sale-1264">sale-1264</option>
                                        <option value="sale-1265">sale-1265</option>
                                        <option value="sale-1266">sale-1266</option>
                                        <option value="sale-1269">sale-1269</option>
                                        <option value="sale-1271">sale-1271</option>
                                        <option value="sale-1276">sale-1276</option>
                                        <option value="sale-1277">sale-1277</option>
                                        <option value="sale-1279">sale-1279</option>
                                        <option value="sale-1281">sale-1281</option>
                                        <option value="sale-1282">sale-1282</option>
                                        <option value="sale-1283">sale-1283</option>
                                        <option value="sale-1284">sale-1284</option>
                                        <option value="sale-1285">sale-1285</option>
                                        <option value="sale-1286">sale-1286</option>
                                        <option value="sale-1287">sale-1287</option>
                                        <option value="sale-1288">sale-1288</option>
                                        <option value="sale-1290">sale-1290</option>
                                        <option value="sale-1299">sale-1299</option>
                                        <option value="sale-1302">sale-1302</option>
                                        <option value="sale-1304">sale-1304</option>
                                        <option value="sale-1307">sale-1307</option>
                                        <option value="sale-1309">sale-1309</option>
                                        <option value="sale-1310">sale-1310</option>
                                        <option value="sale-1314">sale-1314</option>
                                        <option value="sale-310">sale-310</option>
                                        <option value="sale-312">sale-312</option>
                                        <option value="sale-321">sale-321</option>
                                        <option value="sale-322">sale-322</option>
                                        <option value="sale-322__江琳姐">sale-322__江琳姐</option>
                                        <option value="sale-322江琳姐">sale-322江琳姐</option>
                                        <option value="sale-327">sale-327</option>
                                        <option value="sale-329">sale-329</option>
                                        <option value="sale-333">sale-333</option>
                                        <option value="sale-334">sale-334</option>
                                        <option value="sale-338">sale-338</option>
                                        <option value="sale-340">sale-340</option>
                                        <option value="sale-343">sale-343</option>
                                        <option value="sale-343甇∟???">sale-343甇∟???</option>
                                        <option value="sale-344">sale-344</option>
                                        <option value="sale-344,">sale-344,</option>
                                        <option value="sale-344,?�空記�?上網???��??��??�可以幫?��???">sale-344,?�空記�?上網???��??��??�可以幫?��???</option>
                                        <option value="sale-344,?征閮?銝雯???????隞亙鼠?唬???">sale-344,?征閮?銝雯???????隞亙鼠?唬???</option>
                                        <option value="sale-344有空記得上網看,有機會希望可以幫到你喔">sale-344有空記得上網看,有機會希望可以幫到你喔</option>
                                        <option value="sale-345">sale-345</option>
                                        <option value="sale-346">sale-346</option>
                                        <option value="sale-353">sale-353</option>
                                        <option value="sale-353.php">sale-353.php</option>
                                        <option value="sale-353?��?多活?��??��??�身資�??��???">sale-353?��?多活?��??��??�身資�??��???</option>
                                        <option value="sale-360">sale-360</option>
                                        <option value="sale-363">sale-363</option>
                                        <option value="sale-364">sale-364</option>
                                        <option value="sale-366">sale-366</option>
                                        <option value="sale-371">sale-371</option>
                                        <option value="sale-376">sale-376</option>
                                        <option value="sale-377">sale-377</option>
                                        <option value="sale-379">sale-379</option>
                                        <option value="sale-386">sale-386</option>
                                        <option value="sale-387">sale-387</option>
                                        <option value="sale-391">sale-391</option>
                                        <option value="sale-392">sale-392</option>
                                        <option value="sale-412">sale-412</option>
                                        <option value="sale-417">sale-417</option>
                                        <option value="sale-427">sale-427</option>
                                        <option value="sale-433">sale-433</option>
                                        <option value="sale-433 ?�雪麗�???985160165(ID160165)">sale-433 ?�雪麗�???985160165(ID160165)</option>
                                        <option value="sale-433?剝暻?985160165(ID:160165)">sale-433?剝暻?985160165(ID:160165)</option>
                                        <option value="sale-435">sale-435</option>
                                        <option value="sale-442">sale-442</option>
                                        <option value="sale-454">sale-454</option>
                                        <option value="sale-454-??銋???35-356676">sale-454-??銋???35-356676</option>
                                        <option value="sale-454王敏之秘書03-5356676">sale-454王敏之秘書03-5356676</option>
                                        <option value="sale-468">sale-468</option>
                                        <option value="sale-470">sale-470</option>
                                        <option value="sale-474">sale-474</option>
                                        <option value="sale-474springclub_officialwebsite_homepage">sale-474springclub_officialwebsite_homepage</option>
                                        <option value="sale-478">sale-478</option>
                                        <option value="sale-48">sale-48</option>
                                        <option value="sale-489">sale-489</option>
                                        <option value="sale-493">sale-493</option>
                                        <option value="sale-519">sale-519</option>
                                        <option value="sale-541">sale-541</option>
                                        <option value="sale-543">sale-543</option>
                                        <option value="sale-543,?�註?��?費�????�話:02-23811348?��??��?,歡�??��?來電諮詢,願能幫您?�薦?�想對象">sale-543,?�註?��?費�????�話:02-23811348?��??��?,歡�??��?來電諮詢,願能幫您?�薦?�想對象</option>
                                        <option value="sale-544">sale-544</option>
                                        <option value="sale-549">sale-549</option>
                                        <option value="sale-558">sale-558</option>
                                        <option value="sale-558約�?專家.線�?婚�?">sale-558約�?專家.線�?婚�?</option>
                                        <option value="sale-558蝝?撠振.蝺?憍?">sale-558蝝?撠振.蝺?憍?</option>
                                        <option value="sale-558蝝?撠振.蝺?憍?嚗閮餃?嚗迨閮?餉?潮?隢?.?亙予?尹嚗?4-23265300嚗迭餈?閫.蝘雿慦?">sale-558蝝?撠振.蝺?憍?嚗閮餃?嚗迨閮?餉?潮?隢?.?亙予?尹嚗?4-23265300嚗迭餈?閫.蝘雿慦?</option>
                                        <option value="sale-559">sale-559</option>
                                        <option value="sale-561">sale-561</option>
                                        <option value="sale-577">sale-577</option>
                                        <option value="sale-600">sale-600</option>
                                        <option value="sale-637">sale-637</option>
                                        <option value="sale-659">sale-659</option>
                                        <option value="sale-659?亙予?尹????0918535622">sale-659?亙予?尹????0918535622</option>
                                        <option value="sale-676">sale-676</option>
                                        <option value="sale-696">sale-696</option>
                                        <option value="sale-708">sale-708</option>
                                        <option value="sale-709">sale-709</option>
                                        <option value="sale-724">sale-724</option>
                                        <option value="sale-731">sale-731</option>
                                        <option value="sale-741">sale-741</option>
                                        <option value="sale-744">sale-744</option>
                                        <option value="sale-756">sale-756</option>
                                        <option value="sale-766">sale-766</option>
                                        <option value="sale-766?�天?�館?�縣市政府辦?��?多活?�唷">sale-766?�天?�館?�縣市政府辦?��?多活?�唷</option>
                                        <option value="sale-766?亙予?尹?腦撣摨齒??憭暑?">sale-766?亙予?尹?腦撣摨齒??憭暑?</option>
                                        <option value="sale-766?亙予?尹?腦撣摨齒??憭暑?嚗?.銝????摰嗆?擗剁?銝摮???暸??游頨怨隤潭???">sale-766?亙予?尹?腦撣摨齒??憭暑?嚗?.銝????摰嗆?擗剁?銝摮???暸??游頨怨隤潭???</option>
                                        <option value="sale-766約會專家">sale-766約會專家</option>
                                        <option value="sale-769">sale-769</option>
                                        <option value="sale-769春天會館鄒佳潔秘書035-356676">sale-769春天會館鄒佳潔秘書035-356676</option>
                                        <option value="sale-775">sale-775</option>
                                        <option value="sale-777">sale-777</option>
                                        <option value="sale-784">sale-784</option>
                                        <option value="sale-798">sale-798</option>
                                        <option value="sale-801">sale-801</option>
                                        <option value="sale-817">sale-817</option>
                                        <option value="sale-817?��?婕�???4-23265300">sale-817?��?婕�???4-23265300</option>
                                        <option value="sale-817??憍???4-23265300">sale-817??憍???4-23265300</option>
                                        <option value="sale-834">sale-834</option>
                                        <option value="sale-850">sale-850</option>
                                        <option value="sale-856">sale-856</option>
                                        <option value="sale-885">sale-885</option>
                                        <option value="sale-889">sale-889</option>
                                        <option value="sale-891">sale-891</option>
                                        <option value="sale-898">sale-898</option>
                                        <option value="sale-900">sale-900</option>
                                        <option value="sale-922?�天?�館-姵�?顧�?0963-110636">sale-922?�天?�館-姵�?顧�?0963-110636</option>
                                        <option value="sale-933">sale-933</option>
                                        <option value="sale-949">sale-949</option>
                                        <option value="sale-95">sale-95</option>
                                        <option value="sale-951">sale-951</option>
                                        <option value="sale-956">sale-956</option>
                                        <option value="sale-961">sale-961</option>
                                        <option value="sale-968">sale-968</option>
                                        <option value="sale-970">sale-970</option>
                                        <option value="sale-972">sale-972</option>
                                        <option value="sale-985">sale-985</option>
                                        <option value="sale-986">sale-986</option>
                                        <option value="sale-997">sale-997</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>會館：
                                    <select name="s11" id="s11">
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
                                    </select> <select name="s7" id="s7">
                                        <option value="">請選擇</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>推薦會館：
                                    <select name="s19" id="s19">
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
                                    </select> <select name="s20" id="s20">
                                        <option value="">請選擇</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="pull-left vcenter" style="height:34px;line-height:34px;">電訪員：</label>
                                    <input name="serc" type="text" id="serc" class="form-control width-200 pull-left" size="20">
                                </td>
                            </tr>
                            <tr>
                                <td>輸入人：
                                    <select name="s30" id="s30">
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
                                    </select> <select name="s31" id="s31">
                                        <option value="">請選擇</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>會員權益：
                                    <select name="s15" id="s15">
                                        <option value="">請選擇</option>
                                        <option value="1">資料認證</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    年收入：
                                    <select name="a4" id="a4" class="select2" multiple>
                                        <option value="50萬以下">50萬以下</option>
                                        <option value="51萬到80萬">51萬到80萬</option>
                                        <option value="81萬到100萬">81萬到100萬</option>
                                        <option value="101萬到199萬">101萬到199萬</option>
                                        <option value="200萬以上">200萬以上</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>處理情形：
                                    <select name="s98" id="s98" style="width:60%;" multiple>
                                        <option value="" selected>請選擇</option>
                                        <option value="" disabled>--- 已入會 ---</option>
                                        <option value="已成交">已成交</option>
                                        <option value="已是全卡會員">已是全卡會員</option>
                                        <option value="" disabled>--- 已邀約 ---</option>
                                        <option value="已邀約">已邀約</option>
                                        <option value="已邀約本週">已邀約本週</option>
                                        <option value="已邀約本月">已邀約本月</option>
                                        <option value="已邀約未到現場">已邀約未到現場</option>
                                        <option value="可邀約A">可邀約A</option>
                                        <option value="可邀約B">可邀約B</option>
                                        <option value="可邀約C">可邀約C</option>
                                        <option value="邀約完需再次提醒">邀約完需再次提醒</option>
                                        <option value="" disabled>--- 需加強 ---</option>
                                        <option value="未接">未接</option>
                                        <option value="未接4次以上">未接4次以上</option>
                                        <option value="未接1">未接1</option>
                                        <option value="未接2">未接2</option>
                                        <option value="未接3">未接3</option>
                                        <option value="預約聯絡">預約聯絡</option>
                                        <option value="有到未參">有到未參</option>
                                        <option value="長期經營">長期經營</option>
                                        <option value="重點經營">重點經營</option>
                                        <option value="到期未續約">到期未續約</option>
                                        <option value="需加強推廣活動">需加強推廣活動</option>
                                        <option value="需要再排約">需要再排約</option>
                                        <option value="已來訪考慮中">已來訪考慮中</option>
                                        <option value="" disabled>--- 排約狀況 ---</option>
                                        <option value="已排約">已排約</option>
                                        <option value="約後關懷">約後關懷</option>
                                        <option value="排約未滿5次">排約未滿5次</option>
                                        <option value="排約無效">排約無效</option>
                                        <option value="" disabled>--- 公開資料 ---</option>
                                        <option value="名單資訊">名單資訊</option>
                                        <option value="客訴反映">客訴反映</option>
                                        <option value="聯繫狀況">聯繫狀況</option>
                                        <option value="排約注意">排約注意</option>
                                        <option value="" disabled>--- 休息中 ---</option>
                                        <option value="請假三個月">請假三個月</option>
                                        <option value="請假半年">請假半年</option>
                                        <option value="請假一年">請假一年</option>
                                        <option value="" disabled>--- 活動咖 ---</option>
                                        <option value="課程">課程</option>
                                        <option value="喜歡戶外活動">喜歡戶外活動</option>
                                        <option value="喜歡室內活動">喜歡室內活動</option>
                                        <option value="喜歡國外旅遊">喜歡國外旅遊</option>
                                        <option value="" disabled>--- 重覆 ---</option>
                                        <option value="重覆名單">重覆名單</option>
                                        <option value="舊會員">舊會員</option>
                                        <option value="" disabled>--- 無效 ---</option>
                                        <option value="無效">無效</option>
                                        <option value="黑名單">黑名單</option>
                                        <option value="不要再聯絡">不要再聯絡</option>
                                        <option value="拒絕">拒絕</option>
                                        <option value="暫時拒絕">暫時拒絕</option>
                                        <option value="空號">空號</option>
                                        <option value="手機號暫停">手機號暫停</option>
                                        <option value="已結婚">已結婚</option>
                                        <option value="目前交往中">目前交往中</option>
                                        <option value="年紀太小">年紀太小</option>
                                        <option value="總管理回收名單">總管理回收名單</option>
                                        <option value="條件不符暫不約">條件不符暫不約</option>
                                        <option value="已解約">已解約</option>

                                        <option value="未處理">未處理</option>
                                        <option value="已處理">已處理</option>
                                        <option value="已發送">已發送</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="checkbox"><input type="checkbox" name="nodouble" id="nodouble" value="1"><i></i>排除重複名單</label>&nbsp;&nbsp;
                                    <label class="checkbox"><input type="checkbox" name="onlyfav" id="onlyfav" value="1"><i></i>僅關注名單</label>&nbsp;&nbsp;
                                    <label class="checkbox"><input type="checkbox" name="onlyshowphoto" value="1"><i></i>只顯示有照片</label>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="開始搜尋" style="height:28px"></td>
                            </tr>
                    </table>
                </form>
                </td>
                </tr>
                </table>
</section>
<!-- /MIDDLE -->

<div class="modal fade" id="reservation_alert_modal" tabindex="-1">
    <div class="modal-dialog" style="width:auto;">
        <div class="modal-content">
            <div class="modal-header" style="background:#d9534f;">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title" style="color:#fff;font-weight:bold;">預約聯絡提醒</h4>
            </div>
            <div class="modal-body">
                <p>預約聯絡時間前 5 , 1 分均會出現提醒訊息</p>
                <p>本次提醒為 <span id="reservation_alert_modal_mi"></span> 分提醒</p>
                <p>預約聯絡時間：<span id="reservation_alert_modal_time"></span></p>
                <p>預約聯絡姓名：<span id="reservation_alert_modal_us"></span></p>
            </div>

            <div class="modal-footer">
                <a href="#close" class="btn btn-default" data-dismiss="modal">關閉</a>
                <a class="btn btn-danger" href="ad_mem_reservation_v.php?t1=2021/9/9&t2=2021/9/9">查看本日預約</a>
            </div>

        </div>
    </div>
</div>

<?php
require("./include/_bottom.php");
?>

<script src="js/select2.min.js"></script>
<script>
    $mtu = "ad_no_mem.";
    $(function() {
        /*
$("#s98").multiselect({
	  columns: 5,
	  minSelect:2,	  
	  maxSelect:2,	  
    texts: {
        placeholder: '請選擇'
    }
  });
*/
        $("option:selected", $("#s98")).remove();
        $("#s98").select2();
        $("#s11").on("change", function() {
            personnel_get_find("s11", "s7");
        });
        $("#s30").on("change", function() {
            personnel_get_find("s30", "s31");
        });
        $("#s19").on("change", function() {
            personnel_get_find("s19", "s20");
        });
        $("#s8").on("change", function() {
            $("#s8_1_sel").remove();
            $("#s8_1").val("");
            switch ($(this).val()) {
                case "DMN網站":

                    $.ajax({
                        method: "POST",
                        url: "ad_no_mem_f.php",
                        data: {
                            st: "getcome2"
                        }
                    }).done(function(msg) {
                        if (msg.indexOf(",") > 0) {
                            var $nsel = $("<select>");
                            $nsel.attr("id", "s8_1_sel");
                            $nsel.append($("<option></option>").attr("value", "").text("所有小類"));
                            $.each(msg.split(","), function(i, x) {
                                if (x) $nsel.append($("<option></option>").attr("value", x).text(x));
                            });
                            $("#s8_1_div").append($nsel);
                            $nsel.on("change", function() {
                                $("#s8_1").val($(this).val());
                            });
                        } else alert(msg);
                    });

                    break;
                case "行銷活動":

                    $.ajax({
                        method: "POST",
                        url: "ad_no_mem_f.php",
                        data: {
                            st: "getcome3"
                        }
                    }).done(function(msg) {
                        if (msg.indexOf(",") > 0) {
                            var $nsel = $("<select>");
                            $nsel.attr("id", "s8_1_sel");
                            $nsel.append($("<option></option>").attr("value", "").text("所有小類"));
                            $.each(msg.split(","), function(i, x) {
                                if (x) $nsel.append($("<option></option>").attr("value", x).text(x));
                            });
                            $("#s8_1_div").append($nsel);
                            $nsel.on("change", function() {
                                $("#s8_1").val($(this).val());
                            });
                        } else alert(msg);
                    });

                    break;
                case "通路合作":

                    $.ajax({
                        method: "POST",
                        url: "ad_no_mem_f.php",
                        data: {
                            st: "getcome6"
                        }
                    }).done(function(msg) {

                        var $nsel = $("<select>");
                        $nsel.attr("id", "s8_1_sel");
                        $nsel.append($("<option></option>").attr("value", "").text("所有小類"));
                        $.each(msg.split(","), function(i, x) {
                            if (x) $nsel.append($("<option></option>").attr("value", x.split("|o|")[0]).text(x.split("|o|")[1]));
                        });
                        $("#s8_1_div").append($nsel);
                        $nsel.on("change", function() {
                            $("#s8_6").val($(this).val());
                        });

                    });

                    break;
                case "約會專家":

                    $.ajax({
                        method: "POST",
                        url: "ad_no_mem_f.php",
                        data: {
                            st: "getcome4"
                        }
                    }).done(function(msg) {
                        if (msg.indexOf(",") > 0) {
                            var $nsel = $("<select>");
                            $nsel.attr("id", "s8_1_sel");
                            $nsel.append($("<option></option>").attr("value", "").text("所有小類"));
                            $.each(msg.split(","), function(i, x) {
                                if (x) $nsel.append($("<option></option>").attr("value", x).text(x));
                            });
                            $("#s8_1_div").append($nsel);
                            $nsel.on("change", function() {
                                $("#s8_1").val($(this).val());
                            });
                        } else alert(msg);
                    });

                    break;

                case "春天網站":

                    $.ajax({
                        method: "POST",
                        url: "ad_no_mem_f.php",
                        data: {
                            st: "getcome5",
                            r: "春天網站"
                        }
                    }).done(function(msg) {
                        if (msg.indexOf(",") > 0) {
                            var $nsel = $("<select>");
                            $nsel.attr("id", "s8_1_sel");
                            $nsel.append($("<option></option>").attr("value", "").text("所有小類"));
                            $.each(msg.split(","), function(i, x) {
                                if (x) $nsel.append($("<option></option>").attr("value", x).text(x));
                            });
                            $("#s8_1_div").append($nsel);
                            $nsel.on("change", function() {
                                $("#s8_1").val($(this).val());
                            });
                        } else alert(msg);
                    });

                    break;
                case "FB名單":

                    $.ajax({
                        method: "POST",
                        url: "ad_no_mem_f.php",
                        data: {
                            st: "getcome5",
                            r: "FB名單"
                        }
                    }).done(function(msg) {
                        if (msg.indexOf(",") > 0) {
                            var $nsel = $("<select>");
                            $nsel.attr("id", "s8_1_sel");
                            $nsel.append($("<option></option>").attr("value", "").text("所有小類"));
                            $.each(msg.split(","), function(i, x) {
                                if (x) $nsel.append($("<option></option>").attr("value", x).text(x));
                            });
                            $("#s8_1_div").append($nsel);
                            $nsel.on("change", function() {
                                $("#s8_1").val($(this).val());
                            });
                        } else alert(msg);
                    });

                    break;
                case "迷你約":

                    $.ajax({
                        method: "POST",
                        url: "ad_no_mem_f.php",
                        data: {
                            st: "getcome5",
                            r: "迷你約"
                        }
                    }).done(function(msg) {
                        if (msg.indexOf(",") > 0) {
                            var $nsel = $("<select>");
                            $nsel.attr("id", "s8_1_sel");
                            $nsel.append($("<option></option>").attr("value", "").text("所有小類"));
                            $.each(msg.split(","), function(i, x) {
                                if (x) $nsel.append($("<option></option>").attr("value", x).text(x));
                            });
                            $("#s8_1_div").append($nsel);
                            $nsel.on("change", function() {
                                $("#s8_1").val($(this).val());
                            });
                        } else alert(msg);
                    });

                    break;
            }
        });
    });
</script>