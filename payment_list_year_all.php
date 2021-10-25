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
            <li>財務管理系統</li>
            <li class="active">會員總收入明細 - 總管理處</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員總收入明細 - 總管理處</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">

                    <form name="form1" method="post" action="?vst=full" class="form-inline">

                        <input type="text" name="keyword" class="form-control" placeholder="身分證字號/姓名" value="">
                        <select name="oby1" class="form-control">
                            <option value="">時間排序</option>
                            <option value="1">時間近到遠</option>
                            <option value="2">時間遠到近</option>
                        </select>
                        <select name="oby2" class="form-control">
                            <option value="">金額排序</option>
                            <option value="1">金額大到小</option>
                            <option value="2">金額小到大</option>
                        </select>
                        <input type="submit" name="Submit" class="btn btn-default" value="查詢">
                </div>

                <p>因資料龐大，需較多的計算時間，請耐心等候。本頁僅顯示總合大於 128000 以上之會員。</p>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>

                        </tr>
                        <tr>
                            <td>2020-11-15</td>
                            <td><a href="ad_mem_pay_detail.php?mem_username=F123231714&uname=關裕弘" target="_blank">關裕弘</a></td>
                            <td>F1232*****</td>
                            <td>161299</td>
                            <td>總管理處</td>
                            <td>唐慧琳</td>
                        </tr>
                        <tr>
                            <td>2020-09-30</td>
                            <td><a href="ad_mem_pay_detail.php?mem_username=A125687344&uname=陳宗麟" target="_blank">陳宗麟</a></td>
                            <td>A1256*****</td>
                            <td>163000</td>
                            <td>總管理處</td>
                            <td>張利</td>
                        </tr>
                        <tr>
                            <td>2020-05-17</td>
                            <td><a href="ad_mem_pay_detail.php?mem_username=H123952550&uname=許家瑋" target="_blank">許家瑋</a></td>
                            <td>H1239*****</td>
                            <td>156295</td>
                            <td>總管理處</td>
                            <td>唐慧琳</td>
                        </tr>
                        <tr>
                            <td>2020-05-02</td>
                            <td><a href="ad_mem_pay_detail.php?mem_username=H123408833&uname=吳明璋" target="_blank">吳明璋</a></td>
                            <td>H1234*****</td>
                            <td>128299</td>
                            <td>總管理處</td>
                            <td>唐慧琳</td>
                        </tr>
                        <tr>
                            <td>2020-03-28</td>
                            <td><a href="ad_mem_pay_detail.php?mem_username=A126409362&uname=葉俊材" target="_blank">葉俊材</a></td>
                            <td>A1264*****</td>
                            <td>147299</td>
                            <td>總管理處</td>
                            <td>黃雅芳</td>
                        </tr>
                        <tr>
                            <td>2020-03-11</td>
                            <td><a href="ad_mem_pay_detail.php?mem_username=V120712411&uname=林紹鈞" target="_blank">林紹鈞</a></td>
                            <td>V1207*****</td>
                            <td>209000</td>
                            <td>總管理處</td>
                            <td>黃雅芳</td>
                        </tr>
                        <tr>
                            <td>2007-07-16</td>
                            <td><a href="ad_mem_pay_detail.php?mem_username=E120769087&uname=曾倫元" target="_blank">曾倫元</a></td>
                            <td>E1207*****</td>
                            <td>132999</td>
                            <td>總管理處</td>
                            <td>楊淑君</td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="text-center">共 7 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/payment_list_year_all.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/payment_list_year_all.php?topage=1 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/payment_list_year_all.php?topage=1" selected>1</option>
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