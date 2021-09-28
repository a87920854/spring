<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <title>貴賓諮詢卡</title>
    <style>
        .wrap {
            max-width: 900px;
            width: 100%;
            margin: 0 auto;
            font-family: '標楷體', 'Times New Roman', Times, serif;
            page-break-before: always;
            page-break-after: always;
        }

        h1 {
            text-align: center;
            font-size: 20px;
        }

        h2 {
            font-size: 14px;
            text-align: right;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        ul li {
            width: 100%;
        }

        table {
            width: 100%;
            font-size: 14px;
            border-spacing: 0;
            border-collapse: collapse;
            border-top: 1px solid #000;
            border-left: 1px solid #000;
            page-break-inside: auto;
        }

        table+table {
            margin-top: 10px;
        }

        td,
        th {
            text-align: left;
            padding: 2px 6px;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
        }

        table {
            page-break-inside: auto
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto
        }

        thead {
            display: table-header-group
        }

        tfoot {
            display: table-footer-group
        }

        h3,
        h4,
        p {
            margin: 4px 0;
        }

        .underline {
            display: inline-block;
            border-bottom: 1px solid #000;
        }

        .space {
            display: inline-block;
        }

        .slash {
            position: relative;
            overflow: hidden;
        }

        .slash::after {
            content: "";
            position: absolute;
            z-index: 1;
            top: 0;
            left: -10px;
            right: -10px;
            bottom: 0;
            height: 1px;
            border-bottom: 1px solid #000;
            transform: rotate(-20deg);
            transform-origin: center right;

        }

        .blankbox td,
        .blankbox th {
            padding: 7px 6px;
        }

        .blankbox th {
            text-align: center;
        }

        #printbtn {
            display: ;
        }

        @page {
            margin: 20px;
        }

        @media print {
            .wrap {
                width: 100%;
            }

            #printbtn {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- 第一頁 -->
    <div class="wrap">
        <button id="printbtn" onclick="window.print();">列印本頁</button>
        <h1>貴賓諮詢卡</h1>
        <h2>填表時間：110 年 9 月 8 日</h2>
        <!-- 基本資料 -->
        <table>
            <tr>
                <th scope="row">編號</th>
                <td colspan="3">2082523</td>
                <th scope="row">身分證字號</th>
                <td colspan="5">K122260199</td>
            </tr>
            <tr>
                <th scope="row">姓名</th>
                <td>詹前程</td>
                <td colspan="2"><strong>生日：</strong>
                    民國 77 年 10 月 9 日
                </td>
                <td colspan="2"><strong>星座：</strong>天秤座</td>
                <td colspan="2"><strong>血型：</strong>O</td>
            </tr>
            <tr>
                <th scope="row" rowspan="2">最高學歷</th>
                <td rowspan="2" colspan="2" style="font-size:12px;">
                    大學
                </td>
                <td><strong>身高：</strong>165 cm</td>
                <td rowspan="2" colspan="3"><strong>興趣：</strong></td>
                <td rowspan="8" colspan="3" style="text-align:center;width:140px;">

                </td>
            </tr>
            <tr>
                <td><strong>體重：</strong>65 kg</td>
            </tr>
            <tr>
                <th scope="row">服務單位</th>
                <td colspan=2></td>
                <td colspan=3>職務&nbsp;&nbsp;司機</td>
                <td>年資&nbsp;&nbsp;0</td>
            </tr>
            <tr>
                <th scope="row">經濟狀況</th>
                <td colspan="3"><strong>年收入：</strong> <input type="checkbox">車 <input type="checkbox">房</td>
                <td colspan="3">電子郵件&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <th scope="row">戶籍地</th>
                <td colspan="6">
                    <strong>區域：</strong>
                    <strong>地址：</strong>
                </td>
            </tr>
            <tr>
                <th scope="row">居住地</th>
                <td colspan="6">
                    <strong>區域：</strong>台中市
                    <strong>地址：</strong>龍井區
                </td>
            </tr>
            <tr>
                <th scope="row" rowspan="2">電話</th>
                <td colspan="3"><strong>手機：</strong>0975772688</td>
                <td colspan="3"><strong>手機：</strong></td>
            </tr>
            <tr>
                <td colspan="3"><strong>住家：</strong></td>
                <td colspan="3"><strong>公司：</strong></td>
            </tr>
            <tr>
                <th scope="row">ID</th>
                <td colspan="9">
                    <input type="checkbox">相片
                    <input type="checkbox">茶券
                    <input type="checkbox">生活照
                    <input type="checkbox">會員卡
                    <input type="checkbox">Match卡
                    &nbsp;&nbsp;Line ID：
                </td>
            </tr>
        </table>
        <!-- 擇友條件 -->
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>本人資料</th>
                    <th>擇友條件</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">婚況</th>
                    <td>
                        未婚
                    </td>
                    <td>
                        未婚
                    </td>
                </tr>
                <tr>
                    <th scope="row">學歷</th>
                    <td>
                        大學
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <th scope="row">宗敎</th>
                    <td>
                        無
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <th scope="row">職業</th>
                    <td>
                        運輸服務業
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <th scope="row">個性</th>
                    <td>
                        隨和
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <th scope="row">經濟</th>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <p>
                            <strong>其他備註說明：</strong>
                        </p>
                        <p>
                            <strong>方便聯繫時間：</strong><input type="radio">星期一<input type="radio">星期二<input type="radio">星期三<input type="radio">星期四<input type="radio">星期五<input type="radio">星期六<input type="radio">星期日<input type="radio">上午<input type="radio">下午<input type="radio" checked>不拘
                            <br>
                            <strong>可以排約時間：</strong><input type="radio">星期一<input type="radio">星期二<input type="radio">星期三<input type="radio">星期四<input type="radio">星期五<input type="radio">星期六<input type="radio">星期日<input type="radio">上午<input type="radio">下午<input type="radio" checked>不拘
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h4>魅力處方箋01 打造單身魅力-心約會</h4>
                        <p>
                            <strong>調製配方：</strong>
                            <input type="radio">戀愛講堂<input type="radio">魅力有約<input type="radio">品味生活<input type="radio">互動美學
                        </p>
                        <h4>魅力處方箋02 輕鬆交友找樂趣-趣約會、饗約會</h4>
                        <p>
                            <strong>調製配方：</strong>
                            <input type="radio">輕旅行<input type="radio">主題特別企劃<input type="radio">主題精緻餐會<input type="radio">美味廚房<input type="radio">健康料理<input type="radio">國外旅遊
                        </p>
                        <h4>魅力處方箋03 精準約會-愛約會、揪約會</h4>
                        <p>
                            <strong>調製配方：</strong>
                            <input type="radio">一對一排約<input type="radio">多平台排約<input type="radio">多對多約會<input type="radio">主題式約會<input type="radio">下午茶約會
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- 顧問填寫 -->
        <table>
            <tr>
                <th rowspan="3" style="text-align: center;">本<br>欄<br>由<br>顧<br>問<br>填<br>寫</th>
                <td colspan="2">
                    <p>
                        <strong>查驗記錄：</strong>
                        <input type="checkbox">身分證
                        <input type="checkbox">名片
                        <input type="checkbox">學歷證件：<span class="underline" style="width: 10%;"></span>
                        <input type="checkbox">其它：<span class="underline" style="width: 30%;"></span>
                    </p>
                    <p>
                        <strong>家庭狀況：</strong>
                        父：<span class="space" style="width: 5%;"></span>
                        母：<span class="space" style="width: 5%;"></span>
                        兄：<span class="space" style="width: 5%;"></span>
                        弟：<span class="space" style="width: 5%;"></span>
                        姐：<span class="space" style="width: 5%;"></span>
                        妹：<span class="space" style="width: 5%;"></span>
                        （二春：小孩<span class="space" style="width: 5%;"></span>）
                    </p>
                    <p>
                        <strong>國外旅遊聯誼可能時間：</strong><span class="underline" style="width: 5%;"></span>年 <span class="underline" style="width: 5%;"></span>月
                        <strong>最想去的地點：</strong><span class="underline" style="width: 35%;"></span>
                    </p>
                    <p>
                        <strong>專屬愛情顧問：</strong><input type="checkbox">預約時間：<span class="underline" style="width: 20%;"></span> <span class="underline" style="width: 20%;"></span> <span class="underline" style="width: 20%;"></span>
                    </p>
                </td>
            </tr>

            <tr>
                <td>外：</td>
                <td width=50%>約見顧問：台南 - 吳琪雅</td>
            </tr>
            <tr>
                <td>內：</td>
                <td>受理顧問：台中 - 彭春福</td>
            </tr>
            <tr>
                <td colspan="2">注意事項：</td>
                <td>服務顧問：陳素娟</td>
            </tr>
        </table>
        <div style="text-align: center; margin-top: 10px;">
            <input type="checkbox">交接登記
            <input type="checkbox">管理系統
            填表日期：<span class="space" style="width: 5%;"></span>年<span class="space" style="width: 5%;"></span>月<span class="space" style="width: 5%;"></span>日　來源：<span class="space" style="width: 5%;"></span>
        </div>
    </div>

    <!-- 第二頁 -->
    <div class="wrap">

        <h1>春天會館服務紀錄表</h1>
        <table>
            <tr>
                <td>
                    <p style="margin-top: 15px;">
                        本人<span class="underline" style="width: 20%;"></span>熟知「會員約會須知」並樂意與其他會員共同遵守以利兩便並無異議。
                    </p>
                    <p>
                        本人<span class="underline" style="width: 20%;"></span><input type="checkbox">同意 <input type="checkbox">不同意跨平台系統主動邀請或速配約會經過認證會員的排約。
                    </p>
                    <p style="text-align: center; margin-top: 15px;">
                        會員：<span class="space" style="width: 10%;"></span>(簽章)<span class="space" style="width: 5%;"></span>年<span class="space" style="width: 5%;"></span>月<span class="space" style="width: 5%;"></span>日
                    </p>
                </td>
            </tr>
        </table>
        <table class="blankbox">
            <thead>
                <th style="width: 5%;">次數</th>
                <th style="width: 15%;">月 日</th>
                <th>年次</th>
                <th>學歷</th>
                <th style="width: 15%;">姓名</th>
                <th style="width: 5%;">次數</th>
                <th style="width: 15%;">月 日</th>
                <th>年次</th>
                <th>學歷</th>
                <th style="width: 15%;">姓名</th>
            </thead>
            <tbody>

                <tr>
                    <th scope="row">01</th>
                    <td>110/9/8</td>
                    <td>77</td>
                    <td>大學</td>
                    <td>傅琪庭</td>
                    <th scope="row">21</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">02</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row">22</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">03</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row">23</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">04</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row">24</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">05</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row">25</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">06</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row">26</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">07</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row">27</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">08</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row">28</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">09</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row">29</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">10</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row">30</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">11</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row">31</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">12</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row">32</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">13</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row">33</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">14</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row">34</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">15</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row">35</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">16</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row">36</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">17</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row">37</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">18</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row">38</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">19</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row">39</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">20</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th scope="row">40</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row" rowspan="2">請<br>顧<br>問<br>填<br>寫</th>
                    <td colspan="9">
                        <h4>五種表達愛的語言，請依重要性1-5（1為最重要2為次要）依序填寫。</h4>
                        <p>
                            <input type="checkbox">肯定的言詞
                            <input type="checkbox">精心的時刻
                            <input type="checkbox">接受禮物
                            <input type="checkbox">服務的行動
                            <input type="checkbox">身體的接觸
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="9">
                        <h4>兩性魅力特質，請依測評結果打勾。</h4>
                        <p>
                            <input type="checkbox">老虎：勇敢/挑戰/積極
                            <input type="checkbox">海豚：熱情/分享/樂觀
                            <input type="checkbox">企鵝：耐心/和諧/合作<br>
                            <input type="checkbox">蜜蜂：品質/程序/分工
                            <input type="checkbox">八爪魚：整合/周延/彈性
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>