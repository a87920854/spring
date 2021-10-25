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
            <li>好好玩網站管理系統</li>
            <li><a href="funweb_fun10.php">首頁設置</a></li>
            <li class="active">首頁上方大圖</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>首頁上方大圖</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><input type="button" class="btn btn-info" value="新增 Banner" onclick="Mars_popup('funweb_fun10_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');"></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70">電腦版</th>
                            <th>圖片</th>
                            <th>連結位置</th>
                            <th width="160">資料時間</th>
                            <th>操作</th>
                        </tr>

                        <tr>
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&t=new_index_banner&an=241&i1=2"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="https://www.funtour.com.tw/images/upload/ib241.jpg?t=578" class="fancybox"><img src="https://www.funtour.com.tw/images/upload/ib241.jpg?t=578" border=0 height=40></a></td>
                            <td>2</td>
                            <td>2020-02-10 14:48</td>
                            <td>
                                <a href="javascript:Mars_popup('funweb_fun10_add.php?an=241','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="funweb_fun10.php?st=del&t=new_index_banner&an=241">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&t=new_index_banner&an=240&i1=1"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="https://www.funtour.com.tw/images/upload/ib240.jpg?t=6953" class="fancybox"><img src="https://www.funtour.com.tw/images/upload/ib240.jpg?t=6953" border=0 height=40></a></td>
                            <td>1</td>
                            <td>2020-02-10 14:47</td>
                            <td>
                                <a href="javascript:Mars_popup('funweb_fun10_add.php?an=240','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="funweb_fun10.php?st=del&t=new_index_banner&an=240">刪除</a>
                            </td>
                        </tr>


                    </tbody>
                </table>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70">手機版</th>
                            <th>圖片</th>
                            <th>連結位置</th>
                            <th width="160">資料時間</th>
                            <th>操作</th>
                        </tr>

                        <tr>
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&t=new_index_banner_m&an=243&i1=2"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="https://www.funtour.com.tw/images/upload/ib243.jpg?t=4373" class="fancybox"><img src="https://www.funtour.com.tw/images/upload/ib243.jpg?t=4373" border=0 height=40></a></td>
                            <td>2</td>
                            <td>2020-02-10 14:49</td>
                            <td>
                                <a href="javascript:Mars_popup('funweb_fun10_add.php?an=243','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="funweb_fun10.php?st=del&t=new_index_banner_m&an=243">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&t=new_index_banner_m&an=242&i1=1"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="https://www.funtour.com.tw/images/upload/ib242.jpg?t=6846" class="fancybox"><img src="https://www.funtour.com.tw/images/upload/ib242.jpg?t=6846" border=0 height=40></a></td>
                            <td>1</td>
                            <td>2020-02-10 14:48</td>
                            <td>
                                <a href="javascript:Mars_popup('funweb_fun10_add.php?an=242','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="funweb_fun10.php?st=del&t=new_index_banner_m&an=242">刪除</a>
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
require_once("./include/_bottom.php")
?>