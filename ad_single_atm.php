<?php
require("./include/_top.php");
require("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.asp">管理系統</a></li>
            <li class="active">申辦分期會員服務記錄表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>申辦分期會員服務記錄表</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <form action="?st=search" method="post" target="_self" class="form-inline">
                    <p>日期：<input type="text" name="date1" id="date1" class="datepicker" autocomplete="off" value="" autocomplete="off"> ~ <input type="text" name="date2" id="date2" class="datepicker" autocomplete="off" value="" autocomplete="off"></p>
                    <p>性別：
                        <label><input type="radio" name="sex" id="sex" value="男"> 男</label>
                        <label><input type="radio" name="sex" id="sex" value="女"> 女</label>
                        &nbsp;&nbsp;

                        &nbsp;&nbsp;<input type="submit" value="送出" class="btn btn-default">
                    </p>
                </form>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th width=40>NO</th>
                            <th>入會日期</th>
                            <th>邀約會館</th>
                            <th>邀約秘書</th>
                            <th>受理會館</th>
                            <th>受理秘書</th>
                            <th>來源</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>生日</th>
                            <th>備註</th>
                            <th>排約次數</th>
                            <th>金額</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan=15>請選擇日期區間</td>
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
require("./include/_bottom.php");
?>

<script type="text/javascript">
    $(function() {
        $("#branch").on("change", function() {
            personnel_get_send("branch", "single");
        });



    });
</script>