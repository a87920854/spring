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
                    <strong>同仁意見反映　 - 數量：396</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                <form id="searchform" action="ad_system_report.php" method="post" target="_self" class="form-inline">
                    <input id="keyword" name="keyword" id="keyword" class="form-control" type="text" placeholder="搜尋內容" value="">
                    <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                </form>
                </p>
                <p><a class="btn btn-info" href="ad_system_report.php">未處理/處理中</a> <a class="btn btn-info" href="ad_system_report.php?tr=1">已處理</a></p>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th width=80>類型</th>
                            <th width=100>會館</th>
                            <th width=80>秘書</th>
                            <th>內容</th>
                            <th width=140>時間</th>
                            <th width=120>狀態</th>
                            <th>處理結果</th>
                            <th></th>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">八德</td>
                            <td class="center">八德督導</td>
                            <td class="center">約見系統<br>已下約見...約見紀錄表/看的到資訊，但個人回報內 無約見訊息。<br>10/1趙之珩0978325701，<br>10/4 文珠 蕭0916083952，<br>10/10楊忠霖0989126560，<br>(已截圖給曉娟)</td>
                            <td class="center">2021-09-30 14:14</td>
                            <td class="center">處理中</td>
                            <td class="center">[2021-09-30 20:09]:請小娟協助&nbsp;by 黎總經理</td>
                            <td width=80 class="center">
                                <a href="#m" onclick="openreportmodal('445');">處理中</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">其他</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">五倍卷是否財務部與業務部有確定可興方案之公告--便於因應(推廣有利方案)助業績及經濟成長<br><small>
                                    <font color=red>此意見勾選不需出現在列表中</font>
                                </small></td>
                            <td class="center">2021-08-30 17:07</td>
                            <td class="center">處理中</td>
                            <td class="center">[2021-08-30 19:23]:進行中！各區亦可以提出建議&nbsp;by 黎總經理</td>
                            <td width=80 class="center">
                                <a href="#m" onclick="openreportmodal('438');">處理中</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">服務</td>
                            <td class="center">台北</td>
                            <td class="center">陳紅</td>
                            <td class="center">會員啟用一對一諮詢後.會館秘書和排約部 希望能從老師那ㄦ˙了解諮詢內容 和 老師的 建議. 以便作為陸續輔導會員的 參考.<br> * 是否能得到老師的 回饋建議和 會員課後問卷<br>謝謝老師 謝謝行銷部 辛苦了 <br>
                                <font color=blue>[2021-08-18 13:54] 補充：<br></font><br>諮詢回饋表會反映在會員個人服務紀錄嗎 ?
                            </td>
                            <td class="center">2021-08-08 17:16</td>
                            <td class="center">處理中</td>
                            <td class="center">[2021-08-09 14:04]:建立一個諮詢回饋表給會員及如同病歷一般給老師一個服務記錄表，方便會館主管及同仁可以了解會員授課或諮詢情況。<br>&nbsp;by 黎總經理</td>
                            <td width=80 class="center">
                                <a href="#m" onclick="openreportmodal('434');">處理中</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">服務</td>
                            <td class="center">台北</td>
                            <td class="center">陳紅</td>
                            <td class="center">約會專家上的 會員資料.其婚況 若是曾有過婚姻.是否能明白紀載: **再次單身**<br>讓會員上網搜尋對象資料.也能清楚了解對方婚況.避免抱怨.<br>謝謝</td>
                            <td class="center">2021-08-08 14:23</td>
                            <td class="center">處理中</td>
                            <td class="center">[2021-08-09 14:04]:請行銷部一併考量&nbsp;by 黎總經理</td>
                            <td width=80 class="center">
                                <a href="#m" onclick="openreportmodal('433');">處理中</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">其他</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">官網-<br>有無機會連結各區大百貨公司<br>至少有信用卡----<br>有卡就有機會成交<br><br>因疫情---沒錢---若有廣告或連結有機會是有信用卡訪客增加----各區可能有機會高卡-付清率增加</td>
                            <td class="center">2021-07-27 12:27</td>
                            <td class="center">處理中</td>
                            <td class="center">[2021-07-27 14:49]:請欣怡和夏副總了解方向&nbsp;by 黎總經理</td>
                            <td width=80 class="center">
                                <a href="#m" onclick="openreportmodal('431');">處理中</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">不知道嘉義.雲林.台南若客人拉選可否系統自發<br>因為上班時間1:30才發有時訪客上班不能說話或錯過最佳邀約期<br>現在客人意願度/很重要/成為疫情下更應把握的客人<br>台南可因應即時<br>不然客人也會上其他網站</td>
                            <td class="center">2021-06-30 10:27</td>
                            <td class="center">處理中</td>
                            <td class="center">[2021-06-30 14:19]:可以參考&nbsp;by 黎總經理</td>
                            <td width=80 class="center">
                                <a href="#m" onclick="openreportmodal('419');">處理中</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">系統</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">行銷活動-愛情實驗室-約會專家<br>行銷活動-愛情實驗室-約會專家<br>公有資源<br>可否秘書會跳在首頁<br>方便即時性處理<br>爭取時效<br>我想先打台南地區的舊春網<br>看澔漢有沒有辦法成立一筆這樣的資料庫<br>因為我剛才自己設定進階搜尋結果回報一筆就又跳回舊資料頁面<br>等於每次回報就又要重新進階搜尋很麻煩<br>因為資料太多會被蓋過<br>只能用手機搜尋</td>
                            <td class="center">2021-05-24 13:50</td>
                            <td class="center">處理中</td>
                            <td class="center">[2021-05-24 14:06]:應該不會跳回舊資料, 聯絡台南督導確認&nbsp;by 澔翰<br>[2021-05-25 11:29]:只有特定ipad跟iphone會有問題,手邊沒設備可測,暫無法修復&nbsp;by 澔翰</td>
                            <td width=80 class="center">
                                <a href="#m" onclick="openreportmodal('382');">處理中</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">其他</td>
                            <td class="center">台南</td>
                            <td class="center">台南督導</td>
                            <td class="center">FB社團--大台南,王承封有對春天會館發問----其中有72人回答有人涉及毀謗,以為春天會館是H會館或安平酒店------不知道可否讓大台南團長讓這不正面沒根據文下架或刪文----我FB已被封鎖可能無法留言</td>
                            <td class="center">2020-01-09 20:39</td>
                            <td class="center">處理中</td>
                            <td class="center">[2020-01-14 14:55]:請行銷部協助&nbsp;by 黎總經理</td>
                            <td width=80 class="center">
                                <a href="#m" onclick="openreportmodal('237');">處理中</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">制度</td>
                            <td class="center">八德</td>
                            <td class="center">柯婉儀</td>
                            <td class="center">八德會館排約部<br>1、排約本館不用限條件。<br>2、排約外館未達到主約人條件可不接受。<br>3、北三區資料、E化主題。<br>4、配對指數後台要看到。</td>
                            <td class="center">2018-08-03 16:10</td>
                            <td class="center">處理中</td>
                            <td class="center"><br>[2018-08-03 17:17]:做為未來約會專家/跨會館排約整合的參考&nbsp;by 黎總經理</td>
                            <td width=80 class="center">
                                <a href="#m" onclick="openreportmodal('52');">處理中</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">服務</td>
                            <td class="center">八德</td>
                            <td class="center">蔡佩蓁 Sunny</td>
                            <td class="center">建議可叫上課老師寫會員上課評分表...讓他們知道自己的問題..如上馬拉熊老師3堂課的有系統規畫課程..單1堂不用寫...可讓學員清楚了解還有哪要加強</td>
                            <td class="center">2018-06-08 15:56</td>
                            <td class="center">處理中</td>
                            <td class="center"><br>[2018-06-11 18:45]:可以由會館先用紙本的回收上課評量嗎&nbsp;by 黎總經理</td>
                            <td width=80 class="center">
                                <a href="#m" onclick="openreportmodal('24');">處理中</a>
                            </td>
                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 10 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_system_report.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_system_report.php?topage=1 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_system_report.php?topage=1" selected>1</option>
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

<?php
require_once("./include/_bottom.php");
?>