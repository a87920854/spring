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
            <li class="active">首頁-上方Banner</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>首頁-上方Banner</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><input type="button" class="btn btn-info" value="新增 Banner" onclick="Mars_popup('springweb_fun1_2_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');"></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70"></th>
                            <th>圖片</th>
                            <th>連結位置</th>
                            <th>ALT</th>
                            <th width="160">資料時間</th>
                            <th>操作</th>
                        </tr>

                        <tr>
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=608&i1=2"><span class="fa fa-arrow-down"></span></a>2</td>
                            <td><a href="upload_image/index_banner_top_202141915433017.jpg" class="fancybox"><img src="upload_image/index_banner_top_202141915433017.jpg" border=0 height=40></a></td>
                            <td>#</td>
                            <td></td>
                            <td>2021/4/19 下午 03:43:30</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun1_2_add.php?an=608','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun1_2.asp?st=del&an=608">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=567&i1=1"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a>1</td>
                            <td><a href="upload_image/index_banner_top_202133016251792.jpg" class="fancybox"><img src="upload_image/index_banner_top_202133016251792.jpg" border=0 height=40></a></td>
                            <td>#</td>
                            <td></td>
                            <td>2021/3/30 下午 04:25:17</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun1_2_add.asp?an=567','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun1_2.asp?st=del&an=567">刪除</a>
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

    });

    function chk_a1_form() {
        if (!$("#index_a1_text").val()) {
            alert("請輸入花絮文字");
            $("#index_a1_text").focus();
            return false;
        }
        if (!$("#index_a1_num").val()) {
            alert("請輸入連結");
            $("#index_a1_num").focus();
            return false;
        }
        return true;
    }
</script>