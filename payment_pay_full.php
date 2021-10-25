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
            <li class="active">秘書業績</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>秘書業績 - 2021 年 10 月</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form name="form1" method="post" action="?vst=full">
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
                    </form>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <th>排名</th>
                                <th>會館</th>
                                <th>秘書</th>
                                <th>身分證字號</th>
                                <th>到職日</th>
                                <th>職稱</th>
                                <th>業績</th>
                            </tr>

                            <tr>
                                <td>1</td>
                                <td>台北</td>
                                <td>高語鍹</td>
                                <td>J220390453</td>
                                <td>95/3/1</td>
                                <td>資深客戶經理</td>
                                <td>489708</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>台北</td>
                                <td>詹善宇</td>
                                <td>F220056613</td>
                                <td>97/3/1</td>
                                <td>諮詢顧問</td>
                                <td>364392</td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>台南</td>
                                <td>杜佳倩</td>
                                <td>D221429903</td>
                                <td>95/7/24</td>
                                <td>組織副督導</td>
                                <td>328693</td>
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