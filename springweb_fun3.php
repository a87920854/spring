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
            <li class="active">愛情見證</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>愛情見證</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><input type="button" class="btn btn-info" value="新增愛情見證" onclick="location.href='springweb_fun3_add.php?act=ad'">
                    <a class="btn btn-warning" href="?show=1">春網前台顯示</a>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70"></th>
                            <th>建立日期</th>
                            <th>標題</th>
                            <th width="160">新郎</th>
                            <th width="160">新娘</th>
                            <th width="30">精選</th>
                            <th width="60">春網顯示</th>
                            <th width="60">業務顯示</th>
                            <th width="60">簽約</th>
                            <th width="60">審核</th>
                            <th width="80">建立人</th>
                            <th width="100">操作</th>
                        </tr>
                        <tr>
                            <td colspan=4>目前無資料</td>
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

<script language="JavaScript">
    $(function() {

        $(".show_check").on("click", function() {
            var $this = $(this),
                $num = $this.attr("id"),
                $savediv = $("<div>儲存中</div>");
            $this.parent().append($savediv);
            if ($this.prop("checked")) $v = 1;
            else $v = 0;
            $.ajax({
                url: "springweb_fun3.php",
                data: {
                    st: "sa",
                    ac: $num,
                    v: $v
                },
                type: "POST",
                dataType: 'text',
                success: function(msg) {
                    $savediv.remove();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        });
    });
</script>