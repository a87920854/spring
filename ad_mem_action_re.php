<?php
require("./include/_top.php");
require("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li><a href="ad_mem_action_re_list.php">活動明細表</a></li>
            <li class="active">新增活動明細</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>新增活動明細</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                　 <p><input type="text" name="qkword" id="qkword" class="form-control2"> <input type="button" id="member_query_button" class="btn btn-danger" value="查詢會員"></p>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <form action="ad_mem_action_re.php" method="post">
                            <tr>
                                <td colspan="2" bgcolor="#F0F0F0">報名日期：
                                    <!--
              <select name="y1" id="y1" style="width:80px;">
              <option value="2020">2020</option>
			  <option value="2021" selected>2021</option>
			  <option value="2022">2022</option>
              </select>
              年 
              <select name="m1" id="m1" style="width:80px;">
			  <option value="9" selected>9</option>
				<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
              </select>
              月 
              <select name="d1" id="d1" style="width:80px;">
			  <option value="14" selected>14</option>
				<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
              </select>
              日-->
                                    2021/9/14
                                </td>
                            </tr>
                            <!--          <tr bgcolor="#F0F0F0"> 
            <td colspan="2" bgcolor="#F0F0F0"> 
              活動日期：
              <select name="y2" id="y2" style="width:80px;">
              <option value="2019">2019</option>
              <option value="2020">2020</option>
			  <option value="2021" selected>2021</option>
			  <option value="2022">2022</option>
              </select>
              年 
              <select name="m2" id="select2" style="width:80px;">
			  <option value="9" selected>9</option>
				<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
              </select>
              月 
              <select name="d2" id="select3" style="width:80px;">
			  <option value="14" selected>14</option>
				<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
              </select>
              日</td>
          </tr>-->
                            <tr bgcolor="#F0F0F0">
                                <td>活動標題：
                                    <select name="acre_num" style="width:80%;" onchange="this.options[this.selectedIndex].value && (window.location = '?acre_num='+this.options[this.selectedIndex].value);" required>
                                        <option value="">請選擇</option>
                                        <option value="13130">八德 - 2021/9/25 下午 07:00:00 - 掌握5招，讓你輕鬆聊天約會</option>
                                        <option value="" disabled>八德 - 2021/9/25 下午 02:30:00 - (取消) 香氣生命靈數_找出自己數字力量</option>
                                        <option value="13142">八德 - 2021/9/10 下午 07:30:00 - 脫單首部曲打造我的完美情人</option>
                                        <option value="13146">八德 - 2021/8/28 下午 02:00:00 - 3個約會表達技巧讓你擺脫單身</option>
                                        <option value="13140">八德 - 2021/8/13 下午 07:00:00 - 脫單二部曲讓自己變成有特色情人</option>
                                        <option value="13131">八德 - 2021/8/6 下午 07:00:00 - 這樣穿讓你約會第一印象滿分</option>
                                        <option value="13135">台中 - 2021/10/3 下午 03:00:00 - 這樣穿讓你約會第一印象滿分</option>
                                        <option value="13134">台中 - 2021/10/3 下午 01:00:00 - 這樣穿讓你約會第一印象滿分</option>
                                        <option value="" disabled>台中 - 2021/9/17 下午 07:00:00 - (取消) 讓演員教你說！表達實戰訓練六</option>
                                        <option value="12923">台中 - 2021/9/10 下午 07:00:00 - 課程社群這樣玩好人緣快來</option>
                                        <option value="13126">台中 - 2021/9/5 下午 02:00:00 - 3個約會表達技巧讓你擺脫單身</option>
                                        <option value="13104">台中 - 2021/9/3 下午 07:00:00 - 讓演員教你說！表達實戰訓練五</option>
                                        <option value="12922">台中 - 2021/8/27 下午 07:00:00 - 課程紳士保養計畫</option>
                                        <option value="13103">台中 - 2021/8/20 下午 07:00:00 - 讓演員教你說！表達實戰訓練四</option>
                                        <option value="12921">台中 - 2021/8/13 下午 07:00:00 - 課程聯誼避雷針</option>
                                        <option value="13102">台中 - 2021/8/6 下午 07:00:00 - 讓演員教你說！表達實戰訓練三</option>
                                        <option value="12920">台中 - 2021/7/30 下午 07:00:00 - 課程聊天溝通溫度製造法</option>
                                        <option value="12878">台中 - 2021/7/25 下午 02:00:00 - 海龜大補湯</option>
                                        <option value="13101">台中 - 2021/7/23 下午 07:00:00 - 讓演員教你說！表達實戰訓練二</option>
                                        <option value="12919">台中 - 2021/7/16 下午 07:00:00 - 課程輕鬆聊又不尬的心法</option>
                                        <option value="13100">台中 - 2021/7/9 下午 07:00:00 - 讓演員教你說！表達實戰訓練一</option>
                                        <option value="12918">台中 - 2021/7/2 下午 07:00:00 - 線上社群媒體這樣玩～</option>
                                        <option value="12774">台中 - 2021/6/26 下午 07:00:00 - 線上講堂紳士基礎保養</option>
                                        <option value="12773">台中 - 2021/6/19 下午 07:00:00 - 線上聊天小幫手別當聯誼雷包</option>
                                        <option value="12765">台中 - 2021/6/12 下午 07:00:00 - 線上聊天小幫手文字溫度及聊天</option>
                                        <option value="12757">台中 - 2021/6/5 下午 07:00:00 - 掰掰尷尬癌！尷尬解除術！</option>
                                        <option value="13138">台北 - 2021/10/2 下午 02:00:00 - 3招自我介紹教你化解尷尬</option>
                                        <option value="13043">台北 - 2021/9/28 下午 07:00:00 - 逆境重生，少年傷疤血淚史</option>
                                        <option value="13144">台北 - 2021/9/25 下午 02:00:00 - 脫單三部曲讓你對我一見鍾情</option>
                                        <option value="13042">台北 - 2021/9/21 下午 07:00:00 - 文青之路不遙遠，聽團文化最前線</option>
                                        <option value="13041">台北 - 2021/9/14 下午 07:00:00 - 質感宅生活，高價值男女養成</option>
                                        <option value="13121">台北 - 2021/9/12 下午 05:00:00 - 超實用四季色彩學穿出好人緣</option>
                                        <option value="13137">台北 - 2021/9/12 下午 02:00:00 - 3招自我介紹教你化解尷尬</option>
                                        <option value="13133">台北 - 2021/9/11 下午 02:00:00 - 這樣穿讓你約會第一印象滿分</option>
                                        <option value="13038">台北 - 2021/9/7 下午 07:00:00 - 每月藝文分享，好書好劇好音樂</option>
                                        <option value="13037">台北 - 2021/8/31 下午 07:00:00 - 正妹來作客，論安全感的重要性</option>
                                        <option value="13035">台北 - 2021/8/24 下午 07:00:00 - 逆境重生，少年傷疤血淚史</option>
                                        <option value="13034">台北 - 2021/8/17 下午 07:00:00 - 文青之路不遙遠，聽團文化最前線</option>
                                        <option value="13136">台北 - 2021/8/15 下午 02:00:00 - 3招自我介紹教你化解尷尬</option>
                                        <option value="13031">台北 - 2021/8/10 下午 07:00:00 - 質感宅生活，高價值男女養成</option>
                                        <option value="13029">台北 - 2021/8/3 下午 07:00:00 - 每月一文分享，好書好劇好音樂</option>
                                        <option value="" disabled>台北 - 2021/7/31 下午 07:00:00 - (取消) 3個約會表達技巧讓你擺脫單身</option>
                                        <option value="13028">台北 - 2021/7/27 下午 07:00:00 - 正妹來作客，論包容的重要性</option>
                                        <option value="13024">台北 - 2021/7/20 下午 07:00:00 - 逆境重生，少年傷疤血淚史</option>
                                        <option value="13023">台北 - 2021/7/13 下午 07:00:00 - 文青之路不遙遠，聽團文化最前線</option>
                                        <option value="13022">台北 - 2021/7/6 下午 07:00:00 - 質感宅生活，高價值男女養成</option>
                                        <option value="12812">台北 - 2021/6/29 下午 07:00:00 - 每月藝文分享，好書好劇好音樂</option>
                                        <option value="" disabled>台北 - 2021/6/27 下午 02:00:00 - (取消) 空中聊天室，全省企劃大集合</option>
                                        <option value="12805">台北 - 2021/6/22 下午 07:00:00 - 正妹來作客，論觀察的重要性</option>
                                        <option value="" disabled>台北 - 2021/6/20 下午 02:00:00 - (取消) 空中聊天室全省企劃大集合</option>
                                        <option value="12795">台北 - 2021/6/15 下午 07:00:00 - 文青之路不遙遠 聽團文化最前線</option>
                                        <option value="12794">台北 - 2021/6/13 下午 02:00:00 - 空中聊天室全省企劃大集合</option>
                                        <option value="12786">台北 - 2021/6/8 下午 07:00:00 - 煥然一新，時尚穿搭分享</option>
                                        <option value="12763">台北 - 2021/6/6 下午 02:00:00 - 全省空中聊天室</option>
                                        <option value="12762">台北 - 2021/6/5 下午 02:00:00 - 沒有約不到的人，超實用網聊講座</option>
                                        <option value="12761">台北 - 2021/6/1 下午 07:00:00 - 企劃線上課程Ethan</option>
                                        <option value="12949">台南 - 2021/9/23 下午 07:00:00 - 月老請問今年是否可脫單</option>
                                        <option value="12947">台南 - 2021/9/9 下午 07:00:00 - 自我檢視有沒有感情細胞</option>
                                        <option value="12946">台南 - 2021/9/2 下午 07:00:00 - 不懂愛情就跟著春天走</option>
                                        <option value="13132">台南 - 2021/8/29 下午 02:00:00 - 這樣穿讓你約會第一印象滿分</option>
                                        <option value="12945">台南 - 2021/8/26 下午 07:00:00 - 愛情小紅帽VS感情大野狼</option>
                                        <option value="12944">台南 - 2021/8/19 下午 07:00:00 - 太陽賜給我愛情的神話</option>
                                        <option value="12943">台南 - 2021/8/12 下午 07:00:00 - 從桌遊學到愛情的真心話</option>
                                        <option value="12942">台南 - 2021/8/5 下午 07:00:00 - 您是哪一種愛情動物</option>
                                        <option value="12941">台南 - 2021/7/29 下午 07:00:00 - 愛情起跑黃金5分鐘聊天術</option>
                                        <option value="12940">台南 - 2021/7/22 下午 07:00:00 - 嘴甜人甜成就姻緣</option>
                                        <option value="12939">台南 - 2021/7/15 下午 07:00:00 - 從圖卡學會幽默風趣</option>
                                        <option value="12938">台南 - 2021/7/8 下午 07:00:00 - 愛情從體驗人生開始</option>
                                        <option value="12937">台南 - 2021/7/1 下午 07:00:00 - 戀愛通關密語352</option>
                                        <option value="12802">台南 - 2021/6/27 下午 02:00:00 - 空中聊天室</option>
                                        <option value="12791">台南 - 2021/6/24 下午 07:00:00 - 談情說愛小訓練</option>
                                        <option value="" disabled>台南 - 2021/6/20 下午 02:00:00 - (取消) 空中聊天室</option>
                                        <option value="12783">台南 - 2021/6/17 下午 07:00:00 - 讓愛情順利的行事曆</option>
                                        <option value="13147">約專 - 2021/8/28 下午 07:00:00 - 掌握5招，讓你輕鬆聊天約會</option>
                                        <option value="" disabled>約專 - 2021/8/21 下午 02:30:00 - (取消) 【線上】精油抓周_探索自我情緒</option>
                                        <option value="" disabled>約專 - 2021/8/15 下午 08:00:00 - (取消) 夏日專屬色穿出陽光活力！</option>
                                        <option value="" disabled>約專 - 2021/7/31 下午 02:00:00 - (取消) 香氣生命靈數_找出屬於自己的數</option>
                                        <option value="" disabled>約專 - 2021/7/18 下午 08:00:00 - (取消) 【線上課程】修飾身材的穿搭秘密</option>
                                        <option value="13099">桃園 - 2021/9/29 下午 07:00:00 - 用木桶理論學習吸引技巧</option>
                                        <option value="13098">桃園 - 2021/9/22 下午 07:00:00 - 網路交友全面分析</option>
                                        <option value="13097">桃園 - 2021/9/15 下午 07:00:00 - 是喜歡還是愛《感情的幾種層次》</option>
                                        <option value="13141">桃園 - 2021/9/14 下午 07:00:00 - 脫單二部曲讓自己變成有特色情人</option>
                                        <option value="13096">桃園 - 2021/9/8 下午 07:00:00 - 教你分析《戀愛的幾種階段》</option>
                                        <option value="13095">桃園 - 2021/9/1 下午 07:00:00 - 總是被拒絕《約會的邀約技巧》</option>
                                        <option value="13143">桃園 - 2021/8/27 下午 07:00:00 - 脫單三部曲讓你對我一見鍾情</option>
                                        <option value="13094">桃園 - 2021/8/25 下午 07:00:00 - 網路交友全面分析</option>
                                        <option value="13129">桃園 - 2021/8/21 下午 02:00:00 - 掌握5招，讓你輕鬆聊天約會</option>
                                        <option value="13125">桃園 - 2021/8/18 下午 07:00:00 - 3個約會表達技巧讓你擺脫單身</option>
                                        <option value="13093">桃園 - 2021/8/18 下午 07:00:00 - 是喜歡還是愛《感情的幾種層次》</option>
                                        <option value="13092">桃園 - 2021/8/11 下午 07:00:00 - 教你分析《戀愛的幾種階段》</option>
                                        <option value="13119">桃園 - 2021/8/7 下午 02:00:00 - 脫單首部曲打造我的完美情人</option>
                                        <option value="13091">桃園 - 2021/8/4 下午 07:00:00 - 總是被拒絕《約會的邀約技巧》</option>
                                        <option value="" disabled>桃園 - 2021/8/1 下午 02:00:00 - (取消) 掌握5招，讓你輕鬆約會</option>
                                        <option value="13090">桃園 - 2021/7/28 下午 07:00:00 - 用木桶理論學習吸引技巧</option>
                                        <option value="12986">桃園 - 2021/7/24 下午 02:30:00 - 學會判斷本質挑選好對象</option>
                                        <option value="13089">桃園 - 2021/7/21 下午 07:00:00 - 是喜歡還是愛《感情的幾種層次》</option>
                                        <option value="13088">桃園 - 2021/7/14 下午 07:00:00 - 教你分析《戀愛的幾種階段》</option>
                                        <option value="13087">桃園 - 2021/7/7 下午 07:00:00 - 總是被拒絕《約會的邀約技巧》</option>
                                        <option value="12828">桃園 - 2021/6/30 下午 07:00:00 - 如何挽回失去的情感</option>
                                        <option value="" disabled>桃園 - 2021/6/27 下午 02:00:00 - (取消) 線上閒聊全省空中聊天室</option>
                                        <option value="12822">桃園 - 2021/6/23 下午 07:00:00 - 網路交友全面分析​</option>
                                        <option value="" disabled>桃園 - 2021/6/20 下午 02:00:00 - (取消) 線上閒聊全省空中聊天室</option>
                                        <option value="12816">桃園 - 2021/6/16 下午 07:00:00 - 毒品般的《曖昧心法》</option>
                                        <option value="12977">高雄 - 2021/9/27 下午 07:00:00 - 微表情洞悉對方的狀態下高雄</option>
                                        <option value="13139">高雄 - 2021/9/26 下午 02:00:00 - 名人有約突破心防的情場識人術</option>
                                        <option value="12976">高雄 - 2021/9/20 下午 07:00:00 - 微表情洞悉對方的狀態上高雄</option>
                                        <option value="12975">高雄 - 2021/9/13 下午 07:00:00 - Line互動技巧教學下高雄</option>
                                        <option value="12974">高雄 - 2021/9/6 下午 07:00:00 - Line互動技巧教學上高</option>
                                        <option value="12972">高雄 - 2021/8/30 下午 07:00:00 - 曖昧互動技巧教學下高雄</option>
                                        <option value="12970">高雄 - 2021/8/23 下午 07:00:00 - 曖昧互動技巧教學上高雄</option>
                                        <option value="12969">高雄 - 2021/8/16 下午 07:00:00 - 讓對方不能拒絕的邀約技巧高雄</option>
                                        <option value="12951">高雄 - 2021/8/14 下午 06:00:00 - 七夕情人節晚餐約會全省</option>
                                        <option value="12967">高雄 - 2021/8/9 下午 07:00:00 - 聊天問答技巧撇步公開高雄</option>
                                        <option value="12914">高雄 - 2021/8/8 下午 02:30:00 - 密室逃脫線上玩2</option>
                                        <option value="12965">高雄 - 2021/8/2 下午 07:00:00 - 表現自己之回答內容設計高雄</option>
                                        <option value="12964">高雄 - 2021/7/26 下午 07:00:00 - 自我介紹技巧教學下高雄</option>
                                        <option value="12962">高雄 - 2021/7/19 下午 07:00:00 - 自我介紹技巧教學上高雄</option>
                                        <option value="12961">高雄 - 2021/7/12 下午 07:00:00 - 了解異性之問題內容設計高雄</option>
                                        <option value="12957">高雄 - 2021/7/5 下午 07:00:00 - 問問題跟提問技巧教學高雄</option>
                                        <option value="12832">高雄 - 2021/6/28 下午 07:00:00 - 擇偶條件的設定上</option>
                                        <option value="12831">高雄 - 2021/6/21 下午 07:00:00 - 擇偶條件的篩選技巧教學與說明</option>
                                        <option value="12830">高雄 - 2021/6/14 下午 07:00:00 - 別讓刻板印象誤導了自己的決定</option>
                                        <option value="12837">新竹 - 2021/6/25 下午 07:00:00 - 愛情心理測驗大解析</option>
                                        <option value="12871">新竹 - 2021/6/20 下午 02:00:00 - 空中聊天室</option>
                                        <option value="12836">新竹 - 2021/6/18 下午 07:00:00 - 追劇學愛情</option>
                                    </select>
                                </td>

                            <tr>
                                <td colspan="2" align="left">
                                    <input type="hidden" name="st" value="next">
                                    <input name="Submit" type="submit" id="Submit2" value="讀取" class="btn btn-info">
                                </td>
                            </tr>

                            </tbody>
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
require("./include/_bottom.php");
?>

<script language="JavaScript">
    <!--
    $(function() {
        $("#pay1").on("change", function() {
            personnel_get("pay1", "pay2");
        });
        $("#member_query_button").on("click", function() {
            if (!$("#qkword").val()) {
                alert("請輸入要查詢的會員相關資料，如姓名、電話等。");
                $("#qkword").focus();
                return false;
            }
            Mars_popup('ad_mem_love_re_list.php?st=query_member&qkword=' + $("#qkword").val(), '', 'width=500,height=250,top=250,left=250');
        });
    });

    function chk_form() {
        if (!$("#acre_user").val()) {
            alert("請輸入身分證字號。");
            $("#acre_user").focus();
            return false;
        }
        if (!$("#acre_pay2").val()) {
            alert("請輸入收費金額。");
            $("#acre_pay2").focus();
            return false;
        }
        var reg = /^[-+]?\d+$/;
        if (!reg.test($("#acre_pay2").val())) {
            alert("收費金額請輸入數字。");
            $("#acre_pay2").val("");
            $("#acre_pay2").focus();

            return false;
        }

        if (!$("#pay1").val()) {
            alert("請選擇受理會館。");
            $("#pay1").focus();
            return false;
        }
        if (!$("#pay2").val()) {
            alert("請選擇受理秘書。");
            $("#pay2").focus();
            return false;
        }
        return true;
    }
    -->
</script>