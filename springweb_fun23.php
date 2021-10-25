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
            <li class="active">中間-Banner</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>中間-Banner</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p><input type="button" class="btn btn-info" value="新增 Banner" onclick="Mars_popup('springweb_fun23_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');"></p>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <th width="70"></th>
                            <th>圖片</th>
                            <th>連結位置</th>
                            <th width="160">資料時間</th>
                            <th width="120">操作</th>
                        </tr>

                        <tr>
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=293&i1=26"><span class="fa fa-arrow-down"></span></a>26</td>
                            <td><a href="upload_image/mobile_index_banner_c_201712201551457.jpg" class="fancybox"><img src="upload_image/mobile_index_banner_c_201712201551457.jpg" border=0 height=40></a></td>
                            <td>http://m.springclub.com.tw/singleparty.php</td>
                            <td>2018/1/3 下午 01:51:17</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun23_add.php?an=293','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun23.php?st=del&an=293">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=291&i1=1"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=291&i1=1"><span class="fa fa-arrow-down"></span></a>1</td>
                            <td><a href="upload_image/mobile_index_banner_c_201712201545536.jpg" class="fancybox"><img src="upload_image/mobile_index_banner_c_201712201545536.jpg" border=0 height=40></a></td>
                            <td>http://m.springclub.com.tw/singleparty.php</td>
                            <td>2018/1/3 下午 01:51:27</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun23_add.php?an=291','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun23.php?st=del&an=291">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=292&i1=1"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a>1</td>
                            <td><a href="upload_image/mobile_index_banner_c_2017122015585.jpg" class="fancybox"><img src="upload_image/mobile_index_banner_c_2017122015585.jpg" border=0 height=40></a></td>
                            <td>http://m.springclub.com.tw/singleparty.php</td>
                            <td>2018/1/3 下午 01:51:23</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun23_add.php?an=292','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun23.php?st=del&an=292">刪除</a>
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
            alert("請輸入花絮編號");
            $("#index_a1_num").focus();
            return false;
        }
        return true;
    }
</script>