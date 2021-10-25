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
            <li class="active">戀愛講堂</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>戀愛講堂</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><input type="button" class="btn btn-info" value="新增戀愛講堂" onclick="location.href='springweb_fun15_add.php?act=ad'"></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70"></th>
                            <th width=150>日期</th>
                            <th width=80>分類</th>
                            <th width="160">標題</th>
                            <th>內文</th>
                            <th width="60">圖檔</th>
                            <th width="30">精選</th>
                            <th width=60>操作</th>
                        </tr>

                        <tr>
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=114&ads_auto=128"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2021/9/29</td>
                            <td>愛情先修班</td>
                            <td>交友APP滑得心好累？快到春天會館「約會專家」測驗你的戀愛力！</td>
                            <td>&nbsp;圖一、2021想找個認真交友對象，婚友社春天會館推出交友軟體助單身男女脫單（圖片來源：U</td>
                            <td>

                                <a href="/upload_image/2021929113952_springweb_fun15_196.jpg" class='fancybox'>點我查看</a>

                            </td>
                            <td><input data-no-uniform="true" type="checkbox" id="128" class="show_check" checked></td>
                            <td>
                                <a href="springweb_fun15_add.php?act=up&id=128">編輯</a>
                                <a href="javascript:Mars_popup2('springweb_fun15.php?st=del&id=128','','width=300,height=200,top=100,left=100')">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=113&ads_auto=127"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=113&ads_auto=127"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2021/8/18</td>
                            <td>專家學者說</td>
                            <td>他是認真的嗎？正經系交友平台分享 3 招過濾不對的人 突破盲點不暈船！</td>
                            <td>曖昧常是男女關係中，最充滿猜測、疑問的階段。爬文PTT男女版、問遍親友意見、星座塔羅，乃至求神拜廟，</td>
                            <td>

                                <a href="/upload_image/202181815157_springweb_fun15_170.jpg" class='fancybox'>點我查看</a>

                            </td>
                            <td><input data-no-uniform="true" type="checkbox" id="127" class="show_check" checked></td>
                            <td>
                                <a href="springweb_fun15_add.php?act=up&id=127">編輯</a>
                                <a href="javascript:Mars_popup2('springweb_fun15.php?st=del&id=127','','width=300,height=200,top=100,left=100')">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=112&ads_auto=126"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=112&ads_auto=126"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2021/7/21</td>
                            <td>愛情先修班</td>
                            <td>Line的聊天互動技巧</td>
                            <td>讓初認識的他/她&nbsp;在私聊中留下美好的點滴印象你知道談話聊天也是需要練習的嗎！其實只要跨出第</td>
                            <td>

                                <a href="/upload_image/2021721145957_springweb_fun15_701.jpeg" class='fancybox'>點我查看</a>

                            </td>
                            <td><input data-no-uniform="true" type="checkbox" id="126" class="show_check" checked></td>
                            <td>
                                <a href="springweb_fun15_add.php?act=up&id=126">編輯</a>
                                <a href="javascript:Mars_popup2('springweb_fun15.php?st=del&id=126','','width=300,height=200,top=100,left=100')">刪除</a>
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
                url: "springweb_fun15.php",
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