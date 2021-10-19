<?php
require_once("./include/_inc.php");
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
            <li class="active">約會專家-會員禮物互動</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>約會專家-會員禮物互動　 - 數量：2　<a href="?vst=full&s99=">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <form id="searchform" action="ad_no_mem.php?vst=full&sear=1" method="post" target="_self" class="form-inline" onsubmit="return chk_search_form()">

                        會館：<select name="branch" id="branch">
                            <option value="">請選擇</option>
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
                        </select> <select name="single" id="single">
                            <option value="">請選擇</option>
                        </select>

                        <select name="keyword_type" id="keyword_type">
                            <option value="s3">姓名</option>
                            <option value="s4">編號</option>
                        </select>
                        <input id="keyword" name="keyword" id="keyword" class="form-control" type="text">
                        <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <thead>
                        <tr>
                            <th>時間</th>
                            <th>送禮人</th>
                            <th>收禮人</th>
                            <th>禮物</th>
                            <th width=400>招呼</th>
                            <th>送禮會秘</th>
                            <th>收禮會秘</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <td>2018/8/15 上午 10:24:10</th>
                            <td><a href="ad_mem_detail.php?mem_num=1308543">柯雯琪</a></td>
                            <td><a href="ad_mem_detail.php?mem_num=99998">張小天</a></td>
                            <td>閃耀皇冠</td>
                            <td>我們倆的興趣一樣喔！</td>
                            <td>-不明</td>
                            <td>台北-陳紅</td>

                        </tr>

                        <tr>
                            <td>2017/11/15 下午 06:19:57</th>
                            <td><a href="ad_mem_detail.php?mem_num=1308543">柯雯琪</a></td>
                            <td><a href="ad_mem_detail.php?mem_num=1356719">盧彥男</a></td>
                            <td>可愛小熊</td>
                            <td>很高興認識你喔！</td>
                            <td>-不明</td>
                            <td>八德-kitty</td>

                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="text-center">共 2 筆、第 1 頁／共 1 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_singleparty_gift.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_singleparty_gift.php?topage=1 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_singleparty_gift.php?topage=1" selected>1</option>
                        </select></li>
                </ul>
            </div>

        </div>
        <!--/span-->

    </div>
    <!--/row-->
</section>
<!-- /MIDDLE -->

<?php
require_once("./include/_bottom.php")
?>

<script language="JavaScript">
    $(function() {
        $("#branch").on("change", function() {
            personnel_get("branch", "single");
        });

        $("input[name='nums']").prop("checked", false);
        $("#selnums").on("click", function() {
            if ($(this).prop("checked"))
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", true);
                });
            else
                $("input[name='nums']").each(function() {
                    $(this).prop("checked", false);
                });
        });
    });

    function mutil_send() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要發送的會員。");
        else Mars_popup('ad_send_branch.php?mem_num=' + $allnum, '', 'scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');
    }

    function mutil_del() {
        var $allnum = [];
        $("input[name='nums']").each(function() {
            if ($(this).val() && $(this).prop("checked")) $allnum.push($(this).val());
        });
        if ($allnum.length <= 0) alert("請勾選要刪除的資料。");
        else Mars_popup2('ad_del.php?t=n&mem_num=' + $allnum, '', 'scrollbars=yes,location=yes,status=yes,menubar=yes,resizable=yes,width=400,height=250,top=100,left=100');
    }

    function chk_search_form() {
        var $branch = $("#branch");
        if (!$branch.val() && !$("#keyword_type").val()) {
            alert("請選擇要搜尋的類型。");
            $("#keyword_type").focus();
            return false;
        }
        if (!$branch.val() && !$("#keyword").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
        }
        location.href = "ad_singleparty_gift.php?sear=1&vst=&branch=" + $branch.val() + "&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>