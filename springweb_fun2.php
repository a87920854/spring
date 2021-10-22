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
            <li>春天網站系統</li>
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

                <p><input type="button" class="btn btn-info" value="新增媒體報導" onclick="location.href='springweb_fun2_add.php?act=ad'"></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70"></th>
                            <th>報導日期</th>
                            <th>標題</th>
                            <th width="160">圖檔</th>
                            <th width="30">精選</th>
                            <th>操作</th>
                        </tr>

                        <tr>
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=60&t_auto=67"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2019/5/22</td>
                            <td>獨立新女性熱衷實名制交友</td>
                            <td>

                                <a href="/upload_image/2019523133512_springweb_fun2_818.jpg" class='fancybox'>點我查看</a>

                            </td>
                            <td><input data-no-uniform="true" type="checkbox" id="67" class="show_check" checked></td>
                            <td>
                                <a href="springweb_fun2_add.php?act=up&id=67">編輯</a>
                                <a href="javascript:Mars_popup2('springweb_fun2.php?st=del&id=67','','width=300,height=200,top=100,left=100')">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=58&t_auto=65"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=58&t_auto=65"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2019/2/12</td>
                            <td>主動出擊獲取真愛</td>
                            <td>

                                <a href="/upload_image/201921313284_springweb_fun2_850.jpg" class='fancybox'>點我查看</a>

                            </td>
                            <td><input data-no-uniform="true" type="checkbox" id="65" class="show_check" checked></td>
                            <td>
                                <a href="springweb_fun2_add.php?act=up&id=65">編輯</a>
                                <a href="javascript:Mars_popup2('springweb_fun2.php?st=del&id=65','','width=300,height=200,top=100,left=100')">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=55&t_auto=62"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=55&t_auto=62"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2018/11/29</td>
                            <td>單身男女通往愛情的專屬導師</td>
                            <td>
                                <a href="http://www.youtube.com/watch?v=q2Fmjttkwio" target="_blank">點我查看(外部連結)</a>

                            </td>
                            <td><input data-no-uniform="true" type="checkbox" id="62" class="show_check" checked></td>
                            <td>
                                <a href="springweb_fun2_add.php?act=up&id=62">編輯</a>
                                <a href="javascript:Mars_popup2('springweb_fun2.php?st=del&id=62','','width=300,height=200,top=100,left=100')">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=54&t_auto=61"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=54&t_auto=61"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2018/8/28</td>
                            <td>《一開口撩人又聊心》</td>
                            <td>
                                <a href="http://www.youtube.com/watch?v=XlTkby09HSs" target="_blank">點我查看(外部連結)</a>

                            </td>
                            <td><input data-no-uniform="true" type="checkbox" id="61" class="show_check" checked></td>
                            <td>
                                <a href="springweb_fun2_add.php?act=up&id=61">編輯</a>
                                <a href="javascript:Mars_popup2('springweb_fun2.php?st=del&id=61','','width=300,height=200,top=100,left=100')">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=53&t_auto=59"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=53&t_auto=59"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2017/7/24</td>
                            <td>正聲電臺#宛志蘋台北在飛躍_獻給單身的您終結單身的追愛22堂課</td>
                            <td>
                                <a href="http://www.youtube.com/watch?v=FmbDBtT3XDo" target="_blank">點我查看(外部連結)</a>

                            </td>
                            <td><input data-no-uniform="true" type="checkbox" id="59" class="show_check"></td>
                            <td>
                                <a href="springweb_fun2_add.php?act=up&id=59">編輯</a>
                                <a href="javascript:Mars_popup2('springweb_fun2.php?st=del&id=59','','width=300,height=200,top=100,left=100')">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=52&t_auto=58"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=52&t_auto=58"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2017/7/2</td>
                            <td>漢聲電臺#黃瑩的快樂向前行節目_獻給還是單身的您，終結單身的追愛22堂課</td>
                            <td>
                                <a href="http://www.youtube.com/watch?v=EvZND5gbkKU" target="_blank">點我查看(外部連結)</a>

                            </td>
                            <td><input data-no-uniform="true" type="checkbox" id="58" class="show_check"></td>
                            <td>
                                <a href="springweb_fun2_add.php?act=up&id=58">編輯</a>
                                <a href="javascript:Mars_popup2('springweb_fun2.php?st=del&id=58','','width=300,height=200,top=100,left=100')">刪除</a>
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
require_once("./include/_bottom.php");
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
                url: "springweb_fun2.php",
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