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
            <li>DateMeNow網站系統</li>
            <li class="active">幸福故事</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>幸福故事</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p>
                    <input type="button" class="btn btn-info" value="新增幸福故事" onclick="location.href='dmnweb_fun11_add.php?act=ad'">
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70"></th>
                            <th width=150>日期</th>
                            <th width="160">標題</th>
                            <th>內文</th>
                            <th width="60">小字</th>
                            <th width="60">精選</th>
                            <th width=120>TAG</th>
                            <th width=60>操作</th>
                        </tr>

                        <tr>
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=44&an=55"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2021/9/30 下午 02:54:15</td>
                            <td>給單身的你：不管如何一定堅信自己是最棒的 </td>
                            <td>Helen：我們結婚了❤❤❤往事歷歷在目，謝謝自己的勇氣與老天的眷顧，讓我能遇到可靠的對象攜手邁向新</td>
                            <td>Helen / Kevin</td>
                            <td><input data-no-uniform="true" type="checkbox" id="55" class="show_check" checked></td>
                            <td>結婚啦</td>
                            <td>
                                <a href="dmnweb_fun11_add.php?act=up&an=55">編輯</a>
                                <a href="javascript:Mars_popup2('dmnweb_fun11.php?st=del&an=55','','width=300,height=200,top=100,left=100')">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&ad=43&an=54"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&ad=43&an=54"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2021/4/21 下午 05:50:09</td>
                            <td>透過相親、聯誼的方式認識對象，一直不存在我過往的人生經驗裡。如今卻透過這樣不曾考慮的管道認識現在的男朋友...</td>
                            <td>透過相親、聯誼的方式認識對象，一直不存在我過往的人生經驗裡。如今卻透過這樣不曾考慮的管道認識現在的男</td>
                            <td>V's / B'r</td>
                            <td><input data-no-uniform="true" type="checkbox" id="54" class="show_check" checked></td>
                            <td>熱戀中</td>
                            <td>
                                <a href="dmnweb_fun11_add.php?act=up&an=54">編輯</a>
                                <a href="javascript:Mars_popup2('dmnweb_fun11.php?st=del&an=54','','width=300,height=200,top=100,left=100')">刪除</a>
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
                url: "dmnweb_fun11.php",
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