<?php
require("./include/_top.php");
require("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">預約聯絡表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->



        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>預約聯絡表 - 數量：0</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">

                    <form id="searchform" action="?sear=1" method="post" target="_self" class="form-inline pull-left" onsubmit="return chk_search_form()">

                        <input id="keyword" name="keyword" type="text" class="form-control" placeholder="手機/姓名/編號/關鍵字" value="">
                        <input type="text" name="t1" id="t1" class="datepicker" autocomplete="off" placeholder="時間區間" value="2021/9/10"> ~ <input type="text" name="t2" id="t2" class="datepicker" autocomplete="off" placeholder="時間區間" value="2021/9/10">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>


                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>性別</th>
                            <th>資料</th>
                            <th>手機</th>
                            <th>預約聯絡</th>
                            <th>回報</th>
                            <th>秘書</th>
                            <th>照片</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan=10 height=200>目前沒有資料</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->


    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require("./include/_bottom.php");
?>


<script language="JavaScript">
    var $nowmtu = "ad_mem_reservation.";
    $(function() {
        $("#branch").on("change", function() {
            personnel_get("branch", "single");
        });


    });

    function cancel_res(an) {
        $.ajax({
            url: "ad_mem_reservation_v.php",
            data: {
                st: "cancel",
                an: an
            },
            type: "POST",
            dataType: "text",
            success: function(msg) {
                $(".tr_" + msg).remove();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    }

    function hiden_res(an) {
        $.ajax({
            url: "ad_mem_reservation_v.php",
            data: {
                st: "hiden",
                an: an
            },
            type: "POST",
            dataType: "text",
            success: function(msg) {
                $(".tr_" + msg).remove();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    }
</script>