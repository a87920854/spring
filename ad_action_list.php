<?php
require("./include/_top.php");
require("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">網站活動上傳</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>網站活動上傳 - 數量：200　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <p><a href="ad_action_add.php" class="btn btn-info">新增活動</a></p>
                    <form name="form1" method="post" action="?vst=full" class="form-inline">
                        <p>
                            <input type="text" name="start_time" id="start_time" class="datepicker" autocomplete="off" value="" placeholder="活動日期開始">　～　<input type="text" name="end_time" id="end_time" class="datepicker" autocomplete="off" value="" placeholder="活動日期結束">
                            <select name="s6" id="s6" class="form-control">
                                <option value="">請選擇會館</option>
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
                            <input type="text" name="keyword" class="form-control" placeholder="標題/編號/內容關鍵字">
                            <input type="submit" name="Submit" class="btn btn-default" value="送出">
                        </p>
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th></th>
                            <th width=160 align="center">活動時間</th>
                            <th width=80 align="center">會館</th>
                            <th width=140 align="center">活動類型</th>
                            <th width=90 align="center">活動地點</th>
                            <th width=300 align="center">活動標題</th>
                            <th></th>
                            <th width=60 align="center">花絮</th>
                            <th width=80 align="center"></th>
                        </tr>

                        <tr>
                            <td align="center">13169</td>
                            <td class="center"><a href="upload_image/2021831201916_action_481.png" class="fancybox"><img src="upload_image/2021831201916_action_481.png" border=0 width=90 height=60></a></td>
                            <td class="center">2021-09-25 19:00<br>
                                <font color=blue size=2>活動新增(2021-08-31 20:19)</font>
                            </td>
                            <td align="center">台中</td>
                            <td class="center" style="font-size:12px;">主題活動<br>趣約會-主題特別企劃</td>
                            <td class="center">台中市</td>
                            <td class="center">實體聯誼【單身週末舞會】</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：新開發/開發者：台中威威/執行者：台中威威
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13169">男：正取 0/備取 0 人、女：正取 0/備取 0 人、共：0 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13169"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">13168</td>
                            <td class="center"><a href="upload_image/2021831201624_action_282.png" class="fancybox"><img src="upload_image/2021831201624_action_282.png" border=0 width=90 height=60></a></td>
                            <td class="center">2021-09-12 14:00<br>
                                <font color=red size=2>活動取消(2021-09-10 15:32)</font>
                            </td>
                            <td align="center">台中</td>
                            <td class="center" style="font-size:12px;">主題活動<br>心約會-魅力有約</td>
                            <td class="center">台中市</td>
                            <td class="center">頻率對了，愛情不請自來</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：新開發/開發者：台中威威/執行者：台中威威
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13168">男：正取 0/備取 0 人、女：正取 0/備取 0 人、共：0 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13168"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">13167</td>
                            <td class="center"><a href="upload_image/2021831142139_action_655.png" class="fancybox"><img src="upload_image/2021831142139_action_655.png" border=0 width=90 height=60></a></td>
                            <td class="center">2021-08-29 14:00<br>
                                <font color=blue size=2>活動新增(2021-08-31 14:21)</font>
                            </td>
                            <td align="center">台北</td>
                            <td class="center" style="font-size:12px;">主題活動<br>趣約會-主題特別企劃</td>
                            <td class="center">台北市</td>
                            <td class="center">線上歡樂交友，K歌遊戲任你挑</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：新開發/開發者：台北Ethan/執行者：台北Ethan
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13167">男：正取 0/備取 0 人、女：正取 0/備取 0 人、共：0 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13167"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">13166</td>
                            <td class="center">無</td>
                            <td class="center">2021-08-29 14:00<br>
                                <font color=blue size=2>活動新增(2021-08-29 18:17)</font>
                            </td>
                            <td align="center">八德</td>
                            <td class="center" style="font-size:12px;">主題活動<br>戀愛會客室-一對一整體造型諮詢</td>
                            <td class="center">台北市</td>
                            <td class="center">一對一造型外出購衣</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：其他/開發者：八德蔡佩蓁 Sunny/執行者：八德李宜蓁
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13166">男：正取 0/備取 0 人、女：正取 0/備取 0 人、共：0 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13166"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">13165</td>
                            <td class="center"><a href="upload_image/202182316438_action_970.jpg" class="fancybox"><img src="upload_image/202182316438_action_970.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021-10-31 10:00<br>
                                <font color=blue size=2>活動新增(2021-08-23 16:04)</font>
                            </td>
                            <td align="center">八德</td>
                            <td class="center" style="font-size:12px;">約會活動<br>趣約會-主題特別企劃</td>
                            <td class="center">台北市</td>
                            <td class="center">萬聖節搞怪餅乾</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：其他/開發者：八德23/執行者：八德23
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13165">男：正取 0/備取 0 人、女：正取 0/備取 0 人、共：0 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13165"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">13164</td>
                            <td class="center"><a href="upload_image/202182316043_action_152.jpg" class="fancybox"><img src="upload_image/202182316043_action_152.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021-10-27 19:00<br>
                                <font color=blue size=2>活動新增(2021-08-23 16:00)</font>
                            </td>
                            <td align="center">八德</td>
                            <td class="center" style="font-size:12px;">約會活動<br>揪約會-多對多約會</td>
                            <td class="center">台北市</td>
                            <td class="center">浪漫相約航空業美女</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：其他/開發者：八德23/執行者：八德23
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13164">男：正取 0/備取 3 人、女：正取 0/備取 0 人、共：3 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13164"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">13163</td>
                            <td class="center"><a href="upload_image/2021823155840_action_829.jpg" class="fancybox"><img src="upload_image/2021823155840_action_829.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021-10-24 13:30<br>
                                <font color=blue size=2>活動新增(2021-08-23 15:58)</font>
                            </td>
                            <td align="center">八德</td>
                            <td class="center" style="font-size:12px;">約會活動<br>饗約會-主題精緻餐會</td>
                            <td class="center">台北市</td>
                            <td class="center">年薪100萬↑優質型男</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：其他/開發者：八德23/執行者：八德23
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13163">男：正取 0/備取 3 人、女：正取 0/備取 1 人、共：4 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13163"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">13162</td>
                            <td class="center"><a href="upload_image/2021823155552_action_532.jpg" class="fancybox"><img src="upload_image/2021823155552_action_532.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021-10-20 19:00<br>
                                <font color=blue size=2>活動新增(2021-08-23 15:55)</font>
                            </td>
                            <td align="center">八德</td>
                            <td class="center" style="font-size:12px;">約會活動<br>揪約會-主題式約會</td>
                            <td class="center">台北市</td>
                            <td class="center">與科技挺拔男的邂逅</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：其他/開發者：八德23/執行者：八德23
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13162">男：正取 0/備取 0 人、女：正取 0/備取 2 人、共：2 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13162"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">13161</td>
                            <td class="center"><a href="upload_image/2021823155342_action_93.jpg" class="fancybox"><img src="upload_image/2021823155342_action_93.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021-10-17 14:30<br>
                                <font color=blue size=2>活動新增(2021-08-23 15:53)</font>
                            </td>
                            <td align="center">八德</td>
                            <td class="center" style="font-size:12px;">約會活動<br>揪約會-多對多約會</td>
                            <td class="center">台北市</td>
                            <td class="center">有巢宅男好窩心</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：其他/開發者：八德23/執行者：八德23
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13161">男：正取 0/備取 2 人、女：正取 0/備取 3 人、共：5 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13161"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">13160</td>
                            <td class="center"><a href="upload_image/202182315510_action_984.jpg" class="fancybox"><img src="upload_image/202182315510_action_984.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021-10-13 19:00<br>
                                <font color=blue size=2>活動新增(2021-08-23 15:51)</font>
                            </td>
                            <td align="center">八德</td>
                            <td class="center" style="font-size:12px;">約會活動<br>揪約會-多對多約會</td>
                            <td class="center">台北市</td>
                            <td class="center">與俏護士的浪漫相遇</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：其他/開發者：八德23/執行者：八德23
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13160">男：正取 0/備取 10 人、女：正取 0/備取 0 人、共：10 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13160"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">13159</td>
                            <td class="center"><a href="upload_image/2021823154543_action_239.jpg" class="fancybox"><img src="upload_image/2021823154543_action_239.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021-10-09 07:00<br>
                                <font color=blue size=2>活動新增(2021-08-23 15:45)</font>
                            </td>
                            <td align="center">八德</td>
                            <td class="center" style="font-size:12px;">約會活動<br>趣約會-輕旅行</td>
                            <td class="center">南投縣</td>
                            <td class="center">最美自行車道月老行</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：其他/開發者：八德23/執行者：八德23
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13159">男：正取 0/備取 10 人、女：正取 0/備取 2 人、共：12 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13159"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">13158</td>
                            <td class="center"><a href="upload_image/2021823153853_action_721.png" class="fancybox"><img src="upload_image/2021823153853_action_721.png" border=0 width=90 height=60></a></td>
                            <td class="center">2021-10-06 19:00<br>
                                <font color=blue size=2>活動新增(2021-08-23 15:38)</font>
                            </td>
                            <td align="center">八德</td>
                            <td class="center" style="font-size:12px;">約會活動<br>揪約會-多對多約會</td>
                            <td class="center">台北市</td>
                            <td class="center">與醫生型男的邂逅</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：其他/開發者：八德23/執行者：八德23
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13158">男：正取 0/備取 0 人、女：正取 0/備取 8 人、共：8 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13158"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">13157</td>
                            <td class="center"><a href="upload_image/2021823153626_action_247.png" class="fancybox"><img src="upload_image/2021823153626_action_247.png" border=0 width=90 height=60></a></td>
                            <td class="center">2021-10-03 14:30<br>
                                <font color=blue size=2>活動新增(2021-08-23 15:36)</font>
                            </td>
                            <td align="center">八德</td>
                            <td class="center" style="font-size:12px;">約會活動<br>揪約會-多對多約會</td>
                            <td class="center">台北市</td>
                            <td class="center">揪約會就愛175↑挺拔型男</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：其他/開發者：八德23/執行者：八德23
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13157">男：正取 0/備取 5 人、女：正取 0/備取 3 人、共：8 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13157"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">13156</td>
                            <td class="center"><a href="upload_image/2021812162914_action_929.png" class="fancybox"><img src="upload_image/2021812162914_action_929.png" border=0 width=90 height=60></a></td>
                            <td class="center">2021-08-14 18:00<br>
                                <font color=blue size=2>活動新增(2021-08-12 16:29)</font>
                            </td>
                            <td align="center">台中</td>
                            <td class="center" style="font-size:12px;">主題活動<br>饗約會-主題精緻餐會</td>
                            <td class="center">台中市</td>
                            <td class="center">情人節特別活動（防疫特企）</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：新開發/開發者：台中威威/執行者：台中威威
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13156">男：正取 0/備取 0 人、女：正取 0/備取 0 人、共：0 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13156"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">13155</td>
                            <td class="center"><a href="upload_image/2021812153149_action_127.jpg" class="fancybox"><img src="upload_image/2021812153149_action_127.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021-08-14 18:00<br>
                                <font color=blue size=2>活動新增(2021-08-12 15:31)</font>
                            </td>
                            <td align="center">台南</td>
                            <td class="center" style="font-size:12px;">主題活動<br>饗約會-主題精緻餐會</td>
                            <td class="center">台南市</td>
                            <td class="center">七夕情人節晚餐約會</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：其他/開發者：台南安東尼/執行者：台南安東尼
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13155">男：正取 0/備取 0 人、女：正取 0/備取 0 人、共：0 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13155"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">13154</td>
                            <td class="center"><a href="upload_image/2021811154959_action_770.jpg" class="fancybox"><img src="upload_image/2021811154959_action_770.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021-09-24 19:30<br>
                                <font color=blue size=2>活動新增(2021-08-11 15:50)</font>
                            </td>
                            <td align="center">台南</td>
                            <td class="center" style="font-size:12px;">主題活動<br>趣約會-主題特別企劃</td>
                            <td class="center">台南市</td>
                            <td class="center">單身游泳訓練班7</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：其他/開發者：台南安東尼/執行者：台南安東尼
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13154">男：正取 0/備取 0 人、女：正取 0/備取 0 人、共：0 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13154"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">13153</td>
                            <td class="center"><a href="upload_image/202181115475_action_1.jpg" class="fancybox"><img src="upload_image/202181115475_action_1.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021-09-17 19:30<br>
                                <font color=blue size=2>活動新增(2021-08-11 15:47)</font>
                            </td>
                            <td align="center">台南</td>
                            <td class="center" style="font-size:12px;">主題活動<br>趣約會-主題特別企劃</td>
                            <td class="center">台南市</td>
                            <td class="center">單身游泳訓練班6</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：其他/開發者：台南安東尼/執行者：台南安東尼
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13153">男：正取 0/備取 0 人、女：正取 0/備取 0 人、共：0 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13153"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">13152</td>
                            <td class="center"><a href="upload_image/202181115445_action_919.jpg" class="fancybox"><img src="upload_image/202181115445_action_919.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021-09-10 19:30<br>
                                <font color=blue size=2>活動新增(2021-08-11 15:44)</font>
                            </td>
                            <td align="center">台南</td>
                            <td class="center" style="font-size:12px;">主題活動<br>趣約會-主題特別企劃</td>
                            <td class="center">台南市</td>
                            <td class="center">單身游泳訓練班5</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：其他/開發者：台南安東尼/執行者：台南安東尼
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13152">男：正取 0/備取 0 人、女：正取 0/備取 0 人、共：0 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13152"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">13151</td>
                            <td class="center"><a href="upload_image/202181115423_action_948.jpg" class="fancybox"><img src="upload_image/202181115423_action_948.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021-09-03 19:30<br>
                                <font color=blue size=2>活動新增(2021-08-11 15:42)</font>
                            </td>
                            <td align="center">台南</td>
                            <td class="center" style="font-size:12px;">主題活動<br>趣約會-主題特別企劃</td>
                            <td class="center">台南市</td>
                            <td class="center">單身游泳訓練班4</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：其他/開發者：台南安東尼/執行者：台南安東尼
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13151">男：正取 0/備取 0 人、女：正取 0/備取 0 人、共：0 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13151"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td align="center">13150</td>
                            <td class="center"><a href="upload_image/2021811153720_action_848.jpg" class="fancybox"><img src="upload_image/2021811153720_action_848.jpg" border=0 width=90 height=60></a></td>
                            <td class="center">2021-08-27 19:30<br>
                                <font color=blue size=2>活動新增(2021-08-11 15:37)</font>
                            </td>
                            <td align="center">台南</td>
                            <td class="center" style="font-size:12px;">主題活動<br>趣約會-主題特別企劃</td>
                            <td class="center">台南市</td>
                            <td class="center">單身游泳訓練班3</td>
                            <td class="center" style="font-size:12px;">
                                <font color="blue">來源：其他/開發者：台南安東尼/執行者：台南安東尼
                                </font>

                                <br><br><a href="ad_action_list2_view.php?id=13150">男：正取 0/備取 0 人、女：正取 0/備取 0 人、共：0 人</a>
                            </td>
                            <td align="center">

                                無

                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_action_list2_view.php?id=13150"><i class="icon-file"></i> 報名資料</a></li>

                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 200 筆、第 1 頁／共 10 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_action_list.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_action_list.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_action_list.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_action_list.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_action_list.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_action_list.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_action_list.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_action_list.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_action_list.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_action_list.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_action_list.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_action_list.php?topage=10 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_action_list.php?topage=1" selected>1</option>
                            <option value="/ad_action_list.php?topage=2">2</option>
                            <option value="/ad_action_list.php?topage=3">3</option>
                            <option value="/ad_action_list.php?topage=4">4</option>
                            <option value="/ad_action_list.php?topage=5">5</option>
                            <option value="/ad_action_list.php?topage=6">6</option>
                            <option value="/ad_action_list.php?topage=7">7</option>
                            <option value="/ad_action_list.php?topage=8">8</option>
                            <option value="/ad_action_list.php?topage=9">9</option>
                            <option value="/ad_action_list.php?topage=10">10</option>
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
require("./include/_bottom.php");
?>