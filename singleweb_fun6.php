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
            <li>約會專家系統</li>
            <li class="active">戀愛學院-豪華講師</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>戀愛學院-豪華講師</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><input type="button" class="btn btn-info" value="新增講師資料" onclick="location.href='singleweb_fun6_add.php?act=ad'"></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70"></th>
                            <th width="180">職稱</th>
                            <th width="120">名字</th>
                            <th width="60">顯示</th>
                            <th width="60">審核</th>

                            <th>經歷</th>
                            <th width="120">照片</th>
                            <th width="120">操作</th>
                        </tr>

                        <tr>
                            <td>

                                <a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=44&auton=53"><span class="fa fa-arrow-down"></span></a>

                            </td>
                            <td>芳療講師</td>
                            <td>游文慈</td>


                            <td><span class="label label-danger">隱藏</span></td>
                            <td><span class="label label-success">通過</span></td>
                            <td></td>
                            <td>

                                <a href="singleparty_image/salon/2021723162714_singleweb_fun6_883.jpg" class='fancybox'>點我查看</a>

                            </td>
                            <td>

                                <a href="singleweb_fun6_add.php?act=up&id=53">編輯</a>
                                <a href="javascript:Mars_popup2('singleweb_fun6.php?st=del&id=53','','width=300,height=200,top=100,left=100')">刪除</a>

                            </td>
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
                url: "singleweb_fun6.php",
                data: {
                    st: "sa",
                    t: $num,
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