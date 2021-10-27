<?php
require_once("_inc.php");
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
            <li class="active">小組業績表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>區段日期表 - 小組 - 2021/9/1 至 2021/9/28</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                    <input type="button" class="btn btn-default" onclick="Mars_popup('ad_admin_diff_list_team_print.php?y1=2021/9/1&y2=2021/9/28&team=&branch=','','scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');" value="列印本頁">
                <form name="form1" method="post" action="?vst=full" class="form-inline">
                    會館：<select name="branch" class="form-control">
                        <option value="">所有會館</option>
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
                    &nbsp&nbsp
                    小組：<select name="team" class="form-control">
                        <option value="">所有小組</option>
                        <option value="優質服務組">八德 - 優質服務組</option>
                        <option value="超業">八德 - 超業</option>
                        <option value="台中閻組">台中 - 台中閻組</option>
                        <option value="台中熊雪枝">台中 - 台中熊雪枝</option>
                        <option value="台中童組">台中 - 台中童組</option>
                        <option value="台中吳組">台中 - 台中吳組</option>
                        <option value="業1組">台北 - 業1組</option>
                        <option value="業2組">台北 - 業2組</option>
                        <option value="長紅">台北 - 長紅</option>
                        <option value="業3">台北 - 業3</option>
                        <option value="C">台南 - C</option>
                        <option value="A組">台南 - A組</option>
                        <option value="B組">台南 - B組</option>
                        <option value="D組">台南 - D組</option>
                        <option value="約專">約專 - 約專</option>
                        <option value="第三組">桃園 - 第三組</option>
                        <option value="第一組">桃園 - 第一組</option>
                        <option value="迷你約">迷你約 - 迷你約</option>
                        <option value="海妮組">高雄 - 海妮組</option>
                        <option value="宛萍組">高雄 - 宛萍組</option>
                        <option value="金鳳組">高雄 - 金鳳組</option>
                        <option value="卉興組">新竹 - 卉興組</option>
                        <option value="旺旺組">新竹 - 旺旺組</option>
                        <option value="頂級組">新竹 - 頂級組</option>
                        <option value="閃亮組">新竹 - 閃亮組</option>
                    </select>
                    &nbsp&nbsp
                    日期：
                    <input type="text" name="y1" class="datepicker" autocomplete="off" style="width:120px;" value="2021/9/1"> 至
                    <input type="text" name="y2" class="datepicker" autocomplete="off" style="width:120px;" value="2021/9/28">　<input type="submit" name="Submit" class="btn btn-default" value="查詢">
                </form>
                </p>



                <!-- 標籤分頁 -->
                <div class="">
                    <!-- 標籤頭 -->
                    <ul class="nav nav-tabs nav-top-border" role="tablist">
                        <li class="active"><a href="#taipei" aria-controls="home" role="tab" data-toggle="tab">台北</a></li>
                        <li><a href="#taoyuan" aria-controls="profile" role="tab" data-toggle="tab">桃園</a></li>
                        <li><a href="#hsinchu" aria-controls="messages" role="tab" data-toggle="tab">新竹</a></li>
                        <li><a href="#taichung" aria-controls="settings" role="tab" data-toggle="tab">台中</a></li>
                        <li><a href="#tainan" aria-controls="settings" role="tab" data-toggle="tab">台南</a></li>
                        <li><a href="#kaohsiung" aria-controls="settings" role="tab" data-toggle="tab">高雄</a></li>
                        <li><a href="#bade" aria-controls="settings" role="tab" data-toggle="tab">八德</a></li>
                        <li><a href="#sp" aria-controls="settings" role="tab" data-toggle="tab">約專</a></li>
                        <li><a href="#mini" aria-controls="settings" role="tab" data-toggle="tab">迷你約</a></li>
                        <li><a href="#headoffice" aria-controls="settings" role="tab" data-toggle="tab">總管理處</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#dropdown1" tabindex="-1" data-toggle="tab">@fat</a></li>
                                <li><a href="#dropdown2" tabindex="-1" data-toggle="tab">@mdo</a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- 標籤內容 -->
                    <div class="tab-content">
                        <!-- 標籤內容台北 -->
                        <div class="tab-pane active" id="taipei">
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><i class="icon-th"></i> 台北 - 業1組</div>
                                        <div class="panel-body">
                                            <div style="font-weight:bold">小組組長：高語鍹</div><br>
                                            <table class="table table-striped table-bordered bootstrap-datatable">
                                                <tr>
                                                    <td width=3>1</td>
                                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=180&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">高語鍹</a></td>
                                                    <td>$58,947</td>
                                                </tr>
                                                <tr>
                                                    <td width=3>2</td>
                                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1679&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">陳玉涵</a></td>
                                                    <td>$1,200</td>
                                                </tr>
                                                <tr>
                                                    <td width=3>3</td>
                                                    <td>陳稚翔</a></td>
                                                    <td>$0</td>
                                                </tr>
                                            </table>
                                            <div>組長 1 位、組員 2 位、共 3 位成員</div>
                                            <div style="font-weight:bold">小組目標：$1,200,000</div>
                                            <div style="font-weight:bold">小組業績：$60,147 &nbsp(-$1,139,853)</div>
                                            <div style="font-weight:bold;color:red">業績達成：5%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><i class="icon-th"></i> 台北 - 業1組</div>
                                        <div class="panel-body">
                                            <div style="font-weight:bold">小組組長：高語鍹</div><br>
                                            <table class="table table-striped table-bordered bootstrap-datatable">
                                                <tr>
                                                    <td width=3>1</td>
                                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=180&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">高語鍹</a></td>
                                                    <td>$58,947</td>
                                                </tr>
                                                <tr>
                                                    <td width=3>2</td>
                                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1679&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">陳玉涵</a></td>
                                                    <td>$1,200</td>
                                                </tr>
                                                <tr>
                                                    <td width=3>3</td>
                                                    <td>陳稚翔</a></td>
                                                    <td>$0</td>
                                                </tr>
                                            </table>
                                            <div>組長 1 位、組員 2 位、共 3 位成員</div>
                                            <div style="font-weight:bold">小組目標：$1,200,000</div>
                                            <div style="font-weight:bold">小組業績：$60,147 &nbsp(-$1,139,853)</div>
                                            <div style="font-weight:bold;color:red">業績達成：5%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><i class="icon-th"></i> 台北 - 業1組</div>
                                        <div class="panel-body">
                                            <div style="font-weight:bold">小組組長：高語鍹</div><br>
                                            <table class="table table-striped table-bordered bootstrap-datatable">
                                                <tr>
                                                    <td width=3>1</td>
                                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=180&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">高語鍹</a></td>
                                                    <td>$58,947</td>
                                                </tr>
                                                <tr>
                                                    <td width=3>2</td>
                                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1679&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">陳玉涵</a></td>
                                                    <td>$1,200</td>
                                                </tr>
                                                <tr>
                                                    <td width=3>3</td>
                                                    <td>陳稚翔</a></td>
                                                    <td>$0</td>
                                                </tr>
                                            </table>
                                            <div>組長 1 位、組員 2 位、共 3 位成員</div>
                                            <div style="font-weight:bold">小組目標：$1,200,000</div>
                                            <div style="font-weight:bold">小組業績：$60,147 &nbsp(-$1,139,853)</div>
                                            <div style="font-weight:bold;color:red">業績達成：5%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><i class="icon-th"></i> 台北 - 業1組</div>
                                        <div class="panel-body">
                                            <div style="font-weight:bold">小組組長：高語鍹</div><br>
                                            <table class="table table-striped table-bordered bootstrap-datatable">
                                                <tr>
                                                    <td width=3>1</td>
                                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=180&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">高語鍹</a></td>
                                                    <td>$58,947</td>
                                                </tr>
                                                <tr>
                                                    <td width=3>2</td>
                                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1679&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">陳玉涵</a></td>
                                                    <td>$1,200</td>
                                                </tr>
                                                <tr>
                                                    <td width=3>3</td>
                                                    <td>陳稚翔</a></td>
                                                    <td>$0</td>
                                                </tr>
                                            </table>
                                            <div>組長 1 位、組員 2 位、共 3 位成員</div>
                                            <div style="font-weight:bold">小組目標：$1,200,000</div>
                                            <div style="font-weight:bold">小組業績：$60,147 &nbsp(-$1,139,853)</div>
                                            <div style="font-weight:bold;color:red">業績達成：5%</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><i class="icon-th"></i> 台北 - 業1組</div>
                                        <div class="panel-body">
                                            <div style="font-weight:bold">小組組長：高語鍹</div><br>
                                            <table class="table table-striped table-bordered bootstrap-datatable">
                                                <tr>
                                                    <td width=3>1</td>
                                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=180&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">高語鍹</a></td>
                                                    <td>$58,947</td>
                                                </tr>
                                                <tr>
                                                    <td width=3>2</td>
                                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1679&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">陳玉涵</a></td>
                                                    <td>$1,200</td>
                                                </tr>
                                                <tr>
                                                    <td width=3>3</td>
                                                    <td>陳稚翔</a></td>
                                                    <td>$0</td>
                                                </tr>
                                            </table>
                                            <div>組長 1 位、組員 2 位、共 3 位成員</div>
                                            <div style="font-weight:bold">小組目標：$1,200,000</div>
                                            <div style="font-weight:bold">小組業績：$60,147 &nbsp(-$1,139,853)</div>
                                            <div style="font-weight:bold;color:red">業績達成：5%</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><i class="icon-th"></i> 台北 - 業1組</div>
                                        <div class="panel-body">
                                            <div style="font-weight:bold">小組組長：高語鍹</div><br>
                                            <table class="table table-striped table-bordered bootstrap-datatable">
                                                <tr>
                                                    <td width=3>1</td>
                                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=180&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">高語鍹</a></td>
                                                    <td>$58,947</td>
                                                </tr>
                                                <tr>
                                                    <td width=3>2</td>
                                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1679&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">陳玉涵</a></td>
                                                    <td>$1,200</td>
                                                </tr>
                                                <tr>
                                                    <td width=3>3</td>
                                                    <td>陳稚翔</a></td>
                                                    <td>$0</td>
                                                </tr>
                                            </table>
                                            <div>組長 1 位、組員 2 位、共 3 位成員</div>
                                            <div style="font-weight:bold">小組目標：$1,200,000</div>
                                            <div style="font-weight:bold">小組業績：$60,147 &nbsp(-$1,139,853)</div>
                                            <div style="font-weight:bold;color:red">業績達成：5%</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- 標籤內容桃園 -->
                        <div class="tab-pane" id="taoyuan">
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading text-center"><i class="icon-th"></i> 台北 - 業1組</div>
                                        <div class="panel-body">
                                            <div style="font-weight:bold">小組組長：高語鍹</div><br>
                                            <table class="table table-striped table-bordered bootstrap-datatable">
                                                <tr>
                                                    <td width=3>1</td>
                                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=180&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">高語鍹</a></td>
                                                    <td>$58,947</td>
                                                </tr>
                                                <tr>
                                                    <td width=3>2</td>
                                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1679&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">陳玉涵</a></td>
                                                    <td>$1,200</td>
                                                </tr>
                                                <tr>
                                                    <td width=3>3</td>
                                                    <td>陳稚翔</a></td>
                                                    <td>$0</td>
                                                </tr>
                                            </table>
                                            <div>組長 1 位、組員 2 位、共 3 位成員</div>
                                            <div style="font-weight:bold">小組目標：$1,200,000</div>
                                            <div style="font-weight:bold">小組業績：$60,147 &nbsp(-$1,139,853)</div>
                                            <div style="font-weight:bold;color:red">業績達成：5%</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    
                </div>
                <!-- /標籤分頁 -->


                <!-- 小組業績明細 -->
                <div class="row">
                    <div class="col-md-12">
                        <p>小組業績明細</p>
                        <table class="table table-striped table-bordered bootstrap-datatable">
                            <tbody>
                                <tr>
                                    <td>排名</td>
                                    <td>協會</td>
                                    <td>小組</td>
                                    <td>秘書</td>
                                    <td>職稱</td>
                                    <td>業績</td>
                                </tr>

                                <tr>
                                    <td>1</td>
                                    <td>台南</td>
                                    <td>A組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=411&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">杜佳倩</a></td>

                                    <td>組織副督導</td>
                                    <td>$177,198</td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>台南</td>
                                    <td>B組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=38&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">黃琪雅</a></td>

                                    <td>組織副督導</td>
                                    <td>$147,953</td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>高雄</td>
                                    <td>海妮組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=594&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">覃秋紅</a></td>

                                    <td>組織副督導</td>
                                    <td>$146,338</td>
                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td>台南</td>
                                    <td>B組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1127&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">周淑華</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$99,070</td>
                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td>八德</td>
                                    <td>超業</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1445&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">周靖雯</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$81,782</td>
                                </tr>

                                <tr>
                                    <td>6</td>
                                    <td>台南</td>
                                    <td>D組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=54&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">林雪娟</a></td>

                                    <td>愛情顧問</td>
                                    <td>$74,897</td>
                                </tr>

                                <tr>
                                    <td>7</td>
                                    <td>新竹</td>
                                    <td>旺旺組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1710&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">彭惠芝</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$71,433</td>
                                </tr>

                                <tr>
                                    <td>8</td>
                                    <td>高雄</td>
                                    <td>海妮組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1545&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">李鴻</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$70,560</td>
                                </tr>

                                <tr>
                                    <td>9</td>
                                    <td>迷你約</td>
                                    <td>迷你約</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1713&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">程立彤</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$69,840</td>
                                </tr>

                                <tr>
                                    <td>10</td>
                                    <td>台中</td>
                                    <td>台中童組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=993&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">劉倪芳</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$61,304</td>
                                </tr>

                                <tr>
                                    <td>11</td>
                                    <td>新竹</td>
                                    <td>頂級組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=569&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">黃于玲</a></td>

                                    <td>會務部副督導</td>
                                    <td>$59,260</td>
                                </tr>

                                <tr>
                                    <td>12</td>
                                    <td>台北</td>
                                    <td>業1組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=180&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">高語鍹</a></td>

                                    <td>資深客戶經理</td>
                                    <td>$58,947</td>
                                </tr>

                                <tr>
                                    <td>13</td>
                                    <td>台中</td>
                                    <td>台中童組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1505&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">鄭珮貝</a></td>

                                    <td>諮詢部組長</td>
                                    <td>$55,020</td>
                                </tr>

                                <tr>
                                    <td>14</td>
                                    <td>桃園</td>
                                    <td>第一組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1185&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">林均澤</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$52,700</td>
                                </tr>

                                <tr>
                                    <td>15</td>
                                    <td>台南</td>
                                    <td>B組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=35&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">趙素蕙</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$52,233</td>
                                </tr>

                                <tr>
                                    <td>16</td>
                                    <td>桃園</td>
                                    <td>第三組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=121&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">邱月嬌</a></td>

                                    <td>組織副督導</td>
                                    <td>$51,574</td>
                                </tr>

                                <tr>
                                    <td>17</td>
                                    <td>台中</td>
                                    <td>台中吳組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=50&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">陳素娟</a></td>

                                    <td>愛情顧問</td>
                                    <td>$51,560</td>
                                </tr>

                                <tr>
                                    <td>18</td>
                                    <td>台北</td>
                                    <td>業3</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1678&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">許凱甯</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$47,400</td>
                                </tr>

                                <tr>
                                    <td>19</td>
                                    <td>台中</td>
                                    <td>台中閻組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=36&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">彭春福</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$46,560</td>
                                </tr>

                                <tr>
                                    <td>20</td>
                                    <td>台南</td>
                                    <td>C</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1415&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">王秀玲</a></td>

                                    <td>諮詢部組長</td>
                                    <td>$45,620</td>
                                </tr>

                                <tr>
                                    <td>21</td>
                                    <td>台南</td>
                                    <td>D組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=33&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">顏延琇</a></td>

                                    <td>服務部副督導</td>
                                    <td>$44,300</td>
                                </tr>

                                <tr>
                                    <td>22</td>
                                    <td>台中</td>
                                    <td>台中閻組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=937&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">劉咪秀</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$42,800</td>
                                </tr>

                                <tr>
                                    <td>23</td>
                                    <td>八德</td>
                                    <td>超業</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1605&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">于庭萱</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$40,379</td>
                                </tr>

                                <tr>
                                    <td>24</td>
                                    <td>八德</td>
                                    <td>超業</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1714&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">杜佳臻</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$38,350</td>
                                </tr>

                                <tr>
                                    <td>25</td>
                                    <td>台中</td>
                                    <td>台中吳組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=83&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">吳秋芬</a></td>

                                    <td>服務部主任</td>
                                    <td>$37,100</td>
                                </tr>

                                <tr>
                                    <td>26</td>
                                    <td>高雄</td>
                                    <td>金鳳組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=439&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">藍淑貞</a></td>

                                    <td>電訪員</td>
                                    <td>$36,900</td>
                                </tr>

                                <tr>
                                    <td>27</td>
                                    <td>高雄</td>
                                    <td>金鳳組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=487&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">蕭哲聰</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$36,726</td>
                                </tr>

                                <tr>
                                    <td>28</td>
                                    <td>高雄</td>
                                    <td>宛萍組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1132&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">謝宛萍</a></td>

                                    <td>組織副督導</td>
                                    <td>$35,793</td>
                                </tr>

                                <tr>
                                    <td>29</td>
                                    <td>約專</td>
                                    <td>約專</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1704&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">陳盈甄</a></td>

                                    <td>愛情顧問</td>
                                    <td>$35,780</td>
                                </tr>

                                <tr>
                                    <td>30</td>
                                    <td>約專</td>
                                    <td>約專</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1417&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">高浤瑋</a></td>

                                    <td>督導</td>
                                    <td>$32,000</td>
                                </tr>

                                <tr>
                                    <td>31</td>
                                    <td>八德</td>
                                    <td>超業</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1618&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">柯素月</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$31,088</td>
                                </tr>

                                <tr>
                                    <td>32</td>
                                    <td>高雄</td>
                                    <td>金鳳組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=109&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">陳金鳳</a></td>

                                    <td>愛情顧問</td>
                                    <td>$31,000</td>
                                </tr>

                                <tr>
                                    <td>33</td>
                                    <td>台中</td>
                                    <td>台中熊雪枝</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1035&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">張鳳玲</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$29,679</td>
                                </tr>

                                <tr>
                                    <td>34</td>
                                    <td>台北</td>
                                    <td>業3</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=624&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">黃明儀</a></td>

                                    <td>客戶部經理</td>
                                    <td>$29,500</td>
                                </tr>

                                <tr>
                                    <td>35</td>
                                    <td>高雄</td>
                                    <td>宛萍組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1654&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">謝宛倫</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$29,000</td>
                                </tr>

                                <tr>
                                    <td>36</td>
                                    <td>台中</td>
                                    <td>台中童組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1424&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">林宇婕</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$27,160</td>
                                </tr>

                                <tr>
                                    <td>37</td>
                                    <td>台北</td>
                                    <td>業2組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=374&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">詹善宇</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$24,985</td>
                                </tr>

                                <tr>
                                    <td>38</td>
                                    <td>八德</td>
                                    <td>超業</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1705&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">林嘉芮</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$24,444</td>
                                </tr>

                                <tr>
                                    <td>39</td>
                                    <td>台中</td>
                                    <td>台中閻組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=84&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">閻秋波</a></td>

                                    <td>會務部副督導</td>
                                    <td>$23,880</td>
                                </tr>

                                <tr>
                                    <td>40</td>
                                    <td>八德</td>
                                    <td>超業</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1208&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">蔡佩蓁</a></td>

                                    <td>客戶部經理</td>
                                    <td>$23,787</td>
                                </tr>

                                <tr>
                                    <td>41</td>
                                    <td>高雄</td>
                                    <td>宛萍組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=718&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">馮琬喬</a></td>

                                    <td>組織副督導</td>
                                    <td>$22,492</td>
                                </tr>

                                <tr>
                                    <td>42</td>
                                    <td>桃園</td>
                                    <td>第一組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1507&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">陳有春</a></td>

                                    <td>愛情顧問</td>
                                    <td>$22,300</td>
                                </tr>

                                <tr>
                                    <td>43</td>
                                    <td>新竹</td>
                                    <td>卉興組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1394&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">陳妍瑀</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$21,000</td>
                                </tr>

                                <tr>
                                    <td>44</td>
                                    <td>新竹</td>
                                    <td>卉興組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=587&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">陳雅婷</a></td>

                                    <td>組織副督導</td>
                                    <td>$20,400</td>
                                </tr>

                                <tr>
                                    <td>45</td>
                                    <td>八德</td>
                                    <td>超業</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1681&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">劉宜姍</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$20,000</td>
                                </tr>

                                <tr>
                                    <td>46</td>
                                    <td>高雄</td>
                                    <td>海妮組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1051&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">倪梅</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$19,819</td>
                                </tr>

                                <tr>
                                    <td>47</td>
                                    <td>新竹</td>
                                    <td>旺旺組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=95&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">劉筱萍</a></td>

                                    <td>組織副督導</td>
                                    <td>$19,720</td>
                                </tr>

                                <tr>
                                    <td>48</td>
                                    <td>台北</td>
                                    <td>長紅</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1298&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">林馨彤</a></td>

                                    <td>愛情顧問</td>
                                    <td>$17,850</td>
                                </tr>

                                <tr>
                                    <td>49</td>
                                    <td>高雄</td>
                                    <td>海妮組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1606&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">嚴子爲</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$15,520</td>
                                </tr>

                                <tr>
                                    <td>50</td>
                                    <td>桃園</td>
                                    <td>第一組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=697&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">廖美珍</a></td>

                                    <td>組織副督導</td>
                                    <td>$15,520</td>
                                </tr>

                                <tr>
                                    <td>51</td>
                                    <td>台北</td>
                                    <td>長紅</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1635&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">李至喬</a></td>

                                    <td>愛情顧問</td>
                                    <td>$15,400</td>
                                </tr>

                                <tr>
                                    <td>52</td>
                                    <td>新竹</td>
                                    <td>閃亮組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=513&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">黃慧雅</a></td>

                                    <td>愛情顧問</td>
                                    <td>$14,546</td>
                                </tr>

                                <tr>
                                    <td>53</td>
                                    <td>八德</td>
                                    <td>優質服務組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1384&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">柯婉儀</a></td>

                                    <td>愛情顧問</td>
                                    <td>$12,173</td>
                                </tr>

                                <tr>
                                    <td>54</td>
                                    <td>台北</td>
                                    <td>長紅</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=875&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">余宗嶼</a></td>

                                    <td>督導</td>
                                    <td>$11,600</td>
                                </tr>

                                <tr>
                                    <td>55</td>
                                    <td>高雄</td>
                                    <td>金鳳組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1133&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">劉明英</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$10,784</td>
                                </tr>

                                <tr>
                                    <td>56</td>
                                    <td>八德</td>
                                    <td>優質服務組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1588&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">詹惠驛</a></td>

                                    <td>愛情顧問</td>
                                    <td>$9,773</td>
                                </tr>

                                <tr>
                                    <td>57</td>
                                    <td>高雄</td>
                                    <td>宛萍組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=372&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">吳鳳英</a></td>

                                    <td>愛情顧問</td>
                                    <td>$8,600</td>
                                </tr>

                                <tr>
                                    <td>58</td>
                                    <td>台南</td>
                                    <td>B組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1370&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">陳均妮</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$4,850</td>
                                </tr>

                                <tr>
                                    <td>59</td>
                                    <td>台中</td>
                                    <td>台中閻組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=721&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">余致媛</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$4,300</td>
                                </tr>

                                <tr>
                                    <td>60</td>
                                    <td>桃園</td>
                                    <td>第一組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1602&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">趙可涵</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$2,150</td>
                                </tr>

                                <tr>
                                    <td>61</td>
                                    <td>高雄</td>
                                    <td>宛萍組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1000&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">楊繡瑟</a></td>

                                    <td>組織副督導</td>
                                    <td>$1,888</td>
                                </tr>

                                <tr>
                                    <td>62</td>
                                    <td>桃園</td>
                                    <td>第一組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=448&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">連杏枌</a></td>

                                    <td>督導</td>
                                    <td>$1,694</td>
                                </tr>

                                <tr>
                                    <td>63</td>
                                    <td>新竹</td>
                                    <td>卉興組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1006&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">楊淑梅</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$1,200</td>
                                </tr>

                                <tr>
                                    <td>64</td>
                                    <td>台北</td>
                                    <td>業1組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=1679&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">陳玉涵</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$1,200</td>
                                </tr>

                                <tr>
                                    <td>65</td>
                                    <td>高雄</td>
                                    <td>海妮組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=923&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">李偉慈</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$688</td>
                                </tr>

                                <tr>
                                    <td>66</td>
                                    <td>高雄</td>
                                    <td>金鳳組</td>

                                    <td><a href="javascript:Mars_popup('ad_admin_month_list_diff_view.php?an=200&ny1=2021/9/1&ny2=2021/9/28','','status=yes,menubar=yes,scrollbars=yes,width=780,height=500,top=10,left=10');">張美嬋</a></td>

                                    <td>諮詢顧問</td>
                                    <td>$291</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>


        </div>
        <!--/row-->

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>