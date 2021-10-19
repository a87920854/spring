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
            <li>諮詢預訂表</li>
            <li class="active">設置諮詢時間</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>諮詢預訂表-設置諮詢時間</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">

                    <p>
                        <input type="button" value="新增預訂諮詢" class="btn btn-info" onclick="Mars_popup('ad_advisory_invite_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=700,height=700,top=10,left=10');">
                        <a href="ad_advisory_invite.php" class="btn btn-black">諮詢預訂表</a>
                        <a href="ad_advisory_invite_settime.php" class="btn btn-green">設置諮詢時間</a>
                        <a href="ad_advisory_invite_timelist.php" class="btn btn-blue">查詢講師時間</a>
                    </p>
                    <form method="post" target="_self">
                        <p><input type="submit" class="btn btn-warning" name="st" value="選取項目可約">&nbsp;&nbsp;<input type="submit" class="btn btn-danger" name="st" value="取消可約"></p>
                        <input type="hidden" name="nowt" value="2021/10/18">
                        <table class="table table-striped table-bordered bootstrap-datatable">
                            <tbody>

                                <tr>
                                    <td width="74%" colspan=4><strong>110 年10月 </strong></td>
                                    <td width="13%">●<a href="?y=2021&m=10">本月</a></td>
                                    <td width="13%" style="border:0px">▲<a href="?y=2021&m=9">上一個月</a></td>
                                    <td width="11%" style="border:0px">▼<a href="?y=2021&m=11">下一個月</a></td>
                                </tr>
                                <tr>
                                    <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期日</td>
                                    <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期一</td>
                                    <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期二</td>
                                    <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期三</td>
                                    <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期四</td>
                                    <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期五</td>
                                    <td width="14%" align="center" style="width:14%;height:20px;background:#ffffff;">星期六</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">1</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/1 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/10/1 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/1 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/10/1 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/1 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/10/1 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/1 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/10/1 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/1 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/10/1 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/1 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/10/1 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/1 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/10/1 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">2</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/2 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/10/2 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/2 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/10/2 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/2 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/10/2 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/2 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/10/2 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/2 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/10/2 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/2 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/10/2 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/2 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/10/2 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">3</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/3 10:00" disabled>&nbsp;10:00 <a href="?st=add&t=2021/10/3 10:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/3 11:00" disabled>&nbsp;11:00 <a href="?st=add&t=2021/10/3 11:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/3 12:00" disabled>&nbsp;12:00 <a href="?st=add&t=2021/10/3 12:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/3 13:00" disabled>&nbsp;13:00 <a href="?st=add&t=2021/10/3 13:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/3 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/10/3 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/3 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/10/3 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/3 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/10/3 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">4</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/4 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/10/4 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/4 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/10/4 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/4 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/10/4 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/4 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/10/4 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/4 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/10/4 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/4 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/10/4 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/4 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/10/4 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">5</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/5 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/10/5 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/5 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/10/5 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/5 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/10/5 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/5 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/10/5 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/5 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/10/5 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/5 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/10/5 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/5 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/10/5 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">6</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/6 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/10/6 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/6 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/10/6 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/6 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/10/6 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/6 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/10/6 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/6 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/10/6 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/6 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/10/6 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/6 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/10/6 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">7</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/7 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/10/7 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/7 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/10/7 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/7 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/10/7 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/7 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/10/7 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/7 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/10/7 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/7 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/10/7 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/7 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/10/7 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">8</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/8 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/10/8 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/8 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/10/8 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/8 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/10/8 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/8 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/10/8 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/8 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/10/8 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/8 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/10/8 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/8 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/10/8 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">9</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/9 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/10/9 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/9 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/10/9 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/9 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/10/9 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/9 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/10/9 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/9 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/10/9 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/9 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/10/9 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/9 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/10/9 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">10</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/10 10:00" disabled>&nbsp;10:00 <a href="?st=add&t=2021/10/10 10:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/10 11:00" disabled>&nbsp;11:00 <a href="?st=add&t=2021/10/10 11:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/10 12:00" disabled>&nbsp;12:00 <a href="?st=add&t=2021/10/10 12:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/10 13:00" disabled>&nbsp;13:00 <a href="?st=add&t=2021/10/10 13:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/10 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/10/10 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/10 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/10/10 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/10 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/10/10 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">11</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/11 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/10/11 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/11 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/10/11 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/11 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/10/11 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/11 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/10/11 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/11 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/10/11 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/11 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/10/11 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/11 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/10/11 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">12</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/12 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/10/12 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/12 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/10/12 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/12 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/10/12 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/12 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/10/12 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/12 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/10/12 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/12 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/10/12 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/12 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/10/12 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">13</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/13 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/10/13 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/13 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/10/13 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/13 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/10/13 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/13 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/10/13 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/13 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/10/13 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/13 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/10/13 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/13 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/10/13 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">14</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/14 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/10/14 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/14 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/10/14 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/14 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/10/14 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/14 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/10/14 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/14 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/10/14 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/14 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/10/14 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/14 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/10/14 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">15</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/15 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/10/15 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/15 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/10/15 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/15 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/10/15 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/15 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/10/15 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/15 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/10/15 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/15 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/10/15 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/15 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/10/15 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">16</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/16 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/10/16 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/16 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/10/16 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/16 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/10/16 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/16 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/10/16 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/16 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/10/16 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/16 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/10/16 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/16 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/10/16 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">17</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/17 10:00" disabled>&nbsp;10:00 <a href="?st=add&t=2021/10/17 10:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/17 11:00" disabled>&nbsp;11:00 <a href="?st=add&t=2021/10/17 11:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/17 12:00" disabled>&nbsp;12:00 <a href="?st=add&t=2021/10/17 12:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/17 13:00" disabled>&nbsp;13:00 <a href="?st=add&t=2021/10/17 13:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/17 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/10/17 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/17 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/10/17 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/17 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/10/17 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">18</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/18 14:00">&nbsp;14:00 <a href="?st=add&t=2021/10/18 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/18 15:00">&nbsp;15:00 <a href="?st=add&t=2021/10/18 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/18 16:00">&nbsp;16:00 <a href="?st=add&t=2021/10/18 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/18 17:00">&nbsp;17:00 <a href="?st=add&t=2021/10/18 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/18 18:00">&nbsp;18:00 <a href="?st=add&t=2021/10/18 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/18 19:00">&nbsp;19:00 <a href="?st=add&t=2021/10/18 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/18 20:00">&nbsp;20:00 <a href="?st=add&t=2021/10/18 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">19</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/19 14:00">&nbsp;14:00 <a href="?st=add&t=2021/10/19 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/19 15:00">&nbsp;15:00 <a href="?st=add&t=2021/10/19 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/19 16:00">&nbsp;16:00 <a href="?st=add&t=2021/10/19 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/19 17:00">&nbsp;17:00 <a href="?st=add&t=2021/10/19 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/19 18:00">&nbsp;18:00 <a href="?st=add&t=2021/10/19 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/19 19:00">&nbsp;19:00 <a href="?st=add&t=2021/10/19 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/19 20:00">&nbsp;20:00 <a href="?st=add&t=2021/10/19 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">20</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/20 14:00">&nbsp;14:00 <a href="?st=add&t=2021/10/20 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/20 15:00">&nbsp;15:00 <a href="?st=add&t=2021/10/20 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/20 16:00">&nbsp;16:00 <a href="?st=add&t=2021/10/20 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/20 17:00">&nbsp;17:00 <a href="?st=add&t=2021/10/20 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/20 18:00">&nbsp;18:00 <a href="?st=add&t=2021/10/20 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/20 19:00">&nbsp;19:00 <a href="?st=add&t=2021/10/20 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/20 20:00">&nbsp;20:00 <a href="?st=add&t=2021/10/20 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">21</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/21 14:00">&nbsp;14:00 <a href="?st=add&t=2021/10/21 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/21 15:00">&nbsp;15:00 <a href="?st=add&t=2021/10/21 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/21 16:00">&nbsp;16:00 <a href="?st=add&t=2021/10/21 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/21 17:00">&nbsp;17:00 <a href="?st=add&t=2021/10/21 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/21 18:00">&nbsp;18:00 <a href="?st=add&t=2021/10/21 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/21 19:00">&nbsp;19:00 <a href="?st=add&t=2021/10/21 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/21 20:00">&nbsp;20:00 <a href="?st=add&t=2021/10/21 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">22</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/22 14:00">&nbsp;14:00 <a href="?st=add&t=2021/10/22 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/22 15:00">&nbsp;15:00 <a href="?st=add&t=2021/10/22 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/22 16:00">&nbsp;16:00 <a href="?st=add&t=2021/10/22 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/22 17:00">&nbsp;17:00 <a href="?st=add&t=2021/10/22 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/22 18:00">&nbsp;18:00 <a href="?st=add&t=2021/10/22 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/22 19:00">&nbsp;19:00 <a href="?st=add&t=2021/10/22 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/22 20:00">&nbsp;20:00 <a href="?st=add&t=2021/10/22 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">23</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/23 14:00">&nbsp;14:00 <a href="?st=add&t=2021/10/23 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/23 15:00">&nbsp;15:00 <a href="?st=add&t=2021/10/23 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/23 16:00">&nbsp;16:00 <a href="?st=add&t=2021/10/23 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/23 17:00">&nbsp;17:00 <a href="?st=add&t=2021/10/23 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/23 18:00">&nbsp;18:00 <a href="?st=add&t=2021/10/23 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/23 19:00">&nbsp;19:00 <a href="?st=add&t=2021/10/23 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/23 20:00">&nbsp;20:00 <a href="?st=add&t=2021/10/23 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">24</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/24 10:00">&nbsp;10:00 <a href="?st=add&t=2021/10/24 10:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/24 11:00">&nbsp;11:00 <a href="?st=add&t=2021/10/24 11:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/24 12:00">&nbsp;12:00 <a href="?st=add&t=2021/10/24 12:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/24 13:00">&nbsp;13:00 <a href="?st=add&t=2021/10/24 13:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/24 14:00">&nbsp;14:00 <a href="?st=add&t=2021/10/24 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/24 15:00">&nbsp;15:00 <a href="?st=add&t=2021/10/24 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/24 16:00">&nbsp;16:00 <a href="?st=add&t=2021/10/24 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">25</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/25 14:00">&nbsp;14:00 <a href="?st=add&t=2021/10/25 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/25 15:00">&nbsp;15:00 <a href="?st=add&t=2021/10/25 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/25 16:00">&nbsp;16:00 <a href="?st=add&t=2021/10/25 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/25 17:00">&nbsp;17:00 <a href="?st=add&t=2021/10/25 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/25 18:00">&nbsp;18:00 <a href="?st=add&t=2021/10/25 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/25 19:00">&nbsp;19:00 <a href="?st=add&t=2021/10/25 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/25 20:00">&nbsp;20:00 <a href="?st=add&t=2021/10/25 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">26</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/26 14:00">&nbsp;14:00 <a href="?st=add&t=2021/10/26 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/26 15:00">&nbsp;15:00 <a href="?st=add&t=2021/10/26 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/26 16:00">&nbsp;16:00 <a href="?st=add&t=2021/10/26 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/26 17:00">&nbsp;17:00 <a href="?st=add&t=2021/10/26 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/26 18:00">&nbsp;18:00 <a href="?st=add&t=2021/10/26 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/26 19:00">&nbsp;19:00 <a href="?st=add&t=2021/10/26 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/26 20:00">&nbsp;20:00 <a href="?st=add&t=2021/10/26 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">27</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/27 14:00">&nbsp;14:00 <a href="?st=add&t=2021/10/27 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/27 15:00">&nbsp;15:00 <a href="?st=add&t=2021/10/27 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/27 16:00">&nbsp;16:00 <a href="?st=add&t=2021/10/27 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/27 17:00">&nbsp;17:00 <a href="?st=add&t=2021/10/27 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/27 18:00">&nbsp;18:00 <a href="?st=add&t=2021/10/27 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/27 19:00">&nbsp;19:00 <a href="?st=add&t=2021/10/27 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/27 20:00">&nbsp;20:00 <a href="?st=add&t=2021/10/27 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">28</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/28 14:00">&nbsp;14:00 <a href="?st=add&t=2021/10/28 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/28 15:00">&nbsp;15:00 <a href="?st=add&t=2021/10/28 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/28 16:00">&nbsp;16:00 <a href="?st=add&t=2021/10/28 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/28 17:00">&nbsp;17:00 <a href="?st=add&t=2021/10/28 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/28 18:00">&nbsp;18:00 <a href="?st=add&t=2021/10/28 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/28 19:00">&nbsp;19:00 <a href="?st=add&t=2021/10/28 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/28 20:00">&nbsp;20:00 <a href="?st=add&t=2021/10/28 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">29</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/29 14:00">&nbsp;14:00 <a href="?st=add&t=2021/10/29 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/29 15:00">&nbsp;15:00 <a href="?st=add&t=2021/10/29 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/29 16:00">&nbsp;16:00 <a href="?st=add&t=2021/10/29 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/29 17:00">&nbsp;17:00 <a href="?st=add&t=2021/10/29 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/29 18:00">&nbsp;18:00 <a href="?st=add&t=2021/10/29 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/29 19:00">&nbsp;19:00 <a href="?st=add&t=2021/10/29 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/29 20:00">&nbsp;20:00 <a href="?st=add&t=2021/10/29 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">30</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/30 14:00">&nbsp;14:00 <a href="?st=add&t=2021/10/30 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/30 15:00">&nbsp;15:00 <a href="?st=add&t=2021/10/30 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/30 16:00">&nbsp;16:00 <a href="?st=add&t=2021/10/30 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/30 17:00">&nbsp;17:00 <a href="?st=add&t=2021/10/30 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/30 18:00">&nbsp;18:00 <a href="?st=add&t=2021/10/30 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/30 19:00">&nbsp;19:00 <a href="?st=add&t=2021/10/30 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/30 20:00">&nbsp;20:00 <a href="?st=add&t=2021/10/30 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">31</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/31 10:00">&nbsp;10:00 <a href="?st=add&t=2021/10/31 10:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/31 11:00">&nbsp;11:00 <a href="?st=add&t=2021/10/31 11:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/31 12:00">&nbsp;12:00 <a href="?st=add&t=2021/10/31 12:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/31 13:00">&nbsp;13:00 <a href="?st=add&t=2021/10/31 13:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/31 14:00">&nbsp;14:00 <a href="?st=add&t=2021/10/31 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/31 15:00">&nbsp;15:00 <a href="?st=add&t=2021/10/31 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/10/31 16:00">&nbsp;16:00 <a href="?st=add&t=2021/10/31 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
    var $mtu = "ad_advisory_invite.";

    $(function() {
        $(".selallbox").on("click", function() {
            var $this = $(this);
            if ($this.prop("checked")) {
                $this.closest("td").find("input:checkbox").prop("checked", true);
            } else {
                $this.closest("td").find("input:checkbox").prop("checked", false);
            }

        });
    });
</script>