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
            <li class="active">人事資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>人事資料 - 總管理處 - 在職</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <input type="button" class="btn btn-info pull-left margin-right-10" onclick="Mars_popup('people_pay_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=760,height=450,top=150,left=150');" value="新增人事資料">
                    <form name="form1" method="post" action="people_pay_list.php">
                        <select name="vst">
                            <option value="">在職</option>
                            <option value="leave">離職</option>
                        </select>
                        　<input type="submit" name="Submit" class="btn btn-default" value="查詢">
                    </form>
                </div>　
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th>填表日</th>
                            <th>流水號</th>
                            <th>姓名</th>
                            <th>別名</th>
                            <th>出生日期</th>
                            <th>身分證字號</th>
                            <th>到職日</th>
                            <th>職稱</th>
                            <th>會館</th>
                            <th></th>
                        </tr>

                        <tr>
                            <td>2005/8/26 上午 10:21:00</td>
                            <td>17</td>
                            <td>陳獻楨</td>
                            <td>陳獻楨</td>
                            <td>47/2/21</td>
                            <td>F121287192</td>
                            <td>83/10/24</td>
                            <td>董事長</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=17">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2005/8/26 上午 11:06:00</td>
                            <td>19</td>
                            <td>黃雅芳</td>
                            <td>黃雅芳</td>
                            <td>62/9/16</td>
                            <td>N222722198</td>
                            <td>86/6/26</td>
                            <td>總經理</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=19">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2006/3/23 下午 12:50:00</td>
                            <td>181</td>
                            <td>陳秋如</td>
                            <td>陳秋如</td>
                            <td>58/9/18</td>
                            <td>F220999122</td>
                            <td>95/3/16</td>
                            <td>會計主任</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=181">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2006/11/29 下午 03:40:00</td>
                            <td>240</td>
                            <td>劉澔翰</td>
                            <td>劉澔翰</td>
                            <td>72/5/11</td>
                            <td>F125941311</td>
                            <td>103/2/5</td>
                            <td>工程師</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=240">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2007/8/16 下午 12:12:29</td>
                            <td>310</td>
                            <td>怡心社</td>
                            <td>怡心社</td>
                            <td>30/1/1</td>
                            <td>A123456789</td>
                            <td>96/7/25</td>
                            <td>其他</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=310">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2007/8/31 下午 01:22:54</td>
                            <td>315</td>
                            <td>佳緣</td>
                            <td>佳緣</td>
                            <td>30/1/1</td>
                            <td>A123</td>
                            <td>96/8/31</td>
                            <td>其他</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=315">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2008/6/16 下午 03:07:40</td>
                            <td>406</td>
                            <td>外部A名單</td>
                            <td>外部A名單</td>
                            <td>30/1/1</td>
                            <td>外部A名單</td>
                            <td>97/6/14</td>
                            <td>其他</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=406">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2009/3/6 下午 04:04:27</td>
                            <td>492</td>
                            <td>向日葵名單</td>
                            <td>向日葵名單</td>
                            <td>90/8/11</td>
                            <td>通路名單</td>
                            <td>100/8/11</td>
                            <td>其他</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=492">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2009/3/16 下午 01:51:55</td>
                            <td>495</td>
                            <td>520客服</td>
                            <td>520客服</td>
                            <td>90/3/16</td>
                            <td>520客服</td>
                            <td>98/3/16</td>
                            <td>諮詢顧問</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=495">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2009/9/8 下午 02:54:00</td>
                            <td>559</td>
                            <td>網站行銷</td>
                            <td>網站行銷</td>
                            <td>30/1/1</td>
                            <td>網站行銷</td>
                            <td>98/9/8</td>
                            <td>諮詢顧問</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=559">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2010/12/2 下午 02:11:22</td>
                            <td>675</td>
                            <td>流水陌CALL</td>
                            <td>流水陌CALL</td>
                            <td>30/1/1</td>
                            <td>陌CALL</td>
                            <td>99/12/1</td>
                            <td>諮詢顧問</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=675">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2011/4/30 下午 02:50:51</td>
                            <td>716</td>
                            <td>黃旭</td>
                            <td>黃旭</td>
                            <td>74/10/20</td>
                            <td>A128047262</td>
                            <td>100/4/25</td>
                            <td>其他</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=716">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2011/9/19 下午 02:08:33</td>
                            <td>758</td>
                            <td>廖瑜婷</td>
                            <td>廖瑜婷</td>
                            <td>73/10/31</td>
                            <td>H223056895</td>
                            <td>100/8/4</td>
                            <td>特助</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=758">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2012/1/6 下午 06:08:06</td>
                            <td>790</td>
                            <td>通路王</td>
                            <td>通路王</td>
                            <td>30/1/1</td>
                            <td>F000000000</td>
                            <td>100/1/1</td>
                            <td>諮詢顧問</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=790">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2012/12/3 下午 12:58:36</td>
                            <td>873</td>
                            <td>曾欣怡</td>
                            <td>曾欣怡</td>
                            <td>77/4/28</td>
                            <td>F226793991</td>
                            <td>101/11/5</td>
                            <td>行銷企劃</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=873">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2013/10/30 上午 11:12:09</td>
                            <td>956</td>
                            <td>葉儀菁</td>
                            <td>葉儀菁</td>
                            <td>61/11/15</td>
                            <td>F220902530</td>
                            <td>102/10/1</td>
                            <td>行銷部經理</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=956">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2014/3/3 下午 05:20:39</td>
                            <td>976</td>
                            <td>吳姿儀</td>
                            <td>吳姿儀</td>
                            <td>71/2/6</td>
                            <td>F228454111</td>
                            <td>103/12/16</td>
                            <td>美編</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=976">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2014/6/6 下午 02:13:34</td>
                            <td>1014</td>
                            <td>林佳琪</td>
                            <td>林佳琪</td>
                            <td>70/10/30</td>
                            <td>F225049994</td>
                            <td>103/6/6</td>
                            <td>美編</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=1014">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2014/8/5 下午 06:07:45</td>
                            <td>1034</td>
                            <td>陳曉娟</td>
                            <td>陳曉娟</td>
                            <td>80/8/7</td>
                            <td>F227014739</td>
                            <td>103/8/5</td>
                            <td>行銷企劃</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=1034">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2014/12/1 下午 04:58:43</td>
                            <td>1085</td>
                            <td>約專LINE POINTS</td>
                            <td>約專LINE POINTS</td>
                            <td>88/8/8</td>
                            <td> 外部B名單</td>
                            <td>109/12/22</td>
                            <td>其他</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=1085">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2014/12/26 下午 03:46:02</td>
                            <td>1090</td>
                            <td>春網微電影活動</td>
                            <td>春網微電影活動</td>
                            <td>85/12/26</td>
                            <td>春網微電影活動</td>
                            <td>90/1/1</td>
                            <td>OP</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=1090">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2015/11/3 下午 02:24:59</td>
                            <td>1170</td>
                            <td>外部C名單</td>
                            <td>外部C名單</td>
                            <td>86/11/1</td>
                            <td>外部C名單</td>
                            <td>104/11/1</td>
                            <td>其他</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=1170">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2015/12/30 下午 02:06:04</td>
                            <td>1184</td>
                            <td>聯盟網名單</td>
                            <td>聯盟網名單</td>
                            <td>86/12/30</td>
                            <td>聯盟網名單</td>
                            <td>90/1/1</td>
                            <td>諮詢顧問</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=1184">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2016/5/27 下午 04:56:18</td>
                            <td>1220</td>
                            <td>楊琰琛</td>
                            <td>楊琰琛</td>
                            <td>66/12/7</td>
                            <td>E122513654</td>
                            <td>105/5/26</td>
                            <td>美編</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=1220">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2017/3/6 下午 12:57:40</td>
                            <td>1318</td>
                            <td>陳家維</td>
                            <td>陳家維</td>
                            <td>73/3/13</td>
                            <td>F126054077</td>
                            <td>106/2/1</td>
                            <td>情感諮商師</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=1318">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2018/1/17 下午 03:33:50</td>
                            <td>1430</td>
                            <td>黃若忻</td>
                            <td>黃若忻</td>
                            <td>84/2/19</td>
                            <td>V221540975</td>
                            <td>110/6/1</td>
                            <td>企劃</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=1430">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2018/7/4 上午 10:28:10</td>
                            <td>1476</td>
                            <td>范文祥</td>
                            <td>范文祥</td>
                            <td>67/11/9</td>
                            <td>J121840272</td>
                            <td>107/6/11</td>
                            <td>特助</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=1476">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2018/8/17 上午 09:30:41</td>
                            <td>1492</td>
                            <td>尹宜君</td>
                            <td>尹宜君</td>
                            <td>78/8/6</td>
                            <td>F227299134</td>
                            <td>107/8/16</td>
                            <td>行銷企劃</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=1492">詳細</a></td>
                        </tr>

                        <tr>
                            <td>2021/9/1 下午 06:15:00</td>
                            <td>1717</td>
                            <td>徐采雯</td>
                            <td>徐采雯</td>
                            <td>66/2/16</td>
                            <td>F223916509</td>
                            <td>110/9/1</td>
                            <td>工程師</td>
                            <td>總管理處</td>
                            <td><a href="people_pay_view.php?p_auto=1717">詳細</a></td>
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