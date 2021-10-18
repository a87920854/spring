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
            <li class="active">服務滿意度調查</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>服務滿意度調查　未處理 - 數量：401</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12 margin-bottom-10">
                    <div class="btn-group">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">

                            <li><a href="?s99=1" target="_self"><i class="icon-resize-horizontal"></i> 切換已處理</a></li>

                        </ul>
                    </div>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th width=120>編號</th>
                            <th width=120>姓名</th>
                            <th width=120>年次</th>
                            <th width=120>調查</th>
                            <th>留言內容</th>
                            <th width=120>會館</th>
                            <th>時間</th>
                            <th></th>
                        </tr>

                        <tr>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=1355591" target="_blank">1355591</a></td>
                            <td class="center"><a href="ad_mem_detail.php?mem_num=1355591" target="_blank">鄭雨軒</a></td>
                            <td class="center">1991</td>
                            <td class="center">很滿意</td>
                            <td>
                                <br>
                                <font color="#FF0000" size="2">處理情形：
                                </font>
                            </td>
                            <td class="center">台中彭春福
                            </td>
                            <td class="center">2020/6/19 下午 03:28:00</td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <!--<li><a href="javascript:Mars_popup('ad_cs_data_send_branch.php?a=622','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');"><i class="icon-arrow-right"></i> 發送</a></li>-->
                                        <li><a href="javascript:Mars_popup2('ad_cs_data.php?st=del&a=622','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_cs_data_fix.php?a=622','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>
            <div class="text-center">共 401 筆、第 1 頁／共 9 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_cs_data.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_cs_data.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_cs_data.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_cs_data.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_cs_data.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_cs_data.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_cs_data.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_cs_data.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_cs_data.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_cs_data.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_cs_data.php?topage=9 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_cs_data.php?topage=1" selected>1</option>
                            <option value="/ad_cs_data.php?topage=2">2</option>
                            <option value="/ad_cs_data.php?topage=3">3</option>
                            <option value="/ad_cs_data.php?topage=4">4</option>
                            <option value="/ad_cs_data.php?topage=5">5</option>
                            <option value="/ad_cs_data.php?topage=6">6</option>
                            <option value="/ad_cs_data.php?topage=7">7</option>
                            <option value="/ad_cs_data.php?topage=8">8</option>
                            <option value="/ad_cs_data.php?topage=9">9</option>
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