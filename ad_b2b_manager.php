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
            <li class="active">通路管理</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>通路管理 - 數量：26</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form name="form1" method="post" action="?vst=full" class="form-inline">
                        <p>
                            <a href="ad_b2b_manager_add.php" class="btn btn-success">新增資料</a>
                            <input type="text" name="keyword" class="form-control" placeholder="名稱/代號關鍵字" value="">
                            <select name="cbranch" id="cbranch">
                                <option value="">上線會館</option>
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
                            </select><select name="csingle" id="csingle">
                                <option value="">請選擇</option>
                            </select>
                            <input type="submit" name="Submit" class="btn btn-default" value="送出">
                        </p>
                    </form>

                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th width="60">審核</th>
                            <th>姓名</th>
                            <th>代號</th>
                            <th>類型</th>
                            <th>上線</th>
                            <th>分享連結</th>
                            <th width="100">　</th>
                        </tr>

                        <tr>
                            <td><span class="label label-success">通過</span></td>
                            <td>蘇品嘉</td>
                            <td>igagamm</td>
                            <td>講師</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=igagamm&nbsp;

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=39"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=39','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="label label-danger">未審</span></td>
                            <td>郭庭香</td>
                            <td>gotdif04</td>
                            <td>通路</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=gotdif04&nbsp;

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=38"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=38','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="label label-danger">未審</span></td>
                            <td>王俊豐</td>
                            <td>soul0914</td>
                            <td>通路</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=soul0914&nbsp;

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=37"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=37','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="label label-danger">未審</span></td>
                            <td>林貞羽</td>
                            <td>jane</td>
                            <td>通路</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=jane&nbsp;

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=36"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=36','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="label label-success">通過</span></td>
                            <td>周羿彤</td>
                            <td>u9033025</td>
                            <td>講師</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=u9033025&nbsp;

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=35"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=35','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="label label-success">通過</span></td>
                            <td>黃若忻</td>
                            <td>Cc840219</td>
                            <td>通路</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=Cc840219&nbsp;

                                <a class="btn btn-primary btn-xs" data-toggle="collapse" href="#qrcodeshow_6" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    顯示 QRCode
                                </a>
                                <div class="collapse" id="qrcodeshow_6">
                                    <img src="https://www.singleparty.com.tw/channel/qrcode_Cc840219.jpg">
                                </div>

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=34"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=34','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="label label-success">通過</span></td>
                            <td>Lura</td>
                            <td>l2159368</td>
                            <td>通路</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=l2159368&nbsp;

                                <a class="btn btn-primary btn-xs" data-toggle="collapse" href="#qrcodeshow_7" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    顯示 QRCode
                                </a>
                                <div class="collapse" id="qrcodeshow_7">
                                    <img src="https://www.singleparty.com.tw/channel/qrcode_l2159368.jpg">
                                </div>

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=33"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=33','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="label label-success">通過</span></td>
                            <td>陳盈如</td>
                            <td>chloe514</td>
                            <td>通路</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=chloe514&nbsp;

                                <a class="btn btn-primary btn-xs" data-toggle="collapse" href="#qrcodeshow_8" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    顯示 QRCode
                                </a>
                                <div class="collapse" id="qrcodeshow_8">
                                    <img src="https://www.singleparty.com.tw/channel/qrcode_chloe514.jpg">
                                </div>

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=32"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=32','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="label label-success">通過</span></td>
                            <td>何幸蕎</td>
                            <td>102754</td>
                            <td>通路</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=102754&nbsp;

                                <a class="btn btn-primary btn-xs" data-toggle="collapse" href="#qrcodeshow_9" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    顯示 QRCode
                                </a>
                                <div class="collapse" id="qrcodeshow_9">
                                    <img src="https://www.singleparty.com.tw/channel/qrcode_102754.jpg">
                                </div>

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=31"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=31','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="label label-success">通過</span></td>
                            <td>王以璇</td>
                            <td>lat0117</td>
                            <td>通路</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=lat0117&nbsp;

                                <a class="btn btn-primary btn-xs" data-toggle="collapse" href="#qrcodeshow_10" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    顯示 QRCode
                                </a>
                                <div class="collapse" id="qrcodeshow_10">
                                    <img src="https://www.singleparty.com.tw/channel/qrcode_lat0117.jpg">
                                </div>

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=30"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=30','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="label label-success">通過</span></td>
                            <td>好好玩旅行社</td>
                            <td>funtour</td>
                            <td>通路</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=funtour&nbsp;

                                <a class="btn btn-primary btn-xs" data-toggle="collapse" href="#qrcodeshow_11" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    顯示 QRCode
                                </a>
                                <div class="collapse" id="qrcodeshow_11">
                                    <img src="https://www.singleparty.com.tw/channel/qrcode_funtour.jpg">
                                </div>

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=29"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=29','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="label label-success">通過</span></td>
                            <td>劉芳慈</td>
                            <td>shania</td>
                            <td>通路</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=shania&nbsp;

                                <a class="btn btn-primary btn-xs" data-toggle="collapse" href="#qrcodeshow_12" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    顯示 QRCode
                                </a>
                                <div class="collapse" id="qrcodeshow_12">
                                    <img src="https://www.singleparty.com.tw/channel/qrcode_shania.jpg">
                                </div>

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=28"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=28','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="label label-success">通過</span></td>
                            <td>劉希嫄</td>
                            <td>maggie1993</td>
                            <td>通路</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=maggie1993&nbsp;

                                <a class="btn btn-primary btn-xs" data-toggle="collapse" href="#qrcodeshow_13" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    顯示 QRCode
                                </a>
                                <div class="collapse" id="qrcodeshow_13">
                                    <img src="https://www.singleparty.com.tw/channel/qrcode_maggie1993.jpg">
                                </div>

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=27"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=27','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="label label-success">通過</span></td>
                            <td>陳郁婷</td>
                            <td>arielchen</td>
                            <td>通路</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=arielchen&nbsp;

                                <a class="btn btn-primary btn-xs" data-toggle="collapse" href="#qrcodeshow_14" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    顯示 QRCode
                                </a>
                                <div class="collapse" id="qrcodeshow_14">
                                    <img src="https://www.singleparty.com.tw/channel/qrcode_arielchen.jpg">
                                </div>

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=26"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=26','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="label label-success">通過</span></td>
                            <td>謝振紘</td>
                            <td>zxie490</td>
                            <td>通路</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=zxie490&nbsp;

                                <a class="btn btn-primary btn-xs" data-toggle="collapse" href="#qrcodeshow_15" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    顯示 QRCode
                                </a>
                                <div class="collapse" id="qrcodeshow_15">
                                    <img src="https://www.singleparty.com.tw/channel/qrcode_zxie490.jpg">
                                </div>

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=25"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=25','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="label label-success">通過</span></td>
                            <td>蔡宜汎</td>
                            <td>yvonne12</td>
                            <td>通路</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=yvonne12&nbsp;

                                <a class="btn btn-primary btn-xs" data-toggle="collapse" href="#qrcodeshow_16" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    顯示 QRCode
                                </a>
                                <div class="collapse" id="qrcodeshow_16">
                                    <img src="https://www.singleparty.com.tw/channel/qrcode_yvonne12.jpg">
                                </div>

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=24"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=24','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="label label-success">通過</span></td>
                            <td>詹娉涵</td>
                            <td>aillylin</td>
                            <td>通路</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=aillylin&nbsp;

                                <a class="btn btn-primary btn-xs" data-toggle="collapse" href="#qrcodeshow_17" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    顯示 QRCode
                                </a>
                                <div class="collapse" id="qrcodeshow_17">
                                    <img src="https://www.singleparty.com.tw/channel/qrcode_aillylin.jpg">
                                </div>

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=23"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=23','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="label label-success">通過</span></td>
                            <td>詹娉妤</td>
                            <td>yes5tv0615</td>
                            <td>通路</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=yes5tv0615&nbsp;

                                <a class="btn btn-primary btn-xs" data-toggle="collapse" href="#qrcodeshow_18" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    顯示 QRCode
                                </a>
                                <div class="collapse" id="qrcodeshow_18">
                                    <img src="https://www.singleparty.com.tw/channel/qrcode_yes5tv0615.jpg">
                                </div>

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=22"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=22','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="label label-success">通過</span></td>
                            <td>張簡中天</td>
                            <td>zack</td>
                            <td>通路</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=zack&nbsp;

                                <a class="btn btn-primary btn-xs" data-toggle="collapse" href="#qrcodeshow_19" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    顯示 QRCode
                                </a>
                                <div class="collapse" id="qrcodeshow_19">
                                    <img src="https://www.singleparty.com.tw/channel/qrcode_zack.jpg">
                                </div>

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=21"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=21','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><span class="label label-success">通過</span></td>
                            <td>尹宜君</td>
                            <td>toby789456</td>
                            <td>通路</td>
                            <td></td>
                            <td>https://www.singleparty.com.tw/?ch=toby789456&nbsp;

                                <a class="btn btn-primary btn-xs" data-toggle="collapse" href="#qrcodeshow_20" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    顯示 QRCode
                                </a>
                                <div class="collapse" id="qrcodeshow_20">
                                    <img src="https://www.singleparty.com.tw/channel/qrcode_toby789456.jpg">
                                </div>

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_manager_add.php?an=20"><i class="icon-camera"></i> 修改</a></li>
                                        <li><a href="javascript:Mars_popup2('ad_b2b_manager.php?st=fulldel&an=20','','width=300,height=100,top=300,left=300')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 26 筆、第 1 頁／共 2 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_b2b_manager.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_b2b_manager.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_b2b_manager.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_b2b_manager.php?topage=2 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_b2b_manager.php?topage=1" selected>1</option>
                            <option value="/ad_b2b_manager.php?topage=2">2</option>
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


        $("#cbranch").on("change", function() {
            personnel_get("cbranch", "csingle");
        });
    });
</script>