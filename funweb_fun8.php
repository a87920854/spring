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
            <li>好好玩國內網站系統</li>
            <li class="active">媒體報導</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>媒體報導</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><input type="button" class="btn btn-info" value="新增媒體報導" onclick="location.href='funweb_fun8_add.php?act=ad'"></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70"></th>

                            <th>標題</th>
                            <th width="160">圖檔</th>
                            <th>操作</th>
                        </tr>

                        <tr>
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=81&t_auto=118"><span class="fa fa-arrow-down"></span></a></td>

                            <td>壹電視－新聞深呼吸</td>
                            <td>
                                <a href="http://www.youtube.com/watch?v=A4qc1FGaWOc" target="_blank">點我查看(外部連結)</a>

                            </td>

                            <td>
                                <a href="funweb_fun8_add.php?act=up&id=118">編輯</a>
                                <a href="javascript:Mars_popup2('funweb_fun8.php?st=del&id=118','','width=300,height=200,top=100,left=100')">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=80&t_auto=111"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=80&t_auto=111"><span class="fa fa-arrow-down"></span></a></td>

                            <td>中天電視-生活百分百專訪好好玩旅行社單身旅遊</td>
                            <td>
                                <a href="http://www.youtube.com/watch?v=utn5kgS7blQ" target="_blank">點我查看(外部連結)</a>

                            </td>

                            <td>
                                <a href="funweb_fun8_add.php?act=up&id=111">編輯</a>
                                <a href="javascript:Mars_popup2('funweb_fun8.php?st=del&id=111','','width=300,height=200,top=100,left=100')">刪除</a>
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
require_once("./include/_bottom.php")
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
                url: "funweb_fun8.php",
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