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
            <li><a href="ad_master_index.php">督導管理系統</a></li>
            <li>財務管理系統</li>
            <li class="active">月明細表 - 台北 - 2021 年 2 月</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>月明細表 - 台北 - 2021 年 2 月</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form name="form1" method="post" action="?vst=full">

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
                        　<input type="submit" name="Submit" class="btn btn-default" value="查詢">
                </div>
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
                            <th>應收</th>
                            <th>實收</th>
                            <th>會館</th>
                            <th>業績</th>
                        </tr>

                        <tr>
                            <td>235844</td>
                            <td>2021/2/28</td>
                            <td>台北</td>
                            <td>高語鍹</td>
                            <td>紀竑翊</td>
                            <td>退費會費-無</td>
                            <td></td>
                            <td>-35000</td>
                            <td>新竹</td>
                            <td>-21000</td>
                        </tr>

                        <tr>
                            <td>235844</td>
                            <td>2021/2/28</td>
                            <td>台北</td>
                            <td>高語鍹</td>
                            <td>紀竑翊</td>
                            <td>退費會費-無</td>
                            <td></td>
                            <td>-35000</td>
                            <td>台北</td>
                            <td>-14000</td>
                        </tr>

                        <tr>
                            <td>235749</td>
                            <td>2021/2/26</td>
                            <td>台北</td>
                            <td>黃明儀</td>
                            <td>周顯霖</td>
                            <td>退費會費-無</td>
                            <td></td>
                            <td>-34000</td>
                            <td>台北</td>
                            <td>-34000</td>
                        </tr>


                        <tr>
                            <td colspan=9 align=right>小計</td>
                            <td>1831850</td>
                        </tr>
                    </tbody>
                </table>

                <p>會館接收業績明細</p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th>編號</th>
                            <th>日期</th>
                            <th>會館</th>
                            <th>受理秘書</th>
                            <th>姓名</th>
                            <th>摘要及說明</th>
                            <th>應收</th>
                            <th>實收</th>
                            <th>會館</th>
                            <th>業績</th>
                        </tr>


                        <tr>
                            <td>235237</td>
                            <td>2021/2/17</td>
                            <td>台南</td>
                            <td>顏延琇</td>
                            <td>張時宜</td>
                            <td>入會-無</td>
                            <td>100</td>
                            <td>100</td>
                            <td>台北</td>
                            <td>60</td>
                        </tr>

                        <tr>
                            <td>235154</td>
                            <td>2021/2/8</td>
                            <td>桃園</td>
                            <td>林均澤</td>
                            <td>陳世彬</td>
                            <td>入會-璀璨一年</td>
                            <td>40000</td>
                            <td>40000</td>
                            <td>台北</td>
                            <td>24000</td>
                        </tr>

                        <tr>
                            <td colspan=9 align=right>小計</td>
                            <td>32520</td>
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