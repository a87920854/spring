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
            <li><a href="index.asp">管理系統</a></li>
            <li class="active">諮詢預訂表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong> 諮詢預訂表　0 年0 月</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">
                <p>
                    <input type="button" value="列印本頁" class="btn btn-danger" onclick="Mars_popup('ad_advisory_invite_print.asp?thisdate=2022/2/24&branch=','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=690,height=470,top=10,left=10');">
                </p>

                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>

                        <tr>
                            <td width="70%"><strong>111 年 2 月 0 日</strong></td>
                            <td width="10%">●<a href="?y=2022&m=2&d=24">今天</a></td>
                            <td width="10%" style="border:0px">▲<a href="?y=2022&m=2&d=23">昨天</a></td>
                            <td width="10%" style="border:0px">▼<a href="?y=2022&m=2&d=25">明天</a></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <td width="30">NO.</td>
                            <td width="160">類型</td>
                            <td width="150">時間</td>
                            <td>姓名</td>
                            <td width="160">受理</td>
                            <td width="160">講師</td>
                            <td width="220"></td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>一對一諮詢</td>
                            <td>上午 11:00:00</td>
                            <td>

                                <a href="ad_mem_detail.asp?mem_num=2121977" target="_blank">林家輝</a>
                                <br>諮詢地點：桃園會館　桃園市桃園區復興路205號18F-3
                            </td>
                            <td>桃園-陳月鎂</td>
                            <td>桃園-阿綸</td>
                            <td>

                                已轉入
                                <a class="btn btn-danger" href="javascript:Mars_popup2('ad_advisory_invite_d.asp?an=5007&st=del','','scrollbars=yes,status=yes,menubar=yes,resizable=yes,width=300,height=150,top=100,left=100');">刪除</a>

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
    $mtu = "ad_advisory_invite.";

    function Mars_popup3(theURL, winName, features) {
        if (window.confirm("是否確定取消？") == true) {
            window.open(theURL, winName, features);
        } else {

        }
    }
</script>