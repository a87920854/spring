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
            <li><a href="index.asp">管理系統</a></li>
            <li>好好玩網站管理系統</li>
            <li class="active">活動列表上方大圖</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>活動列表上方大圖</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><input type="button" class="btn btn-info" value="新增 Banner" onclick="Mars_popup('funweb_fun12_add.asp','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');"></p>
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
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&t=new_event_banner&an=245&i1=2"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="https://www.funtour.com.tw/images/upload/eb245.jpg?t=6225" class="fancybox"><img src="https://www.funtour.com.tw/images/upload/eb245.jpg?t=6225" border=0 height=40></a></td>
                            <td>22</td>
                            <td>2020-02-11 11:44</td>
                            <td>
                                <a href="javascript:Mars_popup('funweb_fun12_add.asp?an=245','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="funweb_fun12.asp?st=del&t=new_event_banner&an=245">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&t=new_event_banner&an=244&i1=1"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="https://www.funtour.com.tw/images/upload/eb244.jpg?t=9069" class="fancybox"><img src="https://www.funtour.com.tw/images/upload/eb244.jpg?t=9069" border=0 height=40></a></td>
                            <td>11</td>
                            <td>2020-02-11 11:44</td>
                            <td>
                                <a href="javascript:Mars_popup('funweb_fun12_add.asp?an=244','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="funweb_fun12.asp?st=del&t=new_event_banner&an=244">刪除</a>
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
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a></td>
                            <td><a href="https://www.funtour.com.tw/images/upload/eb246.jpg?t=835" class="fancybox"><img src="https://www.funtour.com.tw/images/upload/eb246.jpg?t=835" border=0 height=40></a></td>
                            <td>33</td>
                            <td>2020-02-11 11:45</td>
                            <td>
                                <a href="javascript:Mars_popup('funweb_fun12_add.asp?an=246','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="funweb_fun12.asp?st=del&t=new_event_banner_m&an=246">刪除</a>
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