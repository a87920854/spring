<?php
require_once("./include/_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php")
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active"><a href="ad_mem_service_list.php">會員排約次數查詢</a></li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->



        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>會員排約次數查詢 - 數量：17　<a href="?vst=full&branch=%E5%8F%B0%E5%8C%97&joindate2=&joindate1=&lovedate2=2021%2F09%2F28&lovedate1=2021%2F09%2F01&lovesize2=5&lovesize1=0&sex=%E7%94%B7">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p style="clear:both">
                <form id="searchform" action="ad_mem_service_list.php" method="post" target="_self" onsubmit="return chk_search_form()" class="pull-left form-inline">
                    性別：<select name="sex" style="width:80px;">
                        <option value="">不拘</option>
                        <option value="男" selected>男</option>
                        <option value="女">女</option>
                    </select>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    排約次數：<input type="number" id="lovesize1" name="lovesize1" style="width:40px;" value="0"> 次以上 <input type="number" id="lovesize2" name="lovesize2" style="width:40px;" value="5"> 次以下</p>
                    <p>排約時間：<input type="text" id="lovedate1" name="lovedate1" class="datepicker" autocomplete="off" style="width:80px;" value="2021/09/01"> 到 <input type="text" id="lovedate2" name="lovedate2" class="datepicker" autocomplete="off" style="width:80px;" value="2021/09/28">
                        &nbsp;&nbsp;&nbsp;&nbsp;加入時間：<input type="text" id="joindate1" name="joindate1" class="datepicker" autocomplete="off" style="width:80px;" value=""> 到 <input type="text" id="joindate2" name="joindate2" class="datepicker" autocomplete="off" style="width:80px;" value=""></p>
                    <p>
                        <label><input type="checkbox" name="branch" value="台北" checked> 台北</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="桃園"> 桃園</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="新竹"> 新竹</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="台中"> 台中</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="台南"> 台南</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="高雄"> 高雄</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="八德"> 八德</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="約專"> 約專</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="迷你約"> 迷你約</label>&nbsp;&nbsp;<label><input type="checkbox" name="branch" value="總管理處"> 總管理處</label>&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" id="search_send" class="btn btn-default" value="送出查詢">
                    </p>
                </form>
                <select name="od" id="od" class="pull-right form-control2" onchange="location.href='ad_mem_service_list.php'+$(this).val()+'&branch=%E5%8F%B0%E5%8C%97&joindate2=&joindate1=&lovedate2=2021%2F09%2F28&lovedate1=2021%2F09%2F01&lovesize2=5&lovesize1=0&sex=%E7%94%B7'">
                    <option value="?od=0">排約次數從低至高</option>
                    <option value="?od=1">排約次數從高至低</option>
                    <option value="?od=2">排約時間從近至遠</option>
                    <option value="?od=3">排約時間從遠至近</option>
                    <option value="?od=4">加入時間從近至遠</option>
                    <option value="?od=5">加入時間從遠至近</option>
                </select>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th width=180>資料來源</th>
                            <th width=50>編號</th>
                            <th>姓名</th>
                            <th width=50>性別</th>
                            <th width=120>生日</th>
                            <th width=60>學歷</th>
                            <th width=80>排約次數</th>
                            <th width=160>最後排約</th>
                            <th width=180>秘書</th>
                            <th width=60>照片</th>
                            <th width=80></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="center">流水陌call</td>
                            <td>2079897</td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=2079897" target="_blank">林進華</a>
                                <div style="float:right">
                                    &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span><a href="ad_no_mem_s.php?mem_mobile=0933869960" target="_blank"> <span class="label label-info">查詢</span></a></div>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1967/10/5&nbsp;&nbsp;54 歲</td>
                            <td class="center">專科</td>
                            <td class="center">1</td>

                            <td class="center">2021/9/5 下午 03:00:00</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 李喬<br>
                                <font color=green>排約：</font>李喬<br>
                                <font color=green>邀約：</font>高雄 - 沈海妮
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_detail.php?mem_num=2079897" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1980935&lu=L121602675&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(14)</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2021/8/28~2022/8/28)</span>
                            </td>
                            <td colspan="9" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="#re" onclick="Mars_popup('ad_report.php?k_id=1980935&lu=L121602675&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(14)</a>，處理情形：<font color="#FF0000" size="2">已排約</font>)

                                內容：由 陳紅/陳紅 處理 林進華(主) 與 黃心怡(被) 於 2021/9/5 下午 03:00:00 預訂排約，結果：成功　　
                            </td>
                            <td colspan=3>
                                &nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td class="center">行銷活動-九型戀愛人格分析</td>
                            <td>2081933</td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=2081933" target="_blank">陳建達</a>
                                <div style="float:right">
                                    &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span><a href="ad_no_mem_s.php?mem_mobile=0921166000" target="_blank"> <span class="label label-info">查詢</span></a></div>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1986/5/5&nbsp;&nbsp;35 歲</td>
                            <td class="center">高職</td>
                            <td class="center">1</td>

                            <td class="center">2021/9/7 下午 08:00:00</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 高語鍹<br>
                                <font color=green>排約：</font>李喬<br>
                                <font color=green>邀約：</font>台北 - 高語鍹
                            </td>
                            <td class="center">
                                <a href="../photo/20219619658_2081933_262295.jpg?t=4900" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_detail.php?mem_num=2081933" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1983964&lu=F126722329&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(15)</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2021/9/5~2022/3/5)</span>
                            </td>
                            <td colspan="9" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="#re" onclick="Mars_popup('ad_report.php?k_id=1983964&lu=F126722329&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(15)</a>，處理情形：<font color="#FF0000" size="2">已排約</font>)

                                內容：由 李喬/李喬 處理 陳建達(主) 與 羅翊瑄(被) 於 2021/9/7 下午 08:00:00 預訂排約，結果：成功　　
                            </td>
                            <td colspan=3>
                                &nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td class="center">流水陌call</td>
                            <td>2078326</td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=2078326" target="_blank">周偉棚</a>
                                <div style="float:right">
                                    &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span><a href="ad_no_mem_s.php?mem_mobile=0922736375" target="_blank"> <span class="label label-info">查詢</span></a></div>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1975/9/27&nbsp;&nbsp;46 歲</td>
                            <td class="center">大學</td>
                            <td class="center">2</td>

                            <td class="center">2021/9/4 下午 03:30:00</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 詹明錡<br>
                                <font color=green>排約：</font>李喬<br>
                                <font color=green>邀約：</font>高雄 - 王心祈
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_detail.php?mem_num=2078326" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1978390&lu=F123285810&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(21)</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2021/8/22~2022/8/22)</span>
                            </td>
                            <td colspan="9" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="#re" onclick="Mars_popup('ad_report.php?k_id=1978390&lu=F123285810&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(21)</a>，處理情形：<font color="#FF0000" size="2">已排約</font>)

                                內容：由 寶兒FIONA/寶兒FIONA 處理 周偉棚(主) 與 盧宜冠(被) 於 2021/9/4 下午 03:30:00 預訂排約，結果：成功　　
                            </td>
                            <td colspan=3>
                                &nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td class="center">樂得流水call</td>
                            <td>2079850</td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=2079850" target="_blank">陳協和</a>
                                <div style="float:right">
                                    &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span><a href="ad_no_mem_s.php?mem_mobile=0917159141" target="_blank"> <span class="label label-info">查詢</span></a></div>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1962/9/29&nbsp;&nbsp;59 歲</td>
                            <td class="center">碩士</td>
                            <td class="center">2</td>

                            <td class="center">2021/9/1 下午 07:30:00</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 陳紅<br>
                                <font color=green>排約：</font>林馨彤<br>
                                <font color=green>邀約：</font>高雄 - 王心祈
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_detail.php?mem_num=2079850" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1980888&lu=T120455900&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(23)</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2021/8/28~2022/8/28)</span>
                            </td>
                            <td colspan="9" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="#re" onclick="Mars_popup('ad_report.php?k_id=1980888&lu=T120455900&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(23)</a>，處理情形：<font color="#FF0000" size="2">已排約</font>)

                                內容：由 林馨彤/林馨彤 處理 陳協和(主) 與 鄭姵萱(被) 於 2021/9/1 下午 07:30:00 預訂排約，結果：成功　　
                            </td>
                            <td colspan=3>
                                &nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td class="center">萊優流水call</td>
                            <td>2079889</td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=2079889" target="_blank">蔡瀚強</a>
                                <div style="float:right">
                                    &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span><a href="ad_no_mem_s.php?mem_mobile=0968770644" target="_blank"> <span class="label label-info">查詢</span></a></div>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1991/12/6&nbsp;&nbsp;30 歲</td>
                            <td class="center">大學</td>
                            <td class="center">2</td>

                            <td class="center">2021/9/4 下午 02:30:00</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 高語鍹<br>
                                <font color=green>排約：</font>李喬<br>
                                <font color=green>邀約：</font>新竹 - 陳淑惠
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_detail.php?mem_num=2079889" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1980927&lu=F128400568&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(19)</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2021/8/28~2022/8/28)</span>
                            </td>
                            <td colspan="9" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="#re" onclick="Mars_popup('ad_report.php?k_id=1980927&lu=F128400568&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(19)</a>，處理情形：<font color="#FF0000" size="2">已排約</font>)

                                內容：由 李喬/李喬 處理 蔡瀚強(主) 與 馮宛羚(被) 於 2021/9/4 下午 02:30:00 預訂排約，結果：成功　　
                            </td>
                            <td colspan=3>
                                &nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td class="center">約會專家-網站首頁 [sale-322]</td>
                            <td>2071239</td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=2071239" target="_blank">李啟堯</a>
                                <div style="float:right">
                                    &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span><a href="ad_no_mem_s.php?mem_mobile=0978960147" target="_blank"> <span class="label label-info">查詢</span></a></div>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1991/1/26&nbsp;&nbsp;30 歲</td>
                            <td class="center">大學</td>
                            <td class="center">2</td>

                            <td class="center">2021/9/2 下午 08:00:00</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 易珊<br>
                                <font color=green>排約：</font>李喬<br>
                                <font color=green>邀約：</font>桃園 - 江琳
                            </td>
                            <td class="center">
                                <a href="../photo/2021821235149_2071239_407070.jpg?t=236" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_detail.php?mem_num=2071239" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1969324&lu=F128315546&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(35)</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-二年期(2021/8/7~2023/8/7)</span>
                            </td>
                            <td colspan="9" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="#re" onclick="Mars_popup('ad_report.php?k_id=1969324&lu=F128315546&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(35)</a>，處理情形：<font color="#FF0000" size="2">約後關懷</font>)

                                內容：9/5 愛之語分析及建議。　　
                            </td>
                            <td colspan=3>
                                &nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td class="center">流水陌call</td>
                            <td>2079077</td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=2079077" target="_blank">羅聖傑</a>
                                <div style="float:right">
                                    &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span><a href="ad_no_mem_s.php?mem_mobile=0978049790" target="_blank"> <span class="label label-info">查詢</span></a></div>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1987/2/15&nbsp;&nbsp;34 歲</td>
                            <td class="center">大學</td>
                            <td class="center">2</td>

                            <td class="center">2021/9/4 下午 04:30:00</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 洪儀<br>
                                <font color=green>排約：</font>陳紅<br>
                                <font color=green>邀約：</font>高雄 - 蕭雪麗
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_detail.php?mem_num=2079077" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1980115&lu=F126761835&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(18)</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-二年期(2021/8/25~2023/8/25)</span>
                            </td>
                            <td colspan="9" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="#re" onclick="Mars_popup('ad_report.php?k_id=1980115&lu=F126761835&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(18)</a>，處理情形：<font color="#FF0000" size="2">已排約</font>)

                                內容：由 陳紅/陳紅 處理 羅聖傑(主) 與 黃鈺淳(被) 於 2021/9/4 下午 04:30:00 預訂排約，結果：成功　　
                            </td>
                            <td colspan=3>
                                &nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td class="center">流水陌call</td>
                            <td>2080834</td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=2080834" target="_blank">陳俊龍</a>
                                <div style="float:right">
                                    &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span><a href="ad_no_mem_s.php?mem_mobile=0989847147" target="_blank"> <span class="label label-info">查詢</span></a></div>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1985/7/18&nbsp;&nbsp;36 歲</td>
                            <td class="center">碩士</td>
                            <td class="center">2</td>

                            <td class="center">2021/9/4 下午 08:30:00</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 易珊<br>
                                <font color=green>排約：</font>林馨彤<br>
                                <font color=green>邀約：</font>台南 - 蒙芳敏
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_detail.php?mem_num=2080834" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1982866&lu=V121174522&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(14)</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-二年期(2021/9/1~2023/9/1)</span>
                            </td>
                            <td colspan="9" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="#re" onclick="Mars_popup('ad_report.php?k_id=1982866&lu=V121174522&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(14)</a>，處理情形：<font color="#FF0000" size="2">約後關懷</font>)

                                內容：9/5 提約專app及排約禮儀教學　　
                            </td>
                            <td colspan=3>
                                &nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td class="center">行銷活動-九型戀愛人格分析 [SC_Google_GDN]</td>
                            <td>1907254</td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=1907254" target="_blank">張智銘</a>
                                <div style="float:right">
                                    &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span><a href="ad_no_mem_s.php?mem_mobile=0933804705" target="_blank"> <span class="label label-info">查詢</span></a></div>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1983/5/26&nbsp;&nbsp;38 歲</td>
                            <td class="center">大學</td>
                            <td class="center">2</td>

                            <td class="center">2021/9/6 下午 08:00:00</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 高語鍹<br>
                                <font color=green>排約：</font>李喬<br>
                                <font color=green>邀約：</font>台北 - 陳玉涵
                            </td>
                            <td class="center">
                                <a href="../photo/20219291040_1907254_728298.jpg?t=5775" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_detail.php?mem_num=1907254" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1712690&lu=N124264053&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(29)</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2021/8/28~2022/2/28)</span>
                            </td>
                            <td colspan="9" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="#re" onclick="Mars_popup('ad_report.php?k_id=1712690&lu=N124264053&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(29)</a>，處理情形：<font color="#FF0000" size="2">已排約</font>)

                                內容：由 李喬/李喬 處理 張智銘(主) 與 黃莉鈞(被) 於 2021/9/6 下午 08:00:00 預訂排約，結果：成功　　
                            </td>
                            <td colspan=3>
                                &nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td class="center">流水陌call</td>
                            <td>2049392</td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=2049392" target="_blank">黎台銘</a>
                                <div style="float:right">
                                    &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span><a href="ad_no_mem_s.php?mem_mobile=0982696020" target="_blank"> <span class="label label-info">查詢</span></a></div>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1972/9/6&nbsp;&nbsp;49 歲</td>
                            <td class="center">高中</td>
                            <td class="center">3</td>

                            <td class="center">2021/9/4 下午 02:00:00</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 詹明錡<br>
                                <font color=green>排約：</font>陳紅<br>
                                <font color=green>邀約：</font>高雄 - 謝璧如
                            </td>
                            <td class="center">
                                <a href="../photo/2021515212118_2049392_502789.jpeg?t=8888" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_detail.php?mem_num=2049392" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1933618&lu=U120439667&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(20)</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2021/5/8~2022/7/7)</span>
                            </td>
                            <td colspan="9" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="#re" onclick="Mars_popup('ad_report.php?k_id=1933618&lu=U120439667&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(20)</a>，處理情形：<font color="#FF0000" size="2">已排約</font>)

                                內容：由 寶兒FIONA/寶兒FIONA 處理 黎台銘(主) 與 盧宜冠(被) 於 2021/9/4 下午 02:00:00 預訂排約，結果：成功　　
                            </td>
                            <td colspan=3>
                                &nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td class="center">流水陌call</td>
                            <td>2057246</td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=2057246" target="_blank">葉凌昇</a>
                                <div style="float:right">
                                    &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span><a href="ad_no_mem_s.php?mem_mobile=0935056602" target="_blank"> <span class="label label-info">查詢</span></a></div>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1983/8/29&nbsp;&nbsp;38 歲</td>
                            <td class="center">大學</td>
                            <td class="center">3</td>

                            <td class="center">2021/9/5 下午 04:00:00</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 陳紅<br>
                                <font color=green>排約：</font>陳紅<br>
                                <font color=green>邀約：</font>台中 - 童芷琳
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_detail.php?mem_num=2057246" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1946404&lu=K121968329&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(18)</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2021/6/5~2022/6/5)</span>
                            </td>
                            <td colspan="9" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="#re" onclick="Mars_popup('ad_report.php?k_id=1946404&lu=K121968329&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(18)</a>，處理情形：<font color="#FF0000" size="2">已排約</font>)

                                內容：由 陳紅/陳紅 處理 葉凌昇(主) 與 黃雅琳(被) 於 2021/9/5 下午 04:00:00 預訂排約，結果：成功　　
                            </td>
                            <td colspan=3>
                                &nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td class="center">客人自來電</td>
                            <td>2062478</td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=2062478" target="_blank">呂偉達</a>
                                <div style="float:right">
                                    &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span><a href="ad_no_mem_s.php?mem_mobile=0926251051" target="_blank"> <span class="label label-info">查詢</span></a></div>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1977/5/25&nbsp;&nbsp;44 歲</td>
                            <td class="center">碩士</td>
                            <td class="center">3</td>

                            <td class="center">2021/9/4 下午 04:00:00</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 易珊<br>
                                <font color=green>排約：</font>林馨彤<br>
                                <font color=green>邀約：</font>台北 - 易珊
                            </td>
                            <td class="center">
                                <a href="../photo/202178102024_2062478_174878.jpg?t=7226" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_detail.php?mem_num=2062478" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1954622&lu=A124336562&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(19)</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2021/6/27~2022/6/27)</span>
                            </td>
                            <td colspan="9" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="#re" onclick="Mars_popup('ad_report.php?k_id=1954622&lu=A124336562&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(19)</a>，處理情形：<font color="#FF0000" size="2">已排約</font>)

                                內容：由 林馨彤/林馨彤 處理 呂偉達(主) 與 李筱雯(被) 於 2021/9/4 下午 04:00:00 預訂排約，結果：成功　　<font color=blue>舊：</font>[2021-07-03 16:13]愛情實驗室-合格
                            </td>
                            <td colspan=3>
                                &nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td class="center">樂得流水call</td>
                            <td>2060000</td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=2060000" target="_blank">周祐生</a>
                                <div style="float:right">
                                    &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span><a href="ad_no_mem_s.php?mem_mobile=0970015325" target="_blank"> <span class="label label-info">查詢</span></a></div>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1994/2/19&nbsp;&nbsp;27 歲</td>
                            <td class="center">碩士</td>
                            <td class="center">4</td>

                            <td class="center">2021/9/6 下午 08:00:00</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 高語鍹<br>
                                <font color=green>排約：</font>李喬<br>
                                <font color=green>邀約：</font>台南 - 杜佳倩
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_detail.php?mem_num=2060000" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1951150&lu=F128951793&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(26)</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2021/6/16~2022/6/16)</span>
                            </td>
                            <td colspan="9" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="#re" onclick="Mars_popup('ad_report.php?k_id=1951150&lu=F128951793&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(26)</a>，處理情形：<font color="#FF0000" size="2">已排約</font>)

                                內容：由 李喬/李喬 處理 周祐生(主) 與 葉冠伶(被) 於 2021/9/6 下午 08:00:00 預訂排約，結果：成功　　
                            </td>
                            <td colspan=3>
                                &nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td class="center">春天網站</td>
                            <td>1474072</td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=1474072" target="_blank">黃柏儒</a>
                                <div style="float:right">
                                    &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span><a href="ad_no_mem_s.php?mem_mobile=0988220167" target="_blank"> <span class="label label-info">查詢</span></a></div>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1990/12/12&nbsp;&nbsp;31 歲</td>
                            <td class="center">專科</td>
                            <td class="center">4</td>

                            <td class="center">2021/9/1 下午 02:00:00</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 詹明錡<br>
                                <font color=green>邀約：</font>高雄 - 不明
                            </td>
                            <td class="center">
                                <a href="../photo/201893235130_1474072_466931.jpeg?t=8561" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_detail.php?mem_num=1474072" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1168771&lu=G121812678&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(25)</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2018/6/25~2019/6/25)</span>
                            </td>
                            <td colspan="9" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="#re" onclick="Mars_popup('ad_report.php?k_id=1168771&lu=G121812678&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(25)</a>，處理情形：<font color="#FF0000" size="2">已排約</font>)

                                內容：由 林馨彤/林馨彤 處理 黃柏儒(主) 與 蔡繼賢(被) 於 2021/9/1 下午 02:00:00 預訂排約，結果：成功　　
                            </td>
                            <td colspan=3>
                                &nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td class="center">約會專家-網站首頁 [singleparty_keywords_pay_iProspect]</td>
                            <td>1823144</td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=1823144" target="_blank">陳凱勝</a>
                                <div style="float:right">
                                    &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span><a href="ad_no_mem_s.php?mem_mobile=0917073863" target="_blank"> <span class="label label-info">查詢</span></a></div>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1991/11/12&nbsp;&nbsp;30 歲</td>
                            <td class="center">高職</td>
                            <td class="center">4</td>

                            <td class="center">2021/9/7 下午 08:00:00</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 詹明錡<br>
                                <font color=green>排約：</font>陳紅<br>
                                <font color=green>邀約：</font>台北 - 詹明錡
                            </td>
                            <td class="center">
                                <a href="../photo/20216519168_1823144_15011.jpg?t=7381" class="fancybox">有</a>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_detail.php?mem_num=1823144" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1581147&lu=H124196323&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(26)</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2021/6/5~2022/6/5)</span>
                            </td>
                            <td colspan="9" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="#re" onclick="Mars_popup('ad_report.php?k_id=1581147&lu=H124196323&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(26)</a>，處理情形：<font color="#FF0000" size="2">已排約</font>)

                                內容：由 李喬/李喬 處理 陳凱勝(主) 與 李倚禎(被) 於 2021/9/7 下午 08:00:00 預訂排約，結果：成功　　
                            </td>
                            <td colspan=3>
                                &nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td class="center">流水陌call</td>
                            <td>2049122</td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=2049122" target="_blank">徐仰泉</a>
                                <div style="float:right">
                                    &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span><a href="ad_no_mem_s.php?mem_mobile=0985744871" target="_blank"> <span class="label label-info">查詢</span></a></div>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1991/6/30&nbsp;&nbsp;30 歲</td>
                            <td class="center">大學</td>
                            <td class="center">5</td>

                            <td class="center">2021/9/4 下午 07:00:00</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 凱琳<br>
                                <font color=green>排約：</font>林馨彤<br>
                                <font color=green>邀約：</font>新竹 - 王敏之
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_detail.php?mem_num=2049122" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1933348&lu=F128337757&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(26)</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-一年期(2021/5/7~2022/7/6)</span>
                            </td>
                            <td colspan="9" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="#re" onclick="Mars_popup('ad_report.php?k_id=1933348&lu=F128337757&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(26)</a>，處理情形：<font color="#FF0000" size="2">約後關懷</font>)

                                內容：9/6 言：我暫時沒辦法約 昨天跑步腳翻船🥲(已知休養後主動告知可排約)　　
                            </td>
                            <td colspan=3>
                                &nbsp;
                            </td>
                        </tr>

                        <tr>
                            <td class="center">樂得流水call</td>
                            <td>2047416</td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=2047416" target="_blank">謝以雄</a>
                                <div style="float:right">
                                    &nbsp;<span class="label" style="background:#c22c7d"><a href="#" style="color:white;" data-toggle="tooltip" data-original-title="約會專家主帳號">專</a></span><a href="ad_no_mem_s.php?mem_mobile=0932704273" target="_blank"> <span class="label label-info">查詢</span></a></div>
                            </td>
                            <td class="center">男</td>
                            <td class="center">1983/2/8&nbsp;&nbsp;38 歲</td>
                            <td class="center">大學</td>
                            <td class="center">5</td>

                            <td class="center">2021/9/5 下午 12:30:00</td>

                            <td class="center">
                                <font color=green>受理：</font>台北 - 洪儀<br>
                                <font color=green>排約：</font>陳紅<br>
                                <font color=green>邀約：</font>台南 - 王秀玲
                            </td>
                            <td class="center">
                                無
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="ad_mem_detail.php?mem_num=2047416" target="_blank"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=1930651&lu=A124318537&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(19)</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color:blue">璀璨會員-二年期(2021/5/1~2023/6/30)</span>
                            </td>
                            <td colspan="9" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="#re" onclick="Mars_popup('ad_report.php?k_id=1930651&lu=A124318537&ty=member','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(19)</a>，處理情形：<font color="#FF0000" size="2">已排約</font>)

                                內容：由 陳紅/陳紅 處理 謝以雄(主) 與 涂芷溦(被) 於 2021/9/5 下午 12:30:00 預訂排約，結果：成功　　
                            </td>
                            <td colspan=3>
                                &nbsp;
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 17 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_mem_service_list.php?topage=1&branch=%E5%8F%B0%E5%8C%97&joindate2=&joindate1=&lovedate2=2021%2F09%2F28&lovedate1=2021%2F09%2F01&lovesize2=5&lovesize1=0&sex=%E7%94%B7>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_mem_service_list.php?topage=1&branch=%E5%8F%B0%E5%8C%97&joindate2=&joindate1=&lovedate2=2021%2F09%2F28&lovedate1=2021%2F09%2F01&lovesize2=5&lovesize1=0&sex=%E7%94%B7 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_mem_service_list.php?topage=1&branch=%E5%8F%B0%E5%8C%97&joindate2=&joindate1=&lovedate2=2021%2F09%2F28&lovedate1=2021%2F09%2F01&lovesize2=5&lovesize1=0&sex=%E7%94%B7" selected>1</option>
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
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    function chk_search_form() {

        return true;
    }
</script>