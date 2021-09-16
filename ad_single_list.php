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
            <li class="active">秘書履歷</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>秘書履歷</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12 margin-bottom-10">
                    <form action="?st=search" method="post" target="_self" class="form-inline">

                        <select name="branch" id="branch">
                            <option value="" selected>會館</option>
                            <option value="">"&ab&"</option>"
                            <option value="">"&ab&"</option>"

                        </select><select name="keyword_type" id="keyword_type">
                            <option value="s2">姓名</option>
                            <option value="s3">身分證字號</option>
                            <option value="s1">流水號</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" type="text" class="form-control">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th>會館</th>
                            <th>姓名</th>
                            <th>別名</th>
                            <th>職稱</th>
                            <th>流水號</th>
                            <th>尚未開發</th>
                            <th width=80></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><a href="ad_no_mem.php">xxx</a></td>

                            <td><a href="ad_single_view.php">履歷</a></td>

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
        $("#search_send").on("click", function(event) {
            if (!$("#keyword").val() && !$("#branch").val()) {
                $("#keyword").focus();
                alert("請輸入要搜尋的關鍵字。");
                return false;
            }
            if (!$("#keyword_type").val()) {
                alert("have error。");
                return false;
            }
            location.href = "ad_single_list.php?sear=1&vst=full&branch=" + $("#branch").val() + "&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        });


    });
</script>