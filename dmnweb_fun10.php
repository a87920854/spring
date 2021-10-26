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
            <li class="active">精選會員</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>精選會員</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                <form action="?st=x" method="post" target="_self" onsubmit="return chk_s_form()" class="form-inline" style="display:inline-block;margin:0px;">
                    <input type="text" name="keyword" id="keyword" class="form-control" placeholder="請輸入要搜尋的會員編號">&nbsp;<input type="submit" class="btn btn-warning" value="搜尋精選會員">
                </form>&nbsp;&nbsp;&nbsp;
                <form action="?st=add" method="post" target="_self" onsubmit="return chk_add_form()" class="form-inline" style="display:inline-block;margin:0px;">
                    <input type="text" name="userid" id="userid" class="form-control" placeholder="請輸入要新增的會員編號">&nbsp;<input type="submit" class="btn btn-info" value="新增精選會員">
                </form>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th>照片</th>
                            <th>ID</th>
                            <th>暱稱</th>
                            <th>性別</th>
                            <th>年次</th>
                            <th>城市</th>
                            <th>職業</th>
                            <th>學歷</th>
                            <th>星座</th>
                            <th>身高</th>
                            <th>操作</th>
                        </tr>

                        <tr>
                            <td>
                                <a href="dphoto/20535287/head/rsl/rsl_55ed72ec4191f.jpg" class="fancybox"><img src="dphoto/20535287/head/rsl/rsl_55ed72ec4191f.jpg" border=0 height=40></a>
                            </td>
                            <td>2f30ae0e</td>
                            <td>Sam</td>
                            <td>男</td>
                            <td>1982</td>
                            <td>新北市</td>
                            <td>其他</td>
                            <td>大學</td>
                            <td>天秤</td>
                            <td>170</td>
                            <td>
                                <a title="刪除" href="dmnweb_fun10.php?st=del&an=441">刪除</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center">共 282 筆、第 1 頁／共 6 頁&nbsp;&nbsp;
                <ul class='pagination pagination-md'>
                    <li><a href=/dmnweb_fun10.php?topage=1>第一頁</a></li>
                    <li class='active'><a href="#">1</a></li>
                    <li><a href=/dmnweb_fun10.php?topage=2 class='text'>2</a></li>
                    <li><a href=/dmnweb_fun10.php?topage=3 class='text'>3</a></li>
                    <li><a href=/dmnweb_fun10.php?topage=4 class='text'>4</a></li>
                    <li><a href=/dmnweb_fun10.php?topage=5 class='text'>5</a></li>
                    <li><a href=/dmnweb_fun10.php?topage=6 class='text'>6</a></li>
                    <li><a href=/dmnweb_fun10.php?topage=2 class='text' title='Next'>下一頁</a></li>
                    <li><a href=/dmnweb_fun10.php?topage=6 class='text'>最後一頁</a></li>
                    <li><select style="width:60px;height:34px;margin-left:5px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="/dmnweb_fun10.php?topage=1" selected>1</option>
                            <option value="/dmnweb_fun10.php?topage=2">2</option>
                            <option value="/dmnweb_fun10.php?topage=3">3</option>
                            <option value="/dmnweb_fun10.php?topage=4">4</option>
                            <option value="/dmnweb_fun10.php?topage=5">5</option>
                            <option value="/dmnweb_fun10.php?topage=6">6</option>
                        </select></li>
                </ul>
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

    });

    function chk_s_form() {
        if (!$("#keyword").val()) {
            alert("請輸入要搜尋的會員編號。");
            $("#keyword").focus();
            return false;
        }
        return true;
    }

    function chk_add_form() {
        if (!$("#userid").val()) {
            alert("請輸入要搜尋的會員編號。");
            $("#userid").focus();
            return false;
        }
        return true;
    }
</script>