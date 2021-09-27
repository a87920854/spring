<?php
require_once("./include/_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php")
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">好好玩旅行社回報紀錄表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>好好玩旅行社回報紀錄表 - 數量：14327</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form action="ad_fun_report_list.php" method="post" name="form1" class="form-inline">
                        <p>回報日期：
                            <select name="y1" style="width:80px;">
                                <option value="" selected>請選擇</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                            </select>
                            年
                            <select name="m1" style="width:80px;">
                                <option value="">請選擇</option>
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
                            <select name="d1" style="width:80px;">
                                <option value="">請選擇</option>
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
                            日~
                            <select name="y2" style="width:80px;">
                                <option value="" selected>請選擇</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                            </select>
                            年
                            <select name="m2" style="width:80px;">
                                <option value="">請選擇</option>
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
                            <select name="d2" style="width:80px;">
                                <option value="">請選擇</option>
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
                        </p>
                        <p>會館：
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
                                <option value="好好玩旅行社">好好玩旅行社</option>
                            </select>
                            秘書：
                            <select name="s7" id="s7">
                                <option value="">請選擇</option>
                            </select>
                            姓名：
                            <input name="s3" type="text" class="form-control">
                        </p>
                        <p>
                            處理情形：<select name="s8">
                                <option value="">請選擇</option>
                                <option value="有意願">有意願</option>
                                <option value="無意願">無意願</option>
                                <option value="下次聯絡">下次聯絡</option>
                                <option value="未接">未接</option>
                                <option value="停話">停話</option>
                                <option value="PASS春天">PASS春天</option>
                                <option value="勿再聯絡">勿再聯絡</option>
                            </select>
                            <select name="s9">
                                <option value="">請選擇</option>
                                <option value="不確定時間">不確定時間</option>
                                <option value="考量1-3月出國">考量1-3月出國</option>
                                <option value="考量4-6月出國">考量4-6月出國</option>
                                <option value="考量7-9月出國">考量7-9月出國</option>
                                <option value="考量10-12月出國">考量10-12月出國</option>
                                <option value="不確定地點">不確定地點</option>
                                <option value="考量去東北亞(日韓)">考量去東北亞(日韓)</option>
                                <option value="考量去東南亞(馬新泰菲印)">考量去東南亞(馬新泰菲印)</option>
                                <option value="考量去自由行">考量去自由行</option>
                                <option value="考量去島嶼">考量去島嶼</option>
                                <option value="考量去澳洲">考量去澳洲</option>
                                <option value="考量去美加">考量去美加</option>
                            </select>
                            　<input type="submit" name="Submit" style="height:28px;margin-top:-7px;" value="查詢"> <input type="reset" name="reset" style="height:28px;margin-top:-7px;" value="清空">
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
                                <div align="center">2021/6/12 下午 08:07:00</div>
                            </td>

                            <td>
                                <div align="center">春天會員<br>會員列表</div>
                            </td>

                            <td>
                                <div align="center"><a href="#" onClick="Mars_popup('ad_fun_mem_detail.php?mem_au=3820','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')">孫偉文</a></div>
                            </td>
                            <td>
                                <div align="center">未接</div>
                            </td>
                            <td>
                                <div align="center"></div>
                            </td>
                            <td></td>
                            <td>
                                <div align="center">台南</div>
                            </td>
                            <td>
                                <div align="center">台南督導</div>
                            </td>
                            <td>
                                <div align="center"><a href="#" onClick="Mars_popup('ad_fun_report.php?k_id=3820&ty=member','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')">查看</a></div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="center">2021/6/12 下午 08:01:00</div>
                            </td>

                            <td>
                                <div align="center">春天會員<br>會員列表</div>
                            </td>

                            <td>
                                <div align="center"><a href="#" onClick="Mars_popup('ad_fun_mem_detail.php?mem_au=3813','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')">林淑媛</a></div>
                            </td>
                            <td>
                                <div align="center">未接</div>
                            </td>
                            <td>
                                <div align="center"></div>
                            </td>
                            <td></td>
                            <td>
                                <div align="center">台南</div>
                            </td>
                            <td>
                                <div align="center">台南督導</div>
                            </td>
                            <td>
                                <div align="center"><a href="#" onClick="Mars_popup('ad_fun_report.php?k_id=3813&ty=member','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')">查看</a></div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="center">2021/6/12 下午 07:08:00</div>
                            </td>

                            <td>
                                <div align="center">春天會員<br>會員列表</div>
                            </td>

                            <td>
                                <div align="center"><a href="#" onClick="Mars_popup('ad_fun_mem_detail.php?mem_au=4879','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')">陳慧芳</a></div>
                            </td>
                            <td>
                                <div align="center">未接</div>
                            </td>
                            <td>
                                <div align="center"></div>
                            </td>
                            <td></td>
                            <td>
                                <div align="center">台南</div>
                            </td>
                            <td>
                                <div align="center">台南督導</div>
                            </td>
                            <td>
                                <div align="center"><a href="#" onClick="Mars_popup('ad_fun_report.php?k_id=4879&ty=member','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')">查看</a></div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="center">2021/6/12 下午 07:08:00</div>
                            </td>

                            <td>
                                <div align="center">春天會員<br>會員列表</div>
                            </td>

                            <td>
                                <div align="center"><a href="#" onClick="Mars_popup('ad_fun_mem_detail.php?mem_au=4886','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')">陳婉菱</a></div>
                            </td>
                            <td>
                                <div align="center">未接</div>
                            </td>
                            <td>
                                <div align="center"></div>
                            </td>
                            <td></td>
                            <td>
                                <div align="center">台南</div>
                            </td>
                            <td>
                                <div align="center">台南督導</div>
                            </td>
                            <td>
                                <div align="center"><a href="#" onClick="Mars_popup('ad_fun_report.php?k_id=4886&ty=member','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')">查看</a></div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="center">2021/5/17 下午 02:26:00</div>
                            </td>

                            <td>
                                <div align="center">春天會員<br>會員列表</div>
                            </td>

                            <td>
                                <div align="center"><a href="#" onClick="Mars_popup('ad_fun_mem_detail.php?mem_au=4697','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')">吳柏毅</a></div>
                            </td>
                            <td>
                                <div align="center">勿再聯絡</div>
                            </td>
                            <td>
                                <div align="center"></div>
                            </td>
                            <td>結婚</td>
                            <td>
                                <div align="center">桃園</div>
                            </td>
                            <td>
                                <div align="center">江琳</div>
                            </td>
                            <td>
                                <div align="center"><a href="#" onClick="Mars_popup('ad_fun_report.php?k_id=4697&ty=member','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')">查看</a></div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="center">2021/5/17 下午 02:23:00</div>
                            </td>

                            <td>
                                <div align="center">春天會員<br>會員列表</div>
                            </td>

                            <td>
                                <div align="center"><a href="#" onClick="Mars_popup('ad_fun_mem_detail.php?mem_au=7255','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')">饒錦棋</a></div>
                            </td>
                            <td>
                                <div align="center">未接</div>
                            </td>
                            <td>
                                <div align="center"></div>
                            </td>
                            <td></td>
                            <td>
                                <div align="center">桃園</div>
                            </td>
                            <td>
                                <div align="center">江琳</div>
                            </td>
                            <td>
                                <div align="center"><a href="#" onClick="Mars_popup('ad_fun_report.php?k_id=7255&ty=member','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')">查看</a></div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div align="center">2021/5/17 下午 02:20:00</div>
                            </td>

                            <td>
                                <div align="center">春天會員<br>會員列表</div>
                            </td>

                            <td>
                                <div align="center"><a href="#" onClick="Mars_popup('ad_fun_mem_detail.php?mem_au=7283','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')">黃冠融</a></div>
                            </td>
                            <td>
                                <div align="center">無意願</div>
                            </td>
                            <td>
                                <div align="center"></div>
                            </td>
                            <td>交往中</td>
                            <td>
                                <div align="center">桃園</div>
                            </td>
                            <td>
                                <div align="center">江琳</div>
                            </td>
                            <td>
                                <div align="center"><a href="#" onClick="Mars_popup('ad_fun_report.php?k_id=7283&ty=member','',' scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10')">查看</a></div>
                            </td>
                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 200 筆、第 1 頁／共 10 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_fun_report_list.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_fun_report_list.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_fun_report_list.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_fun_report_list.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_fun_report_list.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_fun_report_list.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_fun_report_list.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_fun_report_list.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_fun_report_list.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_fun_report_list.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_fun_report_list.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_fun_report_list.php?topage=10 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_fun_report_list.php?topage=1" selected>1</option>
                            <option value="/ad_fun_report_list.php?topage=2">2</option>
                            <option value="/ad_fun_report_list.php?topage=3">3</option>
                            <option value="/ad_fun_report_list.php?topage=4">4</option>
                            <option value="/ad_fun_report_list.php?topage=5">5</option>
                            <option value="/ad_fun_report_list.php?topage=6">6</option>
                            <option value="/ad_fun_report_list.php?topage=7">7</option>
                            <option value="/ad_fun_report_list.php?topage=8">8</option>
                            <option value="/ad_fun_report_list.php?topage=9">9</option>
                            <option value="/ad_fun_report_list.php?topage=10">10</option>
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

<script type="text/javascript">
    $(function() {
        $("#s6").on("change", function() {
            personnel_get("s6", "s7");

        });
    });
</script>