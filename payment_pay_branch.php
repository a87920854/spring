<?php
require_once("_inc.php");
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
            <li>會計部系統</li>
            <li class="active">會館收入日明細表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->


        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會館收入日明細表 - 所有會館 - 2021 年 10 月</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form name="form1" method="post" action="?vst=full" class="form-inline">

                        會館：<select name="branch">
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
                            <option value="好好玩旅行社">好好玩旅行社</option>
                        </select>　
                        日期：
                        <select name="y1">
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
                        <select name="m1">
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
                        <select name="d1">
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
                        日　<select name="keyword_type" id="keyword_type">
                            <option value="s2">姓名</option>
                            <option value="s3">身分證字號</option>
                            <option value="s1">編號</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text">
                        <input type="submit" name="Submit" class="btn btn-default" value="查詢">
                </div>

                <p><input type="button" class="btn btn-info" onclick="Mars_popup('payment_pay_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=900,height=600,top=150,left=150');" value="新增收入憑證">

                    <!--						 	<input type="button" class="btn btn-default" onclick="Mars_popup('payment_pay_add_.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=900,height=600,top=150,left=150');" value="新增憑證(新)">-->
                </p>
                <p>會館拆分業績明細</p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th>編號</th>
                            <th>日期</th>
                            <th>會館</th>
                            <th>受理秘書</th>
                            <th>姓名</th>
                            <th>摘要及說明</th>
                            <th>現金</th>
                            <th>轉帳</th>
                            <th>刷卡號</th>
                            <th>實收</th>
                            <th>會館</th>
                            <th>成本</th>
                            <th>業績</th>
                            <th></th>
                        </tr>

                        <tr>
                            <td>246381</td>
                            <td>2021/10/24</td>
                            <td>新竹</td>
                            <td></td>
                            <td></td>
                            <td>排約-</td>

                            <td>無</td>
                            <td>無</td>
                            <td>無</td>
                            <td>1800</td>
                            <td>新竹</td>
                            <td>0</td>
                            <td>900</td>
                            <td>
                                <a href="javascript:;" onClick="Mars_popup2('payment_list.php?st=del&pay_auto=246381','','width=300,height=200,top=30,left=30')">刪除</a>

                            </td>
                        </tr>

                        <tr>
                            <td>246373</td>
                            <td>2021/10/24</td>
                            <td>新竹</td>
                            <td>劉筱萍</td>
                            <td>謝竣宇</td>
                            <td>入會-璀璨一年</td>

                            <td>2000</td>
                            <td>無</td>
                            <td>無</td>
                            <td>2000</td>
                            <td>高雄</td>
                            <td>0</td>
                            <td>1000</td>
                            <td>
                                <a href="javascript:;" onClick="Mars_popup2('payment_list.php?st=del&pay_auto=246373','','width=300,height=200,top=30,left=30')">刪除</a>

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
require_once("./include/_bottom.php")
?>