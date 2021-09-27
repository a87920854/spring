<?php
require_once("./include/_inc.php");
require_once("./include/_function.php");
require_once("./include/_top.php");
require_once("./include/_sidebar.php")
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li>好好玩管理系統</li>
            <li class="active">同業報名單管理</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>同業報名單管理 - 數量：1　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <div class="col-md-12">
                    <div class="btn-group pull-left margin-right-10">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">功能 <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="ad_b2b_mem_fix.php?st=add" target="_blank"><i class="icon-star"></i> 新增同業資料</a></li>
                        </ul>
                    </div>　


                    <form id="searchform" action="ad_b2b_mem.php?vst=full&sear=1" method="post" target="_self" class="form-inline pull-left" onsubmit="return chk_search_form()">
                        <select name="keyword_type" id="keyword_type" class="form-control">
                            <option value="s2">手機</option>
                            <option value="s1">公司名稱</option>
                            <option value="s3">姓名</option>
                        </select>
                        <input name="keyword" id="keyword" class="form-control" type="text">
                        <input type="submit" id="search_send" class="btn btn-default" value="送出">
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th>出團日期</th>
                            <th>旅遊名稱</th>
                            <th>人數</th>
                            <th>單價</th>
                            <th>報名單號</th>
                            <th>下單時間</th>
                            <th>類別/狀態</th>
                            <th>收訂期限</th>
                            <th>已收金額</th>
                            <th>處理</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="center">2015/3/13</td>
                            <td><a href="ad_fun_action_list_singup2.php?ac=1902&da=2015/3/13" target="_blank">【玩雪趣】首爾奇遇篇</a></td>
                            <td class="center">RQ:1</td>
                            <td class="center">25800</td>
                            <td class="center">32414</td>
                            <td class="center">2014/9/22 上午 11:28:00</td>
                            <td class="center">2</td>
                            <td class="center">1</td>
                            <td class="center">3</td>
                            <td class="center">好好玩旅行社-彭尹萱</td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_fun_action_list_singup2.php?ac=1902&da=2015/3/13" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="javascript:Mars_popup('ad_b2b_appy_list_fix.php?kid=32414','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=680,height=600,top=10,left=10');"><i class="icon-file"></i> 修改</a></li>

                                        <li><a href="javascript:Mars_popup2('ad_b2b_apply_list.php?st=del&kid=32414','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

                                    </ul>
                                </div>
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

<script type="text/javascript">
    $(function() {



    });

    function chk_search_form() {
        if (!$("#keyword_type").val()) {
            alert("請選擇要搜尋的類型。");
            $("#keyword_type").focus();
            return false;
        }
        if (!$("#keyword").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
        }
        location.href = "ad_b2b_mem.php?sear=1&vst=&s99=&" + $("#keyword_type").val() + "=" + $("#keyword").val();
        return false;
    }
</script>