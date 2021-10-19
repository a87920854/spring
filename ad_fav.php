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
            <li class="active">關注名單</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->



        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>關注名單 - 數量：0</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">

                    <form id="searchform" action="?sear=1" method="post" target="_self" class="form-inline pull-left" onsubmit="return chk_search_form()">

                        <select name="branch" id="branch" class="form-control">
                            <option value="">會館</option>
                            <option value="台北">台北</option>
                            <option value="桃園">桃園</option>
                            <option value="新竹">新竹</option>
                            <option value="台中">台中</option>
                            <option value="台南">台南</option>
                            <option value="高雄">高雄</option>
                            <option value="八德">八德</option>
                            <option value="約專">約專</option>
                            <option value="迷你約">迷你約</option>
                            <option value="總管理處">總管理處</option>
                        </select>
                        <select name="single" id="single" class="form-control">
                            <option value="">秘書</option>
                        </select>

                        <input id="keyword" name="keyword" type="text" class="form-control" placeholder="手機/姓名/編號/關鍵字" value="">
                        <input type="text" name="t1" id="t1" class="datepicker" autocomplete="off" placeholder="時間區間" value=""> ~ <input type="text" name="t2" id="t2" class="datepicker" autocomplete="off" placeholder="時間區間" value="">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>


                <p style="clear:both">
                    <a class="btn btn-info" href="?c=0"><i class="icon-arrow-down" style="margin-top:3px;"></i> 預約聯絡</a> <a class="btn btn-info" href="?c=1">關注名單</a>
                </p>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>手機</th>
                            <th>預約聯絡</th>
                            <th>回報</th>
                            <th>會館</th>
                            <th>秘書</th>
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


    <hr>


    <footer>
    </footer>
    </div>
    </div>

    </div>
    <!--/.fluid-container-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php");
?>

<script language="JavaScript">
    $(function() {
        $("#branch").on("change", function() {
            personnel_get("branch", "single");
        });


    });

    function remove_fav(n, m) {
        $.ajax({
            url: "ad_fav.php",
            data: {
                st: "refav",
                n: n
            },
            type: "POST",
            dataType: "text",
            success: function(msg) {
                $(".tr_" + m).remove();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    }
</script>