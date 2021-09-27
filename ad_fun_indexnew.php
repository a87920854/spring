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
            <li class="active">國內首頁最新消息</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>國內首頁最新消息</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <td width="50%">訊息</td>
                            <td width="20%">連結</td>
                            <td width="20%">時間</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>test</td>
                            <td>test</td>
                            <td>2021/9/27 下午 02:44:32</td>
                            <td><a href="?st=del&an=253">刪除</a></td>
                        </tr>
                    </tbody>
                </table>

                <br>
                <p>新增最新消息</p>
                <form id="searchform" action="ad_fun_indexnew.asp?st=addnew" method="post" target="_self" onsubmit="return chk_add_form()">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <tr>
                            <td>訊息：<input type="text" name="n1" id="n1" style="width:80%;"></td>
                            <td width="30%">連結：<input type="text" name="n2" id="n2" style="width:80%;"></td>
                            <td width="5%"><input type="submit" value="新增"></td>
                        </tr>
                    </table>
                </form>
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
    function chk_add_form() {
        if (!$("#n1").val()) {
            alert("請輸入訊息。");
            $("#n1").focus();
            return false;
        }
        return true;
    }
</script>