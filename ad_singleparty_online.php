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
            <li class="active">約專會員在線</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>約專會員在線 - 目前線上：3 人</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">



                    <div class="col-md-2">
                        <section class="panel" style="border: 1px solid #ddd;">
                            <div class="panel-body noradius padding-10">

                                <figure class="margin-bottom-10">
                                    <!-- image -->
                                    <img class="img-responsive" src="../photo/202141416833_2043182_872722.jpg">
                                </figure><!-- /image -->

                                <!-- progress bar -->
                                <h6 class="progress-head">2043182 - 台北市&nbsp;&nbsp;約專示範帳號-女<span class="pull-right">女</span></h6>

                                <!-- updated -->
                                <ul class="list-unstyled size-13">
                                    <li>約專會館</li>
                                    <li>2021-10-18 15:07 上線 21 m</li>
                                    <li><a href="https://www.singleparty.com.tw/profile.php?m=2043182" target="_blank">約專檔案</a>&nbsp;&nbsp;<a href="ad_mem_detail.php?mem_num=2043182" target="_blank">後台個人資料</a></li>

                                </ul><!-- /updated -->

                            </div>
                        </section>
                    </div>


                    <div class="col-md-2">
                        <section class="panel" style="border: 1px solid #ddd;">
                            <div class="panel-body noradius padding-10">

                                <figure class="margin-bottom-10">
                                    <!-- image -->
                                    <img class="img-responsive" src="../photo/2015731164518_914853_904.jpg">
                                </figure><!-- /image -->

                                <!-- progress bar -->
                                <h6 class="progress-head">914853 - 新北市&nbsp;&nbsp;廖瑜婷<span class="pull-right">女</span></h6>

                                <!-- updated -->
                                <ul class="list-unstyled size-13">
                                    <li>台北會館</li>
                                    <li>2021-10-18 14:55 上線 33 m</li>
                                    <li><a href="https://www.singleparty.com.tw/profile.php?m=914853" target="_blank">約專檔案</a>&nbsp;&nbsp;<a href="ad_mem_detail.php?mem_num=914853" target="_blank">後台個人資料</a></li>

                                </ul><!-- /updated -->

                            </div>
                        </section>
                    </div>


                    <div class="col-md-2">
                        <section class="panel" style="border: 1px solid #ddd;">
                            <div class="panel-body noradius padding-10">

                                <figure class="margin-bottom-10">
                                    <!-- image -->
                                    <img class="img-responsive" src="../photo/202045174116_1492939_312481.jpg">
                                </figure><!-- /image -->

                                <!-- progress bar -->
                                <h6 class="progress-head">1492939 - 台中市&nbsp;&nbsp;陳泓瑋<span class="pull-right">男</span></h6>

                                <!-- updated -->
                                <ul class="list-unstyled size-13">
                                    <li>台中會館</li>
                                    <li>2021-09-09 02:56 上線 56912 m</li>
                                    <li><a href="https://www.singleparty.com.tw/profile.php?m=1492939" target="_blank">約專檔案</a>&nbsp;&nbsp;<a href="ad_mem_detail.php?mem_num=1492939" target="_blank">後台個人資料</a></li>

                                </ul><!-- /updated -->

                            </div>
                        </section>
                    </div>

                </div>
                <div class="text-center">共 3 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                    <ul class='pagination pagination-md'>
                        <li><a href=/ad_singleparty_online.php?topage=1>第一頁</a></li>
                        <li class='active'><a href="#">1</a></li>
                        <li><a href=/ad_singleparty_online.php?topage=1 class='text'>最後一頁</a></li>
                        <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                <option value="/ad_singleparty_online.php?topage=1" selected>1</option>
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