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
            <li class="active">首頁-Banner</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>首頁-Banner</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p><input type="button" class="btn btn-info" value="新增 Banner" onclick="Mars_popup('springweb_fun20_add.php','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');"></p>
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
                            <td><a href="#nu" onclick="alert('無法向上');"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=303&i1=26"><span class="fa fa-arrow-down"></span></a>26</td>
                            <td><a href="upload_image/mobile_index_banner_20181311481589.jpg" class="fancybox"><img src="upload_image/mobile_index_banner_20181311481589.jpg" border=0 height=40></a></td>
                            <td>https://www.springclub.com.tw/20170908.php?cc=springclub_mobile_officialwebsite_homepage</td>
                            <td>2020/5/12 上午 11:13:13</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun20_add.php?an=303','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun20.php?st=del&an=303">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=342&i1=26"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=342&i1=26"><span class="fa fa-arrow-down"></span></a>26</td>
                            <td><a href="upload_image/mobile_index_banner_20186261632158.jpg" class="fancybox"><img src="upload_image/mobile_index_banner_20186261632158.jpg" border=0 height=40></a></td>
                            <td>https://www.springclub.com.tw/20180510/?cc=springclub_mobile_officialwebsite_homepage</td>
                            <td>2018/6/26 下午 04:32:01</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun20_add.php?an=342','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun20.php?st=del&an=342">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=430&i1=26"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=430&i1=26"><span class="fa fa-arrow-down"></span></a>26</td>
                            <td><a href="upload_image/mobile_index_banner_201941216582654.jpg" class="fancybox"><img src="upload_image/mobile_index_banner_201941216582654.jpg" border=0 height=40></a></td>
                            <td>https://www.springclub.com.tw/20190401/?cc=springclub_mobile_officialwebsite_homepage</td>
                            <td>2019/4/12 下午 04:58:27</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun20_add.php?an=430','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun20.php?st=del&an=430">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=489&i1=26"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="?st=mdo&an=489&i1=26"><span class="fa fa-arrow-down"></span></a>26</td>
                            <td><a href="upload_image/mobile_index_banner_2019111217215133.jpg" class="fancybox"><img src="upload_image/mobile_index_banner_2019111217215133.jpg" border=0 height=40></a></td>
                            <td>https://www.springclub.com.tw/20190801/?cc=springclub_mobile_officialwebsite_homepage</td>
                            <td>2019/11/12 下午 05:22:42</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun20_add.php?an=489','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun20.php?st=del&an=489">刪除</a>
                            </td>
                        </tr>

                        <tr>
                            <td><a href="?st=mup&an=540&i1=26"><span class="fa fa-arrow-up margin-left-10 margin-right-10"></span></a><a href="#nu" onclick="alert('無法向下');"><span class="fa fa-arrow-down"></span></a>26</td>
                            <td><a href="upload_image/mobile_index_banner_202052211283119.jpg" class="fancybox"><img src="upload_image/mobile_index_banner_202052211283119.jpg" border=0 height=40></a></td>
                            <td>https://www.springclub.com.tw/201804012/?cc=springclub_mobile_officialwebsite_homepage</td>
                            <td>2020/5/22 上午 11:28:47</td>
                            <td>
                                <a href="javascript:Mars_popup('springweb_fun20_add.php?an=540','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=300,top=10,left=10');">編輯</a>
                                <a title="刪除" href="springweb_fun20.php?st=del&an=540">刪除</a>
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