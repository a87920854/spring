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
            <li class="active">DMN企業專區</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>DMN企業專區　未處理 - 數量：4</strong> <!-- panel title -->
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
                            <th width=50>姓名</th>
                            <th width=50>E-mail</th>
                            <th width=80>電話</th>
                            <th>公司名稱</th>
                            <th width=120>留言時間</th>
                            <th></th>
                            <th></th>
                        </tr>

                        <tr>
                            <td class="center">于瑄</td>
                            <td class="center">ryohei19870819@gmail.com</td>
                            <td class="center">0937948148</td>
                            <td class="center">金融證劵行業</td>
                            <td class="center">2015/9/7 下午 07:27:27</td>
                            <td>
                                <font color="#FF0000" size="2">處理情形：

                                </font>
                            </td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_dmn_business.php?st=del&id=10','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_dmn_business_fix.php?id=10','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">馮小姐</td>
                            <td class="center">kt206@thekeetai.com.tw</td>
                            <td class="center">23830666 est.206</td>
                            <td class="center">基泰建設</td>
                            <td class="center">2015/7/29 下午 06:52:11</td>
                            <td>
                                <font color="#FF0000" size="2">處理情形：

                                </font>
                            </td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_dmn_business.php?st=del&id=9','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_dmn_business_fix.php?id=9','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">蔡佳豪</td>
                            <td class="center">spur415@yahoo.com.tw</td>
                            <td class="center">02-22753520#7038</td>
                            <td class="center">台北捷運公司</td>
                            <td class="center">2015/5/28 下午 11:13:03</td>
                            <td>
                                <font color="#FF0000" size="2">處理情形：

                                </font>
                            </td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_dmn_business.php?st=del&id=7','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_dmn_business_fix.php?id=7','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="center">呂欣遠</td>
                            <td class="center">thomas.lu@apex.com.tw</td>
                            <td class="center">0227515587 轉603</td>
                            <td class="center">寶芮莉</td>
                            <td class="center">2015/2/9 上午 11:17:07</td>
                            <td>
                                <font color="#FF0000" size="2">處理情形：

                                </font>
                            </td>
                            <td width=80 class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">

                                        <li><a href="javascript:Mars_popup2('ad_dmn_business.php?st=del&id=5','','status=yes,menubar=yes,resizable=yes,scrollbars=yes,width=300,height=200,top=150,left=150');"><i class="icon-trash"></i> 刪除</a></li>

                                        <li><a href="javascript:Mars_popup('ad_dmn_business_fix.php?id=5','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=500,height=320,top=100,left=100');"><i class="icon-pencil"></i> 處理</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                </table>
            </div>
            <div class="text-center">共 4 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_dmn_business.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_dmn_business.php?topage=1 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_dmn_business.php?topage=1" selected>1</option>
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