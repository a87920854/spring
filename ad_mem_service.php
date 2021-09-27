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
            <li><a href="ad_mem.php">會員管理系統</a></li>
            <li class="active">會員服務紀錄 - 編號 173134 - 鄭小姐</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員服務紀錄 - 編號 173134 - 鄭小姐 - <font color=#c22c7d>約會專家主帳號</font></strong> <!-- panel title -->
                </span>

            </div>

            <div class="panel-body">


                <p>



                    <a class="btn btn-primary" href="ad_mem_detail.php?mem_num=173134">基本資料</a>

                    <a class="btn btn-info" href="ad_mem_service.php?mem_num=173134"><i class="fa fa-arrow-right" style="margin-top:3px;"></i>服務紀錄</a>
                    <a class="btn btn-danger" href="ad_mem_ptest.php?mem_num=173134">心理測驗</a>
                    <a class="btn btn-warning" href="ad_mem_login_log.php?mem_num=173134">登入紀錄</a>
                    <a class="btn btn-dirtygreen" href="ad_important_paper.php?mem_num=173134">紙本資料</a>

                </p>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>

                        <tr>
                            <td width="92">
                                <div align="right">編號：</div>
                            </td>
                            <td width="267">173134</td>
                            <td width="94">
                                <div align="right">身分證字號：</div>
                            </td>
                            <td width="269">
                                <font color=red>不可見</font>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">姓名：</div>
                            </td>
                            <td>鄭小姐</td>
                            <td>
                                <div align="right">電話/手機：</div>
                            </td>
                            <td>
                                <font color=red>不可見</font>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="right">資料時間：</div>
                            </td>
                            <td>2008/10/19 下午 02:42:00</td>
                            <td>
                                <div align="right">更新時間：</div>
                            </td>
                            <td>2009/2/3 下午 04:32:00</td>
                        </tr>
                        <tr>
                            <td>
                                <div align="right">最後登入時間：</div>
                            </td>
                            <td></td>
                            <td>
                                <div align="right">最後排約時間：</div>
                            </td>
                            <td>2009/2/3 下午 07:30:00</td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div align="right">處理情形：</div>
                            </td>
                            <td colspan=3>未處理</td>
                        </tr>


                </table>
                <p>
                    <a href="javascript:Mars_popup('ad_report.php?k_id=85689&lu=A000000002&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報紀錄</a>
                    <a href="#ac_data">參加活動統計</a>&nbsp;&nbsp;<a href="#love_data">排約列表</a>&nbsp;&nbsp;<a href="#p" onclick="Mars_popup('ad_mem_service_print.php?mem_num=173134','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">列印本頁</a>
                </p>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td colspan="10">
                            <div align="center"><b>咨詢紀錄</b></div>
                        </td>
                    </tr>
                    <tr>
                        <th>咨詢時間</th>
                        <th>咨詢類型</th>
                        <th>咨詢對象</th>
                        <th>咨詢費</th>
                        <th>剩餘成本</th>
                        <th>新剩餘成本</th>
                        <th>會員會館秘書</th>
                        <th>講師會館</th>
                        <th>咨詢講師</th>
                        <th>備註</th>
                        <th>紀錄時間</th>
                    </tr>

                    <tr>
                        <td align="center">2020/10/21 下午 04:00:00</td>
                        <td align="center">一對一諮詢</td>
                        <td align="center">黃金品</td>
                        <td align="center">現金：699 元</td>
                        <td align="center">0 元</td>
                        <td align="center">0 元</td>
                        <td align="center">總管理處/張利 Liz</td>
                        <td align="center">台北</td>
                        <td align="center">瑪那熊</td>
                        <td align="center"></td>
                        <td align="center">2020/10/21 下午 05:51:54</td>
                    </tr>
                </table>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td colspan="8">
                            <div align="center"><b>活動明細表</b></div>
                        </td>
                    </tr>
                    <tr>
                        <td width="12%">
                            <div align="center">報名日期</div>
                        </td>
                        <td width="12%">
                            <div align="center">活動日期</div>
                        </td>
                        <td width="120">
                            <div align="center">活動類型</div>
                        </td>
                        <td>
                            <div align="center">地區和活動名稱</div>
                        </td>
                        <td width="16%">
                            <div align="center">收費金額</div>
                        </td>
                        <td width="5%">
                            <div align="center">處理會館</div>
                        </td>
                        <td width="5%">
                            <div align="center">處理秘書</div>
                        </td>
                        <td width="5%">
                            <div align="center">狀態</div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div align="center">2021/4/20 下午 02:05:00<br></div>
                        </td>
                        <td>
                            <div align="center">2021/4/17 下午 03:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)問問塔羅牌，戀愛解惑專班<br>
                                <font color="#FF0000">(非會員 許家芸)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2021/1/26 下午 04:49:00<br></div>
                        </td>
                        <td>
                            <div align="center">2021/1/24 上午 11:30:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)Ethan生日趴，一起唱歌吧！<br>
                                <font color="#FF0000">(非會員 郭恆如)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2021/1/26 下午 04:49:00<br></div>
                        </td>
                        <td>
                            <div align="center">2021/1/24 上午 11:30:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)Ethan生日趴，一起唱歌吧！<br>
                                <font color="#FF0000">(非會員 小倩)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2021/1/26 下午 04:44:00<br></div>
                        </td>
                        <td>
                            <div align="center">2021/1/24 上午 11:30:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)Ethan生日趴，一起唱歌吧！<br>
                                <font color="#FF0000">(非會員 劉家君)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2021/1/26 下午 04:39:00<br></div>
                        </td>
                        <td>
                            <div align="center">2021/1/23 下午 06:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)成雙成對溫馨羽球聚會<br>
                                <font color="#FF0000">(非會員 曾韻縈)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)100</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2021/1/26 下午 04:38:00<br></div>
                        </td>
                        <td>
                            <div align="center">2021/1/23 下午 06:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)成雙成對溫馨羽球聚會<br>
                                <font color="#FF0000">(非會員 廖采音)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)100</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2021/1/5 下午 04:00:00<br></div>
                        </td>
                        <td>
                            <div align="center">2021/1/3 下午 12:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)歡樂電影日之神力女超人1984<br>
                                <font color="#FF0000">(非會員 郭恆如)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)200</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2021/1/5 下午 03:59:00<br></div>
                        </td>
                        <td>
                            <div align="center">2021/1/3 下午 12:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)歡樂電影日之神力女超人1984<br>
                                <font color="#FF0000">(非會員 馮小倩)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)200</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2021/1/5 下午 03:52:00<br></div>
                        </td>
                        <td>
                            <div align="center">2021/1/2 下午 07:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)溫馨小聚，歡樂桌遊趴<br>
                                <font color="#FF0000">(非會員 鄭惟元)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)200</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/12/25 下午 04:53:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/12/26 上午 10:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)聖誕佳節小鹿亂撞特別企劃<br>
                                <font color="#FF0000">(12/24#45074 非會員 郭恆如)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)600</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/12/25 下午 04:48:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/12/26 上午 10:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)聖誕佳節小鹿亂撞特別企劃<br>
                                <font color="#FF0000">(12/24#56601 非會員 馮小倩)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)600</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/12/23 下午 08:24:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/12/26 上午 10:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)聖誕佳節小鹿亂撞特別企劃<br>
                                <font color="#FF0000">(10/23#66141 非會員 曾婷筠)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)600</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                易珊
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/12/23 下午 08:23:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/12/26 上午 10:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)聖誕佳節小鹿亂撞特別企劃<br>
                                <font color="#FF0000">(10/23#30386 非會員 曾翔筠)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)600</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                易珊
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/12/22 下午 04:07:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/12/20 下午 01:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)歡樂電玩日x美式監獄逃脫<br>
                                <font color="#FF0000">(非會員 陳家翎)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/11/24 下午 02:04:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/11/21 下午 07:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)正中紅心，射飛鏢之夜<br>
                                <font color="#FF0000">(非會員 陳承安)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)100</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/11/17 下午 03:45:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/11/14 下午 07:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)保齡球派對，滾出心滋味<br>
                                <font color="#FF0000">(非會員 劉子綺)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)100</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/11/17 下午 03:40:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/11/14 下午 07:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)保齡球派對，滾出心滋味<br>
                                <font color="#FF0000">(非會員 許家芸)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)100</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/11/10 下午 03:09:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/11/7 下午 06:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)SingSing相印K歌趣<br>
                                <font color="#FF0000">(非會員 許家芸)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/11/10 下午 03:09:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/11/7 下午 06:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)SingSing相印K歌趣<br>
                                <font color="#FF0000">(非會員 蔡宗霖)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/10/13 下午 04:06:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/10/11 下午 02:00:00</div>
                        </td>
                        <td>饗約會 - 美味廚房</td>
                        <td>
                            <div align="center">(台北)甜到心坎裡之午茶甜點DIY聯誼<br>
                                <font color="#FF0000">(非會員 林琬玲)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                李喬
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/10/13 下午 04:05:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/10/11 下午 02:00:00</div>
                        </td>
                        <td>饗約會 - 美味廚房</td>
                        <td>
                            <div align="center">(台北)甜到心坎裡之午茶甜點DIY聯誼<br>
                                <font color="#FF0000">(非會員 卓怡亭)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                李喬
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/10/13 下午 04:04:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/10/11 下午 02:00:00</div>
                        </td>
                        <td>饗約會 - 美味廚房</td>
                        <td>
                            <div align="center">(台北)甜到心坎裡之午茶甜點DIY聯誼<br>
                                <font color="#FF0000">(非會員 陳宥蓁)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/10/6 下午 02:53:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/10/3 下午 04:30:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)星光閃閃，情定淡水遊艇趴<br>
                                <font color="#FF0000">(非會員 陳莉茹)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)800</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/9/29 下午 04:20:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/10/3 下午 04:30:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)星光閃閃，情定淡水遊艇趴<br>
                                <font color="#FF0000">(09/28#04071)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)800</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/9/22 下午 02:59:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/9/19 下午 07:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)保齡球派對，滾出心滋味<br>
                                <font color="#FF0000">(非會員 蔡盼芸)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)100</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/9/8 下午 03:20:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/9/6 下午 12:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)北桃甜蜜約，月老廟午茶單車之旅<br>
                                <font color="#FF0000">(非會員 陳證傑)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)600</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/9/8 下午 02:33:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/9/6 下午 12:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)北桃甜蜜約，月老廟午茶單車之旅<br>
                                <font color="#FF0000">(非會員 蘇紫潔)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/9/8 下午 02:32:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/9/6 下午 12:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)北桃甜蜜約，月老廟午茶單車之旅<br>
                                <font color="#FF0000">(非會員 黃秀燕)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/7/3 下午 08:48:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/7/3 下午 07:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)歡樂星期五－桌遊團康夜<br>
                                <font color="#FF0000">(非會員 柯秉佑)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)150</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/6/30 下午 05:49:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/6/28 上午 11:30:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)SingSing相印K歌趣<br>
                                <font color="#FF0000">(非會員 蔡宜璇)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/6/30 下午 04:05:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/6/26 下午 07:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)大家一起打羽球<br>
                                <font color="#FF0000">(非會員 陳冠廷)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)100</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                詹明錡
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/6/30 下午 04:04:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/6/26 下午 07:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)大家一起打羽球<br>
                                <font color="#FF0000">(非會員 張君曼)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)100</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/5/26 下午 04:57:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/5/24 上午 10:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)開心農場一日遊<br>
                                <font color="#FF0000">(非會員黃秀燕5/22#25558)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)500</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/5/26 下午 04:56:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/5/24 上午 10:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)開心農場一日遊<br>
                                <font color="#FF0000">(非會員 張心怡)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)500</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/5/20 下午 03:54:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/5/16 下午 07:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)保齡球之夜，滾出心滋味<br>
                                <font color="#FF0000">(非會員 簡憶婷)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)200</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/5/20 下午 03:16:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/5/16 下午 02:30:00</div>
                        </td>
                        <td>心約會 - 戀愛講堂</td>
                        <td>
                            <div align="center">(台北)星星知我心，星座塔羅分析<br>
                                <font color="#FF0000">(非會員 薛如玲)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/5/4 下午 06:38:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/5/2 下午 07:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)《密室逃脫》你絕對逃不出去<br>

                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)350</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/4/24 下午 03:48:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/4/25 上午 08:30:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)北浦桐花螢火蟲之戀<br>
                                <font color="#FF0000">(非會員 黃秀燕)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)700</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/4/20 下午 04:28:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/4/18 下午 03:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)拜拜月老，單身掰掰<br>
                                <font color="#FF0000">(非會員 陳家羚)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)200</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/4/20 下午 04:27:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/4/18 下午 03:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)拜拜月老，單身掰掰<br>
                                <font color="#FF0000">(非會員 尤雪莉)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)200</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/4/20 下午 04:26:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/4/18 下午 03:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)拜拜月老，單身掰掰<br>
                                <font color="#FF0000">(非會員 陳承安)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)200</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/3/31 下午 04:44:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/3/28 下午 07:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)保齡球派對，滾出心滋味！<br>
                                <font color="#FF0000">(非會員 林韋均)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/3/31 下午 04:44:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/3/28 下午 07:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)保齡球派對，滾出心滋味！<br>
                                <font color="#FF0000">(非會員 陳承安)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/3/31 下午 04:43:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/3/28 下午 07:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)保齡球派對，滾出心滋味！<br>
                                <font color="#FF0000">(非會員 張家綺)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/3/19 下午 05:31:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/3/22 下午 02:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)密室逃脫－越獄風雲實境版<br>
                                <font color="#FF0000">(03/17#10336 非會員 汪鈴真)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/3/5 下午 03:24:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/3/8 下午 12:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)SingSing相印K歌趣<br>
                                <font color="#FF0000">(3/4 #00157 非會員 林韋均)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/2/19 下午 06:38:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/2/23 下午 12:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)城市尋寶－淡水1884（北桃）<br>
                                <font color="#FF0000">(非會員 曾秀敏)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/2/7 下午 07:31:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/2/9 上午 10:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)戀戀內灣X美食尋愛<br>
                                <font color="#FF0000">(非會員 吳純慧)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/2/5 下午 04:58:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/2/9 上午 10:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)戀戀內灣X美食尋愛<br>
                                <font color="#FF0000">(非會員林羽佩 02/05#17902)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                易珊
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2020/1/11 下午 03:30:00<br></div>
                        </td>
                        <td>
                            <div align="center">2020/1/12 下午 02:00:00</div>
                        </td>
                        <td>心約會 - 魅力有約</td>
                        <td>
                            <div align="center">(台北)男女都要顧面子，春節臉部大掃除<br>
                                <font color="#FF0000">(非會員 劉品婷)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/12/9 下午 03:53:00<br></div>
                        </td>
                        <td>
                            <div align="center">2019/12/21 下午 12:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)聖誕節盲吃特企_集食享LOVE<br>
                                <font color="#FF0000">(非會員曾秀敏)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)500</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                Ethan
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/8/26<br></div>
                        </td>
                        <td>
                            <div align="center">2019/8/10 下午 02:00:00</div>
                        </td>
                        <td>心約會 - 戀愛講堂</td>
                        <td>
                            <div align="center">(台北)讓你開口撩人又撩心<br>
                                <font color="#FF0000">(活動通報名:周智俞)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)940</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/8/26<br></div>
                        </td>
                        <td>
                            <div align="center">2019/8/24 下午 01:30:00</div>
                        </td>
                        <td>揪約會 - 下午茶約會</td>
                        <td>
                            <div align="center">(台北)經濟部智慧財產局智慧情人戀愛<br>
                                <font color="#FF0000">(匯好好玩 22人)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)11200</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/8/26<br></div>
                        </td>
                        <td>
                            <div align="center">2019/8/24 下午 01:30:00</div>
                        </td>
                        <td>揪約會 - 下午茶約會</td>
                        <td>
                            <div align="center">(台北)經濟部智慧財產局智慧情人戀愛<br>
                                <font color="#FF0000">(智產局收現 600x10人)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)6000</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/7/31<br></div>
                        </td>
                        <td>
                            <div align="center">2019/8/4 下午 01:30:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)京都遇見愛唯美日式浴衣體驗派對<br>
                                <font color="#FF0000">(非會員 黃思穎)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)700</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/7/31<br></div>
                        </td>
                        <td>
                            <div align="center">2019/8/4 下午 01:30:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)京都遇見愛唯美日式浴衣體驗派對<br>
                                <font color="#FF0000">(非會員 沈怡菁)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)700</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/7/29<br></div>
                        </td>
                        <td>
                            <div align="center">2019/8/4 下午 01:30:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)京都遇見愛唯美日式浴衣體驗派對<br>
                                <font color="#FF0000">(非會員 王映方)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)700</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/7/29<br></div>
                        </td>
                        <td>
                            <div align="center">2019/8/4 下午 01:30:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)京都遇見愛唯美日式浴衣體驗派對<br>
                                <font color="#FF0000">(非會員 龔芷儀)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)-700</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/7/24<br></div>
                        </td>
                        <td>
                            <div align="center">2019/8/4 下午 01:30:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)京都遇見愛唯美日式浴衣體驗派對<br>
                                <font color="#FF0000">(非會員(吳耿豪))</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)1300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/7/24<br></div>
                        </td>
                        <td>
                            <div align="center">2019/8/4 下午 01:30:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)京都遇見愛唯美日式浴衣體驗派對<br>
                                <font color="#FF0000">(非會員(詹皇劭))</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)1300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/7/23<br></div>
                        </td>
                        <td>
                            <div align="center">2019/8/4 下午 01:30:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)京都遇見愛唯美日式浴衣體驗派對<br>
                                <font color="#FF0000">(非會員 郭柔玫)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)-800</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/7/22<br></div>
                        </td>
                        <td>
                            <div align="center">2019/8/4 下午 01:30:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)京都遇見愛唯美日式浴衣體驗派對<br>
                                <font color="#FF0000">(非會員 蕭富方)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)800</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/7/19<br></div>
                        </td>
                        <td>
                            <div align="center">2019/8/4 下午 01:30:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)京都遇見愛唯美日式浴衣體驗派對<br>
                                <font color="#FF0000">(非會員 吳芷愉)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)800</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/7/19<br></div>
                        </td>
                        <td>
                            <div align="center">2019/8/4 下午 01:30:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)京都遇見愛唯美日式浴衣體驗派對<br>
                                <font color="#FF0000">(非會員 毛燕淑)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)800</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/7/18<br></div>
                        </td>
                        <td>
                            <div align="center">2019/8/4 下午 01:30:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)京都遇見愛唯美日式浴衣體驗派對<br>
                                <font color="#FF0000">(非會員 盧可馨)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)800</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/7/18<br></div>
                        </td>
                        <td>
                            <div align="center">2019/8/4 下午 01:30:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)京都遇見愛唯美日式浴衣體驗派對<br>
                                <font color="#FF0000">(非會員 謝依倫)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)800</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/7/18<br></div>
                        </td>
                        <td>
                            <div align="center">2019/8/4 下午 01:30:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)京都遇見愛唯美日式浴衣體驗派對<br>
                                <font color="#FF0000">(非會員 王若琪)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)800</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/6/2<br></div>
                        </td>
                        <td>
                            <div align="center">2019/6/2 下午 02:00:00</div>
                        </td>
                        <td>揪約會 - 主題式約會</td>
                        <td>
                            <div align="center">(台北)創「皂」愛情粉紅泡泡<br>
                                <font color="#FF0000">(非會員 陳莉茹)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/5/27<br></div>
                        </td>
                        <td>
                            <div align="center">2019/5/26 下午 02:00:00</div>
                        </td>
                        <td>揪約會 - 下午茶約會</td>
                        <td>
                            <div align="center">(台北)邂逅4d暖男下午茶聯誼<br>
                                <font color="#FF0000">(非會員 廖婉婷)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/5/27<br></div>
                        </td>
                        <td>
                            <div align="center">2019/5/26 下午 02:00:00</div>
                        </td>
                        <td>揪約會 - 下午茶約會</td>
                        <td>
                            <div align="center">(台北)邂逅4d暖男下午茶聯誼<br>
                                <font color="#FF0000">(非會員 莊翊琳)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/5/27<br></div>
                        </td>
                        <td>
                            <div align="center">2019/5/26 下午 02:00:00</div>
                        </td>
                        <td>揪約會 - 下午茶約會</td>
                        <td>
                            <div align="center">(台北)邂逅4d暖男下午茶聯誼<br>
                                <font color="#FF0000">(非會員 林伊馨)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/5/22<br></div>
                        </td>
                        <td>
                            <div align="center">2019/5/26 下午 02:00:00</div>
                        </td>
                        <td>揪約會 - 下午茶約會</td>
                        <td>
                            <div align="center">(台北)邂逅4d暖男下午茶聯誼<br>
                                <font color="#FF0000">(DMN會員 張雅蓁)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/5/14<br></div>
                        </td>
                        <td>
                            <div align="center">2019/5/18 下午 06:30:00</div>
                        </td>
                        <td>饗約會 - 美味廚房</td>
                        <td>
                            <div align="center">(台北)藍帶廚藝交友<br>
                                <font color="#FF0000">(非會員 游志文)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)1600</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/4/27<br></div>
                        </td>
                        <td>
                            <div align="center">2019/4/27 下午 02:00:00</div>
                        </td>
                        <td>揪約會 - 主題式約會</td>
                        <td>
                            <div align="center">(台北)唇唇欲動遇到纖纖玉手<br>
                                <font color="#FF0000">(非會員(古韋琦))</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)500</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                易珊
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/3/2<br></div>
                        </td>
                        <td>
                            <div align="center">2019/3/2 下午 01:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)幸福藍染半日遊<br>
                                <font color="#FF0000">(非會員 周冠芊)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/3/2<br></div>
                        </td>
                        <td>
                            <div align="center">2019/3/2 下午 01:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)幸福藍染半日遊<br>
                                <font color="#FF0000">(非會員 廖怡婷)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/1/26<br></div>
                        </td>
                        <td>
                            <div align="center">2019/1/27 上午 10:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)紅色水果戀採草莓半日遊<br>
                                <font color="#FF0000">(非會員(王雅卉))</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)500</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/1/25<br></div>
                        </td>
                        <td>
                            <div align="center">2019/1/26 下午 06:30:00</div>
                        </td>
                        <td>饗約會 - 美味廚房</td>
                        <td>
                            <div align="center">(台北)藍帶廚藝交友<br>
                                <font color="#FF0000">(非會員 陳禹葳)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)1500</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/1/25<br></div>
                        </td>
                        <td>
                            <div align="center">2019/1/27 上午 10:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)紅色水果戀採草莓半日遊<br>
                                <font color="#FF0000">(非會員 黃怡芳)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)600</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/1/21<br></div>
                        </td>
                        <td>
                            <div align="center">2019/1/27 上午 10:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)紅色水果戀採草莓半日遊<br>
                                <font color="#FF0000">(非會員 何明雯)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)600</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/1/18<br></div>
                        </td>
                        <td>
                            <div align="center">2019/1/27 上午 10:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)紅色水果戀採草莓半日遊<br>
                                <font color="#FF0000">(非會員蕭富方)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)600</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2019/1/18<br>轉入時間(2019/1/28)</div>
                        </td>
                        <td>
                            <div align="center">2019/1/27 上午 10:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)上山下海戀愛趣2日遊<br>

                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)1200</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/12/28<br></div>
                        </td>
                        <td>
                            <div align="center">2018/12/30 上午 08:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)冬季戀歌戶外一日遊<br>
                                <font color="#FF0000">(12/26帳 非會員 黃子彥 活動標題拉錯日期)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)800</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/12/27<br></div>
                        </td>
                        <td>
                            <div align="center">2018/12/30 上午 08:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)冬季戀歌戶外一日遊<br>
                                <font color="#FF0000">(非會員 楊淳方)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)800</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/12/26<br></div>
                        </td>
                        <td>
                            <div align="center">2018/12/30 上午 08:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)冬季戀歌戶外一日遊<br>
                                <font color="#FF0000">(非會員 曾怡雯)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)800</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/12/20<br></div>
                        </td>
                        <td>
                            <div align="center">2018/12/30 上午 08:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)冬季戀歌戶外一日遊<br>
                                <font color="#FF0000">(非會員 張玉琴)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)800</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/12/15<br></div>
                        </td>
                        <td>
                            <div align="center">2018/12/15 下午 02:00:00</div>
                        </td>
                        <td>揪約會 - 主題式約會</td>
                        <td>
                            <div align="center">(台北)搭訕魔術好好玩<br>
                                <font color="#FF0000">(非會員(陳若苑))</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div align="center">2018/8/3<br></div>
                        </td>
                        <td>
                            <div align="center">2018/8/18 下午 06:00:00</div>
                        </td>
                        <td>心約會 - 戀愛講堂</td>
                        <td>
                            <div align="center">(台北)一開口撩人又聊心<br>
                                <font color="#FF0000">(非會員 王佩郡)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)500</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/8/3<br></div>
                        </td>
                        <td>
                            <div align="center">2018/8/18 下午 06:00:00</div>
                        </td>
                        <td>心約會 - 戀愛講堂</td>
                        <td>
                            <div align="center">(台北)一開口撩人又聊心<br>
                                <font color="#FF0000">(非會員 李芸慧)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)500</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/8/3<br></div>
                        </td>
                        <td>
                            <div align="center">2018/8/18 下午 06:00:00</div>
                        </td>
                        <td>心約會 - 戀愛講堂</td>
                        <td>
                            <div align="center">(台北)一開口撩人又聊心<br>
                                <font color="#FF0000">(非會員 蔡宏源)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)500</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/6/7<br></div>
                        </td>
                        <td>
                            <div align="center">2018/6/24 上午 08:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)夏日郊遊趣<br>
                                <font color="#FF0000">(非會員 周映君)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)800</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                IVY
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/6/25<br></div>
                        </td>
                        <td>
                            <div align="center">2018/6/23 下午 02:00:00</div>
                        </td>
                        <td>饗約會 - 美味廚房</td>
                        <td>
                            <div align="center">(台北)「烹」然心動，來約會吧<br>
                                <font color="#FF0000">(非會員 陳宏碩)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)1500</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/6/24<br></div>
                        </td>
                        <td>
                            <div align="center">2018/6/24 上午 08:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)夏日郊遊趣<br>
                                <font color="#FF0000">(非會員(王沛瑄))</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)800</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/6/22<br></div>
                        </td>
                        <td>
                            <div align="center">2018/6/23 下午 06:30:00</div>
                        </td>
                        <td>饗約會 - 美味廚房</td>
                        <td>
                            <div align="center">(台北)「烹」然心動，來約會吧<br>
                                <font color="#FF0000">(非會員 曾文孟)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)1700</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/6/21<br></div>
                        </td>
                        <td>
                            <div align="center">2018/6/24 上午 08:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)夏日郊遊趣<br>
                                <font color="#FF0000">(非會員(林宥芯))</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)800</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/6/19<br></div>
                        </td>
                        <td>
                            <div align="center">2018/6/24 上午 08:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)夏日郊遊趣<br>
                                <font color="#FF0000">(非會員 鄔親賢)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)800</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                黃子容
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/6/19<br></div>
                        </td>
                        <td>
                            <div align="center">2018/6/24 上午 08:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)夏日郊遊趣<br>
                                <font color="#FF0000">(非會員 余明芬)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)1300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/6/11<br></div>
                        </td>
                        <td>
                            <div align="center">2018/6/24 上午 08:00:00</div>
                        </td>
                        <td>趣約會 - 輕旅行</td>
                        <td>
                            <div align="center">(台北)夏日郊遊趣<br>
                                <font color="#FF0000">(非會員 謝岱容)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)1300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/4/14<br></div>
                        </td>
                        <td>
                            <div align="center">2018/4/14 下午 02:30:00</div>
                        </td>
                        <td>揪約會 - 主題式約會</td>
                        <td>
                            <div align="center">(台北)來玩愛情卡，認識新朋友<br>
                                <font color="#FF0000">(非會員 容雨君)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/4/14<br></div>
                        </td>
                        <td>
                            <div align="center">2018/4/14 下午 02:30:00</div>
                        </td>
                        <td>揪約會 - 主題式約會</td>
                        <td>
                            <div align="center">(台北)來玩愛情卡，認識新朋友<br>
                                <font color="#FF0000">(非會員 林岱蓉)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/4/14<br></div>
                        </td>
                        <td>
                            <div align="center">2018/4/14 下午 02:30:00</div>
                        </td>
                        <td>揪約會 - 主題式約會</td>
                        <td>
                            <div align="center">(台北)來玩愛情卡，認識新朋友<br>
                                <font color="#FF0000">(非會員 吳宇蟬)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/4/14<br></div>
                        </td>
                        <td>
                            <div align="center">2018/4/14 下午 02:30:00</div>
                        </td>
                        <td>揪約會 - 主題式約會</td>
                        <td>
                            <div align="center">(台北)來玩愛情卡，認識新朋友<br>
                                <font color="#FF0000">(非會員 梁育誠)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2018/4/7<br></div>
                        </td>
                        <td>
                            <div align="center">2018/4/7 下午 02:00:00</div>
                        </td>
                        <td>揪約會 - 主題式約會</td>
                        <td>
                            <div align="center">(台北)歡樂笑顏繪- Q版肖像<br>
                                <font color="#FF0000">(非會員 邱肇純)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                詹明錡
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2017/12/19<br></div>
                        </td>
                        <td>
                            <div align="center">2017/12/24 下午 02:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)聖誕午宴派對<br>
                                <font color="#FF0000">(非會員(蔣佳霖))</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)700</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2017/11/28<br></div>
                        </td>
                        <td>
                            <div align="center">2017/12/24 下午 02:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)聖誕午宴派對<br>
                                <font color="#FF0000">(非會員(陳菀渝))</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)600</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2017/11/1<br></div>
                        </td>
                        <td>
                            <div align="center">2017/11/4 下午 02:00:00</div>
                        </td>
                        <td>揪約會 - 主題式約會</td>
                        <td>
                            <div align="center">(台北)九型人格幫你找到好戀情<br>
                                <font color="#FF0000">(非會員 莊蓓欣)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2017/10/31<br></div>
                        </td>
                        <td>
                            <div align="center">2017/11/4 下午 02:00:00</div>
                        </td>
                        <td>揪約會 - 主題式約會</td>
                        <td>
                            <div align="center">(台北)九型人格幫你找到好戀情<br>
                                <font color="#FF0000">(非會員(呂宛真))</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2017/10/31<br></div>
                        </td>
                        <td>
                            <div align="center">2017/11/4 下午 02:00:00</div>
                        </td>
                        <td>揪約會 - 主題式約會</td>
                        <td>
                            <div align="center">(台北)九型人格幫你找到好戀情<br>
                                <font color="#FF0000">(非會員(黃致熒))</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2017/10/27<br></div>
                        </td>
                        <td>
                            <div align="center">2017/11/4 下午 02:00:00</div>
                        </td>
                        <td>揪約會 - 主題式約會</td>
                        <td>
                            <div align="center">(台北)九型人格幫你找到好戀情<br>
                                <font color="#FF0000">(非會員 陳姿均)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2017/10/27<br></div>
                        </td>
                        <td>
                            <div align="center">2017/11/4 下午 02:00:00</div>
                        </td>
                        <td>揪約會 - 主題式約會</td>
                        <td>
                            <div align="center">(台北)九型人格幫你找到好戀情<br>
                                <font color="#FF0000">(非會員 盧宛瑩)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(匯款)400</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2017/8/12<br></div>
                        </td>
                        <td>
                            <div align="center">2017/8/12 下午 07:00:00</div>
                        </td>
                        <td>心約會 - 品味生活</td>
                        <td>
                            <div align="center">(台北)來一趟調酒世界奇幻旅程<br>
                                <font color="#FF0000">(非會員 張玉柔)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                簡姿穎
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2017/7/15<br></div>
                        </td>
                        <td>
                            <div align="center">2017/7/15 下午 02:00:00</div>
                        </td>
                        <td>揪約會 - 主題式約會</td>
                        <td>
                            <div align="center">(台北)自己做點心-烘培俱樂部<br>
                                <font color="#FF0000">(非會員 鄭嘉淳)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2017/7/15<br></div>
                        </td>
                        <td>
                            <div align="center">2017/7/15 下午 02:00:00</div>
                        </td>
                        <td>揪約會 - 主題式約會</td>
                        <td>
                            <div align="center">(台北)自己做點心-烘培俱樂部<br>
                                <font color="#FF0000">(非會員 林芸琦)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2017/7/15<br></div>
                        </td>
                        <td>
                            <div align="center">2017/7/15 下午 02:00:00</div>
                        </td>
                        <td>揪約會 - 主題式約會</td>
                        <td>
                            <div align="center">(台北)自己做點心-烘培俱樂部<br>
                                <font color="#FF0000">(非會員 柯雯琪)</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2017/7/9<br></div>
                        </td>
                        <td>
                            <div align="center">2017/7/9 下午 02:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)瘋狂爆笑螢光泡泡足球<br>
                                <font color="#FF0000">(非會員(楊佩蓉))</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div align="center">2017/7/9<br></div>
                        </td>
                        <td>
                            <div align="center">2017/7/9 下午 02:00:00</div>
                        </td>
                        <td>趣約會 - 主題特別企劃</td>
                        <td>
                            <div align="center">(台北)瘋狂爆笑螢光泡泡足球<br>
                                <font color="#FF0000">(非會員(鄭琇文))</font>
                            </div>
                        </td>
                        <td>
                            <div align="center">(現金)300</div>
                        </td>
                        <td>
                            <div align="center">台北</div>
                        </td>
                        <td>
                            <div align="center">
                                吳哈克
                            </div>
                        </td>
                        <td>
                            <div align="center">
                                已報名
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan=8><a name="ac_data"></a>心約會：戀愛講堂 <font color=red>16</font> 次、魅力有約 <font color=red>1</font> 次、品味生活 <font color=red>2</font> 次、互動美學 0 次<br>趣約會：輕旅行 <font color=red>25</font> 次、主題特別企劃 <font color=red>66</font> 次、國外旅遊 0 次<br>饗約會：主題精緻餐會 0 次、美味廚房 <font color=red>9</font> 次、健康料理 0 次<br>愛約會：一對一排約 0 次、多平台排約 0 次<br>揪約會：多對多約會 0 次、主題式約會 <font color=red>16</font> 次、下午茶約會 <font color=red>6</font> 次<br>戀愛會客室：與名人有約 0 次、一對一個人解析諮詢 0 次、一對一整體造型諮詢 0 次、一對一愛情諮詢 0 次、約後一對一諮詢 0 次<br></td>
                    </tr>
                </table>
                <a name="love_data"></a>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <th></th>
                        <th>排約日期</th>
                        <th>排約會館</th>
                        <th>類型</th>
                        <th>排約人</th>
                        <th>排約人茶水費</th>
                        <th>排約對象</th>
                        <th>對象茶水費</th>
                        <th>排約回饋/評分</th>
                        <th></th>
                        <th>處理會館</th>
                        <th>處理秘書</th>
                    </tr>

                    <tr>
                        <td align="center">1</td>
                        <td align="center">2009/2/3 下午 07:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=182119" target="_blank">余志興</a>
                            (63)(大學)

                            <!--(0953514235) F123555184-->

                        </td>
                        <td align="center">
                            現金&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">李佳琪</td>
                    </tr>

                    <tr>
                        <td align="center">2</td>
                        <td align="center">2009/2/2 下午 08:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=182605" target="_blank">吳宗儒</a>
                            (66)(高職)

                            <!--(0911907976) F124079898-->

                        </td>
                        <td align="center">
                            現金&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            現金&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">李佳琪</td>
                    </tr>

                    <tr>
                        <td align="center">3</td>
                        <td align="center">2009/2/2 下午 07:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=171717" target="_blank">陳國勝</a>
                            (68)(專科)

                            <!--(0919901558) G121431780-->

                        </td>
                        <td align="center">
                            現金&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            現金&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">李佳琪</td>
                    </tr>

                    <tr>
                        <td align="center">4</td>
                        <td align="center">2009/2/2 下午 06:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=182282" target="_blank">郭茂昌</a>
                            (61)(高職)

                            <!--(0935920883) A123216016-->

                        </td>
                        <td align="center">
                            現金&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            現金&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">李佳琪</td>
                    </tr>

                    <tr>
                        <td align="center">5</td>
                        <td align="center">2009/1/15 下午 07:00:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=172472" target="_blank">張峻豪</a>
                            (69)(專科)

                            <!--(0933909180) A125162851-->

                        </td>
                        <td align="center">
                            現金&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">不明-Q220489861</td>
                    </tr>

                    <tr>
                        <td align="center">6</td>
                        <td align="center">2009/1/13 下午 06:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=172509" target="_blank">徐育彬</a>
                            (67)(大學)

                            <!--(0920670624) A125017995-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">7</td>
                        <td align="center">2009/1/11 下午 12:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=175477" target="_blank">陳菁蝗</a>
                            (66)(大學)

                            <!--(0919399343) F124402824-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">不明-Q220489861</td>
                    </tr>

                    <tr>
                        <td align="center">8</td>
                        <td align="center">2009/1/11 上午 10:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=176716" target="_blank">范宏源</a>
                            (63)(大學)

                            <!--(0918380777) E120597312-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;200
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">不明-Q220489861</td>
                    </tr>

                    <tr>
                        <td align="center">9</td>
                        <td align="center">2009/1/10 下午 01:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=181116" target="_blank">陳明遠</a>
                            (70)(專科)

                            <!--(0926216600) F125266957-->

                        </td>
                        <td align="center">
                            現金&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">10</td>
                        <td align="center">2009/1/8 下午 07:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=172192" target="_blank">張哲文</a>
                            (68)(大學)

                            <!--(0921784306) M121622767-->

                        </td>
                        <td align="center">
                            現金&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">11</td>
                        <td align="center">2009/1/8 下午 06:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=178838" target="_blank">林以堂</a>
                            (60)(碩士)

                            <!--(0912029729) L123758518-->

                        </td>
                        <td align="center">
                            現金&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">陳紅</td>
                    </tr>

                    <tr>
                        <td align="center">12</td>
                        <td align="center">2009/1/2 下午 04:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=733679" target="_blank">朱倪廷</a>
                            (68)(碩士)

                            <!--(0930054510) L122685838-->

                        </td>
                        <td align="center">
                            現金&nbsp;&nbsp;200
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">
                            <a class="lightbox" href="ad_mem_service.php?st=readreply&a=2242" data-lightbox="iframe" data-plugin-options='{"type":"ajax", "closeOnContentClick":false}'>排約回饋</a>&nbsp;&nbsp;
                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">不明-Q220489861</td>
                    </tr>

                    <tr>
                        <td align="center">13</td>
                        <td align="center">2009/1/2 下午 03:00:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=103469" target="_blank">賴文政</a>
                            (63)(碩士)

                            <!--(0935180848) N121781404-->

                        </td>
                        <td align="center">
                            現金&nbsp;&nbsp;0
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">不明-Q220489861</td>
                    </tr>

                    <tr>
                        <td align="center">14</td>
                        <td align="center">2008/12/28 下午 02:00:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=175522" target="_blank">許天福</a>
                            (62)(專科)

                            <!--(0939109682) C120703818-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (69)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">陳紅</td>
                    </tr>

                    <tr>
                        <td align="center">15</td>
                        <td align="center">2008/12/28 下午 01:00:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=179578" target="_blank">郭鄧發</a>
                            (65)(大學)

                            <!--(0919391637) F123452679-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">16</td>
                        <td align="center">2008/12/27 下午 03:00:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=171962" target="_blank">許育彰</a>
                            (63)(專科)

                            <!--(0983102821) A121901147-->

                        </td>
                        <td align="center">
                            現金&nbsp;&nbsp;200
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">17</td>
                        <td align="center">2008/12/27 下午 01:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=168908" target="_blank">黃威斯</a>
                            (66)(專科)

                            <!--(0920316522) F130210958-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">18</td>
                        <td align="center">2008/12/26 下午 07:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=104663" target="_blank">蔡佳宏</a>
                            (61)(大學)

                            <!--(0922005513) L120632400-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;200
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">19</td>
                        <td align="center">2008/12/25 下午 07:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=unknown" target="_blank">無紀錄</a>
                            (68)(專科)

                            <!--(unknown) H122511162-->

                        </td>
                        <td align="center">
                            現金&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (69)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">不明-Q220489861</td>
                    </tr>

                    <tr>
                        <td align="center">20</td>
                        <td align="center">2008/12/23 下午 07:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=171979" target="_blank">黎永揚</a>
                            (68)(專科)

                            <!--(0939521266) A125110508-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (69)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">不明-Q220489861</td>
                    </tr>

                    <tr>
                        <td align="center">21</td>
                        <td align="center">2008/12/20 下午 04:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=105914" target="_blank">李宏仁</a>
                            (64)(大學)

                            <!--(0915023816) Q120848993-->

                        </td>
                        <td align="center">
                            現金&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">22</td>
                        <td align="center">2008/12/20 下午 03:00:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173378" target="_blank">陳奕志</a>
                            (68)(碩士)

                            <!--(0955850037) F124813809-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;200
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">23</td>
                        <td align="center">2008/12/20 下午 01:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=178836" target="_blank">劉慈航</a>
                            (58)(專科)

                            <!--(0955001848) T120190306-->

                        </td>
                        <td align="center">
                            現金&nbsp;&nbsp;200
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">24</td>
                        <td align="center">2008/12/19 下午 07:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=178709" target="_blank">徐銘鴻</a>
                            (59)(高職)

                            <!--(0937097630) F121861358-->

                        </td>
                        <td align="center">
                            現金&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">不明-Q220489861</td>
                    </tr>

                    <tr>
                        <td align="center">25</td>
                        <td align="center">2008/12/15 下午 07:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=105996" target="_blank">周立恆</a>
                            (68)(大學)

                            <!--(0921019332) D121543157-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;200
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">不明-Q220489861</td>
                    </tr>

                    <tr>
                        <td align="center">26</td>
                        <td align="center">2008/12/13 下午 05:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=103555" target="_blank">田松枝</a>
                            (62)(國中)

                            <!--(0986027999) G120508997-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;200
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">不明-Q220489861</td>
                    </tr>

                    <tr>
                        <td align="center">27</td>
                        <td align="center">2008/12/13 下午 04:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=105904" target="_blank">李宗儒</a>
                            (68)(碩士)

                            <!--(0920707327) F124602182-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;200
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">不明-Q220489861</td>
                    </tr>

                    <tr>
                        <td align="center">28</td>
                        <td align="center">2008/12/13 下午 03:00:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=171884" target="_blank">張秉勳</a>
                            (69)(大學)

                            <!--(0918199943) F125059381-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">不明-Q220489861</td>
                    </tr>

                    <tr>
                        <td align="center">29</td>
                        <td align="center">2008/12/13 下午 01:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=102731" target="_blank">郭志宏</a>
                            (66)(碩士)

                            <!--(0913036510) A124449742-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;200
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">不明-Q220489861</td>
                    </tr>

                    <tr>
                        <td align="center">30</td>
                        <td align="center">2008/12/7 下午 03:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=177357" target="_blank">尤彥欽</a>
                            (71)(高中)

                            <!--(0918987383) T123102540-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">31</td>
                        <td align="center">2008/12/7 下午 02:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=172517" target="_blank">黃咸琛</a>
                            (64)(大學)

                            <!--(0910685138) M120718979-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">32</td>
                        <td align="center">2008/12/7 下午 01:00:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=103238" target="_blank">林定緯</a>
                            (69)(大學)

                            <!--(0958559109) K121762443-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">33</td>
                        <td align="center">2008/12/6 下午 03:00:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=103912" target="_blank">呂國志</a>
                            (59)(大學)

                            <!--(0938307110) F121928652-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;200
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">34</td>
                        <td align="center">2008/12/6 下午 01:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=172595" target="_blank">羅濟棠</a>
                            (66)(專科)

                            <!--(0918087632) K121416213-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;200
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">35</td>
                        <td align="center">2008/12/4 下午 07:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=105884" target="_blank">施程畯</a>
                            (64)(大學)

                            <!--(0920486016) F123719937-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;200
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">陳紅</td>
                    </tr>

                    <tr>
                        <td align="center">36</td>
                        <td align="center">2008/11/22 下午 06:45:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=144266" target="_blank">邱奕彬</a>
                            (64)(專科)

                            <!--(0932091689) H121972367-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">37</td>
                        <td align="center">2008/11/22 下午 05:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=168028" target="_blank">陳俊言</a>
                            (68)(專科)

                            <!--(0931059769) A124628627-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">38</td>
                        <td align="center">2008/11/20 下午 05:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=unknown" target="_blank">無紀錄</a>
                            (65)(大學)

                            <!--(unknown) A122154160-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;200
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">39</td>
                        <td align="center">2008/11/16 下午 01:00:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=104742" target="_blank">黃鴻文</a>
                            (68)(專科)

                            <!--(0926817954) U121225961-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;200
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">40</td>
                        <td align="center">2008/11/16 下午 12:00:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=175521" target="_blank">翁進榮</a>
                            (71)(高職)

                            <!--(0915162651) R123043393-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">41</td>
                        <td align="center">2008/11/16 上午 11:00:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=175066" target="_blank">賴長志</a>
                            (74)(專科)

                            <!--(0918894262) A128165774-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">42</td>
                        <td align="center">2008/10/25 下午 04:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=101311" target="_blank">陳繹閔</a>
                            (65)(大學)

                            <!--(0982060762) N122888948-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">43</td>
                        <td align="center">2008/10/25 下午 02:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=unknown" target="_blank">無紀錄</a>
                            (63)(大學)

                            <!--(unknown) S121395760-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">44</td>
                        <td align="center">2008/10/23 下午 07:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173466" target="_blank">詹宜璋</a>
                            (65)(大學)

                            <!--(0918220528) P122101009-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;200
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">45</td>
                        <td align="center">2008/10/23 下午 06:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=172944" target="_blank">李志偉</a>
                            (65)(專科)

                            <!--(0922080106) D121487707-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;300
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (65)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">46</td>
                        <td align="center">2008/10/19 下午 02:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=104497" target="_blank">吳正盛</a>
                            (69)(專科)

                            <!--(0922550819) A125142199-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;200
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (69)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                    <tr>
                        <td align="center">47</td>
                        <td align="center">2008/10/19 下午 01:30:00</td>
                        <td align="center">台北</td>
                        <td align="center">一般排約</td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=105397" target="_blank">李永發</a>
                            (66)(高職)

                            <!--(0912509233) F123666431-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;200
                        </td>
                        <td align="center">
                            <a href="ad_mem_detail.php?mem_num=173134" target="_blank">鄭小姐</a>
                            (69)(大學)

                            <!--  (0900000001) A000000002-->

                        </td>
                        <td align="center">
                            茶卷&nbsp;&nbsp;0
                        <td align="center">

                        </td>
                        <td align="center">無</td>
                        <td align="center">台北</td>
                        <td align="center">郁靜</td>
                    </tr>

                </table>


                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tr>
                        <td colspan="2">
                            <div align="center"><b>禮物收件記錄</b></div>
                        </td>
                    </tr>
                    <tr>
                        <td width="250">
                            <div align="center">禮物寄件者</div>
                        </td>
                        <td width="404">
                            <div align="center">禮物標題</div>
                        </td>
                    </tr>

                    <tr>

                        <td>
                            <div align="center">999999</div>
                        </td>

                        <td>
                            <div align="center">
                                <font color="#000000">祝你生日快樂
                            </div>
                        </td>
                    </tr>

                    <tr>

                        <td>
                            <div align="center">999999</div>
                        </td>

                        <td>
                            <div align="center">
                                <font color="#000000">祝你生日快樂
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->
    <hr>

    <footer>
    </footer>
    </div>
    </div>

    </div>
    <!--/.fluid-container-->

</section>
<!-- /MIDDLE -->

<?php
require("./include/_bottom.php");
?>

<script type="text/javascript">
    $(function() {

        //if(typeof($.fn.popover) != 'undefined'){
        /*
$(".cpopover").popover({
    html: true,
    placement: 'left',
    trigger: 'manual',    
    content: function() {
      return $.ajax({method: "POST",url: 'ad_mem_service.php?st=readreply&a='+$(this).data("loveauto"),
                     dataType: 'html',
                     async: false}).responseText;
    }
  }).click(function(e) {  	
    $(this).popover('toggle');
  });
  
$(".cpopover2").popover({
    html: true,
    placement: 'left',
    trigger: 'manual',    
    content: function() {
    	var $th = $(this).data("href");    	
      return $.ajax({method: "POST",url: $th,
                     dataType: 'html',
                     async: false}).responseText;
    }
  }).click(function(e) {  	
    $(this).popover('toggle');
  });*/
        //}
    });
</script>