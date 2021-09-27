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
            <li class="active">業務績效表 - 2021/9/27 00:00 ~ 2021/9/27 23:59</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>業務績效表 - 2021/9/27 00:00 ~ 2021/9/27 23:59</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <form action="ad_fun_achievement.php" method="post" name="form1" class="form-inline">
                        回報日期：<input type="text" name="y1" class="datepicker" autocomplete="off" value="2021/9/27"> ~ <input type="text" name="y2" class="datepicker" autocomplete="off" value="2021/9/27">
                        　　秘書：
                        <select name="s7" id="s7" class="form-control">
                            <option value="">請選擇</option>
                            <option value="13085797">好好玩</option>
                            <option value="Grisha">葛莉莎</option>
                            <option value="V221540975">若忻</option>
                        </select>
                        　<input type="submit" name="Submit" class="btn btn-default" value="查詢">
                    </form>
                </div>
                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>

                        <tr>
                            <td width=120>好好玩</td>
                            <td><a href="?st=step1&s7=13085797&y1=2021/9/27&y2=2021/9/27">通數：0</a>　</td>
                        </tr>
                        <tr>
                            <td width=120>葛莉莎</td>
                            <td><a href="?st=step1&s7=Grisha&y1=2021/9/27&y2=2021/9/27">通數：0</a>　</td>
                        </tr>
                        <tr>
                            <td width=120>若忻</td>
                            <td><a href="?st=step1&s7=V221540975&y1=2021/9/27&y2=2021/9/27">通數：0</a>　</td>
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
require_once("./include/_bottom.php");
?>

<script type="text/javascript">
    $(function() {
        $("#s6").on("change", function() {
            personnel_get("s6", "s7");

        });
    });
</script>