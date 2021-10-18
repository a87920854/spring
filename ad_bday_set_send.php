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
            <li class="active">生日簡訊發送紀錄</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>生日簡訊發送紀錄</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><input type="button" value="簡訊內容" class="btn btn-info" onclick="location.href='ad_bday_set.php'">&nbsp&nbsp<input type="button" class="btn btn-warning" value="發送紀錄" disabled></p>
                <p>每日早上 10:00 發送生日簡訊給會員</p>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <th width=100>會員編號</th>
                    <th width=80>姓名</th>
                    <th width=80>電話</th>
                    <th width=80>生日</th>
                    <th>訊息</th>
                    <th width=160>發送時間</th>
                    <tr>
                        <td>1984126</td>
                        <td>林洋禾</td>
                        <td>0963007680</td>
                        <td>1911/9/8</td>
                        <td>親愛的會員您好，生日快樂！春天會館時刻用心，在這專屬於您的日子，獻上最誠摯的祝福。祝福您生日快樂＆心想事成！春天會館全體同仁敬上</td>
                        <td>2021/9/8 上午 10:00:08</td>
                    </tr>
                    <tr>
                        <td>1938570</td>
                        <td>戴成勲☆</td>
                        <td>0921329763</td>
                        <td>1911/9/8</td>
                        <td>親愛的會員您好，生日快樂！春天會館時刻用心，在這專屬於您的日子，獻上最誠摯的祝福。祝福您生日快樂＆心想事成！春天會館全體同仁敬上</td>
                        <td>2021/9/8 上午 10:00:02</td>
                    </tr>
                    <tr>
                        <td>1547711</td>
                        <td>黃安逢</td>
                        <td>0926765100</td>
                        <td>1911/9/8</td>
                        <td>親愛的會員您好，生日快樂！春天會館時刻用心，在這專屬於您的日子，獻上最誠摯的祝福。祝福您生日快樂＆心想事成！春天會館全體同仁敬上</td>
                        <td>2021/9/8 上午 10:00:02</td>
                    </tr>
                </table>

            </div>
            <div class="text-center">共 50477 筆、第 1 頁／共 2524 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_bday_set_send.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_bday_set_send.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_bday_set_send.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_bday_set_send.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_bday_set_send.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_bday_set_send.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_bday_set_send.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_bday_set_send.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_bday_set_send.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_bday_set_send.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_bday_set_send.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_bday_set_send.php?topage=2524 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_bday_set_send.php?topage=1" selected>1</option>
                            <option value="/ad_bday_set_send.php?topage=2">2</option>
                            <option value="/ad_bday_set_send.php?topage=3">3</option>
                            <option value="/ad_bday_set_send.php?topage=4">4</option>
                            <option value="/ad_bday_set_send.php?topage=5">5</option>
                            <option value="/ad_bday_set_send.php?topage=6">6</option>
                            <option value="/ad_bday_set_send.php?topage=7">7</option>
                            <option value="/ad_bday_set_send.php?topage=8">8</option>
                            <option value="/ad_bday_set_send.php?topage=9">9</option>
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