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
                        <input type="hidden" name="nowt" value="2021/9/13">
                        <table class="table table-striped table-bordered bootstrap-datatable">
                            <tbody>

                                <tr>
                                    <td width="74%" colspan=4><strong>110 年9月 </strong></td>
                                    <td width="13%">●<a href="?y=2021&m=9">本月</a></td>
                                    <td width="13%" style="border:0px">▲<a href="?y=2021&m=8">上一個月</a></td>
                                    <td width="11%" style="border:0px">▼<a href="?y=2021&m=10">下一個月</a></td>
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
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">1</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/1 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/9/1 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/1 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/9/1 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/1 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/9/1 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/1 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/9/1 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/1 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/9/1 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/1 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/9/1 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/1 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/9/1 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">2</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/2 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/9/2 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/2 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/9/2 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/2 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/9/2 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/2 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/9/2 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/2 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/9/2 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/2 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/9/2 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/2 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/9/2 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">3</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/3 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/9/3 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/3 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/9/3 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/3 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/9/3 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/3 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/9/3 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/3 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/9/3 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/3 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/9/3 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/3 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/9/3 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">4</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/4 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/9/4 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/4 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/9/4 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/4 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/9/4 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/4 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/9/4 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/4 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/9/4 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/4 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/9/4 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/4 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/9/4 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">5</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/5 10:00" disabled>&nbsp;10:00 <a href="?st=add&t=2021/9/5 10:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/5 11:00" disabled>&nbsp;11:00 <a href="?st=add&t=2021/9/5 11:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/5 12:00" disabled>&nbsp;12:00 <a href="?st=add&t=2021/9/5 12:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/5 13:00" disabled>&nbsp;13:00 <a href="?st=add&t=2021/9/5 13:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/5 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/9/5 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/5 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/9/5 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/5 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/9/5 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">6</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/6 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/9/6 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/6 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/9/6 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/6 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/9/6 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/6 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/9/6 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/6 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/9/6 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/6 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/9/6 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/6 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/9/6 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">7</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/7 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/9/7 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/7 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/9/7 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/7 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/9/7 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/7 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/9/7 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/7 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/9/7 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/7 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/9/7 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/7 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/9/7 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">8</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/8 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/9/8 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/8 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/9/8 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/8 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/9/8 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/8 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/9/8 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/8 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/9/8 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/8 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/9/8 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/8 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/9/8 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">9</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/9 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/9/9 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/9 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/9/9 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/9 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/9/9 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/9 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/9/9 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/9 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/9/9 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/9 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/9/9 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/9 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/9/9 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">10</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/10 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/9/10 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/10 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/9/10 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/10 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/9/10 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/10 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/9/10 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/10 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/9/10 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/10 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/9/10 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/10 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/9/10 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">11</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/11 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/9/11 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/11 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/9/11 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/11 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/9/11 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/11 17:00" disabled>&nbsp;17:00 <a href="?st=add&t=2021/9/11 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/11 18:00" disabled>&nbsp;18:00 <a href="?st=add&t=2021/9/11 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/11 19:00" disabled>&nbsp;19:00 <a href="?st=add&t=2021/9/11 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/11 20:00" disabled>&nbsp;20:00 <a href="?st=add&t=2021/9/11 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">12</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox" disabled>&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/12 10:00" disabled>&nbsp;10:00 <a href="?st=add&t=2021/9/12 10:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/12 11:00" disabled>&nbsp;11:00 <a href="?st=add&t=2021/9/12 11:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/12 12:00" disabled>&nbsp;12:00 <a href="?st=add&t=2021/9/12 12:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/12 13:00" disabled>&nbsp;13:00 <a href="?st=add&t=2021/9/12 13:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/12 14:00" disabled>&nbsp;14:00 <a href="?st=add&t=2021/9/12 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/12 15:00" disabled>&nbsp;15:00 <a href="?st=add&t=2021/9/12 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/12 16:00" disabled>&nbsp;16:00 <a href="?st=add&t=2021/9/12 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">13</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/13 14:00">&nbsp;14:00 <a href="?st=add&t=2021/9/13 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/13 15:00">&nbsp;15:00 <a href="?st=add&t=2021/9/13 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/13 16:00">&nbsp;16:00 <a href="?st=add&t=2021/9/13 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/13 17:00">&nbsp;17:00 <a href="?st=add&t=2021/9/13 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/13 18:00">&nbsp;18:00 <a href="?st=add&t=2021/9/13 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/13 19:00">&nbsp;19:00 <a href="?st=add&t=2021/9/13 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/13 20:00">&nbsp;20:00 <a href="?st=add&t=2021/9/13 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">14</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/14 14:00">&nbsp;14:00 <a href="?st=add&t=2021/9/14 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/14 15:00">&nbsp;15:00 <a href="?st=add&t=2021/9/14 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/14 16:00">&nbsp;16:00 <a href="?st=add&t=2021/9/14 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/14 17:00">&nbsp;17:00 <a href="?st=add&t=2021/9/14 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/14 18:00">&nbsp;18:00 <a href="?st=add&t=2021/9/14 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/14 19:00">&nbsp;19:00 <a href="?st=add&t=2021/9/14 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/14 20:00">&nbsp;20:00 <a href="?st=add&t=2021/9/14 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">15</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/15 14:00">&nbsp;14:00 <a href="?st=add&t=2021/9/15 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/15 15:00">&nbsp;15:00 <a href="?st=add&t=2021/9/15 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/15 16:00">&nbsp;16:00 <a href="?st=add&t=2021/9/15 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/15 17:00">&nbsp;17:00 <a href="?st=add&t=2021/9/15 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/15 18:00">&nbsp;18:00 <a href="?st=add&t=2021/9/15 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/15 19:00">&nbsp;19:00 <a href="?st=add&t=2021/9/15 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/15 20:00">&nbsp;20:00 <a href="?st=add&t=2021/9/15 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">16</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/16 14:00">&nbsp;14:00 <a href="?st=add&t=2021/9/16 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/16 15:00">&nbsp;15:00 <a href="?st=add&t=2021/9/16 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/16 16:00">&nbsp;16:00 <a href="?st=add&t=2021/9/16 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/16 17:00">&nbsp;17:00 <a href="?st=add&t=2021/9/16 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/16 18:00">&nbsp;18:00 <a href="?st=add&t=2021/9/16 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/16 19:00">&nbsp;19:00 <a href="?st=add&t=2021/9/16 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/16 20:00">&nbsp;20:00 <a href="?st=add&t=2021/9/16 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">17</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/17 14:00">&nbsp;14:00 <a href="?st=add&t=2021/9/17 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/17 15:00">&nbsp;15:00 <a href="?st=add&t=2021/9/17 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/17 16:00">&nbsp;16:00 <a href="?st=add&t=2021/9/17 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/17 17:00">&nbsp;17:00 <a href="?st=add&t=2021/9/17 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/17 18:00">&nbsp;18:00 <a href="?st=add&t=2021/9/17 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/17 19:00">&nbsp;19:00 <a href="?st=add&t=2021/9/17 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/17 20:00">&nbsp;20:00 <a href="?st=add&t=2021/9/17 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">18</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/18 14:00">&nbsp;14:00 <a href="?st=add&t=2021/9/18 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/18 15:00">&nbsp;15:00 <a href="?st=add&t=2021/9/18 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/18 16:00">&nbsp;16:00 <a href="?st=add&t=2021/9/18 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/18 17:00">&nbsp;17:00 <a href="?st=add&t=2021/9/18 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/18 18:00">&nbsp;18:00 <a href="?st=add&t=2021/9/18 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/18 19:00">&nbsp;19:00 <a href="?st=add&t=2021/9/18 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/18 20:00">&nbsp;20:00 <a href="?st=add&t=2021/9/18 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">19</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/19 10:00">&nbsp;10:00 <a href="?st=add&t=2021/9/19 10:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/19 11:00">&nbsp;11:00 <a href="?st=add&t=2021/9/19 11:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/19 12:00">&nbsp;12:00 <a href="?st=add&t=2021/9/19 12:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/19 13:00">&nbsp;13:00 <a href="?st=add&t=2021/9/19 13:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/19 14:00">&nbsp;14:00 <a href="?st=add&t=2021/9/19 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/19 15:00">&nbsp;15:00 <a href="?st=add&t=2021/9/19 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/19 16:00">&nbsp;16:00 <a href="?st=add&t=2021/9/19 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">20</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/20 14:00">&nbsp;14:00 <a href="?st=add&t=2021/9/20 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/20 15:00">&nbsp;15:00 <a href="?st=add&t=2021/9/20 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/20 16:00">&nbsp;16:00 <a href="?st=add&t=2021/9/20 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/20 17:00">&nbsp;17:00 <a href="?st=add&t=2021/9/20 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/20 18:00">&nbsp;18:00 <a href="?st=add&t=2021/9/20 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/20 19:00">&nbsp;19:00 <a href="?st=add&t=2021/9/20 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/20 20:00">&nbsp;20:00 <a href="?st=add&t=2021/9/20 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">21</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/21 14:00">&nbsp;14:00 <a href="?st=add&t=2021/9/21 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/21 15:00">&nbsp;15:00 <a href="?st=add&t=2021/9/21 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/21 16:00">&nbsp;16:00 <a href="?st=add&t=2021/9/21 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/21 17:00">&nbsp;17:00 <a href="?st=add&t=2021/9/21 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/21 18:00">&nbsp;18:00 <a href="?st=add&t=2021/9/21 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/21 19:00">&nbsp;19:00 <a href="?st=add&t=2021/9/21 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/21 20:00">&nbsp;20:00 <a href="?st=add&t=2021/9/21 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">22</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/22 14:00">&nbsp;14:00 <a href="?st=add&t=2021/9/22 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/22 15:00">&nbsp;15:00 <a href="?st=add&t=2021/9/22 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/22 16:00">&nbsp;16:00 <a href="?st=add&t=2021/9/22 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/22 17:00">&nbsp;17:00 <a href="?st=add&t=2021/9/22 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/22 18:00">&nbsp;18:00 <a href="?st=add&t=2021/9/22 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/22 19:00">&nbsp;19:00 <a href="?st=add&t=2021/9/22 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/22 20:00">&nbsp;20:00 <a href="?st=add&t=2021/9/22 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">23</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/23 14:00">&nbsp;14:00 <a href="?st=add&t=2021/9/23 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/23 15:00">&nbsp;15:00 <a href="?st=add&t=2021/9/23 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/23 16:00">&nbsp;16:00 <a href="?st=add&t=2021/9/23 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/23 17:00">&nbsp;17:00 <a href="?st=add&t=2021/9/23 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/23 18:00">&nbsp;18:00 <a href="?st=add&t=2021/9/23 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/23 19:00">&nbsp;19:00 <a href="?st=add&t=2021/9/23 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/23 20:00">&nbsp;20:00 <a href="?st=add&t=2021/9/23 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">24</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/24 14:00">&nbsp;14:00 <a href="?st=add&t=2021/9/24 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/24 15:00">&nbsp;15:00 <a href="?st=add&t=2021/9/24 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/24 16:00">&nbsp;16:00 <a href="?st=add&t=2021/9/24 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/24 17:00">&nbsp;17:00 <a href="?st=add&t=2021/9/24 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/24 18:00">&nbsp;18:00 <a href="?st=add&t=2021/9/24 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/24 19:00">&nbsp;19:00 <a href="?st=add&t=2021/9/24 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/24 20:00">&nbsp;20:00 <a href="?st=add&t=2021/9/24 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">25</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/25 14:00">&nbsp;14:00 <a href="?st=add&t=2021/9/25 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/25 15:00">&nbsp;15:00 <a href="?st=add&t=2021/9/25 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/25 16:00">&nbsp;16:00 <a href="?st=add&t=2021/9/25 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/25 17:00">&nbsp;17:00 <a href="?st=add&t=2021/9/25 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/25 18:00">&nbsp;18:00 <a href="?st=add&t=2021/9/25 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/25 19:00">&nbsp;19:00 <a href="?st=add&t=2021/9/25 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/25 20:00">&nbsp;20:00 <a href="?st=add&t=2021/9/25 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:14%;height:100px;background:#e0f3fd;">
                                        <div style="height:28px;">26</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/26 10:00">&nbsp;10:00 <a href="?st=add&t=2021/9/26 10:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/26 11:00">&nbsp;11:00 <a href="?st=add&t=2021/9/26 11:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/26 12:00">&nbsp;12:00 <a href="?st=add&t=2021/9/26 12:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/26 13:00">&nbsp;13:00 <a href="?st=add&t=2021/9/26 13:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/26 14:00">&nbsp;14:00 <a href="?st=add&t=2021/9/26 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/26 15:00">&nbsp;15:00 <a href="?st=add&t=2021/9/26 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/26 16:00">&nbsp;16:00 <a href="?st=add&t=2021/9/26 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">27</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/27 14:00">&nbsp;14:00 <a href="?st=add&t=2021/9/27 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/27 15:00">&nbsp;15:00 <a href="?st=add&t=2021/9/27 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/27 16:00">&nbsp;16:00 <a href="?st=add&t=2021/9/27 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/27 17:00">&nbsp;17:00 <a href="?st=add&t=2021/9/27 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/27 18:00">&nbsp;18:00 <a href="?st=add&t=2021/9/27 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/27 19:00">&nbsp;19:00 <a href="?st=add&t=2021/9/27 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/27 20:00">&nbsp;20:00 <a href="?st=add&t=2021/9/27 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">28</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/28 14:00">&nbsp;14:00 <a href="?st=add&t=2021/9/28 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/28 15:00">&nbsp;15:00 <a href="?st=add&t=2021/9/28 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/28 16:00">&nbsp;16:00 <a href="?st=add&t=2021/9/28 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/28 17:00">&nbsp;17:00 <a href="?st=add&t=2021/9/28 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/28 18:00">&nbsp;18:00 <a href="?st=add&t=2021/9/28 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/28 19:00">&nbsp;19:00 <a href="?st=add&t=2021/9/28 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/28 20:00">&nbsp;20:00 <a href="?st=add&t=2021/9/28 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">29</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/29 14:00">&nbsp;14:00 <a href="?st=add&t=2021/9/29 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/29 15:00">&nbsp;15:00 <a href="?st=add&t=2021/9/29 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/29 16:00">&nbsp;16:00 <a href="?st=add&t=2021/9/29 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/29 17:00">&nbsp;17:00 <a href="?st=add&t=2021/9/29 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/29 18:00">&nbsp;18:00 <a href="?st=add&t=2021/9/29 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/29 19:00">&nbsp;19:00 <a href="?st=add&t=2021/9/29 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/29 20:00">&nbsp;20:00 <a href="?st=add&t=2021/9/29 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
                                    <td style="width:14%;height:100px;background:#ffffff;">
                                        <div style="height:28px;">30</div>
                                        <div>
                                            <div style="height:28px;"><label><input type="checkbox" class="selallbox">&nbsp;<small>本日全選</small></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/30 14:00">&nbsp;14:00 <a href="?st=add&t=2021/9/30 14:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/30 15:00">&nbsp;15:00 <a href="?st=add&t=2021/9/30 15:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/30 16:00">&nbsp;16:00 <a href="?st=add&t=2021/9/30 16:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/30 17:00">&nbsp;17:00 <a href="?st=add&t=2021/9/30 17:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/30 18:00">&nbsp;18:00 <a href="?st=add&t=2021/9/30 18:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/30 19:00">&nbsp;19:00 <a href="?st=add&t=2021/9/30 19:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                            <div style="height:28px;"><label><input type="checkbox" name="checkboxdate" value="2021/9/30 20:00">&nbsp;20:00 <a href="?st=add&t=2021/9/30 20:00""><i class=" fa fa-plus text-success"></i></a></label></div>
                                        </div>
                                    </td>
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
require("./include/_bottom.php");
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