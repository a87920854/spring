<?php
 require("./include/_top.php");
 require("./include/_sidebar.php");
?>

    <!-- MIDDLE -->
    <section id="middle">
        <!-- page title -->
        <header id="page-header">
            <ol class="breadcrumb">
                <li><a href="index.asp">管理系統</a></li>
                <li class="active">公告訊息</li>
            </ol>
        </header>
        <!-- /page title -->

        <div id="content" class="padding-20">
            <!-- content starts -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="title elipsis">
                        <strong>公告訊息 - 數量：119</strong> <!-- panel title -->
                    </span>
                </div>

                <div class="panel-body">
                    <p>

                    <form id="searchform" action="ad_announce.asp" method="post" target="_self" class="form-inline">
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text" placeholder="搜尋內容" value="">
                        <input type="submit" id="search_send" class="btn btn-default" value="查詢">
                    </form>
                    </p>

                    <table class="table table-striped table-bordered bootstrap-datatable">

                        <thead>
                            <tr>
                                <th width=180>公告時間</th>
                                <th>標題</th>
                                <th width=80>會館</th>
                                <th width=80>權限</th>
                                <th></th>
                            </tr>

                            <tr>
                                <td class="center">2021-09-01&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=423">2021年9月網站行銷相關名單恢復原本比例（9/1更新）</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=423" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-08-09&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=421">110年企字第001號 調整說明如下：</a></td>
                                <td class="center">所有</td>
                                <td class="center">指定</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=421" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-08-01&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=420">疫情後：鼓勵大家善用行銷資源（8/31止，全省各會館適用）</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=420" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-07-23&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=419">疫情7/27降二級：會館全員恢復正常上班！</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=419" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-07-23&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=418">總公司講師課程，相關場次認領會館及相關事宜公告</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=418" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-07-20&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=417">總公司諮商師、講師相關合作、預約辦法及注意事項</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=417" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-07-02&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=416">說明目前各品牌邀約訪客到春天會館串聯與注意事項：</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=416" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-06-29&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=415">約會專家新增功能&調整</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=415" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-06-29&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=414">疫情期間：鼓勵大家善用行銷資源（7/31止，全省各會館適用）</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=414" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-06-22&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=413">公告：6/28起 北部三會館及總公司恢復正常上班</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=413" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-06-21&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=412">【VIP會員預約諮詢】前後台操作教學</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=412" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-06-11&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=411">後台線上貴賓諮詢卡，自動列印及下載教學SOP</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=411" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-06-09&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=407">疫情期間：鼓勵大家善用行銷資源（6/30止，全省各會館適用）</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=407" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-06-03&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=406">後台業務展示系統，可展示全省結婚的會員，增加成交機會</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=406" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-06-01&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=405">約會專家－請各區審核照片時加強確認！</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=405" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-05-31&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=404">約會專家前台會員顯示調整</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=404" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-05-31&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=403">北部三會館 台北、八德、約專會館：6/1～6/14先調整如下：</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=403" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-05-28&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=402">約會專家簡訊通知調整&LINE約會時間延長通知</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=402" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-05-27&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=401">會員自行填寫約會評價位置與步驟</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=401" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-05-25&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=398">退費與續約會員之會籍請務必調整</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=398" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-05-19&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=396">疫情期間：鼓勵大家善用行銷資源（5/18起，全省各會館適用）</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=396" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-05-18&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=394">後台新增客戶申訴專區</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=394" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-05-17&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=393">全省會館第一線同仁辛苦了！請加強自己的防護力，一起努力抗疫注意事項:</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=393" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-05-17&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=391">📣約會專家LINE約會功能開放通知📣</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=391" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-05-17&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=390">📣 📣春天會館會員線上LINE約會功能開放溜</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=390" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-05-17&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=389">如果雙北會館同仁因小孩停課，有需要申請防疫照顧假，請先傳真到總公司。</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=389" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-05-14&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=387">因應疫情升溫，約會專家線上功能緊急臨時調整！！！及其他注意事項</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=387" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-05-14&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=386">大家可以在家辦公時的電話系統：</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=386" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-05-13&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=385">「防疫期間，不出門在家也可以有安全又精準的約會！」</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=385" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-05-11&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=384">慎防釣名單提醒!</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=384" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-04-26&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=381">2021年06月01日-07月09日 家維老師課程及諮詢再麻煩各區確認</a></td>
                                <td class="center">所有</td>
                                <td class="center">指定</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=381" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-04-26&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=380">公告110年通字第010號，VIP會員服務權益履約轉入成本說明。</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=380" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-04-21&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=379">再次重申各區收入憑証，請受理秘書自己填寫</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=379" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-04-13&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=378">各會館會員若有升卡續卡，請同時到後台更改到期日，避免影響會員權益</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=378" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-04-01&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=377">約專行銷名單給各區-（約專及DMN）</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=377" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-03-15&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=376">約專行銷頁面-戀愛決勝盤-獎項部分說明</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=376" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-03-08&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=375">2017以前舊資料再開發，後台系統使用地方教學</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=375" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-03-04&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=374">3月1日起約專邀約訪客到各會館，會館及個人業績分配如下：</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=374" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-01-11&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=371">請大家協助同仁約專LINE POINTS要加強確有效認列：</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=371" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2021-01-05&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=370">自2021年01月01日起，收支系統身分證需對應會員資料系統。未對應者無法KEY會員系統</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=370" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2020-11-30&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=369">讓活動「瀏覽率」、「點擊率」、「填單率」增加！請企劃完善每一場活動內容</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=369" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2020-11-30&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=368">約會專家_會員等級權限&功能修改</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=368" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2020-10-23&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=356">約見紀錄表加上約見未參追蹤表，請各區善加利用並且定期回報追蹤情況：</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=356" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2020-09-25&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=353">VIP會員或是付訂後希望可以增加會員的好感度與信任度：</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=353" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2020-09-25&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=352">會員入會合約注意事項：</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=352" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2020-09-23&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=351">10月起各區職代人選及津貼調整為各區只有一位職代（各副總與督導和職代休假上請務必搭配好）</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=351" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2020-08-31&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=350">約會專家9/1起新增EDM</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=350" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2020-08-28&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=349">調整本區及跨區約訪男生年齡及學歷</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=349" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2020-08-28&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=348">後台網站名單說明與處理-活動通名單 及 好好玩一頁式名單</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=348" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">2020-07-31&nbsp;&nbsp;<span class="label label-danger">未讀</span></td>
                                <td class="center"><a href="ad_announce_view.asp?id=346">重申升卡128000全卡制度，請善用年度收入明細表</a></td>
                                <td class="center">所有</td>
                                <td class="center">所有</td>
                                <td width=180 class="center">
                                    <a href="ad_announce_view.asp?id=346" class="btn btn-xs btn-default">查看內容</a>
                                </td>
                            </tr>

                            </tbody>
                    </table>
                </div>
                <div class="text-center">共 119 筆、第 1 頁／共 3 頁&nbsp;&nbsp;
                    <ul class='pagination pagination-md'>
                        <li><a href=/ad_announce.asp?topage=1>第一頁</a></li>
                        <li class='active'><a href="#">1</a></li>
                        <li><a href=/ad_announce.asp?topage=2 class='text'>2</a></li>
                        <li><a href=/ad_announce.asp?topage=3 class='text'>3</a></li>
                        <li><a href=/ad_announce.asp?topage=2 class='text' title='Next'>下一頁</a></li>
                        <li><a href=/ad_announce.asp?topage=3 class='text'>最後一頁</a></li>
                        <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                <option value="/ad_announce.asp?topage=1" selected>1</option>
                                <option value="/ad_announce.asp?topage=2">2</option>
                                <option value="/ad_announce.asp?topage=3">3</option>
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
 require("./include/_bottom.php");
?>
