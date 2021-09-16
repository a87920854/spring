<?php
require("./include/_top.php");
require("./include/_sidebar.php");
?>

<!-- MIDDLE -->
<section id="middle">
    <!-- page title -->
    <header id="page-header">
        <ol class="breadcrumb">
            <li><a href="index.php">管理系統</a></li>
            <li class="active">推廣工具</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>推廣工具</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <p>您的推廣代號：sale-1319</p>

                <p>春天網站推廣連結：<input type="text" style="width:80%;" value="https://www.springclub.com.tw/?cc=sale-1319" onclick="oCopy(this)" readonly></p>


                <p>約會專家推廣連結：<input type="text" style="width:80%;" value="https://www.singleparty.com.tw/?cc=sale-1319" onclick="oCopy(this)" readonly></p>

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
require("./include/_bottom.php");
?>

<script type="text/javascript">
    function oCopy(obj) {
        obj.select(); // 选中输入框中的内容

        try {
            if (document.execCommand('copy', false, null)) {

            } else {
                alert("無法自動複製，請手動按 ctrl + c 複製，謝謝");
            }
        } catch (err) {
            alert("無法自動複製，請手動按 ctrl + c 複製，謝謝");
        }

    }
</script>