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
            <li class="active">回報紀錄表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>回報紀錄表 - 數量：500　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <form action="ad_report_list.php" class="form-inline" method="post" name="form1">
                        <p>
                            回報日期： <input type="text" name="y1" id="y1" class="datepicker" autocomplete="off" value="">　～　<input type="text" name="y2" id="y2" class="datepicker" autocomplete="off" value="">
                        </p>
                        <p>
                            會館：
                            <select name="s6" id="s6">
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
                            </select>
                            秘書：
                            <select name="s7" id="s7">
                                <option value="">請選擇</option>
                            </select>
                            姓名：
                            <input name="s3" class="form-control" type="text">
                            <select name="qt" id="qt">
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
                                <option value="log_6">預約下次通話</option>
                            </select>
                            <input type="submit" value="送出" class="btn btn-default">
                        </p>
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <td width="131">
                                <div align="center" class="style3">回報日期</div>
                            </td>
                            <td width="84">
                                <div align="center" class="style3">類型</div>
                            </td>
                            <td width="71">
                                <div align="center" class="style3">姓名</div>
                            </td>
                            <td width="55">
                                <div align="center" class="style3"></div>
                            </td>
                            <td width="56">
                                <div align="center" class="style3"></div>
                            </td>
                            <td width="333">
                                <div align="center" class="style3">內容</div>
                            </td>
                            <td width="78">
                                <div align="center" class="style3">處理會館</div>
                            </td>
                            <td width="62">
                                <div align="center" class="style3">處理秘書</div>
                            </td>
                            <td width="72">&nbsp;</td>
                        </tr>

                        <tr>
                            <td>
                                <div align="center">2021-10-18 15:06</div>
                            </td>

                            <td>
                                <div align="center">會員系統</div>
                            </td>

                            <td>
                                <div align="center"><a href="ad_mem_detail.php?mem_au=1923436" target="_blank">約專示範帳號-女</a></div>
                            </td>
                            <td>
                                <div align="center">系統紀錄</div>
                            </td>
                            <td>
                                <div align="center"></div>
                            </td>
                            <td>宜君於2021-10-18 15:06將會員權益自璀璨會員-二年期修改成璀璨VIP會員-二年期 - 效期至2021/4/14~2023/4/14</td>
                            <td>
                                <div align="center">總管理處</div>
                            </td>
                            <td>
                                <div align="center">宜君</div>
                            </td>
                            <td>
                                <div align="center"><a href="#" onClick="Mars_popup('ad_report.php?k_id=1923436&lu=Y123456789&ty=member','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')">查看</a></div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="center">2021-10-15 17:04</div>
                            </td>

                            <td>
                                <div align="center">會員系統</div>
                            </td>

                            <td>
                                <div align="center"><a href="ad_mem_detail.php?mem_au=628689" target="_blank">陳曉娟</a></div>
                            </td>
                            <td>
                                <div align="center">系統紀錄</div>
                            </td>
                            <td>
                                <div align="center"></div>
                            </td>
                            <td>宜君於2021-10-15 17:04將會員權益自璀璨VIP會員-二年期修改成網站會員</td>
                            <td>
                                <div align="center">總管理處</div>
                            </td>
                            <td>
                                <div align="center">宜君</div>
                            </td>
                            <td>
                                <div align="center"><a href="#" onClick="Mars_popup('ad_report.php?k_id=628689&lu=HANNAH0807&ty=member','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')">查看</a></div>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 25 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_report_list.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_report_list.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_report_list.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_report_list.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_report_list.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_report_list.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_report_list.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_report_list.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_report_list.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_report_list.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_report_list.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_report_list.php?topage=25 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_report_list.php?topage=1" selected>1</option>
                            <option value="/ad_report_list.php?topage=2">2</option>
                            <option value="/ad_report_list.php?topage=3">3</option>
                            <option value="/ad_report_list.php?topage=4">4</option>
                            <option value="/ad_report_list.php?topage=5">5</option>
                            <option value="/ad_report_list.php?topage=6">6</option>
                            <option value="/ad_report_list.php?topage=7">7</option>
                            <option value="/ad_report_list.php?topage=8">8</option>
                            <option value="/ad_report_list.php?topage=9">9</option>
                            <option value="/ad_report_list.php?topage=10">10</option>
                            <option value="/ad_report_list.php?topage=11">11</option>
                            <option value="/ad_report_list.php?topage=12">12</option>
                            <option value="/ad_report_list.php?topage=13">13</option>
                            <option value="/ad_report_list.php?topage=14">14</option>
                            <option value="/ad_report_list.php?topage=15">15</option>
                            <option value="/ad_report_list.php?topage=16">16</option>
                            <option value="/ad_report_list.php?topage=17">17</option>
                            <option value="/ad_report_list.php?topage=18">18</option>
                            <option value="/ad_report_list.php?topage=19">19</option>
                            <option value="/ad_report_list.php?topage=20">20</option>
                            <option value="/ad_report_list.php?topage=21">21</option>
                            <option value="/ad_report_list.php?topage=22">22</option>
                            <option value="/ad_report_list.php?topage=23">23</option>
                            <option value="/ad_report_list.php?topage=24">24</option>
                            <option value="/ad_report_list.php?topage=25">25</option>
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
require_once("./include/_bottom.php")
?>

<script type="text/javascript">
    $(function() {
        $("#s6").on("change", function() {
            personnel_get("s6", "s7");
        });

    });
</script>