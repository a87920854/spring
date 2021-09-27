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
            <li class="active">同業會員資料</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>同業列表 - 數量：1　<a href="?vst=full">[查看完整清單]</a></strong> <!-- panel title -->
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
                        <input type="submit" class="btn btn-default" value="送出">
                    </form>
                </div>

                <table class="table table-striped table-bordered bootstrap-datatable">

                    <thead>
                        <tr>
                            <th>同業簡稱</th>
                            <th>統一編號</th>
                            <th>姓名</th>
                            <th>帳號</th>
                            <th>密碼</th>
                            <th>手機</th>
                            <th>電子信箱</th>
                            <th>業務窗口</th>
                            <th>審核</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="center">劉小華1</td>
                            <td>123456789</td>
                            <td class="center"><a href="ad_b2b_mem_detail.php?auton=1" target="_blank">劉小華2</a></td>
                            <td class="center">123123</td>
                            <td class="center">123123</td>
                            <td class="center">0912345678</td>
                            <td class="center">aaabbb@msn.com</td>
                            <td class="center">
                                未審無窗口
                            </td>
                            <td>
                                <font color=red>尚未審核<br><a href="javascript:Mars_popup('ad_b2b_mem.php?st=fix&v=1&auton=1','','status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=200,height=150,top=10,left=10');">變更已審</a></font>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="ad_b2b_mem_detail.php?auton=1" target="_blank"><i class="icon-file"></i> 詳細</a></li>

                                        <li><a href="ad_b2b_mem_fix.php?auton=1"><i class="icon-file"></i> 修改</a></li>

                                        <li><a href="javascript:Mars_popup2('ad_b2b_mem.php?st=del&auton=1','','width=300,height=200,top=100,left=100')"><i class="icon-trash"></i> 刪除</a></li>

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