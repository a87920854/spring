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

                <form name="form1" method="post" action="ad_allemail_list_excel.php" class="form-inline">
                    <p>日期： <input type="text" name="y1" class="datepicker" autocomplete="off" value="2021/10/1"> 至
                        <input type="text" name="y2" class="datepicker" autocomplete="off" value="2021/10/20">
                        <input type="checkbox" name="sex_1" value="1"> 男&nbsp;&nbsp;<input type="checkbox" name="sex_2" value="1"> 女<br>
                        <input type="checkbox" name="aa3" value="1"> 已入會&nbsp;&nbsp;<input type="checkbox" name="aa1" value="1"> 未入會&nbsp;&nbsp;<input type="checkbox" name="aa2" value="1"> 報名資料
                    </p>
                    <p>
                        <input type="radio" name="bb" value="1"> 春天&nbsp;&nbsp;<input type="radio" name="bb" value="2"> 八德
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Submit" class="btn btn-default" value="匯出 Excel">
                    </p>
                </form>
                <table class="table table-striped table-bordered bootstrap-datatable">

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