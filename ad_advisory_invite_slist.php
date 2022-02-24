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
            <li class="active">諮詢預訂表-列表</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>諮詢預訂表-列表</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div class="col-md-12">
                    <form class="form-inline" id="searchform" action="ad_advisory_invite_slist.asp" method="post" target="_self" onsubmit="return chk_search_form()">
                        <input type="text" name="keyword" id="keyword" class="form-control"> <input type="submit" value="送出" class="btn btn-default">
                    </form>
                </div>
                關鍵字：
                <table class="table table-striped table-bordered bootstrap-datatable">
                    <tbody>
                        <tr>
                            <td style="height:auto;">
                                <div style="width:80px;float:left;">2022/2/24</div>
                                <div style="float:left;"><a href="ad_advisory_invite_d.asp?y=2022&m=2&d=24&to=5040">桃園 吳中義</a></div>
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

    function chk_search_form() {
        if (!$("#keyword").val()) {
            alert("請輸入要搜尋的關鍵字。");
            $("#keyword").focus();
            return false;
        }
        return true;
    }
</script>