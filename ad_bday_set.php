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
            <li class="active">生日簡訊內容</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>生日簡訊內容</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><input type="button" class="btn btn-info" value="簡訊內容" disabled>&nbsp&nbsp<input type="button" class="btn btn-warning" value="發送紀錄" onclick="location.href='ad_bday_set_send.php'"></p>
                <p>每日早上 10:00 發送生日簡訊給會員</p>
                <form name="form1" method="post" action="?st=send" onsubmit="return chk_form()">
                    <table class="table table-striped table-bordered bootstrap-datatable">

                        <textarea name="notes" id="notes" style="width:60%;height:200px;">親愛的會員您好，生日快樂！春天會館時刻用心，在這專屬於您的日子，獻上最誠摯的祝福。祝福您生日快樂＆心想事成！春天會館全體同仁敬上</textarea>
                        <!--<p>$NAME代表會員名字</p>-->
                        <p>
                            <input type="submit" class="btn btn-primary" style="width:50%;" value="修改">
                        </p>
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