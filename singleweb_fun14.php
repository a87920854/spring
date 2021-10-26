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
            <li class="active">企業專區</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>企業專區　未處理 - 數量：5</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <p>
                    <div class="btn-group">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">

                            <li><a href="?s99=1" target="_self"><i class="icon-resize-horizontal"></i> 切換已處理</a></li>

                        </ul>
                    </div>
                    </p>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th>公司名稱</th>
                            <th>公司部門</th>
                            <th>職稱</th>
                            <th>Email</th>
                            <th width=60>聯絡人</th>
                            <th>聯絡電話</th>
                            <th>公司網址</th>
                            <th width=120>留言時間</th>
                            <th></th>
                            <th></th>
                        </tr>

                        <tr>
                            <td class="center">跟我約會</td>
                            <td class="center">交友</td>
                            <td class="center">約會</td>
                            <td class="center">c805013@gmail.com</td>
                            <td class="center">跟我約會</td>
                            <td class="center">09308850240</td>
                            <td class="center">forevetw</td>
                            <td class="center">2018/6/18 下午 03:31:16</td>
                            <td>
                                <font color="#FF0000" size="2">處理情形：

                                </font>
                            </td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('singleweb_fun14_fix.php?an=10','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>

                                        <li><a href="javascript:Mars_popup2('singleweb_fun14.php?st=del&an=10','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">春天會館</td>
                            <td class="center">約會</td>
                            <td class="center">聊天小姐</td>
                            <td class="center">c805013@gmail.com</td>
                            <td class="center">春天會館</td>
                            <td class="center">0930850240</td>
                            <td class="center">http://www.forevertw.com.tw</td>
                            <td class="center">2018/6/18 下午 03:09:55</td>
                            <td>
                                <font color="#FF0000" size="2">處理情形：

                                </font>
                            </td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('singleweb_fun14_fix.php?an=9','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>

                                        <li><a href="javascript:Mars_popup2('singleweb_fun14.php?st=del&an=9','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">假期國際</td>
                            <td class="center">專案</td>
                            <td class="center">PM</td>
                            <td class="center">wrc555.tw@gmail.com</td>
                            <td class="center">Ryder Hsu</td>
                            <td class="center">0932104490</td>
                            <td class="center">www.vacanza.com.tw</td>
                            <td class="center">2017/12/21 上午 09:19:30</td>
                            <td>
                                <font color="#FF0000" size="2">處理情形：

                                </font>
                            </td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('singleweb_fun14_fix.php?an=8','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>

                                        <li><a href="javascript:Mars_popup2('singleweb_fun14.php?st=del&an=8','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">假期國際</td>
                            <td class="center">行銷企劃</td>
                            <td class="center">專案經理</td>
                            <td class="center">wrc555.tw@gmail.com</td>
                            <td class="center">許敦彥</td>
                            <td class="center">0932104490</td>
                            <td class="center">www.vacanza.com.tw</td>
                            <td class="center">2017/8/4 下午 06:00:55</td>
                            <td>
                                <font color="#FF0000" size="2">處理情形：

                                </font>
                            </td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('singleweb_fun14_fix.php?an=7','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>

                                        <li><a href="javascript:Mars_popup2('singleweb_fun14.php?st=del&an=7','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">台灣穗高科技</td>
                            <td class="center">管理部(職工福利委員會)</td>
                            <td class="center">總幹事</td>
                            <td class="center">mandoor_chang@hodakatec.com</td>
                            <td class="center">張綿鐸</td>
                            <td class="center">0936655880</td>
                            <td class="center">http://www.hodakatec.com</td>
                            <td class="center">2017/7/3 下午 02:00:21</td>
                            <td>
                                <font color="#FF0000" size="2">處理情形：

                                </font>
                            </td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:Mars_popup('singleweb_fun14_fix.php?an=6','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>

                                        <li><a href="javascript:Mars_popup2('singleweb_fun14.php?st=del&an=6','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 5 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/singleweb_fun14.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/singleweb_fun14.php?topage=1 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/singleweb_fun14.php?topage=1" selected>1</option>
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