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
            <li>約會專家系統</li>
            <li class="active">戀愛學院-文章管理</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>戀愛學院-文章管理</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><input type="button" class="btn btn-info" value="新增戀愛學院文章" onclick="location.href='singleweb_fun5_add.php?act=ad'"></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70"></th>
                            <th width=150>日期</th>
                            <th width=80>文章分類</th>
                            <th width="160">標題</th>
                            <th>內文</th>
                            <th width="60">圖檔</th>
                            <th width="60">精選</th>
                            <th width=60>操作</th>
                        </tr>

                        <tr>
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=174&ads_auto=315"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2021/10/18</td>
                            <td>單身中</td>
                            <td>心理師：給20歲的你，四個擇偶步驟！踏上如同自由行的愛情之旅！</td>
                            <td>八月艾彼在專欄上曾經和大家分享過，「30歲的愛情像團體旅遊，20歲的愛情像自助旅行」的概念。九月時曾</td>
                            <td>

                                <a href="singleparty_image/salon/20211018135435_singleweb_fun5_853.jpg" class='fancybox'>查看</a>

                            </td>
                            <td><input data-no-uniform="true" type="checkbox" id="315" class="show_check"></td>
                            <td>
                                <a href="singleweb_fun5_add.php?act=up&id=315">編輯</a>
                                <a href="javascript:Mars_popup2('singleweb_fun5.php?st=del&id=315','','width=300,height=200,top=100,left=100')">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=173&ads_auto=314"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=173&ads_auto=314"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2021/10/18</td>
                            <td>一言難盡</td>
                            <td>最傻的並不是因為你還愛，而是因為不甘心</td>
                            <td>艾姬不時會遇到讀者諮詢感情問題，對於以下這種情境更是不陌生。來問我的通常都是和對方交往了很久的女性，</td>
                            <td>

                                <a href="singleparty_image/salon/2021101813499_singleweb_fun5_413.jpg" class='fancybox'>查看</a>

                            </td>
                            <td><input data-no-uniform="true" type="checkbox" id="314" class="show_check"></td>
                            <td>
                                <a href="singleweb_fun5_add.php?act=up&id=314">編輯</a>
                                <a href="javascript:Mars_popup2('singleweb_fun5.php?st=del&id=314','','width=300,height=200,top=100,left=100')">刪除</a>
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
                url: "singleweb_fun5.php",
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