<?php
require_once("./include/_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">同仁意見反映</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>同仁意見反映　 - 數量：389</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                <form id="searchform" action="ad_system_report.php" method="post" target="_self" class="form-inline">
                    <a class="btn btn-info" href="#system_report" data-toggle="modal" data-target="#system_report">提出意見</a>
                    <input id="keyword" name="keyword" id="keyword" class="form-control" type="text" placeholder="搜尋內容" value="">
                    <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                </form>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th width=80>類型</th>
                            <th width=100>會館</th>
                            <th width=80>秘書</th>
                            <th>內容</th>
                            <th width=120>時間</th>
                            <th width=60>狀態</th>
                            <th>處理結果</th>
                        </tr>

                        <tr>
                            <td class="center">其他</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">五倍卷是否財務部與業務部有確定可興方案之公告--便於因應(推廣有利方案)助業績及經濟成長</td>
                            <td class="center">2021-08-30 17:07</td>
                            <td class="center">處理中<a class="btn btn-warning btn-xs" href="#system_report2" onclick="system_report2_show('438')">提出補充</a></td>
                            <td class="center">[2021-08-30 19:23]:進行中！各區亦可以提出建議&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">https://www.singleparty.com.tw/preferences.php<br>偏好設定<br>我能約會的地點 (主要)<br><br>台北會館 中正區重慶南路一段49號8樓<br>八德會館 松山區八德路二段358號6樓之1<br>桃園會館 復興路205號18樓之3<br>新竹會館 新竹市北區北大路307號14F之1<br>台中會館 台灣大道2段307號11樓之1<br>台南會館 成功路515號8樓<br>高雄會館 中山二路507號5樓<br><br><br>能否直接設定為所加入的主會館....?? 不讓客人修改</td>
                            <td class="center">2021-08-28 20:04</td>
                            <td class="center">處理中<a class="btn btn-warning btn-xs" href="#system_report2" onclick="system_report2_show('437')">提出補充</a></td>
                            <td class="center">[2021-08-30 19:22]:當時是為了配合會員可以約的會館，請小娟和欣怡討論一下。&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">台中</td>
                            <td class="center">陳素娟</td>
                            <td class="center">您好：請問，會員管理系統在做程式更新嗎？<br>點會員，進入只有排約頁面，修改資料，其他皆無，無服務紀錄可以查詢，紙本資料無欄位，排約部查不到會員排約資料，好尷尬呀！</td>
                            <td class="center">2021-08-17 16:13</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-08-18 13:36]:再試一次&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">服務</td>
                            <td class="center">台中</td>
                            <td class="center">威威</td>
                            <td class="center">會員 王詠柔 72年次 N123838068<br>向秘書提出要撤掉約會專家上的大頭貼<br></td>
                            <td class="center">2021-08-09 13:25</td>
                            <td class="center">已處理</td>
                            <td class="center"></td>
                        </tr>

                        <tr>
                            <td class="center">服務</td>
                            <td class="center">台北</td>
                            <td class="center">陳紅</td>
                            <td class="center">會員啟用一對一諮詢後.會館秘書和排約部 希望能從老師那ㄦ˙了解諮詢內容 和 老師的 建議. 以便作為陸續輔導會員的 參考.<br> * 是否能得到老師的 回饋建議和 會員課後問卷<br>謝謝老師 謝謝行銷部 辛苦了 <br>
                                <font color=blue>[2021-08-18 13:54] 補充：<br></font><br>諮詢回饋表會反映在會員個人服務紀錄嗎 ?
                            </td>
                            <td class="center">2021-08-08 17:16</td>
                            <td class="center">處理中<a class="btn btn-warning btn-xs" href="#system_report2" onclick="system_report2_show('434')">提出補充</a></td>
                            <td class="center">[2021-08-09 14:04]:建立一個諮詢回饋表給會員及如同病歷一般給老師一個服務記錄表，方便會館主管及同仁可以了解會員授課或諮詢情況。<br>&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">服務</td>
                            <td class="center">台北</td>
                            <td class="center">陳紅</td>
                            <td class="center">約會專家上的 會員資料.其婚況 若是曾有過婚姻.是否能明白紀載: **再次單身**<br>讓會員上網搜尋對象資料.也能清楚了解對方婚況.避免抱怨.<br>謝謝</td>
                            <td class="center">2021-08-08 14:23</td>
                            <td class="center">處理中<a class="btn btn-warning btn-xs" href="#system_report2" onclick="system_report2_show('433')">提出補充</a></td>
                            <td class="center">[2021-08-09 14:04]:請行銷部一併考量&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">約專<br>會員張景棋問的<br>有一楊先生<br>男生<br>？<br>可能是設定的簡訊罐頭<br>但先生問他這樣怪怪的是否修正</td>
                            <td class="center">2021-08-04 21:02</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-08-05 10:22]:對方暱稱取名有問題&nbsp;by 澔翰</td>
                        </tr>

                        <tr>
                            <td class="center">其他</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">官網-<br>有無機會連結各區大百貨公司<br>至少有信用卡----<br>有卡就有機會成交<br><br>因疫情---沒錢---若有廣告或連結有機會是有信用卡訪客增加----各區可能有機會高卡-付清率增加</td>
                            <td class="center">2021-07-27 12:27</td>
                            <td class="center">處理中<a class="btn btn-warning btn-xs" href="#system_report2" onclick="system_report2_show('431')">提出補充</a></td>
                            <td class="center">[2021-07-27 14:49]:請欣怡和夏副總了解方向&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">其他</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">https://www.datemenow.com.tw/register-upload<br>可以加上框框 讓人家對準上傳嗎.....<br>直接上傳檔案..都傳歪~~例如他..... <br>https://www.aparty.com.tw/ad_mem_detail.php?mem_num=2069383<br></td>
                            <td class="center">2021-07-25 18:28</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-07-27 14:50]:請小娟了解&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">蔡佩蓁 Sunny</td>
                            <td class="center">7/22日舉例婉儀22/33是他的昨天處理情形...我希望預約聯絡要進22的通數中.因為預約聯絡是有處理的名單..這樣主管才能有效知道員工處理情形 </td>
                            <td class="center">2021-07-25 15:22</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-07-27 14:50]:請小娟了解&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">有line小娟圖示<br>1.調整約見紀錄表回報框框 <br>2.會員管理-照片點選無法呈現</td>
                            <td class="center">2021-07-23 21:03</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-07-26 11:26]:1.fix<br>2.無法顯示照片的會員編號是?&nbsp;by 澔翰</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">未回饋排約表 (沒出現近期排約的)<br></td>
                            <td class="center">2021-07-21 19:45</td>
                            <td class="center">已處理</td>
                            <td class="center"></td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">會員-蘇暄展<br>R123302495<br>0909519774<br>跟秘書反應-約會專家這個軟體都會跳掉----用很多次都跳掉</td>
                            <td class="center">2021-07-14 22:50</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-07-15 14:40]:請行銷了解&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">會員管理→功能→擇友條件-婚況：未婚/離婚/離婚沒小孩/離婚有小孩喪偶/已婚/不拘<br><br>目前搜尋結果為 0</td>
                            <td class="center">2021-07-13 14:40</td>
                            <td class="center">已處理</td>
                            <td class="center"></td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">蔡佩蓁 Sunny</td>
                            <td class="center">為何每次工作日誌跟每天回報不同筆數這樣主管很難去了解員工今日工作狀況非常無法參考</td>
                            <td class="center">2021-07-12 16:25</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-07-12 17:16]:系統紀錄不在回報筆數計算內&nbsp;by 澔翰<br>[2021-07-12 17:22]:增加包含系統紀錄之統計數字<br>&nbsp;by 澔翰</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">1.排約部系統 →選項少(離婚有小孩)<br>2.https://www.aparty.com.tw/ad_mem_f.php<br>會員管理→功能→擇友條件-婚況： 目前僅有 不拘/未婚/二春 <br>(請修改能複選並增加選項：未婚/離婚/離婚沒小孩/離婚有小孩喪偶/已婚/不拘</td>
                            <td class="center">2021-07-11 17:56</td>
                            <td class="center">已處理</td>
                            <td class="center"></td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">增加<br>1.基本資料→年收：_____萬元<br>(有人會key 600000，60。)<br>2.年資：___年__月 (或增加 '年' )<br>3 諮詢卡http://520940.tw/增加擇友條件___年次~__年次<br></td>
                            <td class="center">2021-07-11 14:43</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-07-12 14:34]:請小娟協助了解後更改&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">台北</td>
                            <td class="center">Ethan</td>
                            <td class="center">企劃key活動明細時，若結帳前要修改，手續繁雜，可以至少開個三天嗎？</td>
                            <td class="center">2021-07-06 17:08</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-07-12 14:35]:先暫時維持現況結帳&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">其他</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">美滿人生企業集團--單身平台<br>春天會館/約會專家/DATE ME NOW/迷你約/好好玩<br>有無完整/簡單/簡介/全省統一說詞/彼此邀約/訪談/成交/入會<br>訪客/會員/減少疑慮/憂心/簡介/影片可-----可以宣導秘書共同方向/<br>亦可讓訪客理解<br>入會安心<br>減少疑慮</td>
                            <td class="center">2021-06-30 10:41</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-06-30 14:36]:請各主管和同仁說明針對目前各品牌邀約到春天會館訪客：不用特別說同一個老闆<br>約會專家 / DATE ME NOW / 迷你約 / 好好玩<br>基本上，不用一起介紹全部品牌，以上都是各自品牌，彼此品牌只是合作會館。春天會館有30多年的歷史，全省最大單身資料庫，共六個會館，所以很多單身品牌分點不多，都會和春天會館合作。春天會館是可以跨平台服務各品牌的單身朋友。&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">不知道嘉義.雲林.台南若客人拉選可否系統自發<br>因為上班時間1:30才發有時訪客上班不能說話或錯過最佳邀約期<br>現在客人意願度/很重要/成為疫情下更應把握的客人<br>台南可因應即時<br>不然客人也會上其他網站</td>
                            <td class="center">2021-06-30 10:27</td>
                            <td class="center">處理中<a class="btn btn-warning btn-xs" href="#system_report2" onclick="system_report2_show('419')">提出補充</a></td>
                            <td class="center">[2021-06-30 14:19]:可以參考&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">因為拉入會系統會自發簡訊----約會專家帳號及秘碼通知<br>是否後台拉未完款或有句選不發通知簡訊<br>因為入會要交會員使用系統---但若未完款知帳號/秘碼擔心會員使用沒有仲信核准或降貸其他因素<br>讓我們KEY系統方便作業<br>若未完款不發簡訊</td>
                            <td class="center">2021-06-25 22:57</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-06-26 19:30]:你們建檔把簡訊拉掉<br><br>&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">疫情---LINE排約<br>對於匯款購卷排約進系統<br>月底總結即可<br>還是系統1500購卷/可5次系統拉等同當日是現金非卷<br>日帳會不會比較清楚<br></td>
                            <td class="center">2021-06-22 16:49</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-06-22 18:38]:請依主任指示作帳務，已通知蓉蓉。&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">服務</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">128000全卡<br>請問可以有一對一線上諮詢馬那熊嗎?<br>如果讓秘書線上報名-作業方便清楚<br>行銷(馬那熊有出出比較有名)/服務</td>
                            <td class="center">2021-06-21 10:18</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-06-21 14:11]:請欣怡協助了解和工程師協助處理&nbsp;by 黎總經理<br>[2021-06-21 15:54]:先前已就諮詢預定部分發過相關教學流程公告囉<br>https://www.aparty.com.tw/ad_announce_view.php?id=228<br><br>會員可自己在前台預定，秘書也可瑜系統後台幫忙預訂。這部分公告稍後會再發一次&nbsp;by 欣怡</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">約見紀錄表<br>新增 -提醒/未處理 於受理方顯示，避免遺漏。<br>可如未審核照片那樣 (xx) </td>
                            <td class="center">2021-06-18 16:04</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-06-18 16:30]:請小娟協助了解和工程師說明&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">https://www.aparty.com.tw/ad_report_list.php?topage=2#<br><br>2021-06-17 13:54排約/活動auto已邀約<br>回報紀錄表<br>已邀約的名字變為auto(點入為亂碼)<br></td>
                            <td class="center">2021-06-17 14:29</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-06-17 15:17]:請小娟了解後，和工程師說明如何調整？<br>&nbsp;by 黎總經理<br>[2021-06-17 16:24]:總公司Hannah，下午 03:35<br>小華這邊已經有修正了～&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">台中</td>
                            <td class="center">職代</td>
                            <td class="center">麻煩允許輸入：拉已提醒之後，出現等待到訪，無法再操作下一步，謝謝您！<br>12 視訊 等待到訪 下午 17:00 張小姐 85/大學/./生產製造業行政 台中 - 童芷琳 童芷琳 童芷琳 等待到訪 客人自來電 <br> 台中-職代 >> 閻姐正在談</td>
                            <td class="center">2021-06-16 17:22</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-06-17 10:57]:約見權限修正&nbsp;by 澔翰</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">若視訊---約二次現場<br>系統可否可拉原受理人---擔心忙中出錯(換了受理人)<br>有些擔心被騙無法視訊線上成交<br>若約二次現場---若方便可直接拉受理人比較方便--</td>
                            <td class="center">2021-06-16 15:26</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-06-16 16:24]:這部份應由各區主管約二次現場 （你們可以自己查）畢竟一個動作，有可能當天原本休假？或上次並未正式談<br>各區狀況不同<br><br>&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">行銷</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">現在疫情----<br>有聽訪客/會員說--<br>有一約玩/30分鐘100元<br>不知道我們可否有網站或廣告聯結可以有網站名單進來<br>可能沒有限單身--但可能時間點可以試看看</td>
                            <td class="center">2021-06-15 20:06</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-06-16 15:22]:可以了解&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">排約部系統<br>2007752 吳佩育 女 2021/1/16 餘 275 天 專案 主：0 被：6 共：6 回報(33)<br>最後一次排約：2021/5/16 下午 04:00:00 () <br>這天排約是取消的<br>能否以(成功排約)為天數紀錄</td>
                            <td class="center">2021-06-15 17:27</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-06-15 19:12]:請小娟和工程師協助。&nbsp;by 黎總經理<br>[2021-06-16 11:20]:已修正為成功才紀錄最後排約時間&nbsp;by 澔翰</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">因疫情<br>業務單位<br>業務受理秘書<br>可否增加--可自行回報--訪談受理情況權限<br>因疫情/及業績壓力/訪談受理秘書/視訊訪談情況-----有時完全不告知--當地督導也真的很難回報或傳真受理情況<br>若方便---增加跨區/當地受理秘書可回報受理情況自己可寫</td>
                            <td class="center">2021-06-13 10:58</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-06-13 14:16]:請工程師和行銷討論後協助&nbsp;by 黎總經理<br>[2021-06-13 14:16]:請工程師和行銷討論後協助&nbsp;by 黎總經理<br>[2021-06-15 09:47]:meet&nbsp;by 澔翰<br>[2021-06-15 14:56]:這是督導主管權限，暫不給受理秘書&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">0916623616<br>寄發：八德 - 周靖雯 Bella / 邀約：周靖雯 Bella 受理： [跨區]台南 - 督導　<br>姓名： 江冠德<br>6/12提醒OK<br>但6/13未接-未接-未接---想要在備註處--寫上未接--找人---送出<br>系統會自己呈現訪談中<br>又無法修改<br>可否改前日若提醒OK<br>次次視訊會再提醒連線處增加--未接--勾選</td>
                            <td class="center">2021-06-13 10:55</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-06-13 14:16]:請工程師和行銷討論後協助&nbsp;by 黎總經理<br>[2021-06-15 11:14]:已提醒後的狀態選項新增加未接&nbsp;by 澔翰</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">約見紀錄表　<br>1.針對已改約的訪客..可否連帶內容更新到新日期..<br>例如2021 年 6 月12 日 14:00 Yuri 84/其他/153.47/護士 八德 - 于庭萱 LiLy<br>共三筆名單..下一次改約，就會讓前面的聯絡訊息都不見~都得重KEY<br><br>2.改約後的〈日期時間〉請帶入此客的回報系統內<br> ( 目前僅顯示 改約 ，這樣就不需邀約方再重複到回報中 複製貼上 )<br></td>
                            <td class="center">2021-06-12 14:43</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-06-13 14:16]:請工程師和行銷討論後協助&nbsp;by 黎總經理<br>[2021-06-15 09:47]:schedule&nbsp;by 澔翰</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">若自己約訪<br>若開放自己可回報<br>因視訊<br>秘書不告知<br>有時也太難追問<br>改約或—正談<br>可開放自己約訪自己可拉改約或訪談的權限</td>
                            <td class="center">2021-06-11 22:12</td>
                            <td class="center">不需處理</td>
                            <td class="center">[2021-06-13 14:16]:請工程師和行銷討論後協助&nbsp;by 黎總經理<br>[2021-06-15 09:46]:重複問題&nbsp;by 澔翰</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">會員編號2052524<br>李錦華<br>0929262725<br>女會員排約呈列出來--都會是排自己女會員<br>可能設定問題--<br>男會員則正常</td>
                            <td class="center">2021-06-11 16:27</td>
                            <td class="center">已處理</td>
                            <td class="center"></td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">編號2058742<br>可能設定跑掉<br>是否再檢查看看---系統key55公斤<br>但貴賓諮詢卡---印出來會成169公斤<br>張靜華</td>
                            <td class="center">2021-06-11 16:01</td>
                            <td class="center">已處理</td>
                            <td class="center"></td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">https://www.datemenow.com.tw/register-upload-2<br>補上傳照片與身分證明文件<br>增加 1.上傳學歷 2.財力證明 3.工作證<br>(目前線上諮詢卡內容沒有這幾項。亦可增加上傳區)</td>
                            <td class="center">2021-06-09 20:32</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-06-09 20:47]:請工程師協助&nbsp;by 黎總經理<br>[2021-06-10 13:48]:約專已新增 <br>&nbsp;by 澔翰</td>
                        </tr>

                        <tr>
                            <td class="center">制度</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">5299（線上）18000公告未對疫情專案收費為續約/升卡—-對於業務秘書業績只回來源/或尾款在意也希統一有明確公告依循</td>
                            <td class="center">2021-06-09 08:50</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-06-09 20:48]:請見系統公告&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">財務管理系統/ 日明細表 -增加 當日業績 (總額)</td>
                            <td class="center">2021-06-06 17:26</td>
                            <td class="center">已處理</td>
                            <td class="center"></td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">1.約見紀錄表- 查看約見紀錄(另跳頁面): <br>增加 回報處理情形 (例如:客戶申訴-案件處理 那模式)<br>有時間紀錄/誰留言/聯繫狀況，較好辨識目前聯繫狀態<br>(也一併代入於該客戶內回報訊息)<br><br>2.約見紀錄表：針對已提醒到的客人， (紫色文字)聯絡接待-也繼續秀出來</td>
                            <td class="center">2021-06-05 21:13</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-06-07 16:12]:請和小娟了解再和澔瀚說&nbsp;by 黎總經理<br>[2021-06-08 09:35]:2. fix&nbsp;by 澔翰</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">台中</td>
                            <td class="center">童芷琳</td>
                            <td class="center">未入會資料查詢，輸入電話號碼查詢完成後，前一筆的電話號碼還在查詢欄位中，必須把它delet才能再輸入下一筆號碼，不方便，之前不會如此，最近才變更的，是否可以在查詢完成後，讓欄位回復空白？謝謝</td>
                            <td class="center">2021-06-05 13:45</td>
                            <td class="center">已處理</td>
                            <td class="center"></td>
                        </tr>

                        <tr>
                            <td class="center">其他</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">後台已設定 交往中/沒勾簡訊.MAIL/前台也勾不顯示照片 (但客人反映給素月 今天還收到約專有人留言給你的簡訊) <br>會員手機： 0972375918<br>已通知小娟</td>
                            <td class="center">2021-06-04 13:44</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-06-04 17:03]:請行銷部和工程師再了解&nbsp;by 黎總經理<br>[2021-06-07 10:39]:已修復&nbsp;by 澔翰</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">台北</td>
                            <td class="center">陳紅</td>
                            <td class="center">一: 排約預定表內.收費欄位雖然新增 轉帳 項<br>但當鍵入 轉帳 金額送出後.<br>在完成的 表單上 卻常轉為 茶券 ???<br>二: 當鍵好(轉帳金額)後.若需要修改.此時 (轉帳 ) 不見了 .欄位恢復原來 只能又鍵入 現金<br>麻煩 工程師了 .謝謝喔<br></td>
                            <td class="center">2021-06-03 20:18</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-06-04 09:34]:已修復<br>&nbsp;by 澔翰</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">在 基本資料 頁面 增加：修改資料 <br>(省去多開頁面，方便更新資訊)<br></td>
                            <td class="center">2021-06-02 22:14</td>
                            <td class="center">已處理</td>
                            <td class="center"></td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">約見系統 <br>因常有下錯會館或是(會館/視訊)沒勾選 <br>1.能直接在 約見紀錄表 內 增設-修改嗎?<br>2.當自約自受理時 若勾選 (已提醒) 能讓它不要直接跳 (訪談中)嗎??</td>
                            <td class="center">2021-05-31 19:55</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-06-01 14:20]:請工程師協助&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">後台授權登入時間與回報時間不符<br><br>2021/5/18 下午 09:25:00 八德 周靖雯 秘書 [臨時授權] 61.64.4.198<br><br>回報時間<br>2021-05-18 15:06<br>會員系統 郭凱弘已成交<br>匯20000～尾款18000六月排約付～已開通約專家liu系統～疫情期間可視訊排約 <br>八德周靖雯 Bella<br></td>
                            <td class="center">2021-05-31 17:31</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-05-31 18:11]:請工程師協助（後台登入時間差異問題）<br>約專權限，請小娟協助了解需求。&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">工作日誌 - 工作項目列表 (增加) 搜尋/秘書</td>
                            <td class="center">2021-05-29 19:43</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-05-30 12:10]:請工程師 協助&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">客戶申訴 - 案件資料 (增加) 列印此頁</td>
                            <td class="center">2021-05-29 18:36</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-05-30 12:10]:請工程師協助&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">約見紀錄表 未接/拒絕/條件不符 <br>增設留言方塊 讓受理會館可以寫與客戶的聯絡訊息內容</td>
                            <td class="center">2021-05-29 14:28</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-05-29 15:55]:請小娟協助了解需求，請工程師協助完成。&nbsp;by 黎總經理</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">八德 人員列表 增加 (已解約)<br>
                                <font color=blue>[2021-05-28 15:12] 補充：<br></font>我需要分類名單
                            </td>
                            <td class="center">2021-05-28 14:07</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-05-28 14:22]:解約就轉未入會?&nbsp;by 澔翰</td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">八德 人員列表 增加(會員結婚)<br>
                                <font color=blue>[2021-05-28 15:12] 補充：<br></font>轉入總公司，我方會看不到資訊...
                            </td>
                            <td class="center">2021-05-28 13:52</td>
                            <td class="center">已處理</td>
                            <td class="center">[2021-05-28 14:22]:總公司有結婚&nbsp;by 澔翰</td>
                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 389 筆、第 1 頁／共 8 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_system_report_list.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_system_report_list.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_system_report_list.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_system_report_list.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_system_report_list.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_system_report_list.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_system_report_list.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_system_report_list.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_system_report_list.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_system_report_list.php?topage=8 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_system_report_list.php?topage=1" selected>1</option>
                            <option value="/ad_system_report_list.php?topage=2">2</option>
                            <option value="/ad_system_report_list.php?topage=3">3</option>
                            <option value="/ad_system_report_list.php?topage=4">4</option>
                            <option value="/ad_system_report_list.php?topage=5">5</option>
                            <option value="/ad_system_report_list.php?topage=6">6</option>
                            <option value="/ad_system_report_list.php?topage=7">7</option>
                            <option value="/ad_system_report_list.php?topage=8">8</option>
                        </select></li>
                </ul>
            </div>

        </div>
        <!--/span-->

    </div>
    <!--/row-->
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<div class="modal fade" id="system_report">
    <div class="modal-dialog">
        <form action="ad_system_report_list.php?st=system_report" method="post" target="_self" class="form-inline nomargin" onsubmit="return chk_form_system_report()">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="send_branch_div_close1" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">同仁意見反映</h4>
                </div>
                <div class="modal-body">
                    <p>提升會館整體營運及服務品質，歡迎同仁提出寶貴意見。我們會認真參考並積極回覆。<small>(此意見反映內容不對外公開)</small></p>
                    <p><select name="system_report_types" id="system_report_types">
                            <option value="">請選擇意見類型</option>
                            <option value="系統">系統</option>
                            <option value="人事">人事</option>
                            <option value="行銷">行銷</option>
                            <option value="制度">制度</option>
                            <option value="服務">服務</option>
                            <option value="會務">會務</option>
                            <option value="其他">其他</option>
                        </select></p>
                    <p><textarea name="system_report_note" id="system_report_note" style="width:80%;height:120px;" autocomplete="off" placeholder="請輸入詳細的意見內容"></textarea></p>
                    <p><label class="checkbox"><input type="checkbox" name="noshow" id="noshow" value="1" autocomplete="off"><i></i>此意見及回覆均不需出現在列表中<small>(特殊或敏感問題適用)</small></label></p>
                </div>
                <div class="modal-footer" style="text-align:center">
                    <input type="hidden" name="url" value="/ad_system_report_list.php">
                    <a href="#close" class="btn btn-success" data-dismiss="modal">關閉視窗</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" class="btn btn-primary" value="確定送出">
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="system_report2">
    <div class="modal-dialog">
        <form action="ad_system_report_list.php?st=system_report2" method="post" target="_self" class="form-inline nomargin" onsubmit="return chk_form_system_report2()">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="send_branch_div_close1" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">補充意見</h4>
                </div>
                <div class="modal-body">
                    <p><textarea name="system_report_note2" id="system_report_note2" style="width:80%;height:120px;" autocomplete="off" placeholder="請輸入要補充的意見內容"></textarea></p>
                </div>
                <div class="modal-footer" style="text-align:center">
                    <input type="hidden" name="url2" value="/ad_system_report_list.php">
                    <input type="hidden" name="system_report2_an" id="system_report2_an" value="">
                    <a href="#close" class="btn btn-success" data-dismiss="modal">關閉視窗</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" class="btn btn-primary" value="確定送出">
                </div>
            </div>
        </form>
    </div>
</div>

<?php
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    function chk_form_system_report() {
        if (!$("#system_report_types").val()) {
            alert("請選擇意見類型");
            return false;
        }

        if (!$("#system_report_note").val()) {
            alert("請輸入意見內容");
            return false;
        }
        return true;
    }

    function chk_form_system_report2() {
        if (!$("#system_report_note2").val()) {
            alert("請輸入意見內容");
            return false;
        }
        return true;
    }

    function system_report2_show($an) {
        $("#system_report2").modal("show");
        $("#system_report2_an").val($an);
    }
</script>