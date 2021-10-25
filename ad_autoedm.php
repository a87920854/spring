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
            <li class="active">配對信產生器</li>
        </ol>
    </header>
    <!-- /page title -->

    <div id="content" class="padding-20">
        <!-- content starts -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="title elipsis">
                    <strong>配對信產生器</strong> <!-- panel title -->
                </span>
            </div>

            <div class="panel-body">

                <div style="height:200px;">
                    <br><br><br>
                    <a href="?sextype=1" class="btn btn-info">發送給男生</a>&nbsp;&nbsp;&nbsp;<a href="?sextype=0" class="btn btn-warning">發送給女生</a>
                </div>

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
        $(".vnum").on("click", function() {
            var $this = $(this),
                $thisid = $this.data("num"),
                $thisphoto = $("#" + $thisid + "photo"),
                $thisnum = $("#" + $thisid + "num"),
                $thisschool = $("#" + $thisid + "school"),
                $thisname = $("#" + $thisid + "name"),
                $thisnumv = $("#" + $thisid);
            if (!$thisnumv.val()) {
                alert("請輸入編號。");
                $thisnumv.focus();
                return false;
            }
            $.ajax({
                url: "ad_autoedm.php?st=read&num=" + $thisnumv.val(),
            }).done(function(msg) {
                if (msg == "err") {
                    alert("會員資料錯誤");
                } else {
                    if (msg.indexOf("|") <= 0) alert("會員資料分析錯誤");
                    else {
                        var $v1 = msg.split("|")[0],
                            $v2 = msg.split("|")[1],
                            $v3 = msg.split("|")[2];
                        $thisnum.val($thisnumv.val());
                        $thisname.val($v1);
                        $thisschool.val($v2);
                        $thisphoto.val($v3);
                        relaod_data($("#" + $thisid + "div"), $v1, $v2, $v3, $thisnum.val());
                    }
                }
            });
        });
    });

    function relaod_data($dv, $v1, $v2, $v3, $v4) {
        if (!$dv) return false;
        var $utmcode = $("#utmcode").val();
        $dv.html("");

        $newhtml = "<a href=\"http://www.springclub.com.tw/lovepy_profile.php?m=" + $v4 + "&" + $utmcode + "\"><img src=\"http://www.springclub.com.tw/photo/" + $v3 + "\" width=104 height=126 border=0 style=\"display:block;\"></a>";
        $newhtml += "<a href=\"http://www.springclub.com.tw/lovepy_profile.php?m=" + $v4 + "&" + $utmcode + "\" style=\"text-decoration: none;\">" + $v1 + " (" + $v2 + ")</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

        $dv.html($newhtml);
    }
</script>