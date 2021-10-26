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
            <li class="active">談情說愛-文章管理</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>談情說愛-文章管理</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p>
                    <select id="sel_type">
                        <option value="">所有類型</option>
                        <option value="1">跟我說愛情</option>
                        <option value="2">跟我做心測</option>
                        <option value="3">跟我變Beauty</option>
                        <option value="4">跟我看花絮</option>
                        <option value="5">跟我挖新聞</option>
                        <option value="6">跟我玩樂趣</option>
                        <option value="7">跟我談兩性</option>
                        <option value="8">跟我享好康</option>
                    </select>
                    <input type="button" class="btn btn-info" value="新增文章" onclick="location.href='dmnweb_fun4_add.php?act=ad'">
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70"></th>
                            <th width=150>日期</th>
                            <th width=120>分類</th>
                            <th width="160">標題</th>
                            <th>內文</th>
                            <th width="60">作者</th>
                            <th width="60">精選</th>
                            <th width=60>操作</th>
                        </tr>

                        <tr>
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&cid=7&ad=291&id=822"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2016/2/3 下午 02:24:56</td>
                            <td>跟我談兩性</td>
                            <td>男人心底能藏多少女人</td>
                            <td>　　有人說男人的心裡會有許多女人，但男人的心底會只有一個女人，不管以後遇到的再優秀的女人也不會改變他</td>
                            <td>搜狐時尚</td>
                            <td><input data-no-uniform="true" type="checkbox" id="822" class="show_check"></td>
                            <td>
                                <a href="dmnweb_fun4_add.php?act=up&id=822">編輯</a>
                                <a href="javascript:Mars_popup2('dmnweb_fun4.php?st=del&cid=7&id=822','','width=300,height=200,top=100,left=100')">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=up_line&cid=7&ad=291&id=823"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=down_line&cid=7&ad=291&id=823"><span class="fa fa-arrow-down"></span></a></td>
                            <td>2016/2/3 下午 03:17:03</td>
                            <td>跟我談兩性</td>
                            <td>聰明的惡作劇會讓他怦然心動</td>
                            <td>&lt;imgsrc=&quot;http://subject-img.jiayuan.com/qi</td>
                            <td>太平洋時尚網</td>
                            <td><input data-no-uniform="true" type="checkbox" id="823" class="show_check"></td>
                            <td>
                                <a href="dmnweb_fun4_add.php?act=up&id=823">編輯</a>
                                <a href="javascript:Mars_popup2('dmnweb_fun4.php?st=del&cid=7&id=823','','width=300,height=200,top=100,left=100')">刪除</a>
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
                url: "dmnweb_fun4.php",
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
        $("#sel_type").on("change", function() {
            if ($(this).val()) location.href = 'dmnweb_fun4.php?cid=' + $(this).val();
            else location.href = 'dmnweb_fun4.php';
        });
    });
</script>