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
            <li class="active">排約報名資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>排約報名資料　未處理 - 數量：0　<a href="?vst=full&amp;s99=">[查看完整清單]</a></strong>
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <div class="btn-group pull-left margin-right-10">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">

                            <li><a href="javascript:mutil_send();"><i class="icon-tag"></i> 多選發送</a></li>
                            <li><a href="javascript:mutil_del();"><i class="icon-remove-sign"></i> 多選刪除</a></li>
                            <li><a href="?s99=1" target="_self"><i class="icon-resize-horizontal"></i> 切換已處理</a></li>
                            <li><a href="ad_love.php" target="_self"><i class="icon-resize-horizontal"></i> 切換未處理</a></li>
                            <li><a href="ad_love_f.php"><i class="icon-tag"></i> 進階搜尋</a></li>
                        </ul>
                    </div>　

                    <form id="searchform" action="ad_love.php?vst=full&sear=1" method="post" target="_self" class="form-inline pull-left" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type">
                            <option value="s2">手機</option>
                            <option value="s3">姓名</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>

                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th><input data-no-uniform="true" type="checkbox" id="selnums"></th>
                            <th></th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>手機</th>
                            <th>地區</th>
                            <th>對方會館</th>
                            <th>對方姓名</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <!-- 如果沒內容 -->
                        <tr>
                            <td colspan=8 height=200>目前沒有資料</td>
                        </tr>

                        <!-- 如果有內容 -->
                        <tr>
                            <td><input data-no-uniform="true" type="checkbox" name="nums" value=""></td>
                            <td></td>
                            <td class="center"><a href="javascript:Mars_popup('ad_love_detail.php?k_id=','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=350,top=150,left=150');"></a>


                                <span class="label label-warning"><a href="ad_no_mem_s.php" target="_blank" style="color:white;">重</a></span>

                                <div style="float:right"><a href="ad_no_mem_s.php"><span class="label label-info">查</span></a>


                                    <span class="label fav_tag_" style="background:red"><a href=" #" style="color:white;" data-toggle="tooltip" title="關注名單">關</a></span>

                                    <span class="label" style="background:black"><a href="#" style="color:white;">黑</a></span>
                                    <a href="#c" onclick="Mars_popup('ad_send_love_branch.php?k_id=','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=400,height=250,top=200,left=200');" style="color:white;" data-toggle="tooltip" title="">
                                        <a href="#c" onclick="Mars_popup('ad_send_love_branch.php?k_id=','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=400,height=250,top=200,left=200');">
                                            <span class="label label-success"></span>
                                        </a>

                                </div>
                            </td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center"></td>

                            <td class="center">

                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('ad_love_detail.php?k_id=','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=700,height=300,top=150,left=150');"><i class="icon-file"></i> 詳細</a></li>
                                        <li><a href="javascript:Mars_popup('ad_send_love_branch.php?k_id=','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=400,height=250,top=200,left=200');"><i class="icon-file"></i> 發送</a></li>
                                        <li><a href="javascript:Mars_popup('ad_report.php?k_id=&ty=love','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');"><i class="icon-list-alt"></i> 回報(0)</a></li>
                                        <li><a href="?st=trans&k_id="><i class="icon-share"></i> 轉入未入會</a></li>
                                        <li><a style="color:#ccc"><i class="icon-share" style="color:#ccc"></i> 已轉未入會</a></li>
                                        <li><a href="#" onClick="Mars_popup2('ad_love_del.php?k_id=','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="BORDER-bottom: #666666 1px dotted">
                                (<a href="javascript:Mars_popup('ad_report.php?k_id=&ty=love','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=600,top=10,left=10');">回報(0)</a>，處理情形：<font color="#FF0000" size="2"></font>) 內容：<font color=blue>舊：</font>
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