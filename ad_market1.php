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
            <li class="active">行銷活動管理</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>行銷活動管理</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <table id="rtable" class="table table-bordered bootstrap-datatable">
                    <tbody>
                        <td>活動名稱</td>
                        <td>上線時間</td>
                        <td>結束時間</td>
                        <td>活動位置</td>
                        <td width="120">類別</td>
                        <td width="60"></td>
                        <tr>
                            <td><span>振興5倍券幸福更加倍</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/10/7</td>
                            <td>無</td>
                            <td><a href="https://www.datemenow.com.tw/210927/" target="_blank">https://www.datemenow.com.tw/210927/</a></td>
                            <td>DateMeNow</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>振興5倍券幸福更加倍-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/10/7</td>
                            <td>無</td>
                            <td><a href="https://www.datemenow.com.tw/210927/" target="_blank">https://www.datemenow.com.tw/210927/</a></td>
                            <td>DateMeNow</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>春天會館5倍券</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/10/5</td>
                            <td>無</td>
                            <td><a href="https://www.springclub.com.tw/20210927/" target="_blank">https://www.springclub.com.tw/20210927/</a></td>
                            <td>春天會館</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>春天會館5倍券-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/10/5</td>
                            <td>無</td>
                            <td><a href="https://www.springclub.com.tw/20210927/" target="_blank">https://www.springclub.com.tw/20210927/</a></td>
                            <td>春天會館</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>幸福五倍券</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/10/5</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/210927/" target="_blank">https://www.singleparty.com.tw/210927/</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>幸福五倍券-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/10/5</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/210927/" target="_blank">https://www.singleparty.com.tw/210927/</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>Online聯誼交友趣</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/7/25</td>
                            <td>無</td>
                            <td><a href="https://www.funtour.com.tw/210725" target="_blank">https://www.funtour.com.tw/210725</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>Online聯誼交友趣-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/7/25</td>
                            <td>無</td>
                            <td><a href="https://www.funtour.com.tw/210725" target="_blank">https://www.funtour.com.tw/210725</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>窩在家也能開啟浪漫約會</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/7/10</td>
                            <td>無</td>
                            <td><a href="https://www.springclub.com.tw/20210710/" target="_blank">https://www.springclub.com.tw/20210710/</a></td>
                            <td>春天會館</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>窩在家也能開啟浪漫約會-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/7/10</td>
                            <td>無</td>
                            <td><a href="https://www.springclub.com.tw/20210710/" target="_blank">https://www.springclub.com.tw/20210710/</a></td>
                            <td>春天會館</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>迷你塔羅愛情占卜</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/6/25</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/210625" target="_blank">https://www.singleparty.com.tw/210625</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>迷你塔羅愛情占卜-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/6/25</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/210625" target="_blank">https://www.singleparty.com.tw/210625</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>單身交友約會聯誼活動</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/6/25</td>
                            <td>無</td>
                            <td><a href="	https://www.springclub.com.tw/20210625" target="_blank"> https://www.springclub.com.tw/20210625</a></td>
                            <td>春天會館</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>單身交友約會聯誼活動-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/6/25</td>
                            <td>無</td>
                            <td><a href="	https://www.springclub.com.tw/20210625" target="_blank"> https://www.springclub.com.tw/20210625</a></td>
                            <td>春天會館</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>讓美好的你遇見美好的他</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/6/10</td>
                            <td>無</td>
                            <td><a href="https://www.datemenow.com.tw/210610" target="_blank">https://www.datemenow.com.tw/210610</a></td>
                            <td>DateMeNow</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>讓美好的你遇見美好的他-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/6/10</td>
                            <td>無</td>
                            <td><a href="https://www.datemenow.com.tw/210610" target="_blank">https://www.datemenow.com.tw/210610</a></td>
                            <td>DateMeNow</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>結合實體與線上的交友新體驗</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/6/1</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/210601" target="_blank">https://www.singleparty.com.tw/210601</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>結合實體與線上的交友新體驗-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/6/1</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/210601" target="_blank">https://www.singleparty.com.tw/210601</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>來一場認真安全交友</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/5/28</td>
                            <td>無</td>
                            <td><a href="https://www.springclub.com.tw/20210528/" target="_blank">https://www.springclub.com.tw/20210528/</a></td>
                            <td>春天會館</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>來一場認真安全交友-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/5/28</td>
                            <td>無</td>
                            <td><a href="https://www.springclub.com.tw/20210528/" target="_blank">https://www.springclub.com.tw/20210528/</a></td>
                            <td>春天會館</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>防疫一起來視訊排約</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/5/26</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/210526" target="_blank">https://www.singleparty.com.tw/210526</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>防疫一起來視訊排約-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/5/26</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/210526" target="_blank">https://www.singleparty.com.tw/210526</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>不出門也要好好談戀愛</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/5/25</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/210525" target="_blank">https://www.singleparty.com.tw/210525</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>不出門也要好好談戀愛-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/5/25</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/210525" target="_blank">https://www.singleparty.com.tw/210525</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>DMN不出門也要好好談戀愛</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/5/25</td>
                            <td>無</td>
                            <td><a href="https://www.datemenow.com.tw/210525/" target="_blank">https://www.datemenow.com.tw/210525/</a></td>
                            <td>DateMeNow</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>DMN不出門也要好好談戀愛-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/5/25</td>
                            <td>無</td>
                            <td><a href="https://www.datemenow.com.tw/210525/" target="_blank">https://www.datemenow.com.tw/210525/</a></td>
                            <td>DateMeNow</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>現代月老陪你戀愛交友</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/5/25</td>
                            <td>無</td>
                            <td><a href="https://www.springclub.com.tw/20210525" target="_blank">https://www.springclub.com.tw/20210525</a></td>
                            <td>春天會館</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>現代月老陪你戀愛交友-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/5/25</td>
                            <td>無</td>
                            <td><a href="https://www.springclub.com.tw/20210525" target="_blank">https://www.springclub.com.tw/20210525</a></td>
                            <td>春天會館</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>約專簡訊專頁</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/5/15</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/210515" target="_blank">https://www.singleparty.com.tw/210515</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>約專簡訊專頁-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/5/15</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/210515" target="_blank">https://www.singleparty.com.tw/210515</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>202104名單</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/4/8</td>
                            <td>無</td>
                            <td>無</td>
                            <td>春天會館</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>七分鐘找出你的理想情人</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/3/15</td>
                            <td>無</td>
                            <td><a href="https://www.springclub.com.tw/20210315" target="_blank">https://www.springclub.com.tw/20210315</a></td>
                            <td>春天會館</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>七分鐘找出你的理想情人-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/3/15</td>
                            <td>無</td>
                            <td><a href="https://www.springclub.com.tw/20210315" target="_blank">https://www.springclub.com.tw/20210315</a></td>
                            <td>春天會館</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>戀愛決勝盤</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/3/10</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/210310/" target="_blank">https://www.singleparty.com.tw/210310/</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>戀愛決勝盤-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2021/3/10</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/210310/" target="_blank">https://www.singleparty.com.tw/210310/</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>單身剋星_LINEPOINT</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2020/12/25</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/201225/" target="_blank">https://www.singleparty.com.tw/201225/</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>單身剋星_LINEPOINT-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2020/12/25</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/201225/" target="_blank">https://www.singleparty.com.tw/201225/</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>女子時光</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2020/12/20</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/201220/" target="_blank">https://www.singleparty.com.tw/201220/</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>女子時光-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2020/12/20</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/201220/" target="_blank">https://www.singleparty.com.tw/201220/</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>天菜底家啦</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2020/12/15</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/201215/" target="_blank">https://www.singleparty.com.tw/201215/</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>天菜底家啦-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2020/12/15</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/201215/" target="_blank">https://www.singleparty.com.tw/201215/</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>線上祈福戀愛御守</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2020/12/1</td>
                            <td>無</td>
                            <td><a href="	http://www.springclub.com.tw/20201201" target="_blank"> http://www.springclub.com.tw/20201201</a></td>
                            <td>春天會館</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>線上祈福戀愛御守-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2020/12/1</td>
                            <td>無</td>
                            <td><a href="	http://www.springclub.com.tw/20201201" target="_blank"> http://www.springclub.com.tw/20201201</a></td>
                            <td>春天會館</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>2021年12星座愛情指數測驗</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2020/11/15</td>
                            <td>無</td>
                            <td><a href="https://www.datemenow.com.tw/201115/" target="_blank">https://www.datemenow.com.tw/201115/</a></td>
                            <td>DateMeNow</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>2021年12星座愛情指數測驗-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2020/11/15</td>
                            <td>無</td>
                            <td><a href="https://www.datemenow.com.tw/201115/" target="_blank">https://www.datemenow.com.tw/201115/</a></td>
                            <td>DateMeNow</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>小資想婚成家專案</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2020/9/25</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/200925" target="_blank">https://www.singleparty.com.tw/200925</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>小資想婚成家專案-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2020/9/25</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/200925" target="_blank">https://www.singleparty.com.tw/200925</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>你在愛情中是哪一種情人</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2020/9/10</td>
                            <td>無</td>
                            <td><a href="https://www.springclub.com.tw/20200910/" target="_blank">https://www.springclub.com.tw/20200910/</a></td>
                            <td>春天會館</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>你在愛情中是哪一種情人-手機版</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2020/9/10</td>
                            <td>無</td>
                            <td><a href="https://www.springclub.com.tw/20200910/" target="_blank">https://www.springclub.com.tw/20200910/</a></td>
                            <td>春天會館</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><span>七夕振興券活動</span>&nbsp;&nbsp;<span class="label label-success">網頁版</span></td>
                            <td>2020/8/1</td>
                            <td>無</td>
                            <td><a href="https://www.singleparty.com.tw/200801" target="_blank">https://www.singleparty.com.tw/200801</a></td>
                            <td>約會專家</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <div class="text-center">共 181 筆、第 1 頁／共 4 頁&nbsp;&nbsp;
                        <ul class='pagination pagination-md'>
                            <li><a href=/ad_market1.php?topage=1>第一頁</a></li>
                            <li class='active'><a href="#">1</a></li>
                            <li><a href=/ad_market1.php?topage=2 class='text'>2</a></li>
                            <li><a href=/ad_market1.php?topage=3 class='text'>3</a></li>
                            <li><a href=/ad_market1.php?topage=4 class='text'>4</a></li>
                            <li><a href=/ad_market1.php?topage=2 class='text' title='Next'>下一頁</a></li>
                            <li><a href=/ad_market1.php?topage=4 class='text'>最後一頁</a></li>
                            <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                    <option value="/ad_market1.php?topage=1" selected>1</option>
                                    <option value="/ad_market1.php?topage=2">2</option>
                                    <option value="/ad_market1.php?topage=3">3</option>
                                    <option value="/ad_market1.php?topage=4">4</option>
                                </select></li>
                        </ul>
                    </div>
                </div>

                <form action="?st=add" method="post" target="_self" onsubmit="return chk_search_form()">
                    <table class="table table-bordered bootstrap-datatable">
                        <tbody>
                            <tr>
                                <td>活動名稱：<input type="text" name="name" id="name" placeholder="必填" class="form-control2" required></td>
                                <td>上線時間：<input type="text" name="online_time" id="online_time" class="datepicker" autocomplete="off" placeholder="必填" required></td>
                                <td>結束時間：<input type="text" name="end_time" id="end_time" class="datepicker" autocomplete="off" placeholder="選填"></td>
                                <td>活動位置：<input type="text" name="url" id="url" placeholder="選填" class="form-control2"></td>
                                <td>類別：<select name="web" id="web" required>
                                        <option value="">請選擇</option>
                                        <option value="春天會館">春天會館</option>
                                        <option value="DateMeNow">DateMeNow</option>
                                        <option value="約會專家">約會專家</option>
                                    </select></td>
                                <td><input type="submit" value="新增活動" class="btn btn-default"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
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

<script language="JavaScript">
    $(function() {
        $("#rtable tr").each(function() {
            $span = $(this).find("span:first");
            $name = $span.html();
            if ($name && $name.indexOf("-") > 0) {
                $n1 = $name.split("-")[0];
                $n2 = $name.split("-")[1];

                $("#rtable tr").each(function() {
                    $span2 = $(this).find("span:first");
                    $name2 = $span2.html();
                    if ($name2 && $name2 == $n1) {
                        $span2.parent().append("&nbsp;<span class=\"label label-success\">" + $n2 + "</span>");
                        //console.log($name2);	
                    }

                });
                $(this).remove();
            }

        });
    });
</script>