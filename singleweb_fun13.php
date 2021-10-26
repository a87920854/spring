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
            <li>約會專家系統</li>
            <li class="active">優惠卷管理</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>優惠卷管理</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div id="content" class="span10">
                    <!-- content starts -->
                    <p><input type="button" class="btn btn-info" value="新增優惠卷" onclick="location.href='singleweb_fun13_add.php'"></p>
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <th width="70"></th>
                                <th width=120>圖片</th>
                                <th>名稱</th>
                                <th>有效期</th>
                                <th>活動說明</th>
                                <th>操作</th>
                            </tr>

                            <tr>
                                <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=82&i1=41"><span class="fa fa-arrow-down"></span></a></td>
                                <td>

                                    <a href="singleparty_image/coupon/201771193957_coupon_140.jpg" class="fancybox"><img src="singleparty_image/coupon/201771193957_coupon_140.jpg" border=0 height=40></a>

                                </td>
                                <td>【筑翫溫泉】憑券入住享好禮</td>
                                <td>2017/7/1 - 2017/12/31</td>
                                <td>貴賓憑券入住可贈浪漫加分 雙好禮組<br>梅花醉梅酒一瓶 市值$250<br>克奈普香氛精油 市值$200<br><br>門市資訊：<br>地址： 宜蘭縣礁溪鄉忠孝路97巷32號<br>預約專線電話： (03)9883198<br><br>&#8226; 一人限用一次<br>&#8226; 購買前請先預約並出示本卷<br>&#8226; 本卷逾期後自動失效<br>&#8226; 本卷不能跟其他優惠活動合併使用<br>&#8226; 其他:筑翫溫泉會館保有活動辦法之解釋權</td>
                                <td>
                                    <a href="singleweb_fun13_add.php?an=82">編輯</a>
                                    <a title="刪除" href="singleweb_fun13.php?st=del&an=82">刪除</a>
                                </td>
                            </tr>

                            <tr>
                                <td><a href="?st=mup&an=83&i1=41"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=83&i1=41"><span class="fa fa-arrow-down"></span></a></td>
                                <td>

                                    <a href="singleparty_image/coupon/201771214422_coupon_853.jpg" class="fancybox"><img src="singleparty_image/coupon/201771214422_coupon_853.jpg" border=0 height=40></a>

                                    <br>
                                    <a href="singleparty_image/coupon/2017712173633_coupon_719.jpg" class="fancybox"><img src="singleparty_image/coupon/2017712173633_coupon_719.jpg" border=0 height=40></a>

                                </td>
                                <td>【希臘婚禮婚紗】憑卷享雙重優惠</td>
                                <td>2017/7/1 - 2017/12/31</td>
                                <td>憑卷至希臘婚禮婚紗可享雙重優惠<br>『優惠一』免費拍攝二組12吋情侶照。<br>『優惠一』來電預約結婚照現場下訂成功，即可包套金額現折10000元再贈精美好禮。<br><br>門市資訊：<br>地址：新北市板橋區重慶路61號<br>預約專線電話： (02) 2964 8839<br><br>&#8226; 一人限用一次<br>&#8226; 購買前請先預約並出示本卷<br>&#8226; 本卷逾期後自動失效<br>&#8226; 本卷不能跟其他優惠活動合併使用<br>&#8226; 其他:希臘婚禮婚紗保有活動辦法之解釋權</td>
                                <td>
                                    <a href="singleweb_fun13_add.php?an=83">編輯</a>
                                    <a title="刪除" href="singleweb_fun13.php?st=del&an=83">刪除</a>
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
require_once("./include/_bottom.php");
?>