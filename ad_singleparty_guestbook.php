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
            <li class="active">約會專家-會員留言互動</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>約會專家-會員留言互動　 - 數量：500　<a href="?vst=full&s99=">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">

                    <form id="searchform" action="ad_no_mem.php?vst=full&sear=1" method="post" target="_self" class="form-inline" onsubmit="return chk_search_form()">
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
                            <th width=200>時間</th>
                            <th width=160>發送</th>
                            <th width=160>接收</th>
                            <th>訊息</th>
                            <th width=120></th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <td>2021/9/9 上午 01:09:23</td>
                            <td><a href="ad_mem_detail.php?mem_num=2076656">陳里昂Leon</a>[2076656]</td>
                            <td><a href="ad_mem_detail.php?mem_num=1873166">桃園市 小薇</a>[1873166]</td>
                            <td>Hi &#23567;&#34183;&#22963;&#22909;~ &#29031;&#29255;&#19978;&#30340;&#22963;&#31505;&#23481;&#24456;&#22909;&#30475;! &#36996;&#26377;&#19968;&#38587;&#23567;&#35987;&#21674;~ &#24819;&#35469;&#35672;&#30475;&#30475;&#19968;&#27171;&#24859;&#23567;&#21205;&#29289;&#30340;&#22963;!</td>
                            <td>

                                <a href="javascript:Mars_popup('?st=del&v=1&a=114814','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=300,height=150,top=10,left=10');">違規遮蔽留言</a>

                                <br>
                                <a href="javascript:Mars_popup2('?st=del2&a=114814','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=300,height=150,top=10,left=10');">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td>2021/9/9 上午 12:51:29</td>
                            <td><a href="ad_mem_detail.php?mem_num=2081921">洪先生</a>[2081921]</td>
                            <td><a href="ad_mem_detail.php?mem_num=1957583">台南市 李小姐</a>[1957583]</td>
                            <td>Hello妳好~希望有機會可以認識妳，若聊得來的話，讓我們從朋友開始做起^ ^</td>
                            <td>

                                <a href="javascript:Mars_popup('?st=del&v=1&a=114813','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=300,height=150,top=10,left=10');">違規遮蔽留言</a>

                                <br>
                                <a href="javascript:Mars_popup2('?st=del2&a=114813','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=300,height=150,top=10,left=10');">刪除</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center">共 500 筆、第 1 頁／共 10 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/ad_singleparty_guestbook.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/ad_singleparty_guestbook.php?topage=2 class='text'>2</a></li>
                    <li><a href=/ad_singleparty_guestbook.php?topage=3 class='text'>3</a></li>
                    <li><a href=/ad_singleparty_guestbook.php?topage=4 class='text'>4</a></li>
                    <li><a href=/ad_singleparty_guestbook.php?topage=5 class='text'>5</a></li>
                    <li><a href=/ad_singleparty_guestbook.php?topage=6 class='text'>6</a></li>
                    <li><a href=/ad_singleparty_guestbook.php?topage=7 class='text'>7</a></li>
                    <li><a href=/ad_singleparty_guestbook.php?topage=8 class='text'>8</a></li>
                    <li><a href=/ad_singleparty_guestbook.php?topage=9 class='text'>9</a></li>
                    <li><a href=/ad_singleparty_guestbook.php?topage=10 class='text'>10</a></li>
                    <li><a href=/ad_singleparty_guestbook.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/ad_singleparty_guestbook.php?topage=10 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/ad_singleparty_guestbook.php?topage=1" selected>1</option>
                            <option value="/ad_singleparty_guestbook.php?topage=2">2</option>
                            <option value="/ad_singleparty_guestbook.php?topage=3">3</option>
                            <option value="/ad_singleparty_guestbook.php?topage=4">4</option>
                            <option value="/ad_singleparty_guestbook.php?topage=5">5</option>
                            <option value="/ad_singleparty_guestbook.php?topage=6">6</option>
                            <option value="/ad_singleparty_guestbook.php?topage=7">7</option>
                            <option value="/ad_singleparty_guestbook.php?topage=8">8</option>
                            <option value="/ad_singleparty_guestbook.php?topage=9">9</option>
                            <option value="/ad_singleparty_guestbook.php?topage=10">10</option>
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

    });

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
        location.href = "ad_singleparty_guestbook.php?sear=1&vst=&branch=" + $branch.val() + "&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>