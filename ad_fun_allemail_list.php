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
            <li>好好玩管理系統</li>
            <li class="active">電子信箱列表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>電子信箱列表</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p>
                <form name="form1" method="post" action="?vst=full" style="font-size:13px;">
                    日期： <input type="text" name="y1" class="datepicker" autocomplete="off" style="width:120px;" value="2021/9/1"> 至
                    <input type="text" name="y2" class="datepicker" autocomplete="off" style="width:120px;" value="2021/9/27">　<input type="submit" name="Submit" style="height:28px;margin-top:-7px;" value="查詢">
                </form>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <p>統計共 6 筆</p>
                    <tr>
                        <th width=200>時間</th>
                        <th>信箱</th>
                        <th width=100>來源</th>
                    </tr>
                    <tr>
                        <td>2021/9/8 上午 12:08:00</td>
                        <td>soott123@gmail.com</td>
                        <td>好好玩會員</td>
                    </tr>
                    <tr>
                        <td>2021/9/7 上午 08:14:00</td>
                        <td>yuu.hage.1030@gmail.com</td>
                        <td>好好玩會員</td>
                    </tr>
                    <tr>
                        <td>2021/9/6 上午 09:36:00</td>
                        <td>knightmai@yahoo.com.tw</td>
                        <td>好好玩會員</td>
                    </tr>
                    <tr>
                        <td>2021/9/5 下午 04:13:00</td>
                        <td>yuxinc85@gmail.com</td>
                        <td>好好玩會員</td>
                    </tr>
                    <tr>
                        <td>2021/9/3 下午 10:09:00</td>
                        <td>jeff52135218@yahoo.com.tw</td>
                        <td>好好玩會員</td>
                    </tr>
                    <tr>
                        <td>2021/9/3 上午 10:34:00</td>
                        <td>hsiehuf@gmail.com</td>
                        <td>好好玩會員</td>
                    </tr>
                </table>

            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->


    <hr>
    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>